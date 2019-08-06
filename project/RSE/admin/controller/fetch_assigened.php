<?php define('DIR', '../../');
require_once DIR . 'config.php';

$admin = new Admin();

if (isset($_POST['year'])) 
{
	$year = $_POST['year'];
	$output = "";
	$count = $admin->getprojectgroupCount($year);
    if (!$count) 
    {
		$output .= '<div class="col-md-12">
                        <div class="panel br-20x panel-default">
                            <div class="panel-wrapper">
                                <div class="panel-body">
                                    <h2 class="text-center">Sorry No Results Found</h2>
                                </div>
                            </div>
                         </div>
                    </div>';

		echo $output;
	}
    else
    {
		$output = "";
        $stmt = $admin->getBatchYear($year);
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
        {
            $output .= '<div class="col-md-12">
                        <div class="panel br-20x panel-default">
                            <div class="panel-head">
                                <div class="panel-title"><i class="icon-layers panel-head-icon text-primary"></i>
                                    <span class="panel-title-text">Batch Number: '.$row["batch_number"].' || Year: '.$row["batch_year"].'</span>
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
                                            <tbody>';
                                              
            $stmt1 = $admin->get_batch_student($row['id']);
            while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) 
            {
                $res = $admin->getStudentbyid($row1['student_id']);
                $output .='<tr>
                            <td>'.$res["reg_no"].'</td>
                            <td>'.$res["name"].'</td>
                            <td>'.$res["dept"].'</td>
                            <td>'.$res["syear"].'</td>
                        </tr>';
            }
                $output .='</tbody>
                </table>
                </div>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-md-6"></div>
                            <div class="col-md-6 text-right">
                                <a href="" class="btn btn-default btn-pill">Edit</a>
                                <a href="" class="btn btn-success btn-pill">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
	   }
	   echo $output;
    }
}