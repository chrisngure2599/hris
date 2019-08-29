<?php include('server.php') ?>
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
   
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM info WHERE id=$id");

		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$name = $n['name'];
			$address = $n['address'];
		}
	}

$results = mysqli_query($db, "SELECT * FROM users"); ?>
    
	<form method="post" action="" 
              <!-- Editable table -->
<div class="card">
  <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Clients</h3>
  <div class="card-body">
    <div id="table" class="table-editable">
      
      <table class="table table-bordered table-responsive-md table-striped text-center">
       <thead class="black white-text">
        <tr>
          <th class="text-center">#</th>
          <th class="text-center">User Name</th>
          <th class="text-center">First Name</th>
          <th class="text-center">Last Name</th>
          <th class="text-center">Email</th>
          <th class="text-center">Gender</th>
          <th class="text-center">Date Of Birth</th>
          <th class="text-center">Country</th>
          <th class="text-center">City</th>
          <th class="text-center">Type</th>
          <th class="text-center">Date</th>
           
          <th class="text-center">Edit</th>
          <th class="text-center">Delete</th>
       </thead>
        </tr>
        <?php while ($row = mysqli_fetch_array($results)) { ?>
        <tr>
            <td class="pt-3-half" contenteditable="true"><?php echo $row['id']; ?></td>
          <td class="pt-3-half" contenteditable="true"><?php echo $row['username']; ?></td>
          <td class="pt-3-half" contenteditable="true"><?php echo $row['firstname']; ?></td>
          <td class="pt-3-half" contenteditable="true"><?php echo $row['lastname']; ?></td>
          
          <td class="pt-3-half" contenteditable="true"><?php echo $row['email']; ?></td>
          <td class="pt-3-half" contenteditable="true"><?php echo $row['gender']; ?></td>
          <td class="pt-3-half" contenteditable="true"><?php echo $row['dob']; ?></td>
          <td class="pt-3-half" contenteditable="true"><?php echo $row['country']; ?></td>
          <td class="pt-3-half" contenteditable="true"><?php echo $row['city']; ?></td>
          <td class="pt-3-half" contenteditable="true"><?php echo $row['type']; ?></td>
          <td class="pt-3-half" contenteditable="true"><?php echo $row['joining_date']; ?></td>
          
<!--          <td class="pt-3-half">
            <span class="table-up"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-up" aria-hidden="true"></i></a></span>
            <span class="table-down"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-down"
                  aria-hidden="true"></i></a></span>
          </td>-->
          <td>
              <span class="table-editable"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0"><a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a></button></span>
          </td>
          <td>
            <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0"><a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn"> Remove</a></button></span>
          </td>
        </tr>
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
