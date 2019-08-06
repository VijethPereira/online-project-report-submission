<?php define('DIR', '../../');
require_once DIR . 'config.php';

$admin = new Admin();

if (isset($_POST['add'])) 
{
	$id = $_POST['id'];
	$dept = $_POST['dept'];
	$batch = $_POST['batch'];
	$student = $_POST['student'];
    $res = $admin->add_extra_sgroup($dept,$batch,$id,$student);
	if ($res) 
	{
		$_SESSION['success_message'] = "Successfully Created";
	}
	else
	{
		$_SESSION['error_message'] = "Sorry not inserted!!!!!!!!!!";
	}
   
	$admin->redirect('../view_groups');
}


