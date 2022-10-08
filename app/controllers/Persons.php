<?php
class Persons extends Controller
{
    public function __construct()
    {
        //redirect to home if not logged in
        if (!islogged()) {
            redirect_to('');
        }
        $this->personModel = $this->model('person');
    }


    /**
     * call getpersons() function
     * return index view WITH all the people.
     */
    public function index()
    {
        $persons = $this->personModel->getPersons();

        $data = ['persons' => $persons];
        $this->view('persons/index', $data);
    }


    /**
     *  create a new person
     * call the form and process it
     */

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //sanitize the form informations.
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);
            if (!isset($_POST['sex'])) {
                $gender = '';
            } else {
                $gender = $_POST['sex'];
            }
            $data = [
                'first_name' => trim($_POST['first_name']),
                'last_name' => trim($_POST['last_name']),
                'sex' =>  $gender,
                'email' => trim($_POST['email']),
                'added_by' => $_SESSION['user_id'],
                'first_name_error' => '',
                'last_name_error' => '',
                'sex_error' => '',
                'email_error' => ''
            ];
            //validation
            #first_name
            if (empty($data['first_name'])) {
                $data['first_name_error'] = 'First name is required.';
            } elseif (strip_tags(trim($_POST['first_name'])) !== $_POST['first_name']) {
                $data['first_name_error'] = 'Please verify the name, it should not contain special characters.';
            };

            #last_name
            if (empty($data['last_name'])) {
                $data['last_name_error'] = 'Last name is required.';
            } elseif (strip_tags(trim($_POST['last_name'])) !== $_POST['last_name']) {
                $data['last_name_error'] = 'Please verify the name, it should not contain special characters.';
            };

            #email
            if (empty($data['email'])) {
                $data['email_error'] = 'Email is required.';
            } elseif (strip_tags(trim($_POST['email'])) !== $_POST['email']) {
                $data['email_error'] = 'Please verify the name, it should not contain special characters.';
            } elseif ($this->personModel->getPersonByEmail($data['email'])) {
                $data['email_error'] = 'This email address is already used';
            };

            #gender
            if (!isset($_POST['sex'])) {
                $data['sex_error'] = 'Gender is required';
            }

            if (empty($data['first_name_error']) && empty($data['last_name_error']) && empty($data['sex_error']) && empty($data['email_error'])) {

                if ($this->personModel->add_person($data)) {
                    $new_id = $this->personModel->get_the_last($data['email'])->id;

                    flash('person_add', '<p>' . $data['first_name'] . ' is added.</p> <a href="' . URLROOT . '/persons/show/' . $new_id . '" class="alert-link">you can use this link to complete the profile</a>');
                    redirect_to('/persons/index');
                }
            } else {
                //load the view with errors
                $this->view('persons/add', $data);
            }
        } else {
            $data = ['first_name' => '', 'last_name' => '', 'sex' => '', 'email' => ''];
            $this->view('persons/add', $data);
        }
    }

    /**
     * show($id)
     * @param $id of the person
     * @return user or redirect
     */

    public function show($id)
    {
        $person = $this->personModel->get_person_by_id($id);
        if ($person) {
            $data = ['person' => $person];
            $this->view('persons/show', $data);
        } else {
            return false;
            flash('404', '<p>the page which you requested does not exist, try to use other method</p> <a href="' . URLROOT . '/" class="alert-link">get to the home page.</a>');
            redirect_to('pages/notFound');
        }
    }
}
