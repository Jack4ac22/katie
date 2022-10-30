</div>
</div>
<div class="container">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <p class="col-md-4 mb-0 text-muted"> <img src="https://cdn.pixabay.com/photo/2013/07/12/17/59/association-152746_960_720.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top"> © 2022 Jack Kazanjyan</p>
        <ul class="nav col-md-4 justify-content-end">
            <li class="nav-item"><a href="<?php echo URLROOT; ?>/pages/index" class="nav-link px-2 text-muted">Home</a></li>
            <li class="nav-item"><a href="<?php echo URLROOT; ?>/pages/faq" class="nav-link px-2 text-muted">FAQs</a></li>
            <li class="nav-item"><a href="<?php echo URLROOT; ?>/pages/about" class="nav-link px-2 text-muted">About</a></li>
            <?php if (isset($_SESSION['timezone'])) : ?>
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/users/change_t/<?= $_SESSION['user_id'] ?>"><?= $_SESSION['timezone'] ?></a>
                </li>
            <?php endif; ?>
            <?php if (isset($_SESSION['user_id'])) : ?>
                <button class="btn btn-link" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">indexes</button>
                <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasScrollingLabel">add item</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <p>indexes
                        <ul class="nav flex-column">
                            <li class="nav-item"><a class="nav-link" href="<?php echo URLROOT; ?>/persons/index">people</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?php echo URLROOT; ?>/phones/index">phone numbers</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?php echo URLROOT; ?>/pepcous/index">passports</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?php echo URLROOT; ?>/groups/index">Groups</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?php echo URLROOT; ?>/pepgroups/index">people-Groups</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?php echo URLROOT; ?>/titles/index">titles</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?php echo URLROOT; ?>/peptits/index">people-titles</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?php echo URLROOT; ?>/languages/index">languages</a></li class="nav-item">
                            <li class="nav-item"><a class="nav-link" href="<?php echo URLROOT; ?>/peplans/index">languages-people</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?php echo URLROOT; ?>/timezones/index">timezones</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?php echo URLROOT; ?>/comments/index">comments</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?php echo URLROOT; ?>/images/index">Pictures</a></li>
                        </ul>
                        </p>
                    </div>
                </div>
                <button class="btn btn-link" type="button" data-bs-toggle="offcanvas" data-bs-target="#add_to_page" aria-controls="add_to_page">add</button>
                <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="add_to_page" aria-labelledby="add_to_pageLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="add_to_pageLabel">add item</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <p>
                            add
                        <ul class="nav flex-column">
                            <li class=" nav-item"><a class="nav-link" aria-current="page" href="<?php echo URLROOT . '/persons/add/'; ?>"><?= I_ADD_SIGN ?> person</a></li>
                            <li class=" nav-item"><a class="nav-link" aria-current="page" href="<?php echo URLROOT; ?>/phones/add"><?= I_ADD_SIGN ?> phone number</a></li>
                            <li class=" nav-item"><a class="nav-link" aria-current="page" href="<?php echo URLROOT . '/images/upload/'; ?>"><?= I_ADD_SIGN ?> picture</a></li>
                            <li class=" nav-item"><a class="nav-link" aria-current="page" href="<?php echo URLROOT . '/pepcous/add/'; ?>"><?= I_ADD_SIGN ?> Passport</a></li>
                            <li class=" nav-item"><a class="nav-link" aria-current="page" href="<?php echo URLROOT; ?>/titles/add"><?= I_ADD_SIGN ?> job title</a></li>
                            <li class=" nav-item"><a class="nav-link" aria-current="page" href="<?php echo URLROOT; ?>/peptits/add"><?= I_ADD_SIGN ?> person - title</a></li>
                            <li class=" nav-item"><a class="nav-link" aria-current="page" href="<?php echo URLROOT; ?>/groups/add"><?= I_ADD_SIGN ?> job title</a></li>
                            <li class=" nav-item"><a class="nav-link" aria-current="page" href="<?php echo URLROOT; ?>/pepgroups/add"><?= I_ADD_SIGN ?> person - title</a></li>
                            <li class=" nav-item"><a class="nav-link" aria-current="page" href="<?php echo URLROOT; ?>/languages/add"><?= I_ADD_SIGN ?> language</a></li>
                            <li class=" nav-item"><a class="nav-link" aria-current="page" href="<?php echo URLROOT; ?>/peplans/add"><?= I_ADD_SIGN ?> person/language relation</a></li>
                            <li class=" nav-item"><a class="nav-link" aria-current="page" href="<?php echo URLROOT; ?>/timezones/add"><?= I_ADD_SIGN ?> person/timezone relation</a></li>
                            <!-- <li class=" nav-item"><a class="nav-link" aria-current="page" href="<?php // echo URLROOT; 
                                                                                                        ?>/timezones/add"><?= I_ADD_SIGN ?> time zone</a></li> -->
                            <li class=" nav-item"><a class="nav-link" aria-current="page" href="<?php echo URLROOT; ?>/comments/add"><?= I_ADD_SIGN ?> comment</a></li>
                        </ul>
                        </p>
                    </div>
                </div>


            <?php else : ?>

            <?php endif; ?>
        </ul>
    </footer>
</div>
</div>
<script src="<?php echo URLROOT; ?>/js/bootstrap.js"></script>
<script src="https://kit.fontawesome.com/77ecebc9a9.js" crossorigin="anonymous"></script>
<script src="<?php echo URLROOT; ?>/js/script.js"></script>
</body>

</html>