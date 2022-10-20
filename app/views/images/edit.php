<?php require APPROOT . '/views/includes/header.php'; ?>
<?php flash('msg'); ?>
<!-- <?php echo '<pre>' . var_export($data, true) . '</pre>'; ?> -->

<?php if (isset($data['p_id']) && ($data['p_id'] > 0)) : ?>
    <a href="<?php echo URLROOT; ?>" class="btn btn-light"><?= I_ARROW_L ?> Back to main page</a>
<?php endif; ?>

<div class="row">
    <div class="col-md-6">
        <div class="form-group mt-3 p-4">
            <img src="<?= IMGROOT . '/' . $data['img_path'] ?>" class="img-fluid" alt="<?= IMGROOT . '/' . $img['img_path'] ?>">
        </div>
    </div>
    <div class="col-md-6">
        <div class="card card-body bg-light mt-5">
            <h2>Update an image.</h2>
            <p>Chose and fill the fields below to update the data.</p>
            <form action="<?php echo URLROOT; ?>/images/edit/<?php echo $data['id']; ?>" method="post">

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
                <!-- comment's field -->
                <div class="form-group mt-3">
                    <label for="comment">comment:</label>
                    <textarea name="comment" class="form-control form-control-lg <?php echo (!empty($data['comment_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['comment']; ?></textarea>
                    <span class="invalid-feedback"><?php echo $data['comment_err']; ?></span>
                </div>
                <div class="form-floating mt-3">
                    <button type="submit" class="btn btn-primary btn-block">Update <?= I_PIC ?></button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- <?php echo '<pre>' . var_export($data, true) . '</pre>'; ?> -->
<?php require APPROOT . '/views/includes/footer.php'; ?>