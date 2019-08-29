
<?php
  include 'connect.php';
  include_once 'check.php';
  include_once 'nav.php';
  //session_start();
  $errors = array(); 

  // connect to the database

  //include_once 'nav.php';
  // REGISTER HOUSE
  if (isset($_POST['add'])) {
      
  // receive all input values from the form
      $target ="../uploads/".$_FILES['image']['name'];
      $image = $_FILES['image']['name'];
  {
   
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
    

    if (count($errors) == 0 && move_uploaded_file($_FILES['image']['tmp_name'],$target)) {
      $user_id=$_SESSION['user_id'];
      $query = "INSERT INTO house (type,house_image,number_of_rooms,location, status, house_description,price_per_time,minimum_time, time_type, user_id) 
            VALUES('$type','$image','$number_of_rooms','$location', 'Available', '$house_description','$price_per_time','$minimum_time','$time_type','$user_id')";
   
          $result = mysqli_query($db, $query);
            IF($result){
                  echo "<script>alert('You have successfully Posted ');</script>";
                  ?>

  <?php
                  header('location:index.php');
          }
   else {
       echo "<script>alert('You have Not successed');</script>";
              echo mysqli_error($db);
   }
          
          
      //$_SESSION['username'] = $username;
      //$_SESSION['success'] = "You are now logged in";
      //header('location: hris.php');
    }
  }

}?>
<div class="w3-container" id="follow-classic-shadow" role="tabpanel" aria-labelledby="follow-tab-classic-shadow">
    <div class="row">
  <div class="col-md-4">
                
  </div>  
         <div class="w3-container">
             <?php include('image.php') ?>
        <form method="post" action=""  enctype="multipart/form-data">
  	<?php include('errors.php'); ?>
            <div class="row"> 
            <div class="col-md-12">
                
            </div>
            <div class="col-md-12 header">
                <h2>Add House</h2>
            </div>
                    
        </div> 
      <div class="input-group">
  	  <label>House Type</label>
  	  <input type="text" name="type" value="">
  	</div>
       <div class="input-group">
  	  <label>Rooms</label>
  	  <input type="text" name="number_of_rooms" value="">
  	</div>
      
      
  	<div class="input-group">
  	  <label>Location</label>
  	  <input type="text" name="location" value="">
  	</div>
  	<div class="input-group">
            <label>House Description</label>
            <textarea class="w3-input" name="house_description" ></textarea>
  	  
  	</div>
  	<div class="input-group">
  	  <label>Price</label>
  	  <input type="number" name="price_per_time">
  	</div>
  	<div class="input-group">
  	  <label>Cost Per Time</label>
  	  <select type="type" name="time_type" class="input-box" value="">
              <option>per Year</option>
              <option>per Month</option>
              <option>per Week</option>
              <option>per day</option>
          </select>
  	</div>
      <div class="input-group">
  	  <label>Minimal Time Rent</label>
          <input type="text" name="minimum_time" value="">
  	</div>
      <div class="input-group">
  	  <label>Choose image</label>
<!--          <input type="file" class="form-control-file" name="image" placeholder=""/>-->
          <input type="file" class="form-control-file" name="image" multiple >
  	</div>
    
  	<div class="input-group">
  	  <button type="submit" class="btn" name="add">Add House</button>
  	</div>
  	
  </form>
             
   
    </div>

         </div></div>