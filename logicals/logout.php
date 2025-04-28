<?php
session_start();
include_once(dirname(__DIR__, 1)."/includes/config.inc.php");

unset($_SESSION["logged_in_as"]);
unset($_SESSION["family"]);
unset($_SESSION["given"]);

$_SESSION["message"] = "Sikeresen kijelentkezett.";
header("Location:".$FRONTEND_LINK);
?>