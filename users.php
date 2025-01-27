<?php
session_start();

if (($_SESSION['role'])==0) {

    include "config.php";

    header("Location:{$path}/dashboard.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Users</title>
</head>
<body>
<div class="container">
    <header>
        <h1>Users</h1>
    </header>
    <a href="dashboard.php">Dashboard</a>
    <a href="add-users.php">Add New User</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
        <?php

        include "config.php";

        $sql="select * from users order by id desc";
        $result=mysqli_query($conn,$sql);

        if(mysqli_num_rows($result)){

            while($rows=mysqli_fetch_assoc($result)){
                $role = ($rows['roles'] == 1) ? 'Admin' : 'Normal User';
            echo "<tr>
                    <td>{$rows['id']}</td>
                    <td>{$rows['username']}</td>
                    <td>{$role}</td>
                    <td>
                        <a href='edit_user.php?id={$rows['id']}'>Edit</a>
                        <a href='delete_user.php?id={$rows['id']}'>Delete</a>
                    </td>
                  </tr>";
        }
    }
        ?>
    </table>
</div>
</body>
</html>

