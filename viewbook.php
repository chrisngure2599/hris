<?php //include('server.php') ?>
<!DOCTYPE html>
<html lang="en" class="full-height">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
   
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="css/mdb.min.css" rel="stylesheet">
        <!-- Your custom styles (optional) -->
        <link href="css/style.css" rel="stylesheet">
    </head>

</head>

<body>
    <?php 
   include 'connect.php';
$results = mysqli_query($db, "SELECT * FROM booking"); ?>
    
	<form method="post" action="" 
              <!-- Editable table -->
<div class="card">
  <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Clients</h3>
  <div class="card-body">
    <div id="table" class="table-editable">
      
      <table class="table table-bordered table-responsive-md table-striped text-center">
       <thead class="black white-text">
           
          <th class="text-center">#</th>
          
          <th class="text-center">Client Name</th>
          <th class="text-center">House Type</th>
          
          <th class="text-center">Cost</th>
          <th class="text-center">From</th>
          <th class="text-center">To</th>
          <th class="text-center">Booked Date</th>
          
       </thead>
        <?php $num=1; ?>
        <?php while ($row = mysqli_fetch_array($results)) { ?>
        <tr>
            <td class="pt-3-half" contenteditable="true"><?php echo $num; ?> </td>
          <td class="pt-3-half" contenteditable="true"><?php echo $row['client_name']; ?></td>
          <td class="pt-3-half" contenteditable="true"><?php echo $row['house_type']; ?></td>
          <td class="pt-3-half" contenteditable="true"><?php echo $row['cost']; ?></td>
          <td class="pt-3-half" contenteditable="true"><?php echo $row['from_date']; ?></td>
          
          <td class="pt-3-half" contenteditable="true"><?php echo $row['booked_date']; ?></td>
          
          

          <td>
              <span class="table-editable"><button type="button" class="btn btn-info  btn-rounded btn-sm my-0"><a href="edit.php? id=<?php echo $row['id']; ?>" class="edit_btn" name="edit" >Accept</a></button></span>
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
    <!-- Footer -->
    
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Initializations -->
    <script type="text/javascript">
        // Animations initialization
        new WOW().init();
    </script> 
</body>
</html>
