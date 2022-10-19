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

                        <div class="row justify-content-between">
                            <div class="col-4">
                                <?php if ($language->count->number > 0) : ?>
                                    <span class="badge text-bg-warning"><?= $language->count->number ?>
                                        <?php if ($language->count->number == 1) : ?>
                                            person speaking <?= $language->title ?></span>
                                <?php else : ?>
                                    people speaking <?= $language->title ?></span>
                                <?php endif; ?>
                            <?php else : ?>
                                <span class="badge text-bg-danger">NO
                                    one speaks <?= $language->title ?></span>
                            <?php endif; ?>
                            </div>
                            <div class="col-4">
                                <a href="<?php echo URLROOT; ?>/languages/show/<?php echo $language->id; ?>" class="btn btn-info ">
                                    More <?= I_INFO . ' ' . I_EDIT . ' ' . I_DELETE ?> </a>
                            </div>
                        </div>





                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>


<?php require APPROOT . '/views/includes/footer.php'; ?>