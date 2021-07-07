<?php
include('api/db.php');
include('includes/filter.php');
include('Controller/MainLogic.php');

if(isset($_GET['batch'])){
    $batch = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM batches WHERE batch_name = ".$_GET['batch']." AND batch_department = '$DEPARTMENT'"));


    $StudentQuery = mysqli_query($db,"SELECT * FROM students WHERE student_batch = ".$batch['id']." ORDER BY(id) ASC");

}else{

    $batch = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM batches WHERE batch_department = '$DEPARTMENT' ORDER BY(id) DESC LIMIT 1"));

    $StudentQuery = mysqli_query($db,"SELECT * FROM students WHERE student_batch = ".$batch['id']." ORDER BY(id) ASC");

}

include('templates/header.php'); 

?>

<style>

</style>
<div class="container">
<div class="container mb-4">
 
        <div class="row welcome-container shadow-sm p-3 bg-body rounded mt-4">
                <div class="col-md-8">
                <h4 id="departmentWelcome"><?php echo $DEPARTMENTNAME; ?></h4>
                    <p><?php echo $SEMESTERNAME; ?></p>
                    
                </div>
        
        </div>
        </div>

        <div class="container">
        <section id="tabs" class="project-tab">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                   

                        <form class="form-inline" name="sort" method="GET" action="students.php">
                        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Choose Batch</label>
                        <select name="batch" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">                            
                             <?php

                            $getbatches = mysqli_query($db,"SELECT * FROM batches WHERE batch_department = '$DEPARTMENT'");


                            while($d = mysqli_fetch_assoc($getbatches)){

                                echo '<option value="'.$d['batch_name'].'">'.$d['batch_name'].'</option>';
                                
                            }
                            ?>
                           
                        </select>

                        <button type="submit" class="btn btn-primary my-1">Submit</button>
                        </form>
                        <hr/>
                        
                        <p>Batch: <strong> <?php echo $batch['batch_name']; ?></strong></p>
                        <p>Semester: <strong><?php echo $batch['batch_semester']; ?></strong> </p>

    <div class="container mt-4">
	    <div class="row">
		    <table class="table table-hover table-striped">
		        <thead>
		        <tr class="thead-dark">
		            <th>Student Name</th>
		            <th>Student Roll No</th>
		            <th>Student Email</th>
		           
		        </tr>
		    </thead>
		        <tbody>
		            <?php

                    while($student = mysqli_fetch_assoc($StudentQuery)){
                        echo '<tr>
		                <td>
                        '.$student['student_name'].'
		                </td>
		                <td style="max-width:300px">
		                    <h6>'.$student['student_rollno'].'</h6>
		                    
		                </td>
		                <td>
                        '.$student['student_email'].'
		                </td>
		               
		            </tr>';
                    }

                    ?>

		           
		        </tbody>
		    </table>
            </div>
            </div>
                    </div>
                </div>
            </div>
        </section>

        </div>

           

</div>
</div>
        <?php
include('templates/footer.php'); 

?>