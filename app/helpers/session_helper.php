<?php
session_start();


//flash messages
# $class = "alert alert-success", "alert alert-danger" 
# to display it in a template echo flash('registeration', 'New user si added';)
function flash($name = '', $message = '', $class = 'alert alert-success alert-dismissible fade show')
{
    if (!empty($name)) {
        if (!empty($message) && empty($_SESSION[$name])) {
            if (!empty($_SESSION[$name])) {
                unset($_SESSION[$name]);
            }
            if (!empty($_SESSION[$name . '_class'])) {
                unset($_SESSION[$name . '_class']);
            }
            $_SESSION[$name] = $message;
            $_SESSION[$name . '_class'] = $class;
        } elseif (empty($message) && !empty($_SESSION[$name])) {
            $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : '';
            echo
            '<div class="' . $class . '" role="alert">' . $_SESSION[$name] . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            unset($_SESSION[$name]);
            unset($_SESSION[$name . '_class']);
        }
    }
}


/**
 * islogged()
 * @return boolean
 */

function islogged()
{
    if (!isset($_SESSION['timezone_id'])) {
        redirect_to('users/change_t/' . $_SESSION['user_id']);
    } elseif (isset($_SESSION['user_id'])) {
        return true;
    } else {
        return false;
    }
}
