 <?php

if (isset($_POST['booknow'])) {
    include 'connect.php';
  include_once 'check.php';

    $house_type = mysqli_real_escape_string($db, $_POST['house_type']);
     $client_name= mysqli_real_escape_string($db, $_POST['client_name']);
     $from_date= mysqli_real_escape_string($db, $_POST['from_date']);
     $to_date = mysqli_real_escape_string($db, $_POST['to_date']);
     $cost=  mysqli_real_escape_string($db,$_POST['cost']);
     $house_id=  mysqli_real_escape_string($db,$_POST['house_id']);
     $owner_id=  mysqli_real_escape_string($db,$_POST['owner_id']);
     $customer_id=mysqli_real_escape_string($db,$_POST['cutomer_id']);
    //include business logic to validate data
    if ($from_date!="" && $to_date!=""){
        //create insert query statement
//        $query="insert into booking values ('',
//            '$house_type','$client_name','$from_date','$cost','$owner_id','$house_id'
//            '$to_date',Now())";
        $query1="INSERT INTO `booking` (`id`, `house_id`, `cutomer_id`, `owner_id`, `booked_date`, `from_date`, `to_date`, `house_type`, `client_name`, `cost`) "
                . "VALUES (NULL, '$house_id', '$customer_id', '$owner_id', CURRENT_TIMESTAMP, '$from_date', '$to_date', '$house_type', '$client_name', '$cost');";
        //execute query
        $result=mysqli_query($db, $query1);
        if ($result) {
            $qy = "UPDATE house SET status = 'Booked' WHERE id = '$house_id'";
            $res =mysqli_query($db, $qy);
            if ($res) {
                header('location: my_bookings.php');
                echo "Data saved successfully!";
            }  else {
                echo mysqli_error($db);
            }
        }  else {
            echo mysqli_error($db);
        }
    }  else {
        echo "Please, fill in all fields";
    }
}
          
            
    



