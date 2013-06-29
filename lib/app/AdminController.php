<?php
class Admin extends BasePackageWithDb {
    # version 11
    
    function _init() {
        $this->include_packages(array('admin/login', 'admin/login/credentials'));
        session_start();
    }

    public function run() {
        $this->login = new Login();
        if ($this->login->is_logged_in()) {
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
    
    public function add_modules($module) {
        $this->modules[] = $module;
    }

    private function _show_login_form() {
        include($this->env->basedir.'templates/admin/login.php');
    }
    
    private function _logged_in() {
        $this->template_vars = array();
        if (isset($this->modules)) {
            foreach($this->modules as $module) {
                $module->run();
                $content_template = $module->content_template;
                $this->template_vars = array_merge(
                    $this->template_vars, $module->template_vars
                );
            }
        }
        require($this->env->basedir .'templates/admin/admin.php');
    }
    
    private function _attempt_login() {
        $given_credentials = new Credentials(
            $_POST['username'], $_POST['password']
        );
        $expected_credentials = new Credentials(
            $this->env->ENV_VARS['admin_username'],
            $this->env->ENV_VARS['admin_password']
        );

        if ($this->login->attempt_login(
            $given_credentials, $expected_credentials
        ))
        {
            return true;
        }
        return false;
    }
}
?>
