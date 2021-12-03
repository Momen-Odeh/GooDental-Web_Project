<?php
//initialization
session_start();
if(!isset($_SESSION['Is_Member']))
{
    $_SESSION['Is_Member']=0;
}
if($_SESSION['Is_Member']==0)
{
  header('location:login.php');
}
$UserName=$_SESSION['UserName'];
$BirthDate=$_SESSION['BirthDate'];
$Gender=$_SESSION['Gender'];
$MobilePhone=$_SESSION['MobilePhone'];
$Password=$_SESSION['Password'];
$BloodGroup=$_SESSION['BloodGroup'];
$Age=$_SESSION['Age'];
$address=$_SESSION['address'];
//End initialization
//Update
if(isset($_POST['text1']))
{
    try {////////////////////////////////////////////////////////
        $old=$UserName;
        $_SESSION['UserName']=$_POST['text1'];
        $UserName=$_SESSION['UserName'];
        $db = new mysqli('localhost', 'root', '', 'goodental');
        echo "$UserName   $old ";
        $qrystr = "UPDATE `patient` SET `UserName` = '.$UserName.' WHERE `UserName` = '.$old.';";
        $res = $db->query($qrystr);
        echo "   $res";
        $db->commit();
        $db->close();
    }
    catch (Exception $ex)
    {
        echo "dddddddddddd";
    }
}
//
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
    <link rel="stylesheet" href="../CSS/ProfilePatient.css">
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
                            <h5>User Name</h5>
                        </div>
                        <div class="col-md-9 text-secondary">
                            <script type="text/javascript">
                                let x1=1;
                                function clic1()
                                {
                                    if(x1==1) {
                                        document.getElementById("form1").style.visibility = 'visible';
                                        x1=0;
                                    }
                                    else if (x1==0){
                                        document.getElementById("form1").style.visibility = 'hidden';
                                        x1=1;
                                    }
                                }
                            </script>
                            
                            <?php
                            echo "$UserName";
                            ?>
<!--                            -->
                            <button  onclick="clic1()" class="btn btt1" type="button"><i class="fas fa-edit icc"></i></button>
                            <form class="fo" id="form1" action="Profile.php" method="post">
<!--                                <span>Enter new User name</span>-->
                                <input type="text" name="text1" class="txt1" placeholder="Enter new User name">
                                <input type="submit" class="subb" value="Update">
                            </form>

<!--                            -->
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <h5>Birth Date</h5>
                        </div>
                        <div class="col-md-9 text-secondary">
                            <?php
                            echo "$BirthDate";
                            ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <h5>Gender</h5>
                        </div>
                        <div class="col-md-9 text-secondary">
                            <?php
                            echo "$Gender";
                            ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <h5>Mobile Phone</h5>
                        </div>
                        <div class="col-md-9 text-secondary">
                            <?php
                            echo "$MobilePhone";
                            ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <h5>Password</h5>
                        </div>
                        <div class="col-md-9 text-secondary">
                            <?php
                            echo "**********";
                            ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <h5>Blood group</h5>
                        </div>
                        <div class="col-md-9 text-secondary">
                            <?php
                            echo "$BloodGroup";
                            ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <h5>Age</h5>
                        </div>
                        <div class="col-md-9 text-secondary">
                            <?php
                            echo "$Age";
                            ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <h5>Address</h5>
                        </div>
                        <div class="col-md-9 text-secondary">
                            <?php
                            echo "$address";
                            ?>
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