<?php require APPROOT . '/views/includes/header.php'; ?>
<?php flash('msg'); ?>
<?php //echo '<pre>' . var_export($data, true) . '</pre>'; ?>
<div class="input-group mb-3 ">
    <a type="button" class="btn btn-primary" href="<?php echo URLROOT; ?>/pepgroups/add">
        <?= I_ADD_SIGN ?> peson / group
    </a>
</div>
<div class="row">
    <?php foreach ($data['groups']['groups'] as $group) : ?>
        <div class="card m-1">
            <div class="row">
                <div class="col-m-6">
                    <div class="card-body">
                        <div class="card-header">
                            <h3 style="white-space: pre-line"><?= $group->title ?>
                            </h3>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title" style="white-space: pre-line"><?= $group->description ?></h5>
                            <a href="<?php echo URLROOT; ?>/titles/show/<?php echo $group->id; ?>" class="btn btn-primary mb-3">
                                <?= I_EXCLAIM ?> more actions</a>
                            <div class="row">
                                <?php foreach ($data['groups']['list'] as $person) : ?>
                                    <?php if ($group->id == $person->group_id) : ?>

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
                                                    <p class="card-text" style="white-space: pre-line"><?= $person->comment ?></p>
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a class="btn btn-warning" href="<?= URLROOT . '/pepgroups/edit/' . $person->id ?>">Edit <?= I_EDIT ?></a>
                                                        <a class="btn btn-light" href="<?= URLROOT . '/persons/show/' . $person->p_id ?>">Check <?= I_PERSON ?></a>
                                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_personal_title_<?= $person->id . $person->group_id ?>">Delete <?= I_DELETE ?></button>
                                                    </div>
                                                    <div class="modal fade" id="delete_personal_title_<?= $person->id . $person->group_id ?>" tabindex="-1" aria-labelledby="delete_personal_title_<?= $person->id . $person->group_id ?>Label" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="delete_personal_title_<?= $person->id . $person->group_id ?>Label">Delete <?= $group->title . ' / ' . $person->first_name . ' ' . $person->last_name ?> relation</h1>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    If you continue, The group will NOT appear at <?= $person->first_name . ' ' . $person->last_name; ?>'s personal information page, NOR it will appear on <?php echo $group->title; ?> page.
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form method="post" action="<?php echo URLROOT; ?>/pepgroups/delete_pepgroup/<?= $person->id ?>">
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
                            <a class="btn btn-outline-secondary" href="<?php echo URLROOT . '/pepgroups/add/0/' . $group->id; ?>">Add <?= I_ADD_PERSON ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    < </div>



        <?php require APPROOT . '/views/includes/footer.php'; ?>