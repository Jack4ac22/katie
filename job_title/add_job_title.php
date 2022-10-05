<?php
function redirectWith($title, $description, $msg)
{
    return
        header("Location: http://localhost:8888/Katie/job_title/add_job_title_form.php?job_title=$title&description=$description&msg=$msg");
    exit();
};
require "../required/database.php";
// variables:
// echo '<pre>';
// var_dump($_POST);
// echo '</pre>';
$title = $_POST['job_title'];
$description = $_POST['job_title_description'];

$connect = connect();
if ($connect) {
    //checking if the job title already exisit
    $query_check = "SELECT * FROM job_titles WHERE title = '$title'";
    if (mysqli_num_rows(mysqli_query($connect, $query_check)) == 0) {
        $query = "INSERT INTO job_titles (id, title, description) VALUES (NULL, '$title', '$description')";
        $results = mysqli_query($connect, $query);
        if ($results) {
            $last_id = mysqli_insert_id($connect);

            echo "$title is inserted as a new job title. id= $last_id";
            header("Location: http://localhost:8888/Katie/job_title/display_job_titles.php?id=$last_id");
            exit();
        } else {
            $msg = "something went wrong with the insert";
            echo $msg;
            redirectWith($title, $description, $msg);
        }
    } else {
        $msg = "the entery already exsiste";
        echo $msg;
        redirectWith($title, $description, $msg);
    }
} else {
    $msg = "faild to connect to your database" . mysqli_connect_error();
    echo $msg;
    redirectWith($title, $description, $msg);
}
