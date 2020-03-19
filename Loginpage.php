


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
   
<!----------------------------START FORGOT PASSWORD MODAL--------------------------------->
       <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Confirm forgot password action</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
           <div class="col-md-12">
                  <form action="forgotpassword.php" method="Post">
                  <div class="form-group row">
                       <label  class="col-sm-12 col-form-label">Username</label>
                       <div class="col-sm-12">
                       <input type="text" class="form-control" name="usernameforgot"  placeholder="Type in your username." >
                       </div>
                  </div>   
                  <button class="btn  btn-danger btn-block" type="submit" name="login">Send</button> 

                  </form>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            
          </div>
        </div>
      </div>
    </div>
<!----------------------------END FORGOT PASSWORD MODAL--------------------------------->

    <!-----------------------START Log-in page---------------------------->
    <!-- Default form login -->
    <div class="bg-img">
        <span class="border">
    <div class="container w-25 register">
    <div class="row justify-content-center">

    <form action="loginserv.php" class="container text-center border border-light py-1" method="post">

        <p class="h4 mb-3">Log-in</p>
  
        <?php 
            if(@$_GET['Empty']==true)
                        {
        ?>
            <div class="alert-light text-danger text-center py-3"><?php echo $_GET['Empty'] ?></div>                                
                <?php
                    }
                ?>
         <?php 
            if(@$_GET['Invalid']==true)
                        {
        ?>
            <div class="alert-light text-danger text-center py-3"><?php echo $_GET['Invalid'] ?></div>                                
                <?php
                    }
                ?>

        <?php 
            if(@$_GET['passrecover']==true)
                        {
        ?>
            <div class="alert-light text-danger text-center py-3"><?php echo $_GET['passrecover'] ?></div>                                
                <?php
                    }
                ?>

        <?php 
            if(@$_GET['passfail']==true)
                        {
        ?>
            <div class="alert-light text-danger text-center py-3"><?php echo $_GET['passfail'] ?></div>                                
                <?php
                    }
                ?>

        <?php 
                    if(@$_GET['sessionend']==true)
                                {
                ?>
                    <div class="alert-light text-danger text-center py-3"><?php echo $_GET['sessionend'] ?></div>                                
                        <?php
                            }
                        ?>
        <?php 
                    if(@$_GET['deacterror']==true)
                                {
                ?>
                    <div class="alert-light text-danger text-center py-3"><?php echo $_GET['deacterror'] ?></div>                                
                        <?php
                            }
                        ?>                
        <!-------------------- Username -------------------->
            <input type="text" name="username1" class="form-control mb-4" placeholder="Enter Username"> <span class="error" required autofocus> </span>
        <!-------------------- Password -------------------->
        <input type="password" name="password1" class="form-control" placeholder="Enter Password" aria-describedby="defaultRegisterFormPasswordHelpBlock" required>
        <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
        At least 8 characters and 1 digit
        </small>
         <!--Google recaptch -->
            <div class="form-group">
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-3">
                <div class="g-recaptcha" data-sitekey="6Lfrem0UAAAAAACn9uavRdhT2ELqB6dZ0gddNwPd" required></div>
                </div> 
            </div>
        <!-- Login button -->
        <button class="btn btn-dark btn-block registerbtn" name="login" type="submit" style="background-color:black;">Log-in</button>

        <!-- Terms of service -->
        <p>By clicking
            <em>Sign-up</em> you agree to our
            <a href="" target="_blank" style="color:black;">terms of service</a></p>
            <button type="button" class="btn btn-warning btn-lg trash" data-toggle="modal"  data-target="#exampleModalCenter" > Forgot password</button>

        </form>
    </div>
    </div>
        </span>
    </div>
    <!-- Default form register -->

    <!-----------------------END REGISTER PAGE---------------------------->
     <!-------------------------------Start Forgot password -------------------------------->

    
   <!-------------------------------END Forgot password -------------------------------->
<?php include 'footer.php';?>
    <!--    Script    -->

    <script src="static/js/Validation.js"></script>
    <script src="static/js/jquery-3.3.1.min.js"></script>
    <script src="static/js/bootstrap.min.js"></script>
    <script src="static/js/holder.min.js"></script>
    <script src="static/js/bootstrap.validator.js"></script>
    <script src="myscriptproj.js"></script>
    
    
</body>

</html>