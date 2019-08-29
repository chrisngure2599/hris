
    <div class="tab-pane fade p-3" id="contact-classic-shadow" role="tabpanel" aria-labelledby="contact-tab-classic-shadow">
      <?php 
   include 'connect.php';
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