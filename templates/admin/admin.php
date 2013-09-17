<!doctype html>
<?php // version 5 ?>
<html lang="cs">
    <head>
        <meta charset="utf-8">
        <title><?php echo $title; ?> - Administrace</title>
        <?php $admin = $this ?>
        
        <?php
            include( $admin->env->basedir . 'lib/template/included_file.php' );

            $files_to_be_included = array(
                new IncludedFile($admin->env->basedir . 'css/foundation.css', $admin->env),
                new IncludedFile($admin->env->basedir . 'css/admin.css', $admin->env),
                new IncludedFile($admin->env->basedir .
                    'js/jquery.js',
                    $admin->env
                ),
                new IncludedFile($admin->env->basedir .
                    'js/modules/table_edit.js',
                    $admin->env
                )
            );

            foreach ($files_to_be_included as $file_to_be_included) {
                $file_to_be_included->include_file();
            }
        ?>

    </head>
    <body>
        <a class="small button" href='?action=logout' />Odhlásit</a>
        <div class="admin-head">
            <h1><?php echo $title; ?></h1>
            <h2>Administrace</h2>
        </div>
        <?php
            if (@$content_template)
                include ($admin->env->basedir . 'templates/admin/' . $content_template);
        ?>
        <br />
    </body>
</html>
