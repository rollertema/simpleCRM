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
		<title>Новый клиент</title>
	</head>
	<body>
		<a href="logout.php">Выйти</a>
		<form action="registrClient.php" method="Post">
		Имя: <input name="name" type="text" size="25" maxlength="30" value=""/> <br/>
		Фамилия: <input name="SecondName"  type="text" size="25" maxlength="30" value=""/> <br/>
		Адрес: <input name="address"  type="text" size="25" maxlength="50" value=""/> <br/>
		Телефон: <input name="phone"  type="text" size="25" maxlength="30" value=""/> <br/>
		<input type="submit" name="registr" value="добавить клиента"/>
		
		</form>
	</body>
</html>