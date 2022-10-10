<?php
class Phones extends Controller
{
    public function __construct()
    {
        if (!islogged()) {
            flash('msg', 'you do not have permission to see this data, please login.');
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

    public function add()
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
            } elseif (!is_numeric($_POST['number'])) {
                $data['number_err'] = 'Phone number is a number.';
            }
            if (empty($_POST['description'])) {
                $data['description'] = 'General';
            }
            if ($_POST['p_id'] == 0) {
                $data['number_err'] = 'please chose a person.';
            }
            if (empty($data['number_err']) && empty($data['description_err']) && empty($data['p_id_err'])) {
                if ($this->phoneModel->add_phone($data)) {
                    flash('msg', 'phone number is added');
                    redirect_to('phones');
                } else {
                    flash('msg', 'Something went wrong, please try again later.');
                    redirect_to('phones');
                }
            } else {
                $persons = $this->personModel->getPersons();
                $data['persons'] = $persons;
                $this->view('phones/add', $data);
            }
        } else
            $persons = $this->personModel->getPersons();
        $data = [
            'number' => '',
            'description' => '',
            'persons' => $persons
        ];
        $this->view('phones/add', $data);
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
                flash('msg', 'phone number is Removed.');
                redirect_to('phones');
            }
        }
    }
}