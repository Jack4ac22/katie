 <!-- TODO: use the correct valeus and adjust the view -->


 <!-- tasks History -->
 <div class="accordion-item">
     <h2 class="accordion-header" id="person_pannel_open-heading_tasks">
         <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#person_pannel_open-collapse_tasks" aria-expanded="false" aria-controls="person_pannel_open-collapse_tasks">
             <div class="row justify-content-between">
                 <?php if (isset(($data['person']['tas_count'])) && ($data['person']['tas_count'] > 0)) : ?>
                     <div class="col">tasks</div>

                     <div class='position-relative col'><span class="badge bg-secondary position-relative"> total tasks</span>
                         <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                             <?= $data['person']['tas_count'] ?>
                         </span>
                     </div>
                 <?php else : ?>
                     <div class="col">No tasks</div>
                 <?php endif; ?>
             </div>
         </button>
     </h2>
     <div id="person_pannel_open-collapse_tasks" class="accordion-collapse collapse" aria-labelledby="person_pannel_open-heading_tasks">
         <div class="accordion-body">
             <?php if (isset(($data['person']['tas_count'])) && ($data['person']['tas_count'] > 0)) : ?>

                 <a class="btn btn-primary" href="<?php echo URLROOT . '/tasks/add/' . $data['person']['person']->id; ?>">Add another task</a>

                 <div class="row justify-content-between">
                     <?php foreach ($data['person']['tasks'] as $task) : ?>
                         <div class="col-md-6 g-3">
                             <div class="card">
                                 <div class="card-header">
                                     <div class="row justify-content-between">
                                         <div class="col">
                                             <h2><?= $task->title ?? 'No Title' ?></h2>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="card-body">
                                     <p class="h6">Dou date : <?= $task->d_date ?? null ?></p> <?php if ($task->edited_at != null) : ?><p class="h6">last update : <?= $task->edited_at ?> <?php endif; ?></p>
                                         <p class="h6">created : <?= $task->created_at ?></p> <?php if ($task->edited_at != null) : ?><p class="h6">last update : <?= $task->edited_at ?> <?php endif; ?></p>

                                             <p class="card-text" style="white-space: pre-line"><?php if (strlen($task->text) > 150) {
                                                                                                    echo substr($task->text, 0, 150) . ' ...';
                                                                                                } else {
                                                                                                    echo $task->text;
                                                                                                }; ?>.</p>

                                             <a href="<?= URLROOT . '/tasks/show/' . $task->id ?>" class="btn btn-primary">read</a>
                                             <a href="<?= URLROOT . '/tasks/edit/' . $task->id ?>" class="btn btn-warning">Edit</a>
                                             <button type="button" class="btn btn-danger me-md-2" data-bs-toggle="modal" data-bs-target="#delete_task<?= $task->id ?>Modal">Delete</button>
                                             <!-- Modal delete -->
                                             <div class="modal fade" id="delete_task<?= $task->id ?>Modal" tabindex="-1" aria-labelledby="delete_task<?= $task->id ?>ModalLabel" aria-hidden="true">
                                                 <div class="modal-dialog">
                                                     <div class="modal-content">
                                                         <div class="modal-header">
                                                             <h1 class="modal-title fs-5" id="delete_task<?= $task->id ?>ModalLabel">Delete task
                                                             </h1>
                                                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                         </div>
                                                         <div class="modal-body">
                                                             If you continue, The task will NOT appear at <?= $data['person']['person']->first_name  . ' ' . $data['person']['person']->last_name ?>'s personal information page.</div>
                                                         <div class="modal-footer">
                                                             <form action="<?= URLROOT ?>/tasks/delete/<?= $task->id ?>" method="post">
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
                 <a class="btn btn-primary mt-3" href="<?php echo URLROOT . '/tasks/add/' . $data['person']['person']->id; ?>">Add another task</a>



             <?php else : ?>
                 <div class="alert alert-warning" role="alert">
                     <h4 class="alert-heading">No tasks were found for <?php echo $data['person']['person']->first_name . ' ' . $data['person']['person']->last_name; ?></h4>
                     <p>You can check the <a href="<?= URLROOT ?>/tasks" class="alert-link">tasks page</a> and use the search. </p>
                     <hr>
                     <p class="mb-0">Otherwise, you can add some tasks by clicking on the add button, or by using <a href="<?= URLROOT ?>/tasks/add/<?= $data['person']['person']->id ?>" class="alert-link">this link</a>.</p>

                 </div>
                 <a class="btn btn-primary " href="<?php echo URLROOT . '/tasks/add/' . $data['person']['person']->id; ?>">Add a task</a>
             <?php endif; ?>
         </div>
     </div>
 </div>