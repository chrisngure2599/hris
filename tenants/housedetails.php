<?php
 include_once '../connect.php';
 include_once 'nav.php'; 
  include('bookseva.php');
    include 'sec.php';
  
  ?>
    
<body>
<?php 
//First checking if the houseid issset else nope!
if (isset($_GET['id'])) {
  //Cleaning the id
  $id=mysqli_real_escape_string($db,$_GET['id']);
   $query="SELECT *,(count(house_images.id)) as images FROM house left join house_images ON house.id=house_images.house_id where house.id=$id LIMIT 1";
  $results = mysqli_query($db,$query);
  $ans=mysqli_num_rows($results);
  if ($ans==0) {
    echo "alert('sorry the house is not found')";
    header("location:index.php");
  }elseif ($ans==1) {
    $row = mysqli_fetch_array($results);
    //
    ?>
    <div class="w3-card-4 w3-container" >
      <!--Image section-->
    <div class="w3-quarter">
        <?php   
          //#php section to check if there are more images
          if ($row['images']>1) {
            //then the slideshow

          }else{
            //just a single image man!
            ?>
            <img class="w3-image" src="../uploads/<?php echo $row['house_image'] ?>">

            <?php
          }
         ?>
    </div>
    <!--ENd of image section-->
    <!--@Start of description-->
    <div class="w3-rest w3-padding-right w3-right " >
      <h3 align="center" >Details</h3>
      <ul class="w3-ul" >
    <li><b>House Type</b> : <?php echo $row['type']; ?> </li>
    <li><b>Number of Rooms:</b><?php echo $row['number_of_rooms']; ?></li>
    <li> <b>Location:</b><?php echo $row['location']; ?></li>    
    <li><b>Description:</b><p><?php echo $row['house_description']; ?></p></li>
    <li><b>Minimum time to rent</b> :<?php echo $row['minimum_time']; ?></li>
    <li><b>minimum cost is:</b> <?php echo $row['price_per_time']; ?></li>
    <li><b>Payment type:</b><?php echo $row['time_type']; ?></li>
    </ul>  
        <button type="button" class="btn btn-grey1" data-toggle="modal" data-target="#modalSubscriptionForm"> 
           <i class="fas fa-book-medical black-text"></i>Book</button>
   
    </div>
    <!--@ End of description-->
  
    </div>
    <?php
  }


}else{
  header("location:index.php");
}

 ?>
   
</body>
<!--Start of the model-->
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
            <label for="defaultFormNameModalEx">client name</label>
            <input readonly="" type="text" id="defaultFormNameModalEx" class="form-control form-control-sm" name="client_name" value="<?php echo $_SESSION['firstname'].' '.$_SESSION['lastname']; ?>">
            <br>
            <div class="form-row">
            <div class="form-group col-md-6">
      <label for="inputFrom">From</label>
      <input type="date" value="" class="form-control" id="inputCity" name="from_date">
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
<!--End of the model-->
</html>     