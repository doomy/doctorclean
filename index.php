<!doctype html>
<html lang="cs">
    <head>
        <title>Doctor Clean</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	    <meta name="application-name" content="doctor-clean.cz" />
        <meta http-equiv="content-language" content="cs" />
        <meta http-equiv="cache-control" content="no-cache" />
        <meta http-equiv="pragma" content="no-cache" />
        <meta name="keywords" content="doctor, clean, čištění, koberce, stroje, auta, mytí, dezinfekce" />
        <meta name="description" content=" DoctorClean patří mezi české profesionální úklidové firmy se sídlem v Praze." />
        <link rel="stylesheet" href="css/main.css" type="text/css">
    </head>
    <body>
        <div class="header">
            <img class="logo" src="img/logo.jpg" />
            <div class="menu-area">
                <div class="menu-wrapper">
                    <div class="left-menu-end">
                    </div>
                    <menu>
                        <li><a href="?p=uvod">Úvod</a></li>
                        <li><a href="?p=cisteni-kobercu">Čištení koberců</a></li>
                        <li><a href="?p=cisteni-a-dezinfekce-klimatizace">Čištení a dezinfekce klimatizace</a></li>
                        <li><a href="?p=cisteni-aut">Čištení aut</a></li>
                        <li><a href="?p=myti-oken">Mytí oken</a></li>
                        <li><a href="?p=cenik">Ceník</a></li>
                        <li class="last"><a href="?p=kontakt">Kontakt</a></li>
                        <li class="clear">
                        </li>
                    </menu>
                    <div class="right-menu-end">
                    </div>
                    <div class="clear">
                    </div>
                </div>
            </div>
        </div>
        <div class="top-shadow">
        </div>
        <div class="content">
            <div class="top-overlay">
                <div class="overlay-block">
                    DoctorClean patří mezi
                    české profesionální
                    úklidové firmy
                    se sídlem v Praze.
                </div>
                <div class="overlay-block">
                    Naše služby jsou k dispozici pro
                    malé i velké firmy,
                    podnikatele, školy
                     i domácnosti.
                </div>
                <div class="overlay-block">
                    Máme jen spolehlivé
                    zaměstnance, vždy
                    dodržujeme dohodnuté
                    termíny.
                </div>
                <div class="overlay-block">
                    Máme moderní vybavení pro veškeré úklidové práce. Nabízíme komplexní služby.
                </div>
                <div class="clear">
                </div>
            </div>
            
            <div class="document-content">

                <?php
                    if (isset($_REQUEST['p']))
                        $page = $_REQUEST['p'];
                    else $page = "uvod";
                    echo "<img class=\"content-image\" src=\"img/$page.png\" />";
                    include "inc/$page" . '.html';
                ?>

                <div class="clear">
                </div>
            </div>
        </div>
        <div class="bottom-shadow">
            <div class="bottom-white">
            </div>
        </div>
        <div class="footer">
            <div class="footer-main-area">
                <div class="left-column">
                    <strong>Provozovatel</strong> <br />
                    Marek Markov <br />
                    Praha 9, 190 00, Špitálská 2/700<br />
                    IČ: 87594242<br />
                    Bank. spojení: 670100-2202535619/6210
                </div>
                <div class="right-column">
                    <strong>Obchodní zastoupení pro Prahu</strong><br />
                    Email: <a href="mailto:doctorclean@seznam.cz">doctorclean@seznam.cz</a> <br />
                    Tel: +420 728 791 598
                </div>
                <div class="clear">
                </duv>
            </div>
        </div>
    </body>
</html>
