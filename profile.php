<?php
session_start();
include("connection.php");
if($_SESSION['id']!= null){
    $_id=$_SESSION['id'];

$_query="select * from alsogood where id ='$_id'";
$res = mysqli_query($conn,$_query);
$row= mysqli_fetch_array($res);

 
}
else{

    header("Location:login.php"); 
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Welcome <?php echo $row['name'];?> </h1>
    <a href="logout.php">logout</a>
</body>
</html>