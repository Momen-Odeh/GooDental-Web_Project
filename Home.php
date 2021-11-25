<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GOODENTAL</title>
    <link rel="stylesheet" href="styleHOME.css">
    <script src="script.js"></script>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
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
    <img class="logopic" src="img/LOGO1.png">

    <label class="logo">GOODental</label></span>
    <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">location</a></li>
        <li><a href="#">timing</a></li>
        <li><a href="#">who developed</a></li>
    </ul>
</nav>
<div class="spaceofnav"></div>
<div class="imgbg">
    <h1 class="titlede ">We Build <br>Your <span style="color:rgb(83,124,206)">Smile</span> </h1>
    <script>
        window.addEventListener('scroll',()=>{
            let scrl=window.scrollY;
            console.log(scrl);
            if(scrl >= 0 && scrl<=170)
            {
                let scrl1=scrl-50;
                scrl1=scrl1/100;
                document.getElementById("cards").style.opacity=scrl1;
                document.getElementById("cards").style.transform = 'translate'+'('+0+'px,'+'-'+scrl+ 'px)';
            }

        });
    </script>
    <div id="cards" class="maintk"  >

<!---->
        <div class="cardss">
        <div class="card border-info mb-3" style="max-width: 18rem; background-color: #80ffcc ">
            <div class="card-header" style="font-family: 'Ubuntu', sans-serif;font-size: 25px ;color: white;font-weight: bold ">Consultation</div>
            <div class="card-body" style="background: #80ffcc; height: 140px ">
                <h5 class="card-title" style="color: white">Make Consultation</h5>
                <p class="card-text" style="color: white">Whichever specific health issue you’re facing, we’llgive you a free consultation on it!</p>
            </div>
        </div>
        </div>
<!--        -->
<!---->
        <div class="cardss"  >
            <div class="card border-info mb-3" style="max-width: 18rem; background-color: #80ffcc ">
                <div class="card-header" style="font-family: 'Ubuntu', sans-serif;font-size: 25px ;color: white;font-weight: bold ">Our Location</div>
                <div class="card-body" style="background: #80ffcc; height: 140px ">
                    <h5 class="card-title" style="color: white">See on Map</h5>
                    <p class="card-text" style="color: white">Palestine-Nablus-Howara-AlQuds Street</p>
                </div>
            </div>
        </div>
<!--        -->
        <!---->
        <div class="cardss" ">
            <div class="card border-info mb-3" style="max-width: 18rem; background-color: #80ffcc ">
                <div class="card-header" style="font-family: 'Ubuntu', sans-serif;font-size: 25px ;color: white;font-weight: bold ">Appointments</div>
                <div class="card-body" style="background: #80ffcc ; height: 140px;color: white">
                    <h5 class="card-title">09-2590077</h5>
                    <p class="card-text">Call us to register apointment or sign up online. We have worls-class, flexible support.</p>
                </div>
            </div>
        </div>
        <!--        -->
        <!---->
        <div class="cardss"">
            <div class="card border-info mb-3" style="max-width: 18rem; background-color: #80ffcc ">
                <div class="card-header" style="font-family: 'Ubuntu', sans-serif;font-size: 25px ;color: white;font-weight: bold ;color: white">Opening Hour</div>
                <div class="card-body" style="background: #80ffcc; height: 140px ;width: 250px;color: white">
                    <h5 class="card-title">Info card title</h5>
                    <p class="card-text">MON - FRI  8:00 - 21:00 <br>SATURDAY  :00 - 21:00 <br>SUNDAY  9:00 - 17:00</p>
                </div>
            </div>
        </div>
        <!--        -->
    </div>
</div>
<!--jvjsk-->
<pre>






























</pre>
</body>
</html>
