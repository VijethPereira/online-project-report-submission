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
$res = $admin->getPhasebyID($id);
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
                <div class="page-title">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <h2 class="page-title-text">Phase</h2>
                        </div>
                        <div class="col-sm-6 text-right">
                            <div class="breadcrumbs">
                                <ul>
                                    <li><a href="#">Home</a></li>
                                    <li>Edit Project Phase</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $control->sessionMessage(); ?>
                <!-- Page Body -->
                <div class="page-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="panel">
                                <div class="panel-head">
                                    <h5 class="panel-title">Modify Project Phase</h5>
                                </div>
                                <div class="panel-body">
                                    <form method="post" action="controller/phase_controller.php"  enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        <input type="hidden" name="old_pdf" value="<?php echo $res['attachment']; ?>">
                                        <!-- <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="date">Phase Year</label>
                                                    <select class="form-control" name="batch" id="batch">
                                                        <option value="">Select Phase Year</option>
                                                        <option value="2019">2019</option>
                                                        <option value="2020">2020</option>
                                                    </select>
                                                </div>
                                            </div>

                                             <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="date">No of Phases</label>
                                                    <input type="number" name="" id="nop" placeholder="No of Phases" required="">
                                                    <span id="errs" style="display: none;" class="text-danger">Maximum Number of phase is 12</span>
                                                </div>
                                            </div>

                                        </div> -->

                                        <div id="result" >
                                            <h3 class="text-center">Phase</h3>
                                        <div class="row">

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="date">Phase</label>
                                                    <input type="text" name="phase" value="<?php echo $res['phase_type'] ?>" required="">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="date">Description</label>
                                                    <input type="text" value="<?php echo $res['description'] ?>" name="desc" placeholder="Phase Description" required="">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="date">Deliverable Content</label>
                                                    <input type="text" name="dcontent" value="<?php echo $res['deliverable_content'] ?>" placeholder="Deliverable Content" required="">
                                                </div>
                                            </div>
                                            
                                        </div>

                                        <div class="row">
                                           <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="date">Phase Due Date</label>
                                                    <input type="date" value="<?php echo $res['due_date'] ?>" name="duedate" required="">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="date">Phase Marks</label>
                                                    <input type="number" name="marks" value="<?php echo $res['marks'] ?>" placeholder="Enter Phase Mark" required="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="date"> Attachment(PDF)</label>
                                                    <input type="file" name="new_attachment" >
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="date">Phase Note</label>
                                                    <input type="text" value="<?php echo $res['note'] ?>" name="note" placeholder="Enter Phase Note" required="">
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        



                                        



                                        


                                        <div class="panel-footer text-right">
                                            <input type="submit" class="btn btn-primary m-1" name="update"  value="Update" />
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

    


</body>
</html>