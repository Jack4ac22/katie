  <?php require APPROOT . '/views/includes/header.php'; ?>
  <a href="<?php echo URLROOT; ?>/languages" class="btn btn-light"><?= I_ARROW_L ?> Back</a>
  <!-- <?php echo '<pre>' . var_export($data, true) . '</pre>'; ?> -->

  <?php if (islogged()) : ?>
      <div class="accordion" id="accordionPanelsStayOpenExample">
          <div class="accordion-item">
              <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                      Language details </button>
              </h2>
              <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                  <div class="accordion-body">
                      <h2 class="card-header"><?php echo $data['language']['language']->title; ?></h2>
                      <h5 class="card-title"><?php echo $data['language']['language']->description; ?></h5>
                      <pclass="card-text"><?php echo $data['language']['language']->extra; ?></p>
                          <div class="btn-group" role="group" aria-label="Basic example">
                              <form action="<?php echo URLROOT; ?>/languages/delete/<?php echo $data['language']['language']->id; ?>" method="post">
                                  <a class="btn btn-warning" href="<?php echo URLROOT; ?>/languages/edit/<?php echo $data['language']['language']->id; ?>"><?= I_EDIT ?>
                                      Edit</a>
                                  <button type="submit" class="btn btn-danger"><?= I_DELETE ?> DELETE</button>
                              </form>
                          </div>
                  </div>
              </div>
          </div>
          <div class="accordion-item">
              <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                      peopl related to this language </button>
              </h2>
              <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                  <div class="accordion-body">
                      <?php if (isset($data['language']['people'])) : ?>
                          <?php foreach ($data['language']['people'] as $person) : ?>
                              <h3 class="card-title"><?php echo $person->first_name . ' ' . $person->last_name; ?>
                                  <a href="<?php echo URLROOT . '/persons/show/' . $person->p_id; ?>" class="btn btn-light"><?= I_INFO ?></i></a>
                              </h3>
                          <?php endforeach; ?>
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