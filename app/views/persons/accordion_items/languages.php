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