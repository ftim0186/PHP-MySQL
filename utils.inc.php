<?php
session_start();

$options = array(
	PDO::ATTR_EMULATE_PREPARES => false, 
	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
$db = new PDO(
		'mysql:host=localhost;dbname=gbook_with_mems;charset=utf8', 
		'root', '', $options);

function login_verify(){
	if(!isset($_SESSION['id'])){
		header('Location: index.php');
		exit;
	}
}

const ALL_CHAR = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

function gen_password($len){
	$rand_pwd='';
	$len_ALL_CHAR = strlen(ALL_CHAR);
	
	for($i=0; $i<$len; $i++){
		$rand_pwd .= ALL_CHAR[ rand(0,$len_ALL_CHAR-1) ];
	}

	return $rand_pwd;
}


?>