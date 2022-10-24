<?php require_once APPROOT . '/views/includes/header.php'; ?>
<?php //echo '<pre>' . var_export($data['person']['passports'], true) . '</pre>';
?>
<?php flash('msg'); ?>
<a href="<?php echo URLROOT; ?>/persons/index" class="btn btn-light btn-block">Back to all people <?= I_ARROW_L ?></a>
<?php if (isset($data['person'])) : ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-8 m-3 align-self-center">
                <figure class="figure">
                    <?php if ($data['person']['person']->img != null) : ?>
                        <img src="<?= IMGROOT . '/' . $data['person']['person']->img ?>" class="figure-img img-fluid rounded" alt="<?= $data['person']['person']->first_name . ' ' . $data['person']['person']->last_name . ' image' ?>">
                    <?php else : ?>
                        <?php if ($data['person']['person']->sex != 'male') : ?>
                            <img src="<?= IMGROOT . '/' . 'female.png' ?>" class="figure-img img-fluid rounded" alt="female">
                        <?php else : ?>
                            <img src="<?= IMGROOT . '/' . 'male.png' ?>" class="figure-img img-fluid rounded" alt="male">
                        <?php endif; ?>
                    <?php endif; ?>
                    <figcaption class="figure-caption">
                        <h2 class="mt-0"><?php echo $data['person']['person']->first_name . ' ' . $data['person']['person']->last_name; ?>
                        </h2><a href="<?php echo URLROOT . '/images/upload/' . $data['person']['person']->id; ?>" type="button" class="btn btn-primary"><?= I_PIC ?> Update the profile picture</a>
                    </figcaption>
                </figure>
            </div>
        </div>
    </div>
    <div class="accordion" id="accordionperson_pannel_openExample">

        <!-- personal information -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="person_pannel_open-headingOne">
                <button class="accordion-button show" type="button" data-bs-toggle="collapse" data-bs-target="#person_pannel_open-collapseOne" aria-expanded="false" aria-controls="person_pannel_open-collapseOne">

                    Personal
                </button>
            </h2>
            <div id="person_pannel_open-collapseOne" class="accordion-collapse collapse show" aria-labelledby="person_pannel_open-headingOne">
                <div class="accordion-body">
                    <div class="container">
                        <div class="row justify-content-between">
                            <div class="col">
                                <h3 class="mt-0">Full name:
                                    <?php echo $data['person']['person']->first_name . ' ' . $data['person']['person']->last_name; ?>
                                </h3>
                                <h3 class="mt-3">
                                    Gender:
                                    <?php if ($data['person']['person']->sex == 'male') : ?>
                                        <span class="badge rounded-pill text-bg-dark">male</span>
                                    <?php else : ?>
                                        <span class="badge rounded-pill text-bg-info">female</span>
                                    <?php endif; ?>
                                    </a>
                                </h3>
                                <div class="container mb-3">
                                    <a href="mailto:<?php echo $data['person']['person']->email ?>" class="btn btn-light">
                                        <span class="alert alert-light"><?= I_EMAIL ?> Email: </a></span>
                                    <span> <?php echo $data['person']['person']->email ?> </span>
                                </div>
                                <div class="container mb-3">
                                    <span class="alert alert-light">
                                        <?= I_DATE ?> birthday: </span>
                                    <span> <?php echo $data['person']['person']->birthday ?> </span>
                                </div>

                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="mt-5">
                                            <a href="<?php echo URLROOT . '/persons/edit/' . $data['person']['person']->id; ?>" type="button" class="btn btn-warning"><?= I_EDIT ?> Edit</a>
                                            <a href="<?php echo URLROOT . '/images/upload/' . $data['person']['person']->id; ?>" type="button" class="btn btn-primary"><?= I_PIC ?> Update the profile picture</a>
                                            <!-- Modal  -->
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-danger me-md-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <?= I_DELETE ?> delete
                                            </button>
                                            <!-- Modal Edite -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Deleting <?php echo $data['person']['person']->first_name . ' ' . $data['person']['person']->last_name; ?>
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure that you want to delete this person.</div>
                                                        <div class="modal-footer">
                                                            <form method="post" action="<?php echo URLROOT; ?>/persons/delete_person/<?php echo $data['person']['person']->id ?>/<?php echo $data['person']['person']->id; ?>">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-danger"><?= I_DELETE ?>
                                                                    delete</a>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Phone numbers -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingPhones">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePhones" aria-expanded="false" aria-controls="collapsePhones">
                    <div class="row justify-content-between">
                        <?php if (count($data['person']['phones']) > 0) : ?>
                            <div class="col">Phone numbers</div>

                            <div class='position-relative col'><span class="badge bg-secondary position-relative"> total regestered numbers:</span>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    <?= count($data['person']['phones']) ?>
                                </span>
                            </div>
                        <?php else : ?>
                            <div class="col">No phone numbers</div>
                        <?php endif; ?>
                    </div>
                </button>
            </h2>
            <div id="collapsePhones" class="accordion-collapse collapse" aria-labelledby="headingPhones" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div class="col-12 mt-3">
                        <?php if (count($data['person']['phones']) > 0) : ?>
                            <h5 class=" mb-3">Phone number(s)</h5>
                            <?php foreach ($data['person']['phones'] as $phone) : ?>
                                <div class="row justify-content-between mb-3">
                                    <div class="col">
                                        <div class="input-group">
                                            <a href="tel:<?php echo $phone->number ?>" class="input-group-text" id="basic-addon1">
                                                <?= I_PHONE ?>
                                            </a>
                                            <input type="phone" class="form-control" placeholder="Input group example" aria-label="Input group example" aria-describedby="basic-addon1" value="<?php echo $phone->number; ?>" name="phone" disabled>
                                            <input type="text" class="form-control" placeholder="Input group example" aria-label="Input group example" aria-describedby="basic-addon1" value="<?php echo $phone->description ?? ' '; ?>" name="phone" disabled>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                            <a href="<?php echo URLROOT . '/phones/edit/' . $phone->id; ?>" class="btn btn-warning"><?= I_EDIT ?></a>

                                            <!-- Button trigger modal -> delete phone -->
                                            <button type="button" class="btn btn-danger me-md-2" data-bs-toggle="modal" data-bs-target="#delete_phone_<?= $phone->id ?>">
                                                <?= I_DELETE ?></button>
                                            <!-- Modal Edite -->
                                            <div class="modal fade" id="delete_phone_<?= $phone->id ?>" tabindex="-1" aria-labelledby="delete_phone_<?= $phone->id ?>lLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="delete_phone_<?= $phone->id ?>Label">Deleting <?= $phone->number ?>
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure that you want to delete <mark>phone number</mark>.</p>
                                                            <p>The folwoing number: <mark><?= $phone->number ?></mark> will no longer appear at <?php echo $data['person']['person']->first_name . ' ' . $data['person']['person']->last_name; ?> personal information, <mark>NOR</mark> it will exisit at your database.</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form method="post" action="<?php echo URLROOT; ?>/phones/delete_from_user/<?php echo $phone->id ?>/<?php echo $data['person']['person']->id; ?>">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-danger"><?= I_DELETE ?>
                                                                    delete</a>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <div class="alert alert-warning" role="alert">
                                <h6>No phone numbers were found for this person in the database.</h6>
                            </div>
                        <?php endif; ?>

                        <!-- add button to add a new phone number to the current -->
                        <div class="container">
                            <div class="row justify-content-end">
                                <div class="col-6 mt-5">
                                    <a class="btn btn-primary" href="<?php echo URLROOT . '/phones/add/' . $data['person']['person']->id; ?>">Add new number</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--  passports(s) -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="person_pannel_open-headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#person_pannel_open-collapse-passports" aria-expanded="false" aria-controls="person_pannel_open-collapse-passports">
                    <div class="row justify-content-between">
                        <?php if (isset(($data['person']['n_count'])) && ($data['person']['n_count'] > 0)) : ?>
                            <div class="col">Passports</div>

                            <div class='position-relative col'><span class="badge bg-secondary position-relative"> total passports</span>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    <?= $data['person']['n_count'] ?>
                                </span>
                            </div>
                        <?php else : ?>
                            <div class="col">No job titles</div>
                        <?php endif; ?>
                    </div>
                </button>
            </h2>
            <div id="person_pannel_open-collapse-passports" class="accordion-collapse collapse" aria-labelledby="person_pannel_open-heading-passports">
                <div class="accordion-body">
                    <?php if (isset(($data['person']['n_count'])) && ($data['person']['n_count'] > 0)) : ?>
                        <a class="btn btn-primary" href="<?php echo URLROOT . '/pepcous/add/' . $data['person']['person']->id; ?>">Add another passport</a>
                        <div class="row justify-content-between">
                            <?php foreach ($data['person']['passports'] as $passport) : ?>
                                <div class="col-md-6 g-3">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="row justify-content-between">
                                                <div class="col">
                                                    <h2><?= $passport->en_short_name ?? 'No name' ?> <a href="<?= URLROOT . '/pepcous/show_c/' . $passport->c_id ?>"><?= I_INFO ?></a> </h2>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text" style="white-space: pre-line"><b>Nationality:</b> <?= $passport->nationality ?? 'No name' ?> </p>
                                            <p class="card-text" style="white-space: pre-line"> </p>
                                            <a href="<?= URLROOT . '/pepcous/show/' . $passport->id ?>" class="btn btn-primary">more</a>
                                            <a href="<?= URLROOT . '/pepcous/edit/' . $passport->id ?>" class="btn btn-warning">Edit</a>
                                            <button type="button" class="btn btn-danger me-md-2" data-bs-toggle="modal" data-bs-target="#delete_passport<?= $passport->id ?>Modal">Delete</button>
                                            <!-- Modal delete -->
                                            <div class="modal fade" id="delete_passport<?= $passport->id ?>Modal" tabindex="-1" aria-labelledby="delete_passport<?= $passport->id ?>ModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="delete_passport<?= $passport->id ?>ModalLabel">Delete comment
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            If you continue, The title will NOT appear at <?= $data['person']['person']->first_name  . ' ' . $data['person']['person']->last_name ?>'s personal information page.</div>
                                                        <div class="modal-footer">
                                                            <form action="<?= URLROOT ?>/pepcous/delete_pepcou/<?= $passport->id ?>" method="post">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-danger"><?= I_DELETE ?>
                                                                    Delete</a>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else : ?>
                        <div class="alert alert-warning" role="alert">
                            <h4 class="alert-heading">No passport was cound for <?php echo $data['person']['person']->first_name . ' ' . $data['person']['person']->last_name; ?></h4>
                            <p>You can check the <a href="<?= URLROOT ?>/pepcous" class="alert-link">countries page</a> and use the search. </p>
                            <hr>
                            <p class="mb-0">Otherwise, you can add a passport by clicking on the add button, or by using <a href="<?= URLROOT ?>/pepcous/add/<?= $data['person']['person']->id ?>" class="alert-link">this link</a>.</p>
                        </div>
                        <a class="btn btn-primary mt-3" href="<?php echo URLROOT . '/peptits/add/' . $data['person']['person']->id; ?>">Add a title</a>

                    <?php endif; ?>
                </div>
            </div>
        </div>
        <!-- groups -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="person_pannel_open-headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#person_pannel_open-collapseTwo" aria-expanded="false" aria-controls="person_pannel_open-collapseTwo">
                    <div class="row justify-content-between">
                        <?php if (isset(($data['person']['g_count'])) && ($data['person']['g_count'] > 0)) : ?>
                            <div class="col">Groups</div>
                            <div class='position-relative col'><span class="badge bg-secondary position-relative"> total groups</span>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    <?= $data['person']['g_count'] ?>
                                </span>
                            </div>
                        <?php else : ?>
                            <div class="col">No groups</div>
                        <?php endif; ?>
                    </div>
                </button>
            </h2>
            <div id="person_pannel_open-collapseTwo" class="accordion-collapse collapse" aria-labelledby="person_pannel_open-headingTwo">
                <div class="accordion-body">

                    <?php if (isset(($data['person']['g_count'])) && ($data['person']['g_count'] > 0)) : ?>

                        <a class="btn btn-primary" href="<?php echo URLROOT . '/pepgroups/add/' . $data['person']['person']->id; ?>">Add another group</a>

                        <div class="row justify-content-between">
                            <?php foreach ($data['person']['groups'] as $group) : ?>
                                <div class="col-md-6 g-3">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="row justify-content-between">
                                                <div class="col">
                                                    <h2><?= $group->title ?? 'No Title' ?></h2>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text" style="white-space: pre-line"><b>Group' description:</b></p>
                                            <p class="card-text" style="white-space: pre-line"> <?php if (strlen($group->g_description) > 150) {
                                                                                                    echo substr($group->g_description, 0, 150) . ' ...';
                                                                                                } else {
                                                                                                    echo $group->g_description;
                                                                                                }; ?></p>
                                            <?php if (strlen($group->comment) > 0) : ?>
                                                <p class="card-text" style="white-space: pre-line">
                                                    <b>Personal comment:</b>
                                                </p>
                                                <p class="card-text" style="white-space: pre-line"> <?php if (strlen($group->comment) > 250) {
                                                                                                        echo substr($group->comment, 0, 250) . '...';
                                                                                                    } else {
                                                                                                        echo $group->comment;
                                                                                                    }; ?></p>
                                            <?php endif; ?>
                                            <a href="<?= URLROOT . '/pepgroups/show/' . $group->id ?>" class="btn btn-primary">more</a>
                                            <a href="<?= URLROOT . '/pepgroups/edit/' . $group->id ?>" class="btn btn-warning">Edit</a>
                                            <button type="button" class="btn btn-danger me-md-2" data-bs-toggle="modal" data-bs-target="#delete_pep_group<?= $group->id ?>Modal">Delete</button>
                                            <!-- Modal delete -->
                                            <div class="modal fade" id="delete_pep_group<?= $group->id ?>Modal" tabindex="-1" aria-labelledby="delete_pep_group<?= $group->id ?>ModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="delete_pep_group<?= $group->id ?>ModalLabel">Delete comment
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            If you continue, The group will NOT appear at <?= $data['person']['person']->first_name  . ' ' . $data['person']['person']->last_name ?>'s personal information page.</div>
                                                        <div class="modal-footer">
                                                            <form action="<?= URLROOT ?>/pepgroups/delete_pepgroup/<?= $group->id ?>" method="post">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-danger"><?= I_DELETE ?>
                                                                    Delete</a>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <a class="btn btn-primary mt-3" href="<?php echo URLROOT . '/comments/add/' . $data['person']['person']->id; ?>">Add another title</a>
                    <?php else : ?>
                        <div class="alert alert-warning" role="alert">
                            <h4 class="alert-heading">No job titles were cound for <?php echo $data['person']['person']->first_name . ' ' . $data['person']['person']->last_name; ?></h4>
                            <p>You can check the <a href="<?= URLROOT ?>/titles" class="alert-link">job titles page</a> and use the search. </p>
                            <hr>
                            <p class="mb-0">Otherwise, you can add some titles by clicking on the add button, or by using <a href="<?= URLROOT ?>/titles/add/<?= $data['person']['person']->id ?>" class="alert-link">this link</a>.</p>
                        </div>
                    <?php endif; ?>
                </div>


            </div>
        </div>
        <!-- Residency -->
        <!-- <div class="accordion-item">
            <h2 class="accordion-header" id="person_pannel_open-headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#person_pannel_open-collapseThree" aria-expanded="false" aria-controls="person_pannel_open-collapseThree">
                    Residency
                </button>
            </h2>
            <div id="person_pannel_open-collapseThree" class="accordion-collapse collapse" aria-labelledby="person_pannel_open-headingThree">
                <div class="accordion-body">



                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            <div class="input-group ">
                                <a href="" class="input-group-text" id="basic-addon1">
                                    <?= I_HOME ?>
                                </a>
                                <input type="phone" class="form-control" placeholder="Input group example" aria-label="Input group example" aria-describedby="basic-addon1" value="location A" name="phone" disabled>
                            </div>
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                        <label class="form-check-label" for="flexRadioDefault2">
                            <div class="input-group ">
                                <a href="" class="input-group-text" id="basic-addon1">
                                    <?= I_TOOLS ?>
                                </a>
                                <input type="phone" class="form-control" placeholder="Input group example" aria-label="Input group example" aria-describedby="basic-addon1" value="location B" name="phone" disabled>
                            </div>
                        </label>
                    </div>
                </div>
            </div>
        </div> -->
        <!--  Job titl(s) -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="person_pannel_open-headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#person_pannel_open-collapseFour" aria-expanded="false" aria-controls="person_pannel_open-collapseFour">
                    <div class="row justify-content-between">
                        <?php if (isset(($data['person']['t_count'])) && ($data['person']['t_count'] > 0)) : ?>
                            <div class="col">Job titls</div>

                            <div class='position-relative col'><span class="badge bg-secondary position-relative"> total job-titles</span>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    <?= $data['person']['t_count'] ?>
                                </span>
                            </div>
                        <?php else : ?>
                            <div class="col">No job titles</div>
                        <?php endif; ?>
                    </div>
                </button>
            </h2>
            <div id="person_pannel_open-collapseFour" class="accordion-collapse collapse" aria-labelledby="person_pannel_open-headingFour">
                <div class="accordion-body">
                    <?php if (isset(($data['person']['t_count'])) && ($data['person']['t_count'] > 0)) : ?>
                        <a class="btn btn-primary" href="<?php echo URLROOT . '/peptits/add/' . $data['person']['person']->id; ?>">Add another title</a>
                        <div class="row justify-content-between">
                            <?php foreach ($data['person']['titles'] as $title) : ?>
                                <div class="col-md-6 g-3">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="row justify-content-between">
                                                <div class="col">
                                                    <h2><?= $title->title ?? 'No Title' ?> <a href="<?= URLROOT . '/titles/show/' . $title->t_id ?>"><?= I_INFO ?></a> </h2>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text" style="white-space: pre-line"><b>Job-title description:</b></p>
                                            <p class="card-text" style="white-space: pre-line"> <?php if (strlen($title->t_description) > 150) {
                                                                                                    echo substr($title->t_description, 0, 150) . ' ...';
                                                                                                } else {
                                                                                                    echo $title->t_description;
                                                                                                }; ?>.</p>
                                            <?php if (strlen($title->description) > 0) : ?>
                                                <p class="card-text" style="white-space: pre-line">
                                                    <b>personal description:</b>
                                                </p>
                                                <p class="card-text" style="white-space: pre-line"> <?php if (strlen($title->description) > 250) {
                                                                                                        echo substr($title->description, 0, 250) . '...';
                                                                                                    } else {
                                                                                                        echo $title->description;
                                                                                                    }; ?></p>
                                            <?php endif; ?>
                                            <a href="<?= URLROOT . '/peptits/show/' . $title->id ?>" class="btn btn-primary">more</a>
                                            <a href="<?= URLROOT . '/peptits/edit/' . $title->id ?>" class="btn btn-warning">Edit</a>
                                            <button type="button" class="btn btn-danger me-md-2" data-bs-toggle="modal" data-bs-target="#delete_peptitle<?= $title->id ?>Modal">Delete</button>
                                            <!-- Modal delete -->
                                            <div class="modal fade" id="delete_peptitle<?= $title->id ?>Modal" tabindex="-1" aria-labelledby="delete_peptitle<?= $title->id ?>ModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="delete_peptitle<?= $title->id ?>ModalLabel">Delete comment
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            If you continue, The title will NOT appear at <?= $data['person']['person']->first_name  . ' ' . $data['person']['person']->last_name ?>'s personal information page.</div>
                                                        <div class="modal-footer">
                                                            <form action="<?= URLROOT ?>/peptits/delete_peptit/<?= $title->id ?>" method="post">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-danger"><?= I_DELETE ?>
                                                                    Delete</a>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <a class="btn btn-primary mt-3" href="<?php echo URLROOT . '/peptits/add/' . $data['person']['person']->id; ?>">Add another title</a>
                    <?php else : ?>
                        <div class="alert alert-warning" role="alert">
                            <h4 class="alert-heading">No job titles were cound for <?php echo $data['person']['person']->first_name . ' ' . $data['person']['person']->last_name; ?></h4>
                            <p>You can check the <a href="<?= URLROOT ?>/titles" class="alert-link">job titles page</a> and use the search. </p>
                            <hr>
                            <p class="mb-0">Otherwise, you can add some titles by clicking on the add button, or by using <a href="<?= URLROOT ?>/peptits/add/<?= $data['person']['person']->id ?>" class="alert-link">this link</a>.</p>
                        </div>
                        <a class="btn btn-primary mt-3" href="<?php echo URLROOT . '/peptits/add/' . $data['person']['person']->id; ?>">Add a title</a>

                    <?php endif; ?>
                </div>
            </div>
        </div>
        <!--  Make appointment -->
        <!-- <div class="accordion-item">
            <h2 class="accordion-header" id="person_pannel_open-headingFive">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#person_pannel_open-collapseFive" aria-expanded="false" aria-controls="person_pannel_open-collapseFive">
                    Make appointment
                </button>
            </h2>
            <div id="person_pannel_open-collapseFive" class="accordion-collapse collapse" aria-labelledby="person_pannel_open-headingFive">
                <div class="accordion-body">
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-label="Segment one" style="width: 4%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">1</div>
                        <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" aria-label="Segment two" style="width: 4%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">2</div>
                        <div class="progress-bar" role="progressbar" aria-label="Segment one" style="width: 4%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">3</div>
                        <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" aria-label="Segment two" style="width: 4%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">4</div>
                        <div class="progress-bar" role="progressbar" aria-label="Segment one" style="width: 4%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">5</div>
                        <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" aria-label="Segment two" style="width: 4%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">6</div>
                        <div class="progress-bar" role="progressbar" aria-label="Segment one" style="width: 4%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">7</div>
                        <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" aria-label="Segment two" style="width: 4%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">8</div>
                        <div class="progress-bar" role="progressbar" aria-label="Segment one" style="width: 4%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">9</div>
                        <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" aria-label="Segment two" style="width: 4%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">10</div>
                        <div class="progress-bar" role="progressbar" aria-label="Segment one" style="width: 4%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">11</div>
                        <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" aria-label="Segment two" style="width: 4%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">12</div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-label="Segment one" style="width: 4%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">3</div>
                        <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" aria-label="Segment two" style="width: 4%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">4</div>
                        <div class="progress-bar" role="progressbar" aria-label="Segment one" style="width: 4%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">5</div>
                        <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" aria-label="Segment two" style="width: 4%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">6</div>
                        <div class="progress-bar" role="progressbar" aria-label="Segment one" style="width: 4%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">7</div>
                        <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" aria-label="Segment two" style="width: 4%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">8</div>
                        <div class="progress-bar" role="progressbar" aria-label="Segment one" style="width: 4%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">9</div>
                        <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" aria-label="Segment two" style="width: 4%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">10</div>
                        <div class="progress-bar" role="progressbar" aria-label="Segment one" style="width: 4%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">11</div>
                        <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" aria-label="Segment two" style="width: 4%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">12</div>
                        <div class="progress-bar" role="progressbar" aria-label="Segment one" style="width: 4%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">1</div>
                        <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" aria-label="Segment two" style="width: 4%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">2</div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Language(s) -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="person_pannel_open-headingSix">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#person_pannel_open-collapseSix" aria-expanded="false" aria-controls="person_pannel_open-collapseSix">
                    <div class="row justify-content-between">
                        <?php if (isset(($data['person']['l_count'])) && ($data['person']['l_count'] > 0)) : ?>
                            <div class="col">languages</div>

                            <div class='position-relative col'><span class="badge bg-secondary position-relative"> total languages</span>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    <?= $data['person']['l_count'] ?>
                                </span>
                            </div>
                        <?php else : ?>
                            <div class="col">No languages</div>
                        <?php endif; ?>
                    </div>
                </button>
            </h2>
            <div id="person_pannel_open-collapseSix" class="accordion-collapse collapse" aria-labelledby="person_pannel_open-headingSix">
                <div class="accordion-body">
                    <a href="<?php echo URLROOT . '/peplans/add/' . $data['person']['person']->id; ?>" class="btn btn-primary">add a new language to this person</a>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Language</th>
                                <th scope="col">levle</th>
                                <th scope="col">comment</th>
                                <th scope="col">more actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['person']['languages'] as $lan) : ?>
                                <tr>
                                    <th scope="row"><a href="<?php echo URLROOT . '/languages/show/' . $lan->lan_id; ?>" class="btn btn-light"><?php echo $lan->title; ?></a></th>
                                    <td>

                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated 
                                            <?php switch ($lan->levle) {
                                                case $lan->levle == 100:
                                                    echo 'bg-success';
                                                    break;
                                                case $lan->levle == 75:
                                                    echo 'bg-info';
                                                    break;
                                                case $lan->levle == 50:
                                                    echo 'bg-warning';
                                                    break;
                                                case $lan->levle == 25:
                                                    echo 'bg-danger';
                                                    break;
                                                default:
                                                    echo '';
                                            } ?>
                                            " role="progressbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $lan->levle ?>%"></div>
                                        </div>

                                    </td>
                                    <td style="white-space: pre-line"><?php echo $lan->comment ?></td>
                                    <td>
                                        <div class="col">
                                            <div class="btn-group mb-3" role="group" aria-label="Basic example">
                                                <a href="<?php echo URLROOT . '/peplans/edit/' . $lan->id; ?>" class="btn btn-primary"><?= I_LANGUAGE ?> Level</a>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-danger me-md-2" data-bs-toggle="modal" data-bs-target="#peplan<?= $lan->id ?>Modal"><?= I_DELETE ?>
                                                    <?= I_PERSON ?> Remove
                                                </button>
                                            </div>
                                            <!-- Modal Edit -->
                                            <div class="modal fade" id="peplan<?= $lan->id ?>Modal" tabindex="-1" aria-labelledby="peplan<?= $lan->id ?>ModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="peplan<?= $lan->id ?>ModalLabel">Delete <?= $lan->title . ' / ' . $data['person']['person']->first_name . ' ' . $data['person']['person']->last_name ?> relation
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            If you continue, The language will NOT appear at <?= $data['person']['person']->first_name . ' ' . $data['person']['person']->last_name ?>'s personal information page, NOR he will appear on <?= $lan->title; ?> page.</div>
                                                        <div class="modal-footer">
                                                            <form method="post" action="<?php echo URLROOT; ?>/peplans/delete_peplan/<?= $lan->id ?>">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-danger"><?= I_DELETE ?>
                                                                    delete</a>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </th>
                                        </div>
                                    </td>
                                </tr>

                            <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <!-- pictures -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="person_pannel_open-headingEight">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#person_pannel_open-collapseEight" aria-expanded="false" aria-controls="person_pannel_open-collapseEight">
                    <div class="row justify-content-between">
                        <?php if (isset(($data['person']['p_count'])) && ($data['person']['p_count'] > 0)) : ?>
                            <div class="col">Pictures</div>

                            <div class='position-relative col'><span class="badge bg-secondary position-relative"> total pictures</span>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    <?= $data['person']['p_count'] ?>
                                </span>
                            </div>
                        <?php else : ?>
                            <div class="col">No pictures</div>
                        <?php endif; ?>
                    </div>
                </button>
            </h2>
            <div id="person_pannel_open-collapseEight" class="accordion-collapse collapse" aria-labelledby="person_pannel_open-headingEight">
                <div class="accordion-body">
                    <div class="mb-3"><a href="<?= URLROOT . '/images/upload/' . $data['person']['person']->id ?>" class="btn btn-primary">upload <?= I_PIC ?></a></div>
                    <div class="row justify-content-center">
                        <div class="card-group">
                            <?php foreach ($data['person']['images'] as $img) : ?>
                                <div class=" col-md-6 col-lg-4">
                                    <div class="card" style="width: 18rem;">
                                        <a href="<?= URLROOT . '/images/show/' . $img->id ?>">
                                            <img src="<?= IMGROOT . '/' . $img->img_path ?>" class="d-block w-100" alt="<?= $data['person']['person']->first_name  . ' ' . $img->comment ?>"></a>
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $img->img_path ?></h5>
                                            <p class="card-text" style="white-space: pre-line"><?= $img->comment ?></p>
                                            <p class="card-text"><small class="text-muted">Uploaded on: <?= $img->uploaded_at ?></small></p>
                                        </div>
                                        <div class="col m-3">
                                            <a href="<?= URLROOT . '/images/edit/' . $img->id ?>" class=" btn btn-warning me-md-2">Update</a>
                                            <!-- set -->
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary me-md-2" data-bs-toggle="modal" data-bs-target="#image<?= $img->id ?>Modal">Set</button>
                                            <!-- Modal Edit -->
                                            <div class="modal fade" id="image<?= $img->id ?>Modal" tabindex="-1" aria-labelledby="image<?= $img->id ?>ModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="image<?= $img->id ?>ModalLabel">Set new profile Image
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <img src="<?= IMGROOT . '/' . $img->img_path ?>" class="d-block w-100" alt="<?= $data['person']['person']->first_name . ' ' . $img->comment ?>" style="max-width: ;150px">
                                                            do you want to set this image as a profile picture image for <?= $data['person']['person']->first_name . ' ' . $data['person']['person']->last_name ?>.
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="<?= URLROOT ?>/images/set/<?= $img->id ?>" method="post">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">
                                                                    Set</a>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- delete -->
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-danger me-md-2" data-bs-toggle="modal" data-bs-target="#delete_img<?= $img->id ?>Modal">Remove</button>
                                            <!-- Modal remove -->
                                            <div class="modal fade" id="delete_img<?= $img->id ?>Modal" tabindex="-1" aria-labelledby="delete_img<?= $img->id ?>ModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="delete_img<?= $img->id ?>ModalLabel">Delete Image
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            If you continue, The image will NOT appear at <?= $data['person']['person']->first_name . ' ' . $data['person']['person']->last_name ?>'s personal information page, and the file will be removed from your pictures directory.</div>
                                                        <div class="modal-footer">
                                                            <form action="<?= URLROOT ?>/images/delete/<?= $img->id ?>" method="post">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-danger"><?= I_DELETE ?>
                                                                    Remove</a>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Comments History -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="person_pannel_open-headingSeven">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#person_pannel_open-collapseSeven" aria-expanded="false" aria-controls="person_pannel_open-collapseSeven">
                    <div class="row justify-content-between">
                        <?php if (isset(($data['person']['c_count'])) && ($data['person']['c_count'] > 0)) : ?>
                            <div class="col">Comments</div>

                            <div class='position-relative col'><span class="badge bg-secondary position-relative"> total comments</span>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    <?= $data['person']['c_count'] ?>
                                </span>
                            </div>
                        <?php else : ?>
                            <div class="col">No Comments</div>
                        <?php endif; ?>
                    </div>
                </button>
            </h2>
            <div id="person_pannel_open-collapseSeven" class="accordion-collapse collapse" aria-labelledby="person_pannel_open-headingSeven">
                <div class="accordion-body">
                    <?php if (isset(($data['person']['c_count'])) && ($data['person']['c_count'] > 0)) : ?>

                        <a class="btn btn-primary" href="<?php echo URLROOT . '/comments/add/' . $data['person']['person']->id; ?>">Add another comment</a>

                        <div class="row justify-content-between">
                            <?php foreach ($data['person']['comments'] as $comment) : ?>
                                <div class="col-md-6 g-3">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="row justify-content-between">
                                                <div class="col">
                                                    <h2><?= $comment->title ?? 'No Title' ?></h2>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <p class="h6">created : <?= $comment->created_at ?></p> <?php if ($comment->edited_at != null) : ?><p class="h6">last update : <?= $comment->edited_at ?> <?php endif; ?></p>


                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-striped progress-bar-animated
                            <?php switch ($comment->value) {
                                    case $comment->value > 80:
                                        echo 'bg-danger';
                                        break;
                                    case $comment->value > 60:
                                        echo 'bg-warning';
                                        break;
                                    case $comment->value > 40:
                                        echo 'bg-info';
                                        break;
                                    case $comment->value > 20:
                                        echo 'bg-success';
                                        break;
                                    default:
                                        echo '';
                                } ?>
                            
                            " role="progressbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $comment->value ?>%"></div>
                                                </div>

                                                <p class="card-text" style="white-space: pre-line"><?php if (strlen($comment->text) > 150) {
                                                                                                        echo substr($comment->text, 0, 150) . ' ...';
                                                                                                    } else {
                                                                                                        echo $comment->text;
                                                                                                    }; ?>.</p>

                                                <a href="<?= URLROOT . '/comments/show/' . $comment->id ?>" class="btn btn-primary">read</a>
                                                <a href="<?= URLROOT . '/comments/edit/' . $comment->id ?>" class="btn btn-warning">Edit</a>
                                                <button type="button" class="btn btn-danger me-md-2" data-bs-toggle="modal" data-bs-target="#delete_comment<?= $comment->id ?>Modal">Delete</button>
                                                <!-- Modal delete -->
                                                <div class="modal fade" id="delete_comment<?= $comment->id ?>Modal" tabindex="-1" aria-labelledby="delete_comment<?= $comment->id ?>ModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="delete_comment<?= $comment->id ?>ModalLabel">Delete comment
                                                                </h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                If you continue, The comment will NOT appear at <?= $data['person']['person']->first_name  . ' ' . $data['person']['person']->last_name ?>'s personal information page.</div>
                                                            <div class="modal-footer">
                                                                <form action="<?= URLROOT ?>/comments/delete/<?= $comment->id ?>" method="post">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-danger"><?= I_DELETE ?>
                                                                        Delete</a>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <a class="btn btn-primary mt-3" href="<?php echo URLROOT . '/comments/add/' . $data['person']['person']->id; ?>">Add another comment</a>



                    <?php else : ?>
                        <div class="alert alert-warning" role="alert">
                            <h4 class="alert-heading">No comments were cound for <?php echo $data['person']['person']->first_name . ' ' . $data['person']['person']->last_name; ?></h4>
                            <p>You can check the <a href="<?= URLROOT ?>/comments" class="alert-link">comments page</a> and use the search. </p>
                            <hr>
                            <p class="mb-0">Otherwise, you can add some comments by clicking on the add button, or by using <a href="<?= URLROOT ?>/comments/add/<?= $data['person']['person']->id ?>" class="alert-link">this link</a>.</p>

                        </div>
                        <a class="btn btn-primary " href="<?php echo URLROOT . '/comments/add/' . $data['person']['person']->id; ?>">Add a comment</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php else : ?>
<?php endif; ?>
<?php require_once APPROOT . '/views/includes/footer.php'; ?>