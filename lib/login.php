<?php
class Login extends BasePackageWithDb {
    # requires session_start
    # version 5
    
    public function has_permission($permission) {
        return isset($_SESSION['logged_in']);
    }
    
    public function log_out() {
        unset($_SESSION['logged_in']);
    }
    
    public function attempt_login($credentials) {
        if ($this->_check_login($credentials)) {
            $this->_log_in();
            return true;
        }
        else return false;
    }
    
    private function _check_login($credentials) {
        return $this->dbh->run_db_call('Login', 'are_credentials_correct',  $credentials);
    }
    
    private function _log_in() {
        $_SESSION['logged_in'] = true;
    }
}
?>
