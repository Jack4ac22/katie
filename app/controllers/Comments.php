<?php
class Comments extends Controller
{
    public function __construct()
    {
        if (!islogged()) {
            flash('msg', '<p>you do not have permission to see this data, please login.</p>', 'alert alert-danger alert-dismissible fade show');
            redirect_to('users/login');
        }
        $this->commentModel = $this->model('Comment');
        $this->personModel = $this->model('Person');
    }

    /**
     * index()
     */
    public function index($search = null)
    {
        $search = $_GET['search'] ?? null;

        $comments = $this->commentModel->get_all_comments($search);
        $data = [
            'comments' => $comments
        ];
        $this->view('comments/index', $data);
    }

    /**
     * add a comment
     */
    public function add($name = 0)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);
            $data = [
                'p_id' => $_POST['p_id'],
                'value' => $_POST['value'],
                'title' => $_POST['title'],
                'text' => $_POST['text'],
                'p_id_err' => '',
                'value_err' => '',
                'title_err' => '',
                'text_err' => ''
            ];

            if ($_POST['p_id'] == 0) {
                $data['p_id_err'] = 'please select a person.';
            }

            if ($_POST['value'] == 0) {
                $data['value_err'] = 'please select a person.';
            }

            if (empty($_POST['title'])) {
                $data['title_err'] = 'please enter a title for your comment.';
            }


            if (empty($data['text'])) {
                $data['text_err'] = 'Please enter text';
            } elseif (strip_tags($_POST['text']) !== $_POST['text']) {
                $data['text_err'] = 'Please verify the text, it should not contain special characters.';
            }


            if ((empty($data['p_id_err'])) && (empty($data['value_err'])) && (empty($data['title_err'])) && (empty($data['text_err']))) {
                if ($this->commentModel->add_comment($data)) {
                    $person = $this->personModel->get_person_by_id_edit($data['p_id']);
                    flash('msg', '<p>New comment added to ' . $person->first_name . ' ' . $person->last_name . '.</p>');
                    redirect_to('persons/show/' . $data['p_id']);
                }
            } else {
                $persons = $this->personModel->getPersons(null, null);
                $data['persons'] = $persons;
                $this->view('comments/add', $data);
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
                'value' => '',
                'title' => '',
                'text' => '',
                'persons' => $persons,
                'p_id' => $p_id
            ];
            $this->view('comments/add', $data);
        }
    }

    /**
     * edit comment
     * @param id
     *
     **/

    public function edit($id = 0)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);
            $data = [
                'p_id' => $_POST['p_id'],
                'value' => $_POST['value'],
                'title' => $_POST['title'],
                'text' => htmlspecialchars($_POST['text']),
                'id' => $id,
                'p_id_err' => '',
                'value_err' => '',
                'title_err' => '',
                'text_err' => ''
            ];

            if ($_POST['p_id'] == 0) {
                $data['p_id_err'] = 'please select a person.';
            }

            if ($_POST['value'] == 0) {
                $data['value_err'] = 'please select a value.';
            }

            if (empty($_POST['title'])) {
                $data['title_err'] = 'please enter a title for your comment.';
            }

            if (empty($_POST['text'])) {
                $data['text_err'] = 'please enter some text for your comment.';
            }


            if ((empty($data['p_id_err'])) && (empty($data['value_err'])) && (empty($data['title_err'])) && (empty($data['text_err']))) {
                if ($this->commentModel->update_comment($data)) {
                    $comment = $this->commentModel->get_comment_by_id($id);

                    $msg = '<p>The comment was updated.</p>
                    <p>it is titled now: ' .
                        '<a href="' . URLROOT . '/comments/show/' . $comment->id . '"  class="alert-link">' . $comment->title . '</a>
                      and it belongs to 
                      <a href="' . URLROOT . '/persons/show/' . $comment->p_id . '" class="alert-link">' . $comment->first_name . ' ' . $comment->last_name . '</a>
                      </p>';
                    flash('msg', $msg);
                    redirect_to('persons/show/' . $data['p_id']);
                } else {
                    flash('msg', 'Something went wrong, please try again later.');
                    $persons = $this->personModel->getPersons(null, null);
                    $comment = $this->commentModel->get_comment_by_id($data['id']);
                    $data = [
                        'persons' => $persons,
                        'first_name' => $comment->first_name,
                        'last_name' => $comment->last_name
                    ];
                    $this->view('comments/edit/' . $id, $data);
                }
            } else {
                $persons = $this->personModel->getPersons(null, null);
                $data['persons'] = $persons;
                $this->view('comments/edit', $data);
            }
        } else {
            $comment = $this->commentModel->get_comment_by_id($id);
            if ($comment) {
                $persons = $this->personModel->getPersons(null, null);
                $data = [
                    'id' => $comment->id,
                    'p_id' => $comment->p_id,
                    'title' => $comment->title,
                    'text' => $comment->text,
                    'value' => $comment->value,
                    'first_name' => $comment->first_name,
                    'last_name' => $comment->last_name,
                    'persons' => $persons
                ];
                $this->view('comments/edit', $data);
            } else {
                $msg = "<p>you are trying to edit none existing phone number</p> <p>please check the <a href=" . URLROOT . "/comments\"  class=\"alert-link\">comments</a> page to access the desured number, or find the person from <a href=" . URLROOT . "/persons\" class=\"alert-link\"> people </a> page.</p>";
                flash('msg', $msg);
                redirect_to('pages/notfound');
            }
        }
    }

    public function show($id)
    {
        $comment = $this->commentModel->get_comment_by_id($id);
        if ($comment) {
            $data = ['comment' => $comment];
            $this->view('comments/show', $data);
        } else {
            flash('msg', '<p>the page which you requested does not exist, try to use other method</p>', 'aler alert-danger');
            redirect_to('pages/notFound');
        }
    }

    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $comment = $this->commentModel->get_comment_by_id($id);
            if (!islogged()) {
                redirect_to('comments');
            }
            if ($this->commentModel->delete_comment($id)) {




                flash('msg', '<p>The comment was removed from your database.</p>
                <p> you can check <a href="' . URLROOT . '/comments' . '" class="alert-link">all comments</a> page or <a href="' . URLROOT . '/persosns/show/' . $comment->p_id . '" class="alert-link"> ' . $comment->first_name . ' ' . $comment->last_name . '</a> personal page.</p>');
                redirect_to('persons/show/' . $comment->p_id);
            } else {
                flash('msg', 'something went wrong, please try again or contact support.', 'alert alert-danger alert-dismissible fade show');
                redirect_to('comments/show/' . $comment->id);
            }
        }
    }
}
