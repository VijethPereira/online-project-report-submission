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
$control->notLogged('admin', '../index');
$admin = new Admin();
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
            <?php $control->getAdminsidebar(DIR); ?>
            <?php $control->getAdmintopbar(DIR); ?>
            <!-- Page header -->
           
            <!-- Main Page Wrapper -->
            <div class="page-wrapper">
                <!-- Page Title -->
               
                <div class="page-title">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <h2 class="page-title-text">View Assigned Groups</h2>
                        </div>
                       
                    </div>
                </div>
                
                <div class="page-body">

                    <!-- <div class="row">
                        <div class="col-md-12">
                            <div class="panel br-20x panel-default">
                                <div class="panel-head">
                                    <div class="panel-title"><i class="icon-layers panel-head-icon text-primary"></i>
                                        <span class="panel-title-text">Search by Batch Number </span>
                                    </div>
                                </div>
                                <div class="panel-wrapper">
                                    <div class="panel-body">
                                        <select name="" class="form-control" id="year">
                                            <option value="">Select Year</option>
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                        </select>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div> -->

    <?php $control->sessionMessage(); ?>
                    
                    <div class="row" id="res">
                        
                       
                        <?php
                            $stmt = $admin->get_batch_group_assigned();
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        ?> 
                       
                        <div class="col-md-12">
                            <div class="panel br-20x panel-default">
                                <div class="panel-head">
                                    <div class="panel-title"><i class="icon-layers panel-head-icon text-primary"></i>
                                        <?php $result = $admin->getBatchGroup($row['batch_group']); ?>
                                        <span class="panel-title-text">Title: <?php echo $result['batch_number']; ?> || <?php echo $result['batch_year']; ?> year </span>
                                    </div>
                                </div>
                                <div class="panel-wrapper">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <?php $rest = $admin->getBatchTitle($row['title_id']); ?>
                                            <h4>Project Title : <strong><?php echo $rest['name']; ?></strong></h4>
                                            <p><?php echo $rest['description']; ?></p>
                                        </div>

                                        <div class="col-md-12">
                                            <?php $rest = $admin->getBatchFaculty($row['faculty_id']); ?>
                                            <h4>Project Guide : <strong><?php echo $rest['name']; ?></strong></h4>
                                        </div>
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
                                                    $stmt1 = $admin->get_batch_student($row['batch_group']);
                                                    while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {

                                                        $res = $admin->getStudentbyid($row1['student_id']);
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
                                        
                                        <!-- <div class="col-md-6"></div>
                                        <div class="col-md-6 text-right">
                                            
                                           <a href="" class="btn btn-warning btn-pill">Assigned</a>
                                            
                                        </div> -->
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