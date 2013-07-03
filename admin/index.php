<?php
    error_reporting(E_ERROR | E_WARNING | E_PARSE);;

    include_once("../lib/env.php");
    include_once("../lib/base/with_db.php");
    include_once("../lib/app/AdminController.php");
    include_once("../lib/admin/plugins/table_edit.php");

    $env = new Env('../');
    
    $admin = new Admin($env);
    $table_edit = new TableEdit($env, $admin, 't_content_pages', array('str_title'));
    $admin->add_modules($table_edit);
    $admin->run();
?>
