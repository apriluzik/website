CREATE TABLE memo(
 num INT NOT NULL PRIMARY KEY auto_increment,
 id char(15) NOT NULL ,
 name CHAR(10) NOT NULL ,
 nick CHAR(10) NOT NULL ,
 content text NOT NULL ,
 regist_day char(20)
);