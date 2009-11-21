-- phpMyAdmin SQL Dump
-- version 2.11.2.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2009 年 11 月 21 日 13:22
-- 服务器版本: 5.0.45
-- PHP 版本: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- 数据库: `creditapp`
--

-- --------------------------------------------------------

--
-- 表的结构 `download`
--

CREATE TABLE `download` (
  `down_id` int(10) NOT NULL auto_increment,
  `down_title` varchar(50) default NULL,
  `down_body` varchar(100) default NULL,
  `down_time` varchar(15) default NULL,
  PRIMARY KEY  (`down_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `download`
--


-- --------------------------------------------------------

--
-- 表的结构 `item_apply`
--

CREATE TABLE `item_apply` (
  `app_id` int(10) NOT NULL auto_increment,
  `app_stud_no` varchar(14) character set utf8 default NULL COMMENT '申请学生学号',
  `app_item_code` varchar(8) character set utf8 default NULL COMMENT '申请项目编号',
  `app_time` timestamp NULL default CURRENT_TIMESTAMP COMMENT '申请时间',
  `app_state` varchar(8) character set utf8 default NULL COMMENT '请申状态',
  `app_coltime` timestamp NULL default NULL COMMENT '院级修改时间',
  `app_unitime` timestamp NULL default NULL COMMENT '校级修改时间',
  `app_item_type` varchar(2) character set utf8 default NULL COMMENT '申请项目类别',
  `stud_orgcode` int(8) NOT NULL,
  PRIMARY KEY  (`app_id`),
  UNIQUE KEY `app_item_code` (`app_item_code`),
  KEY `app_item_code_2` (`app_item_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- 导出表中的数据 `item_apply`
--

INSERT INTO `item_apply` (`app_id`, `app_stud_no`, `app_item_code`, `app_time`, `app_state`, `app_coltime`, `app_unitime`, `app_item_type`, `stud_orgcode`) VALUES
(2, '200741903108', '60015Q3', NULL, '2', NULL, NULL, '求真', 1),
(3, '200741903108', '60015Q0', '0000-00-00 00:00:00', '0', NULL, NULL, '求真', 1),
(4, '200741903108', '60015Q1', NULL, '1', NULL, NULL, '求真', 1);

-- --------------------------------------------------------

--
-- 表的结构 `item_set`
--

CREATE TABLE `item_set` (
  `item_id` int(10) NOT NULL auto_increment,
  `item_type` varchar(2) character set utf8 default NULL COMMENT '项目类别',
  `item_code` varchar(8) character set utf8 default NULL COMMENT '项目编号',
  `item_name` varchar(50) character set utf8 default NULL COMMENT '项目名称',
  `item_rank` varchar(4) character set utf8 default NULL COMMENT '项目级别',
  `item_score` int(2) default NULL COMMENT '项目学分',
  PRIMARY KEY  (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- 导出表中的数据 `item_set`
--

INSERT INTO `item_set` (`item_id`, `item_type`, `item_code`, `item_name`, `item_rank`, `item_score`) VALUES
(1, '求真', '60015Q1', '程序设计大赛', '国家奖', 5),
(2, '求真', '60015Q2', '程序设计大赛', '省级奖', 3),
(3, '求真', '60015Q3', '程序设计大赛', '市级奖', 2);

-- --------------------------------------------------------

--
-- 表的结构 `mark_allscore`
--

CREATE TABLE `mark_allscore` (
  `mark_id` int(10) NOT NULL,
  `mark_lesson_no` int(10) default NULL COMMENT '课程号',
  `mark_lesson_name` varchar(20) character set utf8 default NULL COMMENT '程课名称',
  `mark_lesson_score` int(2) default NULL COMMENT '课程学分',
  `mark_lesson_type` varchar(4) character set utf8 default NULL COMMENT '课程类型',
  `mark_lesson_mark` varchar(4) character set utf8 default NULL COMMENT '课程评分',
  PRIMARY KEY  (`mark_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 导出表中的数据 `mark_allscore`
--


-- --------------------------------------------------------

--
-- 表的结构 `news`
--

CREATE TABLE `news` (
  `news_id` int(10) NOT NULL,
  `news_title` varchar(50) character set utf8 default NULL,
  `news_body` varchar(1000) character set utf8 default NULL,
  `news_author` varchar(10) character set utf8 default NULL,
  `news_time` varchar(15) character set utf8 default NULL,
  `news_state` int(2) default NULL,
  `news_user` varchar(15) character set utf8 default NULL,
  PRIMARY KEY  (`news_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 导出表中的数据 `news`
--


-- --------------------------------------------------------

--
-- 表的结构 `notic`
--

CREATE TABLE `notic` (
  `notic_id` int(10) NOT NULL,
  `notic_title` varchar(50) default NULL,
  `notic_body` varchar(500) default NULL,
  `notic_time` varchar(15) default NULL,
  `notic_user` varchar(15) default NULL,
  PRIMARY KEY  (`notic_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 导出表中的数据 `notic`
--


-- --------------------------------------------------------

--
-- 表的结构 `org_belong`
--

CREATE TABLE `org_belong` (
  `org_no` int(8) NOT NULL,
  `org_name` varchar(25) character set utf8 default NULL COMMENT '组织结构名称',
  `org_up` varchar(25) character set utf8 default NULL COMMENT '上级机构',
  `org_down` varchar(25) character set utf8 default NULL COMMENT '下级机构',
  PRIMARY KEY  (`org_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 导出表中的数据 `org_belong`
--


-- --------------------------------------------------------

--
-- 表的结构 `stud_baseinfo`
--

CREATE TABLE `stud_baseinfo` (
  `stud_id` int(10) NOT NULL auto_increment COMMENT '流水号',
  `stud_no` varchar(14) character set utf8 NOT NULL COMMENT '学号',
  `stud_name` varchar(8) character set utf8 default NULL COMMENT '姓名',
  `stud_sex` varchar(2) character set utf8 default NULL,
  `stud_college` varchar(20) character set utf8 default NULL COMMENT '学院',
  `stud_grade` int(5) default NULL COMMENT '年级',
  `stud_class` varchar(15) character set utf8 default NULL,
  `stud_deadline` varchar(15) character set utf8 default NULL COMMENT '申报截止日期',
  `stud_password` varchar(25) character set utf8 default NULL COMMENT '密码',
  `stud_orgcode` int(8) default NULL COMMENT '组织机构码',
  PRIMARY KEY  (`stud_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- 导出表中的数据 `stud_baseinfo`
--

INSERT INTO `stud_baseinfo` (`stud_id`, `stud_no`, `stud_name`, `stud_sex`, `stud_college`, `stud_grade`, `stud_class`, `stud_deadline`, `stud_password`, `stud_orgcode`) VALUES
(2, '200741903108', '罗崇', '男', '东方科技学院', 2007, '计算机一班', '2011', '200741903108', 1);

-- --------------------------------------------------------

--
-- 表的结构 `user_admin`
--

CREATE TABLE `user_admin` (
  `user_id` int(10) NOT NULL auto_increment,
  `user_name` varchar(8) character set utf8 default NULL COMMENT '用户名',
  `user_password` varchar(30) character set utf8 default NULL COMMENT '用户密码',
  `user_org_code` int(8) default NULL COMMENT '组织机构代码',
  `user_mode` int(10) default NULL COMMENT '模块权限',
  PRIMARY KEY  (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- 导出表中的数据 `user_admin`
--

INSERT INTO `user_admin` (`user_id`, `user_name`, `user_password`, `user_org_code`, `user_mode`) VALUES
(1, 'lc', '1', NULL, 111);
