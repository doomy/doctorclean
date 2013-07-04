<?php

class Editor_db_calls extends BasePackageWithDb {

    function get_content($id) {
        $table_name = $this->env->ENV_VARS['editor_table_name'];
        $sql = "SELECT content FROM $table_name WHERE id = $id";
        $obj = $this->dbh->fetch_one_from_sql($sql);
        return $obj->content;
    }

}

?>
