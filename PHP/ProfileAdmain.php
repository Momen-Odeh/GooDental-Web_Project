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
else{
    if($_SESSION['Member_level']==1)
    {
        header('location:Profile.php');
    }
    elseif ($_SESSION['Member_level']==2)
    {
        header('location:ProfileDr.php');
    }
}
$UserName=$_SESSION['UserName'];
$BirthDate=$_SESSION['BirthDate'];
$Gender=$_SESSION['Gender'];
$MobilePhone=$_SESSION['MobilePhone'];
$Password=$_SESSION['Password'];
//
$_SESSION['tmp']=0;
$_SESSION['Drnameexit']=0;
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
//add doctor code
//ddd
if(isset($_POST["Userdr"]) && isset($_POST["BDdr"]) && isset($_POST["genderdr"]) && isset($_POST["phonedr"]))
{
    $Userdr=$_POST['Userdr'];
    $BDdr=$_POST['BDdr'];
    $genderdr=$_POST['genderdr'];
    $phonedr=$_POST['phonedr'];
//    $passworddr=$_POST['passworddr'];
    $special=$_POST['special'];
    $startdr=$_POST['startdr'];
    $enddr=$_POST['enddr'];
    if(isset($_POST['Saturday'])){
        $Saturday=1;
    }
    else{
        $Saturday=0;
    }
    if(isset($_POST['Sunday'])){
        $Sunday=1;
    }
    else{
        $Sunday=0;
    }
    if(isset($_POST['Monday'])){
        $Monday=1;
    }
    else{
        $Monday=0;
    }
    if(isset($_POST['Tuesday'])){
        $Tuesday=1;
    }
    else{
        $Tuesday=0;
    }
    if(isset($_POST['Wednesday'])){
        $Wednesday=1;
    }
    else{
        $Wednesday=0;
    }
    if(isset($_POST['Thursday'])){
        $Thursday=1;
    }
    else{
        $Thursday=0;
    }
//    $Userdr=$_POST['Userdr'];
    try {
        //Admain
        $db=new mysqli('localhost','root','','goodental');
        $qrystr="select * from admain";
        $res=$db->query($qrystr);
        for($i=0;$i<$res->num_rows;$i++)
        {
            $row=$res->fetch_assoc();
            if( ($row['UserName'] == $_POST['Userdr'])) {
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
                if (($row['UserName'] == $_POST['Userdr'])) {
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
                if (($row['UserName'] == $_POST['Userdr'])) {
                    $found = 1;
                    break;
                }
            }
            $db->close();
        }
//        endPatient
        if($found==1)
        {
            $_SESSION['Drnameexit']=1;
        }
        else{

            $db = new mysqli('localhost', 'root', '', 'goodental');
            $qrystr = "INSERT INTO `doctor` (`UserName`, `BirthDate`, `Gender`, `MobilePhone`, `Password`, `Specialization`, `StartTime`, `EndTime`, `Saturday`, `Sunday`, `Monday`, `Tuesday`, `Wednesday`, `Thursday`) VALUES ('$Userdr', '$BDdr', '$genderdr', '$phonedr', SHA1('$Userdr'), '$special', '$startdr', '$enddr', '$Saturday', '$Sunday', '$Monday', '$Tuesday', '$Wednesday', '$Thursday');";
            $res = $db->query($qrystr);
            $db->commit();
            $db->close();
        }
    }
    catch (Exception $ex)
    {

    }
}
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
        <li><a href="../PHP/ProfileAdmain.php">Profile</a></li>
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
                            <a href="#row4" style="text-align: left; padding-left: 5%" onclick="clickRow7()">Add Doctor</a>
                            <a href="#row5" style="text-align: left; padding-left: 5%"onclick="clickRow9()">Order Processing</a>
                            <a href="#row2" style="text-align: left; padding-left: 5%"onclick="clickRow3()">Show all Patient</a>
                            <a href="#row1" style="text-align: left; padding-left: 5%"onclick="clickRow1()">Show all Doctor</a>
                            <a href="#row6" style="text-align: left; padding-left: 5%"onclick="clickRow11()">Show all Appointment</a>
                            <a href="#row3" style="text-align: left; padding-left: 5%"onclick="clickRow5()">Contact US Messages</a>
                            <a href="../PHP/Logout.php" style="text-align: left; padding-left: 5%">Sign out</a>
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
<!--                                <button  onclick="clic3()" class="btn btt1" type="button"><i class="fas fa-edit icc"></i></button>-->
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
                    function clickRow7()
                    {
                        document.getElementById("row4").style.display = 'block';
                    }
                    function clickRow8()
                    {
                        document.getElementById("row4").style.display = 'none';
                    }
                    function clickRow9()
                    {
                        document.getElementById("row5").style.display = 'block';
                        document.getElementById("row7").style.display = 'block';
                    }
                    function clickRow10()
                    {
                        document.getElementById("row5").style.display = 'none';
                        document.getElementById("row7").style.display = 'none';
                    }
                    function clickRow11()
                    {
                        document.getElementById("row6").style.display = 'block';
                    }
                    function clickRow12()
                    {
                        document.getElementById("row6").style.display = 'none';
                    }
                </script>
<!--                -->
                <div class="card mb-3 content">
                    <h1 class="m-3">Management</h1>
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
                        <!--                        -->
                        <script type="text/javascript">
                            function cll(){
                                document.getElementById("momp").style.display='none';
                            }
                        </script>
                        <?php
                        if($_SESSION['Drnameexit'] == 1) {
                            echo "<div id='momp'>User Name Already Exist Choose Other User Name<button  onclick='cll()' class='btn btt1' type='button'><i class='far fa-window-close'></i></button></div>";
                        }
                        ?>
                        <div class="row" id="row4" style="display: none">
                            <div class="col-md-12">
                                <h5>Add Doctor<button  onclick="clickRow8()" class="btn btt1" type="button"><i class="far fa-window-close"></i></button></h5>
                                <form action="ProfileAdmain.php" method="post">
                                <table class="content-table" width="100%">
                                    <thead>
                                    <th width="50%"></th>
                                    <th width="50%"></th>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="hhh">
                                            User Name
                                        </td>
                                        <td>
                                            <input style="" class="ss1" placeholder="User Name" type="text" name="Userdr" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="hhh">
                                            Birth Date
                                        </td>
                                        <td>
                                            <input type="date" class="ss1" name="BDdr"required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="hhh">
                                            Gender
                                        </td>
                                        <td>
                                            <input required  class="sex" name="genderdr" id="l11" type="radio" value="male" ><label class="la" for="l11">Male</label>
                                            <input class="sex" name="genderdr" id="l22" type="radio" value="female"> <label class="la" for="l22"> Female </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="hhh">
                                            Mobile Phone
                                        </td>
                                        <td>
                                            <input required class="butt l3 ss1" type="tel" name="phonedr" pattern="059[0-9]{7}" placeholder="Mobile Number">
                                        </td>
                                    </tr>
<!--                                    <tr>-->
<!--                                        <td class="hhh">-->
<!--                                            Password-->
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            <input class="butt l4 ss1" type="password" placeholder="Password" name="passworddr" required >-->
<!--                                        </td>-->
<!--                                    </tr>-->
                                    <tr>
                                        <td class="hhh">
                                            Specialization
                                        </td>
                                        <td>
                                            <input  class="butt l3 ss1" type="text" name="special" placeholder="Specialization">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="hhh">
                                            Start time
                                        </td>
                                        <td>
                                            <input type="time" name="startdr" class="ss1">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="hhh">
                                            End time
                                        </td>
                                        <td>
                                            <input type="time" name="enddr" class="ss1">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="hhh">
                                            Working Days
                                        </td>
                                        <td>

                                            <input name="Saturday" type="checkbox" name="ch1" id="ch1"  value="1"><label for="ch1">Saturday </label>
                                            <input name="Sunday" type="checkbox" name="ch2" id="ch2" value="1"><label for="ch2">Sunday </label>
                                            <input name="Monday" type="checkbox" name="ch3"  id="ch3"value="1"><label for="ch3">Monday </label>
                                            <br>
                                            <input name="Tuesday" type="checkbox" name="ch4"  id="ch4" value="1"><label for="ch4">Tuesday </label>
                                            <input name="Wednesday" type="checkbox" name="ch5"  id="ch5" value="1"><label for="ch5">Wednesday </label>
                                            <input name="Thursday" type="checkbox" name="ch6"  id="ch6" value="1"><label for="ch6">Thursday </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>

                                        </td>
                                        <td>
                                            <input class="btnadddr ss1" type="submit" value="Add Doctor"></input>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                </form>
                            </div>
                        </div>
                        <!--                        -->
                        <!--                        -->
                        <div class="row" id="row6" style="display: none">
                            <div class="col-md-12">
                                <h5>Show all appointment<button  onclick="clickRow12()" class="btn btt1" type="button"><i class="far fa-window-close"></i></button></h5>
                                <table class="content-table" width="100%">
                                    <thead>
                                    <th width="10%">Doctor Name</th>
                                    <th width="10%">Patient Name</th>
                                    <th width="15%">Date</th>
                                    <th width="15%">Start Time</th>
                                    <th width="10%">End Time</th>
                                    <th width="10%">State</th>
                                    <th width="10%">Describtion</th>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $db=new mysqli('localhost','root','','goodental');
                                    $qrystr="SELECT * FROM `recoversession`;";
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
                                        echo "<td>$row[5]</td>";
                                        echo "<td>$row[6]</td>";
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
                        <div class="row" id="row5" style="display: block">
                            <div class="col-md-12">
                                <h5>Order Processing<button  onclick="clickRow10()" class="btn btt1" type="button"><i class="far fa-window-close"></i></button><button  onclick="clickRow100()" class="btn btt1" type="button"><i class="fas fa-sync-alt"></i></button></h5>
                                <table class="content-table" width="100%">
                                    <thead>
                                    <th width="20%">Doctor Name</th>
                                    <th width="20%">Patient Name</th>
                                    <th width="20%">Date</th>
<!--                                    <th width="10%">Start Time</th>-->
<!--                                    <th width="10%">End Time</th>-->
<!--                                    <th width="10%">State</th>-->
                                    <th width="20%">Describtion</th>
                                    <th width="20%">Confirm</th>
                                    </thead>
                                    <tbody>
                                    <script type="text/javascript">
                                        function updatest(){
                                        // var rowId=event.target.parentNode.id;
                                        // var data=document.getElementById("btnsave").querySelectorAll('.row-data')
                                        // alert(data[0]);
                                        //     var idp=data[0].innerHTML;
                                        //     location.href="ProfileAdmain.php?x="+idp+"";
                                        //     window.location.href='';
                                        }
                                    </script>
                                    <?php
                                    $db=new mysqli('localhost','root','','goodental');
                                    $qrystr="SELECT * FROM `recoversession` WHERE `State`='On Wait';";
                                    $res=$db->query($qrystr);
                                    for($i=0;$i<$res->num_rows;$i++)
                                    {
//                                        echo "<form class='row-data' action='ProfileAdmain.php' method='post'>";
                                        $row=$res->fetch_row();
                                        $_SESSION['DDRN']=$row[0];
                                        $_SESSION['PPAN']=$row[1];
                                        $_SESSION['DDDA']=$row[2];
                                        echo "<tr>";
                                        echo "<td name='USN'>$row[0]</td>";
                                        echo "<td name='DSN'>$row[1]</td>";
                                        echo "<td name='DAA'>$row[2]</td>";
//                                        echo "<td><input name='starttiming' type='time'></td>";
//                                        echo "<td><input name='endt-iming' type='time'></td>";
//                                        echo "<td>
//                                        <select name='state' size='1'>
//                                        <option value='accept'>accept</option>
//                                        <option value='reject'>reject</option>
//                                        </select>
//                                        </td>";
                                        echo "<td>$row[6]</td>";
                                        $rr="#row7";
                                        echo "<td><button style='width: 100%;border-radius: 5px; background-color: #00cccc;color: white;font-weight: bold' onclick="."window.location.href='http://localhost/Web_Project/PHP/ProfileAdmain.php?USN=$row[0]&DSN=$row[1]&DAA=$row[2]'".";"." id='btnsave' name='btnsave'>Select</button></td>";
                                        echo "</tr>";
//                                        echo "</form>";
                                    }
                                    $db->close();
                                    ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <!--                        -->
                        <!--                        -->
                        <div class="row" id="row7" style="display: block">
                            <div class="col-md-12">
                                <script type="text/javascript">
                                    function clickRow100()
                                    {
                                        window.location.href="http://localhost/Web_Project/PHP/ProfileAdmain.php#row5";
                                    }
                                </script>
                                <h5>UPDATE</h5>
                                <table class="content-table" width="100%">
<!--                                    /////////////////////////////////////////////-->
                                    <thead>
                                    <th width="25%">Stat Time</th>
                                    <th width="25%">End Time</th>
                                    <th width="25%">State</th>
                                    <th width="25%">Update</th>
                                    </thead>
                                    <tbody>
<!--                                    <form action="ProfileAdmain.php" method="post">-->
                                        <script type="text/javascript">
                                        function ss()
                                        {
                                            // alert(document.getElementById('stpo').value);

                                            window.location.href=window.location.href+"&stpo="+document.getElementById('stpo').value
                                                +"&stpo1="+document.getElementById('stpo1').value+"&stpo2="+document.getElementById('stpo2').value+"#row5";


                                        }
                                        </script>
                                        <?php
                                        if(isset($_GET['stpo']) && isset($_GET['stpo1']))
                                        {
                                            $USN=$_GET['USN'];
                                            $DSN=$_GET['DSN'];
                                            $DAA=$_GET['DAA'];
                                            $stpo=$_GET['stpo'];
                                            $stpo1=$_GET['stpo1'];
                                            $stpo2=$_GET['stpo2'] ;
                                            $db = new mysqli('localhost', 'root', '', 'goodental');
                                            $qrystr = "UPDATE `recoversession` SET `StartTime` = '$stpo', `EndTime` = '$stpo1', `State` = '$stpo2' WHERE `recoversession`.`DoctorName` = '$USN' AND `recoversession`.`PatientName` = '$DSN' AND `recoversession`.`Date` = '$DAA';";
//                                            echo $qrystr;
                                            $res = $db->query($qrystr);
                                            $db->commit();
                                            $db->close();

//                                            header("location:http://localhost/Web_Project/PHP/ProfileAdmain.php");
                                        }
                                        ?>
                                        <tr>
                                            <td><input name="stpo" id="stpo" type="time"></td>
                                            <td><input name="stpo1" id="stpo1" type="time"></td>
                                            <td>
                                                <select name=name="stpo2" id="stpo2" size='1'>
                                                    <option value='accept'>accept</option>
                                                    <option value='reject'>reject</option>
                                                </select>
                                            </td>
                                            <td><button style='width: 100%;border-radius: 5px; background-color: #00cccc;color: white;font-weight: bold' onclick="ss()"">Update</button></td>
                                        </tr>
                                    </tbody>
                                </table>
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