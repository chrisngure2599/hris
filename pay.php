<html lang="en">
<?php include_once 'includes/head.php';
 include('bookseva.php');?>
<body>
<?php 
session_start();
$user_id = $_SESSION['user_id'];
$user_country = $_SESSION['country'];
?>

<?php

	$paypalUrl="https://www.paypal.com/cgi-bin/webscr";

	$paypalId='chuwamary95@gmail.com';
    
    $vat = '$sum * 0.1';
    $sum = '$sum + $total';
    
    $gtotal = '$sum + $vat';
   
   $payment = '$gtotal * 0.00043';
    
 
?>

 <div class="main">
    <div class="content">
    	<div class="section group">
    	<div class="division">
         
            <table class="tblone">
                <?php include 'connect.php';
            $results11 = mysqli_query($db, "SELECT booking.*, users.*, house.*, house.id as house_id, house.type as htype  FROM booking"
                    . " LEFT JOIN users on booking.cutomer_id = users.id"
                    . " RIGHT JOIN house on booking.house_id = house.id"
                    . " WHERE booking.cutomer_id='$user_id' AND booking.status = 'Approved'");
            $num=1; 
         while ($row = mysqli_fetch_array($results11)) {
            $house_id =  $row['house_id']; 
             ?> <tr>
                 <th> #</th>
                                <th>House  Type </th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                            <tr>

                             <td><?php echo $num; ?></td>
                                <td><?php echo $row['htype']; ?></td>
                                <td>TSH. <?php echo $row['price_per_time']; ?></td>
                                 <td>
                            TSH. <?php
                        $total = $row['price_per_time'] *1;
                        echo $total;
                         ?></td>
                   <?php } ?>          </tr>
             </table>
            
                            <?php 
                          
                            $sum=$total*1;
                             ?>

            <form action=" <?php echo $paypalUrl; ?>" target="_blank" method="post" name="frmPayPal1">
					<div class="panel price panel-red">
                        <table class="tbltwo">
                            <tr>
                                <td>Sub Total</td>
                                <td>:</td>
                                <td>TSH. <?php echo $sum; ?></td>
                            </tr>
                            <tr>
                                <td>VAT</td>
                                <td>:</td>
                                <td>10%(TSH.<?php echo $vat = $sum * 0.1; ?>)</td>
                            </tr>
                            <tr>
                                <td>Grand Total</td>
                                <td>:</td>
                                <td>TSH. 
                                    <?php 
                                    $vat = $sum * 0.1;
                                    $gtotal = $sum + $vat;
                                    echo $gtotal;
                                     ?>
                                </td>
                            </tr>

                            <tr>
                                <td>Converted to US Dollar</td>
                                <td>:</td>
                                <td>USD.
                                    <?php
                                     $payment = $gtotal * 0.00043;
                                 echo $payment; ?></td>
                            </tr>
                            </table>
                        
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
							<button class="btn btn-lg btn-block btn-danger" href="" >Pay NOW!</button>
						</div>
					</div>
                                     </div>
                                 </form>
                             </div>
 		</div>
 	</div>

    
    
<!--   < a href="pay.php?id=<?php echo $row['id'];?>"><form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="6897W6SJ53ZB4">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_paynow_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>-->