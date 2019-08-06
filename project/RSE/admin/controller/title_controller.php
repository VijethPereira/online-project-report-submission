<?php define('DIR', '../../');
require_once DIR . 'config.php';

$admin = new Admin();

if (isset($_POST['add'])) {
	

	$batch = $_POST['batch'];
	if ($batch == '') {
		$_SESSION['warning_message'] = "please enter batch";
 		die($admin->redirect('../add_title'));
	}

	$title = $_POST['title'];
	if ($title == '') {
		$_SESSION['warning_message'] = "please enter title";
 		die($admin->redirect('../add_title'));
	}

	$desc = $_POST['desc'];
	if ($desc == '') {
		$_SESSION['warning_message'] = "please enter description";
 		die($admin->redirect('../add_title'));
	}

	



    $res = $admin->add_titles($batch,$title,$desc);
		if ($res) {
			$_SESSION['success_message'] = "Successfully Added";
		}else{
			$_SESSION['error_message'] = "Sorry not inserted!!!!!!!!!!";
		}
   
	$admin->redirect('../view_title');
}



if (isset($_POST['update'])) {
	

	$id = $_POST['id'];
	
	$title = $_POST['title'];
	if ($title == '') {
		$_SESSION['warning_message'] = "please enter title";
 		header('../location: edit_title.php?id='.$id);
 		exit();
	}

	$desc = $_POST['desc'];
	if ($desc == '') {
		$_SESSION['warning_message'] = "please enter description";
 		header('../location: edit_title.php?id='.$id);
 		exit();
	}

	



    $res = $admin->edit_titles($id,$title,$desc);
		if ($res) {
			$_SESSION['success_message'] = "Successfully Updated";
		}else{
			$_SESSION['error_message'] = "Sorry not Updated!!!!!!!!!!";
		}
   
	$admin->redirect('../view_title');
}


