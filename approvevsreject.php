<?php
require_once('connect.php');
$page = 1;
$ReadSql = "SELECT booking.booking_status,COUNT(booking.Book_ID) as 'requests' FROM `booking` WHERE booking.Book_ID=booking.Book_ID  group by booking_status ";
$res = mysqli_query($conn, $ReadSql);

if($res){

    $username=array();
    $requests=array();

    while($r = mysqli_fetch_assoc($res)){

        array_push($username,$r['booking_status']);
        array_push($requests,$r['requests']);
    }

    $reportObj= new \stdClass();
    $reportObj->username=$username;
    $reportObj->request=$requests;
    
    $myJSON = json_encode($reportObj);
    
    echo $myJSON;

}
?>