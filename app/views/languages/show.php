  <?php require APPROOT . '/views/includes/header.php'; ?>
  <a href="<?php echo URLROOT; ?>/languages" class="btn btn-light"><?= I_ARROW_L ?> Back to all languages.</a>
  <!-- <?php echo '<pre>' . var_export($data, true) . '</pre>'; ?> -->
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
                          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                              <?= I_DELETE ?> delete
                          </button>
                          <!-- Modal -->
                          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h1 class="modal-title fs-5" id="exampleModalLabel">Delete <?php echo $data['language']['language']->title; ?></h1>
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
              <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                  <div class="accordion-body">
                      <?php if (isset($data['language']['people'])) : ?>

                          <table class="table">
                              <thead>
                                  <tr>
                                      <th scope="col">person</th>
                                      <th scope="col">gender</th>
                                      <th scope="col">levle</th>
                                      <th scope="col">comment</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <!-- person colum -->
                                  <?php foreach ($data['language']['people'] as $person) : ?> <tr>
                                          <th scope="row"><a href="<?php echo URLROOT . '/persons/show/' . $person->p_id; ?>" class="btn btn-light"><?php echo $person->first_name . ' ' . $person->last_name; ?></a></th>
                                          <!-- GEnder Column -->
                                          <td>
                                              <?php if ($person->sex == 'male') : ?>
                                                  <a type="button" class="btn btn-dark disabled">
                                                      <span class="badge text-bg-dark">
                                                          <?= I_MAN ?>
                                                      </span>
                                                  <?php else : ?>
                                                      <a type="button" class="btn btn-info disabled">
                                                          <span class="badge text-bg-info"><?= I_WOMAN; ?>
                                                          </span>
                                                      <?php endif; ?>
                                          </td>
                                          <!-- level column -->
                                          <td>
                                              <div class="progress">
                                                  <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $person->levle ?>%"></div>
                                              </div>
                                          </td>
                                          <td><?php echo $person->comment ?></td>
                                      </tr>

                                  <?php endforeach; ?>
                              </tbody>
                          </table>


                          <a class="btn btn-outline-secondary" href="<?php echo URLROOT . '/peplans/add/0/' . $data['language']['language']->id; ?>">Add someone else.</a>

                      <?php else : ?>
                          <div class="alert alert-warning" role="alert">
                              <h6>No one in the database speaks <?php echo $data['language']['language']->title; ?>.</h6>
                          </div>
                          <a class="btn btn-outline-secondary" href="<?php echo URLROOT . '/peplans/add/0/' . $data['language']['language']->id; ?>">Add someone.</a>

                      <?php endif; ?>

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