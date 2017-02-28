<?php
include "utils.inc.php";

login_verify();

$stmt = $db->prepare("SELECT * FROM members WHERE id=:id");
$stmt->execute(array(":id"=>$_SESSION['id']));

$row = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div>
	<a href="index.php">留言板</a>
	<a href="logout.php">登出</a>
	<a href="delete.php">刪除帳號</a>
</div>

<form action="update.php" method="POST">
	<!--<input type="text" name="account" value=""><br>-->
	帳號：<?php echo $row['account']; ?><br>
	密碼：<input type="password" name="password"><br>
	再次輸入密碼：<input type="password" name="password_again"><br>
	姓名：<input type="text" name="name" value="<?php echo $row['name']; ?>"><br>
	信箱：<input type="text" name="email" value="<?php echo $row['email']; ?>"><br>
	出生日期：
	<select name="year">
	<?php
		for($i=1900;$i<=2000;$i++){
			if($i==$row['year']){
				echo "<option value='$i' selected>$i</option>";
			}else{
				echo "<option value='$i'>$i</option>";
			}
		}
	?>
	</select>
	年
	<select name="month">
	<?php
		for($i=1;$i<=12;$i++){
			if($i==$row['month']){
				echo "<option value='$i' selected>$i</option>";
			}else{
				echo "<option value='$i'>$i</option>";
			}
		}
	?>
	</select>
	月
	<select name="date">
	<?php
		for($i=1;$i<=31;$i++){
			if($i==$row['date']){
				echo "<option value='$i' selected>$i</option>";
			}else{
				echo "<option value='$i'>$i</option>";
			}
		}
	?>
	</select>
	日
	<br>
	性別：
	<input type="radio" name="gender" value="1" <?php if($row['gender']==1)echo "checked"; ?>>Female
	<input type="radio" name="gender" value="2" <?php if($row['gender']==2)echo "checked"; ?>>Male
	<br>
	職業：
	<input type="text" name="job" value="<?php echo $row['job']; ?>">
	<br>
	<input type="submit" value="更新">
</form>

</body>
</html>