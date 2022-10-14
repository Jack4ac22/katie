<?php require_once APPROOT . '/views/includes/header.php'; ?>
<?php flash('msg'); ?>
<!-- <?php echo '<pre>' . var_export($data, true) . '</pre>'; ?> -->

<div class="row">
    <div class="col-md-10 col-xl-10 col-xxl-8 mx-auto">
        <div class="car card-body bg-light mt-5 p-2">
            <h2>Editing form</h2>
            <p>Fill up the folwing inputs to edit the data.</p>
            <form action="<?php echo URLROOT; ?>/persons/edit/<?php echo $data['id']; ?>" method="post">
                <div class="form-floating m-3">
                    <input type="text" class="form-control <?php echo (!empty($data['first_name_error'])) ? "is-invalid" : ''; ?>" id="first_name" placeholder="first name." value="<?php echo $data['first_name']; ?>" name="first_name">
                    <label for="first_name"><?php echo (!empty($data['first_name_error'])) ? $data['first_name_error'] : 'First name'; ?></label>
                </div>
                <div class="form-floating m-3">
                    <input type="text" class="form-control <?php echo (!empty($data['last_name_error'])) ? "is-invalid" : ''; ?>" id="last_name" placeholder="last name." value="<?php echo $data['last_name']; ?>" name="last_name">
                    <label for="last_name"><?php echo (!empty($data['last_name_error'])) ? $data['last_name_error'] : 'Family / Last name'; ?></label>
                </div>

                <div class="form-floating m-3">
                    <input type="text" class="form-control <?php echo (!empty($data['email_error'])) ? "is-invalid" : ''; ?>" id="email" placeholder="first email." value="<?php echo $data['email']; ?>" name="email">
                    <label for="email"><?php echo (!empty($data['email_error'])) ? $data['email_error'] : 'Email address'; ?></label>
                </div>

                <div class="form-floating m-3">
                    <fieldset class="row mb-3" name="sex">
                        <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                        <?php if (!empty($data['sex_error'])) {
                            $msg = ['sex_error'];
                            echo "<label class=\"alert alert-danger\">$msg</label>";
                        } ?>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sex" id="gridRadios1" value="female" <?php if (isset($_POST['sex']) && $_POST['sex'] == 'female') : ?>checked='checked' <?php elseif (isset($data['sex']) && $data['sex'] == 'female') : ?>checked='checked' <?php endif; ?>>
                                <label class="form-check-label" for="gridRadios1">
                                    female
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sex" id="gridRadios2" value="male" <?php if (isset($_POST['sex']) && $_POST['sex'] == 'male') : ?>checked='checked' <?php elseif (isset($data['sex']) && $data['sex'] == 'male') : ?>checked='checked' <?php endif; ?>>
                                <label class="form-check-label" for="gridRadios2">
                                    male
                                </label>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="row ">
                    <div class="col m-3">
                        <div class="form-floating m-3">
                            <button type="submit" class="btn btn-primary btn-block">Edit</button>
                        </div>
                    </div>
                    <div class="col m-3">

                        <div class="form-floating m-3">
                            <a href="<?php echo URLROOT . '/persons/show/' . $data['id']; ?>" class="btn btn-light btn-block">cancle</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require_once APPROOT . '/views/includes/footer.php'; ?>