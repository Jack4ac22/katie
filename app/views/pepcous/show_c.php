<?php //echo '<pre>' . var_export($data, true) . '</pre>';
?>
<?php require APPROOT . '/views/includes/header.php'; ?>
<?php flash('msg'); ?>

<a href="<?php //echo URLROOT; ?>/pepcous" class="btn btn-light"><?= I_ARROW_L ?> Back to all countries page</a>

<?php if (islogged()) : ?>
    <?php if (isset($data->num_code)) : ?>

        <div class="card mt-3">
            <h3 class="card-header"><b><?= $data->en_short_name ?></b></h3>
            <div class="card-body">
                <h3 class="card-title"></h3>
                <p class="card-text">
                    <?php if (count($data->people) > 1) :  ?>
                        There are <?= count($data->people) ?> people holding a passport issued by <?= $data->en_short_name ?>.:
                    <?php elseif (count($data->people) == 1) :  ?>
                        holds <?= count($data->people) ?> nationality:
                    <?php else : ?>
                        does not hold any nationality.
                    <?php endif; ?>
                </p>
            </div>
            <div class="card-body">
                <div class="btn-group mb-3" role="group" aria-label="Basic example">

                </div>
                </form>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <?php foreach ($data->people as $person) : ?>
                        <div class="col">
                            <div class="card h-100">
                                <a href="<?php echo URLROOT . '/persons/show/' . $person->p_id; ?>">
                                    <?php if ($person->img != null) : ?>
                                        <img src="<?= IMGROOT . '/' . $person->img ?>" class="figure-img img-fluid rounded" alt="<?= $person->first_name . ' ' . $person->last_name . ' image' ?>">
                                    <?php else : ?>
                                        <?php if ($person->sex != 'male') : ?>
                                            <img src="<?= IMGROOT . '/' . 'female.png' ?>" class="figure-img img-fluid rounded" alt="femal">
                                        <?php else : ?>
                                            <img src="<?= IMGROOT . '/' . 'male.png' ?>" class="figure-img img-fluid rounded" alt="male">
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title"><?= $person->first_name . ' ' . $person->last_name ?></h5>
                                    <p class="card-text" style="white-space: pre-line">
                                        <?php echo $person->sex;
                                        if ($person->birthday != null) {
                                            echo ' - ' . date('Y', strtotime($person->birthday));
                                        } else {
                                            echo ' - ' .  '<a href="' . URLROOT . '/persons/edit/' . $person->p_id . '" class="btn btn-light">' . I_ADD_SIGN . ' b-day </a>';
                                        }
                                        ?>
                                    </p>
                                    <p class="card-text" style="white-space: pre-line"><b>Comment: </b>
                                    </p>
                                    <P>
                                        <?= $person->comment ?>
                                    </P>
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                                        <a class="btn btn-warning" href="<?= URLROOT . '/pepcous/edit/' . $person->id ?>">Edit <?= I_EDIT ?></a>
                                        <a class="btn btn-light" href="<?= URLROOT . '/persons/show/' . $person->p_id ?>">Check <?= I_PERSON ?></a>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_personal_nationality_<?= $person->id . $person->c_id ?>">Delete <?= I_DELETE ?></button>
                                    </div>
                                    <div class="modal fade" id="delete_personal_nationality_<?= $person->id . $person->c_id ?>" tabindex="-1" aria-labelledby="delete_personal_nationality_<?= $person->id . $person->c_id ?>Label" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="delete_personal_nationality_<?= $person->id . $person->c_id ?>Label">Delete nationality (<?= $data->nationality . ') from ' . $person->first_name . ' ' . $person->last_name ?>.</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    If you continue <?php echo $data->en_short_name; ?> will NOT appear at <?= $person->first_name . ' ' . $person->last_name; ?>'s personal.
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
                    <?php endforeach; ?>
                </div>
                <a href="<?= URLROOT ?>/pepcous/add/0/<?= $data->num_code ?>" class="btn btn-primary mt-3"><?= I_ADD_SIGN ?> add peson</a>

            </div>
        </div>
    <?php else : ?>

    <?php endif; ?>
<?php endif; ?>


<?php require APPROOT . '/views/includes/footer.php'; ?>