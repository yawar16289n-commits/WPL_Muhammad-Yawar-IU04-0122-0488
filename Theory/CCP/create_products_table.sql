CREATE DATABASE wpl;

USE wpl;

CREATE TABLE products (
    id INT AUTO_INCREMENT,
    product_name VARCHAR(255),
    product_category VARCHAR(255),
    product_price INT,
    product_quantity INT
);

