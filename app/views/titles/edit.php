  <?php require APPROOT . '/views/includes/header.php'; ?>
  <?php flash('msg'); ?>
  <?php  //echo '<pre>' . var_export($data, true) . '</pre>'; ?>
  <a href="<?php echo URLROOT; ?>/groups/<?= $data['id'] ?>" class="btn btn-light"><?= I_ARROW_L ?> Back to <?= $data['title'] ?> title.</a>
  <div class="card card-body bg-light mt-5">
      <h2>Edit titles</h2>
      <p>click on update after correcting or updating the desired field.</p>
      <form action="<?php echo URLROOT; ?>/titles/edit/<?php echo $data['id']; ?>" method="post">
          <div class="form-group mt-3">
              <label for="title">Title:</label>
              <input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title']; ?>">
              <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
          </div>
          <div class="form-group mt-3">
              <label for="description">Description:</label>
              <textarea  name="description" class="form-control form-control-lg <?php echo (!empty($data['description_err'])) ? 'is-invalid' : ''; ?>" style="white-space: pre-line"><?php echo $data['description']; ?></textarea>
              <span class="invalid-feedback"><?php echo $data['description_err']; ?></span>
          </div>
          <div class="form-floating mt-3">
              <button type="submit" class="btn btn-primary btn-block"><?= I_EDIT ?> Update</button>
          </div>
      </form>
  </div>
  <?php require APPROOT . '/views/includes/footer.php'; ?>