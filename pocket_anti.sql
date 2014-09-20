-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 �?09 �?18 �?23:19
-- 服务器版本: 10.0.11-MariaDB
-- PHP 版本: 5.6.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `pocket_anti`
--

-- --------------------------------------------------------

--
-- 表的结构 `isa_user`
--

CREATE TABLE IF NOT EXISTS `isa_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` text NOT NULL,
  `user_name` text NOT NULL,
  `user_pwd` text NOT NULL,
  `create_time` datetime NOT NULL,
  `last_time` datetime DEFAULT NULL,
  `last_ip` text NOT NULL,
  `lock` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `isa_user`
--

INSERT INTO `isa_user` (`id`, `uid`, `user_name`, `user_pwd`, `create_time`, `last_time`, `last_ip`, `lock`) VALUES
(1, 'ea1a79b2b89aa7368a89ab60270b0dab', 'ziav', 'e10adc3949ba59abbe56e057f20f883e', '2014-09-17 11:52:40', '2014-09-18 17:09:09', '0.0.0.0', 0),
(4, '900150983cd24fb0d6963f7d28e17f72', 'abc', '202cb962ac59075b964b07152d234b70', '2014-09-18 03:02:01', '2014-09-18 11:55:59', '0.0.0.0', 0),
(3, '738716ca80df0ff77349c5d5dab4d342', 'jkljkl', 'e10adc3949ba59abbe56e057f20f883e', '2014-09-18 02:59:41', NULL, '0.0.0.0', 0),
(5, '76d80224611fc919a5d54f0ff9fba446', 'qwe', 'e10adc3949ba59abbe56e057f20f883e', '2014-09-18 17:16:22', NULL, '0.0.0.0', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
