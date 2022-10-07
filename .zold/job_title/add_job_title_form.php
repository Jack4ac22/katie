<?php
require "../required/database.php";

require "../required/header.php";
require "../required/menue.php"; ?>
<?php
if (isset($_GET['msg'])) {
    echo '<p>' . $_GET['msg'] . '</p>';
}
$title = '';
$description = '';
if ((isset($_GET['job_title'])) && (isset($_GET['description']))) {
    $title = $_GET["job_title"];
    $description = $_GET["description"];
} ?>


<form action="../job_title/add_job_title.php" method="post">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Job Title</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="insert the new job title" name="job_title" value="<?php echo $title ?>">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Title's description</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="job_title_description" placeholder="insert the text that will describe the new job title"><?php echo $description ?></textarea>
    </div>
    <div class="col-auto">
        <button type="submit" class="btn btn-primary mb-3">add</button>
    </div>
</form>

<?php require '../required/footer.php';
