<?php
	session_save_path($_SERVER['DOCUMENT_ROOT'].'/tmp');
	unset($logged_user);
	session_start();
	session_register($logged_user);
	$SERVER_ROOT = "http://script.test/dbwork.test/www/";
	//if (!isset($_SESSION['logged_user']))
	if (!isset($logged_user) || !eregi("^$SERVER_ROOT",$HTTP_REFERER))
	{
		header("Location: index.php");
		exit;
	}
?>
<html>
	<head>
		<a href="AddClient.php">Добавить клиента</a><br/>
		<title>Новый клиент</title>
	</head>
</html>