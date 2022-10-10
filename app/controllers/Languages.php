<?php
class Languages extends Controller
{
  public function __construct()
  {
    if (!islogged()) {
      redirect_to('users/login');
    }

    $this->languageModel = $this->model('Language');
    $this->userModel = $this->model('User');
  }

  public function index()
  {
    // Get languages
    $languages = $this->languageModel->getlanguages();

    $data = [
      'languages' => $languages
    ];

    $this->view('languages/index', $data);
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
      if (empty($data['description'])) {
        $data['description_err'] = 'Please enter the description text';
      }

      // Make sure no errors
      if (empty($data['title_err']) && empty($data['description_err'])) {
        // Validated
        if ($this->languageModel->add_language($data)) {
          flash('msg', 'language Added');
          redirect_to('languages');
        } else {
          flash('msg', 'Something went wrong, please try again later.');
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
          redirect_to('languages');
        } else {
          flash('msg', $data['title'] . 'something went wrong, try again later.');
          redirect_to('languages/index');
        }
      } else {
        // Load view with errors
        $this->view('languages/edit', $data);
      }
    } else {
      // Get existing language from model
      $language = $this->languageModel->get_language_by_id($id);


      $data = [
        'id' => $id,
        'title' => $language->title,
        'description' => $language->description,
        'extra' => $language->extra
      ];

      $this->view('languages/edit', $data);
    }
  }

  public function show($id)
  {
    $language = $this->languageModel->get_language_by_id($id);
    if ($language) {

    $data = [
      'language' => $language
    ];

    $this->view('languages/show', $data);
    } else {
      flash('msg', '<p>the page which you requested does not exist, try to use other method</p>');
      redirect_to('/pages/notFound');
    }
  }

  public function delete($id)
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Get existing language from model
      $language = $this->languageModel->get_language_by_id($id);

      // Check for owner
      if (!islogged()) {
        redirect_to('languages');
      }

      if ($this->languageModel->delete_language($id)) {
        flash('msg', 'language Removed');
        redirect_to('languages');
      } else {
        redirect_to('languages');
      }
    } else {
      redirect_to('languages');
    }
  }
}