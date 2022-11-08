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
                        <?php if ((isset($data['person']['phones'])) && (count($data['person']['phones']) > 0)) : ?>
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
                            <a class="btn btn-primary mb-3" href="<?php echo URLROOT . '/phones/add/' . $data['person']['person']->id; ?>">Add phone number</a>

                            <div class="alert alert-warning" role="alert">
                                <h6>No phone numbers were found for <?= $data['person']['person']->first_name . ' ' . $data['person']['person']->last_name ?> in the database.</h6>
                            </div>
                        <?php endif; ?>
                        <div class="container">

                        </div>
                    </div>
                </div>
            </div>
        </div>