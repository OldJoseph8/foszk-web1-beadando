
./js/

Állománynév	Leírás
checks.js	A kliensoldali adatbeviteli ellenőrző funkciókat tartalmazó állomány.
./logicals/

Állománynév	Leírás
getPage.php	A különböző templatek közül a megfelelő kiválasztásáért felelős logikát tartalmazza.
loginAttempt.php	A felhasználók bejelentkezéséhez tartozó logikát tartalmazza.
logout.php	A felhasználók kijelentkeztetéséhez használt logikát tartalmazza.
messageAttempt.php	Az üzenetküldéshez használt logikát tartalmazza.
registerAttempt.php	A felhasználói regisztrációhoz tartozó logikát tartalmazza.
uploadAttempt.php	A képfájlok feltöltéséhez tartozó logikát tartalmazza.
./templates/

Állománynév	Leírás
gallery.tpl.php	A képfeltöltés/galéria templateje
index.tpl.php	A főoldal templateje
loginRegister.tpl.php	A regisztrációs/bejelentkezési felület templateje
msgtable.tpl.php	A felhasználóktól származó üzeneteket megjelenítő felület templateje
navbar.tpl.php	A navbar templateje
result.tpl.php	A felhasználónak szóló visszajelzésekhez (belépés, regisztráció, kilépés, üzenetküldés, képfeltöltés, 404) használt template
sendMessage.tpl.php	Az üzenetküldő felület template-je
./includes/

Állománynév	Leírás
config.inc.php	A frontend kontrollerhez használt elérési útvonalak és állandók definiálási helye.
funcs.inc.php	Szerveroldali ellenőrző funkciók
classes.inc.php	Az adatbázis-kapcsolati osztály definiálásának helye
Adatbázis-kapcsolat osztály és objektum
A biztonságos adatbázis-kezelés érdekében az adatbázis kapcsolatokat a classes.inc.php fájlban deklarált DatabaseConnection osztály, illetve az abból származó $database_connection objektum kezeli. Az osztály PDO alapú. Privát adattagjai: maga a PDO kapcsolat, valamint a hitelesítő és egyéb kapcsolódó adatok.

Az osztály az alábbi metódusokkal rendelkezik:

is_closed: Ellenőrzi, hogy a kapcsolat lezárult-e (a PDO objektum értéke null).

closedb: Lezárja az adatbázis kapcsolatot.

connectdb: Létrehozza és beállítja a kapcsolatot.

insert_query és select_query: DML és DQL lekérdezéseket hajtanak végre, hibakezeléssel együtt. A select_query a lekért adatokat egy tömb formájában visszaadja, vagy null értéket ad, ha nincs találat.

Feladatok megvalósítása
Frontend controller
A frontend controller az index.php, getPage.php, és config.inc.php fájlok segítségével valósul meg. Az index.php a honlap elsődleges belépési pontja, és itt kerülnek include-olásra a többi fájlok.

A megfelelő oldal betöltéséért felelős logika a getPage.php-ban található:

Ellenőrzi, hogy a $_SESSION["message"] változó tartalmaz-e valamilyen üzenetet. Ha igen, a result.tpl.php templateet jeleníti meg.

Ha nincs üzenet, ellenőrzi, hogy a GET kérésben van-e page paraméter. Ha van, akkor az lesz a $requested_page, ha nincs, akkor az alapértelmezett gyökérkönyvtár.

Megnézi, hogy a config.inc.php-ban meghatározott $ALL array kulcsai között szerepel-e a $requested_page. Ha igen, betölti az adott oldal templatejét, ha nem, akkor egy "A keresett oldal nem található" üzenetet jelenít meg.

Navbar
A navbar az index.php, navbar.tpl.php, és config.inc.php állományok segítségével valósul meg. Az index.php az elsődleges belépési pont.

A navbar a config.inc.php-ban meghatározott $ALWAYS, $LOGGEDIN, és $LOGGEDOUT arrayokból építi fel az elemeket. Az $ALWAYS elemei mindig láthatók, míg a $LOGGEDIN és $LOGGEDOUT elemei a bejelentkezett felhasználótól függnek.

Galéria (Képek tárolása és megjelenítése)
A galéria az gallery.tpl.php template-ben valósul meg. A fájlok listázása a glob függvénnyel történik, és a fájlok típusát a checkIfImage függvény vizsgálja. Az érvényes képfájlok egy <img> tag-ben kerülnek megjelenítésre.

Képfeltöltés
A képfeltöltés a gallery.tpl.php és az uploadAttempt.php fájlokban valósul meg. A képfeltöltéshez csak bejelentkezett felhasználó férhet hozzá. A feltöltés érvényesítését a fájlméret és formátum alapján történik a isValidSizeImage és checkIfImage függvények segítségével. A feltöltött képek a megfelelő mappába kerülnek.

Kapcsolati űrlap
A kapcsolati űrlap a sendMessage.tpl.php template-ben és a messageAttempt.php fájlban található. Az üzenetek szerveroldali és kliensoldali ellenőrzésen esnek át. A helyes kitöltés után az üzenet mentésre kerül az adatbázisba.

Üzenetellenőrzés
A kliens és szerveroldali ellenőrzés a check.js és funcs.inc.js fájlokban található checkMessage függvény segítségével történik. A függvények a bemeneti adatokat ellenőrzik a hosszúság és érvényesség szempontjából.

Üzenetek mentése
A megfelelő üzenetek az adatbázisba kerülnek a insert_query metódussal. A message_text mezőben az üzenet szövege, a message_time mezőben az aktuális időpont kerül tárolásra. A user_id mezőben a bejelentkezett felhasználó azonosítója vagy NULL, ha vendégként küldte az üzenetet.

Üzenőfal
Az üzenetek megjelenítése a msgtable.tpl.php állományban történik. Az üzenetek táblázat formájában jelennek meg, és a LEFT JOIN művelettel kapcsolódnak a felhasználói adatokhoz.

Regisztráció
A regisztráció a loginRegister.tpl.php template-ben és a registerAttempt.php fájlban valósul meg. A felhasználói adatok ellenőrzése kliensoldalon történik a check.js-ben, szerveroldalon pedig a funcs.inc.php fájlban. Az adatokat az adatbázisba helyezi a password_hash segítségével.

Belépés
A belépés a loginRegister.tpl.php template-ben és a loginAttempt.php fájlban történik. A bejelentkezési folyamat a felhasználónév és jelszó ellenőrzésével történik. A sikeres bejelentkezés után a felhasználó adatainak megfelelő session változók kerülnek beállításra.

Kilépés
A kilépés egyszerűen a logout.php fájlban történik, amely törli a bejelentkezett felhasználóra vonatkozó session adatoka


A kilépés a logout.php logikai állományban valósul meg, melyet a Kijlentkezés gombra klikkelve indítunk el. A gomb csak akkor látszik, ha az `$_SESSION["logged_in_as"]` változónak igazszerű értéke van. 

A `$_SESSION` globális változóban "logged_in_as", "family" és "given" kulcsokhoz tartozó értékeket az `unset` funkcióval megszünteti. A "message" kulcshoz hozzárendeli a sikeres kijelentkezésről szóló értesítést, majd a result.tpl.php eredményoldalra irányít.
