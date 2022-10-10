  <?php require APPROOT . '/views/includes/header.php'; ?>
  <a href="<?php echo URLROOT; ?>/languages" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>

  <?php if (islogged()) : ?>

  <div class="card">
      <h2 class="card-header"><?php echo $data['language']->title; ?></h2>
      <div class="card-body">
          <h5 class="card-title"><?php echo $data['language']->description; ?>.</h5>
          <pclass="card-text"><?php echo $data['language']->extra; ?>.</p>
              <div class="btn-group" role="group" aria-label="Basic example">
                  <form action="<?php echo URLROOT; ?>/languages/delete/<?php echo $data['language']->id; ?>"
                      method="post">
                      <a class="btn btn-warning"
                          href="<?php echo URLROOT; ?>/languages/edit/<?php echo $data['language']->id; ?>"><i
                              class="fa-sharp fa-solid fa-pen-to-square"></i>
                          Edit</a>
                      <button type="submit" class="btn btn-danger"><i class="fa-solid fa-eraser"></i> DELETE</button>
                  </form>
              </div>
      </div>
  </div>

  <?php endif; ?>

  <?php require APPROOT . '/views/includes/footer.php'; ?>