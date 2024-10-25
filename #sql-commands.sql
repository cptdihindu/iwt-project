-- Create the database
CREATE DATABASE nexride;
USE nexride;

-- Create the users table with case-sensitive collation
CREATE TABLE users (
    no INT(11) AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR(20) COLLATE utf8mb4_bin NOT NULL,
    lname VARCHAR(20) COLLATE utf8mb4_bin NOT NULL,
    gender CHAR(1) COLLATE utf8mb4_bin NOT NULL,
    tele VARCHAR(10) COLLATE utf8mb4_bin NOT NULL,
    vehicle VARCHAR(30) COLLATE utf8mb4_bin NOT NULL,
    plate VARCHAR(30) COLLATE utf8mb4_bin NOT NULL,
    address VARCHAR(60) COLLATE utf8mb4_bin NOT NULL,
    email VARCHAR(40) COLLATE utf8mb4_bin NOT NULL,
    password VARCHAR(30) COLLATE utf8mb4_bin NOT NULL,
    role VARCHAR(15) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Create the bookings table with case-sensitive collation
CREATE TABLE bookings (
    no INT(10) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) COLLATE utf8mb4_bin NOT NULL,
    tele VARCHAR(10) COLLATE utf8mb4_bin NOT NULL,
    vehicle VARCHAR(30) COLLATE utf8mb4_bin NOT NULL,
    plate VARCHAR(30) COLLATE utf8mb4_bin NOT NULL,
    pickLoc VARCHAR(80) COLLATE utf8mb4_bin NOT NULL,
    dropLoc VARCHAR(80) COLLATE utf8mb4_bin NOT NULL,
    time VARCHAR(40) COLLATE utf8mb4_bin NOT NULL,
    date VARCHAR(40) COLLATE utf8mb4_bin NOT NULL,
    status VARCHAR(15) COLLATE utf8mb4_bin NOT NULL,
    driver_no INT(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Inserting Default users
INSERT INTO users (fname, lname, gender, tele, vehicle, plate, address, email, password, role)
VALUES
('UCSC', '', '', '', '', '', '', 'ucsc', 'ucsc', 'customer'),
('UCSC DRIVER', '', '', '', 'nano-car', 'UOC-1207', '', 'ucscDriver', 'ucscDriver', 'driver'),
('UCSC ADMIN', '', '', '', '', '', '', 'ucscAdmin', 'ucscAdmin', 'admin');
