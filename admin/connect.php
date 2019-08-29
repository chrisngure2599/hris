<?php
error_reporting(0);
//a PHP script that connects to MySQL database server
$db=mysqli_connect("localhost", "root", "sziff124", "rental_house") or 
    die("cannot connect");
     session_start();
?>