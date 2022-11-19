<?php require APPROOT . '/views/includes/header.php'; ?>
<?php flash('msg'); ?>
<?php //echo '<pre>' . var_export($data['prayer'], true) . '</pre>';
?>
<div class="row justify-content-between">
    <?php foreach ($data['prayer'] as $prayer) : ?>
        <div class="col-md-6 g-3">
        <div class="card <?php if ($prayer->status == "show") {
                                        echo "border-primary";
                                    } else {
                                        echo "border-secondary";
                                    } ?>">
                <div class="card-header">
                    <div class="row justify-content-between">
                        <div class="col">
                            <h2><?= "$prayer->first_name $prayer->last_name" ?></h2>
                        </div>
                        <div class="col">
                            <?php if ($prayer->sex == 'male') : ?><h2><span class="badge rounded-pill text-bg-secondary"><?= I_MAN ?> Male</span></h2>
                            <?php else : ?>
                                <h2><span class="badge rounded-pill text-bg-info"><?= I_WOMAN ?> Female</span></h2>
                            <?php endif; ?>
                        </div>
                        <div class="col">
                            <a href="<?= URLROOT . '/persons/show/' . $prayer->p_id ?>" class="btn btn-primary">Check the profile</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title mt-2"><?= $prayer->title ?? 'No Title'; ?></h5>
                    <p class="card-text" style="white-space: pre-line"><?php if (strlen($prayer->text) > 150) {
                                                                            echo substr($prayer->text, 0, 150) . ' ...';
                                                                        } else {
                                                                            echo $prayer->text;
                                                                        }; ?></p>

                    <a href="<?= URLROOT . '/prayers/show/' . $prayer->id ?>" class="btn btn-primary">read</a>
                    <a href="<?= URLROOT . '/prayers/edit/' . $prayer->id ?>" class="btn btn-warning">Edit</a>
                    <button type="button" class="btn btn-danger me-md-2" data-bs-toggle="modal" data-bs-target="#delete_prayer<?= $prayer->id ?>Modal">Remove</button>
                    <!-- Modal delete -->
                    <div class="modal fade" id="delete_prayer<?= $prayer->id ?>Modal" tabindex="-1" aria-labelledby="delete_prayer<?= $prayer->id ?>ModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="delete_prayer<?= $prayer->id ?>ModalLabel">Delete prayer
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    If you continue, The prayer will NOT appear at <?= $prayer->first_name . ' ' . $prayer->last_name ?>'s personal information page.</div>
                                <div class="modal-footer">
                                    <form action="<?= URLROOT ?>/prayers/delete/<?= $prayer->id ?>" method="post">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger"><?= I_DELETE ?>
                                            Delete</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="button" class="btn btn-dark me-md-2" data-bs-toggle="modal" data-bs-target="#hid_prayer<?= $prayer->id ?>Modal" <?php if ($prayer->status != "show") {
                                                                                                                                                        echo "disabled";
                                                                                                                                                    } ?>>Hide</button>
                    <!-- Modal delete -->
                    <div class="modal fade" id="hid_prayer<?= $prayer->id ?>Modal" tabindex="-1" aria-labelledby="hid_prayer<?= $prayer->id ?>ModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="hid_prayer<?= $prayer->id ?>ModalLabel">Hide prayer
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    If you continue, The prayer will NOT appear at <?= $prayer->first_name . ' ' . $prayer->last_name ?>'s personal information page.</div>
                                <div class="modal-footer">
                                    <form action="<?= URLROOT ?>/prayers/hide/<?= $prayer->id ?>" method="post">
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
</div>
<?php require APPROOT . '/views/includes/footer.php'; ?>