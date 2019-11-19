-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2017 at 05:01 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erasofte_man`
--

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `name_arabic` varchar(255) NOT NULL,
  `name_english` varchar(255) NOT NULL,
  `special` varchar(255) NOT NULL,
  `active` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `desc_arabic` varchar(255) NOT NULL,
  `desc_english` varchar(255) NOT NULL,
  `description_arabic` text NOT NULL,
  `description_english` text NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `news_images`
--

CREATE TABLE `news_images` (
  `id` int(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `news_id` int(100) NOT NULL,
  `order` int(100) NOT NULL,
  `active` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news_images`
--

INSERT INTO `news_images` (`id`, `image`, `news_id`, `order`, `active`) VALUES
(13, '222.png', 73, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name_arabic` varchar(200) NOT NULL,
  `name_english` varchar(200) NOT NULL,
  `desc_arabic` varchar(255) NOT NULL,
  `desc_english` varchar(255) NOT NULL,
  `description_arabic` text,
  `description_english` text,
  `order` int(100) NOT NULL,
  `level` int(11) NOT NULL,
  `image` varchar(150) NOT NULL,
  `special` int(50) NOT NULL,
  `video` varchar(150) DEFAULT NULL,
  `file` varchar(150) DEFAULT NULL,
  `active` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name_arabic`, `name_english`, `desc_arabic`, `desc_english`, `description_arabic`, `description_english`, `order`, `level`, `image`, `special`, `video`, `file`, `active`) VALUES
(73, 'شركة مان للمصاعد', 'شركة مان للمصاعد', '', '', 'لاشك ان جمبرى رويالا هى من الاطعمة التى يفضلها نوعية خاصة من قطاعات كبيرة محبة للمأكولا البحرية فبخلاف كونها ذات طعم مميز ولذيذ لكنها لها العديد والعديد من الفوائد التى لايعرفها الكثيرون ', 'There is no doubt that the shrimps are Ruyala foods favored by the special quality of a great love for marine sectors Makola Unlike being with distinctive taste and flavorful but have many', 1, 0, '2845.jpg', 1, 'yr1y3Z1f558', '222.png.zip', 1),
(96, 'شركة مان للمصاعد', 'شركة مان للمصاعد', '', '', 'لاشك ان جمبرى رويالا هى من الاطعمة التى يفضلها نوعية خاصة من قطاعات كبيرة محبة للمأكولا البحرية فبخلاف كونها ذات طعم مميز ولذيذ لكنها لها العديد والعديد من الفوائد التى لايعرفها الكثيرون ', 'There is no doubt that the shrimps are Ruyala foods favored by the special quality of a great love for marine sectors Makola Unlike being with distinctive taste and flavorful but have many', 1, 0, '2265.jpg', 1, 'yr1y3Z1f558', '222.png.zip', 1),
(97, 'شركة مان للمصاعد', 'شركة مان للمصاعد', '', '', 'لاشك ان جمبرى رويالا هى من الاطعمة التى يفضلها نوعية خاصة من قطاعات كبيرة محبة للمأكولا البحرية فبخلاف كونها ذات طعم مميز ولذيذ لكنها لها العديد والعديد من الفوائد التى لايعرفها الكثيرون ', 'There is no doubt that the shrimps are Ruyala foods favored by the special quality of a great love for marine sectors Makola Unlike being with distinctive taste and flavorful but have many', 1, 0, '2112.png', 1, 'yr1y3Z1f558', '222.png.zip', 1),
(98, 'شركة مان للمصاعد', 'شركة مان للمصاعد', '', '', 'لاشك ان جمبرى رويالا هى من الاطعمة التى يفضلها نوعية خاصة من قطاعات كبيرة محبة للمأكولا البحرية فبخلاف كونها ذات طعم مميز ولذيذ لكنها لها العديد والعديد من الفوائد التى لايعرفها الكثيرون ', 'There is no doubt that the shrimps are Ruyala foods favored by the special quality of a great love for marine sectors Makola Unlike being with distinctive taste and flavorful but have many', 1, 0, '2111.png', 1, 'yr1y3Z1f558', '222.png.zip', 1),
(99, 'شركة مان للمصاعد', 'شركة مان للمصاعد', '', '', 'لاشك ان جمبرى رويالا هى من الاطعمة التى يفضلها نوعية خاصة من قطاعات كبيرة محبة للمأكولا البحرية فبخلاف كونها ذات طعم مميز ولذيذ لكنها لها العديد والعديد من الفوائد التى لايعرفها الكثيرون ', 'There is no doubt that the shrimps are Ruyala foods favored by the special quality of a great love for marine sectors Makola Unlike being with distinctive taste and flavorful but have many', 1, 0, '2113.png', 1, 'yr1y3Z1f558', '222.png.zip', 1),
(100, 'شركة مان للمصاعد', 'شركة مان للمصاعد', '', '', 'لاشك ان جمبرى رويالا هى من الاطعمة التى يفضلها نوعية خاصة من قطاعات كبيرة محبة للمأكولا البحرية فبخلاف كونها ذات طعم مميز ولذيذ لكنها لها العديد والعديد من الفوائد التى لايعرفها الكثيرون ', 'There is no doubt that the shrimps are Ruyala foods favored by the special quality of a great love for marine sectors Makola Unlike being with distinctive taste and flavorful but have many', 1, 0, 'prod2.jpg', 1, 'yr1y3Z1f558', '222.png.zip', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `product_id` int(100) NOT NULL,
  `order` int(100) NOT NULL,
  `active` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `image`, `product_id`, `order`, `active`) VALUES
(13, '222.png', 73, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name_arabic` varchar(255) NOT NULL,
  `name_english` varchar(255) NOT NULL,
  `desc_arabic` varchar(1000) NOT NULL,
  `desc_english` varchar(1000) NOT NULL,
  `description_arabic` text NOT NULL,
  `description_english` text NOT NULL,
  `special` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `order` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `image`, `name_arabic`, `name_english`, `desc_arabic`, `desc_english`, `description_arabic`, `description_english`, `special`, `active`, `order`) VALUES
(1, '2230.jpg', 'مكونات المصاعد', 'مكونات المصاعد', '    مجموعة مختارة من المكونات الخاصة بالمصاعد والنتقاه بعنايه من القسم الهندسي بالشركة في مزيج رائع يخلط الجودة بالتكلفة الاقتصادية . سوف تجد الحل الممتاز لاحتياجاتك   باستعمالك مكوناتنا الخاصة                                                              ', '    مجموعة مختارة من المكونات الخاصة بالمصاعد والنتقاه بعنايه من القسم الهندسي بالشركة في مزيج رائع يخلط الجودة بالتكلفة الاقتصادية . سوف تجد الحل الممتاز لاحتياجاتك   باستعمالك مكوناتنا الخاصة                                                                                مجموعة مختارة من المكونات الخاصة بالمصاعد والنتقاه بعنايه من القسم الهندسي بالشركة في مزيج رائع يخلط الجودة بالتكلفة الاقتصادية . سوف تجد الحل الممتاز لاحتياجاتك   باستعمالك مكوناتنا الخاصة                                                                           مجموعة مختارة من المكونات الخاصة بالمصاعد والنتقاه بعنايه من القسم الهندسي بالشركة في مزيج رائع يخلط الجودة بالتكلفة الاقتصادية . سوف تجد الحل الممتاز لاحتياجاتك   باستعمالك مكوناتنا الخاصة                                   ', '', '', 1, 1, 1),
(2, '2703.jpg', 'مكونات المصاعد', 'مكونات المصاعد', '    مجموعة مختارة من المكونات الخاصة بالمصاعد والنتقاه بعنايه من القسم الهندسي بالشركة في مزيج رائع يخلط الجودة بالتكلفة الاقتصادية . سوف تجد الحل الممتاز لاحتياجاتك   باستعمالك مكوناتنا الخاصة                                                              ', '    مجموعة مختارة من المكونات الخاصة بالمصاعد والنتقاه بعنايه من القسم الهندسي بالشركة في مزيج رائع يخلط الجودة بالتكلفة الاقتصادية . سوف تجد الحل الممتاز لاحتياجاتك   باستعمالك مكوناتنا الخاصة                                                              ', '', '', 1, 1, 2),
(3, '2112.png', 'مكونات المصاعد', 'مكونات المصاعد', '    مجموعة مختارة من المكونات الخاصة بالمصاعد والنتقاه بعنايه من القسم الهندسي بالشركة في مزيج رائع يخلط الجودة بالتكلفة الاقتصادية . سوف تجد الحل الممتاز لاحتياجاتك   باستعمالك مكوناتنا الخاصة                                                              ', '    مجموعة مختارة من المكونات الخاصة بالمصاعد والنتقاه بعنايه من القسم الهندسي بالشركة في مزيج رائع يخلط الجودة بالتكلفة الاقتصادية . سوف تجد الحل الممتاز لاحتياجاتك   باستعمالك مكوناتنا الخاصة                                                              ', '', '', 1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `services_images`
--

CREATE TABLE `services_images` (
  `id` int(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `services_id` int(100) NOT NULL,
  `order` int(100) NOT NULL,
  `active` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services_images`
--

INSERT INTO `services_images` (`id`, `image`, `services_id`, `order`, `active`) VALUES
(13, '222.png', 73, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(100) NOT NULL,
  `name_arabic` varchar(255) NOT NULL,
  `name_english` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `order` int(100) NOT NULL,
  `active` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `name_arabic`, `name_english`, `image`, `order`, `active`) VALUES
(23, 'سلالم متحركة', 'سلالم متحركة', '2854.jpg', 1, 1),
(18, 'سلالم متحركة', 'سلالم متحركة', '2995.jpg', 2, 1),
(19, 'سلالم متحركة', 'سلالم متحركة', '2692.jpg', 3, 1),
(20, 'سلالم متحركة', 'سلالم متحركة', '2693.jpg', 4, 1),
(21, 'سلالم متحركة', 'سلالم متحركة', '2694.jpg', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `tests` int(11) NOT NULL,
  `sfsdfa` int(11) NOT NULL,
  `rwerwe` int(11) NOT NULL,
  `dsfs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `tests`, `sfsdfa`, `rwerwe`, `dsfs`) VALUES
(1, 354, 456, 453, 786),
(2, 354, 456, 453, 786);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL DEFAULT '',
  `password` varchar(100) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin', '7247d4469ead5ab1758f98f711c8e836', 'amr@erasoft-eg.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_images`
--
ALTER TABLE `news_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services_images`
--
ALTER TABLE `services_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`,`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `news_images`
--
ALTER TABLE `news_images`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `services_images`
--
ALTER TABLE `services_images`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
