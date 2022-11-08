<?php require_once APPROOT . '/views/includes/header.php'; ?>
<?php //echo '<pre>' . var_export($data['person']['tasks'], true) . '</pre>';
//echo '<pre>' . var_export($_SESSION, true) . '</pre>';
// TODO: add the accordion items for bith prayers and tasks
?>
<?php flash('msg'); ?>
<a href="<?php echo URLROOT; ?>/persons/index" class="btn btn-light btn-block">Back to all people <?= I_ARROW_L ?></a>
<?php if (isset($data['person'])) : ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-8 m-3 align-self-center">
                <figure class="figure">
                    <?php if ($data['person']['person']->img != null) : ?>
                        <img src="<?= IMGROOT . '/' . $data['person']['person']->img ?>" class="figure-img img-fluid rounded" alt="<?= $data['person']['person']->first_name . ' ' . $data['person']['person']->last_name . ' image' ?>">
                    <?php else : ?>
                        <?php if ($data['person']['person']->sex != 'male') : ?>
                            <img src="<?= IMGROOT . '/' . 'female.png' ?>" class="figure-img img-fluid rounded" alt="female">
                        <?php else : ?>
                            <img src="<?= IMGROOT . '/' . 'male.png' ?>" class="figure-img img-fluid rounded" alt="male">
                        <?php endif; ?>
                    <?php endif; ?>
                    <figcaption class="figure-caption">
                        <h2 class="mt-0"><?php echo $data['person']['person']->first_name . ' ' . $data['person']['person']->last_name; ?>
                        </h2><a href="<?php echo URLROOT . '/images/upload/' . $data['person']['person']->id; ?>" type="button" class="btn btn-primary"><?= I_PIC ?> Update the profile picture</a>
                    </figcaption>
                </figure>
            </div>
        </div>
    </div>
    <div class="accordion" id="accordionperson_pannel_openExample">
        <?php require_once APPROOT . '/views/persons/accordion_items/personal.php'; ?>
        <?php require_once APPROOT . '/views/persons/accordion_items/relations.php'; ?>
        <?php require_once APPROOT . '/views/persons/accordion_items/phones.php'; ?>
        <?php require_once APPROOT . '/views/persons/accordion_items/passports.php'; ?>
        <?php require_once APPROOT . '/views/persons/accordion_items/groups.php'; ?>
        <?php require_once APPROOT . '/views/persons/accordion_items/job_titles.php'; ?>
        <?php require_once APPROOT . '/views/persons/accordion_items/time_zones.php'; ?>
        <?php require_once APPROOT . '/views/persons/accordion_items/appointment.php'; ?>
        <?php require_once APPROOT . '/views/persons/accordion_items/languages.php'; ?>
        <?php require_once APPROOT . '/views/persons/accordion_items/picture.php'; ?>
        <?php require_once APPROOT . '/views/persons/accordion_items/comments.php'; ?>
        <?php require_once APPROOT . '/views/persons/accordion_items/prayers.php'; ?>
        <?php require_once APPROOT . '/views/persons/accordion_items/tasks.php'; ?>
    </div>
<?php else : ?>
<?php endif; ?>
<?php require_once APPROOT . '/views/includes/footer.php'; ?>