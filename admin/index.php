<?php
    include_once("../lib/env.php");
    include_once("../lib/base/with_db.php");
    include_once("../lib/app/AdminController.php");

    $env = new Env('../');
    
    $admin = new Admin($env);
    $admin->run();
?>
