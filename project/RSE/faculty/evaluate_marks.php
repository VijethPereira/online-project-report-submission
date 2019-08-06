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
$id = $_GET['id'];
$baid = $_GET['bid'];

$res = $faculty->getPhasebyid($id);

$marks = $res['marks'];

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
                 
                <!-- <div class="page-title">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <h2 class="page-title-text">Uploads</h2>
                        </div>
                        <div class="col-sm-6 text-right">
                            <div class="breadcrumbs">
                                <ul>
                                    <li><a href="#">Home</a></li>
                                    <li>View Uploads</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> -->
                
                <div class="page-body">

                



                    <div class="row" id="res">
                        
                       <div class="col-md-12">
                           <h2 style="font-family: fantasy;" class="text-center"><?php echo $res['phase_type']; ?> - <?php echo $res['description']; ?></h2>
                       </div>


                        <?php
                            $result = $faculty->getPhaseuploadbyideval($id,$baid);
                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                                $bid = $row['batch_id'];
                                $rst = $faculty->getProBatch($bid);
                                $rest = $faculty->getProtitle($rst['title_id']);
                        ?> 
                       
                        <div class="col-md-12">
                            <div class="panel br-20x panel-default" style="        background-image: linear-gradient(to top,#fad0c4 0,#79fb74 100%);">
                                <div class="panel-head">
                                    <div class="panel-title"><i class="icon-layers panel-head-icon text-primary"></i>
                                        <span class="panel-title-text">Phase Title: <strong><?php echo $rest['name']; ?></strong></span>
                                    </div>
                                </div>
                                <div class="panel-wrapper">
                                    <div class="panel-body">
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
                                                    $stmt1 = $faculty->get_batch_student($row['batch_id']);
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
                                </div>
                                <div class="panel-footer">
                                   <form action="controller/evaluate_marks.php" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                    <div class="row">
                                        <input type="hidden" name="oldmark" id="oldmark" value="<?php echo $marks ?>">
                                        <input type="hidden" name="bid" id="bid" value="<?php echo $baid ?>">
                                        <input type="hidden" name="id"  value="<?php echo $id ?>">

                                        <div class="col-md-12">
                                            
                                            <label for="">Mark Type</label>
                                            <select id="type" name="type" class="form-control" required="">
                                                <option value="">Select</option>
                                                <option value="correction">Corrections</option>
                                                <option value="nocorrection">No Corrections</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12" id="note" style="display: none">
                                            <label for="">Note</label>
                                            <textarea class="form-control" name="note" placeholder="Enter Note"></textarea>
                                        </div>

                                        <div class="col-md-12" id="upload" style="display: none">
                                            <label for="">Upload Changable Document</label>
                                            <input type="file" name="docs" class="form-control" >
                                        </div>


                                        <div class="col-md-12">
                                            <label for="">Actual Mark</label>
                                            <input type="number" name="mark" id="amark" placeholder="Enter Mark" class="form-control" required="">
                                            <span style="display: none" id="errm">maximum marks for this phase <?php echo $marks; ?></span>
                                        </div>

                                        <div class="col-md-12">
                                            <input type="submit" class="btn btn-warning btn-block" name="add">
                                        </div>
                                    </div>
                                   </form>
                                </div>
                            </div>
                        </div>
                      <?php $control->sessionMessage(); ?>
                        
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
    <script type="text/javascript">
        $('#type').change(function(){
            var type = $('#type').val();
            if (type == 'correction') {
                $('#note').css('display','block');
                $('#upload').css('display','block');
            }else if(type == 'nocorrection'){
                $('#note').css('display','none');
                $('#upload').css('display','none');
            }else{
                $('#note').css('display','none');
                $('#upload').css('display','none');
            }
        })


        $('#amark').change(function(){
            var amark = $('#amark').val();
            var oldmark = $('#oldmark').val();
            if (amark > oldmark) {
                 $('#errm').css('display','block');
                 document.getElementById('amark').value = "";
              document.getElementById('amark').focus();
            }else{
                 $('#errm').css('display','none');
            }
        })
    </script>

</body>
</html>