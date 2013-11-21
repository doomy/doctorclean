<?php
class Admin extends BasePackageWithDb {
    # version 19
    
    function _init($client) {
        $this->include_packages(array('login', 'model/login/credentials', 'template'));
        session_start();
        $this->add_modules($client->get_admin_modules());
    }

    public function run() {
        $this->login = new Login($this->env);
        if ($this->login->has_permission('admin')) {
            if (@$_GET['action']=='logout') {
                $this->login->log_out();
            }
            else return $this->_logged_in();
        }
        if(isset($_POST['username']) && $this->_attempt_login()) {
            return $this->_logged_in();
        }
        $this->_show_login_form();
    }
    
    function add_modules($modules) {
        foreach ($modules as $module) {
            $this->modules[] = $module;
        }
    }

    private function _show_login_form() {
        include($this->env->basedir.'templates/admin/login.php');
    }

    private function _logged_in() {
        $template_vars = array();

        if (isset($this->modules)) {
            if((count($this->modules) == 1)||(isset($_GET['plugin_id']))) {
                $index = isset($_GET['plugin_id']) ? $_GET['plugin_id'] : 0;
                $module = $this->modules[$index];
                $module->run();
                $template_vars['content_template'] = $module->content_template;
                $template_vars = array_merge(
                    $template_vars, $module->template_vars
                );
            }
            else {
                $template_vars['content_template'] = 'plugin_list.tpl.php';
                $template_vars['title'] = 'Hlavní strana';
                $template_vars['modules'] = $this->modules;
            }
        }

        $template = new Template($this->env, 'admin/admin.php');
        $template->show($template_vars);
    }
    
    private function _attempt_login() {
        $credentials = new Credentials(
            $_POST['username'], $_POST['password']
        );
        if ($this->login->attempt_login($credentials, 'admin')) {
            return true;
        };
        return false;
    }
}
?>
