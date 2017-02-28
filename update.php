<?php
include "utils.inc.php";

login_verify();

$password = $_POST['password'];
$password_again = $_POST['password_again'];
$name = $_POST['name'];
$year = $_POST['year'];
$month = $_POST['month'];
$date = $_POST['date'];
$gender = $_POST['gender'];
$job = $_POST['job'];
$email = $_POST['email'];

if($password!='' && $password!=$password_again){
	$error_mode = 1;
	header("Location: main.php?error_mode=$error_mode");
	exit;
}

if($password!='' && $password==$password_again){
	$stmt = $db->prepare("UPDATE members SET password_hash=:pwdh WHERE id=:id");
	$stmt->execute(
		array(
			":id"=>$_SESSION['id'],
			":pwdh"=>password_hash($password,PASSWORD_DEFAULT)
		)
	);
}

$stmt = $db->prepare(
	"UPDATE members 
	SET 
		name=:name,
		year=:year,
		month=:month,
		date=:date,
		gender=:gender,
		job=:job,
		email=:email
	WHERE id=:id");
$stmt->execute(
		array(
			":id"=>$_SESSION['id'],
			":name"=>$name,
			":year"=>$year,
			":month"=>$month,
			":date"=>$date,
			":gender"=>$gender,
			":job"=>$job,
			":email"=>$email
		)
	);

header("Location: main.php");
exit;

?>