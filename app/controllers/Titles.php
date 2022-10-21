<?php
class Titles extends Controller
{
  public function __construct()
  {
    if (!islogged()) {
      redirect_to('users/login');
    }

    $this->titleModel = $this->model('Title');
  }

  public function index($search = null, $order = null)
  {
    $search = $_GET['search'] ?? null;
    $titles = $this->titleModel->get_titles($search, $order);

    $data = [
      'titles' => $titles
    ];

    $this->view('titles/index', $data);
  }

  public function add()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Sanitize title array
      $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);
      $data = [
        'title' => trim($_POST['title']),
        'description' => trim($_POST['description']),
        'title_err' => '',
        'description_err' => '',
      ];

      // Validate data
      if (empty($data['title'])) {
        $data['title_err'] = 'Please enter title';
      } elseif (strip_tags(trim($_POST['title'])) !== $_POST['title']) {
        $data['title_error'] = 'Please verify the title, it should not contain special characters.';
      }
      if (empty($data['description'])) {
        $data['description_err'] = 'Please enter description';
      } elseif (strip_tags($_POST['description']) !== $_POST['description']) {
        $data['description_err'] = 'Please verify the description, it should not contain special characters.';
      }
      // Make sure no errors
      if (empty($data['title_err'])) {
        // Validated
        if ($this->titleModel->add_title($data)) {
          $title = $this->titleModel->get_last_title();
          flash('msg', '<p>' . $title->title . '  is Added, you can access it <a href="' . URLROOT . '/titles/show/' . $title->id . '" class="alert-link">from here</a> .');
          redirect_to('titles');
        } else {
          flash('msg', 'Something went wrong, please try again later.', 'alert alert-danger alert-dismissible fade show');
          redirect_to('titles');
        }
      } else {
        // Load view with errors
        $this->view('titles/add', $data);
      }
    } else {
      $data = [
        'title' => '',
        'description' => ''
      ];

      $this->view('titles/add', $data);
    }
  }


  public function edit($id)
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Sanitize title array
      $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

      $data = [
        'id' => $id,
        'title' => trim($_POST['title']),
        'description' => trim($_POST['description']),
        'title_err' => '',
        'description_err' => '',
      ];

      if (empty($data['title'])) {
        $data['title_err'] = 'Please enter title';
      } elseif (strip_tags(trim($_POST['title'])) !== $_POST['title']) {
        $data['title_err'] = 'Please verify the title, it should not contain special characters.';
      }
      if (empty($data['description'])) {
        $data['description_err'] = 'Please enter description';
      } elseif (strip_tags(trim($_POST['description'])) !== $_POST['description']) {
        $data['description_err'] = 'Please verify the description, it should not contain special characters.';
      }

      // Make sure no errors
      if (empty($data['title_err']) && empty($data['description_err'])) {
        // Validated
        if ($this->titleModel->update_title($data)) {
          flash('msg', $data['title'] . ' title is updated');
          redirect_to('titles/show/' . $data['id']);
        } else {
          flash('msg', $data['title'] . 'something went wrong, try again later.', 'alert alert-danger alert-dismissible fade show');
          redirect_to('titles/index');
        }
      } else {
        // Load view with errors
        $this->view('titles/edit', $data);
      }
    } else {
      // Get existing title from model
      $title = $this->titleModel->get_title_by_id($id);
      if (isset($title['title']->title)) {
        $data = [
          'id' => $id,
          'title' => $title['title']->title,
          'description' => $title['title']->description,
        ];

        $this->view('titles/edit', $data);
      } else {
        flash('msg', 'The requested page does not exist.', 'alert alert-danger alert-dismissible fade show');
        redirect_to('titles/index');
      }
    }
  }

  public function show($id = 0)
  {
    $title = $this->titleModel->get_title_by_id($id);
    if (isset($title['title']->id)) {

      $data = [
        'title' => $title
      ];

      $this->view('titles/show', $data);
    } else {
      flash('msg', '<p>the page which you requested does not exist, try to use other method</p>', 'alert alert-danger alert-dismissible fade show');
      redirect_to('pages/notFound');
    }
  }
  public function delete($id)
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Get existing title from model
      $title = $this->titleModel->get_title_by_id($id);

      if (!islogged()) {
        redirect_to('titles');
      }
      if ($this->titleModel->delete_title($id)) {
        flash('msg', 'title Removed.');
        redirect_to('titles');
      } else {
        flash('msg', 'Something went wrong, please try again.', 'alert alert-danger');
        redirect_to('titles');
      }
    } else {
      flash('msg', '<p>You do not have a permission.</p>', 'alert alert-danger alert-dismissible fade show');
      redirect_to('titles');
    }
  }
}
