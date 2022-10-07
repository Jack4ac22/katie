<?php
require "../required/database.php";
// variables:
echo '<pre>';
var_dump($_POST);
echo '</pre>';
$id = $_POST['id'];
$title = $_POST['job_title'];
$description = $_POST['job_title_description'];

$connect = connect();
if ($connect) {
    //checking if the job title already exisit
    $query_check = "SELECT * FROM job_titles WHERE title = '$title'";
    if (mysqli_num_rows(mysqli_query($connect, $query_check)) == 0) {
        $updating_query = "UPDATE job_titles SET title = '$title', description = '$description' WHERE job_titles.id = $id";
        $results = mysqli_query($connect, $updating_query);
        if ($results) {
            header("Location: http://localhost:8888/Katie/job_title/display_job_titles.php?id=$id&title=$title&description=$description");
            exit();
        }
    } else $msg = "the entery already exsiste";
    header("Location: http://localhost:8888/Katie/job_title/display_job_titles.php?id=$id&msg=$msg");
    exit();
} else echo "faild to connect to your database" . mysqli_connect_error();
