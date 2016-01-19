-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 19, 2016 at 06:21 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=50 ;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `summary`, `content`, `alias`, `image`, `category_id`, `author`, `created_at`, `updated_at`, `status`, `creator_id`, `created_date`) VALUES
(1, 'Phó Thủ tướng: Có quản lý thị trường "bảo kê" cho hàng giả!', 'Phó Thủ tướng Chính phủ Nguyễn Xuân Phúc đánh giá cao những thành tích đạt được của lực lượng Quản lý thị trường cả nước trong năm 2015. Tuy nhiên, một bộ phận của QLTT có tình trạng kiểm tra nhiều nhưng xử lý ít, còn gây phiền hà, bảo kê, tiếp tay cho các tiêu cực…', 'Trong năm 2015, lực lượng quản lý thị trường (QLTT) trên cả nước đã kiểm tra hơn 174.000 vụ (tăng hơn 5.400 vụ, tăng 3,2% so với năm 2014); phát hiện, xử lý hơn 103.700 vụ vi phạm (tăng gần 10.500 vụ, tăng 11,2% so với năm 2014); tổng số thu nộp ngân sách gần 460 tỷ đồng (tăng 63,5 tỷ, tăng 16% so với năm 2014); giá trị hàng tịch thu chưa bán 133,8 tỷ đồng (tăng 44,5 tỷ đồng, tăng 59,5% so với năm 2014).\r\nĐối với công tác buôn lậu thuốc lá, Phó Thủ tướng Chính phủ Nguyễn Xuân Phúc – Trưởng ban Chỉ đạo 389 (BCĐ 389) quốc gia (Ban Chỉ đạo quốc gia chống buôn lậu, gian lận thương mại và hàng giả) đã hoan nghênh và biểu dương các Bộ, ngành, lực lượng chức năng và các địa phương đã nghiêm túc triển khai có hiệu quả Chỉ thị số 30/CT-TTg của Thủ tướng Chính phủ. Kết quả công tác chống buôn lậu thuốc lá đã giảm 30% lượng thuốc lá nhập lậu, trong đó lực lượng QLTT đã góp phần bắt giữ trên 1,9 triệu bao.\r\n\r\nCông tác phổ biến tuyên truyền pháp luật thực hiện tốt. Tổ chức ký cam kết hàng trăm nghìn đối tượng kinh doanh tập trung vào cơ sở kinh doanh mặt hàng thuốc lá, phân bón, mũ bảo hiểm, các siêu thị, trung tâm thương mại... Hoạt động kiểm tra việc chấp hành các nội dung ký cam kết được lực lượng QLTT quan tâm kiểm tra.', 'pho-thu-tuong-co-quan-ly-thi-truong-bao-ke-cho-hang-gia', '', 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL, NULL),
(2, 'Vô Song Kiếm - Game Việt ấn định ra mắt vào 12/01', 'Vô Song Kiếm đã sẵn sàng để ra mắt phiên bản chính thức vào 12/01 tới. Được biết, đây là game mobile mới nhất của Studio Việt GameVN và NPH Vega Game.', 'Su khi kết thúc giai đoạn Alpha Test, Vô Song Kiếm đã sẵn sàng để ra mắt phiên bản chính thức vào 12/01 tới. Được biết, đây là game mobile mới nhất của Studio Việt GameVN và NPH Vega Game.\r\nVới những fan hâm mộ bộ truyện tranh 7 Viên ngọc rồng, có lẽ Lưỡng Long Nhất Thể là tuyệt kỹ ấn tượng thứ hai chỉ đứng sau chưởng lực Kamejoko (Kamehameha) của khỉ con Songoku. Lấy ý tưởng từ tuyệt chiêu này, đội ngũ phát triển của GameVN đã xây dựng một phiên bản game Kim Dung với tính năng Song Kiếm Hợp Bích độc đáo: 2 hoặc 3 nhân vật có mối lương duyên chuẩn xác với nhau khi ra trận có thể cùng hợp thể và tung ra một tuyệt kỹ cực mạnh. Đòn combo đầy uy lực này có thể thổi bay toàn bộ đội hình địch, với điều kiện nhân vật phải được kích đầy thanh nộ khí. Được biết, đòn combo mạnh nhất game đang thuộc sở hữu của 3 huynh đệ Kiều Phong - Đoàn Dự - Hư Trúc mang tên Quần Long Chi Thủ.\r\nMột ưu điểm không thể bỏ qua của Vô Song Kiếm là mỗi nhân vật và chiêu thức của game đều được lồng tiếng rất nghiêm túc, đúng chất võ lâm kiếm hiệp. Sở dĩ để làm được điều này, Vô Song Kiếm đã phải thuê lại đội ngũ chuyên lồng tiếng phim kiếm hiệp truyền hình để có được chất giọng chuẩn và quen thuộc nhất cho người nghe. Các nhân vật trong game cũng rất đa dạng phong phú, từ Thần Điêu Đại Hiệp, Thiên Long Bát Bộ... đến những nhân vật của Lộc Đỉnh Ký, Hiệp Khách Hành đều được xuất hiện và thể hiện hết sức sắc nét.', 'vo-song-kiem-game-viet-an-dinh-ra-mat-vao-1201', '', 2, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(45, 'Những game online bắn súng có đồ họa đẹp đến ngỡ ngàng', 'Tất cả những tựa game online bắn súng này đều xứng đáng thử qua trong thời gian ngắn tới đây', '<strong>Firefall</strong>\n\n<strong><a href="http://gamek.vn/firefall.htm" target="_blank" title="Firefall">Firefall</a></strong>&nbsp;l&agrave; một&nbsp;<a href="http://gamek.vn/game-ban-sung.htm" target="_blank" title="game bắn súng">game bắn s&uacute;ng</a>&nbsp;kết hợp nhập vai c&oacute; cả g&oacute;c nh&igrave;n thứ 1 lẫn thứ 3. Game sở hữu đồ họa b&oacute;ng bẩy v&agrave; nhiều t&iacute;nh năng đột ph&aacute; như thế giới mở chứ kh&ocirc;ng g&oacute;i gọn theo h&igrave;nh thức room truyền thống.</p>\n\n<strong>Firefall</strong>&nbsp;lấy cốt truyện khoa học viễn tưởng trong tương lai, khi m&agrave; người Tr&aacute;i Đất bắt đầu kh&aacute;m ph&aacute; vũ trụ, họ ph&aacute;t hiện ra những h&agrave;nh tinh mới, nhiều tiềm năng nhưng cũng phải đối mặt với lũ qu&aacute;i vật đang ngự trị tr&ecirc;n h&agrave;nh tinh n&agrave;y.\n', 'nhung-game-online-ban-sung-co-do-hoa-dep-den-ngo-ngang', '', 2, 'gamek', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, '2016-01-18 21:40:30'),
(46, 'Sợ cày kéo, muốn giữ sức khỏe, game thủ Việt chơi game online nào?', 'Cùng chúng tôi điểm qua những tựa game online nhẹ nhàng không đòi hỏi cày kéo mệt mỏi trong những buổi tối sau khi công việc và học tập đã được gác qua một bên', '<p>Như vậy l&agrave; 37Games đ&atilde; ch&iacute;nh thức mở cửa rộng r&atilde;i cho game online nhập vai h&agrave;nh động nền web&nbsp;<strong><a href="http://gamek.vn/guardians-of-divinity.htm" target="_blank" title="Guardians of Divinity">Guardians of Divinity</a></strong>&nbsp;sau hơn chục ng&agrave;y thử nghiệm v&agrave; nhận được nhiều phản ứng t&iacute;ch cực của cộng đồng game thủ to&agrave;n thế giới. Chi tiết cũng như th&ocirc;ng tin đăng k&yacute; t&agrave;i khoản game thủ c&oacute; thể t&igrave;m hiểu tại trang web của tựa game tại địa chỉ&nbsp;<a href="http://news.37.com/god/cover?cid=54&amp;scid=godc" rel="nofollow" target="_blank" title="http://news.37.com/god/cover?cid=54&amp;scid=godc">http://news.37.com/god/cover?cid=54&amp;scid=godc</a></p>\r\n\r\n<p>Được biết tr&ograve; chơi được ph&aacute;t h&agrave;nh dưới dạng miễn ph&iacute; giờ chơi ho&agrave;n to&agrave;n, game thủ c&oacute; thể dễ d&agrave;ng tham gia chơi m&agrave; kh&ocirc;ng cần phải lo lắng về việc mất tiền để được chơi.</p>\r\n\r\n<p><strong><a href="http://gamek.vn/game-online/game-online-arpg-hap-dan-guardians-of-divinity-mo-cua-thu-nghiem-20160107150627282.chn" target="_blank" title="Guardians of Divinity">Guardians of Divinity</a></strong>&nbsp;lấy bối cảnh &quot;phong thần viễn cổ&quot; đ&uacute;ng nghĩa đen, nhưng trong game bạn sẽ v&agrave;o vai những nh&acirc;n vật dựa tr&ecirc;n truyền thuyết Hy Lạp, Trung Quốc v&agrave; cả Ai Cập cổ đại chứ kh&ocirc;ng ho&agrave;n to&agrave;n phụ thuộc v&agrave;o bối cảnh phương Đ&ocirc;ng như trước nữa.</p>\r\n', 'so-cay-keo-muon-giu-suc-khoe-game-thu-viet-choi-game-online-nao', '', 2, 'gamek', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, '2016-01-19 10:35:17'),
(47, 'Ấn tượng trược bộ case máy tính Ghost Rider cực chất', 'Modder người Thái Lan có biệt danh CROW mới đây vừa cho ra mắt phiên bản case máy tính độ vô cùng độc đáo mang tên "TJ 07 Ghost Rider".', '<p>Modder người Th&aacute;i Lan c&oacute; biệt danh CROW mới đ&acirc;y vừa cho ra mắt phi&ecirc;n bản case&nbsp;<a draggable="false" href="http://gamek.vn/may-tinh.htm" target="_blank" title="máy tính">m&aacute;y t&iacute;nh</a>&nbsp;độ v&ocirc; c&ugrave;ng độc đ&aacute;o mang t&ecirc;n &quot;TJ 07 Ghost Rider&quot;. Phi&ecirc;n bản case độ n&agrave;y c&oacute; sức h&uacute;t kh&oacute; cưỡng nổi với người xem v&igrave; vẻ ngo&agrave;i hầm hố v&agrave; bộ ống xả to&aacute;t l&ecirc;n vẻ cơ kh&iacute; độc đ&aacute;o v&agrave; mạnh mẽ.</p>\r\n\r\n<p>Modder CROW vốn đ&atilde; nổi tiếng với nhiều bản độ trước đ&acirc;y m&agrave; cụ thể l&agrave; bản độ mang t&ecirc;n Differ DP-3 đ&atilde; từng rất nổi tiếng. V&agrave; nay anh lại cho ra mắt th&ecirc;m một phi&ecirc;n bản case độ tiếp theo lấy &yacute; tưởng từ bộ phim &quot;Ghost Rider&quot; m&agrave; PCNews tạm dịch l&agrave; &quot;Ma Tốc Độ&quot;. Với một chiếc đầu l&acirc;u rực lửa ở mặt trước c&ugrave;ng bốn ống xả l&agrave;m bằng hợp kim s&aacute;ng b&oacute;ng ph&iacute;a trước mặt, n&oacute; to&aacute;t l&ecirc;n một vẻ hầm hố của một chiếc xe ph&acirc;n khối lớn được điều khiển bởi một con quỷ dữ c&oacute; chiếc đầu rực lửa đ&uacute;ng như trong bộ phim &quot;Ghost Rider&quot;.</p>\r\n\r\n<p>Bộ case n&agrave;y được t&agrave;i trợ bởi Asus Thailand, h&atilde;ng đ&atilde; từng t&agrave;i trợ trong rất nhiều bản case độ của CROW. Hiện tại chưa c&oacute; cấu h&igrave;nh ch&iacute;nh thức của chiếc case độ n&agrave;y, song qua những h&igrave;nh ảnh dưới đ&acirc;y người xem cũng c&oacute; thể h&igrave;nh dung ẩn chứa b&ecirc;n trong vẻ bề ngo&agrave;i &quot;quỷ dữ&quot; n&agrave;y l&agrave; những linh kiện cũng dữ dằn kh&ocirc;ng k&eacute;m.</p>\r\n', 'an-tuong-truoc-bo-case-may-tinh-ghost-rider-cuc-chat', '', 2, 'gamk', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL, '2016-01-19 15:31:33'),
(48, 'TS Nguyễn Bá Hải - Nhà khoa học "điên" với chiếc kính "mắt thần" chỉ đường cho người khiếm thị', 'Lặng lẽ nghiên cứu, sáng tạo và đi khắp các tỉnh thành trao kính "mắt thần" cho người khiếm thị, có lẽ TS Nguyễn Bá Hải sẽ vẫn chỉ là một nhà khoa học thầm lặng cho đến khi anh có 10 phút đối thoại cùng Thủ tướng Nguyễn Tấn Dũng để thuyết phục Thủ tướng đầu tư vào dự án triệu đô của mình.', '<p>T&ocirc;i biết&nbsp;TS Nguyễn B&aacute; Hải&nbsp;từ nhiều năm trước, khi anh đ&atilde; ho&agrave;n th&agrave;nh kh&oacute;a học ở H&agrave;n Quốc v&agrave; trở về l&agrave;m Ph&oacute; bộ m&ocirc;n&nbsp;Điện - điện tử &ocirc; t&ocirc; của trường Đại học Sư phạm Kỹ thuật TP. HCM. Người giảng vi&ecirc;n năm ấy thường chia sẻ mọi cung bậc cảm x&uacute;c tr&ecirc;n facebook, khi h&acirc;n hoan, hớn hở v&igrave; c&ugrave;ng c&aacute;c sinh vi&ecirc;n v&agrave; cộng sự tạo ra một sản phẩm n&agrave;o đ&oacute;, khi th&igrave; trăn trở cho cuộc sống của người khiếm thị, người ngh&egrave;o ở Việt Nam. Tuy nhi&ecirc;n, nhũng h&igrave;nh ảnh v&agrave; b&agrave;i viết đa phần xoay quanh m&aacute;y m&oacute;c, chế tạo qu&aacute; xa lạ l&agrave;m t&ocirc;i cũng kh&ocirc;ng c&ograve;n để &yacute; nhiều đến nh&agrave; khoa học ấy nữa, cho đến một h&ocirc;m, anh gửi lời k&ecirc;u gọi mọi người gi&uacute;p m&igrave;nh t&igrave;m một người m&ugrave; h&aacute;t rong tr&ecirc;n phố.</p>\r\n\r\n<p>Lời k&ecirc;u gọi ấy khiến t&ocirc;i bắt đầu theo d&otilde;i anh nhiều hơn, qua b&agrave;i chia sẻ, anh n&oacute;i rằng anh xem một đoạn clip về ch&agrave;ng trai m&ugrave; h&aacute;t rong kiếm ăn tr&ecirc;n đường phố S&agrave;i G&ograve;n v&agrave; muốn t&igrave;m gặp người n&agrave;y để tặng anh ấy một chiếc k&iacute;nh đặc biệt. Mọi người kh&ocirc;ng biết chuyện g&igrave; xảy ra cho đến một thời gian sau, anh Hải chia sẻ một đoạn clip với nội dung: T&ocirc;i đ&atilde; gặp người m&ugrave; h&aacute;t rong n&agrave;y v&agrave; tặng k&iacute;nh &quot;Mắt thần&quot; cho anh ấy.</p>\r\n', 'ts-nguyen-ba-hai-nha-khoa-hoc-dien-voi-chiec-kinh-mat-than-chi-duong-cho-nguoi-khiem-thi', '', 4, 'genk', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL, '2016-01-19 15:40:38'),
(49, 'TS Nguyễn Bá Hải - Nhà khoa học "điên" với chiếc kính "mắt thần" chỉ đường cho người khiếm thị', 'Lặng lẽ nghiên cứu, sáng tạo và đi khắp các tỉnh thành trao kính "mắt thần" cho người khiếm thị, có lẽ TS Nguyễn Bá Hải sẽ vẫn chỉ là một nhà khoa học thầm lặng cho đến khi anh có 10 phút đối thoại cùng Thủ tướng Nguyễn Tấn Dũng để thuyết phục Thủ tướng đầu tư vào dự án triệu đô của mình.', '<p>T&ocirc;i biết&nbsp;TS Nguyễn B&aacute; Hải&nbsp;từ nhiều năm trước, khi anh đ&atilde; ho&agrave;n th&agrave;nh kh&oacute;a học ở H&agrave;n Quốc v&agrave; trở về l&agrave;m Ph&oacute; bộ m&ocirc;n&nbsp;Điện - điện tử &ocirc; t&ocirc; của trường Đại học Sư phạm Kỹ thuật TP. HCM. Người giảng vi&ecirc;n năm ấy thường chia sẻ mọi cung bậc cảm x&uacute;c tr&ecirc;n facebook, khi h&acirc;n hoan, hớn hở v&igrave; c&ugrave;ng c&aacute;c sinh vi&ecirc;n v&agrave; cộng sự tạo ra một sản phẩm n&agrave;o đ&oacute;, khi th&igrave; trăn trở cho cuộc sống của người khiếm thị, người ngh&egrave;o ở Việt Nam. Tuy nhi&ecirc;n, nhũng h&igrave;nh ảnh v&agrave; b&agrave;i viết đa phần xoay quanh m&aacute;y m&oacute;c, chế tạo qu&aacute; xa lạ l&agrave;m t&ocirc;i cũng kh&ocirc;ng c&ograve;n để &yacute; nhiều đến nh&agrave; khoa học ấy nữa, cho đến một h&ocirc;m, anh gửi lời k&ecirc;u gọi mọi người gi&uacute;p m&igrave;nh t&igrave;m một người m&ugrave; h&aacute;t rong tr&ecirc;n phố.</p>\r\n\r\n<p>Lời k&ecirc;u gọi ấy khiến t&ocirc;i bắt đầu theo d&otilde;i anh nhiều hơn, qua b&agrave;i chia sẻ, anh n&oacute;i rằng anh xem một đoạn clip về ch&agrave;ng trai m&ugrave; h&aacute;t rong kiếm ăn tr&ecirc;n đường phố S&agrave;i G&ograve;n v&agrave; muốn t&igrave;m gặp người n&agrave;y để tặng anh ấy một chiếc k&iacute;nh đặc biệt. Mọi người kh&ocirc;ng biết chuyện g&igrave; xảy ra cho đến một thời gian sau, anh Hải chia sẻ một đoạn clip với nội dung: T&ocirc;i đ&atilde; gặp người m&ugrave; h&aacute;t rong n&agrave;y v&agrave; tặng k&iacute;nh &quot;Mắt thần&quot; cho anh ấy.</p>\r\n', 'ts-nguyen-ba-hai-nha-khoa-hoc-dien-voi-chiec-kinh-mat-than-chi-duong-cho-nguoi-khiem-thi', '', 4, 'genk', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, NULL, '2016-01-19 15:42:10');

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
  `category_alias` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_author`, `image`, `notes`, `created_at`, `updated_at`, `category_alias`) VALUES
(1, 'Chính trị', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'chinh-tri'),
(2, 'Game', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'game'),
(3, 'Kinh tế', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'kinh-te'),
(4, 'Giáo dục', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'giao-duc');

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
(1, 'admin', '$2y$10$V4UoNzzVZUEQS5mJlDVCoOtbwBDxM/It.aiedoA5e/3mZC/mfN4ZS', 'quangtruong@gmail.com', 'Đỗ Quang Trường', '01234567899', 'Hà Nội', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-01-19 15:19:36', 'K6BRKrNFabp2M4TlFDpEZuhjshmTIrzPtfpk6PEUnV3oI6ByWWFZLDAwBZed'),
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
