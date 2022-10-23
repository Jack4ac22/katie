<?php require APPROOT . '/views/includes/header.php'; ?>
<?php flash('msg'); ?>
<?php //echo '<pre>' . var_export($data, true) . '</pre>'; ?>
<div class="input-country mb-3 ">
    <a type="button" class="btn btn-primary" href="<?php echo URLROOT; ?>/pepcous/add">
        <?= I_ADD_SIGN ?> peson / country
    </a>
</div>
<div class="row">
    <?php foreach ($data['countries']['countries'] as $country) : ?>
        <div class="card m-1">
            <div class="row">
                <div class="col-m-6">
                    <div class="card-body">
                        <div class="card-header">
                            <h3 style="white-space: pre-line"><?= $country->alpha_2_code ?> - <?= $country->alpha_3_code ?> - <?= $country->en_short_name ?>
                            </h3>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title" style="white-space: pre-line"><?= $country->nationality ?></h5>
                            <a href="<?php echo URLROOT; ?>/pepcous/show/<?php echo $country->num_code; ?>" class="btn btn-primary mb-3">
                                <?= I_EXCLAIM ?> more actions</a>
                            <div class="row">
                                <?php foreach ($data['countries']['list'] as $person) : ?>
                                    <?php if ($country->num_code == $person->c_id) : ?>

                                        <div class="col-sm-6 col-md-4 mb-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title"><?= $person->first_name . ' ' . $person->last_name ?>
                                                        <?php if ($person->sex == 'male') : ?>
                                                            <span class="badge bg-secondary"><?= I_MAN ?></span>
                                                        <?php else : ?>
                                                            <span class="badge bg-info"><?= I_WOMAN ?></span>
                                                        <?php endif; ?>
                                                    </h5>
                                                    <p class="card-text" style="white-space: pre-line"><?= $person->comment ?></p>
                                                    <div class="btn-country" role="country" aria-label="Basic example">
                                                        <a class="btn btn-warning" href="<?= URLROOT . '/pepcous/edit/' . $person->id ?>">Edit <?= I_EDIT ?></a>
                                                        <a class="btn btn-light" href="<?= URLROOT . '/persons/show/' . $person->p_id ?>">Check <?= I_PERSON ?></a>
                                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_personal_nationality_<?= $person->id . $person->c_id ?>">Delete <?= I_DELETE ?></button>
                                                    </div>
                                                    <div class="modal fade" id="delete_personal_nationality_<?= $person->id . $person->c_id ?>" tabindex="-1" aria-labelledby="delete_personal_nationality_<?= $person->id . $person->c_id ?>Label" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="delete_personal_nationality_<?= $person->id . $person->c_id ?>Label">Delete nationality (<?= $country->nationality . ') from ' . $person->first_name . ' ' . $person->last_name ?>.</h1>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    If you continue <?php echo $country->en_short_name; ?> will NOT appear at <?= $person->first_name . ' ' . $person->last_name; ?>'s personal.
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form method="post" action="<?php echo URLROOT; ?>/pepcous/delete_pepcou/<?= $person->id ?>">
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
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                            <a class="btn btn-outline-secondary" href="<?php echo URLROOT . '/pepcous/add/0/' . $country->num_code; ?>">Add <?= I_ADD_PERSON ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    < </div>



        <?php require APPROOT . '/views/includes/footer.php'; ?>