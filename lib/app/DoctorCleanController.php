<?php
    class DoctorCleanController extends BasePackageWithDB {
        public function run() {
            $this->include_packages(array("template"));

            $template = new Template($this->env, 'index.tpl.php');
            $template->show(array('page' => $this->_get_page_from_request()));
        }
        
        function _get_page_from_request() {
            if (isset($_REQUEST['p']))
                return $_REQUEST['p'];
            else return "uvod";
        }
    }

?>
