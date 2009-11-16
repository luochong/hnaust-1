/*
MySQL Data Transfer
Source Host: localhost
Source Database: creditapp
Target Host: localhost
Target Database: creditapp
Date: 2009-11-16 21:45:25
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for download
-- ----------------------------
CREATE TABLE `download` (
  `down_id` int(10) NOT NULL,
  `down_title` varchar(50) default NULL,
  `down_body` varchar(100) default NULL,
  `down_time` varchar(15) default NULL,
  PRIMARY KEY  (`down_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for item_apply
-- ----------------------------
CREATE TABLE `item_apply` (
  `app_id` int(10) NOT NULL,
  `app_stud_no` int(8) default NULL COMMENT '申请学生学号',
  `app_item_code` int(8) default NULL COMMENT '申请项目编号',
  `app_time` varchar(15) character set utf8 default NULL COMMENT '申请时间',
  `app_state` varchar(8) character set utf8 default NULL COMMENT '请申状态',
  `app_coltime` varchar(15) character set utf8 default NULL COMMENT '院级修改时间',
  `app_unitime` varchar(15) character set utf8 default NULL COMMENT '校级修改时间',
  `app_item_type` varchar(2) character set utf8 default NULL COMMENT '申请项目类别',
  PRIMARY KEY  (`app_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for item_set
-- ----------------------------
CREATE TABLE `item_set` (
  `item_id` int(10) NOT NULL,
  `item_type` varchar(2) character set utf8 default NULL COMMENT '项目类别',
  `item_code` int(8) default NULL COMMENT '项目编号',
  `item_name` varchar(50) character set utf8 default NULL COMMENT '项目名称',
  `item_rank` varchar(4) character set utf8 default NULL COMMENT '项目级别',
  `item_score` int(2) default NULL COMMENT '项目学分',
  PRIMARY KEY  (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for mark_allscore
-- ----------------------------
CREATE TABLE `mark_allscore` (
  `mark_id` int(10) NOT NULL,
  `mark_lesson_no` int(10) default NULL COMMENT '课程号',
  `mark_lesson_name` varchar(20) character set utf8 default NULL COMMENT '程课名称',
  `mark_lesson_score` int(2) default NULL COMMENT '课程学分',
  `mark_lesson_type` varchar(4) character set utf8 default NULL COMMENT '课程类型',
  `mark_lesson_mark` varchar(4) character set utf8 default NULL COMMENT '课程评分',
  PRIMARY KEY  (`mark_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for news
-- ----------------------------
CREATE TABLE `news` (
  `news_id` int(10) NOT NULL,
  `news_title` varchar(50) default NULL,
  `news_body` varchar(1000) default NULL,
  `news_author` varchar(10) default NULL,
  `news_time` varchar(15) default NULL,
  `news_state` int(2) default NULL,
  `news_user` varchar(15) default NULL,
  PRIMARY KEY  (`news_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for notic
-- ----------------------------
CREATE TABLE `notic` (
  `notic_id` int(10) NOT NULL,
  `notic_title` varchar(50) default NULL,
  `notic_body` varchar(500) default NULL,
  `notic_time` varchar(15) default NULL,
  `notic_user` varchar(15) default NULL,
  PRIMARY KEY  (`notic_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for org_belong
-- ----------------------------
CREATE TABLE `org_belong` (
  `org_no` int(8) NOT NULL,
  `org_name` varchar(25) character set utf8 default NULL COMMENT '组织结构名称',
  `org_up` varchar(25) character set utf8 default NULL COMMENT '上级机构',
  `org_down` varchar(25) character set utf8 default NULL COMMENT '下级机构',
  PRIMARY KEY  (`org_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for stud_baseinfo
-- ----------------------------
CREATE TABLE `stud_baseinfo` (
  `stud_id` int(10) NOT NULL auto_increment COMMENT '流水号',
  `stud_no` int(10) NOT NULL COMMENT '学号',
  `stud_name` varchar(8) character set utf8 default NULL COMMENT '姓名',
  `stud_sex` varchar(2) character set utf8 default NULL,
  `stud_college` varchar(20) character set utf8 default NULL COMMENT '学院',
  `stud_grade` int(5) default NULL COMMENT '年级',
  `stud_class` varchar(15) default NULL,
  `stud_deadline` varchar(15) character set utf8 default NULL COMMENT '申报截止日期',
  `stud_password` varchar(25) character set utf8 default NULL COMMENT '密码',
  `stud_orgcode` int(8) default NULL COMMENT '组织机构码',
  PRIMARY KEY  (`stud_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for user_admin
-- ----------------------------
CREATE TABLE `user_admin` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(8) character set utf8 default NULL COMMENT '用户名',
  `user_password` varchar(30) character set utf8 default NULL COMMENT '用户密码',
  `user_org_code` int(8) default NULL COMMENT '组织机构代码',
  `user_mode` int(10) default NULL COMMENT '模块权限',
  PRIMARY KEY  (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `stud_baseinfo` VALUES ('1', '2007', '张三', '男', '信息科学技术学院', '2007', '07?????', '2011年3月', '123456', '207');
