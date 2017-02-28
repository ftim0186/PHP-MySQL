<?php
include "utils.inc.php";

$account=$_POST['account'];
$error_mode=0;

$stmt = $db->prepare("SELECT * FROM members WHERE account=:acc AND present=1");

$stmt->execute(array(":acc"=>$account));

if($stmt->rowCount() <= 0){
	$error_mode = 1;
	header("Location: index.php?error_mode=$error_mode");
	exit;
}

$row = $stmt->fetch(PDO::FETCH_ASSOC);

if($row['present'] == 0){
	$error_mode = 1;
	header("Location: index.php?error_mode=$error_mode");
	exit;
}


if(!password_verify($_POST['password'],$row['password_hash'])){
	$error_mode = 1;
	header("Location: index.php?error_mode=$error_mode");
	exit;
}

$_SESSION['id'] = $row['id'];
$_SESSION['account'] = $row['account'];

header("Location: main.php");
exit;

?>