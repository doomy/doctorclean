<?php
class UserRegistrator extends BasePackageWithDb {
    public function attempt_registration($user) {
        return $this->dbh->run_db_call('UserRegistrator', 'register_user', $user);
    }
}

?>
