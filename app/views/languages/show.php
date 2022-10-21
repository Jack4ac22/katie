  <?php require APPROOT . '/views/includes/header.php'; ?>
  <a href="<?php echo URLROOT; ?>/languages" class="btn btn-light"><?= I_ARROW_L ?> Back to all languages.</a>
  <!-- <?php echo '<pre>' . var_export($data['language'], true) . '</pre>'; ?> -->
  <?php flash('msg'); ?>
  <?php if (islogged()) : ?>
      <div class="accordion" id="accordionPanelsStayOpenExample">
          <div class="accordion-item">
              <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                      <h2 class="card-header"> Language details</h2>
                  </button>
              </h2>
              <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                  <div class="accordion-body">
                      <h2 class="card-header mt-3">Title: <?php echo $data['language']['language']->title; ?></h2>
                      <?php if ($data['language']['language']->description != null) : ?>
                          <h5 class="card-title mt-3">
                              Description:<?php echo $data['language']['language']->description; ?></h5>
                      <?php endif; ?>
                      <?php if ($data['language']['language']->extra != null) : ?>
                          <p class="card-text mt-3"><?php echo $data['language']['language']->extra; ?></p>
                      <?php endif; ?>
                      <div class="mt-3">
                          <a class="btn btn-warning" href="<?php echo URLROOT; ?>/languages/edit/<?php echo $data['language']['language']->id; ?>"><?= I_EDIT ?>
                              Edit</a>
                          <!-- Button trigger modal -->
                          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#<?= $data['language']['language']->title . $data['language']['language']->id ?>Modal">
                              <?= I_DELETE ?> delete
                          </button>
                          <!-- Modal -->
                          <div class="modal fade" id="<?= $data['language']['language']->title . $data['language']['language']->id ?>Modal" tabindex="-1" aria-labelledby="<?= $data['language']['language']->title . $data['language']['language']->id ?>ModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h1 class="modal-title fs-5" id="<?= $data['language']['language']->title . $data['language']['language']->id ?>ModalLabel">Delete <? echo $data['language']['language']->title; ?></h1>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                          Are you sure you want to delete <?php echo $data['language']['language']->title; ?>?
                                      </div>
                                      <div class="modal-footer">
                                          <form action="<?php echo URLROOT; ?>/languages/delete/<?php echo $data['language']['language']->id; ?>" method="post">
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
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                      <h2 class="card-header"> peopl related to this language </h2>
                  </button>
              </h2>
              <div id="panelsStayOpen-collapseTwo" class="accordion-collapse show" aria-labelledby="panelsStayOpen-headingTwo">
                  <div class="accordion-body">
                      <?php if (count($data['language']['people']) > 0) : ?>
                          <div class="row">

                              <?php foreach ($data['language']['people'] as $person) : ?>
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
                                              <div class="progress">
                                                  <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $person->levle ?>%"></div>
                                                  <div class="progress">

                                                  </div>
                                              </div>
                                              <p class="h5 mt-2"><?php echo $person->comment ?></p>
                                          </div>
                                          <!-- Modal  -->
                                          
                                          <div class="col">
                                              <div class="btn-group mb-3" role="group" aria-label="Basic example">
                                                  <a href="<?php echo URLROOT . '/peplans/edit/' . $person->id; ?>" class="btn btn-primary"><?= I_LANGUAGE ?> Level</a>
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
                                                              If you continue, The language will NOT appear at <?= $person->first_name . ' ' . $person->last_name; ?>'s personal information page, NOR he will appear on <?= $person->title; ?> page.</div>
                                                          <div class="modal-footer">
                                                              <form method="post" action="<?php echo URLROOT; ?>/peplans/delete_peplan/<?= $person->id ?>">
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
                                  <a class="btn btn-outline-secondary" href="<?php echo URLROOT . '/peplans/add/0/' . $data['language']['language']->id; ?>">Add someone else.</a>
                              </div>

                          <?php else : ?>
                              <div class="alert alert-warning" role="alert">
                                  <h6>No one in the database speaks <?php echo $data['language']['language']->title; ?>.</h6>
                              </div>
                              <div><a class="btn btn-outline-secondary" href="<?php echo URLROOT . '/peplans/add/0/' . $data['language']['language']->id; ?>">Add someone.</a></div>

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
  <?php endif; ?>

  <?php

    //  echo '<pre>' . var_export($data, true) . '</pre>';
    ?>

  <?php require APPROOT . '/views/includes/footer.php'; ?>