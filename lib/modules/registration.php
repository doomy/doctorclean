<?php

class Registration extends BasePackageWithDb {
// version 1

    public function run() {
        if ((!isset($_POST["username"])) || (!isset($_POST['is_registering']))) return null;

        $this->include_packages(array('model/user', 'user_registrator'));

        $username = $_POST["username"];
        $password = $_POST["password"];
        $password_again = $_POST["password_again"];
        $email = $_POST["email"];
    
        $new_user = new User($username, $password, $email);
        $new_user->password_again = $password_again;
        $user_registrator = new UserRegistrator($this->env);
        $registration_result = $user_registrator->attempt_registration($new_user);
        if ( $registration_result == 1) {
            return array('successful_registration' => 1);
        }

        if ($registration_result == $user_registrator->ERROR_PASSWORDS_DO_NOT_MATCH) {
            return array('registration_error' => 'Hesla se neshodují!');
        }
    }
}

?>
