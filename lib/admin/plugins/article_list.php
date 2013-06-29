<?php
class ArticleList extends BasePackageWithDb {
// version 1
    public function run() {
        $this->title = 'Seznam Článků';
        $this->content_template = 'article_list.php';
        $article_list = $this->dbh->run_db_call('admin/plugins/ArticleList', 'get_article_names');
        $this->template_vars = array(
            'title'        => 'Seznam článků',
            'article_list' => $article_list
        );
    }
}

?>
