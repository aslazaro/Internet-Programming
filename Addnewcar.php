<?php
include 'connect.php';
include 'sessionexpiry.php';


// define variables and set to empty values
$carmodel= $caryear= $carprice= $carimage="";

// $_SERVER[] is also a php global variable
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validation for carmodel
    if (empty($_POST["car_model"])) {
        $carmodelnameErr = "Car model is required";
      } 
    else {
        $carmodel = $_POST["car_model"];
      }

      // Validation for caryear
    if (empty($_POST["year"])) {
        $caryearErr = "Car year is required";
      } 
    else {
        $caryear = $_POST["year"];
      }

    // Validation for carprice
    if (empty($_POST["price"])) {
        $carpriceErr = "Car price is required";
      } 
    else {
        $carprice = $_POST["price"];
      }

      // Validation for carimage
    if (empty($_POST["car_image"])) {
        $carimageErr = "Car image is required";
      } 
    else {
        $carimage = $_POST["car_image"];
      }
}


if ($carmodel != "" && $caryear != "" && $carprice != "" && $carimage != ""){
			
    $insert_sql = "INSERT INTO car (Car_model, Year, Price, car_image)
         VALUES ('".$carmodel."', '".$caryear."', '".$carprice."', '".$carimage."')";

        //VALUES ('Madhur', 'hyahc@.com', 'www.madhur.com', 'jusikfu', 'Male')
    if ($conn->query($insert_sql) === TRUE) {
        header('Location: carlist.php?add= New Car is successfully added to the list.');
        
    }
    else {
        header('Location: carlist.php?adderr= Error adding new car:' . $conn->error); 
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
		<h2>Add New Car</h2>
      		<div class="form-group">
			    <label for="input11" class="col-sm-2 control-label">Car Model</label>
			    <div class="col-sm-10">
			      <input type="text" name="car_model"  class="form-control" id="Car_model" placeholder="Enter new car model" />
			    </div>
			</div>
		  
			<div class="form-group">
			    <label for="input13" class="col-sm-2 control-label">Year</label>
			    <div class="col-sm-10">
			      <input type="text" name="year"  class="form-control" id="Year" placeholder="Enter year of car" />
			    </div>
			</div>

			<div class="form-group">
			    <label for="input15" class="col-sm-2 control-label">Price</label>
			    <div class="col-sm-10">
			      <input type="text" name="price"  class="form-control" id="Price" placeholder="Enter car's price" />
			    </div>
			</div>

			<div class="form-group">
			    <label for="input17" class="col-sm-2 control-label">Image</label>
			    <div class="col-sm-10">
                  <input class="input-group" type="file" name="car_image" accept="/pictures/*" id="Image" placeholder="Upload image of car" />
			    </div>
			</div>
          
            <div class="form-group col-md-offset-12">
              <a class="btn btn-danger col-md-2 col-md-offset-7" href="carlist.php" role="button">Close</a>
            
            
              <input type="submit" class="btn btn-primary col-md-2 col-md-offset-1" value="submit" style="margin-left: 5px;" />
           </div>
           </form>
    </div>	
	</div>	
    </div>
    






<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
</body>
</html>