<?php
session_start();
include_once(dirname(__DIR__, 1)."/includes/config.inc.php");

if (isset($_SESSION["message"])){
    include($RESULT["path"]); // Ha van valamilyen üzenet a munkamenetben, akkor az azt megjelenítő result template kerül betöltésre
} else if(isset($_GET["page"])){
    $requested_page = $_GET["page"]; // Ha van megadva a kérésben oldal neve, akkor az lesz a kért lap
} else {
    $requested_page = "/"; // Ha nincs megadva a kérésben oldal neve, akkor a root lesz a kért lap
}

if(isset($requested_page)){
    $page_exists = in_array($requested_page, array_keys($ALL)); // Ha az összes felhasználói kezdeményezésre lekérhető oldal között van a kért oldal, akkor annak templateje kerül betöltésre
    if($page_exists){
        include($ALL[$requested_page]["path"]);
    } else {
        $_SESSION["message"] = "A keresett oldal nem található"; // Ellenkező esetben üzenetként beállítjuk, hogy az adott lapot nem találtuk és betöltjük a result templatet
        header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
        include($RESULT["path"]);
    }
}
?>