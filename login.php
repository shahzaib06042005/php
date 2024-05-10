<?php
session_start();
include("connection.php");
if(isset($_POST['mybtnlogin'])){

    $_email=$_POST['myemail'];
    $_pass=$_POST['mypass'];

    $query= "select * from alsogood where email='$_email' and password ='$_pass'";
    $res = mysqli_query($conn,$query);
    $row=mysqli_fetch_array($res);

    if(mysqli_num_rows($res)==1){
        $_SESSION['id']=$row['id'];
        header("Location:profile.php");
        
    }
    
    else{
       
        echo"incorrect username or password";
    }
    

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<form method= 'POST'>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="myemail">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="mypass">
  </div>
  
  <button type="submit" class="btn-login" name="mybtnlogin">login</button>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

