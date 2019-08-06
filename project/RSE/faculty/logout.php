<?php

	define('DIR', '../');
	require_once DIR . 'config.php';

	$faculty = new Faculty();

	session_destroy();
	session_reset();

	$faculty->redirect('../index');

?>