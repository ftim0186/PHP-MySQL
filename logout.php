<?php
session_start();

unset($_SESSION['id']);

setcookie(session_name(),session_id(),time()-7200);

session_destroy();

header("Location: index.php");

exit;

?>