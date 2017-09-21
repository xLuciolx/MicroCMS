CREATE DATABASE IF NOT EXISTS microcms CHARACTER SET utf8 COLLATE utf8_general_ci;

USE microcms;

GRANT all privileges ON microcms.* TO 'microcms_user'@'localhost' identified BY 'secret';
