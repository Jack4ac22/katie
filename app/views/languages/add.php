  <?php require APPROOT . '/views/includes/header.php'; ?>
  <a href="<?php echo URLROOT; ?>/languages" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
  <div class="card card-body bg-light mt-5">
      <h2>Add Language</h2>
      <p>fill up the data to creat a new language.</p>
      <form action="<?php echo URLROOT; ?>/languages/add" method="post">
          <div class="form-group">
              <label for="title">Title: <sup>*</sup></label>
              <input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title']; ?>">
              <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
          </div>
          <div class="form-group">
              <label for="description">Description: <sup>*</sup></label>
              <textarea name="description" class="form-control form-control-lg <?php echo (!empty($data['description_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['description']; ?></textarea>
              <span class="invalid-feedback"><?php echo $data['description_err']; ?></span>
          </div>
          <div class="form-group">
              <label for="extra">extra: <sup>*</sup></label>
              <textarea name="extra" class="form-control form-control-lg <?php echo (!empty($data['extra_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['extra']; ?></textarea>
              <span class="invalid-feedback"><?php echo $data['extra_err']; ?></span>
          </div>
          <div class="form-group m-t-3">
              <input type="submit" class="btn btn-success" value="Submit">
          </div>
      </form>
  </div>

  <?php require APPROOT . '/views/includes/footer.php'; ?>