 <?php
include 'connect.php';
$id =$_GET['id'];
$query="delete from users where id='$id'";
$result=mysqli_query($db,$query);
if(result){
    header("location:Admin.php");
}
?>