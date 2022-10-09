<?php require_once APPROOT . '/views/includes/header.php'; ?>
<div class="row">
    <div class="col-md-10 col-xl-10 col-xxl-8 mx-auto">
        <div class="car card-body bg-light mt-5 p-2">
            <?php flash('msg'); ?>
            <h2>Login</h2>
            <p>Fill up the folwing inputs to login to the data ... <mark><em><strong>Ready?</strong></em></mark></p>
            <form action="<?php echo URLROOT; ?>/users/login" method="post">

                <div class="form-floating m-3">
                    <input type="text" class="form-control <?php echo (!empty($data['user_name_error'])) ? "is-invalid" : ''; ?>" id="user_name" placeholder="I am a new user." value="<?php echo $data['user_name']; ?>" name="user_name">
                    <label for="user_name"><?php echo (!empty($data['user_name_error'])) ? $data['user_name_error'] : 'Username'; ?></label>
                </div>

                <div class="form-floating m-3">
                    <input type="password" class="form-control <?php echo (!empty($data['password_error'])) ? "is-invalid" : ''; ?>" id="password" placeholder="I am a new user." value="<?php echo $data['password']; ?>" name="password">
                    <label for="password"><?php echo (!empty($data['password_error'])) ? $data['password_error'] : 'Password'; ?></label>
                </div>

                <div class="form-floating m-3">
                    <button type="submit" class="btn btn-primary btn-block">login</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require_once APPROOT . '/views/includes/footer.php'; ?>