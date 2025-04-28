<nav class="nav">
    <div class="nav-menu flex-row">
        <div class="logo">
            <a href="#" class="text-gray">Kutyásodj</a>
        </div>
        <div class="toggle-collapse">
            <div class="toggle-icons">
                <i class="fas fa-bars"></i>
            </div>
        </div>
        <div>
            <ul class="nav-items">
            <?php
                foreach ($ALWAYS as $key => $item) {
                    $text = $item["text"];
                    $link = ($key=="/") ? "." : "?page=".$key;
                    echo sprintf("<li class='nav-link'><a href=%s>%s</a></li>", $link, $text);
                }
            ?>
            <?php
                if ($_SESSION["logged_in_as"]) {
                    foreach ($LOGGEDIN as $key => $item) {
                        $text = $item["text"];
                        $link = ($key=="/") ? "." : "?page=".$key;
                        echo sprintf("<li class='nav-link'><a href=%s><span>%s</span><i class='fa-solid fa-user'></i></a></li>", $link, $text);
                    }
                } else {
                    foreach ($LOGGEDOUT as $key => $item) {
                        $text = $item["text"];
                        $link = ($key=="/") ? "." : "?page=".$key;
                        echo sprintf("<li class='nav-link'><a href=%s>%s<i class='fa-solid fa-user'></i></a></li>", $link, $text);
                    }
                }
            ?>
            </ul>
        </div>
        <div class="social text-gray">
        <?php
            if ($_SESSION["logged_in_as"]) {
                echo sprintf("<a>Bejelentkezve: %s %s (%s)</a></br>", $_SESSION["family"], $_SESSION["given"], $_SESSION["logged_in_as"]);
            }
        ?>

            <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
            <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
            <a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a>
            <a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
        </div>
    </div>
</nav>