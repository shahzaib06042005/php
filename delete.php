<?php
$_id=$_GET['id'];
include ('connection.php');

$query = "delete from alsogood where id = '$_id'";
$res = mysqli_query($conn,$query);

header("Location:index.php");

?>