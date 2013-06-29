<h1><?php echo $admin->template_vars['title']; ?></h1>
<?php

echo "<ul>";
foreach ($admin->template_vars['article_list'] as $article_name)
    echo "<li>$article_name</li>";
echo "</ul>";

?>
