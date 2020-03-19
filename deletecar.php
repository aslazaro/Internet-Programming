<?php
require_once('connect.php');
$id = $_GET['id'];

$sql = "DELETE FROM items WHERE itemnumber=$id";

if ($conn->query($sql) === TRUE) {
    header('Location: lend.php?deleteconfirm=Successfully deleted the item on the list.');
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

$conn->close();






?>