 <!-- personal information -->
 <div class="accordion-item">
            <h2 class="accordion-header" id="person_pannel_open-headingOne">
                <button class="accordion-button show" type="button" data-bs-toggle="collapse" data-bs-target="#person_pannel_open-collapseOne" aria-expanded="false" aria-controls="person_pannel_open-collapseOne">

                    Personal
                </button>
            </h2>
            <div id="person_pannel_open-collapseOne" class="accordion-collapse collapse show" aria-labelledby="person_pannel_open-headingOne">
                <div class="accordion-body">
                    <div class="container">
                        <div class="row justify-content-between">
                            <div class="col">
                                <h3 class="mt-0">Full name:
                                    <?php echo $data['person']['person']->first_name . ' ' . $data['person']['person']->last_name; ?>
                                </h3>
                                <h3 class="mt-3">
                                    Gender:
                                    <?php if ($data['person']['person']->sex == 'male') : ?>
                                        <span class="badge rounded-pill text-bg-dark">male</span>
                                    <?php else : ?>
                                        <span class="badge rounded-pill text-bg-info">female</span>
                                    <?php endif; ?>
                                    </a>
                                </h3>
                                <div class="container mb-3">
                                    <a href="mailto:<?php echo $data['person']['person']->email ?>" class="btn btn-light">
                                        <span class="alert alert-light"><?= I_EMAIL ?> Email: </a></span>
                                    <span> <?php echo $data['person']['person']->email ?> </span>
                                </div>
                                <div class="container mb-3">
                                    <span class="alert alert-light">
                                        <?= I_DATE ?> birthday: </span>
                                    <span> <?php echo $data['person']['person']->birthday ?> </span>
                                </div>

                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="mt-5">
                                            <a href="<?php echo URLROOT . '/persons/edit/' . $data['person']['person']->id; ?>" type="button" class="btn btn-warning"><?= I_EDIT ?> Edit</a>
                                            <a href="<?php echo URLROOT . '/images/upload/' . $data['person']['person']->id; ?>" type="button" class="btn btn-primary"><?= I_PIC ?> Update the profile picture</a>
                                            <!-- Modal  -->
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-danger me-md-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <?= I_DELETE ?> delete
                                            </button>
                                            <!-- Modal Edite -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Deleting <?php echo $data['person']['person']->first_name . ' ' . $data['person']['person']->last_name; ?>
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure that you want to delete this person.</div>
                                                        <div class="modal-footer">
                                                            <form method="post" action="<?php echo URLROOT; ?>/persons/delete_person/<?php echo $data['person']['person']->id ?>/<?php echo $data['person']['person']->id; ?>">
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
                </div>
            </div>
        </div>