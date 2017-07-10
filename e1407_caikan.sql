/*
Navicat MySQL Data Transfer

Source Server         : fiberstore
Source Server Version : 50611
Source Host           : localhost:3306
Source Database       : e1407_caikan

Target Server Type    : MYSQL
Target Server Version : 50611
File Encoding         : 65001

Date: 2015-11-05 12:28:25
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admins`
-- ----------------------------
DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `lastloginip` varchar(20) NOT NULL,
  `lastlogintime` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admins
-- ----------------------------
INSERT INTO `admins` VALUES ('1', 'root', 'e10adc3949ba59abbe56e057f20f883e', '::1', '1446689194', '1');
INSERT INTO `admins` VALUES ('2', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '127.0.0.1', '1418659513', '2');
INSERT INTO `admins` VALUES ('3', 'ck', 'e10adc3949ba59abbe56e057f20f883e', '127.0.0.1', '1418659513', '0');

-- ----------------------------
-- Table structure for `category`
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(20) NOT NULL,
  `pid` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('1', '体育', '0');
INSERT INTO `category` VALUES ('2', '娱乐', '0');
INSERT INTO `category` VALUES ('3', 'NBA', '1');
INSERT INTO `category` VALUES ('4', '足球', '1');
INSERT INTO `category` VALUES ('5', '电影', '2');
INSERT INTO `category` VALUES ('6', '音乐', '2');
INSERT INTO `category` VALUES ('7', '英超', '4');
INSERT INTO `category` VALUES ('8', '热火', '3');
INSERT INTO `category` VALUES ('9', '马刺', '3');
INSERT INTO `category` VALUES ('10', '西甲', '4');
INSERT INTO `category` VALUES ('11', '意甲', '4');
INSERT INTO `category` VALUES ('12', '曼联', '7');
INSERT INTO `category` VALUES ('13', '车路士', '7');
INSERT INTO `category` VALUES ('14', '巴塞罗那', '10');
INSERT INTO `category` VALUES ('15', '皇家马德里', '10');
INSERT INTO `category` VALUES ('16', '游戏', '0');
INSERT INTO `category` VALUES ('17', '英雄联盟', '16');
INSERT INTO `category` VALUES ('18', '一灯大师', '17');

-- ----------------------------
-- Table structure for `level`
-- ----------------------------
DROP TABLE IF EXISTS `level`;
CREATE TABLE `level` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `menu` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of level
-- ----------------------------
INSERT INTO `level` VALUES ('1', '超级管理员', '[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"12\",\"13\",\"14\",\"15\",\"16\",\"17\"]');
INSERT INTO `level` VALUES ('2', '管理员', '[\"1\",\"2\",\"3\",\"7\",\"8\",\"9\",\"10\"]');
INSERT INTO `level` VALUES ('3', '编辑', '[\"1\",\"2\",\"3\"]');
INSERT INTO `level` VALUES ('4', '菜鸟', '[\"1\",\"2\",\"3\"]');
INSERT INTO `level` VALUES ('5', '', '[\"1\"]');
INSERT INTO `level` VALUES ('6', 'test', '[\"1\",\"2\",\"14\",\"15\"]');

-- ----------------------------
-- Table structure for `message`
-- ----------------------------
DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` varchar(100) NOT NULL,
  `time` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `is_read` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0未读，1已读',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of message
-- ----------------------------
INSERT INTO `message` VALUES ('1', 'ck', 'beyond', 'ck love beyond', '1415180705', '0', '1');
INSERT INTO `message` VALUES ('2', 'chairman', '习大大', '此前，《河北日报》也曾在头版刊文，还原这位正定“老书记”在正定发生过的故事。两张党报前后分别以数万字的篇幅，详细回忆了习近平在两地的燃情岁月，曝光了习近平在不同时期工作、生活的一些故事，更有许多照片首', '1415199165', '0', '1');
INSERT INTO `message` VALUES ('3', 'ck', '审核', '后台审核才能前台显示', '1415204122', '0', '1');
INSERT INTO `message` VALUES ('4', 'niece', 'i am a idiot', 'i made my niece hurt yesterday', '1415282018', '0', '1');
INSERT INTO `message` VALUES ('5', 'what the fuck', 'what the hell', 'go to hell', '1415283207', '0', '1');
INSERT INTO `message` VALUES ('6', 'aaa', 'aaa', 'aaaaaa', '1439884557', '0', '1');
INSERT INTO `message` VALUES ('7', 'ck', 'rilegou', 'fuck', '1439886935', '0', '1');
INSERT INTO `message` VALUES ('8', 'gadgsd', 'gdsaga', 'gasdgads', '1439886987', '0', '1');
INSERT INTO `message` VALUES ('9', 'ck', '111', '111', '1439888143', '1', '1');
INSERT INTO `message` VALUES ('10', 'ck', '222', '222', '1439888842', '0', '1');
INSERT INTO `message` VALUES ('11', 'ck', 'gfdh', 'gdsg', '1439949315', '0', '1');
INSERT INTO `message` VALUES ('12', 'ggg', 'ggg', 'gggg', '1439951436', '0', '1');
INSERT INTO `message` VALUES ('13', 'sdfgfdsggfdg', 'gfdgfdg', 'gdsgdf', '1439951521', '0', '0');
INSERT INTO `message` VALUES ('14', 'gfdsg', 'fdg', 'gdfsg', '1439951608', '1', '1');
INSERT INTO `message` VALUES ('15', 'fsf', 'fsdaf', 'dfsdaf', '1439951913', '0', '0');
INSERT INTO `message` VALUES ('16', 'dgdfg', 'fgfggg', 'gfdg', '1439952090', '0', '1');
INSERT INTO `message` VALUES ('17', 'gdfgdfsg', 'gdsfg', 'fdgsdf', '1439952972', '1', '0');
INSERT INTO `message` VALUES ('18', 'ck', 'ck', 'ck', '1441091795', '0', '1');
INSERT INTO `message` VALUES ('19', 'bb', 'bb', 'bb', '1441092188', '0', '0');

-- ----------------------------
-- Table structure for `news`
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `newstime` datetime NOT NULL,
  `image` varchar(300) NOT NULL,
  `cate_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES ('1', 'aaa', '央视网 ', '22222222', '0000-00-00 00:00:00', '', '1');
INSERT INTO `news` VALUES ('2', 'aaa', '互联网', '22222222', '0000-00-00 00:46:46', '', '3');
INSERT INTO `news` VALUES ('3', 'aaa', '中国新闻网', '22222222', '0000-00-00 00:00:00', '', '5');
INSERT INTO `news` VALUES ('4', 'aaa', '中国新闻网', '22222222', '0000-00-00 00:00:00', '', '7');
INSERT INTO `news` VALUES ('5', 'aaa', '中国新闻网', '22222222', '0000-00-00 00:00:00', '', '9');
INSERT INTO `news` VALUES ('6', 'aaa', '中国新闻网', '22222222', '0000-00-00 00:00:00', '', '11');
INSERT INTO `news` VALUES ('7', 'aaa', '中国新闻网', '22222222', '0000-00-00 00:00:00', '', '13');
INSERT INTO `news` VALUES ('8', 'aaa', '中国新闻网', '22222222', '0000-00-00 00:00:00', '', '15');
INSERT INTO `news` VALUES ('9', 'aaa', '中国新闻网', '22222222', '0000-00-00 00:00:00', '', '17');
INSERT INTO `news` VALUES ('10', '金三胖', '中国新闻网', '22222222', '0000-00-00 00:00:00', '', '2');
INSERT INTO `news` VALUES ('13', 'aaa', '', '22222222', '0000-00-00 00:00:00', '', '3');
INSERT INTO `news` VALUES ('16', 'aaa', '', '怎么这么2', '0000-00-00 00:00:00', '', '6');
INSERT INTO `news` VALUES ('17', 'aaa', '', '22222222', '0000-00-00 00:00:00', '', '8');
INSERT INTO `news` VALUES ('19', 'aaa', '', '222222', '0000-00-00 00:00:00', '', '1');
INSERT INTO `news` VALUES ('23', '热火', 'b', 'bbbbbbbbbbbbbb', '0000-00-00 00:01:56', '', '3');
INSERT INTO `news` VALUES ('24', '玩大的', '', 'somebody', '0000-00-00 00:20:14', '', '5');
INSERT INTO `news` VALUES ('25', 'ck', '', 'beyond', '0000-00-00 00:20:14', '', '0');
INSERT INTO `news` VALUES ('26', 'myth', '', '雨夜de屠夫', '0000-00-00 00:20:14', '', '0');
INSERT INTO `news` VALUES ('27', 'jack', '', 'who is jack?', '0000-00-00 00:20:14', '', '0');
INSERT INTO `news` VALUES ('28', 'you can you up ', '', 'no can no bb', '0000-00-00 00:00:00', '', '0');
INSERT INTO `news` VALUES ('29', 'no zuo no die why you try', '', 'you try you die why you cry', '0000-00-00 00:00:00', '', '0');
INSERT INTO `news` VALUES ('39', 'aaa', '', 'vvv', '2014-10-21 22:30:13', 'upload/2014/10/21/14139018136747.jpg', '0');
INSERT INTO `news` VALUES ('40', 'a city', '', 'one person', '2014-10-21 23:58:08', '', '0');
INSERT INTO `news` VALUES ('41', '基佬', '', '时光守卫者', '2014-10-26 01:42:23', 'upload/2014/10/25/14142315827653.jpg', '17');
INSERT INTO `news` VALUES ('42', '我就是贾克斯', '', '我又回来了', '2014-10-26 01:35:58', 'upload/2014/10/25/14142303687515.jpg', '18');
INSERT INTO `news` VALUES ('43', '战争之王', '', '潘升', '2014-10-25 23:01:38', 'upload/2014/10/25/14142492987451.jpg', '17');
INSERT INTO `news` VALUES ('44', 'aaaaaaaaaaa', '', 'bbbbbbbb', '2014-10-25 23:12:35', '', '16');
INSERT INTO `news` VALUES ('45', '龙血武姬', '', '龙女', '2014-10-26 01:44:05', 'upload/2014/10/26/14142590146244.jpg', '17');
INSERT INTO `news` VALUES ('46', '熔岩巨兽', '', '石头人', '2014-11-01 23:13:30', 'upload/2014/11/01/14148548108987.jpg', '17');
INSERT INTO `news` VALUES ('47', '习近平出席全军政治工作会议并发表重要讲话', '', '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 新华网福建上杭古田11月1日电(记者曹智、李宣良) \r\n全军政治工作会议10月30日在福建省上杭县古田镇召开。中共中央总书记、国家主席、中央军委主席习近平31日出席会议并发表重要讲话。习近平强调，军队\r\n政治工作的时代主题是，紧紧围绕实现中华民族伟大复兴的中国梦，为实现党在新形势下的强军目标提供坚强政治保证。全军必须坚持以马克思列宁主义、毛泽东思\r\n想、邓小平理论、“三个代表”重要思想、科学发展观为指导，贯彻党中央关于全面推进依法治国和从严治党的部署要求，贯彻依法治军、从严治军方针，紧紧围绕\r\n我军政治工作的时代主题，加强和改进新形势下我军政治工作，充分发挥政治工作对强军兴军的生命线作用。\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 山峦含黛、层林尽染，血脉传承、暖意萦怀。白墙青瓦的古田会议会址庄重古朴，“古田会议永放光芒”8个大字熠熠生辉。</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 这里是我们党确立思想建党、政治建军原则的地方，是我军政治工作奠基的地方，是新型人民军队定型的地方。早在福建工作期间，习近平先后7次来到这里，大力倡导和弘扬古田会议精神。</p>', '2014-11-02 00:51:33', '', '16');
INSERT INTO `news` VALUES ('48', 'a', '', 'a', '2014-11-02 01:20:44', '', '16');
INSERT INTO `news` VALUES ('50', 'c', '', 'c', '2014-11-02 01:34:06', '', '16');
INSERT INTO `news` VALUES ('51', 'd', '', 'd', '2014-11-02 01:37:21', '', '0');
INSERT INTO `news` VALUES ('52', 'e', '', 'e', '2014-11-02 01:43:54', '', '16');
INSERT INTO `news` VALUES ('53', 'f', '', 'f', '2014-11-02 01:44:48', '', '16');
INSERT INTO `news` VALUES ('54', 'g', '', 'g', '2014-11-02 01:46:37', '', '16');
INSERT INTO `news` VALUES ('55', 'h', '', 'hhh', '2014-11-02 01:47:37', '', '16');
INSERT INTO `news` VALUES ('56', 'jj', '', 'jj', '2014-11-02 22:35:40', '', '16');
INSERT INTO `news` VALUES ('57', 'kk', '', 'kk', '2014-11-02 22:38:28', '', '16');
INSERT INTO `news` VALUES ('58', 'll', '', 'll', '2014-11-02 22:39:17', '', '16');
INSERT INTO `news` VALUES ('59', 'zz', '', 'zz', '2014-11-02 22:39:39', '', '0');
INSERT INTO `news` VALUES ('60', 'aa', '', 'aa', '2014-11-03 00:31:38', '', '16');
INSERT INTO `news` VALUES ('61', '<script>alert(1);</script>', '', 'bbbb', '2014-11-03 00:32:49', '', '16');
INSERT INTO `news` VALUES ('62', '<a href=\"http://www.baidu.com\">点我</a>>', '', 'aaaaaaaaa', '2014-11-03 00:33:58', '', '16');
INSERT INTO `news` VALUES ('63', 'beyond', '', 'beyond', '2014-11-11 20:32:39', '', '2');
INSERT INTO `news` VALUES ('64', 'aa', '', 'aa', '2015-11-04 16:20:35', '', '1');
INSERT INTO `news` VALUES ('65', '测试多图插件标题', '', '测试多图插件内容', '2015-11-05 11:45:06', 'upload/2015/11/05/14466951063417.png', '2');

-- ----------------------------
-- Table structure for `ticket`
-- ----------------------------
DROP TABLE IF EXISTS `ticket`;
CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `ticket` varchar(32) NOT NULL,
  `user_id` int(11) NOT NULL,
  `otime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ticket
-- ----------------------------
INSERT INTO `ticket` VALUES ('0', 'f033ab37c30201f73f142449d037028d', '80', '1445049537');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(30) NOT NULL,
  `password` char(32) NOT NULL,
  `email` char(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'sky', '4297f44b13955235245b2497399d7a93', 'sky@dodi.cn', '0');
INSERT INTO `user` VALUES ('2', 'miny', '4297f44b13955235245b2497399d7a93', 'miny@dodi.cn', '0');
INSERT INTO `user` VALUES ('3', 'yss', '21232f297a57a5a743894a0e4a801fc3', 'yss@dodi.cn', '1');
INSERT INTO `user` VALUES ('4', 'yss2', '698d51a19d8a121ce581499d7b701668', 'yss@dodi.cn', '1');
INSERT INTO `user` VALUES ('5', 'yss3', '202cb962ac59075b964b07152d234b70', 'yss@dodi.cn', '1');
INSERT INTO `user` VALUES ('6', 'just', '8134b84030cca5285ed0e0b31ba06f10', 'yss@dodi.cn', '0');
INSERT INTO `user` VALUES ('7', 'tom', 'e10adc3949ba59abbe56e057f20f883e', '178060634@qq.com', '1');
INSERT INTO `user` VALUES ('8', 'bitch', '123456', '178060634@qq.com', '0');
INSERT INTO `user` VALUES ('9', 'gay', '123456', '', '0');
INSERT INTO `user` VALUES ('10', 'a', '123456', '178060634@qq.com', '0');
INSERT INTO `user` VALUES ('11', 'tom', '123456', '123456', '0');
INSERT INTO `user` VALUES ('12', '贾克斯', '123', '123', '0');
INSERT INTO `user` VALUES ('13', 'somegay', '456', '178060634@qq.com', '0');
INSERT INTO `user` VALUES ('14', 'a drunk man', '123', '178060634@qq.com', '0');
INSERT INTO `user` VALUES ('15', '武器大师', '123', '178060634@qq.com', '0');
INSERT INTO `user` VALUES ('16', '无极剑圣', '123', '178060634@qq.com', '0');
INSERT INTO `user` VALUES ('17', '无双剑姬', '123', '178060634@qq.com', '0');
INSERT INTO `user` VALUES ('18', '放逐之刃', '202cb962ac59075b964b07152d234b70', '178060634@qq.com', '1');
INSERT INTO `user` VALUES ('19', '猴子', '202cb962ac59075b964b07152d234b70', '178060634@qq.com', '1');
INSERT INTO `user` VALUES ('20', '狗头', '202cb962ac59075b964b07152d234b70', '178060634@qq.com', '1');
INSERT INTO `user` VALUES ('21', 'what', '202cb962ac59075b964b07152d234b70', '178060634@qq.com', '1');
INSERT INTO `user` VALUES ('22', '石头人', '202cb962ac59075b964b07152d234b70', '178060634@qq.com', '0');
INSERT INTO `user` VALUES ('23', '熔岩巨兽', '202cb962ac59075b964b07152d234b70', '178060634@qq.com', '0');
INSERT INTO `user` VALUES ('24', '屎头人', '202cb962ac59075b964b07152d234b70', '178060634@qq.com', '0');
INSERT INTO `user` VALUES ('25', '皮小秀', '202cb962ac59075b964b07152d234b70', '178060634@qq.com', '0');
INSERT INTO `user` VALUES ('26', '大姨妈', '202cb962ac59075b964b07152d234b70', '178060634@qq.com', '1');
INSERT INTO `user` VALUES ('27', 'abc', '202cb962ac59075b964b07152d234b70', '178060634@qq.com', '1');
INSERT INTO `user` VALUES ('28', 'aaa', '202cb962ac59075b964b07152d234b70', '178060634@qq.com', '1');
INSERT INTO `user` VALUES ('29', 'sb', '202cb962ac59075b964b07152d234b70', '178060634@qq.com', '0');
INSERT INTO `user` VALUES ('30', 'cnm', '202cb962ac59075b964b07152d234b70', '178060634@qq.com', '0');
INSERT INTO `user` VALUES ('31', 'wnm', '202cb962ac59075b964b07152d234b70', '178060634@qq.com', '1');
INSERT INTO `user` VALUES ('32', 'fuck', '202cb962ac59075b964b07152d234b70', '178060634@qq.com', '0');
INSERT INTO `user` VALUES ('33', 'olive', '202cb962ac59075b964b07152d234b70', '178060634@qq.com', '1');
INSERT INTO `user` VALUES ('34', 'someday', '202cb962ac59075b964b07152d234b70', '178060634@qq.com', '1');
INSERT INTO `user` VALUES ('35', '阿贾克斯', '202cb962ac59075b964b07152d234b70', '178060634@qq.com', '1');
INSERT INTO `user` VALUES ('36', 'gg', '202cb962ac59075b964b07152d234b70', '178060634@qq.com', '1');
INSERT INTO `user` VALUES ('37', 'aaaaa', '202cb962ac59075b964b07152d234b70', '178060634@qq.com', '1');
INSERT INTO `user` VALUES ('38', '123', '202cb962ac59075b964b07152d234b70', '178060634@qq.com', '1');
INSERT INTO `user` VALUES ('39', '1111', '202cb962ac59075b964b07152d234b70', '178060634@qq.com', '1');
INSERT INTO `user` VALUES ('40', '456', '202cb962ac59075b964b07152d234b70', '178060634@qq.com', '0');
INSERT INTO `user` VALUES ('41', '11', '202cb962ac59075b964b07152d234b70', '178060634@qq.com', '0');
INSERT INTO `user` VALUES ('42', 'baby', '202cb962ac59075b964b07152d234b70', '178060634@qq.com', '0');
INSERT INTO `user` VALUES ('43', '789', 'a0a080f42e6f13b3a2df133f073095dd', '178060634@qq.com', '0');
INSERT INTO `user` VALUES ('44', '741', '202cb962ac59075b964b07152d234b70', '178060634@qq.com', '0');
INSERT INTO `user` VALUES ('45', 'fff', '202cb962ac59075b964b07152d234b70', '178060634@qq.com', '0');
INSERT INTO `user` VALUES ('46', 'b', '202cb962ac59075b964b07152d234b70', '178060634@qq.com', '0');
INSERT INTO `user` VALUES ('47', 'bb', '202cb962ac59075b964b07152d234b70', '178060634@qq.com', '0');
INSERT INTO `user` VALUES ('48', 'bbb', '202cb962ac59075b964b07152d234b70', '', '0');
INSERT INTO `user` VALUES ('49', 'bbbb', '202cb962ac59075b964b07152d234b70', '178060634@qq.com', '0');
INSERT INTO `user` VALUES ('50', 'bbbbb', '202cb962ac59075b964b07152d234b70', '178060634@qq.com', '0');
INSERT INTO `user` VALUES ('51', 'c', '202cb962ac59075b964b07152d234b70', '178060634@qq.com', '0');
INSERT INTO `user` VALUES ('52', 'cc', '202cb962ac59075b964b07152d234b70', '178060634@qq.com', '0');
INSERT INTO `user` VALUES ('53', 'ccc', '202cb962ac59075b964b07152d234b70', '178060634@qq.com', '0');
INSERT INTO `user` VALUES ('54', '145', '202cb962ac59075b964b07152d234b70', '178060634@qq.com', '0');
INSERT INTO `user` VALUES ('55', 'ddd', '202cb962ac59075b964b07152d234b70', '178060634@qq.com', '0');
INSERT INTO `user` VALUES ('56', 'd', '202cb962ac59075b964b07152d234b70', '178060634@qq.com', '0');
INSERT INTO `user` VALUES ('57', 'bbbbbbbbb', 'e10adc3949ba59abbe56e057f20f883e', '178060634@qq.com', '0');
INSERT INTO `user` VALUES ('58', 'hh', 'e10adc3949ba59abbe56e057f20f883e', '178060634@qq.com', '0');
INSERT INTO `user` VALUES ('59', 'k', 'e10adc3949ba59abbe56e057f20f883e', '178060634@qq.com', '0');
INSERT INTO `user` VALUES ('60', 'kk', 'e10adc3949ba59abbe56e057f20f883e', '178060634@qq.com', '1');
INSERT INTO `user` VALUES ('61', 'myth', 'e10adc3949ba59abbe56e057f20f883e', '178060634@qq.com', '1');
INSERT INTO `user` VALUES ('62', 'gsdfg', '202cb962ac59075b964b07152d234b70', '178060634@qq.com', '0');
INSERT INTO `user` VALUES ('63', 'gossip', '202cb962ac59075b964b07152d234b70', '178060634@qq.com', '1');
INSERT INTO `user` VALUES ('64', 'sorrow', '202cb962ac59075b964b07152d234b70', '178060634@qq.com', '1');
INSERT INTO `user` VALUES ('65', 'love', '202cb962ac59075b964b07152d234b70', '178060634@qq.com', '1');
INSERT INTO `user` VALUES ('66', 'gsdg', '202cb962ac59075b964b07152d234b70', '178060634@qq.com', '1');
INSERT INTO `user` VALUES ('67', 'monday', '202cb962ac59075b964b07152d234b70', '178060634@qq.com', '0');
INSERT INTO `user` VALUES ('68', 'wednesday', '202cb962ac59075b964b07152d234b70', '178060634@qq.com', '0');
INSERT INTO `user` VALUES ('69', 'wednesday', '202cb962ac59075b964b07152d234b70', '178060634@qq.com', '0');
INSERT INTO `user` VALUES ('70', 'wednesday', '202cb962ac59075b964b07152d234b70', '178060634@qq.com', '1');
INSERT INTO `user` VALUES ('71', 'Thursday', '202cb962ac59075b964b07152d234b70', '178060634@qq.com', '1');
INSERT INTO `user` VALUES ('72', 'tom', '202cb962ac59075b964b07152d234b70', '178060634@qq.com', '1');
INSERT INTO `user` VALUES ('73', 'tom', '202cb962ac59075b964b07152d234b70', '178060634@qq.com', '0');
INSERT INTO `user` VALUES ('74', 'tom', '202cb962ac59075b964b07152d234b70', '178060634@qq.com', '0');
INSERT INTO `user` VALUES ('75', 'tom', '202cb962ac59075b964b07152d234b70', '178060634@qq.com', '0');
INSERT INTO `user` VALUES ('76', 'tom', '202cb962ac59075b964b07152d234b70', '178060634@qq.com', '0');
INSERT INTO `user` VALUES ('77', 'tom', '202cb962ac59075b964b07152d234b70', '178060634@qq.com', '0');
INSERT INTO `user` VALUES ('78', 'tom', '202cb962ac59075b964b07152d234b70', '178060634@qq.com', '0');
INSERT INTO `user` VALUES ('79', 'jax', 'e10adc3949ba59abbe56e057f20f883e', '123456@qq.com', '0');
INSERT INTO `user` VALUES ('80', 'ajax', 'e10adc3949ba59abbe56e057f20f883e', '123456@qq.com', '0');
