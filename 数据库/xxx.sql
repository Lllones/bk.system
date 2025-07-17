-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2022 年 12 月 08 日 19:51
-- 服务器版本: 5.5.53
-- PHP 版本: 5.4.45

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `xxx`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL COMMENT '主键ID',
  `account` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '账号',
  `password` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '密码',
  `admin_user` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '管理员名称',
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '手机号',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='管理表';

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`id`, `account`, `password`, `admin_user`, `phone`, `create_time`) VALUES
(1, '123', '4297f44b13955235245b2497399d7a93', '管理员', '0000007', '2022-11-23 07:41:15');

-- --------------------------------------------------------

--
-- 表的结构 `discuss`
--

CREATE TABLE IF NOT EXISTS `discuss` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `discuss_user_id` int(11) NOT NULL COMMENT '评论用户的id',
  `post_id` int(11) NOT NULL COMMENT '被评论的文章id',
  `discuss` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '评论内容',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '评论的时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='评论表' AUTO_INCREMENT=16 ;

--
-- 转存表中的数据 `discuss`
--

INSERT INTO `discuss` (`id`, `discuss_user_id`, `post_id`, `discuss`, `create_time`) VALUES
(1, 18, 0, '884646', '2022-11-22 15:49:44'),
(2, 18, 0, '3564636', '2022-11-22 16:02:17'),
(3, 18, 0, '\n56++\n456+\n4\n', '2022-11-22 16:03:03'),
(4, 18, 0, 'lsdfgbhiklfsdhklrdf\n', '2022-11-22 16:03:44'),
(5, 18, 0, '313133', '2022-11-23 04:40:25'),
(6, 18, 0, '6463213', '2022-11-23 04:45:57'),
(7, 18, 0, 'dsfsdfasfs', '2022-11-23 04:46:10'),
(8, 18, 0, 'dsgdfgsdfgsdf', '2022-11-23 04:58:24'),
(9, 18, 1, 'dsfhhhhhhhh', '2022-11-23 04:59:08'),
(10, 18, 9, 'hkuytrrrrrrrrrr', '2022-11-23 04:59:50'),
(11, 18, 9, 'gsdrgser', '2022-11-23 05:12:04'),
(12, 18, 1, '功夫就没法干活呢', '2022-11-27 09:09:07'),
(13, 18, 1, '豆腐干岁的法国', '2022-11-27 09:48:00'),
(14, 18, 14, '发顺丰士大夫', '2022-11-27 09:56:45'),
(15, 19, 17, '12355646', '2022-12-07 00:58:04');

-- --------------------------------------------------------

--
-- 表的结构 `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id号',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '标题',
  `html` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '文章内容',
  `html_txt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_type_id` int(11) NOT NULL COMMENT '文章类型',
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `status` int(11) NOT NULL COMMENT '文章状态 0，待审核 1，审核通过',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '文章创建时间',
  `update_time` datetime DEFAULT NULL COMMENT '更新时间',
  `delete_time` datetime DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='文章' AUTO_INCREMENT=18 ;

--
-- 转存表中的数据 `post`
--

INSERT INTO `post` (`id`, `title`, `html`, `html_txt`, `img`, `post_type_id`, `user_id`, `status`, `create_time`, `update_time`, `delete_time`) VALUES
(1, 'dfgsd', '<p>dgf</p>', NULL, NULL, 4, 18, 2, '2022-11-22 09:05:12', NULL, NULL),
(2, 'dfgsd', '<p>dgf</p>', NULL, NULL, 4, 18, 1, '2022-11-22 09:08:27', NULL, NULL),
(3, 'dfgsd', '<p>dgf</p>', NULL, NULL, 4, 18, 1, '2022-11-22 09:10:38', NULL, NULL),
(4, 'dfgsd', '<p>dgf</p>', NULL, NULL, 4, 18, 2, '2022-11-22 09:10:48', NULL, NULL),
(5, 'dfgsd', '<p>dgf</p>', NULL, NULL, 4, 18, 1, '2022-11-22 09:10:48', NULL, NULL),
(6, 'dfgsd', '<p>dgf</p>', NULL, NULL, 4, 18, 1, '2022-11-22 09:10:49', NULL, NULL),
(7, 'dfgsd', '<p>dgf</p>', NULL, NULL, 4, 18, 1, '2022-11-22 09:10:49', NULL, NULL),
(8, 'dvsd', '<p>vs</p>', NULL, NULL, 4, 18, 1, '2022-11-22 09:12:12', NULL, NULL),
(9, 'fbdfb', '<p>fbdfb</p>', NULL, NULL, 4, 18, 3, '2022-11-22 09:32:45', NULL, NULL),
(10, '543', '<p>&nbsp;534</p>', NULL, NULL, 4, 18, 1, '2022-11-22 13:03:10', NULL, NULL),
(11, 'fdsgbf', '<p>fbsdfbf</p>', NULL, NULL, 4, 18, 2, '2022-11-23 08:44:48', NULL, NULL),
(15, '如果如果', '<p>八点反攻 二个大概</p>', NULL, NULL, 4, 18, 1, '2022-11-27 09:58:14', NULL, NULL),
(14, '', '<p>非人非vrt</p>', NULL, NULL, 4, 18, 0, '2022-11-27 09:52:28', NULL, NULL),
(16, '感豆腐干豆腐干', '<p>风格豆腐干豆腐干</p>', NULL, NULL, 4, 18, 0, '2022-11-27 09:58:31', NULL, NULL),
(17, 'ghhdhdd', '<p>fhcnvbnnvnn</p>', NULL, NULL, 1, 19, 2, '2022-12-07 00:56:32', NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `post_give`
--

CREATE TABLE IF NOT EXISTS `post_give` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id号',
  `give_user_id` int(11) NOT NULL COMMENT '点赞用户的id',
  `post_id` int(11) NOT NULL COMMENT '被点赞的文章id',
  `post_user_id` int(11) NOT NULL COMMENT '发布文章的用户的id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='文章点赞记录表' AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `post_give`
--

INSERT INTO `post_give` (`id`, `give_user_id`, `post_id`, `post_user_id`) VALUES
(8, 18, 1, 18),
(13, 19, 0, 19);

-- --------------------------------------------------------

--
-- 表的结构 `post_type`
--

CREATE TABLE IF NOT EXISTS `post_type` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1展示，0不展示'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `post_type`
--

INSERT INTO `post_type` (`id`, `name`, `status`) VALUES
(4, 'Android', 1),
(3, 'IOS', 1),
(1, '前端', 1),
(2, '后端', 1);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sign` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '这家伙很懒，什么都没有留下。',
  `header` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '/public/header/11.png',
  `creat_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=25 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `uname`, `phone`, `account`, `password`, `sign`, `header`, `creat_time`) VALUES
(1, '453685', '348993', '7837543', '123123', '这家伙很懒，什么都没有留下。', '/public/header/11.png', '2022-11-21 13:48:52'),
(18, '211', '1543456', '1', '4297f44b13955235245b2497399d7a93', '23454532453', './public/header/20221127173227379.png', '2022-11-21 13:50:27'),
(19, '1321', '213123', '123', '4297f44b13955235245b2497399d7a93', '这家伙12.1312懒，什么都没有留下。', '/public/header/20221122005545358.png', '2022-11-21 16:26:01'),
(20, '2', '2', '2', '123123', '这家伙很懒，什么都没有留下。', '/public/header/11.png', '2022-11-22 06:30:19'),
(21, '789', '789', '789', '4297f44b13955235245b2497399d7a93', '这家伙很懒，什么都没有留下。', '/public/header/11.png', '2022-11-22 08:07:26'),
(22, '142', '45', '4', '4297f44b13955235245b2497399d7a93', '这家伙很懒，什么都没有留下。', '/public/header/11.png', '2022-12-06 13:20:06'),
(23, '64564546', '4553415', '44', '4297f44b13955235245b2497399d7a93', '这家伙很懒，什么都没有留下。', '/public/header/11.png', '2022-12-06 13:21:06'),
(24, '100', '1223', '123123', '4297f44b13955235245b2497399d7a93', '这家伙很懒，什么都没有留下。', '/public/header/11.png', '2022-12-07 00:55:07');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
