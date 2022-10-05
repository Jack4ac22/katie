<?php
require "./required/database.php";

require "./required/header.php";
require "./required/menue.php"; ?>
<?php
$query = "SELECT * FROM job_titles";
if (isset($_GET['id'])) {
    echo $_GET['id'];
    $query = $_GET['id'];
    $query = "SELECT * FROM job_titles WHERE id = $query";
}
$connect = connect();
if ($connect) {

    $results = mysqli_query($connect, $query);
    if ($results) {
        $titles = mysqli_fetch_all($results, MYSQLI_ASSOC);
        foreach ($titles as $title) {
            $id = $title['id'];
            echo '<h2>' . $title['title'] . '</h2>';
            echo '<p>' . $title['description'] . '</p>';
            echo "<a href=\"http://localhost:8888/Katie/edit_job_title_form.php?id=$id\">edite</a>";
        }
    }
}

require "./required/footer.php";
