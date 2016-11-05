/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : teacher_class_system

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-09-20 09:56:58
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for cb_tc_com_exc201601
-- ----------------------------
DROP TABLE IF EXISTS `cb_tc_com_exc201601`;
CREATE TABLE `cb_tc_com_exc201601` (
  `insertTime` int(10) NOT NULL AUTO_INCREMENT,
  `grade` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `major` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `people` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `courseName` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `courseType` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `courseCredit` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `courseHour` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `practiceHour` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `onMachineHour` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `timePeriod` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `teacherName` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `remark` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`grade`,`major`,`people`,`courseName`,`courseType`,`courseCredit`,`courseHour`,`practiceHour`,`onMachineHour`,`timePeriod`,`teacherName`,`remark`),
  KEY `insertTime` (`insertTime`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of cb_tc_com_exc201601
-- ----------------------------
INSERT INTO `cb_tc_com_exc201601` VALUES ('1', '2016学年上学期计算机科学与技术（卓越班）开课计划书', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `cb_tc_com_exc201601` VALUES ('2', '年级', '专业', '专业人数', '课程名称', '选修类型', '学分', '学时', '实验', '上机', '起讫周序', '任课教师', '备注');
INSERT INTO `cb_tc_com_exc201601` VALUES ('3', '', '', '', '', '', '', '', '学时', '学时', '', '', '');
INSERT INTO `cb_tc_com_exc201601` VALUES ('4', '2013', '计算机科学与技术（卓越班）', '96', ' 互联网产品设计', '  专业选修', '2.5', '40', '', '', '', '林秋月', '企业开课，理论20学时，上机20学时 ');
INSERT INTO `cb_tc_com_exc201601` VALUES ('5', '2013', '计算机科学与技术（卓越班）', '96', ' 企业实践', '  毕业实习', '15', '', '', '', '；', '张浩；', '；');
INSERT INTO `cb_tc_com_exc201601` VALUES ('6', '2014', '计算机科学与技术（卓越班）', '125', ' EDA技术', '  专业方向（限选）1', '2', '32', '', '16', '；', '赵彦敏；', '；');
INSERT INTO `cb_tc_com_exc201601` VALUES ('7', '2014', '计算机科学与技术（卓越班）', '125', ' Linux操作系统设计实践', '  实践选修', '1.5', '36', '', '', '；；', '程烨；郭红；', '周4学时连上,机房上课。程烨一个班，郭红一个班，两个班安排同一时间段上课，每班限选人数60人。；周4学时连上,机房上课。程烨一个班，郭红一个班，两个班安排同一时间段上课，每班限选人数60人。；');
INSERT INTO `cb_tc_com_exc201601` VALUES ('8', '2014', '计算机科学与技术（卓越班）', '125', ' 编译方法', '  专业必修（限选）', '3', '48', '', '', '；1-12；1--12；', '何振峰；刘秉瀚；陈晖；', '理论与实践课选同一老师；（刘秉瀚、陈晖）合作上1个班，希望安排在下午的5，6节。；（刘秉瀚、陈晖）刘秉瀚、陈晖合作上1个班，希望安排在下午的5，6节。；');
INSERT INTO `cb_tc_com_exc201601` VALUES ('9', '2014', '计算机科学与技术（卓越班）', '125', ' 编译系统设计实践', '  实践选修', '1.5', '36', '', '', '；4-12；第4周开始；', '何振峰；刘秉瀚；陈晖；', '理论与实践课选同一老师；分成2个班，要求与《编译方法》同一学期上，滞后3周，每周4节，安排周六。选修《编译系统设计实践》和理论课《编译方法》的老师要一致；刘秉瀚、陈晖，分成2个班，要求与《编译方法》同一学期上，滞后3周，每周4节，安排周六。选修《编译系统设计实践》和理论课《编译方法》的老师要一致；');
INSERT INTO `cb_tc_com_exc201601` VALUES ('10', '2014', '计算机科学与技术（卓越班）', '125', ' 概率论与数理统计', '  学科必修', '3', '48', '', '', '', '', '');
INSERT INTO `cb_tc_com_exc201601` VALUES ('11', '2014', '计算机科学与技术（卓越班）', '125', ' 计算方法', '  学科必修', '2', '32', '', '', '1-9；；；', '王秀；白清源；陈欢；', '；；；');
INSERT INTO `cb_tc_com_exc201601` VALUES ('12', '2014', '计算机科学与技术（卓越班）', '125', ' 计算机图形学', '  专业方向（限选）3', '2', '32', '', '', '1-8；', '谢伙生；', '与计算机导论课排在同一个上午，教室同一间。；');
INSERT INTO `cb_tc_com_exc201601` VALUES ('13', '2014', '计算机科学与技术（卓越班）', '125', ' 计算机网络体系结构', '  专业方向（限选）1', '2', '32', '', '', '', '郑相涵；', '');
INSERT INTO `cb_tc_com_exc201601` VALUES ('14', '2014', '计算机科学与技术（卓越班）', '125', ' 计算机系统结构', '  专业必修（限选）', '3', '48', '', '', '1-18；', '林嘉雯；尚艳艳；', '尽可能安排在上午3、4节或者下午1、2节；课程不安排在12节；');
INSERT INTO `cb_tc_com_exc201601` VALUES ('15', '2014', '计算机科学与技术（卓越班）', '125', ' 宽带网及宽带接入技术', '  学科专业选修', '2', '32', '', '', '；', '孙及园；', '请安排在11～18周的下午；');
INSERT INTO `cb_tc_com_exc201601` VALUES ('16', '2014', '计算机科学与技术（卓越班）', '125', ' 面向对象设计方法(UML)', '  专业方向（限选）2', '2', '32', '', '', '；', '吴小竹；', '；');
INSERT INTO `cb_tc_com_exc201601` VALUES ('17', '2014', '计算机科学与技术（卓越班）', '125', ' 嵌入式人机交互技术与GUI程序设计', '  学科专业选修', '2', '32', '', '', '；', '於志勇；', '；');
INSERT INTO `cb_tc_com_exc201601` VALUES ('18', '2014', '计算机科学与技术（卓越班）', '125', ' 人工智能', '  专业必修（限选）', '2', '32', '', '', '第一周；；；', '陈昭炯；林世平；', '不排在上午1-2节；；；');
INSERT INTO `cb_tc_com_exc201601` VALUES ('19', '2014', '计算机科学与技术（卓越班）', '125', ' 软件工程A', '  专业必修（限选）', '3', '48', '', '', '；1-18；；', '张栋；汪璟玢；柯逍；', '；不要安排7,8节；；');
INSERT INTO `cb_tc_com_exc201601` VALUES ('20', '2014', '计算机科学与技术（卓越班）', '125', ' 软件工程实践', '  实践选修', '2', '48', '', '', '；3-18；；', '张栋；汪璟玢；柯逍；', '；4节连上；；');
INSERT INTO `cb_tc_com_exc201601` VALUES ('21', '2014', '计算机科学与技术（卓越班）', '125', ' 软件体系结构', '  专业方向（限选）2', '2', '32', '', '', '1-16；', '丁善镜；', '第3，4节；');
INSERT INTO `cb_tc_com_exc201601` VALUES ('22', '2014', '计算机科学与技术（卓越班）', '125', ' 数据挖掘技术', '  学科专业选修', '2', '32', '', '', '；；', '白清源；苏雅茹；', '；；');
INSERT INTO `cb_tc_com_exc201601` VALUES ('23', '2014', '计算机科学与技术（卓越班）', '125', ' 网络管理实验', '  实践选修', '1', '24', '', '', '5-7周星期日1-8节；5-7周星期日1-8节；', '郭洪；林常俊；', '网络实验室401；网络实验室404；');
INSERT INTO `cb_tc_com_exc201601` VALUES ('24', '2014', '计算机科学与技术（卓越班）', '125', ' 网络和系统性能评估', '  学科专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `cb_tc_com_exc201601` VALUES ('25', '2014', '计算机科学与技术（卓越班）', '125', ' 现代计算机接口技术', '  专业必修（限选）', '2', '32', '', '', '1至8周；第1周--8周；', '倪一涛；苏力；', '；周2，周4。麻烦和实验班的《汇编与接口技术》连排，最好3，4节连排5,6节；');
INSERT INTO `cb_tc_com_exc201601` VALUES ('26', '2014', '计算机科学与技术（卓越班）', '125', ' 现代计算机接口技术实践', '  实践选修', '1.5', '36', '', '', '4至12周；第3-18周；', '倪一涛；苏力；', '请安排周末；1.请同学选课和理论课老师相同。2.尽量选实验，否则理论课学习会受影响；');
INSERT INTO `cb_tc_com_exc201601` VALUES ('27', '2014', '计算机科学与技术（卓越班）', '125', ' 现代搜索引擎技术及应用', '  专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `cb_tc_com_exc201601` VALUES ('28', '2015', '计算机科学与技术（卓越班）', '1', ' IEEE Micromouse 原理与实践A（企业开课）', '  专业选修', '2', '32', '16', '', '；', '张浩；', '；');
INSERT INTO `cb_tc_com_exc201601` VALUES ('29', '2015', '计算机科学与技术（卓越班）', '1', ' 离散数学A', '  学科必修', '4.5', '72', '', '', '1-16；；', '陈勃；王一蕾；', '；；');
INSERT INTO `cb_tc_com_exc201601` VALUES ('30', '2015', '计算机科学与技术（卓越班）', '1', ' 数字电路与逻辑设计', '  专业必修（限选）', '3', '48', '', '', '1-12；1~12周；', '胡颖；董晨；', '周一3、4节周三7、8节；如果可以，请排在周1的3、4节和周3的7，8节；');
INSERT INTO `cb_tc_com_exc201601` VALUES ('31', '2015', '计算机科学与技术（卓越班）', '1', ' 数字逻辑电路设计', '  实践选修', '2', '48', '', '', '6-17；第6周开始~期末；', '胡颖；董晨；', '周六1-8节；董晨老师班请安排在周一下午或周五下午，与胡颖老师和郭龙坤老师不能同时，因为共用一个实验室；');
INSERT INTO `cb_tc_com_exc201601` VALUES ('32', '2015', '计算机科学与技术（卓越班）', '1', ' 算法与数据结构', '  专业必修（限选）', '5', '80', '', '28', '；1-14；', '王一蕾；余春艳；', '；；');
INSERT INTO `cb_tc_com_exc201601` VALUES ('33', '2016', '计算机科学与技术（卓越班）', '1', ' 高级语言程序设计', '  学科必修', '4', '64', '', '32', '；1-16；；', '孙岚；王秀；林秋月；', '；；；');
INSERT INTO `cb_tc_com_exc201601` VALUES ('34', '2016', '计算机科学与技术（卓越班）', '1', ' 计算机导论', '  公共必修', '1.5', '24', '', '', '3-10；3-10；；', '陈勃；谢伙生；', '；与计算机图形学课排在同一个上午，教室同一间。；；');
INSERT INTO `cb_tc_com_exc201601` VALUES ('35', '2016', '计算机科学与技术（卓越班）', '1', ' 认识实习（计算机基础训练）', '  实践环节', '1', '24', '', '', '10-15；11-16；', '陈勃；谢伙生；', '；；');

-- ----------------------------
-- Table structure for cb_tc_com_nor201601
-- ----------------------------
DROP TABLE IF EXISTS `cb_tc_com_nor201601`;
CREATE TABLE `cb_tc_com_nor201601` (
  `insertTime` int(10) NOT NULL AUTO_INCREMENT,
  `grade` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `major` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `people` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `courseName` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `courseType` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `courseCredit` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `courseHour` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `practiceHour` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `onMachineHour` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `timePeriod` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `teacherName` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `remark` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`grade`,`major`,`people`,`courseName`,`courseType`,`courseCredit`,`courseHour`,`practiceHour`,`onMachineHour`,`timePeriod`,`teacherName`,`remark`),
  KEY `insertTime` (`insertTime`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of cb_tc_com_nor201601
-- ----------------------------
INSERT INTO `cb_tc_com_nor201601` VALUES ('1', '2016学年上学期计算机开课计划书', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `cb_tc_com_nor201601` VALUES ('2', '年级', '专业', '专业人数', '课程名称', '选修类型', '学分', '学时', '实验', '上机', '起讫周序', '任课教师', '备注');
INSERT INTO `cb_tc_com_nor201601` VALUES ('3', '', '', '', '', '', '', '', '学时', '学时', '', '', '');
INSERT INTO `cb_tc_com_nor201601` VALUES ('4', '2013', '计算机科学与技术', '62', ' Internet技术与协议分析实验', '  实践选修', '1', '24', '', '', '', '张浩、蔣启强、何萧玲', '');
INSERT INTO `cb_tc_com_nor201601` VALUES ('5', '2013', '计算机科学与技术', '62', ' IT企业项目实训', '  实践选修', '2', '48', '', '', '', '', '');
INSERT INTO `cb_tc_com_nor201601` VALUES ('6', '2013', '计算机科学与技术', '62', ' 多媒体通信技术', '  专业选修', '2', '32', '', '', '；', '孙及园；', '请安排在2～9周的下午；');
INSERT INTO `cb_tc_com_nor201601` VALUES ('7', '2013', '计算机科学与技术', '62', ' 分布式操作系统', '  专业选修', '2', '32', '', '', '1-16；', '丁善镜；', '第5，6节；');
INSERT INTO `cb_tc_com_nor201601` VALUES ('8', '2013', '计算机科学与技术', '62', ' 分布式系统', '  专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `cb_tc_com_nor201601` VALUES ('9', '2013', '计算机科学与技术', '62', ' 广域网技术实验', '  实践选修', '1', '24', '', '', '；', '蒋启强；', '；');
INSERT INTO `cb_tc_com_nor201601` VALUES ('10', '2013', '计算机科学与技术', '62', ' 互联网产品设计', '  专业选修', '2.5', '40', '', '', '', '林秋月', '理论20学时，上机20学时');
INSERT INTO `cb_tc_com_nor201601` VALUES ('11', '2013', '计算机科学与技术', '62', ' 软件可靠性与可信软件', '  专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `cb_tc_com_nor201601` VALUES ('12', '2013', '计算机科学与技术', '62', ' 虚拟现实', '  专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `cb_tc_com_nor201601` VALUES ('13', '2013', '计算机科学与技术', '62', ' 云计算', '  专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `cb_tc_com_nor201601` VALUES ('14', '2014', '计算机科学与技术', '15', ' EDA技术', '  专业方向（限选）1', '2', '32', '', '16', '；', '赵彦敏；', '；');
INSERT INTO `cb_tc_com_nor201601` VALUES ('15', '2014', '计算机科学与技术', '15', ' Java语言程序设计', '  实践选修', '2', '48', '', '', '1-16；', '陈嘉；', '因课时较多，希望能一周少安排一些课，多安排几周；');
INSERT INTO `cb_tc_com_nor201601` VALUES ('16', '2014', '计算机科学与技术', '15', ' Linux操作系统设计实践', '  实践选修', '1.5', '36', '', '', '；；', '程烨；郭红；', '周4学时连上,机房上课。程烨一个班，郭红一个班，两个班安排同一时间段上课，每班限选人数60人。；周4学时连上,机房上课。程烨一个班，郭红一个班，两个班安排同一时间段上课，每班限选人数60人。；');
INSERT INTO `cb_tc_com_nor201601` VALUES ('17', '2014', '计算机科学与技术', '15', ' 编译方法', '  学科必修', '3', '48', '', '', '；1-12；1--12；', '何振峰；刘秉瀚；陈晖；', '理论课与实践课选同一老师；（刘秉瀚、陈晖）合作上1个班，希望安排在下午的5，6节。；（刘秉瀚、陈晖）合作上1个班，希望安排在上午3，4节或下午的5，6节。；');
INSERT INTO `cb_tc_com_nor201601` VALUES ('18', '2014', '计算机科学与技术', '15', ' 编译系统设计实践', '  实践选修', '1.5', '36', '', '', '；4-12；第4周开始；', '何振峰；刘秉瀚；陈晖；', '理论课与实践课选同一老师；分成2个班，要求与《编译方法》同一学期上，滞后3周，每周4节，安排周六。选修《编译系统设计实践》和理论课《编译方法》的老师要一致；刘秉瀚、陈晖，分成2个班，要求与《编译方法》同一学期上，滞后3周，每周4节，安排周六。选修《编译系统设计实践》和理论课《编译方法》的老师要一致；');
INSERT INTO `cb_tc_com_nor201601` VALUES ('19', '2014', '计算机科学与技术', '15', ' 概率论与数理统计', '  公共必修', '3', '48', '', '', '', '', '');
INSERT INTO `cb_tc_com_nor201601` VALUES ('20', '2014', '计算机科学与技术', '15', ' 计算方法', '  学科必修', '2', '32', '', '', '1-9；；；；', '王秀；陈欢；白清源；', '；；；；');
INSERT INTO `cb_tc_com_nor201601` VALUES ('21', '2014', '计算机科学与技术', '15', ' 计算机图形学', '  专业方向（限选）3', '2', '32', '', '', '1-8；', '谢伙生；', '与计算机导论课排在同一个上午，教室同一间。；');
INSERT INTO `cb_tc_com_nor201601` VALUES ('22', '2014', '计算机科学与技术', '15', ' 计算机图形学综合实验', '  实践选修', '1.5', '36', '', '', '3-11；', '谢伙生；', '；');
INSERT INTO `cb_tc_com_nor201601` VALUES ('23', '2014', '计算机科学与技术', '15', ' 计算机网络体系结构', '  专业方向（限选）1', '2', '32', '', '', '1-8；', '郑相涵；', '；');
INSERT INTO `cb_tc_com_nor201601` VALUES ('24', '2014', '计算机科学与技术', '15', ' 计算机系统结构', '  学科必修', '3', '48', '', '', '1-18；', '林嘉雯；尚艳艳；', '尽可能安排在上午3、4节或者下午1、2节；课程不安排在12节；');
INSERT INTO `cb_tc_com_nor201601` VALUES ('25', '2014', '计算机科学与技术', '15', ' 宽带网及宽带接入技术', '  专业选修', '2', '32', '', '', '；', '孙及园；', '请安排在11～18周的下午；');
INSERT INTO `cb_tc_com_nor201601` VALUES ('26', '2014', '计算机科学与技术', '15', ' 面向对象设计方法(UML)', '  专业方向（限选）2', '2', '32', '', '', '；', '吴小竹；', '；');
INSERT INTO `cb_tc_com_nor201601` VALUES ('27', '2014', '计算机科学与技术', '15', ' 人工智能', '  专业必修（限选）', '2', '32', '', '', '第一周；；；', '陈昭炯；林世平；', '不排在上午1-2节；；；');
INSERT INTO `cb_tc_com_nor201601` VALUES ('28', '2014', '计算机科学与技术', '15', ' 软件工程A', '  专业必修（限选）', '3', '48', '', '', '；1-18；；', '张栋；汪璟玢；柯逍；', '；不要安排7,8节；；');
INSERT INTO `cb_tc_com_nor201601` VALUES ('29', '2014', '计算机科学与技术', '15', ' 软件工程实践', '  实践选修', '2', '48', '', '', '；3-18；；', '张栋；汪璟玢；柯逍；', '；4节连上；；');
INSERT INTO `cb_tc_com_nor201601` VALUES ('30', '2014', '计算机科学与技术', '15', ' 软件体系结构', '  专业方向（限选）2', '2', '32', '', '', '', '丁善镜；', '');
INSERT INTO `cb_tc_com_nor201601` VALUES ('31', '2014', '计算机科学与技术', '15', ' 数据挖掘技术', '  专业方向（限选）3', '2', '32', '', '', '；；', '白清源；苏雅茹；', '；；');
INSERT INTO `cb_tc_com_nor201601` VALUES ('32', '2014', '计算机科学与技术', '15', ' 网络管理实验', '  实践选修', '1', '24', '', '', '5-7周星期日1-8节；5-7周星期日1-8节；', '郭洪；林常俊；', '网络实验室401；网络实验室404；');
INSERT INTO `cb_tc_com_nor201601` VALUES ('33', '2014', '计算机科学与技术', '15', ' 现代计算机接口技术', '  专业必修（限选）', '2', '32', '', '', '1至8周；第1-8周；', '倪一涛；苏力；', '；周2，周4。麻烦和实验班的《汇编与接口技术》连排，最好3，4节连排5,6节；');
INSERT INTO `cb_tc_com_nor201601` VALUES ('34', '2014', '计算机科学与技术', '15', ' 现代计算机接口技术实践', '  实践选修', '1.5', '36', '', '', '4至12周；低3-18周；', '倪一涛；苏力；', '请安排周末；实验课和理论课选相同老师，实验课尽量要选，否则可能影响理论课的学习和考试；');
INSERT INTO `cb_tc_com_nor201601` VALUES ('35', '2014', '计算机科学与技术', '15', ' 现代搜索引擎技术及应用', '  专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `cb_tc_com_nor201601` VALUES ('36', '2015', '计算机类', '216', ' IEEE Micromouse 原理与实践A（企业开课）', '  专业选修', '2', '32', '16', '', '；', '张浩；', '01-06周 星期4:9-10节 理论课 01-07周 星期4:7-8节 实验课；');
INSERT INTO `cb_tc_com_nor201601` VALUES ('37', '2015', '计算机类', '216', ' 离散数学A', '  学科必修', '4.5', '72', '', '', '1-16；；1-18；', '陈勃；王一蕾；孙岚；', '；；请尽量不要排1、2节课；');
INSERT INTO `cb_tc_com_nor201601` VALUES ('38', '2015', '计算机类', '216', ' 数字电路与逻辑设计', '  学科必修', '3', '48', '', '', '1-12；1~12；', '胡颖；董晨；', '周一3、4节周三7、8节；如果可以，请安排在周1的3、4节和周3的7、8节；');
INSERT INTO `cb_tc_com_nor201601` VALUES ('39', '2015', '计算机类', '216', ' 数字逻辑电路设计', '  实践选修', '2', '48', '', '', '6-17；6~期末；', '胡颖；董晨；', '周六1-8；董晨老师班请安排在周一下午或周五下午，与胡颖老师和郭龙坤老师不能同时，因为共用一个实验室；');
INSERT INTO `cb_tc_com_nor201601` VALUES ('40', '2015', '计算机类', '216', ' 算法与数据结构', '  学科必修', '5', '80', '', '28', '；1-13；1-14；', '傅仰耿；余春艳；', '（傅仰耿、王晓东），不排周一周五，上机排在第一次授课之后；；');
INSERT INTO `cb_tc_com_nor201601` VALUES ('41', '2016', '计算机类', '1', ' 高级语言程序设计', '  学科必修', '4', '64', '', '32', '；1-16；；', '孙岚；王秀；林秋月；', '；；；');
INSERT INTO `cb_tc_com_nor201601` VALUES ('42', '2016', '计算机类', '1', ' 计算机导论', '  学科必修', '1.5', '24', '', '', '3-10；3-10；；', '陈勃；谢伙生；', '；与计算机图形学课排在同一个上午，教室同一间。；；');
INSERT INTO `cb_tc_com_nor201601` VALUES ('43', '2016', '计算机类', '1', ' 认识实习（计算机基础训练）', '  实践环节', '1', '24', '', '', '10-15；11-16；', '陈勃；谢伙生；', '；；');

-- ----------------------------
-- Table structure for cb_tc_com_ope201601
-- ----------------------------
DROP TABLE IF EXISTS `cb_tc_com_ope201601`;
CREATE TABLE `cb_tc_com_ope201601` (
  `insertTime` int(10) NOT NULL AUTO_INCREMENT,
  `grade` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `major` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `people` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `courseName` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `courseType` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `courseCredit` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `courseHour` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `practiceHour` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `onMachineHour` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `timePeriod` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `teacherName` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `remark` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`grade`,`major`,`people`,`courseName`,`courseType`,`courseCredit`,`courseHour`,`practiceHour`,`onMachineHour`,`timePeriod`,`teacherName`,`remark`),
  KEY `insertTime` (`insertTime`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of cb_tc_com_ope201601
-- ----------------------------
INSERT INTO `cb_tc_com_ope201601` VALUES ('1', '2016学年上学期计算机科学与技术（实验班）开课计划书', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `cb_tc_com_ope201601` VALUES ('2', '年级', '专业', '专业人数', '课程名称', '选修类型', '学分', '学时', '实验', '上机', '起讫周序', '任课教师', '备注');
INSERT INTO `cb_tc_com_ope201601` VALUES ('3', '', '', '', '', '', '', '', '学时', '学时', '', '', '');
INSERT INTO `cb_tc_com_ope201601` VALUES ('4', '2013', '计算机科学与技术（实验班）', '60', ' GPU高性能计算', '  专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `cb_tc_com_ope201601` VALUES ('5', '2013', '计算机科学与技术（实验班）', '60', ' Internet技术与协议分析实验', '  实践选修', '1', '24', '', '', '', ' 张浩; 蔣启强;何萧玲', '合班上');
INSERT INTO `cb_tc_com_ope201601` VALUES ('6', '2013', '计算机科学与技术（实验班）', '60', ' IT企业项目实训', '  实践选修', '2', '48', '', '', '', '', '');
INSERT INTO `cb_tc_com_ope201601` VALUES ('7', '2013', '计算机科学与技术（实验班）', '60', ' 多媒体通信技术', '  专业选修', '2', '32', '', '', '；', '孙及园；', '请安排在2～9周的下午；');
INSERT INTO `cb_tc_com_ope201601` VALUES ('8', '2013', '计算机科学与技术（实验班）', '60', ' 分布式操作系统', '  专业选修', '2', '32', '', '', '1-16；', '丁善镜；', '第5，6节；');
INSERT INTO `cb_tc_com_ope201601` VALUES ('9', '2013', '计算机科学与技术（实验班）', '60', ' 广域网技术实验', '  实践选修', '1', '24', '', '', '；', '蒋启强；', '；');
INSERT INTO `cb_tc_com_ope201601` VALUES ('10', '2013', '计算机科学与技术（实验班）', '60', ' 互联网产品设计', '  专业选修', '2.5', '40', '', '', '；', '林秋月；', '企业开课；');
INSERT INTO `cb_tc_com_ope201601` VALUES ('11', '2013', '计算机科学与技术（实验班）', '60', ' 计算机动画', '  专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `cb_tc_com_ope201601` VALUES ('12', '2013', '计算机科学与技术（实验班）', '60', ' 计算机动画课程设计', '  实践选修', '1', '24', '', '', '', '', '');
INSERT INTO `cb_tc_com_ope201601` VALUES ('13', '2013', '计算机科学与技术（实验班）', '60', ' 计算机仿真技术', '  专业选修', '2', '32', '12', '', '', '', '');
INSERT INTO `cb_tc_com_ope201601` VALUES ('14', '2013', '计算机科学与技术（实验班）', '60', ' 计算机辅助设计', '  专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `cb_tc_com_ope201601` VALUES ('15', '2013', '计算机科学与技术（实验班）', '60', ' 计算机外部设备', '  专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `cb_tc_com_ope201601` VALUES ('16', '2013', '计算机科学与技术（实验班）', '60', ' 近世代数', '  专业选修', '3', '48', '', '', '', '', '');
INSERT INTO `cb_tc_com_ope201601` VALUES ('17', '2013', '计算机科学与技术（实验班）', '60', ' 软件可靠性', '  专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `cb_tc_com_ope201601` VALUES ('18', '2013', '计算机科学与技术（实验班）', '60', ' 数学物理方程', '  专业选修', '3', '48', '', '', '', '', '');
INSERT INTO `cb_tc_com_ope201601` VALUES ('19', '2013', '计算机科学与技术（实验班）', '60', ' 算法设计', '  专业必修（限选）', '2', '32', '', '', '1-8；', '傅仰耿；', '不安排周一和周五；');
INSERT INTO `cb_tc_com_ope201601` VALUES ('20', '2013', '计算机科学与技术（实验班）', '60', ' 移动编程实践', '  实践选修', '1', '24', '', '', '', '', '');
INSERT INTO `cb_tc_com_ope201601` VALUES ('21', '2013', '计算机科学与技术（实验班）', '60', ' 运筹学', '  专业选修', '2', '32', '', '', '；', '林秋月；', '；');
INSERT INTO `cb_tc_com_ope201601` VALUES ('22', '2014', '计算机科学与技术（实验班）', '73', ' Linux操作系统设计实践', '  实践环节', '1.5', '36', '', '', '；；', '程烨；郭红；', '周4学时连上,机房上课。程烨一个班，郭红一个班，两个班安排同一时间段上课，每班限选人数60人。；周4学时连上,机房上课。程烨一个班，郭红一个班，两个班安排同一时间段上课，每班限选人数60人。；');
INSERT INTO `cb_tc_com_ope201601` VALUES ('23', '2014', '计算机科学与技术（实验班）', '73', ' 编译方法', '  学科必修', '3', '48', '', '', '；1-12；1-12；', '何振峰；刘秉瀚；陈晖；', '理论课与实践课选同一老师；（刘秉瀚、陈晖）合作上1个班，希望安排在下午的5，6节。；（刘秉瀚、陈晖）合作上1个班，希望安排在上午3，4节或下午的5，6节。；');
INSERT INTO `cb_tc_com_ope201601` VALUES ('24', '2014', '计算机科学与技术（实验班）', '73', ' 编译系统设计实践', '  实践环节', '1.5', '36', '', '', '；4-12；第4周开始；', '何振峰；刘秉瀚；陈晖；', '理论课与实践课选同一老师；分成2个班，要求与《编译方法》同一学期上，滞后3周，每周4节，安排周六。选修《编译系统设计实践》和理论课《编译方法》的老师要一致；刘秉瀚、陈晖，分成2个班，要求与《编译方法》同一学期上，滞后3周，每周4节，安排周六。选修《编译系统设计实践》和理论课《编译方法》的老师要一致；');
INSERT INTO `cb_tc_com_ope201601` VALUES ('25', '2014', '计算机科学与技术（实验班）', '73', ' 复变函数', '  专业选修', '3', '48', '', '', '', '', '');
INSERT INTO `cb_tc_com_ope201601` VALUES ('26', '2014', '计算机科学与技术（实验班）', '73', ' 概率论与数理统计', '  公共必修', '4', '64', '', '', '', '', '');
INSERT INTO `cb_tc_com_ope201601` VALUES ('27', '2014', '计算机科学与技术（实验班）', '73', ' 汇编与接口技术', '  学科必修', '3', '48', '', '24', '第3-8周；', '苏力；', '周2，周4。麻烦和普通班班的《现代计算机接口技术》连排，最好3，4节连排5,6节，实验课连排4节；');
INSERT INTO `cb_tc_com_ope201601` VALUES ('28', '2014', '计算机科学与技术（实验班）', '73', ' 计算方法', '  学科必修', '2', '32', '', '', '；；', '白清源；', '；；');
INSERT INTO `cb_tc_com_ope201601` VALUES ('29', '2014', '计算机科学与技术（实验班）', '73', ' 计算机图形学', '  专业选修', '2', '32', '', '', '1-8；', '谢伙生；', '与计算机导论课排在同一个上午，教室同一间。；');
INSERT INTO `cb_tc_com_ope201601` VALUES ('30', '2014', '计算机科学与技术（实验班）', '73', ' 计算机图形学综合实验', '  实践选修', '1.5', '36', '', '', '3-11；', '谢伙生；', '；');
INSERT INTO `cb_tc_com_ope201601` VALUES ('31', '2014', '计算机科学与技术（实验班）', '73', ' 计算机系统结构', '  学科必修', '3', '48', '', '', '1-18；', '林嘉雯；尚艳艳；', '尽可能安排在上午3、4节或者下午1、2节；课程不安排在12节；');
INSERT INTO `cb_tc_com_ope201601` VALUES ('32', '2014', '计算机科学与技术（实验班）', '73', ' 人工智能', '  专业必修（限选）', '2', '32', '', '', '第1周；；', '叶东毅；', '请尽量安排在上午3-4节；单独开班');
INSERT INTO `cb_tc_com_ope201601` VALUES ('33', '2014', '计算机科学与技术（实验班）', '73', ' 软件工程A', '  学科必修', '3', '48', '', '', '；1-18；；', '张栋；汪璟玢；柯逍；', '；不要安排7,8节；；');
INSERT INTO `cb_tc_com_ope201601` VALUES ('34', '2014', '计算机科学与技术（实验班）', '73', ' 软件工程实践', '  实践环节', '2', '48', '', '', '；3-18；；', '张栋；汪璟玢；柯逍；', '；4节连上；；');
INSERT INTO `cb_tc_com_ope201601` VALUES ('35', '2014', '计算机科学与技术（实验班）', '73', ' 数据挖掘技术', '  专业选修', '2', '32', '', '', '；；', '白清源；苏雅茹；', '；；');
INSERT INTO `cb_tc_com_ope201601` VALUES ('36', '2014', '计算机科学与技术（实验班）', '73', ' 数字信号处理', '  专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `cb_tc_com_ope201601` VALUES ('37', '2014', '计算机科学与技术（实验班）', '73', ' 网络管理实验', '  实践选修', '1', '24', '', '', '5-7周星期日1-8节；5-7周星期日1-8节；', '郭洪；林常俊；', '网络实验室401；网络实验室404；');
INSERT INTO `cb_tc_com_ope201601` VALUES ('38', '2014', '计算机科学与技术（实验班）', '73', ' 现代搜索引擎技术及应用', '  专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `cb_tc_com_ope201601` VALUES ('39', '2015', '计算机科学与技术（实验班）', '70', ' IEEE Micromouse 原理与实践A（企业开课）', '  专业选修', '2', '32', '16', '', '第一周；', '张浩；', '01-06周 星期4:9-10节 理论课 |||   01-07周 星期4:7-8节 实验课');
INSERT INTO `cb_tc_com_ope201601` VALUES ('40', '2015', '计算机科学与技术（实验班）', '70', ' 离散数学A', '  学科必修', '4.5', '72', '', '', '；', '陈欢；', '单独开班');
INSERT INTO `cb_tc_com_ope201601` VALUES ('41', '2015', '计算机科学与技术（实验班）', '70', ' 数字电路与逻辑设计', '  学科必修', '3', '48', '', '', '1-12；1-12；1~12周；', '胡颖；郭龙坤；董晨；', '周一3、4节周三7、8节；时间为周一与周三，与董辰合上，时间须错开。；由于龙坤在国外，前几周董晨上，后几周郭龙坤上。请尽量安排在董晨普通班同一个时间段，如：同一个上午或下午，或3、4节和5、6节。非常感谢；');
INSERT INTO `cb_tc_com_ope201601` VALUES ('42', '2015', '计算机科学与技术（实验班）', '70', ' 数字逻辑电路设计', '  实践环节', '2', '48', '', '', '6-17；6-18；', '胡颖；郭龙坤；', '周六1-8；；');
INSERT INTO `cb_tc_com_ope201601` VALUES ('43', '2015', '计算机科学与技术（实验班）', '70', ' 算法与数据结构', '  学科必修', '5', '80', '', '28', '1-15；', '吴英杰；', '独立开班，因有多个周末需带学生外出比赛，烦请尽量排在周二至周四，谢谢！；');
INSERT INTO `cb_tc_com_ope201601` VALUES ('44', '2016', '计算机科学与技术（实验班）', '1', ' 高级语言程序设计', '  学科必修', '4', '64', '', '32', '；；；', '刘文犀；', '单独开班');
INSERT INTO `cb_tc_com_ope201601` VALUES ('45', '2016', '计算机科学与技术（实验班）', '1', ' 计算机导论', '  学科必修', '1.5', '24', '', '', '；；', '林世平；', '单独开班');
INSERT INTO `cb_tc_com_ope201601` VALUES ('46', '2016', '计算机科学与技术（实验班）', '1', ' 认识实习（计算机基础训练）', '  实践环节', '1', '24', '', '', '；', '林世平；', '单独开班');

-- ----------------------------
-- Table structure for cb_tc_infcom_ope201601
-- ----------------------------
DROP TABLE IF EXISTS `cb_tc_infcom_ope201601`;
CREATE TABLE `cb_tc_infcom_ope201601` (
  `insertTime` int(10) NOT NULL AUTO_INCREMENT,
  `grade` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `major` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `people` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `courseName` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `courseType` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `courseCredit` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `courseHour` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `practiceHour` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `onMachineHour` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `timePeriod` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `teacherName` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `remark` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`grade`,`major`,`people`,`courseName`,`courseType`,`courseCredit`,`courseHour`,`practiceHour`,`onMachineHour`,`timePeriod`,`teacherName`,`remark`),
  KEY `insertTime` (`insertTime`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of cb_tc_infcom_ope201601
-- ----------------------------
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('1', '2016学年上学期数学类（实验班）开课计划书', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('2', '年级', '专业', '专业人数', '课程名称', '选修类型', '学分', '学时', '实验', '上机', '起讫周序', '任课教师', '备注');
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('3', '', '', '', '', '', '', '', '学时', '学时', '', '', '');
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('4', '2013', '数学与应用数学（实验班）', '23', ' C++程序设计实训', '  实践选修', '2', '48', '', '', '', '黄建军', '');
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('5', '2013', '数学与应用数学（实验班）', '23', ' Java程序设计', '  实践选修', '1', '24', '', '', '', '蒋秀凤', '');
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('6', '2013', '数学与应用数学（实验班）', '23', ' 高等代数选讲', '  专业必修（限选）', '3', '48', '', '', '', '叶丛峰', '');
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('7', '2013', '数学与应用数学（实验班）', '23', ' 计算机密码学', '  专业选修', '3', '48', '', '16', '', '林华', '');
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('8', '2013', '数学与应用数学（实验班）', '23', ' 计算机图形学', '  专业选修', '3', '48', '', '', '', '', '');
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('9', '2013', '数学与应用数学（实验班）', '23', ' 数据库应用实训', '  实践选修', '2', '48', '', '', '', '张华娣', '');
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('10', '2013', '数学与应用数学（实验班）', '23', ' 数学分析选讲', '  专业必修（限选）', '3', '48', '', '', '', '苏延辉', '');
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('11', '2013', '数学与应用数学（实验班）', '23', ' 算法设计实训', '  实践选修', '2', '48', '', '', '', '', '');
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('12', '2013', '数学与应用数学（实验班）', '23', ' 随机分析', '  专业选修', '3', '48', '', '', '', '张文钊', '普通班、实验班合上');
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('13', '2013', '数学与应用数学（实验班）', '23', ' 信息系统实训', '  实践选修', '2', '48', '', '', '', '', '');
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('14', '2013', '数学与应用数学（实验班）', '23', ' 专业实习', '  实践环节', '3', '', '', '', '', '林华', '');
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('15', '2013', '数学与应用数学（实验班）', '23', ' 组合图论', '  专业必修（限选）', '3', '48', '', '', '', '侯建锋', '');
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('16', '2013', '信息与计算科学（实验班）', '9', ' C++程序设计实训', '  实践选修', '2', '48', '', '', '', '黄建军', '');
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('17', '2013', '信息与计算科学（实验班）', '9', ' Java程序设计', '  实践选修', '1', '24', '', '', '', '蒋秀凤', '');
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('18', '2013', '信息与计算科学（实验班）', '9', ' 高等代数选讲', '  专业必修（限选）', '3', '48', '', '', '', '', '');
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('19', '2013', '信息与计算科学（实验班）', '9', ' 计算机密码学', '  专业选修', '3', '48', '', '16', '', '', '');
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('20', '2013', '信息与计算科学（实验班）', '9', ' 计算机图形学', '  专业选修', '3', '48', '', '', '', '', '');
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('21', '2013', '信息与计算科学（实验班）', '9', ' 数据库应用实训', '  实践选修', '2', '48', '', '', '', '张华娣', '');
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('22', '2013', '信息与计算科学（实验班）', '9', ' 数学分析选讲', '  专业必修（限选）', '3', '48', '', '', '', '苏延辉', '');
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('23', '2013', '信息与计算科学（实验班）', '9', ' 算法设计实训', '  实践选修', '2', '48', '', '', '', '', '');
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('24', '2013', '信息与计算科学（实验班）', '9', ' 随机分析', '  专业选修', '3', '48', '', '', '', '张文钊', '普通班、实验班合上');
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('25', '2013', '信息与计算科学（实验班）', '9', ' 信息系统实训', '  实践选修', '2', '48', '', '', '', '', '');
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('26', '2013', '信息与计算科学（实验班）', '9', ' 专业实习', '  实践环节', '3', '', '', '', '', '林华', '');
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('27', '2013', '信息与计算科学（实验班）', '9', ' 组合图论', '  专业必修（限选）', '3', '48', '', '', '', '侯建锋', '');
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('28', '2014', '数学与应用数学（实验班）', '21', ' 创新设计或课程设计', '  实践选修', '3', '72', '', '', '', '何建农', '');
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('29', '2014', '数学与应用数学（实验班）', '21', ' 泛函分析', '  专业必修（限选）', '3', '48', '', '', '', '林丽琼', '独立开班');
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('30', '2014', '数学与应用数学（实验班）', '21', ' 分布计算', '  专业选修', '3', '48', '', '8', '', '蒋秀凤', '');
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('31', '2014', '数学与应用数学（实验班）', '21', ' 复变函数', '  学科必修', '3', '48', '', '', '', '舒志彪', '');
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('32', '2014', '数学与应用数学（实验班）', '21', ' 计算机网络', '  专业选修', '3', '48', '', '16', '', '单红', '');
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('33', '2014', '数学与应用数学（实验班）', '21', ' 金融分析', '  专业选修', '3', '48', '', '', '', '王晶海', '普通班、实验班合上');
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('34', '2014', '数学与应用数学（实验班）', '21', ' 近世代数', '  学科必修', '3', '48', '', '', '', '刘月', '普通班、实验班合上');
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('35', '2014', '数学与应用数学（实验班）', '21', ' 面向对象程序设计B', '  专业选修', '3', '48', '', '16', '', '黄建军', '');
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('36', '2014', '数学与应用数学（实验班）', '21', ' 数据挖掘', '  专业选修', '3', '48', '', '8', '；', '林锦', '；');
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('37', '2014', '数学与应用数学（实验班）', '21', ' 数理统计', '  学科必修', '3', '48', '', '', '', '梁飞豹', '');
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('38', '2014', '数学与应用数学（实验班）', '21', ' 数学物理方程', '  专业必修（限选）', '3', '48', '', '', '', '江飞', '');
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('39', '2014', '数学与应用数学（实验班）', '21', ' 数字信号处理', '  专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('40', '2014', '数学与应用数学（实验班）', '21', ' 拓扑学基础', '  学科必修', '3', '48', '', '', '', '江辉有', '');
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('41', '2014', '数学与应用数学（实验班）', '21', ' 专家系列讲座', '  专业必修（限选）', '1', '16', '', '', '', '', '');
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('42', '2014', '信息与计算科学（实验班）', '9', ' 创新设计或课程设计', '  实践选修', '3', '72', '', '', '', '何建农', '');
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('43', '2014', '信息与计算科学（实验班）', '9', ' 泛函分析', '  专业必修（限选）', '3', '48', '', '', '', '林丽琼', '独立开班');
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('44', '2014', '信息与计算科学（实验班）', '9', ' 分布计算', '  专业选修', '3', '48', '', '8', '', '蒋秀凤', '');
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('45', '2014', '信息与计算科学（实验班）', '9', ' 复变函数', '  学科必修', '3', '48', '', '', '', '舒志彪', '');
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('46', '2014', '信息与计算科学（实验班）', '9', ' 计算机网络', '  专业选修', '3', '48', '', '16', '', '单红', '');
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('47', '2014', '信息与计算科学（实验班）', '9', ' 金融分析', '  专业选修', '3', '48', '', '', '', '王晶海', '普通班、实验班合上');
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('48', '2014', '信息与计算科学（实验班）', '9', ' 近世代数', '  学科必修', '3', '48', '', '', '', '刘月', '普通班、实验班合上');
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('49', '2014', '信息与计算科学（实验班）', '9', ' 面向对象程序设计B', '  专业选修', '3', '48', '', '16', '', '黄建军', '');
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('50', '2014', '信息与计算科学（实验班）', '9', ' 数据挖掘', '  专业选修', '3', '48', '', '8', '；', '林锦', '；');
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('51', '2014', '信息与计算科学（实验班）', '9', ' 数理统计', '  学科必修', '3', '48', '', '', '', '梁飞豹', '');
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('52', '2014', '信息与计算科学（实验班）', '9', ' 数学物理方程', '  专业必修（限选）', '3', '48', '', '', '', '江飞', '');
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('53', '2014', '信息与计算科学（实验班）', '9', ' 数字信号处理', '  专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('54', '2014', '信息与计算科学（实验班）', '9', ' 拓扑学基础', '  学科必修', '3', '48', '', '', '', '江辉有', '');
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('55', '2014', '信息与计算科学（实验班）', '9', ' 专家系列讲座', '  专业必修（限选）', '1', '16', '', '', '', '', '');
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('56', '2015', '数学类（实验班）', '29', ' Web设计软件应用实训', '  实践环节', '2', '48', '', '', '', '李剑敏', '');
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('57', '2015', '数学类（实验班）', '29', ' 常微分方程', '  学科必修', '3', '48', '', '', '', '张惠英', '');
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('58', '2015', '数学类（实验班）', '29', ' 数据结构', '  学科必修', '3.5', '56', '', '16', '', '陈晓云', '');
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('59', '2015', '数学类（实验班）', '29', ' 数据库原理及应用', '  专业选修', '3', '48', '', '16', '', '史正平', '理论与上机都排在周一');
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('60', '2015', '数学类（实验班）', '29', ' 数理逻辑', '  学科必修', '2', '32', '', '', '', '赖降周', '10月份开始上课');
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('61', '2015', '数学类（实验班）', '29', ' 数学分析（下）', '  学科必修', '6', '96', '', '', '', '陈晓星', '');
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('62', '2016', '数学类（实验班）', '1', ' 高等代数（上）', '  学科必修', '3.5', '56', '', '', '', '常安', '');
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('63', '2016', '数学类（实验班）', '1', ' 解析几何', '  学科必修', '2.5', '40', '', '', '', '谭宜家', '普通班、实验班合上');
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('64', '2016', '数学类（实验班）', '1', ' 数学分析（上）', '  学科必修', '5', '80', '', '', '', '沈明', '');
INSERT INTO `cb_tc_infcom_ope201601` VALUES ('65', '2016', '数学类（实验班）', '1', ' 数学学科导论（数学史）', '  学科必修', '1', '16', '', '', '', '谭宜家', '每周2节');

-- ----------------------------
-- Table structure for cb_tc_inf_sec201601
-- ----------------------------
DROP TABLE IF EXISTS `cb_tc_inf_sec201601`;
CREATE TABLE `cb_tc_inf_sec201601` (
  `insertTime` int(10) NOT NULL AUTO_INCREMENT,
  `grade` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `major` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `people` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `courseName` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `courseType` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `courseCredit` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `courseHour` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `practiceHour` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `onMachineHour` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `timePeriod` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `teacherName` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `remark` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`grade`,`major`,`people`,`courseName`,`courseType`,`courseCredit`,`courseHour`,`practiceHour`,`onMachineHour`,`timePeriod`,`teacherName`,`remark`),
  KEY `insertTime` (`insertTime`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of cb_tc_inf_sec201601
-- ----------------------------
INSERT INTO `cb_tc_inf_sec201601` VALUES ('1', '2016学年上学期信息安全专业开课计划书', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `cb_tc_inf_sec201601` VALUES ('2', '年级', '专业', '专业人数', '课程名称', '选修类型', '学分', '学时', '实验', '上机', '起讫周序', '任课教师', '备注');
INSERT INTO `cb_tc_inf_sec201601` VALUES ('3', '', '', '', '', '', '', '', '学时', '学时', '', '', '');
INSERT INTO `cb_tc_inf_sec201601` VALUES ('4', '2013', '信息安全', '37', ' Internet技术与协议分析实验', '  实践选修', '1', '24', '', '', '；', '蒋启强；', '(何萧玲、张浩合上)；');
INSERT INTO `cb_tc_inf_sec201601` VALUES ('5', '2013', '信息安全', '37', ' IT企业项目实训', '  实践选修', '2', '48', '', '', '；', '孙及园；', '；');
INSERT INTO `cb_tc_inf_sec201601` VALUES ('6', '2013', '信息安全', '37', ' 安全协议导论', '  专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `cb_tc_inf_sec201601` VALUES ('7', '2013', '信息安全', '37', ' 电子商务信息安全技术', '  专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `cb_tc_inf_sec201601` VALUES ('8', '2013', '信息安全', '37', ' 可信系统与可信计算', '  专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `cb_tc_inf_sec201601` VALUES ('9', '2013', '信息安全', '37', ' 信息安全科技实训 2', '  实践环节', '1', '24', '', '', '第九周；；', '张浩；倪一涛；', '每次四节课，张浩、李应、倪一涛、邹剑、何萧玲共同承担；；');
INSERT INTO `cb_tc_inf_sec201601` VALUES ('10', '2014', '信息安全', '39', ' Java语言程序设计', '  实践选修', '1.5', '36', '', '', '', '', '');
INSERT INTO `cb_tc_inf_sec201601` VALUES ('11', '2014', '信息安全', '39', ' Linux操作系统设计实践', '  实践选修', '1.5', '36', '', '', '；；', '程烨；郭红；', '周4学时连上,机房上课。程烨一个班，郭红一个班，两个班安排同一时间段上课，每班限选人数60人。；周4学时连上,机房上课。程烨一个班，郭红一个班，两个班安排同一时间段上课，每班限选人数60人。；');
INSERT INTO `cb_tc_inf_sec201601` VALUES ('12', '2014', '信息安全', '39', ' 编译方法', '  学科必修', '3', '48', '', '', '；1-12；1-12；', '何振峰；刘秉瀚；陈晖；', '理论课与实践课选同一老师；（刘秉瀚、陈晖）合作上1个班，希望安排在下午的5，6节。；（刘秉瀚、陈晖）合作上1个班，希望安排在上午3，4节或下午的5，6节。；');
INSERT INTO `cb_tc_inf_sec201601` VALUES ('13', '2014', '信息安全', '39', ' 编译系统设计实践', '  实践选修', '1.5', '', '', '', '；4-12；第4周开始；', '何振峰；刘秉瀚；陈晖；', '理论课与实践课选同一老师；分成2个班，要求与《编译方法》同一学期上，滞后3周，每周4节，安排周六。选修《编译系统设计实践》和理论课《编译方法》的老师要一致；刘秉瀚、陈晖，分成2个班，要求与《编译方法》同一学期上，滞后3周，每周4节，安排周六。选修《编译系统设计实践》和理论课《编译方法》的老师要一致；');
INSERT INTO `cb_tc_inf_sec201601` VALUES ('14', '2014', '信息安全', '39', ' 操作系统与数据库安全', '  专业选修', '2', '32', '', '', '', '刘延华；', '请不要安排在1-2节和7-8节，谢谢！；');
INSERT INTO `cb_tc_inf_sec201601` VALUES ('15', '2014', '信息安全', '39', ' 概率论与数理统计', '  公共必修', '3', '48', '', '', '', '', '');
INSERT INTO `cb_tc_inf_sec201601` VALUES ('16', '2014', '信息安全', '39', ' 计算机病毒概论', '  专业必修（限选）', '2', '32', '', '', '1至8周；', '倪一涛；', '请安排在院实验室上课；');
INSERT INTO `cb_tc_inf_sec201601` VALUES ('17', '2014', '信息安全', '39', ' 人工智能', '  专业选修', '2', '32', '', '', '第一周；；', '陈昭炯；林世平；', '不排在上午1-2节；；');
INSERT INTO `cb_tc_inf_sec201601` VALUES ('18', '2014', '信息安全', '39', ' 数据挖掘技术', '  专业选修', '2', '32', '', '', '；', '白清源；', '；');
INSERT INTO `cb_tc_inf_sec201601` VALUES ('19', '2014', '信息安全', '39', ' 通信原理', '  专业必修（限选）', '3', '48', '', '', '1-16周；', '陈开志；', '安排下午上课，5-8节之间都可以；');
INSERT INTO `cb_tc_inf_sec201601` VALUES ('20', '2014', '信息安全', '39', ' 网络程序设计', '  专业必修（限选）', '2.5', '40', '', '', '第一周；', '张浩；', '和去年一样星期2,5:3-4节; 尽量安排在上午3、4节课；');
INSERT INTO `cb_tc_inf_sec201601` VALUES ('21', '2014', '信息安全', '39', ' 网络程序设计实践', '  实践环节', '1', '24', '', '', '第四周；', '张浩；', '和去年一样星期2：5-8节；');
INSERT INTO `cb_tc_inf_sec201601` VALUES ('22', '2014', '信息安全', '39', ' 网络攻防实验', '  实践环节', '1.5', '36', '', '', '15-19周；', '何萧玲；', '请安排每周一次，每次8学时，请安排在周六，谢谢；');
INSERT INTO `cb_tc_inf_sec201601` VALUES ('23', '2014', '信息安全', '39', ' 网络信息对抗与安全', '  专业必修（限选）', '3', '48', '8', '', '12-19周；', '何萧玲；', '请12-17周每周2次课，每次3学时（可否安排在晚上？不行请安排下午，谢谢），第18周，每周两次，每次2学时，19周上机，每周两次，每次4学时。（钟尚平老师合班上课）；');
INSERT INTO `cb_tc_inf_sec201601` VALUES ('24', '2014', '信息安全', '39', ' 现代搜索引擎技术及应用', '  专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `cb_tc_inf_sec201601` VALUES ('25', '2014', '信息安全', '39', ' 信息论与编码', '  学科必修', '2', '32', '', '', '；', '孙及园；', '请安排在1～18周的下午，每周2节课；');
INSERT INTO `cb_tc_inf_sec201601` VALUES ('26', '2015', '信息安全', '50', ' 离散数学A', '  学科必修', '4.5', '72', '', '', '1-16；；', '陈勃；王一蕾；', '；请尽量将我的课排在上午；');
INSERT INTO `cb_tc_inf_sec201601` VALUES ('27', '2015', '信息安全', '50', ' 密码理论与技术', '  专业必修（限选）', '3', '48', '', '', '1-16；', '杨旸；', '请排3-4节课，谢谢！；');
INSERT INTO `cb_tc_inf_sec201601` VALUES ('28', '2015', '信息安全', '50', ' 密码学综合设计实验', '  实践环节', '1', '24', '', '', '5-16；', '杨旸；', '4节连上！请排一个上午或一个下午；');
INSERT INTO `cb_tc_inf_sec201601` VALUES ('29', '2015', '信息安全', '50', ' 数字电路与逻辑设计', '  学科必修', '3', '48', '', '', '1-12；1~12；', '胡颖；董晨；', '周一3、4节，周三7、8节；如果可以，请安排在周1的3、4节和周3的7、8节；');
INSERT INTO `cb_tc_inf_sec201601` VALUES ('30', '2015', '信息安全', '50', ' 数字逻辑电路设计', '  实践选修', '2', '48', '', '', '6-17；6~期末；', '胡颖；董晨；', '周六1-8节；董晨老师班请安排在周一下午或周五下午，与胡颖老师和郭龙坤老师不能同时，因为共用一个实验室；');
INSERT INTO `cb_tc_inf_sec201601` VALUES ('31', '2015', '信息安全', '50', ' 算法与数据结构', '  学科必修', '5', '80', '', '28', '1-14；1-13；', '余春艳；傅仰耿；', '；（傅仰耿、王晓东），不排周一周五，上机排在第一次授课之后；');
INSERT INTO `cb_tc_inf_sec201601` VALUES ('32', '2016', '信息安全', '1', ' 高级语言程序设计', '  学科必修', '4', '64', '', '32', '；', '林秋月；', '；');
INSERT INTO `cb_tc_inf_sec201601` VALUES ('33', '2016', '信息安全', '1', ' 计算机导论', '  学科必修', '1.5', '24', '', '', '3-10；3-10；', '陈勃；谢伙生；', '；与计算机图形学课排在同一个上午，教室同一间。；');
INSERT INTO `cb_tc_inf_sec201601` VALUES ('34', '2016', '信息安全', '1', ' 认识实习（计算机基础训练）', '  实践环节', '1', '24', '', '', '10-15；11-16；', '陈勃；谢伙生；', '；；');
INSERT INTO `cb_tc_inf_sec201601` VALUES ('35', '2016', '信息安全', '1', ' 信息安全概论', '  学科必修', '1.5', '24', '', '', '', '陈明志；', '；');

-- ----------------------------
-- Table structure for cb_tc_math_nor201601
-- ----------------------------
DROP TABLE IF EXISTS `cb_tc_math_nor201601`;
CREATE TABLE `cb_tc_math_nor201601` (
  `insertTime` int(10) NOT NULL AUTO_INCREMENT,
  `grade` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `major` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `people` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `courseName` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `courseType` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `courseCredit` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `courseHour` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `practiceHour` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `onMachineHour` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `timePeriod` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `teacherName` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `remark` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`grade`,`major`,`people`,`courseName`,`courseType`,`courseCredit`,`courseHour`,`practiceHour`,`onMachineHour`,`timePeriod`,`teacherName`,`remark`),
  KEY `insertTime` (`insertTime`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of cb_tc_math_nor201601
-- ----------------------------
INSERT INTO `cb_tc_math_nor201601` VALUES ('1', '2016学年上学期数学类开课计划书', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `cb_tc_math_nor201601` VALUES ('2', '年级', '专业', '专业人数', '课程名称', '选修类型', '学分', '学时', '实验', '上机', '起讫周序', '任课教师', '备注');
INSERT INTO `cb_tc_math_nor201601` VALUES ('3', '', '', '', '', '', '', '', '学时', '学时', '', '', '');
INSERT INTO `cb_tc_math_nor201601` VALUES ('4', '2013', '数学与应用数学', '45', ' C++程序设计实训', '  实践环节', '2', '48', '', '', '', '黄建军', '');
INSERT INTO `cb_tc_math_nor201601` VALUES ('5', '2013', '数学与应用数学', '45', ' Java程序设计', '  实践选修', '1', '24', '', '24', '', '蒋秀凤', '');
INSERT INTO `cb_tc_math_nor201601` VALUES ('6', '2013', '数学与应用数学', '45', ' 高等代数选讲', '  实践选修', '2', '48', '', '', '', '叶从峰', '');
INSERT INTO `cb_tc_math_nor201601` VALUES ('7', '2013', '数学与应用数学', '45', ' 高级微观经济学', '  专业必修（限选）', '3', '48', '', '', '', '王晶海', '');
INSERT INTO `cb_tc_math_nor201601` VALUES ('8', '2013', '数学与应用数学', '45', ' 计算机密码学', '  专业选修', '3', '48', '', '16', '', '林华', '');
INSERT INTO `cb_tc_math_nor201601` VALUES ('9', '2013', '数学与应用数学', '45', ' 计算机图形学', '  专业选修', '3', '48', '', '', '', ' ', '');
INSERT INTO `cb_tc_math_nor201601` VALUES ('10', '2013', '数学与应用数学', '45', ' 金融学选讲', '  专业必修（限选）', '3', '48', '', '', '', '陈晓锋', '');
INSERT INTO `cb_tc_math_nor201601` VALUES ('11', '2013', '数学与应用数学', '45', ' 矩阵论及其应用', '  专业必修（限选）', '3', '48', '', '', '', ' ', '');
INSERT INTO `cb_tc_math_nor201601` VALUES ('12', '2013', '数学与应用数学', '45', ' 数据库应用实训', '  实践选修', '2', '48', '', '', '', '张华娣', '');
INSERT INTO `cb_tc_math_nor201601` VALUES ('13', '2013', '数学与应用数学', '45', ' 数学分析选讲', '  实践选修', '2', '48', '', '', '', '苏延辉', '');
INSERT INTO `cb_tc_math_nor201601` VALUES ('14', '2013', '数学与应用数学', '45', ' 算法设计实训', '  实践选修', '2', '48', '', '', '', '', '');
INSERT INTO `cb_tc_math_nor201601` VALUES ('15', '2013', '数学与应用数学', '45', ' 随机分析', '  专业选修', '3', '48', '', '', '', '张文钊', '普通班、实验班合上');
INSERT INTO `cb_tc_math_nor201601` VALUES ('16', '2013', '数学与应用数学', '45', ' 微分方程定性理论', '  专业必修（限选）', '3', '48', '', '', '', '', '');
INSERT INTO `cb_tc_math_nor201601` VALUES ('17', '2013', '数学与应用数学', '45', ' 微分方程稳定性理论', '  专业必修（限选）', '3', '48', '', '', '', '', '');
INSERT INTO `cb_tc_math_nor201601` VALUES ('18', '2013', '数学与应用数学', '45', ' 小波分析及其应用', '  专业必修（限选）', '3', '48', '', '', '', '', '');
INSERT INTO `cb_tc_math_nor201601` VALUES ('19', '2013', '数学与应用数学', '45', ' 信息系统实训', '  实践选修', '2', '48', '', '', '', '', '');
INSERT INTO `cb_tc_math_nor201601` VALUES ('20', '2013', '数学与应用数学', '45', ' 专业实习(数学与应用数学)', '  实践选修', '3', '', '', '', '', '', '');
INSERT INTO `cb_tc_math_nor201601` VALUES ('21', '2013', '信息与计算科学', '43', ' C++程序设计实训', '  实践环节', '2', '48', '', '', '', '黄建军', '');
INSERT INTO `cb_tc_math_nor201601` VALUES ('22', '2013', '信息与计算科学', '43', ' Java程序设计', '  实践选修', '1', '24', '', '24', '', '蒋秀凤', '');
INSERT INTO `cb_tc_math_nor201601` VALUES ('23', '2013', '信息与计算科学', '43', ' 高等代数选讲', '  实践选修', '2', '48', '', '', '', '叶丛峰', '');
INSERT INTO `cb_tc_math_nor201601` VALUES ('24', '2013', '信息与计算科学', '43', ' 计算机密码学', '  专业选修', '3', '48', '', '16', '', '林华', '');
INSERT INTO `cb_tc_math_nor201601` VALUES ('25', '2013', '信息与计算科学', '43', ' 计算机图形学', '  专业选修', '3', '48', '', '', '', '', '');
INSERT INTO `cb_tc_math_nor201601` VALUES ('26', '2013', '信息与计算科学', '43', ' 数据库应用实训', '  实践选修', '2', '48', '', '', '', '张华娣', '');
INSERT INTO `cb_tc_math_nor201601` VALUES ('27', '2013', '信息与计算科学', '43', ' 数学分析选讲', '  实践选修', '2', '48', '', '', '', '苏延辉', '');
INSERT INTO `cb_tc_math_nor201601` VALUES ('28', '2013', '信息与计算科学', '43', ' 算法设计实训', '  实践选修', '2', '48', '', '', '', '', '');
INSERT INTO `cb_tc_math_nor201601` VALUES ('29', '2013', '信息与计算科学', '43', ' 随机分析', '  专业选修', '3', '48', '', '', '', '熊贤祝', '');
INSERT INTO `cb_tc_math_nor201601` VALUES ('30', '2013', '信息与计算科学', '43', ' 统计计算和统计软件', '  专业选修', '3', '48', '', '16', '', '吕书龙', '信息专业选修，选修人数不够合在应数专业一起上');
INSERT INTO `cb_tc_math_nor201601` VALUES ('31', '2013', '信息与计算科学', '43', ' 拓扑学基础', '  专业选修', '3', '48', '', '', '', '江辉有', '');
INSERT INTO `cb_tc_math_nor201601` VALUES ('32', '2013', '信息与计算科学', '43', ' 信息系统实训', '  实践选修', '2', '48', '', '', '', '', '');
INSERT INTO `cb_tc_math_nor201601` VALUES ('33', '2013', '信息与计算科学', '43', ' 专业实习(信息与计算科学)', '  实践选修', '3', '', '', '', '', '蒋秀凤;刘蓉', '');
INSERT INTO `cb_tc_math_nor201601` VALUES ('34', '2014', '数学与应用数学', '45', ' 操作系统', '  专业选修', '3', '48', '', '16', '', '何凤英', '');
INSERT INTO `cb_tc_math_nor201601` VALUES ('35', '2014', '数学与应用数学', '45', ' 泛函分析', '  学科必修', '3', '48', '', '', '', '林丽琼', '');
INSERT INTO `cb_tc_math_nor201601` VALUES ('36', '2014', '数学与应用数学', '45', ' 复变函数', '  学科必修', '3', '48', '', '', '', '舒志彪', '');
INSERT INTO `cb_tc_math_nor201601` VALUES ('37', '2014', '数学与应用数学', '45', ' 计算机网络', '  专业选修', '3', '48', '', '16', '', '单红', '');
INSERT INTO `cb_tc_math_nor201601` VALUES ('38', '2014', '数学与应用数学', '45', ' 计算机组成原理B', '  专业选修', '2', '32', '', '8', '', '史正平', '星期二下午不排课');
INSERT INTO `cb_tc_math_nor201601` VALUES ('39', '2014', '数学与应用数学', '45', ' 金融分析', '  专业必修（限选）', '3', '48', '', '', '', '王晶海', '');
INSERT INTO `cb_tc_math_nor201601` VALUES ('40', '2014', '数学与应用数学', '45', ' 近世代数', '  专业必修（限选）', '3', '48', '', '', '', '刘月', '普通班、实验班合上');
INSERT INTO `cb_tc_math_nor201601` VALUES ('41', '2014', '数学与应用数学', '45', ' 面向对象程序设计B', '  专业选修', '3', '48', '', '16', '', '黄建军', '');
INSERT INTO `cb_tc_math_nor201601` VALUES ('42', '2014', '数学与应用数学', '45', ' 数据挖掘', '  专业必修（限选）', '3', '48', '', '8', '；', '林锦', '；');
INSERT INTO `cb_tc_math_nor201601` VALUES ('43', '2014', '数学与应用数学', '45', ' 数学物理方程', '  学科必修', '3', '48', '', '', '', '江飞', '');
INSERT INTO `cb_tc_math_nor201601` VALUES ('44', '2014', '数学与应用数学', '45', ' 数值代数', '  专业选修', '3', '48', '', '', '', '', '');
INSERT INTO `cb_tc_math_nor201601` VALUES ('45', '2014', '数学与应用数学', '45', ' 随机过程', '  专业必修（限选）', '3', '48', '', '', '', '张文钊', '与数理金融合上');
INSERT INTO `cb_tc_math_nor201601` VALUES ('46', '2014', '数学与应用数学', '45', ' 统计计算和统计软件', '  专业必修（限选）', '3', '48', '', '16', '', '吕书龙', '');
INSERT INTO `cb_tc_math_nor201601` VALUES ('47', '2014', '数学与应用数学', '45', ' 投资学', '  专业必修（限选）', '3', '48', '', '', '', '江巧洪', '');
INSERT INTO `cb_tc_math_nor201601` VALUES ('48', '2014', '数学与应用数学', '45', ' 拓扑学基础', '  专业必修（限选）', '3', '48', '', '', '', '江辉有', '');
INSERT INTO `cb_tc_math_nor201601` VALUES ('49', '2014', '数学与应用数学', '45', ' 信息科学基础', '  专业选修', '3', '48', '', '', '', '刘蓉', '');
INSERT INTO `cb_tc_math_nor201601` VALUES ('50', '2014', '数学与应用数学', '45', ' 专家系列讲座', '  专业选修', '1', '16', '', '', '', '', '');
INSERT INTO `cb_tc_math_nor201601` VALUES ('51', '2014', '信息与计算科学', '44', ' 操作系统', '  专业选修', '3', '48', '', '16', '', '何凤英', '');
INSERT INTO `cb_tc_math_nor201601` VALUES ('52', '2014', '信息与计算科学', '44', ' 泛函分析', '  学科必修', '3', '48', '', '', '', '林丽琼', '');
INSERT INTO `cb_tc_math_nor201601` VALUES ('53', '2014', '信息与计算科学', '44', ' 分布计算', '  专业必修（限选）', '3', '48', '', '8', '', '蒋秀凤', '');
INSERT INTO `cb_tc_math_nor201601` VALUES ('54', '2014', '信息与计算科学', '44', ' 复变函数', '  学科必修', '3', '48', '', '', '', '舒志彪', '');
INSERT INTO `cb_tc_math_nor201601` VALUES ('55', '2014', '信息与计算科学', '44', ' 计算机网络', '  专业选修', '3', '48', '', '16', '', '单红', '');
INSERT INTO `cb_tc_math_nor201601` VALUES ('56', '2014', '信息与计算科学', '44', ' 计算机组成原理B', '  专业选修', '2', '32', '', '8', '', '史正平', '星期二下午不排课');
INSERT INTO `cb_tc_math_nor201601` VALUES ('57', '2014', '信息与计算科学', '44', ' 近世代数', '  专业选修', '3', '48', '', '', '', '刘月', '普通班、实验班合上');
INSERT INTO `cb_tc_math_nor201601` VALUES ('58', '2014', '信息与计算科学', '44', ' 面向对象程序设计B', '  专业选修', '3', '48', '', '16', '', '黄建军', '');
INSERT INTO `cb_tc_math_nor201601` VALUES ('59', '2014', '信息与计算科学', '44', ' 数据挖掘', '  专业必修（限选）', '3', '48', '', '8', '；', '林锦', '；');
INSERT INTO `cb_tc_math_nor201601` VALUES ('60', '2014', '信息与计算科学', '44', ' 数学物理方程', '  学科必修', '3', '48', '', '', '', '江飞', '');
INSERT INTO `cb_tc_math_nor201601` VALUES ('61', '2014', '信息与计算科学', '44', ' 数值代数', '  专业选修', '3', '48', '', '', '', '', '');
INSERT INTO `cb_tc_math_nor201601` VALUES ('62', '2014', '信息与计算科学', '44', ' 信息科学基础', '  专业选修', '3', '48', '', '', '', '刘蓉', '');
INSERT INTO `cb_tc_math_nor201601` VALUES ('63', '2014', '信息与计算科学', '44', ' 专家系列讲座', '  专业选修', '1', '16', '', '', '', '', '');
INSERT INTO `cb_tc_math_nor201601` VALUES ('64', '2014', '信息与计算科学', '44', ' 组合数学', '  专业必修（限选）', '3', '48', '', '', '', '杨大庆', '');
INSERT INTO `cb_tc_math_nor201601` VALUES ('65', '2015', '数学类', '75', ' Web设计软件应用实训', '  实践环节', '2', '48', '', '', '', '李剑敏;何凤英', '星期二下午不排课，与实验班合上');
INSERT INTO `cb_tc_math_nor201601` VALUES ('66', '2015', '数学类', '75', ' 常微分方程', '  学科必修', '3', '48', '', '', '', '鲍学文', '');
INSERT INTO `cb_tc_math_nor201601` VALUES ('67', '2015', '数学类', '75', ' 数据结构', '  学科必修', '3.5', '56', '', '16', '', '陈晓云;张华娣', '陈：20（与实验班合班上）');
INSERT INTO `cb_tc_math_nor201601` VALUES ('68', '2015', '数学类', '75', ' 数理逻辑', '  学科必修', '2', '32', '', '', '', '赖降周', '10月份开始上课');
INSERT INTO `cb_tc_math_nor201601` VALUES ('69', '2015', '数学类', '75', ' 数学分析（下）', '  学科必修', '6', '96', '', '', '', '陈凤德', '');
INSERT INTO `cb_tc_math_nor201601` VALUES ('70', '2016', '数学类', '1', ' 大学信息技术基础', '  公共必修', '2', '40', '', '24', '', '', '');
INSERT INTO `cb_tc_math_nor201601` VALUES ('71', '2016', '数学类', '1', ' 高等代数（上）', '  学科必修', '3.5', '56', '', '', '', '唐丽丹', '');
INSERT INTO `cb_tc_math_nor201601` VALUES ('72', '2016', '数学类', '1', ' 解析几何', '  学科必修', '2.5', '40', '', '', '', '谭宜家', '普通班、实验班合上');
INSERT INTO `cb_tc_math_nor201601` VALUES ('73', '2016', '数学类', '1', ' 数学分析（上）', '  学科必修', '5', '80', '', '', '', '张卉', '');
INSERT INTO `cb_tc_math_nor201601` VALUES ('74', '2016', '数学类', '1', ' 数学学科导论（数学史）', '  学科必修', '1', '16', '', '', '', '谭宜家', '普通班、实验班合上');

-- ----------------------------
-- Table structure for cb_tc_net_pro201601
-- ----------------------------
DROP TABLE IF EXISTS `cb_tc_net_pro201601`;
CREATE TABLE `cb_tc_net_pro201601` (
  `insertTime` int(10) NOT NULL AUTO_INCREMENT,
  `grade` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `major` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `people` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `courseName` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `courseType` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `courseCredit` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `courseHour` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `practiceHour` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `onMachineHour` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `timePeriod` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `teacherName` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `remark` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`grade`,`major`,`people`,`courseName`,`courseType`,`courseCredit`,`courseHour`,`practiceHour`,`onMachineHour`,`timePeriod`,`teacherName`,`remark`),
  KEY `insertTime` (`insertTime`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of cb_tc_net_pro201601
-- ----------------------------
INSERT INTO `cb_tc_net_pro201601` VALUES ('1', '2016学年上学期网络工程专业开课计划书', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `cb_tc_net_pro201601` VALUES ('2', '年级', '专业', '专业人数', '课程名称', '选修类型', '学分', '学时', '实验', '上机', '起讫周序', '任课教师', '备注');
INSERT INTO `cb_tc_net_pro201601` VALUES ('3', '', '', '', '', '', '', '', '学时', '学时', '', '', '');
INSERT INTO `cb_tc_net_pro201601` VALUES ('4', '2013', '网络工程', '28', ' Internet技术与协议分析实验', '  实践选修', '1', '24', '', '', '', '张浩; 蔣启强;何萧玲', '合班');
INSERT INTO `cb_tc_net_pro201601` VALUES ('5', '2013', '网络工程', '28', ' IT企业项目实训', '  实践选修', '2', '48', '', '', '；', '孙及园；', '；');
INSERT INTO `cb_tc_net_pro201601` VALUES ('6', '2013', '网络工程', '28', ' 多媒体通信技术', '  专业选修', '2', '32', '', '', '；', '孙及园；', '请安排在2～9周的下午，每周4节课；');
INSERT INTO `cb_tc_net_pro201601` VALUES ('7', '2013', '网络工程', '28', ' 分布式操作系统', '  专业选修', '2', '32', '', '', '1-16；', '丁善镜；', '第5，6节；');
INSERT INTO `cb_tc_net_pro201601` VALUES ('8', '2013', '网络工程', '28', ' 分布式系统', '  专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `cb_tc_net_pro201601` VALUES ('9', '2013', '网络工程', '28', ' 广域网技术实验', '  实践选修', '1', '24', '', '', '；', '蒋启强；', '；');
INSERT INTO `cb_tc_net_pro201601` VALUES ('10', '2013', '网络工程', '28', ' 互联网产品设计', '  专业选修', '2.5', '40', '', '', '', ' 林秋月', '');
INSERT INTO `cb_tc_net_pro201601` VALUES ('11', '2013', '网络工程', '28', ' 软件可靠性与可信软件', '  专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `cb_tc_net_pro201601` VALUES ('12', '2013', '网络工程', '28', ' 网络设计与集成', '  专业必修（限选）', '2', '32', '', '', '；', '蒋启强；', '；');
INSERT INTO `cb_tc_net_pro201601` VALUES ('13', '2013', '网络工程', '28', ' 虚拟现实', '  专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `cb_tc_net_pro201601` VALUES ('14', '2013', '网络工程', '28', ' 云计算', '  专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `cb_tc_net_pro201601` VALUES ('15', '2014', '网络工程', '27', ' Java语言程序设计', '  实践选修', '2', '48', '', '', '1-16；', '陈嘉；', '因课时较多，希望能一周少安排一些课，多安排几周；');
INSERT INTO `cb_tc_net_pro201601` VALUES ('16', '2014', '网络工程', '27', ' Linux操作系统设计实践', '  实践选修', '1.5', '36', '', '', '；；', '程烨；郭红；', '周4学时连上,机房上课。程烨一个班，郭红一个班，两个班安排同一时间段上课，每班限选人数60人。；周4学时连上,机房上课。程烨一个班，郭红一个班，两个班安排同一时间段上课，每班限选人数60人。；');
INSERT INTO `cb_tc_net_pro201601` VALUES ('17', '2014', '网络工程', '27', ' 编译方法', '  学科必修', '3', '48', '', '', '；1-12；1--12；', '何振峰；刘秉瀚；陈晖；', '理论课与实践课选同一老师；（刘秉瀚、陈晖）合作上1个班，希望安排在下午的5，6节。；（刘秉瀚、陈晖）合作上1个班，希望安排在上午3，4节或下午的5，6节。；');
INSERT INTO `cb_tc_net_pro201601` VALUES ('18', '2014', '网络工程', '27', ' 编译系统设计实践', '  实践选修', '1.5', '36', '', '', '；4-12；第4周开始；', '何振峰；刘秉瀚；陈晖；', '理论课与实践课选同一老师；分成2个班，要求与《编译方法》同一学期上，滞后3周，每周4节，安排周六。选修《编译系统设计实践》和理论课《编译方法》的老师要一致；刘秉瀚、陈晖，分成2个班，要求与《编译方法》同一学期上，滞后3周，每周4节，安排周六。选修《编译系统设计实践》和理论课《编译方法》的老师要一致；');
INSERT INTO `cb_tc_net_pro201601` VALUES ('19', '2014', '网络工程', '27', ' 概率论与数理统计', '  公共必修', '3', '48', '', '', '', '', '');
INSERT INTO `cb_tc_net_pro201601` VALUES ('20', '2014', '网络工程', '27', ' 计算方法', '  学科必修', '2', '32', '', '', '1-9；；', '王秀；白清源；', '；；');
INSERT INTO `cb_tc_net_pro201601` VALUES ('21', '2014', '网络工程', '27', ' 计算机系统结构', '  学科必修', '3', '48', '', '', '1-18；', '林嘉雯；尚艳艳；', '尽可能安排在上午3、4节或者下午1、2节；课程不安排在12节；');
INSERT INTO `cb_tc_net_pro201601` VALUES ('22', '2014', '网络工程', '27', ' 宽带网及宽带接入技术', '  专业选修', '2', '32', '', '', '；', '孙及园；', '请安排在11～18周的下午，每周4节课；');
INSERT INTO `cb_tc_net_pro201601` VALUES ('23', '2014', '网络工程', '27', ' 人工智能', '  专业必修（限选）', '2', '32', '', '', '第一周；；', '陈昭炯；林世平；', '不排在上午1-2节；；');
INSERT INTO `cb_tc_net_pro201601` VALUES ('24', '2014', '网络工程', '27', ' 软件工程A', '  专业必修（限选）', '3', '48', '', '', '；1-18；；', '张栋；汪璟玢；柯逍；', '；不要安排7,8节；；');
INSERT INTO `cb_tc_net_pro201601` VALUES ('25', '2014', '网络工程', '27', ' 软件工程实践', '  实践选修', '2', '48', '', '', '；3-18；；', '张栋；汪璟玢；柯逍；', '；4节连上；；');
INSERT INTO `cb_tc_net_pro201601` VALUES ('26', '2014', '网络工程', '27', ' 网络管理实验', '  实践选修', '1', '24', '', '', '5-7周星期日1-8节；5-7周星期日1-8节；', '郭洪；林常俊；', '网络实验室401；网络实验室404；');
INSERT INTO `cb_tc_net_pro201601` VALUES ('27', '2014', '网络工程', '27', ' 现代计算机接口技术', '  专业必修（限选）', '2', '32', '', '', '1至8周；第1--8周；', '倪一涛；苏力；', '；周2，周4。麻烦和实验班的《汇编与接口技术》连排，最好3，4节连排5,6节；');
INSERT INTO `cb_tc_net_pro201601` VALUES ('28', '2014', '网络工程', '27', ' 现代计算机接口技术实践', '  实践选修', '1.5', '36', '', '', '4至12周；第3-18周；', '倪一涛；苏力；', '请安排周末；实验课和理论课选相同老师，实验课尽量要选，否则可能影响理论课的学习和考试；');
INSERT INTO `cb_tc_net_pro201601` VALUES ('29', '2014', '网络工程', '27', ' 现代搜索引擎技术及应用', '  专业选修', '2', '32', '', '', '', '', '');

-- ----------------------------
-- Table structure for cb_tc_soft_pro201601
-- ----------------------------
DROP TABLE IF EXISTS `cb_tc_soft_pro201601`;
CREATE TABLE `cb_tc_soft_pro201601` (
  `insertTime` int(10) NOT NULL AUTO_INCREMENT,
  `grade` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `major` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `people` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `courseName` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `courseType` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `courseCredit` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `courseHour` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `practiceHour` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `onMachineHour` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `timePeriod` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `teacherName` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `remark` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`grade`,`major`,`people`,`courseName`,`courseType`,`courseCredit`,`courseHour`,`practiceHour`,`onMachineHour`,`timePeriod`,`teacherName`,`remark`),
  KEY `insertTime` (`insertTime`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of cb_tc_soft_pro201601
-- ----------------------------
INSERT INTO `cb_tc_soft_pro201601` VALUES ('1', '2016学年上学期软件学院开课通知书', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `cb_tc_soft_pro201601` VALUES ('2', '年级', '专业', '专业人数', '课程名称', '选修类型', '学分', '学时', '实验', '上机', '起讫周序', '任课教师', '备注');
INSERT INTO `cb_tc_soft_pro201601` VALUES ('3', '', '', '', '', '', '', '', '学时', '学时', '', '', '');
INSERT INTO `cb_tc_soft_pro201601` VALUES ('4', '2013', '软件工程', '147', ' .NET Framework应用开发', '  专业选修', '2', '32', '', '8', '', '不开课', '');
INSERT INTO `cb_tc_soft_pro201601` VALUES ('5', '2013', '软件工程', '147', ' Web应用软件工程', '  专业选修', '2', '32', '', '', '', '不开课', '');
INSERT INTO `cb_tc_soft_pro201601` VALUES ('6', '2013', '软件工程', '147', ' 电子商务概论', '  专业选修', '2', '32', '', '', '；', '陈星；', '已上过两学期；');
INSERT INTO `cb_tc_soft_pro201601` VALUES ('7', '2013', '软件工程', '147', ' 数据仓库与数据挖掘', '  专业选修', '2', '32', '', '8', '1-6周 11月份出国访问，请集中排课；；', '邓新国；', '早晚送、接小孩，请不排12、78节；；');
INSERT INTO `cb_tc_soft_pro201601` VALUES ('8', '2013', '软件工程', '147', ' 专业实习', '  实践环节', '10', '', '', '', '；；；；', '统一安排(王灿辉)', '《8人，11月份出国访问，是否可以带由系里决定；8个学生；；；');
INSERT INTO `cb_tc_soft_pro201601` VALUES ('9', '2014', '软件工程', '161', ' C＃程序设计', '  专业选修', '2.5', '40', '', '8', '正常安排；', '陈嘉；', '上机课安排在理论课后，希望上机课4节连排；');
INSERT INTO `cb_tc_soft_pro201601` VALUES ('10', '2014', '软件工程', '161', ' linux操作系统与设计实践', '  专业选修', '2.5', '40', '', '8', '；', '陈家瑞；', '因接小孩，希望理论课不要排在78节；');
INSERT INTO `cb_tc_soft_pro201601` VALUES ('11', '2014', '软件工程', '161', ' Web程序设计', '  专业必修（限选）', '3', '48', '', '16', '正常安排；', '陈昱；', '请尽量不安排上午12节；');
INSERT INTO `cb_tc_soft_pro201601` VALUES ('12', '2014', '软件工程', '161', ' XML程序设计', '  专业选修', '2', '32', '', '8', '；', '吴小竹；', '；');
INSERT INTO `cb_tc_soft_pro201601` VALUES ('13', '2014', '软件工程', '161', ' 操作系统', '  学科必修', '3.5', '56', '', '8', '正常安排；', '刘延华；江兰帆；', '请不要安排在1-2节和7-8节，谢谢！；一周4节，请不安排12节；');
INSERT INTO `cb_tc_soft_pro201601` VALUES ('14', '2014', '软件工程', '161', ' 多媒体程序设计', '  专业选修', '2', '32', '', '8', '1-8；', '陈建华；', '；');
INSERT INTO `cb_tc_soft_pro201601` VALUES ('15', '2014', '软件工程', '161', ' 计算机网络实践', '  实践环节', '1.5', '', '', '', '2-12；；', '程红举；游天童；', '分成两个班，和游天童老师合上，每周一个下午4节课；分两班，每班一上午或一下午；');
INSERT INTO `cb_tc_soft_pro201601` VALUES ('16', '2014', '软件工程', '161', ' 计算机专业英语', '  专业必修（限选）', '2', '32', '', '', '；；', '於志勇；游天童；', '(游天童，於志勇)；分两班，安排在同一上午或下午，不同时段。；');
INSERT INTO `cb_tc_soft_pro201601` VALUES ('17', '2014', '软件工程', '161', ' 面向对象设计方法（UML)', '  专业必修（限选）', '3', '48', '', '8', '；；', '陈星；张舒；', '已上过两学期；实验课安排在课程最后，周五不排课；');
INSERT INTO `cb_tc_soft_pro201601` VALUES ('18', '2014', '软件工程', '161', ' 人工智能导论', '  专业选修', '2', '32', '', '8', '1-6周 11月份出国访问，请集中排课；', '邓新国；', '早晚送、接小孩，请不排12、78节；');
INSERT INTO `cb_tc_soft_pro201601` VALUES ('19', '2014', '软件工程', '161', ' 数值计算', '  学科必修', '2', '32', '', '', '从第10周开始；；；', '夏又生；陈飞；', '每周2次（每次2节）或每周1次（每次3节）；上课时间与夏又生老师一致；；');
INSERT INTO `cb_tc_soft_pro201601` VALUES ('20', '2015', '软件工程', '159', ' 计算机组成原理与汇编语言', '  学科必修', '4.5', '72', '', '12', '；；', '詹青青；姚仰光；', '；接送小孩不安排1，2节；');
INSERT INTO `cb_tc_soft_pro201601` VALUES ('21', '2015', '软件工程', '159', ' 离散数学', '  学科必修', '4', '64', '', '0', '1-16；', '陈建利；', '大班上课不分班，课程陈建利与朱文兴合上；');
INSERT INTO `cb_tc_soft_pro201601` VALUES ('22', '2015', '软件工程', '159', ' 认知实习', '  实践环节', '0.5', '', '', '', '；；；；', '统一安排(王灿辉)', '11月份出国访问，是否可以带由系里决定；8个学生；；；');
INSERT INTO `cb_tc_soft_pro201601` VALUES ('23', '2015', '软件工程', '159', ' 算法与数据结构', '  学科必修', '4', '64', '', '16', '；1-16；', '王一蕾；傅仰耿；', '请尽量将我的课排在上午；不排周一上下午及周五下午；');
INSERT INTO `cb_tc_soft_pro201601` VALUES ('24', '2016', '软件工程', '1', ' 高级语言程序设计', '  学科必修', '4', '64', '', '24', '；', '王灿辉；陈飞；', '分2个班，上课时间与王灿辉老师一致；');
INSERT INTO `cb_tc_soft_pro201601` VALUES ('25', '2016', '软件工程', '1', ' 计算机导论', '  学科必修', '2', '32', '', '0', '2-12；正常安排；', '程红举；陈昱；', '和陈昱分成两个班，每周3节；请尽量不安排上午12节；');

-- ----------------------------
-- Table structure for department_head_majors
-- ----------------------------
DROP TABLE IF EXISTS `department_head_majors`;
CREATE TABLE `department_head_majors` (
  `workNumber` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `major` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `privilege` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`workNumber`,`major`),
  KEY `work_number` (`workNumber`),
  CONSTRAINT `department_head_majors_ibfk_1` FOREIGN KEY (`workNumber`) REFERENCES `user_department_head` (`workNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of department_head_majors
-- ----------------------------
INSERT INTO `department_head_majors` VALUES ('06033', 'tc_com_exc', '0');
INSERT INTO `department_head_majors` VALUES ('06033', 'tc_com_nor', '0');
INSERT INTO `department_head_majors` VALUES ('06033', 'tc_com_ope', '0');
INSERT INTO `department_head_majors` VALUES ('06033', 'tc_inf_sec', '1');
INSERT INTO `department_head_majors` VALUES ('06033', 'tc_net_pro', '1');
INSERT INTO `department_head_majors` VALUES ('06033', 'tc_soft_pro', '0');
INSERT INTO `department_head_majors` VALUES ('06099', 'tc_infcom_ope', '1');
INSERT INTO `department_head_majors` VALUES ('06099', 'tc_math_nor', '1');
INSERT INTO `department_head_majors` VALUES ('07106', 'tc_com_exc', '0');
INSERT INTO `department_head_majors` VALUES ('07106', 'tc_com_nor', '0');
INSERT INTO `department_head_majors` VALUES ('07106', 'tc_com_ope', '0');
INSERT INTO `department_head_majors` VALUES ('07106', 'tc_inf_sec', '0');
INSERT INTO `department_head_majors` VALUES ('07106', 'tc_net_pro', '0');
INSERT INTO `department_head_majors` VALUES ('07106', 'tc_soft_pro', '1');
INSERT INTO `department_head_majors` VALUES ('09070', 'tc_infcom_ope', '1');
INSERT INTO `department_head_majors` VALUES ('09070', 'tc_math_nor', '0');
INSERT INTO `department_head_majors` VALUES ('10044', 'tc_com_exc', '1');
INSERT INTO `department_head_majors` VALUES ('10044', 'tc_com_nor', '1');
INSERT INTO `department_head_majors` VALUES ('10044', 'tc_com_ope', '1');
INSERT INTO `department_head_majors` VALUES ('10044', 'tc_inf_sec', '0');
INSERT INTO `department_head_majors` VALUES ('10044', 'tc_net_pro', '0');
INSERT INTO `department_head_majors` VALUES ('10044', 'tc_soft_pro', '0');
INSERT INTO `department_head_majors` VALUES ('11061', 'tc_com_exc', '1');
INSERT INTO `department_head_majors` VALUES ('11061', 'tc_com_nor', '1');
INSERT INTO `department_head_majors` VALUES ('11061', 'tc_com_ope', '1');
INSERT INTO `department_head_majors` VALUES ('11061', 'tc_inf_sec', '0');
INSERT INTO `department_head_majors` VALUES ('11061', 'tc_net_pro', '0');
INSERT INTO `department_head_majors` VALUES ('11061', 'tc_soft_pro', '0');
INSERT INTO `department_head_majors` VALUES ('11065', 'tc_com_exc', '0');
INSERT INTO `department_head_majors` VALUES ('11065', 'tc_com_nor', '0');
INSERT INTO `department_head_majors` VALUES ('11065', 'tc_com_ope', '0');
INSERT INTO `department_head_majors` VALUES ('11065', 'tc_inf_sec', '1');
INSERT INTO `department_head_majors` VALUES ('11065', 'tc_net_pro', '1');
INSERT INTO `department_head_majors` VALUES ('11065', 'tc_soft_pro', '0');
INSERT INTO `department_head_majors` VALUES ('12095', 'tc_com_exc', '1');
INSERT INTO `department_head_majors` VALUES ('12095', 'tc_com_nor', '1');
INSERT INTO `department_head_majors` VALUES ('12095', 'tc_com_ope', '1');
INSERT INTO `department_head_majors` VALUES ('12095', 'tc_inf_sec', '0');
INSERT INTO `department_head_majors` VALUES ('12095', 'tc_net_pro', '0');
INSERT INTO `department_head_majors` VALUES ('12095', 'tc_soft_pro', '0');
INSERT INTO `department_head_majors` VALUES ('83040', 'tc_infcom_ope', '0');
INSERT INTO `department_head_majors` VALUES ('83040', 'tc_math_nor', '1');
INSERT INTO `department_head_majors` VALUES ('89036', 'tc_infcom_ope', '1');
INSERT INTO `department_head_majors` VALUES ('89036', 'tc_math_nor', '1');
INSERT INTO `department_head_majors` VALUES ('90010', 'tc_com_exc', '0');
INSERT INTO `department_head_majors` VALUES ('90010', 'tc_com_nor', '0');
INSERT INTO `department_head_majors` VALUES ('90010', 'tc_com_ope', '0');
INSERT INTO `department_head_majors` VALUES ('90010', 'tc_inf_sec', '0');
INSERT INTO `department_head_majors` VALUES ('90010', 'tc_net_pro', '0');
INSERT INTO `department_head_majors` VALUES ('90010', 'tc_soft_pro', '1');
INSERT INTO `department_head_majors` VALUES ('92034', 'tc_infcom_ope', '1');
INSERT INTO `department_head_majors` VALUES ('92034', 'tc_math_nor', '1');

-- ----------------------------
-- Table structure for task_info
-- ----------------------------
DROP TABLE IF EXISTS `task_info`;
CREATE TABLE `task_info` (
  `relativeTable` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `year` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `semester` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `departmentDeadline` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `teacherDeadline` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `taskState` int(11) NOT NULL,
  PRIMARY KEY (`relativeTable`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of task_info
-- ----------------------------
INSERT INTO `task_info` VALUES ('tc_com_exc201601', '2016', '01', '20160420', '20160418', '1');
INSERT INTO `task_info` VALUES ('tc_com_nor201601', '2016', '01', '20160420', '20160418', '0');
INSERT INTO `task_info` VALUES ('tc_com_ope201601', '2016', '01', '20160420', '20160418', '1');
INSERT INTO `task_info` VALUES ('tc_inf_sec201601', '2016', '01', '20160420', '20160418', '1');
INSERT INTO `task_info` VALUES ('tc_infcom_ope201601', '2016', '01', '20160505', '20160418', '1');
INSERT INTO `task_info` VALUES ('tc_math_nor201601', '2016', '01', '20160505', '20160418', '1');
INSERT INTO `task_info` VALUES ('tc_net_pro201601', '2016', '01', '20160420', '20160418', '1');
INSERT INTO `task_info` VALUES ('tc_soft_pro201601', '2016', '01', '20160420', '20160418', '1');

-- ----------------------------
-- Table structure for tc_com_exc201601
-- ----------------------------
DROP TABLE IF EXISTS `tc_com_exc201601`;
CREATE TABLE `tc_com_exc201601` (
  `insertTime` int(10) NOT NULL AUTO_INCREMENT,
  `workNumber` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `grade` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `major` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `people` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `courseName` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `courseType` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `courseCredit` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `courseHour` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `practiceHour` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `onMachineHour` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `timePeriod` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `teacherName` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `remark` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`workNumber`,`grade`,`major`,`people`,`courseName`,`courseType`,`courseCredit`,`courseHour`,`practiceHour`,`onMachineHour`,`timePeriod`,`teacherName`,`remark`),
  KEY `insertTime` (`insertTime`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tc_com_exc201601
-- ----------------------------
INSERT INTO `tc_com_exc201601` VALUES ('1', '', '2016学年上学期计算机科学与技术（卓越班）开课计划书', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `tc_com_exc201601` VALUES ('2', '', '年级', '专业', '专业人数', '课程名称', '选修类型', '学分', '学时', '实验', '上机', '起讫周序', '任课教师', '备注');
INSERT INTO `tc_com_exc201601` VALUES ('3', '', '', '', '', '', '', '', '', '学时', '学时', '', '', '');
INSERT INTO `tc_com_exc201601` VALUES ('4', '', '2013', '计算机科学与技术（卓越班）', '96', ' 互联网产品设计', '  专业选修', '2.5', '40', '', '', '', '', '');
INSERT INTO `tc_com_exc201601` VALUES ('5', '', '2013', '计算机科学与技术（卓越班）', '96', ' 企业实践', '  毕业实习', '15', '', '', '', '', '', '');
INSERT INTO `tc_com_exc201601` VALUES ('5', '06033', '2013', '计算机科学与技术（卓越班）', '96', ' 企业实践', '  毕业实习', '15', '', '', '', '', '张浩', '');
INSERT INTO `tc_com_exc201601` VALUES ('6', '', '2014', '计算机科学与技术（卓越班）', '125', ' EDA技术', '  专业方向（限选）1', '2', '32', '', '16', '', '', '');
INSERT INTO `tc_com_exc201601` VALUES ('6', '03112', '2014', '计算机科学与技术（卓越班）', '125', ' EDA技术', '  专业方向（限选）1', '2', '32', '', '16', '', '赵彦敏', '');
INSERT INTO `tc_com_exc201601` VALUES ('7', '', '2014', '计算机科学与技术（卓越班）', '125', ' Linux操作系统设计实践', '  实践选修', '1.5', '36', '', '', '', '', '');
INSERT INTO `tc_com_exc201601` VALUES ('7', '03003', '2014', '计算机科学与技术（卓越班）', '125', ' Linux操作系统设计实践', '  实践选修', '1.5', '36', '', '', '', '程烨', '周4学时连上,机房上课。程烨一个班，郭红一个班，两个班安排同一时间段上课，每班限选人数60人。');
INSERT INTO `tc_com_exc201601` VALUES ('7', '89085', '2014', '计算机科学与技术（卓越班）', '125', ' Linux操作系统设计实践', '  实践选修', '1.5', '36', '', '', '', '郭红', '周4学时连上,机房上课。程烨一个班，郭红一个班，两个班安排同一时间段上课，每班限选人数60人。');
INSERT INTO `tc_com_exc201601` VALUES ('8', '', '2014', '计算机科学与技术（卓越班）', '125', ' 编译方法', '  专业必修（限选）', '3', '48', '', '', '', '', '');
INSERT INTO `tc_com_exc201601` VALUES ('8', '03154', '2014', '计算机科学与技术（卓越班）', '125', ' 编译方法', '  专业必修（限选）', '3', '48', '', '', '1--12', '陈晖', '（刘秉瀚、陈晖）刘秉瀚、陈晖合作上1个班，希望安排在下午的5，6节。');
INSERT INTO `tc_com_exc201601` VALUES ('8', '04166', '2014', '计算机科学与技术（卓越班）', '125', ' 编译方法', '  专业必修（限选）', '3', '48', '', '', '', '何振峰', '理论与实践课选同一老师');
INSERT INTO `tc_com_exc201601` VALUES ('8', '83046', '2014', '计算机科学与技术（卓越班）', '125', ' 编译方法', '  专业必修（限选）', '3', '48', '', '', '1-12', '刘秉瀚', '（刘秉瀚、陈晖）合作上1个班，希望安排在下午的5，6节。');
INSERT INTO `tc_com_exc201601` VALUES ('9', '', '2014', '计算机科学与技术（卓越班）', '125', ' 编译系统设计实践', '  实践选修', '1.5', '36', '', '', '', '', '');
INSERT INTO `tc_com_exc201601` VALUES ('9', '03154', '2014', '计算机科学与技术（卓越班）', '125', ' 编译系统设计实践', '  实践选修', '1.5', '36', '', '', '第4周开始', '陈晖', '刘秉瀚、陈晖，分成2个班，要求与《编译方法》同一学期上，滞后3周，每周4节，安排周六。选修《编译系统设计实践》和理论课《编译方法》的老师要一致');
INSERT INTO `tc_com_exc201601` VALUES ('9', '04166', '2014', '计算机科学与技术（卓越班）', '125', ' 编译系统设计实践', '  实践选修', '1.5', '36', '', '', '', '何振峰', '理论与实践课选同一老师');
INSERT INTO `tc_com_exc201601` VALUES ('9', '83046', '2014', '计算机科学与技术（卓越班）', '125', ' 编译系统设计实践', '  实践选修', '1.5', '36', '', '', '4-12', '刘秉瀚', '分成2个班，要求与《编译方法》同一学期上，滞后3周，每周4节，安排周六。选修《编译系统设计实践》和理论课《编译方法》的老师要一致');
INSERT INTO `tc_com_exc201601` VALUES ('10', '', '2014', '计算机科学与技术（卓越班）', '125', ' 概率论与数理统计', '  学科必修', '3', '48', '', '', '', '', '');
INSERT INTO `tc_com_exc201601` VALUES ('11', '', '2014', '计算机科学与技术（卓越班）', '125', ' 计算方法', '  学科必修', '2', '32', '', '', '', '', '');
INSERT INTO `tc_com_exc201601` VALUES ('11', '02124', '2014', '计算机科学与技术（卓越班）', '125', ' 计算方法', '  学科必修', '2', '32', '', '', '1-9', '王秀', '');
INSERT INTO `tc_com_exc201601` VALUES ('11', '15041', '2014', '计算机科学与技术（卓越班）', '125', ' 计算方法', '  学科必修', '2', '32', '', '', '', '苏雅茹', '');
INSERT INTO `tc_com_exc201601` VALUES ('11', '88005', '2014', '计算机科学与技术（卓越班）', '125', ' 计算方法', '  学科必修', '2', '32', '', '', '', '白清源', '');
INSERT INTO `tc_com_exc201601` VALUES ('12', '', '2014', '计算机科学与技术（卓越班）', '125', ' 计算机图形学', '  专业方向（限选）3', '2', '32', '', '', '', '', '');
INSERT INTO `tc_com_exc201601` VALUES ('12', '85118', '2014', '计算机科学与技术（卓越班）', '125', ' 计算机图形学', '  专业方向（限选）3', '2', '32', '', '', '1-8', '谢伙生', '与计算机导论课排在同一个上午，教室同一间。');
INSERT INTO `tc_com_exc201601` VALUES ('13', '', '2014', '计算机科学与技术（卓越班）', '125', ' 计算机网络体系结构', '  专业方向（限选）1', '2', '32', '', '', '', '', '');
INSERT INTO `tc_com_exc201601` VALUES ('14', '', '2014', '计算机科学与技术（卓越班）', '125', ' 计算机系统结构', '  专业必修（限选）', '3', '48', '', '', '', '', '');
INSERT INTO `tc_com_exc201601` VALUES ('14', '03058', '2014', '计算机科学与技术（卓越班）', '125', ' 计算机系统结构', '  专业必修（限选）', '3', '48', '', '', '1-18', '尚艳艳', '课程不安排在12节');
INSERT INTO `tc_com_exc201601` VALUES ('14', '10011', '2014', '计算机科学与技术（卓越班）', '125', ' 计算机系统结构', '  专业必修（限选）', '3', '48', '', '', '', '林嘉雯', '尽可能安排在上午3、4节或者下午1、2节');
INSERT INTO `tc_com_exc201601` VALUES ('15', '', '2014', '计算机科学与技术（卓越班）', '125', ' 宽带网及宽带接入技术', '  学科专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `tc_com_exc201601` VALUES ('15', '02005', '2014', '计算机科学与技术（卓越班）', '125', ' 宽带网及宽带接入技术', '  学科专业选修', '2', '32', '', '', '', '孙及园', '请安排在11～18周的下午');
INSERT INTO `tc_com_exc201601` VALUES ('16', '', '2014', '计算机科学与技术（卓越班）', '125', ' 面向对象设计方法(UML)', '  专业方向（限选）2', '2', '32', '', '', '', '', '');
INSERT INTO `tc_com_exc201601` VALUES ('16', '02125', '2014', '计算机科学与技术（卓越班）', '125', ' 面向对象设计方法(UML)', '  专业方向（限选）2', '2', '32', '', '', '', '吴小竹', '');
INSERT INTO `tc_com_exc201601` VALUES ('17', '', '2014', '计算机科学与技术（卓越班）', '125', ' 嵌入式人机交互技术与GUI程序设计', '  学科专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `tc_com_exc201601` VALUES ('17', '11013', '2014', '计算机科学与技术（卓越班）', '125', ' 嵌入式人机交互技术与GUI程序设计', '  学科专业选修', '2', '32', '', '', '', '於志勇', '');
INSERT INTO `tc_com_exc201601` VALUES ('18', '', '2014', '计算机科学与技术（卓越班）', '125', ' 人工智能', '  专业必修（限选）', '2', '32', '', '', '', '', '');
INSERT INTO `tc_com_exc201601` VALUES ('18', '15041', '2014', '计算机科学与技术（卓越班）', '125', ' 人工智能', '  专业必修（限选）', '2', '32', '', '', '', '苏雅茹', '');
INSERT INTO `tc_com_exc201601` VALUES ('18', '85073', '2014', '计算机科学与技术（卓越班）', '125', ' 人工智能', '  专业必修（限选）', '2', '32', '', '', '', '林世平', '');
INSERT INTO `tc_com_exc201601` VALUES ('18', '87007', '2014', '计算机科学与技术（卓越班）', '125', ' 人工智能', '  专业必修（限选）', '2', '32', '', '', '第一周', '陈昭炯', '不排在上午1-2节');
INSERT INTO `tc_com_exc201601` VALUES ('19', '', '2014', '计算机科学与技术（卓越班）', '125', ' 软件工程A', '  专业必修（限选）', '3', '48', '', '', '', '', '');
INSERT INTO `tc_com_exc201601` VALUES ('19', '10044', '2014', '计算机科学与技术（卓越班）', '125', ' 软件工程A', '  专业必修（限选）', '3', '48', '', '', '', '张栋', '');
INSERT INTO `tc_com_exc201601` VALUES ('19', '11048', '2014', '计算机科学与技术（卓越班）', '125', ' 软件工程A', '  专业必修（限选）', '3', '48', '', '', '', '柯逍', '');
INSERT INTO `tc_com_exc201601` VALUES ('19', '94176', '2014', '计算机科学与技术（卓越班）', '125', ' 软件工程A', '  专业必修（限选）', '3', '48', '', '', '1-18', '汪璟玢', '不要安排7,8节');
INSERT INTO `tc_com_exc201601` VALUES ('20', '', '2014', '计算机科学与技术（卓越班）', '125', ' 软件工程实践', '  实践选修', '2', '48', '', '', '', '', '');
INSERT INTO `tc_com_exc201601` VALUES ('20', '10044', '2014', '计算机科学与技术（卓越班）', '125', ' 软件工程实践', '  实践选修', '2', '48', '', '', '', '张栋', '');
INSERT INTO `tc_com_exc201601` VALUES ('20', '11048', '2014', '计算机科学与技术（卓越班）', '125', ' 软件工程实践', '  实践选修', '2', '48', '', '', '', '柯逍', '');
INSERT INTO `tc_com_exc201601` VALUES ('20', '94176', '2014', '计算机科学与技术（卓越班）', '125', ' 软件工程实践', '  实践选修', '2', '48', '', '', '3-18', '汪璟玢', '4节连上');
INSERT INTO `tc_com_exc201601` VALUES ('21', '', '2014', '计算机科学与技术（卓越班）', '125', ' 软件体系结构', '  专业方向（限选）2', '2', '32', '', '', '', '', '');
INSERT INTO `tc_com_exc201601` VALUES ('21', '95057', '2014', '计算机科学与技术（卓越班）', '125', ' 软件体系结构', '  专业方向（限选）2', '2', '32', '', '', '1-16', '丁善镜', '第3，4节');
INSERT INTO `tc_com_exc201601` VALUES ('22', '', '2014', '计算机科学与技术（卓越班）', '125', ' 数据挖掘技术', '  学科专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `tc_com_exc201601` VALUES ('22', '15041', '2014', '计算机科学与技术（卓越班）', '125', ' 数据挖掘技术', '  学科专业选修', '2', '32', '', '', '', '苏雅茹', '');
INSERT INTO `tc_com_exc201601` VALUES ('22', '88005', '2014', '计算机科学与技术（卓越班）', '125', ' 数据挖掘技术', '  学科专业选修', '2', '32', '', '', '', '白清源', '');
INSERT INTO `tc_com_exc201601` VALUES ('23', '', '2014', '计算机科学与技术（卓越班）', '125', ' 网络管理实验', '  实践选修', '1', '24', '', '', '', '', '');
INSERT INTO `tc_com_exc201601` VALUES ('23', '82058', '2014', '计算机科学与技术（卓越班）', '125', ' 网络管理实验', '  实践选修', '1', '24', '', '', '5-7周星期日1-8节', '郭洪', '网络实验室401');
INSERT INTO `tc_com_exc201601` VALUES ('23', '96031', '2014', '计算机科学与技术（卓越班）', '125', ' 网络管理实验', '  实践选修', '1', '24', '', '', '5-7周星期日1-8节', '林常俊', '网络实验室404');
INSERT INTO `tc_com_exc201601` VALUES ('24', '', '2014', '计算机科学与技术（卓越班）', '125', ' 网络和系统性能评估', '  学科专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `tc_com_exc201601` VALUES ('25', '', '2014', '计算机科学与技术（卓越班）', '125', ' 现代计算机接口技术', '  专业必修（限选）', '2', '32', '', '', '', '', '');
INSERT INTO `tc_com_exc201601` VALUES ('25', '95015', '2014', '计算机科学与技术（卓越班）', '125', ' 现代计算机接口技术', '  专业必修（限选）', '2', '32', '', '', '第1周--8周', '苏力', '周2，周4。麻烦和实验班的《汇编与接口技术》连排，最好3，4节连排5,6节');
INSERT INTO `tc_com_exc201601` VALUES ('25', '98004', '2014', '计算机科学与技术（卓越班）', '125', ' 现代计算机接口技术', '  专业必修（限选）', '2', '32', '', '', '1至8周', '倪一涛', '');
INSERT INTO `tc_com_exc201601` VALUES ('26', '', '2014', '计算机科学与技术（卓越班）', '125', ' 现代计算机接口技术实践', '  实践选修', '1.5', '36', '', '', '', '', '');
INSERT INTO `tc_com_exc201601` VALUES ('26', '95015', '2014', '计算机科学与技术（卓越班）', '125', ' 现代计算机接口技术实践', '  实践选修', '1.5', '36', '', '', '第3-18周', '苏力', '1.请同学选课和理论课老师相同。2.尽量选实验，否则理论课学习会受影响');
INSERT INTO `tc_com_exc201601` VALUES ('26', '98004', '2014', '计算机科学与技术（卓越班）', '125', ' 现代计算机接口技术实践', '  实践选修', '1.5', '36', '', '', '4至12周', '倪一涛', '请安排周末');
INSERT INTO `tc_com_exc201601` VALUES ('27', '', '2014', '计算机科学与技术（卓越班）', '125', ' 现代搜索引擎技术及应用', '  专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `tc_com_exc201601` VALUES ('28', '', '2015', '计算机科学与技术（卓越班）', '1', ' IEEE Micromouse 原理与实践A（企业开课）', '  专业选修', '2', '32', '16', '', '', '', '');
INSERT INTO `tc_com_exc201601` VALUES ('28', '06033', '2015', '计算机科学与技术（卓越班）', '1', ' IEEE Micromouse 原理与实践A（企业开课）', '  专业选修', '2', '32', '16', '', '', '张浩', '');
INSERT INTO `tc_com_exc201601` VALUES ('29', '', '2015', '计算机科学与技术（卓越班）', '1', ' 离散数学A', '  学科必修', '4.5', '72', '', '', '', '', '');
INSERT INTO `tc_com_exc201601` VALUES ('29', '03171', '2015', '计算机科学与技术（卓越班）', '1', ' 离散数学A', '  学科必修', '4.5', '72', '', '', '', '王一蕾', '');
INSERT INTO `tc_com_exc201601` VALUES ('29', '08076', '2015', '计算机科学与技术（卓越班）', '1', ' 离散数学A', '  学科必修', '4.5', '72', '', '', '1-16', '陈勃', '');
INSERT INTO `tc_com_exc201601` VALUES ('30', '', '2015', '计算机科学与技术（卓越班）', '1', ' 数字电路与逻辑设计', '  专业必修（限选）', '3', '48', '', '', '', '', '');
INSERT INTO `tc_com_exc201601` VALUES ('30', '03009', '2015', '计算机科学与技术（卓越班）', '1', ' 数字电路与逻辑设计', '  专业必修（限选）', '3', '48', '', '', '1~12周', '董晨', '如果可以，请排在周1的3、4节和周3的7，8节');
INSERT INTO `tc_com_exc201601` VALUES ('30', '88064', '2015', '计算机科学与技术（卓越班）', '1', ' 数字电路与逻辑设计', '  专业必修（限选）', '3', '48', '', '', '1-12', '胡颖', '周一3、4节周三7、8节');
INSERT INTO `tc_com_exc201601` VALUES ('31', '', '2015', '计算机科学与技术（卓越班）', '1', ' 数字逻辑电路设计', '  实践选修', '2', '48', '', '', '', '', '');
INSERT INTO `tc_com_exc201601` VALUES ('31', '03009', '2015', '计算机科学与技术（卓越班）', '1', ' 数字逻辑电路设计', '  实践选修', '2', '48', '', '', '第6周开始~期末', '董晨', '董晨老师班请安排在周一下午或周五下午，与胡颖老师和郭龙坤老师不能同时，因为共用一个实验室');
INSERT INTO `tc_com_exc201601` VALUES ('31', '88064', '2015', '计算机科学与技术（卓越班）', '1', ' 数字逻辑电路设计', '  实践选修', '2', '48', '', '', '6-17', '胡颖', '周六1-8节');
INSERT INTO `tc_com_exc201601` VALUES ('32', '', '2015', '计算机科学与技术（卓越班）', '1', ' 算法与数据结构', '  专业必修（限选）', '5', '80', '', '28', '', '', '');
INSERT INTO `tc_com_exc201601` VALUES ('32', '03171', '2015', '计算机科学与技术（卓越班）', '1', ' 算法与数据结构', '  专业必修（限选）', '5', '80', '', '28', '', '王一蕾', '');
INSERT INTO `tc_com_exc201601` VALUES ('32', '04059', '2015', '计算机科学与技术（卓越班）', '1', ' 算法与数据结构', '  专业必修（限选）', '5', '80', '', '28', '1-14', '余春艳', '');
INSERT INTO `tc_com_exc201601` VALUES ('33', '', '2016', '计算机科学与技术（卓越班）', '1', ' 高级语言程序设计', '  学科必修', '4', '64', '', '32', '', '', '');
INSERT INTO `tc_com_exc201601` VALUES ('33', '02124', '2016', '计算机科学与技术（卓越班）', '1', ' 高级语言程序设计', '  学科必修', '4', '64', '', '32', '1-16', '王秀', '');
INSERT INTO `tc_com_exc201601` VALUES ('33', '03161', '2016', '计算机科学与技术（卓越班）', '1', ' 高级语言程序设计', '  学科必修', '4', '64', '', '32', '', '林秋月', '');
INSERT INTO `tc_com_exc201601` VALUES ('33', '15028', '2016', '计算机科学与技术（卓越班）', '1', ' 高级语言程序设计', '  学科必修', '4', '64', '', '32', '', '刘文犀', '');
INSERT INTO `tc_com_exc201601` VALUES ('34', '', '2016', '计算机科学与技术（卓越班）', '1', ' 计算机导论', '  公共必修', '1.5', '24', '', '', '', '', '');
INSERT INTO `tc_com_exc201601` VALUES ('34', '08076', '2016', '计算机科学与技术（卓越班）', '1', ' 计算机导论', '  公共必修', '1.5', '24', '', '', '3-10', '陈勃', '');
INSERT INTO `tc_com_exc201601` VALUES ('34', '15041', '2016', '计算机科学与技术（卓越班）', '1', ' 计算机导论', '  公共必修', '1.5', '24', '', '', '', '苏雅茹', '');
INSERT INTO `tc_com_exc201601` VALUES ('34', '85118', '2016', '计算机科学与技术（卓越班）', '1', ' 计算机导论', '  公共必修', '1.5', '24', '', '', '3-10', '谢伙生', '与计算机图形学课排在同一个上午，教室同一间。');
INSERT INTO `tc_com_exc201601` VALUES ('35', '', '2016', '计算机科学与技术（卓越班）', '1', ' 认识实习（计算机基础训练）', '  实践环节', '1', '24', '', '', '', '', '');
INSERT INTO `tc_com_exc201601` VALUES ('35', '08076', '2016', '计算机科学与技术（卓越班）', '1', ' 认识实习（计算机基础训练）', '  实践环节', '1', '24', '', '', '10-15', '陈勃', '');
INSERT INTO `tc_com_exc201601` VALUES ('35', '85118', '2016', '计算机科学与技术（卓越班）', '1', ' 认识实习（计算机基础训练）', '  实践环节', '1', '24', '', '', '11-16', '谢伙生', '');

-- ----------------------------
-- Table structure for tc_com_nor201601
-- ----------------------------
DROP TABLE IF EXISTS `tc_com_nor201601`;
CREATE TABLE `tc_com_nor201601` (
  `insertTime` int(10) NOT NULL AUTO_INCREMENT,
  `workNumber` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `grade` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `major` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `people` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `courseName` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `courseType` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `courseCredit` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `courseHour` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `practiceHour` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `onMachineHour` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `timePeriod` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `teacherName` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `remark` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`workNumber`,`grade`,`major`,`people`,`courseName`,`courseType`,`courseCredit`,`courseHour`,`practiceHour`,`onMachineHour`,`timePeriod`,`teacherName`,`remark`),
  KEY `insertTime` (`insertTime`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tc_com_nor201601
-- ----------------------------
INSERT INTO `tc_com_nor201601` VALUES ('1', '', '2016学年上学期计算机开课计划书', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `tc_com_nor201601` VALUES ('2', '', '年级', '专业', '专业人数', '课程名称', '选修类型', '学分', '学时', '实验', '上机', '起讫周序', '任课教师', '备注');
INSERT INTO `tc_com_nor201601` VALUES ('3', '', '', '', '', '', '', '', '', '学时', '学时', '', '', '');
INSERT INTO `tc_com_nor201601` VALUES ('4', '', '2013', '计算机科学与技术', '62', ' Internet技术与协议分析实验', '  实践选修', '1', '24', '', '', '', '', '');
INSERT INTO `tc_com_nor201601` VALUES ('5', '', '2013', '计算机科学与技术', '62', ' IT企业项目实训', '  实践选修', '2', '48', '', '', '', '', '');
INSERT INTO `tc_com_nor201601` VALUES ('6', '', '2013', '计算机科学与技术', '62', ' 多媒体通信技术', '  专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `tc_com_nor201601` VALUES ('6', '02005', '2013', '计算机科学与技术', '62', ' 多媒体通信技术', '  专业选修', '2', '32', '', '', '', '孙及园', '请安排在2～9周的下午');
INSERT INTO `tc_com_nor201601` VALUES ('7', '', '2013', '计算机科学与技术', '62', ' 分布式操作系统', '  专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `tc_com_nor201601` VALUES ('7', '95057', '2013', '计算机科学与技术', '62', ' 分布式操作系统', '  专业选修', '2', '32', '', '', '1-16', '丁善镜', '第5，6节');
INSERT INTO `tc_com_nor201601` VALUES ('8', '', '2013', '计算机科学与技术', '62', ' 分布式系统', '  专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `tc_com_nor201601` VALUES ('9', '', '2013', '计算机科学与技术', '62', ' 广域网技术实验', '  实践选修', '1', '24', '', '', '', '', '');
INSERT INTO `tc_com_nor201601` VALUES ('9', '03030', '2013', '计算机科学与技术', '62', ' 广域网技术实验', '  实践选修', '1', '24', '', '', '', '蒋启强', '');
INSERT INTO `tc_com_nor201601` VALUES ('10', '', '2013', '计算机科学与技术', '62', ' 互联网产品设计', '  专业选修', '2.5', '40', '', '', '', '', '');
INSERT INTO `tc_com_nor201601` VALUES ('11', '', '2013', '计算机科学与技术', '62', ' 软件可靠性与可信软件', '  专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `tc_com_nor201601` VALUES ('12', '', '2013', '计算机科学与技术', '62', ' 虚拟现实', '  专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `tc_com_nor201601` VALUES ('13', '', '2013', '计算机科学与技术', '62', ' 云计算', '  专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `tc_com_nor201601` VALUES ('14', '', '2014', '计算机科学与技术', '15', ' EDA技术', '  专业方向（限选）1', '2', '32', '', '16', '', '', '');
INSERT INTO `tc_com_nor201601` VALUES ('14', '03112', '2014', '计算机科学与技术', '15', ' EDA技术', '  专业方向（限选）1', '2', '32', '', '16', '', '赵彦敏', '');
INSERT INTO `tc_com_nor201601` VALUES ('15', '', '2014', '计算机科学与技术', '15', ' Java语言程序设计', '  实践选修', '2', '48', '', '', '', '', '');
INSERT INTO `tc_com_nor201601` VALUES ('15', '06420', '2014', '计算机科学与技术', '15', ' Java语言程序设计', '  实践选修', '2', '48', '', '', '1-16', '陈嘉', '因课时较多，希望能一周少安排一些课，多安排几周');
INSERT INTO `tc_com_nor201601` VALUES ('16', '', '2014', '计算机科学与技术', '15', ' Linux操作系统设计实践', '  实践选修', '1.5', '36', '', '', '', '', '');
INSERT INTO `tc_com_nor201601` VALUES ('16', '03003', '2014', '计算机科学与技术', '15', ' Linux操作系统设计实践', '  实践选修', '1.5', '36', '', '', '', '程烨', '周4学时连上,机房上课。程烨一个班，郭红一个班，两个班安排同一时间段上课，每班限选人数60人。');
INSERT INTO `tc_com_nor201601` VALUES ('16', '89085', '2014', '计算机科学与技术', '15', ' Linux操作系统设计实践', '  实践选修', '1.5', '36', '', '', '', '郭红', '周4学时连上,机房上课。程烨一个班，郭红一个班，两个班安排同一时间段上课，每班限选人数60人。');
INSERT INTO `tc_com_nor201601` VALUES ('17', '', '2014', '计算机科学与技术', '15', ' 编译方法', '  学科必修', '3', '48', '', '', '', '', '');
INSERT INTO `tc_com_nor201601` VALUES ('17', '03154', '2014', '计算机科学与技术', '15', ' 编译方法', '  学科必修', '3', '48', '', '', '1--12', '陈晖', '（刘秉瀚、陈晖）合作上1个班，希望安排在上午3，4节或下午的5，6节。');
INSERT INTO `tc_com_nor201601` VALUES ('17', '04166', '2014', '计算机科学与技术', '15', ' 编译方法', '  学科必修', '3', '48', '', '', '', '何振峰', '理论课与实践课选同一老师');
INSERT INTO `tc_com_nor201601` VALUES ('17', '83046', '2014', '计算机科学与技术', '15', ' 编译方法', '  学科必修', '3', '48', '', '', '1-12', '刘秉瀚', '（刘秉瀚、陈晖）合作上1个班，希望安排在下午的5，6节。');
INSERT INTO `tc_com_nor201601` VALUES ('18', '', '2014', '计算机科学与技术', '15', ' 编译系统设计实践', '  实践选修', '1.5', '36', '', '', '', '', '');
INSERT INTO `tc_com_nor201601` VALUES ('18', '03154', '2014', '计算机科学与技术', '15', ' 编译系统设计实践', '  实践选修', '1.5', '36', '', '', '第4周开始', '陈晖', '刘秉瀚、陈晖，分成2个班，要求与《编译方法》同一学期上，滞后3周，每周4节，安排周六。选修《编译系统设计实践》和理论课《编译方法》的老师要一致');
INSERT INTO `tc_com_nor201601` VALUES ('18', '04166', '2014', '计算机科学与技术', '15', ' 编译系统设计实践', '  实践选修', '1.5', '36', '', '', '', '何振峰', '理论课与实践课选同一老师');
INSERT INTO `tc_com_nor201601` VALUES ('18', '83046', '2014', '计算机科学与技术', '15', ' 编译系统设计实践', '  实践选修', '1.5', '36', '', '', '4-12', '刘秉瀚', '分成2个班，要求与《编译方法》同一学期上，滞后3周，每周4节，安排周六。选修《编译系统设计实践》和理论课《编译方法》的老师要一致');
INSERT INTO `tc_com_nor201601` VALUES ('19', '', '2014', '计算机科学与技术', '15', ' 概率论与数理统计', '  公共必修', '3', '48', '', '', '', '', '');
INSERT INTO `tc_com_nor201601` VALUES ('20', '', '2014', '计算机科学与技术', '15', ' 计算方法', '  学科必修', '2', '32', '', '', '', '', '');
INSERT INTO `tc_com_nor201601` VALUES ('20', '02124', '2014', '计算机科学与技术', '15', ' 计算方法', '  学科必修', '2', '32', '', '', '1-9', '王秀', '');
INSERT INTO `tc_com_nor201601` VALUES ('20', '04021', '2014', '计算机科学与技术', '15', ' 计算方法', '  学科必修', '2', '32', '', '', '', '陈欢', '');
INSERT INTO `tc_com_nor201601` VALUES ('20', '15041', '2014', '计算机科学与技术', '15', ' 计算方法', '  学科必修', '2', '32', '', '', '', '苏雅茹', '');
INSERT INTO `tc_com_nor201601` VALUES ('20', '88005', '2014', '计算机科学与技术', '15', ' 计算方法', '  学科必修', '2', '32', '', '', '', '白清源', '');
INSERT INTO `tc_com_nor201601` VALUES ('21', '', '2014', '计算机科学与技术', '15', ' 计算机图形学', '  专业方向（限选）3', '2', '32', '', '', '', '', '');
INSERT INTO `tc_com_nor201601` VALUES ('21', '85118', '2014', '计算机科学与技术', '15', ' 计算机图形学', '  专业方向（限选）3', '2', '32', '', '', '1-8', '谢伙生', '与计算机导论课排在同一个上午，教室同一间。');
INSERT INTO `tc_com_nor201601` VALUES ('22', '', '2014', '计算机科学与技术', '15', ' 计算机图形学综合实验', '  实践选修', '1.5', '36', '', '', '', '', '');
INSERT INTO `tc_com_nor201601` VALUES ('22', '85118', '2014', '计算机科学与技术', '15', ' 计算机图形学综合实验', '  实践选修', '1.5', '36', '', '', '3-11', '谢伙生', '');
INSERT INTO `tc_com_nor201601` VALUES ('23', '', '2014', '计算机科学与技术', '15', ' 计算机网络体系结构', '  专业方向（限选）1', '2', '32', '', '', '', '', '');
INSERT INTO `tc_com_nor201601` VALUES ('23', '11065', '2014', '计算机科学与技术', '15', ' 计算机网络体系结构', '  专业方向（限选）1', '2', '32', '', '', '1-8', '郑相涵', '');
INSERT INTO `tc_com_nor201601` VALUES ('24', '', '2014', '计算机科学与技术', '15', ' 计算机系统结构', '  学科必修', '3', '48', '', '', '', '', '');
INSERT INTO `tc_com_nor201601` VALUES ('24', '03058', '2014', '计算机科学与技术', '15', ' 计算机系统结构', '  学科必修', '3', '48', '', '', '1-18', '尚艳艳', '课程不安排在12节');
INSERT INTO `tc_com_nor201601` VALUES ('24', '10011', '2014', '计算机科学与技术', '15', ' 计算机系统结构', '  学科必修', '3', '48', '', '', '', '林嘉雯', '尽可能安排在上午3、4节或者下午1、2节');
INSERT INTO `tc_com_nor201601` VALUES ('25', '', '2014', '计算机科学与技术', '15', ' 宽带网及宽带接入技术', '  专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `tc_com_nor201601` VALUES ('25', '02005', '2014', '计算机科学与技术', '15', ' 宽带网及宽带接入技术', '  专业选修', '2', '32', '', '', '', '孙及园', '请安排在11～18周的下午');
INSERT INTO `tc_com_nor201601` VALUES ('26', '', '2014', '计算机科学与技术', '15', ' 面向对象设计方法(UML)', '  专业方向（限选）2', '2', '32', '', '', '', '', '');
INSERT INTO `tc_com_nor201601` VALUES ('26', '02125', '2014', '计算机科学与技术', '15', ' 面向对象设计方法(UML)', '  专业方向（限选）2', '2', '32', '', '', '', '吴小竹', '');
INSERT INTO `tc_com_nor201601` VALUES ('27', '', '2014', '计算机科学与技术', '15', ' 人工智能', '  专业必修（限选）', '2', '32', '', '', '', '', '');
INSERT INTO `tc_com_nor201601` VALUES ('27', '15041', '2014', '计算机科学与技术', '15', ' 人工智能', '  专业必修（限选）', '2', '32', '', '', '', '苏雅茹', '');
INSERT INTO `tc_com_nor201601` VALUES ('27', '85073', '2014', '计算机科学与技术', '15', ' 人工智能', '  专业必修（限选）', '2', '32', '', '', '', '林世平', '');
INSERT INTO `tc_com_nor201601` VALUES ('27', '87007', '2014', '计算机科学与技术', '15', ' 人工智能', '  专业必修（限选）', '2', '32', '', '', '第一周', '陈昭炯', '不排在上午1-2节');
INSERT INTO `tc_com_nor201601` VALUES ('28', '', '2014', '计算机科学与技术', '15', ' 软件工程A', '  专业必修（限选）', '3', '48', '', '', '', '', '');
INSERT INTO `tc_com_nor201601` VALUES ('28', '10044', '2014', '计算机科学与技术', '15', ' 软件工程A', '  专业必修（限选）', '3', '48', '', '', '', '张栋', '');
INSERT INTO `tc_com_nor201601` VALUES ('28', '11048', '2014', '计算机科学与技术', '15', ' 软件工程A', '  专业必修（限选）', '3', '48', '', '', '', '柯逍', '');
INSERT INTO `tc_com_nor201601` VALUES ('28', '94176', '2014', '计算机科学与技术', '15', ' 软件工程A', '  专业必修（限选）', '3', '48', '', '', '1-18', '汪璟玢', '不要安排7,8节');
INSERT INTO `tc_com_nor201601` VALUES ('29', '', '2014', '计算机科学与技术', '15', ' 软件工程实践', '  实践选修', '2', '48', '', '', '', '', '');
INSERT INTO `tc_com_nor201601` VALUES ('29', '10044', '2014', '计算机科学与技术', '15', ' 软件工程实践', '  实践选修', '2', '48', '', '', '', '张栋', '');
INSERT INTO `tc_com_nor201601` VALUES ('29', '11048', '2014', '计算机科学与技术', '15', ' 软件工程实践', '  实践选修', '2', '48', '', '', '', '柯逍', '');
INSERT INTO `tc_com_nor201601` VALUES ('29', '94176', '2014', '计算机科学与技术', '15', ' 软件工程实践', '  实践选修', '2', '48', '', '', '3-18', '汪璟玢', '4节连上');
INSERT INTO `tc_com_nor201601` VALUES ('30', '', '2014', '计算机科学与技术', '15', ' 软件体系结构', '  专业方向（限选）2', '2', '32', '', '', '', '', '');
INSERT INTO `tc_com_nor201601` VALUES ('31', '', '2014', '计算机科学与技术', '15', ' 数据挖掘技术', '  专业方向（限选）3', '2', '32', '', '', '', '', '');
INSERT INTO `tc_com_nor201601` VALUES ('31', '15041', '2014', '计算机科学与技术', '15', ' 数据挖掘技术', '  专业方向（限选）3', '2', '32', '', '', '', '苏雅茹', '');
INSERT INTO `tc_com_nor201601` VALUES ('31', '88005', '2014', '计算机科学与技术', '15', ' 数据挖掘技术', '  专业方向（限选）3', '2', '32', '', '', '', '白清源', '');
INSERT INTO `tc_com_nor201601` VALUES ('32', '', '2014', '计算机科学与技术', '15', ' 网络管理实验', '  实践选修', '1', '24', '', '', '', '', '');
INSERT INTO `tc_com_nor201601` VALUES ('32', '82058', '2014', '计算机科学与技术', '15', ' 网络管理实验', '  实践选修', '1', '24', '', '', '5-7周星期日1-8节', '郭洪', '网络实验室401');
INSERT INTO `tc_com_nor201601` VALUES ('32', '96031', '2014', '计算机科学与技术', '15', ' 网络管理实验', '  实践选修', '1', '24', '', '', '5-7周星期日1-8节', '林常俊', '网络实验室404');
INSERT INTO `tc_com_nor201601` VALUES ('33', '', '2014', '计算机科学与技术', '15', ' 现代计算机接口技术', '  专业必修（限选）', '2', '32', '', '', '', '', '');
INSERT INTO `tc_com_nor201601` VALUES ('33', '95015', '2014', '计算机科学与技术', '15', ' 现代计算机接口技术', '  专业必修（限选）', '2', '32', '', '', '第1-8周', '苏力', '周2，周4。麻烦和实验班的《汇编与接口技术》连排，最好3，4节连排5,6节');
INSERT INTO `tc_com_nor201601` VALUES ('33', '98004', '2014', '计算机科学与技术', '15', ' 现代计算机接口技术', '  专业必修（限选）', '2', '32', '', '', '1至8周', '倪一涛', '');
INSERT INTO `tc_com_nor201601` VALUES ('34', '', '2014', '计算机科学与技术', '15', ' 现代计算机接口技术实践', '  实践选修', '1.5', '36', '', '', '', '', '');
INSERT INTO `tc_com_nor201601` VALUES ('34', '95015', '2014', '计算机科学与技术', '15', ' 现代计算机接口技术实践', '  实践选修', '1.5', '36', '', '', '低3-18周', '苏力', '实验课和理论课选相同老师，实验课尽量要选，否则可能影响理论课的学习和考试');
INSERT INTO `tc_com_nor201601` VALUES ('34', '98004', '2014', '计算机科学与技术', '15', ' 现代计算机接口技术实践', '  实践选修', '1.5', '36', '', '', '4至12周', '倪一涛', '请安排周末');
INSERT INTO `tc_com_nor201601` VALUES ('35', '', '2014', '计算机科学与技术', '15', ' 现代搜索引擎技术及应用', '  专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `tc_com_nor201601` VALUES ('36', '', '2015', '计算机类', '216', ' IEEE Micromouse 原理与实践A（企业开课）', '  专业选修', '2', '32', '16', '', '', '', '');
INSERT INTO `tc_com_nor201601` VALUES ('36', '06033', '2015', '计算机类', '216', ' IEEE Micromouse 原理与实践A（企业开课）', '  专业选修', '2', '32', '16', '', '', '张浩', '');
INSERT INTO `tc_com_nor201601` VALUES ('37', '', '2015', '计算机类', '216', ' 离散数学A', '  学科必修', '4.5', '72', '', '', '', '', '');
INSERT INTO `tc_com_nor201601` VALUES ('37', '03032', '2015', '计算机类', '216', ' 离散数学A', '  学科必修', '4.5', '72', '', '', '1-18', '孙岚', '请尽量不要排1、2节课');
INSERT INTO `tc_com_nor201601` VALUES ('37', '03171', '2015', '计算机类', '216', ' 离散数学A', '  学科必修', '4.5', '72', '', '', '', '王一蕾', '');
INSERT INTO `tc_com_nor201601` VALUES ('37', '08076', '2015', '计算机类', '216', ' 离散数学A', '  学科必修', '4.5', '72', '', '', '1-16', '陈勃', '');
INSERT INTO `tc_com_nor201601` VALUES ('38', '', '2015', '计算机类', '216', ' 数字电路与逻辑设计', '  学科必修', '3', '48', '', '', '', '', '');
INSERT INTO `tc_com_nor201601` VALUES ('38', '03009', '2015', '计算机类', '216', ' 数字电路与逻辑设计', '  学科必修', '3', '48', '', '', '1~12', '董晨', '如果可以，请安排在周1的3、4节和周3的7、8节');
INSERT INTO `tc_com_nor201601` VALUES ('38', '88064', '2015', '计算机类', '216', ' 数字电路与逻辑设计', '  学科必修', '3', '48', '', '', '1-12', '胡颖', '周一3、4节周三7、8节');
INSERT INTO `tc_com_nor201601` VALUES ('39', '', '2015', '计算机类', '216', ' 数字逻辑电路设计', '  实践选修', '2', '48', '', '', '', '', '');
INSERT INTO `tc_com_nor201601` VALUES ('39', '03009', '2015', '计算机类', '216', ' 数字逻辑电路设计', '  实践选修', '2', '48', '', '', '6~期末', '董晨', '董晨老师班请安排在周一下午或周五下午，与胡颖老师和郭龙坤老师不能同时，因为共用一个实验室');
INSERT INTO `tc_com_nor201601` VALUES ('39', '88064', '2015', '计算机类', '216', ' 数字逻辑电路设计', '  实践选修', '2', '48', '', '', '6-17', '胡颖', '周六1-8');
INSERT INTO `tc_com_nor201601` VALUES ('40', '', '2015', '计算机类', '216', ' 算法与数据结构', '  学科必修', '5', '80', '', '28', '', '', '');
INSERT INTO `tc_com_nor201601` VALUES ('40', '03171', '2015', '计算机类', '216', ' 算法与数据结构', '  学科必修', '5', '80', '', '28', '', '王一蕾', '');
INSERT INTO `tc_com_nor201601` VALUES ('40', '04059', '2015', '计算机类', '216', ' 算法与数据结构', '  学科必修', '5', '80', '', '28', '1-14', '余春艳', '');
INSERT INTO `tc_com_nor201601` VALUES ('40', '06018', '2015', '计算机类', '216', ' 算法与数据结构', '  学科必修', '5', '80', '', '28', '1-13', '傅仰耿', '（傅仰耿、王晓东），不排周一周五，上机排在第一次授课之后');
INSERT INTO `tc_com_nor201601` VALUES ('41', '', '2016', '计算机类', '1', ' 高级语言程序设计', '  学科必修', '4', '64', '', '32', '', '', '');
INSERT INTO `tc_com_nor201601` VALUES ('41', '02124', '2016', '计算机类', '1', ' 高级语言程序设计', '  学科必修', '4', '64', '', '32', '1-16', '王秀', '');
INSERT INTO `tc_com_nor201601` VALUES ('41', '03161', '2016', '计算机类', '1', ' 高级语言程序设计', '  学科必修', '4', '64', '', '32', '', '林秋月', '');
INSERT INTO `tc_com_nor201601` VALUES ('41', '15028', '2016', '计算机类', '1', ' 高级语言程序设计', '  学科必修', '4', '64', '', '32', '', '刘文犀', '');
INSERT INTO `tc_com_nor201601` VALUES ('42', '', '2016', '计算机类', '1', ' 计算机导论', '  学科必修', '1.5', '24', '', '', '', '', '');
INSERT INTO `tc_com_nor201601` VALUES ('42', '08076', '2016', '计算机类', '1', ' 计算机导论', '  学科必修', '1.5', '24', '', '', '3-10', '陈勃', '');
INSERT INTO `tc_com_nor201601` VALUES ('42', '15041', '2016', '计算机类', '1', ' 计算机导论', '  学科必修', '1.5', '24', '', '', '', '苏雅茹', '');
INSERT INTO `tc_com_nor201601` VALUES ('42', '85118', '2016', '计算机类', '1', ' 计算机导论', '  学科必修', '1.5', '24', '', '', '3-10', '谢伙生', '与计算机图形学课排在同一个上午，教室同一间。');
INSERT INTO `tc_com_nor201601` VALUES ('43', '', '2016', '计算机类', '1', ' 认识实习（计算机基础训练）', '  实践环节', '1', '24', '', '', '', '', '');
INSERT INTO `tc_com_nor201601` VALUES ('43', '08076', '2016', '计算机类', '1', ' 认识实习（计算机基础训练）', '  实践环节', '1', '24', '', '', '10-15', '陈勃', '');
INSERT INTO `tc_com_nor201601` VALUES ('43', '85118', '2016', '计算机类', '1', ' 认识实习（计算机基础训练）', '  实践环节', '1', '24', '', '', '11-16', '谢伙生', '');

-- ----------------------------
-- Table structure for tc_com_ope201601
-- ----------------------------
DROP TABLE IF EXISTS `tc_com_ope201601`;
CREATE TABLE `tc_com_ope201601` (
  `insertTime` int(10) NOT NULL AUTO_INCREMENT,
  `workNumber` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `grade` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `major` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `people` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `courseName` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `courseType` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `courseCredit` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `courseHour` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `practiceHour` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `onMachineHour` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `timePeriod` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `teacherName` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `remark` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`workNumber`,`grade`,`major`,`people`,`courseName`,`courseType`,`courseCredit`,`courseHour`,`practiceHour`,`onMachineHour`,`timePeriod`,`teacherName`,`remark`),
  KEY `insertTime` (`insertTime`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tc_com_ope201601
-- ----------------------------
INSERT INTO `tc_com_ope201601` VALUES ('1', '', '2016学年上学期计算机科学与技术（实验班）开课计划书', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `tc_com_ope201601` VALUES ('2', '', '年级', '专业', '专业人数', '课程名称', '选修类型', '学分', '学时', '实验', '上机', '起讫周序', '任课教师', '备注');
INSERT INTO `tc_com_ope201601` VALUES ('3', '', '', '', '', '', '', '', '', '学时', '学时', '', '', '');
INSERT INTO `tc_com_ope201601` VALUES ('4', '', '2013', '计算机科学与技术（实验班）', '60', ' GPU高性能计算', '  专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `tc_com_ope201601` VALUES ('5', '', '2013', '计算机科学与技术（实验班）', '60', ' Internet技术与协议分析实验', '  实践选修', '1', '24', '', '', '', '', '');
INSERT INTO `tc_com_ope201601` VALUES ('6', '', '2013', '计算机科学与技术（实验班）', '60', ' IT企业项目实训', '  实践选修', '2', '48', '', '', '', '', '');
INSERT INTO `tc_com_ope201601` VALUES ('7', '', '2013', '计算机科学与技术（实验班）', '60', ' 多媒体通信技术', '  专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `tc_com_ope201601` VALUES ('7', '02005', '2013', '计算机科学与技术（实验班）', '60', ' 多媒体通信技术', '  专业选修', '2', '32', '', '', '', '孙及园', '请安排在2～9周的下午');
INSERT INTO `tc_com_ope201601` VALUES ('8', '', '2013', '计算机科学与技术（实验班）', '60', ' 分布式操作系统', '  专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `tc_com_ope201601` VALUES ('8', '95057', '2013', '计算机科学与技术（实验班）', '60', ' 分布式操作系统', '  专业选修', '2', '32', '', '', '1-16', '丁善镜', '第5，6节');
INSERT INTO `tc_com_ope201601` VALUES ('9', '', '2013', '计算机科学与技术（实验班）', '60', ' 广域网技术实验', '  实践选修', '1', '24', '', '', '', '', '');
INSERT INTO `tc_com_ope201601` VALUES ('9', '03030', '2013', '计算机科学与技术（实验班）', '60', ' 广域网技术实验', '  实践选修', '1', '24', '', '', '', '蒋启强', '');
INSERT INTO `tc_com_ope201601` VALUES ('10', '', '2013', '计算机科学与技术（实验班）', '60', ' 互联网产品设计', '  专业选修', '2.5', '40', '', '', '', '', '');
INSERT INTO `tc_com_ope201601` VALUES ('10', '03161', '2013', '计算机科学与技术（实验班）', '60', ' 互联网产品设计', '  专业选修', '2.5', '40', '', '', '', '林秋月', '');
INSERT INTO `tc_com_ope201601` VALUES ('11', '', '2013', '计算机科学与技术（实验班）', '60', ' 计算机动画', '  专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `tc_com_ope201601` VALUES ('12', '', '2013', '计算机科学与技术（实验班）', '60', ' 计算机动画课程设计', '  实践选修', '1', '24', '', '', '', '', '');
INSERT INTO `tc_com_ope201601` VALUES ('13', '', '2013', '计算机科学与技术（实验班）', '60', ' 计算机仿真技术', '  专业选修', '2', '32', '12', '', '', '', '');
INSERT INTO `tc_com_ope201601` VALUES ('14', '', '2013', '计算机科学与技术（实验班）', '60', ' 计算机辅助设计', '  专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `tc_com_ope201601` VALUES ('15', '', '2013', '计算机科学与技术（实验班）', '60', ' 计算机外部设备', '  专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `tc_com_ope201601` VALUES ('16', '', '2013', '计算机科学与技术（实验班）', '60', ' 近世代数', '  专业选修', '3', '48', '', '', '', '', '');
INSERT INTO `tc_com_ope201601` VALUES ('17', '', '2013', '计算机科学与技术（实验班）', '60', ' 软件可靠性', '  专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `tc_com_ope201601` VALUES ('18', '', '2013', '计算机科学与技术（实验班）', '60', ' 数学物理方程', '  专业选修', '3', '48', '', '', '', '', '');
INSERT INTO `tc_com_ope201601` VALUES ('19', '', '2013', '计算机科学与技术（实验班）', '60', ' 算法设计', '  专业必修（限选）', '2', '32', '', '', '', '', '');
INSERT INTO `tc_com_ope201601` VALUES ('19', '06018', '2013', '计算机科学与技术（实验班）', '60', ' 算法设计', '  专业必修（限选）', '2', '32', '', '', '1-8', '傅仰耿', '不安排周一和周五');
INSERT INTO `tc_com_ope201601` VALUES ('20', '', '2013', '计算机科学与技术（实验班）', '60', ' 移动编程实践', '  实践选修', '1', '24', '', '', '', '', '');
INSERT INTO `tc_com_ope201601` VALUES ('21', '', '2013', '计算机科学与技术（实验班）', '60', ' 运筹学', '  专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `tc_com_ope201601` VALUES ('21', '03161', '2013', '计算机科学与技术（实验班）', '60', ' 运筹学', '  专业选修', '2', '32', '', '', '', '林秋月', '');
INSERT INTO `tc_com_ope201601` VALUES ('22', '', '2014', '计算机科学与技术（实验班）', '73', ' Linux操作系统设计实践', '  实践环节', '1.5', '36', '', '', '', '', '');
INSERT INTO `tc_com_ope201601` VALUES ('22', '03003', '2014', '计算机科学与技术（实验班）', '73', ' Linux操作系统设计实践', '  实践环节', '1.5', '36', '', '', '', '程烨', '周4学时连上,机房上课。程烨一个班，郭红一个班，两个班安排同一时间段上课，每班限选人数60人。');
INSERT INTO `tc_com_ope201601` VALUES ('22', '89085', '2014', '计算机科学与技术（实验班）', '73', ' Linux操作系统设计实践', '  实践环节', '1.5', '36', '', '', '', '郭红', '周4学时连上,机房上课。程烨一个班，郭红一个班，两个班安排同一时间段上课，每班限选人数60人。');
INSERT INTO `tc_com_ope201601` VALUES ('23', '', '2014', '计算机科学与技术（实验班）', '73', ' 编译方法', '  学科必修', '3', '48', '', '', '', '', '');
INSERT INTO `tc_com_ope201601` VALUES ('23', '03154', '2014', '计算机科学与技术（实验班）', '73', ' 编译方法', '  学科必修', '3', '48', '', '', '1-12', '陈晖', '（刘秉瀚、陈晖）合作上1个班，希望安排在上午3，4节或下午的5，6节。');
INSERT INTO `tc_com_ope201601` VALUES ('23', '04166', '2014', '计算机科学与技术（实验班）', '73', ' 编译方法', '  学科必修', '3', '48', '', '', '', '何振峰', '理论课与实践课选同一老师');
INSERT INTO `tc_com_ope201601` VALUES ('23', '83046', '2014', '计算机科学与技术（实验班）', '73', ' 编译方法', '  学科必修', '3', '48', '', '', '1-12', '刘秉瀚', '（刘秉瀚、陈晖）合作上1个班，希望安排在下午的5，6节。');
INSERT INTO `tc_com_ope201601` VALUES ('24', '', '2014', '计算机科学与技术（实验班）', '73', ' 编译系统设计实践', '  实践环节', '1.5', '36', '', '', '', '', '');
INSERT INTO `tc_com_ope201601` VALUES ('24', '03154', '2014', '计算机科学与技术（实验班）', '73', ' 编译系统设计实践', '  实践环节', '1.5', '36', '', '', '第4周开始', '陈晖', '刘秉瀚、陈晖，分成2个班，要求与《编译方法》同一学期上，滞后3周，每周4节，安排周六。选修《编译系统设计实践》和理论课《编译方法》的老师要一致');
INSERT INTO `tc_com_ope201601` VALUES ('24', '04166', '2014', '计算机科学与技术（实验班）', '73', ' 编译系统设计实践', '  实践环节', '1.5', '36', '', '', '', '何振峰', '理论课与实践课选同一老师');
INSERT INTO `tc_com_ope201601` VALUES ('24', '83046', '2014', '计算机科学与技术（实验班）', '73', ' 编译系统设计实践', '  实践环节', '1.5', '36', '', '', '4-12', '刘秉瀚', '分成2个班，要求与《编译方法》同一学期上，滞后3周，每周4节，安排周六。选修《编译系统设计实践》和理论课《编译方法》的老师要一致');
INSERT INTO `tc_com_ope201601` VALUES ('25', '', '2014', '计算机科学与技术（实验班）', '73', ' 复变函数', '  专业选修', '3', '48', '', '', '', '', '');
INSERT INTO `tc_com_ope201601` VALUES ('26', '', '2014', '计算机科学与技术（实验班）', '73', ' 概率论与数理统计', '  公共必修', '4', '64', '', '', '', '', '');
INSERT INTO `tc_com_ope201601` VALUES ('27', '', '2014', '计算机科学与技术（实验班）', '73', ' 汇编与接口技术', '  学科必修', '3', '48', '', '24', '', '', '');
INSERT INTO `tc_com_ope201601` VALUES ('27', '95015', '2014', '计算机科学与技术（实验班）', '73', ' 汇编与接口技术', '  学科必修', '3', '48', '', '24', '第3-8周', '苏力', '周2，周4。麻烦和普通班班的《现代计算机接口技术》连排，最好3，4节连排5,6节，实验课连排4节');
INSERT INTO `tc_com_ope201601` VALUES ('28', '', '2014', '计算机科学与技术（实验班）', '73', ' 计算方法', '  学科必修', '2', '32', '', '', '', '', '');
INSERT INTO `tc_com_ope201601` VALUES ('28', '15041', '2014', '计算机科学与技术（实验班）', '73', ' 计算方法', '  学科必修', '2', '32', '', '', '', '苏雅茹', '');
INSERT INTO `tc_com_ope201601` VALUES ('28', '88005', '2014', '计算机科学与技术（实验班）', '73', ' 计算方法', '  学科必修', '2', '32', '', '', '', '白清源', '');
INSERT INTO `tc_com_ope201601` VALUES ('29', '', '2014', '计算机科学与技术（实验班）', '73', ' 计算机图形学', '  专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `tc_com_ope201601` VALUES ('29', '85118', '2014', '计算机科学与技术（实验班）', '73', ' 计算机图形学', '  专业选修', '2', '32', '', '', '1-8', '谢伙生', '与计算机导论课排在同一个上午，教室同一间。');
INSERT INTO `tc_com_ope201601` VALUES ('30', '', '2014', '计算机科学与技术（实验班）', '73', ' 计算机图形学综合实验', '  实践选修', '1.5', '36', '', '', '', '', '');
INSERT INTO `tc_com_ope201601` VALUES ('30', '85118', '2014', '计算机科学与技术（实验班）', '73', ' 计算机图形学综合实验', '  实践选修', '1.5', '36', '', '', '3-11', '谢伙生', '');
INSERT INTO `tc_com_ope201601` VALUES ('31', '', '2014', '计算机科学与技术（实验班）', '73', ' 计算机系统结构', '  学科必修', '3', '48', '', '', '', '', '');
INSERT INTO `tc_com_ope201601` VALUES ('31', '03058', '2014', '计算机科学与技术（实验班）', '73', ' 计算机系统结构', '  学科必修', '3', '48', '', '', '1-18', '尚艳艳', '课程不安排在12节');
INSERT INTO `tc_com_ope201601` VALUES ('31', '10011', '2014', '计算机科学与技术（实验班）', '73', ' 计算机系统结构', '  学科必修', '3', '48', '', '', '', '林嘉雯', '尽可能安排在上午3、4节或者下午1、2节');
INSERT INTO `tc_com_ope201601` VALUES ('32', '', '2014', '计算机科学与技术（实验班）', '73', ' 人工智能', '  专业必修（限选）', '2', '32', '', '', '', '', '');
INSERT INTO `tc_com_ope201601` VALUES ('32', '15041', '2014', '计算机科学与技术（实验班）', '73', ' 人工智能', '  专业必修（限选）', '2', '32', '', '', '', '苏雅茹', '');
INSERT INTO `tc_com_ope201601` VALUES ('32', '85034', '2014', '计算机科学与技术（实验班）', '73', ' 人工智能', '  专业必修（限选）', '2', '32', '', '', '第1周', '叶东毅', '请尽量安排在上午3-4节');
INSERT INTO `tc_com_ope201601` VALUES ('33', '', '2014', '计算机科学与技术（实验班）', '73', ' 软件工程A', '  学科必修', '3', '48', '', '', '', '', '');
INSERT INTO `tc_com_ope201601` VALUES ('33', '10044', '2014', '计算机科学与技术（实验班）', '73', ' 软件工程A', '  学科必修', '3', '48', '', '', '', '张栋', '');
INSERT INTO `tc_com_ope201601` VALUES ('33', '11048', '2014', '计算机科学与技术（实验班）', '73', ' 软件工程A', '  学科必修', '3', '48', '', '', '', '柯逍', '');
INSERT INTO `tc_com_ope201601` VALUES ('33', '94176', '2014', '计算机科学与技术（实验班）', '73', ' 软件工程A', '  学科必修', '3', '48', '', '', '1-18', '汪璟玢', '不要安排7,8节');
INSERT INTO `tc_com_ope201601` VALUES ('34', '', '2014', '计算机科学与技术（实验班）', '73', ' 软件工程实践', '  实践环节', '2', '48', '', '', '', '', '');
INSERT INTO `tc_com_ope201601` VALUES ('34', '10044', '2014', '计算机科学与技术（实验班）', '73', ' 软件工程实践', '  实践环节', '2', '48', '', '', '', '张栋', '');
INSERT INTO `tc_com_ope201601` VALUES ('34', '11048', '2014', '计算机科学与技术（实验班）', '73', ' 软件工程实践', '  实践环节', '2', '48', '', '', '', '柯逍', '');
INSERT INTO `tc_com_ope201601` VALUES ('34', '94176', '2014', '计算机科学与技术（实验班）', '73', ' 软件工程实践', '  实践环节', '2', '48', '', '', '3-18', '汪璟玢', '4节连上');
INSERT INTO `tc_com_ope201601` VALUES ('35', '', '2014', '计算机科学与技术（实验班）', '73', ' 数据挖掘技术', '  专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `tc_com_ope201601` VALUES ('35', '15041', '2014', '计算机科学与技术（实验班）', '73', ' 数据挖掘技术', '  专业选修', '2', '32', '', '', '', '苏雅茹', '');
INSERT INTO `tc_com_ope201601` VALUES ('35', '88005', '2014', '计算机科学与技术（实验班）', '73', ' 数据挖掘技术', '  专业选修', '2', '32', '', '', '', '白清源', '');
INSERT INTO `tc_com_ope201601` VALUES ('36', '', '2014', '计算机科学与技术（实验班）', '73', ' 数字信号处理', '  专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `tc_com_ope201601` VALUES ('37', '', '2014', '计算机科学与技术（实验班）', '73', ' 网络管理实验', '  实践选修', '1', '24', '', '', '', '', '');
INSERT INTO `tc_com_ope201601` VALUES ('37', '82058', '2014', '计算机科学与技术（实验班）', '73', ' 网络管理实验', '  实践选修', '1', '24', '', '', '5-7周星期日1-8节', '郭洪', '网络实验室401');
INSERT INTO `tc_com_ope201601` VALUES ('37', '96031', '2014', '计算机科学与技术（实验班）', '73', ' 网络管理实验', '  实践选修', '1', '24', '', '', '5-7周星期日1-8节', '林常俊', '网络实验室404');
INSERT INTO `tc_com_ope201601` VALUES ('38', '', '2014', '计算机科学与技术（实验班）', '73', ' 现代搜索引擎技术及应用', '  专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `tc_com_ope201601` VALUES ('39', '', '2015', '计算机科学与技术（实验班）', '70', ' IEEE Micromouse 原理与实践A（企业开课）', '  专业选修', '2', '32', '16', '', '', '', '');
INSERT INTO `tc_com_ope201601` VALUES ('39', '06033', '2015', '计算机科学与技术（实验班）', '70', ' IEEE Micromouse 原理与实践A（企业开课）', '  专业选修', '2', '32', '16', '', '第一周', '张浩', '1~6周，周四7~8节实验');
INSERT INTO `tc_com_ope201601` VALUES ('40', '', '2015', '计算机科学与技术（实验班）', '70', ' 离散数学A', '  学科必修', '4.5', '72', '', '', '', '', '');
INSERT INTO `tc_com_ope201601` VALUES ('40', '04021', '2015', '计算机科学与技术（实验班）', '70', ' 离散数学A', '  学科必修', '4.5', '72', '', '', '', '陈欢', '');
INSERT INTO `tc_com_ope201601` VALUES ('41', '', '2015', '计算机科学与技术（实验班）', '70', ' 数字电路与逻辑设计', '  学科必修', '3', '48', '', '', '', '', '');
INSERT INTO `tc_com_ope201601` VALUES ('41', '03009', '2015', '计算机科学与技术（实验班）', '70', ' 数字电路与逻辑设计', '  学科必修', '3', '48', '', '', '1~12周', '董晨', '由于龙坤在国外，前几周董晨上，后几周郭龙坤上。请尽量安排在董晨普通班同一个时间段，如：同一个上午或下午，或3、4节和5、6节。非常感谢');
INSERT INTO `tc_com_ope201601` VALUES ('41', '11061', '2015', '计算机科学与技术（实验班）', '70', ' 数字电路与逻辑设计', '  学科必修', '3', '48', '', '', '1-12', '郭龙坤', '时间为周一与周三，与董辰合上，时间须错开。');
INSERT INTO `tc_com_ope201601` VALUES ('41', '88064', '2015', '计算机科学与技术（实验班）', '70', ' 数字电路与逻辑设计', '  学科必修', '3', '48', '', '', '1-12', '胡颖', '周一3、4节周三7、8节');
INSERT INTO `tc_com_ope201601` VALUES ('42', '', '2015', '计算机科学与技术（实验班）', '70', ' 数字逻辑电路设计', '  实践环节', '2', '48', '', '', '', '', '');
INSERT INTO `tc_com_ope201601` VALUES ('42', '11061', '2015', '计算机科学与技术（实验班）', '70', ' 数字逻辑电路设计', '  实践环节', '2', '48', '', '', '6-18', '郭龙坤', '');
INSERT INTO `tc_com_ope201601` VALUES ('42', '88064', '2015', '计算机科学与技术（实验班）', '70', ' 数字逻辑电路设计', '  实践环节', '2', '48', '', '', '6-17', '胡颖', '周六1-8');
INSERT INTO `tc_com_ope201601` VALUES ('43', '', '2015', '计算机科学与技术（实验班）', '70', ' 算法与数据结构', '  学科必修', '5', '80', '', '28', '', '', '');
INSERT INTO `tc_com_ope201601` VALUES ('43', '04019', '2015', '计算机科学与技术（实验班）', '70', ' 算法与数据结构', '  学科必修', '5', '80', '', '28', '1-15', '吴英杰', '独立开班，因有多个周末需带学生外出比赛，烦请尽量排在周二至周四，谢谢！');
INSERT INTO `tc_com_ope201601` VALUES ('44', '', '2016', '计算机科学与技术（实验班）', '1', ' 高级语言程序设计', '  学科必修', '4', '64', '', '32', '', '', '');
INSERT INTO `tc_com_ope201601` VALUES ('44', '03032', '2016', '计算机科学与技术（实验班）', '1', ' 高级语言程序设计', '  学科必修', '4', '64', '', '32', '', '孙岚', '');
INSERT INTO `tc_com_ope201601` VALUES ('44', '03161', '2016', '计算机科学与技术（实验班）', '1', ' 高级语言程序设计', '  学科必修', '4', '64', '', '32', '', '林秋月', '');
INSERT INTO `tc_com_ope201601` VALUES ('44', '15028', '2016', '计算机科学与技术（实验班）', '1', ' 高级语言程序设计', '  学科必修', '4', '64', '', '32', '', '刘文犀', '');
INSERT INTO `tc_com_ope201601` VALUES ('45', '', '2016', '计算机科学与技术（实验班）', '1', ' 计算机导论', '  学科必修', '1.5', '24', '', '', '', '', '');
INSERT INTO `tc_com_ope201601` VALUES ('45', '15041', '2016', '计算机科学与技术（实验班）', '1', ' 计算机导论', '  学科必修', '1.5', '24', '', '', '', '苏雅茹', '');
INSERT INTO `tc_com_ope201601` VALUES ('45', '85073', '2016', '计算机科学与技术（实验班）', '1', ' 计算机导论', '  学科必修', '1.5', '24', '', '', '', '林世平', '');
INSERT INTO `tc_com_ope201601` VALUES ('46', '', '2016', '计算机科学与技术（实验班）', '1', ' 认识实习（计算机基础训练）', '  实践环节', '1', '24', '', '', '', '', '');
INSERT INTO `tc_com_ope201601` VALUES ('46', '85073', '2016', '计算机科学与技术（实验班）', '1', ' 认识实习（计算机基础训练）', '  实践环节', '1', '24', '', '', '', '林世平', '');

-- ----------------------------
-- Table structure for tc_infcom_ope201601
-- ----------------------------
DROP TABLE IF EXISTS `tc_infcom_ope201601`;
CREATE TABLE `tc_infcom_ope201601` (
  `insertTime` int(10) NOT NULL AUTO_INCREMENT,
  `workNumber` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `grade` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `major` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `people` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `courseName` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `courseType` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `courseCredit` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `courseHour` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `practiceHour` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `onMachineHour` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `timePeriod` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `teacherName` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `remark` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`workNumber`,`grade`,`major`,`people`,`courseName`,`courseType`,`courseCredit`,`courseHour`,`practiceHour`,`onMachineHour`,`timePeriod`,`teacherName`,`remark`),
  KEY `insertTime` (`insertTime`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tc_infcom_ope201601
-- ----------------------------
INSERT INTO `tc_infcom_ope201601` VALUES ('1', '', '2016学年上学期数学类（实验班）开课计划书', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('2', '', '年级', '专业', '专业人数', '课程名称', '选修类型', '学分', '学时', '实验', '上机', '起讫周序', '任课教师', '备注');
INSERT INTO `tc_infcom_ope201601` VALUES ('3', '', '', '', '', '', '', '', '', '学时', '学时', '', '', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('4', '', '2013', '数学与应用数学（实验班）', '23', ' C++程序设计实训', '  实践选修', '2', '48', '', '', '', '', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('5', '', '2013', '数学与应用数学（实验班）', '23', ' Java程序设计', '  实践选修', '1', '24', '', '', '', '', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('6', '', '2013', '数学与应用数学（实验班）', '23', ' 高等代数选讲', '  专业必修（限选）', '3', '48', '', '', '', '', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('7', '', '2013', '数学与应用数学（实验班）', '23', ' 计算机密码学', '  专业选修', '3', '48', '', '16', '', '', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('8', '', '2013', '数学与应用数学（实验班）', '23', ' 计算机图形学', '  专业选修', '3', '48', '', '', '', '', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('9', '', '2013', '数学与应用数学（实验班）', '23', ' 数据库应用实训', '  实践选修', '2', '48', '', '', '', '', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('10', '', '2013', '数学与应用数学（实验班）', '23', ' 数学分析选讲', '  专业必修（限选）', '3', '48', '', '', '', '', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('11', '', '2013', '数学与应用数学（实验班）', '23', ' 算法设计实训', '  实践选修', '2', '48', '', '', '', '', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('12', '', '2013', '数学与应用数学（实验班）', '23', ' 随机分析', '  专业选修', '3', '48', '', '', '', '', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('13', '', '2013', '数学与应用数学（实验班）', '23', ' 信息系统实训', '  实践选修', '2', '48', '', '', '', '', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('14', '', '2013', '数学与应用数学（实验班）', '23', ' 专业实习', '  实践环节', '3', '', '', '', '', '', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('15', '', '2013', '数学与应用数学（实验班）', '23', ' 组合图论', '  专业必修（限选）', '3', '48', '', '', '', '', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('16', '', '2013', '信息与计算科学（实验班）', '9', ' C++程序设计实训', '  实践选修', '2', '48', '', '', '', '', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('17', '', '2013', '信息与计算科学（实验班）', '9', ' Java程序设计', '  实践选修', '1', '24', '', '', '', '', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('18', '', '2013', '信息与计算科学（实验班）', '9', ' 高等代数选讲', '  专业必修（限选）', '3', '48', '', '', '', '', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('19', '', '2013', '信息与计算科学（实验班）', '9', ' 计算机密码学', '  专业选修', '3', '48', '', '16', '', '', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('20', '', '2013', '信息与计算科学（实验班）', '9', ' 计算机图形学', '  专业选修', '3', '48', '', '', '', '', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('21', '', '2013', '信息与计算科学（实验班）', '9', ' 数据库应用实训', '  实践选修', '2', '48', '', '', '', '', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('22', '', '2013', '信息与计算科学（实验班）', '9', ' 数学分析选讲', '  专业必修（限选）', '3', '48', '', '', '', '', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('23', '', '2013', '信息与计算科学（实验班）', '9', ' 算法设计实训', '  实践选修', '2', '48', '', '', '', '', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('24', '', '2013', '信息与计算科学（实验班）', '9', ' 随机分析', '  专业选修', '3', '48', '', '', '', '', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('25', '', '2013', '信息与计算科学（实验班）', '9', ' 信息系统实训', '  实践选修', '2', '48', '', '', '', '', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('26', '', '2013', '信息与计算科学（实验班）', '9', ' 专业实习', '  实践环节', '3', '', '', '', '', '', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('27', '', '2013', '信息与计算科学（实验班）', '9', ' 组合图论', '  专业必修（限选）', '3', '48', '', '', '', '', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('28', '', '2014', '数学与应用数学（实验班）', '21', ' 创新设计或课程设计', '  实践选修', '3', '72', '', '', '', '', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('29', '', '2014', '数学与应用数学（实验班）', '21', ' 泛函分析', '  专业必修（限选）', '3', '48', '', '', '', '', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('30', '', '2014', '数学与应用数学（实验班）', '21', ' 分布计算', '  专业选修', '3', '48', '', '8', '', '', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('31', '', '2014', '数学与应用数学（实验班）', '21', ' 复变函数', '  学科必修', '3', '48', '', '', '', '', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('32', '', '2014', '数学与应用数学（实验班）', '21', ' 计算机网络', '  专业选修', '3', '48', '', '16', '', '', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('33', '', '2014', '数学与应用数学（实验班）', '21', ' 金融分析', '  专业选修', '3', '48', '', '', '', '', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('34', '', '2014', '数学与应用数学（实验班）', '21', ' 近世代数', '  学科必修', '3', '48', '', '', '', '', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('35', '', '2014', '数学与应用数学（实验班）', '21', ' 面向对象程序设计B', '  专业选修', '3', '48', '', '16', '', '', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('36', '', '2014', '数学与应用数学（实验班）', '21', ' 数据挖掘', '  专业选修', '3', '48', '', '8', '', '', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('36', '88005', '2014', '数学与应用数学（实验班）', '21', ' 数据挖掘', '  专业选修', '3', '48', '', '8', '', '白清源', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('37', '', '2014', '数学与应用数学（实验班）', '21', ' 数理统计', '  学科必修', '3', '48', '', '', '', '', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('38', '', '2014', '数学与应用数学（实验班）', '21', ' 数学物理方程', '  专业必修（限选）', '3', '48', '', '', '', '', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('39', '', '2014', '数学与应用数学（实验班）', '21', ' 数字信号处理', '  专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('40', '', '2014', '数学与应用数学（实验班）', '21', ' 拓扑学基础', '  学科必修', '3', '48', '', '', '', '', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('41', '', '2014', '数学与应用数学（实验班）', '21', ' 专家系列讲座', '  专业必修（限选）', '1', '16', '', '', '', '', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('42', '', '2014', '信息与计算科学（实验班）', '9', ' 创新设计或课程设计', '  实践选修', '3', '72', '', '', '', '', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('43', '', '2014', '信息与计算科学（实验班）', '9', ' 泛函分析', '  专业必修（限选）', '3', '48', '', '', '', '', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('44', '', '2014', '信息与计算科学（实验班）', '9', ' 分布计算', '  专业选修', '3', '48', '', '8', '', '', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('45', '', '2014', '信息与计算科学（实验班）', '9', ' 复变函数', '  学科必修', '3', '48', '', '', '', '', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('46', '', '2014', '信息与计算科学（实验班）', '9', ' 计算机网络', '  专业选修', '3', '48', '', '16', '', '', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('47', '', '2014', '信息与计算科学（实验班）', '9', ' 金融分析', '  专业选修', '3', '48', '', '', '', '', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('48', '', '2014', '信息与计算科学（实验班）', '9', ' 近世代数', '  学科必修', '3', '48', '', '', '', '', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('49', '', '2014', '信息与计算科学（实验班）', '9', ' 面向对象程序设计B', '  专业选修', '3', '48', '', '16', '', '', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('50', '', '2014', '信息与计算科学（实验班）', '9', ' 数据挖掘', '  专业选修', '3', '48', '', '8', '', '', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('50', '88005', '2014', '信息与计算科学（实验班）', '9', ' 数据挖掘', '  专业选修', '3', '48', '', '8', '', '白清源', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('51', '', '2014', '信息与计算科学（实验班）', '9', ' 数理统计', '  学科必修', '3', '48', '', '', '', '', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('52', '', '2014', '信息与计算科学（实验班）', '9', ' 数学物理方程', '  专业必修（限选）', '3', '48', '', '', '', '', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('53', '', '2014', '信息与计算科学（实验班）', '9', ' 数字信号处理', '  专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('54', '', '2014', '信息与计算科学（实验班）', '9', ' 拓扑学基础', '  学科必修', '3', '48', '', '', '', '', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('55', '', '2014', '信息与计算科学（实验班）', '9', ' 专家系列讲座', '  专业必修（限选）', '1', '16', '', '', '', '', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('56', '', '2015', '数学类（实验班）', '29', ' Web设计软件应用实训', '  实践环节', '2', '48', '', '', '', '', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('57', '', '2015', '数学类（实验班）', '29', ' 常微分方程', '  学科必修', '3', '48', '', '', '', '', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('58', '', '2015', '数学类（实验班）', '29', ' 数据结构', '  学科必修', '3.5', '56', '', '16', '', '', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('59', '', '2015', '数学类（实验班）', '29', ' 数据库原理及应用', '  专业选修', '3', '48', '', '16', '', '', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('60', '', '2015', '数学类（实验班）', '29', ' 数理逻辑', '  学科必修', '2', '32', '', '', '', '', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('61', '', '2015', '数学类（实验班）', '29', ' 数学分析（下）', '  学科必修', '6', '96', '', '', '', '', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('62', '', '2016', '数学类（实验班）', '1', ' 高等代数（上）', '  学科必修', '3.5', '56', '', '', '', '', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('63', '', '2016', '数学类（实验班）', '1', ' 解析几何', '  学科必修', '2.5', '40', '', '', '', '', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('64', '', '2016', '数学类（实验班）', '1', ' 数学分析（上）', '  学科必修', '5', '80', '', '', '', '', '');
INSERT INTO `tc_infcom_ope201601` VALUES ('65', '', '2016', '数学类（实验班）', '1', ' 数学学科导论（数学史）', '  学科必修', '1', '16', '', '', '', '', '');

-- ----------------------------
-- Table structure for tc_inf_sec201601
-- ----------------------------
DROP TABLE IF EXISTS `tc_inf_sec201601`;
CREATE TABLE `tc_inf_sec201601` (
  `insertTime` int(10) NOT NULL AUTO_INCREMENT,
  `workNumber` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `grade` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `major` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `people` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `courseName` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `courseType` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `courseCredit` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `courseHour` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `practiceHour` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `onMachineHour` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `timePeriod` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `teacherName` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `remark` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`workNumber`,`grade`,`major`,`people`,`courseName`,`courseType`,`courseCredit`,`courseHour`,`practiceHour`,`onMachineHour`,`timePeriod`,`teacherName`,`remark`),
  KEY `insertTime` (`insertTime`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tc_inf_sec201601
-- ----------------------------
INSERT INTO `tc_inf_sec201601` VALUES ('1', '', '2016学年上学期信息安全专业开课计划书', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `tc_inf_sec201601` VALUES ('2', '', '年级', '专业', '专业人数', '课程名称', '选修类型', '学分', '学时', '实验', '上机', '起讫周序', '任课教师', '备注');
INSERT INTO `tc_inf_sec201601` VALUES ('3', '', '', '', '', '', '', '', '', '学时', '学时', '', '', '');
INSERT INTO `tc_inf_sec201601` VALUES ('4', '', '2013', '信息安全', '37', ' Internet技术与协议分析实验', '  实践选修', '1', '24', '', '', '', '', '');
INSERT INTO `tc_inf_sec201601` VALUES ('4', '03030', '2013', '信息安全', '37', ' Internet技术与协议分析实验', '  实践选修', '1', '24', '', '', '', '蒋启强', '(何萧玲、张浩合上)');
INSERT INTO `tc_inf_sec201601` VALUES ('5', '', '2013', '信息安全', '37', ' IT企业项目实训', '  实践选修', '2', '48', '', '', '', '', '');
INSERT INTO `tc_inf_sec201601` VALUES ('5', '02005', '2013', '信息安全', '37', ' IT企业项目实训', '  实践选修', '2', '48', '', '', '', '孙及园', '');
INSERT INTO `tc_inf_sec201601` VALUES ('6', '', '2013', '信息安全', '37', ' 安全协议导论', '  专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `tc_inf_sec201601` VALUES ('7', '', '2013', '信息安全', '37', ' 电子商务信息安全技术', '  专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `tc_inf_sec201601` VALUES ('8', '', '2013', '信息安全', '37', ' 可信系统与可信计算', '  专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `tc_inf_sec201601` VALUES ('9', '', '2013', '信息安全', '37', ' 信息安全科技实训 2', '  实践环节', '1', '24', '', '', '', '', '');
INSERT INTO `tc_inf_sec201601` VALUES ('9', '06033', '2013', '信息安全', '37', ' 信息安全科技实训 2', '  实践环节', '1', '24', '', '', '第九周', '张浩', '每次四节课，张浩、李应、倪一涛、邹剑、何萧玲共同承担');
INSERT INTO `tc_inf_sec201601` VALUES ('9', '98004', '2013', '信息安全', '37', ' 信息安全科技实训 2', '  实践环节', '1', '24', '', '', '', '倪一涛', '');
INSERT INTO `tc_inf_sec201601` VALUES ('10', '', '2014', '信息安全', '39', ' Java语言程序设计', '  实践选修', '1.5', '36', '', '', '', '', '');
INSERT INTO `tc_inf_sec201601` VALUES ('11', '', '2014', '信息安全', '39', ' Linux操作系统设计实践', '  实践选修', '1.5', '36', '', '', '', '', '');
INSERT INTO `tc_inf_sec201601` VALUES ('11', '03003', '2014', '信息安全', '39', ' Linux操作系统设计实践', '  实践选修', '1.5', '36', '', '', '', '程烨', '周4学时连上,机房上课。程烨一个班，郭红一个班，两个班安排同一时间段上课，每班限选人数60人。');
INSERT INTO `tc_inf_sec201601` VALUES ('11', '89085', '2014', '信息安全', '39', ' Linux操作系统设计实践', '  实践选修', '1.5', '36', '', '', '', '郭红', '周4学时连上,机房上课。程烨一个班，郭红一个班，两个班安排同一时间段上课，每班限选人数60人。');
INSERT INTO `tc_inf_sec201601` VALUES ('12', '', '2014', '信息安全', '39', ' 编译方法', '  学科必修', '3', '48', '', '', '', '', '');
INSERT INTO `tc_inf_sec201601` VALUES ('12', '03154', '2014', '信息安全', '39', ' 编译方法', '  学科必修', '3', '48', '', '', '1-12', '陈晖', '（刘秉瀚、陈晖）合作上1个班，希望安排在上午3，4节或下午的5，6节。');
INSERT INTO `tc_inf_sec201601` VALUES ('12', '04166', '2014', '信息安全', '39', ' 编译方法', '  学科必修', '3', '48', '', '', '', '何振峰', '理论课与实践课选同一老师');
INSERT INTO `tc_inf_sec201601` VALUES ('12', '83046', '2014', '信息安全', '39', ' 编译方法', '  学科必修', '3', '48', '', '', '1-12', '刘秉瀚', '（刘秉瀚、陈晖）合作上1个班，希望安排在下午的5，6节。');
INSERT INTO `tc_inf_sec201601` VALUES ('13', '', '2014', '信息安全', '39', ' 编译系统设计实践', '  实践选修', '1.5', '', '', '', '', '', '');
INSERT INTO `tc_inf_sec201601` VALUES ('13', '03154', '2014', '信息安全', '39', ' 编译系统设计实践', '  实践选修', '1.5', '', '', '', '第4周开始', '陈晖', '刘秉瀚、陈晖，分成2个班，要求与《编译方法》同一学期上，滞后3周，每周4节，安排周六。选修《编译系统设计实践》和理论课《编译方法》的老师要一致');
INSERT INTO `tc_inf_sec201601` VALUES ('13', '04166', '2014', '信息安全', '39', ' 编译系统设计实践', '  实践选修', '1.5', '', '', '', '', '何振峰', '理论课与实践课选同一老师');
INSERT INTO `tc_inf_sec201601` VALUES ('13', '83046', '2014', '信息安全', '39', ' 编译系统设计实践', '  实践选修', '1.5', '', '', '', '4-12', '刘秉瀚', '分成2个班，要求与《编译方法》同一学期上，滞后3周，每周4节，安排周六。选修《编译系统设计实践》和理论课《编译方法》的老师要一致');
INSERT INTO `tc_inf_sec201601` VALUES ('14', '', '2014', '信息安全', '39', ' 操作系统与数据库安全', '  专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `tc_inf_sec201601` VALUES ('14', '96070', '2014', '信息安全', '39', ' 操作系统与数据库安全', '  专业选修', '2', '32', '', '', '', '刘延华', '请不要安排在1-2节和7-8节，谢谢！');
INSERT INTO `tc_inf_sec201601` VALUES ('15', '', '2014', '信息安全', '39', ' 概率论与数理统计', '  公共必修', '3', '48', '', '', '', '', '');
INSERT INTO `tc_inf_sec201601` VALUES ('16', '', '2014', '信息安全', '39', ' 计算机病毒概论', '  专业必修（限选）', '2', '32', '', '', '', '', '');
INSERT INTO `tc_inf_sec201601` VALUES ('16', '98004', '2014', '信息安全', '39', ' 计算机病毒概论', '  专业必修（限选）', '2', '32', '', '', '1至8周', '倪一涛', '请安排在院实验室上课');
INSERT INTO `tc_inf_sec201601` VALUES ('17', '', '2014', '信息安全', '39', ' 人工智能', '  专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `tc_inf_sec201601` VALUES ('17', '85073', '2014', '信息安全', '39', ' 人工智能', '  专业选修', '2', '32', '', '', '', '林世平', '');
INSERT INTO `tc_inf_sec201601` VALUES ('17', '87007', '2014', '信息安全', '39', ' 人工智能', '  专业选修', '2', '32', '', '', '第一周', '陈昭炯', '不排在上午1-2节');
INSERT INTO `tc_inf_sec201601` VALUES ('18', '', '2014', '信息安全', '39', ' 数据挖掘技术', '  专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `tc_inf_sec201601` VALUES ('18', '88005', '2014', '信息安全', '39', ' 数据挖掘技术', '  专业选修', '2', '32', '', '', '', '白清源', '');
INSERT INTO `tc_inf_sec201601` VALUES ('19', '', '2014', '信息安全', '39', ' 通信原理', '  专业必修（限选）', '3', '48', '', '', '', '', '');
INSERT INTO `tc_inf_sec201601` VALUES ('19', '11037', '2014', '信息安全', '39', ' 通信原理', '  专业必修（限选）', '3', '48', '', '', '1-16周', '陈开志', '安排下午上课，5-8节之间都可以');
INSERT INTO `tc_inf_sec201601` VALUES ('20', '', '2014', '信息安全', '39', ' 网络程序设计', '  专业必修（限选）', '2.5', '40', '', '', '', '', '');
INSERT INTO `tc_inf_sec201601` VALUES ('20', '06033', '2014', '信息安全', '39', ' 网络程序设计', '  专业必修（限选）', '2.5', '40', '', '', '第一周', '张浩', '和去年一样星期2,5:3-4节; 尽量安排在上午3、4节课');
INSERT INTO `tc_inf_sec201601` VALUES ('21', '', '2014', '信息安全', '39', ' 网络程序设计实践', '  实践环节', '1', '24', '', '', '', '', '');
INSERT INTO `tc_inf_sec201601` VALUES ('21', '06033', '2014', '信息安全', '39', ' 网络程序设计实践', '  实践环节', '1', '24', '', '', '第四周', '张浩', '和去年一样星期2：5-8节');
INSERT INTO `tc_inf_sec201601` VALUES ('22', '', '2014', '信息安全', '39', ' 网络攻防实验', '  实践环节', '1.5', '36', '', '', '', '', '');
INSERT INTO `tc_inf_sec201601` VALUES ('22', '95098', '2014', '信息安全', '39', ' 网络攻防实验', '  实践环节', '1.5', '36', '', '', '15-19周', '何萧玲', '请安排每周一次，每次8学时，请安排在周六，谢谢');
INSERT INTO `tc_inf_sec201601` VALUES ('23', '', '2014', '信息安全', '39', ' 网络信息对抗与安全', '  专业必修（限选）', '3', '48', '8', '', '', '', '');
INSERT INTO `tc_inf_sec201601` VALUES ('23', '95098', '2014', '信息安全', '39', ' 网络信息对抗与安全', '  专业必修（限选）', '3', '48', '8', '', '12-19周', '何萧玲', '请12-17周每周2次课，每次3学时（可否安排在晚上？不行请安排下午，谢谢），第18周，每周两次，每次2学时，19周上机，每周两次，每次4学时。（钟尚平老师合班上课）');
INSERT INTO `tc_inf_sec201601` VALUES ('24', '', '2014', '信息安全', '39', ' 现代搜索引擎技术及应用', '  专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `tc_inf_sec201601` VALUES ('25', '', '2014', '信息安全', '39', ' 信息论与编码', '  学科必修', '2', '32', '', '', '', '', '');
INSERT INTO `tc_inf_sec201601` VALUES ('25', '02005', '2014', '信息安全', '39', ' 信息论与编码', '  学科必修', '2', '32', '', '', '', '孙及园', '请安排在1～18周的下午，每周2节课');
INSERT INTO `tc_inf_sec201601` VALUES ('26', '', '2015', '信息安全', '50', ' 离散数学A', '  学科必修', '4.5', '72', '', '', '', '', '');
INSERT INTO `tc_inf_sec201601` VALUES ('26', '03171', '2015', '信息安全', '50', ' 离散数学A', '  学科必修', '4.5', '72', '', '', '', '王一蕾', '请尽量将我的课排在上午');
INSERT INTO `tc_inf_sec201601` VALUES ('26', '08076', '2015', '信息安全', '50', ' 离散数学A', '  学科必修', '4.5', '72', '', '', '1-16', '陈勃', '');
INSERT INTO `tc_inf_sec201601` VALUES ('27', '', '2015', '信息安全', '50', ' 密码理论与技术', '  专业必修（限选）', '3', '48', '', '', '', '', '');
INSERT INTO `tc_inf_sec201601` VALUES ('27', '12005', '2015', '信息安全', '50', ' 密码理论与技术', '  专业必修（限选）', '3', '48', '', '', '1-16', '杨旸', '请排3-4节课，谢谢！');
INSERT INTO `tc_inf_sec201601` VALUES ('28', '', '2015', '信息安全', '50', ' 密码学综合设计实验', '  实践环节', '1', '24', '', '', '', '', '');
INSERT INTO `tc_inf_sec201601` VALUES ('28', '12005', '2015', '信息安全', '50', ' 密码学综合设计实验', '  实践环节', '1', '24', '', '', '5-16', '杨旸', '4节连上！请排一个上午或一个下午');
INSERT INTO `tc_inf_sec201601` VALUES ('29', '', '2015', '信息安全', '50', ' 数字电路与逻辑设计', '  学科必修', '3', '48', '', '', '', '', '');
INSERT INTO `tc_inf_sec201601` VALUES ('29', '03009', '2015', '信息安全', '50', ' 数字电路与逻辑设计', '  学科必修', '3', '48', '', '', '1~12', '董晨', '如果可以，请安排在周1的3、4节和周3的7、8节');
INSERT INTO `tc_inf_sec201601` VALUES ('29', '88064', '2015', '信息安全', '50', ' 数字电路与逻辑设计', '  学科必修', '3', '48', '', '', '1-12', '胡颖', '周一3、4节，周三7、8节');
INSERT INTO `tc_inf_sec201601` VALUES ('30', '', '2015', '信息安全', '50', ' 数字逻辑电路设计', '  实践选修', '2', '48', '', '', '', '', '');
INSERT INTO `tc_inf_sec201601` VALUES ('30', '03009', '2015', '信息安全', '50', ' 数字逻辑电路设计', '  实践选修', '2', '48', '', '', '6~期末', '董晨', '董晨老师班请安排在周一下午或周五下午，与胡颖老师和郭龙坤老师不能同时，因为共用一个实验室');
INSERT INTO `tc_inf_sec201601` VALUES ('30', '88064', '2015', '信息安全', '50', ' 数字逻辑电路设计', '  实践选修', '2', '48', '', '', '6-17', '胡颖', '周六1-8节');
INSERT INTO `tc_inf_sec201601` VALUES ('31', '', '2015', '信息安全', '50', ' 算法与数据结构', '  学科必修', '5', '80', '', '28', '', '', '');
INSERT INTO `tc_inf_sec201601` VALUES ('31', '04059', '2015', '信息安全', '50', ' 算法与数据结构', '  学科必修', '5', '80', '', '28', '1-14', '余春艳', '');
INSERT INTO `tc_inf_sec201601` VALUES ('31', '06018', '2015', '信息安全', '50', ' 算法与数据结构', '  学科必修', '5', '80', '', '28', '1-13', '傅仰耿', '（傅仰耿、王晓东），不排周一周五，上机排在第一次授课之后');
INSERT INTO `tc_inf_sec201601` VALUES ('32', '', '2016', '信息安全', '1', ' 高级语言程序设计', '  学科必修', '4', '64', '', '32', '', '', '');
INSERT INTO `tc_inf_sec201601` VALUES ('32', '03161', '2016', '信息安全', '1', ' 高级语言程序设计', '  学科必修', '4', '64', '', '32', '', '林秋月', '');
INSERT INTO `tc_inf_sec201601` VALUES ('33', '', '2016', '信息安全', '1', ' 计算机导论', '  学科必修', '1.5', '24', '', '', '', '', '');
INSERT INTO `tc_inf_sec201601` VALUES ('33', '08076', '2016', '信息安全', '1', ' 计算机导论', '  学科必修', '1.5', '24', '', '', '3-10', '陈勃', '');
INSERT INTO `tc_inf_sec201601` VALUES ('33', '85118', '2016', '信息安全', '1', ' 计算机导论', '  学科必修', '1.5', '24', '', '', '3-10', '谢伙生', '与计算机图形学课排在同一个上午，教室同一间。');
INSERT INTO `tc_inf_sec201601` VALUES ('34', '', '2016', '信息安全', '1', ' 认识实习（计算机基础训练）', '  实践环节', '1', '24', '', '', '', '', '');
INSERT INTO `tc_inf_sec201601` VALUES ('34', '08076', '2016', '信息安全', '1', ' 认识实习（计算机基础训练）', '  实践环节', '1', '24', '', '', '10-15', '陈勃', '');
INSERT INTO `tc_inf_sec201601` VALUES ('34', '85118', '2016', '信息安全', '1', ' 认识实习（计算机基础训练）', '  实践环节', '1', '24', '', '', '11-16', '谢伙生', '');
INSERT INTO `tc_inf_sec201601` VALUES ('35', '', '2016', '信息安全', '1', ' 信息安全概论', '  学科必修', '1.5', '24', '', '', '', '', '');
INSERT INTO `tc_inf_sec201601` VALUES ('35', '02112', '2016', '信息安全', '1', ' 信息安全概论', '  学科必修', '1.5', '24', '', '', '', '陈明志', '');

-- ----------------------------
-- Table structure for tc_math_nor201601
-- ----------------------------
DROP TABLE IF EXISTS `tc_math_nor201601`;
CREATE TABLE `tc_math_nor201601` (
  `insertTime` int(10) NOT NULL AUTO_INCREMENT,
  `workNumber` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `grade` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `major` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `people` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `courseName` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `courseType` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `courseCredit` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `courseHour` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `practiceHour` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `onMachineHour` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `timePeriod` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `teacherName` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `remark` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`workNumber`,`grade`,`major`,`people`,`courseName`,`courseType`,`courseCredit`,`courseHour`,`practiceHour`,`onMachineHour`,`timePeriod`,`teacherName`,`remark`),
  KEY `insertTime` (`insertTime`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tc_math_nor201601
-- ----------------------------
INSERT INTO `tc_math_nor201601` VALUES ('1', '', '2016学年上学期数学类开课计划书', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('2', '', '年级', '专业', '专业人数', '课程名称', '选修类型', '学分', '学时', '实验', '上机', '起讫周序', '任课教师', '备注');
INSERT INTO `tc_math_nor201601` VALUES ('3', '', '', '', '', '', '', '', '', '学时', '学时', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('4', '', '2013', '数学与应用数学', '45', ' C++程序设计实训', '  实践环节', '2', '48', '', '', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('5', '', '2013', '数学与应用数学', '45', ' Java程序设计', '  实践选修', '1', '24', '', '24', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('6', '', '2013', '数学与应用数学', '45', ' 高等代数选讲', '  实践选修', '2', '48', '', '', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('7', '', '2013', '数学与应用数学', '45', ' 高级微观经济学', '  专业必修（限选）', '3', '48', '', '', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('8', '', '2013', '数学与应用数学', '45', ' 计算机密码学', '  专业选修', '3', '48', '', '16', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('9', '', '2013', '数学与应用数学', '45', ' 计算机图形学', '  专业选修', '3', '48', '', '', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('10', '', '2013', '数学与应用数学', '45', ' 金融学选讲', '  专业必修（限选）', '3', '48', '', '', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('11', '', '2013', '数学与应用数学', '45', ' 矩阵论及其应用', '  专业必修（限选）', '3', '48', '', '', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('12', '', '2013', '数学与应用数学', '45', ' 数据库应用实训', '  实践选修', '2', '48', '', '', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('13', '', '2013', '数学与应用数学', '45', ' 数学分析选讲', '  实践选修', '2', '48', '', '', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('14', '', '2013', '数学与应用数学', '45', ' 算法设计实训', '  实践选修', '2', '48', '', '', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('15', '', '2013', '数学与应用数学', '45', ' 随机分析', '  专业选修', '3', '48', '', '', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('16', '', '2013', '数学与应用数学', '45', ' 微分方程定性理论', '  专业必修（限选）', '3', '48', '', '', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('17', '', '2013', '数学与应用数学', '45', ' 微分方程稳定性理论', '  专业必修（限选）', '3', '48', '', '', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('18', '', '2013', '数学与应用数学', '45', ' 小波分析及其应用', '  专业必修（限选）', '3', '48', '', '', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('19', '', '2013', '数学与应用数学', '45', ' 信息系统实训', '  实践选修', '2', '48', '', '', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('20', '', '2013', '数学与应用数学', '45', ' 专业实习(数学与应用数学)', '  实践选修', '3', '', '', '', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('21', '', '2013', '信息与计算科学', '43', ' C++程序设计实训', '  实践环节', '2', '48', '', '', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('22', '', '2013', '信息与计算科学', '43', ' Java程序设计', '  实践选修', '1', '24', '', '24', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('23', '', '2013', '信息与计算科学', '43', ' 高等代数选讲', '  实践选修', '2', '48', '', '', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('24', '', '2013', '信息与计算科学', '43', ' 计算机密码学', '  专业选修', '3', '48', '', '16', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('25', '', '2013', '信息与计算科学', '43', ' 计算机图形学', '  专业选修', '3', '48', '', '', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('26', '', '2013', '信息与计算科学', '43', ' 数据库应用实训', '  实践选修', '2', '48', '', '', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('27', '', '2013', '信息与计算科学', '43', ' 数学分析选讲', '  实践选修', '2', '48', '', '', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('28', '', '2013', '信息与计算科学', '43', ' 算法设计实训', '  实践选修', '2', '48', '', '', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('29', '', '2013', '信息与计算科学', '43', ' 随机分析', '  专业选修', '3', '48', '', '', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('30', '', '2013', '信息与计算科学', '43', ' 统计计算和统计软件', '  专业选修', '3', '48', '', '16', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('31', '', '2013', '信息与计算科学', '43', ' 拓扑学基础', '  专业选修', '3', '48', '', '', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('32', '', '2013', '信息与计算科学', '43', ' 信息系统实训', '  实践选修', '2', '48', '', '', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('33', '', '2013', '信息与计算科学', '43', ' 专业实习(信息与计算科学)', '  实践选修', '3', '', '', '', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('34', '', '2014', '数学与应用数学', '45', ' 操作系统', '  专业选修', '3', '48', '', '16', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('35', '', '2014', '数学与应用数学', '45', ' 泛函分析', '  学科必修', '3', '48', '', '', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('36', '', '2014', '数学与应用数学', '45', ' 复变函数', '  学科必修', '3', '48', '', '', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('37', '', '2014', '数学与应用数学', '45', ' 计算机网络', '  专业选修', '3', '48', '', '16', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('38', '', '2014', '数学与应用数学', '45', ' 计算机组成原理B', '  专业选修', '2', '32', '', '8', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('39', '', '2014', '数学与应用数学', '45', ' 金融分析', '  专业必修（限选）', '3', '48', '', '', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('40', '', '2014', '数学与应用数学', '45', ' 近世代数', '  专业必修（限选）', '3', '48', '', '', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('41', '', '2014', '数学与应用数学', '45', ' 面向对象程序设计B', '  专业选修', '3', '48', '', '16', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('42', '', '2014', '数学与应用数学', '45', ' 数据挖掘', '  专业必修（限选）', '3', '48', '', '8', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('42', '88005', '2014', '数学与应用数学', '45', ' 数据挖掘', '  专业必修（限选）', '3', '48', '', '8', '', '白清源', '');
INSERT INTO `tc_math_nor201601` VALUES ('43', '', '2014', '数学与应用数学', '45', ' 数学物理方程', '  学科必修', '3', '48', '', '', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('44', '', '2014', '数学与应用数学', '45', ' 数值代数', '  专业选修', '3', '48', '', '', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('45', '', '2014', '数学与应用数学', '45', ' 随机过程', '  专业必修（限选）', '3', '48', '', '', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('46', '', '2014', '数学与应用数学', '45', ' 统计计算和统计软件', '  专业必修（限选）', '3', '48', '', '16', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('47', '', '2014', '数学与应用数学', '45', ' 投资学', '  专业必修（限选）', '3', '48', '', '', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('48', '', '2014', '数学与应用数学', '45', ' 拓扑学基础', '  专业必修（限选）', '3', '48', '', '', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('49', '', '2014', '数学与应用数学', '45', ' 信息科学基础', '  专业选修', '3', '48', '', '', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('50', '', '2014', '数学与应用数学', '45', ' 专家系列讲座', '  专业选修', '1', '16', '', '', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('51', '', '2014', '信息与计算科学', '44', ' 操作系统', '  专业选修', '3', '48', '', '16', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('52', '', '2014', '信息与计算科学', '44', ' 泛函分析', '  学科必修', '3', '48', '', '', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('53', '', '2014', '信息与计算科学', '44', ' 分布计算', '  专业必修（限选）', '3', '48', '', '8', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('54', '', '2014', '信息与计算科学', '44', ' 复变函数', '  学科必修', '3', '48', '', '', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('55', '', '2014', '信息与计算科学', '44', ' 计算机网络', '  专业选修', '3', '48', '', '16', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('56', '', '2014', '信息与计算科学', '44', ' 计算机组成原理B', '  专业选修', '2', '32', '', '8', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('57', '', '2014', '信息与计算科学', '44', ' 近世代数', '  专业选修', '3', '48', '', '', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('58', '', '2014', '信息与计算科学', '44', ' 面向对象程序设计B', '  专业选修', '3', '48', '', '16', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('59', '', '2014', '信息与计算科学', '44', ' 数据挖掘', '  专业必修（限选）', '3', '48', '', '8', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('59', '88005', '2014', '信息与计算科学', '44', ' 数据挖掘', '  专业必修（限选）', '3', '48', '', '8', '', '白清源', '');
INSERT INTO `tc_math_nor201601` VALUES ('60', '', '2014', '信息与计算科学', '44', ' 数学物理方程', '  学科必修', '3', '48', '', '', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('61', '', '2014', '信息与计算科学', '44', ' 数值代数', '  专业选修', '3', '48', '', '', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('62', '', '2014', '信息与计算科学', '44', ' 信息科学基础', '  专业选修', '3', '48', '', '', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('63', '', '2014', '信息与计算科学', '44', ' 专家系列讲座', '  专业选修', '1', '16', '', '', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('64', '', '2014', '信息与计算科学', '44', ' 组合数学', '  专业必修（限选）', '3', '48', '', '', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('65', '', '2015', '数学类', '75', ' Web设计软件应用实训', '  实践环节', '2', '48', '', '', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('66', '', '2015', '数学类', '75', ' 常微分方程', '  学科必修', '3', '48', '', '', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('67', '', '2015', '数学类', '75', ' 数据结构', '  学科必修', '3.5', '56', '', '16', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('68', '', '2015', '数学类', '75', ' 数理逻辑', '  学科必修', '2', '32', '', '', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('69', '', '2015', '数学类', '75', ' 数学分析（下）', '  学科必修', '6', '96', '', '', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('70', '', '2016', '数学类', '1', ' 大学信息技术基础', '  公共必修', '2', '40', '', '24', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('71', '', '2016', '数学类', '1', ' 高等代数（上）', '  学科必修', '3.5', '56', '', '', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('72', '', '2016', '数学类', '1', ' 解析几何', '  学科必修', '2.5', '40', '', '', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('73', '', '2016', '数学类', '1', ' 数学分析（上）', '  学科必修', '5', '80', '', '', '', '', '');
INSERT INTO `tc_math_nor201601` VALUES ('74', '', '2016', '数学类', '1', ' 数学学科导论（数学史）', '  学科必修', '1', '16', '', '', '', '', '');

-- ----------------------------
-- Table structure for tc_net_pro201601
-- ----------------------------
DROP TABLE IF EXISTS `tc_net_pro201601`;
CREATE TABLE `tc_net_pro201601` (
  `insertTime` int(10) NOT NULL AUTO_INCREMENT,
  `workNumber` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `grade` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `major` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `people` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `courseName` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `courseType` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `courseCredit` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `courseHour` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `practiceHour` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `onMachineHour` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `timePeriod` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `teacherName` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `remark` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`workNumber`,`grade`,`major`,`people`,`courseName`,`courseType`,`courseCredit`,`courseHour`,`practiceHour`,`onMachineHour`,`timePeriod`,`teacherName`,`remark`),
  KEY `insertTime` (`insertTime`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tc_net_pro201601
-- ----------------------------
INSERT INTO `tc_net_pro201601` VALUES ('1', '', '2016学年上学期网络工程专业开课计划书', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `tc_net_pro201601` VALUES ('2', '', '年级', '专业', '专业人数', '课程名称', '选修类型', '学分', '学时', '实验', '上机', '起讫周序', '任课教师', '备注');
INSERT INTO `tc_net_pro201601` VALUES ('3', '', '', '', '', '', '', '', '', '学时', '学时', '', '', '');
INSERT INTO `tc_net_pro201601` VALUES ('4', '', '2013', '网络工程', '28', ' Internet技术与协议分析实验', '  实践选修', '1', '24', '', '', '', '', '');
INSERT INTO `tc_net_pro201601` VALUES ('5', '', '2013', '网络工程', '28', ' IT企业项目实训', '  实践选修', '2', '48', '', '', '', '', '');
INSERT INTO `tc_net_pro201601` VALUES ('5', '02005', '2013', '网络工程', '28', ' IT企业项目实训', '  实践选修', '2', '48', '', '', '', '孙及园', '');
INSERT INTO `tc_net_pro201601` VALUES ('6', '', '2013', '网络工程', '28', ' 多媒体通信技术', '  专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `tc_net_pro201601` VALUES ('6', '02005', '2013', '网络工程', '28', ' 多媒体通信技术', '  专业选修', '2', '32', '', '', '', '孙及园', '请安排在2～9周的下午，每周4节课');
INSERT INTO `tc_net_pro201601` VALUES ('7', '', '2013', '网络工程', '28', ' 分布式操作系统', '  专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `tc_net_pro201601` VALUES ('7', '95057', '2013', '网络工程', '28', ' 分布式操作系统', '  专业选修', '2', '32', '', '', '1-16', '丁善镜', '第5，6节');
INSERT INTO `tc_net_pro201601` VALUES ('8', '', '2013', '网络工程', '28', ' 分布式系统', '  专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `tc_net_pro201601` VALUES ('9', '', '2013', '网络工程', '28', ' 广域网技术实验', '  实践选修', '1', '24', '', '', '', '', '');
INSERT INTO `tc_net_pro201601` VALUES ('9', '03030', '2013', '网络工程', '28', ' 广域网技术实验', '  实践选修', '1', '24', '', '', '', '蒋启强', '');
INSERT INTO `tc_net_pro201601` VALUES ('10', '', '2013', '网络工程', '28', ' 互联网产品设计', '  专业选修', '2.5', '40', '', '', '', '', '');
INSERT INTO `tc_net_pro201601` VALUES ('11', '', '2013', '网络工程', '28', ' 软件可靠性与可信软件', '  专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `tc_net_pro201601` VALUES ('12', '', '2013', '网络工程', '28', ' 网络设计与集成', '  专业必修（限选）', '2', '32', '', '', '', '', '');
INSERT INTO `tc_net_pro201601` VALUES ('12', '03030', '2013', '网络工程', '28', ' 网络设计与集成', '  专业必修（限选）', '2', '32', '', '', '', '蒋启强', '');
INSERT INTO `tc_net_pro201601` VALUES ('13', '', '2013', '网络工程', '28', ' 虚拟现实', '  专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `tc_net_pro201601` VALUES ('14', '', '2013', '网络工程', '28', ' 云计算', '  专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `tc_net_pro201601` VALUES ('15', '', '2014', '网络工程', '27', ' Java语言程序设计', '  实践选修', '2', '48', '', '', '', '', '');
INSERT INTO `tc_net_pro201601` VALUES ('15', '06420', '2014', '网络工程', '27', ' Java语言程序设计', '  实践选修', '2', '48', '', '', '1-16', '陈嘉', '因课时较多，希望能一周少安排一些课，多安排几周');
INSERT INTO `tc_net_pro201601` VALUES ('16', '', '2014', '网络工程', '27', ' Linux操作系统设计实践', '  实践选修', '1.5', '36', '', '', '', '', '');
INSERT INTO `tc_net_pro201601` VALUES ('16', '03003', '2014', '网络工程', '27', ' Linux操作系统设计实践', '  实践选修', '1.5', '36', '', '', '', '程烨', '周4学时连上,机房上课。程烨一个班，郭红一个班，两个班安排同一时间段上课，每班限选人数60人。');
INSERT INTO `tc_net_pro201601` VALUES ('16', '89085', '2014', '网络工程', '27', ' Linux操作系统设计实践', '  实践选修', '1.5', '36', '', '', '', '郭红', '周4学时连上,机房上课。程烨一个班，郭红一个班，两个班安排同一时间段上课，每班限选人数60人。');
INSERT INTO `tc_net_pro201601` VALUES ('17', '', '2014', '网络工程', '27', ' 编译方法', '  学科必修', '3', '48', '', '', '', '', '');
INSERT INTO `tc_net_pro201601` VALUES ('17', '03154', '2014', '网络工程', '27', ' 编译方法', '  学科必修', '3', '48', '', '', '1--12', '陈晖', '（刘秉瀚、陈晖）合作上1个班，希望安排在上午3，4节或下午的5，6节。');
INSERT INTO `tc_net_pro201601` VALUES ('17', '04166', '2014', '网络工程', '27', ' 编译方法', '  学科必修', '3', '48', '', '', '', '何振峰', '理论课与实践课选同一老师');
INSERT INTO `tc_net_pro201601` VALUES ('17', '83046', '2014', '网络工程', '27', ' 编译方法', '  学科必修', '3', '48', '', '', '1-12', '刘秉瀚', '（刘秉瀚、陈晖）合作上1个班，希望安排在下午的5，6节。');
INSERT INTO `tc_net_pro201601` VALUES ('18', '', '2014', '网络工程', '27', ' 编译系统设计实践', '  实践选修', '1.5', '36', '', '', '', '', '');
INSERT INTO `tc_net_pro201601` VALUES ('18', '03154', '2014', '网络工程', '27', ' 编译系统设计实践', '  实践选修', '1.5', '36', '', '', '第4周开始', '陈晖', '刘秉瀚、陈晖，分成2个班，要求与《编译方法》同一学期上，滞后3周，每周4节，安排周六。选修《编译系统设计实践》和理论课《编译方法》的老师要一致');
INSERT INTO `tc_net_pro201601` VALUES ('18', '04166', '2014', '网络工程', '27', ' 编译系统设计实践', '  实践选修', '1.5', '36', '', '', '', '何振峰', '理论课与实践课选同一老师');
INSERT INTO `tc_net_pro201601` VALUES ('18', '83046', '2014', '网络工程', '27', ' 编译系统设计实践', '  实践选修', '1.5', '36', '', '', '4-12', '刘秉瀚', '分成2个班，要求与《编译方法》同一学期上，滞后3周，每周4节，安排周六。选修《编译系统设计实践》和理论课《编译方法》的老师要一致');
INSERT INTO `tc_net_pro201601` VALUES ('19', '', '2014', '网络工程', '27', ' 概率论与数理统计', '  公共必修', '3', '48', '', '', '', '', '');
INSERT INTO `tc_net_pro201601` VALUES ('20', '', '2014', '网络工程', '27', ' 计算方法', '  学科必修', '2', '32', '', '', '', '', '');
INSERT INTO `tc_net_pro201601` VALUES ('20', '02124', '2014', '网络工程', '27', ' 计算方法', '  学科必修', '2', '32', '', '', '1-9', '王秀', '');
INSERT INTO `tc_net_pro201601` VALUES ('20', '88005', '2014', '网络工程', '27', ' 计算方法', '  学科必修', '2', '32', '', '', '', '白清源', '');
INSERT INTO `tc_net_pro201601` VALUES ('21', '', '2014', '网络工程', '27', ' 计算机系统结构', '  学科必修', '3', '48', '', '', '', '', '');
INSERT INTO `tc_net_pro201601` VALUES ('21', '03058', '2014', '网络工程', '27', ' 计算机系统结构', '  学科必修', '3', '48', '', '', '1-18', '尚艳艳', '课程不安排在12节');
INSERT INTO `tc_net_pro201601` VALUES ('21', '10011', '2014', '网络工程', '27', ' 计算机系统结构', '  学科必修', '3', '48', '', '', '', '林嘉雯', '尽可能安排在上午3、4节或者下午1、2节');
INSERT INTO `tc_net_pro201601` VALUES ('22', '', '2014', '网络工程', '27', ' 宽带网及宽带接入技术', '  专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `tc_net_pro201601` VALUES ('22', '02005', '2014', '网络工程', '27', ' 宽带网及宽带接入技术', '  专业选修', '2', '32', '', '', '', '孙及园', '请安排在11～18周的下午，每周4节课');
INSERT INTO `tc_net_pro201601` VALUES ('23', '', '2014', '网络工程', '27', ' 人工智能', '  专业必修（限选）', '2', '32', '', '', '', '', '');
INSERT INTO `tc_net_pro201601` VALUES ('23', '85073', '2014', '网络工程', '27', ' 人工智能', '  专业必修（限选）', '2', '32', '', '', '', '林世平', '');
INSERT INTO `tc_net_pro201601` VALUES ('23', '87007', '2014', '网络工程', '27', ' 人工智能', '  专业必修（限选）', '2', '32', '', '', '第一周', '陈昭炯', '不排在上午1-2节');
INSERT INTO `tc_net_pro201601` VALUES ('24', '', '2014', '网络工程', '27', ' 软件工程A', '  专业必修（限选）', '3', '48', '', '', '', '', '');
INSERT INTO `tc_net_pro201601` VALUES ('24', '10044', '2014', '网络工程', '27', ' 软件工程A', '  专业必修（限选）', '3', '48', '', '', '', '张栋', '');
INSERT INTO `tc_net_pro201601` VALUES ('24', '11048', '2014', '网络工程', '27', ' 软件工程A', '  专业必修（限选）', '3', '48', '', '', '', '柯逍', '');
INSERT INTO `tc_net_pro201601` VALUES ('24', '94176', '2014', '网络工程', '27', ' 软件工程A', '  专业必修（限选）', '3', '48', '', '', '1-18', '汪璟玢', '不要安排7,8节');
INSERT INTO `tc_net_pro201601` VALUES ('25', '', '2014', '网络工程', '27', ' 软件工程实践', '  实践选修', '2', '48', '', '', '', '', '');
INSERT INTO `tc_net_pro201601` VALUES ('25', '10044', '2014', '网络工程', '27', ' 软件工程实践', '  实践选修', '2', '48', '', '', '', '张栋', '');
INSERT INTO `tc_net_pro201601` VALUES ('25', '11048', '2014', '网络工程', '27', ' 软件工程实践', '  实践选修', '2', '48', '', '', '', '柯逍', '');
INSERT INTO `tc_net_pro201601` VALUES ('25', '94176', '2014', '网络工程', '27', ' 软件工程实践', '  实践选修', '2', '48', '', '', '3-18', '汪璟玢', '4节连上');
INSERT INTO `tc_net_pro201601` VALUES ('26', '', '2014', '网络工程', '27', ' 网络管理实验', '  实践选修', '1', '24', '', '', '', '', '');
INSERT INTO `tc_net_pro201601` VALUES ('26', '82058', '2014', '网络工程', '27', ' 网络管理实验', '  实践选修', '1', '24', '', '', '5-7周星期日1-8节', '郭洪', '网络实验室401');
INSERT INTO `tc_net_pro201601` VALUES ('26', '96031', '2014', '网络工程', '27', ' 网络管理实验', '  实践选修', '1', '24', '', '', '5-7周星期日1-8节', '林常俊', '网络实验室404');
INSERT INTO `tc_net_pro201601` VALUES ('27', '', '2014', '网络工程', '27', ' 现代计算机接口技术', '  专业必修（限选）', '2', '32', '', '', '', '', '');
INSERT INTO `tc_net_pro201601` VALUES ('27', '95015', '2014', '网络工程', '27', ' 现代计算机接口技术', '  专业必修（限选）', '2', '32', '', '', '第1--8周', '苏力', '周2，周4。麻烦和实验班的《汇编与接口技术》连排，最好3，4节连排5,6节');
INSERT INTO `tc_net_pro201601` VALUES ('27', '98004', '2014', '网络工程', '27', ' 现代计算机接口技术', '  专业必修（限选）', '2', '32', '', '', '1至8周', '倪一涛', '');
INSERT INTO `tc_net_pro201601` VALUES ('28', '', '2014', '网络工程', '27', ' 现代计算机接口技术实践', '  实践选修', '1.5', '36', '', '', '', '', '');
INSERT INTO `tc_net_pro201601` VALUES ('28', '95015', '2014', '网络工程', '27', ' 现代计算机接口技术实践', '  实践选修', '1.5', '36', '', '', '第3-18周', '苏力', '实验课和理论课选相同老师，实验课尽量要选，否则可能影响理论课的学习和考试');
INSERT INTO `tc_net_pro201601` VALUES ('28', '98004', '2014', '网络工程', '27', ' 现代计算机接口技术实践', '  实践选修', '1.5', '36', '', '', '4至12周', '倪一涛', '请安排周末');
INSERT INTO `tc_net_pro201601` VALUES ('29', '', '2014', '网络工程', '27', ' 现代搜索引擎技术及应用', '  专业选修', '2', '32', '', '', '', '', '');

-- ----------------------------
-- Table structure for tc_soft_pro201601
-- ----------------------------
DROP TABLE IF EXISTS `tc_soft_pro201601`;
CREATE TABLE `tc_soft_pro201601` (
  `insertTime` int(10) NOT NULL AUTO_INCREMENT,
  `workNumber` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `grade` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `major` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `people` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `courseName` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `courseType` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `courseCredit` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `courseHour` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `practiceHour` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `onMachineHour` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `timePeriod` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `teacherName` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `remark` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`workNumber`,`grade`,`major`,`people`,`courseName`,`courseType`,`courseCredit`,`courseHour`,`practiceHour`,`onMachineHour`,`timePeriod`,`teacherName`,`remark`),
  KEY `insertTime` (`insertTime`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tc_soft_pro201601
-- ----------------------------
INSERT INTO `tc_soft_pro201601` VALUES ('1', '', '2016学年上学期软件学院开课通知书', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `tc_soft_pro201601` VALUES ('2', '', '年级', '专业', '专业人数', '课程名称', '选修类型', '学分', '学时', '实验', '上机', '起讫周序', '任课教师', '备注');
INSERT INTO `tc_soft_pro201601` VALUES ('3', '', '', '', '', '', '', '', '', '学时', '学时', '', '', '');
INSERT INTO `tc_soft_pro201601` VALUES ('4', '', '2013', '软件工程', '147', ' .NET Framework应用开发', '  专业选修', '2', '32', '', '8', '', '', '');
INSERT INTO `tc_soft_pro201601` VALUES ('5', '', '2013', '软件工程', '147', ' Web应用软件工程', '  专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `tc_soft_pro201601` VALUES ('6', '', '2013', '软件工程', '147', ' 电子商务概论', '  专业选修', '2', '32', '', '', '', '', '');
INSERT INTO `tc_soft_pro201601` VALUES ('6', '13046', '2013', '软件工程', '147', ' 电子商务概论', '  专业选修', '2', '32', '', '', '', '陈星', '已上过两学期');
INSERT INTO `tc_soft_pro201601` VALUES ('7', '', '2013', '软件工程', '147', ' 数据仓库与数据挖掘', '  专业选修', '2', '32', '', '8', '', '', '');
INSERT INTO `tc_soft_pro201601` VALUES ('7', '08074', '2013', '软件工程', '147', ' 数据仓库与数据挖掘', '  专业选修', '2', '32', '', '8', '1-6周 11月份出国访问，请集中排课', '邓新国', '早晚送、接小孩，请不排12、78节');
INSERT INTO `tc_soft_pro201601` VALUES ('7', '88005', '2013', '软件工程', '147', ' 数据仓库与数据挖掘', '  专业选修', '2', '32', '', '8', '', '白清源', '');
INSERT INTO `tc_soft_pro201601` VALUES ('8', '', '2013', '软件工程', '147', ' 专业实习', '  实践环节', '10', '', '', '', '', '', '');
INSERT INTO `tc_soft_pro201601` VALUES ('8', '06424', '2013', '软件工程', '147', ' 专业实习', '  实践环节', '10', '', '', '', '', '游天童', '8个学生');
INSERT INTO `tc_soft_pro201601` VALUES ('8', '08025', '2013', '软件工程', '147', ' 专业实习', '  实践环节', '10', '', '', '', '', '詹青青', '');
INSERT INTO `tc_soft_pro201601` VALUES ('8', '08074', '2013', '软件工程', '147', ' 专业实习', '  实践环节', '10', '', '', '', '', '邓新国', '《8人，11月份出国访问，是否可以带由系里决定');
INSERT INTO `tc_soft_pro201601` VALUES ('8', '08102', '2013', '软件工程', '147', ' 专业实习', '  实践环节', '10', '', '', '', '', '姚仰光', '');
INSERT INTO `tc_soft_pro201601` VALUES ('9', '', '2014', '软件工程', '161', ' C＃程序设计', '  专业选修', '2.5', '40', '', '8', '', '', '');
INSERT INTO `tc_soft_pro201601` VALUES ('9', '06420', '2014', '软件工程', '161', ' C＃程序设计', '  专业选修', '2.5', '40', '', '8', '正常安排', '陈嘉', '上机课安排在理论课后，希望上机课4节连排');
INSERT INTO `tc_soft_pro201601` VALUES ('10', '', '2014', '软件工程', '161', ' linux操作系统与设计实践', '  专业选修', '2.5', '40', '', '8', '', '', '');
INSERT INTO `tc_soft_pro201601` VALUES ('10', '06404', '2014', '软件工程', '161', ' linux操作系统与设计实践', '  专业选修', '2.5', '40', '', '8', '', '陈家瑞', '因接小孩，希望理论课不要排在78节');
INSERT INTO `tc_soft_pro201601` VALUES ('11', '', '2014', '软件工程', '161', ' Web程序设计', '  专业必修（限选）', '3', '48', '', '16', '', '', '');
INSERT INTO `tc_soft_pro201601` VALUES ('11', '06421', '2014', '软件工程', '161', ' Web程序设计', '  专业必修（限选）', '3', '48', '', '16', '正常安排', '陈昱', '请尽量不安排上午12节');
INSERT INTO `tc_soft_pro201601` VALUES ('12', '', '2014', '软件工程', '161', ' XML程序设计', '  专业选修', '2', '32', '', '8', '', '', '');
INSERT INTO `tc_soft_pro201601` VALUES ('12', '02125', '2014', '软件工程', '161', ' XML程序设计', '  专业选修', '2', '32', '', '8', '', '吴小竹', '');
INSERT INTO `tc_soft_pro201601` VALUES ('13', '', '2014', '软件工程', '161', ' 操作系统', '  学科必修', '3.5', '56', '', '8', '', '', '');
INSERT INTO `tc_soft_pro201601` VALUES ('13', '06418', '2014', '软件工程', '161', ' 操作系统', '  学科必修', '3.5', '56', '', '8', '正常安排', '江兰帆', '一周4节，请不安排12节');
INSERT INTO `tc_soft_pro201601` VALUES ('13', '96070', '2014', '软件工程', '161', ' 操作系统', '  学科必修', '3.5', '56', '', '8', '', '刘延华', '请不要安排在1-2节和7-8节，谢谢！');
INSERT INTO `tc_soft_pro201601` VALUES ('14', '', '2014', '软件工程', '161', ' 多媒体程序设计', '  专业选修', '2', '32', '', '8', '', '', '');
INSERT INTO `tc_soft_pro201601` VALUES ('14', '82056', '2014', '软件工程', '161', ' 多媒体程序设计', '  专业选修', '2', '32', '', '8', '1-8', '陈建华', '');
INSERT INTO `tc_soft_pro201601` VALUES ('15', '', '2014', '软件工程', '161', ' 计算机网络实践', '  实践环节', '1.5', '', '', '', '', '', '');
INSERT INTO `tc_soft_pro201601` VALUES ('15', '001333', '2014', '软件工程', '161', ' 计算机网络实践', '  实践环节', '1.5', '', '', '', '2-12', '程红举', '分成两个班，和游天童老师合上，每周一个下午4节课');
INSERT INTO `tc_soft_pro201601` VALUES ('15', '06424', '2014', '软件工程', '161', ' 计算机网络实践', '  实践环节', '1.5', '', '', '', '', '游天童', '分两班，每班一上午或一下午');
INSERT INTO `tc_soft_pro201601` VALUES ('16', '', '2014', '软件工程', '161', ' 计算机专业英语', '  专业必修（限选）', '2', '32', '', '', '', '', '');
INSERT INTO `tc_soft_pro201601` VALUES ('16', '06424', '2014', '软件工程', '161', ' 计算机专业英语', '  专业必修（限选）', '2', '32', '', '', '', '游天童', '分两班，安排在同一上午或下午，不同时段。');
INSERT INTO `tc_soft_pro201601` VALUES ('16', '11013', '2014', '软件工程', '161', ' 计算机专业英语', '  专业必修（限选）', '2', '32', '', '', '', '於志勇', '(游天童，於志勇)');
INSERT INTO `tc_soft_pro201601` VALUES ('17', '', '2014', '软件工程', '161', ' 面向对象设计方法（UML)', '  专业必修（限选）', '3', '48', '', '8', '', '', '');
INSERT INTO `tc_soft_pro201601` VALUES ('17', '06419', '2014', '软件工程', '161', ' 面向对象设计方法（UML)', '  专业必修（限选）', '3', '48', '', '8', '', '张舒', '实验课安排在课程最后，周五不排课');
INSERT INTO `tc_soft_pro201601` VALUES ('17', '13046', '2014', '软件工程', '161', ' 面向对象设计方法（UML)', '  专业必修（限选）', '3', '48', '', '8', '', '陈星', '已上过两学期');
INSERT INTO `tc_soft_pro201601` VALUES ('18', '', '2014', '软件工程', '161', ' 人工智能导论', '  专业选修', '2', '32', '', '8', '', '', '');
INSERT INTO `tc_soft_pro201601` VALUES ('18', '08074', '2014', '软件工程', '161', ' 人工智能导论', '  专业选修', '2', '32', '', '8', '1-6周 11月份出国访问，请集中排课', '邓新国', '早晚送、接小孩，请不排12、78节');
INSERT INTO `tc_soft_pro201601` VALUES ('19', '', '2014', '软件工程', '161', ' 数值计算', '  学科必修', '2', '32', '', '', '', '', '');
INSERT INTO `tc_soft_pro201601` VALUES ('19', '07106', '2014', '软件工程', '161', ' 数值计算', '  学科必修', '2', '32', '', '', '从第10周开始', '夏又生', '每周2次（每次2节）或每周1次（每次3节）');
INSERT INTO `tc_soft_pro201601` VALUES ('19', '13066', '2014', '软件工程', '161', ' 数值计算', '  学科必修', '2', '32', '', '', '', '陈飞', '上课时间与夏又生老师一致');
INSERT INTO `tc_soft_pro201601` VALUES ('19', '88005', '2014', '软件工程', '161', ' 数值计算', '  学科必修', '2', '32', '', '', '', '白清源', '');
INSERT INTO `tc_soft_pro201601` VALUES ('20', '', '2015', '软件工程', '159', ' 计算机组成原理与汇编语言', '  学科必修', '4.5', '72', '', '12', '', '', '');
INSERT INTO `tc_soft_pro201601` VALUES ('20', '08025', '2015', '软件工程', '159', ' 计算机组成原理与汇编语言', '  学科必修', '4.5', '72', '', '12', '', '詹青青', '');
INSERT INTO `tc_soft_pro201601` VALUES ('20', '08102', '2015', '软件工程', '159', ' 计算机组成原理与汇编语言', '  学科必修', '4.5', '72', '', '12', '', '姚仰光', '接送小孩不安排1，2节');
INSERT INTO `tc_soft_pro201601` VALUES ('21', '', '2015', '软件工程', '159', ' 离散数学', '  学科必修', '4', '64', '', '0', '', '', '');
INSERT INTO `tc_soft_pro201601` VALUES ('21', '12034', '2015', '软件工程', '159', ' 离散数学', '  学科必修', '4', '64', '', '0', '1-16', '陈建利', '大班上课不分班，课程陈建利与朱文兴合上');
INSERT INTO `tc_soft_pro201601` VALUES ('22', '', '2015', '软件工程', '159', ' 认知实习', '  实践环节', '0.5', '', '', '', '', '', '');
INSERT INTO `tc_soft_pro201601` VALUES ('22', '06424', '2015', '软件工程', '159', ' 认知实习', '  实践环节', '0.5', '', '', '', '', '游天童', '8个学生');
INSERT INTO `tc_soft_pro201601` VALUES ('22', '08025', '2015', '软件工程', '159', ' 认知实习', '  实践环节', '0.5', '', '', '', '', '詹青青', '');
INSERT INTO `tc_soft_pro201601` VALUES ('22', '08074', '2015', '软件工程', '159', ' 认知实习', '  实践环节', '0.5', '', '', '', '', '邓新国', '11月份出国访问，是否可以带由系里决定');
INSERT INTO `tc_soft_pro201601` VALUES ('22', '08102', '2015', '软件工程', '159', ' 认知实习', '  实践环节', '0.5', '', '', '', '', '姚仰光', '');
INSERT INTO `tc_soft_pro201601` VALUES ('23', '', '2015', '软件工程', '159', ' 算法与数据结构', '  学科必修', '4', '64', '', '16', '', '', '');
INSERT INTO `tc_soft_pro201601` VALUES ('23', '03171', '2015', '软件工程', '159', ' 算法与数据结构', '  学科必修', '4', '64', '', '16', '', '王一蕾', '请尽量将我的课排在上午');
INSERT INTO `tc_soft_pro201601` VALUES ('23', '06018', '2015', '软件工程', '159', ' 算法与数据结构', '  学科必修', '4', '64', '', '16', '1-16', '傅仰耿', '不排周一上下午及周五下午');
INSERT INTO `tc_soft_pro201601` VALUES ('24', '', '2016', '软件工程', '1', ' 高级语言程序设计', '  学科必修', '4', '64', '', '24', '', '', '');
INSERT INTO `tc_soft_pro201601` VALUES ('24', '13066', '2016', '软件工程', '1', ' 高级语言程序设计', '  学科必修', '4', '64', '', '24', '', '陈飞', '上课时间与王灿辉老师一致');
INSERT INTO `tc_soft_pro201601` VALUES ('25', '', '2016', '软件工程', '1', ' 计算机导论', '  学科必修', '2', '32', '', '0', '', '', '');
INSERT INTO `tc_soft_pro201601` VALUES ('25', '001333', '2016', '软件工程', '1', ' 计算机导论', '  学科必修', '2', '32', '', '0', '2-12', '程红举', '和陈昱分成两个班，每周3节');
INSERT INTO `tc_soft_pro201601` VALUES ('25', '06421', '2016', '软件工程', '1', ' 计算机导论', '  学科必修', '2', '32', '', '0', '正常安排', '陈昱', '请尽量不安排上午12节');

-- ----------------------------
-- Table structure for user_department_head
-- ----------------------------
DROP TABLE IF EXISTS `user_department_head`;
CREATE TABLE `user_department_head` (
  `workNumber` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `sex` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `department` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`workNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user_department_head
-- ----------------------------
INSERT INTO `user_department_head` VALUES ('06033', '06033', '张浩', '', '', '', '', '');
INSERT INTO `user_department_head` VALUES ('06099', '06099', '魏凤英', '', '', '', '', '');
INSERT INTO `user_department_head` VALUES ('07106', '07106', '夏又生', '男', '195702', '', '', '');
INSERT INTO `user_department_head` VALUES ('09070', '09070', '侯建峰', '男', '19810110', '', '', '');
INSERT INTO `user_department_head` VALUES ('10044', '135093', '张栋', '男', '', '', '', '');
INSERT INTO `user_department_head` VALUES ('11061', '11061', '郭龙坤', '', '', '', '', '');
INSERT INTO `user_department_head` VALUES ('11065', '11065', '郑相涵', '', '', '', '', '');
INSERT INTO `user_department_head` VALUES ('12095', '12095', '于元隆', '男', '', '', '', '');
INSERT INTO `user_department_head` VALUES ('83040', '83040', '陈晓星', '女', '196312', '', '', '');
INSERT INTO `user_department_head` VALUES ('89036', '87840441', '朱玉灿', '男', '196304', '数学系', '13950490098', 'zhuyucan@fzu.edu.cn');
INSERT INTO `user_department_head` VALUES ('90010', '90010', ' 王灿辉', '', '', '', '', '');
INSERT INTO `user_department_head` VALUES ('92034', '92034', '陈晓云', '女', '197002', '信息与计算科学系', '', '');

-- ----------------------------
-- Table structure for user_teacher
-- ----------------------------
DROP TABLE IF EXISTS `user_teacher`;
CREATE TABLE `user_teacher` (
  `workNumber` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `sex` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `department` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`workNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user_teacher
-- ----------------------------
INSERT INTO `user_teacher` VALUES ('00022', '00022', '张大栋', '男', '', '我问问', '15167899876', '22@eeee.com');
INSERT INTO `user_teacher` VALUES ('01004', '01004', '蒋秀凤', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('01007', '01007', '曾有栋', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('01009', '01009', '潘梅英', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('01017', '01017', '任立英', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('01029', '01029', '陈神灿', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('01100', '01100', '刘蓉', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('02005', 'chenlz', '孙及园', '女', '', '信息安全与网络工程', '13328212191', 'Sunjy@fzu.edu.cn');
INSERT INTO `user_teacher` VALUES ('02025', '02025', '史正平', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('02089', '02089', '陈凤德', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('02103', '02103', '朱丹红', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('02108', '02108', '范更华', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('02112', 'fzu132778', '陈明志', '男', '', '信息安全与网络工程系', '13860664189', 'mchen@fzu.edu.cn');
INSERT INTO `user_teacher` VALUES ('02117', '02117', '黄长洵', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('02124', '@350002', '王秀', '', '', '', '18960875695', 'wangx@fzu.edu.cn');
INSERT INTO `user_teacher` VALUES ('02125', 'myglobus', '吴小竹', '男', '', '软件工程系', '13559347126', 'wxz@fzu.edu.cn');
INSERT INTO `user_teacher` VALUES ('02128', '02128', '吴文妹', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('03003', '0300303', '程烨', '男', '', '软件工程系', '13805085181', 'chengye@fzu.edu.cn');
INSERT INTO `user_teacher` VALUES ('03009', 'newstar123', '董晨', '女', '', '信息安全与网络工程系', '13960780316', 'dongchen@fzu.edu.cn');
INSERT INTO `user_teacher` VALUES ('03010', '03010', '黄昉菀', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('03014', '03014', '邹长武', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('03015', '03015', '吕书龙', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('03016', '03016', '刘文丽', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('03030', '7893296bk', '蒋启强', '男', '', '数计学院网络工程系', '13159429291', 'jqq@fzu.edu.cn');
INSERT INTO `user_teacher` VALUES ('03032', '750927', '孙岚', '女', '', '数学与计算机科学学院', '15605919998', 'lsun@fzu.edu.cn');
INSERT INTO `user_teacher` VALUES ('03048', '03048', '徐源', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('03052', '03052', '何凤英', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('03058', '03058', '尚艳艳', '女', '', '信息安全与网络工程系', '13067376996', 'yyshang@fzu.edu.cn');
INSERT INTO `user_teacher` VALUES ('03061', '03061', '柳宏珠', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('03073', '03073', '周燕', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('03074', '03074', '谢惠琴', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('03076', '03076', '刘剑萍', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('03084', '03084', '单红', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('03096', '03096', '陈晓锋', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('03111', '03111', '黄陈思', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('03112', '900119', '赵彦敏', '女', '', '网络与信息安全', '13328223393', 'zhaoyanmin@fzu.edu.cn');
INSERT INTO `user_teacher` VALUES ('03135', '03135', '颜丰', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('03154', '970717ch', '陈晖', '男', '', '软件工程系', '13599089065', 'chenhui@fzu.edu.cn');
INSERT INTO `user_teacher` VALUES ('03161', 'lqy850621', '林秋月', '女', '', '计算机系', '18050280020', '18050280020@189.cn');
INSERT INTO `user_teacher` VALUES ('03171', '253180', '王一蕾', '女', '', '计算机科学', '18059082372', 'yilei@fzu.edu.cn');
INSERT INTO `user_teacher` VALUES ('04010', '04010', '向小娟', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('04017', '04017', '夏永辉', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('04018', '04018', '许君雁', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('04019', '61665688', '吴英杰', '男', '', '数学与计算机科学学院计算机科学系', '18960929231', 'yjwu@fzu.edu.cn');
INSERT INTO `user_teacher` VALUES ('04020', '04020', '钮永莉', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('04021', 'share3pw', '陈欢', '男', '', '计算机科学系', '13338289771', 'hchen@fzu.edu.cn');
INSERT INTO `user_teacher` VALUES ('04022', '04022', '邹长忠', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('04025', '04025', '赵雷', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('04027', '04027', '张忠获', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('04029', '04029', '孙德献', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('04034', '04034', '郭洋', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('04047', '04047', '王鸿', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('04048', '04048', '陈丽娟', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('04059', 'therica1231ycy', '余春艳', '女', '', '计算机科学系', '18606999031', 'therica@fzu.edu.cn');
INSERT INTO `user_teacher` VALUES ('04060', '04060', '何统军', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('04070', '04070', '林美丽', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('04071', '04071', '陈锦松', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('04073', 'WYBrongxin2068x', '吴运兵', '男', '', '计算机系', '13859028940', 'wyb5820@fzu.edu.cn');
INSERT INTO `user_teacher` VALUES ('04074', '04074', '余小燕', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('04096', '04096', '黄慧敏', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('04097', '04097', '林雪如', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('04098', '04098', '熊贤祝', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('04116', '04116', '黄寿颖', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('04117', '04117', '孙凤刚', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('04136', '04136', '庄颖慧', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('04165', '04165', '王海荣', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('04166', 'Hezhenfeng', '何振峰', '男', '', '数学与计算机学院计算机科学系', '13635249590', 'hezhenfeng@fzu.edu.cn');
INSERT INTO `user_teacher` VALUES ('04173', '04173', '刘文安', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('04174', '04174', '聂建英', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('04402', '04402', '杨大庆', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('05008', '05008', '程航', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('05009', '05009', '张艳红', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('05010', '05010', '周勇', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('05013', '05013', '郭昆', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('05017', '05017', '袁裕泽', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('05023', 'zspwait', '钟尚平', '男', '', '信息安全与网络工程系', '13860610089', 'spzhong@fzu.edu.cn');
INSERT INTO `user_teacher` VALUES ('05024', '05024', '薛美玉', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('05042', '05042', '林华', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('05095', '05095', '王平', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('05096', '05096', '林丽琼', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('05100', '05100', '黄利航', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('05160', '05160', '施齐焉', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('05407', '05407', '鲍学文', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('06018', '350116', '傅仰耿', '男', '', '计算机系', '18065162651', 'ygfu@qq.com');
INSERT INTO `user_teacher` VALUES ('06033', '06033', '张浩', '男', '', '信息安全与网络工程', '13720825396', 'zhanghao@fzu.edu.cn');
INSERT INTO `user_teacher` VALUES ('06404', 'c623511', '陈家瑞', '男', '', '软件工程系', '13960767844', 'jrchen@126.com');
INSERT INTO `user_teacher` VALUES ('06412', '06412', '何秀萍', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('06418', '1qazse4', '江兰帆', '男', '', '软件工程系', '15959089997', 'chenyu_21cn@sina.com');
INSERT INTO `user_teacher` VALUES ('06419', 'lois1982', '张舒', '女', '', '软件工程系', '15960198219', '65533967@qq.com');
INSERT INTO `user_teacher` VALUES ('06420', '809300', '陈嘉', '女', '', '软件工程', '13645002517', 'successjia@126.com');
INSERT INTO `user_teacher` VALUES ('06421', 'qwert', '陈昱', '男', '', '软件工程系', '13959198761', 'chenyu_21cn@qq.com');
INSERT INTO `user_teacher` VALUES ('06424', 'tonghuiying', '游天童', '男', '', '软件工程系', '13110875460', 'tiantong.you@fzu.edu.cn');
INSERT INTO `user_teacher` VALUES ('07026', '07026', '曾勋勋', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('07027', '07027', '李忠', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('07029', '07029', '宋凌', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('07042', 'chj7524', '程红举', '男', '', '软件工程系', '13599099519', 'cscheng@fzu.edu.cn');
INSERT INTO `user_teacher` VALUES ('07068', '07068', '林然', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('07106', 'xia6289186', '夏又生', '男', '', '软件工程系', '15880038582', 'ysxia@fzu.edu.cn');
INSERT INTO `user_teacher` VALUES ('07126', '1601984', '陈羽中', '男', '', '网络工程', '18965083597', 'yzchen@fzu.edu.cn');
INSERT INTO `user_teacher` VALUES ('08025', '2888003', '詹青青', '女', '', '软件工程系', '13705002746', 'zqqing_0@aliyun.com');
INSERT INTO `user_teacher` VALUES ('08073', '08073', '何梦昕', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('08074', 'dengwei', '邓新国', '男', '', '软件工程系', '15606941581', '309568144@qq.com');
INSERT INTO `user_teacher` VALUES ('08076', 'chenbo0212', '陈勃', '男', '', '数学与计算机科学学院-计算机系', '13959192812', 'bo.chen@fzu.edu.cn');
INSERT INTO `user_teacher` VALUES ('08083', '08083', '黄新通', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('08102', 'y990441', '姚仰光', '男', '', '软件工程', '15080020794', 'yyg990441@163.com');
INSERT INTO `user_teacher` VALUES ('08112', '08112', '叶从峰', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('08124', '08124', '龚艺源', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('09008', '09008', '廖祥文', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('09031', '09031', '翁谦', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('09046', '09046', '傅明建', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('09047', '09047', '吴伶', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('09070', '09070', '侯建锋', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('09082', '09082', '林启忠', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('10011', '090803pztt', '林嘉雯', '女', '', '数学与计算机科学学院网络工程与信息安全系', '13509393165', 'ljw@fzu.edu.cn');
INSERT INTO `user_teacher` VALUES ('10012', '10012', '陈振', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('10015', '10015', '刘月', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('10043', '10043', '唐丽丹', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('10044', '10044', '张栋', '男', '', '计算机科学系', '18650058766', '42273885@qq.com');
INSERT INTO `user_teacher` VALUES ('10047', '10047', '沈明', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('10051', '10051', '陈容', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('10057', '10057', '彭拯', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('10080', '10080', '赖降周', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('10096', '10096', '蔡英灵', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('10097', '10097', '鲍星华', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('11013', '1012@fzU', '於志勇', '男', '', '软件工程', '13696855186', 'yuzhiyong@fzu.edu.cn');
INSERT INTO `user_teacher` VALUES ('11037', '22886616', '陈开志', '男', '', '网络工程与信息安全', '13950237801', 'ckz@fzu.edu.cn');
INSERT INTO `user_teacher` VALUES ('11046', '11046', '肖祥春', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('11048', 'xiaoke', '柯逍', '男', '', '计算机科学', '15080019117', 'kex@fzu.edu.cn');
INSERT INTO `user_teacher` VALUES ('11061', 'guolongkun@fzubk', '郭龙坤', '男', '', '计算机科学系', '13635272259', 'lkguo@fzu.edu.cn');
INSERT INTO `user_teacher` VALUES ('11065', 'owqljb4A', '郑相涵', '男', '', '网络工程与信息安全', '15080025921', 'xianghan.zheng@fzu.edu.cn');
INSERT INTO `user_teacher` VALUES ('11071', '11071', '苏延辉', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('11098', '11098', '李娴娟', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('11106', '11106', '林峰根', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('12005', '39213921', '杨旸', '女', '', '信息安全与网络工程系', '18050283921', 'yang.yang.research@gmail.com');
INSERT INTO `user_teacher` VALUES ('12026', '12026', '刘若凡', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('12034', 'chenjianli', '陈建利', '男', '', '软件工程系', '18906930649', 'jlchen@fzu.edu.cn');
INSERT INTO `user_teacher` VALUES ('12064', '12064', '洪艳梅', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('12065', '12065', '刘清海', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('12085', '12085', '江飞', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('12095', '12095', '于元隆', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('12098', '12098', '牛玉贞', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('123321', '123321', '李XX', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('123456', '123456', '小李', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('13027', '13027', '苏友峰', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('13036', '13036', '张卉', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('13037', '13037', '陈清花', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('13046', '19851102', '陈星', '男', '', '软件工程', '18650349461', 'chenxing@fzu.edu.cn');
INSERT INTO `user_teacher` VALUES ('13051', '13051', '杨硕', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('13066', '13066', '陈飞', '男', '', '软件工程系', '15060129392', 'chenfei314@fzu.edu.cn');
INSERT INTO `user_teacher` VALUES ('14029', '14029', '张文钊', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('14035', '14035', '杨霖', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('14048', '14048', '王伟伟', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('14058', '14058', '王靖岳', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('14059', '14059', '洪倩颖', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('15005', '15005', '邹剑', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('15018', 'sjxy0312', '陈德旺', '男', '', ' 信息安全与网络工程系', '13328265088', 'dwchen@fzu.edu.cn');
INSERT INTO `user_teacher` VALUES ('15028', 'wenxi112', '刘文犀', '男', '', '计算机科学系', '13515018672', 'wenxi.liu@hotmail.com');
INSERT INTO `user_teacher` VALUES ('15029', '15029', '王佳', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('15038', '15038', '刘耿耿', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('15041', '13655963', '苏雅茹', '女', '', '计算机科学系', '18606020083', 'yarusu@fzu.edu.cn');
INSERT INTO `user_teacher` VALUES ('15079', '15079', '林敏', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('15081', '15081', '林晶', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('15082', '15082', '陆泽萍', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('15095', '15095', '张春阳', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('16005', '16005', '沈志荣', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('16014', '16014', '谭晓兰', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('78040', '78040', '林柏钢', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('78054', '78054', '郭朝珍', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('78082', '78082', '陈铭枢', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('80020', '80020', '徐荣聪', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('80035', '80035', '孙建华', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('80067', '80067', '颜金明', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('80104', '80104', '林胜利', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('81063', '81063', '陈京', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('81072', '81072', '倪良刚', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('81158', '81158', '陈国维', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('82009', '82009', '何建农', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('82010', '82010', '黄建华', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('82020', '82020', '陈丽珍', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('82032', '82032', '吴承强', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('82056', '13075946079', '陈建华', '男', '', '计算机科学系', '13075946079', 'jhchen@fzu.edu.cn');
INSERT INTO `user_teacher` VALUES ('82057', '82057', '王晓东', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('82058', '575757', '郭洪', '男', '', '信息安全与网络工程系', '13859035623', 'gh@fzu.edu.cn');
INSERT INTO `user_teacher` VALUES ('82059', '82059', '吴景东', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('82060', '82060', '林锦贤', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('82061', '819111', '俞建家', '男', '', '计算机系', '13859033140', 'yjj@fzu.edu.cn');
INSERT INTO `user_teacher` VALUES ('82115', '82115', '雷晋明', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('82135', '82135', '肖赞强', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('83040', '83040', '陈晓星', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('83046', 'liu1988', '刘秉瀚', '女', '', '软件工程系', '13950202136', 'lbh@fzu.edu.cn');
INSERT INTO `user_teacher` VALUES ('83514', '83514', '陈文清', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('84051', '84051', '陈德昭', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('84069', '84069', '叶少珍', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('85013', '85013', '王林', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('85034', '123789', '叶东毅', '男', '', '数计学院计算机系', '13509376813', 'yiedy@fzu.edu.cn');
INSERT INTO `user_teacher` VALUES ('85040', '85040', '梁飞豹', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('85059', '85059', '李剑敏', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('85061', '85061', '王晶海', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('85073', 'mjyj66589', '林世平', '男', '', '计算机科学系', '18959199939', 'splin@fzu.edu.cn');
INSERT INTO `user_teacher` VALUES ('85118', '646893_gauss', '谢伙生', '男', '', '计算机系', '18950358968', 'xiehs@qq.com');
INSERT INTO `user_teacher` VALUES ('85138', '85138', '王世俊', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('86026', '86026', '朱敏琛', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('86077', '86077', '黄良伟', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('86078', '86078', '郑德榕', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('86079', '86079', '江巧洪', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('86502', '86502', '王红岩', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('86568', '86568', '林劲', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('87007', '04213', '陈昭炯', '女', '', '计算机科学系', '13960758961', 'chenzj@fzu.edu.cn');
INSERT INTO `user_teacher` VALUES ('87027', '87027', '林发兴', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('87029', '87029', '杨培鉴', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('88005', 'bqy1964', '白清源', '男', '', '计算机科学系', '13705942427', '1344565775@qq.com');
INSERT INTO `user_teacher` VALUES ('88032', '88032', '王宏健', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('88064', '8305200', '胡颖', '女', '', '信息安全与网络', '13075946057', 'huying@fzu.edu.cn');
INSERT INTO `user_teacher` VALUES ('88888', '88888', '苏大大', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('89013', '89013', '王昌福', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('89020', '89020', '谭宜家', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('89023', '89023', '江莹茵', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('89034', '89034', '余建辉', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('89036', '87840441', '朱玉灿', '男', '', '数学系', '13950490098', 'zhuyucan@fzu.edu.cn');
INSERT INTO `user_teacher` VALUES ('89043', '89043', '张革', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('89062', '89062', '张碧霞', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('89085', '584600', '郭红', '女', '', '软件工程系', '13305015846', 'guohongfz@163.com');
INSERT INTO `user_teacher` VALUES ('89086', '89086', '张莹', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('89087', '89087', '林晓东', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('90002', '90002', '王美清', '女', '', '数学系', '13599409566', 'mqwang@fzu.edu.cn');
INSERT INTO `user_teacher` VALUES ('90007', '90007', '吴其平', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('90009', '90009', '林桂伍', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('90010', '90010', '王灿辉', '男', '', '软件工程系', '13906909734', 'wangcanhui@fzu.edu.cn');
INSERT INTO `user_teacher` VALUES ('90042', '90042', '游华', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('91100', '91100', '邵志强', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('91111', '91111', '江辉有', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('92022', '92022', '阮一文', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('92034', '92034', '陈晓云', '', '', '', '18060853153', '');
INSERT INTO `user_teacher` VALUES ('92061', '92061', '黄建军', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('92092', '92092', '林丽平', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('92146', '92146', '黄志华', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('94080', '94080', '张华娣', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('94104', '94104', '胡彦', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('94138', '94138', '史丹双', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('94174', '94174', '叶福玲', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('94176', '831777', '汪璟玢', '', '', '软件工程', '18959160809', 'wjbcc@263.net');
INSERT INTO `user_teacher` VALUES ('94178', '94178', '韩晓芸', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('94707', '94707', '郑净', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('95013', '95013', '郑爱明', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('95015', 'lilysu135791', '苏力', '女', '', '网络与信息安全', '13809556177', 'suli@fzu.edu.cn');
INSERT INTO `user_teacher` VALUES ('95018', '95018', '钟春芳', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('95057', 'dsj605', '丁善镜', '男', '', '软件工程', '18060475815', 'dingfzu@163.com');
INSERT INTO `user_teacher` VALUES ('95098', '!)!#^@(ling', '何萧玲', '女', '', '网络工程与信息安全系', '18950304593', 'hxl@fzu.edu.cn');
INSERT INTO `user_teacher` VALUES ('96007', '96007', '谢丽聪', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('96009', '96009', '李应', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('96031', '147971', '林常俊', '男', '', '信息安全与网络工程系', '13015750564', 'prospect2004lin@163.com');
INSERT INTO `user_teacher` VALUES ('96066', '96066', '于志敏', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('96070', '721020', '刘延华', '男', '', '信息安全与网络工程系', '18950477882', 'lyhwa@fzu.edu.cn');
INSERT INTO `user_teacher` VALUES ('96071', '96071', '范红', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('96180', '96180', '朱兴文', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('96182', '96182', '蒋雪芳', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('96200', '96200', '张惠英', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('97075', '97075', '周向东', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('97144', 'allgreat', '刘漳辉', '男', '', '信息安全与网络工程系', '13809504625', '492339385@qq.com');
INSERT INTO `user_teacher` VALUES ('98003', '98003', '舒志彪', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('98004', 'nyt2016', '倪一涛', '男', '', '网络工程与信息安全', '13960821056', 'yitao_ni@fzu.edu.cn');
INSERT INTO `user_teacher` VALUES ('98006', '98006', '常安', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('98041', '98041', '叶菁', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('98076', '98076', '翁爱治', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('99004', '99004', '江良平', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('99006', '99006', '刘传才', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('99007', '99007', '刘宁燕', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('99009', '99009', '章红梅', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('99035', '99035', '余根坚', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('99064', '99064', '方秀端', '', '', '', '', '');
INSERT INTO `user_teacher` VALUES ('sj073', 'sj073', '张晴', '女', '', '教学办', '18649717168', '471767305@qq.com');

-- ----------------------------
-- Table structure for user_teaching_office
-- ----------------------------
DROP TABLE IF EXISTS `user_teaching_office`;
CREATE TABLE `user_teaching_office` (
  `workNumber` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`workNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user_teaching_office
-- ----------------------------
INSERT INTO `user_teaching_office` VALUES ('90002', '90002', '王美清', '', '');
INSERT INTO `user_teaching_office` VALUES ('sj073', 'sj073', '张晴', '', '');
