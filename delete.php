<?php
require_once('connect.php');
$id = $_GET['id'];

$sql = "DELETE FROM guestuser WHERE user_ID=$id";

if ($conn->query($sql) === TRUE) {
    header('Location: adminpage.php?deleteconfirm=Delete user successful.');
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

$conn->close();
?>