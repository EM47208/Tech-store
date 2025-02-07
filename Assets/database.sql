
CREATE DATABASE IF NOT EXISTS user_management;

USE user_management;

-- 3. Create the users table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,       -- Unique user ID
    username VARCHAR(50) NOT NULL UNIQUE,    -- Username, must be unique
    password VARCHAR(255) NOT NULL,          -- Password, hashed
    role ENUM('admin', 'user') DEFAULT 'user', -- User role, default is 'user'
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP -- Timestamp of creation
);


-- Replace the hashed password with one generated using PHP's password_hash() function.
INSERT INTO users (username, password, role) 
VALUES ('admin', '$2y$10$saltsaltsaltJYhG/DbslVvY5YIbPiHiFgikXHQBaKKMaRlMG0aYta', 'admin');


-- Replace the hashed password with one generated using PHP's password_hash() function.
INSERT INTO users (username, password, role) 
VALUES ('testuser', '$2y$10$saltsaltsaltJYhG/DbslVvY5YIbPiHiFgikXHQBaKKMaRlMG0aYta', 'user');
