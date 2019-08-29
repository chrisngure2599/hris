<?php 
session_start();
include_once 'connect.php';
include_once 'check.php';
print_r($_SESSION);
?>
<div class="">
       <p>
           <?php 
           $user_id=$_SESSION['user_id'];
            $results = mysqli_query($db, "SELECT * FROM house where user_id=".$user_id);
            
            ?>
       <form method="post" action="" >
              <!-- Editable table -->
<div class="card">
      <div class="card-body"><h3 class="card-header text-center font-weight-bold text-uppercase py-4">Available Houses</h3>
  <div id="table" >
      <table  class="table-scroll-vertical table-bordered table-striped text-center table-sm" cellspacing="2" width="100%">
       <thead class="cyan lighten-4 black-text" style="font-size:29px">
      <th class="text-center">#</th>
          <th class="text-center">Image</th>
          <th class="text-center">Type</th>
          <th class="text-center">Number Of Rooms</th>
          <th class="text-center">Location</th>
<!--          <th class="text-center" scope="row">House Description</th>-->
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
            <td class="pt-3-half"><?php echo $num; ?> </td>
            <td class="pt-3-half" ><img style="width:50px; height: 50px; border-radius: 50%" src="uploads/<?php echo $row['house_image']; ?>"></td>
          <td class="pt-3-half" ><?php echo $row['type']; ?></td>
          <td class="pt-3-half" ><?php echo $row['number_of_rooms']; ?></td>
          <td class="pt-3-half" ><?php echo $row['location']; ?></td>
          <!--<td class="pt-3-half"><?php echo $row['house_description']; ?></td>-->
          <td class="pt-3-half" ><?php echo $row['price_per_time']; ?></td>
          <td class="pt-3-half" ><?php echo $row['minimum_time']; ?></td>
          <td class="pt-3-half" ><?php echo $row['time_type']; ?></td>
          <td class="pt-3-half" ><?php echo $row['dateuploaded']; ?></td>
<!--          <td class="pt-3-half" contenteditable="true"><?php echo $row['user_id']; ?></td>-->
          <td>
<!--            
-->              <button type="button" class="btn btn-info  btn-rounded btn-sm my-0"><a href="edithouse.php?id=<?php echo $row['id']; ?>" class="edit_btn" name="edit" >Edit</a></button>
              
<!--                 <a class="nav-link waves-light white btn btn-floating" id="awesome-tab-classic-shadow" data-toggle="modal" data-target="#sideModalTRSuccessDemo1" href="#"
                  role="tab" aria-controls="awesome-classic-shadow" aria-selected="false">Profile1</a>-->
          </td>
          <td>
              <button type="button" class="btn btn-danger" data-toggle="modal" style="font-size:8px"data-target="#modalConfirmDelete<?php echo $row['id']; ?>"> Remove</button> 
          </td>
          <td>
              <button type="button" class="btn btn-primary" data-toggle="modal" style="font-size:8px" data-target="#modalRelatedContent<?php echo $row['id']; ?>">View</button>
          </td>
<!--<td>
    <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0"><a onClick="return confirm('Are you sure you want to delete this?')" href="housedelete.php? id=<?php echo $row['id']; ?>" class="del_btn"> Remove</a></button></span>
          </td>-->
 <!--Modal: modalConfirmDelete-->
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
       
<!--Modal: modalConfirmDelete-->
<!--Modal: modalRelatedContent-->
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
 <?php
        $num++; ?>
       <?php } ?>
        
<!--Modal: modalRelatedContent-->
 </tr>
     </table>
    </div>
  </div>
</div>
       </form>  
       
    </div>