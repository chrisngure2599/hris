<!DOCTYPE html>
<html lang="en">
<?php include_once 'includes/head.php';
 include('bookseva.php');?>
<body>
<?php 
session_start();
$user_id = $_SESSION['user_id'];
$user_country = $_SESSION['country'];
?>
 <!--Main Navigation-->
    <header>
          <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark primary-color  scrolling-navbar">
      <div class="container-fluid">

        <!-- Brand -->
        <nav class="navbar fixed-top navbar-expand-lg scrolling-navbar teal darken-3" >
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
                    <a class="waves-effect waves-light btn btn-white btn-flat btn-sm"   data-target="#" href="tenants.php">
                          <i class="fas fa-eye blue-text"></i> View</a>
                </li>
                <li>
                    <a class="waves-effect waves-light btn btn-white btn-flat btn-sm"   data-target="#" href="my_bookings.php">
                          <i class="fas fa-book blue-text"></i> Bookings</a>
                </li> 
                <li>
                    <a class="waves-effect waves-light btn btn-white btn-flat btn-sm"   data-target="#" href="my_accepted.php">
                          <i class="fas fa-check blue-text"></i> Accepted</a>
                </li>
                <li>
                    <a class="waves-effect waves-light btn btn-white btn-flat btn-sm"   data-target="#" href="logout.php">
                          <i class="fas fa-sign-out-alt  blue-text"></i> Logout</a>
                </li>

            </ul>
            <!--/Navbar links-->
        </div>

      </div>
    </nav>
    <!-- Navbar -->
    </header>
     <div class="col-md-12 container">
<!-- Classic tabs -->
<div class="classic-tabs mt-3 p-2">

<!--  <div class="tab-content card " id="myClassicTabContentShadow">-->
    <div class="tab-pane fade active show p-3" id="profile-classic-shadow" role="tabpanel" aria-labelledby="profile-tab-classic-shadow">
       <p>
           <?php include 'connect.php';
            $results = mysqli_query($db, "SELECT booking.*, users.*, house.*, house.id as house_id, house.type as htype  FROM booking"
                    . " LEFT JOIN users on booking.cutomer_id = users.id"
                    . " RIGHT JOIN house on booking.house_id = house.id"
                    . " WHERE booking.cutomer_id='$user_id' AND booking.status = 'Approved'");
            
            ?>
       
              <!-- Editable table -->
<div class="card">
      <div class="card-body">
<!--  <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Clients</h3>-->
  <div id="table" >
      <table  class="table-scroll-vertical table-bordered table-striped text-center table-sm" cellspacing="2" width="100%">
       <thead class="cyan lighten-4 black-text" style="font-size:29px">
          <th class="text-center" scope="row">#</th>
          <th class="text-center" scope="row">Image</th>
          <th class="text-center" scope="row">Type</th>
          <th class="text-center" scope="row">Number Of Rooms</th>
          <th class="text-center" scope="row">Location</th>
          
          <th class="text-center" scope="row">Price per Room</th>
          <th class="text-center" scope="row">Minimal Time</th>
          <th class="text-center"scope="row">Time type</th>
          <th class="text-center" scope="row">Date</th>
          
          <th class="text-center" scope="row">House Description</th>
          <th class="text-center" scope="row">Status</th>
        </thead>
        <?php $num=1; ?>
        <?php while ($row = mysqli_fetch_array($results)) {
            $house_id =  $row['house_id']; ?>
        <tr>
          <td class="pt-3-half" ><?php echo $num; ?> </td>
          <td class="pt-3-half" ><img style="width:50px; height: 50px; border-radius: 50%" src="uploads/<?php echo $row['house_image']; ?>"</td>
          <td class="pt-3-half" ><?php echo $row['htype']; ?></td>
          <td class="pt-3-half" ><?php echo $row['number_of_rooms']; ?></td>
          <td class="pt-3-half" ><?php echo $row['location']; ?></td>
<!--          <td class="pt-3-half" ><?php echo $row['house_description']; ?></td>-->
          <td class="pt-3-half"><?php echo $row['price_per_time']; ?></td>
          <td class="pt-3-half" ><?php echo $row['minimum_time']; ?></td>
          <td class="pt-3-half" ><?php echo $row['time_type']; ?></td>
          <td class="pt-3-half"><?php echo $row['dateuploaded']; ?></td>
           <td>
              <button type="button" class="btn btn-primary" data-toggle="modal" style="font-size:8px" data-target="#modalRelatedContent<?php echo $row['id']; ?>">View</button>
          </td>
          <td class="pt-3-half">  <a class="nav-link waves-light white btn btn-floating" id="awesome-tab-classic-shadow" data-toggle="modal" data-target="#sideModalTRSuccessDemo<?php echo $row['house_id']; ?>" href="#"
                                                            role="tab" aria-controls="awesome-classic-shadow" aria-selected="false"><i class="fas fa-check"></i>Approved</a>
                                                             <?php if(isset($_SESSION['country'])): ?>
         <?php if($_SESSION['country'] != 'Tanzania'): ?>
             <a href="pay.php?id=<?php echo $row['id'];?>"><button class="btn btn-primary" style="background-color: #528B8B !important;"><form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="6897W6SJ53ZB4">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1"/></a>
 
         <?php endif; ?>
         <?php endif; ?>
             </td>
             <div class="modal fade right" id="modalRelatedContent<?php echo $row['id']; ?>" tabindex="-1" role="dialog"
  aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-info" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <p class="heading">House Details</p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">

        <div class="row">
          <div class="col-5">
            <img style="width:700px; height: 100%; border-radius: 5%" src="uploads/<?php echo $row['house_image'];?>"
              class="img-fluid" alt="">
          </div>

          <div class="col-7">
        
              <b><label>Price:</label></b>
                   <span><?php echo $row['price_per_time']; ?></span>
                   <br>

                   <b><label>Description:</label></b>
                    <span><?php echo $row['house_description']; ?></span>
                    <br>

                   
        </div>
        </div>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
             
        <div class="modal fade right" id="sideModalTRSuccessDemo<?php echo $row['house_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" data-backdrop="true">
    <div class="modal-dialog modal-content text-center modal-notify modal-success" role="document">
      <!--Content-->
      <div class="modal-content">
        <!--Header-->
        <div class="modal-header" style="background-color:#3F729B;"> 
            <p class="heading lead"> Congratulations  <?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname']; ?>
                your request has been accepted here are details of the houser owner 
                </p>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true" class="white-text">  close &times;</span>
          </button>
        </div>
        <!--Body-->
        <div class="modal-body">
          <div class="text-left">
              <?php 
   include 'connect.php'; 
   $result = mysqli_query($db, "SELECT house.*, users.*, house.type as htype  FROM house RIGHT JOIN users ON (users.id = house.user_id) WHERE house.id=$house_id"); 
             ?>
      <?php while ($row = mysqli_fetch_array($result)) { ?>
          <p> <b>house Owner Name:</b><?php echo $row['firstname'];?> <?php echo $row['lastname']; ?> </p>
          <p><b> Email:</b><?php echo $row['email']; ?></p>
         <p><b>Phone:</b> <?php echo $row['phone']; ?></p>
         <p><b>House Type:</b> <?php echo $row['htype']; ?></p>
          <p>
<!--             paypal link...........-->
 
 <?php } ?>
          </p>
        
   </div>
        </div>
         </div>
      <!--/.Content-->
    </div>
  </div>
        <?php
        $num++; ?>
       <?php } ?>
 </tr>
  </table>
    </div>
  </div>
    </div></div>
      
    </div>
    <div class="tab-pane fade p-3" id="follow-classic-shadow" role="tabpanel" aria-labelledby="follow-tab-classic-shadow">
    <div class="row">
  <div class="col-md-4">
 </div>  
 </div>
  </div>
</div>
<!-- Classic tabs -->
<!--Footer<?php include_once 'includes/footer.php';?> Footer -->
    <?php include_once 'includes/scripts.php';?>
     </div>
    </div> 
    </body>
</html>
