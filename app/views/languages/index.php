<?php require APPROOT . '/views/includes/header.php'; ?>
<?php flash('msg'); ?>
<!-- <?php echo '<pre>' . var_export($data['languages'][0]->count->number, true) . '</pre>'; ?> -->

<div class="input-group mb-3 ">
    <input type="search" class="form-control" placeholder="search..." aria-label="Username" aria-describedby="basic-addon1">
    <span class="input-group-text" id="basic-addon1"><?= I_ARROW_R ?>
    </span>
    <button type="submit" class="btn btn-primary"><?= I_SEARCH ?> search</button>
    <span class="input-group-text" id="basic-addon1">
        <?= I_ARROW_L ?>
    </span><a type="button" class="btn btn-primary" href="<?php echo URLROOT; ?>/languages/add">
        <?= I_ADD_SIGN ?> new language
    </a>
</div>
<div class="row">
    <?php foreach ($data['languages'] as $language) : ?>
        <div class="col-sm-6 ">
            <div class="card m-1">
                <div class="card-body">
                    <div class="card-header">
                        <h2> <?= I_LANGUAGE ?> <?php echo ' ' . $language->title; ?></h2>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $language->description; ?></h5>
                        <p class="card-text"><?php echo $language->extra; ?></p>
                        <a href="<?php echo URLROOT; ?>/languages/show/<?php echo $language->id; ?>" class="btn btn-primary">
                            <?= I_EXCLAIM ?> more actions</a>
                        <?php if ($language->count->number > 0) : ?>
                            <a href="<?php echo URLROOT . '/peplans/show/' . $language->id ?>" class="btn btn-primary"><span class="badge text-bg-warning"><?= $language->count->number ?></span>
                                people speaking <?= $language->title ?>
                            </a>
                        <?php else : ?>
                            <a href="<?php echo URLROOT . '/peplans/show/' . $language->id ?>" class="btn btn-warning"><span class="badge text-bg-danger">NO</span>
                                one speaks <?= $language->title ?>
                            </a>
                        <?php endif; ?>


                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>


<?php require APPROOT . '/views/includes/footer.php'; ?>