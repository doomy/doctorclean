<?php
class UserRegistrator_db_calls extends BasePackageWithDb {
// version 2

    public function register_user($user) {
        $encryption_key = $this->env->ENV_VARS['DB_ENCRYPTION_KEY'];
        $sql = "INSERT INTO t_users (username, password, permissions, email) VALUES('$user->username', AES_ENCRYPT('$user->password', '$encryption_key'), 'user', '$user->email');";

        return $this->dbh->query($sql);
    }
    
    public function username_is_unique($username) {
        $sql = "SELECT 1 FROM t_users WHERE username = '$username';";
        $result = mysql_query($sql);
        if (mysql_fetch_row($result)) return false;
        else return true;
    }
}
?>
