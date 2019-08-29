<?php 
include 'statusseva.php';
if(!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])){
    header('Location: rental.php');
}
?>

<?php



$user_id = $_SESSION['user_id'];
$user_country = $_SESSION['country'];
if(isset($_POST['approve'])){
    $id = $_POST['approveid'];
    $selectuserInfo = mysqli_query($db, "SELECT * FROM booking JOIN users WHERE booking.cutomer_id = users.id AND booking.id = $id");
    $userData = mysqli_fetch_assoc($selectuserInfo);
    
    $phonequery = mysqli_query($db, "SELECT * FROM booking JOIN users WHERE booking.owner_id = users.id AND booking.id = $id");
    $userphone = mysqli_fetch_assoc($phonequery);
    $userphoneno = $userphone['phone'];
    
    $_SESSION['email'] = $userData['email'];
    $username = $userData['username'];
    include 'mail/mail.php';
    header('location:LandLord.php');
}


?>


<?php include 'includes/head.php';?>

<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top default-nav bg-white" style="height:65px;height: auto;color: black;z-index: 1000;">
     
       <b class="navbar-brand js-scroll-trigger" href="index.php"><img src="img/icon.jpg" alt="logo" style='height:55px;width: 70px'> House Rental Information System</b><br>
            <ul> <li class="nav-item ml-auto p-0">
       <p class="nav-link waves-light" style="font-size:15px"><?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname']; ?> <i class="fas fa-user fa-1x">
       </i></p>
            </li>
          
      <div class="container">
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
                    <a class="waves-effect waves-light btn btn-white btn-flat btn-sm"   data-toggle="tab" href="#follow-classic-shadow"
        role="tab" aria-controls="follow-classic-shadow" aria-selected="false" style="font-size:9px" ><i class="fas fa-home"></i><i class="fas fa-plus"></i>Add Houses</a>
                </li>
                
                <li>
                    <a class="waves-effect waves-light btn btn-white btn-flat btn-sm"   data-target="#" href="my_accepted.php">
                          <i class="fas fa-check blue-text"></i> Accepted</a>
              </li>
             <li>
                    <a class="waves-effect waves-light btn btn-white btn-flat btn-sm"  id="profile-tab-classic-shadow" data-toggle="tab" href="#profile-classic-shadow"
         role="tab" aria-controls="profile-classic-shadow" aria-selected="true" style="font-size:9px"><i class="fas fa-home"></i>View Houses</a>
                </li>
                 <li>
                    <a class="waves-effect waves-light btn btn-white btn-flat btn-sm"  data-toggle="tab" href="#contact-classic-shadow"
        role="tab" aria-controls="contact-classic-shadow" aria-selected="false" style="font-size:9px"><i class="fas fa-address-book"></i>
          Booked Houses</a>
                </li>
                  <li class="nav-item">
                 <a class="waves-effect waves-light btn btn-white btn-flat btn-sm" data-toggle="modal" data-target="#sideModalTRSuccessDemo" href="#"
                  role="tab" aria-controls="awesome-classic-shadow" aria-selected="false" style="font-size:9px"><i class="fas fa-user"></i>Profile</a>
             </li>

    </ul>

         <ul class="navbar-nav ml-auto my-2 my-lg-0">
        
                    <a class="waves-effect waves-light btn btn-white btn-flat btn-sm"   data-target="#" href="logout.php">
                          <i class="fas fa-sign-in-alt mr-1 black-text"></i> Logout</a>
                </li>
            </li>
          </ul>
        </div>
    </nav>

      
</header>
<div class="row my-5 m-0">
        <div class="col-md-12 container">
<!-- Classic tabs -->
<div class="classic-tabs mt-3 p-2">

  <div class="tab-content card " id="myClassicTabContentShadow">
    <div class="tab-pane fade active show p-3" id="profile-classic-shadow" role="tabpanel" aria-labelledby="profile-tab-classic-shadow">
       <p>
           
<?php           
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
            <td class="pt-3-half" ><img style="width:50px; height: 50px; border-radius: 50%" src="uploads/<?php echo $row['house_image']; ?>"</td>
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
-->              <button type="button" class="btn btn-info  btn-rounded btn-sm my-0"><a href="edithouse.php? id=<?php echo $row['id']; ?>" class="edit_btn" name="edit" >Edit</a></button>
              
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
      <section class="login_box_area section_gap" class="tab-pane fade p-3" id="follow-classic-shadow" role="tabpanel" aria-labelledby="follow-tab-classic-shadow">
            <div class="container mb-5">
                    <div class="row justify-content-center">
                            <div class="col-lg-7 ">
                                <div class="border bg-white">
                                    <form class=""  method="post" action="register.php" autocomplete="off"  >
                                        <div class="card-header font-weight-bold">Create account</div>
                                            <div class="card-body">
                                                
                                               <input type="text" id="defaultContactFormName" class="form-control mb-4" placeholder=" required="required">
                        <input type="text" id="defaultContactFormName" class="form-control mb-4" placeholder="Last Name" name="lastname">
    
                                                      <div class="md-form col-md-12" style="margin-top:0">
                                                          <!-- <label class="label">First name *</label><br> -->
                                                          <input type="text"  class="form-control"required="" autofocus="" placeholder="First Name" name="firstname" >
                                                      </div>
                                                      <div class="md-form col-md-12" style="margin-top:0">
                                                           <!--  <label class="label">Last name *</label><br> -->
                                                            <input type="text"  class="form-control"   required name="lname" style="margin-top:12px" placeholder="Last name">
                                                      </div>
                                                       <div class="md-form col-md-12" style="margin-top:0">
                                                       <!--      <label class="label">Username *</label><br> -->
                                                            <input type="text"  class="form-control"  required name="username" style="margin-top:12px"  placeholder="username" >
                                                      </div>
                                                      <div class="md-form col-md-12" style="margin-top:0">
                                                           <!--  <label class="label">Date of birth (YY/MM/DD) *</label><br> -->
                                                            <input type="date"  class="form-control" id="date_birth" required name="date_birth"  onfocus="this.placeholder = ''" >
                                                      </div>
                                                      <div class="md-form col-md-12" style="margin-top:0">
                                                          <!-- <label style="margin-bottom:30px;float: left;margin-left: 13px">Gender*</label><br><br> -->
                                                            <select name="gender" required=""class=" form-control" style="display:block !important;border:none;border-bottom: 1px solid silver;font-size: 13px;cursor: pointer">
                                                              <option value="" >Select your sex</option>
                                                              <option value="male">Male</option>
                                                              <option value="female">Female</option>
                                                            </select>
                                                      </div>
                                                      <div class="md-form col-md-12" style="margin-top:0">
                                                           <!--  <label class="label">Phone number *</label><br> -->
                                                            <input type="number"  class="form-control" id="phone_number" required name="phone_number"  placeholder="Mobile number" onfocus="this.placeholder = ''" >
                                                      </div>
                                                      <div class="md-form col-md-12" style="margin-top:0">
                                                           <!--  <label class="label">Email address</label><br> -->
                                                            <input type="email"  class="form-control" name="email" style="margin-top:12px"  onfocus="this.placeholder = ''" placeholder="Email" >
                                                      </div>
                                                       <div class="md-form col-md-12" style="margin-top:0">
                                                          <!-- <label style="margin-bottom:30px;float: left;margin-left: 13px">Gender*</label><br><br> -->
                                                            <select name="contry" required=""class=" form-control" style="display:block !important;border:none;border-bottom: 1px solid silver;font-size: 13px;cursor: pointer">
                                                              <option value="" >Country</option>
                                                              <option value="Tanznia">Tanzania</option>
                                                              <option value="Kenya" disabled="on">Kenya</option>
                                                               <option value="Uganda" disabled="on">Uganda</option>
                                                                <option value="Burundi" disabled="on">Burundi</option>
                                                                 <option value="Congo" disabled="on">Congo</option>
                                                            </select>
                                                      </div>
                                                      <div class="md-form col-md-12" style="margin-top:0">
                                                           <select name="region" required=""class=" form-control" style="display:block !important;border:none;border-bottom: 1px solid silver;font-size: 13px;cursor: pointer">
                                                              <option value="" >City</option>
                                                              <option value="arusha">Arusha</option>
                                                              <option value="mwanza">Mwanza</option>
                                                              <option value="kilimanjaro">Kilimanjaro</option>
                                                              <option value="Dare es salam">Dare es salam</option>
                                                              <option value="morogoro">Morogoro</option>
                                                              <option value="mtwara">Mtwara</option>
                                                              <option value="Dodoma">Dodoma</option>
                                                              <option value="singida">Singida</option>
                                                              <option value="geita">Gita</option>
                                                              <option value="tabora">Tabora</option>
                                                            </select>
                                                      </div>
                                                       
        
                                                      <div class="md-form col-md-12" style="margin-top:0">
                                                             <select name="type" required=""class=" form-control" style="display:block !important;border:none;border-bottom: 1px solid silver;font-size: 13px;cursor: pointer">
                                                              <option value="" >Type</option>
                                                              <option value="Tenants">Tenants</option>
                                                              <option value="Landlord">Landlord</option>
                                                              <option value="Admin">Admin</option>

                                                              
                                                            </select>
                                                      </div>
                                                     
                                                      <div class="md-form col-md-12" style="margin-top:0">
                                                           <!--  <label style="margin-bottom:30px;float: left;margin-left: 13px">Aina Ya Kitambulisho</label><br> -->
                                                            <input type="file"  placeholder="upload profile picture" class="form-control" name="profile" onfocus="this.placeholder = ''" >
                                                      </div>
                                                      <div class="md-form col-md-12" style="margin-top:0">
                                                            <!-- <label style="margin-bottom:30px;float: left;margin-left: 13px">Weka Neno Siri Lako *</label><br> -->
                                                            <input type="password"  class="form-control" name="password" required id="password"  required placeholder="Password"  onfocus="this.placeholder = ''" >
                                                      </div>
                                                      <div class="md-form col-md-12" style="margin-top:0">
                                                           <!--  <label style="margin-bottom:30px;float: left;margin-left: 13px">Hakiki Neno Siri Lako *</label><br> -->
                                                            <input type="password"  class="form-control" name="password_conf" required id="password" placeholder="Repeat Password" onfocus="this.placeholder = ''" >
                                                      </div>
                                                      
                                                <div class="">
                                                    <input type="reset" value="Reset" name="login" class="btn btn-sm btn-danger ">
                                                    <input type="submit" value="Create account" id="login" name="register" class="btn btn-sm btn-info    ">
                                                </div>
                                                     <div class="">
                                                          <?php
                                                              if(!empty($erros)){
                                                                  foreach ($erros as $error){ ?>
                                                         <script> alert('<?php echo $error ?>'); </script>
                                                                <?php  }
                                                              }
                                                          ?>
                                                  </div>
                                            </div>
                                        <div class=" card-footer  w-100" style="color: orangered">
                                           Your username can be your email address,your names or phone number.  
                                        </div>
                                          <div class="modal-footer justify-content-center">
            <a class="waves-effect waves-light btn btn-white btn-flat btn-sm" data-toggle="modal" data-target="#sideModalTRSuccessDemo1" style="color:black;" >
                <i class="fas fa-user-plus mr-1 blue-text"> </i>  View your detail</a>
          <a class="waves-effect waves-light btn btn-white btn-flat btn-sm"  data-toggle="modal" data-target="#sideModalTRSuccessDemo" href="#">
                          <i class="fas fas fa-times mr-1 blue-text"></i>no thanks</a>
        </div>
                                  </form>
                                </div>
                            </div>
                    </div>
            </div>
    </section>
    <div class="tab-pane fade p-3" id="contact-classic-shadow" role="tabpanel" aria-labelledby="contact-tab-classic-shadow">
      <?php 
   
$results = mysqli_query($db, "SELECT * FROM booking WHERE owner_id=$user_id"); ?>
    
	 
              <!-- Editable table -->
<div class="card">
      <div class="card-body">
<h3 class="card-header text-center font-weight-bold text-uppercase py-4">Booked Houses</h3>
  <div id="table" >
      <table  class="table-scroll-vertical table-bordered table-striped text-center table-sm" cellspacing="2" width="100%">
       <thead class="cyan lighten-4 black-text" style="font-size:29px">
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
            <td class="pt-3-half"><?php echo $num; ?> </td>
          <td class="pt-3-half"><?php echo $row['client_name']; ?></td>
          <td class="pt-3-half"><?php echo $row['house_type']; ?></td>
          <td class="pt-3-half"><?php echo $row['cost']; ?></td>
          <td class="pt-3-half"><?php echo $row['from_date']; ?></td>
           <td class="pt-3-half"><?php echo $row['to_date']; ?></td>
          <td class="pt-3-half"><?php echo $row['booked_date']; ?></td>
          <td>
              <span class="table-editable"><?php echo $row['status']; ?>  </span>
          </td>
          
              <td>
                  <?php if($row['status'] != 'Approved'): ?>
                  <form method="post" action="">
                      <input value="<?php echo $row['id']; ?>" name="approveid" hidden="hidden">
                      <input type="submit" name="approve" class="btn btn-success" style="font-size:8px" value="Approve">
                  </form>
                  <?php endif; ?>
              </td>
              <td>
                  <?php if($row['status'] != 'Denied'): ?>
                  <form method="post" action="">
                      <input value="<?php echo $row['id']; ?>" name="denyid" hidden="hidden">
                      <input type="submit" name="deny" class="btn btn-info" style="font-size:8px"value="Deny">
                  </form>
                  <?php endif; ?>
              </td>
              <td>  
                  <form method="post" action="">
                      <input value="<?php echo $row['id']; ?>" name="delete" hidden="hidden">
                      <input type="submit" name="deletereq" class="btn btn-danger" style="font-size:10px" value="Delete">
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
<!-- Classic tabs -->
        </div>
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
