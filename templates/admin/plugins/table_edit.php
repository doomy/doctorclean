<?php // version 9 ?>
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
            $columns = array_keys($rows[0]);
            foreach ($rows as $row) {
                $id = $row['id'];

                echo "<tr>";
                    foreach ($row as $column => $record) { ?>
                        <td>
                            <?php
                            


                            $editable_type = get_editable_type($editable_columns, $column);
                            if ($editable_type) {
                                switch ($editable_type) {
                                    case 'file':
                                        echo "<input type='text' value='$record' name='column__{$column}__id__$id' class='fileinput' id='file-$column-$id' />";
                                    break;
                                    case 'text_content':
                                        echo "<input type='button' class='tiny button' VALUE='[ Upravit textový obsah ]' class='editable-content' onclick='window.open(\"{$admin->env->basedir}admin/editor/?id=$id\", \"window_name\", \"width=500,height=500\")' />";
                                    break;
                                    case 'password':
                                        echo "***********";
                                    break;
                                    default:
                                        echo "<input type='$editable_type' name='column__{$column}__id__$id' value='$record' />";
                                    break;
                                }
                            }
                            else
                                echo "$record";
                            ?>
                        </td>
                        <?php
                    }
                echo "</tr>";
            }
            $id++;
            echo "<tr class='hidden' id='newline'>";
            foreach ($columns as $column) { ?>
            <?
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

    <?php if (!($disable_new_record)) { ?>
        <input type='button' class="small center button" id='add_new_button' value='Přidat nový záznam' />
    <?php } ?>
    <?php if(!$disable_save) { ?>
        <input type='hidden' name='tableedit_action' value='update' />
        <input type='hidden' name='table_name' value='<?php echo $table_name; ?>'>
        <input type='submit' class="small center button" value='Uložit' />
    <?php } ?>
</form>

