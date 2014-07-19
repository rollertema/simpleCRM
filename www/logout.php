<?php
	session_save_path($_SERVER['DOCUMENT_ROOT'].'/tmp');
	session_start();
	session_destroy();
	header("Location: index.php");
?>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<title>выход</title>
	</head>
</html>