<!-- <?php echo '<pre>' . var_export($person->id, true) . '</pre>'; ?> -->

<?php require APPROOT . '/views/includes/header.php'; ?>
<?php flash('msg'); ?>
<div class="input-group mb-3 ">
    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-angles-right"></i>
    </span>
    <button type="submit" class="btn btn-light"><i class="fa-sharp fa-solid fa-magnifying-glass"></i></button>
    <span class="input-group-text" id="basic-addon1">
        <i class="fa-solid fa-angles-left"></i>
    </span>
    <input type="search" class="form-control" placeholder="search for a phone number" aria-label="Username" aria-describedby="basic-addon1">
    <a type="button" class="btn btn-primary" href="<?php echo URLROOT; ?>/languages/add">
        <i class="fa-solid fa-language fa-xl"><i class="fa-solid fa-magnifying-glass"></i></i> new language
    </a>
</div>

<div class="row">
    <?php foreach ($data['languages']['languages'] as $language) : ?>

        <div class="card m-1">
            <div class="row">
                <div class="col-m-6">
                    <div class="card-body">
                        <div class="card-header">
                            <i class="fa-solid fa-language fa-2xl"> <?php echo ' ' . $language->title; ?></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $language->description; ?></h5>
                            <p class="card-text"><?php echo $language->extra; ?></p>
                            <a href="<?php echo URLROOT; ?>/languages/show/<?php echo $language->id; ?>" class="btn btn-primary">
                                <i class="fa-solid fa-exclamation"></i> more actions</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-m-6">
                    <div class="row">
                        <?php foreach ($data['languages']['list'] as $person) : ?>
                            <?php if ($language->id == $person->lan_id) : ?>
                                <div class="col-4">
                                    <h4 class="card-title"><?php echo $person->first_name . ' ' . $person->last_name; ?>
                                        <a href="<?php echo URLROOT . '/persons/show/' . $person->p_id; ?>" class="btn btn-light"><i class="fa-solid fa-user"></i></a>

                                        <?php if ($person->sex == 'male') : ?><a class="btn btn-light"><i class="fa-sharp fa-solid fa-mars "></i></a>
                                        <?php else : ?>
                                            <a class="btn btn-light">
                                                <i class="fa-sharp fa-solid fa-venus "></i></a>
                                        <?php endif; ?>
                                    </h4>
                                    <!-- Modal  -->
                                    <div class="m-3 d-grid gap-2 d-md-flex justify-content-md-end">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger me-md-2" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-trash-can"></i>
                                            delete
                                        </button>

                                        <!-- Modal Edite -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete a phone
                                                            number
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure that you want to delete this phone number</div>
                                                    <div class="modal-footer">
                                                        <form method="post" action="<?php echo URLROOT; ?>/peplans/delete_peplan/<?php echo $person->id ?>">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-sharp fa-solid fa-xmark"></i> Close</button>
                                                            <button type="submit" class="btn btn-danger"><i class="fa-sharp fa-solid fa-pen-to-square"></i>
                                                                delete</a>
                                                        </form>
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

    <?php endforeach; ?>
</div>



<?php require APPROOT . '/views/includes/footer.php'; ?>