<?php
include_once('package.php');

class BasePackageWithDb extends BasePackage {
// version 1

    public function __construct($env)  {
        $this->env = $env;
        $this->include_packages(array('db_handler'));
        $this->dbh = new dbHandler($this->env);
        $arg_list = func_get_args();
        array_shift($arg_list);
        call_user_func_array(array($this, '_init'), $arg_list);
    }
}

?>
