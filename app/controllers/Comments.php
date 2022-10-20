<?php
class Comments extends Controller
{
    public function __construct()
    {
        if (!islogged()) {
            flash('msg', '<p>you do not have permission to see this data, please login.</p>', 'alert alert-danger');
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
                $data['number_err'] = 'please chose a person.';

                if (empty($_POST['title'])) {
                    $data['title_err'] = 'please enter a title for your comment.';
                }

                if (empty($_POST['text'])) {
                    $data['text_err'] = 'please enter some text for your comment.';
                }

                if ((empty($data['p_id_err'])) && (empty($data['value_err'])) && (empty($data['title_err'])) && (empty($data['text_err']))) {
                    if ($this->commentModel->add_comment($data)) {
                        $person = $this->personModel->get_person_by_id_edit($data['p_id']);
                        flash('msg', '<p>New comment added to ' . $person->first_name . ' ' . $person->last_name . '.</p>');
                        redirect_to('persons/show/' . $data['p_id']);
                    }
                } else {
                    $persons = $this->personModel->getPersons();
                    $data['persons'] = $persons;
                    $this->view('comments/add', $data);
                }
            }
        } else {
            $persons = $this->personModel->getPersons();
            $data = [
                'p_id' => $name,
                'value' => '',
                'title' => '',
                'text' => '',
                'persons' => $persons
            ];
            $this->view('comments/add', $data);
        }
    }
}
