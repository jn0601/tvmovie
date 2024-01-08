-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 08, 2024 at 08:28 PM
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
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `type` smallint NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `status` smallint NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `type`, `fullname`, `email`, `phone`, `status`) VALUES
(2, 'root', '0cc175b9c0f1b6a831c399e269772661', 99, 'admin root', 'root@admin.com', '0123456789', 1);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

DROP TABLE IF EXISTS `banners`;
CREATE TABLE IF NOT EXISTS `banners` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `desc` text COLLATE utf8mb4_general_ci NOT NULL,
  `content` mediumtext COLLATE utf8mb4_general_ci NOT NULL,
  `seo_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `display_order` int NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `status` smallint NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `category_id`, `name`, `desc`, `content`, `seo_name`, `link`, `display_order`, `image`, `status`) VALUES
(1, 1, '1', '<p>xfgdxfhfh</p>', '', '1', '', 1, 'movie-logo-png-favpng-nRr1DmYq3SNYSLN8571CHQTEG14.jpg', 1),
(2, 1, '2', '', '', '2', 'vcghjfj', 2, 'movie-logo-png-favpng-nRr1DmYq3SNYSLN8571CHQTEG12.jpg', 1),
(3, 1, '3', '', '', '3', '', 3, 'movie-logo-png-favpng-nRr1DmYq3SNYSLN8571CHQTEG57.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `banner_categories`
--

DROP TABLE IF EXISTS `banner_categories`;
CREATE TABLE IF NOT EXISTS `banner_categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `desc` text COLLATE utf8mb4_general_ci NOT NULL,
  `seo_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `display_order` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banner_categories`
--

INSERT INTO `banner_categories` (`id`, `name`, `desc`, `seo_name`, `display_order`) VALUES
(1, 'footer', '', 'footer', 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `desc`, `display_order`, `status`, `seo_name`, `meta_title`, `meta_desc`, `meta_keyword`) VALUES
(1, 'Việt Nam', '<p>vnxdfghfxhtxdfhg</p>', 1, 1, 'viet-nam', 'vvvvvv', 'vvvvvvvvv', 'nnnnnnnnnnn'),
(2, 'Âu Mỹ', '', 2, 1, 'au-my', '', '', ''),
(3, 'Hàn Quốc', '', 3, 1, 'han-quoc', '', '', ''),
(4, 'Nhật Bản', '', 4, 1, 'nhat-ban', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `role_id` int NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `balance` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `status` smallint NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `role_id`, `username`, `password`, `fullname`, `email`, `phone`, `balance`, `status`) VALUES
(1, 1, 'cus', '0cc175b9c0f1b6a831c399e269772661', 'cus test', 'cus@cus.com', '123', '100.000 VND', 1),
(2, 1, 'testKH', '0cc175b9c0f1b6a831c399e269772661', 'testKH', 'testKH@testKH', '1111111111', '200.000 VND', 1),
(3, 1, 'KHvip', '0cc175b9c0f1b6a831c399e269772661', 'KHvip', 'KHvip@KHvip', '2222222222', '500.000 VND', 1);

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
  `status` smallint NOT NULL,
  `options` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `count_view` int NOT NULL,
  `date_created` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `date_updated` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `seo_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tags` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `meta_desc` text COLLATE utf8mb4_general_ci NOT NULL,
  `meta_keyword` text COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `episodes`
--

INSERT INTO `episodes` (`id`, `movie_id`, `admin_id`, `episode`, `name`, `desc`, `content`, `status`, `options`, `count_view`, `date_created`, `date_updated`, `seo_name`, `tags`, `meta_title`, `meta_desc`, `meta_keyword`) VALUES
(8, 2, 123, 1, 'Tập 1', '', '', 1, '', 0, '2023-12-21 18:09:24', '2024-01-06 10:11:35', 'tap-1', '', '', '', ''),
(12, 1, 123, 1, 'Tập 1', '', '', 1, '1', 0, '2023-12-27 05:01:10', '2024-01-08 19:15:11', 'tap-1', '', '', '', ''),
(13, 1, 123, 2, 'Tập 2', '', '', 1, '', 0, '2023-12-27 05:33:10', '2024-01-08 19:57:01', 'tap-2', '', '', '', ''),
(14, 3, 123, 1, 'Tập 1', '', '', 1, '', 0, '2023-12-27 05:52:29', '2024-01-06 10:12:35', 'tap-1', '', '', '', ''),
(21, 1, 123, 4, 'Tập 4', '', '', 1, '', 0, '2024-01-04 15:09:15', '2024-01-04 15:09:15', 'tap-4', '', '', '', ''),
(20, 1, 123, 3, 'Tập 3', '', '', 1, '', 0, '2024-01-04 15:01:41', '2024-01-04 15:01:41', 'tap-3', '', '', '', ''),
(22, 1, 123, 5, 'Tập 5', '', '', 1, '', 0, '2024-01-04 15:09:32', '2024-01-04 15:09:32', 'tap-5', '', '', '', ''),
(23, 4, 123, 1, 'Tập 1', '', '', 1, '', 0, '2024-01-06 10:13:30', '2024-01-06 10:13:30', 'tap-1', '', '', '', ''),
(24, 5, 123, 1, 'Tập 1', '', '', 1, '', 0, '2024-01-06 10:14:37', '2024-01-06 10:14:37', 'tap-1', '', '', '', ''),
(25, 6, 123, 1, 'Tập 1', '', '', 1, '', 0, '2024-01-06 10:15:29', '2024-01-06 10:15:29', 'tap-1', '', '', '', ''),
(26, 7, 123, 1, 'Tập 1', '', '', 1, '', 0, '2024-01-06 10:16:07', '2024-01-06 10:16:07', 'tap-1', '', '', '', ''),
(27, 8, 123, 1, 'Tập 1', '', '', 1, '', 0, '2024-01-06 10:16:49', '2024-01-06 10:16:49', 'tap-1', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `episode_servers`
--

DROP TABLE IF EXISTS `episode_servers`;
CREATE TABLE IF NOT EXISTS `episode_servers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `episode_id` int NOT NULL,
  `server_id` int NOT NULL,
  `link` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `episode_servers`
--

INSERT INTO `episode_servers` (`id`, `episode_id`, `server_id`, `link`) VALUES
(4, 8, 1, '<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/uYPbbksJxIg?si=T3GveZw1VaomV3_J\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>'),
(5, 8, 3, '<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/uYPbbksJxIg?si=T3GveZw1VaomV3_J\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>'),
(8, 14, 1, '<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/shW9i6k8cB0?si=DAUwcI-9ZbEF4udN\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>'),
(19, 12, 3, '<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/dug56u8NN7g?si=4YEAWYAayY9zODFV\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>'),
(9, 20, 1, '<iframe id=\"iframe-embed\" width=\"100%\" height=\"500\" scrolling=\"no\" frameborder=\"0\" src=\"https://megacloud.tv/embed-1/e-1/Hsv0Ix1Dat9H?z=\" allowfullscreen=\"allowfullscreen\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\" __idm_id__=\"32769\"></iframe>'),
(10, 20, 2, '<iframe id=\"iframe-embed\" width=\"100%\" height=\"500\" scrolling=\"no\" frameborder=\"0\" src=\"https://megacloud.tv/embed-1/e-1/Hsv0Ix1Dat9H?z=\" allowfullscreen=\"allowfullscreen\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\" __idm_id__=\"32769\"></iframe>'),
(11, 21, 2, '<iframe id=\"iframe-embed\" width=\"100%\" height=\"500\" scrolling=\"no\" frameborder=\"0\" src=\"https://megacloud.tv/embed-1/e-1/Hsv0Ix1Dat9H?z=\" allowfullscreen=\"allowfullscreen\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\" __idm_id__=\"32769\"></iframe>'),
(12, 22, 1, '<iframe id=\"iframe-embed\" width=\"100%\" height=\"500\" scrolling=\"no\" frameborder=\"0\" src=\"https://megacloud.tv/embed-1/e-1/Hsv0Ix1Dat9H?z=\" allowfullscreen=\"allowfullscreen\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\" __idm_id__=\"32769\"></iframe>'),
(13, 23, 1, '<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/avz06PDqDbM?si=XRxXkxwXZ0anbI8k\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>'),
(14, 24, 1, '<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/l4nP-Zm9YAs?si=6yUFW5Qe3LC6NVmW\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>'),
(15, 25, 1, '<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/VvSrHIX5a-0?si=qolNfP7T7YuH7Qo_\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>'),
(16, 26, 1, '<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/UGc5Tzz19UY?si=pIf50zbrXrVb5Hgp\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>'),
(17, 27, 1, '<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/6e2Sh1Gw1CE?si=LLivxQaPyTvs4TRy\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>'),
(18, 13, 2, '<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/vwSKatRviQo?si=CiQtykNYucZCbqUh\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>'),
(20, 13, 3, '<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/dug56u8NN7g?si=4YEAWYAayY9zODFV\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>');

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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `name`, `desc`, `display_order`, `status`, `seo_name`, `meta_title`, `meta_desc`, `meta_keyword`) VALUES
(2, 'Hoạt hình', '', 2, 1, 'hoat-hinh', '', '', ''),
(4, 'Hành động', '', 3, 1, 'hanh-dong', '', '', ''),
(5, 'Tâm lý', '', 4, 1, 'tam-ly', '', '', ''),
(6, 'Tình cảm', '', 5, 1, 'tinh-cam', '', '', ''),
(7, 'Khoa học viễn tưởng', '', 6, 1, 'khoa-hoc-vien-tuong', '', '', ''),
(8, 'Gia đình', '', 7, 1, 'gia-dinh', '', '', ''),
(9, 'Kinh dị', '', 8, 1, 'kinh-di', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

DROP TABLE IF EXISTS `movies`;
CREATE TABLE IF NOT EXISTS `movies` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `org_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `year` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `desc` text COLLATE utf8mb4_general_ci NOT NULL,
  `content` mediumtext COLLATE utf8mb4_general_ci NOT NULL,
  `price` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `link_trailer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `display_order` int NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `status` smallint NOT NULL,
  `options` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `count_view` int NOT NULL,
  `date_created` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `date_updated` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `seo_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tags` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `meta_desc` text COLLATE utf8mb4_general_ci NOT NULL,
  `meta_keyword` text COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `category_id`, `name`, `org_name`, `year`, `desc`, `content`, `price`, `link_trailer`, `display_order`, `image`, `status`, `options`, `count_view`, `date_created`, `date_updated`, `seo_name`, `tags`, `meta_title`, `meta_desc`, `meta_keyword`) VALUES
(1, 1, 'Loki mùa 2', 'Loki season 2', '2023', '<p>Điểm IMDb:&nbsp;<a href=\"https://www.imdb.com/title/tt9140554/\" target=\"_blank\">8.2</a></p>\r\n\r\n<p>Đạo diễn:&nbsp;Kate Herron&nbsp;Aaron Moorhead&nbsp;Justin Benson</p>\r\n\r\n<p>T&igrave;nh trạng: Ho&agrave;n tất</p>\r\n\r\n<p>Năm sản xuất: 2023</p>\r\n\r\n<p>Loạt phim:&nbsp;Marvel</p>\r\n\r\n<p>Diễn vi&ecirc;n:&nbsp;Owen Wilson&nbsp;Tom Hiddleston&nbsp;Jonathan Majors&nbsp;Deobia Oparei&nbsp;Richard E. Grant</p>', '<p>Phim&nbsp;<strong>Loki Season 2 (Loki - M&ugrave;a 2)</strong>&nbsp;l&agrave; phần tiếp theo của phim Loki (2021), v&agrave; l&agrave; phần thứ mười trong vũ trụ điện ảnh Marvel. Trong phần phim n&agrave;y, Loki (Tom Hiddleston thủ vai) v&agrave; Sylvie (Sophia Di Martino thủ vai) tiếp tục cuộc h&agrave;nh tr&igrave;nh của họ để t&igrave;m kiếm Time-Keepers, những người m&agrave; họ tin rằng l&agrave; những kẻ đứng sau việc tạo ra Sacred Timeline.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Cuối phần phim đầu ti&ecirc;n, Loki v&agrave; Sylvie đ&atilde; giết chết một trong những Time-Keepers, v&agrave; họ ph&aacute;t hiện ra rằng Sacred Timeline l&agrave; một ảo tưởng. Họ cũng ph&aacute;t hiện ra rằng Kang the Conqueror (Jonathan Majors thủ vai) l&agrave; người thực sự đứng sau việc tạo ra Sacred Timeline.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Trong phần phim thứ hai, Loki v&agrave; Sylvie sẽ phải đối mặt với Kang the Conqueror. Họ cũng sẽ phải đối mặt với những hậu quả của việc ph&aacute; hủy Sacred Timeline.</p>', '10.000 VND', 'dug56u8NN7g?si=xs5Vc4b0BLTwrcJp', 1, 'image002_18870_b56691ea27.jpeg', 1, '1,2,4', 18, '2023-12-12 15:54:54', '2024-01-04 11:04:48', 'loki-mua-2', 'hanh dong,tam ly,marvel', '', '', ''),
(2, 2, 'Oppenheimer', 'Oppenheimer', '2023', '', '', '10.000 VND', '', 2, 'Oppenheimer_–_Vietnam_poster18.jpg', 1, '1,2,4', 1, '2023-12-12 15:57:51', '2024-01-04 13:49:53', 'oppenheimer', 'hanh dong,tam ly', '', '', ''),
(3, 2, 'Người nhện', 'Spider Man', '2023', '', '', '5.000 VND', '', 3, '8105Oc1+FPL90.jpg', 1, '1,2,4', 5, '2023-12-27 05:52:13', '2024-01-06 13:37:06', 'nguoi-nhen', 'hoat hinh', '', '', ''),
(4, 2, 'Nhiệm Vụ Bất Khả Thi', 'Mission Impossible', '1900', '', '', '5.000 VND', '', 4, '71-sziO1OsL13.jpg', 1, '1,4', 0, '2023-12-27 06:59:48', '2024-01-04 13:50:09', 'nhiem-vu-bat-kha-thi', '', '', '', ''),
(5, 2, 'Cú úp rổ đầu tiên', 'The first slam dunk', '2023', '<p>zdsrshgdzhfgh</p>', '<p>dghfxgjfyjry</p>', '5.000 VND', 'https://youtu.be/dug56u8NN7g?si=rNDyCgR-15d5K_VE', 5, 'VkOoPRr2.jpeg', 1, '1,4', 5, '2023-12-28 10:39:08', '2024-01-04 12:27:43', 'cu-up-ro-dau-tien', 'hoat hinh', '', '', ''),
(6, 2, 'Godzilla Trừ Một', 'Godzilla Minus One', '2024', '<p>gfukjfgjitgyj</p>', '<p>gyjkgyjitygju</p>', '10.000 VND', '', 6, 'GodzillaMinusOne_PayoffPoster_web16.png', 1, '1,2', 3, '2023-12-28 10:44:27', '2024-01-04 13:50:16', 'godzilla-tru-mot', '', '', '', ''),
(7, 2, 'Aquaman và vương quốc thất lạc', 'Aquaman and the lost kingdom', '2023', '', '', '10.000 VND', '', 7, 'MV5BMTkxM2FiYjctYjliYy00NjY2LWFmOTEtMWZiYWRjNjA4MGYxXkEyXkFqcGdeQXVyMTUzMTg2ODkz85.jpg', 1, '1', 5, '2023-12-28 10:46:38', '2024-01-04 13:50:28', 'aquaman-va-vuong-quoc-that-lac', '', '', '', ''),
(8, 1, 'Con nhà tài phiệt', 'Reborn rich', '2022', '', '', '10.000 VND', '', 8, 'lich-chieu-reborn-rich-song-joong-ki-36.jpg', 1, '2,3', 1, '2023-12-28 10:50:33', '2024-01-06 13:37:12', 'con-nha-tai-phiet', '', '', '', ''),
(11, 2, 'phim test', '', '2022', '', '', '1.000 VND', '', 9, 'MV5BMTkxM2FiYjctYjliYy00NjY2LWFmOTEtMWZiYWRjNjA4MGYxXkEyXkFqcGdeQXVyMTUzMTg2ODkz51.jpg', 1, '1', 4, '2024-01-06 12:43:33', '2024-01-06 12:55:57', 'phim-test', '', '', '', '');

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
(1, 'Phim bộ', '<p>hhhhhhfghfhdfh</p>', 1, 1, 'phim-bo', 'hhhhhh', 'hhhhhhhhhh', 'hhhhhhhhhhhh'),
(2, 'Phim lẻ', '', 2, 1, 'phim-le', '', '', '');

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
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movie_countries`
--

INSERT INTO `movie_countries` (`id`, `movie_id`, `country_id`) VALUES
(53, 3, 2),
(47, 2, 2),
(45, 1, 2),
(46, 5, 4),
(49, 6, 4),
(50, 7, 2),
(54, 8, 3),
(52, 11, 2);

-- --------------------------------------------------------

--
-- Table structure for table `movie_customers`
--

DROP TABLE IF EXISTS `movie_customers`;
CREATE TABLE IF NOT EXISTS `movie_customers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `movie_id` int NOT NULL,
  `customer_id` int NOT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=88 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movie_genres`
--

INSERT INTO `movie_genres` (`id`, `movie_id`, `genre_id`) VALUES
(77, 2, 4),
(76, 2, 5),
(74, 1, 4),
(73, 1, 5),
(86, 3, 2),
(75, 5, 2),
(80, 6, 4),
(79, 4, 4),
(81, 7, 4),
(87, 8, 5),
(83, 11, 8),
(84, 11, 7),
(85, 11, 4);

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
  `date_created` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `date_updated` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
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
(3, 2, 123, 'aaaaaaaaaaaa', '<p>aaaaaaaaaaa</p>', '<p>Theo MovieWeb, một nguồn tin tại Hollywood cho biết cả&nbsp;<a href=\"https://kenh14.vn/chris-evans.html\" target=\"_blank\" title=\"chris evans\">Chris Evans</a>&nbsp;v&agrave;&nbsp;<a href=\"https://kenh14.vn/robert-downey-jr.html\" target=\"_blank\" title=\"robert downey jr.\">Robert Downey Jr.</a>&nbsp;mới đ&acirc;y đ&atilde; đồng &yacute; quay trở lại Vũ trụ Điện ảnh Marvel (MCU). Trước đ&oacute;, xuất hiện một số th&ocirc;ng tin về việc h&atilde;ng phim dự định mời c&aacute;c ng&ocirc;i sao cũ để vực thương hiệu si&ecirc;u anh h&ugrave;ng sau qu&atilde;ng thời gian kh&oacute; khăn vừa qua. Ngo&agrave;i Chris v&agrave; Robert, Scarlett Johansson cũng l&agrave; một trong những gương mặt được nhắm đến.</p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/203336854389633024/2023/11/6/photo-2-1699261519600201773962.jpeg\" target=\"_blank\" title=\"Chris Evans và Robert Downey Jr. được cho là đã nhận lời quay lại Vũ trụ Điện ảnh Marvel\"><img alt=\"Iron Man và Captain America được mời quay lại Vũ trụ Điện ảnh Marvel, biệt đội Avengers huyền thoại sắp sửa tái hợp? - Ảnh 1.\" height=\"\" src=\"https://kenh14cdn.com/thumb_w/620/203336854389633024/2023/11/6/photo-2-1699261519600201773962.jpeg\" title=\"Iron Man và Captain America được mời quay lại Vũ trụ Điện ảnh Marvel, biệt đội Avengers huyền thoại sắp sửa tái hợp? - Ảnh 1.\" width=\"\" /></a></p>\r\n\r\n<p>Chris Evans v&agrave; Robert Downey Jr. được cho l&agrave; đ&atilde; nhận lời quay lại Vũ trụ Điện ảnh Marvel</p>\r\n\r\n<p>Tr&ecirc;n c&aacute;c diễn đ&agrave;n điện ảnh, người h&acirc;m mộ dự đo&aacute;n Chris Evans nhiều khả năng sẽ t&aacute;i xuất với vai Đội Trưởng Mỹ trong<em>&nbsp;Captain America: Brave New World&nbsp;</em>(2021) hoặc<em>&nbsp;Avengers: Secret Wars</em>&nbsp;(2027). Một số nguồn tin cho biết nam diễn vi&ecirc;n đang đợi cuộc đ&igrave;nh c&ocirc;ng tại Hollywood kết th&uacute;c để c&oacute; thể bắt đầu kh&acirc;u ghi h&igrave;nh.</p>\r\n\r\n<p>Trong khi đ&oacute;, nhiều giả thuyết về sự trở lại của Robert Downey Jr. trong vai Iron Man cũng được người h&acirc;m mộ đưa ra. Một trong những &yacute; tưởng nhận nhiều sự ủng hộ l&agrave; li&ecirc;n quan đến series&nbsp;<em>Ironheart</em>&nbsp;- bộ phim về Người Sắt phi&ecirc;n bản nữ của Marvel dự kiến ra mắt năm 2024. Trong nguy&ecirc;n t&aacute;c, nh&acirc;n vật Tony Stark (t&ecirc;n thật của Iron Man) đ&oacute;ng vai tr&ograve; quan trọng gi&uacute;p c&ocirc; b&eacute; Riri trở th&agrave;nh Người Sắt phi&ecirc;n bản nữ. Cụ thể, anh xuất hiện trong h&igrave;nh dạng một thực thể tr&iacute; tuệ nh&acirc;n tạo để hướng dẫn c&ocirc; b&eacute; l&agrave;m si&ecirc;u anh h&ugrave;ng.</p>\r\n\r\n<p><a href=\"https://kenh14cdn.com/203336854389633024/2023/11/6/photo-1-16992615179221469279070.jpg\" target=\"_blank\" title=\"Captain America và Iron Man là những siêu anh hùng quan trọng nhất của Vũ trụ Điện ảnh Marvel từ những bộ phim đầu tiên cho đến Avengers: Endgame (2019)\"><img alt=\"Iron Man và Captain America được mời quay lại Vũ trụ Điện ảnh Marvel, biệt đội Avengers huyền thoại sắp sửa tái hợp? - Ảnh 2.\" height=\"\" src=\"https://kenh14cdn.com/thumb_w/620/203336854389633024/2023/11/6/photo-1-16992615179221469279070.jpg\" title=\"Iron Man và Captain America được mời quay lại Vũ trụ Điện ảnh Marvel, biệt đội Avengers huyền thoại sắp sửa tái hợp? - Ảnh 2.\" width=\"\" /></a></p>\r\n\r\n<p>Captain America v&agrave; Iron Man l&agrave; những si&ecirc;u anh h&ugrave;ng quan trọng nhất của Vũ trụ Điện ảnh Marvel từ những bộ phim đầu ti&ecirc;n cho đến Avengers: Endgame (2019)</p>\r\n\r\n<p>Chris Evans v&agrave; Robert Downey Jr. rời Vũ trụ Điện ảnh Marvel sau bộ phim&nbsp;<em>Avengers: Endgame&nbsp;</em>(2019). Nh&acirc;n vật Iron Man do Robert thủ vai đ&atilde; hy sinh bản th&acirc;n để ngăn chặn Thanos ti&ecirc;u diệt vũ trụ. Trong khi đ&oacute;, Captain America do Chris Evans đ&oacute;ng quyết định nghỉ hưu, ngừng sự nghiệp si&ecirc;u anh h&ugrave;ng để d&agrave;nh thời gian cho người y&ecirc;u Peggy Carter của m&igrave;nh.</p>\r\n\r\n<p>&nbsp;</p>', '8105Oc1+FPL64.jpg', 3, 2, '3', 0, '20231201', '2024-01-04 13:34:14', 'aaaaaaaaaaaa', 'nmbnmb', '', '', ''),
(7, 5, 123, 'phim bbbbbbbbb', '<p>phim bbbbbbbbb</p>', '<p>phim bbbbbbbbb</p>', '71-sziO1OsL73.jpg', 4, 1, '1,3', 0, '20231201', '2024-01-04 13:34:08', 'phim-bbbbbbbbb', 'drrgdg,fgdfgdf,vgjnvhnfn,fgjghjf', '', '', '');

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news_categories`
--

INSERT INTO `news_categories` (`id`, `name`, `desc`, `content`, `root_id`, `parent_id`, `level`, `display_order`, `image`, `representative`, `status`, `seo_name`, `meta_title`, `meta_desc`, `meta_keyword`) VALUES
(1, 'Tin mới', '', '', ' , ', 0, 1, 1, 'image002_18870_b56691ea39.jpeg', 2, 1, 'tin-moi', '', '', ''),
(2, 'Tin abc', '<p>danh mục bbbb</p>', '', ' , 1 , ', 1, 2, 2, 'VkOoPRr73.jpeg', 1, 2, 'tin-abc', '', '', ''),
(3, 'Tin xyz', '<p>danh mục ccccc</p>', '<p>danh mục ccccc</p>', ' , 5 , ', 5, 2, 3, '8105Oc1+FPL27.jpg', 1, 2, 'tin-xyz', 'danh mục ccccc', '', 'danh mục ccccc'),
(4, 'Tin hot', '', '<p>danh mục ddddddddddddcfghvcgh</p>', ' , ', 0, 1, 4, 'Oppenheimer_–_Vietnam_poster83.jpg', 2, 1, 'tin-hot', '', '', ''),
(5, 'Tin điện ảnh', '', '', ' , ', 0, 1, 5, '71-sziO1OsL80.jpg', 2, 1, 'tin-dien-anh', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `customer_id` int NOT NULL,
  `service_id` int NOT NULL,
  `display_order` int NOT NULL,
  `status` smallint NOT NULL,
  `date_created` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `date_updated` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `code`, `customer_id`, `service_id`, `display_order`, `status`, `date_created`, `date_updated`) VALUES
(1, 'xfghfgh', 1, 1, 1, 2, '20231211', '20231211');

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
  `date_created` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `date_updated` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `server_links`
--

INSERT INTO `server_links` (`id`, `name`, `desc`, `display_order`, `status`, `seo_name`, `date_created`, `date_updated`) VALUES
(1, 'UPCLOUD', '<p>sdfgsdg</p>', 1, 1, 'upcloud', '20231204', '2023-12-21 16:01:10'),
(2, 'MEGACLOUD', '', 2, 1, 'megacloud', '2023-12-21 16:40:08', '2023-12-21 16:40:08'),
(3, 'Openload', '', 3, 1, 'openload', '2023-12-21 17:04:11', '2023-12-21 17:04:11');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `desc` text COLLATE utf8mb4_general_ci NOT NULL,
  `seo_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `display_order` int NOT NULL,
  `status` smallint NOT NULL,
  `date_created` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `date_updated` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `desc`, `seo_name`, `price`, `display_order`, `status`, `date_created`, `date_updated`) VALUES
(2, 'dv 1', '', 'dv-1', '10.000 VND', 1, 1, '20231211', '20231211');

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
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subtitles`
--

INSERT INTO `subtitles` (`id`, `episode_id`, `name`, `file`) VALUES
(14, 8, 'Tiếng Việt', '[WTRANZ] Loki S02E06 (2023) - WEB47.srt'),
(15, 8, 'Tiếng Anh', 'Loki25.srt');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
