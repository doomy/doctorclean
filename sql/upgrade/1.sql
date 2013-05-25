CREATE TABLE IF NOT EXISTS t_content_pages (
    id INT NOT NULL AUTO_INCREMENT,
    str_id VARCHAR(255) NOT NULL UNIQUE,
    place INT NOT NULL UNIQUE,
    title VARCHAR(255),
    content BLOB,
    PRIMARY KEY(id)
);
