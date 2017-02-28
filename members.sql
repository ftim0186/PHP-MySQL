-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2017-02-16 05:04:07
-- 伺服器版本: 10.1.19-MariaDB
-- PHP 版本： 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `members`
--

-- --------------------------------------------------------

--
-- 資料表結構 `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `account` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `year` smallint(6) NOT NULL,
  `month` tinyint(4) NOT NULL,
  `date` tinyint(4) NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `job` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `signup_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `present` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `members`
--

INSERT INTO `members` (`account`, `password_hash`, `id`, `name`, `email`, `year`, `month`, `date`, `gender`, `job`, `signup_time`, `present`) VALUES
('bukgu', '$2y$10$WvcynsioASJF4zqivFwCMuEu.KTwuEwgZdZw8aMqr.lRYTVOwNQbK', 1, 'joiuhu', '', 1902, 9, 6, 2, 'hhh', '2017-02-10 12:29:44', 0),
('eee', '$2y$10$1p8/769eieLDap83TSQ/NuJihTzv9w8h.BLiSokfPzQ/B/tLPEcpm', 2, 'eee', 'ibetrayall@gmail.com', 1911, 11, 1, 2, 'yyy', '2017-02-14 10:38:24', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
