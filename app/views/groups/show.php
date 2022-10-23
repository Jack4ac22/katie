  <?php require APPROOT . '/views/includes/header.php'; ?>
  <a href="<?php echo URLROOT; ?>/titles" class="btn btn-light mb-3"><?= I_ARROW_L ?> Back to groups index.</a>
  <?php //echo '<pre>' . var_export($data, true) . '</pre>'; 
    ?>
  <?php flash('msg'); ?>
  <?php if (islogged()) : ?>
      <div class="accordion" id="accordionPanelsStayOpenExample">
          <div class="accordion-item">
              <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                  <button class="accordion-button show" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                      <h2 class="card-header">Info</h2>
                  </button>
              </h2>
              <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                  <div class="accordion-body">
                      <h2 class="card-header mt-3">Group' name: <?= $data['title']['title']->title ?></h2>
                      <?php if ($data['title']['title']->description != null) : ?>
                          <h5 class="card-title mt-3 style=" white-space: pre-line"">
                              Description: <?php echo $data['title']['title']->description; ?></h5>
                      <?php endif; ?>

                      <div class="mt-3">
                          <a class="btn btn-warning" href="<?php echo URLROOT; ?>/groups/edit/<?php echo $data['title']['title']->id; ?>"><?= I_EDIT ?>
                              Edit</a>
                          <!-- Button trigger modal -->
                          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_title_modal">
                              <?= I_DELETE ?> delete
                          </button>

                          <!-- Modal -->
                          <div class="modal fade" id="delete_title_modal" tabindex="-1" aria-labelledby="delete_title_modal_area" aria-hidden="true">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h1 class="modal-title fs-5" id="delete_title_modal_area">Delete <?= $data['title']['title']->title ?></h1>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                          Are you sure you want to delete <b> <?php echo $data['title']['title']->title; ?></b>?
                                      </div>
                                      <div class="modal-footer">
                                          <form action="<?php echo URLROOT; ?>/groups/delete/<?php echo $data['title']['title']->id; ?>" method="post">
                                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                              <button type="submit" class="btn btn-danger"><?= I_DELETE ?> DELETE</button>
                                          </form>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="accordion-item">
              <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                  <button class="accordion-button show" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                      <h2 class="card-header"> People in this group:</h2>
                  </button>
              </h2>
              <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingTwo">
                  <div class="accordion-body">
                      <?php if (count($data['title']['people']) > 0) : ?>
                          <div class="row">

                              <?php foreach ($data['title']['people'] as $person) : ?>
                                  <div class="col-sm-6">
                                      <div class="card mb-2">
                                          <div class="card-body">
                                              <h3 class="card-title"><?php echo $person->first_name . ' ' . $person->last_name; ?> <?php if ($person->sex == 'male') : ?>
                                                      <a type="button" class="btn btn-dark disabled">
                                                          <?= I_MAN ?></a>
                                                  <?php else : ?>
                                                      <a type="button" class="btn btn-info disabled"><?= I_WOMAN; ?>
                                                      <?php endif; ?></a>
                                              </h3>

                                              <p class="h5 mt-2" style="white-space: pre-line"><?php echo $person->comment ?></p>
                                          </div>
                                          <!-- Modal  -->
                                          <div class="col mx-2">
                                              <div class="btn-group mb-3" role="group" aria-label="Basic example">
                                                  <a href="<?php echo URLROOT . '/pepgroups/edit/' . $person->id; ?>" class="btn btn-primary"><?= I_EDIT ?> Edit</a>
                                                  <a href="<?php echo URLROOT . '/persons/show/' . $person->p_id; ?>" class="btn btn-light"><?= I_PERSON ?> Check</a>
                                                  <!-- Button trigger modal -->
                                                  <button type="button" class="btn btn-danger me-md-2" data-bs-toggle="modal" data-bs-target="#peplan<?= $person->p_id . $person->id ?>Modal"><?= I_DELETE ?>
                                                      <?= I_PERSON ?> Remove
                                                  </button>
                                              </div>
                                              <!-- Modal Edit -->
                                              <div class="modal fade" id="peplan<?= $person->p_id . $person->id ?>Modal" tabindex="-1" aria-labelledby="peplan<?= $person->p_id . $person->id ?>ModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog">
                                                      <div class="modal-content">
                                                          <div class="modal-header">
                                                              <h1 class="modal-title fs-5" id="peplan<?= $person->p_id . $person->id ?>ModalLabel">Delete <?= $person->title . ' ' . $person->first_name . ' ' . $person->last_name; ?> relation
                                                              </h1>
                                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                          </div>
                                                          <div class="modal-body">
                                                              If you continue, The group will NOT appear at <?= $person->first_name . ' ' . $person->last_name; ?>'s personal information page, NOR it will appear on <?= $person->title; ?> page.</div>
                                                          <div class="modal-footer">
                                                              <form method="post" action="<?php echo URLROOT; ?>/pepgroups/delete_pepgroup/<?= $person->id ?>">
                                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                  <button type="submit" class="btn btn-danger"><?= I_DELETE ?>
                                                                      delete</a>
                                                              </form>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                              </th>
                                          </div>
                                      </div>
                                  </div>
                              <?php endforeach; ?>

                              <div>
                                  <a class="btn btn-outline-secondary" href="<?php echo URLROOT . '/pepgroups/add/0/' . $data['title']['title']->id; ?>">Add someone else.</a>
                              </div>

                          <?php else : ?>
                              <div class="alert alert-warning" role="alert">
                                  <h6>No one in the database holds <?php echo $data['title']['title']->title; ?>.</h6>
                              </div>
                              <div><a class="btn btn-outline-secondary" href="<?php echo URLROOT . '/pepgroups/add/0/' . $data['title']['title']->id; ?>">Add someone.</a></div>

                          <?php endif; ?>
                          </div>
                  </div>
              </div>
          </div>
          <!-- <div class="accordion-item">
              <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                      Accordion Item #3
                  </button>
              </h2>
              <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                  <div class="accordion-body">
                      dummy
                  </div>
              </div>
          </div> -->
      </div>

  <?php else : redirect_to('');  ?>
  <?php endif;  ?>


  <?php //  echo '<pre>' . var_export($data, true) . '</pre>';    
    ?>


  <?php require APPROOT . '/views/includes/footer.php'; ?>