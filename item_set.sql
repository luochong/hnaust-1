/*
MySQL Data Transfer
Source Host: localhost
Source Database: creditapp
Target Host: localhost
Target Database: creditapp
Date: 2009-11-23 22:20:57
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for item_set
-- ----------------------------
CREATE TABLE `item_set` (
  `item_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '状态(1:为激活)',
  `item_type` varchar(2) CHARACTER SET utf8 DEFAULT NULL COMMENT '项目类别',
  `item_code` varchar(8) CHARACTER SET utf8 DEFAULT NULL COMMENT '项目编号',
  `item_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT '项目名称',
  `item_rank` varchar(4) CHARACTER SET utf8 DEFAULT NULL COMMENT '项目级别',
  `item_score` int(2) DEFAULT NULL COMMENT '项目学分',
  `item_status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `item_set` VALUES ('1', '求真', '60015Q1', '程序设计大赛', '国家奖', '5', null);
INSERT INTO `item_set` VALUES ('2', '求真', '60015Q2', '程序设计大赛', '省级奖', '3', null);
INSERT INTO `item_set` VALUES ('3', '求真', '60015Q3', '程序设计大赛', '市级奖', '2', null);
