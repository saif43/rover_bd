<?php
	session_start();

	require_once "Facebook/autoload.php";

	$FB = new \Facebook\Facebook([
		'app_id' => '381759195609920',
		'app_secret' => 'f992909778fdd03a766af82f1fb9dac5',
		'default_graph_version' => 'v2.10'
	]);

	$helper = $FB->getRedirectLoginHelper();
?>