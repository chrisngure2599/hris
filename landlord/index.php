<?php 
include_once 'connect.php';
include_once 'check.php';
?>

<?php


  include 'connect.php';
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
  include 'statusseva.php';

?>
<!DOCTYPE html>
<html lang="en">

<?php include 'nav.php';?>

<body>

    <!--Main Navigation-->
    <header>
          <!-- Navbar -->
 

  <?php include_once 'viewhouses.php'; ?>
    </div>
    <!--Footer-->
<?php include '../includes/scripts.php';?>
    <?php include '../includes/footer.php';?>
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
