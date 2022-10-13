  <?php require APPROOT . '/views/includes/header.php'; ?>
  <?php flash('msg'); ?>
  <a href="<?php echo URLROOT; ?>/peplans" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
  <div class="card card-body bg-light mt-5">
      <h2>Relate language to person.</h2>
      <p>Chose from the menue below to add a language to a certain person.</p>
      <form action="<?php echo URLROOT; ?>/peplans/add" method="post">
          <!-- //language field -->
          <div class="form-group">
              <label for="lan">Chose the language</label>
              <span class="invalid-feedback"><?php echo $data['lan_err']; ?></span>
              <select class="form-select" aria-label="Default select example" name="lan_id">
                  ?>
                  <?php if ((!isset($data['lan_id'])) || ($data['lan_id'] == 0)) : ?>
                      <option selected value=0>chose language from the list</option>
                  <?php endif; ?>
                  <?php foreach ($data['languages'] as $lan) : ?>
                      <option value="<?php echo $lan->id; ?>" <?php if ((isset($data['lan_id'])) && ($data['lan_id'] == $lan->id)) echo 'selected';; ?> <?php if ((isset($_SESSION['lan_id'])) && ($_SESSION['lan_id'] == $lan->id)) echo 'selected';; ?>>
                          <?php echo $lan->title; ?></option>
                  <?php endforeach; ?>
              </select>
              <?php if (!empty($data['lan_id_error'])) {
                    $msg = $data['lan_id_error'];
                    echo "<label class=\"alert alert-danger\">$msg</label>";
                } ?>
          </div>
          <!-- person's field -->
          <div class="form-group">
              <label for="p_id">Chose the person:</label>
              <span class="invalid-feedback"><?php echo $data['p_id_err']; ?></span>
              <select class="form-select" aria-label="Default select example" name="p_id">
                  } ?>
                  <?php if ((!isset($data['p_id'])) || ($data['p_id'] == 0)) : ?>
                      <option value=0 selected>Select a person from the list</option>
                  <?php endif; ?>
                  <?php foreach ($data['persons'] as $person) : ?>
                      <option value="<?php echo $person->id; ?>" <?php if ((isset($data['p_id'])) && ($data['p_id'] == $person->id)) echo 'selected';; ?> <?php if ((isset($_SESSION['p_id'])) && ($_SESSION['p_id'] == $person->id)) echo 'selected';; ?> <?php if ((isset($id)) && ($id == $person->id)) echo 'selected';; ?>>
                          <?php echo $person->first_name . ' ' . $person->last_name; ?></option>
                  <?php endforeach; ?>
              </select>
              <?php if (!empty($data['p_id_error'])) {
                    $msg = $data['p_id_error'];
                    echo "<label class=\"alert alert-danger\">$msg</label>";
                } ?>
          </div>
          <!-- levle field -->
          <div class="form-group">
              <label for="levle">Chose the person:</label>
              <span class="invalid-feedback"><?php echo $data['levle_err']; ?></span>
              <select class="form-select" aria-label="Default select example" name="levle">
                  } ?>
                  <?php if ((!isset($data['levle'])) || ($data['levle'] == 0)) : ?>
                      <option selected>Select a person from the list</option>
                  <?php endif; ?>
                  <option value="25">beginner</option>
                  <option value="50">intermediate</option>
                  <option value="75">advanced</option>
                  <option value="100">fluent</option>
              </select>
              <?php if (!empty($data['levle_error'])) {
                    $msg = $data['levle_error'];
                    echo "<label class=\"alert alert-danger\">$msg</label>";
                } ?>
          </div>
          <!-- comment's field -->
          <div class="form-group">
              <label for="comment">comment:</label>
              <textarea name="comment" class="form-control form-control-lg <?php echo (!empty($data['comment_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['comment']; ?></textarea>
              <span class="invalid-feedback"><?php echo $data['comment_err']; ?></span>
          </div>
          <div class="form-floating m-3">
              <button type="submit" class="btn btn-primary btn-block"><i class="fa-solid fa-user-plus"></i> relate <i class="fa-solid fa-language"></i></button>
          </div>
      </form>
  </div>
  <!-- <?php echo '<pre>' . var_export($data, true) . '</pre>'; ?> -->
  <?php require APPROOT . '/views/includes/footer.php'; ?>