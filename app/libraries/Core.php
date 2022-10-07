<?php
// it will look at the url and get the data from there to load the corresponding controllers and methods
/**
 * the APP Core Class
 * create URL and Loads core controllers
 * URL formate will be as follow: /controller/method/params
 */
class Core
{
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct()
    {
        //print_r($this->getUrl());
        //get the url variables:
        $url = $this->getUrl();
        //deconstruct the url
        //checking if the controller exist to be used as the current controller then unset it
        if (isset($url[0])) {
            if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
                $this->currentController = ucwords($url[0]);
                unset($url[0]);
            }
        }
        //require the controller then instantiate it
        require_once '../app/controllers/' . $this->currentController . '.php';
        $this->currentController = new $this->currentController;

        // check for the second part of the url then checking the method
        if (isset($url[1])) {
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }

        // get the params
        $this->params = $url ? array_values($url) : [];
        //call a callback with an array with params ## check this function!! 
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getUrl()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}
