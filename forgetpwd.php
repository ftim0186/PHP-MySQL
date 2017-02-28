<?php
include 'utils.inc.php';

if(isset($_SESSION['id'])){
	header("Location: main.php");
	exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="sendpwd.php" method="POST">
		帳號：<input type="text" name="account"><br>
		或<br>
		信箱：<input type="text" name="email"><br>
		<input type="submit">
	</form>
</body>
</html>