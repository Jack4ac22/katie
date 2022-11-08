<!--  Job titl(s) -->
<div class="accordion-item">
    <h2 class="accordion-header" id="person_pannel_open-headingThree">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#person_pannel_open-collapseFour" aria-expanded="false" aria-controls="person_pannel_open-collapseFour">
            <div class="row justify-content-between">
                <?php if (isset(($data['person']['t_count'])) && ($data['person']['t_count'] > 0)) : ?>
                    <div class="col">Job titls</div>

                    <div class='position-relative col'><span class="badge bg-secondary position-relative"> total job-titles</span>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            <?= $data['person']['t_count'] ?>
                        </span>
                    </div>
                <?php else : ?>
                    <div class="col">No job titles</div>
                <?php endif; ?>
            </div>
        </button>
    </h2>
    <div id="person_pannel_open-collapseFour" class="accordion-collapse collapse" aria-labelledby="person_pannel_open-headingFour">
        <div class="accordion-body">
            <?php if (isset(($data['person']['t_count'])) && ($data['person']['t_count'] > 0)) : ?>
                <a class="btn btn-primary" href="<?php echo URLROOT . '/peptits/add/' . $data['person']['person']->id; ?>">Add another title</a>
                <div class="row justify-content-between">
                    <?php foreach ($data['person']['titles'] as $title) : ?>
                        <div class="col-md-6 g-3">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row justify-content-between">
                                        <div class="col">
                                            <h2><?= $title->title ?? 'No Title' ?> <a href="<?= URLROOT . '/titles/show/' . $title->t_id ?>"><?= I_INFO ?></a> </h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="card-text" style="white-space: pre-line"><b>Job-title description:</b></p>
                                    <p class="card-text" style="white-space: pre-line"> <?php if (strlen($title->t_description) > 150) {
                                                                                            echo substr($title->t_description, 0, 150) . ' ...';
                                                                                        } else {
                                                                                            echo $title->t_description;
                                                                                        }; ?>.</p>
                                    <?php if (strlen($title->description) > 0) : ?>
                                        <p class="card-text" style="white-space: pre-line">
                                            <b>personal description:</b>
                                        </p>
                                        <p class="card-text" style="white-space: pre-line"> <?php if (strlen($title->description) > 250) {
                                                                                                echo substr($title->description, 0, 250) . '...';
                                                                                            } else {
                                                                                                echo $title->description;
                                                                                            }; ?></p>
                                    <?php endif; ?>
                                    <a href="<?= URLROOT . '/peptits/show/' . $title->id ?>" class="btn btn-primary">more</a>
                                    <a href="<?= URLROOT . '/peptits/edit/' . $title->id ?>" class="btn btn-warning">Edit</a>
                                    <button type="button" class="btn btn-danger me-md-2" data-bs-toggle="modal" data-bs-target="#delete_peptitle<?= $title->id ?>Modal">Delete</button>
                                    <!-- Modal delete -->
                                    <div class="modal fade" id="delete_peptitle<?= $title->id ?>Modal" tabindex="-1" aria-labelledby="delete_peptitle<?= $title->id ?>ModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="delete_peptitle<?= $title->id ?>ModalLabel">Delete comment
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    If you continue, The title will NOT appear at <?= $data['person']['person']->first_name  . ' ' . $data['person']['person']->last_name ?>'s personal information page.</div>
                                                <div class="modal-footer">
                                                    <form action="<?= URLROOT ?>/peptits/delete_peptit/<?= $title->id ?>" method="post">
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
                <a class="btn btn-primary mt-3" href="<?php echo URLROOT . '/peptits/add/' . $data['person']['person']->id; ?>">Add another title</a>
            <?php else : ?>
                <div class="alert alert-warning" role="alert">
                    <h4 class="alert-heading">No job titles were found for <?php echo $data['person']['person']->first_name . ' ' . $data['person']['person']->last_name; ?></h4>
                    <p>You can check the <a href="<?= URLROOT ?>/titles" class="alert-link">job titles page</a> and use the search. </p>
                    <hr>
                    <p class="mb-0">Otherwise, you can add some titles by clicking on the add button, or by using <a href="<?= URLROOT ?>/peptits/add/<?= $data['person']['person']->id ?>" class="alert-link">this link</a>.</p>
                </div>
                <a class="btn btn-primary mt-3" href="<?php echo URLROOT . '/peptits/add/' . $data['person']['person']->id; ?>">Add a title</a>

            <?php endif; ?>
        </div>
    </div>
</div>