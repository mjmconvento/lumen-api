CREATE TABLE customers (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    username VARCHAR(30),
    password VARCHAR(128),
    country VARCHAR(20),
    email VARCHAR(70),
    gender VARCHAR(10),
    city VARCHAR(35),
    phone VARCHAR(20),
)
