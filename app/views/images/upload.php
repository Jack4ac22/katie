<?php require_once APPROOT . '/views/includes/header.php'; ?>
<?php flash('msg'); ?><div class="card card-body bg-light mt-5">
    <?php //echo '<pre>' . var_export($data, true) . '</pre>'; 
    ?>

    <h2>Upload new picture.</h2>
    <p>Chose from the menue below.</p>
    <form enctype="multipart/form-data" method="post" action="<?php echo URLROOT; ?>/images/upload">
        <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="img">
        <div class="form-group mt-3">
            <label for="p_id">Chose the person:</label>
            <span class="invalid-feedback"><?php echo $data['p_id_err']; ?></span>
            <select class="form-select" aria-label="Default select example" name="p_id">
                <?php if ((!isset($data['p_id'])) || ($data['p_id'] == 0)) : ?>
                    <option selected value=0>select group from the list</option>
                <?php endif; ?>
                <?php foreach ($data['persons'] as $person) : ?>
                    <option value="<?php echo $person->id; ?>" <?php if ((isset($data['p_id'])) && ($data['p_id'] == $person->id)) echo 'selected'; ?>>
                        <?= $person->first_name . $person->last_name ?></option>
                <?php endforeach; ?>
            </select>
            <?php if (!empty($data['p_id_error'])) {
                $msg = $data['p_id_error'];
                echo "<label class=\"alert alert-danger\">$msg</label>";
            } ?>
        </div>
        <div class="form-group mt-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="profile" id="flexCheckIndeterminate" name="profile" <?php if ((isset($_POST['profile'])) && ($_POST['profile'] == 'profile')) {
                                                                                                                                echo 'checked';
                                                                                                                            } ?>>
                <label class="form-check-label" for="flexCheckIndeterminate">
                    set as profile picture
                </label>
            </div>
        </div>
        <div class="form-group mt-3">
            <label for="comment">comment:</label>
            <textarea name="comment" class="form-control form-control-lg <?php echo (!empty($data['comment_err'])) ? 'is-invalid' : ''; ?>" style="white-space: pre-line"><?php echo $data['comment']; ?></textarea>
            <span class="invalid-feedback"><?php echo $data['comment_err']; ?></span>
        </div>
        <div class="form-group mt-3">
            <button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04" name="upload">Upload</button>
        </div>
    </form>
</div>
<?php require_once APPROOT . '/views/includes/footer.php'; ?>