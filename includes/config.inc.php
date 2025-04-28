<?php
session_start();
$INCLUDES_PATH = __DIR__;
$ROOT_PATH = dirname(__DIR__, 1);
$JS_PATH = $ROOT_PATH."/js";
$LOGICALS_PATH = $ROOT_PATH."/logicals";
$TEMPS_PATH = $ROOT_PATH."/templates";
$IMAGES_PATH = $ROOT_PATH."/images";

include_once($INCLUDES_PATH."/funcs.inc.php");
include_once($INCLUDES_PATH."/classes.inc.php");

$database_connection = new DatabaseConnection(); // Adatbázis kapcsolat

if(!isset($_SESSION["logged_in_as"])){
    $_SESSION["logged_in_as"] = false;
}
if(!isset($_SESSION["family"])){
    $_SESSION["family"] = "";
}
if(!isset($_SESSION["given"])){
    $_SESSION["given"] = "";
}


// Oldalak, egyesével

$MAIN = array(
    "text"=>"Főoldal",
    "path"=>$TEMPS_PATH."/index.tpl.php"
);

$ABOUT = array(
    "text"=>"Rólunk",
    "path"=>""
);

$FINDOWNER = array(
    "text"=>"Gazdikereső",
    "path"=>""
);

$GOODTOKNOW = array(
    "text"=>"Jó tudni",
    "path"=>""
);

$BLOG = array(
    "text"=>"Blog",
    "path"=>$TEMPS_PATH."/msgtable.tpl.php"
);

$CONTACTUS = array(
    "text"=>"Kapcsolat",
    "path"=>$TEMPS_PATH."/sendMessage.tpl.php"
);

$LOGIN_REGISTER = array(
    "text"=>"Belépés/Regisztráció",
    "path"=>$TEMPS_PATH."/loginRegister.tpl.php"
);

$LOGOUT = array(
    "text"=>"Kilépés",
    "path"=>$LOGICALS_PATH."/logout.php"
);

$GALLERY = array(
    "text"=>"Galéria",
    "path"=>$TEMPS_PATH."/gallery.tpl.php"
);

$RESULT = array(
    "text"=>"",
    "path"=>$TEMPS_PATH."/result.tpl.php"
);

$ALWAYS = array(
    "/"=>$MAIN,
    "about"=>$ABOUT,
    "find_owner"=>$FINDOWNER,
    "good_to_know"=>$GOODTOKNOW,
    "blog"=>$BLOG,
    "contact"=>$CONTACTUS,
    "gallery"=>$GALLERY
); // Azok az oldalak, amik menüelemként mindig megjelennek

$LOGGEDIN = array(
    "logout"=>$LOGOUT,
); // Azok az oldalak, amik menüelemként csak akkor jelennek meg, ha a felhasználó be van jelentkezve

$LOGGEDOUT = array(
    "login_register"=>$LOGIN_REGISTER
); // Azok az oldalak, amik menüelemként csak akkor jelennek meg, ha a felhasználó ki van jelentkezve

$ALL = array_merge($ALWAYS, $LOGGEDIN, $LOGGEDOUT); // Az összes oldal, ami valamilyen helyzetben menüben megjelenik

$FRONTEND_LINK = "/foszk_donation/index.php";
$LOGICALS_ROOT_LINK = "/foszk_donation/logicals";
$LOGICAL_LINKS = array(
    "login_attempt"=>$LOGICALS_ROOT_LINK."/loginAttempt.php",
    "logout"=>$LOGICALS_ROOT_LINK."/logout.php",
    "message_attempt"=>$LOGICALS_ROOT_LINK."/messageAttempt.php",
    "register_attempt"=>$LOGICALS_ROOT_LINK."/registerAttempt.php",
    "upload_attempt"=>$LOGICALS_ROOT_LINK."/uploadAttempt.php"
);
$IMAGES_ROOT_LINK = "./images";