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
<?php
			$link = mysql_connect("localhost", "testdb", "lobzikkras");
			if ( !$link ) die ("Невозможно подключение к MySQL"); 
		
			$db = "testdb";
			mysql_select_db ( $db ) or die ("Невозможно открыть $db");
			
			$query = "INSERT INTO clients VALUES('".$id."','".$name."','".$SecondName."','".$address."','".$phone."')";
			$result = mysql_query($query);
			//$db_result = mysql_query("SELECT last_insert_id()");
			$client_id = mysql_insert_id();
			$result = mysql_query("INSERT INTO userandclient VALUES ('".$id."','".$logged_user_id."','".$client_id."')");
			if ($result) header("Location: personalPage.php");
		?>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	</head>
	<body>
		<a href="logout.php">Выйти</a>
	</body>
</html>