/*
MySQL Data Transfer
Source Host: localhost
Source Database: creditapp
Target Host: localhost
Target Database: creditapp
Date: 2009-11-29 16:28:58
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for upload_file
-- ----------------------------
CREATE TABLE `upload_file` (
  `file_id` smallint(12) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT '文件名',
  `file_url` varchar(100) CHARACTER SET utf8 DEFAULT NULL COMMENT '文件所在URL',
  `file_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '上传时间',
  `file_status` varchar(10) COLLATE utf8_bin DEFAULT '1' COMMENT '1:可见  0:不可见',
  PRIMARY KEY (`file_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `upload_file` VALUES ('5', 'eachgroup2-3-1.html', 'admin/syst/uploads/eachgroup2-3-1.html', '2009-11-24 22:24:17', '1');
INSERT INTO `upload_file` VALUES ('4', 'index.css', 'admin/syst/uploads/index.css', '2009-11-24 22:13:32', '0');
INSERT INTO `upload_file` VALUES ('6', '___________________.txt', 'admin/syst/uploads/___________________.txt', '2009-11-27 22:31:35', '0');
