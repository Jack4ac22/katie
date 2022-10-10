<?php require APPROOT . '/views/includes/header.php'; ?>
<?php flash('msg'); ?>
<a type="button" class="btn btn-primary" href="<?php echo URLROOT; ?>/languages/add">
    <i class="fa-solid fa-language fa-xl"></i> new language
</a>
<div class="row">
    <?php foreach ($data['languages'] as $language) : ?>
    <div class="col-sm-6 ">
        <div class="card m-1">
            <div class="card-body">
                <div class="card-header">
                    <i class="fa-solid fa-language fa-2xl"> <?php echo ' ' . $language->title; ?></i>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $language->description; ?></h5>
                    <p class="card-text"><?php echo $language->extra; ?></p>
                    <a href="<?php echo URLROOT; ?>/languages/show/<?php echo $language->id; ?>"
                        class="btn btn-primary">
                        <i class="fa-solid fa-exclamation"></i> more actions</a>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>


<?php require APPROOT . '/views/includes/footer.php'; ?>