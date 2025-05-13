CREATE DATABASE IF NOT EXISTS sales_management;
USE sales_management;

CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    quantity INT DEFAULT 0
);
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10,0) NOT NULL,
    quantity INT NOT NULL
);


INSERT INTO products (name, price, quantity) VALUES
('Chuột không dây Logitech', 250000, 50),
('Bàn phím cơ DareU', 550000, 20),
('Màn hình LG 24 inch', 3200000, 10);
