<?php

class Registration extends BasePackageWithDb {
// version 1

    public function run() {
        if ((!isset($_POST["username"])) || (!isset($_POST['is_registering']))) return null;

        $this->include_packages(array('model/user', 'user_registrator'));

        $username = $_POST["username"];
        $password = $_POST["password"];
        $email = $_POST["email"];
    
        $new_user = new User($username, $password, $email);
        $user_registrator = new UserRegistrator($this->env);
        if ($user_registrator->attempt_registration($new_user)) {
            return array('successful_registration' => 1);
        };
    }
}

?>
