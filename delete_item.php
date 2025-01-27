<?php
$id = $_GET['id'];
include "config.php";

$sql="delete from items where id='{$id}'";
$result=mysqli_query($conn,$sql);
header("Location: {$path}/dashboard.php");
?>
