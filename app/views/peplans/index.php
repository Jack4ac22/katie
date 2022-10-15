<!-- <?php echo '<pre>' . var_export($data, true) . '</pre>'; ?> -->

<?php require APPROOT . '/views/includes/header.php'; ?>
<?php flash('msg'); ?>
<div class="input-group mb-3 ">
    <span class="input-group-text" id="basic-addon1"><?= I_ARROW_R ?>
    </span>
    <button type="submit" class="btn btn-light"><?= I_SEARCH ?></button>
    <span class="input-group-text" id="basic-addon1">
        <?= I_ARROW_L ?>
    </span>
    <input type="search" class="form-control" placeholder="search for a language" aria-label="Username" aria-describedby="basic-addon1">
    <a type="button" class="btn btn-primary" href="<?php echo URLROOT; ?>/languages/add">
        <?= I_ADD_SIGN ?> new language
    </a>
</div>

<div class="row">
    <?php foreach ($data['languages']['languages'] as $language) : ?>
        <div class="card m-1">
            <div class="row">
                <div class="col-m-6">
                    <div class="card-body">
                        <div class="card-header">
                            <h3> <?= I_LANGUAGE ?> <?php echo ' ' . $language->title; ?>
                            </h3>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $language->description; ?></h5>
                            <p class="card-text"><?php echo $language->extra; ?></p>
                            <a href="<?php echo URLROOT; ?>/languages/show/<?php echo $language->id; ?>" class="btn btn-primary">
                                <?= I_EXCLAIM ?> more actions</a>
                        </div>
                    </div>
                </div>

                <div class="col-m-6">
                    <div class="row">
                        <?php foreach ($data['languages']['list'] as $person) : ?>
                            <?php if ($language->id == $person->lan_id) : ?>
                                <!-- can be replaced with toggle https://getbootstrap.com/docs/5.2/components/collapse/ -->
                                <div class="col-4">
                                    <h4 class="card-title"><?php echo $person->first_name . ' ' . $person->last_name; ?>
                                        <a href="<?php echo URLROOT . '/persons/show/' . $person->p_id; ?>" class="btn btn-light"><?= I_INFO ?></a>

                                        <?php if ($person->sex == 'male') : ?><a class="btn btn-light"><?= I_MAN ?></a>
                                        <?php else : ?>
                                            <a class="btn btn-light">
                                                <?= I_WOMAN ?></a>
                                        <?php endif; ?>

                                    </h4>
                                    <!-- Modal  -->
                                    <div class="m-3 d-grid gap-2 d-md-flex justify-content-md-end">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger me-md-2" data-bs-toggle="modal" data-bs-target="#exampleModal"><?= I_DELETE ?>
                                            Remove <?php echo $person->first_name; ?>
                                        </button>

                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete <?php echo $language->title; ?>/<?php echo $person->first_name . ' ' . $person->last_name; ?> relation
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        If you continue, The language will NOT appear at <?php echo $person->first_name . ' ' . $person->last_name; ?>'s personal information page, NOR he will appear on <?php echo $language->title; ?> page.</div>
                                                    <div class="modal-footer">
                                                        <form method="post" action="<?php echo URLROOT; ?>/peplans/delete_peplan/<?php echo $person->id ?>">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-danger"><?= I_DELETE ?>
                                                                delete</a>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            <?php else : ?>

                            <?php endif; ?>
                        <?php endforeach; ?>
                        <a class="btn btn-outline-secondary" href="<?php echo URLROOT . '/peplans/add/0/' . $language->id; ?>">Add <?= I_ADD_PERSON ?></a>
                    </div>
                </div>
            </div>
        </div>

    <?php endforeach; ?>
</div>



<?php require APPROOT . '/views/includes/footer.php'; ?>