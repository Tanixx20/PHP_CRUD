<?php
session_start();

if(!isset($_SESSION['username'])){
    include "config.php";

    header("Location:{$path}/login.php");
}
?>
<?php

if(isset($_POST['submit'])){

    include "config.php";
    $name=mysqli_real_escape_string($conn,$_POST['name']);
    $desc=mysqli_real_escape_string($conn,$_POST['description']);

    $sql="select name,description from items where name='{$name}' and description='{$desc}'";
    $result=mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0){
        echo "Item already exists";
    }
    else{

        $sql1="insert into items (name,description) value ('{$name}','{$desc}')";
        $result1=mysqli_query($conn,$sql1);

        header("Location:{$path}/dashboard.php");
    }



}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Add Item</title>
</head>
<body>
<div class="container">
    <header>
        <h1>Add Item</h1>
    </header>
    <form method="POST" action="<?php $_SERVER['PHP_SELF']?>">
        <input type="text" name="name" placeholder="Item Name" required>
        <textarea name="description" placeholder="Description" required></textarea>
        <button type="submit" name="submit">Add Item</button>
    </form>
</div>
</body>
</html>
