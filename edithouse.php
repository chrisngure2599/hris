<?php
include 'connect.php';
$id = $_GET ['id'];
$query="select * from house where id ='$id'";
$result=mysqli_query($db,$query);
$row=  mysqli_fetch_array($result);
?>
 <?php 
   include 'connect.php';
$results = mysqli_query($db, "SELECT * FROM house"); ?>
<!DOCTYPE html>
<html lang="en" class="full-height">

<?php include('image.php') ?>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
   
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="css/mdb.min.css" rel="stylesheet">
        <!-- Your custom styles (optional) -->
        <link href="css/style.css" rel="stylesheet">
    </head>
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

   <form method="post" action=""  enctype="multipart/form-data">
  	<?php include('errors.php'); ?>
      <div class="input-group">
  	  <label>House Type</label>
  	  <input type="text" name="type" value="<?php echo $row['type']; ?>">
  	</div>
       <div class="input-group">
  	  <label>Rooms</label>
  	  <input type="text" name="number_of_rooms" value="<?php echo $row['number_of_rooms']; ?>">
  	</div>
      
      
  	<div class="input-group">
  	  <label>Location</label>
  	  <input type="text" name="location" value="<?php echo $row['location']; ?>">
  	</div>
      <div class="input-group">
  	  <label>house_description</label>
          <input type="text" name="house_description" value="<?php echo $row['house_description']; ?>">
  	</div>
      <div class="input-group">
  	  <label>Location</label>
  	  <input type="text" name="location" value="<?php echo $row['location']; ?>">
  	</div>

      <div class="input-group">
  	  <label>Price</label>
  	  <input type="text" name="price_per_time" value="<?php echo $row['price_per_time']; ?>">
  	</div>
      <div class="input-group">
  	   <label>Cost Per Time</label>
  	  <select type="type" name="time_type" class="input-box" value="<?php echo $row['time_type']; ?>">
              <option>per Year</option>
              <option>per Month</option>
              <option>per Week</option>
              <option>per day</option>
          </select>
  	</div>
       <div class="input-group">
  	  <label>Minimal Time Rent</label>
          <input type="text" name="minimum_time" value="<?php echo $row['minimum_time']; ?>">
  	</div>
      <div class="input-group">
  	  <label>Choose image</label>
          <input type="file" class="form-control-file" name="image" value="<?php echo $row['house_image']; ?>"/>
  	</div>
      
      <div class="input-group">
  	  <button type="submit" class="btn" name="submit">Edit</button>
  	</div>
   </form>
    </body>
</html>
<?php
 
if (isset($_POST['submit'])) {
    include 'connect.php';
	
  // receive all input values from the form
    $target ="uploads/".basename($_FILES['image']['name']);
    $image = $_FILES['image']['name'];

  
  $type = mysqli_real_escape_string($db, $_POST['type']);
  $number_of_rooms = mysqli_real_escape_string($db, $_POST['number_of_rooms']);
  $location = mysqli_real_escape_string($db, $_POST['location']);
  $house_description = mysqli_real_escape_string($db, $_POST['house_description']);
  $price_per_time = mysqli_real_escape_string($db, $_POST['price_per_time']);
  $minimum_time = mysqli_real_escape_string($db, $_POST['minimum_time']);
 $time_type= mysqli_real_escape_string($db, $_POST['time_type']);
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($type)) { array_push($errors, "house type is required"); }
  if (empty($number_of_rooms)) { array_push($errors, "Room number is required"); }
  if (empty($house_description)) { array_push($errors, "Description is required"); }
  if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){

        $query = "UPDATE house  SET  type='$type',number_of_rooms='$number_of_rooms',location='$location',house_description='$house_description',price_per_time='$price_per_time "
                . "',minimum_time ='$minimum_time ',time_type='$time_type', house_image='$image' where id='$id'";  
         $result=mysqli_query($db, $query);

	$_SESSION['message'] = " updated!"; 
        
	header('location: Landlord.php');
  }
}
?>

