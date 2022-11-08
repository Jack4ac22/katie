        <!-- pictures -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="person_pannel_open-headingEight">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#person_pannel_open-collapseEight" aria-expanded="false" aria-controls="person_pannel_open-collapseEight">
                    <div class="row justify-content-between">
                        <?php if (isset(($data['person']['p_count'])) && ($data['person']['p_count'] > 0)) : ?>
                            <div class="col">Pictures</div>

                            <div class='position-relative col'><span class="badge bg-secondary position-relative"> total pictures</span>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    <?= $data['person']['p_count'] ?>
                                </span>
                            </div>
                        <?php else : ?>
                            <div class="col">No pictures</div>
                        <?php endif; ?>
                    </div>
                </button>
            </h2>
            <div id="person_pannel_open-collapseEight" class="accordion-collapse collapse" aria-labelledby="person_pannel_open-headingEight">
                <div class="accordion-body">
                    <div class="mb-3"><a href="<?= URLROOT . '/images/upload/' . $data['person']['person']->id ?>" class="btn btn-primary">upload <?= I_PIC ?></a></div>
                    <div class="row justify-content-center">
                        <div class="card-group">
                            <?php foreach ($data['person']['images'] as $img) : ?>
                                <div class=" col-md-6 col-lg-4">
                                    <div class="card" style="width: 18rem;">
                                        <a href="<?= URLROOT . '/images/show/' . $img->id ?>">
                                            <img src="<?= IMGROOT . '/' . $img->img_path ?>" class="d-block w-100" alt="<?= $data['person']['person']->first_name  . ' ' . $img->comment ?>"></a>
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $img->img_path ?></h5>
                                            <p class="card-text" style="white-space: pre-line"><?= $img->comment ?></p>
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
                                                            <img src="<?= IMGROOT . '/' . $img->img_path ?>" class="d-block w-100" alt="<?= $data['person']['person']->first_name . ' ' . $img->comment ?>" style="max-width: ;150px">
                                                            do you want to set this image as a profile picture image for <?= $data['person']['person']->first_name . ' ' . $data['person']['person']->last_name ?>.
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
                                                            If you continue, The image will NOT appear at <?= $data['person']['person']->first_name . ' ' . $data['person']['person']->last_name ?>'s personal information page, and the file will be removed from your pictures directory.</div>
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
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>