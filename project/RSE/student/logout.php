<?php

	define('DIR', '../');
	require_once DIR . 'config.php';

	$student = new Student();

	session_destroy();
	session_reset();

	$student->redirect('../index');

?>