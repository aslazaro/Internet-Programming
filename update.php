
<?php
require_once('connect.php');
$id = $_GET['id'];
$SelSql = "SELECT * FROM `guestuser` WHERE User_ID=$id";
$res = mysqli_query($conn, $SelSql);
$r = mysqli_fetch_assoc($res);
if(isset($_POST) & !empty($_POST)){
	$username = $_POST['username'];
	$fname = $_POST['first_name'];
	$lname = $_POST['last_name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$mobile = $_POST['mobile_number'];
	$address = $_POST['Address'];
	$usertype = $_POST['usertype'];
	$UpdateSql = "UPDATE `guestuser` SET  username='$username', first_name='$fname', last_name='$lname', email='$email', password='$password', User_type='$usertype', mobile_number='$mobile', Address='$address' WHERE User_ID=$id";
	$res = mysqli_query($conn, $UpdateSql);
	if($res){
		header('Location: adminpage.php?update=Profile is successfully updated.');
	}else{
        $fmsg = "Failed to update data." . mysqli_error ($conn);
        echo $fmsg;
	}
}
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
		<h2>UPDATE User</h2>

      		<div class="form-group">
			    <label for="input11" class="col-sm-2 control-label">Username</label>
			    <div class="col-sm-10">
			      <input type="text" name="username"  class="form-control" id="input72" value="<?php echo $r['username']; ?>" placeholder="<?php echo $r['username']; ?>" />
			    </div>
			</div>
		  
			<div class="form-group">
			    <label for="input13" class="col-sm-2 control-label">First name</label>
			    <div class="col-sm-10">
			      <input type="text" name="first_name"  class="form-control" id="input74" value="<?php echo $r['first_name']; ?>" placeholder="<?php echo $r['first_name']; ?>" />
			    </div>
			</div>

			<div class="form-group">
			    <label for="input15" class="col-sm-2 control-label">Last name</label>
			    <div class="col-sm-10">
			      <input type="text" name="last_name"  class="form-control" id="input26" value="<?php echo $r['last_name']; ?>" placeholder="<?php echo $r['last_name']; ?>" />
			    </div>
			</div>

			<div class="form-group">
			    <label for="input17" class="col-sm-2 control-label">Email</label>
			    <div class="col-sm-10">
			      <input type="text" name="email"  class="form-control" id="input38" value="<?php echo $r['email']; ?>" placeholder="<?php echo $r['email']; ?>" />
			    </div>
			</div>
            <div class="form-group">
			    <label for="input19" class="col-sm-2 control-label">Password</label>
			    <div class="col-sm-10">
			      <input type="text" name="password"  class="form-control" id="input310" value="<?php echo $r['password']; ?>" placeholder="<?php echo $r['password']; ?>" />
			    </div>
			</div>
			<div class="form-group">
			    <label for="input17" class="col-sm-2 control-label">Mobile Number</label>
			    <div class="col-sm-10">
			      <input type="text" name="mobile_number"  class="form-control" id="input39" value="<?php echo $r['mobile_number']; ?>" placeholder="<?php echo $r['mobile_number']; ?>" />
			    </div>
			</div>
           <div class="form-group">
			    <label for="input17" class="col-sm-2 control-label">Address</label>
			    <div class="col-sm-10">
			      <input type="text" name="Address"  class="form-control" id="input39" value="<?php echo $r['Address']; ?>" placeholder="<?php echo $r['Address']; ?>" />
			    </div>
			</div>
			<div class="form-group">
			    <label for="input17" class="col-sm-2 control-label">User type</label>
			    <div class="col-sm-10">
			      <input type="text" name="usertype"  class="form-control" id="input39" value="<?php echo $r['User_type']; ?>" placeholder="<?php echo $r['User_type']; ?>" />
			    </div>
			</div>
					<div class="form-group col-md-offset-12">
              <a class="btn btn-danger col-md-2 col-md-offset-7" href="adminpage.php" role="button">Close</a>
            
            
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