<?php require APPROOT . '/views/includes/header.php'; ?>
<?php flash('msg'); ?>
<?php //echo '<pre>' . var_export($data, true) . '</pre>';
?>
<form class="d-flex" role="search" method="get">
    <input class="form-control me-2" type="search" placeholder="Search for a task" aria-label="Search" name="search" value="<?php if ((isset($_GET['search'])) && (strlen($_GET['search']) > 0)) {
                                                                                                                                echo $_GET['search'];
                                                                                                                            } ?>">
    <button class="btn btn-outline-primary" type="submit"><?= I_SEARCH ?> search</button>
</form>
<div class="mt-3">
    <a type="button" class="btn btn-primary" href="<?php echo URLROOT; ?>/tasks/add">
        <?= I_ADD_SIGN ?> new task</a>
</div>
<div class="row justify-content-between">
    <?php if (count($data['tasks']) > 0) : ?>
        <?php foreach ($data['tasks'] as $task) : ?>
            <div class="col-md-6 g-3">
            <div class="card <?php if ($task->status == "show") {
                                        echo "border-primary";
                                    } else {
                                        echo "border-secondary";
                                    } ?>">
                    <div class="card-header">
                        <div class="row justify-content-between">
                            <div class="col">
                                <h2><?= "$task->first_name $task->last_name" ?></h2>
                            </div>
                            <div class="col">
                                <?php if ($task->sex == 'male') : ?><h2><span class="badge rounded-pill text-bg-secondary"><?= I_MAN ?> Male</span></h2>
                                <?php else : ?>
                                    <h2><span class="badge rounded-pill text-bg-info"><?= I_WOMAN ?> Female</span></h2>
                                <?php endif; ?>
                            </div>
                            <div class="col">
                                <a href="<?= URLROOT . '/persons/show/' . $task->p_id ?>" class="btn btn-primary">Check the profile</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title mt-2"><?= $task->title ?? 'No Title'; ?></h5>
                        <p class="card-text" style="white-space: pre-line"><?php if (strlen($task->text) > 150) {
                                                                                echo substr($task->text, 0, 150) . ' ...';
                                                                            } else {
                                                                                echo $task->text;
                                                                            }; ?></p>
<?php if ($task->d_date !== null) : ?>
                            <p class="card-text" style="white-space: pre-line">Due date: <?php
                                                                                            $date = date_create($task->d_date);
                                                                                            echo date_format($date, "d / M / Y"); ?></p>
                        <?php endif ?>

                        <a href="<?= URLROOT . '/tasks/show/' . $task->id ?>" class="btn btn-primary">read</a>
                        <a href="<?= URLROOT . '/tasks/edit/' . $task->id ?>" class="btn btn-warning">Edit</a>
                        <button type="button" class="btn btn-danger me-md-2" data-bs-toggle="modal" data-bs-target="#delete_task<?= $task->id ?>Modal">Remove</button>
                        <!-- Modal delete -->
                        <div class="modal fade" id="delete_task<?= $task->id ?>Modal" tabindex="-1" aria-labelledby="delete_task<?= $task->id ?>ModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="delete_task<?= $task->id ?>ModalLabel">Delete task
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        If you continue, The task will NOT appear at <?= $task->first_name . ' ' . $task->last_name ?>'s personal information page.</div>
                                    <div class="modal-footer">
                                        <form action="<?= URLROOT ?>/tasks/delete/<?= $task->id ?>" method="post">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger"><?= I_DELETE ?>
                                                Delete</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="button" class="btn btn-dark me-md-2" data-bs-toggle="modal" data-bs-target="#hid_task<?= $task->id ?>Modal">Hide</button>
                        <!-- Modal delete -->
                        <div class="modal fade" id="hid_task<?= $task->id ?>Modal" tabindex="-1" aria-labelledby="hid_task<?= $task->id ?>ModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="hid_task<?= $task->id ?>ModalLabel">Hide task
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        If you continue, The task will NOT appear at <?= $task->first_name . ' ' . $task->last_name ?>'s personal information page.</div>
                                    <div class="modal-footer">
                                        <form action="<?= URLROOT ?>/tasks/hide/<?= $task->id ?>" method="post">
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
        <?php endforeach; ?>
    <?php else : ?>
        <div class="row ">
            <div class="col-md-6 offset-md-3">
                <div class="alert alert-warning" role="alert">
                    <p><b>No </b> matches were found in your database.</p>
                </div>
            </div>
        </div>

    <?php endif; ?>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>