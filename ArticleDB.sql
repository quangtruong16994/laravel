-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 19, 2016 at 06:02 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ArticleDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `summary` text COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` smallint(6) NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `creator_id` int(10) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=46 ;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `summary`, `content`, `alias`, `image`, `category_id`, `author`, `created_at`, `updated_at`, `status`, `creator_id`, `created_date`) VALUES
(1, 'Phó Thủ tướng: Có quản lý thị trường "bảo kê" cho hàng giả!', 'Phó Thủ tướng Chính phủ Nguyễn Xuân Phúc đánh giá cao những thành tích đạt được của lực lượng Quản lý thị trường cả nước trong năm 2015. Tuy nhiên, một bộ phận của QLTT có tình trạng kiểm tra nhiều nhưng xử lý ít, còn gây phiền hà, bảo kê, tiếp tay cho các tiêu cực…', 'Trong năm 2015, lực lượng quản lý thị trường (QLTT) trên cả nước đã kiểm tra hơn 174.000 vụ (tăng hơn 5.400 vụ, tăng 3,2% so với năm 2014); phát hiện, xử lý hơn 103.700 vụ vi phạm (tăng gần 10.500 vụ, tăng 11,2% so với năm 2014); tổng số thu nộp ngân sách gần 460 tỷ đồng (tăng 63,5 tỷ, tăng 16% so với năm 2014); giá trị hàng tịch thu chưa bán 133,8 tỷ đồng (tăng 44,5 tỷ đồng, tăng 59,5% so với năm 2014).\r\nĐối với công tác buôn lậu thuốc lá, Phó Thủ tướng Chính phủ Nguyễn Xuân Phúc – Trưởng ban Chỉ đạo 389 (BCĐ 389) quốc gia (Ban Chỉ đạo quốc gia chống buôn lậu, gian lận thương mại và hàng giả) đã hoan nghênh và biểu dương các Bộ, ngành, lực lượng chức năng và các địa phương đã nghiêm túc triển khai có hiệu quả Chỉ thị số 30/CT-TTg của Thủ tướng Chính phủ. Kết quả công tác chống buôn lậu thuốc lá đã giảm 30% lượng thuốc lá nhập lậu, trong đó lực lượng QLTT đã góp phần bắt giữ trên 1,9 triệu bao.\r\n\r\nCông tác phổ biến tuyên truyền pháp luật thực hiện tốt. Tổ chức ký cam kết hàng trăm nghìn đối tượng kinh doanh tập trung vào cơ sở kinh doanh mặt hàng thuốc lá, phân bón, mũ bảo hiểm, các siêu thị, trung tâm thương mại... Hoạt động kiểm tra việc chấp hành các nội dung ký cam kết được lực lượng QLTT quan tâm kiểm tra.', '', '', 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL, NULL),
(2, 'Vô Song Kiếm - Game Việt ấn định ra mắt vào 12/01', 'Vô Song Kiếm đã sẵn sàng để ra mắt phiên bản chính thức vào 12/01 tới. Được biết, đây là game mobile mới nhất của Studio Việt GameVN và NPH Vega Game.', 'Su khi kết thúc giai đoạn Alpha Test, Vô Song Kiếm đã sẵn sàng để ra mắt phiên bản chính thức vào 12/01 tới. Được biết, đây là game mobile mới nhất của Studio Việt GameVN và NPH Vega Game.\r\nVới những fan hâm mộ bộ truyện tranh 7 Viên ngọc rồng, có lẽ Lưỡng Long Nhất Thể là tuyệt kỹ ấn tượng thứ hai chỉ đứng sau chưởng lực Kamejoko (Kamehameha) của khỉ con Songoku. Lấy ý tưởng từ tuyệt chiêu này, đội ngũ phát triển của GameVN đã xây dựng một phiên bản game Kim Dung với tính năng Song Kiếm Hợp Bích độc đáo: 2 hoặc 3 nhân vật có mối lương duyên chuẩn xác với nhau khi ra trận có thể cùng hợp thể và tung ra một tuyệt kỹ cực mạnh. Đòn combo đầy uy lực này có thể thổi bay toàn bộ đội hình địch, với điều kiện nhân vật phải được kích đầy thanh nộ khí. Được biết, đòn combo mạnh nhất game đang thuộc sở hữu của 3 huynh đệ Kiều Phong - Đoàn Dự - Hư Trúc mang tên Quần Long Chi Thủ.\r\nMột ưu điểm không thể bỏ qua của Vô Song Kiếm là mỗi nhân vật và chiêu thức của game đều được lồng tiếng rất nghiêm túc, đúng chất võ lâm kiếm hiệp. Sở dĩ để làm được điều này, Vô Song Kiếm đã phải thuê lại đội ngũ chuyên lồng tiếng phim kiếm hiệp truyền hình để có được chất giọng chuẩn và quen thuộc nhất cho người nghe. Các nhân vật trong game cũng rất đa dạng phong phú, từ Thần Điêu Đại Hiệp, Thiên Long Bát Bộ... đến những nhân vật của Lộc Đỉnh Ký, Hiệp Khách Hành đều được xuất hiện và thể hiện hết sức sắc nét.', '', '', 2, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(45, 'Những game online bắn súng có đồ họa đẹp đến ngỡ ngàng', 'Tất cả những tựa game online bắn súng này đều xứng đáng thử qua trong thời gian ngắn tới đây', '<p><strong>Firefall</strong></p>\r\n\r\n<p><strong><a href="http://gamek.vn/firefall.htm" target="_blank" title="Firefall">Firefall</a></strong>&nbsp;l&agrave; một&nbsp;<a href="http://gamek.vn/game-ban-sung.htm" target="_blank" title="game bắn súng">game bắn s&uacute;ng</a>&nbsp;kết hợp nhập vai c&oacute; cả g&oacute;c nh&igrave;n thứ 1 lẫn thứ 3. Game sở hữu đồ họa b&oacute;ng bẩy v&agrave; nhiều t&iacute;nh năng đột ph&aacute; như thế giới mở chứ kh&ocirc;ng g&oacute;i gọn theo h&igrave;nh thức room truyền thống.</p>\r\n\r\n<p><strong>Firefall</strong>&nbsp;lấy cốt truyện khoa học viễn tưởng trong tương lai, khi m&agrave; người Tr&aacute;i Đất bắt đầu kh&aacute;m ph&aacute; vũ trụ, họ ph&aacute;t hiện ra những h&agrave;nh tinh mới, nhiều tiềm năng nhưng cũng phải đối mặt với lũ qu&aacute;i vật đang ngự trị tr&ecirc;n h&agrave;nh tinh n&agrave;y.</p>\r\n', 'nhung-game-online-ban-sung-co-do-hoa-dep-den-ngo-ngang', '', 2, 'gamek', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, '2016-01-18 21:40:30');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notes` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_author`, `image`, `notes`, `created_at`, `updated_at`) VALUES
(1, 'Chính trị', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Game', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Kinh tế', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Giáo dục', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_01_15_023041_create_articles_table', 2),
('2016_01_15_024604_create_users_table', 3),
('2016_01_15_025128_create_categories_table', 4),
('2016_01_15_025448_create_articles_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` datetime NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `fullname`, `phone`, `address`, `birthday`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'admin', '$2y$10$V4UoNzzVZUEQS5mJlDVCoOtbwBDxM/It.aiedoA5e/3mZC/mfN4ZS', 'quangtruong@gmail.com', 'Đỗ Quang Trường', '01234567899', 'Hà Nội', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-19 02:21:46', 'ue6H0QJamXc5SUI74qBraaK638d9RoZnBKDZFXDZAn0Ey9QoQZBU2RQtHFXg'),
(2, 'e91D45eTPY', '$2y$10$A8651Uj8SyeMqlUu7SwikOV3Ew1.hxl5ysOK1XbWGHGcrnZ7MF/X6', '2GoHa1FSBu@gmail.com', 'hZ4xdHltEgUEQri', '01698202514', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(3, 'Hw6jSHH4jB', '$2y$10$GPQrkSRYfHtXc2mkmZVIp.cK4TgezbEt0Jyi6caal6.ioRGdzBRTm', 'N1aFxVAQRf@gmail.com', 'qjWb77bNt6xOK86', '01649560546', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(4, 'xATMl66B9g', '$2y$10$gZaD8tEyzbkol28UxhL4pOoqSbAHQ4kw7slO4ZLpsM4t7kk90DREi', 'qsP5NRuKOM@gmail.com', 'K0qc8TQ63coAopf', '01664773559', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(5, '3ITyF7W2uN', '$2y$10$PPi6ixcpwffmAwVOQGfri.GuZS1qtKpdoFIwVgm23.mlROJX3adaW', 'cVoszGS6Pu@gmail.com', 'at30NcjAXmTstKm', '01696429443', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(6, 'R9pxc2rITO', '$2y$10$6R2DifgmC1uLyKYtzBI0KuH2sR6Vn/4xS0oaYEDK24KwL5nLF0q2O', 'AdWNO8jr15@gmail.com', 'iDSw7GtUonjf3jp', '01651608276', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(7, 'Lkf2RAu5qB', '$2y$10$Byz6kMMlBHbvhI2aKoE2G.54P1.Di4q2hvEGlieKziK.szxhr48f2', 'VhDmvDYlPH@gmail.com', 'RxnOPN7I6eajUC8', '01677038574', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(8, 'JONmAQUags', '$2y$10$ztS5DohVns4FUxYVvBmUw.wD7yTQlNOkEyb6dvooCN91eS0elJmgu', 'WY7OKjS4Xe@gmail.com', 'WshJOnPogRpjIQY', '01641128540', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
