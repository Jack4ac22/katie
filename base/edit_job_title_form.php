<?php
require "./required/database.php";

require "./required/header.php";
require "./required/menue.php";
$connect = connect();
if ($connect) {
    if (isset($_GET['id'])) {
        $query = $_GET['id'];
        $query = "SELECT * FROM job_titles WHERE id = $query";
        $results = mysqli_query($connect, $query);
        $titles = mysqli_fetch_all($results, MYSQLI_ASSOC);
        $title = $titles[0];
        $T_id = $title['id'];
        $T_title = $title['title'];
        $T_description = $title['description'];
    }
}
?>
<form action="edit_job_title.php" method="post">
    <div class="mb-3">
        <label for="disabledTextInput" class="form-label">ID</label>
        <input type="text" id="disabledTextInput" class="form-control" value="<?php echo $T_id ?>" name="id">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Job Title</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="insert the new job title" name="job_title" value="<?php echo $T_title ?>">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Title's description</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="job_title_description" placeholder="insert the text that will describe the new job title"><?php echo $T_description ?></textarea>
    </div>
    <div class="col-auto">
        <button type="submit" class="btn btn-primary mb-3">update</button>
    </div>
</form>

<?php require './required/footer.php';
