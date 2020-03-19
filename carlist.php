<?php
include 'connect.php';
include 'sessionexpiry.php';

    
$ReadSql = "SELECT * FROM car";

$res = mysqli_query($conn, $ReadSql);

if(!$res){
    die("QUERY FAILED. " .mysqli_error($conn));
}


/*$number_of_rows_in_query = mysqli_num_rows($res);
$number_of_rows_per_page = 10;
$total_number_of_pages = ceil($number_of_rows_in_query / $number_of_rows_per_page);

if (isset($_GET['page'])) {

$page = ($_GET['page'] - 1) * $number_of_rows_per_page;
  
}

$sql = "SELECT * FROM student LIMIT $page, $number_of_rows_per_page"; 

$res = mysqli_query($connection, $sql);*/
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Car List</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="static/css/bootstrap.min.css">
    <link rel="stylesheet" href="backgrounduserprofile.css">


  </head>

  <body>



  <?php include 'navbar.php';?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-12 pt-3 px-4">

          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Car List</h1>
        
        
          </div>
          <?php 
            if(@$_GET['update']==true)
                        {
        ?>
            <div class="alert-light text-danger text-left"><?php echo $_GET['update'] ?></div>                                
                <?php
                    }
                ?>  
            <?php 
            if(@$_GET['deleteconfirm']==true)
                        {
        ?>
            <div class="alert-light text-danger text-left"><?php echo $_GET['deleteconfirm'] ?></div>                                
                <?php
                    }
                ?> 

        <?php 
            if(@$_GET['add']==true)
                        {
        ?>
            <div class="alert-light text-danger text-left"><?php echo $_GET['add'] ?></div>                                
                <?php
                    }
                ?> 
        <?php 
            if(@$_GET['adderr']==true)
                        {
        ?>
            <div class="alert-light text-danger text-left"><?php echo $_GET['adderr'] ?></div>                                
                <?php
                    }
                ?> 
          <div class="table-responsive">
            
  <table class="table table-striped table-sm">
  <thead>
    <tr>
      <th scope="col">Car ID</th>
      <th scope="col">Car Model</th>
      <th scope="col">Year</th>
      <th scope="col">Price</th>
      <th scope="col" style="width:50%";>Image</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
           <?php while($r = mysqli_fetch_assoc($res)):?>
   
                        
                            
           
		            	<tr> 
		            		<td><?php echo $r['car_ID']; ?></td> 
		            		<td><?php echo $r['Car_model']; ?></td> 
		            		<td><?php echo $r['Year']; ?></td>
		            		<td><?php echo $r['Price']; ?></td>
                            <td style="width: 20px";><img class='img-fluid rounded mb-3 mb-md-0 carimage' src="pictures/<?php echo $r['car_image']; ?>"/></td>
                                <td >
                                                
                                <a href="updatecarlist.php?id=<?php echo $r['car_ID']; ?>"><button type="button" class="btn btn-primary">Edit</button></a>
                    
                                <button type="button" class="btn btn-danger trash" data-toggle="modal" data-id="<?php echo $r['car_ID']; ?>" data-target="#exampleModalCenter" > Delete</button></td>
                            

                        <?php endwhile; ?>
              </tbody>

              <a href="Addnewcar.php"><button type="button" class="btn btn-primary">Add</button></a>
            </table>
            
                
          </div>

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
        </main>
    

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="static/js/Validation.js"></script>
    <script src="static/js/jquery-3.3.1.min.js"></script>
    <script src="static/js/bootstrap.min.js"></script>
    <script src="static/js/bootstrap.validator.js"></script>
    <script src="myscriptproj.js"></script>
    <script src="static/aos/aos-next/src/js/aos.js"></script>
    <script>
    $('.trash').click(function(){
    var id=$(this).data('id');
    $('#modalDelete').attr('href','deletecar.php?id='+id);
      })
    </script>
    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>

  </body>
</html>
