<?php
include 'connect.php';
$id = $_GET ['id'];
$query="select * from users where id ='$id'";
$result=mysqli_query($db,$query);
$row=  mysqli_fetch_array($result);
?>
 <?php 
   include 'connect.php';
$results = mysqli_query($db, "SELECT * FROM users"); ?>
<!DOCTYPE html>
<html lang="en" class="full-height">

<?php include('server.php') ?>
     <?php include_once 'includes/head.php'; ?>
    <body class="">

        <div class="container-fluid">  
        <div class="row"> 
            <div class="col-md-4">
                
            </div>
            <div class="col-md-4 header">
                <h2>Edit</h2>
            </div>
            <div class="col-md-4">
                
            </div>
        
        </div> 
             <div class="row">
  <div class="col-md-4">
                
  </div>  
            
       
    
    <div class="col-md-4">

  <form method="post" action="">
  	<?php include('errors.php'); ?>
      <div class="input-group">
  	  <label>First Name</label>
  	  <input type="text" name="firstname" value="<?php echo $row['firstname']; ?>">
  	</div>
       <div class="input-group">
  	  <label>Last Name</label>
  	  <input type="text" name="lastname" value="<?php echo $row['lastname']; ?>">
  	</div><div class="input-group">
            <div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="<?php echo $row['username']; ?>">
  	</div><label>Gender</label>
            <select name="gender" class="input-box">
              <option>Male</option>
              <option>Female</option>
          </select>
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $row['email']; ?>">
  	</div><div class="input-group">
  	  <label>City</label>
  	  <input type="text" name="city" value="<?php echo $row['city']; ?>">
           <label>Country</label>
  	  <input type="text" name="country" value="<?php echo $row['country']; ?>">
  	</div><div class="input-group">
  	  
  	</div><div class="input-group">
            <select name="type" class="input-box">
              <option><?php echo $row['type']; ?></option>
              
          </select></div><div class="input-group">
  	  <label>Date Of birth</label>
  	  <input type="date" name="dob" value="<?php echo $row['dob']; ?>">
  	</div>
      
      <div class="input-group">
  	  <button type="submit" class="btn" name="submit">Edit</button>
  	</div>
    </body>
</html>
<?php
 
if (isset($_POST['submit'])) {
    include 'connect.php';
	
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
        $username = $_POST['username'];
        $email =  $_POST['email'];
        $city=  $_POST['city'];
        $type =  $_POST['type'];
        $dob = $_POST['dob'];
        $country =  $_POST['country'];
        $gender=$_POST['gender']; 
        $query = "UPDATE users  SET  firstname='$firstname',lastname='$lastname',username='$username',email='$email'"
                . ",city='$city',type='$type',dob='$dob',country='$country',gender='$gender' where id='$id'";  
         $result=mysqli_query($db, $query);

	$_SESSION['message'] = "Address updated!"; 
	header('location: Admin.php');
}
?>

