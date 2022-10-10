<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    <title><?php echo SITENAME ?></title>
</head>

<body>
    <div class="mainContainer">


        <?php
        require_once APPROOT . '/views/includes/nav.php';
        ?>
        <?php if (isset($_SESSION['user_id'])) : ?>

        <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling"
            aria-controls="offcanvasScrolling"><i class="fa-solid fa-right-long"></i></button>

        <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
            id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasScrollingLabel">add item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <p>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?php echo URLROOT . '/persons/add/'; ?>">new
                            person</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="" button" class="btn btn-primary"
                            href="<?php echo URLROOT; ?>/titles/add"">new job title</a>
                    </li>
                    <li class=" nav-item">
                            <a class="nav-link" class="btn btn-primary" href="<?php echo URLROOT; ?>/languages/add">new
                                language</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="" button" class="btn btn-primary"
                            href="<?php echo URLROOT; ?>/timezones/add"">new time zone</a>
                    </li>
                    <li class=" nav-item">
                            <a class="nav-link" href="" button" class="btn btn-primary"
                                href="<?php echo URLROOT; ?>/comments/add"">new comment</a>
                    </li>
                </ul>
                </p>
            </div>
        </div>


        <?php else : ?>
        <div class=" container text-center">

                                <div class="col align-self-end">
                                    <div class="container"><a href="<?php echo URLROOT . '/users/login'; ?>"
                                            class="btn btn-primary btn-lg"><i class="fa-solid fa-lock"></i> login</a>
                                    </div>
                                </div>

            </div>
            <?php endif; ?>
            <div class="container">