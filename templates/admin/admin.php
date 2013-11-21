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
            );

            foreach ($files_to_be_included as $file_to_be_included) {
                $file_to_be_included->include_file();
            }
        ?>

    <?php
        foreach($required_javascript_files as $required_javascript_file) {
            echo "<script type='text/javascript' src='{$admin->env->basedir}js/admin/$required_javascript_file'></script>";
        }
    ?>

    </head>
    <body>
        <a class="small button" href='?action=logout' />Odhlásit</a>
        <div class="admin-head">
            <strong>Administrace</strong>
            <h1><?php echo $title; ?></h1>

        </div>
        <?php
            if (@$content_template)
                include ($admin->env->basedir . 'templates/admin/' . $content_template);

            if (isset($_GET['plugin_id'])) {
                ?>
                
                <a class="medium button" href="<?php echo $this->env->basedir; ?>admin/">Zpět</a>
                
                <?php
            }
        ?>
        <br />
    </body>
</html>
