<?php
require_once('connect.php');
$page = 1;
$ReadSql = "SELECT guestuser.username,COUNT(booking.Book_ID) as 'requests' FROM `booking`,`guestuser` WHERE guestuser.user_ID=booking.user_id group by username ";
$res = mysqli_query($conn, $ReadSql);

if($res){

    $username=array();
    $requests=array();

    while($r = mysqli_fetch_assoc($res)){

        array_push($username,$r['username']);
        array_push($requests,$r['requests']);
    }

    $reportObj= new \stdClass();
    $reportObj->username=$username;
    $reportObj->request=$requests;
    
    $myJSON = json_encode($reportObj);
    
    echo $myJSON;

}
?>