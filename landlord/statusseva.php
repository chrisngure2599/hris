<?php
    
    include 'connect.php';

    if(isset($_POST['approve'])){
        $id = $_POST['approveid'];
        $qury1="UPDATE `booking` SET `status` = 'Approved' WHERE `booking`.`id` =". $id;
        $result = mysqli_query($db, $qury1);
        if($result){
           mysqli_error($db);
        }else{
            mysqli_error($db);
        }
    }
    if(isset($_POST['deny'])){
        $deny_id = $_POST['denyid'];
        $query = "UPDATE booking SET status = 'Denied' WHERE id = '$deny_id'";
        $result = mysqli_query($db, $query);
        if($result){
            echo "<script>window.alert('Suggestion denied');</script>";
        }else{
//            echo "<script>window.alert('Faild');</script>";
        mysqli_error($db);
        }
    }
    if(isset($_POST['deletereq'])){
        $id = $_POST['delete'];
       $query="delete from booking where id='$id'";
        $result = mysqli_query($db, $query);
        if($result){
            echo "<script>window.alert('Suggestion deleted succcessifull');</script>";
        }else{
            echo "<script>window.alert('Faild');</script>";
        }
    }
?>