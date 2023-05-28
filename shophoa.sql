-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2019 at 09:27 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;



-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE IF NOT EXISTS `hoadon` (
`idhoadon` int(11) NOT NULL,
  `thoigian` date DEFAULT NULL,
  `hoten_datmua` varchar(50) DEFAULT NULL,
  `diachi_datmua` text,
  `sdt_datmua` varchar(12) DEFAULT NULL,
  `trangthai` int(11) DEFAULT NULL,
  `idtaikhoan` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`idhoadon`, `thoigian`, `hoten_datmua`, `diachi_datmua`, `sdt_datmua`, `trangthai`, `idtaikhoan`) VALUES
(1, '2019-06-11', 'Nguyá»…n Nam', '15 Háº£i PhÃ²ng, ÄÃ  Náºµng', '0948574874', 0, 3),
(2, '2019-06-12', 'an', 'dn', '0905321251', 0, 3),
(3, '2019-06-12', 'nam', 'háº£i phÃ²ng', '0902325212', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `hoadonchitiet`
--

CREATE TABLE IF NOT EXISTS `hoadonchitiet` (
`idhoadonchitiet` int(11) NOT NULL,
  `idhoadon` int(11) NOT NULL,
  `idsanpham` int(11) NOT NULL,
  `soluongmua` int(11) NOT NULL,
  `loaichua` varchar(20) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `hoadonchitiet`
--

INSERT INTO `hoadonchitiet` (`idhoadonchitiet`, `idhoadon`, `idsanpham`, `soluongmua`, `loaichua`) VALUES
(1, 1, 28, 4, 'Giá»'),
(2, 1, 26, 6, 'BÃ³'),
(4, 2, 36, 1, 'BÃ³'),
(6, 3, 36, 1, 'BÃ³');

-- --------------------------------------------------------

--
-- Table structure for table `loaisanpham`
--

CREATE TABLE IF NOT EXISTS `loaisanpham` (
`idloaisanpham` int(11) NOT NULL,
  `tenloaisanpham` varchar(50) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `loaisanpham`
--

INSERT INTO `loaisanpham` (`idloaisanpham`, `tenloaisanpham`) VALUES
(1, 'Hoa sinh nháº­t'),
(2, 'Hoa chÃºc má»«ng'),
(3, 'Hoa Ä‘Ã¡m cÆ°á»›i'),
(4, 'Hoa ngÃ y nhÃ  giÃ¡o'),
(5, 'Hoa 8 thÃ¡ng 3');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE IF NOT EXISTS `sanpham` (
`idsanpham` int(11) NOT NULL,
  `tensanpham` varchar(100) DEFAULT NULL,
  `thongtinsanpham` text,
  `anh` text,
  `giaban` int(30) DEFAULT NULL,
  `trangthai` int(1) DEFAULT NULL,
  `idloaisanpham` int(11) NOT NULL,
  `soluongton` int(11) NOT NULL,
  `giadiple` int(30) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`idsanpham`, `tensanpham`, `thongtinsanpham`, `anh`, `giaban`, `trangthai`, `idloaisanpham`, `soluongton`, `giadiple`) VALUES
(26, 'YÃªu ThÆ°Æ¡ng nhá»', '<p><span style="color: #4c4c4c; font-family: Montserrat; font-size: 13px;">Náº¿u thuá»™c tu&yacute;p ngÆ°á»i th&iacute;ch Ä‘Æ¡n giáº£n, l&atilde;ng máº¡n, th&igrave; Ä‘&acirc;y ch&iacute;nh l&agrave; m&oacute;n qu&agrave; th&iacute;ch há»£p nháº¥t báº¡n c&oacute; thá»ƒ gá»­i táº·ng ngÆ°á»i áº¥y. Há»™p hoa l&agrave; sá»± káº¿t há»£p Ä‘áº§y l&atilde;ng máº¡n cá»§a baby tráº¯ng xung quanh, v&agrave; Ä‘áº·c biá»‡t hÆ¡n l&agrave; má»™t Ä‘&oacute;a há»“ng Ä‘á» rá»±c Ä‘Æ°á»£c thiáº¿t káº¿ ngay ch&iacute;nh giá»¯a tr&aacute;i tim, thay&nbsp; lá»i y&ecirc;u th&igrave; tháº§m nhá» nháº¹ nhÆ°ng Ä‘áº§y ch&acirc;n th&agrave;nh cá»§a báº¡n d&agrave;nh cho ngÆ°á»i áº¥y</span></p>', 'z6JAmFCBox_March21_4087.jpg', 120000, 1, 1, 1000, NULL),
(27, 'Vintage', '<p><span style="color: #4c4c4c; font-family: Montserrat; font-size: 13px;">Kh&ocirc;ng cáº§n cáº§u k&igrave;, b&oacute; hoa tá»« 3 b&ocirc;ng há»“ng tráº¯ng káº¿t há»£p tinh táº¿ c&ugrave;ng t&ocirc;ng giáº¥y g&oacute;i m&agrave;u tráº§m hiá»‡n Ä‘áº¡i m&agrave; Ä‘áº¹p Ä‘áº§y tinh táº¿. B&oacute; hoa mang phong c&aacute;ch vintage m&agrave; má»i c&ocirc; g&aacute;i Ä‘á»u y&ecirc;u th&iacute;ch. B&oacute; hoa c&ugrave;ng t&ocirc;ng m&agrave;u Ä‘áº·c biá»‡t cÅ©ng c&oacute; thá»ƒ l&agrave; m&oacute;n qu&agrave; th&iacute;ch há»£p táº·ng cho tháº§y c&ocirc;, báº¡n trai, Ä‘á»“ng nghiá»‡p hay cáº¥p tr&ecirc;n.</span></p>', 'I8xa5fcn_bouquet_79.jpg', 200000, 1, 1, 2500, NULL),
(28, 'PhÃºt Äáº§u TiÃªn', '<p><span style="color: #4c4c4c; font-family: Montserrat; font-size: 13px;">"Má»™t ph&uacute;t b&ecirc;n nhau tháº­t l&acirc;u, má»™t ph&uacute;t n&oacute;i ra lá»i chÆ°a n&oacute;i", háº³n ai Ä‘&oacute; sáº½ cáº£m tháº¥y v&ocirc; c&ugrave;ng háº¡nh ph&uacute;c khi nháº­n Ä‘Æ°á»£c 1 b&oacute; hoa há»“ng Ä‘á» tháº¯m tÆ°á»£ng trÆ°ng cho lá»i ngá» lá»i dá»… thÆ°Æ¡ng m&agrave; Ä‘áº§y ch&acirc;n th&agrave;nh Ä‘&oacute;. C&ugrave;ng Flower Corner gá»­i Ä‘áº¿n ngÆ°á»i báº¡n y&ecirc;u nhá»¯ng m&oacute;n qu&agrave; tháº­t Ä‘áº¹p v&agrave; &yacute; nghÄ©a nh&eacute;.</span></p>', 'NIGkzFCBouquet_Apr_4272.jpg', 340000, 1, 1, 4000, NULL),
(29, 'Máº¯t Biáº¿c', '<p><span style="color: #4c4c4c; font-family: Montserrat; font-size: 13px;">Hoa há»“ng vá»›i t&ocirc;ng m&agrave;u xanh Ä‘áº¹p v&agrave; láº¡, kh&ocirc;ng mang váº» ki&ecirc;u sa nhÆ° há»“ng Ä‘á», l&atilde;ng máº¡n nhÆ° há»“ng d&acirc;u nhÆ°ng hoa há»“ng xanh mang má»™t váº» Ä‘áº¹p vá»›i &yacute; nghÄ©a Ä‘áº§y hy vá»ng v&agrave; may máº¯n. Má»—i ngÆ°á»i Ä‘á»u c&oacute; nhá»¯ng Æ°á»›c mÆ¡, má»¥c ti&ecirc;u cá»§a ri&ecirc;ng m&igrave;nh, v&igrave; váº­y má»™t lá»i ch&uacute;c may máº¯n, má»™t lá»i Ä‘á»™ng vi&ecirc;n tá»« nhá»¯ng ngÆ°á»i thÆ°Æ¡ng y&ecirc;u nháº¥t sáº½ tiáº¿p th&ecirc;m sá»©c máº¡nh Ä‘á»ƒ báº¡n c&oacute; th&ecirc;m niá»m tin tr&ecirc;n con Ä‘Æ°á»ng Ä‘áº¿n vá»›i Æ°á»›c mÆ¡ Ä‘áº§y tÆ°Æ¡i xanh.</span></p>', 'lm7NZFC_Mar22_4218.jpg', 250000, 1, 1, 0, NULL),
(30, 'Rá»™n RÃ ng', '<p><span style="color: #4c4c4c; font-family: Montserrat; font-size: 13px;">B&oacute; hoa mang trong m&igrave;nh kh&ocirc;ng kh&iacute; tÆ°Æ¡i vui rá»™n r&agrave;ng v&agrave; Ä‘áº§y sá»©c sá»‘ng cá»§a m&ugrave;a háº¡. B&oacute; hoa gá»“m hoa há»“ng vá»›i c&aacute;c sáº¯c Ä‘á»™ há»“ng, cam rá»±c rá»¡ c&ugrave;ng m&agrave;u l&aacute; phá»¥ tÆ°Æ¡i xanh sáº½ gi&uacute;p báº¡n l&agrave;m má»™t ng&agrave;y cá»§a ai Ä‘&oacute; trá»Ÿ n&ecirc;n Ä‘áº§y vui tÆ°Æ¡i v&agrave; Ä‘&aacute;ng nhá»›. V&igrave; h&atilde;y nhá»› ráº±ng, má»—i khoáº£nh kháº¯c b&ecirc;n nhau Ä‘á»u Ä‘&aacute;ng Ä‘Æ°á»£c tr&acirc;n trá»ng v&agrave; g&igrave;n giá»¯.</span></p>', 'e0kESRucRo.jpg', 420000, 1, 1, 3500, NULL),
(31, 'LuÃ´n BÃªn Em', '<p><span style="color: #4c4c4c; font-family: Montserrat; font-size: 13px;">Giá»¯a cuá»™c sá»‘ng vá»›i bao nhi&ecirc;u kh&oacute; khÄƒn, cÄƒng tháº³ng v&agrave; táº¥p náº­p, má»™t ch&uacute;t nháº¹ nh&agrave;ng, há»“n nhi&ecirc;n cá»§a Ä‘&oacute;a há»“ng Ä‘oÌ‰ cháº¯c cháº¯n sáº½ mang Ä‘áº¿n niá»m vui kh&oacute; táº£ cho má»™t ai Ä‘&oacute;. Sá»‘ng cháº­m láº¡i v&agrave; y&ecirc;u thÆ°Æ¡ng nhiá»u hÆ¡n, chia sáº» nhiá»u hÆ¡n v&agrave; quan t&acirc;m nhiá»u hÆ¡n, h&atilde;y Ä‘á»ƒ b&oacute; há»“ng n&agrave;y gi&uacute;p báº¡n gá»­i Ä‘i th&ocirc;ng Ä‘iá»‡p Ä‘&oacute; nh&eacute;.</span></p>', 'RsUVHluonbenemdec12.jpg', 178000, 1, 1, 0, NULL),
(32, 'CÃ´ng ChÃºa', '<p><span style="color: #4c4c4c; font-family: Montserrat; font-size: 13px;">Giá» hoa vá»›i t&ocirc;ng m&agrave;u ngá»t ng&agrave;o Ä‘áº§y dá»‹u d&agrave;ng v&agrave; dá»… thÆ°Æ¡ng sáº½ l&agrave; má»™t m&oacute;n qu&agrave; cho ngÆ°á»i con g&aacute;i vá»›i ná»¥ cÆ°á»i Ä‘&aacute;ng y&ecirc;u áº¥y. Giá» hoa gá»“m há»“ng pastel ngá»t ng&agrave;o, c&ugrave;ng c&aacute;c loáº¡i hoa nhá» xinh xáº¯n kh&aacute;c. Äá»«ng cháº§n chá»« nh&eacute;, h&atilde;y Ä‘áº·t giá» hoa n&agrave;y v&agrave; mang má»™t báº¥t ngá» Ä‘áº§y ngá»t ng&agrave;o Ä‘áº¿n ngÆ°á»i áº¥y nh&eacute;.</span></p>', '6bu0lfcn_arrangemen.jpg', 520000, 1, 2, 1260, NULL),
(33, 'Ká»‰ niá»‡m', '<p><span style="color: #4c4c4c; font-family: Montserrat; font-size: 13px;">B&oacute; hoa vá»›i t&ocirc;ng m&agrave;u há»“ng Ä‘áº¹p tinh táº¿ Ä‘Æ°á»£c táº¡o n&ecirc;n tá»« hoa ly v&agrave; cáº©m chÆ°á»›ng há»“ng v&agrave; Ä‘Æ°á»£c g&oacute;i theo t&ocirc;ng giáº¥y b&aacute;o mang ch&uacute;t ho&agrave;i cá»•. B&oacute; hoa l&agrave; m&oacute;n qu&agrave; &yacute; nghÄ©a gá»£i láº¡i nhá»¯ng ká»· niá»‡m Ä‘áº¹p nháº¥t trong cuá»™c Ä‘á»i cá»§a má»—i ngÆ°á»i. Tá»« khi má»›i sinh ra Ä‘á»i cho Ä‘áº¿n khi trÆ°á»Ÿng th&agrave;nh, báº¡n Ä‘&atilde; lu&ocirc;n nháº­n Ä‘Æ°á»£c sá»± quan t&acirc;m v&agrave; che chá»Ÿ tá»« máº¹, váº­y h&atilde;y d&agrave;nh má»™t ch&uacute;t thá»i gian Ä‘á»ƒ n&oacute;i báº¡n y&ecirc;u máº¹ v&agrave; cáº£m Æ¡n máº¹ v&igrave; t&igrave;nh cáº£m thi&ecirc;ng li&ecirc;ng áº¥y báº±ng b&oacute; hoa n&agrave;y nha.</span></p>', '9MzPvfcn_bouquet_68.jpg', 430000, 1, 1, 0, NULL),
(34, 'NgÃ y Má»›i', '<p><span style="color: #4c4c4c; font-family: Montserrat; font-size: 13px;">Th&agrave;nh c&ocirc;ng c&oacute; Ä‘Æ°á»£c ng&agrave;y h&ocirc;m nay má»™t pháº§n lá»›n ch&iacute;nh l&agrave; nhá» sá»± gi&uacute;p Ä‘á»¡ Ä‘&aacute;ng qu&yacute; cá»§a nhá»¯ng ngÆ°á»i xung quanh ta. Trong dá»‹p Ä‘áº·c biá»‡t n&agrave;y h&atilde;y gá»­i táº·ng há», nhá»¯ng ngÆ°á»i báº¡n b&egrave;, Ä‘á»‘i t&aacute;c, Ä‘á»“ng nghiá»‡p hay cáº¥p tr&ecirc;n Ä‘&aacute;ng qu&iacute; má»™t giá» hoa Ä‘áº§y tÆ°Æ¡i sáº¯c nh&eacute;. Giá» hoa l&agrave; sá»± káº¿t há»£p Ä‘áº§y m&agrave;u sáº¯c tá»« nhá»¯ng c&aacute;nh há»“ng, ly v&agrave; Ä‘á»“ng tiá»n Ä‘áº§y tÆ°Æ¡i s&aacute;ng.</span></p>', 'cINM0fcn_arrangement_33.jpg', 490000, 1, 2, 5000, NULL),
(35, 'VÄ©nh Cá»­u', '<p><span style="color: #4c4c4c; font-family: Montserrat; font-size: 13px;">VÄ©nh Cá»­u gá»“m má»™t cháº­u hoa vá»›i má»™t c&agrave;nh há»“ Ä‘iá»‡p t&iacute;m, Ä‘Æ¡n giáº£n l&agrave; tháº¿ nhÆ°ng cháº­u hoa váº«n to&aacute;t l&ecirc;n váº» thanh cao, tinh táº¿, ho&agrave;n to&agrave;n th&iacute;ch há»£p Ä‘á»ƒ l&agrave;m m&oacute;n qu&agrave; d&agrave;nh táº·ng cho ai Ä‘&oacute;. Má»™t táº¥m thiá»‡p nhá» gá»­i k&egrave;m l&agrave; Ä‘á»§ Ä‘á»ƒ lá»i ch&uacute;c v&agrave; táº¥m l&ograve;ng cá»§a báº¡n truyá»n Ä‘áº¡t má»™t c&aacute;ch Ä‘áº§y Ä‘á»§ nháº¥t.</span></p>', 'de2y8fcn_orchid_7.jpg', 720000, 1, 3, 4200, NULL),
(36, 'Sá»©c Khá»e', '<p><span style="color: #4c4c4c; font-family: Montserrat; font-size: 13px;">NhÆ° nhá»¯ng máº·t trá»i nhá» b&eacute; nhÆ°ng v&ocirc; c&ugrave;ng s&aacute;ng ch&oacute;i, nhá»¯ng b&ocirc;ng hoa há»“ Ä‘iá»‡p v&agrave;ng vá»«a ná»Ÿ tr&ecirc;n c&agrave;nh sáº½ gi&uacute;p cho kh&ocirc;ng gian cá»§a báº¡n th&ecirc;m pháº§n rá»±c rá»¡, Ä‘áº§y sá»©c sá»‘ng v&agrave; cÅ©ng kh&ocirc;ng k&eacute;m pháº§n tao nh&atilde;, sang trá»ng. Má»™t m&oacute;n qu&agrave; ph&ugrave; há»£p cho báº¥t cá»© dá»‹p vui n&agrave;o.</span></p>', '2uiotfcn_orchid_2.jpg', 370000, 1, 3, 500, 200000),
(37, 'Hoan Há»‰', '<p><span style="color: #4c4c4c; font-family: Montserrat; font-size: 13px;">Lan há»“ Ä‘iá»‡p lu&ocirc;n l&agrave; biá»ƒu tÆ°á»£ng cho sá»± sang trá»ng, qu&yacute; ph&aacute;i, l&agrave; m&oacute;n qu&agrave; thá»ƒ hiá»‡n sá»± tinh táº¿, chu Ä‘&aacute;o cá»§a ngÆ°á»i táº·ng. V&igrave; kh&ocirc;ng cáº§n pháº£i qu&aacute; nhiá»u, qu&aacute; ho&agrave;nh tr&aacute;ng m&agrave; chá»‰ cáº§n má»™t cháº­u lan vá»›i 1 c&agrave;nh lan há»“ Ä‘iá»‡p Ä‘áº¹p ki&ecirc;u sa n&agrave;y sáº½ gi&uacute;p báº¡n gá»­i lá»i ch&uacute;c má»™t c&aacute;ch ho&agrave;n háº£o nháº¥t.</span></p>', 'RRU2a12s.jpg', 190000, 1, 3, 7500, 0);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE IF NOT EXISTS `taikhoan` (
`idtaikhoan` int(11) NOT NULL,
  `tentaikhoan` varchar(50) DEFAULT NULL,
  `matkhau` varchar(50) DEFAULT NULL,
  `phanquyen` int(1) DEFAULT NULL,
  `hoten` varchar(50) DEFAULT NULL,
  `diachi` text,
  `sdt` varchar(12) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`idtaikhoan`, `tentaikhoan`, `matkhau`, `phanquyen`, `hoten`, `diachi`, `sdt`, `email`) VALUES
(1, 'admin', '123456', 1, 'Binh', '14 Bach Dang, Da Nang', '0905876498', 'binh304@gmail.com'),
(3, 'ha', '123456', 0, 'Nguyá»…n VÄƒn An', '12 Phan Thanh', '0123984758', 'an304@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
 ADD PRIMARY KEY (`idhoadon`), ADD KEY `idtaikhoan` (`idtaikhoan`);

--
-- Indexes for table `hoadonchitiet`
--
ALTER TABLE `hoadonchitiet`
 ADD PRIMARY KEY (`idhoadonchitiet`), ADD KEY `idhoadon` (`idhoadon`), ADD KEY `idsanpham` (`idsanpham`);

--
-- Indexes for table `loaisanpham`
--
ALTER TABLE `loaisanpham`
 ADD PRIMARY KEY (`idloaisanpham`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
 ADD PRIMARY KEY (`idsanpham`), ADD KEY `idloaisanpham` (`idloaisanpham`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
 ADD PRIMARY KEY (`idtaikhoan`), ADD UNIQUE KEY `tentaikhoan` (`tentaikhoan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
MODIFY `idhoadon` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `hoadonchitiet`
--
ALTER TABLE `hoadonchitiet`
MODIFY `idhoadonchitiet` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `loaisanpham`
--
ALTER TABLE `loaisanpham`
MODIFY `idloaisanpham` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
MODIFY `idsanpham` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
MODIFY `idtaikhoan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`idtaikhoan`) REFERENCES `taikhoan` (`idtaikhoan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hoadonchitiet`
--
ALTER TABLE `hoadonchitiet`
ADD CONSTRAINT `hoadonchitiet_ibfk_1` FOREIGN KEY (`idhoadon`) REFERENCES `hoadon` (`idhoadon`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `hoadonchitiet_ibfk_2` FOREIGN KEY (`idsanpham`) REFERENCES `sanpham` (`idsanpham`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`idloaisanpham`) REFERENCES `loaisanpham` (`idloaisanpham`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
