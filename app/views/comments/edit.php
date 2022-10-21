<?php require APPROOT . '/views/includes/header.php'; ?>
<?php require APPROOT . '/views/includes/nav.php'; ?>
<?php flash('msg'); ?>
<?php //echo '<pre>' . var_export($data, true) . '</pre>';
?>
<div class="card card-body bg-light mt-5">
    <h2>Edit a comment.</h2>
    <p>fill up the data to edit the comment.</p>
    <form action="<?= URLROOT ?>/comments/edit/<?= $data['id'] ?>" method="post">
        <div class="form-group mt-3">
            <label for="title">Title:</label>
            <input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title']; ?>">
            <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
        </div>
        <div class="form-group mt-3">
            <label for="text">comment:</label>
            <textarea name="text" class="form-control form-control-lg <?php echo (!empty($data['text_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['text']; ?></textarea>
            <span class="invalid-feedback"><?php echo $data['text_err']; ?></span>
        </div>

        <div class="form-group mt-3">
            <label for="level" class="form-label">Comment's evaluation</label>
            <span class="invalid-feedback"><?= $data['value_err'] ?></span><input type="range" class="form-range" min="0" max="100" step="10" id="level" name="value" value="<?= $data['value'] ?? 0 ?>">
            <?php if (!empty($data['value_err'])) : ?>

                <?php $msg = $data['value_err'] ?>

                <label class="alert alert-danger mt-2"><?= $msg ?></label>
            <?php endif; ?>

        </div>

        <div class="form-group mt-3">
            <label for="p_id">Belongs to:</label>
            <span class="invalid-feedback"><?= $data['p_id_err'] ?></span>
            <select class="form-select" aria-label="Default select example" name="p_id">
                } ?>
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
            <button type="submit" class="btn btn-primary btn-block">update</button>
        </div>
    </form>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>