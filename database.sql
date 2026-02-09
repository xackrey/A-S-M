CREATE DATABASE IF NOT EXISTS project_db;
USE project_db;

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(100),
  password VARCHAR(255),
  section VARCHAR(50)
);

CREATE TABLE activities (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  title VARCHAR(100),
  deadline DATE,
  FOREIGN KEY (user_id) REFERENCES users(id)
);
