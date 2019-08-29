<?php
 include 'connect.php';
 include 'includes/head.php'; 

 // include('bookseva.php');
  ?>
    
<body>
   
   <?php 
  
$results = mysqli_query($db, "SELECT * FROM house where id=".$_GET['id']); ?>
    <?php $row = mysqli_fetch_array($results) ?>
    <!--Main Navigation-->
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
             <a href="login.php" class="waves-effect waves-light btn btn-white btn-flat btn-sm">
              <i class="fas fa-sign-in-alt mr-1 blue-text"></i> Login / Register</a>

          </li>
         <li class="nav-item">
            <a class="nav-link  " href="register.php" style="color:orangered">Bookings</a>
          </li>
          <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="login.php">View</a>
          </li>
         
        </ul>
      </div>
    </div>
  </nav>
</header>

    <section class="login_box_area section_gap" >
            <div class="container mb-5">
                    <!-- <div class="row justify-content-center">
                            <div class="col-lg-8 "> -->
  <div class="col-md-12 w3-card card col-sm-12 col-xl-12" style="padding: 0; max-height: 500px">


    <div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
    <!--Indicators-->
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-2" data-slide-to="1"></li>
        <li data-target="#carousel-example-2" data-slide-to="2"></li>
    </ol>
    <!--/.Indicators-->
   
   
    <div class="row mb-6 pr-3 pl-3">
        <!--left-->
        <div class="col-md-6  mt-3">
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <div class="view hm-black-light">
                <img  class="mw-100" src="uploads/<?php echo $row['house_image']; ?>" alt="First slide">
              </div>
            <div class="carousel-caption">
                <h3 class="h3-responsive"><?php echo $row['type']; ?></h3>
                <p><?php echo $row['location']; ?></p>
            </div>
          </div>
          <div class="carousel-item">
          <div class="view hm-black-strong">
                <img class="mw-100" src="./img/nyumba3.jpg" alt="Second slide">
            </div>
            <div class="carousel-caption">
                <h3 class="h3-responsive">Strong mask</h3> 
                <p>Secondary text</p>
            </div>
        </div>
        <div class="carousel-item">
          
            <div class="view hm-black-slight">
                <img src="./img/nyumba5.jpg" alt="Third slide" class="img-fluid" alt="Responsive image">
            </div>
            <div class="carousel-caption" >
                <h3 class="h3-responsive">Slight mask</h3>
                <p>Third text</p>
            </div>
        </div>
     <div class="carousel-item">
           
            <div class="view hm-black-slight">
                <img src="./img/nyumba1.jpg" alt="Third slide" class="img-fluid" alt="Responsive image">
            </div>
            <div class="carousel-caption" >
                <h3 class="h3-responsive">Slight mask</h3>
                <p>Third text</p>
            </div>
        </div>

    </div>
    <!--picha-->
         <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>    
            
            <div class="col-md-12  col-sm-12 col-xxl-12" style="margin-top:20px;">
              
                <div class="card-tools">
                  <ul class="pagination pagination-md-4 pagination-sm-12">
                    <li class="page-item"><a href="#" class="page-link">&laquo;</a></li>
                    <li class="page-item"><a href="#" class="page-link  btn-primary">1</a></li>
                    <li class="page-item"><a onclick="displayform()" class="page-link">2</a></li>
                    <li class="page-item"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">&raquo;</a></li>
                  </ul>
             
              </div>  
            </div>
        </div>
        
        <!--right-->
        <div class="col-md-6 mt-3">
          
            
            <!--house descriptions-->
    <ul class="nav nav-tabs nav-justified md-tabs" id="myTabJust">
  <li class="nav-item">
  
      <strong><i class="fa fa-file-text-o"></i> House Information</strong><br/>
  </li>
  
</ul>
    
    
<div class="tab pt-5" id="myTabContentJust">
  <div class="tab-pane fade show active" id="home-just" role="tabpanel" aria-labelledby="home-tab-just" >
   
      <div class="row d-flex justify-content-center">

  <!--Grid column-->
  <div class="col-md-11">
     
          House Type : <?php echo $row['type']; ?> <br>
          Number of Rooms:<?php echo $row['number_of_rooms']; ?><br>  Location:
     <?php echo $row['location']; ?><p><strong><i class="fa fa-file-text-o"></i>Notes</strong><br/>
              </p>
<p>
      <?php echo $row['house_description']; ?></p> minimum time to rent :
    <?php echo $row['minimum_time']; ?></td> <br>
          minimum cost is: <?php echo $row['price_per_time']; ?>
      <?php echo $row['time_type']; ?></div>
  <b><i class="red-text" style="font-family:red-serifs;">Interested?</i></b>
         
         <?php if(isset($_SESSION['user_id'])): ?>
	 
             <button type="button" class="btn btn-grey1" data-toggle="modal" data-target="#modalSubscriptionForm"> 
           <i class="fas fa-book-medical black-text"></i>Book</button>
        <?php else: ?>
			<a href="login.php"type="button" class="btn btn-sm btn-grey1">
            <i class="fas fa-user mr-2"></i>Log in</a>
         <?php endif; ?>
      </div>
    </div>
      
    
  </div>  <div class="tab-pane fade" id="profile-just" role="tabpanel" aria-labelledby="profile-tab-just">
     <div class="card-body">

            <?php 
         
           $results = mysqli_query($db, "SELECT * FROM booking where cutomer_id =".$_SESSION['user_id']);
            $num=1; 
         while ($row = mysqli_fetch_array($results)) { 
            ?>
           Client Name:<?php echo $row['client_name']; ?><br>
          House Type:<?php echo $row['house_type']; ?><br>
          Cost:<?php echo $row['cost']; ?><br>
          From:<?php echo $row['from_date']; ?><br>
          To:<?php echo $row['to_date']; ?><br>
          Status:<?php echo $row['status']; ?><br>
          
       <?php } ?>
</div>
</div>
</section>
   <!-- footer -->
    <?php include_once 'includes/scripts.php'; ?>
    <?php include_once 'includes/footer.php'; ?>
    
    <div class="modal fade" id="modalSubscriptionForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
        
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Book House</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        
       <form  action="" method="POST">
           
      <div class="modal-body mx-3">
           <?php 
           
           $results = mysqli_query($db, "SELECT * FROM house where id =".$_GET['id']);
          while ($row = mysqli_fetch_array($results)) { 
            ?>
 
          
          <label for="defaultFormNameModalEx">House Type</label>
            <input type="text" id="defaultFormNameModalEx" class="form-control form-control-sm" name="house_type" value="<?php echo $row['type']; ?>">
           <br>
            <label for="defaultFormNameModalEx">client name</label>
            <input type="text" id="defaultFormNameModalEx" class="form-control form-control-sm" name="client_name" value="<?php echo $_SESSION['firstname'].' '.$_SESSION['lastname']; ?>">
            <br>
            <div class="form-row">
            <div class="form-group col-md-6">
      <label for="inputFrom">From</label>
      <input type="date" class="form-control" id="inputCity" name="from_date">
    </div>
    <!-- Default input -->
    <div class="form-group col-md-6">
      <label for="to">To</label>
      <input type="date" class="form-control" id="input"  name="to_date">
    </div>
  </div>
            <br>
            <label for="defaultFormNameModalEx">Cost</label>
            <input type="text" id="defaultFormNameModalEx" class="form-control form-control-sm" name="cost" value="<?php echo $row['price_per_time']; ?>">
             <br>
<!--            <label for="defaultFormNameModalEx">total days</label>
            <input type="text" id="defaultFormNameModalEx" class="form-control form-control-sm">-->
            <input type="hidden" id="defaultFormNameModalEx" class="form-control form-control-sm" name="house_id" value="<?php echo $row['id']; ?>">
            <input type="hidden" id="defaultFormNameModalEx" class="form-control form-control-sm" name="owner_id" value="<?php echo $row['user_id']; ?>">
            <input type="hidden" id="defaultFormNameModalEx" class="form-control form-control-sm" name="cutomer_id" value="<?php echo $_SESSION['user_id']; ?>">
       <?php }; ?>       
   </div>   
                 
            
 <div class="input-group">
     <button class="btn btn-grey1 center" type="submit" name="booknow">Book <i class="fas fa-paper-plane-o ml-1"></i></button>
  
 </div>
           
       </form>
      
      
 
 </div>
      </div>
      
     
    </div>

</div>
    
    <!--footer-->
<!--    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPush">Launch modal</button>-->

<!--Modal: modalPush-->
    
   
</body>


</html>




     