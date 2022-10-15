<!-- <?php echo '<pre>' . var_export($data, true) . '</pre>'; ?> -->
<?php require APPROOT . '/views/includes/header.php'; ?>
<?php flash('msg'); ?>

<a href="<?php echo URLROOT; ?>/peplans" class="btn btn-light"><?= I_ARROW_L ?> Back</a>

<?php if (islogged()) : ?>
    <?php if (isset($data->id)) : ?>

        <div class="card">
            <h5 class="card-header"><?= $data->first_name . ' ' . $data->last_name . ' speaks ' . $data->title ?></h5>
            <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            </div>
            <div class="card-body">



                <button class="btn btn-warning" type="button"><?= I_EDIT ?> Edit</button>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <?= I_DELETE ?> Delete
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel"><?= I_EXCLAIM ?> Deleting personal information</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>You will not be able to restor the folowing information:</p>
                                <p><strong><?= $data->first_name . ' ' . $data->last_name . ' speaks ' . $data->title ?></strong></p>
                            </div>
                            <div class="modal-footer">
                                <form action="<?php echo URLROOT; ?>/peplans/delete_peplan/<?php echo $data->id ?>" method="post">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <form action="<?php echo URLROOT; ?>/peplans/delete_peplan/<?php echo $data->id ?>" method="post">
                                        <button type="submit" class="btn btn-danger"><?= I_EXCLAIM ?> Delete</button>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
                </form>



            </div>
        </div>
    <?php else : ?>

    <?php endif; ?>
<?php endif; ?>


<?php require APPROOT . '/views/includes/footer.php'; ?>