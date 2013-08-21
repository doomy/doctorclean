<?php
    if (@$successful_registration)
        include($env->basedir.'templates/system/registrace/success.tpl.php');
    else include($env->basedir.'templates/system/registrace/form.tpl.php');
 ?>
