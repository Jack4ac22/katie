<?php require_once APPROOT . '/views/includes/header.php'; ?>
<h1 class="heading"><?php echo $data['title']; ?></h1>
<p class="lead"><?php echo $data['description']; ?></p>

<div class="form-floating">
  <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 300px"></textarea>
  <label for="floatingTextarea2">Comments</label>
</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>