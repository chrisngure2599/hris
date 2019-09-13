<?php 
include_once '../connect.php';
//include_once '../connect.php';
include_once 'nav.php';
    include 'sec.php';

 ?>
                       <?php 
                    
                    $query = "SELECT * FROM house WHERE status = 'Available'";
                    $result = mysqli_query($db, $query);
                    if(mysqli_num_rows($result) > 0){
                      ?>
                      <div><h1 align="center" class="w3-dark-grey" >Available houses</h1></div>
                      <?php
                    while($row = mysqli_fetch_assoc($result)){
                        extract($row);
                       
                    ?>

                    <!--Grid column-->
                    <div class="col-lg-4 col-md-12 ">

                        <!--Card-->
                        <div class="card">

                            <!--Card image-->
                            <div class="view overlay">
                                <img src="../uploads/<?php echo $house_image; ?>" class="card-img-top" alt="" style="height: 200px">
                               <a href="houseDetails.php?id=<?php echo $id; ?>">
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>

                            <!--Card content-->
                             <div class="card-body">
                                <!--Title-->
                                <h4 class="card-title"><?php echo $type; ?></h4>
                                <!--Text-->
                                 <p class="card-text"><?php echo $house_description; ?></p>
                                <a href="houseDetails.php?id=<?php echo $id; ?>" class="btn btn-gray9 btn-md">View details
                                    
                                </a>
                            </div>

                        </div>
                        <!--/.Card-->

                    </div>
                    
                        <?php } 
                    }else{
                    ?>
                    <div class="text-danger" role="alert"><i>No house available!</i></div>
                    <?php
                    }
                        ?>
                </div>