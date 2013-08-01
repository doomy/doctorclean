<?php
    class DoctorCleanController extends BasePackageWithDB {
        public function run() {
            $this->include_packages(array("template", "model/DoctorCleanModel", "login", "model/login/credentials"));
            $this->logged_in = $this->_handle_login();
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
                'hide_metrics' => $this->env->ENV_VARS['metrics_hide_metrics'],
                'logged_in' => $this->logged_in
            ));
        }
        
        function _get_page_from_request() {
            if (isset($_REQUEST['p']))
                return $_REQUEST['p'];
            else return "uvod";
        }
        
        function _handle_login() {
            session_start();
            $login = new Login($this->env);
            if (@$_POST['logout']) {
                $login->log_out();
                return false;
            }
            if ($login->has_permission('user')) return true;
            if (isset($_POST["username"])) {
                $credentials = new Credentials($_POST["username"], $_POST["password"]);
                if ($login->attempt_login($credentials, 'user')) return true;
            }

            return false;
        }
    }

?>
