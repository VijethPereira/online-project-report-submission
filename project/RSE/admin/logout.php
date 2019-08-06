<?php

	define('DIR', '../');
	require_once DIR . 'config.php';

	$admin = new Admin();

	session_destroy();
	session_reset();

	$admin->redirect('../index');

?>