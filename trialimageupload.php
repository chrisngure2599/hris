<!DOCTYPE html>
<html lang="en" class="full-height">
<?php include('bookseva.php') ?>
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

   <body class="">

        <div class="container-fluid">  
        <div class="row"> 
            <div class="col-md-4">
                
            </div>
            <div class="col-md-4 header">
                <h2>Add House</h2>
            </div>
            <div class="col-md-4">
                
            </div>
        
        </div> 
             <div class="row">
  <div class="col-md-4">
                
  </div>  
    
    
    <div class="col-md-4">

        <form method="post" action="">
  	<?php //include('errors.php'); ?>
       <form  action="" method="POST">
           
      <div class="modal-body mx-3">
      <?php include 'connect.php';
       $result = mysqli_query($db, "SELECT users.*, house.* FROM users, house WHERE users.id = house.user_id"); 
       $row = mysqli_fetch_array($result);
      ?>
 
          
          <label for="defaultFormNameModalEx">House Type</label>
            <input type="text" id="defaultFormNameModalEx" class="form-control form-control-sm" name="house_type" value="<?php echo $row['type']; ?>">
           <br>
            <label for="defaultFormNameModalEx">client name</label>
            <input type="text" id="defaultFormNameModalEx" class="form-control form-control-sm" name="client_name" value="<?php echo $row['username']; ?>">
            <br>
            <div class="form-row">
            <div class="form-group col-md-6">
      <label for="inputCity">From</label>
      <input type="date" class="form-control" id="inputCity" name="from_date">
    </div>
    <!-- Default input -->
    <div class="form-group col-md-6">
      <label for="inputZip">To</label>
      <input type="date" class="form-control" id="input"  name="to_date">
    </div>
  </div>
            <br>
            <label for="defaultFormNameModalEx">Cost</label>
            <input type="text" id="defaultFormNameModalEx" class="form-control form-control-sm" name="cost" value="<?php echo $row['price_per_time']; ?>">
             <br>
<!--            <label for="defaultFormNameModalEx">total days</label>
            <input type="text" id="defaultFormNameModalEx" class="form-control form-control-sm">-->
            <input type="hidden" id="defaultFormNameModalEx" class="form-control form-control-sm" name="house_id" value="<?php echo $row['id']; ?>">
            <input type="hidden" id="defaultFormNameModalEx" class="form-control form-control-sm" name="owner_id" value="<?php echo $row['id']; ?>">
            <input type="hidden" id="defaultFormNameModalEx" class="form-control form-control-sm" name="cutomer_id" value="<?php echo $row['id']; ?>">
            
           
 </div>
      
            
 <div class="input-group">
     <button class="btn btn-indigo" type="submit" name="submit">Book <i class="fas fa-paper-plane-o ml-1"></i></button>
  
 </div></form>
      
 
  	
  	 
  	
 
    
    <div class="col-md-4">
                
    </div>
    
</div>
           
       
</body>
</html>