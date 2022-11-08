  <!--  passports(s) -->
  <div class="accordion-item">
            <h2 class="accordion-header" id="person_pannel_open-headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#person_pannel_open-collapse-passports" aria-expanded="false" aria-controls="person_pannel_open-collapse-passports">
                    <div class="row justify-content-between">
                        <?php if (isset(($data['person']['n_count'])) && ($data['person']['n_count'] > 0)) : ?>
                            <div class="col">Passports</div>

                            <div class='position-relative col'><span class="badge bg-secondary position-relative"> total passports</span>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    <?= $data['person']['n_count'] ?>
                                </span>
                            </div>
                        <?php else : ?>
                            <div class="col">No Passports</div>
                        <?php endif; ?>
                    </div>
                </button>
            </h2>
            <div id="person_pannel_open-collapse-passports" class="accordion-collapse collapse" aria-labelledby="person_pannel_open-heading-passports">
                <div class="accordion-body">
                    <?php if (isset(($data['person']['n_count'])) && ($data['person']['n_count'] > 0)) : ?>
                        <a class="btn btn-primary" href="<?php echo URLROOT . '/pepcous/add/' . $data['person']['person']->id; ?>">Add another passport</a>
                        <div class="row justify-content-between">
                            <?php foreach ($data['person']['passports'] as $passport) : ?>
                                <div class="col-md-6 g-3">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="row justify-content-between">
                                                <div class="col">
                                                    <h2><?= $passport->en_short_name ?? 'No name' ?> <a href="<?= URLROOT . '/pepcous/show_c/' . $passport->c_id ?>"><?= I_INFO ?></a> </h2>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text" style="white-space: pre-line"><b>Nationality:</b> <?= $passport->nationality ?? 'No name' ?> </p>
                                            <p class="card-text" style="white-space: pre-line"> </p>
                                            <a href="<?= URLROOT . '/pepcous/show/' . $passport->id ?>" class="btn btn-primary">more</a>
                                            <a href="<?= URLROOT . '/pepcous/edit/' . $passport->id ?>" class="btn btn-warning">Edit</a>
                                            <button type="button" class="btn btn-danger me-md-2" data-bs-toggle="modal" data-bs-target="#delete_passport<?= $passport->id ?>Modal">Delete</button>
                                            <!-- Modal delete -->
                                            <div class="modal fade" id="delete_passport<?= $passport->id ?>Modal" tabindex="-1" aria-labelledby="delete_passport<?= $passport->id ?>ModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="delete_passport<?= $passport->id ?>ModalLabel">Delete comment
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            If you continue, The title will NOT appear at <?= $data['person']['person']->first_name  . ' ' . $data['person']['person']->last_name ?>'s personal information page.</div>
                                                        <div class="modal-footer">
                                                            <form action="<?= URLROOT ?>/pepcous/delete_pepcou/<?= $passport->id ?>" method="post">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-danger"><?= I_DELETE ?>
                                                                    Delete</a>
                                                            </form>
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
                        <a class="btn btn-primary mb-3" href="<?php echo URLROOT . '/pepcous/add/' . $data['person']['person']->id; ?>">Add passport</a>
                        <div class="alert alert-warning" role="alert">
                            <h4 class="alert-heading">No passport was cound for <?php echo $data['person']['person']->first_name . ' ' . $data['person']['person']->last_name; ?></h4>
                            <p>You can check the <a href="<?= URLROOT ?>/pepcous" class="alert-link">countries page</a> and use the search. </p>
                            <hr>
                            <p class="mb-0">Otherwise, you can add a passport by clicking on the add button, or by using <a href="<?= URLROOT ?>/pepcous/add/<?= $data['person']['person']->id ?>" class="alert-link">this link</a>.</p>
                        </div>

                    <?php endif; ?>
                </div>
            </div>
        </div>