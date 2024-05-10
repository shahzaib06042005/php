<?php
$_id=$_GET['id']; 
echo $_id;
include("connection.php");

$_edit="select * from alsogood where id = '$_id'";

$res =mysqli_query($conn,$_edit);

$row= mysqli_fetch_array($res);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method = "Post">
        <input type="text" name="_email" value="<?= $row['email']?>">
        <input type="submit"  value="Update" name ="edit">
    </form>
</body>
</html>
<?php

if(isset($_POST['edit'])){

    $_email=$_POST['_email'];
    $_update= "update alsogood set email='$_email' where ID = '$_id'";

    $_res=mysqli_query($conn,$_update);


if($_res!=NULL){

    header("Location:index.php");
}
else{
    die("error");
}
}

?>
