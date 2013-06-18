<?php
    include_once("../lib/env.php");
    include_once("../lib/base/with_db.php");
    include_once("../lib/app/AdminController.php");
    include_once("../lib/admin/plugins/article_list.php");

    $env = new Env('../');

    $article_list = new ArticleList($env);
    
    $admin = new Admin($env);
    $admin->add_modules($article_list);
    $admin->run();
?>
