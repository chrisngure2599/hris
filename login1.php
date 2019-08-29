<!DOCTYPE html>
<html lang="en">
<?php include_once 'includes/head.php';?>
<body>
<!--Main Navigation-->
    <header>
          <!-- Navbar -->
          <nav class="navbar fixed-top navbar-expand-lg navbar-dark  scrolling-navbar teal darken-3" >
              
      <div class="container-fluid">
<!-- Brand -->
<img src="img/icon.jpg" height="20%" width="5%" style=" border-radius: 60px;">
         <strong class="white-text" style="font-family:cursive;">House Rental Information System</strong>
          <!-- Collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <!--Navbar links-->
            <ul class="nav navbar-nav nav-flex-icons ml-auto">
                
                <li>
                    <a class="waves-effect waves-light btn btn-white btn-flat btn-sm"  data-toggle="modal" data-target="#sideModalTRSuccessDemo" href="#">
                          <i class="fas fa-sign-in-alt mr-1 blue-text"></i> Login / Register</a>
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

         <div class="col-lg-4  col-md-4 col-sm-4" class="spinner-border text-info" role="status" data-scroll-reveal="enter from the bottom after 0.5s">
             <form name="form"  action="" method="post" class="form-inline" class="search_box" style="float: left;" autocomplete="OFF">
            <div class="md-form my-0">
                  <input class="form-control mr-sm-2" name="searched_product" type="search" placeholder="Search house here ...!" aria-label="Search" required="required" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search here...!';}">
                  &nbsp;&nbsp;&nbsp; <input type="submit" name="search" class="btn btn-white waves-effect" value="SEARCH"></br> 
            </div>
           </form> 
        </div>
            <p class=""></br> </br> </br> <b>Available houses</b></p>
            <hr class="my-5">
            <!--Section: Cards-->
            <section class="text-center"> 

                <!--Grid row-->
                <div class="row mb-4 wow fadeIn">
                   
                      <?php 
                    include_once 'connect.php';
                    $query = "SELECT * FROM house WHERE status = 'Available' ";
                    
                    if(isset($_POST['search'])){
                        $searched = $_POST['searched_product'];
                        $query .= " AND (type LIKE '%$searched%' OR house_image LIKE '%$searched%' OR number_of_rooms LIKE '%$searched%' OR location LIKE '%$searched%' OR status LIKE '%$searched%' OR "
                        . " house_description LIKE '%$searched%' OR price_per_time LIKE '%$searched%' OR minimum_time LIKE '%$searched%' OR time_type LIKE '%$searched%' OR dateuploaded "
                        . " LIKE '%$searched%' OR dateupdated LIKE '%$searched%') ";
                    }
                    
                    $result = mysqli_query($db, $query);
                    if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        extract($row);
                    ?>
                     <!--Grid column-->
                    <div class="col-lg-4 col-md-12 mb-4">

                        <!--Card-->
                        <div class="card">

                            <!--Card image-->
                            <div class="view overlay">
                                <img src="uploads/<?php echo $house_image; ?>" class="card-img-top" alt="" style="height: 200px">
                               <a href="houseDetails1.php?id=<?php echo $id; ?>">
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>

                            <!--Card content-->
                             <div class="card-body">
                                <!--Title-->
                                <h4 class="card-title"><?php echo $type; ?></h4>
                                <!--Text-->
                                 <p class="card-text"><?php echo $house_description; ?></p>
                                <a href="houseDetails1.php?id=<?php echo $id; ?>"class="btn btn-gray9 btn-md">View details
                                    
                                </a>
                            </div>

                        </div>
                        <!--/.Card-->

                    </div>
                    
                        <?php } 
                    }else{
                    ?>
                    <div class="text-danger" role="alert" style="font-family:red-serifs"><i>No house available!</i></div>
                    <?php
                    }
                        ?> 
                </div>
                <!--Grid row-->

              
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

            <ul class="nav nav-tabs nav-justified md-tabs black" id="myTabJust" role="tablist">
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

<?php include_once 'includes/footer.php';?>
  <!-- Footer -->

 <!-- Side Modal Top Right Success-->
  <div class="modal fade right" id="sideModalTRSuccessDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" data-backdrop="true">
    <div class="modal-dialog modal-side modal-top-right modal-notify modal-success" role="document">
      <!--Content-->
      <div class="modal-content">
        <!--Header-->
        <div class="modal-header" style="background-color:graytext;"> 
          <p class="heading lead">Log In</p>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true" class="white-text">  close &times;</span>
          </button>
        </div>

        <!--Body-->
        <div class="modal-body">
          <div class="text-center">
              <?php include_once ('connect.php'); ?>
              <?php include('server.php') ?>
                <?php include('errors.php'); ?>
                
              <!-- Default form login -->
              <form class="text-center border border-light p-5" action="login.php" method="POST" autocomplete="OFF">
              
    <p class="h4 mb-4">Sign in</p>
    <input type="text" id="form14" class="form-control mb-4" placeholder="username" name="username">
   
    <input type="password" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Password" name="password" >

    <button class="btn btn-grey1 btn-md my-5" type="submit" name="login_user">Sign in</button>
 

</form>
<!-- Default form login -->
 
          </div>
        </div>

        <!--Footer-->
        <div class="modal-footer justify-content-center">
            <a class="waves-effect waves-light btn btn-white btn-flat btn-sm" data-toggle="modal" data-target="#sideModalTRSuccessDemo1" style="color:black;" >
                <i class="fas fa-user-plus mr-1 blue-text"> </i>  Register</a>
          <a class="waves-effect waves-light btn btn-white btn-flat btn-sm"  data-toggle="modal" data-target="#sideModalTRSuccessDemo" href="#">
                          <i class="fas fas fa-times mr-1 blue-text"></i>no thanks</a>
        </div>
      </div>
      <!--/.Content-->
    </div>
  </div>
  <!-- Side Modal Top Right Success-->
  
  
<?php include_once 'includes/scripts.php';?>
    
  
     <!-- Side Modal Top Right Success-->
  <div class="modal fade right" id="sideModalTRSuccessDemo1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" data-backdrop="true">
    <div class="modal-dialog modal-side modal-top-right modal-notify modal-success" role="document">
      <!--Content-->        <!--Header-->
      <div class="modal-content">
        <!--Header-->
        <div class="modal-header"  style="background-color:#808080">
          <p class="heading lead">Register Here!</p>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="white-text">&times;</span>
          </button>
        </div>

        
        
        <!-- Default form contact -->
        <form class="text-center border border-light p-5"  method="post" action="" autocomplete="OFF">
            <?php include('errors.php'); ?>

    <p class="h4 mb-4"></p>

    <!-- Name -->
    <input type="text" id="defaultContactFormName" class="form-control mb-4" placeholder="First Name" name="firstname" required="required">
    <input type="text" id="defaultContactFormName" class="form-control mb-4" placeholder="Last Name" name="lastname">
    <input type="text" id="defaultContactFormName" class="form-control mb-4" placeholder="User Name" name="username" value="<?php echo $username; ?>">
    <input type="date" id="defaultContactFormName" class="form-control mb-4" placeholder="Date of Birth" name="dob">
    <select class="browser-default custom-select mb-4" name="gender">
        <option value="" disabled>Gender</option>
        <option value="1" selected>Male</option>
        <option value="2">Female</option>
       </select>
   <input type="email" id="defaultContactFormEmail" class="form-control mb-4" placeholder="E-mail" name="email" value="<?php echo $email; ?>">
   <input type="tel" id="defaultContactFormName" class="form-control mb-4" placeholder="tel" name="phone" autofocus="autofocus" required="required" maxlength="15" pattern="\d*" title="Use number only please e.g 0763 990 410 or 255 763 990 410">
    <input type="password" id="defaultContactFormPassword" class="form-control validate mb-4" placeholder="Password" name="password_1">
    <input type="password" id="defaultContactFormName" class="form-control validate mb-4" placeholder="Repeat Password" name="password_2">
     <input type="text" id="defaultContactFormName" class="form-control mb-4" placeholder="City" name="city">
     <input type="text" id="defaultContactFormName" class="form-control mb-4" placeholder="Country" name="country">

    <!-- Subject -->
    <select class="browser-default custom-select mb-4" name="type">
        <option value="" disabled>Type</option>
        <option >Tenants</option>
        <option>Landlord</option>
      </select>

   

    <!-- Send button -->
    <button  class="btn btn-grey" type="submit" name="reg_user">Send</button>

</form>
<!-- Default form contact -->
        

        <!--Footer-->
        <div class="modal-footer justify-content-center">
          
          </a>
          <a type="button" class="btn btn-outline-success waves-effect" data-dismiss="modal">No, thanks</a>
        </div>
      </div>
      <!--/.Content-->
    </div>
  </div>
  <!-- Side Modal Top Right Success-->
    
</body>

</html>
