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
$bbid = $_GET['id'];
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
                <?php $control->sessionMessage(); ?>
              
                
                <div class="page-body">
                    <br>

                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="text-center">Total Marks</h2>
                        </div>
                    </div>
                    <div class="row" id="res">
                       
                       
                       
                       
                        <div class="col-md-12">
                            <div class="panel br-20x panel-default">
                                <div class="panel-head">
                                    <div class="panel-title"><i class="icon-layers panel-head-icon text-primary"></i>
                                        <?php $result = $faculty->getBatchGroupbyid($bbid); ?>
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
                                                    $stmt1 = $faculty->get_batch_student($result['id']);
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
                                                    $stmt1 = $faculty->get_batch_completed($bbid);
                                                    while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {
                                                        $res = $faculty->getPhasebyid($row1['phase_id']);
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
                                <!-- <div class="panel-footer">
                                    <div class="row">
                                        <div class="col-md-6"></div>
                                        <div class="col-md-6 text-right">
                                            <a href="view_phase_total_marks.php?id=<?php echo $result['id'] ?>" class="btn btn-warning pull-right" title="">View Batch Marks</a>
                                            
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                        
                       
                        
                        
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