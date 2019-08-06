<?php define('DIR', '../../');
require_once DIR . 'config.php';

$admin = new Admin();

if (isset($_POST['add'])) {
	

	$name = $_POST['name'];
	if ($name == '') {
		$_SESSION['warning_message'] = "please enter name";
 		die($admin->redirect('../add_student'));
	}

	$phone = $_POST['phone'];
	if ($phone == '') {
		$_SESSION['warning_message'] = "please enter phone";
 		die($admin->redirect('../add_student'));
	}

	$dob = $_POST['dob'];
	if ($dob == '') {
		$_SESSION['warning_message'] = "please enter dob";
 		die($admin->redirect('../add_student'));
	}


	$regno = $_POST['regno'];
	if ($regno == '') {
		$_SESSION['warning_message'] = "please enter regno";
 		die($admin->redirect('../add_student'));
	}



	$gender = $_POST['gender'];
	if ($gender == '') {
		$_SESSION['warning_message'] = "please enter gender";
 		die($admin->redirect('../add_student'));
	}

	$dept = $_POST['dept'];
	if ($dept == '') {
		$_SESSION['warning_message'] = "please enter department";
 		die($admin->redirect('../add_student'));
	}

	$year = $_POST['year'];
	if ($year == '') {
		$_SESSION['warning_message'] = "please enter year";
 		die($admin->redirect('../add_student'));
	}

	$email = $_POST['email'];
	if ($email == '') {
		$_SESSION['warning_message'] = "please enter email";
 		die($admin->redirect('../add_student'));
	}

	$address = $_POST['address'];
	if ($address == '') {
		$_SESSION['warning_message'] = "please enter address";
 		die($admin->redirect('../add_student'));
	}

	

	$image = $_FILES['image']['name'];
	$image_name_tmp = $_FILES['image']['tmp_name'];

	// move the image into college folder
	move_uploaded_file($image_name_tmp, "../../assets/student/$image");


    $res = $admin->add_student($name,$phone,$email,$address,$year,$dob,$gender,$dept,$image,$regno);
		if ($res) {
			$_SESSION['success_message'] = "Successfully Added";
		}else{
			$_SESSION['error_message'] = "Sorry not inserted!!!!!!!!!!";
		}
   
	$admin->redirect('../view_student');
}



if (isset($_POST['update'])) {
	

	$id = $_POST['id'];
	$old_image = $_POST['old_image'];
	$name = $_POST['name'];
	if ($name == '') {
		$_SESSION['warning_message'] = "please enter name";
 		header('location: ../edit_student.php?id'.$id);
	}

	$phone = $_POST['phone'];
	if ($phone == '') {
		$_SESSION['warning_message'] = "please enter phone";
 		header('location: ../edit_student.php?id'.$id);
	}

	$dob = $_POST['dob'];
	if ($dob == '') {
		$_SESSION['warning_message'] = "please enter dob";
 		header('location: ../edit_student.php?id'.$id);
	}


	$regno = $_POST['regno'];
	if ($regno == '') {
		$_SESSION['warning_message'] = "please enter regno";
 		header('location: ../edit_student.php?id'.$id);
	}



	$gender = $_POST['gender'];
	if ($gender == '') {
		$_SESSION['warning_message'] = "please enter gender";
 		header('location: ../edit_student.php?id'.$id);
	}

	$dept = $_POST['dept'];
	if ($dept == '') {
		$_SESSION['warning_message'] = "please enter department";
 		header('location: ../edit_student.php?id'.$id);
	}

	$year = $_POST['year'];
	if ($year == '') {
		$_SESSION['warning_message'] = "please enter year";
 		header('location: ../edit_student.php?id'.$id);
	}

	$email = $_POST['email'];
	if ($email == '') {
		$_SESSION['warning_message'] = "please enter email";
 		header('location: ../edit_student.php?id'.$id);
	}

	$address = $_POST['address'];
	if ($address == '') {
		$_SESSION['warning_message'] = "please enter address";
 		header('location: ../edit_student.php?id'.$id);
	}

	

	$new_image = $_FILES['new_image']['name'];
	$image_name_tmp = $_FILES['new_image']['tmp_name'];

	
	if ($new_image == "") {
		$res = $admin->update_student($name,$phone,$email,$address,$year,$dob,$gender,$dept,$old_image,$regno,$id);
		if ($res) {
			$_SESSION['success_message'] = "Successfully Updated";
		}else{
			$_SESSION['error_message'] = "Sorry not Updated!!!!!!!!!!";
		}
   
		$admin->redirect('../view_student');
	}else{
		// move the image into college folder
		move_uploaded_file($image_name_tmp, "../../assets/student/$new_image");

		$res = $admin->update_student($name,$phone,$email,$address,$year,$dob,$gender,$dept,$new_image,$regno,$id);
		if ($res) {
			$_SESSION['success_message'] = "Successfully Updated";
		}else{
			$_SESSION['error_message'] = "Sorry not Updated!!!!!!!!!!";
		}
   
		$admin->redirect('../view_student');
	}

    
}


