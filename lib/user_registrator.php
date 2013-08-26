<?php
class UserRegistrator extends BasePackageWithDb {
// version 3
    public $ERROR_PASSWORDS_DO_NOT_MATCH = -1;
    public $ERROR_EMAIL_NOT_VALID = -2;

    public function attempt_registration($user) {
        if ($user->password != $user->password_again) return $this->ERROR_PASSWORDS_DO_NOT_MATCH;
        if(!$this->_is_valid_email($user->email)) return $this->ERROR_EMAIL_NOT_VALID;
        if ($this->dbh->run_db_call('UserRegistrator', 'register_user', $user)) return 1;
    }

    private function _is_valid_email($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }
}

?>
