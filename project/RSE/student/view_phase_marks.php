<?php
define('DIR', '../');
require_once DIR . 'config.php';

$control = new Controller();  
$control->notLogged('student', '../index');
$student = new Student();
$bbid = $_SESSION['student'];
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
    <div class="wrapper">
        <div id="main-wrapper" class="menu-fixed page-hdr-fixed">
            <?php $control->getStudentsidebar(DIR); ?>
            <?php $control->getStudenttopbar(DIR); ?>
            <div class="page-wrapper">
                <?php $control->sessionMessage(); ?>
                <div class="page-body"><br>
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="text-center">Total Marks</h2>
                        </div>
                    </div>
                    <div class="row" id="res">
                        <div class="col-md-12">
                            <div class="panel br-20x panel-default">
                                <div class="panel-head">
                                    <div class="panel-title">
                                        <i class="icon-layers panel-head-icon text-primary"></i>
                                        <?php $result = $student->getBatchGroupbyid($bbid); ?>
                                        <span class="panel-title-text">Batch Number: <?php echo $result['batch_number']; ?> || Year: <?php echo $result['batch_year']; ?></span>
                                    </div>
                                </div>
                                <div class="panel-wrapper">
                                    <div class="panel-body">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Register No.</th>
                                                    <th>Name</th>
                                                    <th>Department</th>
                                                    <th>Year</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $stmt1 = $student->get_batch_student($result['id']);
                                                    while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {

                                                        $res = $student->getStudentbyid($row1['student_id']);
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
                                    <h3 class="text-center">Marks in Each Phases</h3>
                                    <div class="panel-body">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Phase Type.</th>
                                                    <th>Description</th>
                                                    <th>Actual Marks</th>
                                                    <th>Given Marks</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $total = 0;
                                                $stotal = 0;
                                                    $stmt1 = $student->get_batch_completed($bbid);
                                                    while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {
                                                        $res = $student->getPhasebyid($row1['phase_id']);
                                                        $total = $total + $row1['correction_marks'];
                                                        $stotal = $stotal + $res['marks'];
                                                        
                                                ?>
                                                <tr>
                                                    <td><?php echo $res['phase_type']; ?></td>
                                                    <td><?php echo $res['description']; ?></td>
                                                    <td><?php echo $res['marks']; ?></td>
                                                    <td><?php echo $row1['correction_marks']; ?></td>
                                                </tr>
                                                <?php } ?> 
                                                <tr>
                                                    <td></td>
                                                    
                                                    <td><b>Total:</b></td>
                                                    <td><b><?php echo $stotal; ?></b></td>
                                                    <td><b><?php echo $total; ?></b></td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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