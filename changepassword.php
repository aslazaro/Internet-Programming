
<?php
include 'connect.php';
include 'sessionexpiry.php';

    

$id = $_GET['id'];
$SelSql = "SELECT * FROM `guestuser` WHERE User_ID=$id";
$res = mysqli_query($conn, $SelSql);

$r = mysqli_fetch_assoc($res);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <title>Document</title>
</head>
<body>
    <div class="container">
    <div class="row">
    <div class="col">
    
		<form method="POST" class="form-horizontal col-md-6 col-md-offset-3">
		<h2>Change Password</h2>
        <div class="form-group">
			    <label for="input11" class="col-sm-2 control-label">Old Password</label>
			    <div class="col-sm-10">
			      <input type="text" name="oldpassword"  class="form-control" id="input72" placeholder="Type your old Password" />
			    </div>
			</div>
      		<div class="form-group">
			    <label for="input11" class="col-sm-2 control-label">New Password</label>
			    <div class="col-sm-10">
			      <input type="text" name="newpassword"  class="form-control" id="input72" placeholder="Type your new password." />
			    </div>
			</div>
<?php
//if not empty condition 


if(empty($_POST['oldpassword']) || empty($_POST['newpassword'])){
    echo "Please fill in the blank.";} 
else {
    if($_POST['oldpassword'] === $r['password']) {
    $newpassword = $_POST['newpassword'];
    $UpdateSql = "UPDATE `guestuser` SET password='$newpassword' WHERE User_ID=$id";
    $changepassword = mysqli_query($conn, $UpdateSql);
            if($changepassword){
                                header("location: userprofile.php?confirm=Password successfully updated.");}
                                else {
                                echo "Password change failed";}
        }else{ echo "Password doesn't match.";}
    }
        
    
?>		  

            <div class="form-group col-md-offset-12">
              <a class="btn btn-danger col-md-2 col-md-offset-7" href="userprofile.php" role="button">Close</a>
              <input type="submit" class="btn btn-primary col-md-2 col-md-offset-10" value="submit" style="margin-left: 5px;" />
           </div>
           </form>
    </div>	
	</div>	
    </div>
    





<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
</body>
</html>