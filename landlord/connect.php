<?php
//a PHP script that connects to MySQL database server
$db=mysqli_connect("localhost", "root", "sziff124", "hris") or 
    die("cannot connect");
    @session_start();
?>