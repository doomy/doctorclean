<html>
    <head>
        <meta charset="utf-8">
        <script src="../../ckeditor/ckeditor.js"></script>
    </head>
    <body>
        <form action="" method="POST">
            <textarea class="ckeditor" cols="50" rows="80" id="editor" name="editor" >
                <?php echo $content; ?>
            </textarea>
            <input type="hidden" name="action" value="save" />
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" value="Uložit" />
        </form>
    </body>
</html>

