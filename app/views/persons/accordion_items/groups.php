<!-- groups -->
<div class="accordion-item">
    <h2 class="accordion-header" id="person_pannel_open-headingTwo">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#person_pannel_open-collapseTwo" aria-expanded="false" aria-controls="person_pannel_open-collapseTwo">
            <div class="row justify-content-between">
                <?php if (isset(($data['person']['g_count'])) && ($data['person']['g_count'] > 0)) : ?>
                    <div class="col">Groups</div>
                    <div class='position-relative col'><span class="badge bg-secondary position-relative"> total groups</span>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            <?= $data['person']['g_count'] ?>
                        </span>
                    </div>
                <?php else : ?>
                    <div class="col">No groups</div>
                <?php endif; ?>
            </div>
        </button>
    </h2>
    <div id="person_pannel_open-collapseTwo" class="accordion-collapse collapse" aria-labelledby="person_pannel_open-headingTwo">
        <div class="accordion-body">

            <?php if (isset(($data['person']['g_count'])) && ($data['person']['g_count'] > 0)) : ?>
                <a class="btn btn-primary" href="<?php echo URLROOT . '/pepgroups/add/' . $data['person']['person']->id; ?>">Add another group</a>
                <div class="row justify-content-between">
                    <?php foreach ($data['person']['groups'] as $group) : ?>
                        <div class="col-md-6 g-3">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row justify-content-between">
                                        <div class="col">
                                            <h2><?= $group->title ?? 'No Title' ?></h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="card-text" style="white-space: pre-line"><b>Group' description:</b></p>
                                    <p class="card-text" style="white-space: pre-line"> <?php if (strlen($group->g_description) > 150) {
                                                                                            echo substr($group->g_description, 0, 150) . ' ...';
                                                                                        } else {
                                                                                            echo $group->g_description;
                                                                                        }; ?></p>
                                    <?php if (strlen($group->comment) > 0) : ?>
                                        <p class="card-text" style="white-space: pre-line">
                                            <b>Personal comment:</b>
                                        </p>
                                        <p class="card-text" style="white-space: pre-line"> <?php if (strlen($group->comment) > 250) {
                                                                                                echo substr($group->comment, 0, 250) . '...';
                                                                                            } else {
                                                                                                echo $group->comment;
                                                                                            }; ?></p>
                                    <?php endif; ?>
                                    <a href="<?= URLROOT . '/pepgroups/show/' . $group->id ?>" class="btn btn-primary">more</a>
                                    <a href="<?= URLROOT . '/pepgroups/edit/' . $group->id ?>" class="btn btn-warning">Edit</a>
                                    <button type="button" class="btn btn-danger me-md-2" data-bs-toggle="modal" data-bs-target="#delete_pep_group<?= $group->id ?>Modal">Delete</button>
                                    <!-- Modal delete -->
                                    <div class="modal fade" id="delete_pep_group<?= $group->id ?>Modal" tabindex="-1" aria-labelledby="delete_pep_group<?= $group->id ?>ModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="delete_pep_group<?= $group->id ?>ModalLabel">Delete comment
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    If you continue, The group will NOT appear at <?= $data['person']['person']->first_name  . ' ' . $data['person']['person']->last_name ?>'s personal information page.</div>
                                                <div class="modal-footer">
                                                    <form action="<?= URLROOT ?>/pepgroups/delete_pepgroup/<?= $group->id ?>" method="post">
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
                <a class="btn btn-primary mt-3" href="<?php echo URLROOT . '/pepgroups/add/' . $data['person']['person']->id; ?>">Add another Group</a>
            <?php else : ?>
                <a class="btn btn-primary mb-3" href="<?php echo URLROOT . '/pepgroups/add/' . $data['person']['person']->id; ?>">Add Group</a>

                <div class="alert alert-warning" role="alert">
                    <h4 class="alert-heading">No groups were found for <?php echo $data['person']['person']->first_name . ' ' . $data['person']['person']->last_name; ?></h4>
                    <p>You can check the <a href="<?= URLROOT ?>/groups" class="alert-link">groups page</a> and use the search. </p>
                    <hr>
                    <p class="mb-0">Otherwise, you can add some titles by clicking on the add button, or by using <a href="<?= URLROOT ?>/pepgroups/add/<?= $data['person']['person']->id ?>" class="alert-link">this link</a>.</p>
                </div>
            <?php endif; ?>
        </div>


    </div>
</div>