/*
MySQL Data Transfer
Source Host: localhost
Source Database: creditapp
Target Host: localhost
Target Database: creditapp
Date: 2009-11-21 21:25:18
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for download
-- ----------------------------
CREATE TABLE `download` (
  `down_id` int(10) NOT NULL AUTO_INCREMENT,
  `down_title` varchar(50) DEFAULT NULL,
  `down_body` varchar(100) DEFAULT NULL,
  `down_time` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`down_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for group_dept
-- ----------------------------
CREATE TABLE `group_dept` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `dept_father_id` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dept_father_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dept_name` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `dept_tree_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dept_tree_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dept_sub` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dept_sub_tree` text COLLATE utf8_unicode_ci,
  `dept_unit` int(12) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=339 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for item_apply
-- ----------------------------
CREATE TABLE `item_apply` (
  `app_id` int(10) NOT NULL AUTO_INCREMENT,
  `app_stud_no` varchar(14) CHARACTER SET utf8 DEFAULT NULL COMMENT '申请学生学号',
  `app_item_code` varchar(8) CHARACTER SET utf8 DEFAULT NULL COMMENT '申请项目编号',
  `app_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '申请时间',
  `app_state` varchar(8) CHARACTER SET utf8 DEFAULT NULL COMMENT '请申状态',
  `app_coltime` timestamp NULL DEFAULT NULL COMMENT '院级修改时间',
  `app_unitime` timestamp NULL DEFAULT NULL COMMENT '校级修改时间',
  `app_item_type` varchar(2) CHARACTER SET utf8 DEFAULT NULL COMMENT '申请项目类别',
  `stud_orgcode` int(8) NOT NULL,
  PRIMARY KEY (`app_id`),
  UNIQUE KEY `app_item_code` (`app_item_code`),
  KEY `app_item_code_2` (`app_item_code`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for item_set
-- ----------------------------
CREATE TABLE `item_set` (
  `item_id` int(10) NOT NULL AUTO_INCREMENT,
  `item_type` varchar(2) CHARACTER SET utf8 DEFAULT NULL COMMENT '项目类别',
  `item_code` varchar(8) CHARACTER SET utf8 DEFAULT NULL COMMENT '项目编号',
  `item_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT '项目名称',
  `item_rank` varchar(4) CHARACTER SET utf8 DEFAULT NULL COMMENT '项目级别',
  `item_score` int(2) DEFAULT NULL COMMENT '项目学分',
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for mark_allscore
-- ----------------------------
CREATE TABLE `mark_allscore` (
  `mark_id` int(10) NOT NULL,
  `mark_lesson_no` int(10) DEFAULT NULL COMMENT '课程号',
  `mark_lesson_name` varchar(20) CHARACTER SET utf8 DEFAULT NULL COMMENT '程课名称',
  `mark_lesson_score` int(2) DEFAULT NULL COMMENT '课程学分',
  `mark_lesson_type` varchar(4) CHARACTER SET utf8 DEFAULT NULL COMMENT '课程类型',
  `mark_lesson_mark` varchar(4) CHARACTER SET utf8 DEFAULT NULL COMMENT '课程评分',
  PRIMARY KEY (`mark_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for news
-- ----------------------------
CREATE TABLE `news` (
  `news_id` int(10) NOT NULL,
  `news_title` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `news_body` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `news_author` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `news_time` varchar(15) CHARACTER SET utf8 DEFAULT NULL,
  `news_state` int(2) DEFAULT NULL,
  `news_user` varchar(15) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for notic
-- ----------------------------
CREATE TABLE `notic` (
  `notic_id` int(10) NOT NULL,
  `notic_title` varchar(50) DEFAULT NULL,
  `notic_body` varchar(500) DEFAULT NULL,
  `notic_time` varchar(15) DEFAULT NULL,
  `notic_user` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`notic_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for stud_baseinfo
-- ----------------------------
CREATE TABLE `stud_baseinfo` (
  `stud_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '流水号',
  `stud_no` varchar(14) CHARACTER SET utf8 NOT NULL COMMENT '学号',
  `stud_name` varchar(8) CHARACTER SET utf8 DEFAULT NULL COMMENT '姓名',
  `stud_sex` varchar(2) CHARACTER SET utf8 DEFAULT NULL,
  `stud_college` varchar(20) CHARACTER SET utf8 DEFAULT NULL COMMENT '学院',
  `stud_grade` int(5) DEFAULT NULL COMMENT '年级',
  `stud_class` varchar(15) CHARACTER SET utf8 DEFAULT NULL,
  `stud_deadline` varchar(15) CHARACTER SET utf8 DEFAULT NULL COMMENT '申报截止日期',
  `stud_password` varchar(25) CHARACTER SET utf8 DEFAULT NULL COMMENT '密码',
  `stud_orgcode` int(8) DEFAULT NULL COMMENT '组织机构码',
  PRIMARY KEY (`stud_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for user_admin
-- ----------------------------
CREATE TABLE `user_admin` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(8) CHARACTER SET utf8 DEFAULT NULL COMMENT '用户名',
  `user_password` varchar(30) CHARACTER SET utf8 DEFAULT NULL COMMENT '用户密码',
  `user_org_code` int(8) DEFAULT NULL COMMENT '组织机构代码',
  `user_mode` int(10) DEFAULT NULL COMMENT '模块权限',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `group_dept` VALUES ('220', '205', '农学院', '棉花研究所', ':205', '农学院->棉花研究所', '1407846851bc27b314', '*:1407846851bc27b314', '1');
INSERT INTO `group_dept` VALUES ('221', '205', '农学院', '苎麻研究所', ':205', '农学院->苎麻研究所', '3235146851bc27c132', '*:3235146851bc27c132', '1');
INSERT INTO `group_dept` VALUES ('222', '205', '农学院', '薯类杂粮研究中心', ':205', '农学院->薯类杂粮研究中心', '2884446851bc27d00d', '*:2884446851bc27d00d', '1');
INSERT INTO `group_dept` VALUES ('223', '205', '农学院', '草业研究所', ':205', '农学院->草业研究所', '446946851bc27de0d', '*:446946851bc27de0d', '1');
INSERT INTO `group_dept` VALUES ('234', '205', '农学院', '校内外聘教师', ':205', '农学院->校内外聘教师', '326224689ccd172714', '*:326224689ccd172714', '1');
INSERT INTO `group_dept` VALUES ('225', '205', '农学院', '开发公司', ':205', '农学院->开发公司', '208334685d793af7a1', '*:208334685d793af7a1', '1');
INSERT INTO `group_dept` VALUES ('226', '206', '商学院', '会计系', ':206', '商学院->会计系', '2076046879875c28ce', '*:2076046879875c28ce', '1');
INSERT INTO `group_dept` VALUES ('218', '205', '农学院', '油料研究所', ':205', '农学院->油料研究所', '320046851b4d7d825', '*:320046851b4d7d825', '1');
INSERT INTO `group_dept` VALUES ('219', '205', '农学院', '水稻研究所', ':205', '农学院->水稻研究所', '69746851bc27a124', '*:69746851bc27a124', '1');
INSERT INTO `group_dept` VALUES ('217', '205', '农学院', '农学院实验教学中心', ':205', '农学院->作物科学实验中心（综合实验室）', '537946851b4d7ca78', '*:537946851b4d7ca78', '1');
INSERT INTO `group_dept` VALUES ('216', '205', '农学院', '烟草系', ':205', '农学院->烟草系', '1272246851b4d7bcea', '*:1272246851b4d7bcea', '1');
INSERT INTO `group_dept` VALUES ('215', '205', '农学院', '种子科学与工程系', ':205', '农学院->种子科学与工程系', '1017346851b4d7af36', '*:1017346851b4d7af36', '1');
INSERT INTO `group_dept` VALUES ('214', '205', '农学院', '植物科学与技术系', ':205', '农学院->植物科学与技术系', '2126846851b4d7a124', '*:2126846851b4d7a124', '1');
INSERT INTO `group_dept` VALUES ('207', '0', '', '信息院', '', '信息院', '210464684c3e00bf64', '*:210464684c3e00bf64:24964684cc9aca2e0:1833547fdc0cadd40b:842847fdc0cadda49:734947fdc0cadded0:391447fdc0cade36c:2695047fdc0eabaeba:2509047fdc966af79f:181147fdc966b056f:3208047fdc966b0ab4', '1');
INSERT INTO `group_dept` VALUES ('208', '207', '信息院', '电子商务系', ':207', '信息院->电子商务系', '24964684cc9aca2e0', '*:24964684cc9aca2e0', '1');
INSERT INTO `group_dept` VALUES ('209', '205', '农学院', '院办', ':205', '农学院->院办', '1626746851ab329f66', '*:1626746851ab329f66', '1');
INSERT INTO `group_dept` VALUES ('210', '205', '农学院', '成教办', ':205', '农学院->成教办', '624846851ab32ad41', '*:624846851ab32ad41', '1');
INSERT INTO `group_dept` VALUES ('211', '205', '农学院', '学工组', ':205', '农学院->学工组', '1753746851ab32ba6e', '*:1753746851ab32ba6e', '1');
INSERT INTO `group_dept` VALUES ('212', '205', '农学院', '农学系', ':205', '农学院->农学系', '1053446851ab32c7a5', '*:1053446851ab32c7a5', '1');
INSERT INTO `group_dept` VALUES ('213', '205', '农学院', '草业科学系', ':205', '农学院->草业科学系', '1879146851ab32d55e', '*:1879146851ab32d55e', '1');
INSERT INTO `group_dept` VALUES ('205', '0', '', '农学院', '', '农学院', '140724684c3e00b71f', '*:140724684c3e00b71f:1626746851ab329f66:624846851ab32ad41:1753746851ab32ba6e:1053446851ab32c7a5:1879146851ab32d55e:2126846851b4d7a124:1017346851b4d7af36:1272246851b4d7bcea:537946851b4d7ca78:320046851b4d7d825:69746851bc27a124:1407846851bc27b314:3235146851bc27c132:2884446851bc27d00d:446946851bc27de0d:111114685cd7a57bd3:208334685d793af7a1:326224689ccd172714:16206475d12ee14439', '1');
INSERT INTO `group_dept` VALUES ('206', '0', '', '商学院', '', '商学院', '101934684c3e00bb70', '*:101934684c3e00bb70:2076046879875c28ce:190546879875c366c:1877446879875c4389:763946879875c50c2:2630846879875c5e05:10669468798a840d9c:9442468798a841baa', '1');
INSERT INTO `group_dept` VALUES ('227', '206', '商学院', '工商管理系', ':206', '商学院->工商管理系', '190546879875c366c', '*:190546879875c366c', '1');
INSERT INTO `group_dept` VALUES ('228', '206', '商学院', '国际经济与贸易系', ':206', '商学院->国际经济与贸易系', '1877446879875c4389', '*:1877446879875c4389', '1');
INSERT INTO `group_dept` VALUES ('229', '206', '商学院', '营销管理系', ':206', '商学院->营销管理系', '763946879875c50c2', '*:763946879875c50c2', '1');
INSERT INTO `group_dept` VALUES ('230', '206', '商学院', '院办公室', ':206', '商学院->院办公室', '2630846879875c5e05', '*:2630846879875c5e05', '1');
INSERT INTO `group_dept` VALUES ('231', '206', '商学院', '院成教办公室', ':206', '商学院->院成教办公室', '10669468798a840d9c', '*:10669468798a840d9c', '1');
INSERT INTO `group_dept` VALUES ('232', '206', '商学院', '学工组', ':206', '商学院->学工组', '9442468798a841baa', '*:9442468798a841baa', '1');
INSERT INTO `group_dept` VALUES ('233', '0', '', '外语学院', '', '外语学院', '151104688b9d51ab43', '*:151104688b9d51ab43:1987947febe9c5f5e2:1878847fef084e1114:49047fef0ee57bd1:847848005c5d1e849:56694802bc1d44aa3', '1');
INSERT INTO `group_dept` VALUES ('235', '0', '', '改革发展处', '', '改革发展处', '268974694950f03d0d', '*:268974694950f03d0d', '1');
INSERT INTO `group_dept` VALUES ('236', '0', '', '科技师院', '', '科技师院', '850746b1877207a16', '*:850746b1877207a16:3086446fcae10501be:2599346fcae1051352:1063846fcae1051886:964746fcae1051dc3:351646fcae1052303:2080546fcae5f07a13:2063446fcae5f08275:2810746fcae5f08a0a:1885646fcae5f091a8:1555346fcae5f0997d:18946fcb1aca7d8e:581046fcb1aca8487:563546fcb1aca8a95:3110446fcb1f70f425:2757746fcb1f70fb98:2764646fcb1f7102c5', '1');
INSERT INTO `group_dept` VALUES ('237', '0', '', '人文院', '', '人文院', '2013646e1416e2dc6d', '*:2013646e1416e2dc6d', '1');
INSERT INTO `group_dept` VALUES ('238', '0', '', '理学院', '', '理学院', '2400146e1416e2e5bc', '*:2400146e1416e2e5bc:29253480c430510a1f:23962480c4305121dc:30411480c430512691', '1');
INSERT INTO `group_dept` VALUES ('239', '0', '', '工学院', '', '工学院', '2698246e1416e2e770', '*:2698246e1416e2e770:2747547fdbe94c28cc:1140847fdbe94c2fdf:244147fdbe94c345f:3214247fdbe94c38eb:2705547fdbe94c3d77:1678247fdbee244aa3:2398347fdbee245061:2604447fdbee245550:1875747fdbee245a5b:2677847fdbee245f63', '1');
INSERT INTO `group_dept` VALUES ('240', '0', '', '资环院', '', '资环院', '938346e1416e2e917', '*:938346e1416e2e917', '1');
INSERT INTO `group_dept` VALUES ('241', '0', '', '动科院', '', '动科院', '1160446e1416e2eab8', '*:1160446e1416e2eab8:2092647fdb93990f57:2511947fdb939915fa:2698847fdb9c0ec82f:3154147fdb9c0ecf3e:1940247fdb9c0ed59e:31547fdb9c0edc40:1237647fdba5c94c60:555347fdba5c9542c:2319047fdba5c95b08', '1');
INSERT INTO `group_dept` VALUES ('242', '0', '', '食科院', '', '食科院', '537346e1419935680', '*:537346e1419935680', '1');
INSERT INTO `group_dept` VALUES ('243', '0', '', '经济学院', '', '经济学院', '1381046e1419935aad', '*:1381046e1419935aad:27753480452848716d:222544804528487a78:142234804528487f13:2444804560a96590', '1');
INSERT INTO `group_dept` VALUES ('244', '0', '', '成教院', '', '成教院', '2566746e1419935c58', '*:2566746e1419935c58', '1');
INSERT INTO `group_dept` VALUES ('245', '0', '', '园艺院', '', '园艺院', '1913646e1419935dfa', '*:1913646e1419935dfa', '1');
INSERT INTO `group_dept` VALUES ('246', '0', '', '生安院', '', '生安院', '101746e1419935f9f', '*:101746e1419935f9f', '1');
INSERT INTO `group_dept` VALUES ('247', '0', '', '东科院', '', '东科院', '1619046e141bc66ff4', '*:1619046e141bc66ff4:6742849ddc6bf9c674:4155849ddc6ebec830:3844049ddc7083938a:9099149ddc7c2baebd:7444849ddc80166ff6:4739149ddc81f8d250:7244349ddc8316acff:2290849ddc840e8b27:1660549ddc8567a123:9312849ddc866c28ce', '1');
INSERT INTO `group_dept` VALUES ('248', '0', '', '国际学院', '', '国际学院', '41546e141bc67626', '*:41546e141bc67626:222934811476ce270d:2785948152f6a4daae:2049648152f6a4e568:999348152f6a4ea23:334248152f6a4eeca:81548152f6a4f37a:29517482165132a82e:15874482165132b331:13075482165132b82a:193744823bdd5d62c4:279834823bdd5d7028:196764823bdd5d755c:291574823bdd5d7a84:298824823bdd5d7f81:39474823bdeb17701:143364828ea658af26', '1');
INSERT INTO `group_dept` VALUES ('249', '0', '', '生科院', '', '生科院', '2122846e141bc677e3', '*:2122846e141bc677e3', '1');
INSERT INTO `group_dept` VALUES ('250', '0', '', '体艺院', '', '体艺院', '2629346e141bc67990', '*:2629346e141bc67990', '1');
INSERT INTO `group_dept` VALUES ('251', '0', '', '动医院', '', '动医院', '442646e141bc67b3c', '*:442646e141bc67b3c', '1');
INSERT INTO `group_dept` VALUES ('252', '236', '科技师院', '学院办公室', ':236', '科技师院->学院办公室', '3086446fcae10501be', '*:3086446fcae10501be:2080546fcae5f07a13:2063446fcae5f08275:2810746fcae5f08a0a:1885646fcae5f091a8:1555346fcae5f0997d', '1');
INSERT INTO `group_dept` VALUES ('253', '236', '科技师院', '教育学教研室', ':236', '科技师院->教育学教研室', '2599346fcae1051352', '*:2599346fcae1051352', '1');
INSERT INTO `group_dept` VALUES ('254', '236', '科技师院', '心理学教研室', ':236', '科技师院->心理学教研室', '1063846fcae1051886', '*:1063846fcae1051886', '1');
INSERT INTO `group_dept` VALUES ('255', '236', '科技师院', '教育技术学教研室', ':236', '科技师院->教育技术学教研室', '964746fcae1051dc3', '*:964746fcae1051dc3', '1');
INSERT INTO `group_dept` VALUES ('256', '236', '科技师院', '职业教育研究所', ':236', '科技师院->职业教育研究所', '351646fcae1052303', '*:351646fcae1052303', '1');
INSERT INTO `group_dept` VALUES ('265', '236', '科技师院', '职教培训中心', ':236', '科技师院->职教培训中心', '3110446fcb1f70f425', '*:3110446fcb1f70f425', '1');
INSERT INTO `group_dept` VALUES ('262', '236', '科技师院', '教务办公室', ':236', '科技师院->教务办公室', '18946fcb1aca7d8e', '*:18946fcb1aca7d8e', '1');
INSERT INTO `group_dept` VALUES ('263', '236', '科技师院', '教育学实验室', ':236', '科技师院->教育学实验室', '581046fcb1aca8487', '*:581046fcb1aca8487', '1');
INSERT INTO `group_dept` VALUES ('264', '236', '科技师院', '学生工作办公室', ':236', '科技师院->学生工作办公室', '563546fcb1aca8a95', '*:563546fcb1aca8a95', '1');
INSERT INTO `group_dept` VALUES ('266', '236', '科技师院', '华夏信息网络中心', ':236', '科技师院->华夏信息网络中心', '2757746fcb1f70fb98', '*:2757746fcb1f70fb98', '1');
INSERT INTO `group_dept` VALUES ('267', '236', '科技师院', '成教办公室', ':236', '科技师院->成教办公室', '2764646fcb1f7102c5', '*:2764646fcb1f7102c5', '1');
INSERT INTO `group_dept` VALUES ('268', '205', '农学院', '校外聘研究生导师', ':205', '农学院->校外聘研究生导师', '16206475d12ee14439', '*:16206475d12ee14439', '1');
INSERT INTO `group_dept` VALUES ('269', '0', '', '教务处', '', '教务处', '3040475e06238e559', '*:3040475e06238e559', '1');
INSERT INTO `group_dept` VALUES ('270', '0', '', '宿舍管理中心', '', '宿舍管理中心', '2455947634aa12429e', '*:2455947634aa12429e', '1');
INSERT INTO `group_dept` VALUES ('271', '0', '', '研究生处', '', '研究生处', '2329247634aa124b67', '*:2329247634aa124b67', '1');
INSERT INTO `group_dept` VALUES ('272', '241', '动科院', '动物科学系', ':241', '动科院->动物科学系', '2092647fdb93990f57', '*:2092647fdb93990f57:2698847fdb9c0ec82f:3154147fdb9c0ecf3e:1940247fdb9c0ed59e:31547fdb9c0edc40', '1');
INSERT INTO `group_dept` VALUES ('273', '241', '动科院', '水产系', ':241', '动科院->水产系', '2511947fdb939915fa', '*:2511947fdb939915fa:1237647fdba5c94c60:555347fdba5c9542c:2319047fdba5c95b08', '1');
INSERT INTO `group_dept` VALUES ('274', '272', '动物科学系', '动物营养教研室', ':241:272', '动科院->动物科学系->动物营养教研室', '2698847fdb9c0ec82f', '*:2698847fdb9c0ec82f', '1');
INSERT INTO `group_dept` VALUES ('275', '272', '动物科学系', '遗传育种教研室', ':241:272', '动科院->动物科学系->遗传育种教研室', '3154147fdb9c0ecf3e', '*:3154147fdb9c0ecf3e', '1');
INSERT INTO `group_dept` VALUES ('276', '272', '动物科学系', '畜牧教研室', ':241:272', '动科院->动物科学系->畜牧教研室', '1940247fdb9c0ed59e', '*:1940247fdb9c0ed59e', '1');
INSERT INTO `group_dept` VALUES ('277', '272', '动物科学系', '动物科学实验室', ':241:272', '动科院->动物科学系->动物科学实验室', '31547fdb9c0edc40', '*:31547fdb9c0edc40', '1');
INSERT INTO `group_dept` VALUES ('278', '273', '水产系', '水产养殖教研室', ':241:273', '动科院->水产系->水产养殖教研室', '1237647fdba5c94c60', '*:1237647fdba5c94c60', '1');
INSERT INTO `group_dept` VALUES ('279', '273', '水产系', '水族科学教研室', ':241:273', '动科院->水产系->水族科学教研室', '555347fdba5c9542c', '*:555347fdba5c9542c', '1');
INSERT INTO `group_dept` VALUES ('280', '273', '水产系', '水产实验室', ':241:273', '动科院->水产系->水产实验室', '2319047fdba5c95b08', '*:2319047fdba5c95b08', '1');
INSERT INTO `group_dept` VALUES ('281', '239', '工学院', '图学教研室', ':239', '工学院->图学教研室', '2747547fdbe94c28cc', '*:2747547fdbe94c28cc', '1');
INSERT INTO `group_dept` VALUES ('282', '239', '工学院', '设计基础教研室', ':239', '工学院->设计基础教研室', '1140847fdbe94c2fdf', '*:1140847fdbe94c2fdf', '1');
INSERT INTO `group_dept` VALUES ('283', '239', '工学院', '工程管理教研室', ':239', '工学院->工程管理教研室', '244147fdbe94c345f', '*:244147fdbe94c345f', '1');
INSERT INTO `group_dept` VALUES ('284', '239', '工学院', '机械制造教研室', ':239', '工学院->机械制造教研室', '3214247fdbe94c38eb', '*:3214247fdbe94c38eb', '1');
INSERT INTO `group_dept` VALUES ('285', '239', '工学院', '电气技术教研室', ':239', '工学院->电气技术教研室', '2705547fdbe94c3d77', '*:2705547fdbe94c3d77', '1');
INSERT INTO `group_dept` VALUES ('286', '239', '工学院', '农业机械与装备工程教研室', ':239', '工学院->农业机械与装备工程教研室', '1678247fdbee244aa3', '*:1678247fdbee244aa3', '1');
INSERT INTO `group_dept` VALUES ('287', '239', '工学院', '车辆工程教研室', ':239', '工学院->车辆工程教研室', '2398347fdbee245061', '*:2398347fdbee245061', '1');
INSERT INTO `group_dept` VALUES ('288', '239', '工学院', '水利水电教研室', ':239', '工学院->水利水电教研室', '2604447fdbee245550', '*:2604447fdbee245550', '1');
INSERT INTO `group_dept` VALUES ('289', '239', '工学院', '土木工程教研室', ':239', '工学院->土木工程教研室', '1875747fdbee245a5b', '*:1875747fdbee245a5b', '1');
INSERT INTO `group_dept` VALUES ('290', '239', '工学院', '其他部门', ':239', '工学院->其他部门', '2677847fdbee245f63', '*:2677847fdbee245f63', '1');
INSERT INTO `group_dept` VALUES ('291', '207', '信息院', '计算机系', ':207', '信息院->计算机系', '1833547fdc0cadd40b', '*:1833547fdc0cadd40b', '1');
INSERT INTO `group_dept` VALUES ('292', '207', '信息院', '信息工程系', ':207', '信息院->信息工程系', '842847fdc0cadda49', '*:842847fdc0cadda49', '1');
INSERT INTO `group_dept` VALUES ('295', '207', '信息院', '实验中心', ':207', '信息院->实验中心', '2695047fdc0eabaeba', '*:2695047fdc0eabaeba', '1');
INSERT INTO `group_dept` VALUES ('294', '207', '信息院', '农业信息研究所', ':207', '信息院->农业信息研究所', '391447fdc0cade36c', '*:391447fdc0cade36c', '1');
INSERT INTO `group_dept` VALUES ('296', '207', '信息院', '学生工作办公室', ':207', '信息院->学生工作办公室', '2509047fdc966af79f', '*:2509047fdc966af79f', '1');
INSERT INTO `group_dept` VALUES ('297', '207', '信息院', '成人教育办公室', ':207', '信息院->成人教育办公室', '181147fdc966b056f', '*:181147fdc966b056f', '1');
INSERT INTO `group_dept` VALUES ('298', '207', '信息院', '学院办公室', ':207', '信息院->学院办公室', '3208047fdc966b0ab4', '*:3208047fdc966b0ab4', '1');
INSERT INTO `group_dept` VALUES ('299', '233', '外语学院', '大学英语第二教研室', ':233', '外语学院->大学英语第二教研室', '1987947febe9c5f5e2', '*:1987947febe9c5f5e2', '1');
INSERT INTO `group_dept` VALUES ('302', '233', '外语学院', '外语教学研发中心', ':233', '外语学院->外语教学研发中心', '847848005c5d1e849', '*:847848005c5d1e849', '1');
INSERT INTO `group_dept` VALUES ('303', '233', '外语学院', '公共外语（二）教研室', ':233', '外语学院->公共外语（二）教研室', '56694802bc1d44aa3', '*:56694802bc1d44aa3', '1');
INSERT INTO `group_dept` VALUES ('304', '243', '经济学院', '农经系', ':243', '经济学院->农经系', '27753480452848716d', '*:27753480452848716d', '1');
INSERT INTO `group_dept` VALUES ('305', '243', '经济学院', '经济学系', ':243', '经济学院->经济学系', '222544804528487a78', '*:222544804528487a78', '1');
INSERT INTO `group_dept` VALUES ('306', '243', '经济学院', '金融系', ':243', '经济学院->金融系', '142234804528487f13', '*:142234804528487f13', '1');
INSERT INTO `group_dept` VALUES ('307', '243', '经济学院', '语文教研室', ':243', '经济学院->语文教研室', '2444804560a96590', '*:2444804560a96590', '1');
INSERT INTO `group_dept` VALUES ('308', '238', '理学院', '应用化学系', ':238', '理学院->应用化学系', '29253480c430510a1f', '*:29253480c430510a1f', '1');
INSERT INTO `group_dept` VALUES ('309', '238', '理学院', '信息科学系', ':238', '理学院->信息科学系', '23962480c4305121dc', '*:23962480c4305121dc', '1');
INSERT INTO `group_dept` VALUES ('310', '238', '理学院', '应用物理学系', ':238', '理学院->应用物理学系', '30411480c430512691', '*:30411480c430512691', '1');
INSERT INTO `group_dept` VALUES ('321', '248', '国际学院', '院办', ':248', '国际学院->院办', '279834823bdd5d7028', '*:279834823bdd5d7028:143364828ea658af26', '1');
INSERT INTO `group_dept` VALUES ('322', '248', '国际学院', '雅思教研室', ':248', '国际学院->雅思教研室', '196764823bdd5d755c', '*:196764823bdd5d755c', '1');
INSERT INTO `group_dept` VALUES ('320', '248', '国际学院', '学工组', ':248', '国际学院->学工组', '193744823bdd5d62c4', '*:193744823bdd5d62c4', '1');
INSERT INTO `group_dept` VALUES ('323', '248', '国际学院', '公共基础课教师', ':248', '国际学院->公共基础课教师', '291574823bdd5d7a84', '*:291574823bdd5d7a84', '1');
INSERT INTO `group_dept` VALUES ('324', '248', '国际学院', '金融与会计专业教师', ':248', '国际学院->金融与会计专业教师', '298824823bdd5d7f81', '*:298824823bdd5d7f81', '1');
INSERT INTO `group_dept` VALUES ('325', '248', '国际学院', '工商管理专业教师', ':248', '国际学院->工商管理专业教师', '39474823bdeb17701', '*:39474823bdeb17701', '1');
INSERT INTO `group_dept` VALUES ('329', '247', '东科院', '信息理学系', ':247', '东科院->信息理学系', '6742849ddc6bf9c674', '*:6742849ddc6bf9c674', '1');
INSERT INTO `group_dept` VALUES ('330', '247', '东科院', '商学一系', ':247', '东科院->商学一系', '4155849ddc6ebec830', '*:4155849ddc6ebec830', '1');
INSERT INTO `group_dept` VALUES ('331', '247', '东科院', '商学二系', ':247', '东科院->商学二系', '3844049ddc7083938a', '*:3844049ddc7083938a', '1');
INSERT INTO `group_dept` VALUES ('332', '247', '东科院', '人文系', ':247', '东科院->人文系', '9099149ddc7c2baebd', '*:9099149ddc7c2baebd', '1');
INSERT INTO `group_dept` VALUES ('333', '247', '东科院', '工科一系', ':247', '东科院->工科一系', '7444849ddc80166ff6', '*:7444849ddc80166ff6', '1');
INSERT INTO `group_dept` VALUES ('334', '247', '东科院', '工科二系', ':247', '东科院->工科二系', '4739149ddc81f8d250', '*:4739149ddc81f8d250', '1');
INSERT INTO `group_dept` VALUES ('335', '247', '东科院', '经济系', ':247', '东科院->经济系', '7244349ddc8316acff', '*:7244349ddc8316acff', '1');
INSERT INTO `group_dept` VALUES ('336', '247', '东科院', '外语系', ':247', '东科院->外语系', '2290849ddc840e8b27', '*:2290849ddc840e8b27', '1');
INSERT INTO `group_dept` VALUES ('337', '247', '东科院', '农科系', ':247', '东科院->农科系', '1660549ddc8567a123', '*:1660549ddc8567a123', '1');
INSERT INTO `group_dept` VALUES ('338', '247', '东科院', '生科系', ':247', '东科院->生科系', '9312849ddc866c28ce', '*:9312849ddc866c28ce', '1');
INSERT INTO `item_apply` VALUES ('2', '200741903108', '60015Q3', null, '2', null, null, '求真', '1');
INSERT INTO `item_apply` VALUES ('3', '200741903108', '60015Q0', '0000-00-00 00:00:00', '0', null, null, '求真', '1');
INSERT INTO `item_apply` VALUES ('4', '200741903108', '60015Q1', null, '1', null, null, '求真', '1');
INSERT INTO `item_set` VALUES ('1', '求真', '60015Q1', '程序设计大赛', '国家奖', '5');
INSERT INTO `item_set` VALUES ('2', '求真', '60015Q2', '程序设计大赛', '省级奖', '3');
INSERT INTO `item_set` VALUES ('3', '求真', '60015Q3', '程序设计大赛', '市级奖', '2');
INSERT INTO `stud_baseinfo` VALUES ('2', '200741903108', '罗崇', '男', '东方科技学院', '2007', '计算机一班', '2011', '200741903108', '1');
INSERT INTO `user_admin` VALUES ('1', 'lc', '1', null, '111');
