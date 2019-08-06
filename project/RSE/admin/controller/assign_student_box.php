	<?php 
define('DIR', '../../');
require_once DIR . 'config.php';

if (isset($_POST['batch'])) 
{
    $batch = $_POST['batch'];
    $dept = $_POST['dept'];
    $nos = $_POST['nos'];
	$admin = new Admin();
    $tab = '';
	
    $i = 1;
    for ($i=1; $i <= $nos; $i++) 
    { 
        $tab .= '<select class="form-control" name="student[]" id="std" required="">
             ';
        $tab .= '<option value="" disabled selected>Select Student</option>';
        $res = $admin->getBatchStudent($batch,$dept);
        while ($row = $res->fetch(PDO::FETCH_ASSOC)) 
        {
            $tab .= "<option value='".$row['id']."'>".$row['name']."</option>";
        }
        $tab .='</select>';
    }
    echo $tab;
}

?>