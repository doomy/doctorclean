<?php

class DoctorCleanModel extends BasePackageWithDb {
    public function get_page_vars($page_name) {
        $page = $this->dbh->run_db_call("DoctorClean", "get_page_vars", $page_name);
        $page->name = $page_name;
        return $page;
    }
    
    public function get_system_page_vars($page_name) {
        $page = $this->dbh->run_db_call("DoctorClean", "get_system_page_vars", $page_name);
        $page->name = $page_name;
        return $page;
    }
    
    public function is_system_page($page_name) {
        return $this->dbh->run_db_call("DoctorClean", "is_system_page", $page_name);
    }
}

?>
