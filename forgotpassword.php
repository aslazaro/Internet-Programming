 <?php 

        /* Namespace alias. */
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;
     
        /* Include the Composer generated autoload.php file. */
        require 'C:\xampp\composer\vendor\autoload.php';

        include 'connect.php';

        function sendForgotPasswordEmail($email,$password){
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
			   $mail->Subject = 'Your Recovered Password';

			   /* Set the mail message body. */
			   $mail->Body = 'Your password is: ' .$password;
				
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

        if(isset($_POST) & !empty($_POST)){
			$usernameforgot= mysqli_real_escape_string($conn,
		 
		
		
		);
            $sql="SELECT * from guestuser where username='$usernameforgot'";
            $res=mysqli_query($conn,$sql);
            $r=mysqli_fetch_assoc($res);
            $passwordfor=$r['password'];
            $tofor=$r['email'];
            $count=mysqli_num_rows($res);
            if($count==1){
                    sendForgotPasswordEmail($tofor,$passwordfor);
                    header("location:Loginpage.php?passrecover= Your password has been successfully sent to your email.");
            }else{ 
                header("location:Loginpage.php?passfail= Username does not exist. Please try again.");
            }   
        
        }
        

        
        ?>