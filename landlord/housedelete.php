<?php
include 'connect.php';
$id =$_GET['id'];
$query="delete from house where id='$id'";
$result=mysqli_query($db,$query);
if($result){
   header("location:viewhouses.php");
   //echo 'done!';
}
?>