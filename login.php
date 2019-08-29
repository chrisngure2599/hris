<!DOCTYPE html>
<html>     
<?php 
ob_start();
include 'includes/head.php'; 
include 'connect.php';
 
$errors = array();//Empty error array!
//checking if login is clicked
if (isset($_POST['login'])) {
    //    
    echo 'string';
    $username = mysqli_real_escape_string($db, $_POST['username']);//#username
    $password = mysqli_real_escape_string($db, $_POST['password']);//#pasword
  //making sure that the username is there
  if (empty($username)) {

    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }
  //then if empty errors then the login proces starts!
  if (empty($errors)) {
        $query = "SELECT * FROM users WHERE username='$username' ";
        $results = mysqli_query($db, $query);
        $ans=mysqli_num_rows($results);
        if ($ans==1) {
        //fetching the data!
        $data=mysqli_fetch_assoc($results);
        //if the user is present then its time to verify da password
        if (password_verify($password, $data['password'])) {
            //Correct password
            //#checking the roles/type
          if ($data['type']=='Admin') {
            echo 'string';
                //setting the session and redirecting
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $data['id'];
            $_SESSION['firstname'] = $data['firstname'];
            $_SESSION['lastname'] = $data['lastname'];
            $_SESSION['country'] = $data['country'];
            $_SESSION['role'] = $data['type'];
           header("location:admin/index.php");
            }elseif ('Tenants'==$data['type']) {
              session_start();
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $data['id'];
            $_SESSION['firstname'] = $data['firstname'];
            $_SESSION['lastname'] = $data['lastname'];
            $_SESSION['country'] = $data['country'];
            $_SESSION['role'] = $data['type'];
            header("location:tenants.php");
            }elseif ("Landlord"==$data['type']) {
              session_start();
                 $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $data['id'];
            $_SESSION['firstname'] = $data['firstname'];
            $_SESSION['lastname'] = $data['lastname'];
            $_SESSION['country'] = $data['country'];
            $_SESSION['role'] = $data['type'];
            header("location:landlord/index.php");
            }
        }else{
            //password is wlong!
          echo 'Wrong password';
            
        }
        }elseif ($ans==0) {
            //if the user is absent
          echo 'Error account not found!';
        }




  /*End of empty errors*/}


/*End of is isset login!*/}

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
<?php 
if (!empty($errors)) {
  echo 'string';
}
 ?>
<section class="login_box_area section_gap bg-white" style="padding-bottom:30px;">
            <div class="container">
                    <div class="row">
                            <div class="col-lg-6">
                                <div class="login_box_img bg-info" style="height: 100%;z-index: 100">
                                    <div class="hover">
                                            <h4>Do you have account?</h4>
                                            <p>If you don't have an account please  press the button below to create new account</p>
                                            <a class="primary-btn" href="register.php">Create account</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                    <div class="login_form_inner">
                                            <h3>Login Authentification</h3>
                                            <form class="row login_form"  method="post" action="" id="contactForm" >
                                                    <div class="col-md-12 form-group">
                                                        <input type="text" required="required" class="form-control"  name="username" placeholder="Username" onfocus="this.placeholder = ''" >
                                                    </div>
                                                    <div class="col-md-12 form-group">
                                                        <input type="password" required="required" class="form-control"  name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
                                                    </div>
                                                    <div class="col-md-12 form-group">
                                                        <input type="submit" value="Login" name="login" class="btn btn-success btn-sm btn-block">
                                                            <a href="#"> Don't remember passsword?</a>
                                                    </div>
                                                    <div class="col-md-12 form-group">
                                                        <?php
                                                            if(!empty($erros)){
                                                                foreach ($erros as $error){ ?>
                                                                    <p class="text-danger"><?php echo $error ?></p>
                                                              <?php  }
                                                            };
                                                        ?>
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

</html>
