<?php
define('DIR', '../');
require_once DIR . 'config.php';

$control = new Controller();  
$control->notLogged('student', '../index');
$student = new Student();
$res = $student->get_project_batch();
$bid=$_SESSION['student'];

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
                 <div class="page-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="panel">
                                <?php $control->sessionMessage(); ?>
                                <div class="panel-body">
                                    <form method="post" action="controller/password_controller.php"  enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-6"></div>
                                            <div class="col-md-6"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4"></div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="date of birth">New Password</label>
                                                    <input type="password" placeholder="**********" name="password" class="form-control"   required=""  autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="col-md-4"></div>
                                        </div>
                                        <div class="panel-footer text-right">
                                            <input type="submit" class="btn btn-primary m-1" name="change"  value="change" />
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
    <?php $control->getAdminJS(DIR); ?>
</body>
</html>