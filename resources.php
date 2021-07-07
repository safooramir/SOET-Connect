<?php 
include('api/db.php');
include('Controller/MainLogic.php');
include('templates/header.php'); 

?>



<div class="container mt-5">
<h4 class="box-heading">DOWNLOADS</h4>
    <div class="row">

     
      <?php

$Query = mysqli_query($db,"SELECT * FROM downloads WHERE department = '$DEPARTMENT' OR department = 0");

            

  while($disp = mysqli_fetch_assoc($Query)){


      echo '  <div class="col-md-4 p-4">  <div class="alert alert-light mt-4 shadow assignment-card" role="alert">
      <h6>'.$disp['file_title'].'</h6>
       <hr/>
     
       <a href="downloads/'.$disp['file_link'].'" class="btn btn-sm btn-outline-primary">Download</a>
         
     </div>

   </div>';


  }





?>


</div>
     
<?php include('templates/footer.php'); ?>