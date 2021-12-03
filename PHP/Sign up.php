<?php
session_start();
$_SESSION['tmp']=0;
$found=0;
if(isset($_POST["Username"]) && isset($_POST["BD"]) && isset($_POST["gender"]) && isset($_POST["phone"]) && isset($_POST["password"]))
{
    $user=$_POST["Username"];
    $password=$_POST["password"];
    $bd=$_POST["BD"];
    $gender=$_POST["gender"];
    $phone=$_POST["phone"];
//    echo "$user $bd $gender $phone $password";
    try {
        //        Admain
        $db=new mysqli('localhost','root','','goodental');
        $qrystr="select * from admain";
        $res=$db->query($qrystr);
        for($i=0;$i<$res->num_rows;$i++)
        {
            $row=$res->fetch_assoc();
            if( ($row['UserName'] == $user)) {
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
                if (($row['UserName'] == $user)) {
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
                if (($row['UserName'] == $user)) {
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
            $db = new mysqli('localhost', 'root', '', 'goodental');
            $qrystr = "INSERT INTO `patient` (`UserName`, `BirthDate`, `Gender`, `MobilePhone`, `Password`, `BloodGroup`, `Age`, `address`) VALUES ('$user', '$bd', '$gender', '$phone', SHA1('$password'), NULL, NULL, NULL);";
            $res = $db->query($qrystr);
            $db->commit();
            $db->close();
            header('location:login.php');
        }
    }
    catch (Exception $E)
    {

    }

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SIGN UP</title>
    <link rel="stylesheet" href="../CSS/signup.css">
</head>
<body>
<div class="GOODental" data-text="GOODental">GOODental</div>

<div class="container">
    <div class="header">
        <h1 >Sign Up</h1>
    </div  >
    <div class="main">
        <form action="Sign%20up.php" method="post">

            <input class="butt l1" name="Username" type="text" placeholder="Username" required >
            <input placeholder="Date of Birth" name="BD" class="butt l2" type="text"
                   onfocus="(this.type='date')" id="date"
                   onblur="(this.type='text')" id="date" required >
            <br>

            <input required  class="sex" name="gender" id="l1" type="radio" value="male" ><label class="la" for="l1">Male</label>
           <input class="sex" name="gender" id="l2" type="radio" value="female"> <label class="la" for="l2"> Female </label>

            <input required id="area1" class="butt l3" type="tel" name="phone" pattern="059[0-9]{7}"
                   placeholder="Mobile Number"
                   onfocus="changePlaceholder()"
                   onblur="returnPlaceholder()">
            <input class="butt l4" type="password" placeholder="Password" name="password" required  >
            <br>
<!--            the user is already exist-->
            <?php
            if( $_SESSION['tmp']==1)
            {
                echo "<div>please choose another user Name</div>";
            }
            ?>
            <button class="b"> Sign Up</button>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
    function changePlaceholder() {
        $('#area1').attr('placeholder',
            '059-######');}
        function returnPlaceholder() {
            $('#area1').attr('placeholder',
                'Mobile Number');}
</script>
</body>
</html>