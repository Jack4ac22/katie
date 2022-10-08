<?php require_once APPROOT . '/views/includes/header.php'; ?>
<?php flash('person_add'); ?>
<div class="input-group mb-3 ">
    <span class="input-group-text" id="basic-addon1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
        </svg></span>
    <input type="search" class="form-control" placeholder="are you looking for some one?" aria-label="Username" aria-describedby="basic-addon1">

    <a type="button" class="btn btn-primary" href="<?php echo URLROOT; ?>/persons/add">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"></path>
            <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"></path>
        </svg>
        new person</a>

</div>
<div class="row">
    <?php foreach ($data['persons'] as $person) : ?>
        <div class="col-sm-6 col-lg-4">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-3">

                    </div>
                    <img src="https://cdn.pixabay.com/photo/2016/10/18/19/56/cute-1751246_960_720.png" alt="woman" class="rounded mx-auto d-block">
                    <div class="col-md-9">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $person->first_name . ' ' . $person->last_name; ?></h5>
                            <p class="card-text"><?php echo $person->email; ?></p>
                            <a type="button" class="btn btn-primary" href="<?php echo URLROOT . '/persons/show/' . $person->id; ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                </svg></a>
                            <a type="button" class="btn btn-primary disabled">
                                <?php
                                if ($person->sex == 'male') {
                                    echo "<span class=\"badge text-bg-primary\"><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-gender-male\" viewBox=\"0 0 16 16\">
                                        <path fill-rule=\"evenodd\" d=\"M9.5 2a.5.5 0 0 1 0-1h5a.5.5 0 0 1 .5.5v5a.5.5 0 0 1-1 0V2.707L9.871 6.836a5 5 0 1 1-.707-.707L13.293 2H9.5zM6 6a4 4 0 1 0 0 8 4 4 0 0 0 0-8z\"/></svg></span>
                                
                                ";
                                } else {
                                    echo "<span class=\"badge text-bg-primary\"><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-gender-female\" viewBox=\"0 0 16 16\">
                                    <path fill-rule=\"evenodd\" d=\"M8 1a4 4 0 1 0 0 8 4 4 0 0 0 0-8zM3 5a5 5 0 1 1 5.5 4.975V12h2a.5.5 0 0 1 0 1h-2v2.5a.5.5 0 0 1-1 0V13h-2a.5.5 0 0 1 0-1h2V9.975A5 5 0 0 1 3 5z\"/></svg></span>";
                                }; ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>