CREATE TABLE t_users (
    id INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL UNIQUE,
    pass BLOB NOT NULL,
    permissions SET ('admin', 'user') NOT NULL DEFAULT 'user',
    PRIMARY KEY (id)
);
