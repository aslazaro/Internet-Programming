
<?php
include 'connect.php';
include 'sessionexpiry.php';

$id = $_GET['id'];
$SelSql = "SELECT * FROM `car` WHERE car_ID=$id";
$res = mysqli_query($conn, $SelSql);
$r = mysqli_fetch_assoc($res);
if(isset($_POST) & !empty($_POST)){
	$Car_model = $_POST['Car_model'];
	$Year = $_POST['Year'];
	$Price = $_POST['Price'];
	$car_image = $_POST['car_image'];
	$UpdateSql = "UPDATE `car` SET Car_model='$Car_model', Year='$Year', Price='$Price', car_image='$car_image' WHERE car_ID=$id";
	$res = mysqli_query($conn, $UpdateSql);
	if($res){
		header('Location: carlist.php?update=Car Info is successfully updated.');
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
		<h2>UPDATE Car List</h2>
      		<div class="form-group">
			    <label for="input11" class="col-sm-2 control-label">Car Model</label>
			    <div class="col-sm-10">
			      <input type="text" name="Car_model"  class="form-control" id="Car_model" value="<?php echo $r['Car_model']; ?>" placeholder="<?php echo $r['Car_model']; ?>" />
			    </div>
			</div>
		  
			<div class="form-group">
			    <label for="input13" class="col-sm-2 control-label">Year</label>
			    <div class="col-sm-10">
			      <input type="text" name="Year"  class="form-control" id="Year" value="<?php echo $r['Year']; ?>" placeholder="<?php echo $r['Year']; ?>" />
			    </div>
			</div>

			<div class="form-group">
			    <label for="input15" class="col-sm-2 control-label">Price</label>
			    <div class="col-sm-10">
			      <input type="text" name="Price"  class="form-control" id="Price" value="<?php echo $r['Price']; ?>" placeholder="<?php echo $r['Price']; ?>" />
			    </div>
			</div>

			<div class="form-group">
			    <label for="input17" class="col-sm-2 control-label">Image</label>
			    <div class="col-sm-10">
                  <input class="input-group" type="file" name="car_image" accept="/pictures/*" id="Image" value="/pictures/<?php echo $r['car_image']; ?>" placeholder="/pictures/<?php echo $r['car_image']; ?>" />
			    </div>
			</div>
            
			<div class="form-group col-md-offset-12">
              <a class="btn btn-danger col-md-2 col-md-offset-7" href="carlist.php" role="button">Close</a>
            
            
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