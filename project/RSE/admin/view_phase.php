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
$y = Date('Y');
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
                            <h2 class="page-title-text">Phases</h2>
                        </div>
                        <div class="col-sm-6 text-right">
                            <div class="breadcrumbs">
                                <ul>
                                    <li><a href="#">Home</a></li>
                                    <li>View Phases</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="page-body">
                <?php $control->sessionMessage(); ?>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel br-20x panel-default" style="background-image: linear-gradient(to top,#fad0c4 0,#79fb74 100%);">

                                <div class="panel-head">
                                    <div class="panel-title"><i class="icon-layers panel-head-icon text-primary"></i>
                                        <span class="panel-title-text">Search by Batch Number </span>
                                    </div>
                                </div>
                                <div class="panel-wrapper">
                                    <div class="panel-body">
                                        <select name="" class="form-control" id="year">
                                            <option value="0">Select Year</option>
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                        </select>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>


                    <div class="row" id="res">
                        
                       
                        <?php
                            $stmt = $admin->get_phase($y);
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                $phase_batch = $row['batch_year'];
                        ?> 
                       
                        <div class="col-md-12">
                            <div class="panel br-20x panel-default" style="        background-image: linear-gradient(to top,#fad0c4 0,#79fb74 100%);">
                                <div class="panel-head">
                                    <div class="panel-title"><i class="icon-layers panel-head-icon text-primary"></i>
                                        <span class="panel-title-text">Phase Title: <strong><?php echo $row['description']; ?>_<?php echo $row['phase_type']; ?></strong></span>
                                    </div>
                                    <div>
                                       <b> <?php echo $y; ?> Batch</b>
                                    </div>
                                </div>
                                <div class="panel-wrapper">
                                    <div class="panel-body">
                                       <u><h6><b>Deliverable Content</b></h6></u>
                                       <b><p><?php echo $row['deliverable_content']; ?></p></b>
                                       <span>Due Date: <b><?php echo $row['due_date']; ?> - <?php echo $row['marks']; ?> marks</b></span>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <div class="row">
                                        <div class="col-md-6"></div>
                                        <div class="col-md-6 text-right">
                                            <a href="edit_phase.php?id=<?php echo $row['id'] ?>" class="btn btn-default btn-pill">Edit</a>
                                            <a href="../assets/phase/<?php echo $row['attachment'] ?>" target="_blank" class="btn btn-primary btn-pill"> PDF</a>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <?php } ?>

                       
                        <div class="col-md-12"  id="btn">
                            <a href="add_extra_phase.php?id=<?php echo $phase_batch ?>" class="btn btn-danger btn-block btn-pill">Add Phase</a>
                        </div>
                        
                    </div>
                     <div class="row" id="newres">
                            
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
        $('#year').change(function(){
            var year = $('#year').val();
            if (year == "0") {
                $('#res').css('display','block');
                $('#btn').css('display','block');
                $('#newres').css('display','none');
            }else{
                $.ajax({
                    url:"controller/fetch_phase.php",
                    method: "post",
                    data: {year:year},
                    dataType:"text",
                    success:function(data)
                        {
                            console.log(data)
                          $('#newres').html(data);
                          $('#res').css('display','none');
                          $('#btn').css('display','none');
                          $('#newres').css('display','block');
                        }
                    })
            }
        })
    </script>
</body>
</html>