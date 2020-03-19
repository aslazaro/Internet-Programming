
<?php
include 'connect.php';
include 'sessionexpiry.php';
include 'function.php';

$userid= $_SESSION['id'];
$id = $_GET['id'];
$SelSql = "SELECT * FROM `car` WHERE car_ID=$id";

$res = mysqli_query($conn, $SelSql);
$r = mysqli_fetch_assoc($res);


if(isset($_POST) & !empty($_POST)){
	$sdate = $_POST['sdate'];
	$edate = $_POST['edate'];
	$UpdateSql = "INSERT INTO booking (car_ID, User_ID, Start_date, End_date)
	VALUES ('".$id."', '".$userid."', '".$sdate."', '".$edate."')";
	$res = mysqli_query($conn, $UpdateSql);
	if($res){
		header('Location: cars.php?booking=Your booking is now sent to admin for approval. Please wait for an email on whether your booking request is approved or rejected.');
	}else{
    header('Location: cars.php?bookingerr=Error in booking:' . mysqli_error($conn));
    
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
		<h2>Rent Schedule</h2>
      		<div class="form-group">
			    <label for="input11" class="col-sm-2 control-label">Start Date</label>
			    <div class="col-sm-10">
			      <input type="date" name="sdate"  class="form-control" id="input72" value="<?php echo $r['sdate']; ?>" placeholder="<?php echo $r['sdate']; ?>" />
			    </div>
			</div>
		  
			<div class="form-group">
			    <label for="input13" class="col-sm-2 control-label">End Date</label>
			    <div class="col-sm-10">
			      <input type="date" name="edate"  class="form-control" id="input74" value="<?php echo $r['edate']; ?>" placeholder="<?php echo $r['edate']; ?>" />
			    </div>
      </div>
          <div class="form-group col-md-offset-12">
              <a class="btn btn-danger col-md-2 col-md-offset-7" href="cars.php" role="button">Close</a>
              <input type="submit" class="btn btn-primary col-md-2 col-md-offset-10 confirmbutton" value="Book" style="margin-left: 5px;" id="confirm" />
           </div>
             
           </form>
    </div>	
	</div>	
    </div>
    
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Booking done!/h5>
            
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Your booking is now sent to admin for approval. Please wait for an email on whether your booking request is approved or rejected.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
             
          </div>
        </div>
      </div>
    </div>


    <script>
    $('#confirm').click(function(){
    var id=$(this).data('$userid'); 
      })
    </script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>



</body>
</html>