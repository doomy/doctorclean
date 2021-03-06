
<?php

class Registration extends BasePackageWithDb {
// version 2

    public function run() {        if ((!isset($_POST["username"])) || (!isset($_POST['is_registering']))) return null;

        $this->include_packages(array('model/user', 'user_registrator'));

        $username = $_POST["username"];
        $password = $_POST["password"];
        $password_again = $_POST["password_again"];
        $email = $_POST["email"];
    
        $new_user = new User($username, $password, $email);
        $new_user->password_again = $password_again;
        $user_registrator = new UserRegistrator($this->env);
        $registration_result_code = $user_registrator->attempt_registration($new_user);
        if ( $registration_result_code == 1) {

        }

        switch ($registration_result_code) {
            case 1:
                return array('successful_registration' => 1);
            break;
            case $user_registrator->ERROR_PASSWORDS_DO_NOT_MATCH:
                return array('registration_error' => 'Hesla se neshodují!');
            break;
            case $user_registrator->ERROR_EMAIL_NOT_VALID:
                return array('registration_error' => 'Neplatná e-mailová adresa');
            break;
            case $user_registrator->ERROR_PASSWORD_TOO_SHORT:
                return array('registration_error' => 'Heslo musí být alespoň tři znaky nebo delší!');
            break;
            case $user_registrator->ERROR_USERNAME_CONTAINS_INVALID_CHARACTERS:
                return array('registration_error' => 'Neplatný znak v uživatelském jménu! Prosím používejte pouze alfanumerické znaky, "-" a "_".');
            break;
            case $user_registrator->ERROR_PASSWORD_CONTAINS_INVALID_CHARACTERS:
                return array('registration_error' => 'Neplatný znak v heslu! Prosím používejte pouze alfanumerické znaky, "-" a "_".');
            break;
            case $user_registrator->ERROR_USERNAME_ALREADY_EXISTS:
                return array('registration_error' => 'Toto uživatelské jméno už v naší databázi existuje, vyberte si, prosím, jiné.');
            break;
        }
    }
}

?>
