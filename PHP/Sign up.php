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

            <input class="butt l1" type="text" placeholder="Username" required >
            <input placeholder="Date of Birth" class="butt l2" type="text"
                   onfocus="(this.type='date')" id="date"
                   onblur="(this.type='text')" id="date" required >
            <br>

            <input required  class="sex" name="gender" id="l1" type="radio" ><label class="la" for="l1">Male</label>
           <input class="sex" name="gender" id="l2" type="radio"> <label class="la" for="l2"> Female </label>

            <input required id="area1" class="butt l3" type="tel" pattern="059-[0-9]{7}"
                   placeholder="Mobile Number"
                   onfocus="changePlaceholder()"
                   onblur="returnPlaceholder()">
            <input class="butt l4" type="password" placeholder="Password" required  >
            <br>

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