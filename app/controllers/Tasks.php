<?php
class Tasks extends Controller
{
    public function __construct()
    {
        if (!islogged()) {
            flash('msg', '<p>you do not have permission to see this data, please login.</p>', 'alert alert-danger alert-dismissible fade show');
            redirect_to('users/login');
        }
        $this->taskModel = $this->model('Task');
        $this->personModel = $this->model('Person');
    }

    /**
     * index()
     */
    public function index($search = null)
    {
        $search = $_GET['search'] ?? null;

        $tasks = $this->taskModel->get_all_tasks($search);
        $data = [
            'tasks' => $tasks
        ];
        $this->view('tasks/index', $data);
    }

    /**
     * add a task
     */
    public function add($name = 0)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);
            $data = [
                'd_date' => $_POST['d_date'] ?? null,
                'p_id' => $_POST['p_id'],
                'title' => $_POST['title'],
                'text' => $_POST['text'],
                'd_date_err' => '',
                'p_id_err' => '',
                'title_err' => '',
                'text_err' => ''
            ];

            if ($_POST['p_id'] == 0) {
                $data['p_id_err'] = 'please select a person.';
            }


            if (empty($_POST['title'])) {
                $data['title_err'] = 'please enter a title for your task.';
            }


            if (empty($data['text'])) {
                $data['text_err'] = 'Please enter text';
            } elseif (strip_tags($_POST['text']) !== $_POST['text']) {
                $data['text_err'] = 'Please verify the text, it should not contain special characters.';
            }


            if ((empty($data['p_id_err'])) && (empty($data['title_err'])) && (empty($data['text_err']))) {
                if ($this->taskModel->add_task($data)) {
                    $person = $this->personModel->get_person_by_id_edit($data['p_id']);
                    flash('msg', '<p>New task added to ' . $person->first_name . ' ' . $person->last_name . '.</p>');
                    redirect_to('persons/show/' . $data['p_id']);
                }
            } else {
                $persons = $this->personModel->getPersons(null, null);
                $data['persons'] = $persons;
                $this->view('tasks/add', $data);
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
                'title' => '',
                'text' => '',
                'persons' => $persons,
                'p_id' => $p_id,
                'd_date' => Null
            ];
            $this->view('tasks/add', $data);
        }
    }

    /**
     * edit task
     * @param id
     *
     **/

    public function edit($id = 0)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);
            $data = [
                'p_id' => $_POST['p_id'],
                'title' => $_POST['title'],
                'text' => htmlspecialchars($_POST['text']),
                'id' => $id,
                'd_date' => $_POST['d_date'] ?? Null,
                'd_date_err' => '',
                'p_id_err' => '',
                'title_err' => '',
                'text_err' => ''
            ];

            if ($_POST['p_id'] == 0) {
                $data['p_id_err'] = 'please select a person.';
            }

            if (empty($_POST['title'])) {
                $data['title_err'] = 'please enter a title for your task.';
            }

            if (empty($_POST['text'])) {
                $data['text_err'] = 'please enter some text for your task.';
            }


            if ((empty($data['p_id_err'])) && (empty($data['title_err'])) && (empty($data['text_err']))) {
                if ($this->taskModel->update_task($data)) {
                    $task = $this->taskModel->get_task_by_id($id);

                    $msg = '<p>The task was updated.</p>
                    <p>it is titled now: ' .
                        '<a href="' . URLROOT . '/tasks/show/' . $task->id . '"  class="alert-link">' . $task->title . '</a>
                      and it belongs to 
                      <a href="' . URLROOT . '/persons/show/' . $task->p_id . '" class="alert-link">' . $task->first_name . ' ' . $task->last_name . '</a>
                      </p>';
                    flash('msg', $msg);
                    redirect_to('persons/show/' . $data['p_id']);
                } else {
                    flash('msg', 'Something went wrong, please try again later.');
                    $persons = $this->personModel->getPersons(null, null);
                    $task = $this->taskModel->get_task_by_id($data['id']);
                    $data = [
                        'persons' => $persons,
                        'first_name' => $task->first_name,
                        'last_name' => $task->last_name
                    ];
                    $this->view('tasks/edit/' . $id, $data);
                }
            } else {
                $persons = $this->personModel->getPersons(null, null);
                $data['persons'] = $persons;
                $this->view('tasks/edit', $data);
            }
        } else {
            $task = $this->taskModel->get_task_by_id($id);
            if ($task) {
                $persons = $this->personModel->getPersons(null, null);
                $data = [
                    'id' => $task->id,
                    'd_date' => $task->d_date ?? Null,
                    'p_id' => $task->p_id,
                    'title' => $task->title,
                    'text' => $task->text,
                    'first_name' => $task->first_name,
                    'last_name' => $task->last_name,
                    'persons' => $persons
                ];
                $this->view('tasks/edit', $data);
            } else {
                $msg = "<p>you are trying to edit none existing phone number</p> <p>please check the <a href=" . URLROOT . "/tasks\"  class=\"alert-link\">tasks</a> page to access the desured number, or find the person from <a href=" . URLROOT . "/persons\" class=\"alert-link\"> people </a> page.</p>";
                flash('msg', $msg);
                redirect_to('pages/notfound');
            }
        }
    }

    public function show($id)
    {
        $task = $this->taskModel->get_task_by_id($id);
        if ($task) {
            $data = ['task' => $task];
            $this->view('tasks/show', $data);
        } else {
            flash('msg', '<p>the page which you requested does not exist, try to use other method</p>', 'aler alert-danger');
            redirect_to('pages/notFound');
        }
    }

    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $task = $this->taskModel->get_task_by_id($id);
            if (!islogged()) {
                redirect_to('tasks');
            }
            if ($this->taskModel->delete_task($id)) {
                flash('msg', '<p>The task was removed from your database.</p>
                <p> you can check <a href="' . URLROOT . '/tasks' . '" class="alert-link">all tasks</a> page or <a href="' . URLROOT . '/persosns/show/' . $task->p_id . '" class="alert-link"> ' . $task->first_name . ' ' . $task->last_name . '</a> personal page.</p>');
                redirect_to('persons/show/' . $task->p_id);
            } else {
                flash('msg', 'something went wrong, please try again or contact support.', 'alert alert-danger alert-dismissible fade show');
                redirect_to('tasks/show/' . $task->id);
            }
        }
    }
    public function hide($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $task = $this->taskModel->get_task_by_id($id);
            if (!islogged()) {
                redirect_to('tasks');
            }
            if ($this->taskModel->hide_task($id)) {
                flash('msg', '<p>The task was removed from your database.</p>
                <p> you can check <a href="' . URLROOT . '/tasks' . '" class="alert-link">all tasks</a> page or <a href="' . URLROOT . '/persosns/show/' . $task->p_id . '" class="alert-link"> ' . $task->first_name . ' ' . $task->last_name . '</a> personal page.</p>');
                redirect_to('persons/show/' . $task->p_id);
            } else {
                flash('msg', 'something went wrong, please try again or contact support.', 'alert alert-danger alert-dismissible fade show');
                redirect_to('tasks/show/' . $task->id);
            }
        }
    }
    public function show_person($id)
    {
        $person = $this->personModel->get_person_by_id_edit($id);
        if ($person) {
            $tasks = $this->taskModel->get_all_tasks_for_id($id);
            $data = ['task' => $tasks];
            $this->view('tasks/show_person', $data);
        } else {
            flash('msg', '<p>the page which you requested does not exist, try to use other method</p>', 'aler alert-danger');
            redirect_to('pages/notFound');
        }
    }
}
