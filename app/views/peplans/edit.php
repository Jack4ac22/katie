<!-- <?php echo '<pre>' . var_export($data, true) . '</pre>'; ?> -->

<?php require APPROOT . '/views/includes/header.php'; ?>
<?php flash('msg'); ?>

<?php if (isset($data['p_id']) && ($data['p_id'] > 0)) : ?>
    <a href="<?= URLROOT ?>persons/show/<?= $data['p_id'] ?>" class="btn btn-light"><?= I_ARROW_L ?> Back to the person's page</a>

<?php elseif (isset($data['lan_id']) && ($data['lan_id'] > 0)) : ?>
    <a href="<?= URLROOT ?>languages/show/<?= $data['lan_id'] ?>" class="btn btn-light"><?= I_ARROW_L ?> Back to language's page</a>

<?php else : ?>
    <a href="<?php echo URLROOT; ?>" class="btn btn-light"><?= I_ARROW_L ?> Back to main page</a>

<?php endif; ?>


<div class="card card-body bg-light mt-5">
    <h2>Update the language .</h2>
    <p>Chose from the menue below to update the data.</p>
    <form action="<?php echo URLROOT; ?>/peplans/edit/<?php echo $data['id']; ?>" method="post">
        <!-- //language field -->
        <div class="form-group mt-3">
            <label for="lan">Chose the language</label>
            <span class="invalid-feedback"><?php echo $data['lan_err']; ?></span>
            <select class="form-select" aria-label="Default select example" name="lan_id">
                ?>
                <?php if ((!isset($data['lan_id'])) || ($data['lan_id'] == 0)) : ?>
                    <option value=0 selected>chose language from the list</option>
                <?php endif; ?>
                <?php foreach ($data['languages'] as $lan) : ?>
                    <option value="<?php echo $lan->id; ?>" <?php if ((isset($data['lan_id'])) && ($data['lan_id'] == $lan->id)) echo 'selected';; ?> <?php if ((isset($data['lan_id'])) && ($data['lan_id'] == $lan->id)) echo 'selected';; ?>>
                        <?php echo $lan->title; ?></option>
                <?php endforeach; ?>
            </select>
            <?php if (!empty($data['lan_id_err'])) {
                $msg = $data['lan_id_err'];
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
        <!-- levle field -->
        <div class="form-group mt-3">
            <label for="levle">Chose the person:</label>
            <span class="invalid-feedback"><?php echo $data['levle_err']; ?></span>
            <select class="form-select" aria-label="Default select example" name="levle">
                } ?>
                <?php if ((!isset($data['levle'])) || ($data['levle'] == 0)) : ?>
                    <option selected>Select a person from the list</option>
                <?php endif; ?>
                <option <?php if ((!isset($data['levle'])) || ($data['levle'] == 25)) {
                            echo 'selected';
                        } ?> value="25">beginner</option>
                <option value="50" <?php if ((!isset($data['levle'])) || ($data['levle'] == 50)) {
                                        echo 'selected';
                                    } ?>>intermediate</option>
                <option value="75" <?php if ((!isset($data['levle'])) || ($data['levle'] == 75)) {
                                        echo 'selected';
                                    } ?>>advanced</option>
                <option value="100" <?php if ((!isset($data['levle'])) || ($data['levle'] == 100)) {
                                        echo 'selected';
                                    } ?>>fluent</option>
            </select>
            <?php if (!empty($data['levle_error'])) {
                $msg = $data['levle_error'];
                echo "<label class=\"alert alert-danger\">$msg</label>";
            } ?>
        </div>
        <!-- comment's field -->
        <div class="form-group mt-3">
            <label for="comment">comment:</label>
            <textarea  name="comment" class="form-control form-control-lg <?php echo (!empty($data['comment_err'])) ? 'is-invalid' : ''; ?>" style="white-space: pre-line"><?php echo $data['comment']; ?></textarea>
            <span class="invalid-feedback"><?php echo $data['comment_err']; ?></span>
        </div>
        <div class="form-floating mt-3">
            <button type="submit" class="btn btn-primary btn-block"><?= I_ADD_PERSON ?> Update <?= I_LANGUAGE ?></button>
        </div>
    </form>
</div>
<!-- <?php echo '<pre>' . var_export($data, true) . '</pre>'; ?> -->
<?php require APPROOT . '/views/includes/footer.php'; ?>