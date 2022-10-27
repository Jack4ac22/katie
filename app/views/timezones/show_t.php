<?php require APPROOT . '/views/includes/header.php'; ?>
<?php flash('msg'); ?>
<?php //echo '<pre>' . var_export($data, true) . '</pre>';
?>

<div class="row">

    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card text-bg-light mb-3">
                <div class="card-header">Timezone information</div>
                <div class="card-body">
                    <h4 class="card-title">Timezone name: <b><?= $data->timezone ?></b></h4>
                    <h5 class="card-title">Continent: <b><?= $data->continent ?></b> / Country: <b><?= $data->en_short_name ?> / Capital: <b><?= $data->capital ?></b>.</h5>
                    <p class="card-text">GMT OFFSET: <b><?= $data->gmt_offset ?></b>
                        <?php if ($data->s_dts != null) :  ?> - Date:
                            <?php
                            $source = $data->s_dts;
                            $date = new DateTime($source);
                            echo $date->format('d/M'); ?><?php endif; ?></p>
                    <p class="card-text">DST OFFSET: <b><?= $data->dst_offset ?></b>
                        <?php if ($data->s_dts != null) :  ?>
                            - Date: <?php
                                    $source = $data->w_dts;
                                    $date = new DateTime($source);
                                    echo $date->format('d/M'); ?><?php endif;  ?></p>
                    <p class="card-text">Currency: <b><?= $data->currency_name . ' / ' . $data->currency_code ?></b></p>
                    <p class="card-text">Phone key: <b><?= $data->phone ?></b> / Postal Code format: <b><?= $data->postal_code_format ?></b></p>
                    <a href="<?= URLROOT . '/timezones/edit_timezone/' . $data->id; ?>" class="btn btn-primary">edit <?= I_TIME ?></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card text-bg-light mb-3">
                <div class="card-header">People related to this timezone</div>
                <div class="card-body">
                    <?php if ((isset($data->people)) && (count($data->people) > 0)) : ?>

                        <?php foreach ($data->people as $person) : ?>
                            <?php if ($person->status != NULL) : ?>
                                <div class="card border-primary mb-3">
                                    <div class="card-header bg-transparent border-primary"><?= $person->first_name . ' ' . $person->last_name . ' ' . I_PIN ?></div>
                                    <?php if ($person->sex == 'male') : ?>
                                        <div class="card-body text-primary">
                                        <?php else : ?>
                                            <div class="card-body text-dark">
                                            <?php endif; ?>
                                            <h5 class="card-title"><?= $person->first_name . ' ' . $person->last_name . ', ' . $person->sex . '.' ?></h5>
                                            <?php if ($person->birthday != null) : ?>
                                                <p class="card-text">Birthday: <?= $person->birthday ?></p>
                                            <?php endif; ?>
                                            <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                                                <a class="btn btn-warning" href="<?= URLROOT . '/timezones/edit/' . $person->id ?>">Edit <?= I_EDIT ?></a>
                                                <a class="btn btn-light" href="<?= URLROOT . '/persons/show/' . $person->p_id ?>">Check <?= I_PERSON ?></a>
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_persona_timezone<?= $person->id . $person->t_id ?>">Delete <?= I_DELETE ?></button>
                                            </div>
                                            <div class="modal fade" id="delete_persona_timezone<?= $person->id . $person->t_id ?>" tabindex="-1" aria-labelledby="delete_persona_timezone<?= $person->id . $person->t_id ?>Label" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="delete_persona_timezone<?= $person->id . $person->t_id ?>Label">Delete Timezone (<?= $data->timezone . ') retaltion to ' . $person->first_name . ' ' . $person->last_name ?>.</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            If you continue <?php echo $data->timezone; ?> will NOT appear at <?= $person->first_name . ' ' . $person->last_name; ?>'s personal page.
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form method="post" action="<?php echo URLROOT; ?>/timezones/delete_peptim/<?= $person->id ?>">
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
                                        <div class="card border-secoundary mb-3">
                                            <div class="card-header bg-transparent border-secoundary"><?= $person->first_name . ' ' . $person->last_name ?></div>
                                            <?php if ($person->sex == 'male') : ?>
                                                <div class="card-body text-primary">
                                                <?php else : ?>
                                                    <div class="card-body text-dark">
                                                    <?php endif; ?>
                                                    <h5 class="card-title"><?= $person->first_name . ' ' . $person->last_name . ', ' . $person->sex . '.' ?></h5>
                                                    <?php if ($person->birthday != null) : ?>
                                                        <p class="card-text">Birthday: <?= $person->birthday ?></p>
                                                    <?php endif; ?>
                                                    <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                                                        <a class="btn btn-warning" href="<?= URLROOT . '/timezones/edit/' . $person->id ?>">Edit <?= I_EDIT ?></a>
                                                        <a class="btn btn-light" href="<?= URLROOT . '/persons/show/' . $person->p_id ?>">Check <?= I_PERSON ?></a>
                                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_persona_timezone<?= $person->id . $person->t_id ?>">Delete <?= I_DELETE ?></button>
                                                    </div>
                                                    <div class="modal fade" id="delete_persona_timezone<?= $person->id . $person->t_id ?>" tabindex="-1" aria-labelledby="delete_persona_timezone<?= $person->id . $person->t_id ?>Label" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="delete_persona_timezone<?= $person->id . $person->t_id ?>Label">Delete Timezone (<?= $data->timezone . ') retaltion to ' . $person->first_name . ' ' . $person->last_name ?>.</h1>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    If you continue <?php echo $data->timezone; ?> will NOT appear at <?= $person->first_name . ' ' . $person->last_name; ?>'s personal page.
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form method="post" action="<?php echo URLROOT; ?>/timezones/delete_peptim/<?= $person->id ?>">
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
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>

                                    <a href="<?= URLROOT . '/timezones/add/0/' . $data->id; ?>" class="btn btn-primary">add <?= I_PERSON . ' ' . I_ADD_SIGN ?></a>
                                        </div>
                                </div>
                </div>
            </div>

        </div>

        <?php require APPROOT . '/views/includes/footer.php'; ?>