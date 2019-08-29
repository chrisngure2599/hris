<?php 
ob_start();
   include 'connect.php';
   include 'includes/head.php'; 
   ?>


   

   <body>
  <header>

    <nav class="navbar navbar-expand-lg navbar-light fixed-top default-nav bg-white" style="height:65px;height: auto;color: black;z-index: 1000;">
       <div class="container">
       <a class="navbar-brand js-scroll-trigger" href="index.php"><img src="img/icon.jpg" alt="logo" style='height:55px;width: 70px'> House Rental Information System</a>
       <!-- Brand -->

      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto my-2 my-lg-0">
          <li class="nav-item">
             <a href="login.php" class="waves-effect waves-light btn btn-white btn-flat btn-sm" style="color:orangered" >
              <i class="fas fa-sign-in-alt mr-1 blue-text"></i> Login / Register</a>

          </li>
         <li class="nav-item">
            <a class="nav-link  " href="register.php">Bookings</a>
          </li>
          <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="login.php">View</a>
          </li>
            
      </div>
    </div>
  </nav>
</header>

     <section class="login_box_area section_gap" >
            <div class="container mb-5">
                    <div class="row justify-content-center">
                            <div class="col-lg-7 ">
                                <div class="border bg-white">
                                    <form class=""  method="post" action="register.php" autocomplete="off"   >
                                        <div class="card-header font-weight-bold">Create account</div>
                                            <div class="card-body">
                                                
               <!--                                  <input type="text" id="defaultContactFormName" class="form-control mb-4" placeholder=" required="required">
    <input type="text" id="defaultContactFormName" class="form-control mb-4" placeholder="Last Name" name="lastname">
    <input type="text" id="defaultContactFormName" class="form-control mb-4" placeholder="User Name" name="username" value="<?php echo $username; ?>"> -->
            <div class="md-form col-md-12" style="margin-top:0">
                 <label class="label">First name </label><br> 
                <input type="text"  class="form-control"required="" autofocus="" placeholder="First Name" name="firstname" ><br>
            </div>
            <div class="md-form col-md-12" style="margin-top:0">
                   <label class="label">Last name </label><br> 
                  <input type="text"  class="form-control"   required name="lname" style="margin-top:12px" placeholder="Last name"><br>
            </div>
             <div class="md-form col-md-12" style="margin-top:0">
                   <label class="label">Username </label><br> 
                  <input type="text"  class="form-control"  required name="username" style="margin-top:12px"  placeholder="username" ><br>
            </div>
            <div class="md-form col-md-12" style="margin-top:0">
                   <label class="label">Date of birth (YY/MM/DD) </label><br> 
                  <input type="date"  class="form-control" id="date_birth" required name="date_birth"  onfocus="this.placeholder = ''" ><br>
            </div>
            <div class="md-form col-md-12" style="margin-top:0">
                 <label style="margin-bottom:30px;float: left;margin-left: 13px">Gender</label><br>
                  <select name="gender" required=""class=" form-control" style="display:block !important;border:none;border-bottom: 1px solid silver;font-size: 13px;cursor: pointer">
                    <option value="" >Select your sex</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                  </select><br>
            </div>
            <div class="md-form col-md-12" style="margin-top:0">
                   <label class="label">Phone number </label><br> 
                  <input type="number"  class="form-control" id="phone_number" required name="phone_number"  placeholder="Mobile number" onfocus="this.placeholder = ''" ><br>
            </div>
            <div class="md-form col-md-12" style="margin-top:0">
                   <label class="label">Email address</label><br> 
                  <input type="email"  class="form-control" name="email" style="margin-top:12px"  onfocus="this.placeholder = ''" placeholder="Email" ><br>
            </div>
             <div class="md-form col-md-12" style="margin-top:0">
                 <label style="margin-bottom:30px;float: left;margin-left: 13px">Gender</label><br><br> 
                  <select name="country" required=""class=" form-control" style="display:block !important;border:none;border-bottom: 1px solid silver;font-size: 13px;cursor: pointer">
                    <option value="" >Country</option>
                    <option value="Tanznia">Tanzania</option>
                    <option value="Kenya" disabled="on">Kenya</option>
                     <option value="Uganda" disabled="on">Uganda</option>
                      <option value="Burundi" disabled="on">Burundi</option>
                       <option value="Congo" disabled="on">Congo</option>
                  </select><br>
            </div>
            <div class="md-form col-md-12" style="margin-top:0">
                 <select name="city" required=""class=" form-control" style="display:block !important;border:none;border-bottom: 1px solid silver;font-size: 13px;cursor: pointer">
                    <option value="" >City</option>
                    <option value="arusha">Arusha</option>
                    <option value="mwanza">Mwanza</option>
                    <option value="kilimanjaro">Kilimanjaro</option>
                    <option value="Dare es salam">Dare es salam</option>
                    <option value="morogoro">Morogoro</option>
                    <option value="mtwara">Mtwara</option>
                    <option value="Dodoma">Dodoma</option>
                    <option value="singida">Singida</option>
                    <option value="geita">Gita</option>
                    <option value="tabora">Tabora</option>
                  </select><br>
            </div>
             

          
           
            <div class="md-form col-md-12" style="margin-top:0">
                  
                  <input type="file"  placeholder="upload profile picture" class="form-control" name="profile" onfocus="this.placeholder = ''" >
            </div>
            <div class="md-form col-md-12" style="margin-top:0">
                   <label style="margin-bottom:30px;float: left;margin-left: 13px">Password </label><br> 
                  <input type="password"  class="form-control" name="password" required id="password"  required placeholder="Password"  onfocus="this.placeholder = ''" >
            </div>
            <div class="md-form col-md-12" style="margin-top:0">
                   <label style="margin-bottom:30px;float: left;margin-left: 13px">Repeat password </label><br> 
                  <input type="password"  class="form-control" name="password_conf" required id="password" placeholder="Repeat Password" onfocus="this.placeholder = ''" >
            </div>
            
      <div class="">
          <input type="reset" value="Reset" name="login" class="btn btn-sm btn-danger ">
          <input type="submit" value="Create account" id="login" name="register" class="btn btn-sm btn-info    ">
      </div>
           <div class="">
                <?php
                    if(!empty($erros)){
                        foreach ($erros as $error){ ?>
               <script> alert('<?php echo $error ?>'); </script>
                      <?php  }
                    }
                ?>
        </div>
  </div>


                                        <div class=" card-footer  w-100" style="color: orangered">
                                           Your username can be your email address,your names or phone number.  
                                        </div>
                                          <div class="modal-footer justify-content-center">
            <a class="waves-effect waves-light btn btn-white btn-flat btn-sm" data-toggle="modal" data-target="#sideModalTRSuccessDemo1" style="color:black;" >
                <i class="fas fa-user-plus mr-1 blue-text"> </i>  View your detail</a>
          <a class="waves-effect waves-light btn btn-white btn-flat btn-sm"  data-toggle="modal" data-target="#sideModalTRSuccessDemo" href="#">
                          <i class="fas fas fa-times mr-1 blue-text"></i>no thanks</a>
        </div>
                                  </form>
                                </div>
                            </div>
                    </div>
            </div>
    </section>
    <!--================End Login Box Area =================-->
  <?php include_once 'includes/scripts.php'; ?>
    <?php include_once 'includes/footer.php'; ?>
  <!-- Bootstrap core JavaScript -->
</body>
<?php 
  //Registreing a new user!
  if (isset($_POST['register'])) {
    echo "<pre>";
    //Capturing and securing the variables
    $error=array();
    $firstname=mysqli_real_escape_string($db,$_POST['firstname']);
    $username=mysqli_real_escape_string($db,$_POST['username']);
    $lname=mysqli_real_escape_string($db,$_POST['lname']);
    $date_birth=mysqli_real_escape_string($db,$_POST['date_birth']);
    $gender=mysqli_real_escape_string($db,$_POST['gender']);
    $phone_number=mysqli_real_escape_string($db,$_POST['phone_number']);
    $email=mysqli_real_escape_string($db,$_POST['email']);
    $country=mysqli_real_escape_string($db,$_POST['country']);
    $city=mysqli_real_escape_string($db,$_POST['city']);
   // $type=mysqli_real_escape_string($db,$_POST['type']);
    $profile=mysqli_real_escape_string($db,$_POST['profile']);
    $password=mysqli_real_escape_string($db,$_POST['password']);
    $password_conf=mysqli_real_escape_string($db,$_POST['password_conf']);
    //Checking if there is any of them that is empty
    if (
      empty($firstname) or
      empty($username) or
      empty($lname) or
      empty($date_birth) or
      empty($gender) or
      empty($phone_number) or
      empty($email) or
      empty($country) or
      empty($city) or
      empty($profile) or
      empty($password) or
      empty($password_conf)
    ) {
      array_push($error,"Error you have to fill all fields");
    }
    //Checking if the ussername has been taken
    $query1=("SELECT * FROM `users` WHERE `username`='$username'");
    //Running the Query
    $res=mysqli_query($db,$query1);
    //the number usernames
    $ans=mysqli_num_rows($res);
    if ($ans>0) {
      array_push($error,"Sorry the username is already taken!");
    }else {
      //Checking if the passwords are the same
      if ($password_conf==$password) {
        //if the passwords do match!
        //Hashing the padsword
        $hps=password_hash($password,PASSWORD_DEFAULT);
        $query2=("INSERT INTO `users`
          (`username`, `firstname`, `lastname`, `email`, `password`, `gender`, `dob`, `country`, `city`, `type`, `phone`) VALUES 
          ('$username','$firstname','$lname','$email','$hps','$gender','$date_birth','$country','$city','Tenants','$phone_number')");

        mysqli_query($db,$query2); 
        //Running the query
     $query3=" SELECT `id` FROM `users` WHERe username='$username'";
        $res5=mysqli_query($db,$query3);  
        //Fetching the new user`s id
        $id=mysqli_fetch_assoc($res5);
          $row = mysqli_fetch_assoc($results);
          echo mysqli_error($db);
      session_start();
      $_SESSION['username'] = $username;
      $_SESSION['user_id'] = $id['id'];
      $_SESSION['firstname'] = $firstname;
      $_SESSION['lastname'] = $lastname;
      $_SESSION['country'] = $country;
        //After inserting the user then its time to fetch the user,s id

      header("location:Tenants.php");

      }elseif ($password!=$password_conf) {
        array_push($error, "The passwords must match!");
      }
      if (!empty($error)) {
        //looping through the errors
        foreach ($errors as $era) {
                  echo 'era';
                }        
      }
    }
  }
 ?>


</html>

