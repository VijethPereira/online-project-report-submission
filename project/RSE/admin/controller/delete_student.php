<?php 
define('DIR', '../../');
require_once DIR . 'config.php';

$admin = new Admin();

$id= $_GET['id'];

$res=$admin->delete_student($id);
	if ($res == true) 
	{
		$_SESSION['success_message'] = "Your record has been deleted";
	}
	else
	{
		$_SESSION['error_message'] = "Sorry still not deleted!!!!!!!!!!";
	}
$admin->redirect('../view_student');

?>