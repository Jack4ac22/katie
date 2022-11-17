<?php require APPROOT . '/views/includes/header.php'; ?>

<?php flash('msg'); ?>
<!-- <?php echo '<pre>' . var_export($data, true) . '</pre>'; ?> -->

<a href="<?php echo URLROOT; ?>/phones" class="btn btn-light"><?= I_ARROW_L ?> Back</a>
<div class="card card-body bg-light mt-5">
    <h2>Edit Phone number</h2>
    <p>fill up the data to Edite the phone number.</p>
    <form action="<?php echo URLROOT; ?>/phones/edit/<?= $data['id'] ?>" method="post">
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
            <label for="p_id">Belogs to:</label>
            <span class="invalid-feedback"><?php echo $data['extra_err']; ?></span>
            <select class="form-select" aria-label="Default select example" name="p_id">
                } ?>
                <?php foreach ($data['persons'] as $person) : ?>
                    <option value="<?php echo $person->id; ?>" <?php if ((isset($data['p_id'])) && ($data['p_id'] == $person->id))
                                                                    echo 'selected';; ?>>
                        <?php echo $person->first_name . ' ' . $person->last_name; ?></option>
                <?php endforeach; ?>
            </select>
            <?php if (!empty($data['p_id_error'])) {
                $msg = $data['p_id_error'];
                echo "<label class=\"alert alert-danger\">$msg</label>";
            } ?>

        </div class="orm-group">
        <div class="form-floating m-3">
            <button type="submit" class="btn btn-primary btn-block"><?= I_EDIT ?> edit</button>
        </div>
    </form>
</div>
<?php require APPROOT . '/views/includes/footer.php'; ?>