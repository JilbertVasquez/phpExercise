CREATE TABLE users (
    id INT(11) NOT NULL AUTO_INCREMENT,
	username varchar(30) NOT NULL,
    psswrd varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIME,
    PRIMARY KEY (id)
);