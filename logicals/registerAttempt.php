<?php
session_start();
include_once(dirname(__DIR__, 1)."/includes/config.inc.php");

$username = $_POST["username"];
$family_name = $_POST["family"];
$given_name = $_POST["given"];
$email = $_POST["email"];
$password = $_POST["password"];
$password_repeat = $_POST["password_repeat"];

$all_set = isset($username, $email, $family_name, $given_name, $password, $password_repeat);

// Beadott adatok ellenőrzése
if ($all_set) {
    $username_valid = checkUsername($username);
    $password_valid = checkPassword($password);
    $names_valid = checkName($family_name) && checkName($given_name);
} else {
    // Hiányos regisztrációs adatok
    $_SESSION["message"] = "A megadott regisztrációs adatok hiányosak.";
    header("Location:".$FRONTEND_LINK);
    die();
}

if ($username_valid && $password_valid && $names_valid){
    $password_match = matchPasswords($password, $password_repeat);
} else {
    // Felhasználónév, név, vagy jelszó nem felel meg a követelményeknek
    if(!$username_valid){
        $invalid = "felhasználónév";    
    } else if(!$password_valid){
        $invalid = "jelszó";
    } else {
        $invalid = "név";
    }
    $_SESSION["message"] = "A megadott ${invalid} nem felel meg a követelményeknek.";
    header("Location:".$FRONTEND_LINK);
    die();
}

$emailExists = $database_connection->select_query("SELECT username FROM users WHERE username = ?", $username);
$usernameExists = $database_connection->select_query("SELECT email FROM users WHERE email = ?", $email);

// Foglalt-e már az e-mail cím vagy felhasználónév
if ($emailExists || $usernameExists) {
    $taken = $emailExists ? "az e-mail cím" : "a felhasználónév";
    $_SESSION["message"] = "Ez ${taken} már foglalt.";
    header("Location:".$FRONTEND_LINK);
    die();
}

// Jelszóegyezés ellenőrzése
if($password_match){
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
} else {
    // Nem egyeznek a jelszavak.
    $_SESSION["message"] = "A megadott jelszavak nem egyeznek.";
    header("Location:".$FRONTEND_LINK);
    die();
}

// Regisztráció
$database_connection->insert_query("INSERT INTO users(username, family, given, email, password_hash) VALUES(?, ?, ?, ?, ?)", $username, $family_name, $given_name, $email, $password_hash);
$_SESSION["message"] = "Sikeres regisztráció mint ".$username.", ".$email." címmel.";
header("Location:".$FRONTEND_LINK);
?>