<?php require APPROOT . '/views/includes/header.php'; ?>
<?php flash('msg'); ?>
<?php //echo '<pre>' . var_export($data, true) . '</pre>'; 
?>

<form class="d-flex" role="search" method="get">
    <div class="col-4">
        <div class="input-group mb-3">
            <!-- <label for="exampleDataList" class="form-label">Datalist example</label> -->
            <input type="search" class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Type to search..." value="<?php if ((isset($_GET['search'])) && (strlen($_GET['search']) > 0)) {
                                                                                                                                                echo $_GET['search'];
                                                                                                                                            } ?>" name="search">
            <datalist id="datalistOptions">
                <?php foreach ($data['timezones']['timezones'] as $country) : ?>
                    <option value="<?= $country->en_short_name ?>">
                    <?php endforeach; ?>
            </datalist>


            <button class="btn btn-outline-primary me-2" type="submit"><?= I_SEARCH ?> search</button>
        </div>
    </div>
</form>

<div class="input-country mb-3 ">
    <a type="button" class="btn btn-primary" href="<?php echo URLROOT; ?>/pepcous/add">
        <?= I_ADD_SIGN ?> nationality to a person
    </a>
</div>
<div class="row">
    <div class="accordion" id="accordionPanelsStayOpenExample">
        <?php foreach ($data['timezones']['timezones'] as $country) : ?>
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-heading-<?= $country->country_code ?>">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse-<?= $country->country_code ?>" aria-expanded="true" aria-controls="panelsStayOpen-collapse-<?= $country->country_code ?>">
                        <h3 style="white-space: pre-line"><?= $country->country_code ?> - <?= $country->alpha_3_code ?> - <?= $country->en_short_name ?> - <?= $country->timezone ?></h3>
                    </button>
                </h2>
                <div id="panelsStayOpen-collapse-<?= $country->country_code ?>" class="accordion-collapse collapse collapsed" aria-labelledby="panelsStayOpen-heading-<?= $country->country_code ?>">
                    <div class="accordion-body">
                        <h5 class="card-title" style="white-space: pre-line">GMT offset: <?= $country->gmt_offset ?></h5>
                        <h5 class="card-title" style="white-space: pre-line">DST offset: <?= $country->dst_offset ?></h5>
                        <a href="<?= URLROOT . '/pepcous/show_c/' . $country->country_code ?>" class="btn btn-light my-3"> check this timezone</a>

                        <div class="row">
                            <?php foreach ($data['timezones']['list'] as $person) : ?>
                                <?php if ($country->id == $person->t_id) : ?>
                                    <div class="col-sm-6 col-md-4 mb-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title"><?= $person->first_name . ' ' . $person->last_name ?>
                                                    <?php if ($person->sex == 'male') : ?>
                                                        <span class="badge bg-secondary"><?= I_MAN ?></span>
                                                    <?php else : ?>
                                                        <span class="badge bg-info"><?= I_WOMAN ?></span>
                                                    <?php endif; ?>
                                                </h5>
                                                <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                                                    <a class="btn btn-warning" href="<?= URLROOT . '/pepcous/edit/' . $person->id ?>">Edit <?= I_EDIT ?></a>
                                                    <a class="btn btn-light" href="<?= URLROOT . '/persons/show/' . $person->p_id ?>">Check <?= I_PERSON ?></a>
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_personal_nationality_<?= $person->id . $person->t_id ?>">Delete <?= I_DELETE ?></button>
                                                </div>
                                                <div class="modal fade" id="delete_personal_nationality_<?= $person->id . $person->t_id ?>" tabindex="-1" aria-labelledby="delete_personal_nationality_<?= $person->id . $person->t_id ?>Label" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="delete_personal_nationality_<?= $person->id . $person->t_id ?>Label">Delete nationality (<?= $country->nationality . ') from ' . $person->first_name . ' ' . $person->last_name ?>.</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                If you continue <?php echo $country->en_short_name; ?> will NOT appear at <?= $person->first_name . ' ' . $person->last_name; ?>'s personal.
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form method="post" action="<?php echo URLROOT; ?>/pepcous/delete_pepcou/<?= $person->id ?>">
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
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                        <div class="input-country mb-3 ">
                            <a type="button" class="btn btn-primary" href="<?php echo URLROOT; ?>/pepcous/add/0/<?= $country->country_code ?>">
                                <?= I_ADD_SIGN ?> someone
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>