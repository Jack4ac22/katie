<?php
function redirect_to($page)
{
    return header('location: ' . URLROOT . '/' . $page);
}
