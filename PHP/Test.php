<?php
if(isset($_POST["us"]) and isset($_POST["pa"]))
{
    $user=$_POST["us"];
    $password=$_POST["pa"];
        try {
    $db=new mysqli('localhost','root','','first_db');
    $qrystr="select * from user";
    $res=$db->query($qrystr);
    for($i=0;$i<$res->num_rows;$i++)
    {
        $row=$res->fetch_assoc();
        echo $row['name'].' '.$row['password'];
    }
    $db->close();
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
    <title>Test page</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
<!--    <link rel="stylesheet" href="../CSS/style.css">-->
</head>
<body>
<form action="Test.php" method="post">
    <table>
        <tr>
            <td>name</td>
            <td><input required type="text" name="us"></td>
        </tr>
        <tr>
            <td>password</td>
            <td><input required type="text" name="pa"></td>
        </tr>
        <tr>
            <td><input type="submit"></td>
        </tr>
    </table>
</form>

</body>
</html>