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
                    <h4 class="card-title">Timezone name: <b><?= $data->timezone ?></b></h5>
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

<?php require APPROOT . '/views/includes/footer.php'; ?>