  <?php require APPROOT . '/views/includes/header.php'; ?>
  <a href="<?php echo URLROOT; ?>/languages" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
  <br>
  <h1><?php echo $data['language']->title; ?></h1>
  <div class="bg-secondary text-white p-2 mb-3">
      Description <?php echo $data['language']->title; ?>
  </div>
  <p><?php echo $data['language']->description; ?></p>

  <?php if (islogged()) : ?>
  <hr>
  <a href="<?php echo URLROOT; ?>/languages/edit/<?php echo $data['language']->id; ?>" class="btn btn-dark">Edit</a>

  <form class="pull-right" action="<?php echo URLROOT; ?>/languages/delete/<?php echo $data['language']->id; ?>"
      method="post">
      <input type="submit" value="Delete" class="btn btn-danger">
  </form>
  <?php endif; ?>

  <?php require APPROOT . '/views/includes/footer.php'; ?>