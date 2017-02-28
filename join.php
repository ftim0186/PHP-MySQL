<?php
	include "utils.inc.php";

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
	<form action="addmem.php" method="POST">
		帳號：<input type="text" name="account"><br>
		密碼：<input type="password" name="password"><br>
		姓名：<input type="text" name="name"><br>
		信箱：<input type="text" name="email"><br>
		出生日期：
		<select name="year">
		<?php
			for($i=1900;$i<=2000;$i++){
				echo "<option value='$i'>$i</option>";
			}
		?>
		年
		</select><select name="month">
		<?php
			for($i=1;$i<=12;$i++){
				echo "<option value='$i'>$i</option>";
			}
		?>
		月
		</select><select name="date">
		<?php
			for($i=1;$i<=31;$i++){
				echo "<option value='$i'>$i</option>";
			}
		?>
		</select>
		日
		<br>
		性別：
		<input type="radio" name="gender" value="1">Female
		<input type="radio" name="gender" value="2">Male
		<br>
		職業：
		<input type="text" name="job">
		<br>
		<input type="submit">
	</form>
</body>
</html>