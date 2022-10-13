<?php require_once APPROOT . '/views/includes/header.php'; ?>
<div id="patrick_container">
    <nav class="navbar bg-light mt-2">
        <div class="container-fluid mt-2">
            <a class="navbar-brand" href="#">
                <img src="https://cdn.pixabay.com/photo/2017/01/31/22/06/doctor-2027615_960_720.png" alt="Logo" width="auto" height="24" class="d-inline-block align-text-top">
                Patrick Monteiro
            </a>
        </div>
    </nav>
    <div id="carouselExampleCaptions" class="carousel slide mt-2" data-bs-ride="false">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://cdn.pixabay.com/photo/2020/08/12/14/57/massage-5482842_960_720.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h3>Physiotherapy</h3>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Neque dicta voluptas ullam totam suscipit est temporibus, ab maiores error quae molestiae, et commodi quia excepturi cumque, nihil iure. Accusamus, aut.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://cdn.pixabay.com/photo/2020/08/12/14/57/massage-5482842_960_720.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>chiropractor</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam ullam totam voluptatibus error possimus ducimus corporis debitis neque porro iste dicta eveniet expedita modi aspernatur natus ipsa eaque, ut aut!</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://cdn.pixabay.com/photo/2020/08/12/14/57/massage-5482842_960_720.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Home Assistans</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque quasi, recusandae ea inventore porro repudiandae voluptas! Est perferendis id corrupti dolorum tempore aliquid enim fuga, iusto, impedit possimus omnis amet?</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="row mt-2">
        <div class="col-m-4 col-l-3">
            <img src="https://cdn.pixabay.com/photo/2017/01/31/22/06/doctor-2027615_960_720.png" alt="physiotherapy">
        </div>
        <div class="col-m-8 col-l-9">
            <div id="intro_container">
                <div id="intro_animation">

                </div>
            </div>
        </div>
    </div>


    <?php require_once APPROOT . '/views/includes/footer.php'; ?>