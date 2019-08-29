<?php
     include 'connect.php';
    include 'includes/head.php';
    ?>

<body>
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
             <a href="login.php" class="waves-effect waves-light btn btn-white btn-flat btn-sm">
              <i class="fas fa-sign-in-alt mr-1 blue-text"></i> Login / Register</a>

          </li>
        
         
        </ul>
      </div>
    </div>
  </nav>
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
    <section class="login_box_area section_gap" >
            <div class="container mb-6">
                    <div class="row justify-content-center">
                            <div class="col-lg-12">
                                
                        
            <!--Section: Cards-->
           
        </div>
    </main>

                                </div>
                            </div>
                                                       

                   
                    <div class="row justify-content-center">
        <div class="col-md-12 tab-pane" id="settings">
            <ul class="nav nav-tabs nav-justified md-tabs info" id="myTabJust" role="tablist"> 
 <li class="nav-item">
    <a class="waves-effect waves-light btn btn-white btn-flat btn-sm active" id="home-tab-just" data-toggle="tab" href="#home-just" role="tab" aria-controls="home-just"
      aria-selected="true">Contact</a>
  </li>
  <li class="nav-item">
    <a class="waves-effect waves-light btn btn-default col-md-4 btn-flat btn-sm" id="profile-tab-just" data-toggle="tab" href="#profile-just" role="tab" aria-controls="profile-just"
      aria-selected="false">About Us</a>
  </li>
  <li class="nav-item">
    <a class="waves-effect waves-light btn btn-default col-md-4 btn-flat btn-sm " id="contact-tab-just" data-toggle="tab" href="#contact-just" role="tab" aria-controls="contact-just"
      aria-selected="false">Gallery</a>
  </li> 
         
        </div>
    </div>

<div class="tab-content card pt-5" id="myTabContentJust">
  <div class="tab-pane fade show active" id="home-just" role="tabpanel" aria-labelledby="home-tab-just">
     <p class="mx-5">For more details contacts us  
          </p> <p class="mx-5">Call: 0788 xx xx xx or 06xx xxx xxx .</p> <p class="mx-5"> Email: malulupeter@gmail.com.</p>
  </div>
  <div class="tab-pane fade" id="profile-just" role="tabpanel" aria-labelledby="profile-tab-just">
    <p class="mx-5">House Rental Information System is here to Simplify process of house renting Since you  need to have just internet 
        to access for available room from anywhere then this simplify the process of house renting especially for the guests. 
   As information is implemented to simplify the work.</p>
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

