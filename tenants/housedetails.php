<?php
 include_once '../connect.php';
 include_once 'nav.php'; 

 // include('bookseva.php');
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
</html>     