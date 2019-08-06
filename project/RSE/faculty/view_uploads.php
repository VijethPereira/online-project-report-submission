<?php
/**
 * Created by PhpStorm.
 * User: your name
 * Date: todays date
 * Time: todays time
 */
define('DIR', '../');
require_once DIR . 'config.php';

$control = new Controller();  
$control->notLogged('faculty', '../index');
$faculty = new Faculty();
$id = $_GET['id'];
$res = $faculty->getPhasebyid($id);

$marks = $res['marks'];

$y = Date('Y');
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <?php $control->getAdminCSS(DIR); ?>
</head>
<body>
	

    <?php $control->sessionMessage(); ?>
     <!--  <div class="loader-wrapper">
        <div class="loader spinner-3">
            <div class="bg-primary"></div>
            <div class="bg-primary"></div>
            <div class="bg-primary"></div>
            <div class="bg-primary"></div>
            <div class="bg-primary"></div>
            <div class="bg-primary"></div>
            <div class="bg-primary"></div>
            <div class="bg-primary"></div>
            <div class="bg-primary"></div>
        </div>
    </div> -->
    
    <div class="wrapper">
        <!-- Main Container -->
        <div id="main-wrapper" class="menu-fixed page-hdr-fixed">
            <!-- Menu Wrapper -->
            <?php $control->getFacultysidebar(DIR); ?>
            <?php $control->getFacultytopbar(DIR); ?>
            <!-- Page header -->

            <!-- Main Page Wrapper -->
            <div class="page-wrapper">
                <!-- Page Title -->
                
                <!-- <div class="page-title">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <h2 class="page-title-text">Uploads</h2>
                        </div>
                        <div class="col-sm-6 text-right">
                            <div class="breadcrumbs">
                                <ul>
                                    <li><a href="#">Home</a></li>
                                    <li>View Uploads</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> -->
                
                <div class="page-body">



                    <?php $control->sessionMessage(); ?>

                    <div class="row" id="res">


                     <div class="col-md-12">
                         <h2 style="font-family: fantasy;" class="text-center"><?php echo $res['phase_type']; ?> - <?php echo $res['description']; ?></h2>
                     </div>


                     <?php
                     $result = $faculty->getPhaseuploadbyid($id);
                     while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                        $bid = $row['batch_id'];
                        $correction_status = $row['correction_status'];
                        $project_status = $row['project_status'];
                        $correction_marks = $row['correction_marks'];
                        $status = $row['status'];
                        $rst = $faculty->getProBatch($bid);
                        $rest = $faculty->getProtitle($rst['title_id']);
                        ?> 

                        <div class="col-md-12">
                            <div class="panel br-20x panel-default" style="        background-image: linear-gradient(to top,#fad0c4 0,#79fb74 100%);">
                                <div class="panel-head">
                                    <div class="panel-title"><i class="icon-layers panel-head-icon text-primary"></i>
                                        <span class="panel-title-text">Phase Title: <strong><?php echo $rest['name']; ?></strong></span>
                                    </div>
                                </div>
                                <div class="panel-wrapper">
                                    <div class="panel-body">
                                     <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Registration No.</th>
                                                <th>Name</th>
                                                <th>Department</th>
                                                <th>Year</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $stmt1 = $faculty->get_batch_student($row['batch_id']);
                                            while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {

                                                $res = $faculty->getStudentbyid($row1['student_id']);
                                                ?>
                                                <tr>
                                                    <td><?php echo $res['reg_no']; ?></td>
                                                    <td><?php echo $res['name']; ?></td>
                                                    <td><?php echo $res['dept']; ?></td>
                                                    <td><?php echo $res['syear']; ?></td>
                                                </tr>
                                                <?php } ?> 
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <?php 

                                            if ($project_status != "new") {
                                                ?>

                                                <h5 style="font-size: x-large;
                                            color: black;
                                            font-family: serif;">Marks Given <?php echo $correction_marks; ?> out of <?php echo $marks; ?></h5> 


                                                <?php
                                            }

                                             ?>
                                        </div>
                                        <div class="col-md-6 text-right">

                                            

                                            <?php 

                                            if ($project_status == "completed") {
                                                ?>

                                                <a href="#"  class="btn btn-warning btn-pill"> Completed Evaluation</a>


                                                <?php
                                            }else{

                                                if($status == 0 && $project_status == "new"){
                                                    ?>
                                                    <a href="../assets/upload/<?php echo $row['uploaded_file'] ?>" target="_blank" class="btn btn-primary btn-pill"> View Uploads</a>
                                                    <a href="evaluate_marks.php?id=<?php echo $id ?>&bid=<?php echo $row['id'] ?>"  class="btn btn-warning btn-pill"> Evaluate Marks</a>
                                                    <?php
                                                }else if($status == 2 && $project_status == "resubmit"){
                                                    ?>

                                                    <a href="../assets/upload/<?php echo $row['uploaded_file'] ?>" target="_blank" class="btn btn-primary btn-pill"> View Uploads</a>
                                                    <a href="evaluate_marks.php?id=<?php echo $id ?>&bid=<?php echo $row['id'] ?>"  class="btn btn-warning btn-pill"> Evaluate Marks</a>

                                                    <?php
                                                }else if($status == 1 && $project_status == "resubmit"){
                                                    ?>

                                                    <a href="#"  class="btn btn-danger btn-pill">Already Sent to Resubmit the Document</a>


                                                    <?php
                                                }
                                               
                                            }

                                             ?>

                                           
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <?php } ?>

                        
                    </div>

                </div>



            </div>
            <!-- Page Footer -->
            <div class="page-ftr">
                <div>© 2019. RSE</div>
            </div>
        </div>
        <!-- Sidebar Section -->
        <!-- End Sidebar Section -->
    </div>      

    <?php $control->getAdminJS(DIR); ?>


</body>
</html>