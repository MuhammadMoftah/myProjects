-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 22, 2017 at 01:16 PM
-- Server version: 5.5.41-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `erasofte_atef`
--

-- --------------------------------------------------------

--
-- Table structure for table `career`
--

CREATE TABLE IF NOT EXISTS `career` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name_arabic` varchar(200) NOT NULL,
  `order` int(100) NOT NULL,
  `active` int(100) NOT NULL,
  `smoll_description_arabic` varchar(200) NOT NULL,
  `name_english` varchar(200) NOT NULL,
  `smoll_description_english` varchar(350) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `career`
--

INSERT INTO `career` (`id`, `name_arabic`, `order`, `active`, `smoll_description_arabic`, `name_english`, `smoll_description_english`, `date`) VALUES
(1, 'وظائف المبيعات', 1, 1, 'وظائف المبيعات شركة رائدة في مجال التصنيع والتصدير والإستيراد للمواد الغذائية [ لحوم /دواجن /أسماك ]', 'marketing jop', 'marketing jop is meat that he loves all family members of all ages and young adults and because tastes wonderful and tastes sweet and lovely as it is.', '2016-07-13'),
(42, 'وظائف نقل', 1, 1, 'وظائف نقل شركة رائدة في مجال التصنيع والتصدير والإستيراد للمواد الغذائية [ لحوم /دواجن /أسماك ]', 'Delivery jop', 'Delivery jop is meat that he loves all family members of all ages and young adults and because tastes wonderful and tastes sweet and lovely as it is.', '2016-07-18');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(250) NOT NULL,
  `link` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `link_english` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `order` int(2) NOT NULL,
  `active` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `image`, `link`, `link_english`, `order`, `active`) VALUES
(18, 'kkkk.png', NULL, NULL, 1, 1),
(19, 'jjhj.png', NULL, NULL, 6, 1),
(20, 'hgghh.png', NULL, NULL, 4, 1),
(21, '9999.png', NULL, NULL, 11, 1),
(22, '7777.png', NULL, NULL, 3, 1),
(23, '5555.png', NULL, NULL, 10, 1),
(24, '4444.png', NULL, NULL, 2, 1),
(25, '9.png', NULL, NULL, 9, 1),
(26, '2222.png', NULL, NULL, 8, 1),
(27, '99.png', NULL, NULL, 5, 1),
(28, '44.png', NULL, NULL, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name_arabic` varchar(200) NOT NULL,
  `image` varchar(150) NOT NULL,
  `order` int(100) NOT NULL,
  `active` int(100) NOT NULL,
  `smoll_description_arabic` varchar(200) NOT NULL,
  `company_name` varchar(200) NOT NULL,
  `description_arabic` text,
  `name_english` varchar(200) NOT NULL,
  `smoll_description_english` varchar(350) NOT NULL,
  `company_name_english` varchar(200) NOT NULL,
  `description_english` text,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name_arabic`, `image`, `order`, `active`, `smoll_description_arabic`, `company_name`, `description_arabic`, `name_english`, `smoll_description_english`, `company_name_english`, `description_english`, `date`) VALUES
(1, 'فوائد الكابوريا', '326435-svetik.png', 1, 1, 'لاشك ان طعام الكابوريا هى من الاطعمة التى يفضلها نوعية خاصة من قطاعات كبيرة محبة للمأكولا البحرية فبخلاف كونها ذات طعم مميز ولذيذ لكنها لها العديد والعديد من الفوائد التى لايعرفها الكثيرون', 'الامل للتوريدات الغذلئية', '<p>لاشك ان طعام الكابوريا هى من الاطعمة التى يفضلها نوعية خاصة من قطاعات كبيرة محبة للمأكولا البحرية فبخلاف كونها ذات طعم مميز ولذيذ لكنها لها العديد والعديد من الفوائد التى لايعرفها الكثيرون&nbsp;</p>', 'Benefits crab', 'There is no doubt that the food is crab foods favored by the special quality of a great love for marine sectors Makola Unlike being with distinctive taste and flavorful but have many, many benefits', 'AL Amal Food Supplies', '<p>There is no doubt that the food is crab foods favored by the special quality of a great love for marine sectors Makola Unlike being with distinctive taste and flavorful but have many, many benefits</p>', '2016-07-21'),
(30, 'فوائد البط', 'almastba.png', 2, 1, 'يعتبر لحم البط من اللحوم التي يحبها جميع افراد الأسرة من كل الأعمار صغار وكبار وذلك لأن طعمه رائع ومذاقه حلو وجميل كما أنه يحتوى على العديد من العناصر الغذائية', 'الامل للتوريدات الغذلئية', '<p>يعتبر لحم البط من اللحوم التي يحبها جميع افراد الأسرة من كل الأعمار صغار وكبار وذلك لأن طعمه رائع ومذاقه حلو وجميل كما أنه يحتوى على العديد من العناصر الغذائية</p>', 'Benefits of ducks', 'Duck meat is meat that he loves all family members of all ages and young adults and because tastes wonderful and tastes sweet and lovely it also contains many nutrients', 'AL Amal Food Supplies', 'Duck meat is meat that he loves all family members of all ages and young adults and because tastes wonderful and tastes sweet and lovely it also contains many nutrients', '2016-11-25');

-- --------------------------------------------------------

--
-- Table structure for table `event_images`
--

CREATE TABLE IF NOT EXISTS `event_images` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `image` varchar(200) NOT NULL,
  `event_id` int(100) NOT NULL,
  `order` int(100) NOT NULL,
  `active` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `event_images`
--

INSERT INTO `event_images` (`id`, `image`, `event_id`, `order`, `active`) VALUES
(1, '103384.imgcache.jpg', 1, 1, 1),
(2, '0grilled_crab.jpg', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `image` varchar(250) NOT NULL,
  `photo` int(50) NOT NULL,
  `order` int(100) NOT NULL,
  `active` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `image`, `photo`, `order`, `active`) VALUES
(1, 'p1.jpg', 1, 1, 1),
(2, 'p2.jpg', 1, 1, 1),
(3, 'p3.jpg', 1, 1, 1),
(4, 'p4.jpg', 1, 1, 1),
(5, 'p5.jpg', 1, 1, 1),
(6, 'c1.jpg', 36, 1, 1),
(7, 'c2.jpg', 36, 1, 1),
(8, 'c3.jpg', 36, 1, 1),
(9, 'c4.jpg', 36, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `info_media`
--

CREATE TABLE IF NOT EXISTS `info_media` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `code` varchar(200) NOT NULL,
  `link` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `info_media`
--

INSERT INTO `info_media` (`id`, `code`, `link`) VALUES
(1, 'facebook', 'https://www.facebook.com/'),
(2, 'twitter', 'https://twitter.com/'),
(7, 'email', 'info@atefhelmy.com'),
(6, 'googlemap', 'https://www.google.com/maps/embed?pb=!1m19!1m12!1m3!1d55251.37451031098!2d31.258464350000004!3d30.059488450000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m4!1i0!3e6!4m0!4m0!5e0!3m2!1sar!2seg!4v1428241897536'),
(11, 'pntq', 'https://www.google.com.eg/?gfe_rd=cr&ei=f9uMVqiEOa6s8wfRlo0o'),
(12, 'rsicon', 'https://www.google.com.eg/?gws_rd=ssl'),
(17, 'facebooklike', 'https://developers.facebook.com/docs/plugins/'),
(14, 'gmail', 'https://accounts.google.com/ServiceLogin?service=mail&passive=true&rm=false&continue=https://mail.google.com/mail/&ss=1&scc=1&ltmpl=default&ltmplcache=2&emr=1&osid=1'),
(15, 'linkdin', 'https://www.linkedin.com/uas/login'),
(16, 'vimeo', 'https://vimeo.com/upgrade?dclid=CJX0iaLylcoCFcKdFgodGP4GTg&gclid=CjwKEAiAk7O0BRD9_Ka2w_PhwSkSJAAmKswxxHpsU_NofYUMFj9l3nNjIq7AeLGUKIFHo7HacK6nqBoCcDbw_wcB&gclsrc=aw.ds&utm_campaign=1723&utm_medium=google-upgrade1-brand_vimeo_alone_vimeo_exact-eu&utm_source=search&utm_term=vimeo'),
(18, 'searchicon', 'https://www.google.com.eg/?gws_rd=ssl'),
(19, 'two_piont', '#'),
(21, 'instgram', 'https://www.instagram.com/?hl=en'),
(22, 'beicon', 'https://www.google.com.eg/?gfe_rd=cr&ei=f9uMVqiEOa6s8wfRlo0o'),
(23, 'yotuobe', 'https://www.youtube.com/'),
(24, 'vimeo', 'https://vimeo.com/upgrade?dclid=CO_cn73OiMsCFfcw0wodCKAMkg&gclid=CjwKEAiA3aW2BRCD_cOo5oCFuUMSJADiIMILiKBkPH5K-SRFZtdccmzxfLAsN8B6WCOXMHc0l36htBoCS2Hw_wcB&gclsrc=aw.ds&utm_campaign=1723&utm_medium=google-upgrade1-brand_vimeo_alone_vimeo_exact-eu&utm_source=search&utm_term=vimeo'),
(25, 'header_email', 'info@atefhelmy.com'),
(26, 'footer_email', 'info@atefhelmy.com');

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE IF NOT EXISTS `photo` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `image` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `name_arabic` varchar(250) NOT NULL,
  `order` int(100) NOT NULL,
  `active` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`id`, `image`, `name`, `name_arabic`, `order`, `active`) VALUES
(1, 'p25.jpg', 'Photo Album Fish', 'البوم صور السمك', 1, 1),
(36, 'vcxvxcb.jpg', 'Photo Album Duck', 'البوم صور البط', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name_arabic` varchar(200) NOT NULL,
  `level` int(11) NOT NULL,
  `image` varchar(150) NOT NULL,
  `description_arabic` text,
  `star` int(50) NOT NULL DEFAULT '0',
  `new` int(50) NOT NULL,
  `offer` int(100) NOT NULL,
  `special` int(50) NOT NULL,
  `video` varchar(150) DEFAULT NULL,
  `file` varchar(150) DEFAULT NULL,
  `order` int(100) NOT NULL,
  `active` int(100) NOT NULL,
  `name_english` varchar(200) NOT NULL,
  `description_english` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=96 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name_arabic`, `level`, `image`, `description_arabic`, `star`, `new`, `offer`, `special`, `video`, `file`, `order`, `active`, `name_english`, `description_english`) VALUES
(73, 'جمبرى رويال', 0, 'uuuuuuuuuu.png', 'لاشك ان جمبرى رويالا هى من الاطعمة التى يفضلها نوعية خاصة من قطاعات كبيرة محبة للمأكولا البحرية فبخلاف كونها ذات طعم مميز ولذيذ لكنها لها العديد والعديد من الفوائد التى لايعرفها الكثيرون ', 5, 0, 0, 1, 'yr1y3Z1f558', '222.png.zip', 1, 1, 'Royal shrimps', 'There is no doubt that the shrimps are Ruyala foods favored by the special quality of a great love for marine sectors Makola Unlike being with distinctive taste and flavorful but have many'),
(74, 'ديك رومى رويال', 0, '565622222.png', 'لاشك ان ديك رومى رويال هى من الاطعمة التى يفضلها نوعية خاصة من قطاعات كبيرة محبة للمأكولا البحرية فبخلاف كونها ذات طعم مميز ولذيذ لكنها لها العديد والعديد من الفوائد التى لايعرفها الكثيرون ', 4, 1, 1, 1, NULL, NULL, 1, 1, 'Turkey Royal', 'There is no doubt that the turkey Royal is one of the foods favored by the special quality of a great love for marine sectors Makola Unlike being with distinctive taste and flavorful but have many'),
(75, 'فلية رويال', 0, '3(1).png', 'لاشك ان فلية رويال هى من الاطعمة التى يفضلها نوعية خاصة من قطاعات كبيرة محبة للمأكولا البحرية فبخلاف كونها ذات طعم مميز ولذيذ لكنها لها العديد والعديد من الفوائد التى لايعرفها الكثيرون ', 3, 0, 1, 1, NULL, NULL, 1, 1, 'Fillet Royal', 'There is no doubt that the Fillet Royal is one of the foods favored by the special quality of a great love for marine sectors Makola Unlike being with distinctive taste and flavorful but have many, many benefits that many Aiarafha'),
(88, 'بط الحياة', 0, '4.png', 'لاشك ان طعام بط الحياة هى من الاطعمة التى يفضلها نوعية خاصة من قطاعات كبيرة محبة للمأكولا البحرية فبخلاف كونها ذات طعم مميز ولذيذ لكنها لها العديد والعديد من الفوائد التى لايعرفها الكثيرون ', 4, 0, 0, 1, NULL, NULL, 1, 1, 'Duck', 'There is no doubt that the Duck is one of the foods favored by the special quality of a great love for marine sectors Makola Unlike being with distinctive taste and flavorful but have many, many benefits that many Aiarafha'),
(92, 'بط رويال', 0, '5(1).png', 'لاشك ان طعام بط رويال هى من الاطعمة التى يفضلها نوعية خاصة من قطاعات كبيرة محبة للمأكولا البحرية فبخلاف كونها ذات طعم مميز ولذيذ لكنها لها العديد والعديد من الفوائد التى لايعرفها الكثيرون ', 2, 0, 0, 1, NULL, NULL, 1, 1, 'Duck Royal', 'There is no doubt that the Duck Royal is one of the foods favored by the special quality of a great love for marine sectors Makola Unlike being with distinctive taste and flavorful but have many, many benefits that many Aiarafha');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE IF NOT EXISTS `product_images` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `image` varchar(200) NOT NULL,
  `product_id` int(100) NOT NULL,
  `order` int(100) NOT NULL,
  `active` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `image`, `product_id`, `order`, `active`) VALUES
(13, '222.png', 73, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `searchengine`
--

CREATE TABLE IF NOT EXISTS `searchengine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page` varchar(50) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `keywords` text NOT NULL,
  `title` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=223 ;

--
-- Dumping data for table `searchengine`
--

INSERT INTO `searchengine` (`id`, `page`, `description`, `keywords`, `title`) VALUES
(7, 'index.php', 'الرئيسية', '  للتوريدات الغذائية , شركة الامل , 2016 , Cairo , Egypt', 'الرئيسية'),
(215, 'contactusarabic.php', 'أتصل بنا ', '  للتوريدات الغذائية , شركة الامل , 2016 , Cairo , Egypt', 'أتصل بنا '),
(219, 'competitionsenglish.php', 'Competitions ', '  للتوريدات الغذائية , شركة الامل , 2016 , Cairo , Egypt', 'Competitions '),
(214, 'videoarabic.php', 'فيديوهات ', '  للتوريدات الغذائية , شركة الامل , 2016 , Cairo , Egypt', 'فيديوهات '),
(213, 'ordersarabic.php', 'أطلب الان ', '  للتوريدات الغذائية , شركة الامل , 2016 , Cairo , Egypt', 'أطلب الان '),
(218, 'aboutusenglish.php', 'About US', '  للتوريدات الغذائية , شركة الامل , 2016 , Cairo , Egypt', 'About US'),
(212, 'aboutusarabic.php', 'عن الشركة ', '  للتوريدات الغذائية , شركة الامل , 2016 , Cairo , Egypt', 'عن الشركة '),
(216, 'competitions.php', 'مسابقات ', '  للتوريدات الغذائية , شركة الامل , 2016 , Cairo , Egypt', 'مسابقات '),
(217, 'indexenglish.php', 'Home', '  للتوريدات الغذائية , شركة الامل , 2016 , Cairo , Egypt', 'Home'),
(220, 'ordersenglish.php', 'Order ', '  للتوريدات الغذائية , شركة الامل , 2016 , Cairo , Egypt', 'Order '),
(221, 'videoenglish.php', 'Video', '  للتوريدات الغذائية , شركة الامل , 2016 , Cairo , Egypt', 'Video'),
(222, 'contactusenglish.php', 'Contact US ', '  للتوريدات الغذائية , شركة الامل , 2016 , Cairo , Egypt', 'Contact US ');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `image` varchar(250) NOT NULL,
  `order` int(100) NOT NULL,
  `active` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `image`, `order`, `active`) VALUES
(23, '4(1).png', 3, 1),
(18, '3.png', 5, 1),
(19, '1.png', 4, 1),
(20, '2.png', 2, 1),
(21, '5.png', 6, 1),
(24, '1(1).png', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `static`
--

CREATE TABLE IF NOT EXISTS `static` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) CHARACTER SET utf8 NOT NULL,
  `arabic` text CHARACTER SET utf8 NOT NULL,
  `english` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `static`
--

INSERT INTO `static` (`id`, `code`, `arabic`, `english`) VALUES
(9, 'headerphone', '<p>02 225 984 34</p>', '<p>02 225 984 34</p>'),
(28, 'homedescription', '<ol>\n    <li>خبرة اكثر من 10 سنوات</li>\n    <li>سعر منافس و جودة عالية</li>\n    <li>خدمة مبيعات علي اعلي مستوي</li>\n    <li>صدق في التعامل و ضمان حقيقي للمنتج</li>\n</ol>', '<ol>\r\n    <li>More than 10 years experience</li>\r\n    <li>At a reasonable price and high quality</li>\r\n    <li>Sales at the highest level of service</li>\r\n    <li>Believe in the handling and the real guarantee of the product</li>\r\n</ol>'),
(32, 'footeraddress', '<p><bdo dir="rtl">9 شارع حسين مبارك - شبرا الخيمة - القليوبية - مصر</bdo></p>', '<p><bdo dir="ltr">9 Hussein Mubarak Street - Shubra Al Khaimah - Qalyubia - Egypt </bdo></p>'),
(15, 'about_us', '<p style="color: #1E283A; font-size: 120%;">عن شركة الامل للتوريدات الغذائية </p>\r\n<p>\r\nيعتبر لحم البط من اللحوم التي يحبها جميع افراد الأسرة من كل الأعمار صغار وكبار وذلك لأن طعمه رائع ومذاقه حلو وجميل كما  .</p>\r\n\r\n<p>\r\nلاشك ان طعام الكابوريا هى من الاطعمة التى يفضلها نوعية خاصة من قطاعات كبيرة محبة للمأكولا البحرية فبخلاف كونها ذات طعم مميز ولذيذ لكنها لها العديد والعديد من الفوائد التى لايعرفها الكثيرون   .</p>\r\n \r\n\r\n<ol>\r\n    <li style="margin-right: 0px; margin-top: 4px;">خبرة اكثر من 10 سنوات</li>\r\n    <li style="margin-right: 0px; margin-top: 4px;">سعر منافس و جودة عالية</li>\r\n    <li style="margin-right: 0px; margin-top: 4px;">خدمة مبيعات علي اعلي مستوي</li>\r\n    <li style="margin-right: 0px; margin-top: 4px;">صدق في التعامل و ضمان حقيقي للمنتج</li>\r\n</ol>\r\n\r\n <p style="font-weight: bold;\r\ntext-align: left;\r\nmargin-top: 15px;">M. عاطف حلمي / المدير</p>', '<p style="color: #1E283A; font-size: 120%;">Almal for Food Supplies </p>\n<p>\nDuck meat is meat that he loves all family members of all ages and young adults and because tastes wonderful and tastes sweet and lovely as it is.</p>\n\n<p>\nThere is no doubt that the food is crab foods favored by the special quality of a great love for marine sectors Makola Unlike being with distinctive taste and flavorful but have many, many benefits that Aiarafha many.</p>\n \n\n<ol>\n    <li>More than 10 years experience</li>\n    <li>At a reasonable price and high quality</li>\n    <li>Sales at the highest level of service</li>\n    <li>Believe in the handling and the real guarantee of the product</li>\n</ol>\n\n <p style="font-weight: bold;\ntext-align: right;\nmargin-top: 15px;">M. Atef Helmy</p>'),
(25, 'contactus', '<table>\r\n    <tbody>\r\n        <tr>\r\n            <th valign="top" class="contactname">العنوان:</th>\r\n            <th valign="top">&nbsp;</th>\r\n            <th valign="top" class="contactvalue2">  \r\n\r\n\r\n9 شارع حسين مبارك - شبرا الخيمة - القليوبية - مصر </th>\r\n        </tr>\r\n  \r\n \r\n<tr>\r\n            <th valign="top" class="contactname">الموب.</th>\r\n            <th valign="top">&nbsp;</th>\r\n            <th valign="top" class="contactvalue2">\r\n\r\n01274040137 - 01226403250</th>\r\n        </tr>\r\n  \r\n        <tr>\r\n            <th valign="top" class="contactname">الايميل:</th>\r\n            <th valign="top">&nbsp;</th>\r\n            <th valign="top" class="contactvalue2">\r\n info@atefhelmy.com </th>\r\n        </tr>\r\n    </tbody>\r\n</table>', '<table>\r\n    <tbody>\r\n        <tr>\r\n            <th valign="top" class="contactname">Address:</th>\r\n            <th valign="top">&nbsp;</th>\r\n            <th valign="top" class="contactvalue2">  \r\n\r\n 9 Hussein Mubarak Street - Shubra Al Khaimah - Qalyubia - Egypt  </th>\r\n        </tr>\r\n  \r\n \r\n<tr>\r\n            <th valign="top" class="contactname">Mobile.</th>\r\n            <th valign="top">&nbsp;</th>\r\n            <th valign="top" class="contactvalue2">\r\n\r\n01274040137 - 01226403250</th>\r\n        </tr>\r\n  \r\n        <tr>\r\n            <th valign="top" class="contactname">Email:</th>\r\n            <th valign="top">&nbsp;</th>\r\n            <th valign="top" class="contactvalue2">\r\n info@atefhelmy.com </th>\r\n        </tr>\r\n    </tbody>\r\n</table>'),
(33, 'footermobile', '<p>01274040137 - 01226403250</p>', '<p>01274040137 - 01226403250</p>'),
(34, 'competitions', '<p style="color: #1E283A; font-size: 120%;">مسابقات شركة الامل للتوريدات الغذائية </p>\n<p>\nيعتبر لحم البط من اللحوم التي يحبها جميع افراد الأسرة من كل الأعمار صغار وكبار وذلك لأن طعمه رائع ومذاقه حلو وجميل كما  .</p>\n\n<p>\nلاشك ان طعام الكابوريا هى من الاطعمة التى يفضلها نوعية خاصة من قطاعات كبيرة محبة للمأكولا البحرية فبخلاف كونها ذات طعم مميز ولذيذ لكنها لها العديد والعديد من الفوائد التى لايعرفها الكثيرون   .</p>\n \n\n<ol>\n    <li style="margin-right: 0px; margin-top: 4px;">خبرة اكثر من 10 سنوات</li>\n    <li style="margin-right: 0px; margin-top: 4px;">سعر منافس و جودة عالية</li>\n    <li style="margin-right: 0px; margin-top: 4px;">خدمة مبيعات علي اعلي مستوي</li>\n    <li style="margin-right: 0px; margin-top: 4px;">صدق في التعامل و ضمان حقيقي للمنتج</li>\n</ol>\n ', '<p style="color: #1E283A; font-size: 120%;">Competitions Almal for Food Supplies </p>\n<p>\nDuck meat is meat that he loves all family members of all ages and young adults and because tastes wonderful and tastes sweet and lovely as it is.</p>\n\n<p>\nThere is no doubt that the food is crab foods favored by the special quality of a great love for marine sectors Makola Unlike being with distinctive taste and flavorful but have many, many benefits that Aiarafha many.</p>\n \n\n<ol>\n    <li>More than 10 years experience</li>\n    <li>At a reasonable price and high quality</li>\n    <li>Sales at the highest level of service</li>\n    <li>Believe in the handling and the real guarantee of the product</li>\n</ol>\n');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL DEFAULT '',
  `password` varchar(100) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`,`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin', '7247d4469ead5ab1758f98f711c8e836', 'amr@erasoft-eg.com');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `video` varchar(150) NOT NULL,
  `order` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `video`, `order`, `active`) VALUES
(1, 'yr1y3Z1f558', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE IF NOT EXISTS `visitors` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `email` varchar(250) NOT NULL,
  `message` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
