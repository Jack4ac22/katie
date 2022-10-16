<?php require_once APPROOT . '/views/includes/header.php'; ?>
<?php flash('msg'); ?>
<h1 class="heading"><?php echo $data['title']; ?></h1>
<p class="lead"><?php echo $data['description']; ?></p>
<?php require_once APPROOT . '/views/includes/footer.php'; ?>