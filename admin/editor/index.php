<?php

include_once('../../lib/env.php');
include_once('../../lib/base/with_db.php');
include_once('../../lib/app/EditorController.php');

$env = new Env('../../');
$editor = new EditorController($env);
$editor->run();


?>
