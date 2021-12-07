<?php
session_start();
if(!isset($_SESSION['Is_Member']))
{
    $_SESSION['Is_Member']=0;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Services</title>
<!--    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="../CSS/styleHOME.css">
    <link rel="stylesheet" href="../CSS/c1.css">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../CSS/Service.css">
</head>
<body>
<!---->
<nav>
    <!--  for munebar  -->
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
    </label>
    <!--    -->
    <span class="finallogo">
    <img class="logopic" src="../img/LOGO1.png">

    <label class="logo">GOODental</label></span>
    <ul>
        <li><a href="../PHP/Home.php">Home</a></li>
        <li><a href="../PHP/Service.php">Services</a></li>
        <li><a href="../PHP/Contact_Location.php">Contact Us</a></li>
        <?php
        if($_SESSION['Is_Member']==1)
        {
            if($_SESSION['Member_level']==1)
            {
                echo "<li><a href="."../PHP/Profile.php".">Profile</a></li>";
            }
            elseif ($_SESSION['Member_level']==2)
            {
                echo "<li><a href="."../PHP/ProfileDr.php".">Profile</a></li>";
            }
            elseif ($_SESSION['Member_level'])
            {
                echo "<li><a href="."../PHP/ProfileAdmain.php".">Profile</a></li>";
            }
        }
        else{
            echo "<li><a href="."../PHP/Login.php".">Sign in</a></li>";
        }
        ?>
    </ul>
</nav>
<!---->
<div class="service">
    <h1>Our Services</h1>
    <div class="content">
        <div class="card">
            <div class="box">
                <i class="fas fa-heartbeat"></i>
                <h3>Children's Dentistry</h3>
                <p>Here at GOODental Clinic, we make
                    Pediatric Dental Healthcare our top priority!</p>
            </div>
        </div>
        <div class="card">
            <div class="box">
                <i class="fas fa-tooth"></i>
                <h3>Veneers</h3>
                <p>If you ever wondered how can you achieve a
                    perfect look of your teeth and a perfect smile</p>
            </div>
        </div>
        <!--        -->
        <div class="card">
            <div class="box">
                <i class="fas fa-user-md"></i>
                <h3>Periodontics</h3>
                <p>Periodontal disease affects the gums and
                    tissues in the mouth that hold the teeth in place.</p>
            </div>
        </div>
        <!--        -->
        <div class="card">
            <div class="box">
                <i class="fas fa-stethoscope"></i>
                <h3>Oral Surgery</h3>
                <p>The first thing you think about when you have
                    tooth pain is where to find a reliable dentist.</p>
            </div>
        </div>
        <br>
    </div>
</div>
<div class="service">
    <div class="content">
        <div class="card">
            <div class="box">
                <i class="fas fa-notes-medical"></i>
                <h3>Teeth whitening</h3>
                <p> Involves bleaching your teeth to make them lighter.
                    It can't make your teeth white by several shades.</p>
            </div>
        </div>
        <div class="card">
            <div class="box">
                <i class="fas fa-hand-holding-medical"></i>
                <h3>dental implants</h3>
                <p>surgical component that interfaces
                    with the bone of the jaw or skull to support</p>
            </div>
        </div>
        <!--        -->
        <div class="card">
            <div class="box">
                <i class="fas fa-crutch"></i>
                <h3>gum treatment</h3>
                <p>After a thorough periodontal evaluation,recommendations
                    for treatment range to surgical procedures .</p>
            </div>
        </div>
        <!--        -->
        <div class="card">
            <div class="box">
                <i class="fas fa-vial"></i>
                <h3>teeth brace</h3>
                <p>Are devices used in orthodontics that align
                    aiming to improve dental health. Braces also fix gaps</p>
            </div>
        </div>
        <br>
    </div>
</div>

<div id="carouselExampleCaptions" class="carousel slide sss" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="../img/fd.jpg" class="d-block w-100" alt="..."style="height: 100vh">
            <div class="carousel-caption d-none d-md-block">
                <h5 style="color: black">Sally imad</h5>
                <p style="color: black">"The best dental care our family has experienced in
                    Palestine. The staff was professional and friendly, we received
                    excellent service and were very happy with the results of the treatment."</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="../img/i.jpg" class="d-block w-100" alt="..."style="height: 100vh">
            <div class="carousel-caption d-none d-md-block">
                <h5 style="color: black">Haya Samer</h5>
                <p style="color: black">"The best dentist one can possibly get. Also a great person."</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="../img/iii.jpg" class="d-block w-100" alt="..." style="height: 100vh">
            <div class="carousel-caption d-none d-md-block">
                <h5 style="color: black">Ali Abd-Alhadi</h5>
                <p style="color: black">"Highly recommended. Great dentist who over the years has helped
                    save my teeth and improve their health and stability."</p>
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
</body>
</html>