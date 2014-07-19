<html>
	<head>
		<title>Registration</title>
		<link rel="stylesheet" type="text/css" href="css_style/forms.css" />
		<style type="text/css">
			.field {clear:both; text-align:right; line-height:45px;}
			.log {position:relative; top:-320px; left:25px; width: 350px;}
			.sub { position:relative; left: 50px;}
		</style>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	</head>
	<body>
	<h1>Registration</h1>
	<form action="insertNewUser.php" method="post">
	<div class="main">
		<img src="images/autorize.png"  width="420" height="330"/>
		<div class="log">
			<div class="field">
				<label for="a"> name:</label>
				<input class="fields" name="name" type="text" size="25" maxlength="30" value="" id="a"/>
			</div>
			<div class="field">
				<label for="b">second name:</label>
				<input class="fields" name="secondName" type="text" size="25" maxlength="30" value="" id="b"/>
			</div>
			<div class="field">
				<label for="c">login:</label> 
				<input class="fields" name="login" type="text" size="25" maxlength="30" value="" id="c"/>
			</div>
			<div class="field">
				<label for="d">password:</label> 
				<input class="fields" name="password" type="password" size="25" maxlength="30" value="" id="d"/>
			</div>
			<div class="field">
				<label for="e">address:</label>
				<input class="fields" name="address" type="text" size="25" maxlength="30" value=""/ id="e">
			</div>
			<div class="field">
				<label for="f">phone number:</label>
				<input class="fields" name="phoneNumber" type="text" size="25" maxlength="30" value="" id="f"/>
			</div>
			<div class="sub">
				<input class="submit" type="submit" name="registration"  value="registration" />
			</div>
		</div>
	</div>	
		
			
		
	</form>
	
	
	</body>
</html>