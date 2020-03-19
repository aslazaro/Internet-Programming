
<?php
require_once('connect.php');
$page = 1;
$ReadSql = "SELECT car.car_model,COUNT(booking.Book_ID) as 'requests' FROM `booking`,`car` WHERE car.car_ID=booking.car_ID group by car_model ";
$res = mysqli_query($conn, $ReadSql);

if($res){

    $username=array();
    $requests=array();

    while($r = mysqli_fetch_assoc($res)){

        array_push($username,$r['car_model']);
        array_push($requests,$r['requests']);
    }

    $reportObj= new \stdClass();
    $reportObj->username=$username;
    $reportObj->request=$requests;
    
    $myJSON = json_encode($reportObj);
    
    echo $myJSON;

}
?>