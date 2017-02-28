<?php
include 'utils.inc.php';

login_verify();

$stmt = $db->prepare("UPDATE members SET present=0 WHERE id=:id");

$stmt->execute(array(":id"=>$_SESSION['id']));

header("Location: logout.php");
exit;

?>