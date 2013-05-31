<?php
    class DoctorCleanController extends BaseController {
        public function run() {
            $this->include_packages(array("template"));
            $template = new Template($this->env, 'index.tpl.php');
            $template->show();
        }
    }

?>
