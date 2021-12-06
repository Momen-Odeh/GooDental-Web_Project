<?php
session_start();
$DDRN=$_SESSION['DDRN'];
$PPAN=$_SESSION['PPAN'];
$DDDA=$_SESSION['DDDA'];
$starttiming=$_POST['starttiming'];
$endtiming=$_POST['endtiming'];
$state=$_POST['state'];
$db=new mysqli('localhost','root','','goodental');
$qrystr="UPDATE `recoversession` SET `StartTime` = '$starttiming', `EndTime` = '$endtiming', `State` = '$state' WHERE `recoversession`.`DoctorName` = '$DDRN' AND `recoversession`.`PatientName` = '$PPAN' AND `recoversession`.`Date` = '$DDDA';";
echo $qrystr;
$res=$db->query($qrystr);
$db->commit();
$db->close();
?>

<form action="trq.php" method="get">
    <input name="ww" type="text">
    <input name="www" type="text">
    <input type="submit">
</form>
