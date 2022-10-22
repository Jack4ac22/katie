<?php require_once APPROOT . '/views/includes/header.php'; ?>
<?php flash('msg'); ?>
<form enctype="multipart/form-data" method="post" action="<?php echo URLROOT; ?>/persons/upload">
    <div class="input-group">
        <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="img">
        <button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04" name="upload">Upload</button>
    </div>
    <div class="form-group">
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
        <?php if (!empty($data['p_id_error'])) {
            $msg = $data['p_id_error'];
            echo "<label class=\"alert alert-danger\">$msg</label>";
        } ?>
    </div>
    <div class="form-group">
        <label for="comment">comment:</label>
        <textarea name="comment" class="form-control form-control-lg <?php echo (!empty($data['comment_err'])) ? 'is-invalid' : ''; ?>" style="white-space: pre-line"><?php echo $data['comment']; ?></textarea>
        <span class="invalid-feedback"><?php echo $data['comment_err']; ?></span>
    </div>
</form>
<?php require_once APPROOT . '/views/includes/footer.php'; ?>