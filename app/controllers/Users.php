<?php
class Users extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('User');
        $this->timezoneModel = $this->model('Timezone');
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
                    flash('msg', 'new user is added');
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
            } elseif (strlen($data['user_name']) < 4) {
                $data['user_name_error'] = 'Username should be at least 4 characters.';
            };
            //password
            if (empty($data['password'])) {
                $data['password_error'] = 'password is required.';
            };
            //check if the user_name exist in the database
            if ($this->userModel->findUserByUserName($data['user_name'])) {
            } else {
                $data['user_name_error'] = 'Username was not found.';
            }
            //check the errors
            if (empty($data['user_name_error']) && empty($data['password_error'])) {
                //validates
                //check the data 
                $logedin_user = $this->userModel->login($data['user_name'], $data['password']);
                if ($logedin_user) {
                    
                    //creat session
                    $this->creat_user_session($logedin_user);
                } else {
                    $data['password_error'] = 'password is incorrect.';
                    $this->view('users/login', $data);
                }
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


    /**
     * creat_user_session()
     * @param user
     * @return creating session variables
     */

    public function creat_user_session($user)
    {
        $timezone = $this->userModel->get_time_zone($user->id);
        $_SESSION['timezone'] = $timezone->timezone;
        $_SESSION['timezone_id'] = $timezone->id;
        $_SESSION['gmt_offset'] = $timezone->gmt_offset;
        $_SESSION['dst_offset'] = $timezone->dst_offset;
        $_SESSION['raw_offset'] = $timezone->raw_offset;
        $_SESSION['w_dts'] = $timezone->w_dts;
        $_SESSION['s_dts'] = $timezone->s_dts;
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_user_name'] = $user->user_name;
        redirect_to('persons/index');
    }


    /**
     * logout()
     * redirect to home
     */

    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_user_name']);
        redirect_to('users/login');
    }

    public function change_t($id = 0)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);
            $data = [
                'user_id' => $id,
                't_id' => $_POST['t_id'],
                't_id_err' => ''
            ];
            // data validation
            if ((empty($_POST['t_id'])) || ($_POST['t_id'] == 0) || ($_POST['t_id']) == NULL) {
                $data['t_id_err'] = 'please pick a title.';
            }

            //check for errors
            if (empty($data['t_id_err'])) {

                if ($this->userModel->change_current_timezone($data)) {
                    $timezone = $this->userModel->get_time_zone($data['user_id']);
                    $_SESSION['timezone'] = $timezone->timezone;
                    $_SESSION['timezone_id'] = $timezone->id;
                    $_SESSION['gmt_offset'] = $timezone->gmt_offset;
                    $_SESSION['dst_offset'] = $timezone->dst_offset;
                    $_SESSION['raw_offset'] = $timezone->raw_offset;
                    $_SESSION['w_dts'] = $timezone->w_dts;
                    $_SESSION['s_dts'] = $timezone->s_dts;
                    // add current timezone data to the $_SESION
                    flash('msg', '<p>The current time zone was updated.</p>');
                    redirect_to('');
                } else {
                    flash('msg', 'Something went wrong, please try again later.');
                    $this->view('users/change_t', $data);
                }
                //load the view with the errors
            } else {
                redirect_to('/users/change_t/' . $id);
            }
        } else {
            $user = $this->userModel->get_user_data($id);
            if ($user) {
                $timezones = $this->timezoneModel->get_timezones();
                $data = [
                    't_id' => $user->current_t,
                    'user_id' => $user->id,
                    't_id_err' => '',
                    'user_id_err' => '',
                    'timezones' => $timezones
                ];
                $this->view('users/change_t', $data);
            } else {
                $msg = "<p>We could not retrive certain data, it might be because of connection error, please try again later.</p>";
                flash('msg', $msg, 'alert alert-danger alert-dismissible fade show');
                redirect_to("");
            }
        }
    }
}
