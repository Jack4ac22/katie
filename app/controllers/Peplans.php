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
                $data['number_err'] = 'please chose a person.';
            } elseif (!isset($_POST['p_id'])) {
                $data['number_err'] = 'please chose a person.';
            }
            if ($_POST['lan_id'] == 0) {
                $data['number_err'] = 'please chose a language.';
            }
            if ($_POST['levle'] == 0) {
                $data['number_err'] = 'please chose a language.';
            }


            if ((empty($data['lan_id_err'])) && (empty($data['p_id_err'])) && (empty($data['levle_err']))) {
                if ($this->peplanModel->add_lan_to_person($data)) {
                    flash('msg', '<a href="' . URLROOT . '/persons/show/' . $data['p_id'] . '" class="alert-link">check the profile.</a>');
                    redirect_to('persons/' . $data['p_id']);
                } else {
                    flash('msg', 'Something went wrong, please try again later.');
                    redirect_to('persons');
                }
            } else {
                $persons = $this->personModel->add_lan_to_person();
                $data['persons'] = $persons;
                $languagess = $this->languagesModel->add_lan_to_person();
                $data['languagess'] = $languagess;
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
     * edite a phone number
     * @param $id
     * return ()
     */

    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize language array
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

            $data = [
                'number' => $_POST['number'],
                'description' => $_POST['description'],
                'p_id' => $_POST['p_id'],
                'id' => $id,
                'number_err' => '',
                'description_err' => '',
                'p_id_err' => ''
            ];
            // data validation
            if (empty($_POST['number'])) {
                $data['number_err'] = 'please insert a phone number.';
            } elseif (!is_numeric($_POST['number'])) {
                $data['number_err'] = 'Phone number is a number.';
            }
            if (empty($_POST['description'])) {
                $data['description'] = 'General';
            }
            if ($_POST['p_id'] == 0) {
                $data['number_err'] = 'please chose a person.';
            }

            //check for errors
            if (empty($data['number_err']) && empty($data['description_err']) && empty($data['p_id_err'])) {
                var_dump($data);

                if ($this->phoneModel->update_phone($data)) {
                    flash('msg', 'phone number is updated');
                    redirect_to('phones/show/' . $id);
                } else {
                    flash('msg', 'Something went wrong, please try again later.');
                    redirect_to('phones');
                }
                //load the view with the errors
            } else {
                $persons = $this->personModel->getPersons();
                $data['persons'] = $persons;
                $this->view('phones/edit/' . $id, $data);
            }
        } else {
            $phone = $this->phoneModel->get_phone_by_id($id);
            $persons = $this->personModel->getPersons();
            $data = [
                'id' => $phone->id,
                'number' => $phone->number,
                'description' => $phone->description,
                'p_id' => $phone->p_id,
                'persons' => $persons
            ];
            $this->view('phones/edit', $data);
        }
    }


    public function show($id)
    {
        $phone = $this->phoneModel->get_phone_by_id($id);
        if ($phone) {
            $data = ['phone' => $phone];
            $this->view('phones/show', $data);
        } else {
            flash('msg', '<p>the page which you requested does not exist, try to use other method</p>');
            redirect_to('/pages/notFound');
        }
    }

    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $phone = $this->phoneModel->get_phone_by_id($id);
            if (!islogged()) {
                redirect_to('phones');
            }
            if ($this->phoneModel->delete_phone($id)) {
                flash('msg', 'phone number is Removed from your database.');
                redirect_to('phones');
            }
        }
    }


    public function delete_from_user($id, $p_id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $phone = $this->phoneModel->get_phone_by_id($id);
            if ($phone) {
                if (!islogged()) {
                    redirect_to('phones');
                }
                if ($this->phoneModel->delete_phone($id)) {
                    $msg = "phone number is Removed from your data base.. $p_id";
                    flash('msg',);
                    redirect_to("persons/show/$p_id");
                }
            }
        }
    }
}
