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
        <div class="col-md-8">
          <div class="my-3 p-3 bg-body rounded shadow-sm">
            <h6 class="border-bottom pb-2 mb-0">Recent updates</h6>
          
          <style>
          
          .text-gray-dark-link{
            color:#6A2CD8;
          }
          
          </style>
            <?php  
                while($notice = mysqli_fetch_assoc($GETNOTICES)){
                  echo '<div class="d-flex text-muted pt-3">
                  <p class="pb-3 mb-0 small lh-sm" >
                    <strong class="d-block" ><a class="text-gray-dark-link" href="ViewNotice.php?view='.$notice['id'].'"><strong>'.$notice['notice_title'].'</strong></a></strong>
                    Posted On: '.$notice['timestamp'].' 
                    <br/>
                    <br/>
                   
                    <hr/>
                  </p>
                </div>';
                }
   
            ?>
            <small class="d-block text-end mt-3">
              <a class="text-gray-dark-link" href="AllNotices.php">View More</a>
            </small>
          </div>
        </div>

      </div>
    </div>

<!-- Cards -->
<div class="container mt-4">
  <h4 class="box-heading">Time Table</h4>
  <div class="form-group row">  
  <div class="col-md-5">
    <input class="form-control" type="date" value="2020-06-01" id="timetable-date-input">
  </div>
 <div class="col-md-7">
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

$GETASSIGNMENTS = mysqli_query($db,"SELECT * FROM assignments ORDER BY(id) DESC LIMIT 3");
            
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
       
       <a class="text-gray-dark-link" href="ViewAssignment.php?viewassignment='.$assignment['id'].'" class="btn btn-sm btn-outline-primary">View</a>
         
     </div>

   </div>';

    }

  }



}


?>

      
      
     

</div>
            <p class="text-center">
              <a type="button" href="AllAssignments.php" class="btn btn-warning">View More</a>
            </p>
    
    <style>
      #download-icon{
        font-size: 40px;
        margin-bottom: 10px;
        color: #6A2CD8;
      }
    </style>
<div class="container mt-5">
<h4 class="box-heading">OTHER LINKS</h4>
<div class="alert alert-light mt-4  p-0" role="alert">
  <div class="row p-4">
     <div class="col-md-12 shadow p-4">
      <p id="assignment-title">

      <span><i id="download-icon" class="fas fa-cloud-download-alt"></i></span><br/>
      RESOURCES & DOWNLOADS SECTION
      </p>
      <a href="resources.php" type="button" class="btn btn-outline-info btn-sm">Visit</a>
      </div>
    
  </div>
  
</div>

<br/>
<br/>
<br/>
<br/>
<br/>
<br/>

<?php include('templates/footer.php'); ?>