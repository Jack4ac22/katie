<?php
require "./required/database.php";

require "./required/header.php";
require "./required/menue.php"; ?>
<form action="add_job_title.php" method="post">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Job Title</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="insert the new job title" name="job_title">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Title's description</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="job_title_description" placeholder="insert the text that will describe the new job title"></textarea>
    </div>
    <div class="col-auto">
        <button type="submit" class="btn btn-primary mb-3">add</button>
    </div>
</form>

<?php require './required/footer.php';
