<?php
include 'connect.php';
include 'sessionexpiry.php';

$showrecordperpage= 10;
if (isset($_GET['page']) && !empty($_GET['page'])){
  $currentpage= $_GET['page'];
}else{
  $currentpage = 1;
}
$startFrom = ($currentpage * $showrecordperpage) - $showrecordperpage;
$ReadSql = "SELECT * FROM guestuser";
$res = mysqli_query($conn, $ReadSql);

$totaluser= mysqli_num_rows($res);
$lastpage= ceil($totaluser/$showrecordperpage);
$firstpage=1;
$nextpage= $currentpage + 1;
$previouspage= $currentpage - 1;
$userSQL= "SELECT * FROM guestuser LIMIT $startFrom, $showrecordperpage";
$userresult= mysqli_query($conn,$userSQL);


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

        <main role="main" class="col-md-9 ml-sm-3 col-lg-12 pt-3 px-0">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Guest user lists</h1>
            <a href="adduser.php" class="col-md-9"><button type="button" class="btn btn-primary">Add user</button></a>

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
            if(@$_GET['Success']==true)
                        {
        ?>
            <div class="alert-light text-danger text-left"><?php echo $_GET['Success'] ?></div>                                
                <?php
                    }
                ?> 
              <?php
              if(@$_GET['fail']==true)
                        {
        ?>
            <div class="alert-light text-danger text-left"><?php echo $_GET['fail'] ?></div>                                
                <?php
                    }
                ?> 

            <?php 
              if(@$_GET['activate']==true)
                                    {
              ?>
              <div class="alert-light text-danger text-left"><?php echo $_GET['activate'] ?></div>                                
                <?php
                    }
                ?> 

<?php 
              if(@$_GET['deactivated']==true)
                                    {
              ?>
              <div class="alert-light text-danger text-left"><?php echo $_GET['deactivated'] ?></div>                                
                <?php
                    }
                ?> 
          <div class="table-responsive">
            <table class="table table-striped table-sm">
  
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Username</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Mobile Number</th>
      <th scope="col">Address</th>
      <th scope="col">User Type</th>
      <th scope="col">User Status</th>
      <th scope="col">Edit/Delete</th>
      <th scope="col">Activate/Deactivate</th>
    </tr>
  </thead>
  <tbody>
           <?php while($r = mysqli_fetch_assoc($userresult)){?>
   

		            	<tr> 
		            		<td><?php echo $r['user_ID']; ?></td> 
		            		<td><?php echo $r['username']; ?></td> 
		            		<td><?php echo $r['first_name']; ?></td> 
		            		<td><?php echo $r['last_name']; ?></td>
                    <td><?php echo $r['email']; ?></td> 
                    <td><?php echo $r['password']; ?></td>
                    <td><?php echo $r['mobile_number']; ?></td>
                    <td><?php echo $r['Address']; ?></td>
                    <td><?php echo $r['User_type']; ?></td>
                    <td><?php echo $r['user_status']; ?></td> 
                    <td>
                    <a href="update.php?id=<?php echo $r['user_ID']; ?>"><button type="button" class="btn btn-primary">Edit</button></a>
                    
		            			<!--write the delete code yourself-->
                      
                      <button type="button" class="btn btn-danger trash" data-toggle="modal" data-id="<?php echo $r['user_ID']; ?>" data-target="#exampleModalCenter" > Delete</button></td>
                    
                    <td>  
                    <?php echo "<a href='actdeact.php?act={$r['user_ID']}'><button name='act' type='button' class='btn btn-success'>Activate</button></a>"; ?>
                      
                      <?php echo "<a href='actdeact.php?deact={$r['user_ID']}'><button name='deact' type='button' class='btn btn-warning'>Deactivate</button></a>"; ?>
                    </td>
                    </td>
                      
                    <?php } ?>
              </tbody>

              
            </table>
            <nav aria-label="Page navigation">
              <ul class="pagination">
                <?php if($currentpage != $firstpage){?>                
                <li class="page-item">
                <a class="page-link" href="?page=<?php echo $firstPage ?>" tabindex="-1" aria-label="Previous"><span aria-hidden="true"> First</span> 
                </a>
                </li>
                <?php } ?>
                <?php if($currentpage >= 2) { ?>
                <li class="page-item"><a class="page-link" href="?page=<?php echo $previouspage ?>"><?php echo $previouspage ?></a></li>
                <?php } ?>
                <li class="page-item active"><a class="page-link" href="?page=<?php echo $currentpage ?>"><?php echo $currentpage ?></a></li>
                <?php if($currentpage != $lastpage) { ?>
                <li class="page-item"><a class="page-link" href="?page=<?php echo $nextpage ?>"><?php echo $nextpage ?></a></li>
                <li class="page-item"><a class="page-link" href="?page=<?php echo $lastpage ?>" aria-label="Next"><span aria-hidden="true">Last</span>
                </a>
                </li>
                <?php } ?>
                
              </ul>
            </nav>

          
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
            Are you sure you want to delete this user?
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
    $('#modalDelete').attr('href','delete.php?id='+id);
      })
    </script>
    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>

  </body>
</html>
