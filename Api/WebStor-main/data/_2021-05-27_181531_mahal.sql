/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/ mahal /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE mahal;

DROP TABLE IF EXISTS types;
CREATE TABLE `types` (
  `tyId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `tyName` varchar(255) DEFAULT NULL COMMENT 'التصنيف',
  `create_time` datetime DEFAULT NULL COMMENT 'create time',
  `update_time` datetime DEFAULT NULL COMMENT 'update time',
  PRIMARY KEY (`tyId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='نوع الحساب';

DROP TABLE IF EXISTS users;
CREATE TABLE `users` (
  `usId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `usName` varchar(255) DEFAULT NULL COMMENT 'الحساب',
  `tyNum` int(11) NOT NULL,
  `create_time` datetime DEFAULT NULL COMMENT 'create time',
  `update_time` datetime DEFAULT NULL COMMENT 'update time',
  PRIMARY KEY (`usId`),
  KEY `tyNum` (`tyNum`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`tyNum`) REFERENCES `types` (`tyId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT=' الحسابات';

CREATE TABLE category(  
    caId int NOT NULL primary key AUTO_INCREMENT comment 'primary key',
    create_time DATETIME COMMENT 'create time',
    update_time DATETIME COMMENT 'update time',
  caName varchar(255)  
) default charset utf8  ;


DROP TABLE IF EXISTS prod;
CREATE TABLE prod(  
    prId int NOT NULL primary key AUTO_INCREMENT comment 'primary key',
    prName varchar(255),
    prPrixA DECIMAL(8,2) NOT NULL ,
    prPrixS DECIMAL(8,2) NOT NULL ,
    QtyLast int  NOT NULL COMMENT 'حد-الطلب',
   caNum INT NOT NULL ,

    create_time DATETIME COMMENT 'create time',
    update_time DATETIME COMMENT 'update time',
    FOREIGN KEY (caNum) REFERENCES category(caId)
  
) default charset utf8 comment '';

/* */;
CREATE TABLE hisab(
    


 );
/* */
DROP TABLE if EXISTS  hisab;
CREATE TABLE hisab(
    


 );

DROP TABLE if EXISTS  rec;
CREATE TABLE rec(  
    reId int NOT NULL primary key AUTO_INCREMENT comment 'primary key',
    reType varchar(255) comment '',
    reUser int NOT  NOT ,
    reHisab int NOT  NOT ,
    reIn int NOT  NOT ,
    reOut int NOT  NOT ,

     create_time DATETIME COMMENT 'create time',
    update_time DATETIME COMMENT 'update time'
   reNotes TEXT 
) default charset utf8 comment 'السندات';