
CREATE TABLE IF NOT EXISTS `tc_student` (
  `sid` MEDIUMINT(8) NOT NULL AUTO_INCREMENT,
  `serialNum` VARCHAR(9) NOT NULL COMMENT '学号',
  `password` CHAR(20) NOT NULL COMMENT '密码',
  `name` VARCHAR(20) NOT NULL COMMENT '姓名',
  `gender` CHAR(1) NOT NULL COMMENT '性别（女、男）',
  `gpa` DOUBLE NOT NULL COMMENT '绩点',
  `college` VARCHAR(30) NOT NULL DEFAULT '0' COMMENT '学院',
  `department` VARCHAR(30) NOT NULL DEFAULT '0' COMMENT '系别',
  `field` VARCHAR(30) NOT NULL DEFAULT '0' COMMENT '方向',
  `skill` MEDIUMTEXT DEFAULT NULL COMMENT '技能及经历',
  `avator` VARCHAR(50) DEFAULT NULL COMMENT '头像url',
  `telephone` CHAR(11) DEFAULT NULL COMMENT '电话',
  `email` VARCHAR(30) DEFAULT NULL COMMENT '邮箱',
  `rank` VARCHAR(10) NOT NULL COMMENT '排名',
  `chosen` TINYINT(1) NOT NULL DEFAULT '0' COMMENT '是否中选（0、为中选 1、中选）',

  PRIMARY KEY (`sid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `tc_teacher` (
  -- `tid` MEDIUMINT(8) NOT NULL AUTO_INCREMENT,
  `workNumber` VARCHAR(10) NOT NULL COMMENT '',
  `password` VARCHAR(20) NOT NULL COMMENT '',
  `name` VARCHAR(20) NOT NULL COMMENT '',
  `sex` VARCHAR(5) NOT NULL COMMENT '',
  `birthday` VARCHAR(10) NOT NULL COMMENT '',
  `department` VARCHAR(20) NOT NULL COMMENT '',
  `telephone` VARCHAR(11) NOT NULL COMMENT '',
  `email` VARCHAR(30) NOT NULL COMMENT '',

  `isExperial` TINYINT(1) NOT NULL DEFAULT '0' COMMENT '导师是否实验班导师（0、不是 1、是）',
  `description` MEDIUMTEXT DEFAULT NULL COMMENT '个人简介',
  `avator` VARCHAR(50) DEFAULT NULL COMMENT '头像url',
  `title` TINYINT(1) NOT NULL DEFAULT '0' COMMENT '职称',

  -- PRIMARY KEY (`tid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `tc_departmentHead` (
  -- `did` MEDIUMINT(8) NOT NULL AUTO_INCREMENT,
  `workNumber` VARCHAR(10) NOT NULL COMMENT '',
  `password` VARCHAR(20) NOT NULL COMMENT '',
  `name` VARCHAR(20) NOT NULL COMMENT '',
  `sex` VARCHAR(5) NOT NULL COMMENT '',
  `birthday` VARCHAR(10) NOT NULL COMMENT '',
  `department` VARCHAR(20) NOT NULL COMMENT '',
  `telephone` VARCHAR(11) NOT NULL COMMENT '',
  `email` VARCHAR(30) NOT NULL COMMENT '',
  
  -- PRIMARY KEY (`did`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `tc_teachingOffice` (
  -- `toid` MEDIUMINT(8) NOT NULL AUTO_INCREMENT,
  `workNumber` VARCHAR(10) NOT NULL COMMENT '',
  `password` VARCHAR(20) NOT NULL COMMENT '',
  `name` VARCHAR(20) NOT NULL COMMENT '',
  `telephone` VARCHAR(11) NOT NULL COMMENT '',
  `email` VARCHAR(30) NOT NULL COMMENT '',

  -- PRIMARY KEY (`toid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `tc_voluntary` (
  `vid` MEDIUMINT(8) NOT NULL AUTO_INCREMENT,
  `sid` MEDIUMINT(8) NOT NULL COMMENT '学生编号',
  `wishFirst` VARCHAR(10) DEFAULT NULL COMMENT '第一志愿',
  `wishSecond` VARCHAR(10) DEFAULT NULL COMMENT '第二志愿',
  `wishThird` VARCHAR(10) DEFAULT NULL COMMENT '第三志愿',
  `wishForth` VARCHAR(10) DEFAULT NULL COMMENT '第四志愿',
  `wishFifth` VARCHAR(10) DEFAULT NULL COMMENT '第五志愿',

  PRIMARY KEY (`vid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `tc_voluntaryInfoSetting` (
  `vsid` MEDIUMINT(8) NOT NULL AUTO_INCREMENT,
  `workNumber` VARCHAR(10) NOT NULL COMMENT '系负责人工号',
  `voluntaryNum` INT NOT NULL COMMENT '志愿数',
  `issueStart` INT NOT NULL COMMENT '导师报选题起始时间（时间戳）',
  `issueEnd` INT NOT NULL COMMENT '导师报选题截止时间（时间戳）',
  `firstStart` INT NOT NULL COMMENT '学生第一轮填志愿起始时间（时间戳）',
  `firstEnd` INT NOT NULL COMMENT '学生第一轮填志愿截止时间（时间戳）',
  `secondStart` INT NOT NULL COMMENT '学生第二轮填志愿起始时间（时间戳）',
  `secondEnd` INT NOT NULL COMMENT '学生第二轮填志愿截止时间（时间戳）',
  `totalMax` INT NOT NULL DEFAULT '8' COMMENT '导师学生数总上限',
  `totalMin` INT NOT NULL DEFAULT '0' COMMENT '导师学生数总下限',
  `experialMax` INT NOT NULL DEFAULT '5' COMMENT '导师实验班学生数总上限',

  PRIMARY KEY (`vsid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `tc_issue` (
  `pid` MEDIUMINT(8) NOT NULL AUTO_INCREMENT,
  `workNumber` VARCHAR(10) NOT NULL COMMENT '导师工号',
  `title` VARCHAR(30) NOT NULL COMMENT '课题标题',
  `content` MEDIUMTEXT DEFAULT NULL COMMENT '课题内容',
  `time` INT NOT NULL COMMENT '课题时间（时间戳）',
  `totalExper` INT NOT NULL COMMENT '导师所带实验班人数',
  `totalNatur` INT NOT NULL COMMENT '导师所带自然班人数',
  `totalNow` INT NOT NULL DEFAULT '0' COMMENT '导师当前学生数',

  PRIMARY KEY (`pid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `tc_result` (
  `rid` MEDIUMINT(8) NOT NULL AUTO_INCREMENT,
  `sid` MEDIUMINT(8) NOT NULL COMMENT '学生编号',
  `workNumber` VARCHAR(10) NOT NULL COMMENT '导师工号',

  PRIMARY KEY (`rid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;