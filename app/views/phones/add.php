<?php require APPROOT . '/views/includes/header.php'; ?>
<?php flash('msg'); ?>
<?php //echo '<pre>' . var_export($data, true) . '</pre>'; 
?>
<a href="<?php echo URLROOT; ?>/phones" class="btn btn-light"><?= I_ARROW_L ?> Back to all phones page.</a>
<div class="card card-body bg-light mt-5">
    <h2>Add Phone number</h2>
    <p>fill up the data to add a new phone number.</p>
    <form action="<?php echo URLROOT; ?>/phones/add" method="post">
        <div class="form-group">
            <label for="number">Number:</label>
            <input type="text" name="number" class="form-control form-control-lg <?php echo (!empty($data['number_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['number']; ?>">
            <span class="invalid-feedback"><?php echo $data['number_err']; ?></span>
        </div>
        <div class="form-group">
            <label for="description">description:</label>
            <input type="text" name="description" class="form-control form-control-lg <?php echo (!empty($data['description_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['description']; ?>">
            <span class="invalid-feedback"><?php echo $data['description_err']; ?></span>
        </div>
        <div class="form-group">
            <label for="p_id">Belongs to:</label>
            <span class="invalid-feedback"><?php echo $data['extra_err']; ?></span>
            <select class="form-select" aria-label="Default select example" name="p_id">
                } ?>
                <?php if ((!isset($data['p_id'])) || ($data['p_id'] == 0)) : ?>
                    <option value="0" selected>Open this select menu</option>
                <?php endif; ?>
                <?php foreach ($data['persons'] as $person) : ?>
                    <option value="<?php echo $person->id; ?>" <?php if ((isset($data['p_id'])) && ($data['p_id'] == $person->id)) echo 'selected';; ?> <?php if ((isset($_SESSION['p_id'])) && ($_SESSION['p_id'] == $person->id)) echo 'selected';; ?>>
                        <?php echo $person->first_name . ' ' . $person->last_name; ?></option>
                <?php endforeach; ?>
            </select>
            <?php if (!empty($data['p_id_err'])) : ?>

                <?php $msg = $data['p_id_err'] ?>

                <label class="alert alert-danger mt-2"><?= $msg ?></label>
            <?php endif; ?>
        </div>
        <div class="form-floating m-3">
            <button type="submit" class="btn btn-primary btn-block"><?= I_ADD_SIGN ?> add</button>
        </div>
    </form>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>