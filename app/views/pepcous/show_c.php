<?php echo '<pre>' . var_export($data, true) . '</pre>';
?>
<?php require APPROOT . '/views/includes/header.php'; ?>
<?php flash('msg'); ?>

<a href="<?php echo URLROOT; ?>/pepcous" class="btn btn-light"><?= I_ARROW_L ?> Back to all countries page</a>

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
                                <?php if ($person->img != null) : ?>
                                    <img src="<?= IMGROOT . '/' . $person->img ?>" class="figure-img img-fluid rounded" alt="<?= $person->first_name . ' ' . $person->last_name . ' image' ?>">
                                <?php else : ?>
                                    <?php if ($person->sex != 'male') : ?>
                                        <img src="<?= IMGROOT . '/' . 'female.png' ?>" class="figure-img img-fluid rounded" alt="femal">
                                    <?php else : ?>
                                        <img src="<?= IMGROOT . '/' . 'male.png' ?>" class="figure-img img-fluid rounded" alt="male">
                                    <?php endif; ?>
                                <?php endif; ?>
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $person->first_name . ' ' . $person->last_name ?></h5>
                                    <p class="card-text" style="white-space: pre-line">
                                        <?= $person->sex . ' - ' . $person->birthday ?>
                                    </p>
                                    <p class="card-text" style="white-space: pre-line"><b>Comment: </b>
                                    </p>
                                    <P>
                                        <?= $person->comment ?>
                                    </P>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <a href="<?= URLROOT ?>/pepcous/add/<?= $data->p_id ?>" class="btn btn-primary mt-3"><?= I_ADD_SIGN ?> add nationality</a>

            </div>
        </div>
    <?php else : ?>

    <?php endif; ?>
<?php endif; ?>


<?php require APPROOT . '/views/includes/footer.php'; ?>