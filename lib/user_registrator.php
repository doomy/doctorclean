<?php
class UserRegistrator extends BasePackageWithDb {
// version 3
    public $ERROR_PASSWORDS_DO_NOT_MATCH = -1;
    public $ERROR_EMAIL_NOT_VALID = -2;
    public $ERROR_PASSWORD_TOO_SHORT = -3;
    public $ERROR_USERNAME_CONTAINS_INVALID_CHARACTERS = -4;
    public $ERROR_PASSWORD_CONTAINS_INVALID_CHARACTERS = -5;
    public $ERROR_USERNAME_ALREADY_EXISTS = -6;

    public function attempt_registration($user) {
        if ($user->password != $user->password_again) return $this->ERROR_PASSWORDS_DO_NOT_MATCH;
        if(!$this->_is_valid_email($user->email)) return $this->ERROR_EMAIL_NOT_VALID;
        if(strlen($user->password) < 3) return $this->ERROR_PASSWORD_TOO_SHORT;
        if(!$this->_contains_only_valid_characters($user->username)) return $this->ERROR_USERNAME_CONTAINS_INVALID_CHARACTERS;
        if(!$this->_contains_only_valid_characters($user->password)) return $this->ERROR_PASSWORD_CONTAINS_INVALID_CHARACTERS;
        if(!$this->_username_is_unique($user->username)) return $this->ERROR_USERNAME_ALREADY_EXISTS;
        if ($this->dbh->run_db_call('UserRegistrator', 'register_user', $user)) return 1;
    }

    private function _is_valid_email($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }
    
    private function _contains_only_valid_characters($value) {
        return preg_match('/[a-zA-Z0-9\-\_]/', $value);
    }
    
    private function _username_is_unique($username) {
        return $this->dbh->run_db_call('UserRegistrator', 'username_is_unique', $username);
    }
}

?>
