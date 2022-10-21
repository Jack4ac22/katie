<?php require APPROOT . '/views/includes/header.php'; ?>
<?php require APPROOT . '/views/includes/nav.php'; ?>
<?php flash('msg'); ?>
<?php //echo '<pre>' . var_export($data['comment'], true) . '</pre>';
?>
<div class="row justify-content-center">
    <div class="col-md-10 col-lg-9 g-3">
        <div class="card">
            <div class="card-header">
                <div class="row justify-content-between">
                    <div class="col">
                        <h2><?= $data['comment']->first_name . $data['comment']->last_name ?></h2>
                    </div>
                    <div class="col">
                        <?php if ($data['comment']->sex == 'male') : ?><h2><span class="badge rounded-pill text-bg-secondary"><?= I_MAN ?> Male</span></h2>
                        <?php else : ?>
                            <h2><span class="badge rounded-pill text-bg-info"><?= I_WOMAN ?> Female</span></h2>
                        <?php endif; ?>
                    </div>
                    <div class="col">
                        <a href="<?= URLROOT . '/persons/show/' . $data['comment']->p_id ?>" class="btn btn-primary">Check the profile</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h5 class="card-title mt-2"><?= $data['comment']->title ?? 'No Title'; ?></h5>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated
                            
                            <?php switch ($data['comment']->value) {
                                case $data['comment']->value > 80:
                                    echo 'bg-danger';
                                    break;
                                case $data['comment']->value > 60:
                                    echo 'bg-warning';
                                    break;
                                case $data['comment']->value > 40:
                                    echo 'bg-info';
                                    break;
                                case $data['comment']->value > 20:
                                    echo 'bg-success';
                                    break;
                                default:
                                    echo '';
                            } ?>
                            
                            " role="progressbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $data['comment']->value ?>%"></div>
                </div>



                <p class="card-text"><?= $data['comment']->text ?? 'No text'; ?>.</p>

                <a href="<?= URLROOT . '/comments/edit/' . $data['comment']->id ?>" class="btn btn-primary">Edit</a>
                <button type="button" class="btn btn-danger me-md-2" data-bs-toggle="modal" data-bs-target="#delete_comment<?= $data['comment']->id ?>Modal">Remove</button>
                <!-- Modal delete -->
                <div class="modal fade" id="delete_comment<?= $data['comment']->id ?>Modal" tabindex="-1" aria-labelledby="delete_comment<?= $data['comment']->id ?>ModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="delete_comment<?= $data['comment']->id ?>ModalLabel">Delete comment
                                </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                If you continue, The comment will NOT appear at <?= $data['comment']->first_name . ' ' . $data['comment']->last_name ?>'s personal information page.</div>
                            <div class="modal-footer">
                                <form action="<?= URLROOT ?>/comments/delete/<?= $data['comment']->id ?>" method="post">
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
</div>
<?php require APPROOT . '/views/includes/footer.php'; ?>