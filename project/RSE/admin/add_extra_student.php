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


$count = $admin->getBatchStudentcount($id);
if ($count >= 4) {
    $_SESSION['warning_message'] = "Already four Students are assigned";
    header('location: view_groups.php');
    exit();
}

$res = $admin->getExtraStudentsAdd($id);

$batch = $res['batchyear'];
$dept = $res['dept'];

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
                            <h2 class="page-title-text">Student Group</h2>
                        </div>
                        <div class="col-sm-6 text-right">
                            <div class="breadcrumbs">
                                <ul>
                                    <li><a href="#">Home</a></li>
                                    <li>Add Extra Student to the Group</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page Body -->
                <div class="page-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="panel">
                                <div class="panel-head">
                                    <h5 class="panel-title">Add Extra Student to the Group</h5>
                                </div>
                <?php $control->sessionMessage(); ?>
                                
                                <div class="panel-body">
                                    <form method="post" action="controller/extra_student_controller.php"  enctype="multipart/form-data">


                                        <input type="hidden" name="id" value="<?php echo $id ?>">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="date">Batch</label>
                                                    <input type="text" readonly="true" class="form-control" value="<?php echo $res['batchyear'] ?>" name="batch">
                                                </div>
                                            </div>
                                            
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="date">Department</label>
                                                    <input type="text" value="<?php echo $res['dept'] ?>" readonly="true" name="dept" class="form-control" >
                                                </div>
                                            </div>
                                        </div>

                                         <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="date">Student</label>
                                                    <select name="student"  class="form-control" required="">
                                                        <option value="">Select Student</option>
                                                        <?php 

                                                        $stmt = $admin->getBatchStudent($batch,$dept);

                                                         while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                         ?>
                                                         <option value="<?php echo $row['id'] ?>"><?php echo $row['name']; ?></option>
                                                         option
                                                         <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        



                                        


                                        <div class="panel-footer text-right">
                                    <input type="submit" class="btn btn-primary m-1" name="add"  value="Add" />
                                </div>


                                    </form>
                                </div>
                                
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

    <script type="text/javascript">
        
    

    </script>


</body>
</html>