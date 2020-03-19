<?php
include 'connect.php';
include 'sessionexpiry.php';

ob_start();
    
$ReadSql = "SELECT 
            booking.Book_ID, 
            car.car_ID, 
            car.Car_model, 
            guestuser.user_ID, 
            guestuser.username,
            booking.Start_date,
            booking.End_date,
            booking.booking_status
            FROM booking 
            inner join car ON booking.car_id=car.car_id
            inner join guestuser on booking.user_id=guestuser.user_ID;";
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

        <main role="main" class="col-md-9 ml-sm-5 col-lg-12 pt-3 px-4">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Booking lists</h1>
          </div>


          <div class="table-responsive">
            <table class="table table-striped table-sm">
  
  <thead>
    <tr>
      <th scope="col">Booking ID</th>
      <th scope="col">Car ID</th>
      <th scope="col">Car Model</th>
      <th scope="col">User ID</th>
      <th scope="col">User Name</th>
      <th scope="col">Start Rent Date</th>
      <th scope="col">End Rent Date</th>
      <th scope="col">Booking Status</th>

    </tr>
    <?php
          if(isset($_SESSION['message'])){
              echo "<div class=\"alert-light text-danger text-left\"> {$_SESSION['message']} </div>";
              unset($_SESSION['message']);
          }
          ?>
  </thead>
  <tbody>
           <?php while($r = mysqli_fetch_assoc($res)):?>
   

		            	<tr> 
		            		<td><?php echo $r['Book_ID']; ?></td> 
                            <td><?php echo $r['car_ID']; ?></td>
                            <td><?php echo $r['Car_model']; ?></td> 
                            <td><?php echo $r['user_ID']; ?></td> 
                            <td><?php echo $r['username']; ?></td>
		            		<td><?php echo $r['Start_date']; ?></td>
                            <td><?php echo $r['End_date']; ?></td>
                            <td><?php echo $r['booking_status']; ?></td>  
                   
                    <td>
                        
                    <?php echo "<a href='bookinglist.php?accept={$r['Book_ID']}'><button name='accept' type='button' class='btn btn-primary'>Approve</button></a>"; ?>
                    
		            	
                      
                    <?php echo "<a href='bookinglist.php?reject={$r['Book_ID']}'><button name='reject' type='button' class='btn btn-danger'>Reject</button></a>"; ?>
                    </td>
                        <?php endwhile; ?>
              </tbody>

              
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
    $('#modalDelete').attr('href','delete.php?id='+id);
      })
    </script>
    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>

    <?php
     		/* Namespace alias. */
             use PHPMailer\PHPMailer\PHPMailer;
             use PHPMailer\PHPMailer\Exception;
     
             /* Include the Composer generated autoload.php file. */
             require 'C:\xampp\composer\vendor\autoload.php';

        include 'connect.php';
        
         
		function sendBookingConfirmationEmail($email){
			/* Create a new PHPMailer object. Passing TRUE to the constructor enables exceptions. */
			$mail = new PHPMailer(TRUE);
			/* Open the try/catch block. */
			try {
			   /* Set the mail sender. */
			   $mail->setFrom('ak.gdit.ip@gmail.com', 'Akshit GDIT Support');
			   

			   /* Add a recipient. */
				// Type your email address here
			   $mail->addAddress($email);

			   /* Set the subject. */
			   $mail->Subject = 'Booking Confirmation';

			   /* Set the mail message body. */
			   $mail->Body = 'This is to confirm your booking.';
				
				/* SMTP parameters. */

			   /* Tells PHPMailer to use SMTP. */
			   $mail->isSMTP();

				/* SMTP server address. */
			   $mail->Host = 'smtp.gmail.com';

			   /* Use SMTP authentication. */
			   $mail->SMTPAuth = TRUE;

			   /* Set the encryption system. */
			   $mail->SMTPSecure = 'tls';

			   /* SMTP authentication username. */
			   $mail->Username = 'ak.gdit.ip@gmail.com';

			   /* SMTP authentication password. */
			   $mail->Password = 'Mailer@123';

			   /* Set the SMTP port. */
			   $mail->Port = 587;

			   /* Finally send the mail. */
			   $mail->send();
				
			}
			catch (Exception $e){
			   /* PHPMailer exception. */
				echo "First catch<br>";
			   echo $e->errorMessage();
			}
			catch (\Exception $e){
			   /* PHP exception (note the backslash to select the global namespace Exception class). */
				echo "Second catch<br>";
			   echo $e->getMessage();
			}

		}	
        function sendBookingRejectionEmail($email){
			/* Create a new PHPMailer object. Passing TRUE to the constructor enables exceptions. */
			$mail = new PHPMailer(TRUE);
            

			/* Open the try/catch block. */
			try {
			   /* Set the mail sender. */
			   $mail->setFrom('ak.gdit.ip@gmail.com', 'Akshit GDIT Support');
			   

			   /* Add a recipient. */
				// Type your email address here
			   $mail->addAddress($email);

			   /* Set the subject. */
			   $mail->Subject = 'Booking Rejected';

			   /* Set the mail message body. */
			   $mail->Body = 'This is to inform you that your booking was rejected.';
				
				/* SMTP parameters. */

			   /* Tells PHPMailer to use SMTP. */
			   $mail->isSMTP();

				/* SMTP server address. */
			   $mail->Host = 'smtp.gmail.com';

			   /* Use SMTP authentication. */
			   $mail->SMTPAuth = TRUE;

			   /* Set the encryption system. */
			   $mail->SMTPSecure = 'tls';

			   /* SMTP authentication username. */
			   $mail->Username = 'ak.gdit.ip@gmail.com';

			   /* SMTP authentication password. */
			   $mail->Password = 'Mailer@123';

			   /* Set the SMTP port. */
			   $mail->Port = 587;

			   /* Finally send the mail. */
			   $mail->send();
				
			}
			catch (Exception $e){
			   /* PHPMailer exception. */
				echo "First catch<br>";
			   echo $e->errorMessage();
			}
			catch (\Exception $e){
			   /* PHP exception (note the backslash to select the global namespace Exception class). */
				echo "Second catch<br>";
			   echo $e->getMessage();
			}

        }
        
		if (isset($_GET['accept'])){
            $booking=$_GET['accept'];
            $query="SELECT booking.Book_ID, guestuser.email
            FROM booking inner join guestuser ON booking.user_id=guestuser.user_id where booking.Book_ID=$booking";
            $result=mysqli_query($conn,$query);
            $r=mysqli_fetch_assoc($result);
            $useremail=$r['email'];
            $update="Update booking SET booking_status='Approved' where Book_ID=$booking";
            mysqli_query($conn,$update);
            sendBookingConfirmationEmail($useremail);
            $_SESSION['message']= "<b>Booking approval   email sent sucessfully<b><br><br>";   
            header('Location: bookinglist.php');

        }
         if (isset($_GET['reject'])){
            $booking=$_GET['reject'];
            $query="SELECT booking.Book_ID, guestuser.email
            FROM booking inner join guestuser ON booking.user_id=guestuser.user_id where booking.Book_ID=$booking";
            $result=mysqli_query($conn,$query);
            $r=mysqli_fetch_assoc($result);
            $useremail=$r['email'];
            $update="Update booking SET booking_status='Rejected' where Book_ID=$booking";
            mysqli_query($conn,$update);
            sendBookingRejectionEmail($useremail);
            $_SESSION['message']= "<b>Booking rejection email sent sucessfully<b><br><br>";   
            header('Location: bookinglist.php');
        }
		/*
		echo "<h2>Your Input:</h2>";
		echo 'Name is ' .$fname;
		echo "<br>";
		echo 'Email is '. $email;
		echo "<br>";
		echo 'website is ' .$lname;
		echo "<br>";
		echo 'Comm are ' .$password;
		echo "<br>";
		echo 'Gender is ' .$mobile;
		*/
	?>

  </body>
</html>
