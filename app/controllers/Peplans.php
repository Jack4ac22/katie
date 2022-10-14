<?php
class Peplans extends Controller
{
    public function __construct()
    {
        if (!islogged()) {
            flash('msg', 'you do not have permission to see this data, please login.');
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
                $data['p_id_err'] = 'please chose a person.';
            } elseif (!isset($_POST['p_id'])) {
                $data['p_id_err'] = 'please chose a person.';
            }
            if ($_POST['lan_id'] == 0) {
                $data['lan_id_err'] = 'please chose a language.';
            } elseif (!isset($_POST['lan_id'])) {
                $data['lan_id_err'] = 'please chose a language.';
            }
            if ($_POST['levle'] == 0) {
                $data['number_err'] = 'please chose a language.';
            }


            if ((empty($data['lan_id_err'])) && (empty($data['p_id_err'])) && (empty($data['levle_err']))) {
                if ($this->peplanModel->add_lan_to_person($data)) {
                    flash('msg', '<p>Language is added, check the profile: <a href="' . URLROOT . '/persons/show/' . $data['p_id'] . '" class="alert-link">check the profile.</a>');
                    redirect_to('persons/' . $data['p_id']);
                } else {
                    flash('msg', 'Something went wrong, please try again later.');
                    redirect_to('persons');
                }
            } else {
                $persons = $this->personModel->getPersons();
                $data['persons'] = $persons;
                $languages = $this->languageModel->getlanguages();
                $data['languages'] = $languages;
                $this->view('peplans/add', $data);
            }
        } else
            $persons = $this->personModel->getPersons();
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


    /**
     * edite a peplan number
     * @param $id
     * return ()
     */

    public function edit($id = 0)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize language array

            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);
            $data = [
                'p_id' => $_POST['p_id'],
                'lan_id' => $_POST['lan_id'],
                'levle' => $_POST['levle'],
                'id' => $id,
                'nlan_id_err' => '',
                'levle_err' => '',
                'p_id_err' => ''
            ];
            // data validation
            if (empty($_POST['lan_id'])) {
                $data['lan_id_err'] = 'please pick a language.';
            }
            if (empty($_POST['levle'])) {
                $data['levle_err'] = 'please pick a level';
            }
            if ($_POST['p_id'] == 0) {
                $data['p_id_err'] = 'please chose a person.';
            }

            //check for errors
            if (empty($data['lan_id_err']) && empty($data['levle_err']) && empty($data['p_id_err'])) {
                if ($this->peplanModel->update_peplan($data)) {
                    flash('msg', 'the language/person relation has been updated');
                    redirect_to('persons/show/' . $data['p_id']);
                } else {
                    flash('msg', 'Something went wrong, please try again later.');
                    $this->view('peplan/edit/' . $id, $data);
                }
                //load the view with the errors
            } else {
                $persons = $this->personModel->getPersons();
                $data['persons'] = $persons;
                $languages = $this->languageModel->getlanguages();
                $data['languages'] = $languages;
                $this->view('phones/edit/' . $id, $data);
            }
        } else {
            $persons = $this->personModel->getPersons();
            $languages = $this->languageModel->getlanguages();
            $pep = $this->peplanModel->get_peplan_by_id($id);
            if ($pep) {
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
                redirect_to("peplans", $msg);
            }
        }
    }

    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $peplan = $this->peplanModel->get_peplan_by_id($id);
            if ($peplan) {
                if (!islogged()) {
                    redirect_to('peplans');
                }
                if ($this->peplanModel->delete_peplan($id)) {
                    $msg = "<p>$peplan->first_name $peplan->last_name will not shown in relation to $peplan->title language. $id</p>
                    <p>you can check $peplan->first_name</p>";
                    redirect_to("languages/show/$peplan->lan_id", $msg);
                }
            }
        }
    }
}
