<?php
if (isset($_SESSION["message"])){
    $message = $_SESSION["message"];
    echo "<div class='container'><center><h2>${message}</h2></center></div>";
    //echo $_SESSION["message"];
}
unset($_SESSION["message"]);
echo "<meta http-equiv='refresh' content='5;url=${FRONTEND_LINK}'>";
?>