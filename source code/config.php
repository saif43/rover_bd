<?php
	session_start();
	require_once "GoogleAPI/vendor/autoload.php";
	$gClient = new Google_Client();
	$gClient->setClientId("457941789849-agd62214rgijb4csqdkqr9n0pgqanjtl.apps.googleusercontent.com");
	$gClient->setClientSecret("PJXR5YYZEE8Jdd5p_QY74mx7");
	$gClient->setApplicationName("CPI Login Tutorial");
	$gClient->setRedirectUri("http://appf.uiu.ac.bd/developer/g-callback.php");
	$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
?>