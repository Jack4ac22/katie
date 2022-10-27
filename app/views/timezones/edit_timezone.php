<?php require APPROOT . '/views/includes/header.php'; ?>
<?php flash('msg'); ?>
<?php //echo '<pre>' . var_export($data, true) . '</pre>';
?>

<?php if (isset($data['p_id']) && ($data['p_id'] > 0)) : ?>
    <a href="<?= URLROOT ?>persons/show/<?= $data['p_id'] ?>" class="btn btn-light"><?= I_ARROW_L ?> Back to the person's page</a>

<?php elseif (isset($data['c_id']) && ($data['c_id'] > 0)) : ?>
    <a href="<?= URLROOT ?>pepcous/show_c/<?= $data['c_id'] ?>" class="btn btn-light"><?= I_ARROW_L ?> Back to nationality's page</a>

<?php else : ?>
    <a href="<?php echo URLROOT; ?>" class="btn btn-light"><?= I_ARROW_L ?> Back to main page</a>

<?php endif; ?>


<div class="card card-body bg-light mt-5">
    <h2>Update the timezone.</h2>
    <p>Edit the dates of daylight saving.</p>
    <form action="<?= URLROOT ?>/timezones/edit_timezone/<?= $data['id'] ?>" method="post">
        <!-- country field -->
        <div class="form-floating m-3">
            <input type="date" class="form-control <?php echo (!empty($data['w_dts_err'])) ? "is-invalid" : ''; ?>" id="w_dts" value="<?php echo $data['w_dts']; ?>" name="w_dts">
            <label for="w_dts"><?php echo (!empty($data['w_dts_err'])) ? $data['w_dts_err'] : 'w_dts'; ?></label>
        </div>
        <div class="form-floating m-3">
            <input type="date" class="form-control <?php echo (!empty($data['s_dts_err'])) ? "is-invalid" : ''; ?>" id="s_dts" placeholder="first name." value="<?php echo $data['s_dts']; ?>" name="s_dts">
            <label for="s_dts"><?php echo (!empty($data['s_dts_err'])) ? $data['s_dts_err'] : 's_dts'; ?></label>
        </div>
        <div class="form-floating mt-3">
            <button type="submit" class="btn btn-primary btn-block">Update</button>
        </div>
    </form>
</div>
<?php //echo '<pre>' . var_export($data, true) . '</pre>'; 
?>
<?php require APPROOT . '/views/includes/footer.php'; ?>