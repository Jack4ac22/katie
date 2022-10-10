  <?php require APPROOT . '/views/includes/header.php'; ?>
  <?php flash('msg'); ?>
  <a href="<?php echo URLROOT; ?>/phones" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>

  <?php if (islogged()) : ?>
  <?php if (isset($data['phone'])) : ?>

  <div class="card">
      <h2 class="card-header"><?php echo $data['phone']->number; ?></h2>
      <div class="card-body">
          <h3 class="card-title">Belongs to: <?php echo $data['phone']->first_name . ' ' . $data['phone']->last_name; ?>
              <a href="<?php echo URLROOT . '/persons/show/' . $data['phone']->p_id; ?>" class="btn btn-light"><i
                      class="fa-solid fa-user"></i></a>
          </h3>
          <pclass="card-text"><?php echo $data['phone']->description; ?>.</p>
              <div class="btn-group" role="group" aria-label="Basic example">
                  <form action="<?php echo URLROOT; ?>/phones/delete/<?php echo $data['phone']->id; ?>" method="post">
                      <a class="btn btn-warning"
                          href="<?php echo URLROOT; ?>/phones/edit/<?php echo $data['phone']->id; ?>"><i
                              class="fa-sharp fa-solid fa-pen-to-square"></i>
                          Edit</a>
                      <button type="submit" class="btn btn-danger"><i class="fa-solid fa-eraser"></i> DELETE</button>
                  </form>
              </div>
      </div>
  </div>
  <?php else : ?>

  <?php endif; ?>
  <?php endif; ?>


  <?php require APPROOT . '/views/includes/footer.php'; ?>