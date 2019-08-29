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
<!--          <input type="file" class="form-control-file" name="image" placeholder=""/>-->
          <input type="file" class="form-control-file" name="image" multiple >
  	</div>
      
        
  	<div class="input-group">
  	  <button type="submit" class="btn" name="add">Add House</button>
  	</div>
  	
  </form>
             
   
    </div>

         </div></div>