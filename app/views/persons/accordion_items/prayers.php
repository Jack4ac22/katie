 <!-- TODO: use the correct valeus and adjust the view -->
 <!-- prayers History -->
 <div class="accordion-item">
     <h2 class="accordion-header" id="person_pannel_open-heading_Prayer">
         <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#person_pannel_open-collapse_Prayer" aria-expanded="false" aria-controls="person_pannel_open-collapse_Prayer">
             <div class="row justify-content-between">
                 <?php if (isset(($data['person']['pr_count'])) && ($data['person']['pr_count'] > 0)) : ?>
                     <div class="col">prayers</div>

                     <div class='position-relative col'><span class="badge bg-secondary position-relative"> total prayers</span>
                         <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                             <?= $data['person']['pr_count'] ?>
                         </span>
                     </div>
                 <?php else : ?>
                     <div class="col">No prayers</div>
                 <?php endif; ?>
             </div>
         </button>
     </h2>
     <div id="person_pannel_open-collapse_Prayer" class="accordion-collapse collapse" aria-labelledby="person_pannel_open-heading_Prayer">
         <div class="accordion-body">
             <?php if (isset(($data['person']['pr_count'])) && ($data['person']['pr_count'] > 0)) : ?>

                 <a class="btn btn-primary" href="<?php echo URLROOT . '/prayers/add/' . $data['person']['person']->id; ?>">Add another prayer</a>

                 <div class="row justify-content-between">
                     <?php foreach ($data['person']['prayers'] as $prayer) : ?>
                        <?php if ($prayer->status == "show"): ?>
                         <div class="col-md-6 g-3">
                             <div class="card">
                                 <div class="card-header">
                                     <div class="row justify-content-between">
                                         <div class="col">
                                             <h2><?= $prayer->title ?? 'No Title' ?></h2>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="card-body">
                                     <p class="h6">created : <?= $prayer->created_at ?></p> <?php if ($prayer->edited_at != null) : ?><p class="h6">last update : <?= $prayer->edited_at ?> <?php endif; ?></p>


                                         <p class="card-text" style="white-space: pre-line"><?php if (strlen($prayer->text) > 150) {
                                                                                                echo substr($prayer->text, 0, 150) . ' ...';
                                                                                            } else {
                                                                                                echo $prayer->text;
                                                                                            }; ?>.</p>

                                         <a href="<?= URLROOT . '/prayers/show/' . $prayer->id ?>" class="btn btn-primary">read</a>
                                         <a href="<?= URLROOT . '/prayers/edit/' . $prayer->id ?>" class="btn btn-warning">Edit</a>
                                         <button type="button" class="btn btn-danger me-md-2" data-bs-toggle="modal" data-bs-target="#delete_prayer<?= $prayer->id ?>Modal">Delete</button>
                                         <!-- Modal delete -->
                                         <div class="modal fade" id="delete_prayer<?= $prayer->id ?>Modal" tabindex="-1" aria-labelledby="delete_prayer<?= $prayer->id ?>ModalLabel" aria-hidden="true">
                                             <div class="modal-dialog">
                                                 <div class="modal-content">
                                                     <div class="modal-header">
                                                         <h1 class="modal-title fs-5" id="delete_prayer<?= $prayer->id ?>ModalLabel">Delete prayer
                                                         </h1>
                                                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                     </div>
                                                     <div class="modal-body">
                                                         If you continue, The prayer will NOT appear at <?= $data['person']['person']->first_name  . ' ' . $data['person']['person']->last_name ?>'s personal information page.</div>
                                                     <div class="modal-footer">
                                                         <form action="<?= URLROOT ?>/prayers/delete/<?= $prayer->id ?>" method="post">
                                                             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                             <button type="submit" class="btn btn-danger"><?= I_DELETE ?>
                                                                 Delete</a>
                                                         </form>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                         <button type="button" class="btn btn-dark me-md-2" data-bs-toggle="modal" data-bs-target="#hid_prayer<?= $prayer->id ?>Modal">Hide</button>
                                         <!-- Modal delete -->
                                         <div class="modal fade" id="hid_prayer<?= $prayer->id ?>Modal" tabindex="-1" aria-labelledby="hid_prayer<?= $prayer->id ?>ModalLabel" aria-hidden="true">
                                             <div class="modal-dialog">
                                                 <div class="modal-content">
                                                     <div class="modal-header">
                                                         <h1 class="modal-title fs-5" id="hid_prayer<?= $prayer->id ?>ModalLabel">Hide prayer
                                                         </h1>
                                                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                     </div>
                                                     <div class="modal-body">
                                                         If you continue, The prayer will NOT appear at <?= $data['person']['person']->first_name . ' ' . $data['person']['person']->last_name ?>'s personal information page.</div>
                                                     <div class="modal-footer">
                                                         <form action="<?= URLROOT ?>/prayers/hide/<?= $prayer->id ?>" method="post">
                                                             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                             <button type="submit" class="btn btn-danger">
                                                                 Hide</a>
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
                 <a class="btn btn-primary mt-3" href="<?php echo URLROOT . '/prayers/add/' . $data['person']['person']->id; ?>">Add another prayer</a>



             <?php else : ?>
                 <div class="alert alert-warning" role="alert">
                     <h4 class="alert-heading">No prayers were found for <?php echo $data['person']['person']->first_name . ' ' . $data['person']['person']->last_name; ?></h4>
                     <p>You can check the <a href="<?= URLROOT ?>/prayers" class="alert-link">prayers page</a> and use the search. </p>
                     <hr>
                     <p class="mb-0">Otherwise, you can add some prayers by clicking on the add button, or by using <a href="<?= URLROOT ?>/prayers/add/<?= $data['person']['person']->id ?>" class="alert-link">this link</a>.</p>

                 </div>
                 <a class="btn btn-primary " href="<?php echo URLROOT . '/prayers/add/' . $data['person']['person']->id; ?>">Add a prayer</a>
             <?php endif; ?>
         </div>
     </div>
 </div>