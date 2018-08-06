/*
SQLyog Community v11.52 (64 bit)
MySQL - 10.1.32-MariaDB : Database - vub
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`vub` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `vub`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `cust_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `username` varchar(250) DEFAULT NULL,
  `email_id` varchar(250) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `org_password` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`cust_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`cust_id`,`role_id`,`username`,`email_id`,`name`,`mobile`,`password`,`org_password`,`status`,`created_at`,`updated_at`,`created_by`) values (1,1,'admin','admin@gmail.com','admin','1234567890','e10adc3949ba59abbe56e057f20f883e','123456',1,'2018-08-03 15:41:02','2018-08-03 15:41:04',0);

/*Table structure for table `city_list` */

DROP TABLE IF EXISTS `city_list`;

CREATE TABLE `city_list` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_id` int(11) DEFAULT NULL,
  `city_name` varchar(250) DEFAULT NULL,
  `c_status` int(11) DEFAULT '1' COMMENT '1=active;0=deactive;2=delete',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `city_list` */

insert  into `city_list`(`city_id`,`c_id`,`city_name`,`c_status`,`created_at`,`updated_at`,`created_by`) values (9,1,'hyd',1,'2018-08-04 07:17:20','2018-08-04 10:53:56',1),(10,0,'chennai',1,'2018-08-04 07:17:39','2018-08-04 07:17:39',1),(11,1,'chennai',1,'2018-08-04 07:17:51','2018-08-04 10:53:53',1),(12,3,'hyd',1,'2018-08-04 07:23:17','2018-08-04 07:23:17',1),(13,8,'fgghghgf',1,'2018-08-04 07:36:58','2018-08-04 07:36:58',1),(14,2,'vbnbv',1,'2018-08-04 10:54:07','2018-08-04 10:54:07',1),(15,1,'bncbncvb',1,'2018-08-04 10:54:18','2018-08-04 10:54:18',1);

/*Table structure for table `countries_list` */

DROP TABLE IF EXISTS `countries_list`;

CREATE TABLE `countries_list` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(250) DEFAULT NULL,
  `country_code` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '1' COMMENT '1=active;0=deactive;2=delete',
  `create_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `countries_list` */

insert  into `countries_list`(`c_id`,`country_name`,`country_code`,`status`,`create_at`,`updated_at`,`created_by`) values (1,'india','in',1,'2018-08-02 12:58:14','2018-08-04 09:38:55',1),(2,'usa',NULL,1,'2018-08-02 12:59:38','2018-08-02 12:59:38',1),(3,'pak',NULL,1,'2018-08-02 13:10:03','2018-08-02 13:10:03',1),(8,'indO','INO',1,'2018-08-03 13:40:52','2018-08-04 09:38:42',1),(9,'inadia','in',2,'2018-08-03 14:42:10','2018-08-03 14:47:16',1);

/*Table structure for table `customers_list` */

DROP TABLE IF EXISTS `customers_list`;

CREATE TABLE `customers_list` (
  `cust_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `username` varchar(250) DEFAULT NULL,
  `source` varchar(250) DEFAULT NULL,
  `email_id` varchar(250) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `org_password` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`cust_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `customers_list` */

insert  into `customers_list`(`cust_id`,`role_id`,`username`,`source`,`email_id`,`name`,`mobile`,`password`,`org_password`,`status`,`created_at`,`updated_at`,`created_by`) values (1,2,'vasudevareddy',NULL,'vasu@gmail.com','vasudevareddy','8500050944','e10adc3949ba59abbe56e057f20f883e','123456',1,'2018-08-02 15:55:33','2018-08-02 15:55:35',0);

/*Table structure for table `location_list` */

DROP TABLE IF EXISTS `location_list`;

CREATE TABLE `location_list` (
  `l_id` int(11) NOT NULL AUTO_INCREMENT,
  `city_id` int(11) DEFAULT NULL,
  `location_name` varchar(250) DEFAULT NULL,
  `l_status` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`l_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `location_list` */

insert  into `location_list`(`l_id`,`city_id`,`location_name`,`l_status`,`created_at`,`updated_at`,`created_by`) values (1,9,'kukatpalli',1,'2018-08-04 09:06:02','2018-08-04 09:37:30',1),(2,9,'ammerpet',2,'2018-08-04 09:06:19','2018-08-04 09:15:25',1),(3,9,'ammerpet',1,'2018-08-04 09:15:41','2018-08-04 09:15:41',1),(4,9,'ghfghfgh',1,'2018-08-04 10:40:17','2018-08-04 10:40:17',1),(5,9,'vbxcvbxcv',1,'2018-08-04 10:41:53','2018-08-04 10:41:53',1),(6,11,'fgdfg',1,'2018-08-04 10:42:32','2018-08-04 10:42:32',1),(7,11,'hjfhjfhj',1,'2018-08-04 10:43:06','2018-08-04 10:43:06',1),(8,11,'fgdfgsdfg',1,'2018-08-04 10:47:27','2018-08-04 10:47:27',1),(9,11,'gfgsdf',1,'2018-08-04 10:48:19','2018-08-04 10:48:19',1),(10,11,'hghdgf',1,'2018-08-04 10:48:40','2018-08-04 10:53:31',1);

/*Table structure for table `role` */

DROP TABLE IF EXISTS `role`;

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `role` */

insert  into `role`(`role_id`,`role`,`status`,`created_at`) values (1,'Admin',1,'2018-08-02 15:51:54'),(2,'Channel/Institute',1,'2018-08-02 15:54:28'),(3,'User',1,'2018-12-01 15:54:42');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
