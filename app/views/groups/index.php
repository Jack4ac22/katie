<?php require APPROOT . '/views/includes/header.php'; ?>
<?php flash('msg'); ?>
<?php //echo '<pre>' . var_export($data, true) . '</pre>';  ?>
<form class="d-flex" role="search" method="get">
    <div class="col">
        <div class="input-group mb-3">
            <input class="form-control me-2" type="search" placeholder="Search for a group" aria-label="Search" name="search" value="<?php if((isset($_GET['search'])) && (strlen($_GET['search'])>0)){echo $_GET['search'];} ?>" value="<?php if((isset($_GET['search'])) && (strlen($_GET['search'])>0)){echo $_GET['search'];} ?>">
            <button class="btn btn-outline-primary me-2" type="submit"><?= I_SEARCH ?> search</button>
        </div>
    </div>

</form>
<div class="input-group mb-3 ">
    </span><a type="button" class="btn btn-primary" href="<?= URLROOT ?>/groups/add">
        <?= I_ADD_SIGN ?> new group
    </a>
</div>
<div class="row">
    <?php if (count($data['groups']) > 0) : ?>

        <?php foreach ($data['groups'] as $group) : ?>
            <div class="col-sm-6 ">
                <div class="card m-1">
                    <div class="card-body">
                        <div class="card-header">
                            <h2> <?= $group->title; ?></h2>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title" style="white-space: pre-line"><?php echo $group->description; ?></h5>
                            <div class="row justify-content-between">
                                <div class="col-4">
                                    <?php if ($group->count > 0) : ?>
                                       <h6><span class="badge text-bg-warning"><?= $group->count ?>
                                            <?php if ($group->count == 1) : ?>
                                                person is in <?= $group->title ?> group.</span>
                                    <?php else : ?>
                                        people in <?= $group->title ?> group.</span>
                                    <?php endif; ?>
                                <?php else : ?>
                                  <h6>  <span class="badge text-bg-danger">NO
                                        one is in <?= $group->title ?> group.</span>
                                <?php endif; ?>
                                </h6>
                                </div>
                                <div class="col-4">
                                    <a href="<?php echo URLROOT; ?>/groups/show/<?php echo $group->id; ?>" class="btn btn-info ">
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