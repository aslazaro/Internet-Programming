

<!DOCTYPE html>
<html lang="eng">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PROJECT</title>
	<?php include 'style.html';?>

</head>

<body style="background-color:white;">

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
                    <a class="nav-link mainnav" href="<?php echo"http://localhost/project/registerpage.php";?>">Sign-up</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mainnav" href="<?php echo"http://localhost/project/loginpage.php";?>">Log-in</a>
                </li>
            </ul>

            <!------------ END LOG-IN REGISTER ----------------->
        </nav>
    </div>
    <?php

     		/* Namespace alias. */
		use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\Exception;

		/* Include the Composer generated autoload.php file. */
		require 'C:\xampp\composer\vendor\autoload.php';

		// define variables and set to empty values
		$usernme = $fname = $lname = $email = $passwd = $mobile = $address= "";
		$usernameErr = $fnameErr = $lnameErr = $emailErr = $passwordErr = $mobileErr = $addressErr = "";
		$insert_sql = "";

		// $_SERVER[] is also a php global variable
		if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // Validation for username
			if (empty($_POST["username"])) {
    			$usernameErr = "Username is required";
  			} 
			else {
    			$usernme = $_POST["username"];
  			}

            // Validation for first name
			if (empty($_POST["fname"])) {
    			$fnameErr = "First name is required";
  			} 
			else {
    			$fname = $_POST["fname"];
  			}

			// Validation for last name
			if (empty($_POST["lname"])) {
    			$lnameErr = "Last name is required";
  			} 
			else {
    			$lname = $_POST["lname"];
  			}

			// Validation for email
			if (empty($_POST["email"])) {
    			$emailErr = "Email is required"; //If email is empty then set email error message
  			} 
			else {
				//first check if this email is actually a valid email address
    			if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
					$email = $_POST["email"];
				}
				else{
					// If email address is invalid then set email error message
					$emailErr = "This is an invalid email format";
				}
  			}

            	// Validation for password
			if (empty($_POST["password1"])) {
    			$passwordErr = "Password is required";
  			} 
			else {
    			$passwd = $_POST["password1"];
  			}
            
            	// Validation for mobile number
			if (empty($_POST["mobile"])) {
    			$mobileErr = "Mobile number is required";
  			} 
			else {
    			$mobile = $_POST["mobile"];
  			}
            
            	// Validation for Address
			if (empty($_POST["Address"])) {
    			$addressErr = "Address is required<br>";
  			} 
			else {
    			$address = $_POST["Address"];
  			}
		}

	?>
        <!-----------------------START REGISTER PAGE---------------------------->
        <!-- Default form register -->
        <div class="bg-img">
            <span class="border">
    <div class="container w-25 register">
    <div class="row justify-content-center">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="container text-center border border-light p-1">
		<p class="h4 mb-4">Sign-up</p>
		
		<?php

        include 'connect.php';
         
		function sendAccountConfirmationEmail($email, $fname, $usernme,$passwd){
			/* Create a new PHPMailer object. Passing TRUE to the constructor enables exceptions. */
			$mail = new PHPMailer(TRUE);
            

			/* Open the try/catch block. */
			try {
			   /* Set the mail sender. */
			   $mail->setFrom('ak.gdit.ip@gmail.com', 'Akshit GDIT Support');
			   

			   /* Add a recipient. */
				// Type your email address here
			   $mail->addAddress($email, $fname);

			   /* Set the subject. */
			   $mail->Subject = 'PHP Confirm Account Registration Test Email';

			   /* Set the mail message body. */
			   $mail->Body = 'Hi ' . $fname . '! Your account has successfully been created with username ' . $usernme . ' with password ' . $passwd .". You may now log-in.";
				

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
				echo "<b>Registration email sent sucessfully<b><br><br>"; /* Just a debug trace statement */
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

		if ($usernme != "" && $fname != "" && $lname != "" && $email != "" && $passwd != "" && $mobile != "" && $address != ""){
			
			$insert_sql = "INSERT INTO guestuser (username, first_name, last_name, email, password, mobile_number, Address)
				 VALUES ('".$usernme."', '".$fname."', '".$lname."', '".$email."', '".$passwd."', '".$mobile."', '".$address."')";

				//VALUES ('Madhur', 'hyahc@.com', 'www.madhur.com', 'jusikfu', 'Male')
			if ($conn->query($insert_sql) === TRUE) {
				echo "<b>" . $fname . ", your account with email address " . $email . " has been created. You will receive a confirmation email shortly<b><br><br>";
				sendAccountConfirmationEmail($email, $fname, $usernme,$passwd);
			}
			else {
				echo "Error inserting new user account: " . $conn->error;
			}

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

		
            <!-- Username -->
            <input type="text" name="username" class="form-control" placeholder="Enter Username">
            <span class="error"> <?php echo $usernameErr;?></span>
            <div class="form-row mb-4 mt-4">
                <div class="col">
					
                    <!-- First name -->
                    <input type="text" name="fname" class="form-control" placeholder="First name">
                    <span class="error"> <?php echo $fnameErr;?></span>
                </div>
                <div class="col">
				
                    <!-- Last name -->
                    <input type="text" name="lname" class="form-control" placeholder="Last name">
                    <span class="error"> <?php echo $lnameErr;?></span>
                </div>
            </div>
			
            <!-- E-mail -->
            <input type="text" name="email" class="form-control mt-4" placeholder="E-mail">
            <span class="error"><?php echo $emailErr;?></span>
			
            <!-- Password -->
            <input type="password" name="password1" class="form-control mt-4" placeholder="Password" aria-describedby="defaultRegisterFormPasswordHelpBlock">
			<span class="error"> <?php echo $passwordErr;?></span>
			
            <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                At least 8 characters and 1 digit
            </small>
            
            <!-- Mobile Number -->
            <input type="text" name="mobile" class="form-control mt-4" placeholder="Mobile Number">
            <span class="error"><?php echo $mobileErr;?></span>
            
            <!-- Address -->
            <input type="text" name="Address" class="form-control mt-4 mb-4" placeholder="Address">
            <span class="error"><?php echo $addressErr;?></span>
            
            <!-- Sign up button -->
            <input type="submit" name="submit" value="Submit">

            <!-- Terms of service -->
			
			<p>By clicking
                <em>Sign-up</em> you agree to our
				<a href="" target="_blank" style="color:black;">terms of service</a>
			</p>
				
                </form>

        </div>
        </div>
        </span>
        </div>
        
            
        <!-- Default form register -->

        <!-----------------------END REGISTER PAGE---------------------------->
<?php include 'footer.php';?>

<script src="static/js/Validation.js"></script>
    <script src="static/js/jquery-3.3.1.min.js"></script>
    <script src="static/js/bootstrap.min.js"></script>
    <script src="static/js/bootstrap.validator.js"></script>
    <script src="myscriptproj.js"></script>
</body>

</html>