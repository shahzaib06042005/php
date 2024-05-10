<?php

include('connection.php');

if (isset($_POST['sbtn'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $filename =$_FILES["imageup"]["name"];
    $tempname =$_FILES["imageup"]["tmp_name"];
    $folder= "./image/" . $filename;

    $query = "insert into alsogood(name, email, image) values('$name','$email','$filename')";
    
    $res = mysqli_query($conn, $query);
    if(move_uploaded_file($tempname, $folder)){

      echo "<h3>Image uploaded succesfull</h3>";

    }
    else{
      echo "<h3> not uploaded . </h3>";
    }
    if ($res != null) {
        echo "Registerd USER";
    } else {
        echo "Error Registering User";
    }

}

$selectquery = "Select * from alsogood";
$result = mysqli_query($conn, $selectquery);

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

  <form method="POST" enctype="multipart/form-data">
  <input type="file" name="imageup" >
  <input type="submit" value="Upload Image" name="submit">

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name : </label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Email</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="email">
  </div>
 
  <button type="submit" class="btn btn-primary" name="sbtn">Submit</button>
</form>



<div class="container mt-5">
        <table id="tab" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">S no</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Image</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                    <th scope="col">View</th>


                </tr>
            </thead>
            <tbody>
                
                
            <?php
                $rows = ''; 
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <th scope="row"><?= $row['id'];?></th>
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo $row['email'];?></td>
                        <td><img src="./image/<?php echo $row['image'];?>" width="100px" height="100px" alt=""></td>
                        <td><a href="edit.php?id=<?= $row['id']?>">Edit</a></td>
                        <td><a href="delete.php?id=<?=$row['id']?>">Delete</a></td>
                        <td><a href="">view</a></td>
                        
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
            </div>
            <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
   <script>
     let table = new DataTable('#tab');
   </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>





















