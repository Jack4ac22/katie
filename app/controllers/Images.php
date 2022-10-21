<?php
class Images extends Controller
{

    public function __construct()
    {
        if (!islogged()) {
            redirect_to('');
        }
        $this->imageModel = $this->model('Image');
        $this->personModel = $this->model('Person');
    }


    /**
     * return all the pictures with their related data.
     */
    public function index()
    {
        $images = $this->imageModel->get_all();
        $people = $this->personModel->getPersons(null, null);
        $data = [
            'images' => $images,
            'persons' => $people
        ];
        $this->view('images/index', $data);
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
                redirect_to('images/upload/' . $p_id);
            } else {


                // Limit the file type
                $extension = array_search($_FILES['img']['type'], array(
                    '.jpg' => 'image/jpeg',
                    '.png' => 'image/png',
                    '.gif' => 'image/gif'
                ));

                if ($extension === false) {
                    flash('msg', '<p>File must be an image.</p>');
                    redirect_to('images/upload/' . $_POST['p_id']);
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
                        // echo '<pre>' . var_export($data, true) . '</pre>';

                        if ($this->imageModel->add_current_img($data)) {
                            flash('msg', '<p>Image uploaded.</p><p>you can upload another picture or <a href="' . URLROOT . '/persons/show/' . $data['p_id'] . '" class="alert-link">you can use this link to check the profile</a>.</p>');
                            redirect_to('images/upload/' . $data['p_id']);
                        }
                    } else
                        echo 'Problem uploading the file!';
                }
            }
        } else {
            $persons = $this->personModel->getPersons(null, null);
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
                $this->view('images/upload', $data);
            } else {
                flash('msg', '<p>something went wrong, please try again later.</p>');
                redirect_to('images/add/');
            }
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
                'comment' => $_POST['comment'],
                'p_id' => $_POST['p_id'],
                'id' => $id,
                'comment_err' => '',
                'p_id_err' => ''
            ];
            // data validation
            if (strip_tags(trim($_POST['comment'])) !== $_POST['comment']) {
                $data['comment-err'] = 'Please verify the comment, it should not contain special characters.';
            };


            if ($_POST['p_id'] == 0) {
                $data['number_err'] = 'please chose a person.';
            }

            //check for errors
            if (empty($data['comment_err']) && empty($data['p_id_err'])) {
                if ($this->imageModel->update_image($data)) {
                    $image = $this->imageModel->get_image_by_id($id);
                    $data = [
                        'id' => $image->id,
                        'comment' => $image->comment,
                        'p_id' => $image->p_id,
                        'uploaded_at' => $image->uploaded_at,
                    ];
                    $msg = "<p>Image is updated.</p>
                    You can check the <a href=" . URLROOT . "/images/show/$image->id\"  class=\"alert-link\">image</a> or the profile of <a href=" . URLROOT . "/persons/show/$image->p_id\" class=\"alert-link\">$image->first_name $image->last_name</a> which it belongs to.";
                    flash(
                        'msg',
                        $msg
                    );
                    redirect_to('persons/show' . $id);
                } else {
                    flash('msg', 'Something went wrong, please try again later.');
                    $persons = $this->personModel->getPersons(null, null);
                    $data = ['persons' => $persons];
                    $this->view('persons/edit/' . $id, $data);
                }
                //load the view with the errors
            } else {
                $persons = $this->personModel->getPersons(null, null);
                $data['persons'] = $persons;
                $this->view('persons/edit/' . $data['id'], $data);
            }
        } else {
            $image = $this->imageModel->get_image_by_id($id);
            if ($image) {
                $persons = $this->personModel->getPersons(null, null);
                $data = [
                    'id' => $image->id,
                    'img_path' => $image->img_path,
                    'comment' => $image->comment,
                    'p_id' => $image->p_id,
                    'uploaded_at' => $image->uploaded_at,
                    'persons' => $persons
                ];
                $this->view('images/edit', $data);
            } else {
                $msg = "you are trying to edit none existing phone number, please check the <a href=" . URLROOT . "/phones\"  class=\"alert-link\">phones</a> page to access the desured number, or find the person from <a href=" . URLROOT . "/persons\" class=\"alert-link\"> people </a> page.";
                flash('msg', $msg);
                redirect_to('/pages/notfound');
            }
        }
    }

    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $img = $this->imageModel->get_image_by_id($id);
            if (!islogged()) {
                redirect_to('/');
            }
            if ($this->imageModel->delete_image($id)) {
                flash('msg', '<p>The image was removed from your database and files system.</p>');
                redirect_to('persons/show/' . $img->p_id);
            } else {
                flash('msg', '<p>please try again later, something went wrong.</p>', 'alert alert-danger alert-dismissible fade show');
                redirect_to('persons/show/' . $img->p_id);
            }
        }
    }

    public function set($id = null)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $img = $this->imageModel->get_image_by_id($id);
            if ($img) {
                if ($this->imageModel->set_profile($img->p_id, $img->img_path)) {
                    flash('msg', '<p>The profile picture was updated for the user.</p>');
                    redirect_to('persons/show/' . $img->p_id);
                } else {
                    flash('msg', '<p>something went wron, please try again later.</p>', 'alert alert-danger alert-dismissible fade show');
                    redirect_to('persons/show/' . $img->p_id);
                }
            }
        }
    }

    public function show($id)
    {
        $image = $this->imageModel->get_image_by_id($id);
        if ($image) {
            $data = ['image' => $image];
            $this->view('images/show', $data);
        } else {
            flash('msg', '<p>the page which you requested does not exist, try to use other method.</p>', 'alert alert-danger alert-dismissible fade show');
            redirect_to('/pages/notFound');
        }
    }
}
