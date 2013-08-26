<?php
class UserRegistrator extends BasePackageWithDb {
// version 2
    public $ERROR_PASSWORDS_DO_NOT_MATCH = -1;

    public function attempt_registration($user) {
        if ($user->password != $user->password_again) return $this->ERROR_PASSWORDS_DO_NOT_MATCH;
        if ($this->dbh->run_db_call('UserRegistrator', 'register_user', $user)) return 1;
    }
}

?>
