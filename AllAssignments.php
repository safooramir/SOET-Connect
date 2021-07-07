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

  <div class="row" id="time-table-row"> 

    <!-- <div class="col-md-4 p-2">
      
      
      <div class="notice p-4">
        <span class="badge badge-warning">10:20 PM To 11:20 PM</span>

        <p id="time-table-subject-head">Theory Of Automata <br/><span>(PCC-CSE-302)</span></p> 
        
        <p class="image-and-text-tt"><img class="img-thumbnail rounded-circle" style="height:30px ;" src="https://via.placeholder.com/150"/> <a href="#">Mr. Gourav Sharma</a></p>
        
      </div>
    </div> -->
 
  </div>
 
</div>



<div class="container mt-5">
<h4 class="box-heading">UPCOMING ASSIGNMENTS</h4>
    <div class="row">

     
      <?php

$GETASSIGNMENTS = mysqli_query($db,"SELECT * FROM assignments ORDER BY(id)");
            
while($assignment = mysqli_fetch_assoc($GETASSIGNMENTS)){

  $CurrentAssignment = $assignment['assignment_subject'];

  $getSubject = mysqli_query($db,"SELECT * FROM subjects WHERE id = '$CurrentAssignment'");

  while($disp = mysqli_fetch_assoc($getSubject)){

    if($disp['department'] == $DEPARTMENT && $disp['semester'] == $SEMESTER){

      $getteacher = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM teachers WHERE id = ".$disp['teacher_assigned']." "));
      


      echo '  <div class="col-md-4 p-4">  <div class="alert alert-light mt-4 shadow assignment-card" role="alert">
      <h6>'.$disp['subject_name'].'</h6>
      <span>'.$disp['subject_code'].'</span>
       <hr/>
      <p id="assignment-title">'.$assignment['assignment_title'].'</p>
      <p id="assignment-teacher"><i class="fas fa-user"></i> <a href="ViewTeacher.php?teacher='.$getteacher['id'].'">'.$getteacher['teacher_name'].'</a></p>
      <p id="assignment-teacher" class="text-danger"><i class="fas fa-calendar-check"></i> '.$assignment['enddate'].'</p>
       
       <a href="ViewAssignment.php?viewassignment='.$assignment['id'].'" class="btn btn-sm btn-outline-primary">View</a>
         
     </div>

   </div>';

    }

  }



}


?>


</div>
     
<?php include('templates/footer.php'); ?>