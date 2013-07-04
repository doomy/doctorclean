<?php
class EditorController extends BasePackageWithDb {
// version 1
    function _init() {
        $this->include_packages(array('template'));
    }

    public function run() {
        $content = $this->dbh->run_db_call('Editor', 'get_content', $_GET['id']);
    
        $template = new Template($this->env, 'editor.tpl.php');
        $template->show(array('content' => $content));
    }
}
?>
