<?php
session_start();
if(!isset($_SESSION['Is_Member']))
{
    $_SESSION['Is_Member']=0;
}
$_SESSION['tmp']=0;
if(isset($_POST["Username"]) && isset($_POST["Password"]))
{
    $user=$_POST["Username"];
    $password=$_POST["Password"];
    try {
//        Admain
        $db=new mysqli('localhost','root','','goodental');
        $qrystr="select * from admain";
        $res=$db->query($qrystr);
        for($i=0;$i<$res->num_rows;$i++)
        {
            $row=$res->fetch_assoc();
            if( ($row['UserName'] == $user) && ($row['Password'] == sha1($password))) {
                $_SESSION['Is_Member']=1;
                $_SESSION['UserName']=$user;
                $_SESSION['BirthDate']=$row['BirthDate'];
                $_SESSION['Gender']=$row['Gender'];
                $_SESSION['MobilePhone']=$row['MobilePhone'];
                $_SESSION['Password']=$row['Password'];
                header('location:ProfileAdmain.php');
            }
            else{
                $_SESSION['tmp']=1;
            }

        }
        $db->close();
//        endAdmain
//        Doctor
        $db=new mysqli('localhost','root','','goodental');
        $qrystr="select * from doctor";
        $res=$db->query($qrystr);
        for($i=0;$i<$res->num_rows;$i++)
        {
            $row=$res->fetch_assoc();
            if( ($row['UserName'] == $user) && ($row['Password'] == sha1($password))) {
                $_SESSION['Is_Member']=1;
                $_SESSION['UserName']=$user;
                $_SESSION['BirthDate']=$row['BirthDate'];
                $_SESSION['Gender']=$row['Gender'];
                $_SESSION['MobilePhone']=$row['MobilePhone'];
                $_SESSION['Password']=$row['Password'];
                $_SESSION['Specialization']=$row['Specialization'];
                $_SESSION['StartTime']=$row['StartTime'];
                $_SESSION['EndTime']=$row['EndTime'];
                $_SESSION['Thursday']=$row['Thursday'];
                $_SESSION['Wednesday']=$row['Wednesday'];
                $_SESSION['Tuesday']=$row['Tuesday'];
                $_SESSION['Monday']=$row['Monday'];
                $_SESSION['Sunday']=$row['Sunday'];
                $_SESSION['Saturday']=$row['Saturday'];
                header('location:ProfileDr.php');
            }
            else{
                $_SESSION['tmp']=1;
            }

        }
        $db->close();
//        endDoctor
//        Patient
        $db=new mysqli('localhost','root','','goodental');
        $qrystr="select * from patient";
        $res=$db->query($qrystr);
        for($i=0;$i<$res->num_rows;$i++)
        {
            $row=$res->fetch_assoc();
            if( ($row['UserName'] == $user) && ($row['Password'] == sha1($password))) {
                $_SESSION['Is_Member']=1;
                $_SESSION['UserName']=$user;
                $_SESSION['BirthDate']=$row['BirthDate'];
                $_SESSION['Gender']=$row['Gender'];
                $_SESSION['MobilePhone']=$row['MobilePhone'];
                $_SESSION['Password']=$row['Password'];
                $_SESSION['BloodGroup']=$row['BloodGroup'];
                $parts = explode('-', $_SESSION['BirthDate']);
                echo $parts[0];
                $_SESSION['Age']=date("Y")-$parts[0];
                $_SESSION['address']=$row['address'];
                header('location:Profile.php');
            }
            else{
                $_SESSION['tmp']=1;
            }

        }
        $db->close();
//        endPatient
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
    <title>LOGIN</title>
     <link rel="stylesheet" href="../CSS/login.css">
     <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">

</head>
<body>
<div class="GOODental" data-text="GOODental">GOODental</div>
<div class="container">
    <div class="header">
        <h1 >Log In</h1>
    </div>
    <div class="main">
        <form action="Login.php" method="post">
            <input class="l1" type="text" placeholder="Username" name="Username" required>
            <input class="l2" type="password" placeholder="Password" name="Password"  required>
            <button class="b"> Log In</button>
            <?php
            if(($_SESSION['tmp']==1))
            {
                echo "<div id="."passWrong".">your password or user name are wrong</div>";
            }
            ?>

            <div class="signup">  Don't have an account? <span class="sp" onclick="myFunction()">
                    Sign up<span></div>
        </form>
    </div>

</div>
<script>
    function myFunction() {
        window.open("../PHP/Sign up.php",'_self').focus();
    }
</script>
</body>
</html>