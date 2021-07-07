<?php
include('api/db.php');
include('includes/filter.php');
include('Controller/MainLogic.php');

if(isset($_GET['viewassignment'])){

    $assignment = filterData($_GET['viewassignment']);

    $GETASSIGNMENT = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM assignments WHERE id ='$assignment'"));

    $getSubject = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM subjects WHERE id = ".$GETASSIGNMENT['assignment_subject'].""));

    $getteacher = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM teachers WHERE id = ".$getSubject['teacher_assigned']." "));
    


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
                <h4 class="box-heading mb-4"><?php echo $GETASSIGNMENT['assignment_title']; ?></h4>
                <span>Assignment Subject: <strong><?php echo $getSubject['subject_name']; ?></strong> </span>
                <span>Uploaded By: <strong><?php echo $getteacher['teacher_name']; ?></strong> </span>

                <span>Submission Deadline: <strong><?php echo $GETASSIGNMENT['enddate']; ?></strong> </span>
                <hr/>
                <p class="mt-4"><?php echo $GETASSIGNMENT['details']; ?></p>
   
                </div>
            </div>

        </div>
        <?php
include('templates/footer.php'); 

?>