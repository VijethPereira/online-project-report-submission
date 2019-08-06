<?php define('DIR', '../../');
require_once DIR . 'config.php';

$admin = new Admin();

if (isset($_POST['year'])) {
    $year = $_POST['year'];
    $output = "";
    
    $count = $admin->getTitleCount($year);

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

        $stmt = $admin->get_titleYear($year);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $output .= '






        <div class="col-md-12">
                            <div class="panel br-20x panel-default">
                                <div class="panel-head">
                                    <div class="panel-title"><i class="icon-layers panel-head-icon text-primary"></i>
                                        <span class="panel-title-text">Title: '.$row['name'].' - '.$row['batch'].' year </span>
                                    </div>
                                </div>
                                <div class="panel-wrapper">
                                    <div class="panel-body">
                                        <p>'.$row['description'].'</p>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <div class="row">
                                        <div class="col-md-6"></div>
                                        <div class="col-md-6 text-right">
                                            <a href="edit_title.php?id='.$row['id'].'" class="btn btn-default btn-pill">Edit</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>







        ';
        }
        echo $output;

    }

    

    
    

}