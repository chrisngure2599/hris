
     <header>

    <nav class="navbar navbar-expand-lg navbar-light fixed-top default-nav bg-white" style="height:65px;height: auto;color: black;z-index: 1000;">
       <div class="container">
       <a class="navbar-brand js-scroll-trigger" href="index.php"><img src="../img/icon.jpg" alt="logo" style='height:55px;width: 70px'> House Rental Information System</a>
       <!-- Brand -->

      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto my-2 my-lg-0">
 
    <li class="nav-item ml-auto p-0">
       <a class="nav-link  " href="register.php" style="color:orangered" style="font-size:11px;font-family:cursive;"><?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname']; ?> <i class="fas fa-user fa-3x"></i>
       </a>
    </li> </ul>

         <!--Navbar links-->
            <ul class="nav navbar-nav nav-flex-icons ml-auto">

               <li class="nav-item">
                   <a class="nav-link waves-light active show white btn btn-floating" id="profile-tab-classic-shadow" style="font-size:9px"data-toggle="tab" 
                   href="viewusers.php"
                       role="tab" aria-controls="profile-classic-shadow" aria-selected="true"><i class="fas fa-users"></i>View Users</a>
               </li>

               <li class="nav-item">
                <a class="nav-link waves-light white btn btn-floating" id="contact-tab-classic-shadow" style="font-size:9px"data-toggle="tab" 
                href="Houses.php"
               role="tab" aria-controls="contact-classic-shadow" aria-selected="false"><i class="fas fa-home"></i>View Houses</a>
              </li>
         
     
                
    <li class="nav-item">
        <a class="nav-link waves-light white btn btn-floating" style="font-size:9px" data-target="#" 
        href="../logout.php">
                    <i class="fas fa-sign-out-alt blue-text"></i> Logout</a></li>
</ul>
        
            <!--/Navbar links-->
        </div>

      </div>
    </nav>
   
    <!-- Navbar -->
    </header>