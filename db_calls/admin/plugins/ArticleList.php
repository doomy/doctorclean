<?php
class ArticleList_db_calls extends BasePackageWithDb {
    public function get_article_names() {
        $sql = "SELECT str_id FROM t_content_pages;";
        $result = mysql_query($sql);
        $titles = array();
        while ($row = mysql_fetch_assoc($result)) {
            $titles[] = $row['str_id'];
        }
        return $titles;
    }
}
?>
