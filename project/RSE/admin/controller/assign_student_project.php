<?php define('DIR', '../../');
require_once DIR . 'config.php';

$admin = new Admin();

if (isset($_POST['add'])) 
{
	$id = $_POST['id'];
	$title = $_POST['title'];
	if ($title == '') 
	{
		$_SESSION['warning_message'] = "please select title";
		header('../add_project_student.php?id='.$id);
	}
	$faculty = $_POST['faculty'];
	if ($faculty == '') 
	{
		$_SESSION['warning_message'] = "please select faculty";
		header('../add_project_student.php?id='.$id);
	}
	$sdate = $_POST['sdate'];
	if ($sdate == '') 
	{
		$_SESSION['warning_message'] = "please select starting date";
		header('../add_project_student.php?id='.$id);
	}
	$edate = $_POST['edate'];
	if ($edate == '') 
	{
		$_SESSION['warning_message'] = "please select ending date";
		header('../add_project_student.php?id='.$id);
	}
	$phase = $_POST['phase'];
	$sid = $_POST['sid'];
	$batchname = $_POST['batchname'];
	$batchpassword = $_POST['batchpassword'];
    $res = $admin->assign_students($id,$title,$faculty,$sdate,$edate,$phase);
	if ($res) 
	{
		$length = count($sid);
		for ($i = 0; $i < $length; $i++) 
		{
			$rst = $admin->getStudentbyid($sid[$i]);
			$phone = $rst['phonenumber'];
			$names = $rst['name'];
			require('../../textlocal.class.php');
			$textlocal = new Textlocal('vinodpiz823@gmail.com', 'Vi231119971997');
			$numbers = array($phone);
			$sender = 'TXTLCL';
			$message = 'Hello ' .$names.' your project group is succussfully created from HOD, So you can login, your batch name is '.$batchname.' and batch password is '.$batchpassword;
			try 
			{
			    $result = $textlocal->sendSms($numbers, $message, $sender);
			    print_r($result);
			} 
			catch (Exception $e) 
			{
			    die('Error: ' . $e->getMessage());
			}
		}
		$_SESSION['success_message'] = "Successfully Added";
	}
	else
	{
		$_SESSION['error_message'] = "Sorry not inserted!!!!!!!!!!";
	}
	$admin->redirect('../view_assigned_students');
}