<?php
include 'connect.php';
include 'sessionexpiry.php';

$ReadSql = "SELECT * FROM car";
$res = mysqli_query($conn, $ReadSql);

if(!$res){
    die("QUERY FAILED. " .mysqli_error($conn));
}

?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="static/css/bootstrap.min.css">
    <link rel="stylesheet" href="backgrounduserprofile.css">


  </head>

  <body>



  <?php include 'navbar.php';?>

        <main role="main" class="container-fluid bodycar">
        <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Confirm delete action</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Are you sure you want to delete this car?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            
          
          <a href="#" class="btn btn-danger"  id="modalDelete" >Delete</a>  
          </div>
        </div>
      </div>
    </div>


          <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1>Cars</h1>
    <h6>Choose the car you would like to rent.</h6>

    <?php 
            if(@$_GET['booking']==true)
                        {
        ?>
            <div class="alert-light text-danger text-left"><?php echo $_GET['booking'] ?></div>                                
                <?php
                    }
                ?> 

    <?php 
            if(@$_GET['bookingerr']==true)
                        {
        ?>
            <div class="alert-light text-danger text-left"><?php echo $_GET['bookingerr'] ?></div>                                
                <?php
                    }
                ?>

<hr>
    
    
    <!-- Project One -->

      
            <?php while($row = mysqli_fetch_array($res)){
        $userid = $row['car_ID'];
        $carmodel = $row['Car_model'];
        $year = $row['Year'];
        $price = $row['Price'];
        $carimage= $row['car_image'];
              
              echo "<div class='row'>";
                echo "<div class='col-md-7'>";
            echo "<a href='#'><img class='img-fluid rounded mb-3 mb-md-0' src=pictures/$carimage alt='car image'>
            </a>";
            echo"</div>";
        echo"<div class='col-md-5'>";
       
        echo"<h3>$year $carmodel</h3>";
        echo"<p>Price: $price/day<br>Status: Available</p>";
        echo"<a href='rental.php?id=$userid'><button type='button' class='btn btn-primary'>Book a Rent</button>
            </a>";
      echo"</div>";
    echo"</div>";
}
      ?>
    <!-- /.row -->

  </div>
  <!-- /.container -->
        </main>
        
        <?php include 'footer.php';?>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

<script>
    $('.trash').click(function(){
    var id=$(this).data('id');
    $('#modalDelete').attr('href',' delete.php?id='+id);
      })
    </script>
    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>

  </body>
</html>
