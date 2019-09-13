<?php 
include '../connect.php';
 include_once 'nav.php';
    include 'sec.php';
 
 // include('bookseva.php');
$user_id = $_SESSION['user_id'];
$user_country = $_SESSION['country'];
 ?>

<body>


 
  
    <div class="row my-5 m-0">
        <div class="col-md-12 container">
<!-- Classic tabs -->
<div class="classic-tabs mt-3 p-2">

  <div class="tab-content w3-cared " id="myClassicTabContentShadow">
<!--    <div class="tab-pane fade active show p-3" id="profile-classic-shadow" role="tabpanel" aria-labelledby="profile-tab-classic-shadow">-->
       <p>
           <?php 
           $query=("SELECT * FROM booking LEFT JOIN users on 
            booking.cutomer_id = users.id RIGHT JOIN house on
             booking.house_id = house.id WHERE 
             booking.cutomer_id='$user_id'
              AND house.status = 'Booked'");
            $results = mysqli_query($db, $query);
            
            ?>
       <form method="post" action="" >
              <!-- Editable table -->

    <div id="table" class="table-editable">
      
      <table class="table table-bordered table-responsive-md table-striped text-center">
       <thead class="black white-text">
           
          <th class="text-center">#</th>
          <th class="text-center">Image</th>
          <th class="text-center">Type</th>
          <th class="text-center">Number Of Rooms</th>
          <th class="text-center">Location</th>
<!--          <th class="text-center">House Description</th>-->
          <th class="text-center">Price per Room</th>
          <th class="text-center">Minimal Time</th>
          <th class="text-center">Time type</th>
          <th class="text-center">Booking Date</th>
          <th class="text-center">Status</th>
       </thead>
        <?php $num=1; ?>
        <?php while ($row = mysqli_fetch_array($results)) { ?>
        <tr>
            <td class="pt-3-half"><?php echo $num; ?> </td>
            <td class="pt-3-half"><img style="width:50px; height: 50px; border-radius: 50%" src="../uploads/<?php echo $row['house_image']; ?>"></td>
          <td class="pt-3-half"><?php echo $row['type']; ?></td>
          <td class="pt-3-half"><?php echo $row['number_of_rooms']; ?></td>
          <td class="pt-3-half"><?php echo $row['location']; ?></td>
<!--          
          <td class="pt-3-half" contenteditable="true"><?php echo $row['house_description']; ?></td>-->
          <td class="pt-3-half"><?php echo $row['price_per_time']; ?></td>
          <td class="pt-3-half"><?php echo $row['minimum_time']; ?></td>
          <td class="pt-3-half"><?php echo $row['time_type']; ?></td>
          <td class="pt-3-half"><?php echo $row['dateuploaded']; ?></td>
          <td class="pt-3-half"><?php echo $row['status']; ?></td>


        <?php
        $num++; ?>
       <?php } ?>
 </tr>
       </table>
    </div>
  </div>
</div>
       </form>  
       
    </div>
    <div class="tab-pane fade p-3" id="follow-classic-shadow" role="tabpanel" aria-labelledby="follow-tab-classic-shadow">
    <div class="row">
  <div class="col-md-4">              
  </div>  
</div>
  </div>

</div>
<!-- Classic tabs -->
 <!--Footer-->
<?php include_once 'includes/footer.php';?>
  <!-- Footer -->
<?php include_once 'includes/scripts.php';?>
     </div>
    </div> 
    </body>
</html>
