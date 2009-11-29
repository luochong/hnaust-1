/*
MySQL Data Transfer
Source Host: localhost
Source Database: creditapp
Target Host: localhost
Target Database: creditapp
Date: 2009-11-29 22:30:05
*/

SET FOREIGN_KEY_CHECKS=0;
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
) ENGINE=MyISAM AUTO_INCREMENT=396 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `group_dept` VALUES ('207', '0', '', '信科院', '', '信科院', '210464684c3e00bf64', '*:210464684c3e00bf64', '1');
INSERT INTO `group_dept` VALUES ('205', '0', '', '农学院', '', '农学院', '140724684c3e00b71f', '*:140724684c3e00b71f', '1');
INSERT INTO `group_dept` VALUES ('206', '0', '', '商学院', '', '商学院', '101934684c3e00bb70', '*:101934684c3e00bb70', '1');
INSERT INTO `group_dept` VALUES ('233', '0', '', '外语院', '', '外语院', '151104688b9d51ab43', '*:151104688b9d51ab43', '1');
INSERT INTO `group_dept` VALUES ('236', '0', '', '师范院', '', '师范院', '850746b1877207a16', '*:850746b1877207a16', '1');
INSERT INTO `group_dept` VALUES ('237', '0', '', '人文院', '', '人文院', '2013646e1416e2dc6d', '*:2013646e1416e2dc6d', '1');
INSERT INTO `group_dept` VALUES ('238', '0', '', '理学院', '', '理学院', '2400146e1416e2e5bc', '*:2400146e1416e2e5bc', '1');
INSERT INTO `group_dept` VALUES ('239', '0', '', '工学院', '', '工学院', '2698246e1416e2e770', '*:2698246e1416e2e770', '1');
INSERT INTO `group_dept` VALUES ('240', '0', '', '资环院', '', '资环院', '938346e1416e2e917', '*:938346e1416e2e917', '1');
INSERT INTO `group_dept` VALUES ('241', '0', '', '动科院', '', '动科院', '1160446e1416e2eab8', '*:1160446e1416e2eab8', '1');
INSERT INTO `group_dept` VALUES ('242', '0', '', '食科院', '', '食科院', '537346e1419935680', '*:537346e1419935680', '1');
INSERT INTO `group_dept` VALUES ('243', '0', '', '经济院', '', '经济院', '1381046e1419935aad', '*:1381046e1419935aad', '1');
INSERT INTO `group_dept` VALUES ('345', '0', '', '校团委', '', '校团委', '291554b10dbe4460fb', '*:291554b10dbe4460fb', '1');
INSERT INTO `group_dept` VALUES ('344', '0', ' ', '国际东', ' ', '国际东', '155304b10d3ea19d3c', '*:155304b10d3ea19d3c', '1');
INSERT INTO `group_dept` VALUES ('245', '0', '', '园艺院', '', '园艺院', '1913646e1419935dfa', '*:1913646e1419935dfa', '1');
INSERT INTO `group_dept` VALUES ('246', '0', '', '生安院', '', '生安院', '101746e1419935f9f', '*:101746e1419935f9f', '1');
INSERT INTO `group_dept` VALUES ('247', '0', '', '东方院', '', '东方院', '1619046e141bc66ff4', '*:1619046e141bc66ff4:260384b1237f89e09f:293674b1237f8bb508:189804b1237f8d5fa3:147334b1237f9005ec:100504b1237f91fda4:8514b12381820368:257444b1238183c8cf:249694b123818537d4:300944b1238186a575:4314b123818852ea:147804b123873daee0:33974b1238741ea69:237064b12391d6d719:25074b12391d9ec64:137364b12399999009:145294b123999cd47a:103424b12399a1290a:306314b12399a4bf1a:11084b12399a8115f:81894b1239aa70769:258424b123a56d3abe:264354b123a571c3b0:45444b123a575928a:161214b123a579606f:241264b123a57cb893:134714b123c78e2484:25404b123c792ad50:209174b123c796061d:82664b123c799d5f5:316754b123c79da7bf:227444b123c9e7da15:215534b123c9eb5789:304864b123cfa822cf:62954b123cfabee70:108844b123cfb07d5a:6214b123cfb44ecb:283224b123cfb81d08:100354b123d08d4376:273764b123d5d0c11b:226334b123d5d47d7e:212304b123d5d81eda:9114b123d5db754e:179484b123d5df08cc:46454b123dadac3cd:122824b123daddd6d8:188594b123dae2661e:102484b123dae58103:111694b123dae915c4:209344b123ddf031f3:218954b123ddf3c29e', '1');
INSERT INTO `group_dept` VALUES ('248', '0', '', '国际院', '', '国际院', '41546e141bc67626', '*:41546e141bc67626', '1');
INSERT INTO `group_dept` VALUES ('249', '0', '', '生科院', '', '生科院', '2122846e141bc677e3', '*:2122846e141bc677e3', '1');
INSERT INTO `group_dept` VALUES ('250', '0', '', '体艺院', '', '体艺院', '2629346e141bc67990', '*:2629346e141bc67990', '1');
INSERT INTO `group_dept` VALUES ('251', '0', '', '动医院', '', '动医院', '442646e141bc67b3c', '*:442646e141bc67b3c', '1');
INSERT INTO `group_dept` VALUES ('346', '247', '东方院', '商学一系', ':247', '东方院->商学一系', '260384b1237f89e09f', '*:260384b1237f89e09f:147804b123873daee0:33974b1238741ea69', '1');
INSERT INTO `group_dept` VALUES ('347', '247', '东方院', '商学二系', ':247', '东方院->商学二系', '293674b1237f8bb508', '*:293674b1237f8bb508:237064b12391d6d719:25074b12391d9ec64', '1');
INSERT INTO `group_dept` VALUES ('348', '247', '东方院', '人文社会科学系', ':247', '东方院->人文社会科学系', '189804b1237f8d5fa3', '*:189804b1237f8d5fa3:137364b12399999009:145294b123999cd47a:103424b12399a1290a:306314b12399a4bf1a:11084b12399a8115f:81894b1239aa70769', '1');
INSERT INTO `group_dept` VALUES ('349', '247', '东方院', '工程技术', ':247', '东方院->工程技术', '147334b1237f9005ec', '*:147334b1237f9005ec:258424b123a56d3abe:264354b123a571c3b0:45444b123a575928a:161214b123a579606f:241264b123a57cb893', '1');
INSERT INTO `group_dept` VALUES ('350', '247', '东方院', '资环食科', ':247', '东方院->资环食科', '100504b1237f91fda4', '*:100504b1237f91fda4:134714b123c78e2484:25404b123c792ad50:209174b123c796061d:82664b123c799d5f5:316754b123c79da7bf', '1');
INSERT INTO `group_dept` VALUES ('351', '247', '东方院', '经济', ':247', '东方院->经济', '8514b12381820368', '*:8514b12381820368:227444b123c9e7da15:215534b123c9eb5789', '1');
INSERT INTO `group_dept` VALUES ('352', '247', '东方院', '外语', ':247', '东方院->外语', '257444b1238183c8cf', '*:257444b1238183c8cf:304864b123cfa822cf:62954b123cfabee70:108844b123cfb07d5a:6214b123cfb44ecb:283224b123cfb81d08:100354b123d08d4376', '1');
INSERT INTO `group_dept` VALUES ('353', '247', '东方院', '信息理学', ':247', '东方院->信息理学', '249694b123818537d4', '*:249694b123818537d4:273764b123d5d0c11b:226334b123d5d47d7e:212304b123d5d81eda:9114b123d5db754e:179484b123d5df08cc', '1');
INSERT INTO `group_dept` VALUES ('354', '247', '东方院', '农科', ':247', '东方院->农科', '300944b1238186a575', '*:300944b1238186a575:46454b123dadac3cd:122824b123daddd6d8:188594b123dae2661e:102484b123dae58103:111694b123dae915c4', '1');
INSERT INTO `group_dept` VALUES ('355', '247', '东方院', '生科系', ':247', '东方院->生科系', '4314b123818852ea', '*:4314b123818852ea:209344b123ddf031f3:218954b123ddf3c29e', '1');
INSERT INTO `group_dept` VALUES ('356', '346', '商学一系', '工商', ':247:346', '东方院->商学一系->工商', '147804b123873daee0', '*:147804b123873daee0', '1');
INSERT INTO `group_dept` VALUES ('357', '346', '商学一系', '国贸', ':247:346', '东方院->商学一系->国贸', '33974b1238741ea69', '*:33974b1238741ea69', '1');
INSERT INTO `group_dept` VALUES ('358', '347', '商学二系', '会计', ':247:347', '东方院->商学二系->会计', '237064b12391d6d719', '*:237064b12391d6d719', '1');
INSERT INTO `group_dept` VALUES ('359', '347', '商学二系', '市营', ':247:347', '东方院->商学二系->市营', '25074b12391d9ec64', '*:25074b12391d9ec64', '1');
INSERT INTO `group_dept` VALUES ('360', '348', '人文社会科学系', '法学', ':247:348', '东方院->人文社会科学系->法学', '137364b12399999009', '*:137364b12399999009', '1');
INSERT INTO `group_dept` VALUES ('361', '348', '人文社会科学系', '艺术', ':247:348', '东方院->人文社会科学系->艺术', '145294b123999cd47a', '*:145294b123999cd47a', '1');
INSERT INTO `group_dept` VALUES ('362', '348', '人文社会科学系', '艺生', ':247:348', '东方院->人文社会科学系->艺生', '103424b12399a1290a', '*:103424b12399a1290a', '1');
INSERT INTO `group_dept` VALUES ('363', '348', '人文社会科学系', '艺视', ':247:348', '东方院->人文社会科学系->艺视', '306314b12399a4bf1a', '*:306314b12399a4bf1a', '1');
INSERT INTO `group_dept` VALUES ('364', '348', '人文社会科学系', '社体', ':247:348', '东方院->人文社会科学系->社体', '11084b12399a8115f', '*:11084b12399a8115f', '1');
INSERT INTO `group_dept` VALUES ('365', '348', '人文社会科学系', '公事', ':247:348', '东方院->人文社会科学系->公事', '81894b1239aa70769', '*:81894b1239aa70769', '1');
INSERT INTO `group_dept` VALUES ('366', '349', '工程技术', '机制', ':247:349', '东方院->工程技术->机制', '258424b123a56d3abe', '*:258424b123a56d3abe', '1');
INSERT INTO `group_dept` VALUES ('367', '349', '工程技术', '工程', ':247:349', '东方院->工程技术->工程', '264354b123a571c3b0', '*:264354b123a571c3b0', '1');
INSERT INTO `group_dept` VALUES ('368', '349', '工程技术', '水利', ':247:349', '东方院->工程技术->水利', '45444b123a575928a', '*:45444b123a575928a', '1');
INSERT INTO `group_dept` VALUES ('369', '349', '工程技术', '汽车', ':247:349', '东方院->工程技术->汽车', '161214b123a579606f', '*:161214b123a579606f', '1');
INSERT INTO `group_dept` VALUES ('370', '349', '工程技术', '土木', ':247:349', '东方院->工程技术->土木', '241264b123a57cb893', '*:241264b123a57cb893', '1');
INSERT INTO `group_dept` VALUES ('371', '350', '资环食科', '环工', ':247:350', '东方院->资环食科->环工', '134714b123c78e2484', '*:134714b123c78e2484', '1');
INSERT INTO `group_dept` VALUES ('372', '350', '资环食科', '食科', ':247:350', '东方院->资环食科->食科', '25404b123c792ad50', '*:25404b123c792ad50', '1');
INSERT INTO `group_dept` VALUES ('373', '350', '资环食科', '土管', ':247:350', '东方院->资环食科->土管', '209174b123c796061d', '*:209174b123c796061d', '1');
INSERT INTO `group_dept` VALUES ('374', '350', '资环食科', '环工', ':247:350', '东方院->资环食科->环工', '82664b123c799d5f5', '*:82664b123c799d5f5', '1');
INSERT INTO `group_dept` VALUES ('375', '350', '资环食科', '规划', ':247:350', '东方院->资环食科->规划', '316754b123c79da7bf', '*:316754b123c79da7bf', '1');
INSERT INTO `group_dept` VALUES ('376', '351', '经济', '经济', ':247:351', '东方院->经济->经济', '227444b123c9e7da15', '*:227444b123c9e7da15', '1');
INSERT INTO `group_dept` VALUES ('377', '351', '经济', '金融', ':247:351', '东方院->经济->金融', '215534b123c9eb5789', '*:215534b123c9eb5789', '1');
INSERT INTO `group_dept` VALUES ('378', '352', '外语', '商务', ':247:352', '东方院->外语->商务', '304864b123cfa822cf', '*:304864b123cfa822cf', '1');
INSERT INTO `group_dept` VALUES ('379', '352', '外语', '翻译', ':247:352', '东方院->外语->翻译', '62954b123cfabee70', '*:62954b123cfabee70', '1');
INSERT INTO `group_dept` VALUES ('380', '352', '外语', '英语', ':247:352', '东方院->外语->英语', '108844b123cfb07d5a', '*:108844b123cfb07d5a', '1');
INSERT INTO `group_dept` VALUES ('381', '352', '外语', '日语', ':247:352', '东方院->外语->日语', '6214b123cfb44ecb', '*:6214b123cfb44ecb', '1');
INSERT INTO `group_dept` VALUES ('382', '352', '外语', '日经贸', ':247:352', '东方院->外语->日经贸', '283224b123cfb81d08', '*:283224b123cfb81d08', '1');
INSERT INTO `group_dept` VALUES ('383', '352', '外语', '日翻译', ':247:352', '东方院->外语->日翻译', '100354b123d08d4376', '*:100354b123d08d4376', '1');
INSERT INTO `group_dept` VALUES ('384', '353', '信息理学', '计算', ':247:353', '东方院->信息理学->计算', '273764b123d5d0c11b', '*:273764b123d5d0c11b', '1');
INSERT INTO `group_dept` VALUES ('385', '353', '信息理学', '电商', ':247:353', '东方院->信息理学->电商', '226334b123d5d47d7e', '*:226334b123d5d47d7e', '1');
INSERT INTO `group_dept` VALUES ('386', '353', '信息理学', '信科', ':247:353', '东方院->信息理学->信科', '212304b123d5d81eda', '*:212304b123d5d81eda', '1');
INSERT INTO `group_dept` VALUES ('387', '353', '信息理学', '信工', ':247:353', '东方院->信息理学->信工', '9114b123d5db754e', '*:9114b123d5db754e', '1');
INSERT INTO `group_dept` VALUES ('388', '353', '信息理学', '应化', ':247:353', '东方院->信息理学->应化', '179484b123d5df08cc', '*:179484b123d5df08cc', '1');
INSERT INTO `group_dept` VALUES ('389', '354', '农科', '园林', ':247:354', '东方院->农科->园林', '46454b123dadac3cd', '*:46454b123dadac3cd', '1');
INSERT INTO `group_dept` VALUES ('390', '354', '农科', '动检', ':247:354', '东方院->农科->动检', '122824b123daddd6d8', '*:122824b123daddd6d8', '1');
INSERT INTO `group_dept` VALUES ('391', '354', '农科', '动医', ':247:354', '东方院->农科->动医', '188594b123dae2661e', '*:188594b123dae2661e', '1');
INSERT INTO `group_dept` VALUES ('392', '354', '农科', '园艺', ':247:354', '东方院->农科->园艺', '102484b123dae58103', '*:102484b123dae58103', '1');
INSERT INTO `group_dept` VALUES ('393', '354', '农科', '烟草', ':247:354', '东方院->农科->烟草', '111694b123dae915c4', '*:111694b123dae915c4', '1');
INSERT INTO `group_dept` VALUES ('394', '355', '生科系', '生工', ':247:355', '东方院->生科系->生工', '209344b123ddf031f3', '*:209344b123ddf031f3', '1');
INSERT INTO `group_dept` VALUES ('395', '355', '生科系', '生技', ':247:355', '东方院->生科系->生技', '218954b123ddf3c29e', '*:218954b123ddf3c29e', '1');
