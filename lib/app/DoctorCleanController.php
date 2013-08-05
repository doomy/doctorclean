<?php
    class DoctorCleanController extends BasePackageWithDB {
        public function run() {
            $this->include_packages(array("template", "model/DoctorCleanModel", "login", "model/login/credentials"));

            session_start();
            $this->login = new Login($this->env);
            
            $this->logged_in = $this->_handle_login();
            
            $this->_render_template();
        }
        
        function _render_template() {
            $template = new Template($this->env, 'index.tpl.php');
            $template->show($this->_get_template_vars());
        }
        
        function _get_template_vars() {
            $page = $this->_get_page();
            $template_vars = array(
                'page' => $page->name,
                'title' => $page->title,
                'menu_items' => $this->dbh->run_db_call('DoctorClean', 'get_menu_items'),
                'content' => $page->content,
                'hide_metrics' => $this->env->ENV_VARS['metrics_hide_metrics'],
                'logged_in' => $this->logged_in,
                'content_image_position' => $this->_get_content_image_position($page->name)
            );

            if ($this->logged_in) $template_vars['username'] = $this->login->get_username();
            if (!$this->logged_in) $template_vars['failed_login'] = $this->failed_login;

            return $template_vars;
        }
        
        function _get_content_image_position($page_name) {
            return ($page_name == 'cisteni_aut') ? 'right' : 'left';
        }
        
        function _get_page() {
            $model = new DoctorCleanModel($this->env);
            $page_name = $this->_get_page_from_request();
            return $model->get_page_vars($page_name);
        }
        
        function _get_page_from_request() {
            if (isset($_REQUEST['p']))
                return $_REQUEST['p'];
            else return "uvod";
        }
        
        function _handle_login() {
            $this->failed_login = false;
            if (@$_POST['logout']) {
                $this->login->log_out();
                return false;
            }
            if ($this->login->has_permission('user')) return true;
            if (isset($_POST["username"])) {
                $credentials = new Credentials($_POST["username"], $_POST["password"]);
                if ($this->login->attempt_login($credentials, 'user')) return true;
                else $this->failed_login = true;
            }

            return false;
        }
    }

?>
