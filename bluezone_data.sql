/*
Navicat MySQL Data Transfer

Source Server         : website
Source Server Version : 50714
Source Host           : 192.168.1.111:3306
Source Database       : bluezone_data

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2017-05-12 21:38:46
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for activity
-- ----------------------------
DROP TABLE IF EXISTS `activity`;
CREATE TABLE `activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL,
  `author` char(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `time` char(100) DEFAULT NULL COMMENT '发布时间',
  `filePath` varchar(255) DEFAULT NULL COMMENT '图片文件地址',
  `small_image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=121 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of activity
-- ----------------------------
INSERT INTO `activity` VALUES ('106', '蓝色空间成员春日采风', '张艺凡', '2017年3月5日蓝色空间师生前往天荒坪镇采风', '2017年3月5日蓝色空间师生前往天荒坪镇采风', '2017-05-11 19:51:17', './upfile/1494503477.jpg', './small_image/1494503477_small.jpg');
INSERT INTO `activity` VALUES ('107', '蓝色空间项目交流讨论', '张艺凡', '2017年3月6号小和山学长胡昊、王斌斌来蓝色空间指导学弟', '2017年3月6号小和山学长胡昊、王斌斌来蓝色空间指导学弟', '2017-05-11 19:59:49', './upfile/1494504162.jpg', './small_image/1494504162_small.jpg');
INSERT INTO `activity` VALUES ('108', '计算机设计大赛宣讲会', '张艺凡', '2016年12月19日在安吉召开2017年中国计算机设计大赛宣讲会', '2016年12月19日在安吉召开2017年中国计算机设计大赛宣讲会', '2017-05-11 19:27:16', './upfile/1494502036.jpg', './small_image/1494502036_small.jpg');
INSERT INTO `activity` VALUES ('109', '项目实践总结年会', '张艺凡', '2017年1月14日在小和山信息学院会议室召开项目实践总结年会', '2017年1月14日在小和山信息学院会议室召开项目实践总结年会', '2017-05-11 19:30:30', './upfile/1494502230.JPG', './small_image/1494502230_small.JPG');
INSERT INTO `activity` VALUES ('110', '蓝色空间开学抽奖活动', '张艺凡', '信息学院岑岗院长与姜国泉书记在蓝色空间举行抽奖活动', '信息学院岑岗院长与姜国泉书记在蓝色空间举行抽奖活动', '2017-05-11 13:55:35', './upfile/1494485228.jpg', './small_image/1494485228_small.jpg');
INSERT INTO `activity` VALUES ('111', '项目导师指导学生', '张艺凡', '2016年10月26日下午唐伟老师在安吉蓝色空间指导学生项目', '2016年10月26日下午唐伟老师在安吉蓝色空间指导学生项目', '2017-05-11 19:18:41', './upfile/1494501521.JPG', './small_image/1494501521_small.JPG');
INSERT INTO `activity` VALUES ('112', '小和山项目学习交流', '张艺凡', '2016年11月26日下午在A2五楼进行项目实践交流指导', '2016年11月26日下午在A2五楼进行项目实践交流指导', '2017-05-11 19:21:37', './upfile/1494501697.JPG', './small_image/1494501697_small.JPG');
INSERT INTO `activity` VALUES ('113', '学院导师指导作品', '张艺凡', '2017年4月7日学院导师来蓝色空间指导学生作品', '蓝色空间成员通过12小时的连续作战，在信息学院专业分流之前做出了志愿专业分流系统，信息学院院长、副院长等学院导师来蓝色空间指导并验收作品，并计划投入使用，同时对蓝色空间的发展做出了规划。', '2017-05-11 21:01:14', './upfile/1494507674.jpg', './small_image/1494507674_small.jpg');
INSERT INTO `activity` VALUES ('114', '书院文化节开幕式', '张艺凡', '2017年4月27日书院文化节开幕蓝色空间作为劲竹书院代表之一进行展示', '2017年4月27日书院文化节开幕，蓝色空间作为劲竹书院代表之一进行展示', '2017-05-11 21:13:30', './upfile/1494589584.jpg', './small_image/1494589584_small.jpg');
INSERT INTO `activity` VALUES ('115', '计算机设计大赛校赛', '张艺凡', '2017年5月5日在安吉成功举办中国大学生计算机大赛校赛', '中国大学生计算机设计大赛赛程分为校级选拔赛、省级决赛和国家级总决赛三级赛程。本赛事对于深化计算机教学改革，提高计算机教学质量，激发大学生的学习兴趣和潜能，培养创新创业能力和团队合作意识，特别是培养运用信息技术解决实际问题的综合实践能力，从而造就德智体美全面发展、创新型、实用型、复合型人才，意义重大。近些年来，学校高度重视这个赛事，将它作为质量工程来抓，大赛已经成为我校大学生计算机能力展示的一个重要舞台。\r\n校选赛中齐聚了众多优秀的参赛队伍，不仅有大二大三的学生，同时也有初出茅庐的大一同学。他们同台竞技，为我们奉献了一份份优秀的作品。在参赛期间，每一组参赛队伍分别上台介绍自己的作品，他们在大屏幕上用投影的方式为我们展示他们生动的作品，并用自信流利的语言讲述作品的精华所在。\r\n此次校内赛主要采取团队展示和现场答辩的形式。参赛的各支队伍从创作背景、设计思路、实现方法、作品效果和后期改进等方面向各位评委展示了团队作品。各支队伍展示形式多种多样，有PPT讲解，有动漫解说，有操作演示，有现场试用等等，多方位、形象化的展示说明了参赛作品，吸引了台下观众的目光，赢得了评委的阵阵掌声。\r\n评委老师对同学们的辛苦付出给出了肯定，对参赛作品的展示内容提出了自己的看法和建议，针对不同类别的作品给出了进一步完善修改的建议。同学们纷纷表示参加此次校内赛受益匪浅，对评委们的指导和帮助表示衷心的感谢。\r\n在所有同学完成答辩、评委老师点评结束后，岑岗教授对此次校选赛做出了总结，为此次计算机设计大赛校选赛画上了圆满的句号。最后，校选赛在同学们热烈的掌声中圆满结束。\r\n', '2017-05-11 21:37:24', './upfile/1494509924.jpg', './small_image/1494509924_small.jpg');

-- ----------------------------
-- Table structure for father_module_info
-- ----------------------------
DROP TABLE IF EXISTS `father_module_info`;
CREATE TABLE `father_module_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module_name` char(66) NOT NULL DEFAULT '' COMMENT '板块名称',
  `show_order` int(11) NOT NULL DEFAULT '0' COMMENT '显示序号',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of father_module_info
-- ----------------------------
INSERT INTO `father_module_info` VALUES ('1', '学习', '0');
INSERT INTO `father_module_info` VALUES ('2', '娱乐', '0');

-- ----------------------------
-- Table structure for honor
-- ----------------------------
DROP TABLE IF EXISTS `honor`;
CREATE TABLE `honor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `member` varchar(255) DEFAULT NULL,
  `teacher` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `small_image` varchar(255) DEFAULT NULL,
  `time` datetime DEFAULT NULL COMMENT '上传时间',
  `author` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=115 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of honor
-- ----------------------------
INSERT INTO `honor` VALUES ('97', '作品设计竞赛本科组网站类三等奖', '方益 张玉琦 钱佳颖', '马伟锋', './upfile/1494490712.jpg', './small_image/1494490712_small.jpg', '2017-05-11 16:18:32', '张艺凡');
INSERT INTO `honor` VALUES ('98', '作品设计竞赛本科组网站类二等奖', '陈璇 彭德恒', '汪文彬', './upfile/1494491350.jpg', './small_image/1494491350_small.jpg', '2017-05-11 16:29:10', '张艺凡');
INSERT INTO `honor` VALUES ('99', '作品设计竞赛本科组动画类二等奖', '胡中天 刘旭辉', '唐伟', './upfile/1494491981.jpg', './small_image/1494491981_small.jpg', '2017-05-11 16:39:41', '张艺凡');
INSERT INTO `honor` VALUES ('100', '衣恋', '茅梓成 王哲望 刘晔', '汪文彬 莫云峰', './upfile/1494491412.jpg', './small_image/1494491412_small.jpg', '2017-05-11 16:24:46', '张艺凡');
INSERT INTO `honor` VALUES ('101', '作品设计竞赛本科组网站类一等奖', '茅梓成 王哲望 张波', '唐伟 岑岗', './upfile/1494490817.jpg', './small_image/1494490817_small.jpg', '2017-05-11 16:20:17', '张艺凡');
INSERT INTO `honor` VALUES ('102', '设计竞赛本科组移动应用类一等奖', '刘旭辉 梁程峰 姚佳燕 别必云 陈小科', '唐伟', './upfile/1494492888.jpg', './small_image/1494492888_small.jpg', '2017-05-11 16:54:48', '张艺凡');
INSERT INTO `honor` VALUES ('103', '设计竞赛本科组移动应用类一等奖', '吴戈 王翔 陈颖秋', '鲍宗亮', './upfile/1494492991.jpg', './small_image/1494492991_small.jpg', '2017-05-11 16:56:31', '张艺凡');
INSERT INTO `honor` VALUES ('104', '作品设计竞赛本科组DV类一等奖', '欧余琴 夏玲 邹日杰', '刘省权', './upfile/1494493140.jpg', './small_image/1494493140_small.jpg', '2017-05-11 16:59:00', '张艺凡');
INSERT INTO `honor` VALUES ('105', '作品设计竞赛本科组动画类一等奖', '胡中天', '唐伟 雷运发', './upfile/1494493209.jpg', './small_image/1494493209_small.jpg', '2017-05-11 17:00:09', '张艺凡');
INSERT INTO `honor` VALUES ('106', '多媒体作品设计竞赛三等奖', '华益峰 牟正洋 胡晓峰', '汪文彬 岑岗', './upfile/1494493273.jpg', './small_image/1494493273_small.jpg', '2017-05-11 17:01:13', '张艺凡');
INSERT INTO `honor` VALUES ('107', '多媒体作品设计竞赛二等奖', '方泽文 王斌斌 林芳芳', '汪文彬', './upfile/1494493494.jpg', './small_image/1494493494_small.jpg', '2017-05-11 17:04:54', '张艺凡');
INSERT INTO `honor` VALUES ('108', '学数网', '王斌斌 方泽文', '汪文彬 岑岗', './upfile/1494493600.jpg', './small_image/1494493600_small.jpg', '2017-05-11 17:06:40', '张艺凡');
INSERT INTO `honor` VALUES ('109', '多媒体作品设计竞赛二等奖', '华益峰 沈理强 何潇铃', '汪文彬', './upfile/1494493702.jpg', './small_image/1494493702_small.jpg', '2017-05-11 17:08:22', '张艺凡');
INSERT INTO `honor` VALUES ('110', ' 艺 竹', '华益峰 胡晓峰 金梦奇', '岑岗  汪文斌', './upfile/1494507782.jpg', './small_image/1494507782_small.jpg', '2017-05-11 17:09:22', '张艺凡');
INSERT INTO `honor` VALUES ('111', '趣社区', '华益峰 牟正洋 金梦奇', '汪文彬 岑岗', './upfile/1494493853.jpg', './small_image/1494493853_small.jpg', '2017-05-11 17:10:53', '张艺凡');
INSERT INTO `honor` VALUES ('112', '基于四步曲的“教学”共享平台', '胡晓峰 陈璇 王国庆', '岑岗 汪文彬', './upfile/1494494108.jpg', './small_image/1494494108_small.jpg', '2017-05-11 17:15:08', '张艺凡');
INSERT INTO `honor` VALUES ('113', '极东之夜', '胡中天 陶芝松', '雷运发 林雪芬', './upfile/1494507134.jpg', './small_image/1494507134_small.jpg', '2017-05-11 17:17:00', '张艺凡');
INSERT INTO `honor` VALUES ('114', '“心旅”———大学生虚拟社区平台', '王斌斌 陈璇 方泽文', '汪文彬 岑岗', './upfile/1494494286.jpg', './small_image/1494494286_small.jpg', '2017-05-11 17:18:06', '张艺凡');

-- ----------------------------
-- Table structure for manage_user_info
-- ----------------------------
DROP TABLE IF EXISTS `manage_user_info`;
CREATE TABLE `manage_user_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` char(16) NOT NULL DEFAULT '',
  `user_pw` char(16) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of manage_user_info
-- ----------------------------
INSERT INTO `manage_user_info` VALUES ('1', '0', '0');

-- ----------------------------
-- Table structure for message
-- ----------------------------
DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `user` char(11) NOT NULL,
  `content` varchar(255) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of message
-- ----------------------------
INSERT INTO `message` VALUES ('王晨韬', '考试完还要军训啊！崩溃崩溃！', '2017-05-12 18:42:52', '22');
INSERT INTO `message` VALUES ('张艺凡', '快到期末考试了，复习了！！！', '2017-05-11 21:42:51', '20');
INSERT INTO `message` VALUES ('冯瀚', 'PHP最美了', '2017-05-11 19:40:49', '18');
INSERT INTO `message` VALUES ('王兴寅', '打游戏不如学习', '2017-05-12 18:40:09', '21');

-- ----------------------------
-- Table structure for note_info
-- ----------------------------
DROP TABLE IF EXISTS `note_info`;
CREATE TABLE `note_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module_id` int(11) DEFAULT NULL COMMENT '隶属子版块的id',
  `up_id` int(11) DEFAULT NULL COMMENT '回复帖子的id',
  `title` char(88) DEFAULT NULL COMMENT '帖子标题',
  `cont` text COMMENT '帖子内容',
  `time` datetime DEFAULT NULL COMMENT '发帖时间',
  `user_name` char(16) DEFAULT NULL COMMENT '发帖用户名',
  `times` int(11) DEFAULT NULL COMMENT '浏览次数',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of note_info
-- ----------------------------
INSERT INTO `note_info` VALUES ('12', '1', null, 'test', 'test！！！！！！', '2017-04-12 19:55:40', '1', null);
INSERT INTO `note_info` VALUES ('13', null, '12', '回复:test', 'test<br />\r\n', '2017-04-12 19:56:10', '1', null);
INSERT INTO `note_info` VALUES ('14', '1', null, 'ff', '共和国', '2017-04-12 19:59:46', '1', null);
INSERT INTO `note_info` VALUES ('15', null, '14', '回复:ff', 'jhg', '2017-04-12 20:00:35', '1', null);
INSERT INTO `note_info` VALUES ('16', null, '14', '回复:ff', 'drfegerg', '2017-04-26 19:19:53', '1', null);

-- ----------------------------
-- Table structure for son_module_info
-- ----------------------------
DROP TABLE IF EXISTS `son_module_info`;
CREATE TABLE `son_module_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `father_module_id` int(11) DEFAULT NULL COMMENT '隶属父板块的id',
  `module_name` char(66) DEFAULT NULL COMMENT '子版块名称',
  `module_cont` text COMMENT '子版块简介',
  `user_name` char(16) DEFAULT NULL COMMENT '发帖用户名',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of son_module_info
-- ----------------------------
INSERT INTO `son_module_info` VALUES ('1', '1', '子版块学习', '测试', 'wct');
INSERT INTO `son_module_info` VALUES ('2', '2', '子版块娱乐', '测试', 'wct');

-- ----------------------------
-- Table structure for suggest
-- ----------------------------
DROP TABLE IF EXISTS `suggest`;
CREATE TABLE `suggest` (
  `suggest` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of suggest
-- ----------------------------
INSERT INTO `suggest` VALUES ('851859736@qq.com');
INSERT INTO `suggest` VALUES ('23231');
INSERT INTO `suggest` VALUES ('da ');

-- ----------------------------
-- Table structure for user_info
-- ----------------------------
DROP TABLE IF EXISTS `user_info`;
CREATE TABLE `user_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` char(16) NOT NULL DEFAULT '',
  `user_pw` char(16) NOT NULL DEFAULT '',
  `time1` datetime DEFAULT NULL COMMENT '注册时间',
  `time2` datetime DEFAULT NULL COMMENT '最后的登录时间',
  `ison` int(1) DEFAULT '0' COMMENT '是否已登录',
  `name` char(16) DEFAULT NULL,
  `isAdmin` int(1) DEFAULT '0' COMMENT '是否为管理员',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_info
-- ----------------------------
INSERT INTO `user_info` VALUES ('5', '1160299270', '123456', '2017-05-11 19:13:02', '2017-05-11 19:13:13', '0', '沈费欣', '0');
INSERT INTO `user_info` VALUES ('6', '1160299334', '123456', '2017-05-04 14:32:30', '2017-05-12 21:01:19', '1', '张艺凡', '1');
INSERT INTO `user_info` VALUES ('9', '1', '1', '2017-05-11 20:08:06', '2017-05-12 19:49:37', '1', 'test', '1');
INSERT INTO `user_info` VALUES ('4', '1160299050', '123456', '2017-05-11 19:14:16', '2017-05-11 19:14:20', '0', '潘文昕', '0');
INSERT INTO `user_info` VALUES ('2', '1160299196', '123456', '2017-05-04 14:32:58', '2017-05-12 18:40:35', '0', '王晨韬', '1');
INSERT INTO `user_info` VALUES ('3', '1160299253', '123456', '2017-05-04 14:33:25', '2017-05-12 18:39:31', '0', '王兴寅', '1');
INSERT INTO `user_info` VALUES ('7', '1160299351', '123456', '2017-05-04 14:33:47', '2017-05-11 19:49:44', '0', '冯瀚', '1');
INSERT INTO `user_info` VALUES ('8', '1160299293', '123456', '2017-05-11 19:11:26', '2017-05-11 19:11:28', '0', '冯天祥', '0');
INSERT INTO `user_info` VALUES ('1', '1160492024', '123456', '2017-05-11 19:12:29', '2017-05-11 19:12:32', '0', '陈波', '0');
