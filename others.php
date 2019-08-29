<!DOCTYPE html>
<html lang="en">

<?php include_once 'includes/head.php';
 include('bookseva.php');?>

<body>
<?php 
session_start();
$user_id = $_SESSION['user_id'];
?>
    <!--Main Navigation-->
    <header>
          <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark primary-color  scrolling-navbar">
      <div class="container-fluid">

        <!-- Brand -->
        <a class="navbar-brand waves-effect" href="">
            <strong class="white-text" style="font-family:cursive;">House Renting System</strong>
        </a>
 <!delete here>
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
                    <a class="waves-effect waves-light btn btn-white btn-flat btn-sm"   data-target="#" href="logout.php">
                          <i class="fas fa-sign-in-alt mr-1 blue-text"></i> Logout</a>
                </li> 

            </ul>
            <!--/Navbar links-->
        </div>

      </div>
    </nav>
    <!-- Navbar -->
    </header>
    <main class="mt-5 pt-5">
        <div class="container">
      <div class="row">
        
        
        <div class="col-md-12">

            <ul class="nav nav-tabs nav-justified md-tabs indigo" id="myTabJust" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab-just" data-toggle="tab" href="#home-just" role="tab" aria-controls="home-just"
      aria-selected="true">View</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab-just" data-toggle="tab" href="#profile-just" role="tab" aria-controls="profile-just"
      aria-selected="false">Request</a>
  </li>
  
</ul>
<div class="tab-content card pt-5" id="myTabContentJust">
  <div class="tab-pane fade show active" id="home-just" role="tabpanel" aria-labelledby="home-tab-just">
     <p class="mx-5">
     <p>
           <?php include 'connect.php';
            $results = mysqli_query($db, "SELECT * FROM house"); ?>
       <form method="post" action="" >
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
          
          <th class="text-center">Book</th>
         
         
       </thead>
        <?php $num=1; ?>
        <?php while ($row = mysqli_fetch_array($results)) { ?>
        <tr>
            <td class="pt-3-half" contenteditable="true"><?php echo $num; ?> </td>
            <td class="pt-3-half" contenteditable="true">
                <img style="width:50px; height: 50px; border-radius: 50%" src="uploads/<?php echo $row['house_image']; ?>"</td>
          <td class="pt-3-half" contenteditable="true"><?php echo $row['type']; ?></td>
          <td class="pt-3-half" contenteditable="true"><?php echo $row['number_of_rooms']; ?></td>
          <td class="pt-3-half" contenteditable="true"><?php echo $row['location']; ?></td>
          
          <td class="pt-3-half" contenteditable="true"><?php echo $row['house_description']; ?></td>
          <td class="pt-3-half" contenteditable="true"><?php echo $row['price_per_time']; ?></td>
          <td class="pt-3-half" contenteditable="true"><?php echo $row['minimum_time']; ?></td>
          <td class="pt-3-half" contenteditable="true"><?php echo $row['time_type']; ?></td>
          <td class="pt-3-half" contenteditable="true"><?php echo $row['dateuploaded']; ?></td>
          
<!--          <td>
              <button type="button" class="btn btn-info  btn-rounded btn-sm my-0">
                      <a href="book.php? id=<?php echo $row['id']; ?>" class="edit_btn" name="book" >Book</a></button>-->
          
          <td>
          <?php if(isset($_SESSION['country'])): ?>
         <?php if($_SESSION['country'] != 'Tanzania'): ?>
              <a href="pay.php?id=<?php echo $row['id'];?>"><button class="btn btn-primary" style="background-color: #528B8B !important;"><form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="6897W6SJ53ZB4">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
         <?php else: ?>
             <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalSubscriptionForm"> 
           <i class="fas fa-book-medical blue-text"></i>Book</button>
         <?php endif; ?>
         <?php endif; ?>

</td>
</form>

</button></a>
                      
          </td>

      
     </p>
     </tr>
        <?php
        $num++; ?>
       <?php } ?>
        
        
      </table>
       </form>
  </div>
  <div class="tab-pane fade" id="profile-just" role="tabpanel" aria-labelledby="profile-tab-just">
    <p class="mx-5">House Rental Information System is here to Simplify process of house renting Since you  need to have just internet 
        to access for available room from anywhere then this simplify the process of house renting especially for the guests. 
   As information is implemented to simplify the work.</p>
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

<div class="text-center">
  <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalSubscriptionForm">Book</a>
</div>
</div>
      
    
    
    
    <?php include_once 'includes/scripts.php';?>
    <?php include_once 'includes/footer.php';?>
</body>

</html>


    