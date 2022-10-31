<?php require APPROOT . '/views/includes/header.php'; ?>
<?php flash('msg'); ?>
<?php //echo '<pre>' . var_export($data, true) . '</pre>'; 
?>
<a href="<?php echo URLROOT; ?>/persons/p_id" class="btn btn-light"><?= I_ARROW_L ?> Back to all phones page.</a>
<div class="card card-body bg-light mt-5">
    <h2>Edit personal relationship</h2>
    <p>Fill up the form to add new personal relationship.</p>
    <form action="<?php echo URLROOT; ?>/persons/edit_relation/<?= $data['id'] ?>" method="post">
        <div class="form-group mb-3">
            <label for="p_id">Person_A:</label>
            <span class="invalid-feedback"><?php echo $data['p_id1_err']; ?></span>
            <select class="form-select" aria-label="Disabled select example"  name="p_id1">
                } ?>
                <?php if ((!isset($data['p_id1'])) || ($data['p_id1'] == 0)) : ?>
                    <option value="0" selected>Open this select menu</option>
                <?php endif; ?>
                <?php foreach ($data['persons'] as $person) : ?>
                    <option value="<?php echo $person->id; ?>" <?php if ((isset($data['p_id1'])) && ($data['p_id1'] == $person->id)) echo 'selected';; ?>>
                        <?php echo $person->first_name . ' ' . $person->last_name; ?></option>
                <?php endforeach; ?>
            </select>
            <?php if (!empty($data['p_id1_err'])) : ?>
                <?php $msg = $data['p_id1_err'] ?>
                <label class="alert alert-danger mt-2"><?= $msg ?></label>
            <?php endif; ?>
        </div>

        <div class="form-group mb-3 ">
            <label for="p_id">Person_B:</label>
            <span class="invalid-feedback"><?php echo $data['p_id2_err']; ?></span>
            <select class="form-select" aria-label="Default select example" name="p_id2">
                } ?>
                <?php if ((!isset($data['p_id2'])) || ($data['p_id2'] == 0)) : ?>
                    <option value="0" selected>Open this select menu</option>
                <?php endif; ?>
                <?php foreach ($data['persons'] as $person) : ?>
                    <option value="<?php echo $person->id; ?>" <?php if ((isset($data['p_id2'])) && ($data['p_id2'] == $person->id)) echo 'selected';; ?>>
                        <?php echo $person->first_name . ' ' . $person->last_name; ?></option>
                <?php endforeach; ?>
            </select>
            <?php if (!empty($data['p_id2_err'])) : ?>
                <?php $msg = $data['p_id2_err'] ?>
                <label class="alert alert-danger mt-2"><?= $msg ?></label>
            <?php endif; ?>
        </div>

        <div class="form-group mb-3">
            <label for="description">description:</label>
            <input type="text" name="description" class="form-control form-control-lg <?php echo (!empty($data['description_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['description']; ?>">
            <span class="invalid-feedback"><?php echo $data['description_err']; ?></span>
        </div>
        <div class="form-floating mb-3">
            <button type="submit" class="btn btn-primary btn-block"><?= I_PERSON ?> update <?= I_PERSON ?></button>
        </div>
    </form>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>