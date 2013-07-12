<?php
    class DoctorCleanController extends BasePackageWithDB {
        public function run() {
            $this->include_packages(array("template", "model/DoctorCleanModel"));
            $model = new DoctorCleanModel($this->env);

            $page_name = $this->_get_page_from_request();
            $page = $model->get_page_content($page_name);

            $content = $page->content;

            $template = new Template($this->env, 'index.tpl.php');
            $template->show(array(
                'page' => $page_name,
                'title' => $page->title,
                'menu_items' => $this->dbh->run_db_call('DoctorClean', 'get_menu_items'),
                'content' => $page->content,
                'hide_metrics' => $this->env->ENV_VARS['metrics_hide_metrics']
            ));
        }
        
        function _get_page_from_request() {
            if (isset($_REQUEST['p']))
                return $_REQUEST['p'];
            else return "uvod";
        }
    }

?>
