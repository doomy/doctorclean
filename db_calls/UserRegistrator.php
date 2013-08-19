<?php
class UserRegistrator_db_calls extends BasePackageWithDb {
// version 1

    public function register_user($user) {
        $encryption_key = $this->env->ENV_VARS['DB_ENCRYPTION_KEY'];
        $sql = "INSERT INTO t_users (username, password, permissions, email) VALUES('$user->username', AES_ENCRYPT('$user->password', '$encryption_key'), 'user', '$user->email');";

        return $this->dbh->query($sql);
    }

}
?>
