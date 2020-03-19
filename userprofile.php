<?php
include 'connect.php';
include 'sessionexpiry.php';
    

$ReadSql = "SELECT * FROM guestuser WHERE username = '{$_SESSION['username']}'";
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

    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="static/css/bootstrap.min.css">
    <link rel="stylesheet" href="backgrounduserprofile.css">


  </head>

  <body>



  <?php include 'navbar.php';?>

 

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-0 mb-5 mt-5">
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

          <?php 
            if(@$_GET['confirm']==true)
                        {
        ?>
            <div class="alert-light text-danger text-left"><?php echo $_GET['confirm'] ?></div>                                
                <?php
                    }
                ?>

<?php 
            if(@$_GET['update']==true)
                        {
        ?>
            <div class="alert-light text-danger text-left"><?php echo $_GET['update'] ?></div>                                
                <?php
                    }
                ?>
          <div class="table-responsive">
          

        <table>
               <?php if(mysqli_num_rows($res) == 1) : ?>
               <?php $r = mysqli_fetch_assoc($res); ?>
                <tr>
                    <td>First Name:</td>
                    <td>
                        <?php echo $r['first_name']; ?>
                    </td>
                </tr>
                                <tr>
                    <td>Last Name:</td>
                    <td>
                        <?php echo $r['last_name']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Email: </td>
                    <td>
                        <?php echo $r['email']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Mobile Number: </td>
                    <td>
                        <?php echo $r['mobile_number']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Address: </td>
                    <td>
                        <?php echo $r['Address']; ?>
                    </td>
                </tr>
                <br>
                <tr>
                    <td>
                </td>
                </tr>
                <tr>    
                    <td>
                        <a href="updatebyuser.php?id=<?php echo $r['user_ID']; ?>"><button type="button" class="btn btn-primary">Edit Profile</button></a>
                    </td>
                    <td>
                        <a href="changepassword.php?id=<?php echo $r['user_ID']; ?>"><button type="button" class="btn btn-primary">Change Password</button></a>
                    </td>
                </tr>
                <?php endif; ?>
            </table>

          </div>
        </main>
        
        <?php include 'footer.php';?>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
<script src="static/js/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="static/js/bootstrap.min.js"></script>
    <script src="static/js/Validation.js"></script>
    <script src="static/js/bootstrap.validator.js"></script>
    <script src="myscriptproj.js"></script>
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
