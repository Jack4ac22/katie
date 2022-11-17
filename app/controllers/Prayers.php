<?php
class Prayers extends Controller
{
    public function __construct()
    {
        if (!islogged()) {
            flash('msg', '<p>you do not have permission to see this data, please login.</p>', 'alert alert-danger alert-dismissible fade show');
            redirect_to('users/login');
        }
        $this->prayerModel = $this->model('Prayer');
        $this->personModel = $this->model('Person');
    }

    /**
     * index()
     */
    public function index($search = null)
    {
        $search = $_GET['search'] ?? null;

        $prayers = $this->prayerModel->get_all_prayers($search);
        $data = [
            'prayers' => $prayers
        ];
        $this->view('prayers/index', $data);
    }

    /**
     * add a prayer
     */
    public function add($name = 0)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);
            $data = [
                'p_id' => $_POST['p_id'],
                'title' => $_POST['title'],
                'text' => $_POST['text'],
                'p_id_err' => '',
                'title_err' => '',
                'text_err' => ''
            ];

            if ($_POST['p_id'] == 0) {
                $data['p_id_err'] = 'please select a person.';
            }


            if (empty($_POST['title'])) {
                $data['title_err'] = 'please enter a title for your prayer.';
            }


            if (empty($data['text'])) {
                $data['text_err'] = 'Please enter text';
            } elseif (strip_tags($_POST['text']) !== $_POST['text']) {
                $data['text_err'] = 'Please verify the text, it should not contain special characters.';
            }


            if ((empty($data['p_id_err'])) && (empty($data['title_err'])) && (empty($data['text_err']))) {
                if ($this->prayerModel->add_prayer($data)) {
                    $person = $this->personModel->get_person_by_id_edit($data['p_id']);
                    flash('msg', '<p>New prayer added to ' . $person->first_name . ' ' . $person->last_name . '.</p>');
                    redirect_to('persons/show/' . $data['p_id']);
                }
            } else {
                $persons = $this->personModel->getPersons(null, null);
                $data['persons'] = $persons;
                $this->view('prayers/add', $data);
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
                'p_id' => $p_id
            ];
            $this->view('prayers/add', $data);
        }
    }

    /**
     * edit prayer
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
                'p_id_err' => '',
                'title_err' => '',
                'text_err' => ''
            ];

            if ($_POST['p_id'] == 0) {
                $data['p_id_err'] = 'please select a person.';
            }

            if (empty($_POST['title'])) {
                $data['title_err'] = 'please enter a title for your prayer.';
            }

            if (empty($_POST['text'])) {
                $data['text_err'] = 'please enter some text for your prayer.';
            }


            if ((empty($data['p_id_err'])) && (empty($data['title_err'])) && (empty($data['text_err']))) {
                if ($this->prayerModel->update_prayer($data)) {
                    $prayer = $this->prayerModel->get_prayer_by_id($id);

                    $msg = '<p>The prayer was updated.</p>
                    <p>it is titled now: ' .
                        '<a href="' . URLROOT . '/prayers/show/' . $prayer->id . '"  class="alert-link">' . $prayer->title . '</a>
                      and it belongs to 
                      <a href="' . URLROOT . '/persons/show/' . $prayer->p_id . '" class="alert-link">' . $prayer->first_name . ' ' . $prayer->last_name . '</a>
                      </p>';
                    flash('msg', $msg);
                    redirect_to('persons/show/' . $data['p_id']);
                } else {
                    flash('msg', 'Something went wrong, please try again later.');
                    $persons = $this->personModel->getPersons(null, null);
                    $prayer = $this->prayerModel->get_prayer_by_id($data['id']);
                    $data = [
                        'persons' => $persons,
                        'first_name' => $prayer->first_name,
                        'last_name' => $prayer->last_name
                    ];
                    $this->view('prayers/edit/' . $id, $data);
                }
            } else {
                $persons = $this->personModel->getPersons(null, null);
                $data['persons'] = $persons;
                $this->view('prayers/edit', $data);
            }
        } else {
            $prayer = $this->prayerModel->get_prayer_by_id($id);
            if ($prayer) {
                $persons = $this->personModel->getPersons(null, null);
                $data = [
                    'id' => $prayer->id,
                    'p_id' => $prayer->p_id,
                    'title' => $prayer->title,
                    'text' => $prayer->text,
                    'first_name' => $prayer->first_name,
                    'last_name' => $prayer->last_name,
                    'persons' => $persons
                ];
                $this->view('prayers/edit', $data);
            } else {
                $msg = "<p>you are trying to edit none existing phone number</p> <p>please check the <a href=" . URLROOT . "/prayers\"  class=\"alert-link\">prayers</a> page to access the desured number, or find the person from <a href=" . URLROOT . "/persons\" class=\"alert-link\"> people </a> page.</p>";
                flash('msg', $msg);
                redirect_to('pages/notfound');
            }
        }
    }

    public function show($id)
    {
        $prayer = $this->prayerModel->get_prayer_by_id($id);
        if ($prayer) {
            $data = ['prayer' => $prayer];
            $this->view('prayers/show', $data);
        } else {
            flash('msg', '<p>the page which you requested does not exist, try to use other method</p>', 'aler alert-danger');
            redirect_to('pages/notFound');
        }
    }

    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $prayer = $this->prayerModel->get_prayer_by_id($id);
            if (!islogged()) {
                redirect_to('prayers');
            }
            if ($this->prayerModel->delete_prayer($id)) {
                flash('msg', '<p>The prayer was removed from your database.</p>
                <p> you can check <a href="' . URLROOT . '/prayers' . '" class="alert-link">all prayers</a> page or <a href="' . URLROOT . '/persosns/show/' . $prayer->p_id . '" class="alert-link"> ' . $prayer->first_name . ' ' . $prayer->last_name . '</a> personal page.</p>');
                redirect_to('persons/show/' . $prayer->p_id);
            } else {
                flash('msg', 'something went wrong, please try again or contact support.', 'alert alert-danger alert-dismissible fade show');
                redirect_to('prayers/show/' . $prayer->id);
            }
        }
    }
    public function hide($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $prayer = $this->prayerModel->get_prayer_by_id($id);
            if (!islogged()) {
                redirect_to('prayers');
            }
            if ($this->prayerModel->hide_prayer($id)) {
                flash('msg', '<p>The prayer was removed from your database.</p>
                <p> you can check <a href="' . URLROOT . '/prayers' . '" class="alert-link">all prayers</a> page or <a href="' . URLROOT . '/persosns/show/' . $prayer->p_id . '" class="alert-link"> ' . $prayer->first_name . ' ' . $prayer->last_name . '</a> personal page.</p>');
                redirect_to('persons/show/' . $prayer->p_id);
            } else {
                flash('msg', 'something went wrong, please try again or contact support.', 'alert alert-danger alert-dismissible fade show');
                redirect_to('prayers/show/' . $prayer->id);
            }
        }
    }

    public function show_person($id)
    {
        $person = $this->personModel->get_person_by_id_edit($id);
        if ($person) {
            $prayers = $this->prayerModel->get_all_prayers_for_id($id);
            $data = ['prayer' => $prayers];
            $this->view('prayers/show_person', $data);
        } else {
            flash('msg', '<p>the page which you requested does not exist, try to use other method</p>', 'aler alert-danger');
            redirect_to('pages/notFound');
        }
    }
}
