<?php
include('dbconfig.php');
$id = $_GET['id'];
$update_query = "UPDATE user_info SET isActive=1 WHERE id=$id";
mysqli_query($connection,$update_query);
header('location: list_users.php');
?>