    <?php 
include 'connect.php';
include 'sessionexpiry.php';



    ?>
    <!DOCTYPE html>
    <html lang="eng">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>PROJECT</title>

        <!--  Styles  -->
        <link rel="stylesheet" href="static/css/bootstrap.min.css">
        <link rel="stylesheet" href="backgrounduserprofile.css">
        <link rel="stylesheet" href="static/css/style.css">
        
        <!--  Goodle Map  -->
        <script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCr96PEZ8ApmI0lrCz1wFY131q9sLfUpy4'></script>
        <script src="map.js"></script>
    
        
    </head>

    <body>
    <?php include 'navbar.php';?>


        <div class="col-lg-16 mb-8">
        <div id="googleMap" style="width:500px; height:500px; margin-left:auto; margin-right:auto"></div>
        </div>
        <div class="col-lg-16 mb-16">
            <center><h2><U>Contact Information</U></h2></center>
            <p><center>20 Hobson Street</center>
            <center>Auckland 1010, New Zealand</center>
        
            </p>
            <p><center>Phone Number: +6422 5269 506</center></p>
            <p><center>Email address:</center><a href="mailto:h.gdit.ip@gmail.com"><center>h.gdit.ip@gmail.com</center></a></p>
        </div>

        <?php

        // define variables and set to empty values
            $messageErr = "";
        

            // $_SERVER[] is also a php global variable
            if ($_SERVER["REQUEST_METHOD"] == "POST") {

            
                if (empty($_POST["message"])) {
                    $messageErr = "Message is required<br>";
                } 
                else {
                    $message = $_POST["message"];
                }
            }

        ?>

        <div class="bg-img">
                <span class="border">
        <div class="container w-25 register">
        <div class="row justify-content-center">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="frm_feedback" class="container text-center border border-light p-1">
        <div class="alert alert-success hide"></div>
              <br style="clear:both">
            <p class="h4 mb-1">Message us</p>
                    <div class="col">

                <div class="col">
                <div class="alert alert-danger hide"></div>
                <textarea class="form-control mt-4" name="message" id="email" placeholder="Enter message"></textarea>
                <span class="error mb-4"><?php echo $messageErr;?></span>
                <div class="invalid-feedback">
                Please enter message
                </div>
                
                </div>
                <!-- Sign up button -->
                <input type="submit" name="submit" value="Submit" class="mt-4">
                    
                    </form>


            </div>
            </div>
            </span>
            </div>
        
        <script src="static/js/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="static/js/bootstrap.min.js"></script>
        <script src="static/js/Validation.js"></script>
        <script src="static/js/bootstrap.validator.js"></script>
        <script src="myscriptproj.js"></script>
        <script type="text/javascript">
// this is the id of the form
$("#frm_feedback").submit(function(e) {
    var string_msg = '';
 
    $.ajax({
           type: "POST",
           url: "email.php",
           data: $("#frm_feedback").serializeArray(), // serializes the form's elements.
           success: function(data)
           {
              var data  = jQuery.parseJSON(data);
 
              if(data.status) {
                $('.alert-success').toggleClass('hide');
                $('.alert-danger').addClass('hide');
                $('.alert-success').html(data.message);
               //console.log(data); // show response from the php script.
              } else {
                console.log(data);
                $('.alert-danger').toggleClass('hide');
                $('.alert-success').addClass('hide');
                string_msg = data.message.join('<br />');
                console.log(string_msg);
                $('.alert-danger').html(string_msg);
              }
           }
         });
 
    e.preventDefault(); // avoid to execute the actual submit of the form.
});
</script>   
        
        <?php include 'footer.php';?>                   
                            
    </body>
    </html>