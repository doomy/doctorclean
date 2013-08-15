<!doctype html>
<html lang="cs">
    <head>
        <title><?php if($title!='DoctorClean') echo $title . " - "; ?>Doctor Clean</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	    <meta name="application-name" content="doctor-clean.cz" />
        <meta http-equiv="content-language" content="cs" />
        <meta http-equiv="cache-control" content="no-cache" />
        <meta http-equiv="pragma" content="no-cache" />
        <meta name="keywords" content="doctor, clean, čištění, koberců, strojů, auta, mytí, dezinfekce" />
        <meta name="description" content=" DoctorClean patří mezi české profesionální úklidové firmy se sídlem v Praze." />
        <link rel="stylesheet" href="css/main.css" type="text/css">
        <link rel="stylesheet" href="css/generic.css" type="text/css">
    </head>
    <body>
        <?php if (!$hide_metrics) { ?>
            <a href="http://www.toplist.cz/" class="hidden" target="_top"><img src="http://toplist.cz/count.asp?id=1573697" alt="TOPlist" border="0"></a>
        <?php } ?>
        
        <script src="js/jquery.js"></script>
        <script src="js/doctorclean.js"></script>
        
        <div class="header">
            <div class="center-area">
                <img class="logo" src="img/logo.jpg" />
                <img class="operator" src="img/operator.png" />
                <div class="login-area">
                    <?php if($logged_in) include('templates/login/in.tpl.php'); else include('templates/login/out.tpl.php'); ?>
                </div>
                <div class="menu-area">

                    <div class="menu-wrapper">
                        <div class="left-menu-end">
                        </div>
                        <menu>
                             <?php
                                 foreach ($menu_items as $key => $menu_item) {
                                     echo "<li";
                                     if ($key == 0) echo " class='first'";
                                     if ($menu_item == end($menu_items)) echo " class='last'";
                                     echo "><a href='?p=$menu_item->str_id'>$menu_item->menu_title</a></li>";
                                 }
                             ?>
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

                <?php if (isset($content_image_position)) { ?>
                    <img class="content-image<?php if ($content_image_position == 'right') echo " right"; ?>" src="img/<?php echo $page; ?>.png" />
                <?php
                    }
                    echo "<h1>$title</h1>";
                    if (isset($content)) echo $content;
                    if (isset($content_template)) include('templates/'.$content_template.'.tpl.php');
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
                    <h3>Provozovatel</h3>
                    Marek Markov <br />
                    Praha 9, 190 00, Špitálská 2/700<br />
                    IČ: 87594242<br />
                </div>
                <div class="right-column">
                    <h3>Obchodní zastoupení pro Prahu</strong></h3>
                    Email: <a href="mailto:doctorclean@seznam.cz">doctorclean@seznam.cz</a> <br />
                    Tel: +420 728 791 598
                </div>
                <div class="clear">
                </div>
            </div>
        </div>
    </body>
</html>
