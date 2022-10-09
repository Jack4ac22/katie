<?php require APPROOT . '/views/includes/header.php'; ?>
<?php flash('msg'); ?>
<div class="row mb-3">
    <div class="col-md-6">
        <h1>Languages</h1>
    </div>
    <div class="col-md-6">
        <a href="<?php echo URLROOT; ?>/languages/add" class="btn btn-primary pull-right">
            <i class="fa fa-pencil"></i> Add language
        </a>
    </div>
</div>
<?php foreach ($data['languages'] as $language) : ?>
<div class="card card-body mb-3">
    <h4 class="card-title"><?php echo $language->title; ?></h4>
    <p class="card-text"><?php echo $language->description; ?></p>
    <p class="card-text"><?php echo $language->extra; ?></p>
    <a href="<?php echo URLROOT; ?>/languages/show/<?php echo $language->id; ?>" class="btn btn-dark">More</a>
</div>
<?php endforeach; ?>
<?php require APPROOT . '/views/includes/footer.php'; ?>