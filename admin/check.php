<?php 
//Checks if the user has logged in else takes the person to logout
if(!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])){
    header('Location:../logout.php');
} ?>