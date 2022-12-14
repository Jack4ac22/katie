<?php
class Phones extends Controller
{
    public function __construct()
    {
        if (!islogged()) {
            flash('msg', 'you do not have permission to see this data, please login.', 'alert alert-danger alert-dismissible fade show');
            redirect_to('users/login');
        }
        $this->phoneModel = $this->model('Phone');
        $this->personModel = $this->model('Person');
    }

    /**
     * @return phones in an array redirected to the view
     */

    public function index()
    {
        $phones = $this->phoneModel->get_phones();
        $data = [
            'phones' => $phones
        ];
        $this->view('phones/index', $data);
    }

    /**
     * add a phone number and assign it to someone
     */

    public function add($name = 0)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);
            $data = [
                'number' => $_POST['number'],
                'description' => $_POST['description'],
                'p_id' => $_POST['p_id'],
                'number_err' => '',
                'description_err' => '',
                'p_id_err' => ''
            ];

            // data validation
            if (empty($_POST['number'])) {
                $data['number_err'] = 'please insert a phone number.';
            } elseif (strip_tags($_POST['number']) !== $_POST['number']) {
                $data['number_err'] = 'Please verify the number, it should not contain special characters.';
            }
            if (empty($_POST['description'])) {
                $data['description'] = 'General';
            } elseif (strip_tags($_POST['description']) !== $_POST['description']) {
                $data['description_err'] = 'Please verify the description, it should not contain special characters.';
            }
            if ($_POST['p_id'] == 0) {
                $data['p_id_err'] = 'please select a person.';
            }
            if (empty($data['number_err']) && empty($data['description_err']) && empty($data['p_id_err'])) {
                if ($this->phoneModel->add_phone($data)) {
                    flash('msg', 'phone number is added to your database.');
                    redirect_to('persons/show/' . $data['p_id']);
                } else {
                    flash('msg', '<p>Something went wrong, please try again later.</p>', 'alert alert-danger alert-dismissible fade show');
                    redirect_to('persons/show/' . $data['p_id']);
                }
            } else {
                $persons = $this->personModel->getPersons(null, null);
                $data['persons'] = $persons;
                $this->view('phones/add', $data);
            }
        } else {
            $person = $this->personModel->get_person_by_id_edit($name);
            if ($person) {
                $p_id = $name;
            } else {
                $p_id = 0;
            }
            $persons = $this->personModel->getPersons(null, null);
            $data = [
                'number' => '',
                'description' => '',
                'persons' => $persons,
                'p_id' => $p_id
            ];
            $this->view('phones/add', $data);
        }
    }

    /**
     * edite a phone number
     * @param $id
     * return ()
     */

    public function edit($id = 0)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
            } elseif (strip_tags(trim($_POST['number'])) !== $_POST['number']) {
                $data['number_err'] = 'Please verify the number, it should not contain special characters.';
            }
            if (empty($_POST['description'])) {
                $data['description'] = 'General';
            } elseif (strip_tags(trim($_POST['description'])) !== $_POST['description']) {
                $data['description_err'] = 'Please verify the description, it should not contain special characters.';
            }
            if ($_POST['p_id'] == 0) {
                $data['p_id_err'] = 'please select a person.';
            }

            //check for errors
            if (empty($data['number_err']) && empty($data['description_err']) && empty($data['p_id_err'])) {
                if ($this->phoneModel->update_phone($data)) {
                    $phone = $this->phoneModel->get_phone_by_id($id);
                    $data = [
                        'id' => $phone->id,
                        'number' => $phone->number,
                        'description' => $phone->description,
                        'p_id' => $phone->p_id,
                        'first_name' => $phone->first_name,
                        'last_name' => $phone->last_name,
                    ];
                    $msg = '<p>Phone number is updated.</p>
                    <p>it is now: <a href="' . URLROOT . '/phones/show/' . $phone->id . '" class="alert-link">' . $phone->number . ',</a>  and it belongs to <a href="' . URLROOT . '/persons/show/' . $phone->p_id . '" class="alert-link">' . $phone->first_name . ' ' . $phone->last_name . '</a>.</p>';
                    flash(
                        'msg',
                        $msg
                    );
                    redirect_to('/persons/show/' . $phone->p_id);
                } else {
                    flash('msg', 'Something went wrong, please try again later.');
                    $persons = $this->personModel->getPersons(null, null);
                    $phone = $this->phoneModel->get_phone_by_id($data['id']);
                    $data = ['persons' => $persons, 'first_name' => $phone->first_name, 'last_name' => $phone->last_name];
                    $this->view('phones/edit/' . $id, $data);
                }
                //load the view with the errors
            } else {
                $persons = $this->personModel->getPersons(null, null);
                $data['persons'] = $persons;
                $this->view('phones/edit/' . $data['id'], $data);
            }
        } else {
            $phone = $this->phoneModel->get_phone_by_id($id);
            if ($phone) {
                $persons = $this->personModel->getPersons(null, null);
                $data = [
                    'id' => $phone->id,
                    'number' => $phone->number,
                    'description' => $phone->description,
                    'p_id' => $phone->p_id,
                    'first_name' => $phone->first_name,
                    'last_name' => $phone->last_name,
                    'persons' => $persons
                ];
                $this->view('phones/edit', $data);
            } else {
                $msg = "you are trying to edit none existing phone number, please check the <a href=" . URLROOT . "/phones\"  class=\"alert-link\">phones</a> page to access the desured number, or find the person from <a href=" . URLROOT . "/persons\" class=\"alert-link\"> people </a> page.";
                flash('msg', $msg);
                redirect_to('pages/notfound');
            }
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
            redirect_to('pages/notFound');
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
                redirect_to('persons/show/' . $phone->p_id);
            } else {
                flash('msg', 'something went wrong, please try again or contact support.', 'alert alert-danger alert-dismissible fade show');
                redirect_to('phones/show/' . $phone->p_id);
            }
        }
    }


    public function delete_from_user($id, $p_id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $phone = $this->phoneModel->get_phone_by_id($id);
            if ($phone) {
                if (!islogged()) {
                    redirect_to('persons/show/' . $phone->p_id);
                }
                if ($this->phoneModel->delete_phone($id)) {
                    $msg = "phone number is Removed from your data base.";
                    flash('msg',);
                    redirect_to("persons/show/$p_id");
                }
            }
        }
    }
}
