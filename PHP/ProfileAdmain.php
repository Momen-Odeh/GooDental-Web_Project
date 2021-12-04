<?php
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
//
$_SESSION['tmp']=0;
$found=0;
if(isset($_POST['text1']))
{
    try {
        //Admain
        $db=new mysqli('localhost','root','','goodental');
        $qrystr="select * from admain";
        $res=$db->query($qrystr);
        for($i=0;$i<$res->num_rows;$i++)
        {
            $row=$res->fetch_assoc();
            if( ($row['UserName'] == $_POST['text1'])) {
                $found=1;
                break;
            }

        }
        $db->close();
//        endAdmain
//        Doctor
        if($found==0) {
            $db = new mysqli('localhost', 'root', '', 'goodental');
            $qrystr = "select * from doctor";
            $res = $db->query($qrystr);
            for ($i = 0; $i < $res->num_rows; $i++) {
                $row = $res->fetch_assoc();
                if (($row['UserName'] == $_POST['text1'])) {
                    $found = 1;
                    break;
                }

            }
            $db->close();
        }
//        endDoctor
//        Patient
        if($found==0) {
            $db = new mysqli('localhost', 'root', '', 'goodental');
            $qrystr = "select * from patient";
            $res = $db->query($qrystr);
            for ($i = 0; $i < $res->num_rows; $i++) {
                $row = $res->fetch_assoc();
                if (($row['UserName'] == $_POST['text1'])) {
                    $found = 1;
                    break;
                }
            }
            $db->close();
        }
//        endPatient
        if($found==1)
        {
            $_SESSION['tmp']=1;
        }
        else{
            $old=$UserName;
            $_SESSION['UserName']=$_POST['text1'];
            $UserName=$_SESSION['UserName'];
            $db = new mysqli('localhost', 'root', '', 'goodental');
            $qrystr = "UPDATE `admain` SET `UserName` = '$UserName' WHERE `admain`.`UserName` = '$old';";
//            echo $qrystr;
            $res = $db->query($qrystr);
            $db->commit();
            $db->close();
        }
    }
    catch (Exception $ex)
    {

    }
}
elseif (isset($_POST['date2']))
{
    try {
        $us=$_SESSION['UserName'];
        $_SESSION['BirthDate']=$_POST['date2'];
        $BirthDate=$_SESSION['BirthDate'];
        $db = new mysqli('localhost', 'root', '', 'goodental');
        $qrystr = "UPDATE `admain` SET `BirthDate` = '$BirthDate' WHERE `admain`.`UserName` = '$us';";
//            echo $qrystr;
        $res = $db->query($qrystr);
        $db->commit();
        $db->close();
    }
    catch (Exception $ex)
    {

    }
}
elseif (isset($_POST['text3'])){
    try {
        $us=$_SESSION['UserName'];
        $_SESSION['Gender']=$_POST['text3'];
        $Gender=$_SESSION['Gender'];
        $db = new mysqli('localhost', 'root', '', 'goodental');
        $qrystr = "UPDATE `admain` SET `Gender` = '$Gender' WHERE `admain`.`UserName` = '$us';";
        $res = $db->query($qrystr);
        $db->commit();
        $db->close();
    }
    catch (Exception $ex)
    {

    }
}
elseif(isset($_POST['text4']))
{
    try {
        $us=$_SESSION['UserName'];
        $_SESSION['MobilePhone']=$_POST['text4'];
        $MobilePhone=$_SESSION['MobilePhone'];
        $db = new mysqli('localhost', 'root', '', 'goodental');
        $qrystr = "UPDATE `admain` SET `MobilePhone` = '$MobilePhone' WHERE `admain`.`UserName` = '$us';";
//            echo $qrystr;
        $res = $db->query($qrystr);
        $db->commit();
        $db->commit();
        $db->close();
    }
    catch (Exception $ex)
    {

    }
}
elseif(isset($_POST['text5']))
{
    try {
        $us=$_SESSION['UserName'];
        $_SESSION['Password']=$_POST['text5'];
        $Password=$_SESSION['Password'];
        $db = new mysqli('localhost', 'root', '', 'goodental');
        $qrystr = "UPDATE `admain` SET `Password` = sha1('$Password') WHERE `admain`.`UserName` = '$us';";
//            echo $qrystr;
        $res = $db->query($qrystr);
        $db->commit();
        $db->commit();
        $db->close();
    }
    catch (Exception $ex)
    {

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
                            <h3><?php
                                echo "$UserName";
                                ?></h3>
<!--                            ///////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
                            <a href="../PHP/Service.php">Add Doctor</a>
                            <a href="../PHP/Service.php">Order Processing</a>
                            <a href="#row2" onclick="clickRow3()">Show all Patient</a>
                            <a href="#row1" onclick="clickRow1()">Show all Doctor</a>
                            <a href="#row2" onclick="clickRow5()">Contact US Messages</a>
                            <a href="../PHP/Logout.php">Sign out</a>
<!--                            ///////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
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
                                if( $_SESSION['tmp']==1)
                                {
                                    echo "->user already exist";
                                }
                                ?>
                                <!--                            -->
                                <button  onclick="clic1()" class="btn btt1" type="button"><i class="fas fa-edit icc"></i></button>
                                <form class="fo" id="form1" action="ProfileAdmain.php" method="post">
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
                                <script type="text/javascript">
                                    let x2=1;
                                    function clic2()
                                    {
                                        if(x2==1) {
                                            document.getElementById("form2").style.visibility = 'visible';
                                            x2=0;
                                        }
                                        else if (x2==0){
                                            document.getElementById("form2").style.visibility = 'hidden';
                                            x2=1;
                                        }
                                    }
                                </script>
                                <?php
                                echo "$BirthDate";
                                ?>
                                <button  onclick="clic2()" class="btn btt1" type="button"><i class="fas fa-edit icc"></i></button>
                                <form class="fo" id="form2" action="ProfileAdmain.php" method="post">
                                    <input type="date" name="date2" class="txt1"">
                                    <input type="submit" class="subb" value="Update">
                                </form>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Gender</h5>
                            </div>
                            <div class="col-md-9 text-secondary">
                                <script type="text/javascript">
                                    let x3=1;
                                    function clic3()
                                    {
                                        if(x3==1) {
                                            document.getElementById("form3").style.visibility = 'visible';
                                            x3=0;
                                        }
                                        else if (x3==0){
                                            document.getElementById("form3").style.visibility = 'hidden';
                                            x3=1;
                                        }
                                    }
                                </script>
                                <?php
                                echo "$Gender";
                                ?>
                                <button  onclick="clic3()" class="btn btt1" type="button"><i class="fas fa-edit icc"></i></button>
                                <form class="fo" id="form3" action="ProfileAdmain.php" method="post">
                                    <input required  class="sex tet1" name="text3" id="l1" type="radio" value="male" ><label class="la" for="l1">Male</label>
                                    <input class="sex text1" name="text3" id="l2" type="radio" value="female"> <label class="la" for="l2"> Female </label>
                                    <input type="submit" class="subb" value="Update">
                                </form>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Mobile Phone</h5>
                            </div>
                            <div class="col-md-9 text-secondary">
                                <script type="text/javascript">
                                    let x4=1;
                                    function clic4()
                                    {
                                        if(x4==1) {
                                            document.getElementById("form4").style.visibility = 'visible';
                                            x4=0;
                                        }
                                        else if (x4==0){
                                            document.getElementById("form4").style.visibility = 'hidden';
                                            x4=1;
                                        }
                                    }
                                </script>
                                <?php
                                echo "$MobilePhone";
                                ?>
                                <button  onclick="clic4()" class="btn btt1" type="button"><i class="fas fa-edit icc"></i></button>
                                <form class="fo" id="form4" action="ProfileAdmain.php" method="post">
                                    <input type="tel"pattern="059[0-9]{7}" name="text4" class="txt1" placeholder="Enter new Mobile phone">
                                    <input type="submit" class="subb" value="Update">
                                </form>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Password</h5>
                            </div>
                            <div class="col-md-9 text-secondary">
                                <script type="text/javascript">
                                    let x5=1;
                                    function clic5()
                                    {
                                        if(x5==1) {
                                            document.getElementById("form5").style.visibility = 'visible';
                                            x5=0;
                                        }
                                        else if (x5==0){
                                            document.getElementById("form5").style.visibility = 'hidden';
                                            x5=1;
                                        }
                                    }
                                </script>
                                <?php
                                echo "**********";
                                ?>
                                <button  onclick="clic5()" class="btn btt1" type="button"><i class="fas fa-edit icc"></i></button>
                                <form class="fo" id="form5" action="ProfileAdmain.php" method="post">
                                    <input type="password" name="text5" class="txt1" placeholder="Enter new Password">
                                    <input type="submit" class="subb" value="Update">
                                </form>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
<!--                -->
                <script type="text/javascript">
                    function clickRow1()
                    {
                        document.getElementById("row1").style.display = 'block';
                    }
                    function clickRow2()
                    {
                        document.getElementById("row1").style.display = 'none';
                    }
                    function clickRow3()
                    {
                        document.getElementById("row2").style.display = 'block';
                    }
                    function clickRow4()
                    {
                        document.getElementById("row2").style.display = 'none';
                    }
                    function clickRow5()
                    {
                        document.getElementById("row3").style.display = 'block';
                    }
                    function clickRow6()
                    {
                        document.getElementById("row3").style.display = 'none';
                    }
                </script>
<!--                -->
                <div class="card mb-3 content">
                    <h1 class="m-3">Information</h1>
                    <div class="card-body">
<!--                        -->
                        <div class="row" id="row1" style="display:none;">
                            <div class="col-md-12">
                                <h5>Show all Doctor<button  onclick="clickRow2()" class="btn btt1" type="button"><i class="far fa-window-close"></i></button></h5>
                                <table class="content-table" width="100%">
                                    <thead>
                                    <th width="15%">Doctor Name</th>
                                    <th width="15%">BirthDate</th>
                                    <th width="5%">Gender</th>
                                    <th width="15%">MobilePhone</th>
                                    <th width="10%">Specialization</th>
                                    <th width="10%">Start Time</th>
                                    <th width="10%">End Time</th>
                                    <th width="20%">Working Day</th>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $db=new mysqli('localhost','root','','goodental');
                                    $qrystr="SELECT * FROM `doctor`;";
                                    $res=$db->query($qrystr);
                                    for($i=0;$i<$res->num_rows;$i++)
                                    {
                                        $row=$res->fetch_row();
                                        echo "<tr>";
                                        echo "<td>$row[0]</td>";
                                        echo "<td>$row[1]</td>";
                                        echo "<td>$row[2]</td>";
                                        echo "<td>$row[3]</td>";
//                                        echo "<td>$row[4]</td>";
                                        echo "<td>$row[5]</td>";
                                        echo "<td>$row[6]</td>";
                                        echo "<td>$row[7]</td>";
                                        $ww="";
                                        if($row[8]==1)
                                        {
                                            $ww.="Sat ";
                                        }
                                        if($row[9]==1)
                                        {
                                            $ww.="Sun ";
                                        }
                                        if($row[10]==1)
                                        {
                                            $ww.="Mon ";
                                        }
                                        if($row[11]==1)
                                        {
                                            $ww.="Tue ";
                                        }
                                        if($row[12]==1)
                                        {
                                            $ww.="Wed ";
                                        }
                                        if($row[13]==1)
                                        {
                                            $ww.="Thu ";
                                        }
                                        echo "<td>$ww</td>";
                                        echo "</tr>";
                                    }
                                    $db->close();
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
<!--                        -->
                        <!--                        -->
                        <div class="row" id="row2" style="display: none">
                            <div class="col-md-12">
                                <h5>Show all Patient<button  onclick="clickRow4()" class="btn btt1" type="button"><i class="far fa-window-close"></i></button></h5>
                                <table class="content-table" width="100%">
                                    <thead>
                                    <th width="15%">Patient Name</th>
                                    <th width="15%">BirthDate</th>
                                    <th width="5%">Gender</th>
                                    <th width="15%">MobilePhone</th>
                                    <th width="10%">Blood Group</th>
                                    <th width="10%">Age</th>
                                    <th width="10%">Address</th>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $db=new mysqli('localhost','root','','goodental');
                                    $qrystr="SELECT * FROM `patient`;";
                                    $res=$db->query($qrystr);
                                    for($i=0;$i<$res->num_rows;$i++)
                                    {
                                        $row=$res->fetch_row();
                                        echo "<tr>";
                                        echo "<td>$row[0]</td>";
                                        echo "<td>$row[1]</td>";
                                        echo "<td>$row[2]</td>";
                                        echo "<td>$row[3]</td>";
//                                        echo "<td>$row[4]</td>";
                                        echo "<td>$row[5]</td>";
                                        echo "<td>$row[6]</td>";
                                        echo "<td>$row[7]</td>";
                                        echo "</tr>";
                                    }
                                    $db->close();
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--                        -->
                        <!--                        -->
                        <div class="row" id="row3" style="display: none">
                            <div class="col-md-12">
                                <h5>Contact Us Messages<button  onclick="clickRow6()" class="btn btt1" type="button"><i class="far fa-window-close"></i></button></h5>
                                <table class="content-table" width="100%">
                                    <thead>
                                    <th width="25%">Name</th>
                                    <th width="25%">Email</th>
                                    <th width="50%">Message</th>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $db=new mysqli('localhost','root','','goodental');
                                    $qrystr="SELECT * FROM `contactus`;";
                                    $res=$db->query($qrystr);
                                    for($i=0;$i<$res->num_rows;$i++)
                                    {
                                        $row=$res->fetch_row();
                                        echo "<tr>";
                                        echo "<td>$row[1]</td>";
                                        echo "<td>$row[2]</td>";
                                        echo "<td>$row[3]</td>";
                                        echo "</tr>";
                                    }
                                    $db->close();
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--                        -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>