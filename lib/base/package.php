<?php
class BasePackage {
    // version 3
    public function __construct($env) {
        $this->env = $env;

        $arg_list = func_get_args();
        array_shift($arg_list);
        call_user_func_array(array($this, '_init'), $arg_list);
    }
    
    public function include_packages($packages) {
        foreach ($packages as $package) {
            include_once($this->env->basedir . 'lib/' . $package . '.php');
        }
    }

    function _init() {
    }
}
?>
