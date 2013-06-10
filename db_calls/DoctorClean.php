<?php
class DoctorClean_db_calls extends BasePackageWithDb {
    public function get_page_content($page) {
         $sql = "SELECT content FROM t_content_pages WHERE str_id = '$page';";
         return $this->dbh->fetch_one_from_sql($sql)->content;
    }
}
?>
