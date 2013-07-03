<!doctype html>
<?php // version 4 ?>
<html lang="cs">
    <head>
        <meta charset="utf-8">
        <title>Administrace</title>
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
                    $admin->env->basedir . 'admin/js/modules/table_edit.js',
                    $admin->env
                )
            );

            foreach ($files_to_be_included as $file_to_be_included) {
                $file_to_be_included->include_file();
            }
        ?>

    </head>
    <body>
        <?php
            if (@$content_template)
                include ($admin->env->basedir . 'templates/admin/plugins/' . $content_template);
        ?>
        <br />
        <a href='?action=logout' />Log out</a>
    </body>
</html>
