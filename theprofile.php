<!DOCTYPE html>
<html>
    <head>
        
        <title>User Profile</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="css/form.css" />   
    </head>
    <body>
        
        <div id="profile">
            
        


<?php 
   include 'connect.php';
$results = mysqli_query($db, "SELECT * FROM users where id=1"); ?>
      <form method="post" action="" >
      
     <?php while ($row = mysqli_fetch_array($results)) { ?>
          <p> <b> Name:</b><?php echo $row['firstname'];?> <?php echo $row['lastname']; ?> </p>
         <p> <b>Username:</b><?php echo $row['username']; ?></p>
         <p><b>Email:</b> <?php echo $row['email']; ?></p>
       <b>Location:</b><?php echo $row['country']; ?></b></p>
    <b>Gender: </b> <?php echo $row['gender']; ?></td>
      <a href="edit.php"<b>edit your profile </b> </a></td>
    </form>
      <?php } ?>   </div>
    </body>
</html>