<?php
include("connection.php");
session_start();

if($_SESSION != null){

    session_destroy();
    header("Location:login.php");
}
?>
