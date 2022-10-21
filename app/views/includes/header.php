<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/bootstrap.css">


    <title><?php echo SITENAME ?></title>
</head>

<body>
    <div class="mainContainer">
        <?php
        require_once APPROOT . '/views/includes/nav.php';
        ?>
        <?php if (isset($_SESSION['user_id'])) : ?>

            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><i class="fa-solid fa-right-long"></i></button>

            <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasScrollingLabel">add item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <p>indexes
                    <ul class="nav flex-column">
                        <li class="nav-item"><a class="nav-link" href="<?php echo URLROOT; ?>/persons/index">people</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo URLROOT; ?>/images/index">Pictures</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo URLROOT; ?>/languages/index">languages</a></li class="nav-item">
                        <li class="nav-item"><a class="nav-link" href="<?php echo URLROOT; ?>/peplans/index">languages-people</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo URLROOT; ?>/phones/index">phone numbers</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo URLROOT; ?>/job_titles/index">job title</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo URLROOT; ?>/timezones/index">timr zone</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo URLROOT; ?>/comments/index">comments</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo URLROOT; ?>/titles/index">titles</a></li>

                    </ul>
                    </p>
                    <p>
                        add
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="<?php echo URLROOT . '/persons/add/'; ?>"><?= I_ADD_SIGN ?>
                                person</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="<?php echo URLROOT . '/persons/upload/'; ?>"><?= I_ADD_SIGN ?>
                                picture</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="" button" class="btn btn-primary" href="<?php echo URLROOT; ?>/titles/add""><?= I_ADD_SIGN ?> job title</a>
                    </li>
                    <li class=" nav-item">
                                <a class="nav-link" class="btn btn-primary" href="<?php echo URLROOT; ?>/languages/add"><?= I_ADD_SIGN ?>
                                    language</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" button" class="btn btn-primary" href="<?php echo URLROOT; ?>/timezones/add""><?= I_ADD_SIGN ?> time zone</a>
                    </li>
                    <li class=" nav-item">
                                <a class="nav-link" button" class="btn btn-primary" href="<?php echo URLROOT; ?>/phones/add""><?= I_ADD_SIGN ?> phone number</a>
                    </li>
                    <li class=" nav-item">
                                    <a class="nav-link" button" class="btn btn-primary" href="<?php echo URLROOT; ?>/peplans/add""><?= I_ADD_SIGN ?> person/language relation</a>
                    </li>
                    <li class=" nav-item">
                                    <a class="nav-link" button" class="btn btn-primary" href="<?php echo URLROOT; ?>/comments/add""><?= I_ADD_SIGN ?> comment</a>
                    </li>
                    <li class=" nav-item">
                                    <a class="nav-link" button" class="btn btn-primary" href="<?php echo URLROOT; ?>/titles/add""><?= I_ADD_SIGN ?> Job title</a>
                    </li>
                </ul>
                </p>
            </div>
        </div>


        <?php else : ?>
        <div class=" container text-center">
                                        <div class="col align-self-end">
                                            <div class="container"><a href="<?php echo URLROOT . '/users/login'; ?>" class="btn btn-primary btn-lg"><i class="fa-solid fa-lock"></i> login</a>
                                            </div>
                                        </div>

                </div>
            <?php endif; ?>
            <div class="container">