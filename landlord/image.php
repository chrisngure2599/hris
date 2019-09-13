<?php
//session_start();
$errors = array(); 

// connect to the database
include 'connect.php';
include_once 'check.php';



// REGISTER HOUSE
if (isset($_POST['add'])) {
    
// receive all input values from the form
    $target ="uploads/".basename($_FILES['image']['name']);
    $image = $_FILES['image']['name'];
{
 $tiles = mysqli_real_escape_string($db, $_POST['tiles']);       
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
  	$query = "INSERT INTO house (type,house_image,number_of_rooms,location, status, house_description,price_per_time,minimum_time, time_type, user_id,dateuploaded,tiles) 
  			  VALUES('$type','$image','$number_of_rooms','$location', 'Available', '$house_description','$price_per_time','$minimum_time','$time_type','$user_id',NOW(),'$_tiles')";
 
        $result = mysqli_query($db, $query);
          IF($result){
                echo "<script>alert('You have successfully Posted ');</script>";
                ?>
 <meta http-equiv="refresh" content="0; url=LandLord.php"/>
<?php
               // header('location: LandLord.php');
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

}