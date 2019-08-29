<?php
include '../connect.php';
include '../includes/head.php';
 $user_id = $_SESSION['user_id'];
 $user_country = $_SESSION['country'];
 ?>
 
<!DOCTYPE html>
<html lang="en">
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
          <li>
                    <a class="waves-effect waves-light btn btn-white btn-flat btn-sm"   data-target="#" href="my_bookings.php">
                          <i class="fas fa-sign-in-alt mr-1 blue-text"></i> Bookings</a>
                </li> 
                <li>
                    <a class="waves-effect waves-light btn btn-white btn-flat btn-sm"   data-target="#" href="my_accepted.php">
                          <i class="fas fa-check blue-text"></i> Accepted</a>
                </li>
          <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="login.php">View</a>
          </li>
            <li>
                    <a class="waves-effect waves-light btn btn-white btn-flat btn-sm"   data-target="#" href="logout.php">
                          <i class="fas fa-sign-in-alt mr-1 blue-text"></i> Logout</a>
                </li>
            
      </div>
    </div>
  </nav>
</header>


    <main class="mt-5 pt-5">
        <div class="container">
      <div class="row">
       <div class="col-md-12 mb-5">
    
           <p>List of Available houses for Booking </p>
  
<div class="tab-content card pt-5" id="myTabContentJust">
  <div class="tab-pane fade show active" id="home-just" role="tabpanel" aria-labelledby="home-tab-just">
   
                <!--Grid row-->
                <div class="row mb-4 wow fadeIn p-4">
                      <?php 
                    
                    $query = "SELECT * FROM house WHERE status = 'Available'";
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
                                <a href="houseDetails1.php?id=<?php echo $id; ?>" class="btn btn-gray9 btn-md">View details
                                    
                                </a>
                            </div>

                        </div>
                        <!--/.Card-->

                    </div>
                    
                        <?php } 
                    }else{
                    ?>
                    <div class="text-danger" role="alert"><i>No house available!</i></div>
                    <?php
                    }
                        ?>
                </div>
                <!--Grid row-->
  </div>
  <div class="tab-pane fade" id="profile-just" role="tabpanel" aria-labelledby="profile-tab-just">   <form method="post" action="" >
              <!-- Editable table -->
<div class="card">
<!--  <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Clients</h3>-->
  <div class="card-body">
    <div id="table" class="table-editable">
         <?php include 'connect.php';
            $results = mysqli_query($db, "SELECT * FROM booking"
                    . " LEFT JOIN users on booking.cutomer_id = users.id"
                    . " RIGHT JOIN house on booking.house_id = house.id"
                    . " WHERE booking.cutomer_id='$user_id' AND booking.status = 'Approved'");
            
            ?>
      
      <table class="table table-bordered table-responsive-md table-striped text-center">
       <thead class="black white-text">
           
          <th class="text-center">#</th>
          <th class="text-center">Image</th>
          <th class="text-center">Type</th>
          <th class="text-center">Number Of Rooms</th>
          <th class="text-center">Location</th>
          <th class="text-center">House Description</th>
          <th class="text-center">Price per Room</th>
          <th class="text-center">Minimal Time</th>
          <th class="text-center">Time type</th>
          <th class="text-center">Date</th>
<!--          <th class="text-center">Id</th>-->
          <th class="text-center">Edit</th>
          <th class="text-center">Delete</th>
           <th class="text-center">View</th>
          
         
       </thead>
        <?php $num=1; ?>
        <?php while ($row = mysqli_fetch_array($results)) { ?>
        <tr>
            <td class="pt-3-half" contenteditable="true"><?php echo $num; ?> </td>
            <td class="pt-3-half" contenteditable="true"><img style="width:50px; height: 50px; border-radius: 50%" src="uploads/<?php echo $row['house_image']; ?>"</td>
          <td class="pt-3-half" contenteditable="true"><?php echo $row['type']; ?></td>
          <td class="pt-3-half" contenteditable="true"><?php echo $row['number_of_rooms']; ?></td>
          <td class="pt-3-half" contenteditable="true"><?php echo $row['location']; ?></td>
          
          <td class="pt-3-half" contenteditable="true"><?php echo $row['house_description']; ?></td>
          <td class="pt-3-half" contenteditable="true"><?php echo $row['price_per_time']; ?></td>
          <td class="pt-3-half" contenteditable="true"><?php echo $row['minimum_time']; ?></td>
          <td class="pt-3-half" contenteditable="true"><?php echo $row['time_type']; ?></td>
          <td class="pt-3-half" contenteditable="true"><?php echo $row['dateuploaded']; ?></td>
<!--          <td class="pt-3-half" contenteditable="true"><?php echo $row['user_id']; ?></td>-->
          <td>
              <span class="table-editable"><button type="button" class="btn btn-info  btn-rounded btn-sm my-0"><a href="edithouse.php? id=<?php echo $row['id']; ?>" class="edit_btn" name="edit" >Edit</a></button></span>
          </td>
          <td>
             <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalConfirmDelete<?php echo $row['id']; ?>"> Remove</button> 
          </td>
          <td>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalRelatedContent">View</button>
          </td>

<div class="modal fade" id="modalConfirmDelete<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
    <!--Content-->
    <div class="modal-content text-center">
      <!--Header-->
      <div class="modal-header d-flex justify-content-center">
        <p class="heading">Are you sure you want to delete this house?</p>
      </div>

      <!--Body-->
      <div class="modal-body">

        <i class="fas fa-times fa-4x animated rotateIn"></i>

      </div>

      <!--Footer-->
      <div class="modal-footer flex-center">
          <?php   include 'connect.php';?>
         <a  type="button" href="housedelete.php? id=<?php echo $row['id']; ?>" class="btn  btn-outline-danger"> Remove</a>
<!--          <a href="housedelete.php? id=<?php echo $row['id']; ?>" class="btn  btn-outline-danger">Yes</a> -->
        <a type="button" class="btn  btn-danger waves-effect" data-dismiss="modal">No</a>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
        <?php
        $num++; ?>
       <?php } ?>
        
<!--Modal: modalConfirmDelete-->
 



<!-- Button trigger modal-->

 </tr>
        
        
        
      </table>
    </div>
  </div>
</div>
       </form>  
       
  </div>
  <div class="tab-pane fade" id="contact-just" role="tabpanel" aria-labelledby="contact-tab-just">
    

<!--/.Carousel Wrapper-->

  </div>
</div>

        </div>
    </div>
        </div>
    </main>
     
<!--Modal: modalPush-->
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
      <?php include 'connect.php';
       $result = mysqli_query($db, "SELECT users.*, house.* FROM users, house WHERE users.id = house.user_id"); 
       $row = mysqli_fetch_array($result);
      ?>
 
          
          <label for="defaultFormNameModalEx">House Type</label>
            <input type="text" id="defaultFormNameModalEx" class="form-control form-control-sm" name="house_type" value="<?php echo $row['type']; ?>">
           <br>
            <label for="defaultFormNameModalEx">client name</label>
            <input type="text" id="defaultFormNameModalEx" class="form-control form-control-sm" name="client_name" value="<?php echo $row['username']; ?>">
            <br>
            <div class="form-row">
            <div class="form-group col-md-6">
      <label for="inputCity">From</label>
      <input type="date" class="form-control" id="inputCity" name="from_date">
    </div>
    <!-- Default input -->
    <div class="form-group col-md-6">
      <label for="inputZip">To</label>
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
            <input type="hidden" id="defaultFormNameModalEx" class="form-control form-control-sm" name="owner_id" value="<?php echo $row['id']; ?>">
            <input type="hidden" id="defaultFormNameModalEx" class="form-control form-control-sm" name="cutomer_id" value="<?php echo $row['id']; ?>">
            
           
 </div>
      
            
 <div class="input-group">
     <button class="btn btn-indigo" type="submit" name="submit">Book <i class="fas fa-paper-plane-o ml-1"></i></button>
  
 </div></form>
      
      
 
 </div>
      </div>
      
     
    </div>

</div>
      
    
    
    
    <?php include_once 'includes/scripts.php';?>
    <?php include_once 'includes/footer.php';?>
</body>

</html>


    