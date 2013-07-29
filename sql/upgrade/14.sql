UPDATE t_users SET password = AES_ENCRYPT('clean', 'doctorclean') WHERE username = 'admin';
