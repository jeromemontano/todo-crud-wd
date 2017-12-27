CREATE DATABASE todo;

CREATE TABLE tasks (
        id INT(6) AUTO_INCREMENT PRIMARY KEY,
        action VARCHAR(50)
);

INSERT INTO tasks (action) VALUES ("walk");
INSERT INTO tasks (action) VALUES ("run");
INSERT INTO tasks (action) VALUES ("hide");
