<?php
    class DoctorCleanController extends BasePackageWithDB {
        public function run() {
            $this->include_packages(array("template", "model/DoctorCleanModel"));
            $model = new DoctorCleanModel($this->env);

            $page = $this->_get_page_from_request();
            $content = $model->get_page_content($page);

            $template = new Template($this->env, 'index.tpl.php');
            $template->show(array('page' => $page, 'content' => $content ));
        }
        
        function _get_page_from_request() {
            if (isset($_REQUEST['p']))
                return $_REQUEST['p'];
            else return "uvod";
        }
    }

?>
