<?php //echo '<pre>' . var_export($data, true) . '</pre>';
?>
<?php require APPROOT . '/views/includes/header.php'; ?>
<?php flash('msg'); ?>


<div class="container text-center">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="btn-group btn-group-lg" role="group" aria-label="Large button group">
                <a class="btn btn-outline-primary" href="<?= URLROOT . '/persons/show/' . $data->p_id ?>"><?= $data->first_name ?>'s profil</a>
                <a class="btn btn-outline-primary" href="<?= URLROOT . '/groups/show/' . $data->group_id ?>"><?= $data->title ?> group</a>
                <a class="btn btn-outline-primary" href="<?= URLROOT . '/groups'?>">All groups</a>
            </div>
        </div>
    </div>
</div>



<?php if (islogged()) : ?>
    <?php if (isset($data->id)) : ?>

        <div class="card mt-3">
            <h5 class="card-header"><b><?= $data->first_name . ' ' . $data->last_name . '</b> is a <b>' . $data->title ?></b></h5>
            <div class="card-body">
                <h5 class="card-title"><?= $data->first_name . ' ' . $data->last_name ?> is a <?= $data->sex ?> born in <?php echo date('Y', strtotime('$data->birthday')); ?>.</h5>
                <p class="card-text">
                    <?php if (count($data->groups) > 1) :  ?>
                        belongs to <?= count($data->groups) ?> groups:
                    <?php elseif (count($data->groups) == 1) :  ?>
                        belongs to <?= count($data->groups) ?> group:
                    <?php else : ?>
                        does not belong to any other group.
                    <?php endif; ?>
                </p>
            </div>
            <div class="card-body">
                <div class="btn-group mb-3" role="group" aria-label="Basic example">
                    <a class="btn btn-warning" href="<?= URLROOT ?>/pepgroups/edit/<?= $data->id ?>"><?= I_EDIT ?> Edit</a>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <?= I_DELETE ?> Delete
                    </button>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel"><?= I_EXCLAIM ?> Deleting personal information</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>You will not be able to restor the folowing information:</p>
                                <p><strong><?= $data->first_name . ' ' . $data->last_name . ' belongs to ' . $data->title ?> group</strong>.</p>
                            </div>
                            <div class="modal-footer">
                                <form action="<?php echo URLROOT; ?>/pepgroups/delete_pepgroup/<?php echo $data->id ?>" method="post">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <form action="<?php echo URLROOT; ?>/peptits/delete_peptit/<?php echo $data->id ?>" method="post">
                                        <button type="submit" class="btn btn-danger"><?= I_EXCLAIM ?> Delete</button>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
                <div class="row row-cols-1 row-cols-md-2 g-4">
                    <?php foreach ($data->groups as $group) : ?>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $group->g_title ?></h5>
                                    <p class="card-text" style="white-space: pre-line"><b>group's description: </b>
                                        <?= $group->t_description ?>
                                    </p>
                                    <p class="card-text" style="white-space: pre-line">
                                        <b><?= $data->first_name ?> comment: </b><?php if (strlen($group->comment) > 0) {
                                                                                        echo $group->comment;
                                                                                    } else {
                                                                                        echo ' no description found';
                                                                                    } ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <a href="<?= URLROOT ?>/pepgroups/add/<?= $data->p_id ?>" class="btn btn-primary mt-3"><?= I_ADD_SIGN ?> add position</a>

            </div>
        </div>
    <?php else : ?>

    <?php endif; ?>
<?php endif; ?>


<?php require APPROOT . '/views/includes/footer.php'; ?>