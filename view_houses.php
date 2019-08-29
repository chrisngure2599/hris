
<?php
include 'statusseva.php';
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'includes/head.php';?>

<body>

    <!--Main Navigation-->
    <header>
          <!-- Navbar -->
 <nav class="navbar fixed-top navbar-expand-lg scrolling-navbar" style="background-color:darkslategrey;">
      <div class="container-fluid">

        <!-- Brand -->
        <img src="img/icon.jpg" height="20%" width="5%" style=" border-radius: 60px;">
         <strong class="white-text" style="font-family:cursive;">House Rental Information System</strong>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
          <ul class="nav tabs-cyan black-text mx-auto-justify-content-center"  id="myClassicTabShadow" role="tablist">
       <li class="nav-item">
      <a class="nav-link  waves-light active show white btn btn-floating" id="profile-tab-classic-shadow" data-toggle="tab" href="#profile-classic-shadow"
         role="tab" aria-controls="profile-classic-shadow" aria-selected="true"><i class="fas fa-home"></i>View Houses</a>
    </li>
    <li class="nav-item">
      <a class="nav-link waves-light white btn btn-floating" id="follow-tab-classic-shadow" data-toggle="tab" href="#follow-classic-shadow"
        role="tab" aria-controls="follow-classic-shadow" aria-selected="false"><i class="fas fa-home"></i><i class="fas fa-plus"></i>Add Houses</a>
    </li>
    <li class="nav-item">
      <a class="nav-link waves-light white btn btn-floating" id="contact-tab-classic-shadow" data-toggle="tab" href="#contact-classic-shadow"
        role="tab" aria-controls="contact-classic-shadow" aria-selected="false"><i class="fas fa-address-book"></i>
          Booked Houses</a>
    </li>
     <li class="nav-item">
                 <a class="nav-link waves-light white btn btn-floating" id="awesome-tab-classic-shadow" data-toggle="modal" data-target="#sideModalTRSuccessDemo" href="#"
                  role="tab" aria-controls="awesome-classic-shadow" aria-selected="false"><i class="fas fa-user"></i>Profile</a>
             </li>
    </ul>

             <ul class="nav tabs-cyan black-text mx-auto-justify-content-center"   id="myClassicTabShadow" role="tablist">
                <li class="nav-item ml-auto p-0">
      
                    <a class="waves-effect waves-light "   data-target="#" href="logout.php">
                          <i class="fas fa-sign-in-alt mr-1 black-text"></i> Logout</a>
              </li> 

            </ul>
           
        </div>

      </div>
    </nav>
    <!-- Navbar -->
    </header>
    <!--Main Navigation-->
<!--<div class="row my-5 m-0">
        <div class="col-md-12 container">
 Classic tabs 
<div class="classic-tabs mt-3 p-2">

  <div class="tab-content card " id="myClassicTabContentShadow">
    <div class="tab-pane fade active show p-3" id="profile-classic-shadow" role="tabpanel" aria-labelledby="profile-tab-classic-shadow">
       <p>
           <?php include 'connect.php';
            $results = mysqli_query($db, "SELECT * FROM house where user_id=".$user_id);
            
            ?>
       <form method="post" action="" >
               Editable table 
<div class="card">
  <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Clients</h3>
  <div class="card-body">
    <div id="table" class="table-editable">
      
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
          <th class="text-center">Id</th>
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
          <td class="pt-3-half" contenteditable="true"><?php echo $row['user_id']; ?></td>
          <td>
            
              <button type="button" class="btn btn-info  btn-rounded btn-sm my-0"><a href="edithouse.php? id=<?php echo $row['id']; ?>" class="edit_btn" name="edit" >Edit</a></button>
              
                 <a class="nav-link waves-light white btn btn-floating" id="awesome-tab-classic-shadow" data-toggle="modal" data-target="#sideModalTRSuccessDemo1" href="#"
                  role="tab" aria-controls="awesome-classic-shadow" aria-selected="false">Profile1</a>
          </td>
          <td>
             <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalConfirmDelete<?php echo $row['id']; ?>"> Remove</button> 
          </td>
          <td>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalRelatedContent">View</button>
          </td>
<td>
        
    <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0"><a onClick="return confirm('Are you sure you want to delete this?')" href="housedelete.php? id=<?php echo $row['id']; ?>" class="del_btn"> Remove</a></button></span>
          </td>
          
          
Modal: modalConfirmDelete
<div class="modal fade" id="modalConfirmDelete<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
    Content
    <div class="modal-content text-center">
      Header
      <div class="modal-header d-flex justify-content-center">
        <p class="heading">Are you sure you want to delete this house?</p>
      </div>

      Body
      <div class="modal-body">

        <i class="fas fa-times fa-4x animated rotateIn"></i>

      </div>

      Footer
      <div class="modal-footer flex-center">
          <?php   include 'connect.php';?>
         <a  type="button" href="housedelete.php? id=<?php echo $row['id']; ?>" class="btn  btn-outline-danger"> Remove</a>
          <a href="housedelete.php? id=<?php echo $row['id']; ?>" class="btn  btn-outline-danger">Yes</a> 
        <a type="button" class="btn  btn-danger waves-effect" data-dismiss="modal">No</a>
      </div>
    </div>
    /.Content
  </div>
</div>
        <?php
        $num++; ?>
       <?php } ?>
        
Modal: modalConfirmDelete
Modal: modalRelatedContent
<div class="modal fade right" id="modalRelatedContent" tabindex="-1" role="dialog"
  aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-info" role="document">
    Content
    <div class="modal-content">
      Header
      <div class="modal-header">
        <p class="heading">House Details</p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>

      Body
      <div class="modal-body">

        <div class="row">
          <div class="col-5">
            <img style="width:700px; height: 100%; border-radius: 5%" src="uploads/<?php echo $row['house_image'];?>"
              class="img-fluid" alt="">
          </div>

          <div class="col-7">
            
            <?php include 'connect.php';
            $results = mysqli_query($db, "SELECT * FROM house where user_id=".$user_id);
   
  $row= mysqli_fetch_array($results);
            ?>
            <b><label>Type:</label></b>
              <span ><?php echo $row['type']; ?></span>
              <br>
              <b><label>Price:</label></b>
                   <span><?php echo $row['price_per_time']; ?></span>
                   <br>

                   <b><label>Description:</label></b>
                    <span><?php echo $row['house_description']; ?></span>
                    <br>

                    <b><label>Price:</label></b>
                    <span><?php echo $row['price_per_time']; ?></span>
                    <br>
                    <b><label>Location:</label></b>
                    <span><?php echo $row['location']; ?></span>
                    <br>
        </div>
        </div>
      </div>
    </div>
    /.Content
  </div>
</div>
Modal: modalRelatedContent
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
         <div class="col-md-4">
             <?php include('image.php') ?>
        <form method="post" action=""  enctype="multipart/form-data">
  	<?php include('errors.php'); ?>
            <div class="row"> 
            <div class="col-md-4">
                
            </div>
            <div class="col-md-12 header">
                <h2>Add House</h2>
            </div>
            <div class="col-md-4">
                
            </div>
        
        </div> 
      <div class="input-group">
  	  <label>House Type</label>
  	  <input type="text" name="type" value="">
  	</div>
       <div class="input-group">
  	  <label>Rooms</label>
  	  <input type="text" name="number_of_rooms" value="">
  	</div>
      <div class="input-group">
  	  <label>Location</label>
  	  <input type="text" name="location" value="">
  	</div>
  	<div class="input-group">
            <label>House Description</label>
  	  <input type="text" name="house_description" value="">
  	</div>
  	<div class="input-group">
  	  <label>Price</label>
  	  <input type="text" name="price_per_time">
  	</div>
  	<div class="input-group">
  	  <label>Cost Per Time</label>
  	  <select type="type" name="time_type" class="input-box" value="">
              <option>per Year</option>
              <option>per Month</option>
              <option>per Week</option>
              <option>per day</option>
          </select>
  	</div>
      <div class="input-group">
  	  <label>Minimal Time Rent</label>
          <input type="text" name="minimum_time" value="">
  	</div>
      <div class="input-group">
  	  <label>Choose image</label>
          <input type="file" class="form-control-file" name="image" placeholder=""/>
          <input type="file" class="form-control-file" name="image" multiple >
  	</div>
            <label class="heading">Add Other House Information:</label><br>
Which buildings do you want access to?<br />

<input type="checkbox" name="formDoor[]" value="yes" />tiles<br />
<input type="checkbox" name="formDoor[]" value="B" />Brown Hall<br />
<input type="checkbox" name="formDoor[]" value="C" />Carnegie Complex<br />
<input type="checkbox" name="formDoor[]" value="D" />Drake Commons<br />
<input type="checkbox" name="formDoor[]" value="E" />Elliot House

<div class="input-group">
  	  <button type="submit" class="btn" name="add">Add House</button>
  	</div>
  	
  </form>
             
   
    </div>

         </div></div>
    <div class="tab-pane fade p-3" id="contact-classic-shadow" role="tabpanel" aria-labelledby="contact-tab-classic-shadow">
      <?php 
   include 'connect.php';
$results = mysqli_query($db, "SELECT * FROM booking WHERE owner_id=$user_id"); ?>
     Editable table 
<div class="card">
  <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Booked Houses</h3>
  <div class="card-body">
    <div id="table" class="table-editable">
      
        <table class="table table-bordered table-responsive-md table-striped text-center" style="border-radius:25px;">
       <thead class="black white-text">
           
          <th class="text-center">#</th>
          
          <th class="text-center">Client Name</th>
          <th class="text-center">House Type</th>
          
          <th class="text-center">Cost</th>
          <th class="text-center">From</th>
          <th class="text-center">To</th>
          <th class="text-center">Booked Date</th>
          <th class="text-center">Status</th>
          <th class="text-center" colspan="3">Actions</th>
          
       </thead>
        <?php $num=1; ?>
        <?php while ($row = mysqli_fetch_array($results)) { 
            ?>
        <tr>
            <td class="pt-3-half" contenteditable="true"><?php echo $num; ?> </td>
          <td class="pt-3-half" contenteditable="true"><?php echo $row['client_name']; ?></td>
          <td class="pt-3-half" contenteditable="true"><?php echo $row['house_type']; ?></td>
          <td class="pt-3-half" contenteditable="true"><?php echo $row['cost']; ?></td>
          <td class="pt-3-half" contenteditable="true"><?php echo $row['from_date']; ?></td>
           <td class="pt-3-half" contenteditable="true"><?php echo $row['to_date']; ?></td>
          <td class="pt-3-half" contenteditable="true"><?php echo $row['booked_date']; ?></td>
          <td>
              <span class="table-editable"> <?php echo $row['status']; ?>  </span>
          </td>
          
              <td>
                  <?php if($row['status'] != 'Approved'): ?>
                  <form method="post" action="">
                      <input value="<?php echo $row['id']; ?>" name="approveid" hidden="hidden">
                      <input type="submit" name="approve" class="btn btn-success" value="Approve">
                  </form>
                  <?php endif; ?>
              </td>
              <td>
                  <?php if($row['status'] != 'Denied'): ?>
                  <form method="post" action="">
                      <input value="<?php echo $row['id']; ?>" name="denyid" hidden="hidden">
                      <input type="submit" name="deny" class="btn btn-info" value="Deny">
                  </form>
                  <?php endif; ?>
              </td>
              <td>  
                  <form method="post" action="">
                      <input value="<?php echo $row['id']; ?>" name="delete" hidden="hidden">
                      <input type="submit" name="deletereq" class="btn btn-danger" value="Delete">
                  </form>
              </td>
         </tr>
        <?php
        $num++; ?>
       <?php } ?>
        </table>
    </div>
  </div>
</div>
       </form>
    </div>
    
    </div>
  </div>

</div>
 Classic tabs 
        </div>-->
    </div>
    <!--Footer-->
<?php include 'includes/scripts.php';?>
    <?php include 'includes/footer.php';?>
<!--    <modal profile>-->
      <div class="modal fade right" id="sideModalTRSuccessDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" data-backdrop="true">
    <div class="modal-dialog modal-content text-center modal-notify modal-success" role="document">
      <!--Content-->
      <div class="modal-content">
        <!--Header-->
        <div class="modal-header" style="background-color:#3F729B;"> 
            <p class="heading lead"><?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname']; ?>
                <i class="fas fa-user fa-3x"></i></p>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true" class="white-text">  close &times;</span>
          </button>
        </div>

        <!--Body-->
        <div class="modal-body">
          <div class="text-left">
              <?php 
   include 'connect.php';
   $results = mysqli_query($db, "SELECT * FROM users where id=".$user_id); ?>
              <?php while ($row = mysqli_fetch_array($results)) { ?>
          <p> <b> Name:</b><?php echo $row['firstname'];?> <?php echo $row['lastname']; ?> </p>
         <p> <b>Username:</b><?php echo $row['username']; ?></p>
         <p><b>Email:</b> <?php echo $row['email']; ?></p>
       <p><b>Location:</b><?php echo $row['country']; ?></p>
       <p><b>Gender: </b> <?php echo $row['gender']; ?></p> 
      <b>Date Of Birth: </b> <?php echo $row['dob']; ?>
    </form>
      <?php } ?>   
   </div>
        </div>
         </div>
      <!--/.Content-->
    </div>
  </div>
  

<div class="modal fade right" id="sideModalTRSuccessDemo1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" data-backdrop="true">
    <div class="modal-dialog modal-content text-center modal-notify modal-success" role="document">
      <!--Content-->
      <div class="modal-content">
        <!--Header-->
        <div class="modal-header" style="background-color:#3F729B;"> 
            <p class="heading lead"><?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname']; ?>
                <i class="fas fa-user fa-3x"></i></p>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true" class="white-text">  close &times;</span>
          </button>
        </div>

        <!--Body-->
        <div class="modal-body">
          <div class="text-left">
              <?php 
   include 'connect.php';
   $results = mysqli_query($db, "SELECT * FROM users where id=".$user_id); ?>
              <?php while ($row = mysqli_fetch_array($results)) { ?>
          <p> <b> Name:</b><?php echo $row['firstname'];?> <?php echo $row['lastname']; ?> </p>
         <p> <b>Username:</b><?php echo $row['username']; ?></p>
         <p><b>Email:</b> <?php echo $row['email']; ?></p>
       <p><b>Location:</b><?php echo $row['country']; ?></p>
       <p><b>Gender: </b> <?php echo $row['gender']; ?></p> 
      <b>Date Of Birth: </b> <?php echo $row['dob']; ?>
    </form>
      <?php } ?>   
   </div>
        </div>
         </div>
      <!--/.Content-->
    </div>
  </div>
  <!--Modal: Login / Register Form Demo-->
  <div class="modal fade" id="modalLRFormDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal" role="document">
      <!--Content-->
      <div class="modal-content">

        <!--Modal cascading tabs-->
        <div class="modal-c-tabs">
        </div>
      </div></div></div>
</body>
</html>
