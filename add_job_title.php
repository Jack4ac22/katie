<?php
require "./required/database.php";

require "./required/header.php";
require "./required/menue.php";
// variables:
// echo '<pre>';
// var_dump($_POST);
// echo '</pre>';
$title = $_POST['job_title'];
echo $title;
$description = $_POST['job_title_description'];

$connect = connect();
if ($connect) {
    //checking if the job title already exisit
    $query_check = "SELECT * FROM job_titles WHERE title = '$title'";
    if (mysqli_num_rows(mysqli_query($connect, $query_check)) == 0) {
        $query = "INSERT INTO job_titles (id, title, description) VALUES (NULL, '$title', '$description')";
        $results = mysqli_query($connect, $query);
        if ($results) {
            echo "$title is inserted new job title";
        } else echo "something went wrong with the insert";
    } else echo "the entery already exsiste";
} else echo "faild to connect to your database" . mysqli_connect_error();

require './required/footer.php';
