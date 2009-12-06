/*
MySQL Data Transfer
Source Host: localhost
Source Database: creditapp
Target Host: localhost
Target Database: creditapp
Date: 2009-12-6 12:09:00
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for mark_allscore
-- ----------------------------
CREATE TABLE `mark_allscore` (
  `mark_id` int(10) NOT NULL auto_increment,
  `mark_lesson_no` varchar(10) default NULL COMMENT '课程号',
  `mark_lesson_name` varchar(20) character set utf8 default NULL COMMENT '程课名称',
  `mark_lesson_score` float default NULL COMMENT '课程学分',
  `mark_lesson_type` varchar(4) character set utf8 default NULL COMMENT '课程类型',
  `mark_lesson_mark` varchar(4) character set utf8 default NULL COMMENT '课程评分',
  PRIMARY KEY  (`mark_id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `mark_allscore` VALUES ('1', 'QZ001Q1', '求真学术科技活动1', '1', '求真', '及格');
INSERT INTO `mark_allscore` VALUES ('2', 'QZ001Q2', '求真学术科技活动2', '2', '求真', '中等');
INSERT INTO `mark_allscore` VALUES ('3', 'QZ001Q3', '求真学术科技活动3', '3', '求真', '良好');
INSERT INTO `mark_allscore` VALUES ('4', 'QZ001Q4', '求真学术科技活动4', '4', '求真', '优秀');
INSERT INTO `mark_allscore` VALUES ('5', 'QZ001Q5', '求真学术科技活动5', '5', '求真', '优秀');
INSERT INTO `mark_allscore` VALUES ('6', 'QS001Q1', '求善文明道德活动1', '0.5', '求善', '及格');
INSERT INTO `mark_allscore` VALUES ('7', 'QS001Q2', '求善文明道德活动2', '1', '求善', '中等');
INSERT INTO `mark_allscore` VALUES ('8', 'QS001Q3', '求善文明道德活动3', '1.5', '求善', '中等');
INSERT INTO `mark_allscore` VALUES ('9', 'QS001Q4', '求善文明道德活动4', '2', '求善', '良好');
INSERT INTO `mark_allscore` VALUES ('10', 'QS001Q5', '求善文明道德活动5', '2.5', '求善', '优秀');
INSERT INTO `mark_allscore` VALUES ('11', 'QS001Q6', '求善文明道德活动6', '3', '求善', '优秀');
INSERT INTO `mark_allscore` VALUES ('12', 'QM001Q1', '求美文化艺术活动1', '1', '求美', '及格');
INSERT INTO `mark_allscore` VALUES ('13', 'QM001Q2', '求美文化艺术活动2', '2', '求美', '中等');
INSERT INTO `mark_allscore` VALUES ('14', 'QM001Q3', '求美文化艺术活动3', '3', '求美', '良好');
INSERT INTO `mark_allscore` VALUES ('15', 'QM001Q4', '求美文化艺术活动4', '4', '求美', '优秀');
INSERT INTO `mark_allscore` VALUES ('16', 'QM001Q5', '求美文化艺术活动5', '5', '求美', '优秀');
INSERT INTO `mark_allscore` VALUES ('17', 'QS002Q1', '求实社会实践活动1', '0.5', '求实', '不合格');
INSERT INTO `mark_allscore` VALUES ('18', 'QS002Q2', '求实社会实践活动2', '1', '求实', '不合格');
INSERT INTO `mark_allscore` VALUES ('19', 'QS002Q3', '求实社会实践活动3', '1.5', '求实', '不合格');
INSERT INTO `mark_allscore` VALUES ('20', 'QS002Q4', '求实社会实践活动4', '2', '求实', '及格');
INSERT INTO `mark_allscore` VALUES ('21', 'QS002Q5', '求实社会实践活动5', '2.5', '求实', '良好');
INSERT INTO `mark_allscore` VALUES ('22', 'QS002Q6', '求实社会实践活动6', '3', '求实', '优秀');
INSERT INTO `mark_allscore` VALUES ('23', 'QT001Q1', '求特个性发展活动1', '0.5', '求特', '及格');
INSERT INTO `mark_allscore` VALUES ('24', 'QT001Q2', '求特个性发展活动2', '1', '求特', '中等');
INSERT INTO `mark_allscore` VALUES ('25', 'QT001Q3', '求特个性发展活动3', '1.5', '求特', '中等');
INSERT INTO `mark_allscore` VALUES ('26', 'QT001Q4', '求特个性发展活动4', '2', '求特', '良好');
INSERT INTO `mark_allscore` VALUES ('27', 'QT001Q5', '求特个性发展活动5', '2.5', '求特', '优秀');
INSERT INTO `mark_allscore` VALUES ('28', 'QT001Q6', '求特个性发展活动6', '3', '求特', '优秀');
INSERT INTO `mark_allscore` VALUES ('29', 'QQ001Q1', '求强就业创业活动1', '0.5', '求强', '及格');
INSERT INTO `mark_allscore` VALUES ('30', 'QQ001Q2', '求强就业创业活动2', '1', '求强', '中等');
INSERT INTO `mark_allscore` VALUES ('31', 'QQ001Q3', '求强就业创业活动3', '1.5', '求强', '中等');
INSERT INTO `mark_allscore` VALUES ('32', 'QQ001Q4', '求强就业创业活动4', '2', '求强', '中等');
INSERT INTO `mark_allscore` VALUES ('33', 'QQ001Q5', '求强就业创业活动5', '2.5', '求强', '良好');
INSERT INTO `mark_allscore` VALUES ('34', 'QQ001Q6', '求强就业创业活动6', '3', '求强', '良好');
INSERT INTO `mark_allscore` VALUES ('35', 'QQ001Q7', '求强就业创业活动7', '3.5', '求强', '优秀');
INSERT INTO `mark_allscore` VALUES ('36', 'QQ001Q8', '求强就业创业活动8', '4', '求强', '优秀');
INSERT INTO `mark_allscore` VALUES ('37', 'QQ001Q9', '求强就业创业活动9', '4.5', '求强', '优秀');
INSERT INTO `mark_allscore` VALUES ('38', 'QQ001Q0', '求强就业创业活动10', '5', '求强', '优秀');
