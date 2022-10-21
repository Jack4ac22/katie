<?php require_once APPROOT . '/views/includes/header.php'; ?>
<?php flash('msg'); ?>
<?php //echo '<pre>' . var_export($data, true) . '</pre>'; 
?>

<form class="d-flex" role="search" method="get">
    <div class="col">
        <div class="input-group mb-3">
            <input class="form-control me-2" type="search" placeholder="Search for a comment" aria-label="Search" name="search">
            <button class="btn btn-outline-primary me-2" type="submit"><?= I_SEARCH ?> search</button>
        </div>
    </div>
    <!-- <div class="col-4">
        <select class="form-select me-2" aria-label="Default select example" name="order_by">
            <option selected value=''>Open this select menu</option>
            <option value="sex">Gender</option>
            <option value="first_name">First Name</option>
            <option value="last_name">Family name</option>
        </select>
    </div> -->

</form>
<div class="input-group my-3 ">
    <a type="button" class="btn btn-primary" href="<?php echo URLROOT; ?>/persons/add">
        <?= I_ADD_PERSON ?>
        new person</a>
</div>

<div class="row">
    <?php if (count($data['persons']) > 0) : ?>
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
    <?php else : ?>
        <div class="row ">
            <div class="col-md-6 offset-md-3">
                <div class="alert alert-warning" role="alert">
                    <p><b>No </b> matches were found in your database.</p>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>