 <!--  Make appointment -->
 <div class="accordion-item">
     <h2 class="accordion-header" id="person_pannel_open-headingFive">
         <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#person_pannel_open-collapseFive" aria-expanded="false" aria-controls="person_pannel_open-collapseFive">
             <?php if (isset(($data['person']['tz_count'])) && ($data['person']['tz_count'] > 0)) : ?>
                 Make appointment
             <?php else : ?>
                 No data to present the time differences
             <?php endif; ?>
         </button>
     </h2>
     <div id="person_pannel_open-collapseFive" class="accordion-collapse collapse" aria-labelledby="person_pannel_open-headingFive">
         <div class="accordion-body">
             <?php if (isset(($data['person']['timezones'])) && ($data['person']['tz_count'] > 0)) : ?>
                 <?php foreach ($data['person']['timezones'] as $tz) : ?>
                     <?php if ($tz->status == 'status') : ?>
                         <?php $time = [
                                -12 => 12,
                                -11 => 13,
                                -10 => 14,
                                -9 => 15,
                                -8 => 16,
                                -7 => 17,
                                -6 => 18,
                                -5 => 19,
                                -4 => 20,
                                -3 => 21,
                                -2 => 22,
                                -1 => 23,
                                0 => 00,
                                1 => 1,
                                2 => 2,
                                3 => 3,
                                4 => 4,
                                5 => 5,
                                6 => 6,
                                7 => 7,
                                8 => 8,
                                9 => 9,
                                10 => 10,
                                11 => 11,
                                12 => 12,
                                13 => 13,
                                14 => 14,
                                15 => 15,
                                16 => 16,
                                17 => 17,
                                18 => 18,
                                19 => 19,
                                20 => 20,
                                21 => 21,
                                22 => 22,
                                23 => 23,
                                24 => 00,
                                1 => 1,
                                2 => 2,
                                3 => 3,
                                4 => 4,
                                5 => 5,
                                6 => 6,
                                7 => 7,
                                8 => 8,
                                9 => 9,
                                10 => 10,
                                11 => 11,
                                12 => 12,
                            ]; ?>
                         <?= $_SESSION['timezone'] ?> GMT: <?= $_SESSION['s_dts'] ?? ' '  ?> <a href="<?= URLROOT . '/timezones/edit_timezone/' . $_SESSION['timezone_id'] ?>" class="btn btn-light m-3">change the date</a>
                         <div class="progress">
                             <?php for ($i = 0; $i < 24; $i++) : ?>
                                 <div class="progress-bar progress-bar-animated <?php if ($i % 2 == 0) {
                                                                                    echo "progress-bar-striped bg-danger";
                                                                                } ?> " role="progressbar" aria-label="Segment one" style="width: 4.166666667%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">
                                     <?php if (($_SESSION['gmt_offset'] + $i) > 24) {
                                            echo $_SESSION['gmt_offset'] + $i - 24;
                                        } elseif (($_SESSION['gmt_offset'] + $i) <= 0) {
                                            echo $_SESSION['gmt_offset'] + $i + 24;
                                        } else {
                                            echo $_SESSION['gmt_offset'] + $i;
                                        } ?>
                                 </div>
                             <?php endfor; ?>
                         </div>
                         <?= $tz->timezone ?> GMT: <?= $tz->w_dts ?? ' '  ?> <a href="<?= URLROOT . '/timezones/edit_timezone/' . $tz->id ?>" class="btn btn-light m-3">change the date</a>
                         <div class="progress">
                             <?php for ($i = 0; $i < 24; $i++) : ?>
                                 <div class="progress-bar progress-bar-animated <?php if ($i % 2 == 0) {
                                                                                    echo "progress-bar-striped bg-danger";
                                                                                } ?>" role="progressbar" aria-label="Segment one" style="width: 4.166666667%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"> <?php if (($tz->gmt_offset + $i) > 24) {
                                                                                                                                                                                                                            echo $tz->gmt_offset + $i - 24;
                                                                                                                                                                                                                        } elseif (($tz->gmt_offset + $i) <= 0) {
                                                                                                                                                                                                                            echo $tz->gmt_offset + $i + 24;
                                                                                                                                                                                                                        } else {
                                                                                                                                                                                                                            echo $tz->gmt_offset + $i;
                                                                                                                                                                                                                        } ?></div>
                             <?php endfor; ?>
                         </div>
                         <?= $_SESSION['timezone'] ?> DST: <?= $_SESSION['w_dts'] ?? ' '  ?> <a href="<?= URLROOT . '/timezones/edit_timezone/' . $_SESSION['timezone_id'] ?>" class="btn btn-light m-3">change the date</a>
                         <div class="progress">
                             <?php for ($i = 0; $i < 24; $i++) : ?>
                                 <div class="progress-bar progress-bar-animated <?php if ($i % 2 == 0) {
                                                                                    echo "progress-bar-striped bg-warning";
                                                                                } else {
                                                                                    echo "progress-bar-striped bg-info";
                                                                                } ?> " role="progressbar" aria-label="Segment one" style="width: 4.166666667%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">
                                     <?php if (($_SESSION['dst_offset'] + $i) > 24) {
                                            echo $_SESSION['dst_offset'] + $i - 24;
                                        } elseif (($_SESSION['dst_offset'] + $i) <= 0) {
                                            echo $_SESSION['dst_offset'] + $i + 24;
                                        } else {
                                            echo $_SESSION['dst_offset'] + $i;
                                        } ?>
                                 </div>
                             <?php endfor; ?>
                         </div>
                         <?= $tz->timezone ?> DST: <?= $tz->s_dts ?? ' '  ?> <a href="<?= URLROOT . '/timezones/edit_timezone/' . $tz->id ?>" class="btn btn-light m-3">change the date</a>
                         <div class="progress">
                             <?php for ($i = 0; $i < 24; $i++) : ?>
                                 <div class="progress-bar progress-bar-animated <?php if ($i % 2 == 0) {
                                                                                    echo "progress-bar-striped bg-warning";
                                                                                } else {
                                                                                    echo "progress-bar-striped bg-info";
                                                                                } ?>" role="progressbar" aria-label="Segment one" style="width: 4.166666667%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"> <?php if (($tz->dst_offset + $i) > 24) {
                                                                                                                                                                                                                            echo $tz->dst_offset + $i - 24;
                                                                                                                                                                                                                        } elseif (($tz->dst_offset + $i) <= 0) {
                                                                                                                                                                                                                            echo $tz->dst_offset + $i + 24;
                                                                                                                                                                                                                        } else {
                                                                                                                                                                                                                            echo $tz->dst_offset + $i;
                                                                                                                                                                                                                        } ?></div>
                             <?php endfor; ?>
                         </div>

                     <?php else : ?>
                         <!-- <div class="alert alert-warning" role="alert">
                            <h4 class="alert-heading">No active timezones were found for <?php echo $data['person']['person']->first_name . ' ' . $data['person']['person']->last_name; ?></h4>
                            <hr>
                            <p>You can check the timezones section to add a new active timezone or to activate an existing timezone.</p>

                        </div> -->
                     <?php endif; ?>
                 <?php endforeach ?>
             <?php else : ?>
                 <div class="alert alert-warning" role="alert">
                     <h4 class="alert-heading">No timezones were found for <?php echo $data['person']['person']->first_name . ' ' . $data['person']['person']->last_name; ?></h4>
                     <p>You can check the <a href="<?= URLROOT ?>/timezones" class="alert-link">timezones page</a> and use the search. </p>
                     <hr>
                     <p class="mb-0">Otherwise, you can add timezones by clicking on the add button, or by using <a href="<?= URLROOT ?>/timezones/add/<?= $data['person']['person']->id ?>" class="alert-link">this link</a>.</p>

                 </div>
                 <a class="btn btn-primary " href="<?php echo URLROOT . '/comments/add/' . $data['person']['person']->id; ?>">Add a comment</a>
             <?php endif; ?>


         </div>
     </div>
 </div>