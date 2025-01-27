
<?php
if(isset($_POST['submit'])){
    include "config.php";
    $id=$_GET['id'];


    $name=mysqli_real_escape_string($conn,$_POST['name']);
    $desc=mysqli_real_escape_string($conn,$_POST['description']);


    $sqlu="update items set name='{$name}',description='{$desc}' where id='{$id}'";
    $resultu=mysqli_query($conn,$sqlu);

    header("Location:{$path}/dashboard.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Edit Item</title>
</head>
<body>
<div class="container">
    <header>
        <h1>Edit Item</h1>
    </header>

    <?php

    include "config.php";
    $x=$_GET['id'];

    $sql="select * from items where id='{$x}'";
    $result=mysqli_query($conn,$sql);

    while($rows=mysqli_fetch_assoc($result)){
    ?>
    <form method="POST"  action="<?php $_SERVER['PHP_SELF']?>">
        <input type="hidden" name="id" value="<?php echo $rows['id']; ?>" >
        <input type="text" name="name" value="<?php echo $rows['name']; ?>" required>
        <textarea name="description" required><?php echo $rows['description']; ?></textarea>
        <button type="submit" name="submit">Update Item</button>
    </form>
    <?php } ?>
</div>
</body>
</html>
