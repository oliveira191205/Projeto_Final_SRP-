CREATE DATABASE srp;

USE srp;

CREATE TABLE vehicles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type VARCHAR(30) NOT NULL,
    model VARCHAR(100) NOT NULL
);

CREATE TABLE parking (
    id INT AUTO_INCREMENT PRIMARY KEY,
    model VARCHAR(100) NOT NULL,
    type VARCHAR(20) NOT NULL,
    entry_time DATETIME NOT NULL,
    exit_time DATETIME NOT NULL,
    total_hours INT NOT NULL,
    price DECIMAL(10,2) NOT NULL
);
