CREATE DATABASE homework;

USE homework;

CREATE TABLE mmini (
	id INT PRIMARY KEY AUTO_INCREMENT
-- AUTO_INCREMENT 자동으로 1에서부터 숫자가 생성되는 것
	,title VARCHAR(100) NOT NULL 
	,content VARCHAR(1000) NOT NULL 
	,create_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
	,delete_at DATETIME DEFAULT NULL 
	,update_at DATETIME DEFAULT NULL 
-- 	DEFAULT NULL 디폴트값이 널이기때문에 뒤에 안 넣어줘도 됨
);