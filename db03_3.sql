-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018-09-11 10:41:57
-- 伺服器版本: 10.1.31-MariaDB
-- PHP 版本： 7.0.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `db03_3`
--

-- --------------------------------------------------------

--
-- 資料表結構 `movie`
--

CREATE TABLE `movie` (
  `movie_seq` int(10) UNSIGNED NOT NULL,
  `movie_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `movie_lv` int(5) NOT NULL,
  `movie_long` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `movie_date` date NOT NULL,
  `movie_fa` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `movie_dir` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `movie_img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `movie_movie` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `movie_con` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `movie_display` int(2) NOT NULL,
  `movie_desc` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `movie`
--

INSERT INTO `movie` (`movie_seq`, `movie_name`, `movie_lv`, `movie_long`, `movie_date`, `movie_fa`, `movie_dir`, `movie_img`, `movie_movie`, `movie_con`, `movie_display`, `movie_desc`) VALUES
(1, 'q1', 1, 'w1', '2018-09-10', 'e1', 'r1', '03B01.png', '03B01v.avi', '11111111\r\n111111', 1, 1),
(2, 'q2', 2, 'w2', '2019-01-01', 'e2', 'r2', '03B02.png', '03B02v.avi', 't2', 1, 2),
(3, 'q3', 3, 'w3', '2020-05-11', 'e3', 'r3', '03B03.png', '03B03v.avi', 't3', 1, 3),
(4, 'q4', 4, 'w4', '2019-03-14', 'e4', 'r4', '03B04.png', '03B04v.avi', 't4', 0, 4),
(5, 'q5', 4, 'w5', '2018-12-12', 'e5', 'r5', '03B05.png', '03B05v.avi', 't5', 1, 5),
(6, 'q6', 2, 'w6', '2019-03-01', 'e6', 'r6', '03B06.png', '03B06v.avi', 't6', 1, 6);

-- --------------------------------------------------------

--
-- 資料表結構 `poster`
--

CREATE TABLE `poster` (
  `poster_seq` int(10) UNSIGNED NOT NULL,
  `poster_txt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `poster_img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `poster_desc` int(10) NOT NULL,
  `poster_ani` int(5) NOT NULL,
  `poster_display` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `poster`
--

INSERT INTO `poster` (`poster_seq`, `poster_txt`, `poster_img`, `poster_desc`, `poster_ani`, `poster_display`) VALUES
(1, '111', '03A01.jpg', 1, 1, 1),
(2, '222', '03A02.jpg', 2, 2, 1),
(3, '333', '03A03.jpg', 3, 3, 1),
(4, '444', '03A04.jpg', 4, 1, 1),
(5, '555', '03A05.jpg', 5, 2, 1),
(6, '666', '03A06.jpg', 6, 3, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `tick`
--

CREATE TABLE `tick` (
  `tick_seq` int(10) UNSIGNED NOT NULL,
  `tick_movie` int(10) NOT NULL,
  `tick_date` date NOT NULL,
  `tick_site` int(10) NOT NULL,
  `tick_sit` int(10) NOT NULL,
  `tick_no` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tick_cnt` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `tick`
--

INSERT INTO `tick` (`tick_seq`, `tick_movie`, `tick_date`, `tick_site`, `tick_sit`, `tick_no`, `tick_cnt`) VALUES
(6, 1, '2018-09-11', 1, 2, '201809110005', 5),
(7, 1, '2018-09-11', 1, 9, '201809110005', 5),
(8, 4, '2019-03-15', 5, 3, '201809110006', 6),
(9, 4, '2019-03-15', 5, 6, '201809110006', 6),
(10, 4, '2019-03-15', 5, 15, '201809110006', 6),
(11, 1, '2018-09-11', 3, 3, '201809110007', 7),
(12, 1, '2018-09-11', 3, 7, '201809110007', 7),
(13, 1, '2018-09-11', 3, 11, '201809110007', 7),
(14, 1, '2018-09-11', 3, 20, '201809110007', 7);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`movie_seq`);

--
-- 資料表索引 `poster`
--
ALTER TABLE `poster`
  ADD PRIMARY KEY (`poster_seq`);

--
-- 資料表索引 `tick`
--
ALTER TABLE `tick`
  ADD PRIMARY KEY (`tick_seq`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `movie`
--
ALTER TABLE `movie`
  MODIFY `movie_seq` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用資料表 AUTO_INCREMENT `poster`
--
ALTER TABLE `poster`
  MODIFY `poster_seq` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用資料表 AUTO_INCREMENT `tick`
--
ALTER TABLE `tick`
  MODIFY `tick_seq` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
