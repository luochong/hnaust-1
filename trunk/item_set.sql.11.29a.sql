/*
MySQL Data Transfer
Source Host: localhost
Source Database: creditapp
Target Host: localhost
Target Database: creditapp
Date: 2009-11-29 16:39:36
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for item_set
-- ----------------------------
CREATE TABLE `item_set` (
  `item_id` int(10) NOT NULL auto_increment,
  `item_type` varchar(2) character set utf8 default NULL COMMENT '项目类别',
  `item_code` varchar(8) character set utf8 default NULL COMMENT '项目编号',
  `item_name` varchar(50) character set utf8 default NULL COMMENT '项目名称',
  `item_rank` varchar(4) character set utf8 default NULL COMMENT '项目级别',
  `item_score` int(2) default NULL COMMENT '项目学分',
  `item_status` varchar(10) default '1',
  PRIMARY KEY  (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `item_set` VALUES ('1', '求真', '60015Q1', '程序设计大赛', '国家奖', '5', '1');
INSERT INTO `item_set` VALUES ('2', '求真', '60015Q2', '程序设计大赛', '省级奖', '3', '1');
INSERT INTO `item_set` VALUES ('3', '求真', '60015Q3', '程序设计大赛', '市级奖', '2', '1');
INSERT INTO `item_set` VALUES ('4', '求真', '60001Q0', '发表学术研究论文', '无', '5', '1');
INSERT INTO `item_set` VALUES ('5', '求真', '60002Q0', '参加学校组织的大学生课外学术科技作品竞赛', '无', '1', '1');
INSERT INTO `item_set` VALUES ('6', '求真', '60003Q1', '“挑战杯”大学生课外学术科技作品竞赛', '国家级奖', '5', '1');
INSERT INTO `item_set` VALUES ('7', '求真', '60003Q2', '“挑战杯”大学生课外学术科技作品竞赛', '省级奖励', '4', '1');
INSERT INTO `item_set` VALUES ('8', '求真', '60003Q3', '“挑战杯”大学生课外学术科技作品竞赛', '校级奖励', '2', '1');
INSERT INTO `item_set` VALUES ('9', '求真', '60004Q1', '大学生数学建模竞赛', '国家级奖', '3', '1');
INSERT INTO `item_set` VALUES ('10', '求真', '60004Q2', '大学生数学建模竞赛', '省级奖励', '2', '1');
INSERT INTO `item_set` VALUES ('11', '求真', '60005Q1', '大学生电子设计竞赛', '国家级奖', '3', '1');
INSERT INTO `item_set` VALUES ('12', '求真', '60005Q2', '大学生电子设计竞赛', '省级奖励', '2', '1');
INSERT INTO `item_set` VALUES ('13', '求真', '60006Q1', '大学生力学竞赛', '国家级奖', '3', '1');
INSERT INTO `item_set` VALUES ('14', '求真', '60006Q2', '大学生力学竞赛', '省级奖励', '2', '1');
INSERT INTO `item_set` VALUES ('15', '求真', '60007Q1', '大学生机器人大赛', '国家级奖', '3', '1');
INSERT INTO `item_set` VALUES ('16', '求真', '60007Q2', '大学生机器人大赛', '省级奖励', '2', '1');
INSERT INTO `item_set` VALUES ('17', '求真', '60008Q1', '计算机仿真大赛', '国家级奖', '3', '1');
INSERT INTO `item_set` VALUES ('18', '求真', '60008Q2', '计算机仿真大赛', '省级奖励', '2', '1');
INSERT INTO `item_set` VALUES ('19', '求真', '60009Q1', '大学生机械创新设计大赛', '国家级奖', '3', '1');
INSERT INTO `item_set` VALUES ('20', '求真', '60009Q2', '大学生机械创新设计大赛', '省级奖励', '2', '1');
INSERT INTO `item_set` VALUES ('21', '求真', '60010Q1', '土木建筑类大学生结构模型创作竞赛', '国家级奖', '3', '1');
INSERT INTO `item_set` VALUES ('22', '求真', '60010Q2', '土木建筑类大学生结构模型创作竞赛', '省级奖励', '2', '1');
INSERT INTO `item_set` VALUES ('23', '求真', '60011Q1', '大学生程序设计大赛', '国家级奖', '3', '1');
INSERT INTO `item_set` VALUES ('24', '求真', '60011Q2', '大学生程序设计大赛', '省级奖励', '2', '1');
INSERT INTO `item_set` VALUES ('25', '求真', '60012Q1', '大学生数学竞赛', '国家级奖', '3', '1');
INSERT INTO `item_set` VALUES ('26', '求真', '60012Q2', '大学生数学竞赛', '省级奖励', '2', '1');
INSERT INTO `item_set` VALUES ('27', '求真', '60013Q1', '大学生各类英语竞赛', '国家级奖', '3', '1');
INSERT INTO `item_set` VALUES ('28', '求真', '60013Q2', '大学生各类英语竞赛', '省级奖励', '2', '1');
INSERT INTO `item_set` VALUES ('29', '求善', '60014Q0', '青年志愿者积极组织参与青年志愿者服务活动', '无', '1', '1');
INSERT INTO `item_set` VALUES ('30', '求善', '60015Q0', '积极组织参与大学生文明修身活动', '无', '1', '1');
INSERT INTO `item_set` VALUES ('31', '求善', '60032Q0', '参加党校培训', '无', '1', '1');
INSERT INTO `item_set` VALUES ('32', '求善', '60033Q0', '参加团学干部培训', '无', '1', '1');
INSERT INTO `item_set` VALUES ('33', '求美', '60016Q1', '在正式出版刊物上发表各类文学作品和新闻报道类作品', '无', '2', '1');
INSERT INTO `item_set` VALUES ('34', '求美', '60016Q2', '在正式出版刊物上发表各类文学作品和新闻报道类作品', '无', '1', '1');
INSERT INTO `item_set` VALUES ('35', '求美', '60017Q1', '听人文讲坛、科学论坛或其他各类文化科技讲座', '无', '1', '1');
INSERT INTO `item_set` VALUES ('36', '求美', '60017Q2', '听人文讲坛、科学论坛或其他各类文化科技讲座', '无', '1', '1');
INSERT INTO `item_set` VALUES ('37', '求美', '60018Q1', '文化艺术类竞赛', '国家级奖', '5', '1');
INSERT INTO `item_set` VALUES ('38', '求美', '60018Q2', '文化艺术类竞赛', '省级奖励', '4', '1');
INSERT INTO `item_set` VALUES ('39', '求美', '60018Q3', '文化艺术类竞赛', '校级奖励', '2', '1');
INSERT INTO `item_set` VALUES ('40', '求美', '60019Q1', '体育运动比赛', '国家级奖', '5', '1');
INSERT INTO `item_set` VALUES ('41', '求美', '60019Q2', '体育运动比赛', '省级奖励', '4', '1');
INSERT INTO `item_set` VALUES ('42', '求美', '60019Q3', '体育运动比赛', '校级奖励', '2', '1');
INSERT INTO `item_set` VALUES ('43', '求实', '60020Q1', '个人参加寒暑假社会实践活动', '无', '1', '1');
INSERT INTO `item_set` VALUES ('44', '求实', '60020Q2', '个人参加寒暑假社会实践活动', '无', '1', '1');
INSERT INTO `item_set` VALUES ('45', '求实', '60020Q3', '个人参加寒暑假社会实践活动', '无', '1', '1');
INSERT INTO `item_set` VALUES ('46', '求实', '60021Q1', '参加校、院“双百”工程、双向素质教育示范工程、“三下乡”社会实践活动团队 ', '无', '1', '1');
INSERT INTO `item_set` VALUES ('47', '求实', '60021Q2', '参加校、院“双百”工程、双向素质教育示范工程、“三下乡”社会实践活动团队', '无', '1', '1');
INSERT INTO `item_set` VALUES ('48', '求实', '60021Q3', '参加校、院“双百”工程、双向素质教育示范工程、“三下乡”社会实践活动团队', '无', '1', '1');
INSERT INTO `item_set` VALUES ('49', '求实', '60022Q0', '三下乡调查报告获奖', '无', '1', '1');
INSERT INTO `item_set` VALUES ('50', '求实', '60023Q0', '参加学校、学院大学生“三下乡”社会实践获奖', '无', '1', '1');
INSERT INTO `item_set` VALUES ('51', '求特', '60025Q1', '校级学生干部', '无', '2', '1');
INSERT INTO `item_set` VALUES ('52', '求特', '60025Q2', '校级学生干部', '无', '1', '1');
INSERT INTO `item_set` VALUES ('53', '求特', '60026Q1', '院级学生干部', '无', '2', '1');
INSERT INTO `item_set` VALUES ('54', '求特', '60026Q2', '院级学生干部', '无', '1', '1');
INSERT INTO `item_set` VALUES ('55', '求特', '60027Q0', '社团正式注册成员', '无', '1', '1');
INSERT INTO `item_set` VALUES ('56', '求特', '60028Q0', '湘农素质拓展学堂学员', '无', '1', '1');
INSERT INTO `item_set` VALUES ('57', '求强', '60029Q1', '职业规划大赛', '无', '1', '1');
INSERT INTO `item_set` VALUES ('58', '求强', '60029Q2', '就业力挑战赛', '无', '1', '1');
INSERT INTO `item_set` VALUES ('59', '求强', '60030Q1', '挑战杯大学生创业计划大赛', '国家级奖', '5', '1');
INSERT INTO `item_set` VALUES ('60', '求强', '60030Q2', '挑战杯大学生创业计划大赛', '省级奖励', '4', '1');
INSERT INTO `item_set` VALUES ('61', '求强', '60030Q3', '挑战杯大学生创业计划大赛', '校级奖励', '2', '1');
INSERT INTO `item_set` VALUES ('62', '求强', 'C11001', '内审员', '无', '1', '1');
INSERT INTO `item_set` VALUES ('63', '求强', 'C18001', '锐捷网络工程师', '无', '1', '1');
INSERT INTO `item_set` VALUES ('64', '求强', 'C18002', '计算机与软件考试资格认证', '无', '1', '1');
INSERT INTO `item_set` VALUES ('65', '求强', 'C18003', '商业电子商务师', '无', '1', '1');
INSERT INTO `item_set` VALUES ('66', '求强', 'C18004', '物流师', '无', '1', '1');
INSERT INTO `item_set` VALUES ('67', '求强', 'C18005', '网络营销师', '无', '1', '1');
INSERT INTO `item_set` VALUES ('68', '求强', 'C18006', 'ARM/ATC嵌入式工程师认证', '无', '1', '1');
INSERT INTO `item_set` VALUES ('69', '求强', 'C14001', '秘书证', '无', '1', '1');
INSERT INTO `item_set` VALUES ('70', '求强', 'C14002', '营销师', '无', '1', '1');
INSERT INTO `item_set` VALUES ('71', '求强', 'C14003', '理财规划师', '无', '1', '1');
INSERT INTO `item_set` VALUES ('72', '求强', 'C14004', '心理咨询师', '无', '1', '1');
INSERT INTO `item_set` VALUES ('73', '求强', 'C14005', '企业信息管理师', '无', '1', '1');
INSERT INTO `item_set` VALUES ('74', '求强', 'C14006', '电子商务师', '无', '1', '1');
INSERT INTO `item_set` VALUES ('75', '求强', 'C14007', '项目管理师', '无', '1', '1');
INSERT INTO `item_set` VALUES ('76', '求强', 'C14008', '物业管理师', '无', '1', '1');
INSERT INTO `item_set` VALUES ('77', '求强', 'C14010', '人力资源管理师', '无', '1', '1');
INSERT INTO `item_set` VALUES ('78', '求强', 'C14011', '企业培训师', '无', '1', '1');
INSERT INTO `item_set` VALUES ('79', '求强', 'C14012', '职业指导人员', '无', '1', '1');
INSERT INTO `item_set` VALUES ('80', '求强', 'C14013', '园林工程设计员', '无', '1', '1');
INSERT INTO `item_set` VALUES ('81', '求强', 'C14014', '花卉园艺工', '无', '1', '1');
INSERT INTO `item_set` VALUES ('82', '求强', 'C14015', '景观设计师', '无', '1', '1');
INSERT INTO `item_set` VALUES ('83', '求强', 'C14016', '风景园林施工管理师', '无', '1', '1');
INSERT INTO `item_set` VALUES ('84', '求强', 'C14017', '营养师', '无', '1', '1');
INSERT INTO `item_set` VALUES ('85', '求强', 'C14018', '土地估价师', '无', '1', '1');
INSERT INTO `item_set` VALUES ('86', '求强', '60024Q0', '汽车驾驶证', '无', '2', '1');
INSERT INTO `item_set` VALUES ('87', '求强', '60031Q0', '全国计算机专业软件水平考试', '无', '3', '1');
