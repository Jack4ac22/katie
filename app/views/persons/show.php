<?php require_once APPROOT . '/views/includes/header.php'; ?>
<a href="<?php echo URLROOT; ?>/persons/index" class="btn btn-light btn-block">Back to all people <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
        <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
    </svg></a>



<?php if (($data['person'])) : ?>
    <div class="accordion" id="accordionPanelsStayOpenExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                    Personal
                </button>
            </h2>
            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                <div class="accordion-body">
                    <div class="d-flex position-relative">
                        <img src="https://cdn.pixabay.com/photo/2016/06/01/00/01/sad-1428080__340.png" class="flex-shrink-0 me-3" alt="...">
                        <div>
                            <h5 class="mt-0">Full name: <?php echo $data['person']['person']->first_name . ' ' . $data['person']['person']->last_name; ?></h5>
                            <div class="input-group m-3">
                                <a href="mailto:<?php echo $data['person']['person']->email ?>" class="input-group-text" id="basic-addon1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"></path>
                                    </svg>
                                </a>
                                <input type="email" class="form-control" placeholder="Input group example" aria-label="Input group example" aria-describedby="basic-addon1" value="<?php echo $data['person']['person']->email ?>" name="email" disabled>
                            </div>
                            <?php if (count($data['person']['phones']) > 0) : ?>
                                <h5 class="mt-0">Phone number(s)</h5>
                                <?php foreach ($data['person']['phones'] as $phone) : ?>
                                    <div class="input-group m-3">
                                        <a href="tel:<?php echo $phone->number ?>" class="input-group-text" id="basic-addon1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                                                <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                                            </svg>
                                        </a>
                                        <input type="phone" class="form-control" placeholder="Input group example" aria-label="Input group example" aria-describedby="basic-addon1" value="<?php echo $phone->number; ?>" name="phone" disabled>
                                    </div>


                                <?php endforeach; ?>
                            <?php else : ?>
                                <div class="alert alert-warning" role="alert">
                                    <h6>No phone numbers were found for this person in the database.</h6>
                                </div>

                            <?php endif; ?>
                            <div class="m-3">
                                <?php if ($data['person']['person']->sex == 'male') {
                                    echo "<span class=\"badge text-bg-primary\"><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"26\" height=\"16\" fill=\"currentColor\" class=\"bi bi-gender-male\" viewBox=\"0 0 16 16\">
                                        <path fill-rule=\"evenodd\" d=\"M9.5 2a.5.5 0 0 1 0-1h5a.5.5 0 0 1 .5.5v5a.5.5 0 0 1-1 0V2.707L9.871 6.836a5 5 0 1 1-.707-.707L13.293 2H9.5zM6 6a4 4 0 1 0 0 8 4 4 0 0 0 0-8z\"/></svg> male</span>
                                
                                ";
                                } else {
                                    echo "<span class=\"badge text-bg-primary\"><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"26\" height=\"16\" fill=\"currentColor\" class=\"bi bi-gender-female\" viewBox=\"0 0 16 16\">
                                    <path fill-rule=\"evenodd\" d=\"M8 1a4 4 0 1 0 0 8 4 4 0 0 0 0-8zM3 5a5 5 0 1 1 5.5 4.975V12h2a.5.5 0 0 1 0 1h-2v2.5a.5.5 0 0 1-1 0V13h-2a.5.5 0 0 1 0-1h2V9.975A5 5 0 0 1 3 5z\"/></svg> female</span>";
                                }; ?></a>
                            </div>
                            <!-- Modal  -->
                            <div class="m-3">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    edit
                                </button>

                                <!-- Modal Edite -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edite the personal informations</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure that you want to edite the information. </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <a href="<?php echo URLROOT . '/persons/edite/' . $data['person']['person']->id; ?>" type="button" class="btn btn-primary">Edit</a>
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
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                    Residency
                </button>
            </h2>
            <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                <div class="accordion-body">
                    Dummy
                </div>
            </div>
        </div>
        <div class="accordion-item">
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
        </div>
        <div class="accordion-item">
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
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingSix">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSix" aria-expanded="false" aria-controls="panelsStayOpen-collapseSix">
                    Language(s)
                </button>
            </h2>
            <div id="panelsStayOpen-collapseSix" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingSix">
                <div class="accordion-body">
                    Dummy
                </div>
            </div>
        </div>
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
        <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingEight">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseEight" aria-expanded="false" aria-controls="panelsStayOpen-collapseEight">
                    pictures
                </button>
            </h2>
            <div id="panelsStayOpen-collapseEight" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingEight">
                <div class="accordion-body">
                    Dummy
                </div>
            </div>
        </div>
    </div>
<?php else : ?>

<?php endif; ?>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>