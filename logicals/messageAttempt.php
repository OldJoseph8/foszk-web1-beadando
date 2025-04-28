<?php
session_start();
include_once(dirname(__DIR__, 1)."/includes/config.inc.php");

$username = $_SESSION["logged_in_as"];
$message = $_POST["message"];
$sender = $username ? $username : "Vendég";

// Kapott-e értéket minden változó?
$all_set = isset($username, $message);
if (!($all_set)) {
    $_SESSION["message"] = "Hiányos kapcsolati űrlapadatok.";
    header("Location:".$FRONTEND_LINK);
    die();
}

// Megfelel-e a megadott üzenet a követelményeknek?
$message = trim($_POST["message"]);
$valid_message = checkMessage($message);

if (!($valid_message)) {
    $_SESSION["message"] = "Az üzenetnek legalább 1, maximum 1024 karakter hosszúnak kell lennie. Az üzenet nem lehet csupa szóköz.";
    header("Location:".$FRONTEND_LINK);
    die();
}

// Üzenet adatbázisba helyezése
$user_id = $database_connection->select_query("SELECT user_id FROM users WHERE username = ?", $username);
$user_id = $user_id ? $user_id[0]["user_id"] : $user_id;
$database_connection->insert_query("INSERT INTO messages(user_id, message_text) VALUES(?, ?)", $user_id, $message);

$_SESSION["message"] = "Küldő: ".$sender."<br>"."Üzenet: ".$message;
header("Location:".$FRONTEND_LINK);
?>