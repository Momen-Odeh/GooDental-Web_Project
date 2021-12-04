<?php
//session_start();
//if(!isset($_SESSION['Is_Member']))
//{
//    $_SESSION['Is_Member']=0;
//}
//if($_SESSION['Is_Member']==0)
//{
//    header('location:login.php');
//}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <link rel="stylesheet" href="../CSS/styleHOME.css">
    <link rel="stylesheet" href="../CSS/c1.css">
    <script src="../SCRIPT/script.js"></script>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../CSS/Profile.css">
</head>
<body>
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
        <li><a href="../PHP/Profile.php">Profile</a></li>
    </ul>
</nav>
<div class="spaceofnav"></div>
<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mt-1">
                <div class="card text-center sidebar">
                    <div class="card-body">
                        <img src="../img/d8.jpg" class="rounded-circle" width="150" alt="">
                        <div class="mt-3">
                            <h3>Momen Odeh</h3>
                            <a href="../PHP/Home.php">Home</a>
                            <a href="../PHP/Service.php">Services</a>
                            <a href="../PHP/Contact_Location.php">Contact Us</a>
                            <a href="../PHP/Logout.php">Sign out</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 mt-1">
                <div class="card mb-3 content">
                    <h1 class="m-3 pt-3">About</h1>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Full Name</h5>
                            </div>
                            <div class="col-md-9 text-secondary">
                                Momen Odeh
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Email</h5>
                            </div>
                            <div class="col-md-9 text-secondary">
                                Momen.odeh74@gmail.com
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Phone</h5>
                            </div>
                            <div class="col-md-9 text-secondary">
                                0597627566
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Address</h5>
                            </div>
                            <div class="col-md-9 text-secondary">
                                Palstine-Nablus
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
                <div class="card mb-3 content">
                    <h1 class="m-3">Recent Project</h1>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Project Name</h5>
                            </div>
                            <div class="col-md-9 text-secondary">
                                Project Description
                                <!--                            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Toggle right offcanvas</button>-->
                                <!---->
                                <!--                            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">-->
                                <!--                                <div class="offcanvas-header">-->
                                <!--                                    <h5 id="offcanvasRightLabel">Offcanvas right</h5>-->
                                <!--                                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>-->
                                <!--                                </div>-->
                                <!--                                <div class="offcanvas-body">-->
                                <!--                                    ...-->
                                <!--                                </div>-->
                                <!--                            </div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>