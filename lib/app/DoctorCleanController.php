<?php
    class DoctorCleanController extends BasePackageWithDB {
        public function run() {
            $this->include_packages(array("template", "model/DoctorCleanModel", "login", "model/login/credentials"));

            $this->_init_attributes();

            $this->_render_template();
        }
        
        function _init_attributes() {
            $this->model = new DoctorCleanModel($this->env);

            session_start();
            $this->login = new Login($this->env);

            $this->logged_in = $this->_handle_login();
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
                'hide_metrics' => $this->env->ENV_VARS['metrics_hide_metrics'],
                'logged_in' => $this->logged_in,
                'is_system_page' => $this->is_system_page
            );


            if (!$this->is_system_page) {
                $template_vars['content'] = $page->content;
                $template_vars['content_image_position'] = $this->_get_content_image_position($page->name);
            }
            else $template_vars['content_template'] = $page->template;

            if ($this->logged_in) $template_vars['username'] = $this->login->get_username();
            if (!$this->logged_in) $template_vars['failed_login'] = $this->failed_login;

            return $template_vars;
        }
        
        function _is_system_page($page_name) {
            return $this->model->is_system_page($page_name);
        }
        
        function _get_content_image_position($page_name) {
            return ($page_name == 'cisteni_aut') ? 'right' : 'left';
        }
        
        function _get_page() {
            $page_name = $this->_get_page_from_request();
            $this->is_system_page = $this->_is_system_page($page_name);
            if ($this->is_system_page) return($this->model->get_system_page_vars($page_name));
            return $this->model->get_page_vars($page_name);
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
