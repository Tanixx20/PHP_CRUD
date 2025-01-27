<?php
session_start();

if(isset($_SESSION['username'])){
    include "config.php";

    header("Location:{$path}/dashboard.php");
}
?>
<?php
if(isset($_POST['submit'])){

    include "config.php";
    $username=mysqli_real_escape_string($conn,$_POST['username']);
    $password=md5($_POST['password']);

    $sql="select username,password,roles from users where username='{$username}' and password='{$password}'";
    $result=mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0){
        // echo "<pre>";
        // print_r($result);
        // echo "</pre>";
        // die();

        while($rows=mysqli_fetch_assoc($result)){
        //     echo "<pre>";
        // echo "ll";
        // echo "</pre>";
        // die();

            session_start();

            $_SESSION['username']=$rows['username'];
            $_SESSION['role']=$rows['roles'];
        //     echo "<pre>";
        // print_r($_SESSION['username']);
        // echo "</pre>";
        // die();
            header("Location:{$path}/dashboard.php");
        }

    }
    else{
        echo "Wrong Username or Password!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
</head>
<body>
<div class="container">
    <header>
        <h1>Login</h1>
    </header>
    <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="submit">Login</button>
        <a href="http://localhost/item/">New User?Register Here</a>
    </form>
</div>
</body>
</html>
