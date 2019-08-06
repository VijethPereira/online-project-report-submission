<?php define('DIR', '../../');
require_once DIR . 'config.php';

$admin = new Admin();

if (isset($_POST['year'])) {
    $year = $_POST['year'];
    $output = "";
    
    $count = $admin->getPhaseCount($year);
    $res = $admin->getPhaseValues($year);
    $id = $res['id'];
    if (!$count) {
        $output .= '


        <div class="col-md-12">
                            <div class="panel br-20x panel-default">
                                
                                <div class="panel-wrapper">
                                    <div class="panel-body">
                                        <h2 class="text-center">Sorry No Results Found</h2>
                                    </div>
                                </div>
                               
                            </div>
                        </div>



        ';

        echo $output;
    }else{
        $output = "";

        $stmt = $admin->get_phaseValues($id);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $output .= '






        <div class="col-md-12">
                            <div class="panel br-20x panel-default" style="        background-image: linear-gradient(to top,#fad0c4 0,#79fb74 100%);">
                                <div class="panel-head">
                                    <div class="panel-title"><i class="icon-layers panel-head-icon text-primary"></i>
                                        <span class="panel-title-text">Phase Title: <strong>'.$row['description'].'_'.$row['phase_type'].'</strong></span>
                                    </div>
                                    <div>
                                       <b> <?php echo $year; ?> Batch</b>
                                    </div>
                                </div>
                                <div class="panel-wrapper">
                                    <div class="panel-body">
                                       <u><h6><b>Deliverable Content</b></h6></u>
                                       <b><p>'.$row['deliverable_content'].'</p></b>
                                       <span>Due Date: <b>'.$row['due_date'].' - '.$row['marks'].' marks</b></span>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <div class="row">
                                        <div class="col-md-6"></div>
                                        <div class="col-md-6 text-right">
                                            <a href="edit_phase.php?id='.$row['id'].'" class="btn btn-default btn-pill">Edit</a>
                                            <a href="../assets/phase/'.$row['attachment'].'" target="_blank" class="btn btn-primary btn-pill"> PDF</a>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>







        ';
        }


        $output .= '

        <div class="col-md-12"  >
                            <a href="add_extra_phase.php" class="btn btn-danger btn-block btn-pill">Add Phase</a>
                        </div>

        ';
        echo $output;

    }

    

    
    

}