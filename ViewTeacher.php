<?php 
include('api/db.php');
include('includes/filter.php');
include('Controller/MainLogic.php');

if(isset($_GET['teacher'])){

    $teacher = filterData($_GET['teacher']);

    $TeacherQuery = mysqli_query($db,"SELECT * FROM teachers WHERE id ='$teacher'");

    $TeacherDetails = mysqli_fetch_assoc($TeacherQuery);

    if(mysqli_num_rows($TeacherQuery) < 1){
        header('location: index.php');
        exit();
    }


}else{

    header('location: index.php');
    exit();
}


include('templates/header.php'); 

?>
<style>


.row{
  margin-top: 40px;
}


.header {
  padding: 20px;
  margin: 20px;
  background: #f5f5f5;
}

.list-group {
    list-style: disc inside;

}

.list-group-item {
    display: list-item;
}

 .find-more{
   text-align: right;
 }


.label-theme{
  background: #3AAA64;
  font-size: 14px;
  padding: .3em .7em .3em;
  color: #fff;
  border-radius: .25em;
}

.label a{
  color: inherit;
}

</style>
<div class="container">
 
  <div class="row welcome-container shadow-sm p-3 bg-body rounded mt-4">
            <div class="col-md-8">
            <h4 id="departmentWelcome"><?php echo $DEPARTMENTNAME; ?></h4>
                <p><?php echo $SEMESTERNAME; ?></p>
                
            </div>
  
   </div>
</div>
<!-- ******HEADER****** -->
<div class="container">
<header class="header">
    <div class="container">
      <div class="teacher-name" style="padding-top:20px;">
        <div class="row" style="margin-top:0px;">
        <div class="col-md-9">
          <h3 style="font-size:20px"><strong><?php echo $TeacherDetails['teacher_name']; ?></strong></h3>
        </div>
        <div class="col-md-3">
          <div class="button" style="float:right;">
          </div>
        </div>
        </div>
      </div>

      <div class="row" style="margin-top:20px;">
        <div class="col-md-3"> <!-- Image -->
          <a href="#"> <img class="rounded-circle" src="images/<?php echo $TeacherDetails['image']; ?>" alt="Kamal" style="width:200px;height:200px"></a>
        </div>

        <div class="col-md-6 p-2"> <!-- Rank & Qualifications -->
          <h5 style="color:#3AAA64"><?php echo $TeacherDetails['designation']; ?></h5>
          <p><?php echo $TeacherDetails['shortbio']; ?></p>
        </div>

        <div class="col-md-3 text-center"> <!-- Phone & Social -->
          <span class="number" style="font-size:18px">Phone:<strong><?php echo $TeacherDetails['phone']; ?></strong></span>
          <span class="number" style="font-size:18px">Email:<strong><?php echo $TeacherDetails['teacher_email']; ?></strong></span>
          <div class="button" style="padding-top:18px">
            <a href="tel:<?php echo $TeacherDetails['phone']; ?>" class="btn btn-outline-info btn-block">Call</a>
          </div>
          <div class="button" style="padding-top:18px">
            <a href="mailto:<?php echo $TeacherDetails['teacher_email']; ?>" class="btn btn-outline-success btn-block">Send Email</a>
          </div>
         
        </div>
      </div>
    </div>
  </header>
</div>


  <div class="container">

<!-- Section:Biography -->
  <div class="row">
        <div class="col-md-12">
          <div class="card card-block text-xs-left p-4">
            <h4 class="card-title" style="color:#009688"><i class="fa fa-user fa-fw"></i>Biography</h4>
            <div style="height: 15px"></div>
              <p><?php echo $TeacherDetails['details']; ?></p>
          </div>
        </div>
      </div>
<!-- End:Biography -->
<!--Section:Interests-->
<div class="row">
    <div class="col-md-12">
        <div class="card card-block">
          <h4 class="card-title p-3"  style="color:#009688"><i class="fa fa-rocket fa-fw"></i>Subjects</h4>
          <ul class="list-group" style="margin-top:15px;margin-bottom:15px;">
          <?php
            $get_subjects = mysqli_query($db,"SELECT * FROM subjects WHERE teacher_assigned = ".$TeacherDetails['id']." ");

            while($subject = mysqli_fetch_assoc($get_subjects)){
                echo '<li class="list-group-item">'.$subject['subject_name'].'</li>';
            }
          ?>
            
            
          </ul>
        </div>
    </div>
  </div>
<!-- End :Interests -->



</div> <!--End of Container-->


<?php include('templates/footer.php'); ?>