CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR(100),
    lname VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    user_type VARCHAR(50) DEFAULT 'user'
);