CREATE DATABASE crud_db;
CREATE USER 'crud_user'@'%' IDENTIFIED BY 'p12345';
GRANT ALL ON crud_db.* TO 'crud_user'@'%';
FLUSH PRIVILEGES;
