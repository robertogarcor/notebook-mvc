CREATE DATABASE IF NOT EXISTS notebook DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE notebook;

CREATE TABLE users(
	id INT PRIMARY KEY AUTO_INCREMENT,
	username VARCHAR(50) NOT NULL UNIQUE,
	password VARCHAR(255) NOT NULL,
	email VARCHAR(100) NOT NULL UNIQUE,
	firstname VARCHAR(50),
	surname VARCHAR(50),
	createat DATETIME DEFAULT CURRENT_TIMESTAMP,
	updateat DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Encryted password 1234 -> hash 
--

INSERT INTO users (username, password, email, firstname, surname) VALUES
('roberto','$2y$12$uK6hAgnezcuKrvjOiEQM4ORV1F5CU7F4T5ORzgmScoYv0aj/um1Kq','roberto@email.com','Roberto','Garcia'),
('user2','$2y$12$uK6hAgnezcuKrvjOiEQM4ORV1F5CU7F4T5ORzgmScoYv0aj/um1Kq','user2@email.com','User2','User2');


CREATE TABLE tasks(
	id INT PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(512) NOT NULL,
	completed TINYINT(1) DEFAULT 0,
	user_id INT NOT NULL,
	createat DATETIME DEFAULT CURRENT_TIMESTAMP,
	updateat DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	CONSTRAINT FK_userTask FOREIGN KEY (user_id) 
		REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE 
)ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO tasks (name, completed, user_id) VALUES 
('Pintar a casa', FALSE, 1),
('Anar a comprar', TRUE, 1),
('Fer la feina de casa', TRUE, 2),
('Trucar a Mark', FALSE, 1),
('task 5', TRUE, 2),
('task 6', FALSE, 2),
('task 7', TRUE, 2),
('task 8', FALSE, 1);






