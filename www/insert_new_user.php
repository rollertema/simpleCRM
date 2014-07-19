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
	
		if (!$name || !$secondName || !$login || !$password || !$address || !$phone)
		die ("Не все данные введены, пожалуйста вернитесь и попробуйте снова");
		else die ("OK");
	?>
	</body>
</html>