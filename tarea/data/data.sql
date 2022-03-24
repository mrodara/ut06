CREATE DATABASE IF NOT EXISTS iaw_ut6_php_crud;

use iaw_ut6_php_crud;

CREATE TABLE users (
  id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(30) NOT NULL,
  lastnames VARCHAR(50) NOT NULL,
  email VARCHAR(70) NOT NULL,
  age INT(3),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users (name, lastnames, email, age) VALUES
('Benemerito','Diaz', 'b.gomez@hotmail.com', 65),
('Juan','Miranda', 'juanmiranda@hotmail.com', 32),
('Antonio','Gonzalez', 'gonzalez@hotmail.com', 60),
('Manuel','Gomez', 'manu@hotmail.com', 45),
('Maria','Paralera', 'paralera@hotmail.com', 30),
('Antonia','Perez', 'paralera@hotmail.com', 30),
('Pancracio','Lopez', 'p.lopez@hotmail.com', 75);