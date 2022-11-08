<!-- timezones -->
<div class="accordion-item">
    <h2 class="accordion-header" id="person_pannel_open-headingThree">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#person_pannel_open-collapseThree" aria-expanded="false" aria-controls="person_pannel_open-collapseThree">
            <div class="row justify-content-between">
                <?php if (isset(($data['person']['tz_count'])) && ($data['person']['tz_count'] > 0)) : ?>
                    <div class="col">Timezones</div>
                    <div class='position-relative col'><span class="badge bg-secondary position-relative"> total timezones</span>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            <?= $data['person']['tz_count'] ?>
                        </span>
                    </div>
                <?php else : ?>
                    <div class="col">No timezones</div>
                <?php endif; ?>
            </div>
        </button>
    </h2>
    <div id="person_pannel_open-collapseThree" class="accordion-collapse collapse" aria-labelledby="person_pannel_open-headingThree">
        <div class="accordion-body">
            <?php if ((isset($data['person']['timezones'])) && (count($data['person']['timezones']) > 0)) : ?>
                <a class="btn btn-primary mb-3" href="<?php echo URLROOT . '/timezones/add/' . $data['person']['person']->id; ?>">Add another timezone</a>
                <div class="row justify-content-between">
                    <?php foreach ($data['person']['timezones'] as $timezone) : ?>
                        <div class="col-sm-6 col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $timezone->en_short_name . ' ' . $timezone->timezone ?>
                                        <?php if ($timezone->status == 'status') : ?>
                                            <span class="badge bg-primary"><?= I_PIN ?> Active residency</span>
                                        <?php else : ?>
                                            <span class="badge bg-warning"><?= I_TOOLS ?> Not active</span>
                                        <?php endif; ?>
                                    </h5>
                                    <p class="card-text">GMT OFFSET: <b><?= $timezone->gmt_offset ?></b>
                                        <?php if ($timezone->s_dts != null) :  ?> - Date:
                                            <?php
                                            $source = $timezone->s_dts;
                                            $date = new DateTime($source);
                                            echo $date->format('d/M'); ?><?php endif; ?></p>
                                    <p class="card-text">DST OFFSET: <b><?= $timezone->dst_offset ?></b>
                                        <?php if ($timezone->s_dts != null) :  ?>
                                            - Date: <?php
                                                    $source = $$timezone->w_dts;
                                                    $date = new DateTime($source);
                                                    echo $date->format('d/M'); ?><?php else :  ?><?php endif;  ?></p>
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                                        <a class="btn btn-warning" href="<?= URLROOT . '/timezones/edit/' . $timezone->id ?>">Edit <?= I_EDIT ?></a>
                                        <a class="btn btn-light" href="<?= URLROOT . '/timezones/show_t/' . $timezone->t_id ?>">Check <?= I_TIME ?></a>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_persona_timezone<?= $timezone->id . $timezone->t_id ?>">Delete <?= I_DELETE ?></button>
                                    </div>
                                    <div class="modal fade" id="delete_persona_timezone<?= $timezone->id . $timezone->t_id ?>" tabindex="-1" aria-labelledby="delete_persona_timezone<?= $timezone->id . $timezone->t_id ?>Label" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="delete_persona_timezone<?= $timezone->id . $timezone->t_id ?>Label">Delete Timezone (<?= $timezone->timezone . ') retaltion to ' . $data['person']['person']->first_name . ' ' . $data['person']['person']->last_name ?>.</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    If you continue <?php echo $timezone->timezone; ?> will NOT appear at <?= $data['person']['person']->first_name . ' ' . $data['person']['person']->last_name ?>'s personal page.
                                                </div>
                                                <div class="modal-footer">
                                                    <form method="post" action="<?php echo URLROOT; ?>/timezones/delete_peptim/<?= $timezone->id ?>">
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

                </div>
                <a class="btn btn-primary mb-3" href="<?php echo URLROOT . '/timezones/add/' . $data['person']['person']->id; ?>">Add another timezone</a>
            <?php else : ?>
                <a class="btn btn-primary mb-3" href="<?php echo URLROOT . '/timezones/add/' . $data['person']['person']->id; ?>">Add timezone</a>

                <div class="alert alert-warning" role="alert">
                    <h4 class="alert-heading">No timezones were found for <?php echo $data['person']['person']->first_name . ' ' . $data['person']['person']->last_name; ?></h4>
                    <p>You can check the <a href="<?= URLROOT ?>/timezones" class="alert-link">timezones page</a> and use the search. </p>
                    <hr>
                    <p class="mb-0">Otherwise, you can add some timezones by clicking on the add button, or by using <a href="<?= URLROOT ?>/timezones/add/<?= $data['person']['person']->id ?>" class="alert-link">this link</a>.</p>

                </div>
            <?php endif; ?>

        </div>
    </div>
</div>