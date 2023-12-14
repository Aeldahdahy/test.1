<?php
include('Links.php');
include('Functions.php');
include('Navbarbeforsignin.php');
?>



<div id="carouselExampleDark" class="carousel carousel-light slide">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="1000">
            <div class="outlay"></div>
            <img src="images/invest1.jpg" class="d-block w-100 h-100" alt="...">
            <div class="carousel-caption ">
                <h5>Angle Pyramid</h5>
                <p>Investment system aims to make it easier for startups to find the suitable investor to start to move forward for shares percentage in the company annually profit. </p>
                <a href="#">Get Started</a>
            </div>
        </div>
        <div class="carousel-item" data-bs-interval="2000">
            <div class="outlay"></div>
            <img src="images/invest2.jpg" class="d-block w-100 h-100" alt="...">
            <div class="carousel-caption ">
                <h5>Angle Pyramid</h5>
                <p>Investment system aims to make it easier for startups to find the suitable investor to start to move forward for shares percentage in the company annually profit.</p>
                <a href="#">Get Started</a>
            </div>
        </div>
        <div class="carousel-item" data-bs-interval="3000">
            <div class="outlay"></div>
            <img src="images/invest3.jpg" class="d-block w-100 h-100" alt="...">
            <div class="carousel-caption">
                <h5>Angle Pyramid</h5>
                <p>Investment system aims to make it easier for startups to find the suitable investor to start to move forward for shares percentage in the company annually profit.</p>
                <a href="#">Get Started</a>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<div class="space"></div>
<div class="big_box">
    <div class="bigbox row">
        <div class="smalbox col-lg-4 col-md-6 col-sm-12">
            <span><img src="images/register.png" alt=""></span>
            <h3>Register</h3>
            <p>Sign up to create a pitch and put your business in front of potential investors.</p>
        </div>
        <div class="smalbox col-lg-4 col-md-6 col-sm-12">
            <span><img src="images/connect.png" alt=""></span>
            <h3>Connect with Investors</h3>
            <p>Connect with & message interested investors. We have over 300,000 active investors globally.</p>
        </div>
        <div class="smalbox col-lg-4 col-md-6 col-sm-12">
            <span><img src="images/money.png" alt=""></span>
            <h3>Get funded</h3>
            <p>Over £200 million raised for our members to date.</p>
        </div>
    </div>
</div>
<div class="space"></div>
<?php
include('Footer.php');
include('Scripts.php');
?>