
<nav class="navbar fixed-top navbar-expand-lg scrolling-navbar teal darken-3">
            <div class="container-fluid">

            <!-- Brand -->
            <img src="img/icon.jpg" height="20%" width="5%" style=" border-radius: 60px;">
            <strong class="white-text" style="font-family:cursive;">House Rental Information System</strong>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="nav tabs-cyan black-text mx-auto-justify-content-center"  id="myClassicTabShadow" role="tablist">


            <li class="nav-item">
            <a class="nav-link  waves-light active show white btn btn-floating" id="profile-tab-classic-shadow" 
            href="viewhouses.php"><i class="fas fa-home"></i>View Houses</a>
            </li>
            <li class="nav-item">
            <a class="nav-link waves-light white btn btn-floating" id="follow-tab-classic-shadow"  href="addhouse.php"
             style="font-size:9px" ><i class="fas fa-home"></i><i class="fas fa-plus"></i>Add Houses</a>
            </li>
            <li class="nav-item">
            <a class="nav-link waves-light white btn btn-floating" id="contact-tab-classic-shadow" data-toggle="tab" href="#contact-classic-shadow"
            role="tab" aria-controls="contact-classic-shadow" aria-selected="false" style="font-size:9px"><i class="fas fa-address-book"></i>
            Booked Houses</a>
            </li>
            <li class="nav-item">
                   <a class="nav-link waves-light white btn btn-floating" id="awesome-tab-classic-shadow" data-toggle="modal" data-target="#sideModalTRSuccessDemo" href="#"
                    role="tab" aria-controls="awesome-classic-shadow" aria-selected="false" style="font-size:9px"><i class="fas fa-user"></i>Profile</a>
               </li>
            </ul>

               <ul class="nav tabs-cyan black-text mx-auto-justify-content-center"   id="myClassicTabShadow" role="tablist">
                  <li class="nav-item ml-auto p-0">
            <p class="nav-link waves-light white-text" style="font-size:15px"><?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname']; ?> <i class="fas fa-user fa-1x"></i>
            </p>

                      <a class="waves-effect waves-light " style="font-size:10px"  data-target="#" href="logout.php">
                            <i class="fas fa-sign-in-alt mr-1 black-text"></i> Logout</a>
                </li> 

              </ul>
             
            </div>

            </div>
    </nav>
    <!-- Navbar -->
    </header>
    <!--Main Navigation--><!-- JQuery -->
<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="../js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="../js/mdb.min.js"></script>
<!-- Initializations -->
<script type="text/javascript">
    // Animations initialization
    new WOW().init();
</script>
<script type="text/javascript">
$(document).ready(function () {
$('#dtHorizontalExample').DataTable({
"scrollX": true
});
$('.dataTables_length').addClass('bs-select');
});
</script>
<!--- the CSS-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>House Rental</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="../css/style.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    
    
</head>
<div class="row my-5 m-0">
        <div class="col-md-12 container">
    <div class="classic-tabs mt-3 p-2">