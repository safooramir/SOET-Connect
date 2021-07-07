<?php
include('api/db.php');
include('includes/filter.php');
include('Controller/MainLogic.php');

if(isset($_GET['view'])){

    $notice = filterData($_GET['view']);

    $GETNOTICE = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM notice WHERE id ='$notice'"));

}else{
    header('location: index.php');
    exit();
}

include('templates/header.php'); 

?>


<div class="container">
<div class="container mb-4">
 
 <div class="row welcome-container shadow-sm p-3 bg-body rounded mt-4">
           <div class="col-md-8">
           <h4 id="departmentWelcome"><?php echo $DEPARTMENTNAME; ?></h4>
               <p><?php echo $SEMESTERNAME; ?></p>
               
           </div>
 
  </div>
</div>

            <div class="row">
                <div class="col-lg-10 mx-auto card p-4">
                <h4 class="box-heading"><?php echo $GETNOTICE['notice_title']; ?></h4>
                <span>Posted On: <?php echo $GETNOTICE['timestamp']; ?></span>
                   
                <p class="mt-4"><?php echo $GETNOTICE['upload_data']; ?></p>
   
                </div>
            </div>

        </div>
        <?php
include('templates/footer.php'); 

?>