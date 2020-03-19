
<?php
require_once('connect.php');
$page = 1;
$ReadSql = "SELECT guestuser.User_type,COUNT(guestuser.user_ID) as 'requests' FROM `guestuser` WHERE guestuser.user_ID=guestuser.user_ID group by User_type ";
$res = mysqli_query($conn, $ReadSql);

if($res){

    $username=array();
    $requests=array();

    while($r = mysqli_fetch_assoc($res)){

        array_push($username,$r['User_type']);
        array_push($requests,$r['requests']);
    }

    $reportObj= new \stdClass();
    $reportObj->username=$username;
    $reportObj->request=$requests;
    
    $myJSON = json_encode($reportObj);
    
    echo $myJSON;

}
?>