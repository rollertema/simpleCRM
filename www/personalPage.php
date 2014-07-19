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
		<title>Личная страница</title>
	</head>
	<body style="background-color:#79deff">
		<a href="AddClient.php">Добавить клиента</a><br/>
		<a href="logout.php">Выйти</a>
		<h2 align="center">Список клиентов</h2>
		<?php
			$loginType = "login";
			$link = mysql_connect("localhost", "testdb", "lobzikkras");
			if ( !$link ) die ("Невозможно подключение к MySQL"); 
		
			$db = "testdb";
			mysql_select_db ( $db ) or die ("Невозможно открыть $db");
			$result = mysql_query("SELECT * FROM userdata WHERE (".$loginType." like '%".$logged_user."%')");
			while ($row = mysql_fetch_array($result))
			{
				$logged_user_id = $row['id'];
			}
			session_register("logged_user_id");
			$result = mysql_query("SELECT * FROM clients INNER JOIN userandclient ON clients.id=userandclient.clientid  WHERE userandclient.userid=$logged_user_id");
			
			echo '<table border="1" cellspacing="0" align="center">';
			echo '<thead>';
			echo '<tr>';
			echo '<th width="120">Имя</th>';
			echo '<th width="150">Фамилия</th>';
			echo '<th width="200">Адрес</th>';
			echo '<th width="150">Телефон</th>';
			echo '</tr>';
			echo '</thead>';
			echo '<tbody>';

			while($row = mysql_fetch_array($result))
			{
				echo '<tr>';
				echo '<td align="center">'.$row['name'].'</td>';
				echo '<td align="center">'.$row['SecondName'].'</td>';
				echo '<td align="center">'.$row['address'].'</td>';
				echo '<td align="center">'.$row['phoneNumber'].'</td>';
				echo '</tr>';
			}
		?>
		
	</body>
</html>