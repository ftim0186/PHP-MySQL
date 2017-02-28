<?php
session_start();

if(isset($_SESSION['id'])){
	header("Location: main.php");
	exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
	#container{
		width: 200px;
		/*height: 300px;*/
		margin: 0 auto;
	}
	#login{
		padding: 20px;
		border: lightgrey 1px solid;
	}
	#actions{
		margin-top: 20px;
		text-align: center;
	}
	</style>
</head>
<body>
	<div id="container">
		<div id="login">
			<form action="checkpwd.php" method="POST">
				帳號：<input type="text" name="account"><br>
				密碼：<input type="password" name="password"><br>
				<input type="submit">
			</form>
		</div>
		<div id="actions">
			<a href="join.php">註冊</a>
			<a href="forgetpwd.php">忘記密碼？</a>
		</div>
	</div>
</body>
</html>