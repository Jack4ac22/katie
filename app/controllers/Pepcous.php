<?php
class Pepcous extends Controller
{
    public function __construct()
    {
        if (!islogged()) {
            flash('msg', '<p>You do not have permission to access this data, please login.</p>');
            redirect_to('users/login');
        }

        $this->pepcouModel = $this->model('Pepcou');
        $this->personModel = $this->model('Person');
    }

    /**
     * @return countries with the people that they.
     */

    public function index()
    {
        if ((isset($_GET['search'])) && (strlen($_GET['search'])) > 0) {
            $search = $_GET['search'];
        } else {
            $search = '';
        }
        $countries = $this->pepcouModel->get_all_data($search);
        $data = [
            'countries' => $countries
        ];
        $this->view('pepcous/index', $data);
    }

    /**
     * add a pepcou and assign it to someone
     */

    public function add($name = 0, $title = 0)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);
            $data = [
                'comment' => $_POST['comment'],
                'c_id' => $_POST['c_id'],
                'p_id' => $_POST['p_id'],
                'comment_err' => '',
                'c_id_err' => '',
                'p_id_err' => ''
            ];

            // data validation
            if ($_POST['p_id'] == 0) {
                $data['p_id_err'] = 'please select a person.';
            } elseif (!isset($_POST['p_id'])) {
                $data['p_id_err'] = 'please select a person.';
            }
            if ($_POST['c_id'] == 0) {
                $data['c_id_err'] = 'please select a country.';
            } elseif (!isset($_POST['c_id'])) {
                $data['c_id_err'] = 'please select a country.';
            }

            if (empty($data['comment'])) {
                $data['comment_err'] = 'Please enter comment';
            } elseif (strip_tags($_POST['comment']) !== $_POST['comment']) {
                $data['comment_err'] = 'Please verify the comment, it should not contain special characters.';
            }


            if ((empty($data['c_id_err'])) && (empty($data['p_id_err'])) && (empty($data['comment_err']))) {
                if ($this->pepcouModel->add_nationality_to_person($data)) {
                    $last = $this->pepcouModel->get_the_last();
                    flash('msg', '<p><a href="' . URLROOT . '/persons/show/' . $last->p_id . '" class="alert-link">' . $last->first_name . ' ' . $last->last_name . '</a> is <a href="' . URLROOT . '/pepcous/show_c/' . $last->c_id . '" class="alert-link">' . $last->nationality . '</a>.</p>');
                    redirect_to('/persons/show/' . $last->p_id);
                } else {
                    flash('msg', 'Something went wrong, please try again later.', 'alert alert-danger alert-dismissible fade show');
                    redirect_to('persons');
                }
            } else {
                $persons = $this->personModel->getPersons(null, null);
                $data['persons'] = $persons;
                $countries = $this->pepcouModel->get_countries();
                $data['countries'] = $countries;
                $this->view('pepcous/add', $data);
            }
        } else {
            $persons = $this->personModel->getPersons(null, null);
            $countries = $this->pepcouModel->get_countries();
            $data = [
                'comment' => '',
                'c_id' => $title,
                'p_id' => $name,
                'persons' => $persons,
                'countries' => $countries
            ];
            $this->view('pepcous/add', $data);
        }
    }



    /**
     * edite a pepou number
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
                'c_id' => $_POST['c_id'],
                'comment' => $_POST['comment'],
                'c_id_err' => '',
                'comment_err' => '',
                'p_id_err' => ''
            ];
            // data validation
            if (empty($_POST['c_id'])) {
                $data['c_id_err'] = 'please pick a country.';
            }
            if ($_POST['p_id'] == 0) {
                $data['p_id_err'] = 'please select a person.';
            }
            if (strip_tags($_POST['comment']) !== $_POST['comment']) {
                $data['comment_err'] = 'Please verify the comment, it should not contain special characters.';
            };

            //check for errors
            if (empty($data['c_id_err']) && empty($data['comment_err']) && empty($data['p_id_err'])) {

                if ($this->pepcouModel->update_pepcou($data)) {
                    flash('msg', '<p>The nationality is updated.</p><a href="' . URLROOT . '/pepcous/show/' . $id . '" class="alert-link">you can use this link to check</a>.');
                    redirect_to('persons/show/' . $data['p_id']);
                } else {
                    flash('msg', 'Something went wrong, please try again later.');
                    $this->view('pepcous/edit', $data);
                }
                //load the view with the errors
            } else {
                $persons = $this->personModel->getPersons(null, null);
                $data['persons'] = $persons;
                $countries = $this->pepcouModel->get_countries();
                $data['countries'] = $countries;
                $this->view('pepcous/edit', $data);
            }
        } else {
            $pep = $this->pepcouModel->get_pepcou_by_id($id);
            if ($pep) {
                $persons = $this->personModel->getPersons(null, null);
                $countries = $this->pepcouModel->get_countries();
                $data = [
                    'id' => $pep->id,
                    'comment' => $pep->comment,
                    'c_id' => $pep->c_id,
                    'p_id' => $pep->p_id,
                    'persons' => $persons,
                    'countries' => $countries
                ];
                $this->view('pepcous/edit', $data);
            } else {
                $msg = "<p>something went wron, please try again later</p>";
                flash('msg', $msg, 'alert alert-danger alert-dismissible fade show');
                redirect_to("pepcous");
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
        $pepcou = $this->pepcouModel->get_pepcou_by_id($id);
        if ($pepcou) {
            $this->view('pepcous/show', $pepcou);
        } else {
            flash('msg', '<p>the page which you requested does not exist, try to use other method</p>', 'alert alert-danger alert-dismissible fade show');
            redirect_to('pages/notFound');
        }
    }

    public function show_c($id = null)
    {
        $pepcou = $this->pepcouModel->get_pepcou_by_c($id);
        if ($pepcou) {
            $this->view('pepcous/show_c', $pepcou);
        } else {
            flash('msg', '<p>the page which you requested does not exist, try to use other method</p>', 'alert alert-danger alert-dismissible fade show');
            redirect_to('pages/notFound');
        }
    }

    public function delete_pepcou($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $pep = $this->pepcouModel->get_pepcou_by_id($id);
            if ($pep) {
                if (!islogged()) {
                    redirect_to('/login');
                }
                if ($this->pepcouModel->delete_pepcou($id)) {
                    flash('msg', '<p>' . $pep->first_name . ' ' . $pep->last_name . ' will not be shown in relation to <a href="' . URLROOT . '/pepcous/show_c/' . $pep->c_id . '" class="alert-link">' . $pep->en_short_name . '</a> group.</p>
                    <p>you can check
                    <a href="' . URLROOT . '/persons/show/' . $pep->p_id . '" class="alert-link">'
                        . 'the personal profile. </p>');
                    redirect_to("persons/show/$pep->p_id");
                } else {
                    $msg = "<p>Failed, please try again later.</p>";
                    redirect_to("persons/show/$pep->p_id", $msg, 'alert alert-danger alert-dismissible fade show');
                }
            } else {
                $msg = "<p>Failed, please try again later.</p>";
                redirect_to("persons/show/$pep->p_id", $msg, 'alert alert-danger alert-dismissible fade show');
            }
        }
    }
}
