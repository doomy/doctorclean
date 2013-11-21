<?php
    error_reporting(E_ERROR | E_WARNING | E_PARSE);;

    include_once("../lib/env.php");
    include_once("../lib/base/with_db.php");
    include_once("../lib/app/AdminController.php");

    include_once("../lib/doctorclean/admin/client.php");

    $env = new Env('../');

    $admin = new Admin($env, new Client($env));
    $admin->run();
    

?>
