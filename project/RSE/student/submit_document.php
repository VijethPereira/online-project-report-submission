<?php
define('DIR', '../');
require_once DIR . 'config.php';

$control = new Controller();  
$control->notLogged('student', '../index');
$phaseid = $_GET['id'];
$facultyid = $_GET['faculty'];
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
                <div class="page-title">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <h2 class="page-title-text"></h2>
                        </div>
                        <div class="col-sm-6 text-right">
                            <div class="breadcrumbs">
                                <ul>
                                    <li><a href="#">Home</a></li>
                                    <li>Submit Document</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="panel"  style="">
                                <div class="panel-head">
                                    <h5 class="panel-title">Submit Document</h5>
                                </div>
                                <div class="panel-body">
                                    <form method="post" action="controller/document_controller.php"  enctype="multipart/form-data">
                                        <input type="hidden" name="phase" value="<?php echo $phaseid; ?>">
                                        <input type="hidden" name="faculty" value="<?php echo $facultyid; ?>">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="date of birth">Attach Document</label>
                                                    <input type="file"  name="docs" class="form-control"  required=""  autocomplete="off">
                                                    <span>please upload valid completed document (pdf or doc file)</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-footer text-right">
                                            <input type="submit" class="btn btn-primary m-1" name="add"  value="Send" />
                                        </div>
                                    </form>
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