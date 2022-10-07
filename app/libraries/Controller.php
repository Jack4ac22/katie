<?php

/**
 * loads the models and the views
 */

class Controller
{
    // load the model
    public function model($model)
    {
        #requiring the file
        require_once '../app/models/' . $model . '.php';
        #instantiate the model
        return new $model();
    }

    //load view take the file, then the data which is an Assosiative array array 
    public function view($view, $data = [])
    {
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/' . $view . '.php';
        } else {
            die('page dose not exite');
        }
    }
}
