<?php
session_start();

if (($_SESSION['role'])==0) {

    include "config.php";

    header("Location:{$path}/dashboard.php");
}
?>
<?php
if(isset($_POST['submit'])){
    include "config.php";
    $username=mysqli_real_escape_string($conn,$_POST['username']);
    $password=md5($_POST['password']);
    $role=$_POST['role'];


    $sql="select username from users where username='{$username}'";
    $result=mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0){
        echo "User already exists!";
    }
    else{
        $sql1="insert into users (username,password,roles) value ('{$username}','{$password}','{$role}')";
        $result1=mysqli_query($conn,$sql1);

        

        header("Location:{$path}/users.php");
    }


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Add-User</title>
</head>
<body>
<div class="container">
    <header>
        <h1>New-User</h1>
    </header>
    <form method="POST" action="<?php $_SERVER['PHP_SELF']?>">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <select name="role">
            <option disabled selected>Select Role</option>
            <option value="0">Normal User</option>
            <option value="1">Admin</option>
        </select>
        <button type="submit" name="submit">Add</button>
    </form>
</div>
</body>
</html>