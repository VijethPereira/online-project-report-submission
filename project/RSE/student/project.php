<?php

define('DIR', '../');
require_once DIR . 'config.php';

$control = new Controller();  
$control->notLogged('student', '../index');
$student = new Student();
$res = $student->get_project_batch();
$phase = $res['phase'];
$sdate = $res['sdate'];
$edate = $res['edate'];
$faculty_id = $res['faculty_id'];
$date = Date('Y-m-d');

$batchid = $_SESSION['student'];
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
    <div class="wrapper">
        <div id="main-wrapper" class="menu-fixed page-hdr-fixed">
            <?php $control->getStudentsidebar(DIR); ?>
            <?php $control->getStudenttopbar(DIR); ?>
            <div class="page-wrapper">
                 <?php $control->sessionMessage(); ?>
                <br>
                    <div class="page-body">
                        <div class="row">
                            <div class="col-md-12">
                                <?php $result = $student->getTitle($res['title_id']) ?>
                                <?php $rest = $student->getTeacher($res['faculty_id']) ?>
                                <h2 style="font-family: fantasy;" class="text-center"><?php echo $result['name']; ?></h2>
                                <p style="font-family: monospace;" class=""><?php echo $result['description']; ?></p>
                                <h4 style="color: red;font-family: inherit;" class="text-center">Starting From <?php echo $res['sdate'] ?> to <?php  echo $res['edate'] ?></h4>
                                <h4 class="text-center">Project Guide: <?php echo $rest['name']; ?></h4>
                            </div>
                            <div class="col-md-12">
                                <h2 class="text-center">Students in Group</h2>
                            </div>
                            <?php
                                $stmt1 = $student->get_batch_student($res['batch_group']);
                                while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) 
                                {
                                    $res = $student->getStudentbyid($row1['student_id']);
                            ?>
                            <div class="col-sm-6 col-md-6 col-lg-4">
                                <div class="team-block">
                                    <div class="team-img">
                                        <img src="../assets/student/<?php echo $res['photo'] ?>" alt="">
                                    </div>
                                    <div class="team-container">
                                        <div class="team-details">
                                            <h3><?php echo $res['name']; ?></h3>
                                            <p><?php echo $res['reg_no']; ?> - <?php echo $res['dept']; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="col-md-12">
                                <h2 class="text-center">Project Phases</h2>
                            </div>
                            <?php
                                $stmt = $student->get_phase($phase);
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
                                {
                                    $phaseid = $row['id'];
                                    $phasemarks = $row['marks'];
                            ?> 
                            <div class="col-md-12">
                                <div class="panel br-20x panel-default" style="background-image: linear-gradient(to top,#fad0c4 0,#79fb74 100%);">
                                    <div class="panel-head">
                                        <div class="panel-title"><i class="icon-layers panel-head-icon text-primary"></i>
                                            <span class="panel-title-text">Phase Title: <strong><?php echo $row['description']; ?>_<?php echo $row['phase_type']; ?></strong></span>
                                        </div>
                                        <div>
                                            <a href="../assets/phase/<?php echo $row['attachment'] ?>" target="_blank" class="btn btn-primary btn-pill pull-right"> PDF</a>
                                        </div>
                                    </div>
                                    <div class="panel-wrapper">
                                        <div class="panel-body">
                                            <u><h6><b>Deliverable Content</b></h6></u>
                                            <b><p><?php echo $row['deliverable_content']; ?></p></b>
                                            <marquee ><span>Due Date: <b><?php echo $row['due_date']; ?> - <?php echo $row['marks']; ?> marks</b></span></marquee>
                                        </div>
                                    </div>
                                    <div class="panel-footer">
                                        <div class="row">
                                            <div class="col-md-6">
                                                 <?php 
                                                    $resst = $student->get_project_upload_phase_id($phaseid,$batchid);
                                                    if ($resst['project_status'] == "resubmit" || $resst['project_status'] == "completed") {
                                                ?>
                                                <h5 style="font-size: x-large;color: black;font-family: serif;">Marks Given <?php echo $resst['correction_marks']; ?> out of <?php echo $phasemarks; ?>
                                                </h5> 
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                            <div class="col-md-6 text-right">

                                            <?php 
                                                $count = $student->get_project_upload_phase($phaseid,$batchid);
                                            
                                                if ($sdate <= $date && $date <= $edate) {
                                                if (!$count) {
                                                    ?>
                                                    <a href="submit_document.php?id=<?php echo $row['id'] ?>&faculty=<?php echo $faculty_id ?>" class="btn btn-info btn-pill">Submit Document</a>
                                                    <?php
                                                }else{   
                                                    if($resst['project_status'] == "resubmit" && $resst['status'] == 1){
                                                        $actualmarks =  $resst['correction_marks'] / $phasemarks * 100;
                                                    $am = round($actualmarks);
                                                    ?>
                                                    <a href="resubmit_document.php?id=<?php echo $resst['id'] ?>" class="btn btn-danger btn-pill">Resubmit Document</a>
                                                    <a href="../assets/changes/<?php echo $resst['correction_file'] ?>" target="_blank" class="btn btn-primary btn-pill pull-right"> Changes to make</a>
                                                    <div class="progress mt-3">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated progress-bar-warning" style="width: <?php echo $am; ?>%" aria-valuenow="<?php echo $am ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $am; ?>% 
                                                        </div>
                                                    </div>
                                                    <?php
                                                        }
                                                        else if($resst['project_status'] == "completed")
                                                        {
                                                            $actualmarks =  $resst['correction_marks'] / $phasemarks * 100;
                                                            $am = round($actualmarks);
                                                    ?>
                                                    <a href="#" class="btn btn-warning btn-pill">Complted</a>
                                                    <div class="progress mt-3">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated progress-bar-warning" style="width: <?php echo $am; ?>%" aria-valuenow="<?php echo $am ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $am; ?>% 
                                                        </div>
                                                    </div>
                                                    <?php
                                                        }
                                                        else if($resst['project_status'] == "resubmit" && $resst['status'] == 2)
                                                        {
                                                         $actualmarks =  $resst['correction_marks'] / $phasemarks * 100;
                                                        $am = round($actualmarks);
                                                    ?>
                                                    <a href="#" class="btn btn-dark btn-pill">Successfully Sent Your Document</a>
                                                    <div class="progress mt-3">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated progress-bar-warning" style="width: <?php echo $am; ?>%" aria-valuenow="<?php echo $am ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $am; ?>% completed
                                                        </div>
                                                    </div>
                                                    <?php
                                                        }
                                                        else if($resst['project_status'] == "new" && $resst['status'] == 0){
                                                    ?>
                                                    <a href="#" class="btn btn-dark btn-pill">Successfully Sent Your Document</a>
                                                    <?php
                                                                }   
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
                <div class="page-ftr">
                    <div>© 2019. RSE</div>
                </div>
            </div>
        </div>      
	<?php $control->getAdminJS(DIR); ?>
</body>
</html>