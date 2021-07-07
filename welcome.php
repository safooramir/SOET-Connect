<?php 

include('api/db.php');
include('includes/filter.php');
include('Controller/welcome.php');

if(isset($_SESSION['LOGGEDSTATUS'])){
  header('location: index.php');
  exit();
}



?>
<!DOCTYPE html>
<html lang="en">
<head>

 

  

    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#6A2CD8">


    <link rel="manifest" href="manifest.json">
   <link rel="apple-touch-icon" href="assets/logo.png">

    <!-- Bootstrap Include -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Own Stylesheet -->

    <link rel="stylesheet" href="assets/css/stylesheet.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300&display=swap" rel="stylesheet">
    <!-- Document Title -->
    
    <meta property="og:title" content="SoET Connect" />
    <meta property="og:description" content="School Of Engineering and Technology Connect" />

    <title>SoET Connect</title>
</head>
<body id="index-page-container">

<div>
    <div class="container selection-container shadow p-3 bg-body rounded pb-5 mt-4">
        <div class="row mt-5 p-2">
            <div class="col-md-3"></div>
            <div class="col-md-6 selection-container-data fw-bolder text-center">
                <img src="assets/images/onBoardingImage.svg" style="height: 150px;" alt="">
                <h3 id="soetConnectHeader">SoET Connect</h3>
                <p>Welcome to SoET Connect</p>
              
                <?php include('includes/dialog.php'); ?>
                
                  <!-- Form Starts -->
                <form name="WelcomeForm" method="POST" action="welcome.php" class="mt-5">
                <div class="form-group"> 
                <select name="department" id="departmentSelect" class="form-control select-input" required>
                    <?php

                      $querydepartment = mysqli_query($db,"SELECT * FROM departments");
                      while($department = mysqli_fetch_assoc($querydepartment)){
                        echo '<option value="'.$department['id'].'">'.$department['department_name'].'</option>';
                      }

                    ?>
                </select>
                </div>

                <div class="form-group">  
                    <select name="semester" id="#" class="form-control select-input" >
                    <?php

                            $querysemester = mysqli_query($db,"SELECT * FROM semesters");
                            while($semester = mysqli_fetch_assoc($querysemester)){
                              echo '<option value="'.$semester['id'].'">'.$semester['semester'].'</option>';
                            }

                            ?>
                    </select>
                </div>
                    <button name="WelcomeForm"  class="btn btn-warning">Submit</button>
                </form> 
             <!-- Form Ends -->
            </div>

           
            <div class="col-md-3"></div>
        </div>
        <a href="login/">Login To Admin Panel</a>

    </div>
  
</div>
<!--  JavaScript Starts -->

<!-- jQuery JavaScript -->


<script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>


<!-- Boostrap JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous"></script>

<script>

if ("serviceWorker" in navigator) {
  // register service worker
  navigator.serviceWorker.register("service-worker.js");
}

</script>

</body>
</html>