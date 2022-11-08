 <!-- relations -->
 <div class="accordion-item">
            <h2 class="accordion-header" id="headingrelations">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapserelations" aria-expanded="false" aria-controls="collapserelations">
                    <div class="row justify-content-between">
                        <?php if (count($data['person']['relations']) > 0) : ?>
                            <div class="col">Relations</div>

                            <div class='position-relative col'><span class="badge bg-secondary position-relative"> total realtions:</span>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    <?= count($data['person']['relations']) ?>
                                </span>
                            </div>
                        <?php else : ?>
                            <div class="col">No people related to <?= $data['person']['person']->first_name ?></div>
                        <?php endif; ?>
                    </div>
                </button>
            </h2>
            <div id="collapserelations" class="accordion-collapse collapse" aria-labelledby="headingrelations" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div class="col-12 mt-3">
                        <?php if ((isset($data['person']['relations'])) && (count($data['person']['relations']) > 0)) : ?>
                            <h5 class=" mb-3">relationships</h5>
                            <a href="<?php echo URLROOT . '/persons/add_relation/' . $data['person']['person']->id; ?>" class="btn btn-primary mb-3"><?= I_ADD_SIGN ?> add another relationship</a>

                            <div class="row  mb-3">
                                <?php foreach ($data['person']['relations'] as $relation) : ?>
                                    <div class="col-m-4 col-lg-3">
                                        <div class="card mb-3">
                                            <div class=" row g-0">
                                                <div class="col-md-4">
                                                    <a href="<?php echo URLROOT . '/persons/show/' . $relation->id; ?>">
                                                        <?php if ($relation->img != null) : ?>
                                                            <img src="<?= IMGROOT . '/' . $relation->img ?>" class="img-thumbnail rounded" alt="<?= $relation->first_name . ' ' . $relation->last_name . ' image' ?>">
                                                        <?php else : ?>
                                                            <?php if ($relation->sex != 'male') : ?>
                                                                <img src="<?= IMGROOT . '/' . 'female.png' ?>" class="img-thumbnail rounded" alt="female">
                                                            <?php else : ?>
                                                                <img src="<?= IMGROOT . '/' . 'male.png' ?>" class="img-thumbnail rounded" alt="male">
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    </a>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><?= $relation->description ?></h5>
                                                        <p class="card-text"><?= $relation->first_name . ' ' . $relation->last_name ?></p>
                                                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                            <a href="<?php echo URLROOT . '/persons/show/' . $relation->id; ?>" class="btn btn-light"><?= I_PERSON ?></a>

                                                            <a href="<?php echo URLROOT . '/persons/edit_relation/' . $relation->r_id; ?>" class="btn btn-warning"><?= I_EDIT ?></a>


                                                            <!-- Button trigger modal -> delete phone -->
                                                            <button type="button" class="btn btn-danger me-md-2" data-bs-toggle="modal" data-bs-target="#delete_relation<?= $relation->r_id ?>">
                                                                <?= I_DELETE ?></button>
                                                            <!-- Modal Edite -->
                                                            <div class="modal fade" id="delete_relation<?= $relation->r_id ?>" tabindex="-1" aria-labelledby="delete_relation<?= $relation->r_id ?>lLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h1 class="modal-title fs-5" id="delete_relation<?= $relation->r_id ?>Label">Deleting relationship</h1>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p>Are you sure that you want to delete the Relationship between <mark><?= $data['person']['person']->first_name . ' ' . $data['person']['person']->last_name ?></mark> and <mark><?= $relation->first_name . ' ' . $relation->last_name ?></mark>.</p>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <form method="post" action="<?php echo URLROOT; ?>/persons/delete_relation/<?php echo $relation->r_id ?>">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                <button type="submit" class="btn btn-danger"><?= I_DELETE ?>
                                                                                    delete</a>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php else : ?>
                            <a href="<?php echo URLROOT . '/persons/add_relation/' . $data['person']['person']->id; ?>" class="btn btn-primary mb-3"><?= I_ADD_SIGN ?> add relationship</a>

                            <div class="alert alert-warning" role="alert">
                                <h6>No relationships were found for this person in the database.</h6>
                            </div>
                        <?php endif; ?>
                        <div class="container">

                        </div>
                    </div>
                </div>
            </div>
        </div>