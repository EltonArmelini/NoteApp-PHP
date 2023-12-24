CREATE DATABASE noteapp; 
USE DATABASE noteapp; 
CREATE TABLE notes(
    id int NOT NULL AUTO_INCREMENT,
    uuid VARCHAR(255) NOT NULL UNIQUE,
    title VARCHAR(255) NOT NULL,
    content text NOT NULL,
    updated DATE NOT NULL,
    PRIMARY KEY (id)
);