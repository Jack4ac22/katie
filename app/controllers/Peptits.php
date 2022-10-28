<?php
class Peptits extends Controller
{
    public function __construct()
    {
        if (!islogged()) {
            flash('msg', '<p>You do not have permission to access this data, please login.</p>');
            redirect_to('users/login');
        }

        $this->peptitModel = $this->model('Peptit');
        $this->titleModel = $this->model('Title');
        $this->personModel = $this->model('Person');
    }

    /**
     * @return languages with the people that they speaks them.
     */

    public function index()
    {
        $titles = $this->peptitModel->get_all_data();
        $data = [
            'titles' => $titles
        ];
        $this->view('peptits/index', $data);
    }

    /**
     * add a phone number and assign it to someone
     */

    public function add($name = 0, $title = 0)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);
            $data = [
                'description' => $_POST['description'],
                't_id' => $_POST['t_id'],
                'p_id' => $_POST['p_id'],
                'description_err' => '',
                't_id_err' => '',
                'p_id_err' => ''
            ];

            // data validation
            if ($_POST['p_id'] == 0) {
                $data['p_id_err'] = 'please select a person.';
            } elseif (!isset($_POST['p_id'])) {
                $data['p_id_err'] = 'please select a person.';
            }
            if ($_POST['t_id'] == 0) {
                $data['t_id_err'] = 'please select a language.';
            } elseif (!isset($_POST['t_id'])) {
                $data['t_id_err'] = 'please select a language.';
            }

            if (empty($data['description'])) {
                $data['description_err'] = 'Please enter description';
            } elseif (strip_tags($_POST['description']) !== $_POST['description']) {
                $data['description_err'] = 'Please verify the description, it should not contain special characters.';
            }


            if ((empty($data['t_id_err'])) && (empty($data['p_id_err'])) && (empty($data['description_err']))) {
                if ($this->peptitModel->add_title_to_person($data)) {
                    $last = $this->peptitModel->get_the_last();
                    flash('msg', '<p><a href="' . URLROOT . '/titles/show/' . $last->t_id . '" class="alert-link">' . $last->title . '</a> title is added to <a href="' . URLROOT . '/persons/show/' . $last->p_id . '" class="alert-link">' . $last->first_name . $last->last_name . '.</a>');
                    redirect_to('/persons/show/' . $last->p_id);
                } else {
                    flash('msg', 'Something went wrong, please try again later.', 'alert alert-danger alert-dismissible fade show');
                    redirect_to('persons');
                }
            } else {
                $persons = $this->personModel->getPersons(null, null);
                $data['persons'] = $persons;
                $titles = $this->titleModel->get_titles();
                $data['titles'] = $titles;
                $this->view('peptits/add', $data);
            }
        } else {
            $persons = $this->personModel->getPersons(null, null);
            $titles = $this->titleModel->get_titles();
            $data = [
                'description' => '',
                't_id' => $title,
                'p_id' => $name,
                'persons' => $persons,
                'titles' => $titles
            ];
            $this->view('peptits/add', $data);
        }
    }



    /**
     * edite a peptit number
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
                't_id' => $_POST['t_id'],
                'description' => $_POST['description'],
                't_id_err' => '',
                'description_err' => '',
                'p_id_err' => ''
            ];
            // data validation
            if (empty($_POST['t_id'])) {
                $data['t_id_err'] = 'please pick a title.';
            }
            if ($_POST['p_id'] == 0) {
                $data['p_id_err'] = 'please select a person.';
            }
            if (strip_tags($_POST['description']) !== $_POST['description']) {
                $data['description_err'] = 'Please verify the description, it should not contain special characters.';
            };

            //check for errors
            if (empty($data['t_id_err']) && empty($data['comment_err']) && empty($data['p_id_err'])) {

                if ($this->peptitModel->update_peptit($data)) {
                    flash('msg', '<p>The title/person relation has been updated.</p> <a href="' . URLROOT . '/peptits/show/' . $id . '" class="alert-link">you can use this link to check</a>.');
                    redirect_to('persons/show/' . $data['p_id']);
                } else {
                    flash('msg', 'Something went wrong, please try again later.');
                    $this->view('peptit/edit', $data);
                }
                //load the view with the errors
            } else {
                $persons = $this->personModel->getPersons(null, null);
                $data['persons'] = $persons;
                $titles = $this->titleModel->get_titles();
                $data['titles'] = $titles;
                $this->view('peptits/edit', $data);
            }
        } else {
            $pep = $this->peptitModel->get_peptit_by_id($id);
            if ($pep) {
                $persons = $this->personModel->getPersons(null, null);
                $titles = $this->titleModel->get_titles();
                $data = [
                    'id' => $pep->id,
                    'description' => $pep->description,
                    't_id' => $pep->t_id,
                    'p_id' => $pep->p_id,
                    'persons' => $persons,
                    'titles' => $titles
                ];
                $this->view('peptits/edit', $data);
            } else {
                $msg = "<p>something went wron, please try again later</p>";
                flash('msg', $msg, 'alert alert-danger alert-dismissible fade show');
                redirect_to("peptits");
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
        $peptit = $this->peptitModel->get_peptit_by_id($id);
        if ($peptit) {
            $this->view('peptits/show', $peptit);
        } else {
            flash('msg', '<p>the page which you requested does not exist, try to use other method</p>');
            redirect_to('pages/notFound');
        }
    }

    public function delete_peptit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $peptit = $this->peptitModel->get_peptit_by_id($id);
            if ($peptit) {
                if (!islogged()) {
                    redirect_to('/login');
                }
                if ($this->peptitModel->delete_peptit($id)) {
                    flash('msg', '<p>' . $peptit->first_name . ' ' . $peptit->last_name . ' will not be shown in relation to <a href="' . URLROOT . '/titles/show/' . $peptit->t_id . '" class="alert-link">' . $peptit->title . '</a> title.</p>
                    <p>you can check
                    <a href="' . URLROOT . '/persons/show/' . $peptit->p_id . '" class="alert-link">'
                        . 'the personal profile. </p>');
                    redirect_to("persons/show/$peptit->p_id");
                } else {
                    $msg = "<p>Failed, please try again later.</p>";
                    redirect_to("peptits/show/$peptit->lan_id", $msg);
                }
            }
        }
    }
}
