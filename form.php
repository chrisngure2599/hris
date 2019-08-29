<!DOCTYPE html>
<html lang="en" class="full-height">
<?php include('image.php') ?>
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
  	<?php include('errors.php'); ?>
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
  	  <button type="submit" class="btn" name="add">Add House</button>
  	</div>
  	
  </form>
    </div>
    
    <div class="col-md-4">
                
    </div>
    
</div>
           
       
</body>
</html>