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
        <form>
            <input class="l1" type="text" placeholder="Username" required>
            <input class="l2" type="password" placeholder="Password"  required>
            <button class="b"> Log In</button>
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