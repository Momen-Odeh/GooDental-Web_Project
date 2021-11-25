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
    <h1 class="titlede ">We Build <br>Your Smile</h1>
    <script>
        window.addEventListener('scroll',()=>{
            let scrl=window.scrollY;
            console.log(scrl);
            if(scrl >= 0 && scrl<=160)
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
            <div class="card-header">Header</div>
            <div class="card-body" style="background: #80ffcc ">
                <h5 class="card-title">Info card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
        </div>
<!--        -->
<!---->
        <div class="cardss" >
            <div class="card border-info mb-3" style="max-width: 18rem; background-color: #80ffcc ">
                <div class="card-header">Header</div>
                <div class="card-body" style="background: #80ffcc ">
                    <h5 class="card-title">Info card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
<!--        -->
        <!---->
        <div class="cardss" ">
            <div class="card border-info mb-3" style="max-width: 18rem; background-color: #80ffcc ">
                <div class="card-header">Header</div>
                <div class="card-body" style="background: #80ffcc ">
                    <h5 class="card-title">Info card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
        <!--        -->
        <!---->
        <div class="cardss"">
            <div class="card border-info mb-3" style="max-width: 18rem; background-color: #80ffcc ">
                <div class="card-header">Header</div>
                <div class="card-body" style="background: #80ffcc ">
                    <h5 class="card-title">Info card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
        <!--        -->
    </div>
</div>
jvjsk
<pre>






























</pre>
</body>
</html>
