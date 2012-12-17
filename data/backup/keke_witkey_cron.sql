/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50525
Source Host           : localhost:3306
Source Database       : kppw_google

Target Server Type    : MYSQL
Target Server Version : 50525
File Encoding         : 65001

Date: 2012-12-07 23:20:09
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `keke_witkey_cron`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_cron`;
CREATE TABLE `keke_witkey_cron` (
  `cron_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cron_name` varchar(150) DEFAULT NULL,
  `span` int(10) DEFAULT NULL,
  `nextruntime` int(10) DEFAULT NULL,
  `allow` tinyint(1) DEFAULT NULL,
  `filename` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`cron_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_cron
-- ----------------------------
INSERT INTO keke_witkey_cron VALUES ('1', '每日任务状态更新', '3600', null, '1', null);
INSERT INTO keke_witkey_cron VALUES ('2', '每日订单状态更新', '1800', null, '1', null);
INSERT INTO keke_witkey_cron VALUES ('3', '每日数据表优化', '36000', null, '1', null);
