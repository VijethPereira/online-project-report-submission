<?php define('DIR', '../../');
require_once DIR . 'config.php';

$admin = new Admin();

if (isset($_POST['Import'])) {
	$file = $_FILES['csvfile']['tmp_name'];
	$handle=fopen($file, "r");
	$i=0;
	while(($cont=fgetcsv($handle,1000,","))!==false)
	{
		if($i==0){}
		else
		{
			$res = $admin->Import_student($cont[0],$cont[1],$cont[2],$cont[3],$cont[4],$cont[5],$cont[6],$cont[7],$cont[8]);
		if ($res) {
			$_SESSION['success_message'] = "Successfully Added";
		}else{
			$_SESSION['error_message'] = "Sorry not inserted!!!!!!!!!!";
		}
   
	
		}
		$i++;
	}
$admin->redirect('../index');
	// move the image into college folder
	//move_uploaded_file($image_name_tmp, "../../assets/student/$image");




    
}


?>