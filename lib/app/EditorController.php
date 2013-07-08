<?php
class EditorController extends BasePackageWithDb {
// version 2
    function _init() {
        $this->include_packages(array('template'));
    }

    public function run() {
    
        if(isset($_POST['action']) && ($_POST['action'] == 'save')) {
            $this->_save();
            return;
        }
        $id = $_GET['id'];
        $content = $this->dbh->run_db_call('Editor', 'get_content', $id);
    
        $template = new Template($this->env, 'editor.tpl.php');
        $template->show(array('content' => $content, 'id' => $id));
    }
    
    function _save() {
        $content = $_POST['editor'];
        $id = $_POST['id'];
        $this->dbh->run_db_call('Editor', 'save_content', $id, $content);
        $template = new Template($this->env, 'editor/finished.tpl.php');
        $template->show();
    }
}
?>
