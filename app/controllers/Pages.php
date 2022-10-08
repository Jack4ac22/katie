<?php
class Pages extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $data = ['title' => 'Home Page', 'description' => '19 Therefore go and make disciples of all nations, baptizing them in the name of the Father and of the Son and of the Holy Spirit, 20 and teaching them to obey everything I have commanded you. And surely I am with you always, to the very end of the age.<br>(<b>Matthew 28: 19-20)</b>'];
        $this->view('pages/index', $data);
    }

    public function about()
    {
        $data = ['title' => 'About', 'description' => 'Be Safe'];
        $this->view('pages/about', $data);
    }
}