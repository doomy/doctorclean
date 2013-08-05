<?php

class DoctorCleanModel extends BasePackageWithDb {
    public function get_page_vars($page_name) {
        $page = $this->dbh->run_db_call("DoctorClean", "get_page_content", $page_name);
        $page->name = $page_name;
        return $page;
    }
}

?>
