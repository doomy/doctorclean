<?php
    include_once("lib/env.php");
    include_once("lib/base/controller.php");
    include_once("lib/app/DoctorCleanController.php");

    $env = new Env("");

    $DoctorCleanController = new DoctorCleanController($env);
    $DoctorCleanController->run();
?>
