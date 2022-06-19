-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-06-19 13:54:37
-- 伺服器版本： 10.1.38-MariaDB
-- PHP 版本： 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `fortest`
--

-- --------------------------------------------------------

--
-- 資料表結構 `select_log`
--

CREATE TABLE `select_log` (
  `select_int` int(11) NOT NULL COMMENT '索引鍵',
  `select_question` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '問題',
  `select_question_time` datetime NOT NULL COMMENT '問題時間',
  `select_answer` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '回答',
  `select_answer_time` datetime NOT NULL COMMENT '回答時間',
  `create_at` datetime NOT NULL COMMENT '建立時間',
  `creator` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '建立者',
  `create_ip` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '建立ip'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `select_log`
--
ALTER TABLE `select_log`
  ADD PRIMARY KEY (`select_int`);

--
-- 在傾印的資料表使用自動增長(AUTO_INCREMENT)
--

--
-- 使用資料表自動增長(AUTO_INCREMENT) `select_log`
--
ALTER TABLE `select_log`
  MODIFY `select_int` int(11) NOT NULL AUTO_INCREMENT COMMENT '索引鍵';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
