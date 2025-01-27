
<?php

    include "config.php";
    $id=$_GET['id'];


    $sql="delete from users where id='{$id}'";
    $result=mysqli_query($conn,$sql);

    header("Location:{$path}/users.php");

?>
