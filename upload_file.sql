/*
MySQL Data Transfer
Source Host: localhost
Source Database: creditapp
Target Host: localhost
Target Database: creditapp
Date: 2009-11-24 21:49:49
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for upload_file
-- ----------------------------
CREATE TABLE `upload_file` (
  `file_id` smallint(12) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(50) COLLATE utf8_bin DEFAULT NULL COMMENT '文件名',
  `file_url` varchar(100) COLLATE utf8_bin DEFAULT NULL COMMENT '文件所在URL',
  `file_time` datetime DEFAULT NULL COMMENT '上传时间',
  PRIMARY KEY (`file_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records 
-- ----------------------------
