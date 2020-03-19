<?php
include 'connect.php';
include 'sessionexpiry.php';

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Orders List</title>

    <!-- Bootstrap core CSS -->
    <link href="static/css/bootstrap.min.css" rel="stylesheet">
    <script src="static/js/plotly-latest.min.js"></script>
    <link rel="stylesheet" href="backgrounduserprofile.css">
  </head>

  <body>
  <?php include 'navbar.php';?>

        <main role="main" class="col-md-12 ml-sm-auto col-lg-12 pt-3 px-4">


      <h2>Reports</h2>
      <hr>
      <h5>Number of users</h5> 
      <div id="myDiv0">
      </div>
      <hr>
      <h5>Number of bookings by Username</h5> 
      <div id="myDiv">
      </div>
      <hr>
      <h5>Number of bookings by Car models</h5> 
      <div id="myDiv2">
      </div>
      <hr>
      <h5>Approved vs Rejected bookings</h5> 
      <div id="myDiv3">
      </div>
    </main>         

  


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../js/jquery-slim.min.js"><\/script>')</script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/holder.min.js"></script>
    <script src="js/myscript.js"></script>
    <script>
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "numuser.php", true);

        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        reportData = JSON.parse(this.responseText);
        
        var usernames= reportData.username;
        var requests= reportData.request;

        var data=
        [{
            x:usernames,
            y: requests,
            type: 'bar'
        }
        ];

        Plotly.newPlot('myDiv0', data);
        }
        };
        
        xmlhttp.send();
        </script>

    <script>
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "reporthandler.php", true);

        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        reportData = JSON.parse(this.responseText);
        
        var usernames= reportData.username;
        var requests= reportData.request;

        var data=
        [{
            x:usernames,
            y: requests,
            type: 'bar'
        }
        ];

        Plotly.newPlot('myDiv', data);
        }
        };
        
        xmlhttp.send();
        </script>

        <script>
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "reportbycar.php", true);

        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        reportData = JSON.parse(this.responseText);
        
        var usernames= reportData.username;
        var requests= reportData.request;

        var data=
        [{
            x:usernames,
            y: requests,
            type: 'bar'
        }
        ];

        Plotly.newPlot('myDiv2', data);
        }
        };
        
        xmlhttp.send();
        </script>

<script>
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "approvevsreject.php", true);

        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        reportData = JSON.parse(this.responseText);
        
        var usernames= reportData.username;
        var requests= reportData.request;

        var data=
        [{
            x:usernames,
            y: requests,
            type: 'bar'
        }
        ];

        Plotly.newPlot('myDiv3', data);
        }
        };
        
        xmlhttp.send();
        </script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

  </body>
</html>
