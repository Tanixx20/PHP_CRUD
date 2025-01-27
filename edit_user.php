<!--  -->
<?php
if(isset($_POST['submit'])){
    include "config.php";
    $id=$_GET['id'];


    $username=mysqli_real_escape_string($conn,$_POST['username']);
    $role=$_POST['role'];


    $sqlu="update users set username='{$username}',roles='{$role}' where id='{$id}'";
    $resultu=mysqli_query($conn,$sqlu);

    header("Location:{$path}/users.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Edit User</title>
</head>
<body>
<div class="container">
    <header>
        <h1>Edit User</h1>
    </header>

    <?php

    include "config.php";
    $x=$_GET['id'];

    $sql="select * from users where id='{$x}'";
    $result=mysqli_query($conn,$sql);

    while($rows=mysqli_fetch_assoc($result)){
    ?>
    <form method="POST"  action="<?php $_SERVER['PHP_SELF']?>">
        <input type="hidden" name="id" value="<?php echo $rows['id']; ?>" >
        <input type="text" name="username" value="<?php echo $rows['username']; ?>" required>
        <select name="role" value="<?php echo $rows['roles']; ?>">
                            <?php
                              if($rows['roles'] == 1){
                                echo "<option value='0'>Normal User</option>
                                      <option value='1' selected>Admin</option>";
                              }else{
                                echo "<option value='0' selected>Normal User</option>
                                      <option value='1'>Admin</option>";
                              }
                            ?>
                          </select>
        <button type="submit" name="submit">Update User</button>
    </form>
    <?php } ?>
</div>
</body>
</html>
