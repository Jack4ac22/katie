 <!-- TODO: use the correct valeus and adjust the view -->
 <!-- prayers History -->
 <div class="accordion-item">
     <h2 class="accordion-header" id="person_pannel_open-headingSeven">
         <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#person_pannel_open-collapseSeven" aria-expanded="false" aria-controls="person_pannel_open-collapseSeven">
             <div class="row justify-content-between">
                 <?php if (isset(($data['person']['c_count'])) && ($data['person']['c_count'] > 0)) : ?>
                     <div class="col">Comments</div>

                     <div class='position-relative col'><span class="badge bg-secondary position-relative"> total comments</span>
                         <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                             <?= $data['person']['c_count'] ?>
                         </span>
                     </div>
                 <?php else : ?>
                     <div class="col">No Comments</div>
                 <?php endif; ?>
             </div>
         </button>
     </h2>
     <div id="person_pannel_open-collapseSeven" class="accordion-collapse collapse" aria-labelledby="person_pannel_open-headingSeven">
         <div class="accordion-body">
             <?php if (isset(($data['person']['c_count'])) && ($data['person']['c_count'] > 0)) : ?>

                 <a class="btn btn-primary" href="<?php echo URLROOT . '/comments/add/' . $data['person']['person']->id; ?>">Add another comment</a>

                 <div class="row justify-content-between">
                     <?php foreach ($data['person']['comments'] as $comment) : ?>
                         <div class="col-md-6 g-3">
                             <div class="card">
                                 <div class="card-header">
                                     <div class="row justify-content-between">
                                         <div class="col">
                                             <h2><?= $comment->title ?? 'No Title' ?></h2>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="card-body">
                                     <p class="h6">created : <?= $comment->created_at ?></p> <?php if ($comment->edited_at != null) : ?><p class="h6">last update : <?= $comment->edited_at ?> <?php endif; ?></p>


                                         <!-- <div class="progress">
                                                    <div class="progress-bar progress-bar-striped progress-bar-animated
                            <?php switch ($comment->value) {
                                case $comment->value > 80:
                                    echo 'bg-danger';
                                    break;
                                case $comment->value > 60:
                                    echo 'bg-warning';
                                    break;
                                case $comment->value > 40:
                                    echo 'bg-info';
                                    break;
                                case $comment->value > 20:
                                    echo 'bg-success';
                                    break;
                                default:
                                    echo '';
                            } ?>
                            
                            " role="progressbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $comment->value ?>%"></div>
                                                </div> -->

                                         <p class="card-text" style="white-space: pre-line"><?php if (strlen($comment->text) > 150) {
                                                                                                echo substr($comment->text, 0, 150) . ' ...';
                                                                                            } else {
                                                                                                echo $comment->text;
                                                                                            }; ?>.</p>

                                         <a href="<?= URLROOT . '/comments/show/' . $comment->id ?>" class="btn btn-primary">read</a>
                                         <a href="<?= URLROOT . '/comments/edit/' . $comment->id ?>" class="btn btn-warning">Edit</a>
                                         <button type="button" class="btn btn-danger me-md-2" data-bs-toggle="modal" data-bs-target="#delete_comment<?= $comment->id ?>Modal">Delete</button>
                                         <!-- Modal delete -->
                                         <div class="modal fade" id="delete_comment<?= $comment->id ?>Modal" tabindex="-1" aria-labelledby="delete_comment<?= $comment->id ?>ModalLabel" aria-hidden="true">
                                             <div class="modal-dialog">
                                                 <div class="modal-content">
                                                     <div class="modal-header">
                                                         <h1 class="modal-title fs-5" id="delete_comment<?= $comment->id ?>ModalLabel">Delete comment
                                                         </h1>
                                                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                     </div>
                                                     <div class="modal-body">
                                                         If you continue, The comment will NOT appear at <?= $data['person']['person']->first_name  . ' ' . $data['person']['person']->last_name ?>'s personal information page.</div>
                                                     <div class="modal-footer">
                                                         <form action="<?= URLROOT ?>/comments/delete/<?= $comment->id ?>" method="post">
                                                             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                             <button type="submit" class="btn btn-danger"><?= I_DELETE ?>
                                                                 Delete</a>
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
                 <a class="btn btn-primary mt-3" href="<?php echo URLROOT . '/comments/add/' . $data['person']['person']->id; ?>">Add another comment</a>



             <?php else : ?>
                 <div class="alert alert-warning" role="alert">
                     <h4 class="alert-heading">No comments were found for <?php echo $data['person']['person']->first_name . ' ' . $data['person']['person']->last_name; ?></h4>
                     <p>You can check the <a href="<?= URLROOT ?>/comments" class="alert-link">comments page</a> and use the search. </p>
                     <hr>
                     <p class="mb-0">Otherwise, you can add some comments by clicking on the add button, or by using <a href="<?= URLROOT ?>/comments/add/<?= $data['person']['person']->id ?>" class="alert-link">this link</a>.</p>

                 </div>
                 <a class="btn btn-primary " href="<?php echo URLROOT . '/comments/add/' . $data['person']['person']->id; ?>">Add a comment</a>
             <?php endif; ?>
         </div>
     </div>
 </div>