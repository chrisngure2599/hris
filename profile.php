<?php

include 'connect.php';

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
       

</head>
<body>        
<div class="container">
<div class="sellform">
    <form method="POST" action="" enctype="multipart/form-data">
        <div class="entry" id="sellform">
            <h1 id="sellheading">POST PRODUCTS </h1>
        <div class="form-group">
            <div class="row">
                <div class="col-2">
                </div>    
                
                 
                <div class="col-2">
                </div> 
            </div>

            <div class="row">
               <div class="col-2">
                </div> 
                <div class="col-4"> 
                <input type="file" class="form-control-file" name="image" placeholder=""/>
                </div>
                <div class="col-2">
                </div> 
            </div>
            <div class="row">
                <div class="col-2">
                </div> 
                <div class="col-4">
                    <input type="submit" class="btn btn-primary" name="post" placeholder="" value="Post" id="postbtn"/>
                </div>
                <div class="col-2">
                </div> 
            </div>
        </div>
        </div>  
    </form>
</div>
</div>
</body>
</html>


<?php
if(isset($_POST['post'])){

$target ="uploads/".basename($_FILES['image']['name']);
$image = $_FILES['image']['name'];
$count=5;
for($i=0;$i<=$count;$i++){
    
$query = "INSERT INTO house_images VALUES('','$image','')";
$result = mysqli_query($db, $query);
if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
}
 
}
        IF($result){
                echo "<script>alert('You have successfully Posted ');</script>";
        }
 else {
     echo "<script>alert('You have Not successed');</script>";
            echo mysqli_error($db);
 }
 }?>
