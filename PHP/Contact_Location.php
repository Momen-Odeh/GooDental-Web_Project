<?php
session_start();
if(!isset($_SESSION['Is_Member']))
{
    $_SESSION['Is_Member']=0;
}
if(isset($_POST['txt1']) && isset($_POST['txt2']) && isset($_POST['txt3']))
{
    $t1=$_POST['txt1'];
    $t2=$_POST['txt2'];
    $t3=$_POST['txt3'];
    $db = new mysqli('localhost', 'root', '', 'goodental');
    $qrystr = "INSERT INTO `contactus` (`NUM`, `Name`, `Email`, `Message`) VALUES (NULL, '$t1', '$t2', '$t3');";
    $res = $db->query($qrystr);
    $db->commit();
    $db->commit();
    $db->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us</title>
    <link rel="stylesheet" href="../CSS/styleHOME.css">
    <link rel="stylesheet" href="../CSS/c1.css">
    <script src="../SCRIPT/script.js"></script>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../CSS/Contact_Location.css">

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
        <?php
        if($_SESSION['Is_Member']==1)
        {
            echo "<li><a href="."../PHP/Profile.php".">Profile</a></li>";
        }
        else{
            echo "<li><a href="."../PHP/Login.php".">Sign in</a></li>";
        }
        ?>
    </ul>
</nav>
<div class="spaceofnav"></div>
<div class="contact-in">
    <div class="contact-map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3375.
        119118467623!2d35.2183914151235!3d32.22795898114132!2m3!1f0!2f0!3f0!3m2!1i1024!2i7
        68!4f13.1!3m3!1m2!1s0x151ce1a4057bc2b1%3A0x37cadbaf1603e397!2sAn-Najah%20National%20Unive
        rsity!5e0!3m2!1sen!2s!4v1638191188375!5m2!1sen!2s" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
    <div class="contact-form">
        <h1>Contact Us</h1>
        <form action="Contact_Location.php" method="post">
            <input type="text" name="txt1" placeholder="Name" class="contact-form-txt">
            <input type="text" name="txt2" placeholder="Email" class="contact-form-txt">
            <textarea name="txt3" placeholder="Message" class="contact-form-txtarea"></textarea>
            <input type="submit" name="Submit" class="contact-form-btn">
        </form>
    </div>
</div>
</body>
</html>