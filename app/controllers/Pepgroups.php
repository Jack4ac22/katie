<?php
class Pepgroups extends Controller
{
    public function __construct()
    {
        if (!islogged()) {
            flash('msg', '<p>You do not have permission to access this data, please login.</p>');
            redirect_to('users/login');
        }

        $this->pepgroupModel = $this->model('Pepgroup');
        $this->groupModel = $this->model('Group');
        $this->personModel = $this->model('Person');
    }

    /**
     * @return languages with the people that they speaks them.
     */

    public function index()
    {
        $groups = $this->pepgroupModel->get_all_data();
        $data = [
            'groups' => $groups
        ];
        $this->view('pepgroups/index', $data);
    }

    /**
     * add a phone number and assign it to someone
     */

    public function add($name = 0, $title = 0)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);
            $data = [
                'comment' => $_POST['comment'],
                'group_id' => $_POST['group_id'],
                'p_id' => $_POST['p_id'],
                'comment_err' => '',
                'group_id_err' => '',
                'p_id_err' => ''
            ];

            // data validation
            if ($_POST['p_id'] == 0) {
                $data['p_id_err'] = 'please select a person.';
            } elseif (!isset($_POST['p_id'])) {
                $data['p_id_err'] = 'please select a person.';
            }
            if ($_POST['group_id'] == 0) {
                $data['group_id_err'] = 'please select a language.';
            } elseif (!isset($_POST['group_id'])) {
                $data['group_id_err'] = 'please select a language.';
            }

            if (empty($data['comment'])) {
                $data['comment_err'] = 'Please enter comment';
            } elseif (strip_tags($_POST['comment']) !== $_POST['comment']) {
                $data['comment_err'] = 'Please verify the comment, it should not contain special characters.';
            }


            if ((empty($data['group_id_err'])) && (empty($data['p_id_err'])) && (empty($data['comment_err']))) {
                if ($this->pepgroupModel->add_group_to_person($data)) {
                    $last = $this->pepgroupModel->get_the_last();
                    flash('msg', '<p><a href="' . URLROOT . '/groups/show/' . $last->group_id . '" class="alert-link">' . $last->title . '</a> is added to <a href="' . URLROOT . '/persons/show/' . $last->p_id . '" class="alert-link">' . $last->first_name . $last->last_name . '.</a>');
                    redirect_to('/persons/show/' . $last->p_id);
                } else {
                    flash('msg', 'Something went wrong, please try again later.', 'alert alert-danger alert-dismissible fade show');
                    redirect_to('persons');
                }
            } else {
                $persons = $this->personModel->getPersons(null, null);
                $data['persons'] = $persons;
                $groups = $this->groupModel->get_groups(null, null);
                $data['groups'] = $groups;
                $this->view('pepgroups/add', $data);
            }
        } else {
            $persons = $this->personModel->getPersons(null, null);
            $groups = $this->groupModel->get_groups(null, null);
            $data = [
                'comment' => '',
                'group_id' => $title,
                'p_id' => $name,
                'persons' => $persons,
                'groups' => $groups
            ];
            $this->view('pepgroups/add', $data);
        }
    }



    /**
     * edite a peptit number
     * @param $id
     * return ()
     */

    public function edit($id = 0)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);
            $data = [
                'id' => $id,
                'p_id' => $_POST['p_id'],
                'group_id' => $_POST['group_id'],
                'comment' => $_POST['comment'],
                'group_id_err' => '',
                'comment_err' => '',
                'p_id_err' => ''
            ];
            // data validation
            if (empty($_POST['group_id'])) {
                $data['group_id_err'] = 'please pick a title.';
            }
            if ($_POST['p_id'] == 0) {
                $data['p_id_err'] = 'please select a person.';
            }
            if (strip_tags($_POST['comment']) !== $_POST['comment']) {
                $data['comment_err'] = 'Please verify the comment, it should not contain special characters.';
            };

            //check for errors
            if (empty($data['group_id_err']) && empty($data['comment_err']) && empty($data['p_id_err'])) {

                if ($this->pepgroupModel->update_pepgroup($data)) {
                    $pepgroup = $this->pepgroupModel->get_pepgroup_by_id($id);
                    if ($pepgroup) {
                        flash('msg', '<p><a href="' . URLROOT . '/persons/show/' . $data['p_id'] . '" class="alert-link">' . $pepgroup->first_name . ' ' . $pepgroup->last_name . '</a> is included in <a href="' . URLROOT . '/groups/show/' . $data['group_id'] . '" class="alert-link">' . $pepgroup->title . '</a> group.</p> <p>the details of the <a href="' . URLROOT . '/pepgroups/show/' . $id . '" class="alert-link">updated version</a>.</p>');
                        redirect_to('persons/show/' . $data['p_id']);
                    }
                } else {
                    flash('msg', 'Something went wrong, please try again later.');
                    $this->view('pepgroups/edit', $data);
                }
                //load the view with the errors
            } else {
                $persons = $this->personModel->getPersons(null, null);
                $data['persons'] = $persons;
                $groups = $this->groupsModel->get_groups();
                $data['groups'] = $groups;
                $this->view('pepgroups/edit', $data);
            }
        } else {
            $pep = $this->pepgroupModel->get_pepgroup_by_id($id);
            if ($pep) {
                $persons = $this->personModel->getPersons(null, null);
                $groups = $this->groupModel->get_groups();
                $data = [
                    'id' => $pep->id,
                    'comment' => $pep->comment,
                    'group_id' => $pep->group_id,
                    'p_id' => $pep->p_id,
                    'persons' => $persons,
                    'groups' => $groups
                ];
                $this->view('pepgroups/edit', $data);
            } else {
                $msg = "<p>something went wron, please try again later</p>";
                flash('msg', $msg, 'alert alert-danger alert-dismissible fade show');
                redirect_to("pepgroups");
            }
        }
    }


    /**
     * show($id)
     * @param #id
     * @return data
     */
    public function show($id = null)
    {
        $pepgroup = $this->pepgroupModel->get_pepgroup_by_id($id);
        if ($pepgroup) {
            $this->view('pepgroups/show', $pepgroup);
        } else {
            flash('msg', '<p>the page which you requested does not exist, try to use other method</p>');
            redirect_to('pages/notFound');
        }
    }

    public function delete_pepgroup($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $pepgroup = $this->pepgroupModel->get_pepgroup_by_id($id);
            if ($pepgroup) {
                if (!islogged()) {
                    redirect_to('/login');
                }
                if ($this->pepgroupModel->delete_pepgroup($id)) {
                    flash('msg', '<p>' . $pepgroup->first_name . ' ' . $pepgroup->last_name . ' will not be shown in relation to <a href="' . URLROOT . '/groups/show/' . $pepgroup->group_id . '" class="alert-link">' . $pepgroup->title . '</a> group.</p>
                    <p>you can check
                    <a href="' . URLROOT . '/persons/show/' . $pepgroup->p_id . '" class="alert-link">'
                        . 'the personal profile. </p>');
                    redirect_to("persons/show/$pepgroup->p_id");
                } else {
                    $msg = "<p>Failed, please try again later.</p>";
                    redirect_to("pepgroups/show/$pepgroup->group_id", $msg);
                }
            }
        }
    }
}
