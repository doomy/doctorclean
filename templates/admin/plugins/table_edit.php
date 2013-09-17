<?php // version 7 ?>
<?php if($just_updated) { ?>
    <div class="update-success-message">
        Úspěšně aktualizováno.
    </div>
<?php } ?>
<form action='' enctype="multipart/form-data" id='table_form' method='POST'>
    <table>
        <tr>
            <?php
            foreach ($columns as $column) {
                echo "<th>$column</th>";
            }
            ?>
        </tr>
        <?php
            $store_columns = true;

            foreach ($rows as $row) {
                echo "<tr>";

                    foreach ($row as $column => $record) {
                        if ($store_columns) $columns[] = $column;
                        if ($column == 'id') $id = $record;
                        $editable_type = get_editable_type($editable_columns, $column);
                        if ($editable_type) {
                            if ($editable_type=='file') {
                                echo "<td><input type='text' value='$record' name='column__{$column}__id__$id' class='fileinput' id='file-$column-$id' /></td>";
                            }
                            else if ($editable_type=='text_content') {
                                echo "<td><input type='button' class='tiny button' VALUE='[ Upravit textový obsah ]' class='editable-content' onclick='window.open(\"{$admin->env->basedir}admin/editor/?id=$id\", \"window_name\", \"width=500,height=500\")' /></td>";
                            }
                            else if ($editable_type=="password") {
                                echo "<td>***********</td>";
                            }
                            else
                            {
                                echo "<td><input type='$editable_type' name='column__{$column}__id__$id' value='$record' /></td>";
                            }
                        }
                        else
                            echo "<td>$record</td>";
                    }
                $store_columns = false;
                echo "</tr>";
            }
            $id++;
            echo "<tr class='hidden' id='newline'>";
            foreach ($columns as $column) {
                $editable_type = get_editable_type($editable_columns, $column);
                if ($editable_type) {
                    if ($editable_type=='file') {
                        echo "<td><input type='text' value='' name='newcol__{$column}__id__$id' placeholder='select a file...' class='fileinput' id='file-$column-$id' /></td>";
                    }
                    else
                    {
                        echo "<td><input type='$editable_type' name='newcol__{$column}__id__$id' value='' /></td>";
                    }
                }
                else
                    echo "<td>$id</td>";
            }
            echo "</tr>";

            function get_editable_type($editable_columns, $column) {
                if(!$editable_columns) return false;
                foreach ($editable_columns as $editable_column) {
                    if ($editable_column->name == $column) {
                        return $editable_column->type;
                    }
                }
                return false;
            }
        ?>

    </table>
    <input type='hidden' name='tableedit_action' value='update' />
    <?php if (!($prevent_newline)) { ?>
        <input type='button' id='add_new_button' value='Add a new row' />
    <?php } ?>
    <?php if(!$disable_save) { ?>
        <input type='submit' class="small save button" value='Uložit' />
    <?php } ?>
</form>

