<?php
class DoctorClean_db_calls extends BasePackageWithDb {
    public function get_page_vars($page_name) {
         $sql = "SELECT title, content FROM t_content_pages WHERE str_id = '$page_name';";
         return $this->dbh->fetch_one_from_sql($sql);
    }
    
    public function get_system_page_vars($str_id) {
        $sql = "SELECT title, template FROM t_system_pages WHERE str_id = '$str_id';";
        return $this->dbh->fetch_one_from_sql($sql);
    }
    
    public function get_menu_items() {
        $sql = "SELECT menu_title, str_id FROM t_content_pages;";
        $result = mysql_query($sql);
        while($record = mysql_fetch_object($result)) {
            $menu_items[] = $record;
        }
        return $menu_items;
    }
}
?>
