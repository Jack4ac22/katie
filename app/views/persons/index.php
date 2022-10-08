<?php require_once APPROOT . '/views/includes/header.php'; ?>
<?php flash('person_add'); ?>
<div class="input-group mb-3 ">
    <span class="input-group-text" id="basic-addon1">
        <i class="fa-sharp fa-solid fa-magnifying-glass"></i>
    </span>
    <input type="search" class="form-control" placeholder="are you looking for some one?" aria-label="Username" aria-describedby="basic-addon1">

    <a type="button" class="btn btn-primary" href="<?php echo URLROOT; ?>/persons/add">
        <i class="fa-solid fa-user-plus"></i>
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
                            <h5 class="card-title"><?php echo $person->first_name . ' ' . $person->last_name; ?></h5>
                            <p class="card-text"><?php echo $person->email; ?></p>
                            <a type="button" class="btn btn-primary" href="<?php echo URLROOT . '/persons/show/' . $person->id; ?>">
                                <i class="fa-sharp fa-solid fa-circle-info"></i></a>
                            <a type="button" class="btn btn-primary disabled">
                                <?php if ($person->sex == 'male') : ?>
                                    <span class="badge text-bg-primary">
                                        <i class="fa-sharp fa-solid fa-mars fa-2xl"></i>
                                    </span>
                                <?php else : ?>
                                    <span class="badge text-bg-primary"><i class="fa-sharp fa-solid fa-venus fa-2xl"></i>
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