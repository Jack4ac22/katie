<?php echo '<pre>' . var_export($data, true) . '</pre>';
?>
<?php require APPROOT . '/views/includes/header.php'; ?>
<?php flash('msg'); ?>

<a href="<?php echo URLROOT; ?>/peptits" class="btn btn-light"><?= I_ARROW_L ?> Back to all titles/people page</a>

<?php if (islogged()) : ?>
    <?php if (isset($data->id)) : ?>

        <div class="card mt-3">
            <h5 class="card-header"><b><?= $data->first_name . ' ' . $data->last_name . '</b> is from <b>' . $data->en_short_name ?></b></h5>
            <div class="card-body">
                <h5 class="card-title"><?= $data->first_name . ' ' . $data->last_name ?> is a <?= $data->sex ?> born in <?php echo date('Y', strtotime('$data->birthday')); ?>.</h5>
                <p class="card-text">
                    <?php if (count($data->nationalities) > 1) :  ?>
                        holds <?= count($data->nationalities) ?> nationalities:
                    <?php elseif (count($data->nationalities) == 1) :  ?>
                        holds <?= count($data->nationalities) ?> nationality:
                    <?php else : ?>
                        does not hold any nationality.
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
                                <p><strong><?= $data->first_name . ' ' . $data->last_name . ' is from ' . $data->en_short_name ?></strong>.</p>
                            </div>
                            <div class="modal-footer">
                                <form action="<?php echo URLROOT; ?>/pepcous/delete_pepcou/<?php echo $data->id ?>" method="post">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger"><?= I_EXCLAIM ?> Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
                <div class="row row-cols-1 row-cols-md-2 g-4">
                    <?php foreach ($data->nationalities as $nationality) : ?>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $nationality->nationality . ' - ' . $nationality->en_short_name ?></h5>
                                    <p class="card-text" style="white-space: pre-line">
                                        <?= $nationality->alpha_3_code . ' - ' . $nationality->alpha_2_code ?>
                                    </p>
                                    <p class="card-text" style="white-space: pre-line"><b>Comment: </b>
                                    </p>
                                    <P>
                                        <?= $nationality->comment ?>
                                    </P>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <a href="<?= URLROOT ?>/pepcous/add/<?= $data->p_id ?>" class="btn btn-primary mt-3"><?= I_ADD_SIGN ?> add nationality</a>

            </div>
        </div>
    <?php else : ?>

    <?php endif; ?>
<?php endif; ?>


<?php require APPROOT . '/views/includes/footer.php'; ?>