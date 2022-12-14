<?php
class Peplans extends Controller
{
    public function __construct()
    {
        if (!islogged()) {
            flash('msg', '<p>You do not have permission to access this data, please login.</p>');
            redirect_to('users/login');
        }

        $this->peplanModel = $this->model('Peplan');
        $this->languageModel = $this->model('Language');
        $this->personModel = $this->model('Person');
    }

    /**
     * @return languages with the people that they speaks them.
     */

    public function index()
    {
        $languages = $this->peplanModel->get_all_data();
        $data = [
            'languages' => $languages
        ];
        $this->view('peplans/index', $data);
    }

    /**
     * add a phone number and assign it to someone
     */

    public function add($name = 0, $lan = 0)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);
            $data = [
                'levle' => $_POST['levle'],
                'comment' => $_POST['comment'],
                'lan_id' => $_POST['lan_id'],
                'p_id' => $_POST['p_id'],
                'levle_err' => '',
                'comment_err' => '',
                'lan_id_err' => '',
                'p_id_err' => ''
            ];

            // data validation
            if ($_POST['p_id'] == 0) {
                $data['p_id_err'] = 'please select a person.';
            } elseif (!isset($_POST['p_id'])) {
                $data['p_id_err'] = 'please select a person.';
            }
            if ($_POST['lan_id'] == 0) {
                $data['lan_id_err'] = 'please select a language.';
            } elseif (!isset($_POST['lan_id'])) {
                $data['lan_id_err'] = 'please select a language.';
            }
            if ($_POST['levle'] == 0) {
                $data['levle_err'] = 'please select a language.';
            }


            if ((empty($data['lan_id_err'])) && (empty($data['p_id_err'])) && (empty($data['levle_err']))) {
                if ($this->peplanModel->add_lan_to_person($data)) {
                    $last = $this->peplanModel->get_the_last();
                    flash('msg', '<p><a href="' . URLROOT . '/languages/show/' . $last->p_id . '" class="alert-link">' . $last->title . '</a> language is added to <a href="' . URLROOT . '/persons/show/' . $last->p_id . '" class="alert-link">' . $last->first_name . $last->last_name . '.</a>');
                    redirect_to('/persons/show/' . $last->p_id);
                } else {
                    flash('msg', 'Something went wrong, please try again later.');
                    redirect_to('persons');
                }
            } else {
                $persons = $this->personModel->getPersons(null, null);
                $data['persons'] = $persons;
                $languages = $this->languageModel->getlanguages();
                $data['languages'] = $languages;
                $this->view('peplans/add', $data);
            }
        } else {
            $persons = $this->personModel->getPersons(null, null);
            $languages = $this->languageModel->getlanguages();
            $data = [
                'levle' => '',
                'comment' => '',
                'lan_id' => $lan,
                'p_id' => $name,
                'persons' => $persons,
                'languages' => $languages
            ];
            $this->view('peplans/add', $data);
        }
    }


    /**
     * edite a peplan number
     * @param $id
     * return ()
     */

    public function edit($id = 0)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);
            $data = [
                'id' => $id,
                'p_id' => $_POST['p_id'],
                'lan_id' => $_POST['lan_id'],
                'levle' => $_POST['levle'],
                'comment' => $_POST['comment'],
                'lan_id_err' => '',
                'levle_err' => '',
                'comment_err' => '',
                'p_id_err' => ''
            ];
            // data validation
            if (empty($_POST['lan_id'])) {
                $data['lan_id_err'] = 'please pick a language.';
            }
            if ((empty($_POST['levle'])) || ($_POST['levle'] == 0)) {
                $data['levle_err'] = 'please pick a level';
            }
            if ($_POST['p_id'] == 0) {
                $data['p_id_err'] = 'please select a person.';
            }
            if (strip_tags(trim($_POST['comment'])) !== $_POST['comment']) {
                $data['comment_err'] = 'Please verify the comment, it should not contain special characters.';
            };

            //check for errors
            if (empty($data['lan_id_err']) && empty($data['levle_err']) && empty($data['p_id_err'])) {
                if ($this->peplanModel->update_peplan($data)) {
                    flash('msg', '<p>' . 'The language/person relation has been updated.</p> <a href="' . URLROOT . '/peplans/show/' . $id . '" class="alert-link">you can use this link to check</a>.');
                    redirect_to('persons/show/' . $data['p_id']);
                } else {
                    flash('msg', 'Something went wrong, please try again later.');
                    $this->view('peplan/edit/' . $id, $data);
                }
                //load the view with the errors
            } else {
                $persons = $this->personModel->getPersons(null, null);
                $data['persons'] = $persons;
                $languages = $this->languageModel->getlanguages();
                $data['languages'] = $languages;
                $this->view('peplan/edit/' . $id, $data);
            }
        } else {
            $pep = $this->peplanModel->get_peplan_by_id($id);
            if ($pep) {
                $persons = $this->personModel->getPersons(null, null);
                $languages = $this->languageModel->getlanguages();
                $data = [
                    'id' => $pep->id,
                    'levle' => $pep->levle,
                    'comment' => $pep->comment,
                    'lan_id' => $pep->lan_id,
                    'p_id' => $pep->p_id,
                    'persons' => $persons,
                    'languages' => $languages
                ];
                $this->view('peplans/edit', $data);
            } else {
                $msg = "<p>something went wron, please try again later</p>";
                flash('msg', $msg, 'alert alert-danger alert-dismissible fade show');
                redirect_to("peplans");
            }
        }
    }


    /**
     * show($id)
     * @param #id
     * @return data
     */
    public function show($id = null)
    {
        $peplan = $this->peplanModel->get_peplan_by_id($id);
        if ($peplan) {
            $this->view('peplans/show', $peplan);
        } else {
            flash('msg', '<p>the page which you requested does not exist, try to use other method</p>');
            redirect_to('pages/notFound');
        }
    }

    public function delete_peplan($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $peplan = $this->peplanModel->get_peplan_by_id($id);
            if ($peplan) {
                if (!islogged()) {
                    redirect_to('/login');
                }
                if ($this->peplanModel->delete_peplan($id)) {
                    flash('msg', '<p>' . $peplan->first_name . ' ' . $peplan->last_name . ' will not be shown in relation to <a href="' . URLROOT . '/languages/show/' . $peplan->lan_id . '" class="alert-link">' . $peplan->title . '</a> language.</p>
                    <p>you can check
                    <a href="' . URLROOT . '/persons/show/' . $peplan->p_id . '" class="alert-link">'
                        . 'the personal profile. </p>');
                    redirect_to("persons/show/$peplan->p_id");
                } else {
                    $msg = "<p>Failed, please try again later.</p>";
                    redirect_to("languages/show/$peplan->lan_id", $msg);
                }
            }
        }
    }
}
