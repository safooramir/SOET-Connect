<?php 
include('api/db.php');
include('Controller/MainLogic.php');
include('templates/header.php'); 

?>



<div class="container">
 
  <div class="row welcome-container shadow-sm p-3 bg-body rounded mt-4">
            <div class="col-md-8">
            <h4 id="departmentWelcome"><?php echo $DEPARTMENTNAME; ?></h4>
                <p><?php echo $SEMESTERNAME; ?></p>
                <a class="text-light" href="logout.php">Change</a>
            </div>
  
   </div>

   <!-- Recent updates container -->

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="my-3 p-3 bg-body rounded shadow-sm">
            <h6 class="border-bottom pb-2 mb-0">All Updates</h6>
          

            <?php

            
                while($notice = mysqli_fetch_assoc($GETALLNOTICES)){
                  echo '<div class="d-flex text-muted pt-3">
          
                  <p class="pb-3 mb-0 small lh-sm" >
                    <strong class="d-block text-gray-dark">'.$notice['notice_title'].'</strong>
                    Posted On: '.$notice['timestamp'].' 
                    <br/>

                    <br/>
                    <a href="ViewNotice.php?view='.$notice['id'].'">Read Full</a>
                    <hr/>
          
                  </p>
                  
                </div>';
                }
              
             

            ?>
            
          
          </div>
        </div>
     

      </div>
    </div>





<?php include('templates/footer.php'); ?>