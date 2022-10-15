<?php require_once APPROOT . '/views/includes/header.php'; ?>
<?php flash('msg'); ?>
<div class="input-group mb-3 ">
    <span class="input-group-text" id="basic-addon1">
        <?= I_SEARCH ?>
    </span>
    <input type="search" class="form-control" placeholder="are you looking for some one?" aria-label="Username" aria-describedby="basic-addon1">

    <a type="button" class="btn btn-primary" href="<?php echo URLROOT; ?>/persons/add">
        <?= I_ADD_PERSON ?>
        new person</a>

</div>
<div class="row">
    <?php foreach ($data['persons'] as $person) : ?>
        <div class="col-sm-6 col-lg-4">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-3">

                    </div>
                    <?php if ($person->img != null) : ?>
                                <img src="<?= IMGROOT . '/' . $person->img ?>" class="figure-img img-fluid rounded" alt="<?= $person->first_name . ' ' . $person->last_name . ' image' ?>">
                            <?php else : ?>
                                <?php if ($person->sex != 'male') : ?>
                                    <img src="<?= IMGROOT . '/' . 'female.png' ?>" class="figure-img img-fluid rounded" alt="femal">
                                <?php else : ?>
                                    <img src="<?= IMGROOT . '/' . 'male.png' ?>" class="figure-img img-fluid rounded" alt="male">
                                <?php endif; ?>
                            <?php endif; ?>
                    <div class="col-md-9">
                        <div class="card-body">
                            <p class="h5"><?php echo $person->first_name . ' ' . $person->last_name; ?></p>
                            <p class="card-text"><?php echo $person->email; ?></p>
                            <a type="button" class="btn btn-primary" href="<?php echo URLROOT . '/persons/show/' . $person->id; ?>">
                                <?= I_INFO ?></a>
                            <?php if ($person->sex == 'male') : ?>
                                <a type="button" class="btn btn-dark disabled">
                                    <span class="badge text-bg-dark">
                                        <?= I_MAN ?>
                                    </span>
                                <?php else : ?>
                                    <a type="button" class="btn btn-info disabled">
                                        <span class="badge text-bg-info"><?= I_WOMAN; ?>
                                        </span>
                                    <?php endif; ?>

                                    </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>