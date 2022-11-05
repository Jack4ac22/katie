<?php require APPROOT . '/views/includes/header.php'; ?>

<?php flash('msg'); ?>
<?php //echo '<pre>' . var_export($data, true) . '</pre>';
?>
<div class="card card-body bg-light mt-5">
    <h2>Add a prayer.</h2>
    <p>fill up the data to add a new prayer.</p>
    <form action="<?= URLROOT ?>/prayers/add" method="post">
        <div class="form-group mt-3">
            <label for="title">Title:</label>
            <input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title']; ?>">
            <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
        </div>
        <div class="form-group mt-3">
            <label for="text">prayer:</label>
            <textarea  name="text" class="form-control form-control-lg <?php echo (!empty($data['text_err'])) ? 'is-invalid' : ''; ?>" style="white-space: pre-line"><?php echo $data['text']; ?></textarea>
            <span class="invalid-feedback"><?php echo $data['text_err']; ?></span>
        </div>

        <div class="form-group mt-3">
            <label for="p_id">Belongs to:</label>
            <span class="invalid-feedback"><?= $data['p_id_err'] ?></span>
            <select class="form-select" aria-label="Default select example" name="p_id">
                } ?>
                <?php if ((!isset($data['p_id'])) || ($data['p_id'] == 0)) : ?>
                    <option selected value="0">Open this select menu</option>
                <?php endif; ?>
                <?php foreach ($data['persons'] as $person) : ?>
                    <option value="<?php echo $person->id; ?>" <?php if ((isset($data['p_id'])) && ($data['p_id'] == $person->id)) echo 'selected';; ?> <?php if ((isset($_SESSION['p_id'])) && ($_SESSION['p_id'] == $person->id)) echo 'selected'; ?>>
                        <?php echo $person->first_name . ' ' . $person->last_name; ?></option>
                <?php endforeach; ?>
            </select>
            <?php if (!empty($data['p_id_err'])) : ?>

                <?php $msg = $data['p_id_err'] ?>

                <label class="alert alert-danger mt-2"><?= $msg ?></label>
            <?php endif; ?>

        </div>

        <div class="form-floating mt-3">
            <button type="submit" class="btn btn-primary btn-block">prayer</button>
        </div>
    </form>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>