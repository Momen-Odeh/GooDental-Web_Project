<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SIGN UP</title>
    <link rel="stylesheet" href="../CSS/signup.css">
</head>
<body>

<img class="cover" src="" id="image">


<div class="container">
    <div class="header">
        <h1 >Sign Up</h1>
    </div>
    <div class="main">
        <form>
            <input  type="text" placeholder="Username" >
            <input  type="Date" placeholder="Username" >
            <span>
            <input name="gender"  type="radio">Male
            <input name="gender"  type="radio">Female
            </span>
            <input type="text" placeholder="Mobile number" >
            <input type="password" placeholder="Password" >
            <button class="b"> Sign Up</button>
        </form>
    </div>

</div>
<script>

    let image =document.getElementById('image');
    let images =['../img/boy-brushing1.jpg','../img/DENTIST-600.jpg','../img/difference-between-endodontist-vs-dentist-1.jpg',
    '../img/nm-kid-dentist-1.jpg']
    setInterval(function (){
        let random =Math.floor(Math.random()*4);
        image.src=images[random];
    },4000);

</script>

</body>
</html>