<?php 
include 'connect.php';
include 'sessionexpiry.php';


?>


<!DOCTYPE html>
<html lang="eng">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PROJECT</title>

    <?php include 'style.html';?>
   


  
</head>

<body>

    <!----START Navigation button ----->

<?php include 'navbar.php';?>

    <!----END Navigation button ----->

   <!---- START Carousel ---->
   <div class="jumbotron jumbotron-fluid mt-0 animated fadeIn delay-1s ready">
          <div class="container">
            <h1 class="display-3">Ready to rent?</h1>
          </div>
        </div>
    <!---- END Carousel ---->


        <div class="container">
            <div class="row">    
                <div class="col animation FadeInLeft p-0">
                       <figure class="effect-honey">
                           <img class="img-fluid" src="pictures/2017_aston_martin_vanquish_s-HD.jpg" alt="aventador">
                            <figcaption><h2>Rent an <span>Aston Martin Vanquish</span>
                            <i> Now</i></h2>
                        
                            </figcaption>
                       </figure>
                </div>
                <div class="col animation FadeInRight p-0">
                       <figure class="effect-honey">
                           <img class="img-fluid" src="pictures/aventador-sv.jpg" alt="aventador">
                            <figcaption><h2>Rent a <span>Lamborghini Aventador</span>
                            <i> Now</i>
                        </h2>
                           
                            </figcaption>
                       </figure>  
                </div>  
            </div>
        </div>

        <!----- END Paragraph Text ---->



<?php include 'footer.php';?>
  <!--    Script    -->

    <script src="static/js/Validation.js"></script>
    <script src="static/js/jquery-3.3.1.min.js"></script>
    <script src="static/js/bootstrap.min.js"></script>
    <script src="static/js/bootstrap.validator.js"></script>
    <script src="myscriptproj.js"></script>
    <script src="static/aos/aos-next/src/js/aos.js"></script>

</body>

</html>