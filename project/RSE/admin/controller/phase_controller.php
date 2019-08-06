<?php define('DIR', '../../');
require_once DIR . 'config.php';

$admin = new Admin();

if (isset($_POST['add'])) {
	


	$batch = $_POST['batch'];
	if ($batch == '') {
		$_SESSION['warning_message'] = "please enter batch";
 		die($admin->redirect('../add_phase'));
	}


	$phase = $_POST['phase'];
	if ($phase == '') {
		$_SESSION['warning_message'] = "please enter phase";
 		die($admin->redirect('../add_phase'));
	}

	$desc = $_POST['desc'];
	if ($desc == '') {
		$_SESSION['warning_message'] = "please enter desc";
 		die($admin->redirect('../add_phase'));
	}


	$dcontent = $_POST['dcontent'];
	if ($dcontent == '') {
		$_SESSION['warning_message'] = "please enter dcontent";
 		die($admin->redirect('../add_phase'));
	}


	$duedate = $_POST['duedate'];
	if ($duedate == '') {
		$_SESSION['warning_message'] = "please enter duedate";
 		die($admin->redirect('../add_phase'));
	}

	$marks = $_POST['marks'];
	if ($marks == '') {
		$_SESSION['warning_message'] = "please enter marks";
 		die($admin->redirect('../add_phase'));
	}


	$attachment = $_FILES['attachment']['name'];
    $image_name_tmp = $_FILES['attachment']['tmp_name'];

    $length = count($attachment);
    for ($i = 0; $i < $length; $i++) {
		// move the image into food folder
    	move_uploaded_file($image_name_tmp[$i], "../../assets/phase/$attachment[$i]"); 
	}
    
	

	

	$note = $_POST['note'];
	if ($note == '') {
		$_SESSION['warning_message'] = "please enter note";
 		die($admin->redirect('../add_phase'));
	}





	

	


    $res = $admin->add_phase($batch,$phase,$desc,$dcontent,$duedate,$marks,$attachment,$note);
		if ($res) {
			$_SESSION['success_message'] = "Successfully Created";
		}else{
			$_SESSION['error_message'] = "Sorry not inserted!!!!!!!!!!";
		}
   
	$admin->redirect('../view_phase');
}


if (isset($_POST['update'])) {
	


	$id = $_POST['id'];
	$old_pdf = $_POST['old_pdf'];
	


	$phase = $_POST['phase'];
	if ($phase == '') {
		$_SESSION['warning_message'] = "please enter phase";
 		header('../location: edit_phase.php?id='.$id);
	}

	$desc = $_POST['desc'];
	if ($desc == '') {
		$_SESSION['warning_message'] = "please enter desc";
 		header('../location: edit_phase.php?id='.$id);
	}


	$dcontent = $_POST['dcontent'];
	if ($dcontent == '') {
		$_SESSION['warning_message'] = "please enter dcontent";
 		header('../location: edit_phase.php?id='.$id);
	}


	$duedate = $_POST['duedate'];
	if ($duedate == '') {
		$_SESSION['warning_message'] = "please enter duedate";
 		header('../location: edit_phase.php?id='.$id);
	}

	$marks = $_POST['marks'];
	if ($marks == '') {
		$_SESSION['warning_message'] = "please enter marks";
 		header('../location: edit_phase.php?id='.$id);
	}


	$note = $_POST['note'];
	if ($note == '') {
		$_SESSION['warning_message'] = "please enter note";
 		header('../location: edit_phase.php?id='.$id);
	}


	$new_attachment = $_FILES['new_attachment']['name'];
    $image_name_tmp = $_FILES['new_attachment']['tmp_name'];

    	
    if ($new_attachment == "") {
    	$res = $admin->update_phase($id,$phase,$desc,$dcontent,$duedate,$marks,$old_pdf,$note);
		if ($res) {
			$_SESSION['success_message'] = "Successfully updated";
		}else{
			$_SESSION['error_message'] = "Sorry not updated!!!!!!!!!!";
		}
   
		$admin->redirect('../view_phase');
    }else{
    	// move the image into food folder
    	move_uploaded_file($image_name_tmp, "../../assets/phase/$new_attachment"); 

    	$res = $admin->update_phase($id,$phase,$desc,$dcontent,$duedate,$marks,$new_attachment,$note);
		if ($res) {
			$_SESSION['success_message'] = "Successfully updated";
		}else{
			$_SESSION['error_message'] = "Sorry not updated!!!!!!!!!!";
		}
   
		$admin->redirect('../view_phase');
    }


		
	
    
	

	

	





	

	


    
}