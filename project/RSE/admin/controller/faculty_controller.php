<?php define('DIR', '../../');
require_once DIR . 'config.php';

$admin = new Admin();
if (isset($_POST['add'])) 
{
	$name = $_POST['name'];
	if ($name == '') 
	{
		$_SESSION['warning_message'] = "please enter name";
 		die($admin->redirect('../add_faculty'));
	}
	$phone = $_POST['phone'];
	if ($phone == '') 
	{
		$_SESSION['warning_message'] = "please enter phone";
 		die($admin->redirect('../add_faculty'));
	}
	$dob = $_POST['dob'];
	if ($dob == '') 
	{
		$_SESSION['warning_message'] = "please enter dob";
 		die($admin->redirect('../add_faculty'));
	}
	$gender = $_POST['gender'];
	if ($gender == '') 
	{
		$_SESSION['warning_message'] = "please enter gender";
 		die($admin->redirect('../add_faculty'));
	}
	$dept = $_POST['dept'];
	if ($dept == '') 
	{
		$_SESSION['warning_message'] = "please enter department";
 		die($admin->redirect('../add_faculty'));
	}
	$password = $_POST['password'];
	if ($password == '') 
	{
		$_SESSION['warning_message'] = "please enter password";
 		die($admin->redirect('../add_faculty'));
	}
	$doj = $_POST['doj'];
	if ($doj == '') 
	{
		$_SESSION['warning_message'] = "please enter date of join";
 		die($admin->redirect('../add_faculty'));
	}
	$email = $_POST['email'];
	if ($email == '') 
	{
		$_SESSION['warning_message'] = "please enter email";
 		die($admin->redirect('../add_faculty'));
	}
	$address = $_POST['address'];
	if ($address == '') 
	{
		$_SESSION['warning_message'] = "please enter address";
 		die($admin->redirect('../add_faculty'));
	}
	$currentsalary = $_POST['currentsalary'];
	if ($currentsalary == '') 
	{
		$_SESSION['warning_message'] = "please enter cuurent salary";
 		die($admin->redirect('../add_faculty'));
	}
	$qual = $_POST['qual'];
	if ($qual == '') 
	{
		$_SESSION['warning_message'] = "please enter qualification";
 		die($admin->redirect('../add_faculty'));
	}
	$image = $_FILES['image']['name'];
	$image_name_tmp = $_FILES['image']['tmp_name'];
	// move the image into college folder
	move_uploaded_file($image_name_tmp, "../../assets/faculty/$image");
	$res = $admin->add_faculty($name,$phone,$email,$address,$doj,$dob,$gender,$dept,$currentsalary,$image,$password,$qual);
	if ($res) 
	{
		require('../../textlocal.class.php');
		$textlocal = new Textlocal('vinodpiz823@gmail.com', 'Vi231119971997');
		$numbers = array($phone);
		$sender = 'TXTLCL';
		$message = 'Hello ' .$name.' your account is succussfully created from HOD, So you can login with your user name '.$name.' and password '.$password;
		try 
		{
		    $result = $textlocal->sendSms($numbers, $message, $sender);
		    print_r($result);
		} 
		catch (Exception $e) 
		{
		    die('Error: ' . $e->getMessage());
		}
		$_SESSION['success_message'] = "Successfully Added";
	}
	else
	{
		$_SESSION['error_message'] = "Sorry not inserted!!!!!!!!!!";
	}
	$admin->redirect('../view_faculty');
}
if (isset($_POST['update'])) 
{
	$id = $_POST['id'];
	$old_image = $_POST['old_image'];
	$name = $_POST['name'];
	if ($name == '') 
	{
		$_SESSION['warning_message'] = "please enter name";
 		header('location: ../edit_faculty.php?id='.$id);
	}
	$phone = $_POST['phone'];
	if ($phone == '') 
	{
		$_SESSION['warning_message'] = "please enter phone";
 		header('location: ../edit_faculty.php?id='.$id);
	}
	$dob = $_POST['dob'];
	if ($dob == '') 
	{
		$_SESSION['warning_message'] = "please enter dob";
 		header('location: ../edit_faculty.php?id='.$id);
	}
	$gender = $_POST['gender'];
	if ($gender == '') 
	{
		$_SESSION['warning_message'] = "please enter gender";
 		header('location: ../edit_faculty.php?id='.$id);
	}
	$dept = $_POST['dept'];
	if ($dept == '') 
	{
		$_SESSION['warning_message'] = "please enter department";
 		header('location: ../edit_faculty.php?id='.$id);
	}
	$doj = $_POST['doj'];
	if ($doj == '') 
	{
		$_SESSION['warning_message'] = "please enter date of join";
 		header('location: ../edit_faculty.php?id='.$id);
	}
	$email = $_POST['email'];
	if ($email == '') 
	{
		$_SESSION['warning_message'] = "please enter email";
 		header('location: ../edit_faculty.php?id='.$id);
	}
	$address = $_POST['address'];
	if ($address == '') 
	{
		$_SESSION['warning_message'] = "please enter address";
 		header('location: ../edit_faculty.php?id='.$id);
	}
	$currentsalary = $_POST['currentsalary'];
	if ($currentsalary == '') 
	{
		$_SESSION['warning_message'] = "please enter cuurent salary";
 		header('location: ../edit_faculty.php?id='.$id);
	}
	$qual = $_POST['qual'];
	if ($qual == '') 
	{
		$_SESSION['warning_message'] = "please enter qualification";
 		header('location: ../edit_faculty.php?id='.$id);
	}
	$new_image = $_FILES['new_image']['name'];
	$image_name_tmp = $_FILES['new_image']['tmp_name'];
	if ($new_image == "") 
	{
	    $res = $admin->update_faculty($name,$phone,$email,$address,$doj,$dob,$gender,$dept,$currentsalary,$old_image,$qual,$id);
		if ($res) 
		{
			$_SESSION['success_message'] = "Successfully Updated";
		}
		else
		{
			$_SESSION['error_message'] = "Sorry not Updated!!!!!!!!!!";
		}   
		$admin->redirect('../view_faculty');	
	}
	else
	{
		move_uploaded_file($image_name_tmp, "../../assets/faculty/$new_image");
	    $res = $admin->update_faculty($name,$phone,$email,$address,$doj,$dob,$gender,$dept,$currentsalary,$new_image,$qual,$id);
		if ($res) 
		{
			$_SESSION['success_message'] = "Successfully Updated";
		}
		else
		{
			$_SESSION['error_message'] = "Sorry not Updated!!!!!!!!!!";
		}
		$admin->redirect('../view_faculty');
	}
		// move the image into college folder
}