<?php
include 'utils.inc.php';

if(isset($_SESSION['id'])){
	header("Location: main.php");
	exit;
}

$email = $_POST['email'];
$account = $_POST['account'];

if($email == '' && $account == ''){
	$error_mode = 3;
	header("Location: index.php?error_mode=$error_mode");
	exit;
}

if($account != ''){
	$stmt = $db->prepare(
		"SELECT * 
		FROM members 
		WHERE account=:acc AND present=1");

	$stmt->execute(array(":acc"=>$account));

	if($stmt->rowCount() <= 0){
		$error_mode = 2;
		header("Location: index.php?error_mode=$error_mode");
		exit;
	}

	$row = $stmt->fetch(PDO::FETCH_ASSOC);

	$email=$row['email'];

}elseif($email != ''){
	$stmt = $db->prepare(
		"SELECT * 
		FROM members 
		WHERE email=:email AND present=1");

	$stmt->execute(array(":email"=>$email));

	if($stmt->rowCount() <= 0){
		$error_mode = 2;
		header("Location: index.php?error_mode=$error_mode");
		exit;
	}

	$row = $stmt->fetch(PDO::FETCH_ASSOC);

	$email=$row['email'];
}

$new_pwd = gen_password(15);

$stmt = $db->prepare(
	"UPDATE members 
	SET password_hash=:pwdh
	WHERE email=:email");

$stmt->execute(
	array(
		":pwdh"=>password_hash($new_pwd,PASSWORD_DEFAULT),
		":email"=>$email
		));


$message = "新密碼：$new_pwd";

mail($email,"重寄密碼",$message);

$error_mode = 4;

header("Location: index.php?error_mode=$error_mode");

exit;

?>