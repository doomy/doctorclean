<?php
    include_once("lib/env.php");
    include_once("lib/base/with_db.php");
    include_once("lib/app/DoctorCleanController.php");

    $env = new Env("");

    $DoctorCleanController = new DoctorCleanController($env);
    $DoctorCleanController->run();
?>
