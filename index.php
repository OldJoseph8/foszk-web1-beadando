<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kutyásodj</title>

    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/login.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="./css/all.css">

    <!--  Owl-Carousel -->
    <link rel="stylesheet" href="./css/owl.carousel.min.css">
    <link rel="stylesheet" href="./css/owl.theme.default.min.css">

    <!--  AOS Library -->
    <link rel="stylesheet" href="./css/aos.css">

    <script src="./js/checks.js" type="text/javascript"></script>
</head>

<body>
    <!--Navbar-->
    <?php
        session_start();
        include_once(__DIR__."/includes/config.inc.php");
        include($TEMPS_PATH."/navbar.tpl.php");
    ?>
    
    <main>
        <?php
                include($LOGICALS_PATH."/getPage.php");
            ?>
    </main>




    <!-- Footer -->

    <footer class="footer">
        <div class="container">
            <div class="about-us" data-aos="fade-right" data-aos-delay="200">
                <h2>Rólunk</h2>
                <p>Az örökbefogadás komoly döntés: Egy életről döntesz.

                    Kérjük, ha számodra szimpatikus kutyát látsz, ne állj meg a fotójánál, olvass el róla minden információt!
                </p>
            </div>
            <div class="newsletter" data-aos="fade-right" data-aos-delay="200">
                <h2>Itt megtalálsz</h2>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d174519.4572470812!2d19.51390587951217!3d46.885674462929444!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4743da6108f61c3f%3A0x400c4290c1e1180!2zS2Vjc2tlbcOpdCwgTWFneWFyb3JzesOhZw!5e0!3m2!1shu!2sus!4v1712319348009!5m2!1shu!2sus" width="350" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="instagram" data-aos="fade-left" data-aos-delay="200">
                <h2>Instagram</h2>
                <div class="flex-row">
                    <img src="./assets/kaukazusi.jpg" alt="insta1">
                    <img src="./assets/vizsla-.jpg" alt="insta2">
                    <img src="./assets/akita.jpg" alt="insta3">
                </div>
                <div class="flex-row">
                    <img src="./assets/vizsla-.jpg" alt="insta4">
                    <img src="./assets/beagle.jpg" alt="insta5">
                    <img src="./assets/labi.jpg" alt="insta6">
                    <video controls width="100">
                        <source src="./assets/puli.mp4" class="img" type="video/mp4">
                        A böngésződ nem támogatja ezt a formátumot.
                    </video>
                </div>
            </div>
            <div class="follow" data-aos="fade-left" data-aos-delay="200">
                <h2>Kövess minket</h2>
                <p>Itt megtalálsz</p>
                <div>
                    <i class="fab fa-facebook-f"><a href="https://www.facebook.com/"></a></i>
                    <i class="fab fa-twitter"><a href="https://www.twitter.com/"></a></i>
                    <i class="fab fa-instagram"><a href="https://www.instagram.com/"></a></i>
                    <i class="fab fa-youtube"><a href="https://www.youtube.com/"></a></i>
                </div>
            </div>
        </div>
        <div class="rights flex-row">
            <h4 class="text-gray">
                ©2024 | made by team mind1
                <a href="https://github.com/sz-kardos/foszk_donation" target="_black">check our code <i class="fa-brands fa-github"></i>
                    Tube</a>
            </h4>
        </div>
        <div class="move-up">
            <span><i class="fas fa-arrow-circle-up fa-2x"></i></span>
        </div>
    </footer>


    <!-- Jquery Library file -->
    <script src="./js/Jquery3.7.1.min.js"></script>

    <!--  Owl-Carousel js -->
    <script src="./js/owl.carousel.min.js"></script>

    <!--  AOS js Library -->
    <script src="./js/aos.js"></script>

    <script src="./js/main.js"></script>
</body>

</html>