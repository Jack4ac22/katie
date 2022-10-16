<?php
class Pages extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        if (islogged()) {
            // redirect_to('persons');
        }
        $data = ['title' => 'Home Page', 'description' => '<h3>Hello and welcome to this test edition of my app.</h3>
        <h4>please read the folwing instruction and description to understand the purpose and the features of this app, do not forget, it is still under construction.</h4>
        <p>Are you an HR person? maybe you are a manager who mange people around the world from different ethnicities, with different characters, who speak different languages, and who lives in different time zone.</p> <ul>
        <h5>This app</h5>
        <li>
            It is a private app designed for a single project, ie, the database is designed to serve one person or a group of people who work together on the same project.</li>
        <li>
            It is designed to facilitate the complexity of information.</li>
        <li>
            It helps to plan future meetings with people from abroad.</li>
        <li>
            It Helps the manager to keep all the data in one place and to find the right people and all their related information in a simple way.</li>
        <li>
            While some people can do different tasks and hold different job titles, it will be massive mental work to keep up with all this information, therefore, this is one of the tasks that this app will facilitate.</li>
    </ul>
    <div class="height"></div>
    <div class="container text-center">
      <div class="row">
        <div class="col align-self-center">
          <p class="lead">this website is still under construction.</p>
          <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 25%"></div>
          </div>
          you can contact me via email if you want! click on the link: <a href="mailto:jack@kazanjyan.eu" class="btn btn-light lead">send me an email</a>
        </div>
      </div>
    </div>
    '];
        $this->view('pages/index', $data);
    }

    public function about()
    {
        $data = ['title' => 'About', 'description' => 'Be Safe'];
        $this->view('pages/about', $data);
    }


    public function faq()
    {
        $data = ['title' => 'FAQs', 'description' => ''];
        $this->view('pages/faq', $data);
    }

    /**
     * four_0_four()
     * @redirect to 404
     */

    public function not_found()
    {
        $data = ['title' => 404, 'description' => ''];
        $this->view('not_found', $data);
    }

    public function patrick()
    {
        $this->view('pages/patrick');
    }
}
