<?php
	session_save_path($_SERVER['DOCUMENT_ROOT'].'/tmp');
	session_start();
			$name = htmlspecialchars($_POST[name]);
			$secondName = htmlspecialchars($_POST[secondName]);
			$login = htmlspecialchars($_POST[login]);
			$password = htmlspecialchars($_POST[password]);
			$address = htmlspecialchars($_POST[address]);
			$phone = htmlspecialchars($_POST[phoneNumber]);
			$loginType = "login";
			if (!$name || !$secondName || !$login || !$password || !$address || !$phone)
			die ("Не все данные введены");
			else {
				$link = mysql_connect("localhost", "testdb", "lobzikkras");
				if ( !$link ) die ("Невозможно подключение к MySQL"); 
				$db = "testdb";
				mysql_select_db ( $db ) or die ("Невозможно открыть $db");
				$query = "SELECT * FROM userdata WHERE (".$loginType." like '%".$login."%')";
				$result = mysql_query($query);
				$i=1;
				while ($row = mysql_fetch_array($result))
				{
					$i++;
				}
				if ($i > 1)
				{
					die("Такой логин уже существует");
				}
				else
				{
					$query = "INSERT INTO userdata VALUES ('".$id."','".$name."', '".$secondName."', '".$login."', '".$password."', '".$address."', '".$phone."')";
					$result = mysql_query($query);
					mysql_close($link);
					if ($result)  
					{
						$logged_user = $_POST['login'];
						session_register("logged_user");
						header("Location: PersonalPage.php?isreg=1");
					}	
				}			
		}
?>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<title>выход</title>
	</head>
</html>