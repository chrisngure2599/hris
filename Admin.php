
<?php 
 include 'connect.php';
$user_id = $_SESSION['user_id'];
if(!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])){
    header('Location: rental.php');
}

   include 'includes/head.php';
?>
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
 
    <li class="nav-item ml-auto p-0">
       <a class="nav-link  " href="register.php" style="color:orangered" style="font-size:11px;font-family:cursive;"><?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname']; ?> <i class="fas fa-user fa-3x"></i>
       </a>
    </li> </ul>
         <!--Navbar links-->
            <ul class="nav navbar-nav nav-flex-icons ml-auto">

               <li class="nav-item">
                   <a class="nav-link waves-light active show white btn btn-floating" id="profile-tab-classic-shadow" style="font-size:9px"data-toggle="tab" href="#profile-classic-shadow"
                       role="tab" aria-controls="profile-classic-shadow" aria-selected="true"><i class="fas fa-users"></i>View Users</a>
               </li>

               <li class="nav-item">
                <a class="nav-link waves-light white btn btn-floating" id="contact-tab-classic-shadow" style="font-size:9px"data-toggle="tab" href="#contact-classic-shadow"
               role="tab" aria-controls="contact-classic-shadow" aria-selected="false"><i class="fas fa-home"></i>View Houses</a>
              </li>
              <li class="nav-item">
                 <a class="nav-link waves-light white btn btn-floating" id="awesome-tab-classic-shadow"style="font-size:9px" data-toggle="modal" data-target="#sideModalTRSuccessDemo" href="#"
                  role="tab" aria-controls="awesome-classic-shadow" aria-selected="false"><i class="fas fa-user"></i>Profile</a>
             </li>
              <li class="nav-item">
                 <a class="nav-link waves-light white btn btn-floating" data-toggle="modal" style="font-size:9px"data-target="#sideModalTRSuccessDemo1" href="register.php"
                  role="tab" aria-controls="awesome-classic-shadow" aria-selected="false"><i class="fas fa-user-plus"></i>Register</a>
                  
             </li>
     
                
    <li class="nav-item">
        <a class="nav-link waves-light white btn btn-floating" style="font-size:9px" data-target="#" href="logout.php">
                    <i class="fas fa-sign-out-alt blue-text"></i> Logout</a></li>
</ul>
        
            <!--/Navbar links-->
        </div>

      </div>
    </nav>
   
    <!-- Navbar -->
    </header>


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
          <li class="nav-item">
             <a href="login.php" class="waves-effect waves-light btn btn-white btn-flat btn-sm">
              <i class="fas fa-sign-in-alt mr-1 blue-text"></i> Login / Register</a>

          </li>

               <li class="nav-item">
                   <a class="nav-link waves-light active show white btn btn-floating" id="profile-tab-classic-shadow" style="font-size:9px"data-toggle="tab" href="#profile-classic-shadow"
                       role="tab" aria-controls="profile-classic-shadow" aria-selected="true"><i class="fas fa-users"></i>View Users</a>
               </li>

               <li class="nav-item">
                <a class="nav-link waves-light white btn btn-floating" id="contact-tab-classic-shadow" style="font-size:9px"data-toggle="tab" href="#contact-classic-shadow"
               role="tab" aria-controls="contact-classic-shadow" aria-selected="false"><i class="fas fa-home"></i>View Houses</a>
              </li>
              <li class="nav-item">
                 <a class="nav-link waves-light white btn btn-floating" id="awesome-tab-classic-shadow"style="font-size:9px" data-toggle="modal" data-target="#sideModalTRSuccessDemo" href="#"
                  role="tab" aria-controls="awesome-classic-shadow" aria-selected="false"><i class="fas fa-user"></i>Profile</a>
             </li>
              <li class="nav-item">
                 <a class="nav-link waves-light white btn btn-floating" data-toggle="modal" style="font-size:9px"data-target="#sideModalTRSuccessDemo1" href="register.php"
                  role="tab" aria-controls="awesome-classic-shadow" aria-selected="false"><i class="fas fa-user-plus"></i>Register</a>
                  
             </li>
     
                
    <li class="nav-item">
        <a class="nav-link waves-light white btn btn-floating" style="font-size:9px" data-target="#" href="logout.php">
                    <i class="fas fa-sign-out-alt blue-text"></i> Logout</a></li>
</ul>
         
        </ul>
      </div>
    </div>
  </nav>
</header>

    <!--Main Navigation-->
 <div class="row my-5 m-0">
        <div class="col-md-12 container"
<!-- Classic tabs -->
<div class="classic-tabs mt-3 p-2">

  <div class="tab-content card " id="myClassicTabContentShadow">
    <div class="tab-pane fade active show p-3" id="profile-classic-shadow" role="tabpanel" aria-labelledby="profile-tab-classic-shadow">

            <?php 
  
   $query =  "SELECT * FROM users ";
   /*
   if(isset($_POST['submit'])){
       $search = $_POST['search'];
       if(!empty($search)){
            $query = $query . " WHERE username LIKE '%$search%' 0R firstname LIKE '%$search%' 0R lastname LIKE '%$search%' 0R "
                    . "email LIKE '%$search%' 0R password LIKE '%$search%' 0R gender LIKE '%$search%' 0R dob LIKE '%$search%' 0R "
                    . "country LIKE '%$search%' 0R city LIKE '%$search%' 0R type LIKE '%$search%'";

       }
    }
    * 
    */
    $results = mysqli_query($db, $query); ?>
        <!-- 
        type LIKE '%$search%' 0R number_of_rooms LIKE '%$search%' 0R location LIKE '%$search%' 0R status LIKE '%$search%'"
               . " 0R house_description LIKE '%$search%' OR price_per_time LIKE '%$search%' 0R  minimum_time LIKE '%$search%' 0R time_type LIKE '%$search%'
        -->

        <form method="post" action="" class="mt-5">
              <!-- Editable table -->
<div class="card">
<!--  <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Clients</h3>-->
  <div class="card-body">
    <div id="table" class="round">
    
      <table id="dtVerticalScrollExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="90%">
          <thead class="cyan lighten-4" style="font-size:6px">
           <th scope="row">#</th>
          <th scope="row">User Name</th>
          <th scope="row">First Name</th>
          <th scope="row">Last Name</th>
          <th scope="row">Email</th>
          <th scope="row">Gender</th>
          <th scope="row">Date Of Birth</th>
          <th scope="row">Country</th>
         <th scope="row">City</th>
          <th scope="row">Type</th>
         <th scope="row">Date</th>
           
     <th class="th-sm">Edit</th>
          <th class="th-sm">Delete</th>
       </thead>
        <?php $num=1; ?>
        <?php while ($row = mysqli_fetch_array($results)) { ?>
        <tr>
            <td class="pt-3-half" ><?php echo $num; ?> </td>
          <td class="pt-3-half" ><?php echo $row['username']; ?></td>
          <td class="pt-3-half" ><?php echo $row['firstname']; ?></td>
          <td class="pt-3-half" ><?php echo $row['lastname']; ?></td>
          <td class="pt-3-half" ><?php echo $row['email']; ?></td>
          <td class="pt-3-half" ><?php echo $row['gender']; ?></td>
          <td class="pt-3-half" ><?php echo $row['dob']; ?></td>
          <td class="pt-3-half" ><?php echo $row['country']; ?></td>
          <td class="pt-3-half" ><?php echo $row['city']; ?></td>
          <td class="pt-3-half"><?php echo $row['type']; ?></td>
          <td class="pt-3-half"><?php echo $row['joining_date']; ?></td>
          

          <td>
              <span class="table-editable"><button type="button"   style="font-size:8px" class="btn btn-info  btn-rounded btn-sm my-0"><a href="edit.php? id=<?php echo $row['id']; ?>" class="edit_btn" name="edit" >Edit</a></button></span>
          </td>
<!--          <td>
            <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0"><a onClick="return confirm('Are you sure you want to delete this')" href="eedit.php? id=<?php echo $row['id']; ?>" class="del_btn"> Remove</a></button></span>
          </td>-->
           <td>
             <button type="button" class="btn btn-danger"   style="font-size:8px" data-toggle="modal" data-target="#modalConfirmDelete<?php echo $row['id']; ?>"> Remove</button> 
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
        <p class="heading">Are you sure you want to delete this user?</p>
      </div>

      <!--Body-->
      <div class="modal-body">

        <i class="fas fa-times fa-4x animated rotateIn"></i>

      </div>

      <!--Footer-->
      <div class="modal-footer flex-center">
         
         <a  type="button" href="eedit.php? id=<?php echo $row['id']; ?>" class="btn  btn-outline-danger"> Remove</a>
<!--          <a href="housedelete.php? id=<?php echo $row['id']; ?>" class="btn  btn-outline-danger">Yes</a> -->
        <a type="button" class="btn  btn-danger waves-effect" data-dismiss="modal">No</a>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
        
        </tr>
        
        <?php
        $num++; ?>
       <?php } ?>
       </table>
    </div>
  </div>
</div>
              
       </form>  
       </p>
      
    </div>
  <div class="tab-pane fade p-3" id="follow-classic-shadow" role="tabpanel" aria-labelledby="follow-tab-classic-shadow">
    <div class="row">
  <div class="col-md-4">
                
  </div>  
         <div class="col-md-4">
             <?php include('server.php') ?>
        <form method="post" action=""  enctype="multipart/form-data">
  	<?php include('errors.php'); ?>
            <div class="row"> 
            <div class="col-md-4">
                
            </div>
            <div class="col-md-12 header">
                <h2>Add User</h2>
            </div>
            <div class="col-md-4">
                
            </div>
        
        </div> 
      <div class="input-group">
  	  <label>First Name</label>
  	  <input type="text" name="firstname" value="">
  	</div>
       <div class="input-group">
  	  <label>Last Name</label>
  	  <input type="text" name="lastname" value="">
  	</div>
      
      
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
      <div class="input-group">
  	  <label>Date of birth</label>
          <input type="date" name="dob" value="">
  	</div>
      <div class="input-group">
  	  <label>Gender</label>
          <select name="gender" class="input-box">
              <option>Male</option>
              <option>Female</option>
          </select>
  	</div>
      <div class="input-group">
  	  <label>City</label>
  	  <input type="text" name="city">
  	</div>
      <div class="input-group">
  	  <label>Country</label>
  	  <input type="text" name="country">
  	</div>
        <div class="input-group">
  	  <label>Type</label>
          <select name="type" class="input-box">
              <option>Tenants</option>
              <option>Landlord</option>
          </select>
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	
  </form>
   
    </div>

         </div></div>-->
    <div class="tab-pane fade p-3" id="contact-classic-shadow" role="tabpanel" aria-labelledby="contact-tab-classic-shadow">
        <p>
            <div class="card">
<!--  <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Clients</h3>-->
<div class="card-body"></div>
    <div id="table" class="round">
      <table id="dtVerticalScrollExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="90%">
           <thead class="cyan lighten-4">
           <?php 
            $results = mysqli_query($db, "SELECT * FROM house"); ?>
       <form method="post" action="" >
<!--      <table id="dtVerticalScrollExample" class="table table-striped table-bordered table-sm " cellspacing="0" width="90%">
          <thead class="cyan lighten-4">-->
           
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
         
       </thead>
        <?php $num=1; ?>
        <?php while ($row = mysqli_fetch_array($results)) { ?>
        <tr>
            <td class="pt-3-half" ><?php echo $num; ?> </td>
            <td class="pt-3-half" ><img style="width:50px; height: 50px; border-radius: 50%" src="uploads/<?php echo $row['house_image']; ?>"</td>
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
            <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0"><a onClick="return confirm('Are you sure you want to delete this?')" href="deedit.php? id=<?php echo $row['id']; ?>" class="del_btn"> Remove</a></button></span>
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
    
   <div class="modal fade right" id="sideModalTRSuccessDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" data-backdrop="true">
    <div class="modal-dialog modal-content text-center modal-notify modal-success" role="document">
      <!--Content-->
      <div class="modal-content">
        <!--Header-->
        <div class="modal-header" style="background-color:gray;"> 
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
    </div>
  </div>
  </div>
</div>
 
    <div class="modal fade right" id="sideModalTRSuccessDemo1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" data-backdrop="true">
    <div class="modal-dialog modal-notify modal-info" role="document">
      <!--Content-->
      <div class="modal-content">
        <!--Header-->
        <div class="modal-header"  style="background-color:gray;">
          <p class="heading lead">Add New User!</p>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="white-text">&times;</span>
          </button>
        </div>
<!-- Default form contact -->
        <form class="text-center border border-light p-5"  method="post" action="">
            <?php include('errors.php'); ?>

    <p class="h4 mb-4"></p>

    <!-- Name -->
    <input type="text" id="defaultContactFormName" class="form-control mb-4" placeholder="First Name" name="firstname" required="required">
    <input type="text" id="defaultContactFormName" class="form-control mb-4" placeholder="Last Name" name="lastname">
    <input type="text" id="defaultContactFormName" class="form-control mb-4" placeholder="User Name" name="username" value="<?php echo $username; ?>">
    <input type="date" id="defaultContactFormName" class="form-control mb-4" placeholder="Date of Birth" name="dob">
    <select class="browser-default custom-select mb-4" name="gender">
        <option value="" disabled>Gender</option>
        <option value="1" selected>Male</option>
        <option value="2">Female</option>
       </select>
   <input type="email" id="defaultContactFormEmail" class="form-control mb-4" placeholder="E-mail" name="email" value="<?php echo $email; ?>">
   <input type="tel" id="defaultContactFormName" class="form-control mb-4" placeholder="tel" name="phone">
    <input type="password" id="defaultContactFormPassword" class="form-control validate mb-4" placeholder="Password" name="password_1">
    <input type="password" id="defaultContactFormName" class="form-control validate mb-4" placeholder="Repeat Password" name="password_2">
     <input type="text" id="defaultContactFormName" class="form-control mb-4" placeholder="City" name="city">
     <input type="text" id="defaultContactFormName" class="form-control mb-4" placeholder="Country" name="country">

    <!-- Subject -->
    <select class="browser-default custom-select mb-4" name="type">
        <option value="" disabled>Type</option>
        <option >Tenants</option>
        <option>Landlord</option>
      </select>
<!-- Send button -->
    <button class="btn btn-btn-block" type="submit" name="reg_user">Send</button>
</form>
<!-- Default form contact -->
 <!--Footer-->
        <div class="modal-footer justify-content-center">
          
          </a>
          <a type="button" class="btn btn-outline-success waves-effect" data-dismiss="modal">No, thanks</a>
        </div>
      </div>
      <!--/.Content-->
    </div>
  </div>
<!-- Classic tabs -->
        </div>
   
     <?php include('includes/footer.php'); ?>
  
  <!--Modal: Login / Register Form Demo-->
  <div class="modal fade" id="modalLRFormDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal" role="document">
      <!--Content-->
      <div class="modal-content">

        <!--Modal cascading tabs-->
        <div class="modal-c-tabs"></div></div></div></div>

       
                       <?php 
                      //  include 'server.php';
                      // include 'errors.php'; 
                      include 'includes/scripts.php'; ?>
</body>

</html>
