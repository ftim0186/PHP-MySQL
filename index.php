<?php
include "utils.inc.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
	form {
		border: lightgrey 1px solid;
		padding: 10px;
		margin: 5px 0;
	}
	#container{
		width: 300px;
		margin: 0 auto;
	}
	.post-group{
		border: lightgrey 1px solid;
		padding: 10px;
		margin: 20px 0;
	}
	#error-message{
		text-align: center;
		padding: 10px;
	}
	.post{
		border: lightgrey 1px solid;
		padding: 10px;
		margin: 5px 0;
	}
	#pages{
		text-align: center;
	}
	</style>
</head>
<body>
	<div id="container">
		<?php if(isset($_SESSION['id'])){ ?>
		<div>
			<a href="main.php">會員主頁</a>
			<a href="logout.php">登出</a>
		</div>
		<?php }else{ ?>
		<div>
			<a href="login.php">登入</a>
		</div>
		<?php } ?>

		<?php
		$page = 0;
		$page_post_num = 4;
		if(isset($_GET['page'])){
			$page = $_GET['page'];
		}

		if(isset($_GET['error_mode'])){
			$error_mode=$_GET['error_mode'];
			
			switch($error_mode){
				case "0":
					echo "<div id='error-message'>發文成功!!</div>";
					break;
				case "1":
					echo "<div id='error-message'>未填標題!!</div>";
					break;
				case "2":
					echo "<div id='error-message'>未填作者!!</div>";
					break;
				case "3":
					echo "<div id='error-message'>未填內文!!</div>";
					break;
				case "4":
					echo "<div id='error-message'>儲存錯誤!!</div>";
					break;
				default:
					break;
			}


		}

		?>
		<?php if(isset($_SESSION['id'])){ ?>
		<form action="process.php" method="POST">
			標題<input type="text" name="subject"><br>
			<!--暱稱<input type="text" name="author"><br>-->
			內文<br><textarea name="content"></textarea><br>
			<input type="hidden" name="reply_id" value="0">
			<input type="submit">
		</form>
		<?php }else{ ?>
		<div>欲發文請先登入</div>
		<?php } ?>
		
		<div id="pages">
		<?php
			$stmt = $db->query("SELECT * FROM guestbook WHERE reply_id=0");
			$rowNum = $stmt->rowCount();
			$page_num = ceil($rowNum / $page_post_num);

			for($i=0; $i<$page_num; $i++){
				if($i == $page){
					echo $i+1;
					continue;
				}
		?>
			<a href="index.php?page=<?php echo $i; ?>">
				<?php echo $i+1; ?>
			</a> 
		<?php
			}
		?>
		</div>

		<?php

			$stmt =
				$db->prepare(
					"SELECT * 
					FROM guestbook 
					WHERE reply_id=0
					ORDER BY id DESC
					LIMIT :start,:num");
			$stmt->execute(
					array(
						":start"=>$page_post_num*$page,
						":num"=>$page_post_num
						)
				);
			$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

			foreach($rows as $row){
				$stmt2 = $db->prepare(
					"SELECT * FROM guestbook
					WHERE reply_id=:id");
				$stmt2->execute(array(":id"=>$row['id']));
				$reply_rows = $stmt2->fetchAll(PDO::FETCH_ASSOC);

		?>

		<div class="post-group">
			<div class="post">
				<div>Subject: <?php echo $row['subject']; ?></div>
				<div>Author: <?php echo $row['author']; ?></div>
				<div>Time: <?php echo $row['date']; ?></div>
				<div><?php echo nl2br($row['content']); ?></div>
			</div>

			<?php
				foreach ($reply_rows as $reply_row) {
			?>
			<div class="post">
				<div>Author: <?php echo $reply_row['author']; ?></div>
				<div>Time: <?php echo $reply_row['date']; ?></div>
				<div><?php echo nl2br($reply_row['content']); ?></div>
			</div>
			<?php
				}
			?>
			<?php if(isset($_SESSION['id'])){ ?>
			<form action="process.php" method="POST">
				標題: Re: <?php echo $row['subject']; ?><br>
				<input type="hidden" name="subject" value="<?php echo $row['subject']; ?>">
				<!--暱稱<input type="text" name="author"><br>-->
				內文<br><textarea name="content"></textarea><br>
				<input type="hidden" name="reply_id" value="<?php echo $row['id']; ?>">
				<input type="submit">
			</form>
			<?php }else{ ?>
			<div>欲回應請先登入</div>
			<?php } ?>
		</div>

		<?php
			}
		?>

	</div>
</body>
</html>