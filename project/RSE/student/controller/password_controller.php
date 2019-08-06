<?php define('DIR', '../../');
require_once DIR . 'config.php';
$bid=$_SESSION['student'];
$student = new Student();

if (isset($_POST['change'])) 
{
	$password = $_POST['password'];
	if ($password == '') 
	{
		$_SESSION['warning_message'] = "please enter password";
 		die($student->redirect('../change_password'));
	}
	$res = $student->change_password($password,$bid);
		if ($res) 
		{
			$_SESSION['success_message'] = "Successfully Changed";
		}
		else
		{
			$_SESSION['error_message'] = "Sorry not inserted!!!!!!!!!!";
		}
   	$student->redirect('../index');
}