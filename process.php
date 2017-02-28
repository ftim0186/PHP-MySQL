<?php
include "utils.inc.php";

login_verify();

$subject=$_POST['subject'];
$author=$_SESSION['account'];
$content=$_POST['content'];
$reply_id=$_POST['reply_id'];

$error_mode=0;

if($subject == ''){
	$error_mode=1;
}elseif($author == ''){
	$error_mode=2;
}elseif($content == ''){
	$error_mode=3;
}elseif($reply_id == ''){
	$error_mode=5;
}
if($error_mode > 0){
	header("Location: index.php?error_mode=$error_mode");
	exit();
}

$stmt = $db->prepare("INSERT INTO guestbook(subject,author,content,reply_id) VALUES (:sub,:aut,:con,:rid)");
$rowInserted = $stmt->execute(
	array(
		":sub"=>htmlentities($subject,ENT_QUOTES),
		":aut"=>htmlentities($author,ENT_QUOTES),
		":con"=>htmlentities($content,ENT_QUOTES),
		":rid"=>$reply_id
	)
);

if($rowInserted <= 0){
	$error_mode=4;
}

header("Location: index.php?error_mode=$error_mode");
exit();

?>