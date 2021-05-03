<?php
require_once "header.php";
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['password'])) { ?>
    <center class="container">

        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="images/slide1.jpg" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="text-warning">Learning It's Walking On Your Way</h5>
                        <p class="text-warning"> Keep Going </p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="images/slide2.jpg" alt="Second slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="text-warning">Study For Future</h5>
                        <p class="text-warning">Learning for your self</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="images/slide3.jpg" alt="Third slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Welcome To Manage Student</h5>
                        <p>Hello</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </center>
<?php } else { ?>
    <script>
        alert("You are not allowed to access this page. Please login first !");
        window.location.href = "login.php";
    </script>
<?php } ?>