  <?php require APPROOT . '/views/includes/header.php'; ?>
  <?php flash('msg'); ?>
  <!-- <?php echo '<pre>' . var_export($data, true) . '</pre>'; ?> -->
  <a href="<?php echo URLROOT; ?>/languages" class="btn btn-light"><?= I_ARROW_L ?> Back to languages index</a>
  <div class="card card-body bg-light mt-5">
      <h2>Add Language</h2>
      <p>fill up the data to creat a new language.</p>
      <form action="<?php echo URLROOT; ?>/languages/add" method="post">
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
          <div class="form-group mt-3">
              <label for="extra">extra:</label>
              <textarea  name="extra" class="form-control form-control-lg <?php echo (!empty($data['extra_err'])) ? 'is-invalid' : ''; ?>" style="white-space: pre-line"><?php echo $data['extra']; ?></textarea>
              <span class="invalid-feedback"><?php echo $data['extra_err']; ?></span>
          </div>
          <div class="form-group m-t-3">
              <button class="btn btn-primary mt-3" type="submit"><?= I_ADD_SIGN ?> Add</button>
          </div>
      </form>
  </div>

  <?php require APPROOT . '/views/includes/footer.php'; ?>