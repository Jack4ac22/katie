<?php require APPROOT . '/views/includes/header.php'; ?>
<?php flash('msg'); ?>
<?php //echo '<pre>' . var_export($data, true) . '</pre>'; 
?>

<?php if (isset($data['p_id']) && ($data['p_id'] > 0)) : ?>
    <a href="<?= URLROOT ?>/persons/show/<?= $data['p_id'] ?>" class="btn btn-light"><?= I_ARROW_L ?> Back to the person's page</a>

<?php elseif (isset($data['t_id']) && ($data['t_id'] > 0)) : ?>
    <a href="<?= URLROOT ?>/timezones/show_t/<?= $data['t_id'] ?>" class="btn btn-light"><?= I_ARROW_L ?> Back to groups's page</a>

<?php else : ?>
    <a href="<?php echo URLROOT; ?>" class="btn btn-light"><?= I_ARROW_L ?> Back to main page</a>
<?php endif; ?>



<div class="card card-body bg-light mt-5">
    <h2>Edit timezone.</h2>
    <p>Chose from the menue below.</p>
    <form action="<?php echo URLROOT; ?>/timezones/edit/<?= $data['id'] ?>" method="post">
        <!-- //group field -->
        <div class="form-group mt-3">
            <label for="group ">Select the timezone.</label>
            <span class="invalid-feedback"><?php echo $data['c_id_err']; ?></span>
            <select class="form-select mt-1" aria-label="Default select example" name="t_id">
                ?>
                <?php if ((!isset($data['t_id'])) || ($data['t_id'] == 0)) : ?>
                    <option selected value=0>select timezone from the list</option>
                <?php endif; ?>
                <?php foreach ($data['timezones'] as $timezone) : ?>
                    <option value="<?php echo $timezone->id; ?>" <?php if ((isset($data['t_id'])) && ($data['t_id'] == $timezone->id)) echo 'selected'; ?>>
                        <?= $timezone->en_short_name . ' - ' . $timezone->alpha_3_code . ' - ' . $timezone->timezone ?></option>
                <?php endforeach; ?>
            </select>
            <?php if (!empty($data['t_id_err'])) {
                $msg = $data['t_id_err'];
                echo "<label class=\"alert alert-danger\">$msg</label>";
            } ?>
        </div>
        <!-- person's field -->
        <div class="form-group mt-3">
            <label for="p_id ">Chose the person:</label>
            <span class="invalid-feedback"><?php echo $data['p_id_err']; ?></span>
            <select class="form-select mt-1" aria-label="Default select example" name="p_id">
                } ?>
                <?php if ((!isset($data['p_id'])) || ($data['p_id'] == 0)) : ?>
                    <option value='0' selected>Select a person from the list</option>
                <?php endif; ?>
                <?php foreach ($data['persons'] as $person) : ?>
                    <option value="<?php echo $person->id; ?>" <?php if ((isset($data['p_id'])) && ($data['p_id'] == $person->id)) echo 'selected'; ?>>
                        <?php echo $person->first_name . ' ' . $person->last_name; ?></option>
                <?php endforeach; ?>
            </select>
            <?php if (!empty($data['p_id_err'])) {
                $msg = $data['p_id_err'];
                echo "<label class=\"alert alert-danger\">$msg</label>";
            } ?>
        </div>
        <div class="form-group mt-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="status" id="flexCheckIndeterminate" name="status" <?php if ((isset($_POST['status'])) && ($_POST['status'] == 'status') || ((isset($data['status'])) && ($data['status'] == 'status'))) {
                                                                                                                                echo 'checked';
                                                                                                                            } ?>>
                <label class="form-check-label" for="flexCheckIndeterminate">
                    set as the current timezone
                </label>
            </div>
        </div>
        <div class="form-floating mt-3">
            <button type="submit" class="btn btn-primary btn-block"> edit</button>
        </div>
    </form>
</div>
<?php //echo '<pre>' . var_export($data, true) . '</pre>'; 
?>
<?php require APPROOT . '/views/includes/footer.php'; ?>