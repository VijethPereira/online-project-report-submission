<?php

define('DIR', '../');
require_once DIR . 'config.php';

$control = new Controller();  
$control->notLogged('admin', '../index');

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
            <?php $control->getAdminsidebar(DIR); ?>
            <?php $control->getAdmintopbar(DIR); ?>
             <div class="page-wrapper">
                 <?php $control->sessionMessage(); ?>

                <div class="page-title">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <h2 class="page-title-text">Student</h2>
                        </div>
                        <div class="col-sm-6 text-right">
                            <div class="breadcrumbs">
                                <ul>
                                    <li><a href="#">Home</a></li>
                                    <li>Import Student data</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page Body -->
                <div class="page-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="panel" style="">
                                <div class="panel-head">
                                    <h5 class="panel-title">Import Data</h5>
                                </div>
                                <div class="panel-body">
                                    <form method="post" action="controller/file_controller.php"  enctype="multipart/form-data">
                                        <div class="row"></div>
                                        <div class="row"></div>
                                        <div class="row"></div>

                                         <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="gender">Csv file</label>
                                                    <p><font color="red">*select a csv file with colums 'Regno','name','phone','email','address','year','dob','gender','dept'</font></p>
                                                    <input type="file" name="csvfile" class="form-control" required="">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-footer text-right">
                                    <input type="submit" class="btn btn-primary m-1" name="Import"  value="import" />
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