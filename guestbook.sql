-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2017-02-16 05:04:20
-- 伺服器版本: 10.1.19-MariaDB
-- PHP 版本： 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `guestbook`
--

-- --------------------------------------------------------

--
-- 資料表結構 `guestbook`
--

CREATE TABLE IF NOT EXISTS `guestbook` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reply_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `subject` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `guestbook`
--

INSERT INTO `guestbook` (`id`, `reply_id`, `date`, `subject`, `author`, `content`) VALUES
(1, 0, '2017-02-10 10:25:57', 'aaa', 'bbb', 'hiulhuhi\r\nnmiojnoijno'),
(2, 0, '2017-02-10 10:26:20', 'vguyfvgyu', 'fvgufvgy', 'giygu\r\nniuhiuh'),
(3, 2, '2017-02-10 11:00:23', 'vguyfvgyu', 'gyugbug', 'fyugvyu\r\njniojioijn\r\n,opkmop'),
(4, 2, '2017-02-10 11:03:44', 'vguyfvgyu', '&lt;h1&gt;hiuhi&lt;/', '&lt;script&gt;&lt;/script&gt;'),
(5, 0, '2017-02-10 11:19:12', 'a', 'a', 'a'),
(6, 0, '2017-02-10 11:19:15', 'b', 'b', 'b'),
(7, 0, '2017-02-10 11:19:18', 'c', 'c', 'c'),
(8, 0, '2017-02-10 11:20:03', 'd', 'd', 'd'),
(9, 0, '2017-02-10 11:20:06', 'e', 'e', 'e'),
(10, 0, '2017-02-10 11:20:09', 'f', 'f', 'f'),
(11, 0, '2017-02-10 11:20:13', 'g', 'g', 'g'),
(12, 0, '2017-02-10 11:20:16', 'h', 'h', 'h');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
