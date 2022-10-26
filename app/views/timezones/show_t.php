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
                                    echo $date->format('d/M'); ?> <?php endif;  ?></p>
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
                                            <a href="<?= URLROOT . '/persons/show/' . $person->p_id ?>" class="btn btn-primary" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"> <?= I_INFO ?> info</a>
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
                                                    <a href="<?= URLROOT . '/persons/show/' . $person->p_id ?>" class="btn btn-primary" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"> <?= I_INFO ?> info</a>
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