<?php require_once APPROOT . '/views/includes/header.php'; ?>
<?php flash('msg'); ?>
<!-- <?php echo '<pre>' . var_export($data, true) . '</pre>'; ?> -->


<div class="accordion accordion-flush" id="accordionFlushpictures">

    <?php foreach ($data['persons'] as $person) : ?>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-heading<?= $person->first_name . $person->id ?>">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?= $person->first_name . $person->id ?>" aria-expanded="false" aria-controls="flush-collapse<?= $person->first_name . $person->id ?>">
                    <h3> <?= $person->first_name . ' ' . $person->last_name ?> </h3>
                </button>
            </h2>
            <div id="flush-collapse<?= $person->first_name . $person->id ?>" class="accordion-collapse collapse" aria-labelledby="flush-heading<?= $person->first_name . $person->id ?>" data-bs-parent="#accordionFlushpictures">
                <div class="accordion-body">
                    <div class="row justify-content-center">
                        <div class="card-group">
                            <?php foreach ($data['images'] as $img) : ?>
                                <?php if ($img->p_id == $person->id) : ?>
                                    <div class=" col-md-6 col-lg-4">
                                        <div class="card" style="width: 18rem;">
                                            <img src="<?= IMGROOT . '/' . $img->img_path ?>" class="d-block w-100" alt="<?= $person->first_name . ' ' . $img->comment ?>">
                                            <div class="card-body">
                                                <h5 class="card-title"><?= $img->img_path ?></h5>
                                                <p class="card-text"><?= $img->comment ?></p>
                                                <p class="card-text"><small class="text-muted">Uploaded on: <?= $img->uploaded_at ?></small></p>
                                            </div>
                                            <div class="col m-3">
                                                <a href="<?= URLROOT . '/images/edit/' . $img->id ?>" class=" btn btn-warning me-md-2">Update</a>
                                                <!-- set -->
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary me-md-2" data-bs-toggle="modal" data-bs-target="#image<?= $img->id ?>Modal">Set</button>
                                                <!-- Modal Edit -->
                                                <div class="modal fade" id="image<?= $img->id ?>Modal" tabindex="-1" aria-labelledby="image<?= $img->id ?>ModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="image<?= $img->id ?>ModalLabel">Set new profile Image
                                                                </h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <img src="<?= IMGROOT . '/' . $img->img_path ?>" class="d-block w-100" alt="<?= $person->first_name . ' ' . $img->comment ?>" style="max-width: ;150px">
                                                                do you want to set this image as a profile picture image for <?= $person->first_name . ' ' . $person->last_name ?>.
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form action="<?= URLROOT ?>/images/set/<?= $img->id ?>" method="post">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">
                                                                        Set</a>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- delete -->
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-danger me-md-2" data-bs-toggle="modal" data-bs-target="#delete_img<?= $img->id ?>Modal">Remove</button>
                                                <!-- Modal remove -->
                                                <div class="modal fade" id="delete_img<?= $img->id ?>Modal" tabindex="-1" aria-labelledby="delete_img<?= $img->id ?>ModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="delete_img<?= $img->id ?>ModalLabel">Delete Image
                                                                </h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                If you continue, The image will NOT appear at <?= $person->first_name . ' ' . $person->last_name ?>'s personal information page, and the file will be removed from your pictures directory.</div>
                                                            <div class="modal-footer">
                                                                <form action="<?= URLROOT ?>/images/delete/<?= $img->id ?>" method="post">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-danger"><?= I_DELETE ?>
                                                                        Remove</a>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>









    <?php endforeach; ?>
</div>
<?php require_once APPROOT . '/views/includes/footer.php'; ?>