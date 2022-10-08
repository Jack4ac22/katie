<nav class="navbar navbar-expand-lg mb-3">

    <div class="container-fluid ">
        <a class="navbar-brand" href="<?php echo URLROOT; ?>">
            <img src="https://cdn.pixabay.com/photo/2013/07/12/17/59/association-152746_960_720.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
            <?php echo SITENAME; ?>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse container-fluid" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="<?php echo URLROOT; ?>">Home</a>
                </li>
                <?php if (!isset($_SESSION['user_id'])) {
                    echo "</ul></div>";
                } ?>
                <?php if (isset($_SESSION['user_id'])) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URLROOT; ?>/people/index">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown link
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="<?php echo URLROOT; ?>/pages/about">about</a></li>
                        </ul>
                    </li>
            </ul>
        </div>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo URLROOT; ?>/users/logout">logout</a>
            </li>
        <?php else : ?>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/users/login">login</a>
                </li>
            <?php endif; ?>
            </ul>
    </div>
</nav>