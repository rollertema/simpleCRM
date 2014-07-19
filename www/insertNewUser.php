<html>
	<head>
	    <title>страница завершения регистрации</title>
	</head>
	<body>
	<?php
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
					if ($result) echo ("Регистрация прошла успешно!");
					mysql_close($link);
				}
				
		}
		
	?>
	</body>
</html>