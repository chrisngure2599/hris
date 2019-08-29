<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title></title>
    <!--<meta http-equiv="x-ua-compatible" content="ie=edge"> --?>
    <title>Material Design Bootstrap</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    
    <style>
        #sample{
            box-shadow: 2px 2px 2px 2px #fff;
        }
      
        
    </style>
</head>

<body>

    <!--Main Navigation-->
    <header>
          <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark primary-color  scrolling-navbar">
      <div class="container-fluid">

        <!-- Brand -->
        <a class="navbar-brand waves-effect" href="">
          <strong class="white-text">House Rental Information System (HRIS)</strong>
        </a>

        <!-- Collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <!--Navbar links-->
            <ul class="nav navbar-nav nav-flex-icons ml-auto">
                <li class="nav-item">
                    <a class="waves-effect waves-light btn btn-white btn-flat btn-sm" data-toggle="modal" data-target="#modalLRFormDemo" href="register.php">
                          <i class="fas fa-user-plus mr-1 text-warning "></i>  Register
                    </a>
                </li>
                <li>
                    <a class="waves-effect waves-light btn btn-white btn-flat btn-sm"  data-toggle="modal" data-target="#modalLRFormDemo" href.php">
                          <i class="fas fa-sign-in-alt mr-1 blue-text"></i> Login</a>
                </li> 

            </ul>
            <!--/Navbar links-->
        </div>

      </div>
    </nav>
    <!-- Navbar -->
    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main class="mt-5 pt-5">
        <div class="container">

            <!--Section: Jumbotron-->
            <section class="card wow fadeIn" style="background-image: url(./img/image2.jpg);">

                <!-- Content -->
                <div class="card-body text-white text-center py-5 px-5 my-5">

                    <h1 class="mb-4">
                        <strong>House Rental Information System</strong>
                    </h1>
                    

                </div>
                <!-- Content -->
            </section>
            <!--Section: Jumbotron-->

            <hr class="my-5">

            <!--Section: Cards-->
            <section class="text-center">

                <!--Grid row-->
                <div class="row mb-4 wow fadeIn">
                    <?php 
                    include_once 'connect.php';
                    $query = "SELECT * FROM house";
                    $result = mysqli_query($db, $query);
                    while($row = mysqli_fetch_assoc($result)){
                        extract($row);
                    ?>
                    <!--Grid column-->
                    <div class="col-lg-4 col-md-12 mb-4">

                        <!--Card-->
                        <div class="card">

                            <!--Card image-->
                            <div class="view overlay">
                                <img src="uploads/<?php echo $house_image; ?>" class="card-img-top" alt="">
                                <a href="houseDetails.php?id=<?php echo $id; ?>" target="_blank">
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>

                            <!--Card content-->
                             <div class="card-body">
                                <!--Title-->
                                <h4 class="card-title"><?php echo $type; ?></h4>
                                <!--Text-->
                                <p class="card-text"><?php echo $house_description; ?></p>
                                <a href="houseDetails.php?id=<?php echo $id; ?>" target="_blank" class="btn btn-primary btn-md">View details
                                    
                                </a>
                            </div>

                        </div>
                        <!--/.Card-->

                    </div>
                    <!--Grid column-->
		    <?php } ?>
                </div>

            </section>
            <!--Section: Cards-->

        </div>
    </main>
    <!--Main layout-->

    <!-- About Us -->
    
    <div class="row">
        
        <div class="col-md-1">
            
        </div>
        <div class="col-md-10">

            <ul class="nav nav-tabs nav-justified md-tabs indigo" id="myTabJust" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab-just" data-toggle="tab" href="#home-just" role="tab" aria-controls="home-just"
      aria-selected="true">Contact</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab-just" data-toggle="tab" href="#profile-just" role="tab" aria-controls="profile-just"
      aria-selected="false">About Us</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab-just" data-toggle="tab" href="#contact-just" role="tab" aria-controls="contact-just"
      aria-selected="false">Gallery</a>
  </li>
</ul>
<div class="tab-content card pt-5" id="myTabContentJust">
  <div class="tab-pane fade show active" id="home-just" role="tabpanel" aria-labelledby="home-tab-just">
      <p class="mx-5">For more details contacts us  
          </p> <p class="mx-5">Call: 0788 74 94 37 or 0655 268 205 .</p> <p class="mx-5"> Email: chuwamary95@gmail.com.</p>
  </div>
  <div class="tab-pane fade" id="profile-just" role="tabpanel" aria-labelledby="profile-tab-just">
    <p class="mx-5">House Rental Information System is here to Simplify process of house renting Since you  need to have just internet 
        to access for available room from anywhere then this simplify the process of house renting especially for the guests. 
   As information is implemented to simplify the work.</p>
  </div>
  <div class="tab-pane fade" id="contact-just" role="tabpanel" aria-labelledby="contact-tab-just">
      
      
      
      
      
      
      
      <!--Carousel Wrapper-->
<div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
    <!--Indicators-->
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-2" data-slide-to="1"></li>
        <li data-target="#carousel-example-2" data-slide-to="2"></li>
    </ol>
    <!--/.Indicators-->
    <!--Slides-->
    <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
            <div class="view hm-black-light">
                <img src="https://mdbootstrap.com/img/Photos/Slides/img%20(22).jpg" alt="First slide">
            </div>
            <div class="carousel-caption">
                <h3 class="h3-responsive">Light mask</h3>
                <p>First text</p>
            </div>
        </div>
        <div class="carousel-item">
            <!--Mask color-->
            <div class="view hm-black-strong">
                <img src="https://mdbootstrap.com/img/Photos/Slides/img%20(23).jpg" alt="Second slide">
            </div>
            <div class="carousel-caption">
                <h3 class="h3-responsive">Strong mask</h3>
                <p>Secondary text</p>
            </div>
        </div>
        <div class="carousel-item">
            <!--Mask color-->
            <div class="view hm-black-slight">
                <img src="https://mdbootstrap.com/img/Photos/Slides/img%20(24).jpg" alt="Third slide">
            </div>
            <div class="carousel-caption">
                <h3 class="h3-responsive">Slight mask</h3>
                <p>Third text</p>
            </div>
        </div>
    </div>
    <!--/.Slides-->
    <!--Controls-->
    <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    <!--/.Controls-->
</div>
<!--/.Carousel Wrapper-->
      
 
  </div>
</div>
            
        </div>
        
        <div class="col-md-1">
            
        </div>
    </div>
    <!-- -->
    
    <!--Footer-->

<?php include_once 'includes/footer.php'; ?>
 
  <!--Modal: Login / Register Form Demo-->
  <div class="modal fade" id="modalLRFormDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal" role="document">
      <!--Content-->
      <div class="modal-content">

        <!--Modal cascading tabs-->
        <div class="modal-c-tabs">

          <!-- Nav tabs -->
          <ul class="nav nav-tabs md-tabs tabs-2 light-blue darken-3" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#panel17" role="tab">
                <i class="fas fa-user mr-1"></i> Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#panel18" role="tab">
                <i class="fas fa-user-plus mr-1"></i> Register</a>
            </li>
          </ul>

          <!-- Tab panels -->
          <div class="tab-content">
            <!--Panel 17-->
            <div class="tab-pane" id="panel17" role="tabpanel">

              <!--Body-->
              <div class="modal-body mb-1">
                  <form method="post" action="login.php">
                 <?php include('server.php') ?>
                <?php include('errors.php'); ?>
                <?php include('connect.php'); ?>
              
                <div class="md-form form-sm">
                  <i class="fas fa-envelope prefix"></i>
                  <input type="text" id="form2" class="form-control form-control-sm" name="username">
                  <label for="form2">User Name</label>
                </div>

                <div class="md-form form-sm">
                  <i class="fas fa-lock prefix"></i>
                  <input type="password" id="form3" class="form-control form-control-sm" name="password">
                  <label for="form3">Your password</label>
                </div>
                <div class="text-center mt-4">
                  <button class="btn btn-info" name="login_user">Log in
                    <i class="fas fa-sign-in ml-1"></i>
                  </button>
                </div>
              </form> 
              </div>
              <!--Footer-->
              <div class="modal-footer">
<!--                <div class="options text-center text-md-right mt-1">
                  <p>Not a member?
                    <a href="#" class="blue-text">Sign Up</a>
                  </p>
                  <p>Forgot
                    <a href="#" class="blue-text">Password?</a>
                  </p>
                </div>-->
                <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
              </div>

            </div>
            <!--/.Panel 7-->

            <!--Panel 18-->
            <div class="tab-pane fade in show active" id="panel18" role="tabpanel">

              <!--Body-->
              <div class="modal-body">
                  <form method="post" action="">
  	           <?php include('errors.php'); ?>
                  <div class="md-form form-sm">
                  <i class="fas fa-envelope prefix"></i>
                  <input type="text" id="form14" class="form-control form-control-sm" name="firstname">
                  <label for="form14">First Name</label>
                </div>
                  <div class="md-form form-sm">
                  <i class="fas fa-envelope prefix"></i>
                  <input type="text" id="form14" class="form-control form-control-sm" name="lastname">
                  <label for="form14">Last Name</label>
                </div>
                  <div class="md-form form-sm">
                  <i class="fas fa-envelope prefix"></i>
                  <input type="text" id="form14" class="form-control form-control-sm" name="username" value="<?php echo $username; ?>">
                  <label for="form14">User Name</label>
                </div>
                <div class="md-form form-sm">
                  <i class="fas fa-envelope prefix"></i>
                  <input type="text" id="form14" class="form-control form-control-sm" name="email" value="<?php echo $email; ?>">
                  <label for="form14">Your Email</label>
                </div>

                <div class="md-form form-sm">
                  <i class="fas fa-lock prefix"></i>
                  <input type="password" id="form5" class="form-control form-control-sm" name="password_1">
                  <label for="form5">Your password</label>
                </div>

                <div class="md-form form-sm">
                  <i class="fas fa-lock prefix"></i>
                  <input type="password" id="form6" class="form-control form-control-sm" name="password_2">
                  <label for="form6">Repeat password</label>
                </div>
                      <div class="md-form form-sm">
                  <i class="fas fa-lock prefix"></i>
                  <label for="form6">Type</label>
                  <select type="type" id="form6" class="form-control form-control-sm" name="type">
                  
                  <option>Tenants</option>
              <option>Landlord</option>
                  </select>
                </div>

                <div class="text-center form-sm mt-4">
                  <button class="btn btn-info" name="reg_user">Sign up
                    <i class="fas fa-sign-in ml-1"></i>
                  </button>
                </div>

              </div>
              <!--Footer-->
              <div class="modal-footer">
<!--                <div class="options text-right">
                  <p class="pt-1">Already have an account?
                    <a href="#panel17" class="blue-text">Log In</a>
                  </p>-->
                </div>
                <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
              </div>
            </div>
            <!--/.Panel 8-->
          </div>

        </div>
      </div>
      <!--/.Content-->
    </div>
  </div>
  <!--Modal: Login / Register Form Demo-->
  <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Initializations -->
    <script type="text/javascript">
        // Animations initialization
        new WOW().init();
    </script>
</body>

</html>
