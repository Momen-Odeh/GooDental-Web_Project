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
        <form>

            <input class="butt" type="text" placeholder="Username" >
            <input placeholder="Date of Birth" class="butt" type="text"
                   onfocus="(this.type='date')" id="date"
                   onblur="(this.type='text')" id="date">
            <br>

            <input class="sex" name="gender"  type="radio" ><label class="la">Male</label>
           <input class="sex" name="gender" type="radio"> <label class="la"> Female </label>

            <input class="butt" type="number" placeholder="Mobile number" >
            <input class="butt" type="password" placeholder="Password" >
            <br>
            <button class="b"> Sign Up</button>
        </form>
    </div>


</div>
<script>

</body>
</html>