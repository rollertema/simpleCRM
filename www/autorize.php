<?php
session_save_path($_SERVER['DOCUMENT_ROOT'].'/tmp');
session_start();
?>
<?php
		if ($_POST['hiddenField'])
			{
			$link = mysql_connect("localhost", "testdb", "lobzikkras");
			if (!$link) die ("Невозможно подключится к базе данных");
			$db = "testdb";
			$loginType = "login";
			$findPassword = "_";
			$phoneNumber = "";
			mysql_select_db( $db ) or die ("Невозможно открыть базу данных ");
			$query = "SELECT * FROM userdata WHERE " .$loginType." like '%".$_POST['login']."%'";
			$result = mysql_query($query);
			$i=1;
			while ($row = mysql_fetch_array($result))
			{
				$findPassword = $row[password];
				$i++;
			}
			if ($i==1 || $findPassword != $_POST['password']) echo "Неправильно введены логин или пароль!";
				else 
				{
					$logged_user = $_POST['login'];
					session_register("logged_user");
					header("Location: PersonalPage.php");
					exit;
					
				}
			}
			
		?>

<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<title>Страница входа</title>
		<style type="text/css">
			
			.field {clear:both; text-align:right; line-height:25px;}
			label {float:left; padding-right:10px; font-family: Verdana; font-weight: bold; color:#ffffff}
			.main {float:left; position:absolute; left:500px; position:absolute; top:200px;}
			.fields{-webkit-border-radius:7px; height:30px; width:200px; font-size: 18px;}
			.log {position:relative; top:-130px; left:25px; width: 300px;}
			.submit {
				width:150px; 
				height:30px;
				-webkit-border-radius:7px; 
				position:  relative; top: 10px; left: 150px; 
			
				background: -webkit-gradient(linear, left top,left bottom, from(#9cc3fe), to(#113bf1)); 
				font-size: 18px;
				font-weight: bold;
				font-family: Verdana;
				color: #ffffff;
			} 
		</style>
		
	</head>
	<body style="background-color:#79deff">
		
		
		<form name="Вход" action="autorize.php" method="post">
		
		<div class="main">
		<img src="images/autorize.png"  width="350" height="150"/>
		<div class="log">
		
			<div class="field">
				<label for="a">Логин:</label> 
				<input  class="fields" id="a" name="login" type="text" size=15 maxlength=30>
			</div>
			<input name="hiddenField" type="hidden" value="buttonPressed"><br/>
			<div class="field">
				<label for="b">Пароль: </label> 
				<input class="fields" id="b" name="password" type="password" size=15 maxlength=30><br/>
			</div>
			
				<input class="submit" name="enter" type="submit" value="войти">
			
		</div>
		</div>
	</body>
</html>
