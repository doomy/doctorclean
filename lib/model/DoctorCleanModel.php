<?php

class DoctorCleanModel extends BasePackageWithDb {
    function _init($logged_in) {
        $this->logged_in = $logged_in;
    }

    public function get_page_vars($page_name) {
        $page = $this->dbh->run_db_call("DoctorClean", "get_page_vars", $page_name);
        $page->name = $page_name;
        $page->content = $this->apply_discounts($page->content);

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

    function apply_discounts($content) {
        $discounts = $this->dbh->run_db_call("DoctorClean", "get_discounts");
        foreach ($discounts as $discount) {
            $replacement = $this->logged_in ?
                $discount->price_after_login : $discount->price_before_login;
            $content =  str_replace("*$discount->str_id*", $replacement, $content);
        }
        return $content;
    }
}

?>
