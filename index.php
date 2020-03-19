<?php 
if(session_status() == PHP_SESSION_NONE  || session_id() == '') {
    session_start();
}
require_once("connect.php");
?>


<!DOCTYPE html>
<html lang="eng">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PROJECT</title>

    <!--  Styles  -->
    <link rel="stylesheet" href="static/css/bootstrap.min.css">
    <link rel="stylesheet" href="backgrounduserprofile.css">


    <!--    Script    -->

    <script src="static/js/Validation.js"></script>
    <script src="static/js/jquery-3.3.1.min.js"></script>
    <script src="static/js/bootstrap.min.js"></script>
    <script src="static/js/bootstrap.validator.js"></script>
    <script src="myscriptproj.js"></script>
    <script src="static/aos/aos-next/src/js/aos.js"></script>

</head>

<body>

 <!----START Navigation button ----->
 <div class="container logingrp">
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark" ;>
            <a class="navbar-brand" href="index.php">SUPERcarRent</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

            </div>
            <!------------ START LOG-IN REGISTER ----------------->
            <link href="http://cdn.phpoll.com/css/animate.css" rel="stylesheet">
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item">
                    <a class="nav-link mainnav" href=<?php echo"http://localhost/project/registerpage.php";?>>Sign-up</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mainnav" href="<?php echo"http://localhost/project/loginpage.php";?>">Log-in</a>
                </li>
            </ul>

            <!------------ END LOG-IN REGISTER ----------------->
        </nav>
    </div>

    <!----END Navigation button ----->

    <!---- START Carousel ---->
    <section>
    <div class="container-fluid">
        <div class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="item active">
                    <img src="flatlays/BeFunky-collage.jpg" class="img-responsive">
                    <div class="carousel-caption">
                        <h1>Men's wear</h1>
                        <p>My first caption</p>
                    </div>
                </div>
                <div class="item">
                    <img src="flatlays/devicesflatlay.png" class="img-responsive">
                    <div class="carousel-caption">
                        <h1>Electronic devices</h1>
                        <p>My second caption</p>
                    </div>
                </div>
                <div class="item">
                    <img src="flatlays/BeFunky-collagewomen.jpg" class="img-responsive">
                    <div class="carousel-caption">
                        <h1>Women's wear</h1>
                        <p>My third caption</p>
                    </div>
                </div>

                <div class="item">
                    <img src="flatlays/adventure1.jpg" class="img-responsive">
                    <div class="carousel-caption">
                        <h1>Adventure equipments</h1>
                        <p>My fourth caption</p>
                    </div>
                </div>
                <div class="item">
                    <img src="flatlays/BeFunky-collagecam.jpg" class="img-responsive">
                    <div class="carousel-caption">
                        <h1>Photography</h1>
                        <p>My fifth caption</p>
                    </div>
                </div>
                
                    
            </div>
        </div>
    </div>
</section>
    <!---- END Carousel ---->


    <div class="container">
            <div class="row">    
                <div class="col animation FadeInLeft p-0">
                       <figure class="effect-honey">
                           <img class="img-fluid" src="pictures/2017_aston_martin_vanquish_s-HD.jpg" alt="aventador">
                            <figcaption><h2 class="font-weight-light">Rent an <span>Aston Martin Vanquish</span>
                            <b> Now</b></h2>
                            
                        
                            </figcaption>
                       </figure>
                </div>
                <div class="col animation FadeInRight p-0">
                       <figure class="effect-honey">
                           <img class="img-fluid" src="pictures/aventador-sv.jpg" alt="aventador">
                            <figcaption><h2 class="font-weight-light">Rent a <span>Lamborghini Aventador</span>
                            <b> Now</b>
                        </h2>
                           
                            </figcaption>
                       </figure>  
                </div>  
            </div>
        </div>

        <!----- END Paragraph Text ---->

        <!----- END VIDEO ---->

        <!-----START IMAGE----->

        <!-----END IMAGE----->

        <?php include 'footer.php';?>
    <script type="text/javascript">
        AOS.init({
            easing:'ease-in-out-sine'
                });
    </script>
</body>

</html>