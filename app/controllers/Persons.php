<?php
class Persons extends Controller
{
    public function __construct()
    {
        //redirect to home if not logged in
        if (!islogged()) {
            redirect_to('');
        }
        $this->personModel = $this->model('Person');
    }


    /**
     * call getpersons() function
     * return index view WITH all the people.
     */
    public function index($search = null, $order = null)
    {
        $search = $_GET['search'] ?? null;
        $persons = $this->personModel->getPersons($search, $order);

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

                    flash('msg', '<p>' . $data['first_name'] . ' is added.</p> <a href="' . URLROOT . '/persons/show/' . $new_id . '" class="alert-link">you can use this link to complete the profile</a>');
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

    public function show($id = null)
    {
        $person = $this->personModel->get_person_by_id($id);
        if ($person['person']) {
            $data = ['person' => $person];
            $this->view('persons/show', $data);
        } else {
            flash('msg', '<p>the page which you requested does not exist, try to use other method</p>');
            redirect_to('/pages/notFound');
        }
    }


    /**
     *  edit a new person
     * call the form and process it
     */

    public function edit($id = null)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);
            $data = [
                'id' => $id,
                'first_name' => trim($_POST['first_name']),
                'last_name' => trim($_POST['last_name']),
                'sex' =>  trim($_POST['sex']),
                'email' => trim($_POST['email']),
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
            } elseif ($this->personModel->email_update($data['email'])) {
                $data['email_error'] = 'This email address is already used';
            };

            #gender
            if (!isset($_POST['sex'])) {
                $data['sex_error'] = 'Gender is required';
            }


            if (empty($data['first_name_error']) && empty($data['last_name_error']) && empty($data['sex_error']) && empty($data['email_error'])) {
                if ($this->personModel->edit_person($data)) {
                    flash('msg', '<p>Updated successfuly.');
                    redirect_to('persons/show/' . $data['id']);
                } else {

                    flash('msg', 'Something went wrong, plese try again later.');
                    $this->view('persons/edite/' . $data['id'], $data);
                }
            } else {
                $this->view('/persons/edit', $data);
            }
        } else {
            $person = $this->personModel->get_person_by_id_edit($id);
            if ($person) {
                $data = [
                    'id' => $person->id,
                    'first_name' => $person->first_name,
                    'last_name' => $person->last_name,
                    'email' => $person->email,
                    'sex' => $person->sex
                ];
                $this->view('persons/edit', $data);
            } else {
                flash('msg', '<p>the page which you requested does not exist, try to use other method</p>');
                redirect_to('/pages/notFound');
            }
        }
    }

    /**
     * upload pic
     * 
     */
    public function upload($p_id = null)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'p_id' => $_POST['p_id'],
                'img_src' => '',
                'comment' => $_POST['comment'],
                'p_id_err' => '',
                'img_src_err' => '',
                'comment_err' => ''
            ];


            // Is there some errors ? (disconnected, file too big...)
            if ((isset($_FILES['img']['error'])) && ($_FILES['img']['error']) != UPLOAD_ERR_OK) {
                flash('msg', '<p>Error during upload, try again later.</p>');
                redirect_to('persons/upload/' . $p_id);
            } else {


                // Limit the file type
                $extension = array_search($_FILES['img']['type'], array(
                    '.jpg' => 'image/jpeg',
                    '.png' => 'image/png',
                    '.gif' => 'image/gif'
                ));

                if ($extension === false) {
                    flash('msg', '<p>File must be an image.</p>');
                    redirect_to('persons/upload/' . $_POST['p_id']);
                } else {
                    $fileName = time() . '-' . $_POST['p_id'];

                    $filePath = PUBLICROOT .  "/imgs/$fileName$extension";

                    if (move_uploaded_file($_FILES['img']['tmp_name'], $filePath)) {
                        $data = [
                            'img_name' => $fileName . $extension,
                            'img_path' => $filePath,
                            'comment' => $_POST['comment'],
                            'p_id' => $_POST['p_id']
                        ];
                        echo '<pre>' . var_export($data, true) . '</pre>';

                        if ($this->personModel->add_current_img($data)) {
                            flash('msg', '<p>Image uploaded.</p><p>you can upload another picture or <a href="' . URLROOT . '/persons/show/' . $data['p_id'] . '" class="alert-link">you can use this link to check the profile</a>.</p>');
                            redirect_to('persons/upload/' . $data['p_id']);
                        }
                    } else
                        echo 'Problem uploading the file!';
                }
            }
        } else {
            $persons = $this->personModel->getPersons();
            if ($persons) {
                if ($p_id) {
                    $data = [
                        'persons' => $persons,
                        'p_id' => $p_id,
                        'comment' => '',
                        'img_src' => ''
                    ];
                } else {
                    $data = [
                        'persons' => $persons,
                        'comment' => ''
                    ];
                }
                $this->view('persons/upload', $data);
            } else {
                flash('msg', '<p>something went wrong, please try again later.</p>');
                redirect_to('persons/add/');
            }
        }
    }


    /**
     * delete a person from the data base. 
     */
    public function delete_person($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Execute
            $person = $this->personModel->get_person_by_id_edit($id);
            if ($person) {
                if ($this->personModel->delete_person($id)) {
                    // Redirect to login
                    flash('msg', $person->first_name . ' ' . $person->last_name . ' was deleted.');
                    redirect_to('persons');
                }
            } else {
                flash('msg', 'Delete oreder was not complished.');
                redirect_to('persons');
            }
        } else {
            redirect_to('persons');
        }
    }
}
