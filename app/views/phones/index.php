<?php require APPROOT . '/views/includes/header.php'; ?>
<?php flash('msg'); ?>

<div class="input-group mb-3 ">
    <a type="button" class="btn btn-primary" href="<?php echo URLROOT; ?>/phones/add">
        <?= I_ADD_SIGN ?> new phone
    </a>

</div>
<div class="row  g-2">
    <?php foreach ($data['phones'] as $phone) : ?>
    <div class="col-md-4 col-sm-6 ">
        <div class="card">

            <div class="card-body">

                <h5 class="card-title"><?php echo $phone->number ?></h5>
                <p class="card-text">Assigned to: <?php echo $phone->first_name . ' ' . $phone->last_name; ?></p>
            </div>
            <a href="<?php echo URLROOT; ?>/phones/show/<?php echo $phone->id; ?>" class="btn btn-primary m-2">
                <?= I_EDIT ?> more actions</a>
        </div>
    </div>
    <?php endforeach; ?>

</div>


<?php require APPROOT . '/views/includes/footer.php'; ?>