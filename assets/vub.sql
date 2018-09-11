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

/*Table structure for table `aboutus_content` */

DROP TABLE IF EXISTS `aboutus_content`;

CREATE TABLE `aboutus_content` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `aboutus` longtext,
  `video_name` varchar(250) DEFAULT NULL,
  `org_name` varchar(250) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `aboutus_content` */

insert  into `aboutus_content`(`a_id`,`aboutus`,`video_name`,`org_name`,`created_at`,`updated_at`,`created_by`) values (1,'<h2>About Us</h2>\r\n\r\n<h3>Host videos in the highest quality possible</h3>\r\n\r\n<p>Start uploading, and enjoy 4K Ultra HD with HDR, tools to manage and showcase videos, no ads before, during, or after your videos, AND professional live streaming plans.</p>\r\n','0.7879420015366459050.694556001534825844back2.mp4','0.694556001534825844back2.mp4','2018-09-11 08:05:05','2018-09-11 08:05:05',1);

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
  `profile_pic` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`cust_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`cust_id`,`role_id`,`username`,`email_id`,`name`,`mobile`,`password`,`org_password`,`profile_pic`,`status`,`created_at`,`updated_at`,`created_by`) values (1,1,'admin','admin@gmail.com','admin','1234567890','e10adc3949ba59abbe56e057f20f883e','123456',NULL,1,'2018-08-03 15:41:02','2018-08-03 15:41:04',0);

/*Table structure for table `admin_chat` */

DROP TABLE IF EXISTS `admin_chat`;

CREATE TABLE `admin_chat` (
  `c_a_id` int(11) NOT NULL AUTO_INCREMENT,
  `cust_id` int(11) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `text` text,
  `type` enum('Replay','Replayed') DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `read_msg` int(11) DEFAULT '0',
  PRIMARY KEY (`c_a_id`)
) ENGINE=InnoDB AUTO_INCREMENT=237 DEFAULT CHARSET=latin1;

/*Data for the table `admin_chat` */

insert  into `admin_chat`(`c_a_id`,`cust_id`,`admin_id`,`text`,`type`,`created_at`,`updated_by`,`created_by`,`read_msg`) values (202,1,0,'xczxc','Replay','2018-09-04 13:09:22','2018-09-04 13:09:22',10,1),(203,1,0,'xczx','Replay','2018-09-04 13:09:25','2018-09-04 13:09:25',10,1),(204,7,1,'xzczxcxz','Replayed','2018-09-04 13:09:36','2018-09-04 13:09:36',1,1),(205,10,1,'xczXC','Replayed','2018-09-04 13:10:30','2018-09-04 13:10:30',1,1),(206,10,1,'xczxc','Replayed','2018-09-04 13:14:25','2018-09-04 13:14:25',1,1),(207,7,1,'zxcxczXc','Replayed','2018-09-04 13:15:12','2018-09-04 13:15:12',1,1),(208,10,1,'xcZXc','Replayed','2018-09-04 13:15:15','2018-09-04 13:15:15',1,1),(209,7,1,'vzxcvxc','Replayed','2018-09-04 13:17:25','2018-09-04 13:17:25',1,1),(210,7,1,'asdsdsad','Replayed','2018-09-04 13:18:58','2018-09-04 13:18:58',1,1),(211,7,1,'sdasd','Replayed','2018-09-04 13:19:01','2018-09-04 13:19:01',1,1),(212,7,1,'dasdasdas','Replayed','2018-09-04 13:19:07','2018-09-04 13:19:07',1,1),(213,10,1,'cxcZXC','Replayed','2018-09-04 13:21:51','2018-09-04 13:21:51',1,1),(214,10,1,'xcZXCZX','Replayed','2018-09-04 13:21:55','2018-09-04 13:21:55',1,1),(215,10,1,'vasudeva','Replayed','2018-09-04 13:22:00','2018-09-04 13:22:00',1,1),(216,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(217,7,1,'gfdg','Replayed','2018-09-04 13:30:02','2018-09-04 13:30:02',1,1),(218,7,1,'vasudevareddy','Replayed','2018-09-04 13:30:11','2018-09-04 13:30:11',1,1),(219,7,1,'vassu','Replayed','2018-09-04 13:30:18','2018-09-04 13:30:18',1,1),(220,7,1,'xczxczx','Replayed','2018-09-04 13:31:12','2018-09-04 13:31:12',1,1),(221,7,1,'vassudevadeey','Replayed','2018-09-04 13:31:18','2018-09-04 13:31:18',1,1),(222,7,1,'hello  bayaoy','Replayed','2018-09-04 13:31:26','2018-09-04 13:31:26',1,1),(223,10,1,'hi direct','Replayed','2018-09-04 13:31:33','2018-09-04 13:31:33',1,1),(227,10,1,'xczxczx','Replayed','2018-09-04 14:28:27','2018-09-04 14:28:27',1,1),(228,7,1,'xcXZCZX','Replayed','2018-09-04 14:28:31','2018-09-04 14:28:31',1,1),(229,1,1,'xcZXCZX','Replayed','2018-09-04 14:28:37','2018-09-04 14:28:37',1,1),(230,1,1,'xcZXCzxc','Replayed','2018-09-04 14:28:41','2018-09-04 14:28:41',1,1),(231,7,1,'xcZXCZXC','Replayed','2018-09-04 14:28:52','2018-09-04 14:28:52',1,1),(232,11,0,'hhi','Replay','2018-09-04 14:33:29','2018-09-04 14:33:29',11,1),(233,11,1,'vxzcvxcv','Replayed','2018-09-04 14:33:37','2018-09-04 14:33:37',1,1),(234,11,0,'hello','Replay','2018-09-04 14:33:44','2018-09-04 14:33:44',11,1),(235,11,1,'how  are you','Replayed','2018-09-04 14:33:53','2018-09-04 14:33:53',1,1),(236,10,0,'hi','Replay','2018-09-04 16:48:45','2018-09-04 16:48:45',10,0);

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

/*Table structure for table `classification_list` */

DROP TABLE IF EXISTS `classification_list`;

CREATE TABLE `classification_list` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `classification_list` */

insert  into `classification_list`(`c_id`,`c_name`,`status`,`created_at`,`updated_at`,`created_by`) values (5,'test',1,'2018-08-07 09:03:35','2018-08-07 09:18:37',1),(6,'test1',1,'2018-08-07 09:17:24','2018-08-07 09:18:30',1),(7,'jack',1,'2018-08-28 12:32:06','2018-08-28 12:32:06',1);

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

/*Table structure for table `course_list` */

DROP TABLE IF EXISTS `course_list`;

CREATE TABLE `course_list` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `institute_id` int(11) DEFAULT NULL,
  `c_name` varchar(250) DEFAULT NULL,
  `c_logo` varchar(250) DEFAULT NULL,
  `c_type` varchar(250) DEFAULT NULL,
  `c_profile_1` varchar(250) DEFAULT NULL,
  `c_profile_2` varchar(250) NOT NULL,
  `c_profile_3` varchar(250) DEFAULT NULL,
  `c_profile_4` varchar(250) DEFAULT NULL,
  `c_profile_5` varchar(250) DEFAULT NULL,
  `c_profile_6` varchar(250) DEFAULT NULL,
  `c_profile_7` varchar(250) DEFAULT NULL,
  `c_profile_8` varchar(250) DEFAULT NULL,
  `c_profile_9` varchar(250) DEFAULT NULL,
  `c_profile_10` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `classification_id` int(11) DEFAULT NULL,
  `v_id` int(11) DEFAULT NULL,
  `published` int(11) DEFAULT '0',
  `published_status` int(11) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`course_id`,`c_profile_2`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `course_list` */

insert  into `course_list`(`course_id`,`institute_id`,`c_name`,`c_logo`,`c_type`,`c_profile_1`,`c_profile_2`,`c_profile_3`,`c_profile_4`,`c_profile_5`,`c_profile_6`,`c_profile_7`,`c_profile_8`,`c_profile_9`,`c_profile_10`,`status`,`classification_id`,`v_id`,`published`,`published_status`,`created_at`,`updated_at`,`created_by`) values (1,1,'testing','0.8312970015336338431530899455.png','2','','','','','','','','','','',2,5,6,1,1,'2018-08-07 10:02:59','2018-08-07 11:25:53',1),(2,1,'testing','0.5511960015336340111530898263.png','1','11','22','22','33','55','66','77','88','99','1010',1,6,6,1,1,'2018-08-07 10:03:12','2018-08-28 12:33:53',1),(3,1,'testing23','0.5808160015336300411530899959.png','1','2','22','33','44','55','66','77','88','99','1010',1,5,6,1,1,'2018-08-07 10:20:41','2018-08-07 12:18:10',1),(4,1,'web development','0.176509001534828043aboutus.png','1','testing','testing','','','','','','','','',1,7,6,1,1,'2018-08-21 07:07:23','2018-08-28 12:32:58',1),(5,2,'java','','3','','','','','','','','','','',1,5,6,1,1,'2018-08-21 07:09:41','2018-08-21 07:09:41',2),(6,2,'html','','1','','','','','','','','','','',1,5,6,1,1,'2018-08-21 07:11:24','2018-08-21 07:11:24',2),(7,2,'css','','1','','','','','','','','','','',1,5,6,1,1,'2018-08-21 07:32:55','2018-08-21 07:32:55',2);

/*Table structure for table `course_type_list` */

DROP TABLE IF EXISTS `course_type_list`;

CREATE TABLE `course_type_list` (
  `c_t_l` int(11) NOT NULL AUTO_INCREMENT,
  `course_type` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`c_t_l`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `course_type_list` */

insert  into `course_type_list`(`c_t_l`,`course_type`,`status`,`created_at`,`updated_at`,`created_by`) values (1,'php programming',1,'2018-08-07 07:36:35','2018-08-07 07:36:35',1),(2,'seo',1,'2018-08-07 07:45:00','2018-08-07 08:15:38',1),(3,'java',1,'2018-08-07 07:45:39','2018-08-07 08:15:32',1),(5,'vvv',1,'2018-08-07 12:25:19','2018-08-07 12:25:19',1);

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
  `profile_pic` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `mobile_verified` int(11) DEFAULT '0',
  `otp_verification` varchar(250) DEFAULT NULL,
  `otp_dateitm` varchar(250) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`cust_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `customers_list` */

insert  into `customers_list`(`cust_id`,`role_id`,`username`,`source`,`email_id`,`name`,`mobile`,`password`,`org_password`,`profile_pic`,`status`,`mobile_verified`,`otp_verification`,`otp_dateitm`,`created_at`,`updated_at`,`created_by`) values (1,2,'vasudevareddy',NULL,'vasu@gmail.com','vasudevareddy','8500050944','e10adc3949ba59abbe56e057f20f883e','123456',NULL,1,0,NULL,NULL,'2018-08-02 15:55:33','2018-08-02 15:55:35',0),(2,2,NULL,'vueb','reddy.55610@gmail.com',NULL,'gfhfg','e10adc3949ba59abbe56e057f20f883e',NULL,'0.1654100015338183161513337708.jpg',0,0,NULL,NULL,NULL,'2018-08-10 07:23:40',NULL),(3,2,NULL,'vueb','reddy.55610@gmail.com',NULL,'8500050944',NULL,NULL,'',NULL,0,NULL,NULL,'2018-08-21 08:46:25','2018-08-21 08:54:27',1),(5,2,'104018910096192141661','google','vasudevareddy549@gmail.com','REDDEM VASUDEVAREDDY','8500050944',NULL,NULL,NULL,NULL,1,'176329','2018-08-31 07:34:26','2018-08-29 11:54:10','2018-08-31 07:35:00',NULL),(6,2,'111182826856894925436','google','banuribhavya97@gmail.com','bhavya reddy','9603306215',NULL,NULL,NULL,NULL,1,'288388','2018-09-01 06:48:52','2018-09-01 06:48:38','2018-09-01 06:49:27',NULL),(7,2,'108318449358159828278','google','reddy.bhavya97@gmail.com','Banuri Bhavya','9603306215',NULL,NULL,NULL,NULL,1,'124408','2018-09-01 07:04:24','2018-09-01 07:04:18','2018-09-01 07:04:49',NULL),(10,2,'103177793666372173094','google','bayapureddyforu@gmail.com','bayapu reddy','8500226782',NULL,NULL,NULL,NULL,1,'110611','2018-09-04 13:01:52','2018-09-04 13:01:38','2018-09-04 13:02:20',NULL),(11,2,'114186209979876725631','google','vasuforu22@gmail.com','vasu reddy','8500050944',NULL,NULL,NULL,NULL,1,'105157','2018-09-04 14:33:05','2018-09-04 14:33:00','2018-09-04 14:33:22',NULL),(12,2,'101860162377174962076','google','ksivakumar355@gmail.com','K SIVAKUMAR','8500226782',NULL,NULL,NULL,NULL,1,'113761','2018-09-06 15:01:34','2018-09-06 15:01:28','2018-09-06 15:01:46',NULL),(13,2,NULL,'vueb','like@gmail.com',NULL,'8500050944',NULL,NULL,'',1,0,NULL,NULL,'2018-09-06 15:03:14','2018-09-06 15:03:14',1),(14,2,NULL,'vueb','error@gmail.com','error','8500050944',NULL,NULL,'',1,0,NULL,NULL,'2018-09-06 15:05:31','2018-09-06 15:05:31',1);

/*Table structure for table `footer_content` */

DROP TABLE IF EXISTS `footer_content`;

CREATE TABLE `footer_content` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `footer` longtext,
  `mobile1` varchar(250) DEFAULT NULL,
  `mobile2` varchar(250) DEFAULT NULL,
  `email_id` varchar(250) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `footer_content` */

insert  into `footer_content`(`c_id`,`footer`,`mobile1`,`mobile2`,`email_id`,`created_at`,`updated_at`,`created_by`) values (1,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. You&#39;ve visited this page many times. Last visit: 27/8/18\r\n','9999878398','9999878398','info@vuebin.com','2018-09-11 10:44:28','2018-09-11 10:44:28',1);

/*Table structure for table `homepage_header_videos` */

DROP TABLE IF EXISTS `homepage_header_videos`;

CREATE TABLE `homepage_header_videos` (
  `h_v_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text,
  `video_name` text,
  `org_video_name` text,
  `status` int(11) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`h_v_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `homepage_header_videos` */

insert  into `homepage_header_videos`(`h_v_id`,`title`,`video_name`,`org_video_name`,`status`,`created_at`,`updated_at`,`created_by`) values (2,'sdfsdf','0.608002001533886400SrinivasaKalyanamTrailer-Nithiin,RaashiKhanna-VegesnaSathish,DilRaju-EnglishSubtitles.mp4','Srinivasa Kalyanam Trailer - Nithiin, Raashi Khanna - Vegesna Sathish, Dil Raju - English Subtitles.mp4',0,'2018-08-10 09:33:20','2018-08-21 06:31:13',1),(3,'dfdsf','0.406995001533887145SrinivasaKalyanamTrailer-Nithiin,RaashiKhanna-VegesnaSathish,DilRaju-EnglishSubtitles.mp4','Srinivasa Kalyanam Trailer - Nithiin, Raashi Khanna - Vegesna Sathish, Dil Raju - English Subtitles.mp4',0,'2018-08-10 09:45:45','2018-08-21 06:30:58',1),(4,' All your video needs ','0.694556001534825844back2.mp4','back2.mp4',0,'2018-08-21 06:30:44','2018-09-06 14:32:46',1),(5,'fdhfgh','0.7742290015362372140.694556001534825844back2.mp4','0.694556001534825844back2.mp4',1,'2018-08-21 06:49:02','2018-09-11 06:50:39',1);

/*Table structure for table `institue_chat` */

DROP TABLE IF EXISTS `institue_chat`;

CREATE TABLE `institue_chat` (
  `c_i_id` int(11) NOT NULL AUTO_INCREMENT,
  `cust_id` int(11) DEFAULT NULL,
  `institue_id` int(11) DEFAULT NULL,
  `text` text,
  `type` enum('Replay','Replayed') DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `read_msg` int(11) DEFAULT '0',
  PRIMARY KEY (`c_i_id`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=latin1;

/*Data for the table `institue_chat` */

insert  into `institue_chat`(`c_i_id`,`cust_id`,`institue_id`,`text`,`type`,`created_at`,`updated_by`,`created_by`,`read_msg`) values (1,5,4,'hello hsahjgfs hds u iu sfjkdsf dsuhhkjshfhdsfjk sjhsdhfihds ishfhdf shfhdf jdh fjshdfsjd hfdsf dshfhjsdhfjdsh fjhdsjhfjhsdfjhdjfhj jhfjdshj hdsjhhfj hfhkjshdfjkhdsf fjhfdj shfkj hsdfihKSHFIHI DS FHDS','Replay','2018-08-31 10:05:24','2018-08-31 10:05:24',5,0),(2,5,5,'hi','Replayed','2018-08-31 10:05:51','2018-08-31 10:05:51',5,1),(3,5,5,'how are you','Replay','2018-08-31 10:06:08','2018-08-31 10:06:08',5,1),(4,5,5,'hi','Replay','2018-08-31 10:06:24','2018-08-31 10:06:24',5,1),(5,5,5,'cvxzcvzxc','Replay','2018-08-31 10:06:39','2018-08-31 10:06:39',5,1),(6,5,5,'xcxzc','Replay','2018-08-31 10:17:57','2018-08-31 10:17:57',5,1),(7,5,5,'xcxcZX','Replay','2018-08-31 10:18:37','2018-08-31 10:18:37',5,1),(8,5,4,'vvbxcvb','Replay','2018-08-31 10:18:50','2018-08-31 10:18:50',5,0),(9,5,5,'vaaasyuu','Replay','2018-08-31 10:18:58','2018-08-31 10:18:58',5,1),(10,5,5,'xcZX','Replay','2018-08-31 10:21:23','2018-08-31 10:21:23',5,1),(11,5,5,'ddfdsf','Replay','2018-08-31 10:22:03','2018-08-31 10:22:03',5,1),(12,5,5,'xczxc','Replay','2018-08-31 10:32:00','2018-08-31 10:32:00',5,1),(13,5,5,'vasu','Replay','2018-08-31 10:32:06','2018-08-31 10:32:06',5,1),(14,5,5,'reddy','Replay','2018-08-31 10:32:51','2018-08-31 10:32:51',5,1),(20,6,5,'hello','Replay','2018-09-01 06:49:49','2018-09-01 06:49:49',6,1),(21,6,5,'hi  hello ','Replay','2018-09-01 06:52:08','2018-09-01 06:52:08',6,1),(22,6,5,'fgsfg','Replay','2018-09-01 07:02:35','2018-09-01 07:02:35',6,1),(23,6,5,'ghfgh','Replay','2018-09-01 07:02:37','2018-09-01 07:02:37',6,1),(24,6,5,'ghdf','Replay','2018-09-01 07:02:38','2018-09-01 07:02:38',6,1),(25,7,5,'hello','Replay','2018-09-01 07:06:08','2018-09-01 07:06:08',7,1),(26,5,5,'bbbb','Replayed','2018-09-01 11:25:28','2018-09-01 11:25:28',5,1),(27,6,4,'cvcv','Replayed','2018-09-01 11:26:11','2018-09-01 11:26:11',5,0),(28,7,5,'cXCZX','Replayed','2018-09-01 13:36:53','2018-09-01 13:36:53',5,1),(34,6,4,'xcxzc','Replayed','2018-09-01 13:47:04','2018-09-01 13:47:04',5,0),(35,7,4,'hello','Replayed','2018-09-01 13:48:07','2018-09-01 13:48:07',5,0),(36,6,5,'hhhi','Replayed','2018-09-01 13:50:01','2018-09-01 13:50:01',5,1),(37,7,4,'hiii','Replayed','2018-09-01 13:51:21','2018-09-01 13:51:21',5,0),(40,7,4,'ghghdg','Replayed','2018-09-01 13:53:20','2018-09-01 13:53:20',5,0),(41,7,4,'aaa','Replayed','2018-09-01 13:53:27','2018-09-01 13:53:27',5,0),(42,7,4,'hii ','Replayed','2018-09-01 13:53:33','2018-09-01 13:53:33',5,0),(43,6,4,'dafd','Replayed','2018-09-01 13:53:45','2018-09-01 13:53:45',5,0),(50,5,4,'hello','Replayed','2018-09-01 14:17:19','2018-09-01 14:17:19',5,0),(51,6,5,'cvzcxv','Replayed','2018-09-01 14:19:50','2018-09-01 14:19:50',5,1),(52,7,44,'xcxz','Replayed','2018-09-01 14:20:47','2018-09-01 14:20:47',5,0),(53,5,4,'czxc','Replayed','2018-09-01 14:22:05','2018-09-01 14:22:05',5,0),(54,6,4,'xcZXC','Replayed','2018-09-01 14:22:43','2018-09-01 14:22:43',5,0),(55,6,4,'xcXZ','Replayed','2018-09-01 14:22:52','2018-09-01 14:22:52',5,0),(56,7,4,'xcxc','Replayed','2018-09-01 14:23:36','2018-09-01 14:23:36',5,0),(57,7,5,'xcX','Replayed','2018-09-01 14:23:39','2018-09-01 14:23:39',5,1),(58,5,4,'cvvxcb','Replayed','2018-09-01 14:31:08','2018-09-01 14:31:08',5,0),(59,7,4,'gfgsdfg','Replayed','2018-09-01 14:31:24','2018-09-01 14:31:24',5,0),(60,5,4,'sd','Replayed','2018-09-04 07:37:36','2018-09-04 07:37:36',5,0),(61,6,4,'xczxczxczxc','Replayed','2018-09-04 13:51:52','2018-09-04 13:51:52',5,0),(62,7,4,'cxzczxczxc','Replayed','2018-09-04 13:53:23','2018-09-04 13:53:23',5,0),(63,NULL,4,NULL,NULL,NULL,NULL,NULL,0),(64,NULL,4,NULL,NULL,NULL,NULL,NULL,0),(65,5,5,'hi','Replayed','2018-09-04 16:44:23','2018-09-04 16:44:23',5,1),(66,6,5,'fdsgfd','Replayed','2018-09-04 16:45:16','2018-09-04 16:45:16',5,1),(67,7,5,'hi','Replayed','2018-09-04 16:45:47','2018-09-04 16:45:47',5,1),(68,7,5,'xcvdvcv','Replayed','2018-09-04 16:46:09','2018-09-04 16:46:09',5,1),(69,7,5,'xcZXC','Replayed','2018-09-05 07:09:08','2018-09-05 07:09:08',5,1),(70,6,5,'hiihello','Replayed','2018-09-05 07:11:50','2018-09-05 07:11:50',5,1),(71,6,5,'dfdfsd','Replayed','2018-09-05 07:11:56','2018-09-05 07:11:56',5,1),(72,5,5,'sddfdsf','Replayed','2018-09-05 07:12:26','2018-09-05 07:12:26',5,1),(73,5,5,'dfsdf','Replayed','2018-09-05 07:12:29','2018-09-05 07:12:29',5,1),(74,5,5,'vvvv','Replayed','2018-09-05 07:12:33','2018-09-05 07:12:33',5,1),(75,7,5,'gf','Replayed','2018-09-05 07:14:03','2018-09-05 07:14:03',5,1),(76,6,5,'fgdfg','Replayed','2018-09-05 07:30:11','2018-09-05 07:30:11',5,1),(77,6,5,'fgsdfgsdfg','Replayed','2018-09-05 07:30:21','2018-09-05 07:30:21',5,1),(78,5,5,'ghgdh','Replayed','2018-09-05 07:32:44','2018-09-05 07:32:44',5,1),(79,7,5,'tretwert','Replayed','2018-09-05 07:34:40','2018-09-05 07:34:40',5,1),(80,6,5,'sdsad','Replayed','2018-09-05 07:37:27','2018-09-05 07:37:27',5,1),(81,6,5,'hello  bhavya','Replayed','2018-09-05 07:37:36','2018-09-05 07:37:36',5,1),(82,5,5,'hello  reddem','Replayed','2018-09-05 07:37:47','2018-09-05 07:37:47',5,1);

/*Table structure for table `institute_list` */

DROP TABLE IF EXISTS `institute_list`;

CREATE TABLE `institute_list` (
  `i_id` int(11) NOT NULL AUTO_INCREMENT,
  `i_name` varchar(250) DEFAULT NULL,
  `i_logo` varchar(250) DEFAULT NULL,
  `i_about` text,
  `i_website` varchar(250) DEFAULT NULL,
  `country_name` varchar(45) DEFAULT NULL,
  `i_city` varchar(45) DEFAULT NULL,
  `location_name` varchar(45) DEFAULT NULL,
  `i_address` varchar(250) DEFAULT NULL,
  `i_p_phone` varchar(45) DEFAULT NULL,
  `i_s_phone` varchar(45) DEFAULT NULL,
  `i_email_id` varchar(250) DEFAULT NULL,
  `i_founder` varchar(250) DEFAULT NULL,
  `i_f_about` text,
  `i_contact_person` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `completed` int(11) DEFAULT '0',
  PRIMARY KEY (`i_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `institute_list` */

insert  into `institute_list`(`i_id`,`i_name`,`i_logo`,`i_about`,`i_website`,`country_name`,`i_city`,`location_name`,`i_address`,`i_p_phone`,`i_s_phone`,`i_email_id`,`i_founder`,`i_f_about`,`i_contact_person`,`status`,`created_at`,`updated_at`,`created_by`,`completed`) values (1,'Sathya techonologies','0.528892001534827423sathya_technolologies_Logo.png','Sathya Sathya techonologies','www.sathyatechonologies.com','1','9','1','201 sujuna  appt shasadri nagar','8500050944','8019345212','sathya@gmail.com','Sathya','here  ntg  to  say','vaasu',1,'2018-08-06 14:38:27','2018-08-21 09:06:40',1,1),(2,'Naresh i Technologies Software Training - Online Training','0.694115001534827336in1.png','dffdg','http://Naresh.com','1','9','1','hyderabad, 201','8500050944','8019345212','NareshiTechnologies@gmail.com','Naresh','Software Training - Online Training','Raghu r am',1,'2018-08-09 14:38:36','2018-08-21 06:55:36',2,1),(3,'vasudevareddy','','vasudevareddy','testing','1','9','1','Plot No. 177, Sri Vani Nilayam, 1st floor, Beside Sri Chaitanya High School, Sardar Patel Nagar,','8500050944','8019345212','reddy.55610@gmail.com','vasudevareddy','','chinna',1,'2018-08-21 08:46:25','2018-08-21 09:04:24',3,1),(5,'vaasu chiina','','','','1','9','3','sr nagar near  mitrivanam','8688683222','8688683222','siva@gmail.com','sivareddy','','sivareddy',1,'2018-08-23 13:17:55','2018-08-23 13:17:55',8,1),(6,'demo  site','','demo  site','www.demo.com','1','9','1','sr nagar near  mitrivanam','8688683222','8688683222','siva@gmail.com','sivareddy','test','sivareddy',1,'2018-08-28 14:39:09','2018-08-28 14:39:09',0,1),(7,'think different institue','','think different institue','think differentinstitue.com','1','9','1','sr nagar near  mitrivanam','8688683222','8688683222','thinkdiffrent@gmail.com','sivareddy','think different institue','siva',1,'2018-08-31 15:30:53','2018-08-31 15:30:53',5,1),(8,'like  ','','dfsdfdf','asdfsdf','1','9','3','dfasdf','8500050944','8500050944','like@gmail.com','like','dhfkjhjk','like',1,'2018-09-06 15:03:14','2018-09-06 15:03:14',13,1),(9,'error','','error','error','1','9','1','error','8500050944','8500050944','error@gmail.com','123error','error','error',1,'2018-09-06 15:05:31','2018-09-06 15:05:31',14,1);

/*Table structure for table `leads` */

DROP TABLE IF EXISTS `leads`;

CREATE TABLE `leads` (
  `l_id` int(11) NOT NULL AUTO_INCREMENT,
  `in_id` int(11) DEFAULT NULL,
  `course_name` varchar(250) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `location_name` varchar(250) DEFAULT NULL,
  `email_id` varchar(250) DEFAULT NULL,
  `contact_num` varchar(250) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `otp_verification` varchar(250) DEFAULT NULL,
  `otp_dateitm` varchar(250) DEFAULT NULL,
  `mobile_verified` int(11) DEFAULT '0',
  PRIMARY KEY (`l_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

/*Data for the table `leads` */

insert  into `leads`(`l_id`,`in_id`,`course_name`,`name`,`location_name`,`email_id`,`contact_num`,`created_at`,`updated_at`,`created_by`,`otp_verification`,`otp_dateitm`,`mobile_verified`) values (1,0,'test','vuebin','sdfsf','arya@gmail.com','820135326','2018-09-04 14:20:20','2018-09-04 14:20:20',NULL,NULL,NULL,0),(2,0,'sdcx','cZXCz','xcZXC','vasu@gmail.com','820135326','2018-09-04 14:20:37','2018-09-04 14:20:37',NULL,NULL,NULL,0),(3,0,'sdcx','snbnzxnmb','sdfsf','pushpa@gmail.com','820135326','2018-09-04 14:21:18','2018-09-04 14:21:18',NULL,NULL,NULL,0),(4,7,'linux','reddem vasudevareddy','kuktaplli','vasudevareddy549@gmail.com','8500050944','2018-09-04 14:23:43','2018-09-04 14:23:43',NULL,NULL,NULL,0),(5,1,'fgsdfg','fgfgdf','fdgfg','fgfg@gmail.com','8500050944','2018-09-04 15:01:27','2018-09-04 15:01:27',NULL,NULL,NULL,0),(6,0,'sdSAF','DSFASDF','DSFASDF','admin@gmail.com','820135326','2018-09-05 07:53:29','2018-09-05 07:53:29',NULL,NULL,NULL,0),(7,0,'hdgsfhasv','bjhhh','fghhf','ghfgh@gmail.com','8500050944','2018-09-05 08:13:10','2018-09-05 08:13:10',NULL,NULL,NULL,0),(8,0,'vghg','hghdgf','','fghjfg@gmail.com','850','2018-09-05 08:32:35','2018-09-05 08:32:35',0,'190981','2018-09-05 08:32:35',0),(9,0,'test','snbnzxnmb','','admin@gmail.com','8500050944','2018-09-05 08:33:39','2018-09-05 08:33:39',0,'151309','2018-09-05 08:33:39',0),(10,0,'gsdfg','snbnzxnmb','','admin@gmail.com','8500050944','2018-09-05 08:35:05','2018-09-05 08:35:05',0,'869680','2018-09-05 08:35:05',0),(11,0,'vghg','snbnzxnmb','','fghjfg@gmail.com','8500050944','2018-09-05 08:35:51','2018-09-05 08:35:51',0,'251110','2018-09-05 08:35:51',0),(12,0,'dfsdf','snbnzxnmb','sdfsf','vasu@gmail.com','8500050944','2018-09-05 08:58:35','2018-09-05 08:58:35',NULL,NULL,NULL,0),(13,0,'test','hghdgf','','fghjfg@gmail.com','8500050944','2018-09-05 08:59:08','2018-09-05 08:59:08',0,'286300','2018-09-05 08:59:08',0),(14,0,'php programming  language','vasudevareddy','','vasudevareddy549@gmail.com','8500050944','2018-09-05 09:20:51','2018-09-05 09:20:51',0,'265654','2018-09-05 09:20:51',0),(15,0,'php programming  language','reddem vasudevareddy','','vasudevareddy549@gmail.com','8500050944','2018-09-05 09:23:23','2018-09-05 09:24:30',0,'155395','2018-09-05 09:23:23',1),(16,0,'php programming  language','reddem vasudevareddy','','vasudevareddy549@gmail.com','8500050944','2018-09-05 09:27:44','2018-09-05 09:28:15',0,'265276','2018-09-05 09:27:44',1),(17,0,'php programming  language','reddem vasudevareddy','','vasudevareddy549@gmail.com','8500050944','2018-09-05 09:30:58','2018-09-05 09:31:34',0,'268525','2018-09-05 09:30:58',1),(18,0,'php programming  language','reddem vasudevareddy','','vasudevareddy549@gmail.com','8500050944','2018-09-05 09:32:05','2018-09-05 09:32:43',0,'276094','2018-09-05 09:32:05',1),(19,0,'php programming  language','reddem vasudevareddy','','vasudevareddy549@gmail.com','8500050944','2018-09-05 09:35:05','2018-09-05 09:35:05',0,'333100','2018-09-05 09:35:05',0),(20,0,'dfdsf','snbnzxnmb','','fghjfg@gmail.com','820135326','2018-09-05 09:35:27','2018-09-05 09:35:45',0,'142867','2018-09-05 09:35:27',1),(21,0,'php programming  language','reddem vasudevareddy','','fghjfg@gmail.com','8500050944','2018-09-05 09:36:16','2018-09-05 09:36:46',0,'633700','2018-09-05 09:36:16',1),(22,0,'php programming  language','reddem vasudevareddy','','vasudevareddy549@gmail.com','8500050944','2018-09-05 09:37:22','2018-09-05 09:37:30',0,'290395','2018-09-05 09:37:22',1),(23,3,'php programming  language','reddem vasudevareddy','','fghjfg@gmail.com','8500050944','2018-09-05 09:44:25','2018-09-05 09:44:36',0,'236116','2018-09-05 09:44:25',1),(24,3,'php programming  language','reddem vasudevareddy','','vasudevareddy549@gmail.com','8500050944','2018-09-05 09:45:47','2018-09-05 09:45:57',0,'221473','2018-09-05 09:45:47',1),(25,0,'dfdsf','dfds','','dfadf@gmail.com','8500050944','2018-09-05 11:11:01','2018-09-05 11:11:01',0,'643150','2018-09-05 11:11:01',0),(26,0,'php programming  language','snbnzxnmb','','vasudevareddy549@gmail.com','8500050944','2018-09-05 18:44:16','2018-09-05 18:44:56',0,'243523','2018-09-05 18:44:16',1),(27,0,'vbxcvb','vbxcb','xcvbxcvb','vbxcvb@gmail.com','vcxbxcvb','2018-09-06 15:09:39','2018-09-06 15:09:39',NULL,NULL,NULL,0),(28,0,'php programming  language','reddem vasudevareddy','','vasudevareddy549@gmail.com','8500050944','2018-09-11 06:50:57','2018-09-11 06:51:50',0,'241453','2018-09-11 06:50:57',1);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `role` */

insert  into `role`(`role_id`,`role`,`status`,`created_at`) values (1,'Admin',1,'2018-08-02 15:51:54'),(2,'Channel/Institute',1,'2018-08-02 15:54:28');

/*Table structure for table `testimonial` */

DROP TABLE IF EXISTS `testimonial`;

CREATE TABLE `testimonial` (
  `t_id` int(11) NOT NULL AUTO_INCREMENT,
  `author_name` varchar(250) DEFAULT NULL,
  `testimonial` longtext,
  `image_name` varchar(250) DEFAULT NULL,
  `org_name` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`t_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `testimonial` */

insert  into `testimonial`(`t_id`,`author_name`,`testimonial`,`image_name`,`org_name`,`status`,`created_at`,`updated_at`,`created_by`) values (1,'Someone famous','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut rutrum elit in arcu blandit, eget pretium nisl accumsan. Sed ultricies commodo tortor, eu pretium mauris.</p>\r\n','0.336636001536650106128.jpg','128.jpg',1,'2018-09-11 09:15:06','2018-09-11 09:15:20',1),(2,'Someone famous','<p>Vubin is a valuable enterprise platform for businesses to share their high-quality, visual storie</p>\r\n','0.262925001536650060overbite.gif','overbite.gif',1,'2018-09-11 09:14:20','2018-09-11 09:15:16',1);

/*Table structure for table `vendor_list` */

DROP TABLE IF EXISTS `vendor_list`;

CREATE TABLE `vendor_list` (
  `v_id` int(11) NOT NULL AUTO_INCREMENT,
  `v_name` varchar(250) DEFAULT NULL,
  `img` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`v_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `vendor_list` */

insert  into `vendor_list`(`v_id`,`v_name`,`img`,`status`,`created_at`,`updated_at`,`created_by`) values (5,'test','0.0562010015336274811513337708.jpg',2,'2018-08-07 09:28:06','2018-08-07 09:40:03',1),(6,'test1','0.5637160015336276131513337708.jpg',1,'2018-08-07 09:40:13','2018-08-07 09:40:13',1),(7,'','',2,'2018-08-10 08:01:45','2018-08-10 08:01:49',1),(8,'sdsad','0.9177440015338810731.png',1,'2018-08-10 08:04:33','2018-08-10 08:04:38',1);

/*Table structure for table `video_likes_list` */

DROP TABLE IF EXISTS `video_likes_list`;

CREATE TABLE `video_likes_list` (
  `v_l_id` int(11) NOT NULL AUTO_INCREMENT,
  `video_id` int(11) DEFAULT NULL,
  `ip_address` varchar(250) DEFAULT NULL,
  `cust_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`v_l_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `video_likes_list` */

insert  into `video_likes_list`(`v_l_id`,`video_id`,`ip_address`,`cust_id`,`status`,`created_at`,`updated_at`,`create_by`) values (1,7,'::1',8,1,'2018-08-27 12:04:01','2018-08-27 12:04:01',8),(2,8,'::1',8,1,'2018-08-27 12:40:45','2018-08-27 12:40:45',8),(3,10,'::1',8,1,'2018-08-27 12:41:16','2018-08-27 12:41:16',8),(4,7,'::1',10,1,'2018-09-06 14:50:04','2018-09-06 14:50:04',10);

/*Table structure for table `video_list` */

DROP TABLE IF EXISTS `video_list`;

CREATE TABLE `video_list` (
  `video_id` int(11) NOT NULL AUTO_INCREMENT,
  `i_id` int(11) DEFAULT NULL,
  `video_file` varchar(250) DEFAULT NULL,
  `org_video_file` varchar(250) DEFAULT NULL,
  `course_name` int(11) DEFAULT NULL,
  `training_mode` varchar(250) DEFAULT NULL,
  `v_title` varchar(250) DEFAULT NULL,
  `v_desc` text,
  `t_name` varchar(250) DEFAULT NULL,
  `a_author` varchar(250) DEFAULT NULL,
  `country_name` int(11) DEFAULT NULL,
  `i_city` int(11) DEFAULT NULL,
  `location_name` int(11) DEFAULT NULL,
  `u_b_schedule` text,
  `course_duration` varchar(250) DEFAULT NULL,
  `c_fee` varchar(250) DEFAULT NULL,
  `v_tags` text,
  `course_content` text,
  `public` int(11) DEFAULT '0',
  `private` int(11) DEFAULT '0',
  `status` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `demo_type` varchar(250) DEFAULT NULL,
  `full_type` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`video_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `video_list` */

insert  into `video_list`(`video_id`,`i_id`,`video_file`,`org_video_file`,`course_name`,`training_mode`,`v_title`,`v_desc`,`t_name`,`a_author`,`country_name`,`i_city`,`location_name`,`u_b_schedule`,`course_duration`,`c_fee`,`v_tags`,`course_content`,`public`,`private`,`status`,`created_at`,`updated_at`,`created_by`,`demo_type`,`full_type`) values (2,1,'0.027683001533645574SrinivasaKalyanamTrailer-Nithiin,RaashiKhanna-VegesnaSathish,DilRaju-EnglishSubtitles.mp4','Srinivasa Kalyanam Trailer - Nithiin, Raashi Khanna - Vegesna Sathish, Dil Raju - English Subtitles.mp4',3,'Offline,Online','Video Title','Video Description','Trainer Name','About Trainer',1,9,1,'ntg','Course Duration','Fee','Video Tags','Course Content',1,0,1,'2018-08-07 14:39:34','2018-08-10 11:32:21',1,'demo','full'),(4,1,'0.865030001533883317SrinivasaKalyanamTrailer-Nithiin,RaashiKhanna-VegesnaSathish,DilRaju-EnglishSubtitles.mp4','Srinivasa Kalyanam Trailer - Nithiin, Raashi Khanna - Vegesna Sathish, Dil Raju - English Subtitles.mp4',3,'Offline','xczxc','xcZXc','xzc','zxcZ',1,9,1,'Next Batch Will Be Started On 15-08-2018  Timings  11.Am to 1Pm and 3.Pm to 6.Pm','xcZXc','zxcZ','zxcZXc','XczXc',1,0,1,'2018-08-10 08:41:57','2018-08-21 07:48:05',1,'demo','full'),(5,2,'0.730699001534830548back1.mp4','back1.mp4',2,'Offline','dfgfdg','fdg','fgfdg','',1,9,1,'Next Batch Will Be Started On 15-08-2018  Timings  11.Am to 1Pm and 3.Pm to 6.Pm','','','','',1,1,1,'2018-08-21 07:49:08','2018-08-21 07:49:08',1,NULL,NULL),(6,1,'0.711145001534830588back2.mp4','back2.mp4',2,'Offline','cvzxc','','','',1,9,1,'Next Batch Will Be Started On 15-08-2018  Timings  11.Am to 1Pm and 3.Pm to 6.Pm','','','','',1,1,1,'2018-08-21 07:49:48','2018-08-21 07:49:48',1,NULL,NULL),(7,3,'0.467782001534834833back2.mp4','back2.mp4',6,'Offline,Online','php programming','','','',1,9,1,'Next Batch Will Be Started On 15-08-2018  Timings  11.Am to 1Pm and 3.Pm to 6.Pm','','','','',1,0,1,'2018-08-21 09:00:33','2018-08-21 12:21:50',1,NULL,NULL),(8,3,'0.120432001534846957back1.mp4','back1.mp4',6,'Offline,Online','html  video file','fdg','vasudevareddy','',1,9,1,'','','','','',1,1,1,'2018-08-21 12:22:37','2018-08-21 12:22:37',1,NULL,NULL),(9,3,'0.683589001534846979back1.mp4','back1.mp4',5,'Online','java video file','xcvcx','','',1,9,1,'','','','','',1,0,1,'2018-08-21 12:22:59','2018-08-21 12:22:59',1,NULL,NULL),(10,3,'0.413279001534847038back2.mp4','back2.mp4',4,'Online','web development  video','video description','vasudevareddy','',1,9,1,'','','','','',1,0,1,'2018-08-21 12:23:58','2018-08-21 12:23:58',1,NULL,NULL),(11,3,'0.8899080015353474080.694556001534825844back2.mp4','0.694556001534825844back2.mp4',4,'Offline,Online','web developemtn','developement','vasudevareddy','About Trainer',1,9,1,'Next Batch Will Be Started On 15-08-2018  Timings  11.Am to 1Pm and 3.Pm to 6.Pm','30days','120','testing','Course Content',1,0,1,'2018-08-27 07:23:28','2018-08-27 07:23:28',1,NULL,NULL),(12,3,'0.1537460015353513670.653953001534826942back1.mp4','0.653953001534826942back1.mp4',4,'Offline','web development  video','video description','vasudevareddy','About Trainer',1,9,1,'Next Batch Will Be Started On 15-08-2018  Timings  11.Am to 1Pm and 3.Pm to 6.Pm','30days','120','testing','Course Content',1,1,1,'2018-08-27 08:29:27','2018-08-27 08:29:27',1,NULL,NULL),(13,9,'0.7279890015362970990.3140040015362138783gpvideo.3gp','0.3140040015362138783gpvideo.3gp',2,'Offline','dfdsf','xfdsf','dfsdf','dfsd',1,9,1,'','dfsd','fdsfsd','dsf','dfds',1,0,1,'2018-09-07 07:11:39','2018-09-07 07:11:39',1,NULL,NULL);

/*Table structure for table `video_subscribe_list` */

DROP TABLE IF EXISTS `video_subscribe_list`;

CREATE TABLE `video_subscribe_list` (
  `v_s_id` int(11) NOT NULL AUTO_INCREMENT,
  `video_id` int(11) DEFAULT NULL,
  `ip_address` varchar(250) DEFAULT NULL,
  `cust_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`v_s_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `video_subscribe_list` */

insert  into `video_subscribe_list`(`v_s_id`,`video_id`,`ip_address`,`cust_id`,`status`,`created_at`,`updated_at`,`create_by`) values (2,7,'::1',7,1,'2018-08-27 11:42:14','2018-08-27 11:42:14',8),(3,7,'::1',5,1,'2018-09-03 08:15:24','2018-09-03 08:15:24',5);

/*Table structure for table `video_view_list` */

DROP TABLE IF EXISTS `video_view_list`;

CREATE TABLE `video_view_list` (
  `v_l_id` int(11) NOT NULL AUTO_INCREMENT,
  `v_id` int(11) DEFAULT NULL,
  `ip_address` varchar(250) DEFAULT NULL,
  `cust_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`v_l_id`)
) ENGINE=InnoDB AUTO_INCREMENT=246 DEFAULT CHARSET=latin1;

/*Data for the table `video_view_list` */

insert  into `video_view_list`(`v_l_id`,`v_id`,`ip_address`,`cust_id`,`status`,`created_at`,`updated_at`,`create_by`) values (1,2,'::1',0,1,'2018-08-27 10:11:37','2018-08-27 10:11:37',0),(2,2,'::1',0,1,'2018-08-27 10:11:38','2018-08-27 10:11:38',0),(3,2,'::1',0,1,'2018-08-27 10:11:59','2018-08-27 10:11:59',0),(4,2,'::1',0,1,'2018-08-27 10:12:00','2018-08-27 10:12:00',0),(5,2,'::1',0,1,'2018-08-27 10:12:59','2018-08-27 10:12:59',0),(6,2,'::1',0,1,'2018-08-27 10:13:00','2018-08-27 10:13:00',0),(7,7,'::1',0,1,'2018-08-27 10:26:18','2018-08-27 10:26:18',0),(8,7,'::1',0,1,'2018-08-27 10:26:19','2018-08-27 10:26:19',0),(9,7,'::1',0,1,'2018-08-27 10:26:25','2018-08-27 10:26:25',0),(10,7,'::1',0,1,'2018-08-27 10:26:26','2018-08-27 10:26:26',0),(11,9,'::1',0,1,'2018-08-27 10:26:32','2018-08-27 10:26:32',0),(12,9,'::1',0,1,'2018-08-27 10:26:36','2018-08-27 10:26:36',0),(13,10,'::1',0,1,'2018-08-27 10:30:25','2018-08-27 10:30:25',0),(14,10,'::1',0,1,'2018-08-27 10:30:27','2018-08-27 10:30:27',0),(15,7,'::1',0,1,'2018-08-27 10:39:43','2018-08-27 10:39:43',0),(16,7,'::1',0,1,'2018-08-27 10:39:46','2018-08-27 10:39:46',0),(17,7,'::1',0,1,'2018-08-27 10:46:27','2018-08-27 10:46:27',0),(18,7,'::1',0,1,'2018-08-27 10:46:29','2018-08-27 10:46:29',0),(19,7,'::1',0,1,'2018-08-27 10:48:57','2018-08-27 10:48:57',0),(20,7,'::1',0,1,'2018-08-27 10:48:59','2018-08-27 10:48:59',0),(21,7,'::1',0,1,'2018-08-27 10:49:17','2018-08-27 10:49:17',0),(22,7,'::1',0,1,'2018-08-27 10:49:18','2018-08-27 10:49:18',0),(23,7,'::1',0,1,'2018-08-27 10:49:47','2018-08-27 10:49:47',0),(24,7,'::1',0,1,'2018-08-27 10:49:49','2018-08-27 10:49:49',0),(25,7,'::1',0,1,'2018-08-27 10:50:14','2018-08-27 10:50:14',0),(26,7,'::1',0,1,'2018-08-27 10:50:15','2018-08-27 10:50:15',0),(27,7,'::1',0,1,'2018-08-27 10:54:26','2018-08-27 10:54:26',0),(28,7,'::1',0,1,'2018-08-27 10:54:27','2018-08-27 10:54:27',0),(29,7,'::1',8,1,'2018-08-27 10:55:06','2018-08-27 10:55:06',8),(30,7,'::1',8,1,'2018-08-27 10:55:07','2018-08-27 10:55:07',8),(31,7,'::1',8,1,'2018-08-27 10:56:05','2018-08-27 10:56:05',8),(32,7,'::1',8,1,'2018-08-27 10:56:06','2018-08-27 10:56:06',8),(33,7,'::1',8,1,'2018-08-27 10:57:09','2018-08-27 10:57:09',8),(34,7,'::1',8,1,'2018-08-27 10:57:10','2018-08-27 10:57:10',8),(35,7,'::1',8,1,'2018-08-27 10:59:25','2018-08-27 10:59:25',8),(36,7,'::1',8,1,'2018-08-27 10:59:27','2018-08-27 10:59:27',8),(37,7,'::1',8,1,'2018-08-27 11:00:02','2018-08-27 11:00:02',8),(38,7,'::1',8,1,'2018-08-27 11:00:03','2018-08-27 11:00:03',8),(39,7,'::1',8,1,'2018-08-27 11:00:25','2018-08-27 11:00:25',8),(40,7,'::1',8,1,'2018-08-27 11:00:26','2018-08-27 11:00:26',8),(41,7,'::1',8,1,'2018-08-27 11:01:37','2018-08-27 11:01:37',8),(42,7,'::1',8,1,'2018-08-27 11:01:47','2018-08-27 11:01:47',8),(43,7,'::1',8,1,'2018-08-27 11:01:48','2018-08-27 11:01:48',8),(44,10,'::1',8,1,'2018-08-27 11:02:15','2018-08-27 11:02:15',8),(45,10,'::1',8,1,'2018-08-27 11:02:16','2018-08-27 11:02:16',8),(46,10,'::1',8,1,'2018-08-27 11:03:39','2018-08-27 11:03:39',8),(47,10,'::1',8,1,'2018-08-27 11:03:40','2018-08-27 11:03:40',8),(48,10,'::1',8,1,'2018-08-27 11:03:57','2018-08-27 11:03:57',8),(49,10,'::1',8,1,'2018-08-27 11:03:58','2018-08-27 11:03:58',8),(50,10,'::1',8,1,'2018-08-27 11:05:30','2018-08-27 11:05:30',8),(51,10,'::1',8,1,'2018-08-27 11:05:31','2018-08-27 11:05:31',8),(52,10,'::1',8,1,'2018-08-27 11:06:07','2018-08-27 11:06:07',8),(53,10,'::1',8,1,'2018-08-27 11:06:08','2018-08-27 11:06:08',8),(54,7,'::1',8,1,'2018-08-27 11:10:37','2018-08-27 11:10:37',8),(55,7,'::1',8,1,'2018-08-27 11:10:38','2018-08-27 11:10:38',8),(56,7,'::1',8,1,'2018-08-27 11:11:09','2018-08-27 11:11:09',8),(57,7,'::1',8,1,'2018-08-27 11:11:10','2018-08-27 11:11:10',8),(58,8,'::1',8,1,'2018-08-27 11:11:17','2018-08-27 11:11:17',8),(59,8,'::1',8,1,'2018-08-27 11:11:18','2018-08-27 11:11:18',8),(60,7,'::1',8,1,'2018-08-27 11:13:18','2018-08-27 11:13:18',8),(61,7,'::1',8,1,'2018-08-27 11:13:19','2018-08-27 11:13:19',8),(62,7,'::1',8,1,'2018-08-27 11:15:36','2018-08-27 11:15:36',8),(63,7,'::1',8,1,'2018-08-27 11:15:37','2018-08-27 11:15:37',8),(64,7,'::1',8,1,'2018-08-27 11:16:51','2018-08-27 11:16:51',8),(65,7,'::1',8,1,'2018-08-27 11:16:51','2018-08-27 11:16:51',8),(66,7,'::1',8,1,'2018-08-27 11:16:57','2018-08-27 11:16:57',8),(67,7,'::1',8,1,'2018-08-27 11:16:58','2018-08-27 11:16:58',8),(68,7,'::1',8,1,'2018-08-27 11:17:41','2018-08-27 11:17:41',8),(69,7,'::1',8,1,'2018-08-27 11:17:42','2018-08-27 11:17:42',8),(70,7,'::1',8,1,'2018-08-27 11:33:35','2018-08-27 11:33:35',8),(71,7,'::1',8,1,'2018-08-27 11:33:35','2018-08-27 11:33:35',8),(72,7,'::1',8,1,'2018-08-27 11:35:00','2018-08-27 11:35:00',8),(73,7,'::1',8,1,'2018-08-27 11:35:06','2018-08-27 11:35:06',8),(74,7,'::1',8,1,'2018-08-27 11:35:29','2018-08-27 11:35:29',8),(75,7,'::1',8,1,'2018-08-27 11:35:31','2018-08-27 11:35:31',8),(76,7,'::1',8,1,'2018-08-27 11:36:50','2018-08-27 11:36:50',8),(77,7,'::1',8,1,'2018-08-27 11:36:52','2018-08-27 11:36:52',8),(78,7,'::1',8,1,'2018-08-27 11:36:53','2018-08-27 11:36:53',8),(79,7,'::1',8,1,'2018-08-27 11:36:54','2018-08-27 11:36:54',8),(80,7,'::1',8,1,'2018-08-27 11:37:13','2018-08-27 11:37:13',8),(81,7,'::1',8,1,'2018-08-27 11:37:14','2018-08-27 11:37:14',8),(82,7,'::1',8,1,'2018-08-27 11:37:46','2018-08-27 11:37:46',8),(83,7,'::1',8,1,'2018-08-27 11:37:47','2018-08-27 11:37:47',8),(84,7,'::1',8,1,'2018-08-27 11:37:59','2018-08-27 11:37:59',8),(85,7,'::1',8,1,'2018-08-27 11:38:00','2018-08-27 11:38:00',8),(86,7,'::1',8,1,'2018-08-27 11:38:25','2018-08-27 11:38:25',8),(87,7,'::1',8,1,'2018-08-27 11:38:26','2018-08-27 11:38:26',8),(88,7,'::1',8,1,'2018-08-27 11:38:43','2018-08-27 11:38:43',8),(89,7,'::1',8,1,'2018-08-27 11:38:44','2018-08-27 11:38:44',8),(90,7,'::1',8,1,'2018-08-27 11:39:01','2018-08-27 11:39:01',8),(91,7,'::1',8,1,'2018-08-27 11:39:02','2018-08-27 11:39:02',8),(92,7,'::1',8,1,'2018-08-27 11:39:11','2018-08-27 11:39:11',8),(93,7,'::1',8,1,'2018-08-27 11:39:12','2018-08-27 11:39:12',8),(94,7,'::1',8,1,'2018-08-27 11:39:22','2018-08-27 11:39:22',8),(95,7,'::1',8,1,'2018-08-27 11:39:23','2018-08-27 11:39:23',8),(96,7,'::1',8,1,'2018-08-27 11:39:50','2018-08-27 11:39:50',8),(97,7,'::1',8,1,'2018-08-27 11:39:52','2018-08-27 11:39:52',8),(98,7,'::1',8,1,'2018-08-27 11:40:19','2018-08-27 11:40:19',8),(99,7,'::1',8,1,'2018-08-27 11:40:20','2018-08-27 11:40:20',8),(100,7,'::1',8,1,'2018-08-27 11:41:22','2018-08-27 11:41:22',8),(101,7,'::1',8,1,'2018-08-27 11:41:23','2018-08-27 11:41:23',8),(102,7,'::1',8,1,'2018-08-27 11:41:57','2018-08-27 11:41:57',8),(103,7,'::1',8,1,'2018-08-27 11:41:58','2018-08-27 11:41:58',8),(104,7,'::1',8,1,'2018-08-27 11:43:03','2018-08-27 11:43:03',8),(105,7,'::1',8,1,'2018-08-27 11:43:04','2018-08-27 11:43:04',8),(106,7,'::1',8,1,'2018-08-27 11:43:21','2018-08-27 11:43:21',8),(107,7,'::1',8,1,'2018-08-27 11:43:22','2018-08-27 11:43:22',8),(108,7,'::1',8,1,'2018-08-27 11:43:38','2018-08-27 11:43:38',8),(109,7,'::1',8,1,'2018-08-27 11:43:39','2018-08-27 11:43:39',8),(110,7,'::1',8,1,'2018-08-27 11:44:42','2018-08-27 11:44:42',8),(111,7,'::1',8,1,'2018-08-27 11:44:43','2018-08-27 11:44:43',8),(112,7,'::1',8,1,'2018-08-27 11:44:58','2018-08-27 11:44:58',8),(113,7,'::1',8,1,'2018-08-27 11:44:58','2018-08-27 11:44:58',8),(114,7,'::1',8,1,'2018-08-27 11:45:39','2018-08-27 11:45:39',8),(115,7,'::1',8,1,'2018-08-27 11:45:40','2018-08-27 11:45:40',8),(116,7,'::1',0,1,'2018-08-27 11:46:23','2018-08-27 11:46:23',0),(117,7,'::1',0,1,'2018-08-27 11:46:24','2018-08-27 11:46:24',0),(118,7,'::1',0,1,'2018-08-27 11:47:02','2018-08-27 11:47:02',0),(119,7,'::1',0,1,'2018-08-27 11:47:03','2018-08-27 11:47:03',0),(120,7,'::1',8,1,'2018-08-27 11:47:11','2018-08-27 11:47:11',8),(121,7,'::1',8,1,'2018-08-27 11:47:12','2018-08-27 11:47:12',8),(122,7,'::1',8,1,'2018-08-27 11:58:04','2018-08-27 11:58:04',8),(123,7,'::1',8,1,'2018-08-27 11:58:05','2018-08-27 11:58:05',8),(124,7,'::1',8,1,'2018-08-27 12:03:33','2018-08-27 12:03:33',8),(125,7,'::1',8,1,'2018-08-27 12:03:34','2018-08-27 12:03:34',8),(126,7,'::1',8,1,'2018-08-27 12:05:44','2018-08-27 12:05:44',8),(127,7,'::1',8,1,'2018-08-27 12:05:45','2018-08-27 12:05:45',8),(128,7,'::1',8,1,'2018-08-27 12:07:15','2018-08-27 12:07:15',8),(129,7,'::1',8,1,'2018-08-27 12:07:16','2018-08-27 12:07:16',8),(130,7,'::1',8,1,'2018-08-27 12:07:39','2018-08-27 12:07:39',8),(131,7,'::1',8,1,'2018-08-27 12:07:40','2018-08-27 12:07:40',8),(132,7,'::1',8,1,'2018-08-27 12:08:19','2018-08-27 12:08:19',8),(133,7,'::1',8,1,'2018-08-27 12:08:20','2018-08-27 12:08:20',8),(134,7,'::1',8,1,'2018-08-27 12:11:03','2018-08-27 12:11:03',8),(135,7,'::1',8,1,'2018-08-27 12:11:04','2018-08-27 12:11:04',8),(136,7,'::1',8,1,'2018-08-27 12:15:31','2018-08-27 12:15:31',8),(137,7,'::1',8,1,'2018-08-27 12:15:32','2018-08-27 12:15:32',8),(138,7,'::1',8,1,'2018-08-27 12:17:14','2018-08-27 12:17:14',8),(139,7,'::1',8,1,'2018-08-27 12:17:14','2018-08-27 12:17:14',8),(140,7,'::1',8,1,'2018-08-27 12:17:59','2018-08-27 12:17:59',8),(141,7,'::1',8,1,'2018-08-27 12:18:00','2018-08-27 12:18:00',8),(142,7,'::1',8,1,'2018-08-27 12:18:22','2018-08-27 12:18:22',8),(143,7,'::1',8,1,'2018-08-27 12:18:28','2018-08-27 12:18:28',8),(144,7,'::1',8,1,'2018-08-27 12:18:29','2018-08-27 12:18:29',8),(145,7,'::1',8,1,'2018-08-27 12:19:08','2018-08-27 12:19:08',8),(146,7,'::1',8,1,'2018-08-27 12:19:09','2018-08-27 12:19:09',8),(147,7,'::1',8,1,'2018-08-27 12:22:37','2018-08-27 12:22:37',8),(148,7,'::1',8,1,'2018-08-27 12:22:39','2018-08-27 12:22:39',8),(149,7,'::1',8,1,'2018-08-27 12:23:04','2018-08-27 12:23:04',8),(150,7,'::1',8,1,'2018-08-27 12:23:05','2018-08-27 12:23:05',8),(151,7,'::1',8,1,'2018-08-27 12:24:30','2018-08-27 12:24:30',8),(152,7,'::1',8,1,'2018-08-27 12:24:31','2018-08-27 12:24:31',8),(153,7,'::1',8,1,'2018-08-27 12:25:13','2018-08-27 12:25:13',8),(154,7,'::1',8,1,'2018-08-27 12:25:14','2018-08-27 12:25:14',8),(155,7,'::1',8,1,'2018-08-27 12:26:19','2018-08-27 12:26:19',8),(156,7,'::1',8,1,'2018-08-27 12:26:20','2018-08-27 12:26:20',8),(157,7,'::1',8,1,'2018-08-27 12:26:34','2018-08-27 12:26:34',8),(158,7,'::1',8,1,'2018-08-27 12:26:36','2018-08-27 12:26:36',8),(159,7,'::1',8,1,'2018-08-27 12:26:55','2018-08-27 12:26:55',8),(160,7,'::1',8,1,'2018-08-27 12:26:56','2018-08-27 12:26:56',8),(161,7,'::1',8,1,'2018-08-27 12:27:12','2018-08-27 12:27:12',8),(162,7,'::1',8,1,'2018-08-27 12:27:13','2018-08-27 12:27:13',8),(163,7,'::1',8,1,'2018-08-27 12:29:20','2018-08-27 12:29:20',8),(164,7,'::1',8,1,'2018-08-27 12:29:21','2018-08-27 12:29:21',8),(165,7,'::1',8,1,'2018-08-27 12:30:14','2018-08-27 12:30:14',8),(166,7,'::1',8,1,'2018-08-27 12:30:15','2018-08-27 12:30:15',8),(167,7,'::1',8,1,'2018-08-27 12:30:51','2018-08-27 12:30:51',8),(168,7,'::1',8,1,'2018-08-27 12:30:51','2018-08-27 12:30:51',8),(169,7,'::1',0,1,'2018-08-27 12:31:06','2018-08-27 12:31:06',0),(170,7,'::1',0,1,'2018-08-27 12:31:08','2018-08-27 12:31:08',0),(171,7,'::1',8,1,'2018-08-27 12:33:00','2018-08-27 12:33:00',8),(172,7,'::1',8,1,'2018-08-27 12:33:01','2018-08-27 12:33:01',8),(173,7,'::1',8,1,'2018-08-27 12:37:29','2018-08-27 12:37:29',8),(174,7,'::1',8,1,'2018-08-27 12:37:30','2018-08-27 12:37:30',8),(175,8,'::1',8,1,'2018-08-27 12:39:39','2018-08-27 12:39:39',8),(176,8,'::1',8,1,'2018-08-27 12:39:40','2018-08-27 12:39:40',8),(177,8,'::1',8,1,'2018-08-27 12:40:42','2018-08-27 12:40:42',8),(178,8,'::1',8,1,'2018-08-27 12:40:43','2018-08-27 12:40:43',8),(179,10,'::1',8,1,'2018-08-27 12:41:12','2018-08-27 12:41:12',8),(180,10,'::1',8,1,'2018-08-27 12:41:13','2018-08-27 12:41:13',8),(181,7,'::1',8,1,'2018-08-27 12:47:11','2018-08-27 12:47:11',8),(182,7,'::1',8,1,'2018-08-27 12:47:12','2018-08-27 12:47:12',8),(183,7,'::1',8,1,'2018-08-27 13:19:17','2018-08-27 13:19:17',8),(184,7,'::1',8,1,'2018-08-27 13:30:33','2018-08-27 13:30:33',8),(185,7,'::1',8,1,'2018-08-27 13:30:37','2018-08-27 13:30:37',8),(186,7,'::1',8,1,'2018-08-27 13:30:54','2018-08-27 13:30:54',8),(187,7,'::1',8,1,'2018-08-27 13:40:53','2018-08-27 13:40:53',8),(188,7,'::1',8,1,'2018-08-27 13:40:56','2018-08-27 13:40:56',8),(189,8,'::1',8,1,'2018-08-27 14:37:24','2018-08-27 14:37:24',8),(190,8,'::1',8,1,'2018-08-27 14:41:46','2018-08-27 14:41:46',8),(191,7,'::1',8,1,'2018-08-27 15:06:49','2018-08-27 15:06:49',8),(192,10,'::1',0,1,'2018-08-28 14:19:11','2018-08-28 14:19:11',0),(193,10,'::1',0,1,'2018-08-28 14:21:57','2018-08-28 14:21:57',0),(194,10,'::1',0,1,'2018-08-28 14:22:35','2018-08-28 14:22:35',0),(195,10,'::1',0,1,'2018-08-28 14:22:50','2018-08-28 14:22:50',0),(196,10,'::1',0,1,'2018-08-28 14:23:26','2018-08-28 14:23:26',0),(197,10,'::1',0,1,'2018-08-28 14:24:25','2018-08-28 14:24:25',0),(198,10,'::1',0,1,'2018-08-28 14:25:31','2018-08-28 14:25:31',0),(199,10,'::1',0,1,'2018-08-28 14:26:00','2018-08-28 14:26:00',0),(200,10,'::1',0,1,'2018-08-28 14:27:36','2018-08-28 14:27:36',0),(201,2,'::1',0,1,'2018-08-28 14:28:02','2018-08-28 14:28:02',0),(202,9,'::1',0,1,'2018-08-28 14:28:12','2018-08-28 14:28:12',0),(203,7,'::1',0,1,'2018-08-28 14:30:48','2018-08-28 14:30:48',0),(204,10,'::1',0,1,'2018-08-28 14:33:47','2018-08-28 14:33:47',0),(205,2,'::1',1,1,'2018-08-28 14:42:25','2018-08-28 14:42:25',1),(206,2,'::1',1,1,'2018-08-28 14:44:58','2018-08-28 14:44:58',1),(207,2,'::1',1,1,'2018-08-28 14:46:12','2018-08-28 14:46:12',1),(208,7,'::1',0,1,'2018-08-30 06:20:28','2018-08-30 06:20:28',0),(209,7,'::1',0,1,'2018-08-30 06:20:29','2018-08-30 06:20:29',0),(210,7,'::1',0,1,'2018-08-30 06:24:46','2018-08-30 06:24:46',0),(211,2,'::1',0,1,'2018-08-30 06:24:56','2018-08-30 06:24:56',0),(212,2,'::1',0,1,'2018-08-30 06:25:47','2018-08-30 06:25:47',0),(213,7,'::1',0,1,'2018-08-30 06:25:52','2018-08-30 06:25:52',0),(214,7,'::1',0,1,'2018-08-30 06:26:08','2018-08-30 06:26:08',0),(215,2,'::1',0,1,'2018-08-30 06:49:26','2018-08-30 06:49:26',0),(216,0,'::1',0,1,'2018-08-30 06:51:57','2018-08-30 06:51:57',0),(217,0,'::1',0,1,'2018-08-30 06:56:28','2018-08-30 06:56:28',0),(218,7,'::1',0,1,'2018-08-30 07:12:27','2018-08-30 07:12:27',0),(219,2,'::1',0,1,'2018-08-30 07:16:22','2018-08-30 07:16:22',0),(220,0,'::1',0,1,'2018-08-30 07:23:02','2018-08-30 07:23:02',0),(221,0,'::1',0,1,'2018-08-30 07:23:04','2018-08-30 07:23:04',0),(222,0,'::1',0,1,'2018-08-30 07:23:32','2018-08-30 07:23:32',0),(223,0,'::1',0,1,'2018-08-30 07:23:33','2018-08-30 07:23:33',0),(224,7,'::1',0,1,'2018-08-30 08:17:09','2018-08-30 08:17:09',0),(225,7,'::1',5,1,'2018-08-31 10:01:32','2018-08-31 10:01:32',5),(226,7,'::1',5,1,'2018-08-31 10:50:09','2018-08-31 10:50:09',5),(227,7,'::1',5,1,'2018-08-31 10:53:24','2018-08-31 10:53:24',5),(228,7,'::1',5,1,'2018-08-31 10:56:11','2018-08-31 10:56:11',5),(229,7,'::1',1,1,'2018-08-31 12:45:35','2018-08-31 12:45:35',1),(230,5,'::1',5,1,'2018-09-01 12:10:11','2018-09-01 12:10:11',5),(231,7,'::1',5,1,'2018-09-03 08:15:21','2018-09-03 08:15:21',5),(232,7,'::1',5,1,'2018-09-03 08:31:12','2018-09-03 08:31:12',5),(233,7,'::1',5,1,'2018-09-03 09:04:53','2018-09-03 09:04:53',5),(234,7,'::1',0,1,'2018-09-06 14:49:45','2018-09-06 14:49:45',0),(235,7,'::1',10,1,'2018-09-06 14:50:00','2018-09-06 14:50:00',10),(236,7,'::1',10,1,'2018-09-06 14:50:45','2018-09-06 14:50:45',10),(237,7,'::1',10,1,'2018-09-06 14:51:51','2018-09-06 14:51:51',10),(238,7,'::1',0,1,'2018-09-07 07:05:19','2018-09-07 07:05:19',0),(239,7,'::1',0,1,'2018-09-07 07:05:30','2018-09-07 07:05:30',0),(240,7,'::1',0,1,'2018-09-07 07:23:27','2018-09-07 07:23:27',0),(241,7,'::1',0,1,'2018-09-07 07:23:31','2018-09-07 07:23:31',0),(242,7,'::1',0,1,'2018-09-07 07:29:11','2018-09-07 07:29:11',0),(243,7,'::1',0,1,'2018-09-07 07:29:38','2018-09-07 07:29:38',0),(244,7,'::1',0,1,'2018-09-07 07:30:12','2018-09-07 07:30:12',0),(245,7,'::1',0,1,'2018-09-11 10:54:50','2018-09-11 10:54:50',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
