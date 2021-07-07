<?php
include('api/db.php');
include('includes/filter.php');
include('Controller/MainLogic.php');
include('templates/header.php'); 

?>

<style>



.filter-result .job-box {
  -webkit-box-shadow: 0 0 35px 0 rgba(130, 130, 130, 0.2);
          box-shadow: 0 0 35px 0 rgba(130, 130, 130, 0.2);
  border-radius: 10px;
  padding: 10px 35px;
}

ul {
  list-style: none; 
}

.list-disk li {
  list-style: none;
  margin-bottom: 12px;
}

.list-disk li:last-child {
  margin-bottom: 0;
}

.job-box .img-holder {
  height: 65px;
  width: 65px;
  background-color: #4e63d7;
  background-image: -webkit-gradient(linear, left top, right top, from(rgba(78, 99, 215, 0.9)), to(#5a85dd));
  background-image: linear-gradient(to right, rgba(78, 99, 215, 0.9) 0%, #5a85dd 100%);
  font-family: "Open Sans", sans-serif;
  color: #fff;
  font-size: 22px;
  font-weight: 700;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  border-radius: 65px;
}

.career-title {
  background-color: #4e63d7;
  color: #fff;
  padding: 15px;
  text-align: center;
  border-radius: 10px 10px 0 0;
  background-image: -webkit-gradient(linear, left top, right top, from(rgba(78, 99, 215, 0.9)), to(#5a85dd));
  background-image: linear-gradient(to right, rgba(78, 99, 215, 0.9) 0%, #5a85dd 100%);
}

.job-overview {
  -webkit-box-shadow: 0 0 35px 0 rgba(130, 130, 130, 0.2);
          box-shadow: 0 0 35px 0 rgba(130, 130, 130, 0.2);
  border-radius: 10px;
}

@media (min-width: 992px) {
  .job-overview {
    position: -webkit-sticky;
    position: sticky;
    top: 70px;
  }
}

.job-overview .job-detail ul {
  margin-bottom: 28px;
}

.job-overview .job-detail ul li {
  opacity: 0.75;
  font-weight: 600;
  margin-bottom: 15px;
}

.job-overview .job-detail ul li i {
  font-size: 20px;
  position: relative;
  top: 1px;
}

.job-overview .overview-bottom,
.job-overview .overview-top {
  padding: 35px;
}

.job-content ul li {
  font-weight: 600;
  opacity: 0.75;
  border-bottom: 1px solid #ccc;
  padding: 10px 5px;
}

@media (min-width: 768px) {
  .job-content ul li {
    border-bottom: 0;
    padding: 0;
  }
}

.job-content ul li i {
  font-size: 20px;
  position: relative;
  top: 1px;
}
.mb-30 {
    margin-bottom: 30px;
}
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

            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="career-search mb-60">
                       

                        <div class="filter-result">

                        <?php

                        $ALLSTAFF = mysqli_query($db,"SELECT * FROM teachers WHERE teacher_department = '$DEPARTMENT' ");

                        while($staff = mysqli_fetch_assoc($ALLSTAFF)){
                            echo '   <div class="job-box d-md-flex align-items-center justify-content-between mb-30">
                            <div class="job-left my-4 d-md-flex align-items-center flex-wrap">
                                <div >
                                    <img class="img-holder mr-md-4 mb-md-0 mb-4 mx-auto mx-md-0 d-md-none d-lg-flex" src="images/'.$staff['image'].'" alt="">
                                </div>
                                <div class="job-content">
                                    <h5 class="text-center text-md-left">'.$staff['teacher_name'].'</h5>
                                    <ul class="d-md-flex flex-wrap text-capitalize ff-open-sans">
                                    <li class="mr-md-4">
                                    <i class="zmdi zmdi-pin mr-2"></i>'.$staff['designation'].'
                                </li>  
                                   
                                    </ul>
                                </div>
                            </div>
                            <div class="job-right my-4 flex-shrink-0">
                                <a href="ViewTeacher.php?teacher='.$staff['id'].'" class="btn d-block w-100 d-sm-inline-block btn-light">View Profile</a>
                            </div>
                        </div>';
                        }

                        ?>


                        </div>
                    </div>

   
                </div>
            </div>

        </div>
        <?php
include('templates/footer.php'); 

?>