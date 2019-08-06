<?php define('DIR', '../../');
require_once DIR . 'config.php';

$admin = new Admin();

if (isset($_POST['add'])) 
{
	$id = $_POST['id'];
	$phase = $_POST['phase'];
	if ($phase == '') 
	{
		$_SESSION['warning_message'] = "please enter phase";
 		header('../location: add_extra_phase.php?id='.$id);
	}
	$desc = $_POST['desc'];
	if ($desc == '') 
	{
		$_SESSION['warning_message'] = "please enter desc";
 		header('../location: add_extra_phase.php?id='.$id);
	}
	$dcontent = $_POST['dcontent'];
	if ($dcontent == '') 
	{
		$_SESSION['warning_message'] = "please enter dcontent";
 		header('../location: add_extra_phase.php?id='.$id);
	}
	$duedate = $_POST['duedate'];
	if ($duedate == '') 
	{
		$_SESSION['warning_message'] = "please enter duedate";
 		header('../location: add_extra_phase.php?id='.$id);
	}
	$marks = $_POST['marks'];
	if ($marks == '') 
	{
		$_SESSION['warning_message'] = "please enter marks";
 		header('../location: add_extra_phase.php?id='.$id);
	}
	$attachment = $_FILES['attachment']['name'];
    $image_name_tmp = $_FILES['attachment']['tmp_name'];
	// move the image into food folder
    move_uploaded_file($image_name_tmp, "../../assets/phase/$attachment"); 
	$note = $_POST['note'];
	if ($note == '') 
	{
		$_SESSION['warning_message'] = "please enter note";
 		header('../location: add_extra_phase.php?id='.$id);
	}
    $res = $admin->add_extraphase($id,$phase,$desc,$dcontent,$duedate,$marks,$attachment,$note);
		if ($res) 
		{
			$_SESSION['success_message'] = "Successfully Created";
		}
		else
		{
			$_SESSION['error_message'] = "Sorry not inserted!!!!!!!!!!";
		}
	$admin->redirect('../view_phase');
}


