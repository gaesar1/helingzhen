<?php
pdo_query("CREATE TABLE IF NOT EXISTS `ims_fy_lesson_article` (
`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
`uniacid` int(11),
`title` varchar(255),
`author` varchar(100),
`content` text,
`isshow` tinyint(1),
`displayorder` varchar(255),
`addtime` int(10),
`view` int(11) NOT NULL,
`linkurl` varchar(1000),
`images` varchar(255),
PRIMARY KEY (`id`),
KEY `idx_uniacid` (`uniacid`),
KEY `idx_title` (`title`),
KEY `idx_author` (`author`),
KEY `idx_isshow` (`isshow`),
KEY `idx_addtime` (`addtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_fy_lesson_blacklist` (
`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
`uniacid` int(11),
`openid` varchar(255),
`addtime` int(10),
PRIMARY KEY (`id`),
KEY `idx_uniacid` (`uniacid`),
KEY `idx_openid` (`openid`),
KEY `idx_addtime` (`addtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_fy_lesson_cashlog` (
`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
`uniacid` int(11) NOT NULL,
`cash_type` tinyint(1) NOT NULL,
`uid` int(11),
`openid` varchar(255) NOT NULL,
`cash_num` decimal(10,2) NOT NULL,
`status` tinyint(1) NOT NULL,
`disposetime` int(10) NOT NULL,
`partner_trade_no` varchar(255),
`payment_no` varchar(255),
`remark` text,
`addtime` int(10) NOT NULL,
`lesson_type` tinyint(1) NOT NULL,
`cash_way` tinyint(1) NOT NULL,
`pay_account` varchar(50),
PRIMARY KEY (`id`),
KEY `idx_uniacid` (`uniacid`),
KEY `idx_cash_type` (`cash_type`),
KEY `idx_cash_way` (`cash_way`),
KEY `idx_uid` (`uid`),
KEY `idx_openid` (`openid`),
KEY `idx_status` (`status`),
KEY `idx_lesson_type` (`lesson_type`),
KEY `idx_addtime` (`addtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_fy_lesson_category` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
`uniacid` int(10) unsigned NOT NULL,
`name` varchar(50) NOT NULL,
`parentid` int(10) unsigned NOT NULL,
`ico` varchar(255),
`displayorder` tinyint(3) unsigned NOT NULL,
`addtime` int(10),
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_fy_lesson_collect` (
`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
`uniacid` int(11) NOT NULL,
`uid` int(11) NOT NULL,
`openid` varchar(255) NOT NULL,
`outid` int(11) NOT NULL,
`ctype` tinyint(1) NOT NULL,
`addtime` int(10) NOT NULL,
PRIMARY KEY (`id`),
KEY `idx_uniacid` (`uniacid`),
KEY `idx_uid` (`uid`),
KEY `idx_openid` (`openid`),
KEY `idx_ctype` (`ctype`),
KEY `idx_addtime` (`addtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_fy_lesson_commission_level` (
`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
`uniacid` int(11) NOT NULL,
`levelname` varchar(50),
`commission1` decimal(10,2),
`commission2` decimal(10,2),
`commission3` decimal(10,2),
`updatemoney` decimal(10,2),
PRIMARY KEY (`id`),
KEY `idx_uniacid` (`uniacid`),
KEY `idx_levelname` (`levelname`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_fy_lesson_commission_log` (
`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
`uniacid` int(11),
`orderid` varchar(255),
`uid` int(11),
`openid` varchar(255),
`change_num` decimal(10,2),
`grade` tinyint(1),
`remark` varchar(255),
`addtime` int(10),
`bookname` varchar(255),
`nickname` varchar(100),
PRIMARY KEY (`id`),
KEY `idx_uniacid` (`uniacid`),
KEY `idx_orderid` (`orderid`),
KEY `idx_uid` (`uid`),
KEY `idx_openid` (`openid`),
KEY `idx_nickname` (`nickname`),
KEY `idx_bookname` (`bookname`),
KEY `idx_grade` (`grade`),
KEY `idx_addtime` (`addtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_fy_lesson_coupon` (
`card_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
`uniacid` int(11) NOT NULL,
`password` varchar(18) NOT NULL,
`amount` decimal(10,2) NOT NULL,
`validity` int(10) NOT NULL,
`conditions` decimal(10,2) NOT NULL,
`is_use` tinyint(1) NOT NULL,
`nickname` varchar(50),
`uid` int(11),
`openid` varchar(50),
`ordersn` varchar(50),
`use_time` int(10),
`addtime` int(10) NOT NULL,
PRIMARY KEY (`card_id`),
UNIQUE KEY `idx_ordersn` (`ordersn`),
KEY `idx_uniacid` (`uniacid`),
KEY `idx_password` (`password`),
KEY `idx_uid` (`uid`),
KEY `idx_openid` (`openid`),
KEY `idx_validity` (`validity`),
KEY `idx_addtime` (`addtime`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_fy_lesson_evaluate` (
`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
`uniacid` int(11) NOT NULL,
`orderid` int(11) NOT NULL,
`ordersn` varchar(255) NOT NULL,
`lessonid` int(11) NOT NULL,
`bookname` varchar(255) NOT NULL,
`openid` varchar(255) NOT NULL,
`uid` int(11) NOT NULL,
`nickname` varchar(50) NOT NULL,
`grade` tinyint(1) NOT NULL,
`content` text NOT NULL,
`addtime` int(10) NOT NULL,
`reply` text,
`teacherid` int(11),
PRIMARY KEY (`id`),
KEY `idx_uniacid` (`uniacid`),
KEY `idx_orderid` (`orderid`),
KEY `idx_ordersn` (`ordersn`),
KEY `idx_lessonid` (`lessonid`),
KEY `idx_bookname` (`bookname`),
KEY `idx_teacherid` (`teacherid`),
KEY `idx_grade` (`grade`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_fy_lesson_history` (
`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
`uniacid` int(11) NOT NULL,
`uid` int(11) NOT NULL,
`openid` varchar(255) NOT NULL,
`lessonid` int(11) NOT NULL,
`addtime` int(10) NOT NULL,
PRIMARY KEY (`id`),
KEY `idx_uniacid` (`uniacid`),
KEY `idx_uid` (`uid`),
KEY `idx_openid` (`openid`),
KEY `idx_addtime` (`addtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_fy_lesson_member` (
`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
`uniacid` int(11) NOT NULL,
`uid` int(11) NOT NULL,
`openid` varchar(255) NOT NULL,
`nickname` varchar(100),
`parentid` int(11) NOT NULL,
`nopay_commission` decimal(10,2) NOT NULL,
`pay_commission` decimal(10,2) NOT NULL,
`vip` tinyint(1) NOT NULL,
`validity` bigint(11) NOT NULL,
`pastnotice` int(10) NOT NULL,
`status` tinyint(1) NOT NULL,
`uptime` int(10) NOT NULL,
`addtime` int(11) NOT NULL,
`nopay_lesson` decimal(10,2) NOT NULL,
`pay_lesson` decimal(10,2) NOT NULL,
`studentno` varchar(20),
`agent_level` int(11) NOT NULL,
PRIMARY KEY (`id`),
KEY `idx_uniacid` (`uniacid`),
KEY `idx_uid` (`uid`),
KEY `idx_openid` (`openid`),
KEY `idx_parentid` (`parentid`),
KEY `idx_vip` (`vip`),
KEY `idx_validity` (`validity`),
KEY `idx_pastnotice` (`pastnotice`),
KEY `idx_status` (`status`),
KEY `idx_addtime` (`addtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_fy_lesson_member_order` (
`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
`uniacid` int(11) NOT NULL,
`ordersn` varchar(255) NOT NULL,
`uid` int(11) NOT NULL,
`openid` varchar(255) NOT NULL,
`viptime` int(4) NOT NULL,
`vipmoney` decimal(10,2) NOT NULL,
`paytype` varchar(50) NOT NULL,
`status` tinyint(1) NOT NULL,
`paytime` int(10),
`addtime` int(10) NOT NULL,
`acid` int(11) NOT NULL,
`member1` int(11) NOT NULL,
`commission1` decimal(10,2) NOT NULL,
`member2` int(11) NOT NULL,
`commission2` decimal(10,2) NOT NULL,
`member3` int(11) NOT NULL,
`commission3` decimal(10,2) NOT NULL,
`update_time` int(10),
`refer_id` int(11),
PRIMARY KEY (`id`),
KEY `idx_uniacid` (`uniacid`),
KEY `idx_uid` (`uid`),
KEY `idx_openid` (`openid`),
KEY `idx_paytype` (`paytype`),
KEY `idx_status` (`status`),
KEY `idx_refer_id` (`refer_id`),
KEY `idx_addtime` (`addtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_fy_lesson_order` (
`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
`uniacid` int(11) NOT NULL,
`ordersn` varchar(255) NOT NULL,
`uid` int(11) NOT NULL,
`openid` varchar(255) NOT NULL,
`lessonid` int(11) NOT NULL,
`bookname` varchar(255) NOT NULL,
`price` decimal(10,2) NOT NULL,
`integral` int(4) NOT NULL,
`paytype` varchar(50) NOT NULL,
`paytime` int(10) NOT NULL,
`member1` int(11) NOT NULL,
`commission1` decimal(10,2) NOT NULL,
`member2` int(11) NOT NULL,
`commission2` decimal(10,2) NOT NULL,
`member3` int(11) NOT NULL,
`commission3` decimal(10,2) NOT NULL,
`status` tinyint(1) NOT NULL,
`addtime` int(10),
`marketprice` decimal(10,2) NOT NULL,
`teacher_income` tinyint(3) NOT NULL,
`acid` int(11) NOT NULL,
`teacherid` int(11),
`invoice` varchar(100),
`coupon` varchar(50),
`coupon_amount` decimal(10,2) NOT NULL,
`validity` int(11) NOT NULL,
PRIMARY KEY (`id`),
KEY `idx_acid` (`acid`),
KEY `idx_uniacid` (`uniacid`),
KEY `idx_ordersn` (`ordersn`),
KEY `idx_uid` (`uid`),
KEY `idx_openid` (`openid`),
KEY `idx_lessonid` (`lessonid`),
KEY `idx_bookname` (`bookname`),
KEY `idx_teacherid` (`teacherid`),
KEY `idx_paytype` (`paytype`),
KEY `idx_status` (`status`),
KEY `idx_addtime` (`addtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_fy_lesson_parent` (
`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
`uniacid` int(11) NOT NULL,
`cid` int(11) NOT NULL,
`bookname` varchar(255) NOT NULL,
`price` decimal(10,2) NOT NULL,
`integral` int(11) NOT NULL,
`images` varchar(255),
`descript` text,
`difficulty` varchar(100),
`buynum` int(11) NOT NULL,
`virtual_buynum` int(11) NOT NULL,
`score` decimal(5,2) NOT NULL,
`teacherid` int(11) NOT NULL,
`commission` text,
`displayorder` int(4) NOT NULL,
`status` tinyint(1) NOT NULL,
`recommendid` int(11) NOT NULL,
`vipview` tinyint(1) NOT NULL,
`addtime` int(10) NOT NULL,
`isdiscount` tinyint(1) NOT NULL,
`vipdiscount` int(3) NOT NULL,
`teacher_income` tinyint(3) NOT NULL,
`stock` int(11) NOT NULL,
`poster` text,
`validity` int(11) NOT NULL,
PRIMARY KEY (`id`),
KEY `idx_uniacid` (`uniacid`),
KEY `idx_cid` (`cid`),
KEY `idx_bookname` (`bookname`),
KEY `idx_teacherid` (`teacherid`),
KEY `idx_displayorder` (`displayorder`),
KEY `idx_status` (`status`),
KEY `idx_recommendid` (`recommendid`),
KEY `idx_addtime` (`addtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_fy_lesson_playrecord` (
`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
`uniacid` int(11),
`uid` int(11),
`openid` varchar(255),
`lessonid` int(11),
`sectionid` int(11),
`addtime` int(10),
PRIMARY KEY (`id`),
KEY `idx_uniacid` (`uniacid`),
KEY `idx_uid` (`uid`),
KEY `idx_openid` (`openid`),
KEY `idx_addtime` (`addtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_fy_lesson_qiniu_upload` (
`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
`uniacid` int(11) NOT NULL,
`uid` int(11),
`openid` varchar(255),
`teacher` int(11),
`name` varchar(500),
`com_name` varchar(1000),
`qiniu_url` varchar(1000),
`size` varchar(100),
`addtime` int(10),
PRIMARY KEY (`id`),
KEY `idx_uniacid` (`uniacid`),
KEY `idx_teacher` (`teacher`),
KEY `idx_name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_fy_lesson_recommend` (
`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
`uniacid` int(11) NOT NULL,
`rec_name` varchar(255),
`displayorder` int(4),
`is_show` tinyint(1) NOT NULL,
`addtime` int(10) NOT NULL,
PRIMARY KEY (`id`),
KEY `idx_uniacid` (`uniacid`),
KEY `idx_is_show` (`is_show`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_fy_lesson_relation` (
`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
`uniacid` int(11),
`uid` int(11),
`tjgx` text,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_fy_lesson_setting` (
`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
`uniacid` int(11) NOT NULL,
`logo` varchar(255) NOT NULL,
`istplnotice` tinyint(1) NOT NULL,
`buysucc` varchar(255),
`pastvip` varchar(255),
`sitename` varbinary(100),
`banner` text,
`paytype` text NOT NULL,
`copyright` varchar(255) NOT NULL,
`vipserver` text,
`sharelink` text,
`sharelesson` text,
`shareteacher` text,
`closespace` int(4) NOT NULL,
`closelast` int(10) NOT NULL,
`memberlast` int(10) NOT NULL,
`is_sale` tinyint(1) NOT NULL,
`self_sale` tinyint(1) NOT NULL,
`level` tinyint(1) NOT NULL,
`commission` text,
`cash_type` tinyint(1) NOT NULL,
`cash_lower` decimal(10,2) NOT NULL,
`mchid` varchar(100),
`mchkey` varchar(255),
`serverIp` varchar(100),
`qiniu` text NOT NULL,
`print_error` tinyint(1) NOT NULL,
`addtime` int(10) NOT NULL,
`vipdiscount` int(3) NOT NULL,
`footnav` tinyint(1) NOT NULL,
`teacher_income` tinyint(3) NOT NULL,
`sale_rank` tinyint(1) NOT NULL,
`isfollow` tinyint(1) NOT NULL,
`qrcode` varchar(255),
`cnotice` varchar(255),
`newjoin` varchar(255),
`qcloud` text,
`savetype` tinyint(2) NOT NULL,
`mustinfo` tinyint(1) NOT NULL,
`newlesson` varchar(255),
`lessonshow` tinyint(1) NOT NULL,
`autogood` int(4) NOT NULL,
`posterbg` varchar(255),
`neworder` varchar(255) NOT NULL,
`manageopenid` text NOT NULL,
`vipdesc` text NOT NULL,
`vip_sale` tinyint(1) NOT NULL,
`cash_way` text NOT NULL,
`adv` text NOT NULL,
`newcash` varchar(255) NOT NULL,
`mobilechange` tinyint(1) NOT NULL,
`main_color` varchar(50),
`minor_color` varchar(50),
`teacherlist` tinyint(1) NOT NULL,
`category_ico` varchar(255) NOT NULL,
`rec_income` decimal(10,2) NOT NULL,
`apply_teacher` varchar(255),
`viporder_commission` text,
`index_lazyload` text,
`cash_follow` tinyint(1) NOT NULL,
`front_color` text,
`self_diy` text,
`stock_config` tinyint(1),
`is_invoice` tinyint(1) NOT NULL,
`index_upgrade` tinyint(1) NOT NULL,
`poster_type` tinyint(1) NOT NULL,
PRIMARY KEY (`id`),
UNIQUE KEY `idx_uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_fy_lesson_son` (
`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
`uniacid` int(11) NOT NULL,
`parentid` int(11) NOT NULL,
`title` varchar(255) NOT NULL,
`savetype` tinyint(1) NOT NULL,
`videourl` text,
`videotime` varchar(100) NOT NULL,
`content` text,
`displayorder` int(4) NOT NULL,
`is_free` tinyint(1) NOT NULL,
`status` tinyint(1) NOT NULL,
`addtime` int(10) NOT NULL,
`sectiontype` tinyint(1) NOT NULL,
`audiobg` varchar(255) NOT NULL,
PRIMARY KEY (`id`),
KEY `idx_uniacid` (`uniacid`),
KEY `idx_parentid` (`parentid`),
KEY `idx_status` (`status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_fy_lesson_syslog` (
`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
`uniacid` int(11),
`admin_uid` int(11),
`admin_username` varchar(50),
`log_type` tinyint(1),
`function` varchar(100),
`content` varchar(1000),
`ip` varchar(50),
`addtime` int(10) NOT NULL,
PRIMARY KEY (`id`),
KEY `idx_uniacid` (`uniacid`),
KEY `idx_admin_uid` (`admin_uid`),
KEY `idx_log_type` (`log_type`),
KEY `idx_function` (`function`),
KEY `idx_addtime` (`addtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_fy_lesson_teacher` (
`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
`uniacid` int(11) NOT NULL,
`teacher` varchar(100) NOT NULL,
`first_letter` varchar(10),
`teacherdes` text,
`teacherphoto` varchar(255),
`addtime` int(11) NOT NULL,
`uid` int(11) NOT NULL,
`openid` varchar(100) NOT NULL,
`status` tinyint(1) NOT NULL,
`qq` varchar(20),
`qqgroup` varchar(20),
`qqgroupLink` varchar(255),
`weixin_qrcode` varchar(255) NOT NULL,
`account` varchar(20),
`password` varchar(32),
`upload` tinyint(1) NOT NULL,
PRIMARY KEY (`id`),
KEY `idx_uniacid` (`uniacid`),
KEY `idx_uid` (`uid`),
KEY `idx_openid` (`openid`),
KEY `idx_account` (`account`),
KEY `idx_status` (`status`),
KEY `idx_upload` (`upload`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_fy_lesson_teacher_income` (
`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
`uniacid` int(11),
`uid` int(11),
`openid` varchar(100),
`ordersn` varchar(100),
`orderprice` decimal(10,2),
`teacher_income` tinyint(3),
`income_amount` decimal(10,2),
`addtime` int(10),
`bookname` varchar(255),
`teacher` varchar(255),
PRIMARY KEY (`id`),
KEY `idx_uniacid` (`uniacid`),
KEY `idx_uid` (`uid`),
KEY `idx_openid` (`openid`),
KEY `idx_teacher` (`teacher`),
KEY `idx_ordersn` (`ordersn`),
KEY `idx_bookname` (`bookname`),
KEY `idx_addtime` (`addtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_fy_lesson_vipcard` (
`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
`uniacid` int(11) NOT NULL,
`card_id` varchar(50),
`password` varchar(100),
`viptime` int(11),
`is_use` tinyint(1) NOT NULL,
`nickname` varchar(100),
`uid` int(11),
`openid` varchar(100),
`ordersn` varchar(50),
`use_time` int(10),
`validity` int(10),
`addtime` int(10) unsigned,
PRIMARY KEY (`id`),
KEY `idx_uniacid` (`uniacid`),
KEY `idx_card_id` (`card_id`),
KEY `idx_is_use` (`is_use`),
KEY `idx_uid` (`uid`),
KEY `idx_openid` (`openid`),
KEY `idx_nickname` (`nickname`),
KEY `idx_ordersn` (`ordersn`),
KEY `idx_validity` (`validity`),
KEY `idx_use_time` (`use_time`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");
