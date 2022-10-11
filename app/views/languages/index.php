<?php require APPROOT . '/views/includes/header.php'; ?>
<?php flash('msg'); ?>
<div class="input-group mb-3 ">
    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-angles-right"></i>
    </span>
    <button type="submit" class="btn btn-light"><i class="fa-sharp fa-solid fa-magnifying-glass"></i></button>
    <span class="input-group-text" id="basic-addon1">
        <i class="fa-solid fa-angles-left"></i>
    </span>
    <input type="search" class="form-control" placeholder="search for a phone number" aria-label="Username" aria-describedby="basic-addon1">
    <a type="button" class="btn btn-primary" href="<?php echo URLROOT; ?>/languages/add">
        <i class="fa-solid fa-language fa-xl"><i class="fa-solid fa-magnifying-glass"></i></i> new language
    </a>
</div>

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
                        <a href="<?php echo URLROOT; ?>/languages/show/<?php echo $language->id; ?>" class="btn btn-primary">
                            <i class="fa-solid fa-exclamation"></i> more actions</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>


<?php require APPROOT . '/views/includes/footer.php'; ?>