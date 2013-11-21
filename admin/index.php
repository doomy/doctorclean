<?php
    error_reporting(E_ERROR | E_WARNING | E_PARSE);;

    include_once("../lib/env.php");
    include_once("../lib/base/with_db.php");
    include_once("../lib/app/AdminController.php");
    include_once("../lib/admin/plugins/table_edit.php");
    include_once("../lib/admin/plugins/table_edit/editable_column.php");

    $env = new Env('../');

    $admin = new Admin($env);

    $content_table_edit = new TableEdit(
        $env,
        array(
            admin => $admin,
            table_name => 't_content_pages',
            editable_columns => get_content_table_editable_columns(),
            title => 'Editace obsahu'
        )
    );
    
    $users_table_edit = new TableEdit(
        $env,
        array(
            admin => $admin,
            table_name => 't_users',
                title => 'Uživatelská data',
            editable_columns => array(new EditableColumn('password', 'password')),
            disable_save => true
        )
    );

    $admin->add_modules(array($content_table_edit, $users_table_edit));
    $admin->run();
    
    function get_content_table_editable_columns() {
        return array(
            new EditableColumn('content', 'text_content'),
            new EditableColumn('menu_title', 'text'),
            new EditableColumn('title', 'text')
        );
    }
?>
