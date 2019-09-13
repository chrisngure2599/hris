<?php
session_start();
 include '../connect.php';
include_once 'check.php';
 

$user_id = $_SESSION['user_id'];
if(!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])){
    header('Location: ../logout.php');
}

   include 'head.php';
?>
<?php include_once 'nav.php'; ?><br><br>
<br>
<br><br>
<body class="w3-container" >
	<div class="w3-container w3-grey" >
		<a href="addhouse.php" class="w3-btn w3-right " >Add a house</a>
	</div>
 <?php 
	//fetching the houses
            $query = "SELECT * FROM house"; 
            $res=mysqli_query($db,$query);
            $ans=mysqli_num_rows($res);
            if ($ans>=1)
             {
             	?>
             	<table class="w3-table" >
             		<tr>
             	<th >#</th>
           <th>Image</th>
           <th>Type</th>
           <th>Number Of Rooms</th>
           <th>Location</th>
          <th>Price per Room</th>
           <th>Minimal Time</th>
           <th>Time type</th>
           <th>Date</th>
           <th>Edit</th>
           <th>Delete</th>
           <th>House Description</th>     
           </tr>        	<?php
              while ($row= mysqli_fetch_array($res)) {  ?>
        <tr>
            <td class="pt-3-half" ><?php echo $num; ?> </td>
            <td class="pt-3-half" ><img style="width:50px; height: 50px; border-radius: 50%" src="uploads/<?php echo $row['house_image']; ?>"></td>
          <td class="pt-3-half" ><?php echo $row['type']; ?></td>
          <td class="pt-3-half" ><?php echo $row['number_of_rooms']; ?></td>
          <td class="pt-3-half" ><?php echo $row['location']; ?></td>
        
          <td class="pt-3-half" ><?php echo $row['house_description']; ?></td>-->
          <td class="pt-3-half" ><?php echo $row['price_per_time']; ?></td>
          <td class="pt-3-half" ><?php echo $row['minimum_time']; ?></td>
          <td class="pt-3-half" ><?php echo $row['time_type']; ?></td>
          <td class="pt-3-half" ><?php echo $row['dateuploaded']; ?></td>
          <td>
           <button type="button"  style="font-size:11px"class="btn btn-info  btn-rounded btn-sm my-0"><a href="edithouse.php? id=<?php echo $row['id']; ?>" class="edit_btn" name="edit" >Edit</a></button>
          </td>
         <td>
            <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0"><a href="deedit.php? id=<?php echo $row['id']; ?>" class="del_btn"> Remove</a></button></span>
          </td>
          <td>
             <button type="button" class="btn btn-danger "style="font-size:11px" data-toggle="modal" data-target="#modalConfirmDelete<?php echo $row['id']; ?>"> Remove</button> 
          </td> 
          <td>
              <button type="button" class="btn btn-primary btn-rounded btn-sm my-0" data-toggle="modal" style="font-size:11px" data-target="#modalRelatedContent<?php echo $row['id']; ?>">View</button>
          </td>
          
<td>
       
    <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0"><a onClick="return confirm('Are you sure you want to delete this?')" href="housedelete.php? id=<?php echo $row['id']; ?>" class="del_btn"> Remove</a></button></span>
          </td>-->
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
          
          <a  type="button" href="adminhousedelete.php? id=<?php echo $row['id']; ?>" class="btn  btn-outline-danger"> Remove</a>
<!--          <a href="housedelete.php? id=<?php echo $row['id']; ?>" class="btn  btn-outline-danger">Yes</a> -->
        <a type="button" class="btn  btn-danger waves-effect" data-dismiss="modal">No</a>
      </div>
    </div>
    <!--/.Content-->
 
       </tr>
        <?php
        $num++; ?>
       <?php } ?>
       </table></div></div></div>
       </form>
              	<?php
             
         }else{
             	echo 'Sorry no house found';
             }            
  ?>