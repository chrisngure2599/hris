
 <?php 
 include 'connect.php';
 include 'includes/head.php';
 include('bookseva.php');
$user_id = $_SESSION['user_id'];
$user_country = $_SESSION['country'];
$paypalUrl="https://www.paypal.com/cgi-bin/webscr";

	$paypalId='chuwamary95@gmail.com';
    
    $vat = '$sum * 0.1';
    $sum = '$sum + $total';
    
    $gtotal = '$sum + $vat';
   
   $payment = '$gtotal * 0.00043';
    
 
?>
<body>

 <!--Main Navigation-->
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
             <a href="login.php" class="waves-effect waves-light btn btn-white btn-flat btn-sm" style="color:orangered" >
              <i class="fas fa-sign-in-alt mr-1 blue-text"></i> Login / Register</a>

          </li>
         <li class="nav-item">
            <a class="nav-link  " href="register.php">Bookings</a>
          </li>
          <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="login.php">View</a>
          </li>
            
      </ul>
    </div>
  </div>
</nav>
</header>


   <div class="row my-3 m-0">
        <div class="col-md-12 container">
<!-- Classic tabs -->
<div class="classic-tabs mt-3 p-2">

  <div class="tab-content w3-cared " id="myClassicTabContentShadow">
       <p>
          <?php
            $results = mysqli_query($db, "SELECT booking.*, users.*, house.*, house.id as house_id, house.type as htype  FROM booking"
                    . " LEFT JOIN users on booking.cutomer_id = users.id"
                    . " RIGHT JOIN house on booking.house_id = house.id"
                    . " WHERE booking.cutomer_id='$user_id' AND booking.status = 'Approved'");
            
            ?>
       
              <!-- Editable table -->
<div class="card">
      
<!--  <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Clients</h3>-->
  <div id="table" >
      <table  class="table-scroll-vertical table-bordered table-striped text-center table-sm" cellspacing="2" width="100%">
       <thead class="cyan lighten-4 black-text" style="font-size:29px">
          <th class="text-center" scope="row">#</th>
          <th class="text-center" scope="row">Image</th>
          <th class="text-center" scope="row">Type</th>
          <th class="text-center" scope="row"> Rooms</th>
          <th class="text-center" scope="row">Location</th>
          <th class="text-center" scope="row">Price@Room</th>
          <th class="text-center" scope="row">Minimal Time</th>
          <th class="text-center"scope="row">Time type</th>
          <th class="text-center" scope="row">Date</th>
          <th class="text-center" scope="row"> Description</th>
          <th class="text-center" scope="row">Status</th>
        </thead>
        <?php $num=1; ?>
        <?php while ($row = mysqli_fetch_array($results)) {
            $house_id =  $row['house_id']; ?>
        <tr>
          <td class="pt-3-half" ><?php echo $num; ?> </td>
          <td class="pt-3-half" ><img style="width:50px; height: 50px; border-radius: 50%" src="uploads/<?php echo $row['house_image']; ?>"</td>
          <td class="pt-3-half" ><?php echo $row['htype']; ?></td>
          <td class="pt-3-half" ><?php echo $row['number_of_rooms']; ?></td>
          <td class="pt-3-half" ><?php echo $row['location']; ?></td>
<!--          <td class="pt-3-half" ><?php echo $row['house_description']; ?></td>-->
          <td class="pt-3-half"><?php echo $row['price_per_time']; ?></td>
          <td class="pt-3-half" ><?php echo $row['minimum_time']; ?></td>
          <td class="pt-3-half" ><?php echo $row['time_type']; ?></td>
          <td class="pt-3-half"><?php echo $row['dateuploaded']; ?></td>
           <td>
              <button type="button" class="btn btn-primary" data-toggle="modal" style="font-size:8px" data-target="#modalRelatedContent<?php echo $row['id']; ?>">View</button>
          </td>
          <td class="pt-3-half">  <a class="nav-link waves-light white btn btn-floating" id="awesome-tab-classic-shadow" data-toggle="modal" data-target="#sideModalTRSuccessDemo<?php echo $row['house_id']; ?>" href="#"
                                                            role="tab" aria-controls="awesome-classic-shadow" aria-selected="false"><i class="fas fa-check"></i>Approved</a>
          <?php if(isset($_SESSION['country'])): ?>
         <?php if($_SESSION['country'] != 'Tanzania'): ?>
              <b>OR:</b>
             <button type="button" class="btn btn-primary" data-toggle="modal" style="font-size:8px" data-target="#sideModalTRSuccessDemos<?php echo $row['house_id']; ?>">Pay Now!</button>
          <?php endif; ?>
         <?php endif; ?>
             </td>
                <div class="modal fade modal-bottom-right" id="sideModalTRSuccessDemos<?php echo $row['house_id']; ?>" tabindex="-1" role="dialog"
  aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-success modal-bottom-right modal-notify modal-info" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <p class="heading">Pay</p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">

        <div class="row">
<!--          <div class="col-12">
            <img style="width:700px; height: 100%; border-radius: 5%" src="uploads/<?php echo $row['house_image'];?>"
              class="img-fluid" alt="">
          </div>-->
<div class="col-12">
        <b><label>House  Type:</label></b>
                    <span><?php echo $row['htype']; ?></span>
                    <br>
              <b><label>Price:</label></b>
                   <span>TSH.<?php echo $row['price_per_time']; ?></span>
                   <br>
                     <?php
                        $total = $row['price_per_time'] *1;
                        //echo $total;
                          $sum=$total*1;
                             ?>
                    <form action=" <?php echo $paypalUrl; ?>" target="_blank" method="post" name="frmPayPal1">
					<div class="panel price panel-red">
                                            <b><label>Sub Total</b>
                                            :</label>
                                <b><span>TSH. </b><?php echo $sum; ?></span><br>
                           <b> <span>VAT</span></b>
                                <span>:</span>
                                <span>10%(TSH.<?php echo $vat = $sum * 0.1; ?>)</span><br>
                            
                                <b><label>Grand Total</label></b>
                                <span>:</span>
                                <span>TSH. 
                                    <?php 
                                    $vat = $sum * 0.1;
                                    $gtotal = $sum + $vat;
                                    echo $gtotal;
                                     ?>
                              </span><br>
                            <b><label>Converted to US Dollar</label></b>
                                <span>:</span>
                               <span>USD.
                                    <?php
                                     $payment = $gtotal * 0.00043;
                                     echo $payment; ?></span>
                                     <input type="hidden" name="business" value="<?php echo $paypalId; ?>">
				     <input type="hidden" name="cmd" value="_xclick">
				     <input type="hidden" name="item_name" value="It Solution Stuff">
			            <input type="hidden" name="amount" value="<?php echo $payment; ?>">
				    <input type="hidden" name="no_shipping" value="1">
				    <input type="hidden" name="currency_code" value="USD">
				    <input type="hidden" name="cancel_return" value="http://demo.itsolutionstuff.com/paypal/cancel.php">
				    <input type="hidden" name="return" value="http://demo.itsolutionstuff.com/paypal/successess.php">  
                                         <div class="panel-body text-center">
							<p class="lead" style="font-size:20px"><strong></strong></p>
						</div>
						<div class="panel-footer">
							<button class="btn btn-lg btn-block btn-info" href="" >Pay NOW!</button>
						</div>
					</div>
                                     </div>
                                 </form>
                   
        </div>
        </div>
      </div>
    </div>
    <!--/.Content-->
  
</div>
             
             
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
             
        <div class="modal fade right" id="sideModalTRSuccessDemo<?php echo $row['house_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" data-backdrop="true">
    <div class="modal-dialog modal-content text-center modal-notify modal-success" role="document">
      <!--Content-->
      <div class="modal-content">
        <!--Header-->
        <div class="modal-header" style="background-color:#3F729B;"> 
            <p class="heading lead"> Congratulations  <?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname']; ?>
                your request has been accepted here are details of the houser owner 
                </p>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true" class="white-text">  close &times;</span>
          </button>
        </div>
        <!--Body-->
        <div class="modal-body">
          <div class="text-left">
              <?php 
   include 'connect.php'; 
   $result = mysqli_query($db, "SELECT house.*, users.*, house.type as htype  FROM house RIGHT JOIN users ON (users.id = house.user_id) WHERE house.id=$house_id"); 
             ?>
      <?php while ($row = mysqli_fetch_array($result)) { ?>
          <p> <b>house Owner Name:</b><?php echo $row['firstname'];?> <?php echo $row['lastname']; ?> </p>
          <p><b> Email:</b><?php echo $row['email']; ?></p>
         <p><b>Phone:</b> <?php echo $row['phone']; ?></p>
         <p><b>House Type:</b> <?php echo $row['htype']; ?></p>
          <p>

 
 <?php } ?>
          </p>
        
   </div>
        </div>
         </div>
      <!--/.Content-->
    </div>
  </div>
         
        <?php
        $num++; ?>
       <?php } ?>
 </tr>
  </table>
    </div>
  </div>
    </div></div>
      
    </div>
    <div class="tab-pane fade p-3" id="follow-classic-shadow" role="tabpanel" aria-labelledby="follow-tab-classic-shadow">
    <div class="row">
  <div class="col-md-4">
 </div>  
 </div>
  </div>
</div>
<?php include_once 'includes/footer.php';?>
    <?php include_once 'includes/scripts.php';?>
     </div>
    </div> 
    </body>
</html>
