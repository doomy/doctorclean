<?php
class Client extends BasePackageWithDb {
    function _init() {
        $this->include_packages(
            array(
                "admin/plugins/table_edit",
                "admin/plugins/table_edit/editable_column"
            )
        );
    }

    public function get_admin_modules() {
        $content_table_edit = new TableEdit(
            $this->env,
            array(
                table_name => 't_content_pages',
                editable_columns => $this->get_content_table_editable_columns(),
                title => 'Editace obsahu'
            )
        );

        $users_table_edit = new TableEdit(
            $this->env,
            array(
                table_name => 't_users',
                title => 'Uživatelská data',
                editable_columns => array(new EditableColumn('password', 'password')),
                prevent_newline => true,
                disable_save => true
            )
        );
        
        $discounts_table_edit = new TableEdit(
            $this->env,
            array(
                table_name => 't_discounts',
                title => 'Slevy',
                editable_columns => $this->get_discounts_table_editable_columns(),
            )
        );

        return array($content_table_edit, $users_table_edit, $discounts_table_edit);

    }

    function get_content_table_editable_columns() {
        return array(
            new EditableColumn('content', 'text_content'),
            new EditableColumn('menu_title', 'text'),
            new EditableColumn('title', 'text')
        );
    }
    
    function get_discounts_table_editable_columns() {
        return array(
            new EditableColumn('str_id', 'text'),
            new EditableColumn('price_before_login', 'text'),
            new EditableColumn('price_after_login', 'text')
        );
    }

}

?>
