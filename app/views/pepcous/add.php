  <?php require APPROOT . '/views/includes/header.php'; ?>
  <?php flash('msg'); ?>
  <?php //echo '<pre>' . var_export($data, true) . '</pre>';
    ?>

  <?php if (isset($data['p_id']) && ($data['p_id'] > 0)) : ?>
      <a href="<?= URLROOT ?>/persons/show/<?= $data['p_id'] ?>" class="btn btn-light"><?= I_ARROW_L ?> Back to the person's page</a>

  <?php elseif (isset($data['t_id']) && ($data['t_id'] > 0)) : ?>
      <a href="<?= URLROOT ?>/pepgroups/show/<?= $data['t_id'] ?>" class="btn btn-light"><?= I_ARROW_L ?> Back to groups's page</a>

  <?php else : ?>
      <a href="<?php echo URLROOT; ?>" class="btn btn-light"><?= I_ARROW_L ?> Back to main page</a>
  <?php endif; ?>



  <div class="card card-body bg-light mt-5">
      <h2>Add nationality.</h2>
      <p>Chose from the menue below.</p>
      <form action="<?php echo URLROOT; ?>/pepcous/add" method="post">
          <!-- //group field -->
          <div class="form-group mt-3">
              <label for="group ">Chose the country</label>
              <span class="invalid-feedback"><?php echo $data['c_err']; ?></span>
              <select class="form-select mt-1" aria-label="Default select example" name="c_id">
                  ?>
                  <?php if ((!isset($data['c_id'])) || ($data['c_id'] == 0)) : ?>
                      <option selected value=0>chose country from the list</option>
                  <?php endif; ?>
                  <?php foreach ($data['countries'] as $country) : ?>
                      <option value="<?php echo $country->num_code; ?>" <?php if ((isset($data['c_id'])) && ($data['c_id'] == $country->num_code)) echo 'selected'; ?>>
                          <?= $country->en_short_name .' - ' . $country->alpha_3_code ?></option>
                  <?php endforeach; ?>
              </select>
              <?php if (!empty($data['c_id_err'])) {
                    $msg = $data['c_id_err'];
                    echo "<label class=\"alert alert-danger\">$msg</label>";
                } ?>
          </div>
          <!-- person's field -->
          <div class="form-group mt-3">
              <label for="p_id ">Chose the person:</label>
              <span class="invalid-feedback"><?php echo $data['p_id_err']; ?></span>
              <select class="form-select mt-1" aria-label="Default select example" name="p_id">
                  } ?>
                  <?php if ((!isset($data['p_id'])) || ($data['p_id'] == 0)) : ?>
                      <option value='0' selected>Select a person from the list</option>
                  <?php endif; ?>
                  <?php foreach ($data['persons'] as $person) : ?>
                      <option value="<?php echo $person->id; ?>" <?php if ((isset($data['p_id'])) && ($data['p_id'] == $person->id)) echo 'selected'; ?>>
                          <?php echo $person->first_name . ' ' . $person->last_name; ?></option>
                  <?php endforeach; ?>
              </select>
              <?php if (!empty($data['p_id_err'])) {
                    $msg = $data['p_id_err'];
                    echo "<label class=\"alert alert-danger\">$msg</label>";
                } ?>
          </div>

          <!-- comment's field -->
          <div class="form-group mt-3">
              <label for="comment">comment:</label>
              <textarea name="comment" class="form-control form-control-lg <?php echo (!empty($data['comment_err'])) ? 'is-invalid' : ''; ?>" style="white-space: pre-line"><?php echo $data['comment']; ?></textarea>
              <span class="invalid-feedback"><?php echo $data['comment_err']; ?></span>
          </div>
          <div class="form-floating mt-3">
              <button type="submit" class="btn btn-primary btn-block"> add</button>
          </div>
      </form>
  </div>
  <?php //echo '<pre>' . var_export($data, true) . '</pre>'; 
    ?>
  <?php require APPROOT . '/views/includes/footer.php'; ?>