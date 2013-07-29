<?php

class Login_db_calls extends BasePackageWithDb {
// version 1
    public function are_credentials_correct($credentials) {
        $encryption_key = $this->env->ENV_VARS['DB_ENCRYPTION_KEY'];
        $sql = "SELECT AES_DECRYPT(password, '$encryption_key') AS password FROM t_users WHERE username = '$credentials->username';";
        $row = $this->dbh->fetch_one_from_sql($sql, 'object');
        return ($row->password == $credentials->password);
    }
}

?>
