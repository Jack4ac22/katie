<?php require APPROOT . '/views/includes/header.php'; ?>
<?php flash('msg'); ?>
<?php // echo '<pre>' . var_export($data, true) . '</pre>';
?>

<form class="d-flex" role="search" method="get">
    <input class="form-control me-2" type="search" placeholder="Search for a comment" aria-label="Search" name="search" value="<?php if((isset($_GET['search'])) && (strlen($_GET['search'])>0)){echo $_GET['search'];} ?>">
    <button class="btn btn-outline-primary" type="submit"><?= I_SEARCH ?> search</button>
</form>
<div class="mt-3">
    <a type="button" class="btn btn-primary" href="<?php echo URLROOT; ?>/comments/add">
        <?= I_ADD_SIGN ?> new comment</a>
</div>

<div class="row justify-content-between">
    <?php if (count($data['comments']) > 0) : ?>
        <?php foreach ($data['comments'] as $comment) : ?>
            <div class="col-md-6 g-3">
                <div class="card">
                    <div class="card-header">
                        <div class="row justify-content-between">
                            <div class="col">
                                <h2><?= "$comment->first_name $comment->last_name" ?></h2>
                            </div>
                            <div class="col">
                                <?php if ($comment->sex == 'male') : ?><h2><span class="badge rounded-pill text-bg-secondary"><?= I_MAN ?> Male</span></h2>
                                <?php else : ?>
                                    <h2><span class="badge rounded-pill text-bg-info"><?= I_WOMAN ?> Female</span></h2>
                                <?php endif; ?>
                            </div>
                            <div class="col">
                                <a href="<?= URLROOT . '/persons/show/' . $comment->p_id ?>" class="btn btn-primary">Check the profile</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title mt-2"><?= $comment->title ?? 'No Title'; ?></h5>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated
                            
                            <?php switch ($comment->value) {
                                case $comment->value > 80:
                                    echo 'bg-danger';
                                    break;
                                case $comment->value > 60:
                                    echo 'bg-warning';
                                    break;
                                case $comment->value > 40:
                                    echo 'bg-info';
                                    break;
                                case $comment->value > 20:
                                    echo 'bg-success';
                                    break;
                                default:
                                    echo '';
                            } ?>
                            
                            " role="progressbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $comment->value ?>%"></div>
                        </div>

                        <p class="card-text" style="white-space: pre-line"><?php if (strlen($comment->text) > 150) {
                                                                                echo substr($comment->text, 0, 150) . ' ...';
                                                                            } else {
                                                                                echo $comment->text;
                                                                            }; ?>.</p>

                        <a href="<?= URLROOT . '/comments/show/' . $comment->id ?>" class="btn btn-primary">read</a>
                        <a href="<?= URLROOT . '/comments/edit/' . $comment->id ?>" class="btn btn-warning">Edit</a>
                        <button type="button" class="btn btn-danger me-md-2" data-bs-toggle="modal" data-bs-target="#delete_comment<?= $comment->id ?>Modal">Remove</button>
                        <!-- Modal delete -->
                        <div class="modal fade" id="delete_comment<?= $comment->id ?>Modal" tabindex="-1" aria-labelledby="delete_comment<?= $comment->id ?>ModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="delete_comment<?= $comment->id ?>ModalLabel">Delete comment
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        If you continue, The comment will NOT appear at <?= $comment->first_name . ' ' . $comment->last_name ?>'s personal information page.</div>
                                    <div class="modal-footer">
                                        <form action="<?= URLROOT ?>/comments/delete/<?= $comment->id ?>" method="post">
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