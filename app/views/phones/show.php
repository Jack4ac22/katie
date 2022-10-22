  <?php require APPROOT . '/views/includes/header.php'; ?>
  <?php require APPROOT . '/views/includes/nav.php'; ?>
  <?php flash('msg'); ?>
  <a href="<?php echo URLROOT; ?>/phones" class="btn btn-light"><?= I_ARROW_L ?> Back</a>

  <?php if (islogged()) : ?>
      <?php if (isset($data['phone'])) : ?>

          <div class="card">
              <h2 class="card-header"><?php echo $data['phone']->number; ?></h2>
              <div class="card-body">
                  <h3 class="card-title">Belongs to: <?php echo $data['phone']->first_name . ' ' . $data['phone']->last_name; ?>
                      <a href="<?php echo URLROOT . '/persons/show/' . $data['phone']->p_id; ?>" class="btn btn-light"><?= I_PERSON ?></a>
                  </h3>
                  <p class="card-text" style="white-space: pre-line"><?php echo $data['phone']->description; ?>.</p>
                  <div class="btn-group" role="group" aria-label="Basic example">
                      <form action="<?php echo URLROOT; ?>/phones/delete/<?php echo $data['phone']->id; ?>" method="post">
                          <a class="btn btn-warning" href="<?php echo URLROOT; ?>/phones/edit/<?php echo $data['phone']->id; ?>"><?= I_EDIT ?>
                              Edit</a>
                          <button type="submit" class="btn btn-danger"><?= I_DELETE ?> DELETE</button>
                      </form>
                  </div>
              </div>
          </div>
      <?php else : ?>

      <?php endif; ?>
  <?php endif; ?>


  <?php require APPROOT . '/views/includes/footer.php'; ?>