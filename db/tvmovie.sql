-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 05, 2023 at 05:21 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tvmovie`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `type` smallint NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `status` smallint NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `desc` text COLLATE utf8mb4_general_ci NOT NULL,
  `display_order` int NOT NULL,
  `status` smallint NOT NULL,
  `seo_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `meta_desc` text COLLATE utf8mb4_general_ci NOT NULL,
  `meta_keyword` text COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `desc`, `display_order`, `status`, `seo_name`, `meta_title`, `meta_desc`, `meta_keyword`) VALUES
(1, 'vn', '<p>vnxdfghfxhtxdfhg</p>', 1, 1, 'vn', 'vvvvvv', 'vvvvvvvvv', 'nnnnnnnnnnn'),
(2, 'us', '', 2, 1, 'us', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `episodes`
--

DROP TABLE IF EXISTS `episodes`;
CREATE TABLE IF NOT EXISTS `episodes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `movie_id` int NOT NULL,
  `admin_id` int NOT NULL,
  `episode` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `desc` text COLLATE utf8mb4_general_ci NOT NULL,
  `content` mediumtext COLLATE utf8mb4_general_ci NOT NULL,
  `display_order` int NOT NULL,
  `status` smallint NOT NULL,
  `options` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `count_view` int NOT NULL,
  `date_created` int NOT NULL,
  `date_updated` int NOT NULL,
  `seo_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tags` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `meta_desc` text COLLATE utf8mb4_general_ci NOT NULL,
  `meta_keyword` text COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `episode_servers`
--

DROP TABLE IF EXISTS `episode_servers`;
CREATE TABLE IF NOT EXISTS `episode_servers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `episode_id` int NOT NULL,
  `server_id` int NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

DROP TABLE IF EXISTS `genres`;
CREATE TABLE IF NOT EXISTS `genres` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `desc` text COLLATE utf8mb4_general_ci NOT NULL,
  `display_order` int NOT NULL,
  `status` smallint NOT NULL,
  `seo_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `meta_desc` text COLLATE utf8mb4_general_ci NOT NULL,
  `meta_keyword` text COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `name`, `desc`, `display_order`, `status`, `seo_name`, `meta_title`, `meta_desc`, `meta_keyword`) VALUES
(1, 'abc', '<p>fxgjhgfjh</p>', 1, 1, 'abc', '', '', ''),
(2, 'xyz', '', 2, 1, 'xyz', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

DROP TABLE IF EXISTS `movies`;
CREATE TABLE IF NOT EXISTS `movies` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `desc` text COLLATE utf8mb4_general_ci NOT NULL,
  `content` mediumtext COLLATE utf8mb4_general_ci NOT NULL,
  `link_trailer` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `display_order` int NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `status` smallint NOT NULL,
  `options` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `count_view` int NOT NULL,
  `date_created` int NOT NULL,
  `date_updated` int NOT NULL,
  `seo_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tags` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `meta_desc` text COLLATE utf8mb4_general_ci NOT NULL,
  `meta_keyword` text COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `movie_categories`
--

DROP TABLE IF EXISTS `movie_categories`;
CREATE TABLE IF NOT EXISTS `movie_categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `desc` text COLLATE utf8mb4_general_ci NOT NULL,
  `display_order` int NOT NULL,
  `status` smallint NOT NULL,
  `seo_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `meta_desc` text COLLATE utf8mb4_general_ci NOT NULL,
  `meta_keyword` text COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movie_categories`
--

INSERT INTO `movie_categories` (`id`, `name`, `desc`, `display_order`, `status`, `seo_name`, `meta_title`, `meta_desc`, `meta_keyword`) VALUES
(1, 'hành động', '<p>hhhhhhfghfhdfh</p>', 1, 1, 'hanh-dong', 'hhhhhh', 'hhhhhhhhhh', 'hhhhhhhhhhhh'),
(2, 'anime', '', 2, 0, 'anime', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `movie_countries`
--

DROP TABLE IF EXISTS `movie_countries`;
CREATE TABLE IF NOT EXISTS `movie_countries` (
  `id` int NOT NULL AUTO_INCREMENT,
  `movie_id` int NOT NULL,
  `country_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `movie_genres`
--

DROP TABLE IF EXISTS `movie_genres`;
CREATE TABLE IF NOT EXISTS `movie_genres` (
  `id` int NOT NULL AUTO_INCREMENT,
  `movie_id` int NOT NULL,
  `genre_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int NOT NULL,
  `admin_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `desc` text COLLATE utf8mb4_general_ci NOT NULL,
  `content` mediumtext COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `display_order` int NOT NULL,
  `status` smallint NOT NULL,
  `options` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `count_view` int NOT NULL,
  `date_created` int NOT NULL,
  `date_updated` int NOT NULL,
  `seo_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tags` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `meta_desc` text COLLATE utf8mb4_general_ci NOT NULL,
  `meta_keyword` text COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `category_id`, `admin_id`, `name`, `desc`, `content`, `image`, `display_order`, `status`, `options`, `count_view`, `date_created`, `date_updated`, `seo_name`, `tags`, `meta_title`, `meta_desc`, `meta_keyword`) VALUES
(3, 0, 123, 'aaaaaaaaaaaa', '<p>aaaaaaaaaaa</p>', '<p>Theo MovieWeb, một nguồn tin tại Hollywood cho biết cả&nbsp;<a href=\"https://kenh14.vn/chris-evans.html\" target=\"_blank\" title=\"chris evans\">Chris Evans</a>&nbsp;v&agrave;&nbsp;<a href=\"https://kenh14.vn/robert-downey-jr.html\" target=\"_blank\" title=\"robert downey jr.\">Robert Downey Jr.</a>&nbsp;mới đ&acirc;y đ&atilde; đồng &yacute; quay trở lại Vũ trụ Điện ảnh Marvel (MCU). Trước đ&oacute;, xuất hiện một số th&ocirc;ng tin về việc h&atilde;ng phim dự định mời c&aacute;c ng&ocirc;i sao cũ để vực thương hiệu si&ecirc;u anh h&ugrave;ng sau qu&atilde;ng thời gian kh&oacute; khăn vừa qua. Ngo&agrave;i Chris v&agrave; Robert, Scarlett Johansson cũng l&agrave; một trong những gương mặt được nhắm đến.</p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/203336854389633024/2023/11/6/photo-2-1699261519600201773962.jpeg\" target=\"_blank\" title=\"Chris Evans và Robert Downey Jr. được cho là đã nhận lời quay lại Vũ trụ Điện ảnh Marvel\"><img alt=\"Iron Man và Captain America được mời quay lại Vũ trụ Điện ảnh Marvel, biệt đội Avengers huyền thoại sắp sửa tái hợp? - Ảnh 1.\" height=\"\" src=\"https://kenh14cdn.com/thumb_w/620/203336854389633024/2023/11/6/photo-2-1699261519600201773962.jpeg\" title=\"Iron Man và Captain America được mời quay lại Vũ trụ Điện ảnh Marvel, biệt đội Avengers huyền thoại sắp sửa tái hợp? - Ảnh 1.\" width=\"\" /></a></p>\r\n\r\n<p>Chris Evans v&agrave; Robert Downey Jr. được cho l&agrave; đ&atilde; nhận lời quay lại Vũ trụ Điện ảnh Marvel</p>\r\n\r\n<p>Tr&ecirc;n c&aacute;c diễn đ&agrave;n điện ảnh, người h&acirc;m mộ dự đo&aacute;n Chris Evans nhiều khả năng sẽ t&aacute;i xuất với vai Đội Trưởng Mỹ trong<em>&nbsp;Captain America: Brave New World&nbsp;</em>(2021) hoặc<em>&nbsp;Avengers: Secret Wars</em>&nbsp;(2027). Một số nguồn tin cho biết nam diễn vi&ecirc;n đang đợi cuộc đ&igrave;nh c&ocirc;ng tại Hollywood kết th&uacute;c để c&oacute; thể bắt đầu kh&acirc;u ghi h&igrave;nh.</p>\r\n\r\n<p>Trong khi đ&oacute;, nhiều giả thuyết về sự trở lại của Robert Downey Jr. trong vai Iron Man cũng được người h&acirc;m mộ đưa ra. Một trong những &yacute; tưởng nhận nhiều sự ủng hộ l&agrave; li&ecirc;n quan đến series&nbsp;<em>Ironheart</em>&nbsp;- bộ phim về Người Sắt phi&ecirc;n bản nữ của Marvel dự kiến ra mắt năm 2024. Trong nguy&ecirc;n t&aacute;c, nh&acirc;n vật Tony Stark (t&ecirc;n thật của Iron Man) đ&oacute;ng vai tr&ograve; quan trọng gi&uacute;p c&ocirc; b&eacute; Riri trở th&agrave;nh Người Sắt phi&ecirc;n bản nữ. Cụ thể, anh xuất hiện trong h&igrave;nh dạng một thực thể tr&iacute; tuệ nh&acirc;n tạo để hướng dẫn c&ocirc; b&eacute; l&agrave;m si&ecirc;u anh h&ugrave;ng.</p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/203336854389633024/2023/11/6/photo-1-16992615179221469279070.jpg\" target=\"_blank\" title=\"Captain America và Iron Man là những siêu anh hùng quan trọng nhất của Vũ trụ Điện ảnh Marvel từ những bộ phim đầu tiên cho đến Avengers: Endgame (2019)\"><img alt=\"Iron Man và Captain America được mời quay lại Vũ trụ Điện ảnh Marvel, biệt đội Avengers huyền thoại sắp sửa tái hợp? - Ảnh 2.\" height=\"\" src=\"https://kenh14cdn.com/thumb_w/620/203336854389633024/2023/11/6/photo-1-16992615179221469279070.jpg\" title=\"Iron Man và Captain America được mời quay lại Vũ trụ Điện ảnh Marvel, biệt đội Avengers huyền thoại sắp sửa tái hợp? - Ảnh 2.\" width=\"\" /></a></p>\r\n\r\n<p>Captain America v&agrave; Iron Man l&agrave; những si&ecirc;u anh h&ugrave;ng quan trọng nhất của Vũ trụ Điện ảnh Marvel từ những bộ phim đầu ti&ecirc;n cho đến Avengers: Endgame (2019)</p>\r\n\r\n<p>Chris Evans v&agrave; Robert Downey Jr. rời Vũ trụ Điện ảnh Marvel sau bộ phim&nbsp;<em>Avengers: Endgame&nbsp;</em>(2019). Nh&acirc;n vật Iron Man do Robert thủ vai đ&atilde; hy sinh bản th&acirc;n để ngăn chặn Thanos ti&ecirc;u diệt vũ trụ. Trong khi đ&oacute;, Captain America do Chris Evans đ&oacute;ng quyết định nghỉ hưu, ngừng sự nghiệp si&ecirc;u anh h&ugrave;ng để d&agrave;nh thời gian cho người y&ecirc;u Peggy Carter của m&igrave;nh.</p>\r\n\r\n<p>&nbsp;</p>', '8105Oc1+FPL64.jpg', 3, 1, '3', 0, 20231201, 20231201, 'aaaaaaaaaaaa', 'nmbnmb', '', '', ''),
(7, 2, 123, 'phim bbbbbbbbb', '<p>phim bbbbbbbbb</p>', '<p>phim bbbbbbbbb</p>', '71-sziO1OsL73.jpg', 4, 1, '1,3', 0, 20231201, 20231201, 'phim-bbbbbbbbb', 'drrgdg', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `news_categories`
--

DROP TABLE IF EXISTS `news_categories`;
CREATE TABLE IF NOT EXISTS `news_categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `desc` text COLLATE utf8mb4_general_ci NOT NULL,
  `content` mediumtext COLLATE utf8mb4_general_ci NOT NULL,
  `root_id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `parent_id` int NOT NULL,
  `level` smallint NOT NULL,
  `display_order` int NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `representative` smallint NOT NULL,
  `status` smallint NOT NULL,
  `seo_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `meta_desc` text COLLATE utf8mb4_general_ci NOT NULL,
  `meta_keyword` text COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news_categories`
--

INSERT INTO `news_categories` (`id`, `name`, `desc`, `content`, `root_id`, `parent_id`, `level`, `display_order`, `image`, `representative`, `status`, `seo_name`, `meta_title`, `meta_desc`, `meta_keyword`) VALUES
(1, 'danh mục aaaaaaaaa', '', '', ' , ', 0, 1, 1, 'image002_18870_b56691ea39.jpeg', 0, 1, 'danh-muc-aaaaaaaaa', '', '', ''),
(2, 'danh mục bbbb', '<p>danh mục bbbb</p>', '', ' , 1 , ', 1, 2, 2, 'VkOoPRr73.jpeg', 0, 1, 'danh-muc-bbbb', '', '', ''),
(3, 'danh mục ccccc', '<p>danh mục ccccc</p>', '<p>danh mục ccccc</p>', ' , 1 , ', 1, 2, 3, '8105Oc1+FPL27.jpg', 1, 0, 'danh-muc-ccccc', 'danh mục ccccc', '', 'danh mục ccccc'),
(4, 'danh mục dddddddddddd', '', '<p>danh mục ddddddddddddcfghvcgh</p>', ' , ', 0, 1, 4, 'Oppenheimer_–_Vietnam_poster83.jpg', 0, 0, 'danh-muc-dddddddddddd', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `server_links`
--

DROP TABLE IF EXISTS `server_links`;
CREATE TABLE IF NOT EXISTS `server_links` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `desc` text COLLATE utf8mb4_general_ci NOT NULL,
  `display_order` int NOT NULL,
  `status` smallint NOT NULL,
  `seo_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `date_created` int NOT NULL,
  `date_updated` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `server_links`
--

INSERT INTO `server_links` (`id`, `name`, `desc`, `display_order`, `status`, `seo_name`, `date_created`, `date_updated`) VALUES
(1, 'abc', '<p>sdfgsdg</p>', 1, 1, 'abc', 20231204, 20231204);

-- --------------------------------------------------------

--
-- Table structure for table `subtitles`
--

DROP TABLE IF EXISTS `subtitles`;
CREATE TABLE IF NOT EXISTS `subtitles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `episode_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
