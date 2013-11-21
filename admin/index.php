<?php
    error_reporting(E_ERROR | E_WARNING | E_PARSE);;

    include_once("../lib/env.php");
    include_once("../lib/base/with_db.php");
    include_once("../lib/app/AdminController.php");

    include_once("../lib/doctorclean/admin/client.php");

    $env = new Env('../');

    $admin = new Admin($env);
    $client = new Client($env);
    $admin->add_modules($client->get_admin_modules());
    $admin->run();
    

?>
