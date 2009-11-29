-- phpMyAdmin SQL Dump
-- version 2.11.2.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2009 年 11 月 29 日 08:56
-- 服务器版本: 5.0.45
-- PHP 版本: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- 数据库: `creditapp`
--

-- --------------------------------------------------------

--
-- 表的结构 `group_dept`
--

CREATE TABLE `group_dept` (
  `id` int(12) NOT NULL auto_increment,
  `dept_father_id` varchar(12) collate utf8_unicode_ci default NULL,
  `dept_father_name` varchar(100) collate utf8_unicode_ci default NULL,
  `dept_name` varchar(100) character set utf8 default NULL,
  `dept_tree_id` varchar(50) collate utf8_unicode_ci default NULL,
  `dept_tree_name` varchar(200) collate utf8_unicode_ci default NULL,
  `dept_sub` varchar(50) collate utf8_unicode_ci default NULL,
  `dept_sub_tree` text collate utf8_unicode_ci,
  `dept_unit` int(12) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=346 ;

--
-- 导出表中的数据 `group_dept`
--

INSERT INTO `group_dept` (`id`, `dept_father_id`, `dept_father_name`, `dept_name`, `dept_tree_id`, `dept_tree_name`, `dept_sub`, `dept_sub_tree`, `dept_unit`) VALUES
(207, '0', '', '信科院', '', '信科院', '210464684c3e00bf64', '*:210464684c3e00bf64', 1),
(205, '0', '', '农学院', '', '农学院', '140724684c3e00b71f', '*:140724684c3e00b71f', 1),
(206, '0', '', '商学院', '', '商学院', '101934684c3e00bb70', '*:101934684c3e00bb70', 1),
(233, '0', '', '外语院', '', '外语院', '151104688b9d51ab43', '*:151104688b9d51ab43', 1),
(236, '0', '', '师范院', '', '师范院', '850746b1877207a16', '*:850746b1877207a16', 1),
(237, '0', '', '人文院', '', '人文院', '2013646e1416e2dc6d', '*:2013646e1416e2dc6d', 1),
(238, '0', '', '理学院', '', '理学院', '2400146e1416e2e5bc', '*:2400146e1416e2e5bc', 1),
(239, '0', '', '工学院', '', '工学院', '2698246e1416e2e770', '*:2698246e1416e2e770', 1),
(240, '0', '', '资环院', '', '资环院', '938346e1416e2e917', '*:938346e1416e2e917', 1),
(241, '0', '', '动科院', '', '动科院', '1160446e1416e2eab8', '*:1160446e1416e2eab8', 1),
(242, '0', '', '食科院', '', '食科院', '537346e1419935680', '*:537346e1419935680', 1),
(243, '0', '', '经济院', '', '经济院', '1381046e1419935aad', '*:1381046e1419935aad', 1),
(345, '0', '', '校团委', '', '校团委', '291554b10dbe4460fb', '*:291554b10dbe4460fb', 1),
(344, '0', ' ', '国际东', ' ', '国际东', '155304b10d3ea19d3c', '*:155304b10d3ea19d3c', 1),
(245, '0', '', '园艺院', '', '园艺院', '1913646e1419935dfa', '*:1913646e1419935dfa', 1),
(246, '0', '', '生安院', '', '生安院', '101746e1419935f9f', '*:101746e1419935f9f', 1),
(247, '0', '', '东方院', '', '东方院', '1619046e141bc66ff4', '*:1619046e141bc66ff4', 1),
(248, '0', '', '国际院', '', '国际院', '41546e141bc67626', '*:41546e141bc67626', 1),
(249, '0', '', '生科院', '', '生科院', '2122846e141bc677e3', '*:2122846e141bc677e3', 1),
(250, '0', '', '体艺院', '', '体艺院', '2629346e141bc67990', '*:2629346e141bc67990', 1),
(251, '0', '', '动医院', '', '动医院', '442646e141bc67b3c', '*:442646e141bc67b3c', 1);
