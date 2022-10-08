<?php
class Users extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function index()
    {
    }

    public function register()
    {
        //checking the submition of the form
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //process the form

            $data = [
                'user_name' => trim($_POST['user_name']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'other_pass' => trim($_POST['other_pass']),
                'confirm_other_pass' => trim($_POST['confirm_other_pass']),
                'user_name_error' => '',
                'password_error' => '',
                'confirm_password_error' => '',
                'other_pass_error' => '',
                'confirm_other_pass_error' => '',
            ];

            //user_name validation
            if (empty($data['user_name'])) {
                $data['user_name_error'] = 'Username is required.';
            } elseif (strip_tags(trim($data['user_name'])) !== $data['user_name']) {
                $data['user_name_error'] = 'Username should be letters only.';
            } elseif (strlen($data['user_name']) < 4) {
                $data['user_name_error'] = 'Username should be at least 4 characters.';
            } else {
                if ($this->userModel->findUserByUserName($data['user_name'])) {
                    $data['user_name_error'] = 'Username already taken.';
                }
            };

            //password
            if (empty($data['password'])) {
                $data['password_error'] = 'password is required.';
            };

            //confirm_password
            if (empty($data['confirm_password'])) {
                $data['confirm_password_error'] = 'password confirmation is required.';
            } elseif ($data['confirm_password'] !== $data['password']) {
                $data['confirm_password_error'] = 'password confirmation does not match the inserted pass.';
            };

            //other_pass
            if (empty($data['other_pass'])) {
                $data['other_pass_error'] = 'Urgent is required.';
            } elseif ($data['other_pass'] == $data['password']) {
                $data['other_pass_error'] = 'Urgent can not match the password.';
            };

            //confirm_other_pass
            if (empty($data['confirm_other_pass'])) {
                $data['confirm_other_pass_error'] = 'Urgent confirmation is required.';
            } elseif ($data['confirm_password'] !== $data['password']) {
                $data['confirm_password_error'] = 'Urgent confirmation does not match the inserted Urgent.';
            };

            //check the errors
            if (empty($data['user_name_error']) && empty($data['password_error']) && empty($data['confirm_password_error']) && empty($data['other_pass_error']) && empty($data['confirm_other_pass_error'])) {
                //validated then hash the pass
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                $data['other_pass'] = password_hash($data['other_pass'], PASSWORD_DEFAULT);

                //register the user
                if ($this->userModel->registerUser($data)) {
                    flash('register_success', 'new user is added');
                    redirect_to('users/login');
                } else
                    die('something went wrong');
            } else {
                //load the view with errors
                $this->view('users/register', $data);
            };
        } else {
            //load the form of registration
            #intiate data
            $data = [
                'user_name' => '',
                'password' => '',
                'confirm_password' => '',
                'other_pass' => '',
                'confirm_other_pass' => '',
                'user_name_error' => '',
                'password_error' => '',
                'confirm_password_error' => '',
                'other_pass_error' => '',
                'confirm_other_pass_error' => '',
            ];
            //loading the view
            $this->view('users/register', $data);
        }
    }

    public function login()
    {
        //checking the submition of the form
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //process the form
            $data = [
                'user_name' => trim($_POST['user_name']),
                'password' => trim($_POST['password']),
                'user_name_error' => '',
                'password_error' => '',
            ];
            //user_name validation
            if (empty($data['user_name'])) {
                $data['user_name_error'] = 'Username is required.';
            } elseif (strip_tags(trim($_POST['user_name'])) !== $_POST['user_name']) {
                $data['user_name_error'] = 'Username should be letters only.';
            } elseif (strlen($data['user_name']) < 6) {
                $data['user_name_error'] = 'Username should be at least 6 characters.';
            };
            //password
            if (empty($data['password'])) {
                $data['password_error'] = 'password is required.';
            };
            //check the errors
            if (empty($data['user_name_error']) && empty($data['password_error'])) {
                //validates
                die('success');
            } else {
                //load the view with errors
                $this->view('users/login', $data);
            };
        } else {
            //load the form of registration
            #intiate data
            $data = [
                'user_name' => '',
                'password' => '',
                'user_name_error' => '',
                'password_error' => '',
            ];
            //loading the view
            $this->view('users/login', $data);
        }
    }
}
