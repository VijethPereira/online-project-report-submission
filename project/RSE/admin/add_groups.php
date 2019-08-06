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
                                    <li>Add Student Group</li>
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
                                    <h5 class="panel-title">Add Student Group</h5>

                                </div>
                <?php $control->sessionMessage(); ?>
                                
                                <div class="panel-body">
                                    <form method="post" action="controller/group_controller.php"  enctype="multipart/form-data">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="date">Batch</label>
                                                    <select class="form-control" name="batch" id="batch">
                                                        <option value="">Select Batch</option>
                                                        <option value="2019">2019</option>
                                                        <option value="2020">2020</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="date">Department</label>
                                                    <select class="form-control" name="dept" id="dept" required="">
                                                        <option value="">Select Department</option>
                                                        <option value="CS">CS</option>
                                                        <option value="EE">EE</option>
                                                        <option value="ME">ME</option>
                                                        <option value="CV">CV</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="date of birth">Batch Number</label>
                                                    <input type="text" placeholder="Enter Batch Number" name="bno" class="form-control" value="batch-"  required=""  autocomplete="off">
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="date of birth">Batch Password</label>
                                                    <input type="password" placeholder="**********" name="password" class="form-control"   required=""  autocomplete="off">
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="date of birth">Number of students in a batch</label>
                                                    <input type="number" min="1" placeholder="Enter Students in a group" name="nos" id="nos" class="form-control" max="4"  required=""  autocomplete="off">
                                                    <span id="errs" style="display: none;" class="text-danger">Maximum Number of Students in a Group Four students</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row" id="sblock" style="display: none;">
                                            <h4 class="text-center">Select Batch Students</h4>
                                            <div class="col-md-12" id="result">
                                                
                                           

                                                    


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
        
        $('#nos').blur(function(){
            var nos = $('#nos').val();
            var batch = $('#batch').val();
            var dept = $('#dept').val();
            
            if (nos > 4 || nos < 1) {
                $('#errs').css('display','block')
                document.getElementById('nos').value = "";
                document.getElementById('nos').focus();
            }else{
                $('#errs').css('display','none');
            }


            if (batch != '' && dept != '') {
            $.ajax({
                      url      : "controller/assign_student_box.php",
                      method : "POST",
                      data     : {batch:batch,dept:dept,nos:nos},
                      dataType : "text",        
                      async    : false,
                      success  : function(data) {
                        console.log(data);
                        $('#result').html(data);
                         $('#sblock').css('display','block');
                      },
                      error    : function(e) {
                       alert(e);
                     }
                   });
            }


        })

    </script>


</body>
</html>