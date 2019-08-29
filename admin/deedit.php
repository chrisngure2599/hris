<?php
include_once 'connect.php';
if(!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])){
    header('Location: ../logout.php');
} 
if (isset($_GET['id'])) {
  $hid=$_GET['id'];
  //Escaping the id
  $hid=mysqli_real_escape_string($db,$hid);
  $query=("DELETE From house where id=$hid");
  //running the query
  mysqli_query($db,$query);
  header("location:houses.php");

}else{
header("location:houses.php");
}
 ?>