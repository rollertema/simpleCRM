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
			<meta http-equiv="content-type" content="text/html; charset=UTF-8">
			<title>Информация о зарегистрированных пользователях</title>
		</head>
		<body>
			Вы зашли как <?php echo $logged_user?>
			<a href="logout.php">Выйти</a>
		</body>
	</html>

