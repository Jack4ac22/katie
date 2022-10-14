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
                    <img src="https://cdn.pixabay.com/photo/2016/10/18/19/56/cute-1751246_960_720.png" alt="woman" class="rounded mx-auto d-block">
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