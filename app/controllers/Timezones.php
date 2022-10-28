<?php
class Timezones extends Controller
{

    public function __construct()
    {
        $this->personModel = $this->model('Person');
        $this->timezoneModel = $this->model('Timezone');
    }

    public function index()
    {
        $timezones = $this->timezoneModel->get_timezones_data();
        $data = [
            'timezones' => $timezones
        ];
        $this->view('timezones/index', $data);
    }

    public function edit_timezone($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);
            if (!empty($_POST['w_dts'])) {
                $wdts = strtotime($_POST['w_dts']);
                $w_dts = date("Y-m-d", $wdts);
            }
            if (!empty($_POST['s_dts'])) {
                $sdts = strtotime($_POST['s_dts']);
                $s_dts = date("Y-m-d", $sdts);
            }
            $data = [
                'id' => $id,
                'w_dts' => $w_dts ?? NULL,
                's_dts' => $s_dts ?? NULL,
                'w_dts_err' => '',
                's_dts_err' => ''
            ];

            if (empty($_POST['w_dts'])) {
                $data['w_dts_err'] = 'pick the winter daylight saving';
            }
            if (empty($_POST['s_dts'])) {
                $data['s_dts_err'] = 'pick the winter daylight saving';
            }
            if (empty($data['w_dts_err']) && empty($data['s_dts_err'])) {
                if ($this->timezoneModel->update_timezone_dates($data)) {
                    flash('msg', '<p>The daylight saving date is updated.</p><a href="' . URLROOT . '/timezones/show_t/' . $id . '" class="alert-link">you can use this link to check</a>.');
                    redirect_to('timezones/show_t' . $data['id']);
                } else {
                    flash('msg', 'Something went wrong, please try again later.');
                    $this->view('timezones/edit', $data);
                }
            } else {

                $this->view('timezones/edit_timezone', $data);
            }
        } else {
            $timezone = $this->timezoneModel->get_timezone_dates($id);
            if ($timezone) {
                $data = [
                    'id' => $timezone->id,
                    'w_dts' => $timezone->w_dts,
                    's_dts' => $timezone->s_dts
                ];
                $this->view('timezones/edit_timezone', $data);
            } else {
                $msg = "<p>something went wron, please try again later</p>";
                flash('msg', $msg, 'alert alert-danger alert-dismissible fade show');
                redirect_to("timezones");
            }
        }
    }

    public function show_t($id)
    {
        $row = $this->timezoneModel->get_timezone_by_id($id);
        $this->view('timezones/show_t', $row);
    }


    public function add($name = 0, $time = 0)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                't_id' => $_POST['t_id'],
                'p_id' => $_POST['p_id'],
                'status' => $_POST['status'] ?? null,
                'status_err' => '',
                't_id_err' => '',
                'p_id_err' => ''
            ];
            // data validation
            if ($_POST['p_id'] == 0) {
                $data['p_id_err'] = 'please select a person.';
            } elseif (!isset($_POST['p_id'])) {
                $data['p_id_err'] = 'please select a person.';
            }
            if ($_POST['t_id'] == 0) {
                $data['t_id_err'] = 'please select a country.';
            } elseif (!isset($_POST['t_id'])) {
                $data['t_id_err'] = 'please select a country.';
            }

            if ((empty($data['t_id_err'])) && (empty($data['p_id_err']))) {

                if ((isset($_POST['status'])) && ($_POST['status'] == 'status')) {
                    if ($this->timezoneModel->add_current_timezone_to_person($data)) {
                        $last = $this->timezoneModel->get_the_last();
                        flash('msg', '<p><a href="' . URLROOT . '/timezones/show_t/' . $last->t_id . '" class="alert-link">' . $last->timezone . '</a> is assigned to ' . '<a href="' . URLROOT . '/persons/show/' . $last->p_id . '" class="alert-link">' . $last->first_name . ' ' . $last->last_name . '</a> and it is the current living time zone.</p>');
                        redirect_to('/persons/show/' . $last->p_id);
                    } else {
                        flash('msg', 'Something went wrong, please try again later.', 'alert alert-danger alert-dismissible fade show');
                        redirect_to('persons');
                    }
                } else {
                    if ($this->timezoneModel->add_timezone_to_person($data)) {
                        $last = $this->timezoneModel->get_the_last();
                        flash('msg', '<p><a href="' . URLROOT . '/timezones/show_t/' . $last->t_id . '" class="alert-link">' . $last->timezone . '</a> is assigned to ' . '<a href="' . URLROOT . '/persons/show/' . $last->p_id . '" class="alert-link">' . $last->first_name . ' ' . $last->last_name . '</a>.</p>');
                        redirect_to('/persons/show/' . $last->p_id);
                    } else {
                        flash('msg', 'Something went wrong, please try again later.', 'alert alert-danger alert-dismissible fade show');
                        redirect_to('persons');
                    }
                }
            } else {
                $persons = $this->personModel->getPersons(null, null);
                $timezones = $this->timezoneModel->get_timezones();
                $data['persons'] =  $persons;
                $data['timezones'] =  $timezones;

                $this->view('timezones/add', $data);
            }
        } else {
            $persons = $this->personModel->getPersons(null, null);
            $timezones = $this->timezoneModel->get_timezones();
            $data = [
                't_id' => $time,
                'p_id' => $name,
                'persons' => $persons,
                'timezones' => $timezones
            ];
            $this->view('timezones/add', $data);
        }
    }

    /**
     * edite a pepou number
     * @param $id
     * return ()
     */
    public function edit($id = 0)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                't_id' => $_POST['t_id'],
                'p_id' => $_POST['p_id'],
                'status' => $_POST['status'] ?? null,
                'id' => $id,
                'status_err' => '',
                't_id_err' => '',
                'p_id_err' => ''
            ];
            // data validation
            if ($_POST['p_id'] == 0) {
                $data['p_id_err'] = 'please select a person.';
            } elseif (!isset($_POST['p_id'])) {
                $data['p_id_err'] = 'please select a person.';
            }
            if ($_POST['t_id'] == 0) {
                $data['t_id_err'] = 'please select a country.';
            } elseif (!isset($_POST['t_id'])) {
                $data['t_id_err'] = 'please select a country.';
            }

            if ((empty($data['t_id_err'])) && (empty($data['p_id_err']))) {

                if ((isset($_POST['status'])) && ($_POST['status'] == 'status')) {
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $data = [
                            't_id' => $_POST['t_id'],
                            'p_id' => $_POST['p_id'],
                            'status' => $_POST['status'] ?? null,
                            'id' => $id,
                            'status_err' => '',
                            't_id_err' => '',
                            'p_id_err' => ''
                        ];
                        // data validation
                        if ($_POST['p_id'] == 0) {
                            $data['p_id_err'] = 'please select a person.';
                        } elseif (!isset($_POST['p_id'])) {
                            $data['p_id_err'] = 'please select a person.';
                        }
                        if ($_POST['t_id'] == 0) {
                            $data['t_id_err'] = 'please select a country.';
                        } elseif (!isset($_POST['t_id'])) {
                            $data['t_id_err'] = 'please select a country.';
                        }

                        if ((empty($data['t_id_err'])) && (empty($data['p_id_err']))) {
                            if ((isset($_POST['status'])) && ($_POST['status'] == 'status')) {
                                if ($this->timezoneModel->update_current_timezone_to_person($data)) {
                                    flash('msg', '<p><a href="' . URLROOT . '/timezones/show_t/' . $_POST['t_id'] . '" class="alert-link"> timezone </a> was updated.</p>');
                                    redirect_to('persons/show/' . $_POST['p_id']);
                                } else {
                                    flash('msg', 'Could not add the data to the database.', 'alert alert-danger alert-dismissible fade show');
                                    redirect_to('persons');
                                }
                            } else {
                                if ($this->timezoneModel->update_timezone_to_person($data)) {
                                    flash('msg', '<p><a href="' . URLROOT . '/timezones/show_t/' . $_POST['t_id'] . '" class="alert-link"> timezone </a> was updated.</p>');
                                    redirect_to('persons/show/' . $_POST['p_id']);
                                } else {
                                    flash('msg', 'Something went wrong with the data storing, please try again later.', 'alert alert-danger alert-dismissible fade show');
                                    redirect_to('/');
                                }
                            }
                        } else {
                            $persons = $this->personModel->getPersons(null, null);
                            $timezones = $this->timezoneModel->get_timezones();
                            $data['persons'] =  $persons;
                            $data['timezones'] =  $timezones;

                            $this->view('timezones/edit', $data);
                        }
                    } else {
                        $timezone = $this->timezoneModel->get_single_timezone_by_id($id);
                        if ($timezone) {
                            $persons = $this->personModel->getPersons(null, null);
                            $timezones = $this->timezoneModel->get_timezones();
                            $data = [
                                't_id' => $timezone->t_id,
                                'id' => $id,
                                'p_id' => $timezone->p_id,
                                'status' => $timezone->status,
                                'persons' => $persons,
                                'timezones' => $timezones
                            ];
                            $this->view('timezones/edit', $data);
                        } else {
                            $msg = "<p>We could not find the data, please try again later</p>";
                            flash('msg', $msg, 'alert alert-danger alert-dismissible fade show');
                            redirect_to("home");
                        }
                    }
                    if ($this->timezoneModel->update_current_timezone_to_person($data)) {
                        flash('msg', '<p><a href="' . URLROOT . '/timezones/show_t/' . $_POST['t_id'] . '" class="alert-link"> timezone </a> was updated.</p>');
                        redirect_to('persons/show/' . $_POST['p_id']);
                    } else {
                        flash('msg', 'Could not add the data to the database.', 'alert alert-danger alert-dismissible fade show');
                        redirect_to('persons');
                    }
                } else {
                    if ($this->timezoneModel->update_timezone_to_person($data)) {
                        $last = $this->timezoneModel->get_the_last();
                        flash('msg', '<p><a href="' . URLROOT . '/timezones/show_t/' . $last->t_id . '" class="alert-link">' . $last->timezone . '</a> is assigned to ' . '<a href="' . URLROOT . '/persons/show/' . $last->p_id . '" class="alert-link">' . $last->first_name . ' ' . $last->last_name . '</a>.</p>');
                        redirect_to('/persons/show/' . $last->p_id);
                    } else {
                        flash('msg', 'Something went wrong with the data storing, please try again later.', 'alert alert-danger alert-dismissible fade show');
                        redirect_to('/');
                    }
                }
            } else {
                $persons = $this->personModel->getPersons(null, null);
                $timezones = $this->timezoneModel->get_timezones();
                $data['persons'] =  $persons;
                $data['timezones'] =  $timezones;

                $this->view('timezones/edit', $data);
            }
        } else {
            $timezone = $this->timezoneModel->get_single_timezone_by_id($id);
            if ($timezone) {
                $persons = $this->personModel->getPersons(null, null);
                $timezones = $this->timezoneModel->get_timezones();
                $data = [
                    't_id' => $timezone->t_id,
                    'id' => $id,
                    'p_id' => $timezone->p_id,
                    'status' => $timezone->status,
                    'persons' => $persons,
                    'timezones' => $timezones
                ];
                $this->view('timezones/edit', $data);
            } else {
                $msg = "<p>We could not find the data, please try again later</p>";
                flash('msg', $msg, 'alert alert-danger alert-dismissible fade show');
                redirect_to("home");
            }
        }
    }


    /**
     * delete
     */

    public function delete_peptim($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $timezone = $this->timezoneModel->get_single_timezone_by_id($id);
            if ($timezone) {
                if (!islogged()) {
                    redirect_to('/login');
                }
                if ($this->timezoneModel->delete_peptim($id)) {
                    flash('msg', '<p><a href="' . URLROOT . '/persons/show/' . $timezone->p_id . '" class="alert-link">'
                        . $timezone->first_name . ' ' . $timezone->last_name . '</a> will not be shown in relation to <a href="' . URLROOT . '/timezones/show_t/' . $timezone->t_id . '" class="alert-link">' . $timezone->timezone . '</a> timezone.</p>');
                    redirect_to("persons/show/$timezone->p_id");
                } else {
                    $msg = "<p>Failed to delete the timezone, please try again later.</p>";
                    redirect_to("persons/show/$timezone->p_id", $msg, 'alert alert-danger alert-dismissible fade show');
                }
            } else {
                $msg = "<p>Failed to find the timezone, please try again later.</p>";
                redirect_to("persons/show/$timezone->p_id", $msg, 'alert alert-danger alert-dismissible fade show');
            }
        }
    }
}
