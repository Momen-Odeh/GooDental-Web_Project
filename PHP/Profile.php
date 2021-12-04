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
            $qrystr = "UPDATE `patient` SET `UserName` = '$UserName' WHERE `patient`.`UserName` = '$old';";
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
        $qrystr = "UPDATE `patient` SET `BirthDate` = '$BirthDate' WHERE `patient`.`UserName` = '$us';";
//            echo $qrystr;
        $res = $db->query($qrystr);
        $db->commit();
        $partsw = explode('-', $BirthDate);
        $ag=date("Y")-$partsw[0];
        $qrystr = "UPDATE `patient` SET `Age` = '$ag' WHERE `patient`.`UserName` = '$us';";
        $res = $db->query($qrystr);
        $db->commit();
        $db->close();
        $Age=$ag ;
        $_SESSION['Age']=$ag;
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
        $qrystr = "UPDATE `patient` SET `Gender` = '$Gender' WHERE `patient`.`UserName` = '$us';";
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
        $qrystr = "UPDATE `patient` SET `MobilePhone` = '$MobilePhone' WHERE `patient`.`UserName` = '$us';";
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
        $qrystr = "UPDATE `patient` SET `Password` = sha1('$Password') WHERE `patient`.`UserName` = '$us';";
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
elseif(isset($_POST['text6']))
{
    try {
        $us=$_SESSION['UserName'];
        $_SESSION['BloodGroup']=$_POST['text6'];
        $BloodGroup=$_SESSION['BloodGroup'];
        $db = new mysqli('localhost', 'root', '', 'goodental');
        $qrystr = "UPDATE `patient` SET `BloodGroup` ='$BloodGroup' WHERE `patient`.`UserName` = '$us';";
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
elseif(isset($_POST['text8']))
{
    try {
        $us=$_SESSION['UserName'];
        $_SESSION['address']=$_POST['text8'];
        $address=$_SESSION['address'];
        $db = new mysqli('localhost', 'root', '', 'goodental');
        $qrystr = "UPDATE `patient` SET `address` ='$address' WHERE `patient`.`UserName` = '$us';";
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
///////////////////add new appointment
if(isset($_POST['DrNamelist']) && isset($_POST['appointdate']) && isset($_POST['DescriptTxt']))
{

}
///
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
                        <a href="../PHP/Home.php">Home</a>
                        <a href="#add_app" onclick="clic9()">Appointment Booking</a>
<!--                        <a href="../PHP/Contact_Location.php">Contact Us</a>-->
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
                            if( $_SESSION['tmp']==1)
                            {
                                echo "->user already exist";
                            }
                            ?>
<!--                            -->
                            <button  onclick="clic1()" class="btn btt1" type="button"><i class="fas fa-edit icc"></i></button>
                            <form class="fo" id="form1" action="Profile.php" method="post">
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
                            <form class="fo" id="form2" action="Profile.php" method="post">
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
                            <form class="fo" id="form3" action="Profile.php" method="post">
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
                            <form class="fo" id="form4" action="Profile.php" method="post">
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
                            <form class="fo" id="form5" action="Profile.php" method="post">
                                <input type="password" name="text5" class="txt1" placeholder="Enter new Password">
                                <input type="submit" class="subb" value="Update">
                            </form>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <h5>Blood group</h5>
                        </div>
                        <div class="col-md-9 text-secondary">
                            <script type="text/javascript">
                                let x6=1;
                                function clic6()
                                {
                                    if(x6==1) {
                                        document.getElementById("form6").style.visibility = 'visible';
                                        x6=0;
                                    }
                                    else if (x6==0){
                                        document.getElementById("form6").style.visibility = 'hidden';
                                        x6=1;
                                    }
                                }
                            </script>

                            <?php
                            echo "$BloodGroup";
                            ?>
                            <button  onclick="clic6()" class="btn btt1" type="button"><i class="fas fa-edit icc"></i></button>
                            <form class="fo" id="form6" action="Profile.php" method="post">
                                <input type="text" name="text6" class="txt1" placeholder="Enter new Blood Group">
                                <input type="submit" class="subb" value="Update">
                            </form>
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
                            <script type="text/javascript">
                                let x8=1;
                                function clic8()
                                {
                                    if(x8==1) {
                                        document.getElementById("form8").style.visibility = 'visible';
                                        x8=0;
                                    }
                                    else if (x8==0){
                                        document.getElementById("form8").style.visibility = 'hidden';
                                        x8=1;
                                    }
                                }
                            </script>

                            <?php
                            echo "$address";
                            ?>
                            <button  onclick="clic8()" class="btn btt1" type="button"><i class="fas fa-edit icc"></i></button>
                            <form class="fo" id="form8" action="Profile.php" method="post">
                                <input type="text" name="text8" class="txt1" placeholder="Enter new Address">
                                <input type="submit" class="subb" value="Update">
                            </form>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
            <div class="card mb-3 content">
                <h1 class="m-3">Booked appointments</h1>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="content-table" width="100%">
                                <thead>
                                    <th width="15%">Doctor Name</th>
                                    <th width="15%">Patient Name</th>
                                    <th width="20%">Date</th>
                                    <th width="15%">Perioud Time</th>
                                    <th width="15%">State</th>
                                    <th width="20%">Description</th>
                                </thead>
                                <tbody>
                                <?php
                                $db=new mysqli('localhost','root','','goodental');
                                $qrystr="SELECT * FROM `recoversession` WHERE `PatientName`='$UserName';";
                                $res=$db->query($qrystr);
                                for($i=0;$i<$res->num_rows;$i++)
                                {
                                    $row=$res->fetch_row();
                                        echo "<tr>";
                                        echo "<td>$row[0]</td>";
                                        echo "<td>$row[1]</td>";
                                        echo "<td>$row[2]</td>";
                                        echo "<td>$row[3]</td>";
                                        echo "<td>$row[4]</td>";
                                        echo "</tr>";
                                }
                                $db->close();
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <script type="text/javascript">
                            function clic9()
                            {
                                document.getElementById("add_app").style.display = 'block';
                            }
                            function clic10()
                            {
                                document.getElementById("add_app").style.display = 'none';
                            }
                        </script>
                        <div class="col-md-12 addt" id="add_app">
                            <h5>Add new appointment <button  onclick="clic10()" class="btn btt1" type="button"><i class="far fa-window-close"></i></button></h5>
                            <table class="content-table" width="100%" >
                                <thead>
                                <th width="25%">Doctor Name</th>
                                <th width="25%">Date</th>
                                <th width="25%">Description</th>
                                <th width="25%">Confirm</th>
                                </thead>
                                <tbody>
                                <tr>
                                    <form action="Profile.php" method="post">
                                        <td><select name="" id="" size="1" name="DrNamelist" class="DrNamelist" required>
                                                <option value="Ahmad">Ahmad</option>
                                                <option value="ali">ali</option>
                                                <option value="hadi">hadi</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="datetime-local" class="appointdate" name="appointdate" required>
                                        </td>
                                        <td>
                                            <input type="text"name="DescriptTxt" class="DescriptTxt" required>
                                        </td>
                                        <td><input type="submit" class="Add_appointment" value="Add appointment"></td>
                                    </form>
                                </tr>
<!--                                --><?php
//                                $db=new mysqli('localhost','root','','goodental');
//                                $qrystr="SELECT * FROM `recoversession` WHERE `PatientName`='$UserName';";
//                                $res=$db->query($qrystr);
//                                for($i=0;$i<$res->num_rows;$i++)
//                                {
//                                    $row=$res->fetch_row();
//                                    echo "<tr>";
//                                    echo "<td>$row[0]</td>";
//                                    echo "<td>$row[1]</td>";
//                                    echo "<td>$row[2]</td>";
//                                    echo "<td>$row[3]</td>";
//                                    echo "<td>$row[4]</td>";
//                                    echo "</tr>";
//                                }
//                                $db->close();
//                                ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12"
<!--                             if text for addition operator-->
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