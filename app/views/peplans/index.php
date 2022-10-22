<?php require APPROOT . '/views/includes/header.php'; ?>
<?php flash('msg'); ?>

<?php //echo '<pre>' . var_export($data, true) . '</pre>';
?>
<div class="input-group mb-3 ">
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
                            <h3 style="white-space: pre-line"> <?= I_LANGUAGE ?> <?php echo ' ' . $language->title; ?>
                            </h3>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title" style="white-space: pre-line"><?php echo $language->description; ?></h5>
                            <p class="card-text" style="white-space: pre-line"><?php echo $language->extra; ?></p>
                            <a href="<?php echo URLROOT; ?>/languages/show/<?php echo $language->id; ?>" class="btn btn-primary">
                                <?= I_EXCLAIM ?> more actions</a>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <?php foreach ($data['languages']['list'] as $person) : ?>
                        <?php if ($language->id == $person->lan_id) : ?>

                            <div class="col-md-4">
                                <div class="card mb-3 
                                    <?php if ($person->sex == 'male') {
                                        echo 'card border-info';
                                    } else {
                                        echo                                         'border-warning';
                                    }; ?>">

                                    <div class="card-header">
                                        <div class="progress mt-2">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $person->levle ?>%"></div>
                                            <div class="progress">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $person->first_name . ' ' . $person->last_name ?></h5>
                                        <p class="card-text" style="white-space: pre-line"><?= $person->comment ?></p>

                                        <div class="row justify-content-center">

                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="<?php echo URLROOT . '/peplans/edit/' . $person->id; ?>" class="btn btn-warning" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"><?= I_EDIT ?></a>
                                                <a href="<?php echo URLROOT . '/peplans/show/' . $person->id; ?>" class="btn btn-info" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"><?= I_INFO ?></a>
                                                <a href="<?php echo URLROOT . '/persons/show/' . $person->p_id; ?>" class="btn btn-light" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"><?= I_PERSON  ?></a>
                                                <button type="button" class="btn btn-danger me-md-2" data-bs-toggle="modal" data-bs-target="#delete_peplan_<?= $person->id . '_' . $person->p_id ?>" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"><?= I_DELETE ?></button>
                                            </div>


                                            <!-- Button trigger modal -->


                                            <!-- Modal Edit -->
                                            <div class="modal fade" id="delete_peplan_<?= $person->id . '_' . $person->p_id ?>" tabindex="-1" aria-labelledby="delete_peplan_<?= $person->id . '_' . $person->p_id ?>Label" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="delete_peplan_<?= $person->id . '_' . $person->p_id ?>Label">Delete <?php echo $person->title; ?>/<?php echo $person->first_name . ' ' . $person->last_name; ?> relation
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
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <div class="col mb-3">
                    <a class="btn btn-outline-secondary" href="<?php echo URLROOT . '/peplans/add/0/' . $language->id; ?>">Add <?= I_ADD_PERSON ?></a>
                </div>
            </div>
        </div>

    <?php endforeach; ?>
</div>



<?php require APPROOT . '/views/includes/footer.php'; ?>