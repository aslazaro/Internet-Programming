<?php
include 'connect.php';


if (isset($_GET['act'])){
    $id = $_GET['act'];
    $SelSql = "SELECT * FROM `guestuser` WHERE User_ID=$id";
    $res = mysqli_query($conn, $SelSql);
    $r = mysqli_fetch_assoc($res);
    $status= $r['user_status'];
    $deactivate="UPDATE guestuser SET user_status='Active' WHERE user_ID=$id";
    mysqli_query($conn,$deactivate); 
    header('Location: adminpage.php?activate=User is now active.');
}

if (isset($_GET['deact'])){
    $id = $_GET['deact'];
    $SelSql = "SELECT * FROM `guestuser` WHERE User_ID=$id";
    $res = mysqli_query($conn, $SelSql);
    $r = mysqli_fetch_assoc($res);
    $status= $r['user_status'];
    $deactivate="UPDATE guestuser SET user_status='Deactive' WHERE user_ID=$id";
    mysqli_query($conn,$deactivate); 
    header('Location: adminpage.php?deactivated=User is now deactived.');
}
else{
    $fmsg = "Failed to update data." . mysqli_error ($conn);
    echo $fmsg;}
?>