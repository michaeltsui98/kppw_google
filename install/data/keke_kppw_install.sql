/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50135
Source Host           : localhost:3306
Source Database       : kw

Target Server Type    : MYSQL
Target Server Version : 50135
File Encoding         : 65001

Date: 2012-06-05 15:06:03
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `keke_witkey_ad`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_ad`;
CREATE TABLE `keke_witkey_ad` (
  `ad_id` int(11) NOT NULL AUTO_INCREMENT,
  `target_id` int(11) DEFAULT NULL,
  `ad_type` char(20) DEFAULT NULL,
  `ad_position` char(20) DEFAULT NULL,
  `ad_name` varchar(300) DEFAULT NULL,
  `ad_file` varchar(300) DEFAULT NULL,
  `ad_content` text,
  `ad_url` varchar(100) DEFAULT NULL,
  `start_time` int(11) DEFAULT '0',
  `end_time` int(11) DEFAULT '0',
  `uid` int(11) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `listorder` int(11) DEFAULT NULL,
  `width` varchar(15) DEFAULT NULL,
  `height` varchar(15) DEFAULT NULL,
  `tpl_type` char(20) DEFAULT NULL,
  `is_allow` tinyint(1) DEFAULT NULL,
  `on_time` int(10) DEFAULT '0',
  PRIMARY KEY (`ad_id`),
  KEY `index_1` (`ad_id`),
  KEY `ad_name` (`ad_name`)
) ENGINE=MyISAM AUTO_INCREMENT=265 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_ad
-- ----------------------------
INSERT INTO keke_witkey_ad VALUES ('262', '12', 'image', 'global', '任务详情_右下部广告', 'data/uploads/sys/ad/95164f3dc640dfd7b.jpg', null, null, '0', '0', null, null, '0', '308', '90', null, '1', '1332574349');
INSERT INTO keke_witkey_ad VALUES ('236', '13', 'image', 'global', '首页_顶部幻灯片', 'data/uploads/sys/ad/49494f3b632e6da18.jpg', null, null, '0', '0', null, null, '4', '525', '270', 'default', '1', '1332398875');
INSERT INTO keke_witkey_ad VALUES ('264', '5', 'image', 'right', '首页_中部三栏广告3', 'data/uploads/sys/ad/258904eeaa57b124ce.jpg', null, null, '0', '0', null, null, '0', '310', '90', null, '1', '1338880530');
INSERT INTO keke_witkey_ad VALUES ('188', '5', 'image', 'left', '首页_中部三栏广告1', 'data/uploads/sys/ad/163894f70041c54abf.jpg', 'ad', 'http://www.baidu.com', '0', '0', null, null, '0', '310', '90', null, '1', '1338880530');
INSERT INTO keke_witkey_ad VALUES ('241', '4', 'image', 'global', 'kppw中上部首页广告', 'data/uploads/sys/ad/308644f3cd6a47d8ba.jpg', null, 'http://www.phpclub.cn/kppw20', '0', '0', null, null, '0', '950', '90', 'default', '1', '1338880530');
INSERT INTO keke_witkey_ad VALUES ('195', '4', 'image', 'global', '首页_中上部通栏广告', 'data/uploads/2011/12/16/258904eeaa57b124cf.jpg', '/* 150&#42;151 */', 'http://www.baidu.com', '0', '0', null, null, null, '950', '90', null, '0', '1332398875');
INSERT INTO keke_witkey_ad VALUES ('196', '6', 'image', 'left', '首页_中下部二栏广告1', 'data/uploads/2011/12/16/258904eeaa57b124cf.jpg', 'google_ad_width = 180;', 'http://www.baidu.com', '0', '0', null, null, null, '470', '90', null, '0', '1332398875');
INSERT INTO keke_witkey_ad VALUES ('197', '6', 'image', 'right', '首页_中下部二栏广告2', 'data/uploads/2011/12/16/258904eeaa57b124cf.jpg', 'google_ad_height = 150;', 'http://www.baidu.com', '0', '0', null, null, null, '470', '90', null, '0', '1332398875');
INSERT INTO keke_witkey_ad VALUES ('198', '7', 'image', 'left', '大厅列表_头部二栏广告1', 'data/uploads/2011/12/16/258904eeaa57b124cf.jpg', '//-->', 'http://www.baidu.com', '0', '0', null, null, null, '310', '90', null, '0', '1332398875');
INSERT INTO keke_witkey_ad VALUES ('199', '7', 'image', 'right', '大厅列表_头部二栏广告2', 'data/uploads/2011/12/16/258904eeaa57b124cf.jpg', '</script>', 'http://www.baidu.com', '0', '0', null, null, null, '630', '90', null, '0', '1332398875');
INSERT INTO keke_witkey_ad VALUES ('200', '9', 'image', 'global', '大厅列表_底部通栏广告', 'data/uploads/2011/12/16/258904eeaa57b124cf.jpg', '<script type=\"text/javascript\"', 'http://www.baidu.com', '0', '0', null, null, null, '950', '90', null, '0', '1332398875');
INSERT INTO keke_witkey_ad VALUES ('201', '10', 'image', 'global', '资讯_顶部通栏广告', 'data/uploads/2011/12/16/258904eeaa57b124cf.jpg', 'src=\"http://pagead2.googlesyndication.com/pagead/show_ads.js\">', 'http://www.baidu.com', '0', '0', null, null, '0', '950', '90', null, '0', '1332398875');
INSERT INTO keke_witkey_ad VALUES ('255', '6', 'image', 'right', '首页_中下部二栏广告', 'data/uploads/sys/ad/47604f3cd3f7ec9b7.jpg', null, null, '0', '0', null, null, '0', '470', '90', null, '1', '1338880530');
INSERT INTO keke_witkey_ad VALUES ('254', '6', 'image', 'left', '首页_中下部二栏广告', 'data/uploads/sys/ad/111124f3cd3e0326f4.jpg', null, null, '0', '0', null, null, '0', '470', '90', null, '1', '1338880530');
INSERT INTO keke_witkey_ad VALUES ('234', '13', 'image', 'global', '首页_顶部幻灯片', 'data/uploads/sys/ad/68614f3b632041212.jpg', null, null, '0', '0', null, null, '1', '525', '270', 'default', '1', '1332398875');
INSERT INTO keke_witkey_ad VALUES ('240', '13', 'image', 'global', '首页_顶部幻灯片', 'data/uploads/sys/ad/294054f3b6311c7e19.jpg', null, 'http://www.kppw.cn', '0', '0', null, null, '5', '525', '270', null, '1', '1332398875');
INSERT INTO keke_witkey_ad VALUES ('216', '48', 'image', 'global', '任务详情_右下部广告', 'data/uploads/2011/12/30/61594efd64ca66d35.jpg', null, null, '0', '0', null, null, null, '308', '90', 'default', '1', '1332398875');
INSERT INTO keke_witkey_ad VALUES ('253', '10', 'image', 'global', '资讯_顶部通栏广告', 'data/uploads/sys/ad/133364f3cd2be7f2b5.jpg', null, null, '0', '0', null, null, '0', '950', '90', null, '1', '1332574125');
INSERT INTO keke_witkey_ad VALUES ('251', '11', 'image', 'left', '首页_底部二栏广告', 'data/uploads/sys/ad/118894f3cd3a07ff52.jpg', null, null, '1329321600', '0', null, null, '0', '470', '90', null, '1', '1338880530');
INSERT INTO keke_witkey_ad VALUES ('252', '11', 'image', 'right', '首页_底部二栏广告', 'data/uploads/sys/ad/264514f3cd36006759.jpg', null, null, '0', '0', null, null, '0', '470', '90', null, '1', '1338880530');
INSERT INTO keke_witkey_ad VALUES ('256', '7', 'image', 'left', '大厅列表_头部二栏广告', 'data/uploads/sys/ad/256864f3cd45b425e4.jpg', null, null, '0', '0', null, null, '0', '310', '90', null, '1', '1332571819');
INSERT INTO keke_witkey_ad VALUES ('257', '7', 'image', 'right', '大厅列表_头部二栏广告右', 'data/uploads/sys/ad/73834f3cd4b95f6b8.jpg', null, null, '0', '0', null, null, '0', '630', '90', null, '1', '1332571819');
INSERT INTO keke_witkey_ad VALUES ('258', '8', 'image', 'top', '大厅列表_右侧上下广告-上', 'data/uploads/sys/ad/297344f3cd5705cb7c.jpg', null, null, '0', '0', null, null, '0', '145', '250', null, '1', '1332571819');
INSERT INTO keke_witkey_ad VALUES ('259', '8', 'image', 'bottom', '大厅列表_右侧上下广告 下', 'data/uploads/sys/ad/181384f3cd5a7cb20d.jpg', null, null, '0', '0', null, null, '0', '145', '250', null, '1', '1332571819');
INSERT INTO keke_witkey_ad VALUES ('260', '9', 'image', 'global', '大厅列表_底部通栏广告', 'data/uploads/sys/ad/273774f3cd61fd0035.jpg', null, null, '0', '0', null, null, '0', '950', '90', null, '1', '1332571819');
INSERT INTO keke_witkey_ad VALUES ('261', '13', 'image', 'global', '首页_顶部幻灯片', 'data/uploads/sys/ad/10574f3dae0c4bc6b.jpg', null, null, '0', '0', null, null, '2', '525', '270', null, '1', '1332398875');
INSERT INTO keke_witkey_ad VALUES ('263', '5', 'image', 'center', '首页_中部三栏广告2', 'data/uploads/sys/ad/258904eeaa57b124cf.jpg', null, null, '0', '0', null, null, '0', '310', '90', null, '1', '1338880530');

-- ----------------------------
-- Table structure for `keke_witkey_ad_target`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_ad_target`;
CREATE TABLE `keke_witkey_ad_target` (
  `target_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(20) DEFAULT NULL,
  `code` char(50) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `targets` varchar(255) DEFAULT '',
  `position` varchar(150) DEFAULT NULL,
  `ad_size` varchar(255) DEFAULT NULL,
  `ad_num` int(11) DEFAULT NULL,
  `sample_pic` varchar(100) DEFAULT NULL,
  `is_allow` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`target_id`),
  KEY `target_id` (`target_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_ad_target
-- ----------------------------
INSERT INTO keke_witkey_ad_target VALUES ('1', '全局_页顶通栏广告', 'GLOBAL_TOP_BANNER', '全局_页顶通栏广告', 'index,task_list,shop,article,case', 'a:1:{s:6:\"global\";s:6:\"950*90\";}', '', '1', 'data/adpic/global_top_banner.jpg', '0');
INSERT INTO keke_witkey_ad_target VALUES ('4', '首页_中上部通栏广告', 'HOME_UPPER_BANNER', '首页_中上部通栏广告', 'index', 'a:1:{s:6:\"global\";s:6:\"950*90\";} ', '', '1', 'data/adpic/home_upper_banner.jpg', '1');
INSERT INTO keke_witkey_ad_target VALUES ('5', '首页_中部三栏广告', 'HOME_CENTAL_THREE', '首页_中部三栏广告', 'index', 'a:3:{s:4:\"left\";s:6:\"310*90\";s:6:\"center\";s:6:\"310*90\";s:5:\"right\";s:6:\"310*90\";} ', '', '3', 'data/adpic/home_central_three.jpg', '1');
INSERT INTO keke_witkey_ad_target VALUES ('6', '首页_中下部二栏广告', 'HOME_LOWER_SECOND', '首页_中下部二栏广告', 'index', 'a:2:{s:4:\"left\";s:6:\"470*90\";s:5:\"right\";s:6:\"470*90\";} ', '', '2', 'data/adpic/home_lower_second.jpg', '1');
INSERT INTO keke_witkey_ad_target VALUES ('7', '大厅列表_头部二栏广告', 'LIST_HEAD_TWO', '大厅列表_头部二栏广告', 'task_list,shop_list', 'a:2:{s:4:\"left\";s:6:\"310*90\";s:5:\"right\";s:6:\"630*90\";} ', '', '2', 'data/adpic/list_head_two.jpg', '1');
INSERT INTO keke_witkey_ad_target VALUES ('8', '大厅列表_右侧上下广告', 'LIST_SIDE_RIGHT', '大厅列表_右侧上下广告', 'task_list,shop_list', 'a:2:{s:3:\"top\";s:7:\"145*250\";s:6:\"bottom\";s:7:\"145*250\";} ', '', '2', 'data/adpic/list_side_right.jpg', '1');
INSERT INTO keke_witkey_ad_target VALUES ('9', '大厅列表_底部通栏广告', 'LIST_BOTTOM_BANNER', '大厅列表_底部通栏广告', 'task_list,shop_list', 'a:1:{s:6:\"global\";s:6:\"950*90\";} ', '', '1', 'data/adpic/list_bottom_banner.jpg', '1');
INSERT INTO keke_witkey_ad_target VALUES ('10', '资讯_顶部通栏广告', 'INFO_TOP_BANNER', '资讯_顶部通栏广告', 'article', 'a:1:{s:6:\"global\";s:6:\"950*90\";} ', '', '1', 'data/adpic/info_top_banner.jpg', '1');
INSERT INTO keke_witkey_ad_target VALUES ('11', '首页_底部二栏广告', 'HOME_BOTTOM_SECOND', '首页_底部二栏广告', 'index', 'a:2:{s:4:\"left\";s:6:\"310*90\";s:5:\"right\";s:6:\"630*90\";} ', '', '2', 'data/adpic/home_bottom_second.jpg', '1');
INSERT INTO keke_witkey_ad_target VALUES ('12', '任务详情_右下部广告', 'TASK_SIDE_RIGHT', '任务详情_右下部广告', 'task', 'a:1:{s:6:\"global\";s:6:\"308*90\";}', '', '1', 'data/adpic/task_side_right.jpg', '1');
INSERT INTO keke_witkey_ad_target VALUES ('13', '首页_顶部幻灯片', 'HOME_TOP_SLIDE', '首页_顶部幻灯片', 'index', 'a:1:{s:6:\"global\";s:7:\"525*270\";}', '', '5', 'data/adpic/home_top_slide.jpg', '1');

-- ----------------------------
-- Table structure for `keke_witkey_agreement`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_agreement`;
CREATE TABLE `keke_witkey_agreement` (
  `agree_id` int(11) NOT NULL AUTO_INCREMENT,
  `agree_status` int(11) DEFAULT NULL,
  `model_id` int(11) DEFAULT NULL,
  `task_id` int(11) DEFAULT NULL,
  `work_id` int(11) DEFAULT NULL,
  `buyer_uid` int(11) DEFAULT NULL,
  `buyer_status` int(11) DEFAULT NULL,
  `buyer_accepttime` int(11) DEFAULT NULL,
  `buyer_confirmtime` int(11) DEFAULT NULL,
  `seller_uid` int(11) DEFAULT NULL,
  `seller_status` int(11) DEFAULT NULL,
  `seller_accepttime` int(11) DEFAULT NULL,
  `seller_confirmtime` int(11) DEFAULT NULL,
  `agree_title` varchar(100) DEFAULT NULL,
  `file_ids` varchar(50) DEFAULT NULL,
  `on_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`agree_id`),
  KEY `agree_id` (`agree_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_agreement
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_article`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_article`;
CREATE TABLE `keke_witkey_article` (
  `art_id` int(11) NOT NULL AUTO_INCREMENT,
  `art_cat_id` int(11) DEFAULT '0',
  `uid` int(11) DEFAULT '0',
  `username` varchar(50) DEFAULT NULL,
  `art_title` varchar(200) DEFAULT NULL,
  `art_source` varchar(200) DEFAULT NULL,
  `art_pic` varchar(100) DEFAULT NULL,
  `content` longtext,
  `is_recommend` int(11) DEFAULT '0',
  `seo_title` varchar(500) DEFAULT NULL,
  `seo_keyword` varchar(500) DEFAULT NULL,
  `seo_desc` varchar(500) DEFAULT NULL,
  `listorder` int(11) DEFAULT '0',
  `is_show` int(11) DEFAULT '1',
  `is_delineas` int(11) DEFAULT '0',
  `pub_time` int(11) DEFAULT '0',
  `views` int(11) DEFAULT '0',
  PRIMARY KEY (`art_id`),
  KEY `index_2` (`art_cat_id`),
  KEY `index_3` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=251 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_article
-- ----------------------------
INSERT INTO keke_witkey_article VALUES ('13', '217', '0', 'admin', '广告位招租', 'yertyetry', 'data/uploads/2011/09/13/89244e6f0512d32b3.gif', '广告位招租', '0', '广告位招租', '广告位招租', '广告位招租', '0', '1', '0', '1200758400', '102');
INSERT INTO keke_witkey_article VALUES ('14', '367', '0', 'ert112121', '注册协议', 'yertyetry', 'data/uploads/2012/01/14/276764f10f578bada0.png', '注册协议注册协议注册协议注册协议注册协议注册协议注册协议注册协议', '0', '筷子爱情wss', '筷子爱情wss', '有人说，爱情像水，温柔明亮；也有人说，爱情像酒，越久越醇；还有人说，爱情像风，来去无踪...我说，爱情像一双筷子。男人是一根筷子，女人是一根筷子，两根筷子有缘握在一起，成为一双筷子，那就是爱情。  一双筷子，心往一处想，力往一处使，才能把美好的日子夹起来，送进我们的口中。男人和女人，少了哪一个都不行，一', '1', '1', '0', '1326511480', '136');
INSERT INTO keke_witkey_article VALUES ('246', '5', '0', '匿名', '威客营销的成功之路及潜在危机分析', '', '', '&lt;p&gt;现在威客网也算是比较火的一个网赚平台，只要大家有一定的特长都能够找到合适的兼职，就算是你只会风水，起名测字往往都能够找到不错的任务，而且这方面的任务还是比较多的，但是这上面的任务要么价格低廉的惊人，要么是价格很具有诱惑力，对于价格低的，往往会成为搅乱市场的罪魁祸首，因为会有整体降低行业的价值趋势，比如发帖子，现在有的人就出一毛钱发一个帖子，实在是荒唐，连五毛都胜率了，还有那些价格非常诱人的，往往都不会让一个人中标，实在有点欺诈之嫌，当然这些都不是威客网的过错，实在是很多人的蓄意所为!&lt;/p&gt;&lt;p&gt;　　正是越来越多的人参与到威客当中，威客网的发展也迎来的极大的机遇，那么威客网本身如何进行营销呢?我们知道猪八戒威客网营销的非常成功，有&lt;a href=\"http://www.0202010.com/\"&gt;网络推广&lt;/a&gt;，甚至央视也来做报道，这些营销也算是堪称经典，迅速的让猪八戒的知名度串升了很多!而且威客的市场也是十分巨大的，现在互联网人口也达到四五亿了，这些人其实都能够成为威客，只要你有知识，有经验，都能够通过威客的平台转化为实际收益，那么威客网的成功之路自然要从发展威客开始!&lt;/p&gt;&lt;p&gt;　　第一步自然是把人变成威客，首先就是利用威客能够赚钱的效应，能够让你在家上上网就把钱挣了这样的广告词肯定是非常吸引人的，而注册成为一名威客自然是非常简单的过程，同时威客网本身还可以给你提供推广的机会，推广一个人参加威客就能够给你积分，提成，发布任务甚至也会给你提成，成功完成任务也能够给你提成，这些都能够有效的转化为收益，自然就能够把很多人改变成为威客!&lt;/p&gt;&lt;p&gt;　　第二步那就是让企业也成为威客，现在很多在威客网上发布任务的大多数都来自于企业，毕竟企业还是财大气粗嘛，几万的项目随便就能够推出来，而对于个人来说推出的任务超过几千元，那就是大手笔了，大部分还是停留在一稿两贴一元的阶段，大大降低了发帖的成本，却苦了很多发帖手，赚的钱越来越少，长期以往肯定会对威客的发展不利，所以威客营销要想办法改变这个局面，那么最好的方法自然就是打开企业这个缺口，从而获得大量的任务来源，提高任务的门槛!从而让威客网走到正确的轨道上来!&lt;/p&gt;&lt;p&gt;　　其实威客营销也是一把双刃剑，可能也会给自己造成毁灭的打击，假如上面的营销不成功，那么威客的赚钱效应就会大大降低，甚至还会遭到&lt;a href=\"http://www.36job.com/\"&gt;行业&lt;/a&gt;的抵制，毕竟&lt;a href=\"http://www.nfrencai.com/trade.shtml\"&gt;行业&lt;/a&gt;价值会被某些个人的低价而毁掉了，另外威客网也存在着巨大的竞争力，威客网的监管系统不一定面面俱到，当出现纠纷的时候，或者欺骗的时候，威客网总会成为风口浪尖上的第一个受害者，所以威客网的诞生之初就带着一把双刃剑来的，只有真正懂得运营威客网，才能够真正取得成功!&lt;/p&gt;', '0', '威客营销的成功之路及潜在危机分析', '威客营销的成功之路及潜在危机分析', '威客营销的成功之路及潜在危机分析', '0', '1', '0', '1329461419', '2');
INSERT INTO keke_witkey_article VALUES ('244', '17', '0', '', '什么是威客？', '', '', ' 威客是英文Witkey（wit智慧、key钥匙）的音译。威客是指在网络时代凭借自己的能力（智慧和创意），在互联网上出售自己的富裕工作时间和劳动成果而获得报酬的人。通俗地讲，威客就是在网络平台上出售自己无形资产成果价值的工作者群体。&nbsp;&lt;br /&gt;&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;在新经济（商业）环境中做威客的人，种类各式各样，除了各个行业、各个领域之外，还包括掌握各类创新理论（经济和管理）的人。在这些掌握各类创新理论（经济和管理）的人中，有经济威客、管理威客和网络威客等各个领域的威客。甚至可以夸张地说，在互联网威客这平台上，没有所谓的经济学家、管理学家等各式各样的专家学者，只有威客。而威客类网站的出现，为有知识生产加工能力的个人创造了一个销售知识产品的商业平台和机会。&lt;br /&gt;&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;总而言之，威客模式的出现，为个人的知识（资源）买卖带来商机。随着威客时代的来临，每一个威客都可以将自己的知识、经验和学术研究成果作为一种无形的“知识商品”和服务在网络上来销售。威客通过威客网站这个平台买卖“知识产品”，让自己的知识、经验和学术研究成果逐步转化成个人财富。在威客模式下，个人的知识（资源）不但是力量，而且又是个人的财富。在以知识资源应用开发的新经济（商业）时代，无论是个人或组织拥有知识就拥有财富。&lt;br /&gt;', '0', '', '', '', '0', '1', '0', '1329461289', '2');
INSERT INTO keke_witkey_article VALUES ('38', '100', '0', 'ert', '如果您有创意服务需求', 'yertyetry', '0', '<h6>这里是一个创意人才库，他们竞相为您提供卓越的创意服务<br />他们各自提交自己的方案供您挑选，被您相中的方案将会得到您提供的报酬。 </h6><br />时间财富汇聚了来自世界各地区、各行各业不同职业领域的专业人才数十万人（每天都以上千人递增）。<br />他们可为您提供各类平面设计、网站建设、软件开发、编程制作、动漫创作、多媒体制作、创意策划、文字创作、企划文案、起名构思、编撰翻译、作词谱曲、宣传推广、线索征集、市场调查、出谋划策等服务，为您提供最及时、最全面的解决办法。<br />如果您有创意需求，您只需发布您的项目需求，再将悬赏酬金托管到时间财富，您的需求就将出现在时间财富悬赏中心，那些世界各地的创意人才就开始为您提供创意服务了！<br />接下来，他们各自会把自己的创意方案提交到您的项目下，任您挑选！<br /><p>只有您最终选中了谁的方案，他便拿到您的赏金！</p><p>目前已有近万家企业和个人发布项目，悬赏解决他们面临的创意难题。<br />如果您有创意能力，您只需前往<a title=\"这里有成百上千的项目！\" href=\"http://www.vikecn.com/Task/List/\"></a>，寻找自己感兴趣的项目，在项目期结束前递交自己的方案，就可以了。<br />接下来，您的方案如果被项目发布者选中，您将因此而获得该项目的赏金！<br />这里是一个公平的能力竞技场，不需要看您的学历、职业经历，更不需要看上司的脸色，没有办公室政治的烦扰，一切凭作品说话！<br />一些人提交创意方案并非全为了中标，他们在竞争当中学习、成长。<br />时间财富还提供了全方位的能力展示系统，这有助于手握赏金的企业更准确地主动找到您。1<br /></p><br />', '0', '如果您有创意服务需求', '如果您有创意服务需求', '这里是一个创意人才库，他们竞相为您提供卓越的创意服务他们各自提交自己的方案供您挑选，被您相中的方案将会得到您提供的报酬。 时间财富汇聚了来自世界各地区、各行各业不同职业领域的专业人才数十万人（每天都以上千人递增）。他们可为您提供各类平面设计、网站建设、软件开发、编程制作、动漫创作、多媒体制作、创意策', '0', '1', '0', '1325903242', '2');
INSERT INTO keke_witkey_article VALUES ('66', '100', '0', '', '为什么要有交付协议?', '', null, '协议能够对发布者和中标者双方提供公平公正的依据，倘若引起任何版权或者利益双方有分歧，此文件将作为评判依据。此文件居有《中华人民共和国劳动法》的法律效益。一经签订即日生效。<br />', '0', '为什么要有交付协议?', '为什么要有交付协议?', '协议能够对发布者和中标者双方提供公平公正的依据，倘若引起任何版权或者利益双方有分歧，此文件将作为评判依据。此文件居有《中华人民共和国劳动法》的法律效益。一经签订即日生效。', '0', '1', '0', '1326184206', '6');
INSERT INTO keke_witkey_article VALUES ('67', '100', '0', '', '对协议的内容有异议', '', null, '本协议符合最基本的行业规范，通用性比较强，倘若有附加条件请与我们联系<!--{eval echo $_K[\'phone\']}-->。此协议不得做任何更改或修改，增加附加协议将会以系统消息的形式告知双方，具体内容将在线下双方互相告知，但此附加协议只限于发布者与中标者两者之间，与本平台无关<br />', '0', '', '', '', '0', '1', '0', '1326185007', '5');
INSERT INTO keke_witkey_article VALUES ('228', '17', '0', '', '2012推广你的梦想！', '', '', '&lt;span style=\"font-family:Verdana;font-size:16px;\"&gt;在2011年，经过我们不断的努力，优化和完善平台，以诚信、公平、公正、公开的原则，得到很多雇主和推手的认可。我们的服务宗旨是：让每一个雇主都获得推广效果，让每一个推手都能赚到钱。然而，在过去的一年里，我们多多少少会留下一点遗憾，或者有些渴望实现的梦想，在即将到来的2012年，将为你推广你的梦想，让梦想变为现实。让我们一起来帮助你实现吧！&lt;/span&gt;&lt;p&gt;&lt;span style=\"font-family:Verdana;font-size:16px;color:#0033ff;\"&gt;　　1、您是要推广&lt;span style=\"color:#ff0000;\"&gt;工业产品&lt;/span&gt;吗？&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-family:Verdana;font-size:16px;color:#0033ff;\"&gt;　　2、您是要推广&lt;span style=\"color:#ff0000;\"&gt;快消品&lt;/span&gt;吗？&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-family:Verdana;font-size:16px;color:#0033ff;\"&gt;　　3、您是要推广&lt;span style=\"color:#ff0000;\"&gt;公司服务&lt;/span&gt;吗？&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-family:Verdana;font-size:16px;color:#0033ff;\"&gt;　　4、您是要推广&lt;span style=\"color:#ff0000;\"&gt;招商加盟项目&lt;/span&gt;吗？&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-family:Verdana;font-size:16px;color:#0033ff;\"&gt;　　5、您是要推广&lt;span style=\"color:#ff0000;\"&gt;平台网站&lt;/span&gt;吗？&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-family:Verdana;font-size:16px;color:#0033ff;\"&gt;　　6、您是要推广您的&lt;span style=\"color:#ff0000;\"&gt;淘宝店&lt;/span&gt;吗？&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-family:Verdana;font-size:16px;color:#0033ff;\"&gt;&lt;span style=\"font-family:Verdana;font-size:16px;\"&gt;或者你还存在疑虑，你也可以直接联系我们的客服，他们会为你做最专业的网络推广指导。&lt;/span&gt;&lt;br /&gt;&lt;/span&gt;&lt;/p&gt;&lt;br /&gt;', '0', '', '', '', '0', '1', '0', '1329459458', '5');
INSERT INTO keke_witkey_article VALUES ('224', '100', '0', '客客小记', '认证中心', '客客族', '', '&lt;span style=\"font-size:12pt;\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;亲爱的用户朋友们：&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;许多用户对客客实名认证的审核规则不了解，经常会出现认证审核不能通过的情况。现将认证审核规则告知用户，希望能给大家的认证申请带来帮助。&lt;br /&gt;规则如下：&lt;/span&gt;&lt;/span&gt;&lt;br /&gt;&lt;br /&gt;&lt;span style=\"font-size:14pt;\"&gt;&lt;strong&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;实名认证：&lt;/span&gt;&lt;/strong&gt;&lt;/span&gt;&lt;br /&gt;&lt;br /&gt;&lt;span style=\"font-size:12pt;\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1&lt;/span&gt;&lt;/span&gt;&lt;span style=\"font-size:12pt;\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;、上传的图片必须是身份证的有效图片&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;若上传的图片为身份证无关的图片，将不能通过认证。并且这种无效的申请会影响其他用户的认证速度，所以会限制该用户一个月内不能再重新提交认证信息。&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2&lt;/span&gt;&lt;/span&gt;&lt;span style=\"font-size:12pt;\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;、图片清晰&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;图片模糊不清，无法辨认证件信息的，将无法通过认证。必须使用清晰的身份证原件的扫描件或彩色数码照，复印件的照片无效。&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;3&lt;/span&gt;&lt;/span&gt;&lt;span style=\"font-size:12pt;\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;、身份证信息需与注册信息相符&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;若身份证上的信息与用户提交的信息不符，将无法通过验证。&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;如果您提交的证件是护照，请您查看证件上是否有证件号码，如果没有则无法核实您的身份，不可以通过。&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4、身份证有效期大于90&lt;/span&gt;&lt;/span&gt;&lt;span style=\"font-size:12pt;\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;天&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;证件有效期小于&lt;/span&gt;&lt;/span&gt;&lt;span style=\"font-size:12pt;\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;90&lt;/span&gt;&lt;/span&gt;&lt;span style=\"font-size:12pt;\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;天、临时身份证或无效的证件都是不能用来认证的。&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5、需年满&lt;/span&gt;&lt;/span&gt;&lt;span style=\"font-size:12pt;\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;18&lt;/span&gt;&lt;/span&gt;&lt;span style=\"font-size:12pt;\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;周岁&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;未满&lt;/span&gt;&lt;/span&gt;&lt;span style=\"font-size:12pt;\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;18周岁是无法通过身份认证的。&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6、上传的证件图片显示完整&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;使用数码相机拍证件时，要将整个证件拍下来进行上传，如果上传的证件图片显示不完整将不予通过。&lt;/span&gt;&lt;/span&gt;&lt;br /&gt;&lt;br /&gt;&lt;span style=\"font-size:12pt;\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7&lt;/span&gt;&lt;/span&gt;&lt;span style=\"font-size:12pt;\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;、第二代身份证需要提供双面的图片，第一代身份证需要提供含有个人信息那一面的图片。&lt;/span&gt;&lt;/span&gt;&lt;br /&gt;&lt;br /&gt;&lt;span style=\"font-size:12pt;\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;&nbsp;&nbsp;&nbsp;&nbsp;第一代身份证只需要提供身份证正面的图片，即含有个人信息那一面。而第二代身份证需要提供双面的图片。否则，将不能通过认证审核。&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;8、与公安机关的认证一致&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;身份证信息与公安系统认证不一致的，将不能通过猪八戒网认证审核。&lt;br /&gt;&lt;/span&gt;&lt;/span&gt;&lt;br /&gt;&lt;span style=\"font-size:14pt;\"&gt;&lt;strong&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;企业认证：&lt;/span&gt;&lt;/strong&gt;&lt;/span&gt;&lt;br /&gt;&lt;span style=\"font-size:12pt;\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1&lt;/span&gt;&lt;/span&gt;&lt;span style=\"font-size:12pt;\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;、上传的图片必须是营业执照的有效图片&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;若上传的图片为营业执照无关的图片，将不能通过认证。并且这种无效的申请会影响其他用户的认证速度，所以会限制该用户一个月内不能再重新提交。&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2&lt;/span&gt;&lt;/span&gt;&lt;span style=\"font-size:12pt;\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;、图片清晰&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;图片模糊不清，无法辨认证件信息的，将无法通过认证。必须使用清晰的营业执照原件的扫描件或彩色数码照，复印件的照片无效。&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3&lt;/span&gt;&lt;/span&gt;&lt;span style=\"font-size:12pt;\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;、营业执照信息需与注册信息相符&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;若营业执照上的信息与用户提交的信息不符，将无法通过验证。&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4、证件有效期大于90&lt;/span&gt;&lt;/span&gt;&lt;span style=\"font-size:12pt;\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;天&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;证件有效期小于&lt;/span&gt;&lt;/span&gt;&lt;span style=\"font-size:12pt;\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;90&lt;/span&gt;&lt;/span&gt;&lt;span style=\"font-size:12pt;\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;天或无效的证件都是不能用来认证的。&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5、上传的证件图片显示完整&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;使用数码相机拍证件时，要将整个证件拍下来进行上传，如果上传的证件图片显示不完整将不予通过。&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6、与工商机关的认证一致&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;营业执照信息与工商系统认证不一致的，将不能通过客客认证审核。&lt;/span&gt;&lt;/span&gt;&lt;br /&gt;', '1', '认证中心', '认证中心', '', '0', '1', '0', '1329458015', '0');
INSERT INTO keke_witkey_article VALUES ('229', '17', '0', '', '如何做一个网络推手', '', '', '&lt;span style=\"font-family:Verdana;\"&gt;&lt;span style=\"font-family:Verdana;\"&gt; 一、首先要求具备每天长时间在线的条件,拥有个人电脑或在单位具备干私活的条件,在网吧的就&lt;/span&gt;&lt;span style=\"font-family:Verdana;\"&gt;不推荐了,毕竟在网吧上网不合适.其次就是网络的选择,最好是宽带,可以拨号的那种,不管是电信&lt;/span&gt;&lt;span style=\"font-family:Verdana;\"&gt;网通还是铁通,有了较快的网络,工作效率才会高,当然了,局域网的也可以,就怕速度不好,还有就&lt;/span&gt;&lt;span style=\"font-family:Verdana;\"&gt;是有的时候需要换IP的话就不方便了.无线网卡或3G上网的还是别做了,无线网卡那真是无限卡啊,&lt;/span&gt;&lt;span style=\"font-family:Verdana;\"&gt;慢的要命,3G上网呢速度还可以,但是费用就有点贵了,不合适的.&lt;/span&gt;&lt;/span&gt;&lt;span style=\"font-family:Verdana;\"&gt;&lt;/span&gt;&lt;p&gt;&nbsp;&lt;/p&gt;&lt;span style=\"font-family:Verdana;\"&gt;&lt;/span&gt;&lt;p&gt;&lt;span style=\"font-family:Verdana;\"&gt;&lt;span style=\"font-family:Verdana;\"&gt;&lt;span style=\"font-family:Verdana;\"&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/span&gt;二、工具：工具是网络推手的必备，就跟军人一样，没有枪就不能上战场，想要挣钱，还得工具齐全。推手的工具简单说就是ID，各大论坛ID，而且ID注册时间尽量早，带头像，ID注册时尽量与人名相似，尽量在2~3个汉字之间最好，这样才有质量。&lt;br /&gt;&nbsp;&lt;br /&gt;&lt;span style=\"font-family:Verdana;\"&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/span&gt;三、执行：在推广过程中，执行是需要重要把关，就拿发帖、顶贴来说：质量得到保证才能对推广有所效果。而不仅仅是把信息发布、回复完就完事！发帖－需要找正确论坛、版块，而且在操作过程中，需要根据雇主提供实际要求而发帖！这样才能容易通过。顶贴－顶贴不是一味顶，不仅回复信息内容要有质量，而且在回复过程中需要扮演各种角色，并且不要一面倒、同一种语气、并能提取一些网友信息来做应答；同时顶贴尽量间隔时间回复，而不要一口气回复完，这样容易导致帖子被锁、被封、被删，同时回帖的作用也没有得到发挥；实事求是，诚实是最好的美德！自己回复多少帖子就是多少帖，而不要将网民回复的都算在自己头上，这点往往是很多推手都是不在意，其实只要有经验的推手仔细观察就能发现哪些是推手回的哪些是网民回的！&lt;br /&gt;&nbsp;&lt;br /&gt;&lt;span style=\"font-family:Verdana;\"&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/span&gt;四、资源：做推手仅仅有ID是不够的！还得发展其他资源，如不仅是论坛ID，还有一些广告信息网站ID，同时最好能养ID，发展ID好友、空间好友、博客好友社区好友、博客、SNS社区等等，有了这些资源才能保证推手的活能源源不断。&lt;br /&gt;&nbsp;&lt;br /&gt;&lt;span style=\"font-family:Verdana;\"&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/span&gt;五、学习：不管你现在处于什么地位、不管你现在身在何处、不管你做的是什么工作，想要不断成长都离不开对知识的充实。只想到做任务挣钱是远远不够的，更多时候还要学习新兴的推广方式、新兴的推广技术、以及一些推广理论知识、推广经验等等。如：SEO，名人推广经验等。&lt;br /&gt;&nbsp;&lt;br /&gt;&lt;span style=\"font-family:Verdana;\"&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/span&gt;六、目标：有目标才有前进的方向，把自己的事情当成事业来做，做推手，给自己定一个目标！即便是每个月挣多少钱为目标！不要以为谈到钱就显得俗，这个社会离开了钱还能活吗？这是现实，我们离不开，只能面对！有了目标做起事来才有方向，同时也更能激励自己&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;&lt;br /&gt;', '0', '', '', '', '0', '1', '0', '1329459503', '1');
INSERT INTO keke_witkey_article VALUES ('69', '298', '0', '', '怎么注册成为威客会员？', '', null, '<p>1、点击首页的免费注册按钮，进入注册页面。</p><p>2、按要求填写相关注册信息。比如：用户名、邮箱、密码等</p><p>3、点击“注册”按钮提交，提示注册成功。</p><br />', '0', '怎么注册成为威客会员？', '怎么注册成为威客会员？', '1、点击首页的免费注册按钮，进入注册页面。2、按要求填写相关注册信息。比如：用户名、邮箱、密码等3、点击“注册”按钮提交，提示注册成功。', '0', '1', '0', '1325901897', '2');
INSERT INTO keke_witkey_article VALUES ('70', '298', '0', '', '用户注册时应注意哪些问题？', '', null, '1、考虑好用户名。因为注册后将不可更改。<br />2、填写真实信息。以便管理员在确认评标与中标通知时联系。<br />3、密码设置。为保证用户名安全，请设置一个复杂的密码。<br />4、注册时请仔细阅读《注册条款》，详细了解威客中国的相关规则，使您更准确的了解您所拥有的权利。<br />', '0', '用户注册时应注意哪些问题？', '用户注册时应注意哪些问题？', '1、考虑好用户名。因为注册后将不可更改。2、填写真实信息。以便管理员在确认评标与中标通知时联系。3、密码设置。为保证用户名安全，请设置一个复杂的密码。4、注册时请仔细阅读《注册条款》，详细了解威客中国的相关规则，使您更准确的了解您所拥有的权利。', '0', '1', '0', '1322120479', '2');
INSERT INTO keke_witkey_article VALUES ('71', '328', '0', '', '注册时需要注意哪些问题？', '', null, '<p>1、会员名：5-15个字符，英文、数字、下划线，注册成功将不能修改。不能使用中文用户名。 </p><p>2、密码：6-16位组成，建议使用英文字母加数字或符号的组合提高密码安全度。详见“如何设置安全密码”。 </p><p>3、邮箱：邮箱认证是可以用来取回密码的，完成注册后请点击进行邮箱认证。 </p><p>4、验证码：请参照右边的验证码，将数字填入左侧输入框中，不分大小写。如填写错误需重新填写正确才能顺利注册。 </p><br />', '0', '注册时需要注意哪些问题？', '注册时需要注意哪些问题？', '1、会员名：5-15个字符，英文、数字、下划线，注册成功将不能修改。不能使用中文用户名。 2、密码：6-16位组成，建议使用英文字母加数字或符号的组合提高密码安全度。详见“如何设置安全密码”。 3、邮箱：邮箱认证是可以用来取回密码的，完成注册后请点击进行邮箱认证。 4、验证码：请参照右边的验证码，将数字填入左侧输', '0', '1', '0', '1322120640', '2');
INSERT INTO keke_witkey_article VALUES ('72', '298', '0', '', '什么是验证码？', '', null, '1、注册时填写的验证码均是阿拉伯数字。 <br />2、看不到验证码，有可能是您的IE没有启用“活动脚本”、安全级别设置的过高。 <br />您可以如下处理： <br />点击“工具”—“Internet选项”—“安全”—“默认级别”—“确定” <br />同时还请您删除一下您电脑上的临时文件，方法如下： <br />IE6.0版本的处理方法： <br />1、打开浏览器，点击“工具”菜单，打开“INTERNET选项”的对话框 。<br />2、点击“常规”选项卡，选择“删除COOKIES”，在弹出的对话框内按确定；然后点击“删除文件”，在删除所有脱机内容前打上钩，再按确定。 <br />3、点击“安全”选项卡，点击右下角的“默认级别”，如果是灰色的不可按的按钮，则跳过此步骤即可。 <br />4、点击“隐私”选项卡，选择右下角的“默认”，如果是灰色的不可按的按钮，则跳过此步骤即可。点击“高级”，在弹出的页面上把“覆盖自动cookie处理”选中。下面的第一方cookie 和第三方cookie选择“接受”，再点击“确定”。 <br />5、点击“高级”选项卡，然后选择右下角的“还原默认设置”按钮，然后点击最下面的“确定”按钮 。<br />6、关闭所有的浏览器，然后打开，重新进入本站，看一下问题是否已经解决。                <br />', '0', '什么是验证码？', '什么是验证码？', '1、注册时填写的验证码均是阿拉伯数字。 2、看不到验证码，有可能是您的IE没有启用“活动脚本”、安全级别设置的过高。 您可以如下处理： 点击“工具”—“Internet选项”—“安全”—“默认级别”—“确定” 同时还请您删除一下您电脑上的临时文件，方法如下： IE6.0版本的处理方法： 1、打开浏览器，点击“工具”菜单，打', '0', '1', '0', '1322120818', '3');
INSERT INTO keke_witkey_article VALUES ('73', '299', '0', '', '忘记用户名怎么办？', '', null, '<span style=\"font-family:Times New Roman;font-size:13px;\">请联系客服，并尽可能的提供您当时注册时留下的信息，包括注册邮箱、真实姓名、身份证号、银行卡号。如果有以上信息有注册记录，客服会帮您找回用户名。</span><br />', '0', '忘记用户名怎么办？', '忘记用户名怎么办？', '请联系客服，并尽可能的提供您当时注册时留下的信息，包括注册邮箱、真实姓名、身份证号、银行卡号。如果有以上信息有注册记录，客服会帮您找回用户名。', '0', '1', '0', '1322121583', '1');
INSERT INTO keke_witkey_article VALUES ('74', '299', '0', '', '忘记登录密码怎么办？', '', null, '忘记密码可在“登录”页面，（图1）<p><br /></p><p>点击“忘记密码？” 即可以看到输入您的用户名和您已经绑定邮箱地址，然后点击“请立即发送密码重置邮件”按钮，系统会发一个密码重置邮件到您的认证邮箱。<br />&nbsp;收到邮件后，请立即点击邮件内的链接至专属页面并重新设置您的新登录密码。<br /></p>                        <br />', '0', '忘记登录密码怎么办？', '忘记登录密码怎么办？', '忘记密码可在“登录”页面，（图1）点击“忘记密码？” 即可以看到输入您的用户名和您已经绑定邮箱地址，然后点击“请立即发送密码重置邮件”按钮，系统会发一个密码重置邮件到您的认证邮箱。&nbsp;收到邮件后，请立即点击邮件内的链接至专属页面并重新设置您的新登录密码。', '0', '1', '0', '1322121745', '1');
INSERT INTO keke_witkey_article VALUES ('75', '329', '0', '', '在线下单交易有什么好处？', '', null, '<p>1、如果您是在线下单，并选择在线托管款项交易，一旦服务发生纠纷，您可以发起退款申请。</p><p>2、如果您是在线下单，选择的服务商是诚信会员或已加入交易保障服务，一旦服务发生纠纷并给您造成损失，您可以申请先行赔付。</p><p>3、如果您是在线下单，您还可以对服务商提供的服务进行全面评价，掌握服务商信用的主动权，促使服务商提供满意服务。</p><br />', '0', '在线下单交易有什么好处？', '在线下单交易有什么好处？', '1、如果您是在线下单，并选择在线托管款项交易，一旦服务发生纠纷，您可以发起退款申请。2、如果您是在线下单，选择的服务商是诚信会员或已加入交易保障服务，一旦服务发生纠纷并给您造成损失，您可以申请先行赔付。3、如果您是在线下单，您还可以对服务商提供的服务进行全面评价，掌握服务商信用的主动权，促使服务商提供', '0', '1', '0', '1322122124', '1');
INSERT INTO keke_witkey_article VALUES ('76', '298', '0', '', '注册流程', '', null, '<p>1、登录XX网，点击页面右上方的“免费注册”； </p><p>&nbsp;</p><p>2、进入填写“用户资料”页面，根据页面提示，填写您的用户资料； <span class=\"Wbt547\"></span></p><p>&nbsp;&nbsp;&nbsp; </p><p>3、在确认信息无误，并阅读过用户使用条款后，点击“同意以下使用条款，提交注册信息”按钮；即可成功注册成为XX用户。</p>                        <br />', '0', '注册流程', '注册流程', '1、登录XX网，点击页面右上方的“免费注册”； &#160;2、进入填写“用户资料”页面，根据页面提示，填写您的用户资料； &#160;&#160;&#160; 3、在确认信息无误，并阅读过用户使用条款后，点击“同意以下使用条款，提交注册信息”按钮；即可成功注册成为XX用户。', '0', '1', '0', '1325902035', '3');
INSERT INTO keke_witkey_article VALUES ('77', '297', '0', '', '提现流程', '', null, '<p><span style=\"font-family:Arial;\">登录XX网后，进入“我的XX网”页面后，页面左侧下方“财务管理”专区点击“提现申请” </span></p><p>&nbsp;</p><p><span style=\"font-family:Arial;\">或点击页面最上方“会员中心”后，在“账务管理”栏目下的“提现申请”。 </span></p><p>&nbsp;</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 首先需要设置一个银行账号，或支付宝或是财付通帐号用来将您在XXX网中的金额转入您指定的帐户中，这样您才可以通过银行提取到现金。 </p><p>&nbsp;</p><p>&nbsp;输入提现金额后，点立即提现后。XXX网财务管理人员会在1-2个工作日提现到您指定的帐号！<br />&nbsp;<br /></p>                        <br />', '0', '提现流程', '提现流程', '登录XX网后，进入“我的XX网”页面后，页面左侧下方“财务管理”专区点击“提现申请” &#160;或点击页面最上方“会员中心”后，在“账务管理”栏目下的“提现申请”。 &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160; 首先需要设置一个银行账号，或支付宝或是财付通帐号用来将您在', '0', '1', '0', '1325901995', '2');
INSERT INTO keke_witkey_article VALUES ('78', '297', '0', '', '充值流程', '', null, '<p><span style=\"font-family:Arial;\">1、登录“XXX网”进入“我的XXX网”然后点左侧“财务管理”页面：点击“在线充值”按钮；&nbsp;<br />&nbsp;&nbsp; </span></p><p>&nbsp;</p><p><span style=\"font-family:Arial;\">&nbsp;&nbsp;&nbsp;&nbsp; 或者登录“万能网”进入“我的XXX网”，点击中间的“我的账户”—“立即充值” ； </span></p><p><span style=\"font-family:Arial;\"><br />&nbsp; <br />&nbsp;<br />&nbsp; <br />2、进入到充值页面 ；输入您想冲入个人账户的金额，并选择支付方式，然后点“去充值”<br />点击“下一步”按钮； <br />&nbsp;<br />&nbsp;&nbsp; <br />3、自动为您转入到您选择的支付方式页面进行转账充值操作。</span></p>                        <br />', '0', '充值流程', '充值流程', '1、登录“XXX网”进入“我的XXX网”然后点左侧“财务管理”页面：点击“在线充值”按钮；&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 或者登录“万能网”进入“我的XXX网”，点击中间的“我的账户”—“立即充值” ； &nbsp; &nbsp;&nbsp; 2、进入到充值页面 ；输入您', '0', '1', '0', '1322122471', '4');
INSERT INTO keke_witkey_article VALUES ('79', '310', '0', '', '认证流程', '', null, '<p><span style=\"font-family:Arial;\">登录“XX网”进入“我的万能网”然后点左侧“认证中心”页面。</span></p><p><span style=\"font-family:Arial;\">万能网现在提供的认证有：实名认证，银行认证，企业认证，邮箱认证，VIP会员认证；</span></p><p><span style=\"font-family:Arial;\">按您自己的实际情况要进行哪个认证，只要点“立即认证”按提示操作就行！</span></p>                        <br />', '0', '认证流程', '认证流程', '登录“XX网”进入“我的万能网”然后点左侧“认证中心”页面。万能网现在提供的认证有：实名认证，银行认证，企业认证，邮箱认证，VIP会员认证；按您自己的实际情况要进行哪个认证，只要点“立即认证”按提示操作就行！', '0', '1', '0', '1322122540', '2');
INSERT INTO keke_witkey_article VALUES ('80', '329', '0', '', '招标任务流程', '', null, '<span style=\"font-family:Arial;\">雇主选择发布招标任务；为了杜绝发布恶意信息，招标任务象征性收费10元，招标任务发布后，威客进行投标，经协商后，雇主选定具体的威客执行任务，招标任务自动跳转到“指定承接”任务进行。</span><br />', '0', '招标任务流程', '招标任务流程', '雇主选择发布招标任务；为了杜绝发布恶意信息，招标任务象征性收费10元，招标任务发布后，威客进行投标，经协商后，雇主选定具体的威客执行任务，招标任务自动跳转到“指定承接”任务进行。', '0', '1', '0', '1322122670', '1');
INSERT INTO keke_witkey_article VALUES ('81', '301', '0', '', '全款悬赏任务流程', '', null, '<span style=\"font-family:Arial;\">一、雇主发布全款悬赏任务（原威客任务）后，等待其他威客来参加该全款悬赏任务。<br />二、XXX网威客可以通过搜索查看到该全款悬赏任务，并依据任务雇主的需求，提交作品。<br />三、雇主查看到最合适最优秀的作品后，即可将此威客设置为中标者，并为其发放任务赏金后，全款悬赏任务成功结束。</span><br />', '0', '全款悬赏任务流程', '全款悬赏任务流程', '一、雇主发布全款悬赏任务（原威客任务）后，等待其他威客来参加该全款悬赏任务。二、XXX网威客可以通过搜索查看到该全款悬赏任务，并依据任务雇主的需求，提交作品。三、雇主查看到最合适最优秀的作品后，即可将此威客设置为中标者，并为其发放任务赏金后，全款悬赏任务成功结束。', '0', '1', '0', '1322122739', '2');
INSERT INTO keke_witkey_article VALUES ('82', '312', '0', '', '如何赚钱？', '', null, '<span style=\"font-family:Arial;\">目前XX网上一共有四种赚钱途径。在将来还会有更多的赚钱方法开放出来。<br />a) 主要途径：完成任务。买家的所有需求都是通过“任务”的形式发布的，完成任务后，被买家选择为中标就可以获得报酬。现在就去【任务列表】挑选任务吧<br />b) 出售服务/作品，如果您在您的【人才铺】出售服务或作品案例，被买家购买后，您也有些收入。<br />c) 参加推广员联盟，获得提成。您可以介绍朋友来注册万能、发“悬赏任务”，也可以介绍朋友加入万能网完成任务。详情了解【推广员】<br />d) 直接交易。您只需要和买家谈好需求和价钱，就可以和他建立起直接交易，更方便更快捷的获得报酬。</span>                        <br />', '0', '如何赚钱？', '如何赚钱？', '目前XX网上一共有四种赚钱途径。在将来还会有更多的赚钱方法开放出来。a) 主要途径：完成任务。买家的所有需求都是通过“任务”的形式发布的，完成任务后，被买家选择为中标就可以获得报酬。现在就去【任务列表】挑选任务吧b) 出售服务/作品，如果您在您的【人才铺】出售服务或作品案例，被买家购买后，您也有些收入。c) 参', '0', '1', '0', '1322122817', '1');
INSERT INTO keke_witkey_article VALUES ('83', '301', '0', '', '如何知道自己中标了？', '', null, '<p><span style=\"font-family:Arial;\">a) 登录XXX网，进入“我的XXX网”后台<br />b) 进入“我是威客”——我参加的悬赏任务</span></p><p><span style=\"font-family:Arial;\">c) 点击“中标任务”便可查看自己参与的任务是否中标</span></p><p>&nbsp;<span style=\"font-family:Arial;\">d) 任务中标后，便会生成一个订单，在上方：交易订单管理---“我收到的交易”中可以查看到。</span></p>                        <br />', '0', '如何知道自己中标了？', '如何知道自己中标了？', 'a) 登录XXX网，进入“我的XXX网”后台b) 进入“我是威客”——我参加的悬赏任务c) 点击“中标任务”便可查看自己参与的任务是否中标&nbsp;d) 任务中标后，便会生成一个订单，在上方：交易订单管理---“我收到的交易”中可以查看到。', '0', '1', '0', '1322122861', '1');
INSERT INTO keke_witkey_article VALUES ('84', '301', '0', '', 'XX威客网用户全款悬赏任务使用规则', '', null, '&nbsp; 本着保护雇主和威客权益的宗旨，本着公开、公平、公正和诚实信用的原则，致力于打造中国最大的外包项目交易平台。请在您使用前仔细阅读以下全款悬赏任务（威客任务）规则。<br />&nbsp;<br />一、XXX威客网雇主发布规则<br /><br />　　1、雇主可自由定价，自由确定全款悬赏任务的时间、任务描述及联系电话，雇主自主确定中标工作者和中标方案。<br />&nbsp;<br />　　2、全额悬赏任务款100%托管在万能威客网，以向威客们表达充分诚意。托管款项可通过您在万能威客网的个人账户余额、网上银行付款、银行转帐、支付宝转帐方式支付。其中80%分给中标威客，20%作为网站运营的手续费。<br /><br />　　3、每个全额悬赏任务至少有一个威客/作品中标，除任务无人参加或作品无效的情况外，一般不得撤销任务及退款。<br /><br />　　4、雇主自己所在组织及关联方的任何人均不能以任何形式参加自己所发布的任务。一经查实，万能威客网将有权自行处理，包括并不限于通过法律等各种途径，确保交易双方的合法权益。<br /><br />　　5、当所发布任务的金额不多于100元时，该任务的期限最多为7天。<br /><br />　　6、任务提交并托管款项后，万能威客网客服将在30分钟内（工作时间）审核发布到网站，如遇非工作时间将顺延。对不合理的任务需求，可在审核驳回后将任务款退回您的帐户。<br />&nbsp;<br />　　7、采用银行汇款为任务预付费的用户，在汇款成功后请在用户管理后台的账务申诉内为任务发起账务申诉，申诉时请注明[任务编号]等相关信息 ，万能威客网财务人员将尽快对申诉进行处理，以确保任务及时发布。对于提交的任务如一周内未收到托管到平台的任务款，则所提交任务信息将被自动删除，不做保留。<br /><br />　　8、如遇任务结果不满意，雇主可选择加价延期任务。金额在100元以上（含100元）的任务有3次加价延期机会，第1次加价不得低于任务金额的10%，第2次加价不得低于任务总金额的20%，第3次不得低于任务总金额的50%。金额在100元以下的任务如需加价延期，则至少加价100元。每次延期不能超过10天，特殊任务可以适当加长。<br /><br />　　9、 雇主可在任务进行期间任意时刻选标结束任务，最晚在公示期结束后3天进行选标，最终中标的威客作品及其一切知识产权（包括但不限于版权、著作权）均归雇主所有。如万能威客网在3日内电话通知2次后仍不选稿或不加价，将视为雇主委托万能威客网选稿。<br /><br />　　10、雇主选标48小时后万能威客网客服将审核中标作品。此48小时将留给所有应征者查看该任务是否有抄袭作弊的情况。<br /><br />　　11、如遇任务在中标后被举报作品涉嫌抄袭，经过调查核实，将取消中标人中标资格。同时将免费为此任务延期1次，不超过7天。<br /><br />&nbsp;&nbsp;&nbsp; 12、充入用户账户的资金未用于悬赏任务，在账户余额不少于100元的条件下才可以申请提现（提现最小金额为100元），提现时完全免费。<br /><br />&nbsp;<br /><br />二、提取现金的规则<br /><br />　　1、提取现金的最小额度为50元。<br /><br />　　2、申请提取现金在审核通过后，即可在2-5个工作日内收到款项，目前不收取任何手续费。<br /><br />三、任务撤销的规则<br />&nbsp;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 以下几种情况可以撤消任务并退款：<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1、任务进行中撤消：任务不适合在万能威客网发布，违反了任务发布规则，任务取消后任务款100%返还雇主帐户中。<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2、任务结束后撤消，又分为以下几种处理方式：<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; a、任务无威客提交结果，雇主可申请任务撤销，任务款100%返还雇主帐户中；<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; b、任务有1人以上（含1人）威客提交结果，经万能威客网客服判定后认为此结果为无效作品、非原创作品或垃圾广告等，雇主可申请任务撤消，撤消时如果威客没有异议，任务款100%返还雇主帐户中；<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; c、任务有1人以上（含1人）威客提交结果，经万能威客网客服判定后认为此结果为无效作品、非原创作品或垃圾广告等，雇主可申请任务撤消，撤消时如果威客持有异议，需雇主和威客互相向万能威客网客服举证，以证明自己的立场：如威客拿不出有力证据证明自己作品为有效作品，且雇主理由充分的情况下，任务款100%返还雇主帐户中；<br /><br />&nbsp;<br /><br />四、公示的规则<br /><br />　　在默认情况下，每个威客任务都会有公示期，下面我们对公示进行说明。<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 公示是指在某一时间内，万能威客网会将公开本任务的所有作品供用户查阅监督。不论购买雇主保障服务的威客是否设置了作品保密，万能威客网会员可以对作品进行评论。通过实名认证的会员还可对作品进行“顶”和“踩”的操作。<br />&nbsp;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 公示目的在于促进威客间的交流和学习，同时对任务结果进行群众监督，质量良好的任务作品通过大众的投票及评论予以肯定和鼓励。若公示时任务尚未结束，那么雇主可以通过作品被“顶”和“踩”的情况来优先看到这些良好的作品，起到一定的作品筛选作用。<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 一旦公示开始，一日不选出中标作品，公示就不结束。在选出中标作品（客服通过雇主中标申请，任务结束）那一刻，还要公示10天。<br /><br />', '0', 'XX威客网用户全款悬赏任务使用规则', 'XX威客网用户全款悬赏任务使用规则', '&nbsp; 本着保护雇主和威客权益的宗旨，本着公开、公平、公正和诚实信用的原则，致力于打造中国最大的外包项目交易平台。请在您使用前仔细阅读以下全款悬赏任务（威客任务）规则。&nbsp;一、XXX威客网雇主发布规则　　1、雇主可自由定价，自由确定全款悬赏任务的时间、任务描述及联系电话，雇主自主确定中标工作者', '0', '1', '0', '1322122959', '0');
INSERT INTO keke_witkey_article VALUES ('85', '301', '0', '', 'XXX威客网用户参加招标任务规则', '', null, '此版招标任务参加规则将从2011年1月1日起开始执行<br /><br />参加招标任务规则<br /><br />1）、为提高招标任务的方案质量，认真阅读发布者的要求后，才可以提交任务方案。<br /><br />2）、对于已参加的尚在招标期的招标任务，您可以提交任务方案，并可多次对方案作出修改。一旦招标期结束将不能提交及修改方案。<br /><br />3）、招标任务整个生命周期中，所有参加者提交的方案均处于保密状态，除发布者及方案对应的提交者之外，其他用户均不可见。<br /><br />4）、发布者会选择满意的方案，并邀请其提交者书写任务执行合同。<br />&nbsp;<br />5）、执行合同经发布者审核通过且发布者充入不少于执行合同中第一期任务款的金额到任务上后，任务进入到执行中（对于直接交易任务在发布者审核通过执行计划后直接结束）。同时该执行计划的书写者成为该任务的承接者，且已中标。<br /><br />6）、承接者需按照所写的执行合同进行工作，执行中承接者可修改任务合同，但修改任务合同后需经发布者审核通过后方能生效。<br /><br />7）、承接者通过工作按顺序完成任务合同所写的用于验收的关键指标后，将成果提交给发布人后，可申请发放对应期的任务款，发布人同意后该期任务款将直接发放进入承接者的账户。<br /><br />8）、承接者逐一完成任务合同的各期并得到发放的任务款后任务结束。<br />&nbsp;<br />9）、任务结束后发布者将对承接者进行评价，该评价将体现在承接者用户的信用页面，同时承接者用户的信用值将随着获得的任务款而增加。<br /><br />10）、若在任务执行中双方出现无法调解的分歧，则承接者和发布者任一方可提出仲裁申请，仲裁将根据实际情况对已充入任务但尚未发放的任务款进行分配并导致任务结束（仲裁结束）<br /><br />11）、任务在结束后承接者可在“已中标”页面中查看中标任务，参看自己提交的方案，查看所写的任务执行计划，查看来自发布人的评价。<br /><br /><br />', '0', 'XXX威客网用户参加招标任务规则', 'XXX威客网用户参加招标任务规则', '此版招标任务参加规则将从2011年1月1日起开始执行参加招标任务规则1）、为提高招标任务的方案质量，认真阅读发布者的要求后，才可以提交任务方案。2）、对于已参加的尚在招标期的招标任务，您可以提交任务方案，并可多次对方案作出修改。一旦招标期结束将不能提交及修改方案。3）、招标任务整个生命周期中，所有参加者提交', '0', '1', '0', '1322122999', '0');
INSERT INTO keke_witkey_article VALUES ('86', '300', '0', '', 'XXX威客网用户参加威客任务规则', '', null, '此版全款悬赏任务参加规则将从2011年1月1日起开始执行<br /><br />参加全款悬赏任务规则<br /><br />1）、万能威客网为保证公平，所有网站上发布的任务全部采用预付款方式，竞标人可放心参与。<br />&nbsp;<br />2）、为保证公平，万能威客网员工将不参加任何一个任务的竞标。<br /><br />3）、对于状态在进行中的任务，参加者可自由参加并提交自己的作品来参与竞标。<br /><br />4）、参加竞标作品并且提交任务附件的时候，附件最大不能超过2M容量。<br /><br />5）、竞标期间工作者可以提交及多次修改作品进行竞标，任务截止则不可提交和修改作品。在任务规定期限内提交符合任务需求的解决结果，不得提交与任务要求无关的、非原创涉嫌抄袭的提交结果，此类情况将将视其情况删除提交结果或作出相应的处理。<br /><br />6）、竞标成功后，本站将根据任务性质向竞标成功的工作者支付任务额80%的悬赏金额（如遇网站举办活动则以活动内的规则为准）<br /><br />7）、如果任务发布者违规进行作弊行为，万能威客网将通过投票形式选出中标者，并向投票中标者发放任务款。对于作弊的发布者，万能威客网将以网站公告的形式公布其资料。<br /><br /><br />', '0', 'XXX威客网用户参加威客任务规则', 'XXX威客网用户参加威客任务规则', '此版全款悬赏任务参加规则将从2011年1月1日起开始执行参加全款悬赏任务规则1）、万能威客网为保证公平，所有网站上发布的任务全部采用预付款方式，竞标人可放心参与。&nbsp;2）、为保证公平，万能威客网员工将不参加任何一个任务的竞标。3）、对于状态在进行中的任务，参加者可自由参加并提交自己的作品来参与竞标。4）', '0', '1', '0', '1322123040', '4');
INSERT INTO keke_witkey_article VALUES ('87', '300', '0', '', 'XXX网用户参加威客任务规则', '', null, '参加全款悬赏任务规则<br />1）、XXX网为保证公平，所有网站上发布的任务全部采用预付款方式，竞标人可放心参与。<br />2）、为保证公平，XXX网员工将不参加任何一个任务的竞标。<br />3）、对于状态在进行中的任务，参加者可自由参加并提交自己的作品来参与竞标。<br />4）、参加竞标作品并且提交任务附件的时候，附件最大不能超过2M容量。<br />5）、竞标期间工作者可以提交及多次修改作品进行竞标，任务截止则不可提交和修改作品。在任务规定期限内提交符合任务需求的解决结果，不得提交与任务要求无关的、非原创涉嫌抄袭的提交结果，此类情况将将视其情况删除提交结果或作出相应的处理。<br />6）、竞标成功后，本站将根据任务性质向竞标成功的工作者支付任务额80%的悬赏金额（如遇网站举办活动则以活动内的规则为准）<br />7）、如果任务发布者违规进行作弊行为，XXX网将通过投票形式选出中标者，并向投票中标者发放任务款。对于作弊的发布者，XXX网将以网站公告的形式公布其资料。<br /><br />此版全款悬赏任务参加规则将从2011年1月1日起开始执行<br /><br /><br />', '0', 'XXX网用户参加威客任务规则', 'XXX网用户参加威客任务规则', '参加全款悬赏任务规则1）、XXX网为保证公平，所有网站上发布的任务全部采用预付款方式，竞标人可放心参与。2）、为保证公平，XXX网员工将不参加任何一个任务的竞标。3）、对于状态在进行中的任务，参加者可自由参加并提交自己的作品来参与竞标。4）、参加竞标作品并且提交任务附件的时候，附件最大不能超过2M容量。5）、竞', '0', '1', '0', '1322123151', '3');
INSERT INTO keke_witkey_article VALUES ('88', '300', '0', '', '我发布的任务可以退款吗？', '', null, '<span style=\"font-family:Verdana;\">答：发布任务需先托管赏金，且不能退款。只有这样，威客才坚信你的诚意，并提交最佳创意作品。如出现没有竞标稿件的特殊情况，网站个案处理，双方协商。</span>                         <br />', '0', '我发布的任务可以退款吗？', '我发布的任务可以退款吗？', '答：发布任务需先托管赏金，且不能退款。只有这样，威客才坚信你的诚意，并提交最佳创意作品。如出现没有竞标稿件的特殊情况，网站个案处理，双方协商。', '0', '1', '0', '1322123196', '3');
INSERT INTO keke_witkey_article VALUES ('89', '300', '0', '', '任务发布后，雇主能不能修改任务？', '', null, '<span style=\"font-family:Verdana;\">答：任务进行期间，可以联系您的专属客服为您修改。您也可以增加补充说明，修改仅限于任务描述本身，不涉及到加重任务量。</span>                         <br />', '0', '任务发布后，雇主能不能修改任务？', '任务发布后，雇主能不能修改任务？', '答：任务进行期间，可以联系您的专属客服为您修改。您也可以增加补充说明，修改仅限于任务描述本身，不涉及到加重任务量。', '0', '1', '0', '1322123229', '3');
INSERT INTO keke_witkey_article VALUES ('90', '296', '0', '', '如何保障自己帐户的安全', '', null, '如果您通过了实名认证，当您忘记密码或帐号被盗时，只要提供相关的有效证件到XXX网进行申诉，您就可以重新拿回您的帐号密码：<br />　申请实名认证的方法：<br />　１,登录XXX网。<br />　２,进入认证中心<br />　３,点击实名认证下面的“申请实名认证”<br />　４,填写您的身份信息<br />&nbsp;&nbsp;&nbsp; ５,填写好正确的信息后，提交认证，我们的工作人员将在一个工作日内给您回复 <br /><br />', '0', '如何保障自己帐户的安全', '如何保障自己帐户的安全', '如果您通过了实名认证，当您忘记密码或帐号被盗时，只要提供相关的有效证件到XXX网进行申诉，您就可以重新拿回您的帐号密码：　申请实名认证的方法：　１,登录XXX网。　２,进入认证中心　３,点击实名认证下面的“申请实名认证”　４,填写您的身份信息&nbsp;&nbsp;&nbsp; ５,填写好正确的信息后，提交认证，我们', '0', '1', '0', '1322123315', '2');
INSERT INTO keke_witkey_article VALUES ('91', '296', '0', '', '帐号被盗或者忘记用户名密码怎么办', '', null, '如果你注册时填写了邮箱或您通过了邮箱认证，您可以通过找回密码功能来重新得到您的帐号。<br />使用方法：<br />１,进入登录页面<br />２,点击“ 忘记密码了？”链接，进入找回密码程序。<br />３,填写您的用户名，点击下一步<br />４,填写您的邮箱地，点击“取回密码”按钮<br />５,您会看到如下消息：<br />取回密码的方法已经通过 Email 发送到您的信箱中，<br />请在 3 天之内修改您的密码。<br />６,请按系统提示操作即可取回您的密码。 <br /><br />', '0', '帐号被盗或者忘记用户名密码怎么办', '帐号被盗或者忘记用户名密码怎么办', '如果你注册时填写了邮箱或您通过了邮箱认证，您可以通过找回密码功能来重新得到您的帐号。使用方法：１,进入登录页面２,点击“ 忘记密码了？”链接，进入找回密码程序。３,填写您的用户名，点击下一步４,填写您的邮箱地，点击“取回密码”按钮５,您会看到如下消息：取回密码的方法已经通过 Email 发送到您的信箱中，请在 3', '0', '1', '0', '1322123351', '1');
INSERT INTO keke_witkey_article VALUES ('92', '328', '0', '', '怎样发布悬赏项目？', '', null, '1、&nbsp; 登录状态下，点击发布任务按钮；<br /><br />2、&nbsp; 选择发布任务类型：悬赏任务<br /><br />3、&nbsp; 按要求填写相关任务信息，如：任务金额、任务周期、任务分类、任务标题、任务内容、任务附件；<br /><br />4、&nbsp; 根据任务情况可填写高级选项，任务高级模式可选择多人中标和计件中标或单人中标；任务宣传可选择用户推广此任务；<br /><br />5、&nbsp; 任务确认，并付款。如账户有余额（包含代金券）点击确认付款后会自动扣款，如账户无余额会跳转到支付页面。<br /><br /><br />', '0', '怎样发布悬赏项目？', '怎样发布悬赏项目？', '1、&nbsp; 登录状态下，点击发布任务按钮；2、&nbsp; 选择发布任务类型：悬赏任务3、&nbsp; 按要求填写相关任务信息，如：任务金额、任务周期、任务分类、任务标题、任务内容、任务附件；4、&nbsp; 根据任务情况可填写高级选项，任务高级模式可选择多人中标和计件中标或单人中标；任务宣传可选择用户推广此', '0', '1', '0', '1322123441', '2');
INSERT INTO keke_witkey_article VALUES ('93', '328', '0', '', '悬赏任务发布有周期限制？', '', null, '<p>悬赏任务发布周期限制为了保证本系统内悬赏任务有效性，做出的适当控制。目前对悬赏任务的周期限制与任务金额形成一定的比例，如:</p><p>100元以上任务，可以持续7天</p><p>500元以上任务，可以持续15天</p><p>1500元以上任务，可以持续30天</p><p>具体时间是根据您的任务量判断的！</p><br />', '0', '悬赏任务发布有周期限制？', '悬赏任务发布有周期限制？', '悬赏任务发布周期限制为了保证本系统内悬赏任务有效性，做出的适当控制。目前对悬赏任务的周期限制与任务金额形成一定的比例，如:100元以上任务，可以持续7天500元以上任务，可以持续15天1500元以上任务，可以持续30天具体时间是根据您的任务量判断的！', '0', '1', '0', '1322123496', '2');
INSERT INTO keke_witkey_article VALUES ('94', '328', '0', '', '什么是多人中标任务？', '', null, '<p>雇主选择多人中标模式，说明此次任务需要多人来完成。即雇主可选择两个以上的作品中标。</p><p>多人中标模式，雇主可以自行设计奖项个数（最多可设三个奖项），每个奖项相应的人数和赏金。如雇主悬赏1000元，设置以下三个奖项：</p><p>一等奖&nbsp;&nbsp; 若1人&nbsp;&nbsp; 平均分配&nbsp; 若干300钱</p><p>二等奖&nbsp;&nbsp; 若2人&nbsp;&nbsp; 平均分配&nbsp; 若干400钱</p><p>三等奖&nbsp;&nbsp; 若3人&nbsp;&nbsp; 平均分配&nbsp; 若干300元钱</p>                        <br />', '0', '什么是多人中标任务？', '什么是多人中标任务？', '雇主选择多人中标模式，说明此次任务需要多人来完成。即雇主可选择两个以上的作品中标。多人中标模式，雇主可以自行设计奖项个数（最多可设三个奖项），每个奖项相应的人数和赏金。如雇主悬赏1000元，设置以下三个奖项：一等奖&nbsp;&nbsp; 若1人&nbsp;&nbsp; 平均分配&nbsp; 若干300钱二等奖&nbs', '0', '1', '0', '1322123538', '2');
INSERT INTO keke_witkey_article VALUES ('95', '328', '0', '', '什么是计件任务？', '', null, '<p>计件任务是多人中标模式的一种延伸，由于计件任务要求合格稿件达到一定的量，因此只要威客所提稿件符合雇主要求，即可中标。雇主在发布任务时先确定任务的总赏金及要求稿件的数目，系统会据此算出每个稿件的赏金。威客参与计件任务，每达标一个即可获得单个稿件金额。</p>                        <br />', '0', '什么是计件任务？', '什么是计件任务？', '计件任务是多人中标模式的一种延伸，由于计件任务要求合格稿件达到一定的量，因此只要威客所提稿件符合雇主要求，即可中标。雇主在发布任务时先确定任务的总赏金及要求稿件的数目，系统会据此算出每个稿件的赏金。威客参与计件任务，每达标一个即可获得单个稿件金额。', '0', '1', '0', '1322123563', '2');
INSERT INTO keke_witkey_article VALUES ('96', '304', '0', '', '选稿评标有期限吗？', '', null, '<p>任务选稿的期限是根据悬赏金额来计算判断的。</p><p>雇主的项目都有选稿评标期限，尽可能最大限度的保障威客会员的劳动成果权益。 </p><p>因项目无满意作品的情况，很大程度上是悬赏酬金价格不合理原因所致，建议发布者将任务进行加价延期，已确保任务能够顺利完成。</p>                        <br />', '0', '选稿评标有期限吗？', '选稿评标有期限吗？', '任务选稿的期限是根据悬赏金额来计算判断的。雇主的项目都有选稿评标期限，尽可能最大限度的保障威客会员的劳动成果权益。 因项目无满意作品的情况，很大程度上是悬赏酬金价格不合理原因所致，建议发布者将任务进行加价延期，已确保任务能够顺利完成。', '0', '1', '0', '1322123608', '3');
INSERT INTO keke_witkey_article VALUES ('97', '304', '0', '', '怎样参与项目？', '', null, '<p>1、注册成为会员。</p><p>2、浏览项目，点击参与。(已经结束的或处于评标状态的项目不能再参与)。<br />3、方案完成后，进入管理中心，找到我参与的项目，上传即可（分为文字及附件形式的方案，文字方案可直接写在方案说明里）。<br />4、在未评标之前可以修改方案。<br />5、等待客户评标。<br />6、客户选定中标作品后，系统将发出中标通知，并公布中标者及其作品。</p>                        <br />', '0', '怎样参与项目？', '怎样参与项目？', '1、注册成为会员。2、浏览项目，点击参与。(已经结束的或处于评标状态的项目不能再参与)。3、方案完成后，进入管理中心，找到我参与的项目，上传即可（分为文字及附件形式的方案，文字方案可直接写在方案说明里）。4、在未评标之前可以修改方案。5、等待客户评标。6、客户选定中标作品后，系统将发出中标通知，并公布中标者', '0', '1', '0', '1322123648', '2');
INSERT INTO keke_witkey_article VALUES ('98', '304', '0', '', '项目失败退款', '', null, '<p>1、项目如无人承接或进行失败后，系统会扣除任务发布费用后，将剩余款项以代金券方式返还到用户账户。用户代金券可以作为用户站内余额，用于下次任务发布使用。</p><p>2、推广任务失败，系统不收取佣金。</p>                        <br />', '0', '项目失败退款', '项目失败退款', '1、项目如无人承接或进行失败后，系统会扣除任务发布费用后，将剩余款项以代金券方式返还到用户账户。用户代金券可以作为用户站内余额，用于下次任务发布使用。2、推广任务失败，系统不收取佣金。', '0', '1', '0', '1322123697', '2');
INSERT INTO keke_witkey_article VALUES ('99', '218', '0', '', '延期或加价流程', '', null, '<p>1、&nbsp; 客户发布项目后应及时查看项目成果，项目截止后发布方有7天评标期。在7天时间内确定中标结果或作出加价、延期决定。 </p><p>2、&nbsp; 项目首次悬赏无人参与的项目，可享有一次免费延期，延期时间不超过7天。</p><p>3、&nbsp; 延期任务只有3次加价机会，第1次加价不得低于任务金额的10%，第2次加价不得低于任务总金额的20%，第3次不得低于任务总金额的50%。每次延期不能超过10天，加价金额不低于50元</p>                        <br />', '0', '延期或加价流程', '延期或加价流程', '1、&nbsp; 客户发布项目后应及时查看项目成果，项目截止后发布方有7天评标期。在7天时间内确定中标结果或作出加价、延期决定。 2、&nbsp; 项目首次悬赏无人参与的项目，可享有一次免费延期，延期时间不超过7天。3、&nbsp; 延期任务只有3次加价机会，第1次加价不得低于任务金额的10%，第2次加价不得低于任务总金', '0', '1', '0', '1322123727', '0');
INSERT INTO keke_witkey_article VALUES ('100', '311', '0', '', '怎样发布招标任务？', '', null, '<p>1、&nbsp; 登录状态下，点击发布任务按钮；</p><p>2、&nbsp; 选择发布任务类型：招标任务</p><p>3、&nbsp; 按要求填写相关任务信息，如：任务金额、任务周期、任务分类、任务标题、任务内容、任务附件；</p><p>4、&nbsp; 任务确认，并付款。如账户有余额（包含代金券）点击确认付款后会自动扣款，如账户无余额会跳转到支付页面。招标任务仅扣除固定的任务发布费用。</p>                        <br />', '0', '怎样发布招标任务？', '怎样发布招标任务？', '1、&nbsp; 登录状态下，点击发布任务按钮；2、&nbsp; 选择发布任务类型：招标任务3、&nbsp; 按要求填写相关任务信息，如：任务金额、任务周期、任务分类、任务标题、任务内容、任务附件；4、&nbsp; 任务确认，并付款。如账户有余额（包含代金券）点击确认付款后会自动扣款，如账户无余额会跳转到支付页面。', '0', '1', '0', '1322123771', '1');
INSERT INTO keke_witkey_article VALUES ('101', '312', '0', '', '我们有哪些支付方式？', '', null, '<span style=\"font-size:16px;\">支付宝账户余额支付、易宝账户余额支付、快钱账户余额支付、各个银行网营支付、信用卡支付。<br />                        </span><br />', '0', '我们有哪些支付方式？', '我们有哪些支付方式？', '支付宝账户余额支付、易宝账户余额支付、快钱账户余额支付、各个银行网营支付、信用卡支付。', '0', '1', '0', '1322123831', '0');
INSERT INTO keke_witkey_article VALUES ('102', '260', '0', '', '如何发布自己的服务需求？', '', null, '在人中心，中击发布服务<br />', '0', '如何发布自己的服务需求？', '如何发布自己的服务需求？', '在人中心，中击发布服务', '0', '1', '0', '1322123870', '0');
INSERT INTO keke_witkey_article VALUES ('103', '260', '0', '', '什么是个人服务店铺？', '', null, '个人店铺是威客商城专为个人服务商开发的店铺产品，该产品可以充分体现个人服务商的服务价值，以吸引客户光顾。您注册开通后就相当于自己的免费个人网站，可以自己编辑、管理、发布、报价。个人服务店铺为免费产品，您可以完全免费使用该产品。                                                <br />', '0', '什么是个人服务店铺？', '什么是个人服务店铺？', '个人店铺是威客商城专为个人服务商开发的店铺产品，该产品可以充分体现个人服务商的服务价值，以吸引客户光顾。您注册开通后就相当于自己的免费个人网站，可以自己编辑、管理、发布、报价。个人服务店铺为免费产品，您可以完全免费使用该产品。', '0', '1', '0', '1322123902', '0');
INSERT INTO keke_witkey_article VALUES ('104', '260', '0', '', '如何开通个人店铺?', '', null, '<p>开通店铺仅需三步：注册 &#187; 填写必填资料 &#187; 发布服务</p>                        <br />', '0', '如何开通个人店铺?', '如何开通个人店铺?', '开通店铺仅需三步：注册 &#187; 填写必填资料 &#187; 发布服务', '0', '1', '0', '1322123931', '0');
INSERT INTO keke_witkey_article VALUES ('105', '239', '0', '', '怎样查看我参与的项目？', '', null, '<p>1、登录状态下进管理中心<br />2、点击我参与的项目，就会显示您所参与的所有项目，如有中标项目，会显示“中标”字样，未提交方案的项目有“上传字样”。</p>                        <br />', '0', '怎样查看我参与的项目？', '怎样查看我参与的项目？', '1、登录状态下进管理中心2、点击我参与的项目，就会显示您所参与的所有项目，如有中标项目，会显示“中标”字样，未提交方案的项目有“上传字样”。', '0', '1', '0', '1322123962', '0');
INSERT INTO keke_witkey_article VALUES ('106', '260', '0', '', '什么是团队服务店铺？', '', null, '<p class=\"text02\">团队店铺是威客商城专为服务型企业与团队型工作室用户开发的店铺产品，该产品可以充分体现团队服务商的服务价值，其主要有以下几点优点：</p><p class=\"text03\">(1)企业级站点，树立团队品牌形象；<br />(2)全方位展示，精确体现服务价值；<br />(3)置身大商圈，免费获更多得客户；<br />(4)适合企业、多人工作室等团队用户。</p>                        <br />', '0', '什么是团队服务店铺？', '什么是团队服务店铺？', '团队店铺是威客商城专为服务型企业与团队型工作室用户开发的店铺产品，该产品可以充分体现团队服务商的服务价值，其主要有以下几点优点：(1)企业级站点，树立团队品牌形象；(2)全方位展示，精确体现服务价值；(3)置身大商圈，免费获更多得客户；(4)适合企业、多人工作室等团队用户。', '0', '1', '0', '1322123986', '0');
INSERT INTO keke_witkey_article VALUES ('107', '237', '0', '', '如何知道自己的作品中标？', '', null, '<p>1、&nbsp; 网站上会发出中标通知的。</p><p>2、&nbsp; 在管理中心，我参与的项目处会显示“中标”字样。</p><p>3、在个人消息中心，可以收到中标的系统消息。</p>                        4、本站会以邮件的形式发送到你注册的邮箱里去。<br />', '0', '如何知道自己的作品中标？', '如何知道自己的作品中标？', '1、&nbsp; 网站上会发出中标通知的。2、&nbsp; 在管理中心，我参与的项目处会显示“中标”字样。3、在个人消息中心，可以收到中标的系统消息。                        4、本站会以邮件的形式发送到你注册的邮箱里去。', '0', '1', '0', '1322124066', '0');
INSERT INTO keke_witkey_article VALUES ('108', '265', '0', '', '退款注意事项', '', null, '<p>1、客户提出申请退款时，请详细告知相关内容（包括交易内容、沟通记录、聊天记录等）证明服务不符合要求的证据。</p><p>2、 威客商城收到客户退款申请，会在24小时内联系服务提供商，以第三方名义了解核实情况，协商调解并作出合理的仲裁，请双方给予配合！</p><p>3、最高退款金额不高于客户在威客商城托管的交易金额。</p>                        <br />', '0', '退款注意事项', '退款注意事项', '1、客户提出申请退款时，请详细告知相关内容（包括交易内容、沟通记录、聊天记录等）证明服务不符合要求的证据。2、 威客商城收到客户退款申请，会在24小时内联系服务提供商，以第三方名义了解核实情况，协商调解并作出合理的仲裁，请双方给予配合！3、最高退款金额不高于客户在威客商城托管的交易金额。', '0', '1', '0', '1322124097', '0');
INSERT INTO keke_witkey_article VALUES ('109', '312', '0', '', '如何付款/付款方式', '', null, '<p>在线下单，在线托管交易付款方式</p><p class=\"text02\">1、用帐户余额支付</p><p class=\"text02\">2、用网上银行充值到帐户支付</p><p class=\"text02\">3、用支付宝充值到帐户支付</p><p class=\"text02\">4、用财付通充值到帐户支付</p><p class=\"text02\">5、线下去银行汇款，汇款打电话通知客服为你帐号充值。</p><p class=\"text02\">&nbsp;</p>                        <br />', '0', '如何付款/付款方式', '如何付款/付款方式', '在线下单，在线托管交易付款方式1、用帐户余额支付2、用网上银行充值到帐户支付3、用支付宝充值到帐户支付4、用财付通充值到帐户支付5、线下去银行汇款，汇款打电话通知客服为你帐号充值。&nbsp;', '0', '1', '0', '1322124227', '0');
INSERT INTO keke_witkey_article VALUES ('110', '313', '0', '', '什么是威客？', '', null, '<p>&nbsp;&nbsp;&nbsp; 威客是英文Witkey（wit智慧、key钥匙）的音译。威客是指在网络时代凭借自己的能力（智慧和创意），在互联网上出售自己的富裕工作时间和劳动成果而获得报酬的人。通俗地讲，威客就是在网络平台上出售自己无形资产成果价值的工作者群体。&nbsp;<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;在新经济（商业）环境中做威客的人，种类各式各样，除了各个行业、各个领域之外，还包括掌握各类创新理论（经济和管理）的人。在这些掌握各类创新理论（经济和管理）的人中，有经济威客、管理威客和网络威客等各个领域的威客。甚至可以夸张地说，在互联网威客这平台上，没有所谓的经济学家、管理学家等各式各样的专家学者，只有威客。而威客类网站的出现，为有知识生产加工能力的个人创造了一个销售知识产品的商业平台和机会。<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;总而言之，威客模式的出现，为个人的知识（资源）买卖带来商机。随着威客时代的来临，每一个威客都可以将自己的知识、经验和学术研究成果作为一种无形的“知识商品”和服务在网络上来销售。威客通过威客网站这个平台买卖“知识产品”，让自己的知识、经验和学术研究成果逐步转化成个人财富。在威客模式下，个人的知识（资源）不但是力量，而且又是个人的财富。在以知识资源应用开发的新经济（商业）时代，无论是个人或组织拥有知识就拥有财富。</p>                        <br />', '0', '什么是威客？', '什么是威客？', '&nbsp;&nbsp;&nbsp; 威客是英文Witkey（wit智慧、key钥匙）的音译。威客是指在网络时代凭借自己的能力（智慧和创意），在互联网上出售自己的富裕工作时间和劳动成果而获得报酬的人。通俗地讲，威客就是在网络平台上出售自己无形资产成果价值的工作者群体。&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', '0', '1', '0', '1322124296', '0');
INSERT INTO keke_witkey_article VALUES ('111', '313', '0', '', '什么是雇主？', '', null, '<span style=\"font-family:Arial;\">雇主</span>：均是指在本网站上发布任务的会员。', '0', '什么是雇主？', '什么是雇主？', '雇主：均是指在本网站上发布任务的会员。', '0', '1', '0', '1322124385', '0');
INSERT INTO keke_witkey_article VALUES ('112', '317', '0', '', '作为推手需要什么条件', '', null, '1、没有专业、学历的限制，只要自己感兴趣，能完成相应的任务，就可参与。<br /><br />2、XXX网是一个网上工作平台，只要注册为XXX网会员就能成为了一名推手。<br /><br />3、XXX网提倡竞争、成长与学习。<br /><br /><br />', '0', '作为推手需要什么条件', '作为推手需要什么条件', '1、没有专业、学历的限制，只要自己感兴趣，能完成相应的任务，就可参与。2、XXX网是一个网上工作平台，只要注册为XXX网会员就能成为了一名推手。3、XXX网提倡竞争、成长与学习。', '0', '1', '0', '1322124563', '0');
INSERT INTO keke_witkey_article VALUES ('113', '318', '0', '', '点击推广代码之后，重新进入XX网注册，是算我推广的客户吗', '', null, '答：算的，点击推广代码之后浏览器会自动作记录，只要不清除浏览器Cookie记录的情况下15天内注册会员都算成功推广。                        <br />', '0', '点击推广代码之后，重新进入XX网注册，是算我推广的客户吗', '点击推广代码之后，重新进入XX网注册，是算我推广的客户吗', '答：算的，点击推广代码之后浏览器会自动作记录，只要不清除浏览器Cookie记录的情况下15天内注册会员都算成功推广。', '0', '1', '0', '1322124693', '0');
INSERT INTO keke_witkey_article VALUES ('114', '318', '0', '', '我做推广员能得到什么？', '', null, '&nbsp;                                                        答：在实践推广过程中不仅能学习许多网络营销知识锻炼自己的意志，同时能结交许多志同道合的朋友，当然在有效推广之后还可以获得非常丰厚的现金报酬。                                                <br />', '0', '我做推广员能得到什么？', '我做推广员能得到什么？', '&nbsp;                                                        答：在实践推广过程中不仅能学习许多网络营销知识锻炼自己的意志，同时能结交许多志同道合的朋友，当然在有效推广之后还可以获得非常丰厚的现金报酬。', '0', '1', '0', '1322124734', '0');
INSERT INTO keke_witkey_article VALUES ('115', '317', '0', '', '什么是推广链接？', '', null, '<span style=\"font-family:Arial;\">答：推广链接也是用于记录推广成绩的工具，由于是链接形式因此能通过浏览器地址访问。</span><br />', '0', '什么是推广链接？', '什么是推广链接？', '答：推广链接也是用于记录推广成绩的工具，由于是链接形式因此能通过浏览器地址访问。', '0', '1', '0', '1322124816', '1');
INSERT INTO keke_witkey_article VALUES ('116', '317', '0', '', '在哪里获取自己的推广链接\\代码？', '', null, '答：在登录状态下直接进入XX网推广员页面（http://www.XXX.com/index.php?do=prom）就能看到并获取您自己的推广链接\\代码。                        <br />', '0', '在哪里获取自己的推广链接代码？', '在哪里获取自己的推广链接代码？', '答：在登录状态下直接进入XX网推广员页面（http://www.XXX.com/index.php?do=prom）就能看到并获取您自己的推广链接代码。', '0', '1', '0', '1322124861', '0');
INSERT INTO keke_witkey_article VALUES ('240', '2', '0', '', '联系方式', '', '', '&lt;strong&gt;热线电话：&lt;/strong&gt;&lt;br /&gt;联系电话：00000000&lt;br /&gt;传真：000-00000000&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;商务合作：&lt;/strong&gt;&lt;br /&gt;Tel：000-0000000&nbsp; &lt;br /&gt;Email：&lt;a href=\"mailto:00@00000.com\"&gt;00@00000.com&lt;/a&gt;&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;新闻咨询&lt;/strong&gt;&lt;br /&gt;00000000000&lt;br /&gt;新闻联络人:000&lt;br /&gt;QQ：00000000&lt;br /&gt;MSN： &lt;a href=\"mailto:0000000000@000.com\"&gt;0000000000@000.com&lt;/a&gt;&lt;br /&gt;Email：&lt;a href=\"mailto:000000@0000.com\"&gt;000000@0000.com&lt;/a&gt;&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;人才招聘&lt;/strong&gt;&lt;br /&gt;电话：0000000&lt;br /&gt;Email：&lt;a href=\"mailto:000@000000.com\"&gt;000@000000.com&lt;/a&gt;&lt;br /&gt;QQ:0000000000&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;公司地址：&lt;/strong&gt;&lt;br /&gt;00市00区00000000大厦00楼&lt;br /&gt;邮政编码：000000&lt;br /&gt;', '0', '', '', '', '0', '1', '0', '1329460932', '2');
INSERT INTO keke_witkey_article VALUES ('227', '203', '0', '匿名', '警惕交易诈骗，注意帐户安全', '', '', '&lt;p&gt;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;网络交易骗术不断升级，客客网提醒所有用户：万变不离其宗。只要注意防范，任何骗术都无法得逞。&nbsp;以下展现几种常见的安全隐患和骗术，请所有会员注意！&lt;/p&gt;&lt;p&gt;【&lt;strong&gt;设置复杂密码，注意保管账户&lt;/strong&gt;】&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;目前网站提供的是双重密码的安全保障，对于登录等基本操作需要验证登录密码，对于提现、打款等涉及到资金的操作，需要验证安全密码。从近期资金被盗的几起案例中，发现了这些用户的密码都过于简单，有的甚至未设置安全密码，以致于密码很容易被猜中破解。&lt;br /&gt;&lt;strong&gt;安全提示：&lt;/strong&gt;&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;广大会员应当注意设置并妥善保管密码，采取以下措施，防止密码被盗：&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;1.&nbsp;&nbsp;&nbsp;&nbsp;设置较为复杂的密码，不要使用与用户名一致、简单的数字组合等密码；&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;2.&nbsp;&nbsp;&nbsp;&nbsp;设置不同的登录密码和安全密码；&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;3.&nbsp;&nbsp;&nbsp;&nbsp;保管好账号密码，尽量不要在公共场所的电脑上登录使用。&lt;br /&gt;&lt;br /&gt;&lt;br /&gt;&lt;/p&gt;', '1', '警惕交易诈骗，注意帐户安全', '警惕交易诈骗，注意帐户安全', '警惕交易诈骗，注意帐户安全', '0', '1', '0', '1329459645', '32');
INSERT INTO keke_witkey_article VALUES ('126', '100', '0', '', '网站公告5', '', null, '<p>作品是以文件付费下载的形式出售的；提供服务是以消耗劳动力和时间作为出售条件的。作品版权归作者所有，购买者只享有使用权和修改权；提供服务版权归购买者所有。作品相同的购买者只需要进行一次性消费就可以永久下载；提供服务相同的购买者根据需求次数付费。</p><br />', '0', '网站公告5', '网站公告5', '<p>作品是以文件付费下载的形式出售的；提供服务是以消耗劳动力和时间作为出售条件的。作品版权归作者所有，购买者只享有使用权和修改权；提供服务版权归购买者所有。作品相同的购买者只需要进行一次性消费就可以永久下载；提供服务相同的购买者根据需求次数付费。</p>', '0', '1', '0', '1325903353', '2');
INSERT INTO keke_witkey_article VALUES ('243', '17', '0', '', '威客必看：发帖任务参与须知', '', '', '&lt;h1&gt;&lt;strong&gt;1、威客如何参加发帖任务赚钱？&lt;/strong&gt;&lt;br /&gt;点击进入具体的发帖任务页面(&lt;a href=\"http://jijian.taskcn.com/list/index/\" target=\"_blank\"&gt;所有发帖任务列表&lt;/a&gt;)，&lt;u&gt;下载&lt;/u&gt;任务页面附件中的txt文章，把文章内容全部&lt;u&gt;复制&lt;/u&gt;后，&lt;u&gt;粘贴&lt;/u&gt;到雇主指定的网站中(如果雇主没有指定，则表示可以发到其他任意的网站上面)，然后点击任务页面“参加任务”的按钮，把发好的URL&lt;u&gt;链接地址&lt;/u&gt;在提交一下即可。如果推广的链接提交后，保持24小时有效(即可以正常访问，不被删除)，那么就可以直接获得相应的任务款奖励了。&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;2、发帖任务一般周期多久呢？&lt;/strong&gt;&lt;br /&gt;发帖类任务默认进行时间为30天，系统会自动延期征集有效作品，直到任务金额消耗完毕后，该任务将自动停止征集。&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;3、如何判断我提交的链接是否有效？&lt;/strong&gt;&lt;br /&gt;发帖任务采用先进的智能抓取技术来判别各个作品是否为有效的提交，默认情况下系统将会在某个作品提交后的24小时内完成自动抓取，并判断该作品链接是否存在及信息是否正确，正确无误的作品将自动获得任务赏金，已不存在的作品链接或信息有误将不会得到任务赏金。&lt;br /&gt;&lt;strong&gt;&lt;span style=\"color:red;\"&gt;以下提交为无效提交：&lt;br /&gt;&lt;/span&gt;&lt;/strong&gt;a. 没有提交到雇主指定的网站（雇主未指定除外）；&lt;br /&gt;b. 威客原创的内容(即与雇主附件中的推广文章无关的内容)；&lt;br /&gt;c. 将雇主提供的文章进行二次创作（增删、修改）；&lt;br /&gt;d. 登录会员后方可见的网站链接。&lt;br /&gt;e. 无人气的新建博客；&lt;br /&gt;f. 同一博客下重复发帖2篇以上（含2篇）。&lt;br /&gt;&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;4、我能无限参加某个发帖任务吗？&lt;/strong&gt;&lt;br /&gt;&lt;a href=\"http://my.taskcn.com/audite\" target=\"_blank\"&gt;实名认证&lt;/a&gt;的威客参加每个任务提交推广链接的上限为10个网址，且每个域名不得提交3次以上，多出部分系统将自动丢弃不作处理；非实名认证威客不能参加发帖任务。&lt;/h1&gt;&lt;br /&gt;', '0', '', '', '', '0', '1', '0', '1329461237', '2');
INSERT INTO keke_witkey_article VALUES ('241', '4', '0', '', '免责声明', '', '', '1、本网站发布悬赏任务、技术项目转让，其版权均归原作者所有，内容必须真实合法，本网站不负任何责任。&lt;br /&gt;&lt;br /&gt;2、其他任何媒体、网站或个人从本网下载使用，须自负版权等法律责任，本网站不负任何责任。&lt;br /&gt;&lt;br /&gt;3、本网站刊发、转载文章，版权归原作者所有，仅代表本人的观点和看法，文责自负，本网站不负任何责任。&lt;br /&gt;&lt;br /&gt;4、当本网站以链接形式推荐其他网站内容时，本网站不保证这些网站或资源的可用性负责、真实性、合法性。&lt;br /&gt;&lt;br /&gt;5、对于任何因使用链接的其他网站所造成之个人资料泄露及由此而导致的任何法律争议和后果，本网站不负任何责任。&lt;br /&gt;&lt;br /&gt;6、由于与本网站链接的其它网站所造成之个人资料泄露及由此而导致的任何法律争议和后果，本网站不负任何责任。&lt;br /&gt;&lt;br /&gt;7、任何单位或个人认为通过本站的内容可能涉嫌侵犯其合法权益，应该及时向本站管理员书面反馈，并提供身份证明、权属证明及详细侵权情况证明，我们在收到上述法律文件后，将会尽快安排处理。&lt;br /&gt;', '0', '', '', '', '0', '1', '0', '1329460971', '0');
INSERT INTO keke_witkey_article VALUES ('242', '203', '0', '', '支付方式', '', '', '&lt;p&gt;&lt;strong&gt;&lt;span style=\"font-size:16px;color:#ff0000;\"&gt;支付方式一：银行汇款&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;开 户 行：XXXXXXX银行　　帐 号：000-000-000-000&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;注：开户行所在城市为：xxxxx&nbsp; .....&lt;/p&gt;&lt;p&gt;在线QQ：xxxxxxxx、xxxxxxx&lt;/p&gt;&lt;p&gt;联系电话：027-0000000、00000000、000000、000000&lt;/p&gt;&lt;p&gt;付款后请及时通知我们，请注明所汇银行、金额、您在威客的用户名或者所发项目名称。&lt;/p&gt;&lt;p&gt;企业如需开据发票，请把公司名称、地址、邮编等相关信息发至邮箱（&lt;a href=\"mailto:xxxx@xxx.com\"&gt;xxxx@xxx.com&lt;/a&gt;）,费用另计。 &lt;br /&gt;&lt;br /&gt;&lt;strong&gt;&lt;span style=\"font-size:16px;color:#ff0000;\"&gt;&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;&lt;span style=\"font-size:16px;color:#ff0000;\"&gt;支付方式二：通过财付通付款&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-family:Verdana;\"&gt;&lt;strong&gt;如何通过财付通预付赏金？&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;&lt;br /&gt;', '0', '', '', '', '0', '1', '0', '1329461007', '3');
INSERT INTO keke_witkey_article VALUES ('247', '7', '0', '', '拥有梦想的快乐威客', '', '', '本期我们采访的威客是netslave——黄之平，他是一名外贸公司的设计师，在任务中国一直在做兼职威客。他是一个热爱生活，随和乐观的人，喜欢看书、旅行。梦想就是可以利用威客赚的钱买个属于自己的车，可以带上老婆到各处走走，爬遍中国的三山五岳，名川大湖。闲暇时喜欢带上相机到公园、山上摄影，追逐一切美的事物。&lt;br /&gt;', '0', '', '', '', '0', '1', '0', '1329461388', '1');
INSERT INTO keke_witkey_article VALUES ('248', '4', '0', '', '诚信体系之诚信保障', '', '', '&lt;p&gt;&lt;span style=\"font-family:simsun;\"&gt;&lt;span style=\"FONT-SIZE: 10pt\"&gt;诚信保障金是加入&lt;span style=\"TEXT-DECORATION: underline\"&gt;诚信保障服务&lt;/span&gt;的卖家向阿里巴巴自缴的&lt;span style=\"color:red;\"&gt;诚信保证金&lt;/span&gt;及/或阿里巴巴授予的&lt;span style=\"color:red;\"&gt;诚信保障额度&lt;/span&gt;的总和。诚信保证金是指加入诚信保障服务的卖家自主向阿里巴巴预缴的诚信保障资金，用于确保交易中的买家合法权益能得到切实保障，在发生贸易争议且买家赔付申请成立时，将相应的保障资金赔付给买家，最大程度降低买家的合理损失。一定条件下，卖家可以支取、申请退回诚信保障金，并授权阿里巴巴冻结、处置诚信保障金。诚信保障额度是指阿里巴巴根据买家的需求，通过一定的评估模型，对加入诚信保障服务的卖家，授予一定额度的诚信保障金。&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-family:simsun;\"&gt;&lt;span style=\"FONT-SIZE: 10pt\"&gt;诚信保障金是卖家为交易预交的一笔先行赔付金。可以有多种方式来展示&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;&lt;br /&gt;', '0', '', '', '', '0', '1', '0', '1329461474', '2');
INSERT INTO keke_witkey_article VALUES ('249', '5', '0', '', '依法诚信纳税共建和谐社会', '', '', '&lt;span style=\"FONT-SIZE: 14px; LINE-HEIGHT: 25px\"&gt; 依法诚信纳税是社会主义和谐社会建设的客观要求，是广大纳税人共建共享和谐社会的具体体现。&nbsp;&lt;br /&gt;&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&lt;strong&gt;一、依法诚信纳税是社会主义和谐社会建设的重要物质保障&lt;/strong&gt; &lt;br /&gt;&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;税收是国家参与国民收入分配最主要、最规范的形式，筹集财政收入稳定可靠。我国的税收收入已占财政收入的95%左右，是财政收入最主要的来源。我国实行社会主义制度，国家、集体和个人之间的根本利益是一致的，税收的性质是“取之于民，用之于民”。国家运用税收筹集财政收入，通过预算安排用于财政支出，提供公共产品和公共服务，进行交通、水利等基础设施和城市公共建设，支持“三农”发展，用于环境保护和生态建设，促进教育、科学、文化、卫生等社会事业发展，用于社会保障和社会福利，促进地区协调发展，进行国防建设，维护社会治安，用于政府行政管理，开展外交活动，保障国家安全，促进经济社会发展，满足人民群众日益增长的物质文化等方面的需要。 &lt;br /&gt;&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;近年来，我国税收收入保持持续快速增长势头。2006年达到37636亿元，比上年增长21.9%。这是国民经济快速增长和企业效益大幅提高的反映，是各级党委政府、社会各界对税收工作的支持和全国税务系统推进依法治税、加强税收征管的结果，也是广大纳税人依法诚信纳税为国家作出的贡献。国家税收较快增长，大大增强了财政实力，为增加公共产品和服务，改善民生提供了财力保障。要构建社会主义和谐社会，需要着力解决我国存在的经济社会、城乡发展不平衡等问题，支持农村发展和农民增收，发展医疗卫生、教育、文化等社会事业，促进就业和社会保障，进一步改善民生。这些都需要国家有强大的财力作保证。这就要求税收随着经济发展保持平稳增长，依法筹集更多的财政收入。&nbsp;&lt;br /&gt;&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&lt;strong&gt;二、依法诚信纳税是构建社会主义和谐社会的重要内容&lt;/strong&gt; &lt;br /&gt;&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;诚信友爱就是全社会互帮互助、诚实守信，全体人民平等友爱、融洽相处。法制是社会和谐的重要保障，诚信是社会和谐的重要标志。这实际上就是要求坚持依法治国与以德治国相结合，推进社会主义和谐社会建设。 &lt;br /&gt;&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;依法诚信纳税从法律和道德两个方面规范、约束税务机关和纳税人的行为，是构建社会主义和谐社会的题中应有之义。我国宪法明确规定，中华人民共和国公民有依照法律纳税的义务。任何不依法纳税的行为，都要受到法律的惩处。依法诚信纳税也是纳税人最好的信用证明。诚信不仅是一种品行，更是一种责任；不仅是一种道义，更是一种准则；不仅是一种声誉，更是一种资源。就个人而言，诚信是高尚的人格力量；就企业而言，诚信是宝贵的无形资产。“人无信不立，商无信不兴。”失去了信用就难以在市场竞争中立足。只有坚持守法经营、诚信纳税，才能树立良好的商业信誉和形象，实现长远发展。广大纳税人必须依法诚信纳税，才能推动形成全社会诚实守信、文明守法的良好风气。&nbsp;&lt;br /&gt;&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&lt;strong&gt;三、依法诚信纳税、共建和谐社会需要征纳双方共同努力&lt;/strong&gt; &lt;br /&gt;&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;税收征管法及其实施细则明确规定了税务机关和纳税人的权利与义务。就税务机关而言，就是要严格执法，文明服务。就纳税人而言，就是要自觉履行纳税义务，依照法律、行政法规的规定及时足额缴纳税款。同时，纳税人还享有依法申请减免缓税、行政复议、选择申报方式、检举、控告税务人员的违法行为等权利。实现依法诚信纳税，促进和谐社会建设，是纳税人与税务机关的共同责任。 &lt;br /&gt;&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;加大税法宣传力度，增强全社会依法诚信纳税意识。要进一步改进宣传方式，切实提高税法宣传的效果，广泛、及时、准确地向纳税人宣传税收法律、法规和政策，普及纳税知识；要加强办税服务、政策咨询和纳税操作实务知识的宣传培训，既要使纳税人明确纳税义务，又要使纳税人掌握如何履行纳税义务，为纳税人学法、用法和守法创造条件；要加强税收职能作用、税收取之于民、用之于民的宣传，使广大群众了解税收为各级政府社会管理和公共服务提供财力保障，调节经济和调节分配，促进国家经济建设和社会事业发展的重要作用，从而进一步增强依法诚信纳税的荣誉感和自觉性。 &lt;br /&gt;&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;改进和优化纳税服务，构建和谐的税收征纳关系。和谐的税收征纳关系是促进国家税收事业发展，发挥税收职能作用的重要条件，也是和谐社会的重要组成部分。要以提高税法遵从度和方便纳税人及时足额纳税为目标，加强和改进纳税服务工作，切实维护纳税人合法权益，构建和谐的税收征纳关系。在税收征管中要注意减轻纳税人办税负担，下大力气清理、简并要求纳税人报送的各种报表资料，避免纳税人重复报送。国、地税局要进一步做好联合办理税务登记、开展税法宣传、评定纳税信用等级以及加强税务检查协调等方面工作。 &lt;br /&gt;&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;大力推进依法治税，创造公平竞争的税收环境。认真落实依法征税，应收尽收，坚决不收过头税，坚决防止和制止越权减免税的组织收入原则，正确处理依法征税与支持经济发展、依法征税与完成税收计划、依法征税与纳税服务、依法征税与完善税制之间的关系，做到依法治税、依法征管。要强化税收执法监督。深入推行税收执法责任制，推广税收执法管理信息系统，严格执法过错责任追究。扎实开展税收执法检查，大力整顿和规范税收秩序。加强税务稽查，坚决打击涉税违法行为，继续严厉打击虚开和故意接受虚开增值税专用发票和其他可抵扣票，骗取出口退税，以及利用做假账、两套账、账外经营偷税等行为。对房地产、建筑安装、餐饮娱乐、食品药品生产、连锁经营超市等行业纳税情况以及高收入行业个人所得税缴纳情况开展专项检查，对一些税收秩序比较混乱、征管基础比较薄弱的地区进行税收专项整治。&lt;/span&gt;&lt;br /&gt;', '0', '', '', '', '0', '1', '0', '1329461526', '1');
INSERT INTO keke_witkey_article VALUES ('250', '358', '0', '匿名', '中金香港直销Facebook股权：初定100万股门槛', '21世纪经济报道', '', '&lt;p&gt;&nbsp; 　上帝关上了一扇门，也会开启一扇窗。&lt;/p&gt;&lt;p&gt;　　与平安信托“QDII股权挂钩结构性产品-脸谱(Facebook)未上市股权信托产品”失之交臂数天后(2011年1月6日、2月10日23版《高盛被指转手Facebook股权 平安信托密售内地富人》、《平安信托折戟Facebook 中国富豪梦碎IPO盛宴》曾予报道)，国内一家大型民营企业负责人王刚(化名)意外接到来自中金公司(香港)的电话，再度点燃他淘金Facebook上市盛宴的希望。&lt;/p&gt;&lt;p&gt;　　尽管Facebook一纸上市申请书已递进美国证券交易委员会(SEC)办公室，看似股权大局已定，但中金公司(香港)私人银行部依旧悄然为中国高端投资客，提供了一条投资Facebook未上市股权的“捷径”。&lt;/p&gt;&lt;p&gt;　　“相比平安信托由于赶不上Facebook上市进度被迫暂停信托产品销售，高端投资者可以通过中金(香港)引荐，直接与Facebook股权卖出方签订股权转让协议，并通过代持等手法避开Facebook(由于递交IPO申请)被冻结的限制。”一位接近中金(香港)人士透露，但中金(香港)并不参与具体的投资条款协商，仅仅作为交易撮合方。&lt;/p&gt;&lt;p&gt;　　然而，对境外公司股权投资经验并不多的王刚而言，这无疑是摸着石头过河。变数究竟有多少？&lt;/p&gt;&lt;p&gt;　　&lt;strong&gt;3700万美元门槛的诱惑&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;　　中金香港推介的Facebook未上市股权初定每股37美元，转让条款需投资者与卖方面谈商定。&lt;/p&gt;&lt;p&gt;　　相比此前“夭折”的平安信托QDII产品1000万元人民币投资门槛，中金(香港)暂定的投资门槛必须满足一次性投资100万股Facebook未上市股票。按中金(香港)暂定的每股37美元测算，每位参与者的投资门槛至少在3700万美元(约2.3亿人民币)。目前，准入门槛等细节还存在变数。&lt;/p&gt;&lt;p&gt;　　“其实中金(香港)只会精选几位有资金实力的高端投资者，参与投资Facebook未上市股权，主要面向境内。”一位接近中金(香港)的人士透露，目前中金(香港)给到潜在投资者的，只有一份Facebook招股说明书，具体的股权转让条款需要境内投资者与卖方面谈商定。&lt;/p&gt;&lt;p&gt;　　王刚迫切想了解的，是为何中金(香港)方面给出的Facebook收购价格要比平安信托高出2美元/股。&lt;/p&gt;&lt;p&gt;　　“因为中金(香港)的Facebook未上市股权转出方，与平安信托是截然不同的。”上述接近中金(香港)人士透露，“这也决定双方给境内高端投资者提供两种不同的投资路径。”&lt;/p&gt;&lt;p&gt;　　相比平安信托通过发行一款QDII股权挂钩结构性产品认购Facebook未上市股权，中金(香港)交易中，高端投资者则直接与买方签订股权转让协议。记者了解到，中金(香港)仅作为交易中介，股权转让的条款由买卖双方自主协商确定。&lt;/p&gt;&lt;p&gt;　　国内私人银行发起一款海外信托产品架构申请投资移民的阅历，让王刚对境外信托架构或结构性票据在避税与规避法规监管方面的比较优势有所了解。以平安信托“夭折”的信托产品为例，通过将Facebook未上市股权、境内出资人、股权转出方与投资收益分配条款共同设计成一款结构性票据，基于投资主体借鉴离岸信托产品架构，既能规避境内按自然人或公司法人纳税的监管规定，还能通过海外信托架构绕开美国金融投资的监管法规。&lt;/p&gt;&lt;p&gt;　　记者了解到，平安信托这一产品只需承担10%利息税，无需缴资本利得税。“但如果在中金(香港)通过转让方式得到Facebook未上市股权，能否避税及避开境外金融监管，却是未知数。”王刚说。&lt;/p&gt;&lt;p&gt;　　他更担心的是，由中金(香港)推荐的Facebook股权转让投资是否存在“代持”行为。&lt;/p&gt;&lt;p&gt;　　由于Facebook已递交上市申请且股权转让全部被冻结，此时投资其未上市股权，似乎只剩下“代持”路径。即投资者购买的股票Facebook可能先被原股东或某个特定机构代持，待股票解禁后，才通过特定方式划拨到他们的境外账户。一旦如此，代持期间投资者本身不属于上述Facebook股权的实际控制人，存在投资风险。&lt;/p&gt;&lt;p&gt;　　为此，王刚专门向某些了解境外代持架构的涉外律师咨询，却被告知代持往往涉及内幕交易等问题，可能面临当地监管部门调查。此外，代持交易本身的信息不透明问题，也容易引发股权转让条款纠纷。&lt;/p&gt;&lt;p&gt;　　王刚无奈表示，目前他对中金(香港)所推荐Facebook未上市股权转让的了解，仅局限在知道股份存在6个月禁售期，且由于Facebook已递交上市申请，代持行为似乎难以避免。&lt;/p&gt;&lt;p&gt;　　“条条大路通罗马。”一位了解境外代持架构的律师事务所合伙人透露，最常见的解决办案，是类似前述平安信托产品先采取某种离岸信托产品架构，将Facebook未上市股权、境内出资人、股权转出方、股票代持及划拨条款、投资收益分配条款共同设计在一个离岸信托产品中，然后将离岸信托产品注册在开曼群岛等金融监管相对宽松的“避税天堂”，“或者是通过一个特定的壳投资公司(SPV，如由王刚控制)，通过签订某些条款绑定Facebook未上市股权投资归属权，间接代持Facebook未上市股权。但这类代持行为通常是悄悄进行。”&lt;/p&gt;&lt;p&gt;　　“如果一定通过代持方式投资Facebook未上市股权，其中必有玄机。”王刚的直觉是，当Facebook上市步步临近时，一批原始股东急切向美国海外高端投资客抛售Facebook未上市股权，或许暗藏着某种不能说的“秘密”。&lt;/p&gt;&lt;p&gt;　　&lt;strong&gt;股份来源：Facebook管理层？&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;　　令王刚不解的是，谁愿意在Facebook上市只差临门一脚时，宁可割舍IPO投资收益，也要抛售Facebook股权？&lt;/p&gt;&lt;p&gt;　　他很快找到答案——个别Facebook管理团队成员正暗中抛售Facebook未上市股权；而平安信托“夭折”信托产品所认购的Facebook未上市股权，极有可能来自高盛集团去年初发行的一款用于购买Facebook约2%股权的14亿美元规模特殊投资工具。目前，特殊投资工具以Facebook单一股东Glodman Sachs Clients的名义显示。&lt;/p&gt;&lt;p&gt;　　“巧合的是，特别投资工具的某些利益分成条款，和平安信托此前宣传的QDII产品类似。”王刚进行对比后发现，一是高盛所发行的特别投资工具约定“当海外投资者套现时，还需要向高盛缴纳5%投资收益”，平安信托也要求投资者的投资收益一旦超过20%，平安信托有权分享5%佣金提成；其次是平安信托这款QDII产品条款明确一旦Facebook上市，信托产品所投资结构性票据将自动转为100%参与Facebook股价波动的业绩挂钩票据，但这部分股权持有人仍将显示“海外投行”，似乎与“Glodman Sachs Clients”的代持方式不谋而合。&lt;/p&gt;&lt;p&gt;　　而且，王刚发现高盛这款特别投资工具出资人也有IPO前提前套现的动机。高盛发行特别投资工具目的之一，是通过设定某些条款将全球投资者“限定”为Facebook单一股东，但随着当前SEC着手调查Facebook登记在册的股东实际人数，个别“不合规”出资人可能需要提前套现，规避金融监管，“也不排除个别投资者自己想套现。”&lt;/p&gt;&lt;p&gt;　　不过，记者致电高盛方面求证时，其明确否认平安信托曾欲购买的Facebook未上市股权来自高盛。&lt;/p&gt;&lt;p&gt;　　相比而言，中金(香港)所推荐的Facebook未上市股权卖方背景更单纯。“据说Facebook个别高层管理人员打算趁IPO被热捧期间套现一部分股权，暂定的37美元/股转让定价，较Facebook内部讨论的上市发行价预期要低15%-20%。”&lt;/p&gt;&lt;p&gt;　　记者多方了解到，在Facebook内部，关于公司是否需要IPO仍存在争议，部分管理层认为公司上市主要是受到投行“逼迫”，而产生提前套现所持Facebook股权转而自主创业的打算。&lt;/p&gt;&lt;p&gt;　　“目前中金(香港)主要是寻找潜在的境内高端投资人，还没落实到邀请他们与Facebook股权卖方(或委托律师)协商具体投资条款的环节。但卖方希望一次性投资的100万Facebook股票最好不要分拆出售，避免出资人数过多而影响到代持架构的设立。”前述接近中金香港的人士强调，转让方式基本确定为股权直接转让，“代持”仅仅是Facebook上市申请期间相关股票被冻结的“过渡产物”，卖方愿意协助境内高端投资者完成“相关股票划转”。&lt;/p&gt;', '0', '中金香港直销Facebook股权：初定100万股门槛', '中金香港直销Facebook股权：初定100万股门槛', '中金香港直销Facebook股权：初定100万股门槛', '0', '1', '0', '1329461625', '3');
INSERT INTO keke_witkey_article VALUES ('226', '17', '0', '', '浪漫情人节专题活动：亲爱的，我们约会吧！', '', '', '&lt;div&gt;&lt;span style=\"font-size:16px;\"&gt;痴情的你和你爱的人有哪些感人爱情故事呢？&lt;/span&gt;&lt;br /&gt;&lt;span style=\"font-size:16px;\"&gt;&lt;/span&gt;&lt;/div&gt;&lt;span style=\"font-size:16px;\"&gt; &lt;/span&gt;&lt;div&gt;&lt;br /&gt;今天，你最想对爱的人送出怎么样的话语呢？&lt;/div&gt;&lt;span style=\"font-size:16px;\"&gt;&lt;span style=\"font-size:16px;\"&gt;请将你的真情、真心、真爱留在我们的社区平台吧！祝愿天下所有有情人珍惜爱情的分分秒秒，携手共度美好生活！&lt;/span&gt;&lt;br /&gt;&lt;br /&gt;&lt;span style=\"font-size:16px;\"&gt;&nbsp;&lt;span style=\"color:#e53333;\"&gt;要求：&lt;/span&gt;&lt;/span&gt;&lt;br /&gt;&lt;br /&gt;&lt;span style=\"font-size:16px;color:#e53333;\"&gt;1.可以讲述一个发生在你身上的感人爱情故事；&lt;/span&gt;&lt;br /&gt;&lt;br /&gt;&lt;span style=\"font-size:16px;color:#e53333;\"&gt;2.可以写一些对你爱的人最想说的话；&lt;/span&gt;&lt;/span&gt;&lt;br /&gt;', '0', '', '', '', '0', '1', '0', '1329459290', '3');
INSERT INTO keke_witkey_article VALUES ('203', '100', '0', '', '资讯测试', '', 'data/uploads/2011/12/19/133474eeeb5f4d626c.png', '你比发生大幅度是<img src=\"data/uploads/2011/12/19/228664eeeb5f262e6f.gif\" alt=\"\" /><br />', '0', '资讯测试', '资讯测试', '333333333333333333333333333333333333', '0', '2', '0', '1325650111', '63');
INSERT INTO keke_witkey_article VALUES ('239', '2', '0', '客客', '联系我们', '客客', '', '&lt;p class=\"font14\"&gt;武汉客客信息技术有限公司&lt;br /&gt;公司地址：武汉市洪山区雄楚大街御景名门3号楼1005室 &lt;br /&gt;咨询热线：027 87733922 &lt;br /&gt;客服QQ：1278454916 &lt;br /&gt;固定电话:18971533922&lt;/p&gt;&lt;h4&gt;售前咨询&lt;/h4&gt;&lt;p&gt;如果您欲成为客客出品系统商业授权用户或项目定制开发，请进入官网右侧网上客服系统，直接与工作人员进行在线咨询。&lt;/p&gt;&lt;p&gt;受理时间【5×8小时】：09:00~18:00（午餐：12:00~13:00；周六、日视情况而定）&lt;/p&gt;&lt;h4&gt;售后咨询&lt;/h4&gt;&lt;p&gt;客客出品官方论坛商业用户服务区提供商业用户服务的登录入口，将为您提供全方位的教程指导及问题反馈受理&lt;/p&gt;&lt;p&gt;如果您是客客出品商业授权用户，在使用过程中出现问题或疑问，请致电运营中心：027-87733921&lt;/p&gt;&lt;p&gt;受理时间【5×8小时】：09:00~18:00（午餐：12:00~13:00；周六、日不予受理） &lt;/p&gt;&lt;h4&gt;技术协助&lt;/h4&gt;&lt;p&gt;我们特别为企业授权及项目定制开发用户提供了即时在线技术支持快速通道，如果您在使用过程中遇到技术问题，请直接与您技术支持取得联系，或通过客客官网论坛商业用户服务区留言，我们会即时与您取得联系。&lt;/p&gt;&lt;p&gt;受理时间【5×8小时】：09:00~18:00（午餐：12:00~13:00；周六、日不予受理）&lt;/p&gt;&lt;h4&gt;战略合作&lt;/h4&gt;&lt;p&gt;如果您欲与武汉客客信息技术有限公司建立战略合作关系，请发邮件至yoko@kekezu.com&lt;/p&gt;&lt;p&gt;为了能及时与您取得联系，请留下有效的联系方式（如：手机号码或QQ、MSN）及合作意向内容&lt;/p&gt;&lt;p&gt;受理时间：工作人员会正常收取邮件后24小时内给予回复（周末及节假日受理时间顺延）&nbsp;&lt;/p&gt;', '0', '联系我们', '联系我们', '联系我们', '0', '1', '0', '1329460896', '1');
INSERT INTO keke_witkey_article VALUES ('218', '200', '0', '', '登录协议', '', '', '这里是登录协议内容这里<img alt=\"微笑\" src=\"resource/js/xheditor/xheditor_emot/default/smile.gif\" /><img alt=\"生气\" src=\"resource/js/xheditor/xheditor_emot/default/mad.gif\" /><img alt=\"敲打\" src=\"resource/js/xheditor/xheditor_emot/default/knock.gif\" /><img alt=\"抓狂\" src=\"resource/js/xheditor/xheditor_emot/default/crazy.gif\" />，这里是登录协议，这里是登录协议<br />', '0', '', '', '', '0', '1', '0', '1326704236', '0');
INSERT INTO keke_witkey_article VALUES ('219', '200', '0', '', '注册协议', '', '', '<p>这里是注册协议内容</p><p>内容自定啊啊啊<img alt=\"微笑\" src=\"resource/js/xheditor/xheditor_emot/default/smile.gif\" /><img alt=\"大哭\" src=\"resource/js/xheditor/xheditor_emot/default/wail.gif\" /><img alt=\"尴尬\" src=\"resource/js/xheditor/xheditor_emot/default/awkward.gif\" /><img alt=\"疑问\" src=\"resource/js/xheditor/xheditor_emot/default/doubt.gif\" />，哈呛楏堙压顶无可奈何花落去楏堙在<br /></p><br />', '0', '', '', '', '0', '1', '0', '1326704927', '0');
INSERT INTO keke_witkey_article VALUES ('220', '200', '0', '', '任务发布协议', '', '', '<p>任务发布协议任务发布协议任务发布协议任务发布协议任务发布协议任务发布协议任务发布协议</p><p>任务发布协议任务发布协议任务发布协议任务发布协议任务发布协议任务发布协议任务发布协议</p><p>任务发布协议任务发布协议任务发布协议任务发布协议任务发布协议任务发布协议任务发布协议<br /></p><br />', '0', '', '', '', '0', '1', '0', '1326704968', '0');
INSERT INTO keke_witkey_article VALUES ('221', '200', '0', '', '商品出售协议', '', '', '<p><span class=\"font14\" style=\"text-indent: 2em;\">此协议是关于交易双方发布者于中标者所设计作品的知识产权移交的。</span></p><p><span class=\"font14\" style=\"text-indent:2em\"></span> <span class=\"font14 block\" style=\"text-indent: 2em;\">买</span><span class=\"font14 block\" style=\"text-indent: 2em;\">成品商店购买一个设计的时候，发布者和中标者就会被视为订立了一项具有法律约束力的协议。</span></p><p><span class=\"font14 block\" style=\"text-indent:2em\"></span> <span class=\"font14 block\" style=\"text-indent: 2em;\">除非买家和卖家分别以书面形式同意此协议的条款。 一旦参加一个设计悬赏（不论以买家还是卖家的身份）</span></p><p><span class=\"font14 block\" style=\"text-indent: 2em;\">，就默认为同意此协议的条款。当事人此协议的当事人为买家和其在悬赏中选定的中标卖家，或在设</span></p><p><span class=\"font14 block\" style=\"text-indent:2em\">计成品商店购买的作品的设计者，这种情况下称作“卖方卖家”。</span><span class=\"font14 block\" style=\"text-indent: 2em;\">如果不止一个卖方卖家，那么买家将被</span></p><p><span class=\"font14 block\" style=\"text-indent:2em\">视为跟卖方卖家单独订立了协议。协议日期以买家选定悬赏中的相关设计（转让的设计）或购买设计成品商店里转让的设计的日期为准。</span></p>', '0', '', '', '', '0', '1', '0', '1326764543', '0');
INSERT INTO keke_witkey_article VALUES ('225', '358', '0', '新浪科技', '唯冠召开iPad维权发布会：起诉苹果是维权', '新浪科技', '', '&lt;p&gt;新浪科技讯 2月17日午间消息，深圳唯冠今日联合和君创业总裁李肃、国浩伙律师马东晓在北京召开发布会，说明唯冠与苹果之间的iPad商标权纠纷。唯冠创始人杨荣山表示，苹果公司当年购买iPad在全球多个国家商标权时存在欺诈行为，现在起诉苹果是维护权益。&lt;/p&gt;&lt;p&gt;　　&lt;strong&gt;唯冠iPad的前世今生&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;　　深圳唯冠今天召开的维权发布会引来极大关注，在国浩律师事务所北京办公室的一间会议室里，60多家媒体挤满了整个会议室，很多最后赶到的媒体只能站在参与会议。&lt;/p&gt;&lt;p&gt;　　唯冠创始人杨荣山开场介绍了唯冠生产的iPad产品。据他介绍，iPad是一款产品名称(全称是internet Personal Access Device)，同是也是一个商标。唯冠公司在1998年下半年开始设计iPad产品，研发投入超过3000万美金。&lt;/p&gt;&lt;p&gt;　　杨荣山指出，iPad是唯冠iFamily系列产品之一，2000年正式对外发布。“这在当时是一款概念性产品。”2003年，唯冠研发新一代iPad产品。由于唯冠并不拥有iPad在美国的商标，iPad只能以OEM方式卖给惠普&lt;a href=\"http://weibo.com/hpchina?zw=tech\" target=\"_blank\" __sina1329459174687=\"7\"&gt;(微博)&lt;/a&gt;。&lt;/p&gt;&lt;p&gt;　　在今天的发布会上，唯冠公司向现场媒体散发了唯冠iPad的介绍资料。根据提供的材料，唯冠iPad是一款有鼠标、键盘、显示器的小型台式机，与苹果公司现在出售的iPad平板电脑完全不同。另外，唯冠iFamily系列产品还包括iNote、iPDA、iDVD、iClient等。&lt;/p&gt;&lt;p&gt;　　&lt;strong&gt;苹果购买iPad商标过程存在欺诈&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;　　据杨荣山回忆，在iPad商标上唯冠与苹果曾有过“交火”。2003年，苹果曾在欧洲注册iPod商标，因为iPod与iPad有很大的相似性，唯冠花了很多精力阻止苹果，但最后选择放弃。&lt;/p&gt;&lt;p&gt;　　杨荣山说，2008年苹果公司经过“精心设计”，在英国成立了一家名称为IP Application Development的公司(简称“英国IP公司”)，主动与唯冠联系，说公司简称与iPad商标很相似，要求购买。双方最初商谈的只是iPad在欧洲地区的商标权。&lt;/p&gt;&lt;p&gt;　　杨荣山说，英国IP公司最初出价是2万英镑，“这还不够注册费用，所以最初没有同意出售。”不过，后来英国IP公司向唯冠公司发了一封邮件，称这一价格合适，同时表示“如果不卖，就会发起法律诉讼。”&lt;/p&gt;&lt;p&gt;　　杨荣山表示，2009年唯冠出现财务危机，公司正在打算收缩海外业务，唯冠台北公司主张卖掉iPad商标，因为如果诉讼，公司要花很多律师费。&lt;/p&gt;&lt;p&gt;　　于是，2009年12月，杨荣山授权员工麦世宏签署相关协议，将10个商标的全部权益以3.5万英镑的价格转让给英国IP公司。&lt;/p&gt;&lt;p&gt;　　因为双方签订的协议附件中提到包括中国内地的iPad商标转让协议，于是这也成为了苹果与唯冠公司双方产生纠纷的根源所在。&lt;/p&gt;&lt;p&gt;　　杨荣山认为，苹果在这一过程中存在欺诈行为。&lt;/p&gt;&lt;p&gt;　　&lt;strong&gt;唯冠没有提出具体赔偿&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;　　针对网络上流传的100亿元索赔，杨荣山也做出回应。他表示，虽然唯冠现在存在财务危机，但我们现在还没有公开要求具体赔偿数字。&lt;/p&gt;&lt;p&gt;　　“我们现在是根据中国法律，维护权益。网络上流传的索赔100亿元，并不是唯冠的要求，那是专业人士的看法。”杨荣山表示。&lt;/p&gt;&lt;p&gt;　　他还表示，苹果确实把iPad做到尽善尽美，受到全球用户喜欢，但他们确实没有商标就进入中国，唯冠现在的行为就是为了维护权益。&lt;/p&gt;&lt;p&gt;　　他还表示，“很多人认为我们抢注商标，但实际上，iPad从1998年就伴着唯冠到今天。唯冠现在很委屈。”&lt;/p&gt;&lt;p&gt;　　他透露，唯冠正在寻求新的机会重新站起来，并表示现在已经有了重组计划和投资人。(罗亮)&lt;/p&gt;&lt;!-- publish_helper_end --&gt;&lt;!-- 分享到 begin --&gt;', '1', '唯冠召开iPad维权发布会：起诉苹果是维权', '唯冠召开iPad维权发布会：起诉苹果是维权', '唯冠召开iPad维权发布会：起诉苹果是维权', '0', '1', '0', '1329459262', '9');
INSERT INTO keke_witkey_article VALUES ('230', '203', '0', '匿名', '客户如何保障帐户安全', '客客', '', '&lt;div class=\"con clearfix\"&gt;网上交易，安全第一。&lt;br /&gt;&lt;br /&gt;大家都比较关心交易过程中的安全问题，而往往疏忽了第一道安全防线，哪就是自己的帐号密码！&nbsp;&lt;br /&gt;比较安全的密码至少应该符合下面的条件：&lt;br /&gt;&lt;br /&gt;1,组成部分：字母，数字，特殊字符。&lt;br /&gt;2,长度：密码的长度应该在6至18位之间。&lt;br /&gt;&lt;br /&gt;示例：&lt;br /&gt;&nbsp;just@1108556&lt;br /&gt;&nbsp;hellococo#38324&lt;br /&gt;&nbsp;3638&amp;heyjude&lt;br /&gt;&lt;br /&gt;如果您的密码符合以下条件，您的帐号现在正在面临安全威胁！&lt;br /&gt;&lt;br /&gt;1,密码中包含用户名。&lt;br /&gt;2,密码中包含简单的数字串（如12345）、字符串(如abcd,asdf)。&lt;br /&gt;3,密码中包含您常用的信息，如电话号码、生日、邮编、区号等。 &nbsp;&lt;/div&gt;', '0', '客户如何保障帐户安全', '客户如何保障帐户安全', '客户如何保障帐户安全', '0', '1', '0', '1329459615', '5');
INSERT INTO keke_witkey_article VALUES ('231', '17', '0', '', '提现公告申明', '', '', '&lt;span style=\"font-family:Verdana;\"&gt;提现打款申明：我们是在每周二统一处理对推手上周的提现。因为现在每周提现的推手人数较多，当天处理提现的时间将会受影响，届时将会延后继续处理推手的提现。对于推手提出已收到款，但后台的提现未处理问题，我们在这里作出以下说明，我们是在全部打完款之后，再进行统一处理。&lt;/span&gt;&lt;br /&gt;', '0', '', '', '', '0', '1', '0', '1329459594', '1');
INSERT INTO keke_witkey_article VALUES ('232', '17', '0', '', '关于推手抄袭他人作品交稿的处罚规定', '', '', '&lt;span style=\"font-family:Verdana;\"&gt;近来，网站接到举报，有推手通过抄袭他人作品来交稿，侵犯他人知识产权，严重违反了网站的规定。&lt;/span&gt;&lt;p&gt;&lt;span style=\"font-family:Verdana;\"&gt;&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 为此，网站对抄袭他人作品的，情节轻微的进行警告处理（抄袭稿件做废），情节严重的进行ID禁封处理。&lt;/span&gt;&lt;/p&gt;&lt;br /&gt;', '0', '', '', '', '0', '1', '0', '1329459681', '4');
INSERT INTO keke_witkey_article VALUES ('233', '358', '0', '新浪科技', '中国电信下周宣布引入iPhone 4S', '新浪科技', '', '&lt;p id=\"[object]\"&gt;新浪科技讯 2月17日消息，知情人士透露，中国电信&lt;a href=\"http://weibo.com/ct189?zw=tech\" target=\"_blank\" __sina1329459735968=\"7\"&gt;(微博)&lt;/a&gt;将于下周宣布引入iPhone 4S。届时，CDMA版iPhone 4S的价格和补贴政策将明了。&lt;/p&gt;&lt;p&gt;　　此前的1月中旬，中国联通&lt;a href=\"http://weibo.com/chinaunicom?zw=tech\" target=\"_blank\"&gt;(微博)&lt;/a&gt;率先引入了WCDMA版的iPhone 4S，但随后也传来了中国电信与苹果达成iPhone 4S的协议，目前，关于电信版iPhone 4S的资费等传言漫天飞，但其实很多具体情况将于下周揭晓。&lt;/p&gt;&lt;p&gt;　　而且，关于电信版iPhone 4S还有很多矛盾的说法，比如其到底是机卡分离的还是机卡一体的，这也需要中国电信自己来透露。&lt;/p&gt;', '0', '中国电信下周宣布引入iPhone 4S', '中国电信下周宣布引入iPhone 4S', '中国电信下周宣布引入iPhone 4S', '0', '1', '0', '1329459777', '4');
INSERT INTO keke_witkey_article VALUES ('234', '203', '0', '', '客服真实性验证', '', '', '请根据网站的联系电话致电本公司验证。&lt;br /&gt;', '0', '', '', '', '0', '1', '0', '1329459878', '2');
INSERT INTO keke_witkey_article VALUES ('235', '358', '0', '人民网', '国际权威组织称中国手机网速排全球倒数第二', '人民网', '', '&lt;p style=\"TEXT-ALIGN: justify; TEXT-INDENT: 30px; MARGIN: 0px 3px 15px\" align=\"justify\"&gt;继国内固网宽带被爆价格高、网速慢后，再有国际权威组织报告显示，国内手机互联网连接速度排在世界末端，仅比印度好。有分析显示，手机互联网速度慢制约了国内手机视频网站发展。&lt;/p&gt;&lt;p style=\"TEXT-ALIGN: justify; TEXT-INDENT: 30px; MARGIN: 0px 3px 15px\" align=\"justify\"&gt;根 据GSMA(全球移动通信协会)近日公布的报告，手机宽带连接速度最慢的两个国家分别是印度和中国。相反地、韩国、澳大利亚、新西兰等亚太地区和国家，手 机网速均较快。截至2010年，印度和中国平均连接速度分别仅为19 kbps和50 kpbs。而日本和韩国，平均速度已达1400 kbps。&lt;/p&gt;&lt;p style=\"TEXT-ALIGN: justify; TEXT-INDENT: 30px; MARGIN: 0px 3px 15px\" align=\"justify\"&gt;不 过由于中印两国手机互联网发展迅速，GSMA也给予乐观的估计。GSMA认为，按照现在的发展速度，到2015年，印度运营商的移动宽带平均速度将达到 1037 Kbps，中国可达到1384 Kbps。但这仍然大大落后于其他国家——因为届时韩国将达到4984 Kbps，澳大利亚和新西兰将达到5194 Kbps。&lt;/p&gt;&lt;p style=\"TEXT-ALIGN: justify; TEXT-INDENT: 30px; MARGIN: 0px 3px 15px\" align=\"justify\"&gt;对于GSMA的报告，有业内人士分析认为，中国2009年才发3G牌，3G用户人数直到2011年才出现突飞猛进。因此，GSMA的报告引用2010年的数据进行比较有失偏颇。&lt;/p&gt;&lt;p style=\"TEXT-ALIGN: justify; TEXT-INDENT: 30px; MARGIN: 0px 3px 15px\" align=\"justify\"&gt;“目前国内手机网速对手机视频业务影响最大。”国内某视频网站一高管向表示，国内手机视频网站发展缓慢，很大程度上源于手机上网速度普遍不快，而且资费价格相对高。因此，尽管手机视频业务普遍被视为“黄金业务”，但短期内仍难有重大突破。&lt;/p&gt;', '0', '国际权威组织称中国手机网速排全球倒数第二', '国际权威组织称中国手机网速排全球倒数第二', '国际权威组织称中国手机网速排全球倒数第二', '0', '1', '0', '1329460032', '2');
INSERT INTO keke_witkey_article VALUES ('236', '203', '0', '', '为什么采用“实名认证”？', '', '', '&lt;strong&gt;&lt;/strong&gt; 为确保所有用户的权益能得到有效保护，保障会员帐户资金的安全。用户在申请会员帐户资金提现时，为使你能及时、准确的收到汇款，我们采取了 实名认证措施，以防止冒领或密码遗失等意外原因而导致你的损失。&lt;br /&gt;', '0', '', '', '', '0', '1', '0', '1329460211', '2');
INSERT INTO keke_witkey_article VALUES ('237', '202', '0', '', '关于我们', '', '', '&lt;div class=\"textttitle\"&gt;&lt;span class=\"ttitle\"&gt;&lt;/span&gt;&lt;br /&gt;        &lt;/div&gt;        &lt;div class=\"ftdiv\"&gt;XXXX网是XXXXXX独家运营的网站平台，是中国最诚信、最专业的威客工作者在线工作平台，知识成果、创意产业成果征集（招标）交易平台。XXXXX本着让知识和财富快速流通、让时间和报酬等比交换的原则，致力于打造最具规范运营保障的知识成果、创意成果、劳务技能在线交易市场。凡是一切可数字化转换的劳动成果或服务都可在XXXXX网平台上完成交易。&lt;br /&gt;&lt;br /&gt;&lt;div align=\"left\"&gt;&nbsp;&nbsp;&nbsp;&nbsp;XXXXX从XXXX年X月成立以来，汇聚了来XXXXX等多个行业领域的上百万专业工作者会员，他们凭借自己的专业知识、成果创作、服务技能活跃在XXXX，为满足企业、单位或个人的各种成果需求提供更多更好的解决方案。&lt;br /&gt;&lt;br /&gt;&nbsp;&nbsp;&nbsp;XXXXX没有任何门槛，只要您有能力、知识和创意智慧，都能在XXXXXXX的平台上充分体现价值；把您的富裕时间和劳动成果进行交易，拓展您的工作方式和报酬获得渠道，是让您充分发挥潜力、展示才华、让您成功的地方！&lt;br /&gt;&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 信誉至上、诚信为本、服务用户、保障权益是我们的运营宗旨，真正为您营造一个公平、公正、公开的威客服务平台，全力缔造互联网社会工作方式的革命。&lt;br /&gt;&lt;br /&gt;&lt;/div&gt;&lt;p&gt;&nbsp;&nbsp;&nbsp;&nbsp; xxxx方指定网址：&lt;/p&gt;&lt;/div&gt;&lt;br /&gt;', '0', '', '', '', '0', '1', '0', '1329460359', '3');
INSERT INTO keke_witkey_article VALUES ('238', '5', '0', '新京报', '威客国内人数超3000万：部分欺诈行为仍难控制', '新京报', '', '&lt;h1 id=\"artibodyTitle\" fid=\"1554\" did=\"11352678\" tid=\"1\" pid=\"31\"&gt;&lt;p&gt;&lt;span style=\"font-family:KaiTi_GB2312, KaiTi;\"&gt;&lt;/span&gt;&lt;h1 id=\"artibodyTitle\" fid=\"1554\" did=\"11319103\" tid=\"1\" pid=\"31\"&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　目前大多威客会通过各种威客网站来寻找任务，完成交易。有些热门行业竞争激烈，一开始未必能够中标，准备做威客要多学习并有自己的专项技能。&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　威客，一般指那些通过互联网把自己的知识、智慧、经验、技能转换成实际收益的人。这一概念最早于2005年出现，后来经过媒体的宣传报道，威客群体不断发展壮大，国内人数如今已经超过3000万。&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　而且由于威客与网络息息相关，工作形式灵活自由，所以备受年轻人的青睐，更有机构在去年将威客评为“90后”最为推崇的十大时尚职业之一。有专家以及资深威客提醒，虽然现在专职做威客的人越来越多，但兼职仍然是主流。专职做威客挑战较大，需谨慎。兼职做威客也需调整好与本职工作的关系。&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　IT、设计、网站建设、网络营销等任务最热门&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　威客(witkey)模式即人的知识、智慧、经验、技能通过互联网转换成实际收益的互联网新模式。主要应用包括解决科学、技术、工作、生活、学习等领域的问题，体现了互联网按劳取酬和以人为中心的新理念。这一理论最早由国人刘锋于2005年提出。&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　“其实，威客最初的定义并不算一项职业，只算是一种互联网现象，但渐渐地互联网帮助‘回答问题’成为一种职业。”威客理论首创者、威客网创始人刘锋解释，“威客的产生就是鼓励知识是值钱的：知识和技能越多，财富才会越多。”&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　记者了解到，目前大多威客会通过各种威客网站来寻找任务，完成交易。而任务的门类则会有几百项之多，除了设计、建筑、法律、翻译等较专业的任务外，还有如爱情表白、道歉短信、捧场、排队、宝宝取名等非常生活化的任务。&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　据国内最大的威客网站猪八戒网&lt;a href=\"http://weibo.com/zhubajiewang?zw=finance\" target=\"_blank\"&gt;(微博)&lt;/a&gt;副总裁刘川郁介绍，目前IT、设计、网站建设、网络营销等门类的任务是最热门的。威客寻找任务的方式一般有两种，现在较多的是客户发布悬赏任务，威客拿出自己的方案来竞标，另一种是一对一速配，客户直接寻找威客来完成任务。&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　好的威客要有独当一面的专业技能&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　“威客工作的最大优点是公平：在这里没有人会去看一个人的学历、毕业于什么学校、家庭背景等等，威客凭的是真刀真枪的实干能力。而且随着电子商务不断向服务业发展，威客的发展前景将会很好。”刘川郁指出，“现在大部分的威客仍然是兼职，但也呈现出专职威客越来越多的趋势。有的威客有了一定的知名度之后，还会成立自己的工作室或者建立公司，进行创业。而从年龄段来讲，80后、90后的威客占大多数，超过了60%。”&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　高旭是河南建筑职业技术学院的一名大三学生，去年3月份他开始利用课余时间做威客，主要完成一些网络营销的任务，如帮人发广告信息等等。“刚开始做时比较难，有时一天就挣几毛钱、几块钱，后来慢慢开发出市场之后，平均一天能挣50块钱。但网络营销门槛低，竞争比较激烈，现在也不太好做。”高旭坦言，作为学生，难的任务做不好，简单的任务又没前途，威客也不是那么好当的。&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　“一名好的威客一定要有某方面的专业技能，能够独当一面。”向阳生涯管理咨询集团首席职业规划师洪向阳指出，“从综合角度看，威客还需要具有项目管理的能力、时间管理的能力、与客户的沟通能力。同时，还需要一定的自我约束能力。”&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　威客要有满足客户需求的能力&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　资深威客刘羽也认为，做威客需要耐心，尤其专职威客很可能会天天对着电脑工作，不能三天打鱼两天晒网。几年前从事平面广告设计工作的刘羽兼职做威客，后来他辞去工作成为专职威客，现在月收入基本稳定在两万多。他建议，刚做威客时要多收集、多研究别人的案例，可以从兼职做起，等到技术过硬、收入稳定之后，如有需要可以考虑专职来做。他同时表示，专职做威客肯定会有一定的压力。&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　“其实，我们网站注册的威客大概也就60%左右可以挣到钱，当然有些注册用户可能只是看，并没有真正参与。但确实有些威客在开始的几个月里是挣不到钱的。”刘川郁评价，“在这个平台上，威客要有能满足客户需求的能力。很多年轻人喜欢这个平台，因为一个人的能力在这里可以得到真正的检验。”&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　■ 威客说&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　兴趣为先并分辨行业的整体水平&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　●武烨，专职威客&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　以前我在一家事业单位上班，在上班之余做威客，主要做网页设计。刚开始做的时候我不知道自己是什么水平，也没有什么案例，只是做悬赏任务，幸运的是我交的第一个稿子就中标了。后来我做的东西逐渐被人们所认可，加上我喜欢自己支配时间，所以去年就辞职专职做威客了。&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　我觉得做威客首先要自己感兴趣，至少要能让自己在工作中得到满足，这样才能坚持下去。其次对行业的整体水平要有所分辨，不能妄自尊大。可以试着先做一做，如果自己的东西能被人认可，或者自己提高得很快，一次比一次完成得好，中标的把握越来越大，甚至有客户主动来找你，就可以考虑继续做下去。否则，就要想想自己是否真的适合威客的工作。&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　一些欺诈行为还没有好的机制去控制&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　●罗萌，兼职威客&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　两年前，我看到周围有人在做威客，我觉得好玩也兼职做起平面设计的威客。威客的能力要求和具体岗位的要求是差不多的，你必须要有某项特殊的技能。刚开始的时候我一个月的收入也就一千多，后来慢慢做好之后一个月可以挣到三四千。我现在一天大概做四、五个任务，不会觉得累。&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　我个人建议人们不要做专职威客，那样会很累。像平面设计的门槛并不高，竞争很激烈。要想挣得多一些，就要每天完成很多任务。当然有些行业可能完成任务的钱会多一些。有时能否中标不光靠实力，也要看运气好不好。&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　值得注意的是，做威客有时也会遇到欺诈行为，造成经济损失，但目前威客网站也还没有特别好的机制去控制。&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　■ 业内建议&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　线下交易隐患大保障少&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　●刘川郁，猪八戒网副总裁&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　现在的威客网站有很多，良莠不齐。如果想做威客一定要选择大的、知名的正规威客网站，这样才能获得更好的平台保障。如今部分威客还选择进行线下交易，这样隐患也很大，双方都得不到保障。&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　我认为虽然术业有专攻，但威客最好也不要把自己局限在很窄的范围内。在平台上，很多都是真实的案例，比如从设计来讲，你可以看到某家公司中标的标志，可以看看其他威客是怎样按照客户的要求来完成设计的，这些都是可以学习的。&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　最好能促进本职工作&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　●洪向阳，向阳生涯管理咨询集团首席职业规划师&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　目前来看，威客达到职业化的人并不是太多，大部分人还是把它当作一份兼职来做。我认为，以学习的、参与的态度来做威客是一个比较好的对待方式，尤其对很多年轻的学生和职场人来讲，这是一种很好的学习方式，参与进来也比较容易，而且自身的能力也可以得到检验。&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;　　但是兼职做威客一定要避免跟自己的本职工作有冲突，要调整好与本职工作的关系，毕竟一个人的精力是有限的。同时也要注意是否对本职工作会有促进作用，最好选择能给本职工作带来正面影响的兼职工作。&lt;/span&gt;&lt;/p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;&lt;br /&gt;&lt;/span&gt;&lt;/h1&gt;&lt;br /&gt;&lt;/p&gt;&lt;/h1&gt;', '0', '威客国内人数超3000万：部分欺诈行为仍难控制', '威客国内人数超3000万：部分欺诈行为仍难控制', '威客国内人数超3000万：部分欺诈行为仍难控制', '0', '1', '0', '1329460459', '4');

-- ----------------------------
-- Table structure for `keke_witkey_article_category`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_article_category`;
CREATE TABLE `keke_witkey_article_category` (
  `art_cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `art_cat_pid` int(11) DEFAULT '0',
  `cat_name` varchar(100) DEFAULT NULL,
  `listorder` int(11) DEFAULT '0',
  `is_show` int(11) DEFAULT '0',
  `on_time` int(11) DEFAULT '0',
  `cat_type` char(10) DEFAULT '0',
  `art_index` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`art_cat_id`),
  KEY `index_1` (`art_cat_id`),
  KEY `index_2` (`art_cat_pid`)
) ENGINE=MyISAM AUTO_INCREMENT=359 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_article_category
-- ----------------------------
INSERT INTO keke_witkey_article_category VALUES ('1', '0', '客客资讯', '10', '1', '1324978745', 'article', '{1}{1}');
INSERT INTO keke_witkey_article_category VALUES ('2', '1', '联系我们', '2', '1', '1324026539', 'article', '{1}{2}');
INSERT INTO keke_witkey_article_category VALUES ('5', '1', '行业动态', '1', '1', '1274101606', 'article', '{1}{5}');
INSERT INTO keke_witkey_article_category VALUES ('7', '1', '媒体报导', '1', '1', '1274101647', 'article', '{1}{7}');
INSERT INTO keke_witkey_article_category VALUES ('17', '1', '网站公告', '0', '1', '1278323605', 'article', '{1}{17}');
INSERT INTO keke_witkey_article_category VALUES ('200', '0', '单页', '0', '0', '0', '0', '{200}');
INSERT INTO keke_witkey_article_category VALUES ('202', '1', '关于我们', '1', '0', '1324952444', 'article', '{1}{202}');
INSERT INTO keke_witkey_article_category VALUES ('4', '1', '政策法规', '1', '1', '1274089497', 'article', '{1}{4}');
INSERT INTO keke_witkey_article_category VALUES ('203', '1', '安全交易', '0', '0', '1292658881', 'article', '{1}{203}');
INSERT INTO keke_witkey_article_category VALUES ('328', '290', '我是买家', '2', '0', '1323165361', 'help', '{100}{290}{328}');
INSERT INTO keke_witkey_article_category VALUES ('358', '1', '新闻列表', '1', '0', '1324264090', 'article', '{1}{358}');
INSERT INTO keke_witkey_article_category VALUES ('345', '294', '名词解答', '5', '0', '1325746402', 'help', '{100}{294}{345}');
INSERT INTO keke_witkey_article_category VALUES ('290', '100', '任务大厅', '2', '0', '1323157973', 'help', '{100}{290}');
INSERT INTO keke_witkey_article_category VALUES ('298', '294', '注册登陆', '1', '0', '1323158406', 'help', '{100}{294}{298}');
INSERT INTO keke_witkey_article_category VALUES ('300', '290', '任务中标', '2', '0', '1323158451', 'help', '{100}{290}{300}');
INSERT INTO keke_witkey_article_category VALUES ('304', '290', '雇佣任务', '6', '0', '1323158531', 'help', '{100}{290}{304}');
INSERT INTO keke_witkey_article_category VALUES ('291', '100', '威客商城', '3', '0', '1323157978', 'help', '{100}{291}');
INSERT INTO keke_witkey_article_category VALUES ('100', '0', '帮助中心', '3', '1', '1278556511', 'help', '{100}');
INSERT INTO keke_witkey_article_category VALUES ('310', '294', '相关认证', '1', '0', '1323158633', 'help', '{100}{294}{310}');
INSERT INTO keke_witkey_article_category VALUES ('316', '292', '推广注册', '1', '0', '1323158833', 'help', '{100}{292}{316}');
INSERT INTO keke_witkey_article_category VALUES ('329', '290', '我是服务商', '1', '0', '1323165371', 'help', '{100}{290}{329}');
INSERT INTO keke_witkey_article_category VALUES ('327', '294', '账号管理', '3', '0', '1323165351', 'help', '{100}{327}{294}');
INSERT INTO keke_witkey_article_category VALUES ('296', '294', '账号安全', '1', '0', '1323158348', 'help', '{100}{294}{296}');
INSERT INTO keke_witkey_article_category VALUES ('312', '294', '如何支付', '1', '0', '1323158707', 'help', '{100}{294}{312}');
INSERT INTO keke_witkey_article_category VALUES ('311', '294', '如何赚钱', '1', '0', '1323158698', 'help', '{100}{294}{311}');
INSERT INTO keke_witkey_article_category VALUES ('315', '292', '推广规则', '1', '0', '1323158822', 'help', '{100}{292}{315}');
INSERT INTO keke_witkey_article_category VALUES ('297', '294', '提现充值', '1', '0', '1323158368', 'help', '{100}{294}{297}');
INSERT INTO keke_witkey_article_category VALUES ('346', '294', '交易维权', '1', '0', '1324028081', 'help', '{100}{294}{346}');
INSERT INTO keke_witkey_article_category VALUES ('295', '289', '本站规则', '6', '0', '1323158308', 'help', '{100}{289}{295}');
INSERT INTO keke_witkey_article_category VALUES ('293', '100', '常见问题', '5', '0', '1323157990', 'help', '{100}{293}');
INSERT INTO keke_witkey_article_category VALUES ('294', '100', '新手上路', '1', '0', '1323157997', 'help', '{100}{294}');
INSERT INTO keke_witkey_article_category VALUES ('301', '290', '参与任务', '3', '0', '1323158461', 'help', '{100}{290}{301}');
INSERT INTO keke_witkey_article_category VALUES ('302', '290', '评价&等级', '4', '0', '1323158473', 'help', '{100}{290}{302}');
INSERT INTO keke_witkey_article_category VALUES ('303', '290', '任务问题', '5', '0', '1323158488', 'help', '{100}{290}{303}');
INSERT INTO keke_witkey_article_category VALUES ('305', '290', '悬赏任务', '7', '0', '1323158544', 'help', '{100}{290}{305}');
INSERT INTO keke_witkey_article_category VALUES ('306', '290', '招标任务', '8', '0', '1323158554', 'help', '{100}{290}{306}');
INSERT INTO keke_witkey_article_category VALUES ('307', '290', '线下交易', '9', '0', '1323158565', 'help', '{100}{290}{307}');
INSERT INTO keke_witkey_article_category VALUES ('308', '290', '任务选标', '10', '0', '1323158580', 'help', '{100}{290}{308}');
INSERT INTO keke_witkey_article_category VALUES ('309', '290', '支付汇款', '11', '0', '1323158589', 'help', '{100}{290}{309}');
INSERT INTO keke_witkey_article_category VALUES ('317', '292', '推广任务', '1', '0', '1323158840', 'help', '{100}{292}{317}');
INSERT INTO keke_witkey_article_category VALUES ('318', '292', '推广网站', '1', '0', '1323158848', 'help', '{100}{292}{318}');
INSERT INTO keke_witkey_article_category VALUES ('319', '293', '账号充值', '1', '0', '1323158882', 'help', '{100}{293}{319}');
INSERT INTO keke_witkey_article_category VALUES ('320', '271', '线上支付', '1', '0', '1323158894', 'help', '{100}{271}{320}');
INSERT INTO keke_witkey_article_category VALUES ('321', '271', '线下支付', '1', '0', '1323158902', 'help', '{100}{271}{321}');
INSERT INTO keke_witkey_article_category VALUES ('322', '271', '担保交易', '1', '0', '1323158916', 'help', '{100}{271}{322}');
INSERT INTO keke_witkey_article_category VALUES ('323', '291', '商城规则', '1', '0', '1323158935', 'help', '{100}{291}{323}');
INSERT INTO keke_witkey_article_category VALUES ('324', '291', '威客作品', '1', '0', '1323158964', 'help', '{100}{291}{324}');
INSERT INTO keke_witkey_article_category VALUES ('325', '291', '威客服务', '1', '0', '1323158974', 'help', '{100}{291}{325}');
INSERT INTO keke_witkey_article_category VALUES ('326', '293', '交易付款', '4', '0', '1323158986', 'help', '{100}{293}{326}');
INSERT INTO keke_witkey_article_category VALUES ('347', '294', '违规', '1', '0', '1324028127', 'help', '{100}{294}{347}');

-- ----------------------------
-- Table structure for `keke_witkey_auth_bank`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_auth_bank`;
CREATE TABLE `keke_witkey_auth_bank` (
  `bank_a_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(35) DEFAULT NULL,
  `bank_account` varchar(50) DEFAULT NULL,
  `bank_name` varchar(50) DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `deposit_area` varchar(100) DEFAULT NULL,
  `deposit_name` varchar(100) DEFAULT NULL,
  `pay_to_user_cash` decimal(10,2) DEFAULT '0.00',
  `user_get_cash` decimal(10,2) DEFAULT '0.00',
  `pay_time` int(11) DEFAULT NULL,
  `cash` decimal(10,2) DEFAULT NULL,
  `start_time` int(11) DEFAULT NULL,
  `end_time` int(11) DEFAULT NULL,
  `auth_status` int(11) DEFAULT NULL,
  `bank_sname` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`bank_a_id`),
  KEY `index_2` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_auth_bank
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_auth_email`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_auth_email`;
CREATE TABLE `keke_witkey_auth_email` (
  `email_a_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `cash` decimal(10,2) DEFAULT '0.00',
  `auth_time` int(11) DEFAULT NULL,
  `start_time` int(11) DEFAULT NULL,
  `end_time` int(11) DEFAULT NULL,
  `auth_status` int(1) DEFAULT NULL,
  PRIMARY KEY (`email_a_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_auth_email
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_auth_enterprise`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_auth_enterprise`;
CREATE TABLE `keke_witkey_auth_enterprise` (
  `enterprise_auth_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `licen_num` varchar(100) DEFAULT NULL,
  `licen_pic` varchar(100) DEFAULT NULL,
  `cash` decimal(10,2) DEFAULT '0.00',
  `start_time` int(11) DEFAULT NULL,
  `end_time` int(11) DEFAULT NULL,
  `auth_status` int(11) DEFAULT NULL,
  `legal` varchar(50) DEFAULT NULL,
  `staff_num` int(11) DEFAULT NULL,
  `run_years` int(11) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`enterprise_auth_id`),
  KEY `index_1` (`enterprise_auth_id`),
  KEY `index_2` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_auth_enterprise
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_auth_item`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_auth_item`;
CREATE TABLE `keke_witkey_auth_item` (
  `auth_code` char(20) NOT NULL,
  `auth_title` varchar(100) DEFAULT NULL,
  `auth_day` varchar(100) DEFAULT NULL,
  `auth_small_ico` varchar(100) DEFAULT NULL,
  `auth_small_n_ico` varchar(100) DEFAULT NULL,
  `auth_big_ico` varchar(100) DEFAULT NULL,
  `auth_desc` text,
  `auth_cash` decimal(10,2) DEFAULT '0.00',
  `auth_expir` int(11) DEFAULT NULL,
  `auth_open` int(11) DEFAULT NULL,
  `auth_show` int(11) DEFAULT NULL,
  `muti_auth` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `auth_dir` varchar(20) DEFAULT NULL,
  `listorder` int(11) DEFAULT NULL,
  `config` text,
  PRIMARY KEY (`auth_code`),
  KEY `index_2` (`update_time`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_auth_item
-- ----------------------------
INSERT INTO keke_witkey_auth_item VALUES ('email', '邮箱认证', '1-2', 'data/uploads/sys/auth/288714f3b0a610f12e.png?fid=2086', 'data/uploads/sys/auth/209984f3b0a5d75a91.png?fid=2085', 'data/uploads/sys/auth/12494f3b0a4e3f184.png?fid=2084', '<ul class=\"mt15\"><li><strong class=\"mr5\">邮箱地址登录</strong> 可直接使用“邮箱地址”登录到客客网</li><li><strong class=\"mr5\">重要事件提醒</strong> 进行（支付/提现/选稿/中标）时，可及时收到邮件提醒</li><li><strong>及时了解网站动态</strong><br /></li></ul>', '1.00', '0', '1', '0', '0', '1329269346', 'email', '3', 'a:6:{s:10:\"auth_title\";s:8:\"邮箱认证\";s:8:\"auth_day\";s:3:\"1-2\";s:9:\"auth_cash\";s:1:\"1\";s:10:\"auth_expir\";s:1:\"0\";s:9:\"auth_desc\";s:100:\"点击发送，系统将自动发送一封邮件到您的邮箱，请在24小时之内点击邮件里的链接进行邮箱验证（24之内有效）\";s:9:\"auth_open\";s:1:\"1\";}');
INSERT INTO keke_witkey_auth_item VALUES ('enterprise', '企业认证', '1-3', 'data/uploads/sys/auth/125234f3b0a2b64ffa.png?fid=2082', 'data/uploads/sys/auth/113224f3b0a2787aef.png?fid=2081', 'data/uploads/sys/auth/77524f3b0a381537a.png?fid=2083', '<ul><li>企业认证是一种身份的认证，更容易让您获得大单打造企业的信誉度<br /></li></ul>', '0.00', '0', '1', '0', null, '1329269306', 'enterprise', '2', null);
INSERT INTO keke_witkey_auth_item VALUES ('bank', '银行认证', '1-3', 'data/uploads/sys/auth/21944f3b0aa6ee63f.png?fid=2092', 'data/uploads/sys/auth/36134f3b0aa420af9.png?fid=2091', 'data/uploads/sys/auth/222604f3b0a950dbef.png?fid=2090', '银行认证到底', '1.00', '0', '1', '0', null, '1329269416', 'bank', '5', null);
INSERT INTO keke_witkey_auth_item VALUES ('mobile', '手机认证', '1-3', 'data/uploads/sys/auth/263574f3b0a76e2bd7.png?fid=2088', 'data/uploads/sys/auth/113084f3b0a7372e1d.png?fid=2087', 'data/uploads/sys/auth/114024f3b0a80619df.png?fid=2089', '<ul><li>企业认证是一种身份的认证，更容易让您获得大单</li><li>打造企业的信誉度<br /></li></ul>', '1.00', '0', '1', '0', '0', '1329269378', 'mobile', '4', null);
INSERT INTO keke_witkey_auth_item VALUES ('realname', '实名认证', '1-3', 'data/uploads/sys/auth/223734f3b09ff3b85d.png?fid=2080', 'data/uploads/sys/auth/226204f3b09f878636.png?fid=2079', 'data/uploads/sys/auth/61224f3b754fa45b2.png?fid=2170', '身份证认证', '0.00', '0', '1', '0', null, '1329296722', 'realname', '1', null);

-- ----------------------------
-- Table structure for `keke_witkey_auth_mobile`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_auth_mobile`;
CREATE TABLE `keke_witkey_auth_mobile` (
  `mobile_a_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `mobile` char(11) DEFAULT NULL,
  `valid_code` char(6) DEFAULT NULL,
  `cash` decimal(10,2) DEFAULT '0.00',
  `auth_status` tinyint(1) DEFAULT NULL,
  `auth_time` int(11) DEFAULT NULL,
  `end_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`mobile_a_id`),
  KEY `uid` (`uid`),
  KEY `mobile_a_id` (`mobile_a_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_auth_mobile
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_auth_realname`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_auth_realname`;
CREATE TABLE `keke_witkey_auth_realname` (
  `realname_a_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `realname` varchar(50) DEFAULT NULL,
  `id_card` varchar(50) DEFAULT NULL,
  `id_pic` varchar(100) DEFAULT NULL,
  `cash` decimal(10,2) DEFAULT '0.00',
  `start_time` int(11) DEFAULT NULL,
  `end_time` int(11) DEFAULT NULL,
  `auth_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`realname_a_id`),
  KEY `auth_status` (`auth_status`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_auth_realname
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_auth_record`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_auth_record`;
CREATE TABLE `keke_witkey_auth_record` (
  `record_id` int(11) NOT NULL AUTO_INCREMENT,
  `auth_code` char(20) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `end_time` int(11) DEFAULT NULL,
  `auth_status` int(11) DEFAULT NULL,
  `ext_data` text,
  PRIMARY KEY (`record_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_auth_record
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_auth_weibo`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_auth_weibo`;
CREATE TABLE `keke_witkey_auth_weibo` (
  `weibo_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `weibo_type` varchar(20) DEFAULT NULL,
  `account` varchar(50) DEFAULT NULL,
  `auth_status` int(11) DEFAULT NULL,
  `account_data` text,
  `on_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`weibo_id`),
  KEY `weibo_id` (`weibo_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_auth_weibo
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_basic_config`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_basic_config`;
CREATE TABLE `keke_witkey_basic_config` (
  `config_id` int(11) NOT NULL AUTO_INCREMENT,
  `k` char(20) DEFAULT NULL,
  `v` text,
  `type` char(20) DEFAULT NULL,
  `desc` text,
  `listorder` int(10) DEFAULT NULL,
  PRIMARY KEY (`config_id`),
  KEY `config_id` (`config_id`)
) ENGINE=MyISAM AUTO_INCREMENT=83 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_basic_config
-- ----------------------------
INSERT INTO keke_witkey_basic_config VALUES ('1', 'website_name', '客客出品专业威客系统', 'web', '0', '1');
INSERT INTO keke_witkey_basic_config VALUES ('2', 'website_title', 'KPPW', 'web', '0', '2');
INSERT INTO keke_witkey_basic_config VALUES ('3', 'website_url', 'http://localhost/k2', 'web', '0', '3');
INSERT INTO keke_witkey_basic_config VALUES ('4', 'install_path', '0', '0', '0', '4');
INSERT INTO keke_witkey_basic_config VALUES ('5', 'web_logo', 'logo.png', 'web', '0', '5');
INSERT INTO keke_witkey_basic_config VALUES ('6', 'seo_title', '客客出品专业威客系统', 'sys', '0', '6');
INSERT INTO keke_witkey_basic_config VALUES ('7', 'seo_keyword', '客客出品专业威客系统', 'sys', '0', '7');
INSERT INTO keke_witkey_basic_config VALUES ('8', 'seo_desc', '客客出品专业威客系统', 'sys', '0', '8');
INSERT INTO keke_witkey_basic_config VALUES ('9', 'company', '客客信息技术有限公司', 'web', '0', '9');
INSERT INTO keke_witkey_basic_config VALUES ('10', 'address', '湖北省武汉市', 'web', '0', '10');
INSERT INTO keke_witkey_basic_config VALUES ('11', 'phone', '027-88776968', 'web', '0', '11');
INSERT INTO keke_witkey_basic_config VALUES ('12', 'kf_phone', '027-88665355', 'web', '0', '12');
INSERT INTO keke_witkey_basic_config VALUES ('13', 'postcode', '430001', 'web', '0', '13');
INSERT INTO keke_witkey_basic_config VALUES ('14', 'filing', '鄂B2-20080005', 'web', '0', '14');
INSERT INTO keke_witkey_basic_config VALUES ('15', 'is_close', '2', 'web', '0', '15');
INSERT INTO keke_witkey_basic_config VALUES ('16', 'close_reason', '<b>暂时关闭。。。。33333333333</b>', 'web', '0', '16');
INSERT INTO keke_witkey_basic_config VALUES ('17', 'stats_code', '第三方统计代码', 'web', '0', '17');
INSERT INTO keke_witkey_basic_config VALUES ('18', 'max_size', '4', 'sys', '0', '18');
INSERT INTO keke_witkey_basic_config VALUES ('19', 'file_type', 'doc|docx|xls|ppt|wps|zip|rar|txt|jpg|jpeg|gif|bmp|swf|png', 'sys', '0', '19');
INSERT INTO keke_witkey_basic_config VALUES ('20', 'ban_users', 'admin|胡哥|亚麻跌', 'sys', '0', '20');
INSERT INTO keke_witkey_basic_config VALUES ('21', 'ban_content', '胡萝卜|太上黄', 'sys', '0', '21');
INSERT INTO keke_witkey_basic_config VALUES ('22', 'reg_limit', '0', 'sys', '0', '22');
INSERT INTO keke_witkey_basic_config VALUES ('24', 'mail_server_cat', 'smtp', 'mail', '0', '24');
INSERT INTO keke_witkey_basic_config VALUES ('25', 'mail_server_port', '25', 'mail', '0', '25');
INSERT INTO keke_witkey_basic_config VALUES ('26', 'mail_ssl', '2', 'mail', '0', '26');
INSERT INTO keke_witkey_basic_config VALUES ('27', 'smtp_url', 'smtp.qq.com', 'mail', '0', '27');
INSERT INTO keke_witkey_basic_config VALUES ('28', 'post_account', '', 'mail', '0', '28');
INSERT INTO keke_witkey_basic_config VALUES ('29', 'account_pwd', '', 'mail', '0', '29');
INSERT INTO keke_witkey_basic_config VALUES ('30', 'mail_replay', '', 'mail', '0', '30');
INSERT INTO keke_witkey_basic_config VALUES ('31', 'mail_charset', 'utf-8', 'mail', '0', '31');
INSERT INTO keke_witkey_basic_config VALUES ('32', 'credit_is_allow', '2', 'sys', '0', '32');
INSERT INTO keke_witkey_basic_config VALUES ('33', 'user_intergration', '1', '0', '0', '33');
INSERT INTO keke_witkey_basic_config VALUES ('34', 'is_rewrite', '0', 'sys', '0', '34');
INSERT INTO keke_witkey_basic_config VALUES ('35', 'mark_start_status', '1', '0', '0', '35');
INSERT INTO keke_witkey_basic_config VALUES ('36', 'auto_mark_time', '3', '0', '0', '36');
INSERT INTO keke_witkey_basic_config VALUES ('37', 'auto_mark_status', '1', '0', '0', '37');
INSERT INTO keke_witkey_basic_config VALUES ('38', 'credit_rename', '元宝', 'sys', '0', '38');
INSERT INTO keke_witkey_basic_config VALUES ('39', 'exp_rename', '荣誉', '0', '0', '39');
INSERT INTO keke_witkey_basic_config VALUES ('44', 'qq_app_id', null, 'interface', 'QQ登入appid', '44');
INSERT INTO keke_witkey_basic_config VALUES ('45', 'qq_app_secret', null, 'interface', 'QQ登录appSecret', '45');
INSERT INTO keke_witkey_basic_config VALUES ('48', 'taobao_app_id', null, 'interface', '淘宝登入appid', '48');
INSERT INTO keke_witkey_basic_config VALUES ('49', 'taobao_app_secret', null, 'interface', '淘宝登入secret', '49');
INSERT INTO keke_witkey_basic_config VALUES ('50', 'allow_reg_action', '0', 'sys', '0', '50');
INSERT INTO keke_witkey_basic_config VALUES ('64', 'mobile_password', null, 'mobile', '', '0');
INSERT INTO keke_witkey_basic_config VALUES ('63', 'mobile_username', null, 'mobile', '', '0');
INSERT INTO keke_witkey_basic_config VALUES ('62', 'oauth_api_open', '', 'oauth_api', null, '62');
INSERT INTO keke_witkey_basic_config VALUES ('54', 'sina_app_id', null, 'weibo', '新浪登入appid', '54');
INSERT INTO keke_witkey_basic_config VALUES ('55', 'sina_app_secret', null, 'weibo', '新浪登入secret', '55');
INSERT INTO keke_witkey_basic_config VALUES ('56', 'sohu_app_id', null, 'weibo', '搜狐登入appid', '56');
INSERT INTO keke_witkey_basic_config VALUES ('57', 'sohu_app_secret', null, 'weibo', '搜狐登入secret', '57');
INSERT INTO keke_witkey_basic_config VALUES ('58', 'netease_app_id', null, 'weibo', '网易登入appid', '58');
INSERT INTO keke_witkey_basic_config VALUES ('59', 'netease_app_secret', null, 'weibo', '网易登入secret', '59');
INSERT INTO keke_witkey_basic_config VALUES ('60', 'ten_app_id', null, 'weibo', '腾讯登入appid', '60');
INSERT INTO keke_witkey_basic_config VALUES ('61', 'ten_app_secret', null, 'weibo', '腾讯登入secret', '61');
INSERT INTO keke_witkey_basic_config VALUES ('65', 'alipay_app_id', null, 'interface', '支付宝登录app_id', null);
INSERT INTO keke_witkey_basic_config VALUES ('66', 'alipay_app_secret', null, 'interface', '支付宝登录app_secret', null);
INSERT INTO keke_witkey_basic_config VALUES ('78', 'attent_api_open', '', 'attent_api', null, null);
INSERT INTO keke_witkey_basic_config VALUES ('67', 'keke_id', null, 'union', '联盟ID', null);
INSERT INTO keke_witkey_basic_config VALUES ('68', 'keke_secret', null, 'union', '联盟通信key', null);
INSERT INTO keke_witkey_basic_config VALUES ('69', 'copyright', 'KPPW 2.0 Copyright &#169; 2009 -2011 kekezu. All rights reserved', null, '网站版权', null);
INSERT INTO keke_witkey_basic_config VALUES ('70', 'prom_open', '1', 'prom', '推广开关', null);
INSERT INTO keke_witkey_basic_config VALUES ('71', 'prom_period', '20', 'prom', '推广有效期', null);
INSERT INTO keke_witkey_basic_config VALUES ('74', 'sina_attent', null, 'attention', '新浪微博', '74');
INSERT INTO keke_witkey_basic_config VALUES ('75', 'ten_attent', null, 'attention', '腾讯微博', '75');
INSERT INTO keke_witkey_basic_config VALUES ('76', 'netease_attent', null, 'attention', '网易微博', '76');
INSERT INTO keke_witkey_basic_config VALUES ('77', 'sohu_attent', null, 'attention', '搜狐微博', '77');
INSERT INTO keke_witkey_basic_config VALUES ('79', 'google_api', null, 'map', '谷歌地图', '79');
INSERT INTO keke_witkey_basic_config VALUES ('80', 'baidu_api', null, 'map', '百度地图', '80');
INSERT INTO keke_witkey_basic_config VALUES ('81', 'map_api_open', 'a:1:{s:9:\"baidu_api\";i:0;}', 'map_api', null, '81');
INSERT INTO keke_witkey_basic_config VALUES ('82', 'info_static', 'article', 'static', '静态化配置', '82');

-- ----------------------------
-- Table structure for `keke_witkey_case`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_case`;
CREATE TABLE `keke_witkey_case` (
  `case_id` int(11) NOT NULL AUTO_INCREMENT,
  `obj_id` int(11) DEFAULT NULL,
  `obj_type` varchar(20) DEFAULT NULL,
  `case_img` varchar(150) DEFAULT NULL,
  `case_title` varchar(50) DEFAULT NULL,
  `case_desc` varchar(500) DEFAULT NULL,
  `case_price` decimal(10,2) DEFAULT '0.00',
  `case_auther` varchar(20) DEFAULT NULL,
  `on_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`case_id`),
  KEY `case_id` (`case_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_case
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_comment`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_comment`;
CREATE TABLE `keke_witkey_comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `obj_id` int(11) DEFAULT '0',
  `origin_id` int(11) DEFAULT '0',
  `obj_type` char(20) DEFAULT NULL,
  `p_id` int(11) DEFAULT '0',
  `uid` int(11) DEFAULT '0',
  `username` varchar(50) DEFAULT NULL,
  `content` text,
  `on_time` int(11) DEFAULT '0',
  `status` int(11) DEFAULT '0',
  PRIMARY KEY (`comment_id`),
  KEY `index_1` (`comment_id`),
  KEY `index_2` (`obj_id`),
  KEY `index_3` (`p_id`),
  KEY `index_4` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_comment
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_favorite`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_favorite`;
CREATE TABLE `keke_witkey_favorite` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `keep_type` char(20) DEFAULT NULL,
  `obj_type` char(20) DEFAULT NULL,
  `origin_id` int(11) DEFAULT NULL,
  `obj_id` int(11) DEFAULT NULL,
  `obj_name` varchar(100) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `on_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`f_id`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_favorite
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_feed`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_feed`;
CREATE TABLE `keke_witkey_feed` (
  `feed_id` int(11) NOT NULL AUTO_INCREMENT,
  `obj_id` int(11) DEFAULT '0',
  `obj_link` varchar(100) DEFAULT NULL,
  `feedtype` varchar(20) DEFAULT NULL,
  `uid` int(11) DEFAULT '0',
  `username` varchar(50) DEFAULT NULL,
  `icon` char(10) DEFAULT '0',
  `title` text,
  `feed_desc` text,
  `feed_pic` varchar(100) DEFAULT NULL,
  `feed_time` int(11) DEFAULT '0',
  `ext_data` text,
  PRIMARY KEY (`feed_id`),
  KEY `index_2` (`obj_id`),
  KEY `index_3` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_feed
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_field`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_field`;
CREATE TABLE `keke_witkey_field` (
  `field_id` int(11) NOT NULL AUTO_INCREMENT,
  `field_type` varchar(20) DEFAULT NULL,
  `field_name` varchar(50) DEFAULT NULL,
  `field_items` text,
  `field_table` varchar(50) DEFAULT NULL,
  `field_description` varchar(200) DEFAULT NULL,
  `valid` varchar(100) DEFAULT NULL,
  `valid_require` int(11) DEFAULT NULL,
  `valid_min` int(11) DEFAULT '0',
  `valid_max` int(11) DEFAULT '0',
  `valid_type` varchar(200) DEFAULT NULL,
  `field_errordesc` varchar(200) DEFAULT NULL,
  `listorder` int(11) DEFAULT NULL,
  `dateline` int(11) DEFAULT NULL,
  PRIMARY KEY (`field_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_field
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_fielddata`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_fielddata`;
CREATE TABLE `keke_witkey_fielddata` (
  `data_id` int(11) NOT NULL AUTO_INCREMENT,
  `field_id` int(11) DEFAULT NULL,
  `obj_id` int(11) DEFAULT NULL,
  `obj_type` varchar(20) DEFAULT NULL,
  `data_value` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`data_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_fielddata
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_file`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_file`;
CREATE TABLE `keke_witkey_file` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT,
  `obj_type` varchar(20) DEFAULT NULL,
  `obj_id` int(20) DEFAULT NULL,
  `task_id` int(11) DEFAULT '0',
  `work_id` int(11) DEFAULT NULL,
  `task_title` varchar(200) DEFAULT NULL,
  `file_name` varchar(200) DEFAULT NULL,
  `save_name` varchar(200) DEFAULT NULL,
  `uid` int(11) DEFAULT '0',
  `username` varchar(50) DEFAULT NULL,
  `on_time` int(11) DEFAULT '0',
  PRIMARY KEY (`file_id`),
  KEY `index_3` (`task_id`),
  KEY `index_4` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_file
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_finance`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_finance`;
CREATE TABLE `keke_witkey_finance` (
  `fina_id` int(11) NOT NULL AUTO_INCREMENT,
  `fina_type` char(10) DEFAULT '0',
  `fina_action` char(20) DEFAULT NULL,
  `order_id` int(11) DEFAULT '0',
  `uid` int(11) DEFAULT '0',
  `username` varchar(50) DEFAULT NULL,
  `obj_type` char(20) DEFAULT NULL,
  `obj_id` int(10) DEFAULT NULL,
  `fina_cash` decimal(10,2) DEFAULT '0.00',
  `user_balance` decimal(10,2) DEFAULT '0.00',
  `fina_credit` decimal(10,2) DEFAULT NULL,
  `user_credit` decimal(10,2) DEFAULT NULL,
  `fina_source` char(20) DEFAULT NULL,
  `fina_time` int(11) DEFAULT '0',
  `recharge_cash` decimal(10,2) DEFAULT NULL,
  `site_profit` decimal(10,2) DEFAULT NULL,
  `unique_num` char(10) DEFAULT NULL,
  `is_trust` int(1) DEFAULT '0',
  `trust_type` char(20) DEFAULT NULL,
  PRIMARY KEY (`fina_id`),
  KEY `index_1` (`fina_id`),
  KEY `index_2` (`order_id`),
  KEY `index_3` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_finance
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_industry`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_industry`;
CREATE TABLE `keke_witkey_industry` (
  `indus_id` int(11) NOT NULL AUTO_INCREMENT,
  `indus_pid` int(11) DEFAULT '0',
  `indus_name` varchar(100) DEFAULT NULL,
  `is_recommend` int(11) DEFAULT NULL,
  `indus_type` int(11) DEFAULT '1',
  `listorder` int(11) DEFAULT '0',
  `on_time` int(11) DEFAULT '0',
  `list_type` varchar(20) DEFAULT NULL,
  `list_tpl` varchar(20) DEFAULT NULL,
  `indus_intro` varchar(200) DEFAULT NULL,
  `list_desc` text,
  PRIMARY KEY (`indus_id`),
  KEY `indus_id` (`indus_id`),
  KEY `indus_pid` (`indus_pid`)
) ENGINE=MyISAM AUTO_INCREMENT=377 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_industry
-- ----------------------------
INSERT INTO keke_witkey_industry VALUES ('1', '0', '品牌设计', '0', '1', '1', '1332569948', '0', '0', '', '0');
INSERT INTO keke_witkey_industry VALUES ('2', '0', '网站开发', '0', '1', '3', '1332569953', '0', '0', '', '0');
INSERT INTO keke_witkey_industry VALUES ('3', '0', '文案写作', '0', '1', '16', '1332569944', '0', '0', '', '0');
INSERT INTO keke_witkey_industry VALUES ('229', '218', 'Palm插件', '0', '1', '9', '1292554457', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('228', '218', '黑莓插件', '0', '1', '6', '1292554432', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('8', '1', '标志设计', '1', '1', '0', '1324288313', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('9', '1', 'VI设计', '1', '1', '0', '1324288332', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('10', '1', '名片设计', '1', '1', '0', '1324288376', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('11', '1', '海报设计', '0', '1', '0', '1324288546', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('12', '2', '宣传册页', '0', '1', '0', '1324288827', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('13', '1', '卡通设计', '0', '1', '0', '1324086640', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('14', '1', '招牌设计', '0', '1', '0', '1324288851', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('16', '1', '横幅设计', '0', '1', '0', '1324086655', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('121', '0', '软件开发', '0', '1', '4', '1332569956', '0', '0', '', '0');
INSERT INTO keke_witkey_industry VALUES ('26', '2', '网站开发', '0', '1', '0', '1326079168', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('27', '2', '网站美工', '0', '1', '0', '1292549118', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('28', '2', '网站模板', '0', '1', '0', '1292549137', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('29', '2', '开源修改', '0', '1', '32', '1326087725', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('30', '2', '网站广告', '0', '1', '0', '1292549182', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('31', '2', '网页动画', '1', '1', '0', '1292549199', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('32', '2', '商城开发', '1', '1', '0', '1292549217', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('33', '2', '数据库操作', '1', '1', '30', '1292549237', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('34', '2', '接口操作', '1', '1', '0', '1292549255', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('35', '2', '服务器系统', '1', '1', '31', '1292549279', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('36', '121', '程序开发', '1', '1', '0', '1292549438', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('37', '121', '编写脚本', '1', '1', '0', '1292549500', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('38', '121', '软件皮肤', '1', '1', '0', '1292549533', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('39', '121', '插件开发', '1', '1', '0', '1292549558', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('40', '2', '其它', '1', '1', '100', '0', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('41', '3', '宣传软文', '1', '1', '0', '1292551396', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('42', '3', '广告语写作', '1', '1', '0', '1292551430', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('43', '3', '策划', '1', '1', '0', '1292551453', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('44', '3', '写文章', '1', '1', '0', '1292551482', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('45', '3', '编辑校对', '1', '1', '0', '1292551502', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('46', '3', '写新闻', '0', '1', '0', '1292551528', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('47', '3', '产品说明', '0', '1', '0', '1292551569', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('48', '3', '剧本脚本', '0', '1', '0', '1292551594', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('49', '3', '写书', '0', '1', '0', '1292551633', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('50', '3', '撰写报告', '0', '1', '0', '1292551666', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('51', '3', '应用文写作', '0', '1', '0', '1292551705', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('52', '3', '演讲稿', '0', '1', '0', '1292551734', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('169', '167', 'FLASH', '0', '1', '1', '1326087790', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('167', '0', '多媒体设计', '1', '1', '11', '1326256844', '0', '0', '', '0');
INSERT INTO keke_witkey_industry VALUES ('57', '3', '其它', '0', '1', '0', '0', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('227', '218', 'Windows mobile插件', '0', '1', '5', '1292554412', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('226', '218', 'PalmOS插件', '0', '1', '30', '1292554374', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('225', '218', 'Symbian SDK插件', '0', '1', '2', '1292554348', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('223', '218', 'iOS插件', '0', '1', '3', '1292554295', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('222', '218', 'Android插件', '0', '1', '1', '1292554274', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('336', '335', '新房装修', '1', '1', '1', '1326088071', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('219', '218', '天翼插件', '0', '1', '4', '1292554146', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('218', '0', '移动应用', '0', '1', '30', '1292556202', '0', '0', '', '0');
INSERT INTO keke_witkey_industry VALUES ('217', '211', '问卷调查', '0', '1', '0', '1292554039', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('216', '211', '意见建议', '0', '1', '0', '1292553967', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('215', '211', '写评论', '0', '1', '0', '1292553942', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('214', '211', '征集创意', '0', '1', '0', '1292553913', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('213', '211', '收集金点子', '0', '1', '0', '1292553863', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('212', '211', '策划', '0', '1', '0', '1292553842', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('211', '0', '头脑风暴', '1', '1', '18', '1326259260', '0', '0', '', '0');
INSERT INTO keke_witkey_industry VALUES ('236', '234', '法律咨询', '0', '1', '0', '1292554638', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('235', '234', '聘请律师', '0', '1', '0', '1292554609', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('234', '0', '法律服务', '0', '1', '19', '1292556230', '0', '0', '', '0');
INSERT INTO keke_witkey_industry VALUES ('233', '218', '手机应用汉化', '0', '1', '13', '1292554545', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('232', '218', '手机应用创意', '0', '1', '11', '1292554522', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('231', '218', '手机游戏开发', '0', '1', '8', '1292554501', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('230', '218', 'Amazon kindle插件', '0', '1', '7', '1292554478', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('96', '249', '网游创意', '1', '1', '0', '1326091312', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('122', '121', '软件测试', '0', '1', '0', '1292549609', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('123', '121', '游戏开发', '0', '1', '0', '1292549642', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('125', '125', '包装设计', '0', '1', '0', '1324288915', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('126', '126', '封面设计', '0', '1', '0', '1324288992', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('127', '127', '卡片设计', '0', '1', '2', '1324289089', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('128', '128', '图片编辑', '0', '1', '0', '1324289111', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('129', '129', '产品外观', '0', '1', '0', '1324289132', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('130', '1', '字体设计', '0', '1', '1', '1326078327', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('131', '1', '贺卡设计', '0', '1', '2', '1326078338', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('132', '1', '礼品设计', '0', '1', '3', '1326078346', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('133', '1', 'QQ表情', '0', '1', '22', '1292549906', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('134', '1', '四格漫画', '0', '1', '4', '1326078355', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('135', '1', '动漫设计', '0', '1', '5', '1326078363', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('136', '1', '排版设计', '0', '1', '6', '1326078371', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('137', '1', '服饰设计', '0', '1', '7', '1326078379', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('138', '1', 'ppt设计', '0', '1', '100', '1326078722', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('139', '1', 'T恤设计', '0', '1', '0', '1292550094', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('140', '1', '台历设计', '0', '1', '8', '1326078388', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('141', '1', '插图艺术', '0', '1', '0', '1292550202', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('142', '1', '电路设计', '0', '1', '0', '1292550225', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('143', '1', '文具设计', '0', '1', '0', '1292550247', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('144', '1', '工业设计', '0', '1', '0', '1292550272', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('145', '1', '按钮图标', '0', '1', '0', '1292550300', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('147', '167', '店标设计', '0', '1', '8', '1292550405', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('148', '167', '店招设计', '0', '1', '4', '1292550489', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('149', '1', '房屋建筑设计', '0', '1', '200', '1292550886', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('150', '1', '家装设计', '0', '1', '0', '1292550918', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('151', '1', '展会设计', '0', '1', '0', '1292550942', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('152', '1', '办公装修', '0', '1', '0', '1292550977', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('153', '1', '园林景观', '0', '1', '0', '1292551003', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('154', '167', '网店取名', '0', '1', '5', '1292550671', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('155', '167', '网店模板', '0', '1', '6', '1292550700', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('156', '167', '数码摄影', '0', '1', '7', '1326091215', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('158', '1', '形象墙设计', '0', '1', '20', '1292550817', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('159', '1', '店面装修', '0', '1', '0', '1292550854', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('160', '0', '起名取名', '0', '1', '19', '1292556019', '0', '0', '', '0');
INSERT INTO keke_witkey_industry VALUES ('161', '160', '宝宝起名', '0', '1', '0', '1292551095', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('162', '160', '成人起名', '0', '1', '0', '1292551118', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('163', '160', '公司起名', '0', '1', '0', '1292551152', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('164', '160', '店铺起名', '0', '1', '0', '1292551193', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('165', '160', '品牌起名', '0', '1', '0', '1292551246', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('166', '160', '改名', '0', '1', '0', '1292551260', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('170', '167', '视频制作', '0', '1', '9', '1292552050', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('172', '167', '三维渲染', '0', '1', '11', '1292552099', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('175', '0', '网络营销', '1', '1', '30', '1326259251', '0', '0', '', '0');
INSERT INTO keke_witkey_industry VALUES ('177', '175', '搜索引擎优化', '0', '1', '0', '1292552302', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('178', '175', '论坛推广', '0', '1', '0', '1292552348', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('179', '175', 'QQ群推广', '0', '1', '0', '1292552376', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('180', '175', '博客推广', '0', '1', '0', '1292552410', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('181', '175', '推广注册', '0', '1', '0', '1292552445', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('182', '0', '翻译服务', '1', '1', '9', '1326256832', '0', '0', '', '0');
INSERT INTO keke_witkey_industry VALUES ('183', '182', '英语翻译', '0', '1', '1', '1292552549', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('184', '182', '日语翻译', '0', '1', '4', '1292552565', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('185', '182', '法语翻译', '0', '1', '3', '1292552583', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('186', '182', '韩语翻译', '0', '1', '2', '1292552604', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('187', '182', '西班牙语翻译', '0', '1', '5', '1292552632', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('188', '182', '意大利语翻译', '0', '1', '6', '1292552657', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('189', '182', '阿拉伯语翻译', '0', '1', '8', '1292552698', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('190', '182', '德语翻译', '0', '1', '7', '1292552726', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('191', '182', '俄语翻译', '0', '1', '9', '1292552760', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('192', '0', '生活服务', '0', '1', '25', '1292556114', '0', '0', '', '0');
INSERT INTO keke_witkey_industry VALUES ('193', '192', '市场调查', '0', '1', '0', '1292552891', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('194', '192', '心理咨询', '0', '1', '0', '1292552932', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('195', '192', '移民咨询', '0', '1', '0', '1292552957', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('196', '192', '理财咨询', '0', '1', '0', '1292553000', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('197', '192', '帮我投票', '0', '1', '0', '1292553035', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('198', '192', '跑腿排队', '0', '1', '0', '1292553065', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('199', '192', '家政服务', '0', '1', '0', '1292553095', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('200', '192', '数据导入', '0', '1', '0', '1292553126', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('201', '0', '创意祝福', '0', '1', '13', '1332569940', '0', '0', '', '0');
INSERT INTO keke_witkey_industry VALUES ('202', '201', '生日祝福', '0', '1', '2', '1292553296', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('203', '201', '爱情表白', '1', '1', '1', '1326080754', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('204', '201', '圣诞祝福', '0', '1', '3', '1292553343', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('205', '201', '新年祝福', '0', '1', '4', '1292553378', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('206', '201', '道歉短信', '0', '1', '9', '1292553406', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('207', '201', '纪念日祝福', '1', '1', '8', '1326080770', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('208', '201', '感恩回馈', '0', '1', '7', '1292553475', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('209', '201', '祝福喜得贵子', '0', '1', '5', '1292553507', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('210', '201', '祝福乔迁新居', '0', '1', '6', '1292553556', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('237', '234', '写法律合同', '0', '1', '0', '1292554661', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('238', '234', '写律师函', '0', '1', '0', '1292554683', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('239', '234', '写诉讼状', '0', '1', '0', '1292554712', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('240', '0', '招聘找人', '0', '1', '40', '1292556254', '0', '0', '', '0');
INSERT INTO keke_witkey_industry VALUES ('241', '240', '招聘', '0', '1', '0', '1292554785', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('242', '240', '求职', '0', '1', '0', '1292554817', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('243', '240', '寻人', '0', '1', '0', '1292554925', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('244', '243', '找对象', '0', '1', '0', '1292554951', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('245', '240', '找生产商', '0', '1', '0', '1292554973', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('246', '240', '找客户', '0', '1', '0', '1292554993', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('247', '240', '找供应商', '0', '1', '0', '1292555016', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('248', '240', '找人脉', '0', '1', '0', '1292555036', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('249', '0', '网游服务', '0', '1', '14', '1292556272', '0', '0', '', '0');
INSERT INTO keke_witkey_industry VALUES ('250', '249', '手机游戏', '0', '1', '0', '1292555192', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('251', '249', '游戏试玩', '0', '1', '0', '1292555216', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('252', '249', '评测报告', '0', '1', '0', '1292555239', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('253', '249', '版本设计', '0', '1', '0', '1292555270', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('254', '249', '剧情策划', '0', '1', '0', '1292555293', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('255', '249', '压力测试', '0', '1', '0', '1292555312', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('256', '249', '代写攻略', '0', '1', '0', '1292555335', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('257', '249', '活动策划', '0', '1', '0', '1292555359', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('258', '249', '补丁制作', '0', '1', '0', '1292555388', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('259', '249', '游戏视频', '0', '1', '0', '1292555405', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('290', '290', '新增加哈哈哈', '0', '1', '0', '1324261141', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('263', '1', '其他', '0', '1', '40', '1292555839', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('310', '26', 'php开发', null, '1', '1', '1325059180', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('323', '2', '网站推广', '1', '1', '0', '1326079286', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('324', '121', '软件汉化', '1', '1', '0', '1326079451', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('325', '121', '程序功能开发', '0', '1', '2', '1326079476', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('326', '121', '软件美工', '0', '1', '0', '1326079503', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('327', '121', '开发文档编写', '0', '1', '0', '1326079573', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('328', '121', '功能完善', '0', '1', '0', '1326079657', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('334', '240', '简历设计', '1', '1', '0', '1326087903', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('330', '201', '囍事送达', '0', '1', '0', '1326079936', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('331', '201', '彩信', '0', '1', '30', '1326079987', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('332', '249', '问卷调查', '0', '1', '0', '1326080222', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('337', '335', '二手房装修', '1', '1', '2', '1326088083', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('335', '0', '建筑/装修', '1', '1', '17', '1326088053', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('333', '182', '中文翻译', '1', '1', '15', '1326081016', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('338', '335', '风水咨询', '0', '1', '4', '1326088094', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('339', '335', '装修监理', '0', '1', '8', '1326088103', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('340', '335', '庭院景观设计', '0', '1', '3', '1326088114', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('341', '335', '办公商铺装修', '1', '1', '6', '1326088123', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('342', '335', '自建房设计', '0', '1', '10', '1326088131', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('343', '335', '景观设计', '0', '1', '12', '1326088142', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('344', '335', '3D模型设计', '0', '1', '14', '1326088150', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('348', '1', 'logo设计', null, '1', '0', '1329450844', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('349', '1', 'vi设计', null, '1', '0', '1329450844', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('350', '0', '照片美化/编辑', '1', '1', '18', '1329451426', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('351', '350', '艺术照处理', null, '1', '1', '1329451052', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('352', '350', '照片变卡通', null, '1', '2', '1329451052', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('353', '350', '电子相册', null, '1', '3', '1329451052', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('354', '350', '照片美化', null, '1', '4', '1329451052', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('355', '350', '婚纱照美化', null, '1', '5', '1329451052', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('356', '350', '图片编辑', null, '1', '6', '1329451052', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('357', '0', '影视/配音/歌词', '1', '1', '19', '1329451198', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('358', '357', '写剧本', null, '1', '1', '1329451335', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('359', '357', '影视制作', null, '1', '2', '1329451335', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('360', '357', '广告配音', null, '1', '3', '1329451335', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('361', '357', '影视配音', null, '1', '4', '1329451335', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('362', '357', '动画配音', null, '1', '5', '1329451335', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('363', '357', '彩铃配音', null, '1', '6', '1329451335', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('364', '357', '方言配音', null, '1', '7', '1329451335', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('365', '357', '外语配音', null, '1', '8', '1329451335', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('366', '357', '创意配音', null, '1', '9', '1329451335', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('367', '357', '歌词创作', null, '1', '10', '1329451335', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('368', '357', '歌词谱曲', null, '1', '11', '1329451335', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('370', '1', '游戏封面', null, '1', '0', '1330410030', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('376', '1', 'lee牛仔裤', '0', '1', '0', '1330411423', null, null, null, null);

-- ----------------------------
-- Table structure for `keke_witkey_link`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_link`;
CREATE TABLE `keke_witkey_link` (
  `link_id` int(11) NOT NULL AUTO_INCREMENT,
  `link_type` int(11) DEFAULT NULL,
  `link_name` varchar(100) DEFAULT NULL,
  `link_url` varchar(100) DEFAULT NULL,
  `link_pic` varchar(100) DEFAULT NULL,
  `listorder` int(11) DEFAULT NULL,
  `link_status` int(11) DEFAULT NULL,
  `on_time` int(11) DEFAULT NULL,
  `obj_type` char(20) DEFAULT NULL,
  `obj_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`link_id`),
  KEY `on_time` (`on_time`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_link
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_mark`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_mark`;
CREATE TABLE `keke_witkey_mark` (
  `mark_id` int(11) NOT NULL AUTO_INCREMENT,
  `model_code` char(20) DEFAULT '0',
  `origin_id` int(11) DEFAULT NULL,
  `obj_id` int(11) DEFAULT '0',
  `obj_cash` decimal(10,0) DEFAULT NULL,
  `mark_status` int(11) DEFAULT '0',
  `mark_content` text,
  `mark_time` int(11) DEFAULT '0',
  `uid` int(11) DEFAULT '0',
  `username` varchar(20) DEFAULT NULL,
  `mark_max_time` int(11) DEFAULT '0',
  `by_uid` int(11) DEFAULT '0',
  `by_username` varchar(20) DEFAULT NULL,
  `aid` varchar(50) DEFAULT NULL,
  `aid_star` varchar(50) DEFAULT NULL,
  `mark_value` decimal(10,2) DEFAULT '0.00',
  `mark_type` int(1) DEFAULT NULL,
  PRIMARY KEY (`mark_id`),
  KEY `index_3` (`uid`),
  KEY `index_4` (`obj_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_mark
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_mark_aid`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_mark_aid`;
CREATE TABLE `keke_witkey_mark_aid` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `aid_name` varchar(255) DEFAULT NULL,
  `aid_type` int(1) DEFAULT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_mark_aid
-- ----------------------------
INSERT INTO keke_witkey_mark_aid VALUES ('1', '工作速度', '2');
INSERT INTO keke_witkey_mark_aid VALUES ('2', '工作质量', '2');
INSERT INTO keke_witkey_mark_aid VALUES ('3', '工作态度', '2');
INSERT INTO keke_witkey_mark_aid VALUES ('4', '付款及时性', '1');
INSERT INTO keke_witkey_mark_aid VALUES ('5', '合作愉快度', '1');

-- ----------------------------
-- Table structure for `keke_witkey_mark_config`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_mark_config`;
CREATE TABLE `keke_witkey_mark_config` (
  `mark_config_id` int(11) NOT NULL AUTO_INCREMENT,
  `obj` char(20) DEFAULT NULL,
  `good` int(3) DEFAULT NULL,
  `normal` int(3) DEFAULT NULL,
  `bad` int(3) DEFAULT NULL,
  `type` int(1) DEFAULT NULL,
  PRIMARY KEY (`mark_config_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_mark_config
-- ----------------------------
INSERT INTO keke_witkey_mark_config VALUES ('2', 'sreward', '100', '50', '0', '2');
INSERT INTO keke_witkey_mark_config VALUES ('3', 'mreward', '100', '50', '0', '1');
INSERT INTO keke_witkey_mark_config VALUES ('4', 'mreward', '100', '50', '0', '2');
INSERT INTO keke_witkey_mark_config VALUES ('5', 'preward', '100', '50', '0', '2');
INSERT INTO keke_witkey_mark_config VALUES ('6', 'preward', '100', '50', '0', '1');
INSERT INTO keke_witkey_mark_config VALUES ('7', 'dtender', '100', '50', '0', '2');
INSERT INTO keke_witkey_mark_config VALUES ('8', 'dtender', '100', '50', '1', '1');
INSERT INTO keke_witkey_mark_config VALUES ('9', 'tender', '100', '50', '0', '2');
INSERT INTO keke_witkey_mark_config VALUES ('10', 'tender', '100', '50', '0', '1');
INSERT INTO keke_witkey_mark_config VALUES ('11', 'goods', '100', '50', '0', '1');
INSERT INTO keke_witkey_mark_config VALUES ('12', 'goods', '100', '50', '0', '2');
INSERT INTO keke_witkey_mark_config VALUES ('13', 'service', '100', '50', '0', '1');
INSERT INTO keke_witkey_mark_config VALUES ('14', 'service', '100', '50', '0', '2');
INSERT INTO keke_witkey_mark_config VALUES ('1', 'sreward', '100', '50', '0', '1');

-- ----------------------------
-- Table structure for `keke_witkey_mark_rule`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_mark_rule`;
CREATE TABLE `keke_witkey_mark_rule` (
  `mark_rule_id` int(11) NOT NULL AUTO_INCREMENT,
  `g_value` int(11) DEFAULT NULL,
  `m_value` int(11) DEFAULT NULL,
  `g_title` varchar(50) DEFAULT NULL,
  `m_title` varchar(50) DEFAULT NULL,
  `g_ico` varchar(200) DEFAULT NULL,
  `m_ico` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`mark_rule_id`),
  KEY `index_1` (`mark_rule_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_mark_rule
-- ----------------------------
INSERT INTO keke_witkey_mark_rule VALUES ('1', '200', '200', '一级雇主', '一级威客', 'data/uploads/sys/mark/120594f3b07e5c4215.gif?fid=2066', 'data/uploads/sys/mark/309044f3b07ef87c95.gif?fid=2067');
INSERT INTO keke_witkey_mark_rule VALUES ('2', '500', '500', '二级雇主', '二级威客', 'data/uploads/sys/mark/98734f3b080f7c2ee.gif?fid=2068', 'data/uploads/sys/mark/189344f3b081362561.gif?fid=2069');
INSERT INTO keke_witkey_mark_rule VALUES ('3', '1000', '1000', '三级雇主', '三级威客', 'data/uploads/sys/mark/98544f3b082a11c00.gif?fid=2070', 'data/uploads/sys/mark/306874f3b082e22fc3.gif?fid=2071');
INSERT INTO keke_witkey_mark_rule VALUES ('4', '2000', '2000', '四级雇主', '四级威客', 'data/uploads/sys/mark/140154f3b084cba568.gif?fid=2072', 'data/uploads/sys/mark/126844f3b085182758.gif?fid=2073');
INSERT INTO keke_witkey_mark_rule VALUES ('5', '3000', '3000', '五级雇主', '五级威客', 'data/uploads/sys/mark/262274f3b086f5cbfe.gif?fid=2074', 'data/uploads/sys/mark/228324f3b0872c6f04.gif?fid=2075');
INSERT INTO keke_witkey_mark_rule VALUES ('6', '3500', '3500', '六级雇主', '六级威客', 'data/uploads/sys/mark/188574f3b088a50adf.gif?fid=2076', 'data/uploads/sys/mark/28624f3b088d957db.gif?fid=2077');

-- ----------------------------
-- Table structure for `keke_witkey_member`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_member`;
CREATE TABLE `keke_witkey_member` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `rand_code` char(6) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_member
-- ----------------------------
INSERT INTO keke_witkey_member VALUES ('1', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '3msyue', 'admin@admin.com');

-- ----------------------------
-- Table structure for `keke_witkey_member_bank`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_member_bank`;
CREATE TABLE `keke_witkey_member_bank` (
  `bank_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `real_name` char(20) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `card_id` char(20) DEFAULT NULL,
  `bank_name` varchar(100) DEFAULT NULL,
  `bank_address` varchar(150) DEFAULT NULL,
  `bank_sub_name` varchar(100) DEFAULT NULL,
  `card_num` char(20) DEFAULT NULL,
  `bank_type` int(1) DEFAULT NULL,
  `bind_status` int(1) DEFAULT NULL,
  `on_time` int(10) DEFAULT NULL,
  PRIMARY KEY (`bank_id`),
  KEY `bank_id` (`bank_id`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_member_bank
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_member_black`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_member_black`;
CREATE TABLE `keke_witkey_member_black` (
  `b_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `expire` int(10) DEFAULT NULL,
  `on_time` int(10) DEFAULT NULL,
  `login_times` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`b_id`),
  KEY `b_id` (`b_id`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_member_black
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_member_ext`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_member_ext`;
CREATE TABLE `keke_witkey_member_ext` (
  `ext_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `k` varchar(50) DEFAULT NULL,
  `v1` varchar(255) DEFAULT NULL,
  `v2` varchar(255) DEFAULT NULL,
  `v3` varchar(255) DEFAULT NULL,
  `v4` varchar(255) DEFAULT NULL,
  `v5` varchar(255) DEFAULT NULL,
  `type` char(20) DEFAULT NULL,
  PRIMARY KEY (`ext_id`),
  KEY `ext_id` (`ext_id`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_member_ext
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_member_group`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_member_group`;
CREATE TABLE `keke_witkey_member_group` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `groupname` varchar(20) DEFAULT NULL,
  `group_roles` text,
  `on_time` int(10) DEFAULT '0',
  PRIMARY KEY (`group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_member_group
-- ----------------------------
INSERT INTO keke_witkey_member_group VALUES ('3', '财务人员', '139,31,3,27,76,5,33,36,34,37,35,53,52,m714', '1325037462');
INSERT INTO keke_witkey_member_group VALUES ('7', '客服', '136', '1321261979');
INSERT INTO keke_witkey_member_group VALUES ('2', '外围客服', '31,3,4,27,76,5', '1324285254');
INSERT INTO keke_witkey_member_group VALUES ('1', '创始人', '138,139,31,3,4,27,76,5,10,11,33,13,12,36,78,79,38,68,69,70,77,71,80,81,82,133,134,136,135,137,59,60,58,61,34,1,23,2,37,35,41,6,7,24,8,63,66,67,73,20,17,18,19,21,28,29,57,30,32,16,15,14,22,45,44,43,42,53,54,52,9,40,m10,m11,m22,m23,m34,m35,m46,m47,m58,m59,m610,m611,m612,m713,m714,m715', '1324449757');

-- ----------------------------
-- Table structure for `keke_witkey_member_oauth`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_member_oauth`;
CREATE TABLE `keke_witkey_member_oauth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `source` char(20) DEFAULT NULL,
  `account` varchar(50) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `on_time` int(10) DEFAULT NULL,
  `oauth_id` varchar(50) DEFAULT NULL,
  `bind_key` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_member_oauth
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_member_oltime`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_member_oltime`;
CREATE TABLE `keke_witkey_member_oltime` (
  `oltime_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `user_status` tinyint(4) DEFAULT NULL,
  `last_op_time` int(11) DEFAULT NULL,
  `online_total_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`oltime_id`),
  KEY `oltime_id` (`oltime_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_member_oltime
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_model`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_model`;
CREATE TABLE `keke_witkey_model` (
  `model_id` int(11) NOT NULL AUTO_INCREMENT,
  `model_code` varchar(20) DEFAULT NULL,
  `model_name` varchar(20) DEFAULT NULL,
  `model_dir` varchar(20) DEFAULT NULL,
  `model_type` char(10) DEFAULT NULL,
  `model_dev` varchar(20) DEFAULT NULL,
  `model_status` int(11) DEFAULT NULL,
  `model_desc` text,
  `on_time` int(11) DEFAULT NULL,
  `hide_mode` int(11) DEFAULT NULL,
  `listorder` int(11) DEFAULT '0',
  `model_intro` varchar(50) DEFAULT NULL,
  `indus_bid` text,
  `config` text,
  PRIMARY KEY (`model_id`),
  KEY `model_id` (`model_id`),
  KEY `on_time` (`on_time`),
  KEY `model_status` (`model_status`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_model
-- ----------------------------
INSERT INTO keke_witkey_model VALUES ('2', 'mreward', '多人悬赏', 'mreward', 'task', 'kekezu', '1', '&lt;p&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 多人悬赏任务是指您在发布任务时，先将任务赏金全额托管到平台，再从交稿中选出满意的稿件任务。该任务获奖任务为雇主发布任务时设置的奖项总数目（一等奖，二等奖，三等奖的总和）,获奖者将会根据自己的奖项排名获取相应的赏金。&lt;br /&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;strong&gt;多人悬赏任务的一般流程是：&lt;/strong&gt;&lt;br /&gt;1、雇主发布任务会将对应的任务金额托管到网站平台；&lt;br /&gt;2、众多威客参与任务并提交方案，等待雇主选择方案；&lt;br /&gt;3、雇主会根据方案的优劣，设置相应的稿件奖项排名（如：一等奖，二等奖等）；&lt;br /&gt;4、雇主分配奖项后，如果选稿期结束该任务会进入公示期，在该时期威客可以用相应操作权限，一旦公示期结束，平台会给获奖的威客支付赏金（平台提成一定的比例），如果该任务还有多余的金额，平台会将多余的金额返还给雇主（平台提成一定的比例）。&lt;p&gt;&lt;/p&gt;', '1335333283', '0', '2', '多人悬赏任务是按威客在该任务中获奖的排名来获取支付报酬的一种任务模式。', '', 'a:13:{s:10:\"audit_cash\";s:2:\"10\";s:8:\"min_cash\";s:1:\"2\";s:9:\"task_rate\";s:2:\"20\";s:14:\"task_fail_rate\";s:2:\"10\";s:10:\"end_action\";s:5:\"split\";s:8:\"defeated\";s:1:\"1\";s:13:\"notice_period\";s:1:\"3\";s:7:\"min_day\";s:1:\"1\";s:11:\"vote_period\";s:1:\"2\";s:11:\"choose_time\";s:1:\"4\";s:11:\"open_select\";s:4:\"open\";s:14:\"min_delay_cash\";s:1:\"2\";s:9:\"max_delay\";s:1:\"2\";}');
INSERT INTO keke_witkey_model VALUES ('3', 'preward', '计件悬赏', 'preward', 'task', 'kekezu', '1', '计件悬赏任务的一般流程是：&lt;br /&gt;1、雇主发布任务将任务金额托管到网站平台&lt;br /&gt;2、众多威客参与并提交方案&lt;br /&gt;3、雇主选择满意方案，设置方案中标状态&lt;br /&gt;4、方案中标发放赏金&lt;br /&gt;', '1335333322', '0', '3', '计件悬赏任务是威客完成的任务的数量支付报酬的一种任务模式。此任务模式适合技术含量比较低，报酬微少', '344,330,203,202,204,205,209,210,208,207,206,331', 'a:14:{s:10:\"audit_cash\";s:3:\"100\";s:8:\"min_cash\";s:2:\"10\";s:9:\"task_rate\";s:2:\"20\";s:8:\"defeated\";s:1:\"1\";s:14:\"task_fail_rate\";s:2:\"10\";s:7:\"min_day\";s:1:\"2\";s:11:\"choose_time\";s:1:\"1\";s:8:\"mark_day\";s:1:\"1\";s:11:\"open_select\";s:4:\"open\";s:14:\"min_delay_cash\";s:1:\"0\";s:9:\"max_delay\";s:1:\"5\";s:12:\"work_percent\";s:3:\"100\";s:15:\"is_auto_adjourn\";s:1:\"1\";s:11:\"adjourn_num\";s:1:\"1\";}');
INSERT INTO keke_witkey_model VALUES ('4', 'tender', '普通招标', 'tender', 'task', 'kekezu', '1', '<p>普通招标，雇主选择中标者后，交付将在线下完成，雇主确认后，任务完成，普能招标，网站只收取固定的服务费用,</p><p>普通招标将不能增涨双方的信誉值，与能力值<br /></p><br />', '1325150155', '0', '4', '普通招标，网站不托管招标金额，所发生任何纠份网站不负责', '0', 'a:5:{s:8:\"zb_audit\";s:1:\"2\";s:7:\"zb_fees\";s:2:\"20\";s:11:\"zb_max_time\";s:2:\"30\";s:11:\"choose_time\";s:1:\"7\";s:11:\"open_select\";s:4:\"open\";}');
INSERT INTO keke_witkey_model VALUES ('5', 'dtender', '订金招标', 'dtender', 'task', 'kekezu', '1', '<div class=\"mod-top\"><div class=\"card-summary nslog-area\" data-nslog-type=\"72\"><div class=\"card-summary-content\"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 订金招标是指托管任务订金，选择应标威客完成任务的任务类型。任务采用选择威客完成任务的方式，避免了全款悬赏任务威客作品浪费的现象。<br /></p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 订金招标流程较复杂，用时较长，但效果较好且能有效防止诈骗，特别适合大中型任务的发布这些任务可以考虑使用订金招标：VI/SI等大型设计项目，长期的画册设计外包，多页面的网页设计，电子杂志设计，网站程序开发，软件开发，音视频拍摄/调整，视频短片，大型翻译…… <br /></p><p>　<strong>任务流程：雇主发布订金招标任务并托管任务款后，等待威客来参加任务。威客可以通过搜索等方式查看到该订金招标任务，并依据任务雇主的需求，提出解决方案。雇主查看到最合适最优秀的方案后，即可邀请提交此方案的威客写任务合同。双方对任务合同协调无异议后，即可确定该合同生效，并进入任务实施阶段。分期发放任务赏金。订金招标任务成功结束</strong>。<br /></p></div></div></div><br />', '1326858482', '0', '5', '订金招标任务是采用选择威客完成任务的方式，避免了全款悬赏任务威客作品浪费的现象。', '0', 'a:10:{s:7:\"deposit\";s:3:\"100\";s:9:\"task_rate\";s:2:\"20\";s:14:\"task_fail_rate\";s:1:\"9\";s:8:\"defeated\";s:1:\"2\";s:8:\"bid_time\";s:1:\"2\";s:11:\"select_time\";s:1:\"2\";s:14:\"pay_limit_time\";s:1:\"2\";s:10:\"open_audit\";s:5:\"close\";s:11:\"open_select\";s:4:\"open\";s:7:\"on_time\";s:10:\"1332992835\";}');
INSERT INTO keke_witkey_model VALUES ('6', 'goods', '威客作品', 'goods', 'shop', 'kekezu', '1', '&lt;strong&gt;威客作品的一般流程是：&lt;/strong&gt;&lt;br /&gt;&lt;p&gt;1、买家在网站平台上上传作品，等待后台审核&lt;/p&gt;&lt;p&gt;2、审核通过后，该作品就会上架，在网站商城里显示&lt;/p&gt;&lt;p&gt;3、卖家购买作品后，付款&lt;/p&gt;&lt;p&gt;4、付款后，等待买家提供服务&lt;/p&gt;&lt;p&gt;5、卖家确认服务后，买家即可得到相应的服务金额&lt;/p&gt;&lt;p&gt;如果交易过程中不满意，可以申请仲裁&lt;br /&gt;&lt;/p&gt;&lt;br /&gt;', '1336189964', '0', '6', '威客作品是网络商城的一种交易模式。666', '', 'a:4:{s:10:\"audit_cash\";s:1:\"2\";s:8:\"min_cash\";s:1:\"1\";s:14:\"service_profit\";s:1:\"1\";s:13:\"max_filecount\";s:1:\"1\";}');
INSERT INTO keke_witkey_model VALUES ('7', 'service', '威客服务', 'service', 'shop', 'kekezu', '1', '&lt;strong&gt;威客作品的一般流程是：&lt;/strong&gt;&lt;br /&gt;&lt;p&gt;1、买家在网站平台上上传服务，等待后台审核&lt;/p&gt;&lt;p&gt;2、审核通过后，该服务就会上架，在网站商城里显示&lt;/p&gt;&lt;p&gt;3、卖家购买服务后，付款&lt;/p&gt;&lt;p&gt;4、付款后，等待买家提供服务111&lt;/p&gt;&lt;br /&gt;', '1336189037', '0', '7', '威客服务是网络商城的一种交易模式', '0', 'a:3:{s:14:\"service_profit\";s:2:\"23\";s:8:\"min_cash\";s:1:\"5\";s:10:\"audit_cash\";s:2:\"67\";}');
INSERT INTO keke_witkey_model VALUES ('1', 'sreward', '单人悬赏', 'sreward', 'task', 'kekezu', '1', '&lt;p&gt;&nbsp;&nbsp;&nbsp;&nbsp;&lt;strong&gt; 单人悬赏常用于发布一些时间短，需要创意型的任务，例如给宝宝起名，店铺起名，设计网站logo，贺卡设计，找人排队跑腿，写广告语，策划活动等等。&lt;/strong&gt;&lt;/p&gt;', '1337587842', '0', '1', '单人悬赏常用于发布一些时间短，需要创意型的任务，例如给宝宝起名，店铺起名，设计网站logo，贺卡设计', '', 'a:17:{s:10:\"audit_cash\";s:3:\"100\";s:8:\"min_cash\";s:2:\"50\";s:9:\"task_rate\";s:1:\"2\";s:14:\"task_fail_rate\";s:1:\"2\";s:10:\"end_action\";s:5:\"split\";s:10:\"witkey_num\";s:1:\"1\";s:8:\"defeated\";s:1:\"1\";s:13:\"notice_period\";s:1:\"2\";s:7:\"min_day\";s:1:\"2\";s:11:\"vote_period\";s:1:\"2\";s:14:\"reg_vote_limit\";s:1:\"2\";s:11:\"choose_time\";s:1:\"2\";s:11:\"open_select\";s:4:\"open\";s:14:\"min_delay_cash\";s:1:\"2\";s:9:\"max_delay\";s:1:\"2\";s:15:\"agree_sign_time\";s:1:\"1\";s:19:\"agree_complete_time\";s:1:\"2\";}');

-- ----------------------------
-- Table structure for `keke_witkey_msg`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_msg`;
CREATE TABLE `keke_witkey_msg` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `msg_pid` int(11) DEFAULT '0',
  `uid` int(11) DEFAULT '0',
  `username` varchar(50) DEFAULT NULL,
  `to_uid` int(11) DEFAULT NULL,
  `to_username` varchar(50) DEFAULT NULL,
  `msg_status` tinyint(4) DEFAULT '0',
  `view_status` tinyint(4) DEFAULT '0',
  `title` varchar(100) DEFAULT NULL,
  `content` text,
  `on_time` int(11) DEFAULT '0',
  PRIMARY KEY (`msg_id`),
  KEY `msg_pid` (`msg_pid`),
  KEY `on_time` (`on_time`),
  KEY `recive_uid` (`to_uid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_msg
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_msg_config`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_msg_config`;
CREATE TABLE `keke_witkey_msg_config` (
  `config_id` int(11) NOT NULL AUTO_INCREMENT,
  `k` varchar(30) DEFAULT NULL,
  `obj` char(20) DEFAULT NULL,
  `desc` varchar(30) DEFAULT NULL,
  `v` varchar(255) DEFAULT NULL,
  `on_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`config_id`)
) ENGINE=MyISAM AUTO_INCREMENT=102 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_msg_config
-- ----------------------------
INSERT INTO keke_witkey_msg_config VALUES ('9', 'task_pub', 'task', '任务发布', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1332553672');
INSERT INTO keke_witkey_msg_config VALUES ('10', 'task_bid', 'task', '任务中标', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1332553672');
INSERT INTO keke_witkey_msg_config VALUES ('3', 'pay_success', 'found', '支付成功', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1332553672');
INSERT INTO keke_witkey_msg_config VALUES ('4', 'pay_fail', 'found', '支付失败', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1332553672');
INSERT INTO keke_witkey_msg_config VALUES ('11', 'task_auth_fail', 'task', '审核失败', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1321954987');
INSERT INTO keke_witkey_msg_config VALUES ('12', 'task_auth_success', 'task', '审核通过', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1321954987');
INSERT INTO keke_witkey_msg_config VALUES ('5', 'draw_success', 'found', '提现成功', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1332553672');
INSERT INTO keke_witkey_msg_config VALUES ('2', 'freeze', 'user', '用户冻结', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1332553672');
INSERT INTO keke_witkey_msg_config VALUES ('13', 'task_freeze', 'task', '任务冻结', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1321954987');
INSERT INTO keke_witkey_msg_config VALUES ('21', 'update_password', 'safe', '更新密码', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1322020124');
INSERT INTO keke_witkey_msg_config VALUES ('1', 'reg', 'user', '注册成功', 'a:1:{s:8:\"send_sms\";i:1;}', '1332553672');
INSERT INTO keke_witkey_msg_config VALUES ('6', 'recharge_success', 'found', '充值成功', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1332553672');
INSERT INTO keke_witkey_msg_config VALUES ('7', 'recharge_fail', 'found', '充值失败', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1332553672');
INSERT INTO keke_witkey_msg_config VALUES ('20', 'update_sec_code', 'safe', '更改安全码', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1321954987');
INSERT INTO keke_witkey_msg_config VALUES ('8', 'space_change', 'space', '空间变更', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1332553672');
INSERT INTO keke_witkey_msg_config VALUES ('16', 'transrights_pass', 'trans', '交易维权成立', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1321954987');
INSERT INTO keke_witkey_msg_config VALUES ('17', 'transrights_nopass', 'trans', '交易维权不成立', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1321954987');
INSERT INTO keke_witkey_msg_config VALUES ('18', 'transrights_accept', 'trans', '交易维权受理', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1321954987');
INSERT INTO keke_witkey_msg_config VALUES ('19', 'transrights_freeze', 'trans', '交易维权冻结', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1321954987');
INSERT INTO keke_witkey_msg_config VALUES ('14', 'task_sign', 'task', '任务报名', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1321954987');
INSERT INTO keke_witkey_msg_config VALUES ('15', 'task_hand', 'task', '任务交稿', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1321954987');
INSERT INTO keke_witkey_msg_config VALUES ('81', 'agreement', 'task', '协议签署', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1321954987');
INSERT INTO keke_witkey_msg_config VALUES ('82', 'agreement_file', 'task', '协议文件交付', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1321954987');
INSERT INTO keke_witkey_msg_config VALUES ('83', 'service_pub', 'service', '服务发布', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1321954987');
INSERT INTO keke_witkey_msg_config VALUES ('84', 'service_order', 'service', '服务订单提交', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1321954987');
INSERT INTO keke_witkey_msg_config VALUES ('99', 'unfreeze', 'user', '用户解冻', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1321954987');
INSERT INTO keke_witkey_msg_config VALUES ('88', 'order_change', 'service', '订单状态变更', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1321954987');
INSERT INTO keke_witkey_msg_config VALUES ('87', 'auto_choose', 'task', '自动选稿', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1321954987');
INSERT INTO keke_witkey_msg_config VALUES ('100', 'get_password', 'user', '密码找回', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1321954987');
INSERT INTO keke_witkey_msg_config VALUES ('101', 'dispose_task', 'task', '稿件结算', 'a:3:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;s:15:\"send_mobile_sms\";i:1;}', null);

-- ----------------------------
-- Table structure for `keke_witkey_msg_tpl`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_msg_tpl`;
CREATE TABLE `keke_witkey_msg_tpl` (
  `tpl_id` int(11) NOT NULL AUTO_INCREMENT,
  `tpl_code` varchar(30) DEFAULT '0',
  `content` text,
  `send_type` int(1) DEFAULT NULL,
  `listorder` int(11) DEFAULT '0',
  PRIMARY KEY (`tpl_id`)
) ENGINE=MyISAM AUTO_INCREMENT=163 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_msg_tpl
-- ----------------------------
INSERT INTO keke_witkey_msg_tpl VALUES ('1', 'reg', '<p>尊敬的 {用户名}：</p><p>&nbsp;感谢您对{网站名称}的信任，当您收到这封信的时候，您已经成功注册为{网站名称}会员。在这里，您可以感受到诚信、活泼、高效的网络交易文化。</p><p>如有任何疑问，欢迎随时与我们联系，我们将竭诚为您服务！<br />&nbsp;&nbsp;&nbsp;　 欢迎继续关注{网站名称}！ </p><p>&nbsp;&nbsp;&nbsp; 祝：</p><p>　&nbsp; 工作学习顺利， 生活愉快！ </p><p>{网站名称}客服中心</p><p>--------------------------------------------------------------------------------------------------------------------</p><p>此邮件为系统自动发出的邮件，请勿直接回复。</p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('33', 'task_pub', '<p>尊敬的 {用户名}：</p><p>您的任务已发布成功，感谢您对{网站名称}的信任。如有特殊情况，请致电客服，我们将协助您解决问题。</p><p>任务编号：{任务编号}</p><p>任务标题：{任务链接}</p>任务状态：{任务状态}<p>开始时间：{开始时间}</p><p>投稿结束时间：{投稿结束时间}</p><p>选稿结束时间：{选稿结束时间}<br /></p><p>--------------------------------------------------------------------------------------------------------------------</p><p>此邮件为系统自动发出的邮件，请勿直接回复。</p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('35', 'task_bid', '<p>尊敬的 {用户名}：</p><p>恭喜您成功中标，感谢您对{网站名称}网的信任。如有特殊情况，请致电客服，我们将协助您解决问题。</p><p>任务编号：{任务编号}</p><p>任务标题：{任务标题}</p><p>--------------------------------------------------------------------------------------------------------------------</p><p>此邮件为系统自动发出的邮件，请勿直接回复。</p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('5', 'pay_success', '<p>尊敬的 {用户名}：</p><p>您成功充值{充值金额}元，感谢您对{网站名称}的信任。如有特殊情况，请致电客服，我们将协助您解决问题。</p><p>--------------------------------------------------------------------------------------------------------------------</p><p>此邮件为系统自动发出的邮件，请勿直接回复。</p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('7', 'draw_success', '<p>您在{网站名称}的提现申请已被受理，您的提现金额为{提现金额}，请查收！</p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('37', 'task_auth_success', '<p>尊敬的 {用户名}：</p><p>您的发布的任务已通过审核，感谢您对{网站名称}的信任。如有特殊情况，请致电客服，我们将协助您解决问题。</p><p>任务编号：{任务编号}</p><p>任务链接：{任务链接}</p><p>开始时间：{开始时间}</p><p>结束时间：{结束时间}</p><p>--------------------------------------------------------------------------------------------------------------------</p><p>此邮件为系统自动发出的邮件，请勿直接回复。</p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('39', 'task_auth_fail', '<p>尊敬的 {用户名}：</p><p>您的发布的任务 {任务标题} 未通过审核，感谢您对{网站名称}的信任。如有特殊情况，请致电客服，我们将协助您解决问题。</p><p>--------------------------------------------------------------------------------------------------------------------</p><p>此邮件为系统自动发出的邮件，请勿直接回复。</p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('4', 'freeze', '<p>尊敬的 {用户名}：</p><p>您的用户已被冻结，感谢您对{网站名称}的信任。如有特殊情况，请致电客服，我们将协助您解决问题。</p><p>--------------------------------------------------------------------------------------------------------------------</p><p>此邮件为系统自动发出的邮件，请勿直接回复。</p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('31', 'task_freeze', '<p>尊敬的 {用户名}：</p><p>您的任务<u>（{任务标题}）</u>已被冻结，感谢您对{网站名称}的信任。如有特殊情况，请致电客服，我们将协助您解决问题。</p><p>--------------------------------------------------------------------------------------------------------------------</p><p>此邮件为系统自动发出的邮件，请勿直接回复。</p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('13', 'update_password', '<p>尊敬的 {用户名}：</p><p>您的密码已经修改，新密码是：<u>（{新密码}）</u>，感谢您对{网站名称}的信任。如有特殊情况，请致电客服，我们将协助您解决问题。</p><p>--------------------------------------------------------------------------------------------------------------------</p><p>此邮件为系统自动发出的邮件，请勿直接回复。</p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('2', 'reg', '尊敬的 {用户名}：感谢您对{网站名称}的信任。如有特殊情况，请致电客服，我们将协助您解决问题。', '2', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('34', 'task_pub', '尊敬的 {用户名}：您的任务已发布成功，感谢您对{网站名称}的信任。如有特殊情况，请平致电客服，', '2', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('36', 'task_bid', '<p>尊敬的 {用户名}：恭喜您成功中标，感谢您对{用户名}网的信任。如有特殊情况，请致电客服，我们将协助您解决问题。</p>', '2', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('6', 'pay_fail', '<p>尊敬的 {用户名}：您充值{充值金额}元业务失败，感谢您对{网站名称}的信任。如有特殊情况，请致电客服，我们将协助您解决问题。</p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('8', 'draw_success', '<p>您在{网站名称}的提现申请已被受理，您的提现金额为{提现金额}，请查收！</p>', '2', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('38', 'task_auth_success', '<p>尊敬的 {用户名}：您的发布的任务已通过审核，感谢您对{网站名称}的信任。如有特殊情况，请致电客服，我们将协助您解决问题。任务编号：{任务编号}</p>', '2', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('40', 'task_auth_fail', '<p>尊敬的 {用户名}：您的发布的任务 {任务标题} 未通过审核，感谢您对{网站名称}的信任。如有特殊情况，请致电客服，我们将协助您解决问题。</p>', '2', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('3', 'freeze', '<p>尊敬的 {用户名}：您的用户已被冻结，感谢您对{网站名称}的信任。如有特殊情况，请致电客服，我们将协助您解决问题。</p>', '2', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('32', 'task_freeze', '<p>尊敬的 {用户名}：您的任务<u>（{任务标题}）</u>已被冻结，感谢您对{网站名称}的信任。如有特殊情况，请致电客服，我们将协助您解决问题。</p>', '2', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('14', 'update_password', '<p>尊敬的 {用户名}：您的密码已经修改，新密码是：<u>（{新密码}）</u>，感谢您对{网站名称}的信任。如有特殊情况，请致电客服，我们将协助您解决问题。</p>', '2', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('41', 'agreement', '<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p>尊敬的 {用户名}：</p><p>{协议状态}：</p><p>协议链接：{协议链接}</p><p><br /></p><p>感谢您对{网站名称}的信任。如有特殊情况，请致电客服</p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('42', 'agreement', '<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p>尊敬的 {用户名}：</p><p>{用户}向{称谓}的{任务标题}提交了稿件。</p><p><br /></p><p>感谢您对{网站名称}的信任。如有特殊情况，请致电客服</p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>', '2', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('9', 'recharge_success', '<p>尊敬的 {用户名}：</p><p>您的单号为:{充值单号}的充值受理成功，充值金额：{充值金额}，感谢您对{网站名称}的信任。如有特殊情况，请致电客服，我们将协助您解决问题。</p><p>--------------------------------------------------------------------------------------------------------------------</p><p>此邮件为系统自动发出的邮件，请勿直接回复。</p><br />', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('10', 'recharge_fail', '<p>尊敬的 {用户名}：</p><p>您的单号为:{充值单号}的充值受理失败，感谢您对{网站名称}的信任。如有特殊情况，请致电客服，我们将协助您解决问题。</p><p>--------------------------------------------------------------------------------------------------------------------</p><p>此邮件为系统自动发出的邮件，请勿直接回复。</p><br />', '2', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('11', 'recharge_success', '<p></p><p>尊敬的 {用户名}：</p><p>您的单号为:{充值单号}的充值受理成功，充值金额：{充值金额}，感谢您对{网站名称}的信任。如有特殊情况，请致电客服，我们将协助您解决问题。</p><p>--------------------------------------------------------------------------------------------------------------------</p><p>此邮件为系统自动发出的邮件，请勿直接回复。</p><br />', '2', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('12', 'recharge_fail', '<p></p><p>尊敬的 {用户名}：</p><p>您的单号为:{充值单号}的充值受理失败，感谢您对{网站名称}的信任。如有特殊情况，请致电客服，我们将协助您解决问题。</p><p>--------------------------------------------------------------------------------------------------------------------</p><p>此邮件为系统自动发出的邮件，请勿直接回复。</p><br />', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('15', 'update_sec_code', '<p>尊敬的 {用户名}：</p><p>您的安全码成功，您的新安全码为：{安全码}。感谢您对{网站名称}的信任。如有特殊情况，请致电客服，我们将协</p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('16', 'update_sec_code', '<p></p><p>尊敬的 {用户名}：</p><p>您的安全码成功，您的新安全码为：{安全码}。感谢您对{网站名称}的信任。如有特殊情况，请致电客服，我们将协</p><p></p>', '2', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('17', 'space_change', '<p></p><p></p><p>尊敬的 {用户名}：</p><p>由于您重置了自己的企业认证信息，您的空间：{空间名}变更为【个人空间】。请尽快完成企业认证，完成后您可以在用户中心重新升级为企业空间。</p><p>感谢您对{网站名称}的信任。如有特殊情况，请致电客服</p><p></p><p></p>', '2', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('18', 'space_change', '<p></p><p>尊敬的 {用户名}：</p><p>由于您重置了自己的企业认证信息，您的空间：{空间名}变更为【个人空间】。请尽快完成企业认证，完成后您可以在用户中心重新升级为企业空间。</p><p>感谢您对{网站名称}的信任。如有特殊情况，请致电客服</p><p></p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('19', 'transrights_pass', '<p></p><p></p><p>尊敬的 {用户名}：</p><p>与您相关的编号为{交易维权编号}的{交易维权名称}记录网站已经受理完成，{交易维权名称}处理结果为：</p><p>{处理结果}</p><p>感谢您对{网站名称}的信任。如有特殊情况，请致电客服</p><p></p><p></p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('20', 'transrights_pass', '<p></p><p></p><p></p><p>尊敬的 {用户名}：</p><p>您的编号为{交易维权编号}的{交易维权名称}记录网站已经受理完成，{交易维权名称}处理结果为：{处理结果}</p><p>感谢您对{网站名称}的信任。如有特殊情况，请致电客服</p><p></p><p></p><p></p>', '2', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('21', 'transrights_nopass', '<p></p><p></p><p>尊敬的 {用户名}：</p><p>与您相关的编号为{交易维权编号}的{交易维权名称}记录网站确认为不成立，原因是：</p><p>{处理结果}</p><p>感谢您对{网站名称}的信任。如有特殊情况，请致电客服</p><p></p><p></p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('22', 'transrights_nopass', '<p></p><p></p><p></p><p></p><p>尊敬的 {用户名}：</p><p>您的编号为{交易维权编号}的{交易维权名称}记录网站确认为不成立，原因是：</p><p>{处理结果}</p><p>感谢您对{网站名称}的信任。如有特殊情况，请致电客服</p><p></p><p></p><p></p><p></p>', '2', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('23', 'transrights_accept', '<p></p><p></p><p>尊敬的 {用户名}：</p><p>与您相关的编号为{交易维权编号}的{交易维权名称}记录网站确已经受理，相应{交易维权类型}{交易维权对象}已被{动作}。</p><p>感谢您对{网站名称}的信任。如有特殊情况，请致电客服</p><p></p><p></p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('24', 'transrights_accept', '<p></p><p></p><p></p><p></p><p></p><p>尊敬的 {用户名}：</p><p>与您相关的编号为{交易维权编号}的{交易维权名称}记录网站确已经受理，相应{交易维权类型}{交易维权对象}已被{动作}。</p><p>感谢您对{网站名称}的信任。如有特殊情况，请致电客服</p><p></p><p></p><p></p><p></p><p></p>', '2', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('25', 'transrights_freeze', '<p></p><p></p><p></p><p></p><p></p><p>尊敬的 {用户名}：</p><p>由{发起方}对{交易维权对象}发起的维权记录已经提交成功，相应{交易维权类型}已被冻结，请等待网站受理。提交原因：</p><p>{提交原因}<br /></p><p>感谢您对{网站名称}的信任。如有特殊情况，请致电客服</p><p></p><p></p><p></p><p></p><p></p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('26', 'transrights_freeze', '<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p>尊敬的 {用户名}：</p><p>由{发起方}对{交易维权对象}发起的维权记录已经提交成功，相应{交易维权类型}已被冻结，请等待网站受理。提交原因：</p><p>{提交原因}<br /></p><p>感谢您对{网站名称}的信任。如有特殊情况，请致电客服</p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>', '2', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('27', 'task_sign', '<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p>尊敬的 {用户名}：</p><p>{用户}报名了{称谓}的{任务标题}。</p><p><br /></p><p>感谢您对{网站名称}的信任。如有特殊情况，请致电客服</p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>', '2', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('28', 'task_sign', '<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p>尊敬的 {用户名}：</p><p>{用户}报名了{称谓}的{任务标题}。</p><p><br /></p><p>感谢您对{网站名称}的信任。如有特殊情况，请致电客服</p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('29', 'task_hand', '<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p>尊敬的 {用户名}：</p><p>{用户}向{称谓}的{任务标题}提交了稿件。</p><p><br /></p><p>感谢您对{网站名称}的信任。如有特殊情况，请致电客服</p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('30', 'task_hand', '<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p>尊敬的 {用户名}：</p><p>{用户}向{称谓}的{任务标题}提交了稿件。</p><p><br /></p><p>感谢您对{网站名称}的信任。如有特殊情况，请致电客服</p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>', '2', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('156', 'unfreeze', '<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p>尊敬的 {用户名}：</p><p>您的用户已被解封，感谢您对{网站名称}的信任。如有特殊情况，请致电客服，我们将协助您解决问题。</p><p>--------------------------------------------------------------------------------------------------------------------</p><p>此邮件为系统自动发出的邮件，请勿直接回复。</p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('142', 'agreement_file', '<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p>尊敬的 {用户名}：</p><p>用户{发起者}已经{动作}：</p><p>协议链接：{协议链接}</p><p>协议状态：{协议状态}<br /></p><p><br /></p><p>感谢您对{网站名称}的信任。如有特殊情况，请致电客服</p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('143', 'agreement_file', '<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p>尊敬的 {用户名}：</p><p>{用户}向{称谓}的{任务标题}提交了稿件。</p><p><br /></p><p>感谢您对{网站名称}的信任。如有特殊情况，请致电客服</p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>', '2', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('144', 'service_pub', '<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p>尊敬的 {用户名}：</p><p>您的{服务类型}已发布成功。{服务类型}信息：</p><p>{服务类型}链接：{商品链接}</p><p>发布时间：{发布时间}<br /></p><p>{服务类型}状态：{商品状态}<br /></p><p>感谢您对{网站名称}的信任。如有特殊情况，请致电客服</p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('145', 'service_pub', '<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p>尊敬的 {用户名}：</p><p>{用户}向{称谓}的{任务标题}提交了稿件。</p><p><br /></p><p>感谢您对{网站名称}的信任。如有特殊情况，请致电客服</p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>', '2', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('146', 'service_order', '<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p>尊敬的 {用户名}：</p><p>{用户动作}了您的{服务类型}：{服务名称}。请尽快前往用户中心确认。</p><p>订单链接：{订单链接}<br /></p><p>感谢您对{网站名称}的信任。如有特殊情况，请致电客服</p><p><br /></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('147', 'service_order', '<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p>尊敬的 {用户名}：</p><p>{用户}向{称谓}的{任务标题}提交了稿件。</p><p><br /></p><p>感谢您对{网站名称}的信任。如有特殊情况，请致电客服</p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>', '2', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('157', 'unfreeze', '<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p>尊敬的 {用户名}：</p><p>{用户}向{称谓}的{任务标题}提交了稿件。</p><p><br /></p><p>感谢您对{网站名称}的信任。如有特殊情况，请致电客服</p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>', '2', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('154', 'order_change', '<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p>尊敬的 {用户名}：</p><p>{用户}{动作}，请尽快前往用户中心处理，订单信息：</p><p>订单编号：{订单编号}</p><p>订单链接：{订单链接}</p><p><br /></p><p>感谢您对{网站名称}的信任。如有特殊情况，请致电客服</p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('155', 'order_change', '<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p>尊敬的 {用户名}：</p><p>{用户}向{称谓}的{任务标题}提交了稿件。</p><p><br /></p><p>感谢您对{网站名称}的信任。如有特殊情况，请致电客服</p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>', '2', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('152', 'auto_choose', '<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p>尊敬的 {用户名}：</p><p>您参与的任务{任务编号}进行了自动选稿，任务信息：</p><p>任务标题：{任务标题}</p><p><br /></p><p>感谢您对{网站名称}的信任。如有特殊情况，请致电客服</p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('153', 'auto_choose', '<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p>尊敬的 {用户名}：</p><p>{用户}向{称谓}的{任务标题}提交了稿件。</p><p><br /></p><p>感谢您对{网站名称}的信任。如有特殊情况，请致电客服</p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>', '2', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('158', 'get_password', '<p>尊敬的 {用户名}：</p><p>&nbsp;感谢您对{网站名称}的信任，您的新密码为{密码}，安全码为{安全码}，请保护好您的账号。</p><p>如有任何疑问，欢迎随时与我们联系，我们将竭诚为您服务！<br />&nbsp;&nbsp;&nbsp;　 欢迎继续关注{网站名称}！ </p><p>&nbsp;&nbsp;&nbsp; 祝：</p><p>　&nbsp; 工作学习顺利， 生活愉快！ </p><br />', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('159', 'get_password', '<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p>尊敬的 {用户名}：</p><p>{用户}向{称谓}的{任务标题}提交了稿件。</p><p><br /></p><p>感谢您对{网站名称}的信任。如有特殊情况，请致电客服</p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>', '2', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('160', 'dispose_task', '<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p>尊敬的 {用户名}：</p><p>您参与的任务已经结束。</p><p>任务编号：{任务编号}</p><p>任务链接：{任务链接}<br /></p><p>感谢您对{网站名称}的信任。如有特殊情况，请致电客服</p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('161', 'dispose_task', '<p></p><p>尊敬的 {用户名}：您参与的任务已经结束。任务编号：{任务编号}。任务链接：{任务链接}。感谢您对{网站名称}的信任。如有特殊情况，请致电客服</p><p></p><br />', '2', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('162', 'dispose_work', '<p></p><p>尊敬的 {用户名}：您参与的任务已经{任务状态}。任务编号：{任务编号}。任务链接：{任务链接}。感谢您对{网站名称}的信任。如有特殊情况，请致电客服</p><p></p><br />', '2', '0');

-- ----------------------------
-- Table structure for `keke_witkey_nav`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_nav`;
CREATE TABLE `keke_witkey_nav` (
  `nav_id` int(11) NOT NULL AUTO_INCREMENT,
  `nav_url` varchar(200) DEFAULT NULL,
  `nav_title` varchar(20) DEFAULT NULL,
  `nav_style` varchar(20) DEFAULT NULL,
  `listorder` int(11) DEFAULT '0',
  `newwindow` int(11) DEFAULT '0',
  `ishide` int(11) DEFAULT '0',
  PRIMARY KEY (`nav_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_nav
-- ----------------------------
INSERT INTO keke_witkey_nav VALUES ('1', 'index.php', '首页', 'index', '1', '0', '0');
INSERT INTO keke_witkey_nav VALUES ('4', 'index.php?do=task', '任务大厅', 'task', '2', '0', '0');
INSERT INTO keke_witkey_nav VALUES ('5', 'index.php?do=shop', '威客商城', 'shop', '3', '0', '0');
INSERT INTO keke_witkey_nav VALUES ('6', 'index.php?do=article', '资讯中心', 'article', '4', '0', '0');
INSERT INTO keke_witkey_nav VALUES ('7', 'index.php?do=case', '成功案例', 'case', '5', '0', '0');

-- ----------------------------
-- Table structure for `keke_witkey_order`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_order`;
CREATE TABLE `keke_witkey_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_name` varchar(150) DEFAULT NULL,
  `order_time` int(10) DEFAULT NULL,
  `order_amount` decimal(12,2) DEFAULT '0.00',
  `order_status` char(15) DEFAULT NULL,
  `order_body` varchar(200) DEFAULT NULL,
  `order_uid` int(11) DEFAULT NULL,
  `order_username` varchar(20) DEFAULT NULL,
  `seller_uid` int(11) DEFAULT NULL,
  `seller_username` varchar(30) DEFAULT NULL,
  `model_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `order_id` (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_order
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_order_charge`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_order_charge`;
CREATE TABLE `keke_witkey_order_charge` (
  `order_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `order_type` varchar(20) DEFAULT NULL,
  `pay_type` varchar(20) DEFAULT '0',
  `return_order_id` int(11) DEFAULT '0',
  `obj_id` int(11) DEFAULT '0',
  `uid` varchar(50) DEFAULT NULL,
  `username` varchar(20) DEFAULT '0',
  `pay_time` int(11) DEFAULT '0',
  `pay_money` decimal(11,2) DEFAULT '0.00',
  `order_status` char(20) DEFAULT NULL,
  `pay_info` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_order_charge
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_order_detail`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_order_detail`;
CREATE TABLE `keke_witkey_order_detail` (
  `detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `detail_name` varchar(100) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `obj_type` varchar(20) DEFAULT NULL,
  `obj_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  PRIMARY KEY (`detail_id`),
  KEY `detail_id` (`detail_id`),
  KEY `order_id` (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_order_detail
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_payitem`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_payitem`;
CREATE TABLE `keke_witkey_payitem` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `model_code` varchar(100) DEFAULT NULL,
  `item_code` char(20) DEFAULT NULL,
  `small_pic` varchar(100) DEFAULT NULL,
  `big_pic` varchar(100) DEFAULT NULL,
  `item_name` char(20) DEFAULT NULL,
  `user_type` char(20) DEFAULT NULL,
  `item_cash` decimal(10,2) DEFAULT '0.00',
  `item_standard` char(20) DEFAULT NULL,
  `item_limit` int(11) DEFAULT NULL,
  `item_desc` text,
  `ext` text,
  `is_open` int(1) DEFAULT NULL,
  `item_type` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`item_id`),
  KEY `item_id` (`item_id`),
  KEY `item_code` (`item_code`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_payitem
-- ----------------------------
INSERT INTO keke_witkey_payitem VALUES ('3', 'sreward,mreward,preward,tender', 'urgent', 'data/uploads/sys/tools/94564f3b0b7264e13.gif?fid=2093', 'data/uploads/sys/tools/26654f3b0b7aa0514.gif?fid=2094', '任务加急', 'employer', '30.00', 'times', '10', '针对需要任务时间比较紧而且需要在近期完成的任务，任务加急后能更方便威客搜索查看<br />', null, '1', 'task');
INSERT INTO keke_witkey_payitem VALUES ('2', 'sreward,mreward,preward,tender,dtender', 'top', 'data/uploads/sys/tools/74064f3b0ba6a17c3.gif?fid=2095', 'data/uploads/sys/tools/14234f3b0ba9d5c9d.gif?fid=2096', '任务置顶', 'employer', '20.00', 'day', '10', '任务置顶后，该任务将在首页、任务列表、任务首页优先显示，更方面搜索查看', null, '1', 'task');
INSERT INTO keke_witkey_payitem VALUES ('1', 'sreward,mreward,preward,tender,dtender', 'workhide', 'data/uploads/sys/tools/210914f3b0bca96811.gif?fid=2097', 'data/uploads/sys/tools/282564f3b0bcd5bb39.gif?fid=2098', '稿件隐藏', 'witkey', '10.00', 'times', '10', '针对任务交稿处理，稿件隐藏能更好的保障你的人个权利<br />', null, '1', 'work');
INSERT INTO keke_witkey_payitem VALUES ('4', 'sreward,mreward,preward,tender,dtender', 'map', 'data/uploads/sys/tools/288854f3b0beadf0a3.gif?fid=2099', 'data/uploads/sys/tools/84264f3b0bee314b0.gif?fid=2100', '地图定位', 'employer', '10.00', 'times', '10', '地图定位，任务发布后，可以在地图上指定位置显示', null, '1', 'task_service');

-- ----------------------------
-- Table structure for `keke_witkey_payitem_record`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_payitem_record`;
CREATE TABLE `keke_witkey_payitem_record` (
  `record_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_code` char(20) DEFAULT NULL,
  `use_type` char(20) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `obj_type` char(20) DEFAULT NULL,
  `obj_id` int(11) DEFAULT NULL,
  `origin_id` int(11) DEFAULT NULL,
  `use_cash` decimal(10,2) DEFAULT '0.00',
  `use_num` int(2) DEFAULT NULL,
  `on_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`record_id`),
  KEY `record_id` (`record_id`),
  KEY `item_code` (`item_code`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_payitem_record
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_pay_api`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_pay_api`;
CREATE TABLE `keke_witkey_pay_api` (
  `pay_id` int(11) NOT NULL DEFAULT '0',
  `payment` varchar(50) NOT NULL,
  `type` char(20) DEFAULT NULL,
  `config` text,
  PRIMARY KEY (`pay_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_pay_api
-- ----------------------------
INSERT INTO keke_witkey_pay_api VALUES ('3', 'chinabank', 'online', '');
INSERT INTO keke_witkey_pay_api VALUES ('2', 'alipayjs', 'online', '');
INSERT INTO keke_witkey_pay_api VALUES ('4', 'paypal', 'online', '');
INSERT INTO keke_witkey_pay_api VALUES ('1', 'tenpay', 'online', '');
INSERT INTO keke_witkey_pay_api VALUES ('5', 'icbc', '');

-- ----------------------------
-- Table structure for `keke_witkey_pay_config`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_pay_config`;
CREATE TABLE `keke_witkey_pay_config` (
  `config_id` int(11) NOT NULL AUTO_INCREMENT,
  `k` varchar(50) DEFAULT NULL,
  `v` varchar(150) DEFAULT NULL,
  `t` char(20) DEFAULT NULL,
  `d` char(50) DEFAULT NULL,
  PRIMARY KEY (`config_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_pay_config
-- ----------------------------
INSERT INTO keke_witkey_pay_config VALUES ('1', 'currency', '10', '0', '0');
INSERT INTO keke_witkey_pay_config VALUES ('2', 'recharge_min', '0.01', '0', '0');
INSERT INTO keke_witkey_pay_config VALUES ('3', 'withdraw_min', '2', '0', '0');
INSERT INTO keke_witkey_pay_config VALUES ('4', 'withdraw_max', '10000', '0', '0');

-- ----------------------------
-- Table structure for `keke_witkey_priv_item`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_priv_item`;
CREATE TABLE `keke_witkey_priv_item` (
  `op_id` int(11) NOT NULL AUTO_INCREMENT,
  `model_id` int(11) DEFAULT NULL,
  `op_code` varchar(20) DEFAULT NULL,
  `op_name` varchar(50) DEFAULT NULL,
  `allow_times` int(1) DEFAULT NULL,
  `limit_obj` int(111) DEFAULT NULL,
  `condit` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`op_id`),
  KEY `op_id` (`op_id`)
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_priv_item
-- ----------------------------
INSERT INTO keke_witkey_priv_item VALUES ('1', '1', 'pub', '发布任务', '1', '2', '');
INSERT INTO keke_witkey_priv_item VALUES ('58', '5', 'work_hand', '交稿', '1', '1', '');
INSERT INTO keke_witkey_priv_item VALUES ('3', '1', 'comment', '留言', '1', '1', '');
INSERT INTO keke_witkey_priv_item VALUES ('4', '1', 'report', '举报', '1', '1', '');
INSERT INTO keke_witkey_priv_item VALUES ('5', '2', 'pub', '发布任务', '1', '2', '');
INSERT INTO keke_witkey_priv_item VALUES ('6', '2', 'comment', '留言', '1', '1', '');
INSERT INTO keke_witkey_priv_item VALUES ('7', '2', 'report', '举报', '1', '1', 'realname,bank');
INSERT INTO keke_witkey_priv_item VALUES ('9', '3', 'pub', '发布任务', '1', '2', '');
INSERT INTO keke_witkey_priv_item VALUES ('2', '1', 'work_hand', '交稿', '1', '1', '');
INSERT INTO keke_witkey_priv_item VALUES ('12', '3', 'comment', '留言', '1', '1', '');
INSERT INTO keke_witkey_priv_item VALUES ('10', '3', 'report', '举报', '1', '1', '');
INSERT INTO keke_witkey_priv_item VALUES ('61', '5', 'comment', '举报', '1', '1', null);
INSERT INTO keke_witkey_priv_item VALUES ('8', '2', 'work_hand', '交稿', '1', '2', '');
INSERT INTO keke_witkey_priv_item VALUES ('59', '5', 'pub', '发布任务', '1', '2', '');
INSERT INTO keke_witkey_priv_item VALUES ('11', '3', 'work_hand', '交稿', '1', '1', '');
INSERT INTO keke_witkey_priv_item VALUES ('60', '5', 'report', '举报', '1', '1', null);
INSERT INTO keke_witkey_priv_item VALUES ('51', '4', 'comment', '留言', '1', '1', 'realname');
INSERT INTO keke_witkey_priv_item VALUES ('57', '4', 'report', '举报', '1', '1', null);
INSERT INTO keke_witkey_priv_item VALUES ('49', '4', 'pub', '发布任务', '1', '2', '');
INSERT INTO keke_witkey_priv_item VALUES ('50', '4', 'work_hand', '交稿', '1', '1', null);

-- ----------------------------
-- Table structure for `keke_witkey_priv_rule`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_priv_rule`;
CREATE TABLE `keke_witkey_priv_rule` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) DEFAULT NULL,
  `mark_rule_id` char(5) DEFAULT NULL,
  `rule` char(5) DEFAULT NULL,
  PRIMARY KEY (`r_id`),
  KEY `r_id` (`r_id`)
) ENGINE=MyISAM AUTO_INCREMENT=304 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_priv_rule
-- ----------------------------
INSERT INTO keke_witkey_priv_rule VALUES ('1', '1', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('2', '1', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('3', '1', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('4', '1', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('5', '1', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('7', '2', '1', '2');
INSERT INTO keke_witkey_priv_rule VALUES ('8', '2', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('9', '2', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('10', '2', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('11', '2', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('13', '3', '1', '-1');
INSERT INTO keke_witkey_priv_rule VALUES ('14', '3', '2', '-1');
INSERT INTO keke_witkey_priv_rule VALUES ('15', '3', '3', '-1');
INSERT INTO keke_witkey_priv_rule VALUES ('16', '3', '4', '-1');
INSERT INTO keke_witkey_priv_rule VALUES ('17', '3', '5', '-1');
INSERT INTO keke_witkey_priv_rule VALUES ('19', '4', '1', '-1');
INSERT INTO keke_witkey_priv_rule VALUES ('20', '4', '2', '-1');
INSERT INTO keke_witkey_priv_rule VALUES ('21', '4', '3', '-1');
INSERT INTO keke_witkey_priv_rule VALUES ('22', '4', '4', '-1');
INSERT INTO keke_witkey_priv_rule VALUES ('23', '4', '5', '-1');
INSERT INTO keke_witkey_priv_rule VALUES ('25', '5', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('26', '5', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('27', '5', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('28', '5', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('29', '5', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('145', '49', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('147', '59', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('148', '59', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('149', '59', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('49', '7', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('50', '7', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('51', '7', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('52', '7', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('53', '7', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('55', '8', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('56', '8', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('57', '8', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('58', '8', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('59', '8', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('140', '57', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('142', '49', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('143', '49', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('144', '49', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('67', '9', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('68', '9', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('69', '9', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('70', '9', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('71', '9', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('73', '10', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('74', '10', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('75', '10', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('76', '10', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('77', '10', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('136', '57', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('137', '57', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('138', '57', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('139', '57', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('85', '11', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('86', '11', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('87', '11', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('88', '11', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('89', '11', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('115', '6', '1', '2');
INSERT INTO keke_witkey_priv_rule VALUES ('116', '6', '2', '2');
INSERT INTO keke_witkey_priv_rule VALUES ('117', '6', '3', '2');
INSERT INTO keke_witkey_priv_rule VALUES ('118', '6', '4', '2');
INSERT INTO keke_witkey_priv_rule VALUES ('119', '6', '5', '2');
INSERT INTO keke_witkey_priv_rule VALUES ('130', '52', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('131', '52', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('132', '52', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('133', '52', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('134', '52', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('121', '12', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('122', '12', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('123', '12', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('124', '12', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('125', '12', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('126', '12', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('127', '49', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('128', '50', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('129', '51', '1', '1');
INSERT INTO keke_witkey_priv_rule VALUES ('150', '59', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('151', '59', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('152', '59', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('153', '58', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('154', '58', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('155', '58', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('156', '58', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('157', '58', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('158', '58', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('159', '60', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('160', '60', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('161', '60', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('162', '60', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('163', '60', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('165', '61', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('166', '61', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('167', '61', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('168', '61', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('169', '61', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('170', '61', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('171', '62', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('172', '62', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('173', '62', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('174', '62', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('175', '62', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('176', '62', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('177', '63', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('178', '63', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('179', '63', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('180', '63', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('181', '63', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('182', '63', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('183', '64', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('184', '64', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('185', '64', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('186', '64', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('187', '64', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('189', '65', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('190', '65', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('191', '65', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('192', '65', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('193', '65', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('195', '66', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('196', '66', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('197', '66', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('198', '66', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('199', '66', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('200', '67', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('201', '67', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('202', '67', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('203', '67', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('204', '67', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('205', '68', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('206', '68', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('207', '68', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('208', '68', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('209', '68', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('210', '69', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('211', '69', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('212', '69', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('213', '69', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('214', '69', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('215', '1', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('217', '2', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('220', '3', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('222', '4', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('292', '6', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('224', '5', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('294', '51', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('226', '7', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('295', '51', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('228', '8', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('296', '51', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('230', '9', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('297', '51', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('232', '10', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('298', '51', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('234', '11', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('300', '50', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('299', '50', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('301', '50', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('238', '49', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('302', '50', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('240', '52', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('241', '57', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('303', '50', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('248', '60', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('252', '62', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('253', '63', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('256', '64', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('258', '65', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('260', '66', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('262', '67', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('264', '68', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('266', '69', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('268', '70', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('269', '70', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('270', '70', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('271', '70', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('272', '70', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('273', '70', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('293', '71', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('275', '71', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('276', '71', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('277', '71', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('278', '71', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('279', '71', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('280', '72', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('281', '72', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('282', '72', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('283', '72', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('284', '72', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('285', '72', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('286', '73', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('287', '73', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('288', '73', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('289', '73', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('290', '73', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('291', '73', '6', '0');

-- ----------------------------
-- Table structure for `keke_witkey_prom_event`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_prom_event`;
CREATE TABLE `keke_witkey_prom_event` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_desc` varchar(250) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `parent_uid` int(11) DEFAULT NULL,
  `parent_username` varchar(20) DEFAULT NULL,
  `obj_id` int(11) DEFAULT NULL,
  `rake_cash` decimal(10,2) DEFAULT '0.00',
  `rake_credit` decimal(10,2) DEFAULT '0.00',
  `event_status` tinyint(1) DEFAULT NULL,
  `event_time` int(10) DEFAULT NULL,
  `action` char(20) DEFAULT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_prom_event
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_prom_item`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_prom_item`;
CREATE TABLE `keke_witkey_prom_item` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_type` char(20) DEFAULT NULL,
  `prom_type` char(20) DEFAULT NULL,
  `obj_id` int(11) DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `item_pic` varchar(200) DEFAULT NULL,
  `item_content` text,
  `on_time` int(10) DEFAULT NULL,
  PRIMARY KEY (`item_id`),
  KEY `item_id` (`item_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_prom_item
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_prom_relation`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_prom_relation`;
CREATE TABLE `keke_witkey_prom_relation` (
  `relation_id` int(11) NOT NULL AUTO_INCREMENT,
  `prom_type` char(20) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `prom_uid` int(11) DEFAULT NULL,
  `prom_username` varchar(20) DEFAULT NULL,
  `relation_status` int(1) DEFAULT '0',
  `on_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`relation_id`),
  KEY `relation_id` (`relation_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_prom_relation
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_prom_rule`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_prom_rule`;
CREATE TABLE `keke_witkey_prom_rule` (
  `prom_id` int(11) NOT NULL AUTO_INCREMENT,
  `prom_item` varchar(50) DEFAULT NULL,
  `prom_code` varchar(30) DEFAULT NULL,
  `month` int(2) DEFAULT NULL,
  `cash` decimal(10,2) DEFAULT '0.00',
  `credit` decimal(10,2) DEFAULT '0.00',
  `rate` int(10) DEFAULT NULL,
  `config` text,
  `is_open` int(1) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`prom_id`),
  KEY `prom_id` (`prom_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_prom_rule
-- ----------------------------
INSERT INTO keke_witkey_prom_rule VALUES ('5', '邀请注册', 'reg', '20', '0.00', '0.00', null, 'a:1:{s:9:\"auth_step\";s:10:\"email_auth\";}', '1', 'reg');
INSERT INTO keke_witkey_prom_rule VALUES ('1', '实名认证', 'realname_auth', '20', '2.00', '5.00', null, null, '1', 'auth');
INSERT INTO keke_witkey_prom_rule VALUES ('2', '手机认证', 'mobile_auth', '20', '50.00', '50.00', null, null, '2', 'auth');
INSERT INTO keke_witkey_prom_rule VALUES ('3', '发布推广', 'pub_task', '40', '4.00', '4.00', '10', 'a:3:{s:5:\"model\";s:7:\"2,3,5,1\";s:18:\"pub_task_rake_type\";s:1:\"1\";s:13:\"pub_task_rate\";d:10;}', '1', 'task');
INSERT INTO keke_witkey_prom_rule VALUES ('4', '任务承接', 'bid_task', '2', null, null, '10', 'a:2:{s:5:\"model\";s:3:\"2,1\";s:13:\"bid_task_rake\";i:10;}', '1', 'task');
INSERT INTO keke_witkey_prom_rule VALUES ('6', '企业认证', 'enterprise_auth', '20', '5.00', '3.00', null, null, '2', 'auth');
INSERT INTO keke_witkey_prom_rule VALUES ('8', '银行认证', 'bank_auth', '20', '1.00', '5.00', null, null, '2', 'auth');
INSERT INTO keke_witkey_prom_rule VALUES ('9', '邮箱认证', 'email_auth', '20', '10.00', '20.00', null, null, '2', 'auth');
INSERT INTO keke_witkey_prom_rule VALUES ('10', '商品宣传', 'service', '3', null, null, '10', 'a:1:{s:5:\"model\";s:3:\"6,7\";}', '1', 'service');

-- ----------------------------
-- Table structure for `keke_witkey_report`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_report`;
CREATE TABLE `keke_witkey_report` (
  `report_id` int(11) NOT NULL AUTO_INCREMENT,
  `obj` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `obj_id` int(11) DEFAULT NULL,
  `origin_id` int(11) DEFAULT NULL,
  `front_status` char(20) CHARACTER SET utf8 DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `user_type` int(1) DEFAULT NULL,
  `to_uid` int(11) DEFAULT NULL,
  `to_username` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `is_hide` tinyint(1) DEFAULT NULL,
  `report_desc` text CHARACTER SET utf8,
  `report_file` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `report_status` int(11) DEFAULT '0',
  `on_time` int(10) DEFAULT NULL,
  `report_type` tinyint(1) DEFAULT NULL,
  `op_uid` int(11) DEFAULT NULL,
  `op_username` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `op_result` text CHARACTER SET utf8,
  `op_time` int(10) DEFAULT NULL,
  `phone` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `qq` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`report_id`),
  KEY `report_id` (`report_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_report
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_resource`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_resource`;
CREATE TABLE `keke_witkey_resource` (
  `resource_id` int(11) NOT NULL AUTO_INCREMENT,
  `resource_name` varchar(20) DEFAULT NULL,
  `resource_url` varchar(100) DEFAULT NULL,
  `submenu_id` varchar(20) DEFAULT NULL,
  `listorder` int(11) DEFAULT '0',
  PRIMARY KEY (`resource_id`),
  KEY `resource_id` (`resource_id`),
  KEY `submenu_id` (`submenu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=147 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_resource
-- ----------------------------
INSERT INTO keke_witkey_resource VALUES ('2', '支付接口', 'index.php?do=config&view=pay', '28', '5');
INSERT INTO keke_witkey_resource VALUES ('3', '财务分析', 'index.php?do=finance&view=report', '2', '2');
INSERT INTO keke_witkey_resource VALUES ('4', '财务明细', 'index.php?do=finance&view=all', '2', '1');
INSERT INTO keke_witkey_resource VALUES ('5', '提现审核', 'index.php?do=finance&view=withdraw', '2', '5');
INSERT INTO keke_witkey_resource VALUES ('6', '行业添加', 'index.php?do=task&view=industry_edit', '5', '2');
INSERT INTO keke_witkey_resource VALUES ('7', '行业管理', 'index.php?do=task&view=industry', '5', '1');
INSERT INTO keke_witkey_resource VALUES ('8', '技能管理', 'index.php?do=task&view=skill&op=list', '5', '3');
INSERT INTO keke_witkey_resource VALUES ('9', '任务留言', 'index.php?do=task&view=comment', '37', '0');
INSERT INTO keke_witkey_resource VALUES ('10', '添加用户', 'index.php?do=user&view=add', '7', '1');
INSERT INTO keke_witkey_resource VALUES ('11', '用户管理', 'index.php?do=user&view=list', '7', '2');
INSERT INTO keke_witkey_resource VALUES ('12', '添加系统组', 'index.php?do=user&view=group_add&op=add', '8', '0');
INSERT INTO keke_witkey_resource VALUES ('13', '系统组管理', 'index.php?do=user&view=group_list', '8', '0');
INSERT INTO keke_witkey_resource VALUES ('14', '分类管理', 'index.php?do=article&view=cat_list&type=art', '9', '3');
INSERT INTO keke_witkey_resource VALUES ('15', '文章添加', 'index.php?do=article&view=edit', '9', '2');
INSERT INTO keke_witkey_resource VALUES ('16', '文章管理', 'index.php?do=article&view=list', '9', '1');
INSERT INTO keke_witkey_resource VALUES ('19', '系统日志', 'index.php?do=tool&view=log', '10', '4');
INSERT INTO keke_witkey_resource VALUES ('20', '更新缓存', 'index.php?do=tool&view=cache&sbt_edit=1&ckb_obj_cache=1&ckb_tpl_cache=1', '10', '7');
INSERT INTO keke_witkey_resource VALUES ('21', '附件管理', 'index.php?do=tool&view=file', '10', '5');
INSERT INTO keke_witkey_resource VALUES ('22', '分类添加', 'index.php?do=article&view=cat_edit&type=art', '9', '4');
INSERT INTO keke_witkey_resource VALUES ('141', '地图接口', 'index.php?do=msg&view=map', '28', '2');
INSERT INTO keke_witkey_resource VALUES ('24', '技能添加', 'index.php?do=task&view=skill_edit', '5', '4');
INSERT INTO keke_witkey_resource VALUES ('77', '手机认证', 'index.php?do=auth&view=list&auth_code=mobile', '29', '4');
INSERT INTO keke_witkey_resource VALUES ('140', '微博关注', 'index.php?do=msg&view=attention', '0', '2');
INSERT INTO keke_witkey_resource VALUES ('28', '模板管理', 'index.php?do=config&view=tpl', '12', '1');
INSERT INTO keke_witkey_resource VALUES ('29', '标签管理', 'index.php?do=tpl&view=taglist', '12', '2');
INSERT INTO keke_witkey_resource VALUES ('30', '友情链接', 'index.php?do=tpl&view=link', '12', '3');
INSERT INTO keke_witkey_resource VALUES ('32', '广告管理', 'index.php?do=tpl&view=ad', '12', '4');
INSERT INTO keke_witkey_resource VALUES ('33', '客服管理', 'index.php?do=user&view=custom_list', '7', '20');
INSERT INTO keke_witkey_resource VALUES ('34', '全局配置', 'index.php?do=config&view=basic&op=info', '1', '0');
INSERT INTO keke_witkey_resource VALUES ('35', '会员整合', 'index.php?do=config&view=integration', '1', '20');
INSERT INTO keke_witkey_resource VALUES ('36', '信誉规则', 'index.php?do=config&view=mark', '14', '1');
INSERT INTO keke_witkey_resource VALUES ('37', '模型管理', 'index.php?do=config&view=model', '1', '10');
INSERT INTO keke_witkey_resource VALUES ('38', '认证项目', 'index.php?do=auth&view=item_list', '29', '0');
INSERT INTO keke_witkey_resource VALUES ('40', '客服留言', 'index.php?do=task&view=custom', '371', '0');
INSERT INTO keke_witkey_resource VALUES ('41', '导航菜单', 'index.php?do=config&view=nav', '1', '100');
INSERT INTO keke_witkey_resource VALUES ('42', '帮助管理', 'index.php?do=article&view=list&type=help', '17', '0');
INSERT INTO keke_witkey_resource VALUES ('43', '帮助添加', 'index.php?do=article&view=edit&type=help', '17', '0');
INSERT INTO keke_witkey_resource VALUES ('44', '帮助分类', 'index.php?do=article&view=cat_list&type=help', '17', '0');
INSERT INTO keke_witkey_resource VALUES ('45', '分类添加', 'index.php?do=article&view=cat_edit&type=help', '17', '0');
INSERT INTO keke_witkey_resource VALUES ('46', '店铺主题', 'index.php?do=shop&view=banner', '20', '0');
INSERT INTO keke_witkey_resource VALUES ('47', '添加主题', 'index.php?do=shop&view=edit_banner', '20', '0');
INSERT INTO keke_witkey_resource VALUES ('49', '用户组', 'index.php?do=group', '22', '0');
INSERT INTO keke_witkey_resource VALUES ('52', '案例管理', 'index.php?do=case&view=list', '37', '0');
INSERT INTO keke_witkey_resource VALUES ('53', '单页管理', 'index.php?do=article&view=list&type=single', '24', '0');
INSERT INTO keke_witkey_resource VALUES ('54', '单页添加', 'index.php?do=article&view=edit&type=single', '24', '1');
INSERT INTO keke_witkey_resource VALUES ('139', '购买记录', 'index.php?do=payitem&view=buy', '34', '1');
INSERT INTO keke_witkey_resource VALUES ('138', '服务项管理', 'index.php?do=payitem', '34', '0');
INSERT INTO keke_witkey_resource VALUES ('57', '动态管理', 'index.php?do=tpl&view=feed', '12', '3');
INSERT INTO keke_witkey_resource VALUES ('58', '推广关系管理', 'index.php?do=prom&view=relation', '27', '5');
INSERT INTO keke_witkey_resource VALUES ('59', '推广配置管理', 'index.php?do=prom&view=config', '27', '1');
INSERT INTO keke_witkey_resource VALUES ('60', '推广素材管理', 'index.php?do=prom&view=item', '0', '2');
INSERT INTO keke_witkey_resource VALUES ('61', '推广财务管理', 'index.php?do=prom&view=event', '27', '6');
INSERT INTO keke_witkey_resource VALUES ('63', 'OAuth登录', 'index.php?do=msg&view=weibo', '28', '1');
INSERT INTO keke_witkey_resource VALUES ('66', '短信配置', 'index.php?do=msg&view=config', '28', '3');
INSERT INTO keke_witkey_resource VALUES ('67', '短信发送', 'index.php?do=msg&view=send', '0', '4');
INSERT INTO keke_witkey_resource VALUES ('68', '银行认证', 'index.php?do=auth&view=list&auth_code=bank', '29', '1');
INSERT INTO keke_witkey_resource VALUES ('69', '企业认证', 'index.php?do=auth&view=list&auth_code=enterprise', '29', '2');
INSERT INTO keke_witkey_resource VALUES ('70', '实名认证', 'index.php?do=auth&view=list&auth_code=realname', '29', '3');
INSERT INTO keke_witkey_resource VALUES ('71', '邮箱认证', 'index.php?do=auth&view=list&auth_code=email', '29', '4');
INSERT INTO keke_witkey_resource VALUES ('73', '短信模板', 'index.php?do=msg&view=internal', '28', '5');
INSERT INTO keke_witkey_resource VALUES ('76', '充值审核', 'index.php?do=finance&view=recharge', '2', '4');
INSERT INTO keke_witkey_resource VALUES ('78', '互评配置', 'index.php?do=config&view=mark&op=config', '14', '2');
INSERT INTO keke_witkey_resource VALUES ('79', '互评记录', 'index.php?do=config&view=mark&op=log', '14', '3');
INSERT INTO keke_witkey_resource VALUES ('80', '维权管理', 'index.php?do=trans&view=rights', '30', '1');
INSERT INTO keke_witkey_resource VALUES ('81', '举报管理', 'index.php?do=trans&view=report', '30', '2');
INSERT INTO keke_witkey_resource VALUES ('82', '投诉管理', 'index.php?do=trans&view=complaint', '30', '3');
INSERT INTO keke_witkey_resource VALUES ('133', '联盟API', 'index.php?do=keke&view=account', '33', '1');
INSERT INTO keke_witkey_resource VALUES ('134', '推广财务', 'index.php?do=keke&view=finance', '33', '2');
INSERT INTO keke_witkey_resource VALUES ('135', '获取任务', 'index.php?do=keke&view=gettask', '33', '3');
INSERT INTO keke_witkey_resource VALUES ('137', '提交任务', 'index.php?do=keke&view=posttask', '33', '4');
INSERT INTO keke_witkey_resource VALUES ('142', '数据库管理', 'index.php?do=tool&view=dbbackup', '10', '0');
INSERT INTO keke_witkey_resource VALUES ('146', '服务介绍', 'index.php?do=tool&view=payitem', '39', '1');

-- ----------------------------
-- Table structure for `keke_witkey_resource_submenu`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_resource_submenu`;
CREATE TABLE `keke_witkey_resource_submenu` (
  `submenu_id` int(11) NOT NULL AUTO_INCREMENT,
  `submenu_name` varchar(20) DEFAULT NULL,
  `menu_name` varchar(10) DEFAULT NULL,
  `listorder` int(11) DEFAULT '0',
  PRIMARY KEY (`submenu_id`),
  KEY `submenu_id` (`submenu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_resource_submenu
-- ----------------------------
INSERT INTO keke_witkey_resource_submenu VALUES ('1', '系统配置', 'config', '1');
INSERT INTO keke_witkey_resource_submenu VALUES ('2', '财务模块', 'finance', '0');
INSERT INTO keke_witkey_resource_submenu VALUES ('5', '行业技能', 'config', '2');
INSERT INTO keke_witkey_resource_submenu VALUES ('7', '用户管理', 'user', '0');
INSERT INTO keke_witkey_resource_submenu VALUES ('8', '系统组管理', 'user', '0');
INSERT INTO keke_witkey_resource_submenu VALUES ('9', '文章模块', 'article', '2');
INSERT INTO keke_witkey_resource_submenu VALUES ('10', '站长工具', 'tool', '1');
INSERT INTO keke_witkey_resource_submenu VALUES ('12', '模板标签', 'tool', '2');
INSERT INTO keke_witkey_resource_submenu VALUES ('14', '用户体系', 'user', '3');
INSERT INTO keke_witkey_resource_submenu VALUES ('17', '帮助模块', 'article', '3');
INSERT INTO keke_witkey_resource_submenu VALUES ('34', '增值服务', 'finance', '0');
INSERT INTO keke_witkey_resource_submenu VALUES ('24', '单页面管理', 'article', '5');
INSERT INTO keke_witkey_resource_submenu VALUES ('27', '本站推广', 'keke', '1');
INSERT INTO keke_witkey_resource_submenu VALUES ('28', '接口管理', 'config', '3');
INSERT INTO keke_witkey_resource_submenu VALUES ('29', '认证管理', 'user', '4');
INSERT INTO keke_witkey_resource_submenu VALUES ('30', '交易维权', 'user', '4');
INSERT INTO keke_witkey_resource_submenu VALUES ('33', '推广联盟', 'keke', '2');
INSERT INTO keke_witkey_resource_submenu VALUES ('37', '任务杂项', 'task', '8');
INSERT INTO keke_witkey_resource_submenu VALUES ('39', '增值服务', 'tool', '3');

-- ----------------------------
-- Table structure for `keke_witkey_service`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_service`;
CREATE TABLE `keke_witkey_service` (
  `service_id` int(11) NOT NULL AUTO_INCREMENT,
  `model_id` int(11) DEFAULT NULL,
  `service_type` int(11) DEFAULT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `profit_rate` int(3) DEFAULT NULL,
  `indus_id` int(11) DEFAULT NULL,
  `indus_pid` int(11) DEFAULT NULL,
  `indus_path` varchar(100) DEFAULT NULL,
  `cus_cate_id` int(11) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT '0.00',
  `unite_price` varchar(50) DEFAULT NULL,
  `service_time` int(255) DEFAULT NULL,
  `unit_time` varchar(50) DEFAULT NULL,
  `obj_name` varchar(100) DEFAULT NULL,
  `pic` varchar(255) DEFAULT '',
  `ad_pic` varchar(200) DEFAULT NULL,
  `area_range` varchar(100) DEFAULT NULL,
  `key_word` varchar(50) DEFAULT NULL,
  `submit_method` char(20) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `content` text,
  `on_time` int(11) DEFAULT NULL,
  `is_stop` int(11) DEFAULT '0',
  `sale_num` int(11) DEFAULT '0',
  `focus_num` int(11) DEFAULT '0',
  `mark_num` int(11) DEFAULT '0',
  `leave_num` int(11) DEFAULT '0',
  `views` int(11) DEFAULT '0',
  `pay_item` char(20) DEFAULT NULL,
  `att_cash` decimal(10,2) DEFAULT '0.00',
  `refresh_time` int(11) DEFAULT NULL,
  `unique_num` char(8) DEFAULT NULL,
  `total_sale` decimal(10,2) DEFAULT '0.00',
  `service_status` int(1) DEFAULT NULL,
  `is_top` int(1) DEFAULT '0',
  `point` char(20) DEFAULT NULL,
  `city` char(20) DEFAULT NULL,
  `payitem_time` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`service_id`),
  KEY `indus_id` (`indus_id`),
  KEY `shop_id` (`shop_id`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_service
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_service_order`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_service_order`;
CREATE TABLE `keke_witkey_service_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `model_id` int(11) DEFAULT NULL,
  `sale_uid` int(11) DEFAULT NULL,
  `sale_username` varchar(20) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `service_type` int(11) DEFAULT NULL,
  `on_time` int(11) DEFAULT NULL,
  `count_cash` float DEFAULT NULL,
  `pay_cash` float DEFAULT NULL,
  `clr_cash` float DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `sale_status` int(11) DEFAULT NULL,
  `buyer_status` varchar(20) DEFAULT NULL,
  `order_status` int(11) DEFAULT NULL,
  `buy_username` varchar(20) DEFAULT NULL,
  `buy_uid` int(11) DEFAULT NULL,
  `cost_cash` float(10,2) DEFAULT NULL,
  `cost_credit` float(10,2) DEFAULT NULL,
  `order_num` char(8) DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `buy_uid` (`buy_uid`),
  KEY `order_status` (`order_status`),
  KEY `sale_uid` (`sale_uid`),
  KEY `shop_id` (`model_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_service_order
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_service_order_detail`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_service_order_detail`;
CREATE TABLE `keke_witkey_service_order_detail` (
  `detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `step_num` int(11) DEFAULT NULL,
  `step_cash` float(10,2) DEFAULT NULL,
  `step_detail` varchar(200) DEFAULT NULL,
  `step_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`detail_id`),
  KEY `detail_id` (`detail_id`),
  KEY `order_id` (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_service_order_detail
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_session`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_session`;
CREATE TABLE `keke_witkey_session` (
  `session_id` char(100) NOT NULL,
  `session_expirse` int(10) DEFAULT NULL,
  `session_data` text,
  `session_ip` char(15) DEFAULT NULL,
  `session_uid` int(11) DEFAULT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_session
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_shop`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_shop`;
CREATE TABLE `keke_witkey_shop` (
  `shop_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `shop_type` int(1) DEFAULT NULL,
  `indus_pid` int(11) DEFAULT NULL,
  `shop_name` varchar(100) DEFAULT NULL,
  `service_range` varchar(50) DEFAULT NULL,
  `shop_desc` text,
  `work` varchar(100) DEFAULT NULL,
  `work_year` int(2) DEFAULT NULL,
  `keyword` varchar(100) DEFAULT NULL,
  `shop_background` varchar(100) DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `banner` text,
  `shop_slogans` varchar(255) DEFAULT NULL,
  `shop_skin` char(20) DEFAULT NULL,
  `shop_backstyle` varchar(255) DEFAULT NULL,
  `shop_font` char(20) DEFAULT NULL,
  `shop_active` char(20) DEFAULT NULL,
  `is_close` int(1) DEFAULT NULL,
  `views` int(11) DEFAULT '0',
  `focus_num` int(11) DEFAULT '0',
  `on_time` int(11) DEFAULT NULL,
  `homebanner` text,
  PRIMARY KEY (`shop_id`),
  KEY `shop_id` (`shop_id`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_shop
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_shop_case`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_shop_case`;
CREATE TABLE `keke_witkey_shop_case` (
  `case_id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_id` int(11) DEFAULT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `indus_id` int(11) DEFAULT NULL,
  `case_type` int(1) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `case_name` varchar(100) DEFAULT NULL,
  `case_desc` text,
  `case_pic` varchar(100) DEFAULT NULL,
  `case_url` varchar(200) DEFAULT NULL,
  `start_time` int(11) DEFAULT NULL,
  `end_time` int(11) DEFAULT NULL,
  `on_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`case_id`),
  KEY `case_id` (`case_id`),
  KEY `shop_id` (`shop_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_shop_case
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_shop_cate`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_shop_cate`;
CREATE TABLE `keke_witkey_shop_cate` (
  `cate_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` char(20) DEFAULT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `cate_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`cate_id`),
  KEY `cate_id` (`cate_id`),
  KEY `shop_id` (`shop_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_shop_cate
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_shop_member`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_shop_member`;
CREATE TABLE `keke_witkey_shop_member` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_id` int(11) DEFAULT NULL,
  `truename` varchar(50) DEFAULT NULL,
  `member_pic` varchar(50) DEFAULT NULL,
  `member_job` varchar(50) DEFAULT NULL,
  `entry_age` int(11) DEFAULT NULL,
  `top_eduction` varchar(50) DEFAULT NULL,
  `school` varchar(50) DEFAULT NULL,
  `member_desc` text,
  PRIMARY KEY (`member_id`),
  KEY `member_id` (`member_id`),
  KEY `shop_id` (`shop_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_shop_member
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_shortcuts`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_shortcuts`;
CREATE TABLE `keke_witkey_shortcuts` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `resource_id` int(4) DEFAULT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_shortcuts
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_skill`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_skill`;
CREATE TABLE `keke_witkey_skill` (
  `skill_id` int(11) NOT NULL AUTO_INCREMENT,
  `indus_id` int(11) DEFAULT '0',
  `skill_name` varchar(50) DEFAULT NULL,
  `listorder` int(11) DEFAULT '0',
  `on_time` int(11) DEFAULT '0',
  PRIMARY KEY (`skill_id`)
) ENGINE=MyISAM AUTO_INCREMENT=108 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_skill
-- ----------------------------
INSERT INTO keke_witkey_skill VALUES ('107', '1', '订单', '0', '1330412414');
INSERT INTO keke_witkey_skill VALUES ('40', '26', 'asp.net', '4', '1322184227');
INSERT INTO keke_witkey_skill VALUES ('41', '26', 'flex', '5', '1322184247');
INSERT INTO keke_witkey_skill VALUES ('42', '27', 'Photoshop', '1', '1323999362');
INSERT INTO keke_witkey_skill VALUES ('43', '28', 'div+css', '0', '1322184297');
INSERT INTO keke_witkey_skill VALUES ('44', '28', 'jquery', '1', '1322184309');
INSERT INTO keke_witkey_skill VALUES ('45', '29', 'php', '0', '1322184328');
INSERT INTO keke_witkey_skill VALUES ('47', '31', 'ajax', '0', '1322184367');
INSERT INTO keke_witkey_skill VALUES ('48', '33', 'sqlserver', '0', '1322184389');
INSERT INTO keke_witkey_skill VALUES ('49', '33', 'oracle', '1', '1322184408');
INSERT INTO keke_witkey_skill VALUES ('50', '33', 'mysql', '2', '1322184420');
INSERT INTO keke_witkey_skill VALUES ('51', '34', 'vb.net', '0', '1322184441');
INSERT INTO keke_witkey_skill VALUES ('52', '34', 'java', '1', '1322184459');
INSERT INTO keke_witkey_skill VALUES ('53', '35', 'linux', '0', '1322184477');
INSERT INTO keke_witkey_skill VALUES ('54', '35', 'fedora', '1', '1322184498');
INSERT INTO keke_witkey_skill VALUES ('55', '35', 'centos', '2', '1322184511');
INSERT INTO keke_witkey_skill VALUES ('56', '35', 'redhat', '3', '1322184536');
INSERT INTO keke_witkey_skill VALUES ('65', '36', '高级php', '5', '1322186604');
INSERT INTO keke_witkey_skill VALUES ('66', '36', '高级java', '0', '1322185790');
INSERT INTO keke_witkey_skill VALUES ('67', '36', 'OpenGL编程', '1', '1322186350');
INSERT INTO keke_witkey_skill VALUES ('69', '36', 'jsp', '3', '1322186539');
INSERT INTO keke_witkey_skill VALUES ('70', '36', 'PHP Web', '4', '1322186568');
INSERT INTO keke_witkey_skill VALUES ('71', '36', 'apache', '6', '1322186676');
INSERT INTO keke_witkey_skill VALUES ('72', '36', 'iis', '7', '1322186692');
INSERT INTO keke_witkey_skill VALUES ('73', '36', 'Python', '8', '1322186982');
INSERT INTO keke_witkey_skill VALUES ('74', '37', 'json', '0', '1322188517');
INSERT INTO keke_witkey_skill VALUES ('75', '37', 'xml', '1', '1322188532');
INSERT INTO keke_witkey_skill VALUES ('76', '37', 'Xhtml', '2', '1322188627');
INSERT INTO keke_witkey_skill VALUES ('77', '38', 'ui设计', '0', '1322188649');
INSERT INTO keke_witkey_skill VALUES ('80', '123', 'VB', '0', '1322188731');
INSERT INTO keke_witkey_skill VALUES ('81', '123', 'C语言', '1', '1322188746');
INSERT INTO keke_witkey_skill VALUES ('82', '123', 'Builder/Dephi', '2', '1322188780');
INSERT INTO keke_witkey_skill VALUES ('83', '125', 'ps技术', '0', '1322188835');
INSERT INTO keke_witkey_skill VALUES ('84', '130', '字体设计', '0', '1322188897');
INSERT INTO keke_witkey_skill VALUES ('85', '131', '贺卡设计', '0', '1322188912');
INSERT INTO keke_witkey_skill VALUES ('86', '132', '礼品设计', '0', '1322188928');
INSERT INTO keke_witkey_skill VALUES ('87', '133', '表情设计', '0', '1322188951');
INSERT INTO keke_witkey_skill VALUES ('88', '138', 'ppt设计', '0', '1322188979');
INSERT INTO keke_witkey_skill VALUES ('89', '148', '排版布局', '0', '1322189011');
INSERT INTO keke_witkey_skill VALUES ('90', '154', '网店取名', '0', '1322189029');
INSERT INTO keke_witkey_skill VALUES ('91', '156', '摄影技术', '0', '1329449538');

-- ----------------------------
-- Table structure for `keke_witkey_space`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_space`;
CREATE TABLE `keke_witkey_space` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `sec_code` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `user_pic` varchar(100) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `isvip` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `user_type` varchar(50) DEFAULT NULL,
  `sex` char(10) DEFAULT NULL,
  `marry` char(10) DEFAULT NULL,
  `hometown` char(10) DEFAULT NULL,
  `residency` varchar(30) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `truename` char(20) DEFAULT NULL,
  `idcard` varchar(20) DEFAULT NULL,
  `idpic` varchar(100) DEFAULT NULL,
  `qq` varchar(20) DEFAULT NULL,
  `msn` varchar(50) DEFAULT NULL,
  `fax` varchar(20) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `indus_id` int(11) DEFAULT NULL,
  `indus_pid` int(11) DEFAULT NULL,
  `skill_ids` varchar(150) DEFAULT NULL,
  `summary` text,
  `experience` text,
  `reg_time` int(11) DEFAULT NULL,
  `reg_ip` varchar(20) DEFAULT NULL,
  `domain` varchar(50) DEFAULT NULL,
  `credit` decimal(11,2) DEFAULT '0.00',
  `balance` decimal(11,2) DEFAULT '0.00',
  `balance_status` int(11) DEFAULT NULL,
  `pub_num` int(11) DEFAULT '0',
  `take_num` int(11) DEFAULT '0',
  `nominate_num` int(11) DEFAULT '0',
  `accepted_num` int(11) DEFAULT '0',
  `vip_start_time` int(11) DEFAULT NULL,
  `vip_end_time` int(11) DEFAULT NULL,
  `pay_zfb` varchar(100) DEFAULT NULL,
  `pay_cft` varchar(100) DEFAULT NULL,
  `pay_bank` text,
  `score` int(11) DEFAULT NULL,
  `buyer_credit` int(11) DEFAULT '0',
  `buyer_good_num` int(11) DEFAULT '0',
  `buyer_level` text,
  `buyer_total_num` int(11) DEFAULT '0',
  `seller_credit` int(11) DEFAULT '0',
  `seller_good_num` int(11) DEFAULT '0',
  `seller_level` text,
  `seller_total_num` int(11) DEFAULT '0',
  `studio_id` int(11) DEFAULT NULL,
  `last_login_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_space
-- ----------------------------
INSERT INTO keke_witkey_space VALUES ('1', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '55cd560ab6d996cd9d3ffb7b00cd0471', 'admin@admin.com', null, '1', null, '1', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '1338879927', null, null, '0.00', '0.00', null, '0', '0', '0', '0', null, null, null, null, null, null, '0', '0', null, '0', '0', '0', null, '0', null, null);

-- ----------------------------
-- Table structure for `keke_witkey_system_log`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_system_log`;
CREATE TABLE `keke_witkey_system_log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `log_type` int(11) DEFAULT '0',
  `uid` int(11) DEFAULT '0',
  `username` varchar(50) DEFAULT NULL,
  `user_type` int(11) DEFAULT NULL,
  `log_content` varchar(250) DEFAULT NULL,
  `log_ip` char(15) DEFAULT NULL,
  `log_time` int(11) DEFAULT '0',
  PRIMARY KEY (`log_id`),
  KEY `log_time` (`log_time`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_system_log
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_tag`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_tag`;
CREATE TABLE `keke_witkey_tag` (
  `tag_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tagname` varchar(50) DEFAULT NULL,
  `tag_type` int(11) DEFAULT NULL,
  `task_type` int(11) DEFAULT NULL,
  `task_indus_id` int(11) DEFAULT NULL,
  `task_indus_ids` varchar(100) DEFAULT NULL,
  `task_status` int(11) DEFAULT NULL,
  `start_time1` int(11) DEFAULT NULL,
  `start_time2` int(11) DEFAULT NULL,
  `end_time1` int(11) DEFAULT NULL,
  `end_time2` int(11) DEFAULT NULL,
  `left_day` int(11) DEFAULT NULL,
  `left_hour` int(11) DEFAULT NULL,
  `task_cash1` int(11) DEFAULT NULL,
  `task_cash2` int(11) DEFAULT NULL,
  `prom_cash1` int(11) DEFAULT NULL,
  `prom_cash2` int(11) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `task_ids` varchar(100) DEFAULT NULL,
  `open_is_top` int(11) DEFAULT NULL,
  `listorder` int(11) DEFAULT NULL,
  `art_cat_id` int(11) DEFAULT NULL,
  `art_cat_ids` varchar(100) DEFAULT NULL,
  `art_iscommend` int(11) DEFAULT NULL,
  `art_hasimg` int(11) DEFAULT NULL,
  `art_time1` int(11) DEFAULT NULL,
  `art_time2` int(11) DEFAULT NULL,
  `art_ids` varchar(100) DEFAULT NULL,
  `loadcount` int(11) DEFAULT NULL,
  `perpage` int(11) DEFAULT NULL,
  `tplname` varchar(20) DEFAULT NULL,
  `cat_type` int(11) DEFAULT NULL,
  `cat_cat_id` int(11) DEFAULT NULL,
  `cat_cat_ids` varchar(100) DEFAULT NULL,
  `cat_loadsub` int(11) DEFAULT NULL,
  `cat_onlyrecommend` int(11) DEFAULT NULL,
  `tag_sql` text,
  `code` text,
  `cache_time` int(11) DEFAULT NULL,
  `tag_code` text,
  `tpl_type` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`tag_id`),
  UNIQUE KEY `tagname` (`tagname`),
  KEY `tag_id` (`tag_id`),
  KEY `cat_cat_id` (`cat_cat_id`),
  KEY `cache_time` (`cache_time`)
) ENGINE=MyISAM AUTO_INCREMENT=156 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_tag
-- ----------------------------
INSERT INTO keke_witkey_tag VALUES ('132', '网站安全', '2', null, null, null, null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null, null, null, '0', '203', null, '0', '0', '0', '0', '', '4', null, null, '2', null, '', '0', '0', null, null, '3600', '{loop $datalist $v}\r\n<li><a href=\"index.php?do=article&view=article_info&art_id={$v[id]}\">{$v[title]}</a></li>\r\n{/loop}', 'default');
INSERT INTO keke_witkey_tag VALUES ('153', '热门活动', '5', null, null, null, null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null, null, null, null, null, null, '0', '0', '0', '0', null, '9', null, null, '2', null, null, '0', '0', null, '<div class=\"pb_5\">  <a href=\"#\"><img src=\"resource/img/system/adv.jpg\" alt=\"\" height=\"90\" width=\"165\" /></a></div><div class=\"clearfix\"><ul class=\"small_list clearfix\"><li><div class=\"item clearfix\"><a title=\"网站活动\" href=\"#\">网站活动</a></div></li><li><div class=\"item clearfix\"><a title=\"网站活动\" href=\"#\">网站活动</a></div></li><li><div class=\"item clearfix\"><a title=\"网站活动\" href=\"#\">网站活动</a></div></li><li><div class=\"item clearfix\"><a title=\"网站活动\" href=\"#\">网站活动</a></div></li><li><div class=\"item clearfix\"><a title=\"网站活动\" href=\"#\">网站活动</a></div></li></ul></div>', '666', null, 'default,orange,red');
INSERT INTO keke_witkey_tag VALUES ('154', '注册协议', '5', null, null, null, null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null, null, null, null, null, null, '0', '0', '0', '0', null, '9', null, null, '2', null, null, '0', '0', null, '注册协议注册协议注册协议注册协议注册协议注册协议注册协议注册协议注册协议注册协议注册协议注册协议注册协议注册协议注册协议注册协议<br />', '3600', null, 'default');
INSERT INTO keke_witkey_tag VALUES ('42', '搜索页热门搜索', '5', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '', '0', '0', '0', '0', '', '0', '0', '', '0', '0', '', '0', '0', '', '<li><a href=\"javascript:;\" onclick=\"hotsearch_f(this.innerHTML)\">logo设计</a></li><li><a href=\"javascript:;\" onclick=\"hotsearch_f(this.innerHTML)\">装修</a></li><li><a href=\"javascript:;\" onclick=\"hotsearch_f(this.innerHTML)\">网站建设</a></li><li><a href=\"javascript:;\" onclick=\"hotsearch_f(this.innerHTML)\">发帖</a></li><li><a href=\"javascript:;\" onclick=\"hotsearch_f(this.innerHTML)\">推广</a></li><li><a href=\"javascript:;\" onclick=\"hotsearch_f(this.innerHTML)\">网页设计</a></li><li><a href=\"javascript:;\" onclick=\"hotsearch_f(this.innerHTML)\">网络评论员</a></li>', '0', null, 'default,red,blue,orange');
INSERT INTO keke_witkey_tag VALUES ('131', '网站提现', '2', null, null, null, null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null, null, null, '0', '297', null, '0', '0', '0', '0', '', '4', null, null, '2', null, '', '0', '0', null, null, '3600', '{loop $datalist $v}\r\n<li><a href=\"index.php?do=article&view=article_info&art_id={$v[id]}\">{$v[title]}</a></li>\r\n{/loop}', 'default');
INSERT INTO keke_witkey_tag VALUES ('53', '文件交付协议', '5', null, null, null, null, '0', '0', '0', '0', null, null, null, null, null, null, null, null, null, null, null, null, '0', '0', '0', '0', null, null, null, null, null, null, null, '0', '0', '', '<p><span style=\"font-family:Arial;\">一、关于任务的规定 <br />1、甲方在威客网站发布任务　　<br /></span><span style=\"font-family:Arial;\">　　　　　　&nbsp;&nbsp;&nbsp;&nbsp; <br /></span><span style=\"font-family:Arial;\">二、甲方的权利义务 <br />1、甲方在发布任务期间，确定乙方稿件为中标稿件，乙方有义务将稿件的源文件及生成效果图及时转交给威客网网，威客网收到源文件后交给甲方，甲方收到源文件后，通知威客网将悬赏任务赏金的80%，支付给乙方。 <br />2、甲方选中乙方的中标稿件并在威客网向乙方支付任务赏金后，即拥有该稿件的知识产权。 <br />3、甲方有权对已支付任务赏金的中标稿件进行复制、发行、出租、展览、表演、放映、广播、网络传播、摄制、改编、翻译、汇编以及应当由著作权人享有的其他权利。其他任何单位和个人不得侵犯甲方上述权利，否则，甲方有权追究其法律责任。 <br />4、甲方有权利向国家知识产权部门申请知识产权保护，如果中标稿件被采用投产，获奖者将有优先权进行产品的细化设计，并获取相应的报酬。 <br />5、甲方在威客网向乙方支付任务赏金后，可以要求乙方对中标稿件进行适当修改，修改报酬由甲乙双方自由商定。 </span></p><p><span style=\"font-family:Arial;\">三、乙方的权利义务 <br />甲方在任务中确定的乙方中标稿件应符合以下规定。否则，由乙方承担该稿件引起的任何法律责任，与甲方无关： <br />1、中标稿件不得违反国家关于知识产权的法律法规的相关规定； <br />2、中标稿件应为原创，此前未以任何形式发表，不属于公开稿件； <br />3、中标稿件应明显区别于中国或者其他任何国家或地区的各类活动或组织的标志； <br />4、中标稿件或任何用于创作参选稿件的素材均不得侵犯第三方的专利权、著作权、商标权或其他任何专有权利； <br />5、中标稿件交付后，其知识产权归甲方所有； <br />6、中标稿件不得含有任何涉嫌民族歧视、宗教歧视、威胁国家间睦邻友好关系以及其他有悖于社会道德风尚的内容。 </span></p><p><span style=\"font-family:Arial;\">四、关于知识产权纠纷的处理 <br />1、甲、乙双方签订本协议即表示双方同意以上条款，同时接受威客网关于知识产权的声明。 <br />2、如果甲方因该中标稿件侵犯了其他任何第三人的权利而遭到损失，有权利向乙方追偿。 <br />3、本协议一式两份，甲、乙双方各保存一份。 <br />4、本协议自甲乙双方签定之日起生效（在网上点击确认的视为签订本协议）。</span></p>', null, null, 'default,red,blue,orange');
INSERT INTO keke_witkey_tag VALUES ('54', '威客交稿协议', '5', null, null, null, null, '0', '0', '0', '0', null, null, null, null, null, null, null, null, null, null, null, null, '0', '0', '0', '0', null, null, null, null, null, null, null, '0', '0', '', '<p><span style=\"font-family:Arial;\">一、本网站仅为会员提供一个信息交流平台，是买家发布任务需求和卖家提供解决方案的一个交易市场，本网站对交易双方均不加以监视或控制，亦不介入交易的过程。</span></p><p><span style=\"font-family:Arial;\">二、本网站有义务在现有技术水平的基础上努力确保整个网上交流平台的正常运行，尽力避免服务中断或将中断时间限制在最短时间内，保证会员网上交流活动的顺利进行。　 </span></p><p><span style=\"font-family:Arial;\">三、本网站有义务对会员在注册使用本网站信息平台中所遇到的与交易或注册有关的问题及反映的情况及时作出回复。　 　<br />&nbsp;&nbsp;&nbsp; 四、本网站有权对会员的注册资料进行审查，对存在任何问题或怀疑的注册资料，本网站有权发出通知询问会员并要求会员做出解释、改正。　 　 <br />&nbsp;&nbsp;&nbsp; 五、会员因在本网站网上交易与其他会员产生纠纷的，会员将纠纷告知本网站，或本网站知悉纠纷情况的，经审核后，本网站有权通过电子邮件及电话联系向纠纷双方了解纠纷情况，并将所了解的情况通过电子邮件互相通知对方；会员通过司法机关依照法定程序要求本网站提供相关资料，本网站将积极配合并提供有关资料。　　</span></p><p><span style=\"font-family:Arial;\">六、因网上信息平台的特殊性，本网站没有义务对所有会员的交易行为以及与交易有关的其他事项进行事先审查，但如发生以下情形，本网站有权无需征得会员的同意限制会员的活动、向会员核实有关资料、发出警告通知、暂时中止、无限期中止及拒绝向该会员提供服务：<br />&nbsp;&nbsp; （一）、会员违反本协议或因被提及而纳入本协议的相关规则；　　<br />&nbsp;&nbsp; （二）、存在会员或其他第三方通知本网站，认为某个会员或具体交易事项存在违法或不当行为，并提供相关证据，而本网站无法联系到该会员核证或验证该会员向本网站提供的任何资料；　　 <br />&nbsp;&nbsp; （三）、存在会员或其他第三方通知本网站，认为某个会员或具体交易事项存在违法或不当行为，并提供相关证据。本网站以普通非专业交易者的知识水平标准对相关内容进行判别，可以明显认为这些内容或行为可能对本网站会员或本网站造成财务损失或法律责任。　 　<br />&nbsp;&nbsp;&nbsp; 七、根据国家法律、法规、行政规章规定、本协议的内容和本网站所掌握的事实依据，可以认定该会员存在违法或违反本协议行为以及在本网站交易平台上的其他不当行为，本网站有权无需征得会员的同意在本网站交易平台及所在网站上以网络发布形式公布该会员的违法行为，并有权随时作出删除相关信息、终止服务提供等处理。</span></p><p><span style=\"font-family:Arial;\">八、本网站依据本协议及相关规则，可以冻结、使用、先行赔付、退款、处置会员缴存并冻结在本网站账户内的资金。　　<br />&nbsp;&nbsp;&nbsp; 九、本网站有权在不通知会员的前提下，删除或采取其他限制性措施处理下列信息：包括但不限于以规避费用为目的；以炒作信用为目的；存在欺诈等恶意或虚假内容；与网上交易无关或不是以交易为目的；存在恶意竞价或其他试图扰乱正常交易秩序因素；该信息违反公共利益或可能严重损害本网站和其他会员合法利益的。</span></p>', null, null, 'default,red,blue,orange');
INSERT INTO keke_witkey_tag VALUES ('59', '底部', '5', null, null, null, null, '0', '0', '0', '0', null, null, null, null, null, null, null, null, null, null, null, null, '0', '0', '0', '0', null, null, null, null, null, null, null, '0', '0', '', '&amp;lt;ul&amp;gt;&amp;lt;li&amp;gt;&amp;lt;p&amp;gt;谋学天下，谋天下学问创大众财富。谋学天下，谋天下学问创大众财富。谋学天下，谋天下学问创大众财富&amp;lt;/p&amp;gt;&amp;lt;/li&amp;gt;&amp;lt;li&amp;gt;&amp;lt;p&amp;gt;谋学天下，谋天下学问创大众财富。谋学天下，谋天下学问创大众财富。谋学天下，谋天下学问创大众财富。谋学天下，谋天下学问创大众财富。&amp;lt;/p&amp;gt;&amp;lt;/li&amp;gt;&amp;lt;li&amp;gt;&amp;lt;p&amp;gt;谋学天下，谋天下学问创大众财富。谋学天下，谋天下学问创大众财富。谋学天下，谋天下学问创大众财富。&amp;lt;/p&amp;gt;&amp;lt;/li&amp;gt;&amp;lt;li&amp;gt;&amp;lt;p&amp;gt;谋学天下，谋天下学问创大众财富。谋学天下，谋谋天下学问创大众财富谋学天下，谋天下学问创大众财富。谋学天下，谋天下学问创大众财富。&amp;lt;/p&amp;gt;&amp;lt;/li&amp;gt;&amp;lt;li&amp;gt;&amp;lt;p&amp;gt;谋学天下，谋天下学问创大众财富。谋学天下，谋学天下，谋天下学问创大众财富。谋学天下，谋天下学问创大众财富。&amp;lt;/p&amp;gt;&amp;lt;/li&amp;gt;&amp;lt;/ul&amp;gt;', null, null, 'default,red,blue,orange');
INSERT INTO keke_witkey_tag VALUES ('44', '商城页_开店联系方式', '5', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '', '0', '0', '0', '0', '', '0', '0', '', '0', '0', '', '0', '0', '', '<ul><li></li><li>QQ :0101001</li><li>电话:3838438</li></ul>', '0', null, null);
INSERT INTO keke_witkey_tag VALUES ('130', '网站规则', '2', null, null, null, null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null, null, null, '0', '100', null, '0', '0', '0', '0', '69,70,71,72', '4', null, null, '2', null, '', '0', '0', null, null, '3600', '{loop $datalist $v}\r\n<li><a href=\"index.php?do=help&spid={$v[catid]}#art_{$v[id]}\">{$v[title]}</a></li>\r\n{/loop}', 'default');
INSERT INTO keke_witkey_tag VALUES ('110', '自定义代码测试', '5', null, null, null, null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null, null, null, null, null, null, '0', '0', '0', '0', null, null, null, null, null, null, null, '0', '0', '', '啊&lt;br /&gt;', '0', null, 'orange');
INSERT INTO keke_witkey_tag VALUES ('122', '什么是悬赏任务', '5', null, null, null, null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null, null, null, null, null, null, '0', '0', '0', '0', null, '9', null, null, '2', null, null, '0', '0', null, '&nbsp;&lt;h3 class=&quot;font14b&quot;&gt;什么是悬赏任务？ &lt;/h3&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;p&gt;悬赏任务指买家在发布任务时，先将任务赏金全额托管到猪八戒网，再从服务商交稿中选出满意稿件的任务。<br />', '3600', null, 'default,red');
INSERT INTO keke_witkey_tag VALUES ('123', '交付协议', '5', null, null, null, null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null, null, null, null, null, null, '0', '0', '0', '0', null, '9', null, null, '2', null, null, '0', '0', null, '<p class=\"font14\" style=\"text-indent:2em\"></p><p class=\"font14\" style=\"text-indent:2em\"></p><p class=\"font14\" style=\"text-indent:2em\"></p>&lt;p class=&quot;font14&quot; style=&quot;text-indent:2em&quot;&gt;此协议是关于交易双方发布者于中标者所设计作品的知识产权移交的。买家在悬赏中选出一个中标设计，或在设计成品商店购买一个设计的时候，发布者和中标者就会被视为订立了一项具有法律约束力的协议。除非买家和卖家分别以书面形式同意此协议的条款。 一旦参加一个设计悬赏（不论以买家还是卖家的身份），就默认为同意此协议的条款。当事人此协议的当事人为买家和其在悬赏中选定的中标卖家，或在设计成品商店购买的作品的设计者，这种情况下称作“卖方卖家”。如果不止一个卖方卖家，那么买家将被视为跟卖方卖家单独订立了协议。协议日期以买家选定悬赏中的相关设计（转让的设计）或购买设计成品商店里转让的设计的日期为准。&lt;/p&gt;&lt;span class=&quot;font14 block&quot; style=&quot;text-indent:2em&quot;&gt;此服务协议的使用必须同意我们的综合服务协议。 &lt;/span&gt;<span class=\"font14 block\" style=\"text-indent:2em\"></span><span class=\"font14 block\" style=\"text-indent:2em\"></span>', '3600', null, 'default,red');
INSERT INTO keke_witkey_tag VALUES ('151', '首页_顶部幻灯片', '9', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '999999', '{loop $datalist $k $v}\r\n<a href=\"{$v[ad_url]}\" title=\"{$v[ad_content]}\" target=\"_blank\"><img src=\"{$v[ad_file]}\" width=\"525\" height=\"300\" alt=\"Slide {$k}\"></a>\r\n{/loop}', 'default');
INSERT INTO keke_witkey_tag VALUES ('129', '网站公告', '2', null, null, null, null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null, null, null, '0', '17', null, '0', '0', '0', '0', '', '4', null, null, '2', null, '', '0', '0', null, null, '3600', '{loop $datalist $v}\r\n<li><a href=\"index.php?do=article&view=article_info&art_id={$v[id]}\"><!--{eval echo kekezu::cutstr($v[title],23)}--></a></li>\r\n{/loop}', 'default');
INSERT INTO keke_witkey_tag VALUES ('125', '作品出售协议', '5', null, null, null, null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null, null, null, null, null, null, '0', '0', '0', '0', null, '9', null, null, '2', null, null, '0', '0', null, '&lt;span class=&quot;font14&quot; style=&quot;text-indent:2em&quot;&gt;此协议是关于交易双方发布者于中标者所设计作品的知识产权移交的。&lt;/span&gt; &lt;span class=&quot;font14 block&quot; style=&quot;text-indent:2em&quot;&gt;买家在悬赏中选出一个中标设计，或在设计<br />成品商店购买一个设计的时候，发布者和中标者就会被视为订立了一项具有法律约束力的协议。&lt;/span&gt; &lt;span class=&quot;font14 block&quot; style=&quot;text-indent:2em&quot;&gt;除非买家和卖家分别以书面形式同意此协议的条款。 一旦参加一个设计悬赏（不论以买家还是卖家的身份），就默认为同意此协议的条款。当事人此协议的当事人为买家和其在悬赏中选定的中标卖家，或在设计成品商店购买的作品的设计者，这种情况下称作“卖方卖家”。&lt;/span&gt;&lt;span class=&quot;font14 block&quot; style=&quot;text-indent:2em&quot;&gt;如果不止一个卖方卖家，那么买家将被视为跟卖方卖家单独订立了协议。协议日期以买家选定悬赏中的相关设计（转让的设计）或购买设计成品商店里转让的设计的日期为准。&lt;/span&gt;<br />', '3600', null, 'default,red');
INSERT INTO keke_witkey_tag VALUES ('127', '帮助中心欢迎页面', '5', null, null, null, null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null, null, null, null, null, null, '0', '0', '0', '0', null, '9', null, null, '2', null, null, '0', '0', null, '&lt;div class=&quot;all_content&quot;&gt;&lt;div class=&quot;question mt_10&quot;&gt;&lt;h3 class=&quot;q_title pl_20 t_c&quot;&gt;欢迎来到帮助中心&lt;/h3&gt;&lt;/div&gt;&lt;div class=&quot;article pl_20 pr_20 pb_20&quot;&gt;&lt;h4 class=&quot;mt_10&quot;&gt;一品威客网服务协议（试行）&lt;/h4&gt;&lt;p class=&quot;art_one&quot;&gt;一品威客网（以下简称“本网站”）依据《一品威客网服务协议》（以下简称“本协议”）的规定提供服务，本协议具有合同效力。注册会员时，请您认真阅读本协议，审阅并接受或不接受本协议（未成年人应在法定监护人陪同下审阅）。若您已经注册为网站会员，即表示您已充分阅读、理解并同意自己与本网站订立本协议，且您自愿受本协议的条款约束。本网 站有权随时变更本协议并在本网站上予以公告。经修订的条款一经在本网站的公布后，立即自动生效。如您不同意相关变更必须停止使用本网站。本协议内容包括协议正文及所有一品威客网已经发布的各类规则。所有规则为本协议不可分割的一部分与本协议正文具有同等法律效力。一旦您继续使用本网站，则表示您已接受并自愿遵守经修订后的条款。&lt;/p&gt;&lt;h4&gt;第一条 会员资格&lt;/h4&gt;&lt;p&gt;一、 只有符合下列条件之一的自然人或法人才能申请成为本网站会员，可以使用本网站的服务。&lt;/p&gt;&lt;p&gt;（一）、年满十八岁，并具有民事权利能力和民事行为能力的自然人；&lt;/p&gt;&lt;p&gt;（二）、无民事行为能力人或限制民事行为能力人应经过其监护人的同意；&lt;/p&gt;&lt;p&gt;（三）、根据中国法律、法规、行政规章成立并合法存在的机关、企事业单位、社团组织和其他组织。无法人资格的单位或<br />组织不当注册为本网站会员的，其与本网站之间的协议自始无效，本网站一经发现，有权立即注销该会员，并追究其使用本 网站服务的一切法律责任。&lt;/p&gt;&lt;p&gt;二、 会员需要提供明确的联系地址和联系电话，并提供真实姓名或名称。&lt;/p&gt;&lt;h4&gt;第二条 会员的权利和义务&lt;/h4&gt;&lt;p&gt;一、会员有权根据本协议及本网站发布的相关规则，利用本网站发布任务信息、查询会员信息、参加任务，在本网站社区及相关产品发布信息，参加本网站的有关活动及有权享受本网站提供的其他有关资讯及信息服务。&lt;/p&gt;&lt;p&gt;二、会员须自行负责自己的会员账号和密码，且须对在会员账号密码下发生的所有活动（包括但不限于发布任务信息、网上点击同意各类协议、规则、参加竞标等）承担责任。会员有权根据需要更改登录和账户提现密码。&lt;/p&gt;&lt;p&gt;三、会员应当向本网站提供真实准确的注册信息，包括但不限于真实姓名、身份证号、联系电话、地址、邮政编码等。保证本网站可以通过上述联系方式与自己进行联系。同时，会员也应当在相关资料实际变更时及时更新有关注册资料。&lt;/p&gt;&lt;p&gt;四、会员不得以任何形式擅自转让或授权他人使用自己在本网站的会员帐号。&lt;/p&gt;&lt;p&gt;五、会员有义务确保在本网站上发布的任务信息真实、准确，无误导性。&lt;/p&gt; &lt;/div&gt;<br />&lt;/div&gt;', '3600', null, 'default,red');
INSERT INTO keke_witkey_tag VALUES ('155', '什么是微博转发任务', '5', null, null, null, null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null, null, null, null, null, null, '0', '0', '0', '0', null, '9', null, null, '2', null, null, '0', '0', null, '&nbsp;<h3 class=\"font14b\">什么是微博转发任务？ </h3><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <p>微博转发任务指买家在发布任务时，先将任务赏金全额托管到猪八戒网，再从服务商交稿中选出满意稿件的任务。<br /></p>', '3600', null, 'default');

-- ----------------------------
-- Table structure for `keke_witkey_task`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_task`;
CREATE TABLE `keke_witkey_task` (
  `task_id` int(11) NOT NULL AUTO_INCREMENT,
  `model_id` char(10) DEFAULT NULL,
  `work_count` int(11) DEFAULT NULL,
  `single_cash` float(10,2) DEFAULT NULL,
  `profit_rate` int(3) DEFAULT NULL,
  `task_fail_rate` int(3) DEFAULT NULL,
  `task_status` int(11) DEFAULT '0',
  `task_title` varchar(100) DEFAULT NULL,
  `task_desc` text,
  `task_file` varchar(100) DEFAULT NULL,
  `task_pic` varchar(100) DEFAULT NULL,
  `indus_id` int(11) DEFAULT '0',
  `indus_pid` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT '0',
  `username` varchar(50) DEFAULT NULL,
  `start_time` int(10) DEFAULT '0',
  `sub_time` int(10) DEFAULT NULL,
  `end_time` int(10) DEFAULT '0',
  `sp_end_time` int(10) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `task_cash` decimal(10,2) DEFAULT '0.00',
  `real_cash` decimal(10,2) DEFAULT '0.00',
  `task_cash_coverage` int(11) DEFAULT NULL,
  `cash_cost` decimal(10,2) DEFAULT '0.00',
  `credit_cost` decimal(10,2) DEFAULT '0.00',
  `view_num` int(11) DEFAULT '0',
  `work_num` int(11) DEFAULT '0',
  `leave_num` int(11) DEFAULT '0',
  `focus_num` int(11) DEFAULT '0',
  `mark_num` int(11) DEFAULT '0',
  `is_delineas` int(11) DEFAULT '0',
  `kf_uid` int(11) DEFAULT '0',
  `pay_item` varchar(50) DEFAULT NULL,
  `att_cash` decimal(8,2) DEFAULT '0.00',
  `contact` varchar(255) DEFAULT NULL,
  `unique_num` char(8) DEFAULT NULL,
  `ext_desc` text,
  `task_union` tinyint(1) DEFAULT '0',
  `alipay_trust` tinyint(1) DEFAULT NULL,
  `is_delay` tinyint(1) DEFAULT '0',
  `r_task_id` int(11) DEFAULT NULL,
  `is_trust` tinyint(1) DEFAULT '0',
  `trust_type` char(20) DEFAULT NULL,
  `is_top` int(1) DEFAULT '0',
  `is_auto_bid` int(1) DEFAULT '0',
  `point` varchar(100) DEFAULT NULL,
  `payitem_time` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`task_id`),
  KEY `task_id` (`task_id`),
  KEY `model_id` (`model_id`),
  KEY `uid` (`uid`),
  KEY `indus_id` (`indus_id`),
  KEY `task_status` (`task_status`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_task
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_task_bid`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_task_bid`;
CREATE TABLE `keke_witkey_task_bid` (
  `bid_id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) DEFAULT '0',
  `uid` int(11) DEFAULT '0',
  `username` varchar(50) DEFAULT NULL,
  `quote` decimal(8,2) DEFAULT NULL,
  `cycle` int(11) DEFAULT NULL,
  `area` varchar(50) DEFAULT NULL,
  `message` text,
  `bid_status` int(11) DEFAULT '0',
  `bid_time` int(11) DEFAULT '0',
  `hidden_status` int(11) DEFAULT NULL,
  `ext_status` int(11) DEFAULT NULL,
  `comment_num` int(11) DEFAULT '0',
  PRIMARY KEY (`bid_id`),
  KEY `index_2` (`task_id`),
  KEY `index_3` (`uid`),
  KEY `index_4` (`bid_status`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_task_bid
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_task_cash_cove`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_task_cash_cove`;
CREATE TABLE `keke_witkey_task_cash_cove` (
  `cash_rule_id` int(11) NOT NULL AUTO_INCREMENT,
  `start_cove` float(10,2) DEFAULT NULL,
  `end_cove` float(10,2) DEFAULT NULL,
  `cove_desc` varchar(250) DEFAULT NULL,
  `on_time` int(11) DEFAULT NULL,
  `model_code` char(20) DEFAULT NULL,
  PRIMARY KEY (`cash_rule_id`),
  KEY `cash_rule_id` (`cash_rule_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_task_cash_cove
-- ----------------------------
INSERT INTO keke_witkey_task_cash_cove VALUES ('1', '500.00', '1003.00', '500.00元-1003.00元', '1332560481', 'tender');
INSERT INTO keke_witkey_task_cash_cove VALUES ('2', '1000.00', '2000.00', '1000.00元—2000.00元', '1315625322', 'tender');
INSERT INTO keke_witkey_task_cash_cove VALUES ('3', '2000.00', '5000.00', '2000.00元—5000.00元', '1294303661', 'tender');
INSERT INTO keke_witkey_task_cash_cove VALUES ('4', '5000.00', '10000.00', '5000.00元—10000.00元', '1294303661', 'tender');
INSERT INTO keke_witkey_task_cash_cove VALUES ('5', '10000.00', '50000.00', '10000.00元—50000.00元', '1294303661', 'tender');
INSERT INTO keke_witkey_task_cash_cove VALUES ('11', '6000.00', '10000.00', '6000.00元-10000.00元', '1332560493', 'tender');
INSERT INTO keke_witkey_task_cash_cove VALUES ('12', '100.00', '300.00', '100.00元-300.00元', '1332563125', 'dtender');

-- ----------------------------
-- Table structure for `keke_witkey_task_delay`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_task_delay`;
CREATE TABLE `keke_witkey_task_delay` (
  `delay_id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) DEFAULT NULL,
  `delay_cash` decimal(10,2) DEFAULT '0.00',
  `delay_day` int(10) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `on_time` int(11) DEFAULT NULL,
  `delay_status` int(11) DEFAULT '0',
  PRIMARY KEY (`delay_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_task_delay
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_task_delay_rule`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_task_delay_rule`;
CREATE TABLE `keke_witkey_task_delay_rule` (
  `defer_rule_id` int(11) NOT NULL AUTO_INCREMENT,
  `defer_times` int(11) DEFAULT '0',
  `defer_rate` float(11,2) DEFAULT '0.00',
  `model_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`defer_rule_id`),
  KEY `index_2` (`model_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_task_delay_rule
-- ----------------------------
INSERT INTO keke_witkey_task_delay_rule VALUES ('10', '1', '1.00', '1');
INSERT INTO keke_witkey_task_delay_rule VALUES ('11', '2', '2.00', '1');
INSERT INTO keke_witkey_task_delay_rule VALUES ('12', '3', '3.00', '1');
INSERT INTO keke_witkey_task_delay_rule VALUES ('13', '2', '15.00', '3');
INSERT INTO keke_witkey_task_delay_rule VALUES ('14', '3', '20.00', '3');
INSERT INTO keke_witkey_task_delay_rule VALUES ('9', '1', '10.00', '3');
INSERT INTO keke_witkey_task_delay_rule VALUES ('15', '4', '1.00', '3');
INSERT INTO keke_witkey_task_delay_rule VALUES ('18', '1', '10.00', '2');
INSERT INTO keke_witkey_task_delay_rule VALUES ('19', '2', '20.00', '2');

-- ----------------------------
-- Table structure for `keke_witkey_task_frost`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_task_frost`;
CREATE TABLE `keke_witkey_task_frost` (
  `frost_id` int(11) NOT NULL AUTO_INCREMENT,
  `frost_status` int(11) DEFAULT '0',
  `task_id` int(11) DEFAULT '0',
  `frost_time` int(11) DEFAULT '0',
  `restore_time` int(11) DEFAULT '0',
  `admin_uid` int(11) DEFAULT '0',
  `admin_username` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`frost_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_task_frost
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_task_plan`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_task_plan`;
CREATE TABLE `keke_witkey_task_plan` (
  `plan_id` int(11) NOT NULL AUTO_INCREMENT,
  `bid_id` int(11) DEFAULT NULL,
  `task_id` int(11) DEFAULT NULL,
  `plan_title` varchar(150) DEFAULT NULL,
  `plan_desc` text,
  `plan_step` tinyint(4) DEFAULT NULL,
  `plan_amount` decimal(10,2) DEFAULT '0.00',
  `plan_status` char(10) DEFAULT NULL,
  `start_time` int(10) DEFAULT NULL,
  `end_time` int(10) DEFAULT NULL,
  `over_time` int(10) DEFAULT NULL,
  PRIMARY KEY (`plan_id`),
  UNIQUE KEY `plan_id` (`plan_id`),
  KEY `task_id` (`task_id`),
  KEY `bid_id` (`bid_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_task_plan
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_task_prize`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_task_prize`;
CREATE TABLE `keke_witkey_task_prize` (
  `prize_id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) DEFAULT NULL,
  `prize` int(11) DEFAULT NULL,
  `prize_count` int(11) DEFAULT NULL,
  `prize_cash` decimal(10,2) DEFAULT '0.00',
  PRIMARY KEY (`prize_id`),
  KEY `task_id` (`task_id`),
  KEY `prize_id` (`prize_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_task_prize
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_task_relation`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_task_relation`;
CREATE TABLE `keke_witkey_task_relation` (
  `relation_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `task_id` int(11) DEFAULT NULL,
  `r_task_id` int(11) DEFAULT NULL,
  `app_id` bigint(30) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  PRIMARY KEY (`relation_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_task_relation
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_task_time_rule`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_task_time_rule`;
CREATE TABLE `keke_witkey_task_time_rule` (
  `day_rule_id` int(11) NOT NULL AUTO_INCREMENT,
  `rule_cash` float(10,2) DEFAULT '0.00',
  `rule_day` int(11) DEFAULT '0',
  `model_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`day_rule_id`),
  KEY `index_2` (`model_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1343 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_task_time_rule
-- ----------------------------
INSERT INTO keke_witkey_task_time_rule VALUES ('1301', '200.00', '30', '3');
INSERT INTO keke_witkey_task_time_rule VALUES ('1318', '100.00', '10', '9');
INSERT INTO keke_witkey_task_time_rule VALUES ('3', '500.00', '40', '1');
INSERT INTO keke_witkey_task_time_rule VALUES ('2', '200.00', '30', '1');
INSERT INTO keke_witkey_task_time_rule VALUES ('1298', '100.00', '20', '2');
INSERT INTO keke_witkey_task_time_rule VALUES ('1306', '200.00', '30', '2');
INSERT INTO keke_witkey_task_time_rule VALUES ('1302', '100.00', '20', '3');
INSERT INTO keke_witkey_task_time_rule VALUES ('1303', '500.00', '40', '3');
INSERT INTO keke_witkey_task_time_rule VALUES ('1319', '500.00', '20', '9');
INSERT INTO keke_witkey_task_time_rule VALUES ('1320', '2000.00', '30', '9');
INSERT INTO keke_witkey_task_time_rule VALUES ('1321', '4000.00', '40', '9');
INSERT INTO keke_witkey_task_time_rule VALUES ('1337', '1000.00', '60', '2');
INSERT INTO keke_witkey_task_time_rule VALUES ('1323', '2000.00', '4000', '8');
INSERT INTO keke_witkey_task_time_rule VALUES ('1324', '3000.00', '6000', '8');
INSERT INTO keke_witkey_task_time_rule VALUES ('1325', '4000.00', '8000', '8');
INSERT INTO keke_witkey_task_time_rule VALUES ('1336', '500.00', '40', '2');
INSERT INTO keke_witkey_task_time_rule VALUES ('1335', '1000.00', '60', '1');
INSERT INTO keke_witkey_task_time_rule VALUES ('1328', '7000.00', '50', '9');
INSERT INTO keke_witkey_task_time_rule VALUES ('1329', '10000.00', '60', '9');
INSERT INTO keke_witkey_task_time_rule VALUES ('1332', '1000.00', '500', '8');
INSERT INTO keke_witkey_task_time_rule VALUES ('1340', '100.00', '5', '10');
INSERT INTO keke_witkey_task_time_rule VALUES ('1338', '1000.00', '60', '3');
INSERT INTO keke_witkey_task_time_rule VALUES ('1339', '2000.00', '90', '3');
INSERT INTO keke_witkey_task_time_rule VALUES ('1341', '500.00', '10', '10');
INSERT INTO keke_witkey_task_time_rule VALUES ('1342', '1000.00', '15', '10');

-- ----------------------------
-- Table structure for `keke_witkey_task_work`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_task_work`;
CREATE TABLE `keke_witkey_task_work` (
  `work_id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) DEFAULT '0',
  `uid` int(11) DEFAULT '0',
  `username` char(50) DEFAULT NULL,
  `work_title` varchar(100) DEFAULT NULL,
  `work_price` decimal(10,3) DEFAULT '0.000',
  `work_desc` text,
  `work_file` varchar(100) DEFAULT NULL,
  `work_pic` varchar(100) DEFAULT NULL,
  `work_time` int(11) DEFAULT '0',
  `hide_work` int(11) DEFAULT NULL,
  `vote_num` int(11) unsigned DEFAULT '0',
  `comment_num` int(11) DEFAULT '0',
  `work_status` int(11) DEFAULT '0',
  PRIMARY KEY (`work_id`),
  KEY `task_id` (`task_id`),
  KEY `uid` (`uid`),
  KEY `work_status` (`work_status`),
  KEY `work_time` (`work_time`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_task_work
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_template`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_template`;
CREATE TABLE `keke_witkey_template` (
  `tpl_id` int(11) NOT NULL AUTO_INCREMENT,
  `tpl_title` varchar(200) DEFAULT NULL,
  `tpl_desc` text,
  `develop` varchar(50) DEFAULT NULL,
  `tpl_pic` varchar(200) DEFAULT NULL,
  `tpl_path` varchar(200) DEFAULT NULL,
  `is_selected` int(2) DEFAULT '0',
  `on_time` int(11) DEFAULT '0',
  PRIMARY KEY (`tpl_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_template
-- ----------------------------
INSERT INTO keke_witkey_template VALUES ('1', 'default', '最专业的威客模板', '宇哥', 'blue', 'default', '1', '1274131150');

-- ----------------------------
-- Table structure for `keke_witkey_unit_image`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_unit_image`;
CREATE TABLE `keke_witkey_unit_image` (
  `unit_id` int(11) NOT NULL AUTO_INCREMENT,
  `unit_name` varchar(50) DEFAULT NULL,
  `unit_pic` varchar(50) DEFAULT NULL,
  `unit_type` int(11) DEFAULT '1',
  PRIMARY KEY (`unit_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_unit_image
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_vote`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_vote`;
CREATE TABLE `keke_witkey_vote` (
  `vote_id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) DEFAULT NULL,
  `work_id` int(11) DEFAULT '0',
  `uid` int(11) DEFAULT '0',
  `username` varchar(50) DEFAULT NULL,
  `vote_ip` varchar(50) DEFAULT '0',
  `vote_time` int(11) DEFAULT '0',
  PRIMARY KEY (`vote_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_vote
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_withdraw`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_withdraw`;
CREATE TABLE `keke_witkey_withdraw` (
  `withdraw_id` int(11) NOT NULL AUTO_INCREMENT,
  `withdraw_cash` decimal(10,2) DEFAULT '0.00',
  `uid` int(11) DEFAULT '0',
  `username` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `pay_username` char(20) CHARACTER SET utf8 DEFAULT NULL,
  `withdraw_status` int(11) DEFAULT '0',
  `applic_time` int(11) DEFAULT '0',
  `process_uid` int(11) DEFAULT '0',
  `process_username` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `process_time` int(11) DEFAULT '0',
  `pay_account` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `pay_type` char(20) CHARACTER SET utf8 DEFAULT '0',
  PRIMARY KEY (`withdraw_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_withdraw
-- ----------------------------
