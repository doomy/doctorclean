<?php
class TableEdit extends BasePackageWithDb {
# version 17

    public function _init($args) {
        $this->admin = $args['admin'];
        $this->just_updated = false;
        $this->content_template = 'plugins/table_edit.php';
        $this->disable_new_record = isset($args['disable_new_record']) ? $args['disable_new_record'] : false;
        $this->table_name = $args['table_name'];
        $this->editable_columns = $args['editable_columns'];
        if (isset($_POST['tableedit_action']))
            $this->_perform_action($_POST['tableedit_action']);
        $this->template_vars = $this->_get_template_vars();
        $this->template_vars['title'] = $args['title'] ? $args['title'] : 'TableEdit';
        $this->template_vars['disable_save'] = $args['disable_save'] ? $args['disable_save'] : false;
    }
    
    public function run() {}
    
    private function _get_template_vars() {
        $rows = $this->dbh->get_array_of_rows_from_table($this->table_name, null, null, 'assoc');
        if (count($rows) <= 0) return false;
        return array(
            'columns' => array_keys($rows[0]),
            'rows'    => $rows,
            'editable_columns' => $this->editable_columns,
            'disable_new_record' => $this->disable_new_record,
            'just_updated' => $this->just_updated,
            'required_javascript_files' => array('modules/table_edit.js')
        );
    }
    
    private function _perform_action($action) {
        switch ($action) {
            case 'update':
               $this->_update();
            break;
        }
    }
    
    private function _update() {
        if (count($_FILES) > 1) $this->_update_files();
        $this->_update_from_post();
        $this->just_updated = true;
        if (@$_POST['new_row'] == 'yes')
            $this->_insert_new_line();
    }
    
    private function _update_files() {
        require ($this->admin->env->basedir . 'lib/file_uploader.php');
        $fileUploader = new FileUploader;
        foreach ($_FILES as $file) {
            $this->_handle_file_upload($file, $fileUploader);
        }
    }
    
    private function _handle_file_upload($file, $fileUploader) {
        $uploaded_file_path = $fileUploader->upload(
            $this->admin->env->basedir . "img/events/", $file
        );
        $uploaded_filename =
            $this->_get_filename_from_path($uploaded_file_path);
        $this->_handle_filename_change($file['name'], $uploaded_filename);
    }
    
    private function _update_from_post() {
        foreach($_POST as $post_key => $post_value) {
            $sql = "";

            if (strpos($post_key, 'column__') > -1) {
                $sql .= $this->_get_update_sql_from_post($post_key, $post_value);
            }
            $this->dbh->query($sql);
        }
    }

    private function _insert_new_line() {
        foreach ($_POST as $post_key => $post_value) {
            if (strpos($post_key, 'newcol__') > -1) {
                $parts = explode('__', $post_key);
                $column = $parts[1];
                $to_insert[$column] = $post_value;
            }
        }
        if (@count($to_insert) > 0) {
                $sql = $this->_get_insert_sql($to_insert);
                $this->dbh->query($sql);
        }
    }

    private function _get_update_sql_from_post($post_key, $post_value) {
        $parts = explode('__', $post_key);
        $column = $parts[1];
        $id = array_pop($parts);
        return "UPDATE $this->table_name
            SET $column='$post_value' WHERE id=$id";
    }
    
    private function _get_insert_sql($to_insert) {
        echo "aaa";
        $sql = "INSERT INTO $this->table_name (";
        $index = 0;
        foreach($to_insert as $column => $value) {
            $sql .= "$column";
            if ($index < count($to_insert)-1)
                $sql .= ", ";
            $index++;
        }
        $sql .= ") VALUES(";
        $index = 0;
        foreach($to_insert as $column => $value) {
            $sql .= "'$value'";
            if ($index < count($to_insert)-1)
                $sql .= ", ";
            $index++;
        }
        $sql .= ");";

        return $sql;
    }
    
    private function _get_filename_from_path($path) {
        $parts = explode("/", $path);
        return array_pop($parts);
    }
    
    private function _handle_filename_change($old_filename, $new_filename) {
        if ($new_filename != $old_filename) {
            $this->_correct_filename_in_POST($old_filename, $new_filename);
        }
    }
    
    private function _correct_filename_in_POST($old_filename, $new_filename) {
        foreach ($_POST as $post_key => $post_value) {
            if ($post_value == $old_filename) {
                $_POST[$post_key] = $new_filename;
            }
        }
    }
}
?>
