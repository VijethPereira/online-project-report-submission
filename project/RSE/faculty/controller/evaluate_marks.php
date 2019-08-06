<?php define('DIR', '../../');
require_once DIR . 'config.php';

$faculty = new Faculty();

if (isset($_POST['add'])) {
	

	$bid = $_POST['bid'];
	$id = $_POST['id'];
	

	$mark = $_POST['mark'];
	if ($mark == '') {
		$_SESSION['warning_message'] = "please enter mark";
		header('location: ../evaluate_marks.php?id='.$id.'&bid='.$bid);
	}


	$type = $_POST['type'];
	if ($type == 'nocorrection') {

		 $res = $faculty->update_marks_nocorrection($bid,$mark);
		if ($res) {
		
			$_SESSION['success_message'] = "Successfully Added";
			header('location: ../view_uploads.php?id='.$id);
		}else{
			
			$_SESSION['error_message'] = "Sorry not added!!!!!!!!!!";
			
		}
   
		
	}else{
		$note = $_POST['note'];
		if ($note == '') {
			$_SESSION['warning_message'] = "please enter note";
			header('location: ../view_uploads.php?id='.$id);
		}


		$docs = $_FILES['docs']['name'];
		$image_name_tmp = $_FILES['docs']['tmp_name'];

		// move the image into college folder
		move_uploaded_file($image_name_tmp, "../../assets/changes/$docs");

		 $res = $faculty->update_marks_correction($bid,$mark,$note,$docs);
		if ($res) {
			$_SESSION['success_message'] = "Successfully Added";
			header('location: ../view_uploads.php?id='.$id);
		}else{
			$_SESSION['error_message'] = "Sorry not added!!!!!!!!!!";
			header('location: ../evaluate_marks.php?id='.$id.'&bid='.$bid);
		}
   
		

	}

	


	
	




  
}

