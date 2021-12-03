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
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Holy guacamole!</strong> You should check in on some of those fields below.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<script>
    var alertPlaceholder = document.getElementById('liveAlertPlaceholder')
    var alertTrigger = document.getElementById('liveAlertBtn')

    function alert(message, type) {
        var wrapper = document.createElement('div')
        wrapper.innerHTML = '<div class="alert alert-' + type + ' alert-dismissible" role="alert">' + message + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'

        alertPlaceholder.append(wrapper)
    }

    if (alertTrigger) {
        alertTrigger.addEventListener('click', function () {
            alert('Nice, you triggered this alert message!', 'success')
        })
    }
</script>
<div id="liveAlertPlaceholder"></div>
<button type="button" class="btn btn-primary" id="liveAlertBtn">Show live alert</button>
</body>
</html>