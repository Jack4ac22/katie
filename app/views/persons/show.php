<?php require_once APPROOT . '/views/includes/header.php'; ?>
<a href="<?php echo URLROOT; ?>/persons/index" class="btn btn-light btn-block">Back to all people <i
        class="fa-sharp fa-solid fa-backward"></i></a>



<?php if (isset($data['person'])) : ?>
<div class="accordion" id="accordionPanelsStayOpenExample">
    <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                aria-controls="panelsStayOpen-collapseOne">
                Personal
            </button>
        </h2>
        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
            aria-labelledby="panelsStayOpen-headingOne">
            <div class="accordion-body">
                <div class="d-flex position-relative">
                    <img src="https://cdn.pixabay.com/photo/2016/06/01/00/01/sad-1428080__340.png"
                        class="flex-shrink-0 me-3" alt="...">
                    <div>
                        <h5 class="mt-0">Full name:
                            <?php echo $data['person']['person']->first_name . ' ' . $data['person']['person']->last_name; ?>
                        </h5>
                        <div class="input-group m-3">
                            <a href="mailto:<?php echo $data['person']['person']->email ?>" class="input-group-text"
                                id="basic-addon1">
                                <i class="fa-sharp fa-solid fa-envelope"></i>
                            </a>
                            <input type="email" class="form-control" placeholder="Input group example"
                                aria-label="Input group example" aria-describedby="basic-addon1"
                                value="<?php echo $data['person']['person']->email ?>" name="email" disabled>
                        </div>
                        <?php if (count($data['person']['phones']) > 0) : ?>
                        <h5 class="mt-0">Phone number(s)</h5>
                        <?php foreach ($data['person']['phones'] as $phone) : ?>
                        <div class="input-group m-3">
                            <a href="tel:<?php echo $phone->number ?>" class="input-group-text" id="basic-addon1">
                                <i class="fa-sharp fa-solid fa-phone"></i>
                            </a>
                            <input type="phone" class="form-control" placeholder="Input group example"
                                aria-label="Input group example" aria-describedby="basic-addon1"
                                value="<?php echo $phone->number; ?>" name="phone" disabled>
                        </div>


                        <?php endforeach; ?>
                        <?php else : ?>
                        <div class="alert alert-warning" role="alert">
                            <h6>No phone numbers were found for this person in the database.</h6>
                        </div>

                        <?php endif; ?>
                        <div class="m-3">
                            <?php if ($data['person']['person']->sex == 'male') : ?>
                            <h2><span class="badge rounded-pill text-bg-dark"><i
                                        class="fa-sharp fa-solid fa-person"></i></i> male</span> </h2>
                            <?php else : ?>
                            <h2><span class="badge rounded-pill text-bg-info"><i
                                        class="fa-sharp fa-solid fa-person-dress"></i> female</span></h2>
                            <?php endif; ?>
                            </a>
                        </div>

                        <!-- Modal  -->
                        <div class="m-3 d-grid gap-2 d-md-flex justify-content-md-end">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary me-md-2" data-bs-toggle="modal"
                                data-bs-target="#exampleModal"><i class="fa-sharp fa-solid fa-pen-to-square"></i>
                                edit
                            </button>

                            <!-- Modal Edite -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edite the personal
                                                informations</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure that you want to edite the information. </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                                                    class="fa-sharp fa-solid fa-xmark"></i> Close</button>
                                            <a href="<?php echo URLROOT . '/persons/edit/' . $data['person']['person']->id; ?>"
                                                type="button" class="btn btn-primary"><i
                                                    class="fa-sharp fa-solid fa-pen-to-square"></i> Edit</a>
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
    <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                aria-controls="panelsStayOpen-collapseTwo">
                Groups
            </button>
        </h2>
        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse"
            aria-labelledby="panelsStayOpen-headingTwo">
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
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                aria-controls="panelsStayOpen-collapseThree">
                Residency
            </button>
        </h2>
        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse"
            aria-labelledby="panelsStayOpen-headingThree">
            <div class="accordion-body">



                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        <div class="input-group ">
                            <a href="" class="input-group-text" id="basic-addon1">
                                <i class="fa-solid fa-plane-departure"></i>
                            </a>
                            <input type="phone" class="form-control" placeholder="Input group example"
                                aria-label="Input group example" aria-describedby="basic-addon1" value="location A"
                                name="phone" disabled>
                        </div>
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                    <label class="form-check-label" for="flexRadioDefault2">
                        <div class="input-group ">
                            <a href="" class="input-group-text" id="basic-addon1">
                                <i class="fa-solid fa-plane-arrival"></i>
                            </a>
                            <input type="phone" class="form-control" placeholder="Input group example"
                                aria-label="Input group example" aria-describedby="basic-addon1" value="location B"
                                name="phone" disabled>
                        </div>
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false"
                aria-controls="panelsStayOpen-collapseFour">
                Job titl(s)
            </button>
        </h2>
        <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse"
            aria-labelledby="panelsStayOpen-headingFour">
            <div class="accordion-body">
                Dummy
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-headingFive">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false"
                aria-controls="panelsStayOpen-collapseFive">
                Make appointment
            </button>
        </h2>
        <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse"
            aria-labelledby="panelsStayOpen-headingFive">
            <div class="accordion-body">
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-label="Segment one" style="width: 4%"
                        aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">1</div>
                    <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" aria-label="Segment two"
                        style="width: 4%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">2</div>
                    <div class="progress-bar" role="progressbar" aria-label="Segment one" style="width: 4%"
                        aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">3</div>
                    <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" aria-label="Segment two"
                        style="width: 4%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">4</div>
                    <div class="progress-bar" role="progressbar" aria-label="Segment one" style="width: 4%"
                        aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">5</div>
                    <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" aria-label="Segment two"
                        style="width: 4%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">6</div>
                    <div class="progress-bar" role="progressbar" aria-label="Segment one" style="width: 4%"
                        aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">7</div>
                    <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" aria-label="Segment two"
                        style="width: 4%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">8</div>
                    <div class="progress-bar" role="progressbar" aria-label="Segment one" style="width: 4%"
                        aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">9</div>
                    <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" aria-label="Segment two"
                        style="width: 4%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">10</div>
                    <div class="progress-bar" role="progressbar" aria-label="Segment one" style="width: 4%"
                        aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">11</div>
                    <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" aria-label="Segment two"
                        style="width: 4%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">12</div>
                </div>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-label="Segment one" style="width: 4%"
                        aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">3</div>
                    <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" aria-label="Segment two"
                        style="width: 4%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">4</div>
                    <div class="progress-bar" role="progressbar" aria-label="Segment one" style="width: 4%"
                        aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">5</div>
                    <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" aria-label="Segment two"
                        style="width: 4%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">6</div>
                    <div class="progress-bar" role="progressbar" aria-label="Segment one" style="width: 4%"
                        aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">7</div>
                    <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" aria-label="Segment two"
                        style="width: 4%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">8</div>
                    <div class="progress-bar" role="progressbar" aria-label="Segment one" style="width: 4%"
                        aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">9</div>
                    <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" aria-label="Segment two"
                        style="width: 4%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">10</div>
                    <div class="progress-bar" role="progressbar" aria-label="Segment one" style="width: 4%"
                        aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">11</div>
                    <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" aria-label="Segment two"
                        style="width: 4%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">12</div>
                    <div class="progress-bar" role="progressbar" aria-label="Segment one" style="width: 4%"
                        aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">1</div>
                    <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" aria-label="Segment two"
                        style="width: 4%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">2</div>
                </div>
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-headingSix">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#panelsStayOpen-collapseSix" aria-expanded="false"
                aria-controls="panelsStayOpen-collapseSix">
                Language(s)
            </button>
        </h2>
        <div id="panelsStayOpen-collapseSix" class="accordion-collapse collapse"
            aria-labelledby="panelsStayOpen-headingSix">
            <div class="accordion-body">
                Dummy
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-headingSeven">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#panelsStayOpen-collapseSeven" aria-expanded="false"
                aria-controls="panelsStayOpen-collapseSeven">
                Comments History
            </button>
        </h2>
        <div id="panelsStayOpen-collapseSeven" class="accordion-collapse collapse"
            aria-labelledby="panelsStayOpen-headingSeven">
            <div class="accordion-body">
                Dummy
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-headingEight">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#panelsStayOpen-collapseEight" aria-expanded="false"
                aria-controls="panelsStayOpen-collapseEight">
                pictures
            </button>
        </h2>
        <div id="panelsStayOpen-collapseEight" class="accordion-collapse collapse"
            aria-labelledby="panelsStayOpen-headingEight">
            <div class="accordion-body">
                Dummy
            </div>
        </div>
    </div>
</div>
<?php else : ?>

<?php endif; ?>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>