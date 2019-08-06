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
$id = $_GET['id'];
$date = Date('Y-m-d');
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
            <?php $control->getAdminsidebar(DIR); ?>
            <?php $control->getAdmintopbar(DIR); ?>
            <!-- Page header -->
           
            <!-- Main Page Wrapper -->
            <div class="page-wrapper">
                <!-- Page Title -->
                <?php $control->sessionMessage(); ?>
                <div class="page-title">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <h2 class="page-title-text">Assign Project Students</h2>
                        </div>
                        <div class="col-sm-6 text-right">
                            <div class="breadcrumbs">
                                <ul>
                                    <li><a href="#">Home</a></li>
                                    <li>Assign Project</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="page-body">

                   


                    <div class="row" id="res">
                        
                       
                        <?php
                            $stmt = $admin->get_batch_by_id($id);
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        ?> 
                       
                            
                            <div class="col-md-12">
                            <div class="panel br-20x panel-default">
                                <div class="panel-head">
                                    <div class="panel-title"><i class="icon-layers panel-head-icon text-primary"></i>
                                        <span class="panel-title-text">Batch Number: <?php echo $row['batch_number']; ?> || Year: <?php echo $row['batch_year']; ?></span>
                                    </div>
                                </div>
                                <form action="controller/assign_student_project.php" method="post" accept-charset="utf-8">
                                <div class="panel-wrapper">
                                    <div class="panel-body">

                                      <input type="hidden" name="batchname" value="<?php echo $row['batch_number'] ?>">  
                                      <input type="hidden" name="batchpassword" value="<?php echo $row['batch_password'] ?>">  

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
                                                    $stmt1 = $admin->get_batch_student($row['id']);
                                                    while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {

                                                        $res = $admin->getStudentbyid($row1['student_id']);
                                                ?>
                                                <tr>
                                                    <input type="hidden" name="sid[]" value="<?php echo $row1['student_id'] ?>">
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
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Project Title</label>
                                            <select name="title" class="form-control" required="" >
                                                <option value="">Select Title</option>
                                                <?php
                                                    $stmt2 = $admin->get_title_forassign();
                                                    while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                                                ?> 

                                                <option value="<?php echo $row['id'] ?>"><?php echo $row['name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Project Faculty</label>
                                            <select name="faculty" class="form-control" required="" >
                                                <option value="">Select Faculty</option>
                                                <?php
                                                    $stmt2 = $admin->get_faculty();
                                                    while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                                                ?> 

                                                <option value="<?php echo $row['id'] ?>"><?php echo $row['name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Project Starting Date</label>
                                            <input type="date" name="sdate" min="<?php echo $date ?>" class="form-control" required="">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Project Ending Date</label>
                                            <input type="date" name="edate" class="form-control" required="">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Project Phase</label>
                                            <select name="phase" class="form-control" required="">
                                                <option value="">Select Phase</option>
                                                 <?php
                                                    $stmt2 = $admin->get_phase_year();
                                                    while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                                                ?> 

                                                <option value="<?php echo $row['id'] ?>"><?php echo $row['phase_year']; ?></option>
                                                <?php } ?>
                                                
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input value="Add Now" type="submit" name="add" class="btn btn-warning btn-block">
                                        </div>
                                    </div>

                                    

                                    </div>
                                </div>
                                </form>
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