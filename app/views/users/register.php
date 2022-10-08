<?php require_once APPROOT . '/views/includes/header.php'; ?>
<div class="row">
    <div class="col-md-10 col-xl-10 col-xxl-8 mx-auto">
        <div class="car card-body bg-light mt-5">
            <h2>register new user</h2>
            <p>Fill up the folwing inputs to register a new user who will have an <mark><em><strong>acces to the DATA</strong></em></mark>.</p>
            <form action="<?php echo URLROOT; ?>/users/register" method="post">

                <div class="form-floating m-3">
                    <input type="text" class="form-control <?php echo (!empty($data['user_name_error'])) ? "is-invalid" : ''; ?>" id="user_name" placeholder="I am a new user." value="<?php echo $data['user_name']; ?>" name="user_name">
                    <label for="user_name"><?php echo (!empty($data['user_name_error'])) ? $data['user_name_error'] : 'user name'; ?></label>
                </div>

                <div class="form-floating m-3">
                    <input type="password" class="form-control <?php echo (!empty($data['password_error'])) ? "is-invalid" : ''; ?>" id="password" placeholder="I am a new user." value="<?php echo $data['password']; ?>" name="password">
                    <label for="password"><?php echo (!empty($data['password_error'])) ? $data['password_error'] : 'Password'; ?></label>
                </div>

                <div class="form-floating m-3">
                    <input type="password" class="form-control <?php echo (!empty($data['confirm_password_error'])) ? "is-invalid" : ''; ?>" id="confirm_password" placeholder="I am a new user." value="<?php echo $data['confirm_password']; ?>" name="confirm_password">
                    <label for="confirm_password"><?php echo (!empty($data['confirm_password_error'])) ? $data['confirm_password_error'] : 'Password confirmation'; ?></label>
                </div>

                <div class="form-floating m-3">
                    <input type="password" class="form-control <?php echo (!empty($data['other_pass_error'])) ? "is-invalid" : ''; ?>" id="other_pass" placeholder="I am a new user." value="<?php echo $data['other_pass']; ?>" name="other_pass">
                    <label for="other_pass"><?php echo (!empty($data['other_pass_error'])) ? $data['other_pass_error'] : 'Urgent'; ?></label>
                </div>

                <div class="form-floating m-3">
                    <input type="password" class="form-control <?php echo (!empty($data['confirm_other_pass_error'])) ? "is-invalid" : ''; ?>" id="confirm_other_pass" placeholder="I am a new user." value="<?php echo $data['confirm_other_pass']; ?>" name="confirm_other_pass">
                    <label for="confirm_other_pass"><?php echo (!empty($data['confirm_other_pass_error'])) ? $data['confirm_other_pass_error'] : 'Urgent confirmation'; ?></label>
                </div>
                <div class="row ">
                    <div class="col m-3">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                    <div class="col m-3">
                        <a href="<?php echo URLROOT; ?>/users/login" class="btn btn-light btn-block">Login</a>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
<?php require_once APPROOT . '/views/includes/footer.php'; ?>