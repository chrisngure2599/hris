<?php
     
      	
include("connect.php");
include 'head.php';
     
if(isset($_GET['search'])) // If it's submitted 
    { 
    
    $yoursearch = ($_GET['search_house']); // Clean my input 
     
   // $searchQuery="SELECT * FROM product WHERE product_name LIKE '%".$yoursearch."%' "; // mySql query 
    $searchQuery=("SELECT * FROM house WHERE type LIKE '%".$yoursearch."%' OR house_description LIKE '%".$yoursearch."%'OR location LIKE '%".$yoursearch."%'ORDER BY id ASC LIMIT 20;");
                    
    $results = mysqli_query($db,$searchQuery) or die(mysqli_error()); // If query fail, let me know the error 
    if(mysqli_affected_rows($db)==0) // If no match found 
    echo "<p style='color:#fff;'>{$yoursearch} is not in our database.</p>"; // Let me know it is'nt found in the table 
    else 
        { 
        echo "<p style='color:#fff;'>{$yoursearch} was successfully searched.</p>"; // Yes, the query worked 
        while($row=mysqli_fetch_array($results)) // Loop through the query results 
        {
        $house_id=$row['id'];
        $image=$row['house_image'];
	$type=$row['type'];
	$location=$row['location'];
        $house_description=$row['house_description'];
//              echo "<tr class='table'>";
//               echo "<td style='padding-top:15px;'><img height='100px' width='100px' src='uploads/".$image."'></td>";
//                echo "<td style='padding-top:10px;'>".$type."</td>";
//		echo "<td style='padding-top:15px;'>".$location."</td>";
//                echo "<td style='padding-top:15px;'><a href='houseDetails1.php?id=".$house_id."><input type='button' class='btn btn-outline-sungura' name='add' value='DETAILS'></a></td>"; 
//                echo "</tr>"; 
                ?>
                <div class="row mb-4 wow fadeIn">
                   <div class="col-lg-4 col-md-12 mb-4">

                        <!--Card-->
                        <section class="text-center"> 
                        <div class="card">

                            <!--Card image-->
                            <div class="view overlay">
                                <img src="uploads/<?php echo $image; ?>" class="card-img-top" alt="" style="height: 200px">
                    <!--Card content-->
                             <div class="card-body">
                                <!--Title-->
                                <h4 class="card-title"><?php echo $type; ?></h4>
                                <!--Text-->
                                 <p class="card-text"><?php echo $house_description; ?></p>
                                <a href="houseDetails1.php?id=<?php echo $house_id; ?>"class="btn btn-gray9 btn-md">
                                    <p class="card-text"><?php echo $house_description; ?></p>View details
                                    
                                </a>
                             </div></section>
                        
                        

                        </div>
                        <!--/.Card-->

                    </div>
                    
                        <?php } 
                    }
                   
                    
                    }
                        ?> 
          
