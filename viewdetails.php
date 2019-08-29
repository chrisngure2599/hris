 <?php include 'connect.php';
 include 'server.php';
            $results = mysqli_query($db, "SELECT * FROM house where user_id=".$user_id);
   
  $row= mysqli_fetch_array($results);
            ?>

       
<html lang="en">
    <html lang="en">
    <head>
    
 <title></title>
 <style type="text/css">
     .align {
         margin-left:25%;
         text-align: center;
       
     }
 </style>
    </head>
<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-10">
                <h3 class="atc">House Details</h3>
                </div>
                <div class="col-lg-2">
                </div> 
                <hr>
            </div>
            <!-- /.col-lg-12 -->
        </div>
    <div class="panel panel-primary">
        <div class="panel-heading">
            Room Information
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
                  <div class="row">
           <div class="col-lg-12">

               <div class="form-group ">
                   <h3 style="text-align:center">   <label>Type:</label>
              <span ><?php echo $row['type']; ?></span>
                  </h3>
           </div>
        </div>
       </div>
    
        <div class="row">
        <div class="col-lg-12">

            <div class="col-lg-4">
                <div class="form-group ">
                    <label>Hostel:</label>
                   <span><?php echo $row['price_per_time']; ?></span>

                </div>

            </div>
            <div class="col-lg-4">
                <div class="form-group ">
                    <label>Floor Number:</label>
                    <span><?php echo $row['house_description']; ?></span>

                </div>

            </div>
            <div class="col-lg-4">
                <div class="form-group ">
                    <label>Capacity:</label>
                    <span><?php echo $row['price_per_time']; ?></span>

                </div>

            </div>

        </div>
    </div>
            <div class="row">
                <div class="col-lg-12">
              <div class="col-lg-4">
                <div class="form-group ">
                    <label>Status:</label>
                    <span><?php echo $row['location']; ?></span>

                </div>

            </div>
               </div>
                </div>
              <div class="row">
                <div class="col-lg-12">
   

               </div>
                </div>
            
    
</div>
  
                   
        </div>
       </div>

      <div class="row">
           <div class="col-lg-12">

                   <div class="panel-footer">


                   </div>
        </div>
       </div>
     </div>
            </div>



</div>

</div>
    </body>
    </html>