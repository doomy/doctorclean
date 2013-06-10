<?php

class DoctorCleanModel extends BasePackageWithDb {
    public function get_page_content($page) {
        return $this->dbh->run_db_call("DoctorClean", "get_page_content", $page);
    }
}

?>
