<?php
//session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

include 'connect.php';

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
  $gender = mysqli_real_escape_string($db, $_POST['gender']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $phone = mysqli_real_escape_string($db, $_POST['phone']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $city= mysqli_real_escape_string($db, $_POST['city']);
  $type = mysqli_real_escape_string($db, $_POST['type']);
  $dob = mysqli_real_escape_string($db, $_POST['dob']);
  $country = mysqli_real_escape_string($db, $_POST['country']);
 //$joining_date = mysqli_real_escape_string($db, $_POST['joining_date']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database
        
        //check user type and insert user data to appropriate database tables
        //if user type is tenants insert dat into users table and clients table
  
                
            $query = "INSERT INTO users (username,firstname,lastname, gender, email,country,city, password,dob, phone, type,joining_date) 
                              VALUES('$username','$firstname','$lastname', '$gender', '$email','$country', '$city','$password','$dob','$phone','$type',NOW())";
           
            if(mysqli_query($db, $query)){
                echo "Success";
            }else{
                echo mysqli_error($db);
            }
//        if user type is landlords insert data into users and owners table
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
              session_start();
          $row = mysqli_fetch_assoc($results);
  	  $_SESSION['username'] = $username;
  	  $_SESSION['user_id'] = $row['id'];
  	  $_SESSION['firstname'] = $row['firstname'];
  	  $_SESSION['lastname'] = $row['lastname'];
  	  $_SESSION['country'] = $row['country'];
          $_SESSION['success'] = "You are now logged in";
  	  if ($row['type']=="Admin") {
                header("location:Admin.php");
            }
            else if($row['type']=="Tenants"){
                header("location:tenants.php");
            }
             else {
                header("location:Landlord.php");
            }
  	}else {
  		array_push($errors, "Wrong username  or Password!");
  	}
  }
}


?>
