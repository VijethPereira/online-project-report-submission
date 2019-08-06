<?php define('DIR', '../../');
require_once DIR . 'config.php';

$student = new Student();

if (isset($_POST['add'])) 
{
	$phase = $_POST['phase'];
	$faculty = $_POST['faculty'];
	$image = $_FILES['docs']['name'];
	$image_name_tmp = $_FILES['docs']['tmp_name'];
	// move the image into college folder
	move_uploaded_file($image_name_tmp, "../../assets/upload/$image");
	$date = Date('Y-m-d');
	$res = $student->upload_docs($phase,$faculty,$image,$date);
	if ($res) 
	{
		$_SESSION['success_message'] = "Successfully Sent";
	}
	else
	{
		$_SESSION['error_message'] = "Sorry not Sent!!!!!!!!!!";
	}
   	$student->redirect('../project');
}


if (isset($_POST['update'])) {
	

	$id = $_POST['id'];
	

	
	
	$image = $_FILES['docs']['name'];
	$image_name_tmp = $_FILES['docs']['tmp_name'];

	// move the image into college folder
	move_uploaded_file($image_name_tmp, "../../assets/upload/$image");

	$date = Date('Y-m-d');


	




    $res = $student->update_docs($id,$image,$date);
		if ($res) {
			$_SESSION['success_message'] = "Successfully Sent";
		}else{
			$_SESSION['error_message'] = "Sorry not Sent!!!!!!!!!!";
		}
   
	$student->redirect('../project');
}


