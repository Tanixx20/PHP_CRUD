<?php
session_start();

if (!isset($_SESSION['username'])) {

    include "config.php";

    header("Location:{$path}/login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Dashboard</title>
</head>
<body>
<div class="container">
    <header>
        <h1>Dashboard</h1>
    </header>
    <a href="logout.php">Logout</a>
    <a href="add_item.php">Add Item</a>
    <?php 
    if($_SESSION['role']==1)
    {
    echo "<a href='users.php'>Users</a>";
    }
    ?>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        <?php

        include "config.php";

        $sql="select * from items";
        $result=mysqli_query($conn,$sql);

        if(mysqli_num_rows($result)){

            while($rows=mysqli_fetch_assoc($result)){
            echo "<tr>
                    <td>{$rows['id']}</td>
                    <td>{$rows['name']}</td>
                    <td>{$rows['description']}</td>
                    <td>
                        <a href='edit_item.php?id={$rows['id']}'>Edit</a>
                        <a href='delete_item.php?id={$rows['id']}'>Delete</a>
                    </td>
                  </tr>";
        }
    }
        ?>
    </table>
</div>
</body>
</html>

