<?php
define('DIR', '../');
require_once DIR . 'config.php';

$control = new Controller();  
$control->notLogged('student', '../index');
$student = new Student();

$bid = $_SESSION['student'];
$res = $student->get_project_batch();
$rest = $student->get_pbatch($bid);

$phase = $res['phase'];
$sdate = $res['sdate'];
$edate = $res['edate'];
$faculty_id = $res['faculty_id'];
$date = Date('Y-m-d');
$ndate = date('Y-m-d', strtotime("+10 day", strtotime($edate)));
$batchid = $_SESSION['student'];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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
                            <h2 style="font-family: fantasy;" class="text-center"><?php echo $result['name']; ?>
                            </h2>
                            <p style="font-family: monospace;" class=""><?php echo $result['description']; ?>
                            </p>
                            <h4 style="color: red;font-family: inherit;" class="text-center">Starting From <?php echo $res['sdate'] ?> to <?php  echo $res['edate'] ?>
                            </h4>
                            <h4 class="text-center">Project Guide: <?php echo $rest['name']; ?>
                            </h4>
                        </div>
                        <?php 
                            if ($date >= $edate && $date <= $ndate) {
                        ?>
                        <div class="col-md-12">
                            <center>
                                <a href="download.php" class="btn btn-primary">Download Acknowledgement</a>
                            </center>
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