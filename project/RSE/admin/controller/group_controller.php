<?php define('DIR', '../../');
require_once DIR . 'config.php';

$admin = new Admin();

if (isset($_POST['add'])) {
	


	$dept = $_POST['dept'];
	if ($dept == '') {
		$_SESSION['warning_message'] = "please enter department";
 		die($admin->redirect('../add_groups'));
	}


	$batch = $_POST['batch'];
	if ($batch == '') {
		$_SESSION['warning_message'] = "please enter batch";
 		die($admin->redirect('../add_groups'));
	}

	$bno = $_POST['bno'];
	if ($bno == '') {
		$_SESSION['warning_message'] = "please enter batch number";
 		die($admin->redirect('../add_groups'));
	}


	$count = $admin->getBatchExists($bno);
	if ($count) {
		$_SESSION['warning_message'] = "batch Number Already Exists";
		header('location: ../add_groups.php');
		exit();

	}

	$password = $_POST['password'];
	if ($password == '') {
		$_SESSION['warning_message'] = "please enter password";
 		die($admin->redirect('../add_groups'));
	}


	$student = $_POST['student'];
	if ($student == '') {
		$_SESSION['warning_message'] = "please enter student";
 		die($admin->redirect('../add_groups'));
	}




	

	


    $res = $admin->add_group($dept,$batch,$bno,$password,$student);
		if ($res) {
			$_SESSION['success_message'] = "Successfully Created";
		}else{
			$_SESSION['error_message'] = "Sorry not inserted!!!!!!!!!!";
		}
   
	$admin->redirect('../view_groups');
}


