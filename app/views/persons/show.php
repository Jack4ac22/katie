<?php require_once APPROOT . '/views/includes/header.php'; ?>
<?php //echo '<pre>' . var_export($data, true) . '</pre>'; 
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

    <div class="accordion" id="accordionPanelsStayOpenExample">
        <!-- personal information -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                    Personal
                </button>
            </h2>
            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                <div class="accordion-body">
                    <div class="container">
                        <div class="row justify-content-between">
                            <div class="col-md-6">
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
                                <div class="input-group mt-3">
                                    <a href="mailto:<?php echo $data['person']['person']->email ?>" class="input-group-text" id="basic-addon1">
                                        <?= I_EMAIL ?>
                                    </a>
                                    <input type="email" class="form-control" placeholder="Input group example" aria-label="Input group example" aria-describedby="basic-addon1" value="<?php echo $data['person']['person']->email ?>" name="email" disabled>
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
                            <div class="col-md-6">
                                <?php if (count($data['person']['phones']) > 0) : ?>
                                    <h5 class="mb-3">Phone number(s)</h5>
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
                                                    <a href="<?php echo URLROOT . '/phones/show/' . $phone->id; ?>" class="btn btn-info"><?= I_INFO ?> Check</a>
                                                    <a href="<?php echo URLROOT . '/phones/edit/' . $phone->id; ?>" class="btn btn-warning"><?= I_EDIT ?> edit</a>
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
            </div>
        </div>
        <!-- groups -->
        <!-- <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                    Groups
                </button>
            </h2>
            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                <div class="accordion-body">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Group-1</h5>
                            <h6 class="card-subtitle mb-2 text-muted">number of people in this group.</h6>
                            <p class="card-text">The description of this group.</p>
                            <a href="#" class="card-link">Remove from this group</a>
                            <a href="#" class="card-link">more...</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Residency -->
        <!-- <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                    Residency
                </button>
            </h2>
            <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
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
        <!-- <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">
                    Job titl(s)
                </button>
            </h2>
            <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFour">
                <div class="accordion-body">
                    Dummy
                </div>
            </div>
        </div> -->
        <!--  Make appointment -->
        <!-- <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingFive">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false" aria-controls="panelsStayOpen-collapseFive">
                    Make appointment
                </button>
            </h2>
            <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFive">
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
            <h2 class="accordion-header" id="panelsStayOpen-headingSix">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSix" aria-expanded="false" aria-controls="panelsStayOpen-collapseSix">
                    Language(s)
                </button>
            </h2>
            <div id="panelsStayOpen-collapseSix" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingSix">
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
                                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $lan->levle ?>%"></div>
                                        </div>
                                    </td>
                                    <td><?php echo $lan->comment ?></td>
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
            <h2 class="accordion-header" id="panelsStayOpen-headingEight">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseEight" aria-expanded="false" aria-controls="panelsStayOpen-collapseEight">
                    pictures
                </button>
            </h2>
            <div id="panelsStayOpen-collapseEight" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingEight">
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
                                            <p class="card-text"><?= $img->comment ?></p>
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
            <h2 class="accordion-header" id="panelsStayOpen-headingSeven">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSeven" aria-expanded="false" aria-controls="panelsStayOpen-collapseSeven">
                    Comments History
                </button>
            </h2>
            <div id="panelsStayOpen-collapseSeven" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingSeven">
                <div class="accordion-body">
                    Dummy
                </div>
            </div>
        </div>
    </div>
<?php else : ?>
<?php endif; ?>
<?php require_once APPROOT . '/views/includes/footer.php'; ?>