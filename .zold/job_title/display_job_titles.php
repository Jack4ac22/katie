<?php
require "../required/database.php";

require "../required/header.php";
require "../required/menue.php";

if (!isset($_GET['id'])) {
    echo "<nav class=\"navbar bg-light\">
<div class=\"container-fluid\">
  <form class=\"d-flex\" role=\"search\">
    <input class=\"form-control me-2\" type=\"search\" placeholder=\"Search\" aria-label=\"Search\">
    <button class=\"btn btn-outline-success\" type=\"submit\">Search</button>
  </form>
  <a href=\"http://localhost:8888/Katie/job_title/add_job_title_form.php\" class=\"btn btn-outline-success me-2\">add new title</a>
</div>
</nav>";
}
?>

<?php
$query = "SELECT * FROM job_titles";
if (isset($_GET['id'])) {
    $query = $_GET['id'];
    $query = "SELECT * FROM job_titles WHERE id = $query";
    echo "<div class=\"mb-3\"><a href=\"http://localhost:8888/Katie/job_title/display_job_titles.php\" class=\"btn btn-info\">all job titles</a></div>";
    echo "<a href=\"http://localhost:8888/Katie/job_title/add_job_title_form.php\" class=\"btn btn-success\">add new title</a>";
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
            echo "<a href=\"http://localhost:8888/Katie/job_title/edit_job_title_form.php?id=$id\" class=\"btn btn-warning\">edit</a>";
        }
    }
}

require "../required/footer.php";
