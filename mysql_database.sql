-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: sql106.epizy.com
-- Üretim Zamanı: 31 Mar 2021, 08:30:17
-- Sunucu sürümü: 5.6.48-88.0
-- PHP Sürümü: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `epiz_27550701_tunakardesler`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tb_address`
--

CREATE TABLE `tb_address` (
  `ID` int(10) UNSIGNED NOT NULL,
  `C_FIREBASE_ID` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `C_NAME` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `SURNAME` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `PHONE` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `ADDRESS_NAME` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `ADDRESS` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `CITY_ID` int(10) UNSIGNED DEFAULT NULL,
  `PROVINCE_ID` int(10) UNSIGNED DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `tb_address`
--

INSERT INTO `tb_address` (`ID`, `C_FIREBASE_ID`, `C_NAME`, `SURNAME`, `PHONE`, `ADDRESS_NAME`, `ADDRESS`, `CITY_ID`, `PROVINCE_ID`) VALUES
(5, NULL, 'sdfsdf', 'sdfsdfsdf', '05444444444', '444', '4444', 14, 175),
(6, 'xxxxxxxxxxxxxxxxxxxxx', 'adsasd', 'asdasdsad', '05555555555', 'asdasdasd', 'asdasdasd', 13, 168);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tb_admin`
--

CREATE TABLE `tb_admin` (
  `ID` int(10) UNSIGNED NOT NULL,
  `USERNAME` varchar(50) CHARACTER SET utf8 NOT NULL,
  `PWD` char(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `tb_admin`
--

INSERT INTO `tb_admin` (`ID`, `USERNAME`, `PWD`) VALUES
(1, 'xxxxx', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tb_advert`
--

CREATE TABLE `tb_advert` (
  `ID` int(10) UNSIGNED NOT NULL,
  `IMG_NAME` char(11) CHARACTER SET utf8 NOT NULL,
  `MAIN_ID` int(10) UNSIGNED DEFAULT '0',
  `PRIMARY_ID` int(10) UNSIGNED DEFAULT '0',
  `SECONDARY_ID` int(10) UNSIGNED DEFAULT '0',
  `PRODUCT_ID` int(10) UNSIGNED DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `tb_advert`
--

INSERT INTO `tb_advert` (`ID`, `IMG_NAME`, `MAIN_ID`, `PRIMARY_ID`, `SECONDARY_ID`, `PRODUCT_ID`) VALUES
(24, '659170.jpg', 47, 0, 0, 0),
(23, '856977.jpg', 45, 0, 0, 0),
(22, '272120.jpg', 46, 0, 0, 0),
(21, '280696.jpg', 45, 0, 0, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tb_category`
--

CREATE TABLE `tb_category` (
  `ID` int(10) UNSIGNED NOT NULL,
  `CATEGORY_NAME` varchar(60) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `tb_category`
--

INSERT INTO `tb_category` (`ID`, `CATEGORY_NAME`) VALUES
(45, 'Kişisel Bakım Ürünleri'),
(46, 'Saç Bakım Ürünleri'),
(47, 'Parfüm &amp; Deodorant'),
(48, 'Erkek Bakım Ürünleri'),
(54, 'Markalar'),
(58, 'Berber Store');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tb_city`
--

CREATE TABLE `tb_city` (
  `ID` int(10) UNSIGNED NOT NULL,
  `CITY_NAME` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `tb_city`
--

INSERT INTO `tb_city` (`ID`, `CITY_NAME`) VALUES
(1, 'Adana'),
(2, 'Adıyaman'),
(3, 'Afyonkarahisar'),
(4, 'Ağrı'),
(5, 'Amasya'),
(6, 'Ankara'),
(7, 'Antalya'),
(8, 'Artvin'),
(9, 'Aydın'),
(10, 'Balıkesir'),
(11, 'Bilecik'),
(12, 'Bingöl'),
(13, 'Bitlis'),
(14, 'Bolu'),
(15, 'Burdur'),
(16, 'Bursa'),
(17, 'Çanakkale'),
(18, 'Çankırı'),
(19, 'Çorum'),
(20, 'Denizli'),
(21, 'Diyarbakır'),
(22, 'Edirne'),
(23, 'Elazığ'),
(24, 'Erzincan'),
(25, 'Erzurum'),
(26, 'Eskişehir'),
(27, 'Gaziantep'),
(28, 'Giresun'),
(29, 'Gümüşhane'),
(30, 'Hakkari'),
(31, 'Hatay'),
(32, 'Isparta'),
(33, 'Mersin'),
(34, 'İstanbul'),
(35, 'İzmir'),
(36, 'Kars'),
(37, 'Kastamonu'),
(38, 'Kayseri'),
(39, 'Kırklareli'),
(40, 'Kırşehir'),
(41, 'Kocaeli'),
(42, 'Konya'),
(43, 'Kütahya'),
(44, 'Malatya'),
(45, 'Manisa'),
(46, 'Kahramanmaraş'),
(47, 'Mardin'),
(48, 'Muğla'),
(49, 'Muş'),
(50, 'Nevşehir'),
(51, 'Niğde'),
(52, 'Ordu'),
(53, 'Rize'),
(54, 'Sakarya'),
(55, 'Samsun'),
(56, 'Siirt'),
(57, 'Sinop'),
(58, 'Sivas'),
(59, 'Tekirdağ'),
(60, 'Tokat'),
(61, 'Trabzon'),
(62, 'Tunceli'),
(63, 'Şanlıurfa'),
(64, 'Uşak'),
(65, 'Van'),
(66, 'Yozgat'),
(67, 'Zonguldak'),
(68, 'Aksaray'),
(69, 'Bayburt'),
(70, 'Karaman'),
(71, 'Kırıkkale'),
(72, 'Batman'),
(73, 'Şırnak'),
(74, 'Bartın'),
(75, 'Ardahan'),
(76, 'Iğdır'),
(77, 'Yalova'),
(78, 'Karabük'),
(79, 'Kilis'),
(80, 'Osmaniye'),
(81, 'Düzce');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tb_comments`
--

CREATE TABLE `tb_comments` (
  `ID` int(10) UNSIGNED NOT NULL,
  `PRODUCT_ID` int(10) UNSIGNED NOT NULL,
  `C_ID` int(10) UNSIGNED NOT NULL,
  `C_COMMENT` varchar(500) CHARACTER SET utf8 NOT NULL,
  `RATE` int(10) UNSIGNED DEFAULT NULL,
  `COMMENT_DATE` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `tb_comments`
--

INSERT INTO `tb_comments` (`ID`, `PRODUCT_ID`, `C_ID`, `C_COMMENT`, `RATE`, `COMMENT_DATE`) VALUES
(1, 51, 1, 'Lorem ipsum dolor sit amet, consectetur ladipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 4, '2021-02-17 02:24:04');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tb_customer`
--

CREATE TABLE `tb_customer` (
  `ID` int(10) UNSIGNED NOT NULL,
  `FIREBASE_ID` varchar(90) CHARACTER SET utf8 NOT NULL,
  `NAME` varchar(100) CHARACTER SET utf8 NOT NULL,
  `SURNAME` varchar(100) CHARACTER SET utf8 NOT NULL,
  `EMAIL` varchar(100) CHARACTER SET utf8 NOT NULL,
  `PHONE` varchar(13) DEFAULT NULL,
  `BIRTHDAY` varchar(13) DEFAULT NULL,
  `GENDER` varchar(13) DEFAULT NULL,
  `REG_DATE` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `tb_customer`
--

INSERT INTO `tb_customer` (`ID`, `FIREBASE_ID`, `NAME`, `SURNAME`, `EMAIL`, `PHONE`, `BIRTHDAY`, `GENDER`, `REG_DATE`) VALUES
(1, 'xxxxxxxxxxxxxxxxxxxxx', 'İlkcan', 'Doğan', 'ilkcandogan@protonmail.com', '00000000', '03/11/1999', 'Erkek', '2020-12-27 21:29:56'),
(2, 'xxxxxxxxxxxxxxxxxxxxx', 'ssss', 'ssssss', 'sssssss@gmail.com', '000000', '01/01/1999', 'Erkek', '2021-01-02 06:46:13');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tb_info`
--

CREATE TABLE `tb_info` (
  `ID` int(10) UNSIGNED NOT NULL,
  `EMAIL` varchar(100) CHARACTER SET utf8 NOT NULL,
  `INSTAGRAM` varchar(100) CHARACTER SET utf8 NOT NULL,
  `WHATSAPP` varchar(100) CHARACTER SET utf8 NOT NULL,
  `FACEBOOK` varchar(100) CHARACTER SET utf8 NOT NULL,
  `ADDRESS` varchar(300) CHARACTER SET utf8 NOT NULL,
  `PHONE` char(11) CHARACTER SET utf8 NOT NULL,
  `WORKTIME` varchar(100) CHARACTER SET utf8 NOT NULL,
  `ABOUT_ME` varchar(9000) CHARACTER SET utf8 NOT NULL,
  `STRING_JSON_1` text,
  `STRING_JSON_2` text,
  `GLOBAL_COLOR` text,
  `GLOBAL_RADIUS` text,
  `PHOTO_NAME` char(10) CHARACTER SET utf8 DEFAULT NULL,
  `CATEGORY_ICON` char(10) DEFAULT NULL,
  `TOP_LEFT_BGCOLOR` varchar(13) DEFAULT NULL,
  `TOP_LEFT_FRCOLOR` varchar(13) DEFAULT NULL,
  `NEW_TOP_RIGHT_BGCOLOR` varchar(13) DEFAULT NULL,
  `NEW_TOP_RIGHT_FRCOLOR` varchar(13) DEFAULT NULL,
  `WEB_TOP_RIGHT_BGCOLOR` varchar(13) DEFAULT NULL,
  `WEB_TOP_RIGHT_FRCOLOR` varchar(13) DEFAULT NULL,
  `CARGO_PRICE` varchar(13) DEFAULT NULL,
  `CARGO_PRICE_LIMIT` varchar(13) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `tb_info`
--

INSERT INTO `tb_info` (`ID`, `EMAIL`, `INSTAGRAM`, `WHATSAPP`, `FACEBOOK`, `ADDRESS`, `PHONE`, `WORKTIME`, `ABOUT_ME`, `STRING_JSON_1`, `STRING_JSON_2`, `GLOBAL_COLOR`, `GLOBAL_RADIUS`, `PHOTO_NAME`, `CATEGORY_ICON`, `TOP_LEFT_BGCOLOR`, `TOP_LEFT_FRCOLOR`, `NEW_TOP_RIGHT_BGCOLOR`, `NEW_TOP_RIGHT_FRCOLOR`, `WEB_TOP_RIGHT_BGCOLOR`, `WEB_TOP_RIGHT_FRCOLOR`, `CARGO_PRICE`, `CARGO_PRICE_LIMIT`) VALUES
(1, 'info@tunakardesler.net', 'https://instagram.com/tuna_kardesler', '+901111111111', 'https://facebook.com', 'Cumhuriyet Cad. \\n No: 128/B     BURSA', '02242227898', 'Pt - Ct: 09:00 - 18:00', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut ofsfsdfsdfsdfdsfdit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla', '{\"string\":\"\",\"color\":\"#ffffff\",\"bgcolor\":\"#000000\",\"size\":\"\",\"type\":\"normal\"}', '{\"string\":\"\",\"color\":\"#ffffff\",\"bgcolor\":\"#000000\",\"size\":\"\",\"type\":\"normal\"}', '#c21414', '0', '375179.jpg', '160206.png', '#e90101', '#ffffff', '#2216d0', '#ffffff', '#cd0404', '#ffffff', '15', '250');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tb_news_subscribe`
--

CREATE TABLE `tb_news_subscribe` (
  `ID` int(10) UNSIGNED NOT NULL,
  `EMAIL` varchar(100) CHARACTER SET utf8 NOT NULL,
  `SUBSCRIBE_DATE` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tb_orders`
--

CREATE TABLE `tb_orders` (
  `ID` int(10) UNSIGNED NOT NULL,
  `ORDER_CODE` char(8) CHARACTER SET utf8 NOT NULL,
  `DISCOUNT_TYPE` bit(1) DEFAULT NULL,
  `DISCOUNT_VALUE` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `DISCOUNT_CODE` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `DISCOUNT_PRICE` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `C_FIREBASE_ID` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `C_NAME` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `C_SURNAME` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `C_PHONE` char(11) CHARACTER SET utf8 DEFAULT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `C_CITY_ID` int(10) UNSIGNED NOT NULL,
  `C_PROVINCE_ID` int(10) UNSIGNED NOT NULL,
  `ADDRESS` varchar(500) CHARACTER SET utf8 NOT NULL,
  `ADDRESS_NAME` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `COMPANY_NAME` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `PERSON_NAME` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `TAX_NUMBER_OR_IDENTITY_NO` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `TAX_ADMINISTRATION` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `ORDER_CHECK` bit(1) DEFAULT b'0',
  `C_ORDER_CANCEL` bit(1) DEFAULT b'0',
  `TOTAL_PRICE` varchar(13) DEFAULT NULL,
  `NEXT_CARGO` varchar(13) DEFAULT NULL,
  `ORDER_DATE` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `tb_orders`
--

INSERT INTO `tb_orders` (`ID`, `ORDER_CODE`, `DISCOUNT_TYPE`, `DISCOUNT_VALUE`, `DISCOUNT_CODE`, `DISCOUNT_PRICE`, `C_FIREBASE_ID`, `C_NAME`, `C_SURNAME`, `C_PHONE`, `EMAIL`, `C_CITY_ID`, `C_PROVINCE_ID`, `ADDRESS`, `ADDRESS_NAME`, `COMPANY_NAME`, `PERSON_NAME`, `TAX_NUMBER_OR_IDENTITY_NO`, `TAX_ADMINISTRATION`, `ORDER_CHECK`, `C_ORDER_CANCEL`, `TOTAL_PRICE`, `NEXT_CARGO`, `ORDER_DATE`) VALUES
(46, 'ASHJW4T8', b'1', '50', '', '', NULL, 'İlkcan', 'Doğan', '05397827964', 'ilkcandogan@protonmail.com', 12, 160, 'Güneş Mah. Altay Sk. No: 156', 'Evim', NULL, NULL, NULL, NULL, b'0', b'0', '20', NULL, '2021-02-17 02:22:57'),
(47, '6WHQMEEF', NULL, '', '', '', 'cPSrxdizmFW1AM7VVMEVwLTlwCM2', 'adsasd', 'asdasdsad', '05555555555', 'ilkcandogan@protonmail.com', 11, 151, 'asdasdasd', 'asdasdasd', NULL, NULL, NULL, NULL, b'0', b'0', '25', NULL, '2021-02-16 19:23:49'),
(48, '17ZYXZJY', NULL, '', '', '', 'cPSrxdizmFW1AM7VVMEVwLTlwCM2', 'adsasd', 'asdasdsad', '05555555555', 'ilkcandogan@protonmail.com', 11, 151, 'asdasdasd', 'asdasdasd', NULL, NULL, NULL, NULL, b'0', b'0', '25', NULL, '2021-02-17 08:24:13'),
(49, 'SQKV9RVP', NULL, '', '', '', 'cPSrxdizmFW1AM7VVMEVwLTlwCM2', 'adsasd', 'asdasdsad', '05555555555', 'ilkcandogan@protonmail.com', 11, 151, 'asdasdasd', 'asdasdasd', NULL, NULL, NULL, NULL, b'0', b'0', '25', NULL, '2021-02-17 08:24:13'),
(50, 'WE5FS489', NULL, '', '', '', 'cPSrxdizmFW1AM7VVMEVwLTlwCM2', 'adsasd', 'asdasdsad', '05555555555', 'ilkcandogan@protonmail.com', 11, 151, 'asdasdasd', 'asdasdasd', NULL, NULL, NULL, NULL, b'0', b'0', '25', NULL, '2021-02-17 08:24:14');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tb_order_products`
--

CREATE TABLE `tb_order_products` (
  `ID` int(10) UNSIGNED NOT NULL,
  `ORDER_ID` int(10) UNSIGNED NOT NULL,
  `PRODUCT_ID` int(10) UNSIGNED NOT NULL,
  `QUANTITY` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `tb_order_products`
--

INSERT INTO `tb_order_products` (`ID`, `ORDER_ID`, `PRODUCT_ID`, `QUANTITY`) VALUES
(54, 46, 51, 1),
(55, 47, 53, 1),
(56, 48, 53, 1),
(57, 49, 53, 1),
(58, 50, 53, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tb_poster`
--

CREATE TABLE `tb_poster` (
  `ID` int(10) UNSIGNED NOT NULL,
  `IMG_NAME` char(11) CHARACTER SET utf8 NOT NULL,
  `MAIN_ID` int(10) UNSIGNED DEFAULT '0',
  `PRIMARY_ID` int(10) UNSIGNED DEFAULT '0',
  `SECONDARY_ID` int(10) UNSIGNED DEFAULT '0',
  `PRODUCT_ID` int(10) UNSIGNED DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `tb_poster`
--

INSERT INTO `tb_poster` (`ID`, `IMG_NAME`, `MAIN_ID`, `PRIMARY_ID`, `SECONDARY_ID`, `PRODUCT_ID`) VALUES
(71, '168216.jpg', 45, 24, 0, 0),
(70, '779426.jpg', 45, 24, 0, 0),
(69, '161129.jpg', 45, 0, 0, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tb_product`
--

CREATE TABLE `tb_product` (
  `ID` int(10) UNSIGNED NOT NULL,
  `PRODUCT_NAME` varchar(100) CHARACTER SET utf8 NOT NULL,
  `PRODUCT_DETAIL` varchar(9000) CHARACTER SET utf8 NOT NULL,
  `PRODUCT_PRICE` float NOT NULL,
  `PRODUCT_STOCK_QUANTITY` int(10) UNSIGNED NOT NULL,
  `PRODUCT_DISCOUNT_TYPE` bit(1) DEFAULT NULL,
  `PRODUCT_DISCOUNT` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `PRODUCT_DISCOUNT_CODE` char(10) CHARACTER SET utf8 DEFAULT NULL,
  `PRODUCT_BRAND` int(10) UNSIGNED NOT NULL,
  `PRODUCT_CATEGORY` int(10) UNSIGNED NOT NULL,
  `PRODUCT_SUB_CATEGORY` int(10) UNSIGNED DEFAULT NULL,
  `PRODUCT_SUB_SUB_CATEGORY` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `PRODUCT_TOP_STATUS` varchar(13) DEFAULT '',
  `PRODUCT_DATE` datetime DEFAULT CURRENT_TIMESTAMP,
  `UPDATED_DATE` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `tb_product`
--

INSERT INTO `tb_product` (`ID`, `PRODUCT_NAME`, `PRODUCT_DETAIL`, `PRODUCT_PRICE`, `PRODUCT_STOCK_QUANTITY`, `PRODUCT_DISCOUNT_TYPE`, `PRODUCT_DISCOUNT`, `PRODUCT_DISCOUNT_CODE`, `PRODUCT_BRAND`, `PRODUCT_CATEGORY`, `PRODUCT_SUB_CATEGORY`, `PRODUCT_SUB_SUB_CATEGORY`, `PRODUCT_TOP_STATUS`, `PRODUCT_DATE`, `UPDATED_DATE`) VALUES
(52, 'Test Ürün 2', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\n', 10, 10, NULL, '', '', 4, 45, 24, 0, 'NONE', '2021-02-17 02:19:55', '2021-02-17 02:24:33'),
(51, 'Test Ürün 1', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\n', 10, 9, b'0', '50', '(Removed)', 5, 45, 0, 0, 'NEW', '2021-02-17 02:15:45', '2021-02-17 02:24:04'),
(53, 'Golden Rose Ruj', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\n', 10, 6, NULL, '', '', 7, 45, 29, 0, 'NEW', '2021-02-16 19:15:13', '2021-02-17 16:23:50');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tb_product_brand`
--

CREATE TABLE `tb_product_brand` (
  `ID` int(10) UNSIGNED NOT NULL,
  `BRAND_NAME` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `tb_product_brand`
--

INSERT INTO `tb_product_brand` (`ID`, `BRAND_NAME`) VALUES
(5, 'Rexona'),
(4, 'Rebul'),
(6, 'Nivea'),
(7, 'Golden Rose');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tb_product_images`
--

CREATE TABLE `tb_product_images` (
  `ID` int(10) UNSIGNED NOT NULL,
  `PRODUCT_ID` int(10) UNSIGNED NOT NULL,
  `PRODUCT_IMAGE_NAME` char(11) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `tb_product_images`
--

INSERT INTO `tb_product_images` (`ID`, `PRODUCT_ID`, `PRODUCT_IMAGE_NAME`) VALUES
(29, 51, '221486.jpg'),
(30, 52, '856780.jpg'),
(31, 52, '863886.jpg'),
(32, 53, '601053.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tb_province`
--

CREATE TABLE `tb_province` (
  `ID` int(10) UNSIGNED NOT NULL,
  `PROVINCE_NAME` varchar(100) CHARACTER SET utf8 NOT NULL,
  `CITY_ID` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `tb_province`
--

INSERT INTO `tb_province` (`ID`, `PROVINCE_NAME`, `CITY_ID`) VALUES
(1, 'Seyhan', 1),
(2, 'Ceyhan', 1),
(3, 'Feke', 1),
(4, 'Karaisalı', 1),
(5, 'Karataş', 1),
(6, 'Kozan', 1),
(7, 'Pozantı', 1),
(8, 'Saimbeyli', 1),
(9, 'Tufanbeyli', 1),
(10, 'Yumurtalık', 1),
(11, 'Yüreğir', 1),
(12, 'Aladağ', 1),
(13, 'İmamoğlu', 1),
(14, 'Sarıçam', 1),
(15, 'Çukurova', 1),
(16, 'Adıyaman Merkez', 2),
(17, 'Besni', 2),
(18, 'Çelikhan', 2),
(19, 'Gerger', 2),
(20, 'Gölbaşı / Adıyaman', 2),
(21, 'Kahta', 2),
(22, 'Samsat', 2),
(23, 'Sincik', 2),
(24, 'Tut', 2),
(25, 'Afyonkarahisar Merkez', 3),
(26, 'Bolvadin', 3),
(27, 'Çay', 3),
(28, 'Dazkırı', 3),
(29, 'Dinar', 3),
(30, 'Emirdağ', 3),
(31, 'İhsaniye', 3),
(32, 'Sandıklı', 3),
(33, 'Sinanpaşa', 3),
(34, 'Sultandağı', 3),
(35, 'Şuhut', 3),
(36, 'Başmakçı', 3),
(37, 'Bayat / Afyonkarahisar', 3),
(38, 'İscehisar', 3),
(39, 'Çobanlar', 3),
(40, 'Evciler', 3),
(41, 'Hocalar', 3),
(42, 'Kızılören', 3),
(43, 'Ağrı Merkez', 4),
(44, 'Diyadin', 4),
(45, 'Doğubayazıt', 4),
(46, 'Eleşkirt', 4),
(47, 'Hamur', 4),
(48, 'Patnos', 4),
(49, 'Taşlıçay', 4),
(50, 'Tutak', 4),
(51, 'Amasya Merkez', 5),
(52, 'Göynücek', 5),
(53, 'Gümüşhacıköy', 5),
(54, 'Merzifon', 5),
(55, 'Suluova', 5),
(56, 'Taşova', 5),
(57, 'Hamamözü', 5),
(58, 'Altındağ', 6),
(59, 'Ayaş', 6),
(60, 'Bala', 6),
(61, 'Beypazarı', 6),
(62, 'Çamlıdere', 6),
(63, 'Çankaya', 6),
(64, 'Çubuk', 6),
(65, 'Elmadağ', 6),
(66, 'Güdül', 6),
(67, 'Haymana', 6),
(68, 'Kalecik', 6),
(69, 'Kızılcahamam', 6),
(70, 'Nallıhan', 6),
(71, 'Polatlı', 6),
(72, 'Şereflikoçhisar', 6),
(73, 'Yenimahalle', 6),
(74, 'Gölbaşı / Ankara', 6),
(75, 'Keçiören', 6),
(76, 'Mamak', 6),
(77, 'Sincan', 6),
(78, 'Kazan', 6),
(79, 'Akyurt', 6),
(80, 'Etimesgut', 6),
(81, 'Evren', 6),
(82, 'Pursaklar', 6),
(83, 'Akseki', 7),
(84, 'Alanya', 7),
(85, 'Elmalı', 7),
(86, 'Finike', 7),
(87, 'Gazipaşa', 7),
(88, 'Gündoğmuş', 7),
(89, 'Kaş', 7),
(90, 'Korkuteli', 7),
(91, 'Kumluca', 7),
(92, 'Manavgat', 7),
(93, 'Serik', 7),
(94, 'Demre', 7),
(95, 'İbradı', 7),
(96, 'Kemer / Antalya', 7),
(97, 'Aksu / Antalya', 7),
(98, 'Döşemealtı', 7),
(99, 'Kepez', 7),
(100, 'Konyaaltı', 7),
(101, 'Muratpaşa', 7),
(102, 'Ardanuç', 8),
(103, 'Arhavi', 8),
(104, 'Artvin Merkez', 8),
(105, 'Borçka', 8),
(106, 'Hopa', 8),
(107, 'Şavşat', 8),
(108, 'Yusufeli', 8),
(109, 'Murgul', 8),
(110, 'Bozdoğan', 9),
(111, 'Çine', 9),
(112, 'Germencik', 9),
(113, 'Karacasu', 9),
(114, 'Koçarlı', 9),
(115, 'Kuşadası', 9),
(116, 'Kuyucak', 9),
(117, 'Nazilli', 9),
(118, 'Söke', 9),
(119, 'Sultanhisar', 9),
(120, 'Yenipazar / Aydın', 9),
(121, 'Buharkent', 9),
(122, 'İncirliova', 9),
(123, 'Karpuzlu', 9),
(124, 'Köşk', 9),
(125, 'Didim', 9),
(126, 'Efeler', 9),
(127, 'Ayvalık', 10),
(128, 'Balya', 10),
(129, 'Bandırma', 10),
(130, 'Bigadiç', 10),
(131, 'Burhaniye', 10),
(132, 'Dursunbey', 10),
(133, 'Edremit / Balıkesir', 10),
(134, 'Erdek', 10),
(135, 'Gönen / Balıkesir', 10),
(136, 'Havran', 10),
(137, 'İvrindi', 10),
(138, 'Kepsut', 10),
(139, 'Manyas', 10),
(140, 'Savaştepe', 10),
(141, 'Sındırgı', 10),
(142, 'Susurluk', 10),
(143, 'Marmara', 10),
(144, 'Gömeç', 10),
(145, 'Altıeylül', 10),
(146, 'Karesi', 10),
(147, 'Bilecik Merkez', 11),
(148, 'Bozüyük', 11),
(149, 'Gölpazarı', 11),
(150, 'Osmaneli', 11),
(151, 'Pazaryeri', 11),
(152, 'Söğüt', 11),
(153, 'Yenipazar / Bilecik', 11),
(154, 'İnhisar', 11),
(155, 'Bingöl Merkez', 12),
(156, 'Genç', 12),
(157, 'Karlıova', 12),
(158, 'Kiğı', 12),
(159, 'Solhan', 12),
(160, 'Adaklı', 12),
(161, 'Yayladere', 12),
(162, 'Yedisu', 12),
(163, 'Adilcevaz', 13),
(164, 'Ahlat', 13),
(165, 'Bitlis Merkez', 13),
(166, 'Hizan', 13),
(167, 'Mutki', 13),
(168, 'Tatvan', 13),
(169, 'Güroymak', 13),
(170, 'Bolu Merkez', 14),
(171, 'Gerede', 14),
(172, 'Göynük', 14),
(173, 'Kıbrıscık', 14),
(174, 'Mengen', 14),
(175, 'Mudurnu', 14),
(176, 'Seben', 14),
(177, 'Dörtdivan', 14),
(178, 'Yeniçağa', 14),
(179, 'Ağlasun', 15),
(180, 'Bucak', 15),
(181, 'Burdur Merkez', 15),
(182, 'Gölhisar', 15),
(183, 'Tefenni', 15),
(184, 'Yeşilova', 15),
(185, 'Karamanlı', 15),
(186, 'Kemer / Burdur', 15),
(187, 'Altınyayla / Burdur', 15),
(188, 'Çavdır', 15),
(189, 'Çeltikçi', 15),
(190, 'Gemlik', 16),
(191, 'İnegöl', 16),
(192, 'İznik', 16),
(193, 'Karacabey', 16),
(194, 'Keles', 16),
(195, 'Mudanya', 16),
(196, 'Mustafakemalpaşa', 16),
(197, 'Orhaneli', 16),
(198, 'Orhangazi', 16),
(199, 'Yenişehir / Bursa', 16),
(200, 'Büyükorhan', 16),
(201, 'Harmancık', 16),
(202, 'Nilüfer', 16),
(203, 'Osmangazi', 16),
(204, 'Yıldırım', 16),
(205, 'Gürsu', 16),
(206, 'Kestel', 16),
(207, 'Ayvacık / Çanakkale', 17),
(208, 'Bayramiç', 17),
(209, 'Biga', 17),
(210, 'Bozcaada', 17),
(211, 'Çan', 17),
(212, 'Çanakkale Merkez', 17),
(213, 'Eceabat', 17),
(214, 'Ezine', 17),
(215, 'Gelibolu', 17),
(216, 'Gökçeada', 17),
(217, 'Lapseki', 17),
(218, 'Yenice / Çanakkale', 17),
(219, 'Çankırı Merkez', 18),
(220, 'Çerkeş', 18),
(221, 'Eldivan', 18),
(222, 'Ilgaz', 18),
(223, 'Kurşunlu', 18),
(224, 'Orta', 18),
(225, 'Şabanözü', 18),
(226, 'Yapraklı', 18),
(227, 'Atkaracalar', 18),
(228, 'Kızılırmak', 18),
(229, 'Bayramören', 18),
(230, 'Korgun', 18),
(231, 'Alaca', 19),
(232, 'Bayat / Çorum', 19),
(233, 'Çorum Merkez', 19),
(234, 'İskilip', 19),
(235, 'Kargı', 19),
(236, 'Mecitözü', 19),
(237, 'Ortaköy / Çorum', 19),
(238, 'Osmancık', 19),
(239, 'Sungurlu', 19),
(240, 'Boğazkale', 19),
(241, 'Uğurludağ', 19),
(242, 'Dodurga', 19),
(243, 'Laçin', 19),
(244, 'Oğuzlar', 19),
(245, 'Acıpayam', 20),
(246, 'Buldan', 20),
(247, 'Çal', 20),
(248, 'Çameli', 20),
(249, 'Çardak', 20),
(250, 'Çivril', 20),
(251, 'Güney', 20),
(252, 'Kale / Denizli', 20),
(253, 'Sarayköy', 20),
(254, 'Tavas', 20),
(255, 'Babadağ', 20),
(256, 'Bekilli', 20),
(257, 'Honaz', 20),
(258, 'Serinhisar', 20),
(259, 'Pamukkale', 20),
(260, 'Baklan', 20),
(261, 'Beyağaç', 20),
(262, 'Bozkurt / Denizli', 20),
(263, 'Merkezefendi', 20),
(264, 'Bismil', 21),
(265, 'Çermik', 21),
(266, 'Çınar', 21),
(267, 'Çüngüş', 21),
(268, 'Dicle', 21),
(269, 'Ergani', 21),
(270, 'Hani', 21),
(271, 'Hazro', 21),
(272, 'Kulp', 21),
(273, 'Lice', 21),
(274, 'Silvan', 21),
(275, 'Eğil', 21),
(276, 'Kocaköy', 21),
(277, 'Bağlar', 21),
(278, 'Kayapınar', 21),
(279, 'Sur', 21),
(280, 'Yenişehir / Diyarbakır', 21),
(281, 'Edirne Merkez', 22),
(282, 'Enez', 22),
(283, 'Havsa', 22),
(284, 'İpsala', 22),
(285, 'Keşan', 22),
(286, 'Lalapaşa', 22),
(287, 'Meriç', 22),
(288, 'Uzunköprü', 22),
(289, 'Süloğlu', 22),
(290, 'Ağın', 23),
(291, 'Baskil', 23),
(292, 'Elazığ Merkez', 23),
(293, 'Karakoçan', 23),
(294, 'Keban', 23),
(295, 'Maden', 23),
(296, 'Palu', 23),
(297, 'Sivrice', 23),
(298, 'Arıcak', 23),
(299, 'Kovancılar', 23),
(300, 'Alacakaya', 23),
(301, 'Çayırlı', 24),
(302, 'Erzincan Merkez', 24),
(303, 'İliç', 24),
(304, 'Kemah', 24),
(305, 'Kemaliye', 24),
(306, 'Refahiye', 24),
(307, 'Tercan', 24),
(308, 'Üzümlü', 24),
(309, 'Otlukbeli', 24),
(310, 'Aşkale', 25),
(311, 'Çat', 25),
(312, 'Hınıs', 25),
(313, 'Horasan', 25),
(314, 'İspir', 25),
(315, 'Karayazı', 25),
(316, 'Narman', 25),
(317, 'Oltu', 25),
(318, 'Olur', 25),
(319, 'Pasinler', 25),
(320, 'Şenkaya', 25),
(321, 'Tekman', 25),
(322, 'Tortum', 25),
(323, 'Karaçoban', 25),
(324, 'Uzundere', 25),
(325, 'Pazaryolu', 25),
(326, 'Aziziye', 25),
(327, 'Köprüköy', 25),
(328, 'Palandöken', 25),
(329, 'Yakutiye', 25),
(330, 'Çifteler', 26),
(331, 'Mahmudiye', 26),
(332, 'Mihalıççık', 26),
(333, 'Sarıcakaya', 26),
(334, 'Seyitgazi', 26),
(335, 'Sivrihisar', 26),
(336, 'Alpu', 26),
(337, 'Beylikova', 26),
(338, 'İnönü', 26),
(339, 'Günyüzü', 26),
(340, 'Han', 26),
(341, 'Mihalgazi', 26),
(342, 'Odunpazarı', 26),
(343, 'Tepebaşı', 26),
(344, 'Araban', 27),
(345, 'İslahiye', 27),
(346, 'Nizip', 27),
(347, 'Oğuzeli', 27),
(348, 'Yavuzeli', 27),
(349, 'Şahinbey', 27),
(350, 'Şehitkamil', 27),
(351, 'Karkamış', 27),
(352, 'Nurdağı', 27),
(353, 'Alucra', 28),
(354, 'Bulancak', 28),
(355, 'Dereli', 28),
(356, 'Espiye', 28),
(357, 'Eynesil', 28),
(358, 'Giresun Merkez', 28),
(359, 'Görele', 28),
(360, 'Keşap', 28),
(361, 'Şebinkarahisar', 28),
(362, 'Tirebolu', 28),
(363, 'Piraziz', 28),
(364, 'Yağlıdere', 28),
(365, 'Çamoluk', 28),
(366, 'Çanakçı', 28),
(367, 'Doğankent', 28),
(368, 'Güce', 28),
(369, 'Gümüşhane Merkez', 29),
(370, 'Kelkit', 29),
(371, 'Şiran', 29),
(372, 'Torul', 29),
(373, 'Köse', 29),
(374, 'Kürtün', 29),
(375, 'Çukurca', 30),
(376, 'Hakkari Merkez', 30),
(377, 'Şemdinli', 30),
(378, 'Yüksekova', 30),
(379, 'Altınözü', 31),
(380, 'Dörtyol', 31),
(381, 'Hassa', 31),
(382, 'İskenderun', 31),
(383, 'Kırıkhan', 31),
(384, 'Reyhanlı', 31),
(385, 'Samandağ', 31),
(386, 'Yayladağı', 31),
(387, 'Erzin', 31),
(388, 'Belen', 31),
(389, 'Kumlu', 31),
(390, 'Antakya', 31),
(391, 'Arsuz', 31),
(392, 'Defne', 31),
(393, 'Payas', 31),
(394, 'Atabey', 32),
(395, 'Eğirdir', 32),
(396, 'Gelendost', 32),
(397, 'Isparta Merkez', 32),
(398, 'Keçiborlu', 32),
(399, 'Senirkent', 32),
(400, 'Sütçüler', 32),
(401, 'Şarkikaraağaç', 32),
(402, 'Uluborlu', 32),
(403, 'Yalvaç', 32),
(404, 'Aksu / Isparta', 32),
(405, 'Gönen / Isparta', 32),
(406, 'Yenişarbademli', 32),
(407, 'Anamur', 33),
(408, 'Erdemli', 33),
(409, 'Gülnar', 33),
(410, 'Mut', 33),
(411, 'Silifke', 33),
(412, 'Tarsus', 33),
(413, 'Aydıncık / Mersin', 33),
(414, 'Bozyazı', 33),
(415, 'Çamlıyayla', 33),
(416, 'Akdeniz', 33),
(417, 'Mezitli', 33),
(418, 'Toroslar', 33),
(419, 'Yenişehir / Mersin', 33),
(420, 'Adalar', 34),
(421, 'Bakırköy', 34),
(422, 'Beşiktaş', 34),
(423, 'Beykoz', 34),
(424, 'Beyoğlu', 34),
(425, 'Çatalca', 34),
(426, 'Eyüp', 34),
(427, 'Fatih', 34),
(428, 'Gaziosmanpaşa', 34),
(429, 'Kadıköy', 34),
(430, 'Kartal', 34),
(431, 'Sarıyer', 34),
(432, 'Silivri', 34),
(433, 'Şile', 34),
(434, 'Şişli', 34),
(435, 'Üsküdar', 34),
(436, 'Zeytinburnu', 34),
(437, 'Büyükçekmece', 34),
(438, 'Kağıthane', 34),
(439, 'Küçükçekmece', 34),
(440, 'Pendik', 34),
(441, 'Ümraniye', 34),
(442, 'Bayrampaşa', 34),
(443, 'Avcılar', 34),
(444, 'Bağcılar', 34),
(445, 'Bahçelievler', 34),
(446, 'Güngören', 34),
(447, 'Maltepe', 34),
(448, 'Sultanbeyli', 34),
(449, 'Tuzla', 34),
(450, 'Esenler', 34),
(451, 'Arnavutköy', 34),
(452, 'Ataşehir', 34),
(453, 'Başakşehir', 34),
(454, 'Beylikdüzü', 34),
(455, 'Çekmeköy', 34),
(456, 'Esenyurt', 34),
(457, 'Sancaktepe', 34),
(458, 'Sultangazi', 34),
(459, 'Aliağa', 35),
(460, 'Bayındır', 35),
(461, 'Bergama', 35),
(462, 'Bornova', 35),
(463, 'Çeşme', 35),
(464, 'Dikili', 35),
(465, 'Foça', 35),
(466, 'Karaburun', 35),
(467, 'Karşıyaka', 35),
(468, 'Kemalpaşa / İzmir', 35),
(469, 'Kınık', 35),
(470, 'Kiraz', 35),
(471, 'Menemen', 35),
(472, 'Ödemiş', 35),
(473, 'Seferihisar', 35),
(474, 'Selçuk', 35),
(475, 'Tire', 35),
(476, 'Torbalı', 35),
(477, 'Urla', 35),
(478, 'Beydağ', 35),
(479, 'Buca', 35),
(480, 'Konak', 35),
(481, 'Menderes', 35),
(482, 'Balçova', 35),
(483, 'Çiğli', 35),
(484, 'Gaziemir', 35),
(485, 'Narlıdere', 35),
(486, 'Güzelbahçe', 35),
(487, 'Bayraklı', 35),
(488, 'Karabağlar', 35),
(489, 'Arpaçay', 36),
(490, 'Digor', 36),
(491, 'Kağızman', 36),
(492, 'Kars Merkez', 36),
(493, 'Sarıkamış', 36),
(494, 'Selim', 36),
(495, 'Susuz', 36),
(496, 'Akyaka', 36),
(497, 'Abana', 37),
(498, 'Araç', 37),
(499, 'Azdavay', 37),
(500, 'Bozkurt / Kastamonu', 37),
(501, 'Cide', 37),
(502, 'Çatalzeytin', 37),
(503, 'Daday', 37),
(504, 'Devrekani', 37),
(505, 'İnebolu', 37),
(506, 'Kastamonu Merkez', 37),
(507, 'Küre', 37),
(508, 'Taşköprü', 37),
(509, 'Tosya', 37),
(510, 'İhsangazi', 37),
(511, 'Pınarbaşı / Kastamonu', 37),
(512, 'Şenpazar', 37),
(513, 'Ağlı', 37),
(514, 'Doğanyurt', 37),
(515, 'Hanönü', 37),
(516, 'Seydiler', 37),
(517, 'Bünyan', 38),
(518, 'Develi', 38),
(519, 'Felahiye', 38),
(520, 'İncesu', 38),
(521, 'Pınarbaşı / Kayseri', 38),
(522, 'Sarıoğlan', 38),
(523, 'Sarız', 38),
(524, 'Tomarza', 38),
(525, 'Yahyalı', 38),
(526, 'Yeşilhisar', 38),
(527, 'Akkışla', 38),
(528, 'Talas', 38),
(529, 'Kocasinan', 38),
(530, 'Melikgazi', 38),
(531, 'Hacılar', 38),
(532, 'Özvatan', 38),
(533, 'Babaeski', 39),
(534, 'Demirköy', 39),
(535, 'Kırklareli Merkez', 39),
(536, 'Kofçaz', 39),
(537, 'Lüleburgaz', 39),
(538, 'Pehlivanköy', 39),
(539, 'Pınarhisar', 39),
(540, 'Vize', 39),
(541, 'Çiçekdağı', 40),
(542, 'Kaman', 40),
(543, 'Kırşehir Merkez', 40),
(544, 'Mucur', 40),
(545, 'Akpınar', 40),
(546, 'Akçakent', 40),
(547, 'Boztepe', 40),
(548, 'Gebze', 41),
(549, 'Gölcük', 41),
(550, 'Kandıra', 41),
(551, 'Karamürsel', 41),
(552, 'Körfez', 41),
(553, 'Derince', 41),
(554, 'Başiskele', 41),
(555, 'Çayırova', 41),
(556, 'Darıca', 41),
(557, 'Dilovası', 41),
(558, 'İzmit', 41),
(559, 'Kartepe', 41),
(560, 'Akşehir', 42),
(561, 'Beyşehir', 42),
(562, 'Bozkır', 42),
(563, 'Cihanbeyli', 42),
(564, 'Çumra', 42),
(565, 'Doğanhisar', 42),
(566, 'Ereğli / Konya', 42),
(567, 'Hadim', 42),
(568, 'Ilgın', 42),
(569, 'Kadınhanı', 42),
(570, 'Karapınar', 42),
(571, 'Kulu', 42),
(572, 'Sarayönü', 42),
(573, 'Seydişehir', 42),
(574, 'Yunak', 42),
(575, 'Akören', 42),
(576, 'Altınekin', 42),
(577, 'Derebucak', 42),
(578, 'Hüyük', 42),
(579, 'Karatay', 42),
(580, 'Meram', 42),
(581, 'Selçuklu', 42),
(582, 'Taşkent', 42),
(583, 'Ahırlı', 42),
(584, 'Çeltik', 42),
(585, 'Derbent', 42),
(586, 'Emirgazi', 42),
(587, 'Güneysınır', 42),
(588, 'Halkapınar', 42),
(589, 'Tuzlukçu', 42),
(590, 'Yalıhüyük', 42),
(591, 'Altıntaş', 43),
(592, 'Domaniç', 43),
(593, 'Emet', 43),
(594, 'Gediz', 43),
(595, 'Kütahya Merkez', 43),
(596, 'Simav', 43),
(597, 'Tavşanlı', 43),
(598, 'Aslanapa', 43),
(599, 'Dumlupınar', 43),
(600, 'Hisarcık', 43),
(601, 'Şaphane', 43),
(602, 'Çavdarhisar', 43),
(603, 'Pazarlar', 43),
(604, 'Akçadağ', 44),
(605, 'Arapgir', 44),
(606, 'Arguvan', 44),
(607, 'Darende', 44),
(608, 'Doğanşehir', 44),
(609, 'Hekimhan', 44),
(610, 'Pütürge', 44),
(611, 'Yeşilyurt / Malatya', 44),
(612, 'Battalgazi', 44),
(613, 'Doğanyol', 44),
(614, 'Kale / Malatya', 44),
(615, 'Kuluncak', 44),
(616, 'Yazıhan', 44),
(617, 'Akhisar', 45),
(618, 'Alaşehir', 45),
(619, 'Demirci', 45),
(620, 'Gördes', 45),
(621, 'Kırkağaç', 45),
(622, 'Kula', 45),
(623, 'Salihli', 45),
(624, 'Sarıgöl', 45),
(625, 'Saruhanlı', 45),
(626, 'Selendi', 45),
(627, 'Soma', 45),
(628, 'Turgutlu', 45),
(629, 'Ahmetli', 45),
(630, 'Gölmarmara', 45),
(631, 'Köprübaşı / Manisa', 45),
(632, 'Şehzadeler', 45),
(633, 'Yunusemre', 45),
(634, 'Afşin', 46),
(635, 'Andırın', 46),
(636, 'Elbistan', 46),
(637, 'Göksun', 46),
(638, 'Pazarcık', 46),
(639, 'Türkoğlu', 46),
(640, 'Çağlayancerit', 46),
(641, 'Ekinözü', 46),
(642, 'Nurhak', 46),
(643, 'Dulkadiroğlu', 46),
(644, 'Onikişubat', 46),
(645, 'Derik', 47),
(646, 'Kızıltepe', 47),
(647, 'Mazıdağı', 47),
(648, 'Midyat', 47),
(649, 'Nusaybin', 47),
(650, 'Ömerli', 47),
(651, 'Savur', 47),
(652, 'Dargeçit', 47),
(653, 'Yeşilli', 47),
(654, 'Artuklu', 47),
(655, 'Bodrum', 48),
(656, 'Datça', 48),
(657, 'Fethiye', 48),
(658, 'Köyceğiz', 48),
(659, 'Marmaris', 48),
(660, 'Milas', 48),
(661, 'Ula', 48),
(662, 'Yatağan', 48),
(663, 'Dalaman', 48),
(664, 'Ortaca', 48),
(665, 'Kavaklıdere', 48),
(666, 'Menteşe', 48),
(667, 'Seydikemer', 48),
(668, 'Bulanık', 49),
(669, 'Malazgirt', 49),
(670, 'Muş Merkez', 49),
(671, 'Varto', 49),
(672, 'Hasköy', 49),
(673, 'Korkut', 49),
(674, 'Avanos', 50),
(675, 'Derinkuyu', 50),
(676, 'Gülşehir', 50),
(677, 'Hacıbektaş', 50),
(678, 'Kozaklı', 50),
(679, 'Nevşehir Merkez', 50),
(680, 'Ürgüp', 50),
(681, 'Acıgöl', 50),
(682, 'Bor', 51),
(683, 'Çamardı', 51),
(684, 'Niğde Merkez', 51),
(685, 'Ulukışla', 51),
(686, 'Altunhisar', 51),
(687, 'Çiftlik', 51),
(688, 'Akkuş', 52),
(689, 'Aybastı', 52),
(690, 'Fatsa', 52),
(691, 'Gölköy', 52),
(692, 'Korgan', 52),
(693, 'Kumru', 52),
(694, 'Mesudiye', 52),
(695, 'Perşembe', 52),
(696, 'Ulubey / Ordu', 52),
(697, 'Ünye', 52),
(698, 'Gülyalı', 52),
(699, 'Gürgentepe', 52),
(700, 'Çamaş', 52),
(701, 'Çatalpınar', 52),
(702, 'Çaybaşı', 52),
(703, 'İkizce', 52),
(704, 'Kabadüz', 52),
(705, 'Kabataş', 52),
(706, 'Altınordu', 52),
(707, 'Ardeşen', 53),
(708, 'Çamlıhemşin', 53),
(709, 'Çayeli', 53),
(710, 'Fındıklı', 53),
(711, 'İkizdere', 53),
(712, 'Kalkandere', 53),
(713, 'Pazar / Rize', 53),
(714, 'Rize Merkez', 53),
(715, 'Güneysu', 53),
(716, 'Derepazarı', 53),
(717, 'Hemşin', 53),
(718, 'İyidere', 53),
(719, 'Akyazı', 54),
(720, 'Geyve', 54),
(721, 'Hendek', 54),
(722, 'Karasu', 54),
(723, 'Kaynarca', 54),
(724, 'Sapanca', 54),
(725, 'Kocaali', 54),
(726, 'Pamukova', 54),
(727, 'Taraklı', 54),
(728, 'Ferizli', 54),
(729, 'Karapürçek', 54),
(730, 'Söğütlü', 54),
(731, 'Adapazarı', 54),
(732, 'Arifiye', 54),
(733, 'Erenler', 54),
(734, 'Serdivan', 54),
(735, 'Alaçam', 55),
(736, 'Bafra', 55),
(737, 'Çarşamba', 55),
(738, 'Havza', 55),
(739, 'Kavak', 55),
(740, 'Ladik', 55),
(741, 'Terme', 55),
(742, 'Vezirköprü', 55),
(743, 'Asarcık', 55),
(744, '19 Mayıs', 55),
(745, 'Salıpazarı', 55),
(746, 'Tekkeköy', 55),
(747, 'Ayvacık / Samsun', 55),
(748, 'Yakakent', 55),
(749, 'Atakum', 55),
(750, 'Canik', 55),
(751, 'İlkadım', 55),
(752, 'Baykan', 56),
(753, 'Eruh', 56),
(754, 'Kurtalan', 56),
(755, 'Pervari', 56),
(756, 'Siirt Merkez', 56),
(757, 'Şirvan', 56),
(758, 'Tillo', 56),
(759, 'Ayancık', 57),
(760, 'Boyabat', 57),
(761, 'Durağan', 57),
(762, 'Erfelek', 57),
(763, 'Gerze', 57),
(764, 'Sinop Merkez', 57),
(765, 'Türkeli', 57),
(766, 'Dikmen', 57),
(767, 'Saraydüzü', 57),
(768, 'Divriği', 58),
(769, 'Gemerek', 58),
(770, 'Gürün', 58),
(771, 'Hafik', 58),
(772, 'İmranlı', 58),
(773, 'Kangal', 58),
(774, 'Koyulhisar', 58),
(775, 'Sivas Merkez', 58),
(776, 'Suşehri', 58),
(777, 'Şarkışla', 58),
(778, 'Yıldızeli', 58),
(779, 'Zara', 58),
(780, 'Akıncılar', 58),
(781, 'Altınyayla / Sivas', 58),
(782, 'Doğanşar', 58),
(783, 'Gölova', 58),
(784, 'Ulaş', 58),
(785, 'Çerkezköy', 59),
(786, 'Çorlu', 59),
(787, 'Hayrabolu', 59),
(788, 'Malkara', 59),
(789, 'Muratlı', 59),
(790, 'Saray / Tekirdağ', 59),
(791, 'Şarköy', 59),
(792, 'Marmaraereğlisi', 59),
(793, 'Ergene', 59),
(794, 'Kapaklı', 59),
(795, 'Süleymanpaşa', 59),
(796, 'Almus', 60),
(797, 'Artova', 60),
(798, 'Erbaa', 60),
(799, 'Niksar', 60),
(800, 'Reşadiye', 60),
(801, 'Tokat Merkez', 60),
(802, 'Turhal', 60),
(803, 'Zile', 60),
(804, 'Pazar / Tokat', 60),
(805, 'Yeşilyurt / Tokat', 60),
(806, 'Başçiftlik', 60),
(807, 'Sulusaray', 60),
(808, 'Akçaabat', 61),
(809, 'Araklı', 61),
(810, 'Arsin', 61),
(811, 'Çaykara', 61),
(812, 'Maçka', 61),
(813, 'Of', 61),
(814, 'Sürmene', 61),
(815, 'Tonya', 61),
(816, 'Vakfıkebir', 61),
(817, 'Yomra', 61),
(818, 'Beşikdüzü', 61),
(819, 'Şalpazarı', 61),
(820, 'Çarşıbaşı', 61),
(821, 'Dernekpazarı', 61),
(822, 'Düzköy', 61),
(823, 'Hayrat', 61),
(824, 'Köprübaşı / Trabzon', 61),
(825, 'Ortahisar', 61),
(826, 'Çemişgezek', 62),
(827, 'Hozat', 62),
(828, 'Mazgirt', 62),
(829, 'Nazımiye', 62),
(830, 'Ovacık / Tunceli', 62),
(831, 'Pertek', 62),
(832, 'Pülümür', 62),
(833, 'Tunceli Merkez', 62),
(834, 'Akçakale', 63),
(835, 'Birecik', 63),
(836, 'Bozova', 63),
(837, 'Ceylanpınar', 63),
(838, 'Halfeti', 63),
(839, 'Hilvan', 63),
(840, 'Siverek', 63),
(841, 'Suruç', 63),
(842, 'Viranşehir', 63),
(843, 'Harran', 63),
(844, 'Eyyübiye', 63),
(845, 'Haliliye', 63),
(846, 'Karaköprü', 63),
(847, 'Banaz', 64),
(848, 'Eşme', 64),
(849, 'Karahallı', 64),
(850, 'Sivaslı', 64),
(851, 'Ulubey / Uşak', 64),
(852, 'Uşak Merkez', 64),
(853, 'Başkale', 65),
(854, 'Çatak', 65),
(855, 'Erciş', 65),
(856, 'Gevaş', 65),
(857, 'Gürpınar', 65),
(858, 'Muradiye', 65),
(859, 'Özalp', 65),
(860, 'Bahçesaray', 65),
(861, 'Çaldıran', 65),
(862, 'Edremit / Van', 65),
(863, 'Saray / Van', 65),
(864, 'İpekyolu', 65),
(865, 'Tuşba', 65),
(866, 'Akdağmadeni', 66),
(867, 'Boğazlıyan', 66),
(868, 'Çayıralan', 66),
(869, 'Çekerek', 66),
(870, 'Sarıkaya', 66),
(871, 'Sorgun', 66),
(872, 'Şefaatli', 66),
(873, 'Yerköy', 66),
(874, 'Yozgat Merkez', 66),
(875, 'Aydıncık / Yozgat', 66),
(876, 'Çandır', 66),
(877, 'Kadışehri', 66),
(878, 'Saraykent', 66),
(879, 'Yenifakılı', 66),
(880, 'Çaycuma', 67),
(881, 'Devrek', 67),
(882, 'Ereğli / Zonguldak', 67),
(883, 'Zonguldak Merkez', 67),
(884, 'Alaplı', 67),
(885, 'Gökçebey', 67),
(886, 'Kilimli', 67),
(887, 'Kozlu', 67),
(888, 'Aksaray Merkez', 68),
(889, 'Ortaköy / Aksaray', 68),
(890, 'Ağaçören', 68),
(891, 'Güzelyurt', 68),
(892, 'Sarıyahşi', 68),
(893, 'Eskil', 68),
(894, 'Gülağaç', 68),
(895, 'Bayburt Merkez', 69),
(896, 'Aydıntepe', 69),
(897, 'Demirözü', 69),
(898, 'Ermenek', 70),
(899, 'Karaman Merkez', 70),
(900, 'Ayrancı', 70),
(901, 'Kazımkarabekir', 70),
(902, 'Başyayla', 70),
(903, 'Sarıveliler', 70),
(904, 'Delice', 71),
(905, 'Keskin', 71),
(906, 'Kırıkkale Merkez', 71),
(907, 'Sulakyurt', 71),
(908, 'Bahşili', 71),
(909, 'Balışeyh', 71),
(910, 'Çelebi', 71),
(911, 'Karakeçili', 71),
(912, 'Yahşihan', 71),
(913, 'Batman Merkez', 72),
(914, 'Beşiri', 72),
(915, 'Gercüş', 72),
(916, 'Kozluk', 72),
(917, 'Sason', 72),
(918, 'Hasankeyf', 72),
(919, 'Beytüşşebap', 73),
(920, 'Cizre', 73),
(921, 'İdil', 73),
(922, 'Silopi', 73),
(923, 'Şırnak Merkez', 73),
(924, 'Uludere', 73),
(925, 'Güçlükonak', 73),
(926, 'Bartın Merkez', 74),
(927, 'Kurucaşile', 74),
(928, 'Ulus', 74),
(929, 'Amasra', 74),
(930, 'Ardahan Merkez', 75),
(931, 'Çıldır', 75),
(932, 'Göle', 75),
(933, 'Hanak', 75),
(934, 'Posof', 75),
(935, 'Damal', 75),
(936, 'Aralık', 76),
(937, 'Iğdır Merkez', 76),
(938, 'Tuzluca', 76),
(939, 'Karakoyunlu', 76),
(940, 'Yalova Merkez', 77),
(941, 'Altınova', 77),
(942, 'Armutlu', 77),
(943, 'Çınarcık', 77),
(944, 'Çiftlikköy', 77),
(945, 'Termal', 77),
(946, 'Eflani', 78),
(947, 'Eskipazar', 78),
(948, 'Karabük Merkez', 78),
(949, 'Ovacık / Karabük', 78),
(950, 'Safranbolu', 78),
(951, 'Yenice / Karabük', 78),
(952, 'Kilis Merkez', 79),
(953, 'Elbeyli', 79),
(954, 'Musabeyli', 79),
(955, 'Polateli', 79),
(956, 'Bahçe', 80),
(957, 'Kadirli', 80),
(958, 'Osmaniye Merkez', 80),
(959, 'Düziçi', 80),
(960, 'Hasanbeyli', 80),
(961, 'Sumbas', 80),
(962, 'Toprakkale', 80),
(963, 'Akçakoca', 81),
(964, 'Düzce Merkez', 81),
(965, 'Yığılca', 81),
(966, 'Cumayeri', 81),
(967, 'Gölyaka', 81),
(968, 'Çilimli', 81),
(969, 'Gümüşova', 81),
(970, 'Kaynaşlı', 81);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tb_slider`
--

CREATE TABLE `tb_slider` (
  `ID` int(10) UNSIGNED NOT NULL,
  `IMG_NAME` char(11) CHARACTER SET utf8 NOT NULL,
  `ROUTE_BRAND_ID` int(10) UNSIGNED DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `tb_slider`
--

INSERT INTO `tb_slider` (`ID`, `IMG_NAME`, `ROUTE_BRAND_ID`) VALUES
(34, '244749.png', 6),
(33, '471102.png', 5),
(32, '748704.png', 4);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tb_sub_category`
--

CREATE TABLE `tb_sub_category` (
  `ID` int(10) UNSIGNED NOT NULL,
  `CATEGORY_ID` int(10) UNSIGNED NOT NULL,
  `SUB_CATEGORY_NAME` varchar(60) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `tb_sub_category`
--

INSERT INTO `tb_sub_category` (`ID`, `CATEGORY_ID`, `SUB_CATEGORY_NAME`) VALUES
(1, 1, 'Alt Kategori 1.1'),
(2, 1, 'Alt Kategori 1.2'),
(3, 2, 'Alt Kategori 2.1'),
(5, 1, 'Alt Kategori 1.3'),
(6, 1, 'Alt Kategori 1.4'),
(7, 1, 'Alt Kategori 1.5'),
(8, 1, 'Alt Kategori 1.6'),
(9, 1, 'Alt Kategori 1.7'),
(10, 1, 'Alt Kategori 1.8'),
(11, 1, 'Alt Kategori 1.9'),
(12, 1, 'Alt Kategori 1.10'),
(23, 2, 'adsadasd'),
(24, 45, 'Yüz Bakım Ürünleri'),
(25, 45, 'Vücut Bakım Ürünleri'),
(26, 45, 'Ağız Bakım Ürünleri'),
(27, 45, 'El &amp; Ayak Bakım Ürünleri'),
(28, 45, 'Banyo &amp; Hijyen Ürünleri'),
(29, 45, 'Kadın Bakım Ürünleri'),
(30, 45, 'Bebek Bakım Ürünleri'),
(31, 45, 'Güneş Koruyucu Ürünleri'),
(41, 47, 'Kadın'),
(33, 46, 'Şampuanlar'),
(34, 46, 'Saç Kremleri'),
(35, 46, 'Saç Maskesi'),
(36, 46, 'Saç Serumu'),
(37, 46, 'Saç Bakım Yağları'),
(38, 46, 'Saç Şekillendirici Köpükler'),
(39, 46, 'Saç Boyaları'),
(40, 46, 'Tarak &amp; Fırça Çeşitleri'),
(42, 47, 'Erkek'),
(43, 47, 'Vücut Spreyleri'),
(44, 47, 'Kolonyalar'),
(45, 48, 'Tıraş Bıçakları &amp; Yedekleri'),
(46, 48, 'Sakal Tıraş Ürünleri'),
(47, 48, 'Saç Şekillendirici Ürünler'),
(48, 48, 'Erkek Duş Jeli'),
(52, 57, 'asdsad'),
(51, 54, 'Ruj'),
(56, 62, 'ALT FG'),
(58, 58, 'Test');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tb_sub_sub_category`
--

CREATE TABLE `tb_sub_sub_category` (
  `ID` int(10) UNSIGNED NOT NULL,
  `CATEGORY_ID` int(10) UNSIGNED NOT NULL,
  `SUB_CATEGORY_ID` int(10) UNSIGNED NOT NULL,
  `SUB_SUB_CATEGORY_NAME` varchar(60) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `tb_sub_sub_category`
--

INSERT INTO `tb_sub_sub_category` (`ID`, `CATEGORY_ID`, `SUB_CATEGORY_ID`, `SUB_SUB_CATEGORY_NAME`) VALUES
(3, 45, 24, 'Maske'),
(4, 45, 24, 'Makyaj'),
(6, 54, 51, 'Kırmızı'),
(8, 45, 25, 'vücut'),
(10, 58, 58, 'B');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `tb_address`
--
ALTER TABLE `tb_address`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `tb_advert`
--
ALTER TABLE `tb_advert`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `tb_city`
--
ALTER TABLE `tb_city`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `tb_comments`
--
ALTER TABLE `tb_comments`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `tb_info`
--
ALTER TABLE `tb_info`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `tb_news_subscribe`
--
ALTER TABLE `tb_news_subscribe`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `tb_orders`
--
ALTER TABLE `tb_orders`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `tb_order_products`
--
ALTER TABLE `tb_order_products`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `tb_poster`
--
ALTER TABLE `tb_poster`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`ID`);
ALTER TABLE `tb_product` ADD FULLTEXT KEY `PRODUCT_NAME` (`PRODUCT_NAME`,`PRODUCT_DETAIL`);

--
-- Tablo için indeksler `tb_product_brand`
--
ALTER TABLE `tb_product_brand`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `tb_product_images`
--
ALTER TABLE `tb_product_images`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `tb_province`
--
ALTER TABLE `tb_province`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `tb_slider`
--
ALTER TABLE `tb_slider`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `tb_sub_category`
--
ALTER TABLE `tb_sub_category`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `tb_sub_sub_category`
--
ALTER TABLE `tb_sub_sub_category`
  ADD PRIMARY KEY (`ID`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `tb_address`
--
ALTER TABLE `tb_address`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `tb_advert`
--
ALTER TABLE `tb_advert`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Tablo için AUTO_INCREMENT değeri `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- Tablo için AUTO_INCREMENT değeri `tb_city`
--
ALTER TABLE `tb_city`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- Tablo için AUTO_INCREMENT değeri `tb_comments`
--
ALTER TABLE `tb_comments`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `tb_customer`
--
ALTER TABLE `tb_customer`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `tb_info`
--
ALTER TABLE `tb_info`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `tb_news_subscribe`
--
ALTER TABLE `tb_news_subscribe`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `tb_orders`
--
ALTER TABLE `tb_orders`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Tablo için AUTO_INCREMENT değeri `tb_order_products`
--
ALTER TABLE `tb_order_products`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Tablo için AUTO_INCREMENT değeri `tb_poster`
--
ALTER TABLE `tb_poster`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- Tablo için AUTO_INCREMENT değeri `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Tablo için AUTO_INCREMENT değeri `tb_product_brand`
--
ALTER TABLE `tb_product_brand`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `tb_product_images`
--
ALTER TABLE `tb_product_images`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Tablo için AUTO_INCREMENT değeri `tb_province`
--
ALTER TABLE `tb_province`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=971;

--
-- Tablo için AUTO_INCREMENT değeri `tb_slider`
--
ALTER TABLE `tb_slider`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Tablo için AUTO_INCREMENT değeri `tb_sub_category`
--
ALTER TABLE `tb_sub_category`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Tablo için AUTO_INCREMENT değeri `tb_sub_sub_category`
--
ALTER TABLE `tb_sub_sub_category`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
