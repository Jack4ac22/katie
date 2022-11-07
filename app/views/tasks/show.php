<?php require APPROOT . '/views/includes/header.php'; ?>
<?php flash('msg'); ?>
<?php //echo '<pre>' . var_export($data['task'], true) . '</pre>';
?>
<div class="row justify-content-center">
    <div class="col-md-10 col-lg-9 g-3">
        <div class="card">
            <div class="card-header">
                <div class="row justify-content-between">
                    <div class="col">
                        <h2><?= $data['task']->first_name . $data['task']->last_name ?></h2>
                    </div>
                    <div class="col">
                        <?php if ($data['task']->sex == 'male') : ?><h2><span class="badge rounded-pill text-bg-secondary"><?= I_MAN ?> Male</span></h2>
                        <?php else : ?>
                            <h2><span class="badge rounded-pill text-bg-info"><?= I_WOMAN ?> Female</span></h2>
                        <?php endif; ?>
                    </div>
                    <div class="col">
                        <a href="<?= URLROOT . '/persons/show/' . $data['task']->p_id ?>" class="btn btn-primary">Check the profile</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h5 class="card-title mt-2"><?= $data['task']->title ?? 'No Title'; ?></h5>
                <p class="card-text" style="white-space: pre-line"><?= $data['task']->text ?? 'No text'; ?></p>
                <?php if ($data['task']->d_date !== null) : ?>
                        <p class="card-text" style="white-space: pre-line">Due date: <?php
                                                                                        $date = date_create($data['task']->d_date);
                                                                                        echo date_format($date, "d / M / Y"); ?></p>
                    <?php endif ?>




                <a href="<?= URLROOT . '/tasks/edit/' . $data['task']->id ?>" class="btn btn-primary">Edit</a>
                <button type="button" class="btn btn-danger me-md-2" data-bs-toggle="modal" data-bs-target="#delete_task<?= $data['task']->id ?>Modal">Remove</button>
                <!-- Modal delete -->
                <div class="modal fade" id="delete_task<?= $data['task']->id ?>Modal" tabindex="-1" aria-labelledby="delete_task<?= $data['task']->id ?>ModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="delete_task<?= $data['task']->id ?>ModalLabel">Delete task
                                </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                If you continue, The task will NOT appear at <?= $data['task']->first_name . ' ' . $data['task']->last_name ?>'s personal information page.</div>
                            <div class="modal-footer">
                                <form action="<?= URLROOT ?>/tasks/delete/<?= $data['task']->id ?>" method="post">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger"><?= I_DELETE ?>
                                        Delete</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <button type="button" class="btn btn-dark me-md-2" data-bs-toggle="modal" data-bs-target="#hid_task<?= $data['task']->id ?>Modal">Hide</button>
                <!-- Modal delete -->
                <div class="modal fade" id="hid_task<?= $data['task']->id ?>Modal" tabindex="-1" aria-labelledby="hid_task<?= $task->id ?>ModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="hid_task<?= $data['task']->id ?>ModalLabel">Hide task
                                </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                If you continue, The task will NOT appear at <?= $data['task']->first_name . ' ' . $data['task']->last_name ?>'s personal information page.</div>
                            <div class="modal-footer">
                                <form action="<?= URLROOT ?>/tasks/hide/<?= $data['task']->id ?>" method="post">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger">
                                        Hide</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/includes/footer.php'; ?>