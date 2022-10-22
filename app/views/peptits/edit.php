<?php require APPROOT . '/views/includes/header.php'; ?>
<?php flash('msg'); ?>
<?php //echo '<pre>' . var_export($data, true) . '</pre>'; 
?>

<?php if (isset($data['p_id']) && ($data['p_id'] > 0)) : ?>
    <a href="<?= URLROOT ?>persons/show/<?= $data['p_id'] ?>" class="btn btn-light"><?= I_ARROW_L ?> Back to the person's page</a>

<?php elseif (isset($data['t_id']) && ($data['t_id'] > 0)) : ?>
    <a href="<?= URLROOT ?>titles/show/<?= $data['t_id'] ?>" class="btn btn-light"><?= I_ARROW_L ?> Back to title's page</a>

<?php else : ?>
    <a href="<?php echo URLROOT; ?>" class="btn btn-light"><?= I_ARROW_L ?> Back to main page</a>

<?php endif; ?>


<div class="card card-body bg-light mt-5">
    <h2>Update the title .</h2>
    <p>Chose from the menue below to update the data.</p>
    <form action="<?= URLROOT ?>/peptits/edit/<?= $data['id'] ?>" method="post">
        <!-- title field -->
        <div class="form-group mt-3">
            <label for="lan">Chose the title</label>
            <span class="invalid-feedback"><?php echo $data['t_id_err']; ?></span>
            <select class="form-select" aria-label="Default select example" name="t_id">
                ?>
                <?php if ((!isset($data['t_id_id'])) || ($data['t_id_id'] == 0)) : ?>
                    <option value=0 selected>chose language from the list</option>
                <?php endif; ?>
                <?php foreach ($data['titles'] as $title) : ?>
                    <option value="<?php echo $title->id; ?>" <?php if ((isset($data['t_id'])) && ($data['t_id'] == $title->id)) echo 'selected'; ?>>
                        <?php echo $title->title; ?></option>
                <?php endforeach; ?>
            </select>
            <?php if (!empty($data['t_id_err'])) {
                $msg = $data['t_id_err'];
                echo "<label class=\"alert alert-danger\">$msg</label>";
            } ?>
        </div>
        <!-- person's field -->
        <div class="form-group mt-3">
            <label for="p_id">Chose the person:</label>
            <span class="invalid-feedback"><?php echo $data['p_id_err']; ?></span>
            <select class="form-select" aria-label="Default select example" name="p_id">
                } ?>
                <?php if ((!isset($data['p_id'])) || ($data['p_id'] == 0)) : ?>
                    <option value=0 selected>Select a person from the list</option>
                <?php endif; ?>
                <?php foreach ($data['persons'] as $person) : ?>
                    <option value="<?php echo $person->id; ?>" <?php if ((isset($data['p_id'])) && ($data['p_id'] == $person->id)) echo 'selected';; ?> <?php if ((isset($_SESSION['p_id'])) && ($_SESSION['p_id'] == $person->id)) echo 'selected';; ?> <?php if ((isset($id)) && ($id == $person->id)) echo 'selected';; ?>>
                        <?php echo $person->first_name . ' ' . $person->last_name; ?></option>
                <?php endforeach; ?>
            </select>
            <?php if (!empty($data['p_id_err'])) {
                $msg = $data['p_id_err'];
                echo "<label class=\"alert alert-danger\">$msg</label>";
            } ?>
        </div>
        <!-- description's field -->
        <div class="form-group mt-3">
            <label for="comment">description:</label>
            <textarea  name="description" class="form-control form-control-lg <?php echo (!empty($data['description_err'])) ? 'is-invalid' : ''; ?>" style="white-space: pre-line"><?php echo $data['description']; ?></textarea>
            <span class="invalid-feedback"><?php echo $data['description_err']; ?></span>
        </div>
        <div class="form-floating mt-3">
            <button type="submit" class="btn btn-primary btn-block">Update</button>
        </div>
    </form>
</div>
<?php //echo '<pre>' . var_export($data, true) . '</pre>'; 
?>
<?php require APPROOT . '/views/includes/footer.php'; ?>