<?php
    error_reporting(E_ERROR | E_WARNING | E_PARSE);;

    include_once("../lib/env.php");
    include_once("../lib/base/with_db.php");
    include_once("../lib/app/AdminController.php");
    include_once("../lib/admin/plugins/table_edit.php");
    include_once("../lib/admin/plugins/table_edit/editable_column.php");

    $env = new Env('../');
    
    $text_content_column = new EditableColumn('content', 'text_content');
    $menu_title_column = new EditableColumn('menu_title', 'text');
    $title_column = new EditableColumn('title', 'text');
    
    $admin = new Admin($env);

    $content_table_edit = new TableEdit(
        $env,
        array(
            admin => $admin,
            table_name => 't_content_pages',
            editable_columns => array($text_content_column, $menu_title_column, $title_column),
            title => 'Editace obsahu'
        )
    );
    
    $password_column = new EditableColumn('password', 'password');
    
    $users_table_edit = new TableEdit(
        $env,
        array(
            admin => $admin,
            table_name => 't_users',
            title => 'Uživatelská data',
            editable_columns => array($password_column),
            disable_save => true
        )
    );

    $admin->add_modules($content_table_edit);
    $admin->add_modules($users_table_edit);
    $admin->run();
?>
