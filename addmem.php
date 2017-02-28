<?php

include "utils.inc.php";

$account = $_POST['account'];
$password_hash = password_hash($_POST['password'],PASSWORD_DEFAULT);
$name = $_POST['name'];
$year = $_POST['year'];
$month = $_POST['month'];
$date = $_POST['date'];
$gender = $_POST['gender'];
$job = $_POST['job'];
$email = $_POST['email'];


$stmt = $db->prepare(
	"SELECT * FROM members 
	WHERE account=:acc OR email=:email");
$stmt->execute(array(":acc"=>$account,":email"=>$email));

if($stmt->rowCount() > 0){
	$error_mode = 1;
	header("Location: login.php?error_mode=$error_mode");
	exit;
}

$stmt = $db->prepare("INSERT INTO members
			(account,password_hash,name,year,month,date,gender,job,email)
			VALUES(:account,:password_hash,:name,:year,:month,:date,:gender,:job,:email)");

$stmt->execute(
	array(
		":account"=>$account,
		":password_hash"=>$password_hash,
		":name"=>$name,
		":year"=>$year,
		":month"=>$month,
		":date"=>$date,
		":gender"=>$gender,
		":job"=>$job,
		":email"=>$email
		)
	);


header("Location: login.php");
exit;
?>