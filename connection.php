<?php
echo "<br>";
/* 
Ways to connect to a MySQL Database
1. MySQLi extension
2. PDO
*/
// Connecting to the Database
$servername = "localhost";
$username = "root";
$password = "";
$databasename = "gooddb";

$conn = mysqli_connect($servername, $username, $password,$databasename);

// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}
else{
    echo "Connection successful";
}

?>