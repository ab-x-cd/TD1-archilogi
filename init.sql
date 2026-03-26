-- Grant CREATE DATABASE privilege to the user
GRANT CREATE ON *.* TO 'admin'@'%';
FLUSH PRIVILEGES;

-- Create database if not exists - **MUST** match the DB_NAME in .env
CREATE DATABASE IF NOT EXISTS my_database CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE my_database;

-- Create Users table
CREATE TABLE IF NOT EXISTS Users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    login VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Create Post table
CREATE TABLE IF NOT EXISTS Post (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    body TEXT NOT NULL,
    date DATETIME DEFAULT CURRENT_TIMESTAMP,
    user_id INT,
    FOREIGN KEY (user_id) REFERENCES Users(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert sample users
INSERT INTO Users (login, password) VALUES
    ('admin', 'admin123'),
    ('defaut', 'password'),
    ('user1', 'test123');

-- Insert sample posts
INSERT INTO Post (title, body, date, user_id) VALUES
    ('Premier article', 'Ceci est le contenu du premier article de blog.', '2024-01-15 10:00:00', 1),
    ('Deuxième article', 'Voici un autre article intéressant.', '2024-01-16 14:30:00', 1),
    ('Article sur PHP', 'PHP est un langage de programmation côté serveur.', '2024-01-17 09:15:00', 2);
