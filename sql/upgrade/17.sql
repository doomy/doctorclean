ALTER TABLE t_system_pages DROP str_id;

ALTER TABLE t_system_pages ADD str_id VARCHAR(255) NOT NULL AFTER id;
