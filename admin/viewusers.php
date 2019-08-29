<?php
session_start();
 include '../connect.php';

$user_id = $_SESSION['user_id'];
if(!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])){
    header('Location: rental.php');
}

   include 'head.php';
?>
<body>

<?php include_once 'nav.php'; ?>
    <!--Main Navigation-->
 <div class="row my-5 m-0">
        <div class="col-md-12 container">
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