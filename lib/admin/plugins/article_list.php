<?php
class ArticleList extends BasePackageWithDb {

    function _init() {
        $this->title = 'Editace Článků';
        $this->content_template = 'article_list.php';
        $this->template_vars = array();
    }
}

?>
