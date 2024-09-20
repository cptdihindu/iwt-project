CREATE DATABASE nexride;

USE nexride;

-- Create the users table
CREATE TABLE users (
    no INT(11) AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR(20) NOT NULL,
    lname VARCHAR(20) NOT NULL,
    gender CHAR(1) NOT NULL,
    tele VARCHAR(10) NOT NULL,
    address VARCHAR(60) NOT NULL,
    email VARCHAR(40) NOT NULL,
    password VARCHAR(30) NOT NULL,
    role VARCHAR(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Create the bookings table
CREATE TABLE bookings (
    no INT(10) PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    tele VARCHAR(10) NOT NULL,
    vehicle VARCHAR(15) NOT NULL,
    pickLoc VARCHAR(80) NOT NULL,
    dropLoc VARCHAR(80) NOT NULL,
    time VARCHAR(40) NOT NULL,
    date VARCHAR(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
