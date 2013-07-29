INSERT INTO t_users (username, pass, permissions) VALUES ('admin', AES_ENCRYPT('adminpass', 'doctorclean'), ('admin,user'));
