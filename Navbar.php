        <div class="container">
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark" ;>
            <a class="navbar-brand mainnav" href="homepage.php">itemBarrow</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link mainnav" href="<?php if($_SESSION['usertype'] === "guest"){echo"http://localhost/project/userprofile.php";}else{echo"http://localhost/project/adminpage.php";}?>"><?php echo $_SESSION['firstname']?>'s Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mainnav" href="<?php if($_SESSION['usertype'] === "guest"){echo"http://localhost/project/cars.php";}else{echo"http://localhost/project/carlist.php";}?>">Cars</a>
                    </li>
                    <?php 
                    if($_SESSION['usertype'] === "admin"){
                        echo "<li class='nav-item'>";
                        echo "<a class='nav-link mainnav' href='bookinglist.php'> Bookings </a>";
                        echo "</li>";}
                        ?>

                  <?php 
                    if($_SESSION['usertype'] == "admin" || "staff"){
                        echo "<li class='nav-item'>";
                        echo "<a class='nav-link mainnav' href='report.php'> Reports </a>";
                        echo "</li>";}
                        ?>
                </ul>
                </ul>

            </div>
            <!------------ START LOG-IN REGISTER ----------------->
            <link href="http://cdn.phpoll.com/css/animate.css" rel="stylesheet">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link mainnav" href="logout.php?logout">Log out</a>
        </li>
        <li class="nav-item text-nowrap">
          <a class="nav-link mainnav" href="logout.php?logout">Sign up</a>
        </li>
      </ul>
            
            <!------------ END LOG-IN REGISTER ----------------->
        </nav>
    </div>