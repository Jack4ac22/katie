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

  public function index()
  {
    $titles = $this->titleModel->get_titles();

    $data = [
      'titles' => $titles
    ];

    $this->view('titles/index', $data);
  }

  public function add()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Sanitize language array
      $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);
      $data = [
        'title' => trim($_POST['title']),
        'description' => trim($_POST['description']),
        'extra' => trim($_POST['extra']),
        'title_err' => '',
        'body_err' => '',
        'body_err' => ''
      ];

      // Validate data
      if (empty($data['title'])) {
        $data['title_err'] = 'Please enter title';
      }
      // Make sure no errors
      if (empty($data['title_err'])) {
        // Validated
        if ($this->languageModel->add_language($data)) {
          $language = $this->languageModel->get_last_language();
          flash('msg', '<p>' . $language->title . ' language is Added, you can access it <a href="' . URLROOT . '/languages/show/' . $language->id . '" class="alert-link">from here</a> .');
          redirect_to('languages');
        } else {
          flash('msg', 'Something went wrong, please try again later.', 'alert alert-danger alert-dismissible fade show');
          redirect_to('languages');
        }
      } else {
        // Load view with errors
        $this->view('languages/add', $data);
      }
    } else {
      $data = [
        'title' => '',
        'description' => '',
        'extra' => ''
      ];

      $this->view('languages/add', $data);
    }
  }

  public function edit($id)
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Sanitize language array
      $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

      $data = [
        'id' => $id,
        'title' => trim($_POST['title']),
        'description' => trim($_POST['description']),
        'extra' => trim($_POST['extra']),
        'title_err' => '',
        'description_err' => '',
        'extra_err' => ''
      ];

      // Validate data
      if (empty($data['title'])) {
        $data['title_err'] = 'Please enter title';
      }
      if (empty($data['description'])) {
        $data['description_err'] = 'Please enter the description text';
      }

      // Make sure no errors
      if (empty($data['title_err']) && empty($data['description_err'])) {
        // Validated
        if ($this->languageModel->update_language($data)) {
          flash('msg', $data['title'] . ' language Updated');
          redirect_to('languages/show/' . $data['id']);
        } else {
          flash('msg', $data['title'] . 'something went wrong, try again later.', 'alert alert-danger alert-dismissible fade show');
          redirect_to('languages/index');
        }
      } else {
        // Load view with errors
        $this->view('languages/edit', $data);
      }
    } else {
      // Get existing language from model
      $language = $this->languageModel->get_language_by_id($id);
      if (isset($language['language']->title)) {
        $data = [
          'id' => $id,
          'title' => $language['language']->title,
          'description' => $language['language']->description,
          'extra' => $language['language']->extra
        ];

        $this->view('languages/edit', $data);
      } else {
        flash('msg', 'The requested page does not exist, please choose a specific language.', 'alert alert-danger alert-dismissible fade show');
        redirect_to('languages/index');
      }
    }
  }

  public function show($id = 0)
  {
    $language = $this->languageModel->get_language_by_id($id);
    if (isset($language['language']->id)) {

      $data = [
        'language' => $language
      ];

      $this->view('languages/show', $data);
    } else {
      flash('msg', '<p>the page which you requested does not exist, try to use other method</p>', 'alert alert-danger alert-dismissible fade show');
      redirect_to('pages/notFound');
    }
  }
  public function delete($id)
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Get existing language from model
      $language = $this->languageModel->get_language_by_id($id);

      if (!islogged()) {
        redirect_to('languages');
      }
      if ($this->languageModel->delete_language($id)) {
        flash('msg', 'Language Removed.');
        redirect_to('languages');
      } else {
        flash('msg', 'Something went wrong, please try again.', 'alert alert-danger');
        redirect_to('languages');
      }
    } else {
      flash('msg', '<p>You do not have a permission.</p>', 'alert alert-danger alert-dismissible fade show');
      redirect_to('languages');
    }
  }
}
