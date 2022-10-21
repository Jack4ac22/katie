<?php require APPROOT . '/views/includes/header.php'; ?>
<?php flash('msg'); ?>
<!-- <?php //echo '<pre>' . var_export($data, true) . '</pre>'; 
        ?> -->
<form class="d-flex" role="search" method="get">
    <div class="col">
        <div class="input-group mb-3">
            <input class="form-control me-2" type="search" placeholder="Search for a job title" aria-label="Search" name="search">
            <button class="btn btn-outline-primary me-2" type="submit"><?= I_SEARCH ?> search</button>
        </div>
    </div>

</form>
<div class="input-group mb-3 ">
    </span><a type="button" class="btn btn-primary" href="<?= URLROOT ?>/titles/add">
        <?= I_ADD_SIGN ?> new job title
    </a>
</div>
<div class="row">
    <?php if (count($data['titles']) > 0) : ?>

        <?php foreach ($data['titles'] as $title) : ?>
            <div class="col-sm-6 ">
                <div class="card m-1">
                    <div class="card-body">
                        <div class="card-header">
                            <h2> <?= $title->title; ?></h2>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title" style="white-space: pre-line"><?php echo $title->description; ?></h5>
                            <div class="row justify-content-between">
                                <div class="col-4">
                                    <?php if ($title->count > 0) : ?>
                                        <span class="badge text-bg-warning"><?= $title->count ?>
                                            <?php if ($title->count == 1) : ?>
                                                is <?= $title->title ?>.</span>
                                    <?php else : ?>
                                        are <?= $title->title ?>.</span>
                                    <?php endif; ?>
                                <?php else : ?>
                                    <span class="badge text-bg-danger">NO
                                        one is a <b><?= $title->title ?></b></span>
                                <?php endif; ?>
                                </div>
                                <div class="col-4">
                                    <a href="<?php echo URLROOT; ?>/titles/show/<?php echo $title->id; ?>" class="btn btn-info ">
                                        More <?= I_INFO . ' ' . I_EDIT . ' ' . I_DELETE ?> </a>
                                </div>
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


<?php require APPROOT . '/views/includes/footer.php'; ?>