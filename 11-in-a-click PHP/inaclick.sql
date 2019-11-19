-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2018 at 01:32 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inaclick`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(4) NOT NULL,
  `cont` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `cont`) VALUES
(1, ' <Span>ان اكليك</Span>    \n                التطبيق الاول الذي يجمع بين   خدمة طلب سيارة و حجز السكن معاً من خلال تطبيق واحد\n                 كل هذا وأكثر  فقط بضغطة زر.     \n              <br><br>\n              \n               \n           <Span>ان اكليك</Span>\n           التطبيق الاذكى فى حجز السكن وخدمات السيارات، معنا يمكنك حجز احتيجاتك بالضبط لا اكثر ولا اقل حيث يمكنك الاختيار بين فئات عديدة (الاقرب، الاوفر،الافخم)  \n            <br><br>\n            \n            <Span> ان اكليك</Span>\n           يلبى كل احتياجاتك كيفما تريد. ذاهب للعمل؟ تريد سيارة على الفور؟ محتاج تقضى وقت فى مكان مناسب؟ محتاج تحجر مكان لفترة؟\n            <br>\n            معنا وداعا لحجر الفنادق وشيل هموم زحمة الطريق والمواصلات . حمل ان اكليك الان ل حجز و تنقل خالى من المتاعب فى اى وقت وفى كل مكان  \n');

-- --------------------------------------------------------

--
-- Table structure for table `about_en`
--

CREATE TABLE `about_en` (
  `id` int(4) NOT NULL,
  `cont` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `about_en`
--

INSERT INTO `about_en` (`id`, `cont`) VALUES
(1, '\n         \n        <Span>In A Click </Span>  is the first app combines booking ride and real estate services, we provide all this and more within just a click.<br><br>\n               \n           <Span>In A Click </Span>  is the smartest app for booking a safe, reliable and affordable ride and accommodation. With in a click you pick exactly your needs no increase nor less, so you can pick your convenient option (the nearest, the cheapest and the highest quality).  <br><br>\n            \n            <Span>In A Click </Span>  will get you where you need to be. Commuting to work? airport transfer? visiting family? place to rest? place to stay? . Forget about hotel booking, parking, traffic, car rental, or waiting for a taxi. Download In a click now for hassle-free transportation and accommodation booking anytime, anywhere.');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(4) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `pic`, `name`, `description`, `logo`) VALUES
(1, 'icons/car1.png', 'سيارة فخمة', '- اربع ابواب\n<br>\n- حمل اكثر من اربع اشخاص\n<br>\n- موديل حديث يبدأ من 2013\n                            <br>\n- مكيفة بالكامل\n                            <br>\n- مواصفات فل اوبشن\n                            <br>\n- لا تستخدم الترويج لعلامات تجارية\n                            <br>\n  - فى حالة جيده وبلا اضرار مرئية', 'icons/car1-logo.png'),
(2, 'icons/car2.png', 'ونش', '\r\n                            - يحمل اكثر من سيارة\r\n                            <br>\r\n                            - موديل يبدأ من 2008\r\n                            <br>\r\n                            - فى حالة جيده وبلا اضرار مرئية\r\n                            <br>\r\n                            - لا تستخدم الترويج لعلامات تجارية\r\n                            <br>\r\n                            - خدمة توصيل الوقود\r\n                            <br>\r\n                            - خدمة شحن البطارية\r\n                            <br>\r\n                            - خدمة تغيير الاطارات\r\n                            <br>\r\n                            - خدمة الصيانة السريعة فى مكانك', 'icons/car2-logo.png'),
(3, 'icons/car3.png', 'السيارة المجهزة', '\r\n                            - تتسع اكثر من 4 ركاب\r\n                            <br>\r\n                            - السيارة مجهزة وفقا لتقرير الكومسيون الطبى \r\n                            <br>\r\n                            - موديل يبدأ من 2010\r\n                            <br>\r\n                            - مكيفة بالكامل\r\n                            <br>\r\n                            - لا تستخدم الترويج لعلامات تجارية\r\n                            <br>\r\n                            - فى حالة جيده وبلا اضرار مرئية', 'icons/car3-logo.png'),
(4, 'icons/car4.png', 'سيارة النقل', '\r\n                            - سعة 2 راكب\r\n                            <br>\r\n                            - تستخدم لنقل البضائع والمنتجات\r\n                            <br>\r\n                            - موديل يبدأ من 2008\r\n                            <br>\r\n                            - مواصفات فل اوبشن\r\n                            <br>\r\n                            - لا تستخدم الترويج لعلامات تجارية\r\n                            <br>\r\n                            - فى حالة جيده وبلا اضرار مرئية', 'icons/car4-logo.png'),
(5, 'icons/car5.png', 'سيارة اقتصادية', '\r\n                            - اربع ابواب\r\n                            <br>\r\n                            - سعة 4 راكب\r\n                            <br>\r\n                            - موديل يبدأ من 2008\r\n                            <br>\r\n                            - مكيفة بالكامل\r\n                            <br>\r\n                            - لا تستخدم الترويج لعلامات تجارية\r\n                            <br>\r\n                            - فى حالة جيده وبلا اضرار مرئية', 'icons/car5-logo.png'),
(6, 'icons/car6.png', 'سيارة عائلية', '\r\n                            - تسع 7 او 8 راكب\r\n                            <br>\r\n                            - موديل يبدأ من 2008\r\n                            <br>\r\n                            - مكيفة بالكامل\r\n                            <br>\r\n                            - لا تستخدم الترويج لعلامات تجارية\r\n                            <br>\r\n                            - فى حالة جيده وبلا اضرار مرئية', 'icons/car6-logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `cars_en`
--

CREATE TABLE `cars_en` (
  `id` int(4) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `cars_en`
--

INSERT INTO `cars_en` (`id`, `pic`, `name`, `description`, `logo`) VALUES
(1, 'icons/car1.png', 'Luxury Car', '- Four doors necessary.\n                            <br>\n                            - Can contain more than 4 people.\n                            <br>\n                            - New model ( start from 2013).\n                            <br>\n                            - Fully air conditioned.\n                            <br>\n                            - Full option.\n                            <br>\n                            - Have no Ads.\n                            <br>\n                            - Perfect condition with no damages.', 'icons/car1-logo.png'),
(2, 'icons/car2.png', 'Winch', '- Carry more than one car.\n                            <br>\n                            - Model year Start from 2008.\n                            <br>\n                            - New model ( start from 2013).\n                            <br>\n                            - Perfect condition with no damages.\n                            <br>\n                            - Have no Ads.\n                            <br>\n                            - Fuel delivery Services\n                            <br>\n                            - Bettary Charge Services.\n                            <br>\n                            - Tires Charge Services.\n                            <br>\n                            - Quick Maintenance Services.', 'icons/car2-logo.png'),
(3, 'icons/car3.png', 'Mobility Car', '- Can contain more than 4 people.\n                            <br>\n                            - Equipped according to the report of the Medical Nationalists\n                            <br>\n                            - Modern model ( start from 2010).\n                            <br>\n                            - Fully air conditioned.\n                            <br>\n                            - Have no Ads.\n                            <br>\n                            - Perfect condition with no damages.', 'icons/car3-logo.png'),
(4, 'icons/car4.png', 'Lorry', '- Contain 2 people.\n                            <br>\n                            - For the transport of goods and products\n                            <br>\n                            - Modern model (start from 2008).\n                            <br>\n                            - Full option.\n                            <br>\n                            - Have no Ads.\n                            <br>\n                            - Perfect condition with no damages.', 'icons/car4-logo.png'),
(5, 'icons/car5.png', 'Economy Car', '- Four doors necessary.\n                            <br>\n                            - Can contain 4 people.\n                            <br>\n                            - Modern model ( start from 2008).\n                            <br>\n                            - Fully air conditioned.\n                            <br>\n                            - Have no Ads.\n                            <br>\n                            - Perfect condition with no damages.', 'icons/car5-logo.png'),
(6, 'icons/car6.png', 'Family Car', '- Can contain 7 or 8 people.\n                            <br>\n                            - Modern model ( start from 2008).\n                            <br>\n                            - Fully air conditioned.\n                            <br>\n                            - Have no Ads.\n                            <br>\n                            - Perfect condition with no damages.', 'icons/car6-logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(225) NOT NULL,
  `phone` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `phone`, `email`) VALUES
(1, '+2 011 111 2222', 'info@Inaclick.com');

-- --------------------------------------------------------

--
-- Table structure for table `contact_en`
--

CREATE TABLE `contact_en` (
  `id` int(225) NOT NULL,
  `phone` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact_en`
--

INSERT INTO `contact_en` (`id`, `phone`, `email`) VALUES
(1, '+2012 3456789', 'info@Inaclick.com');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(4) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `category` text NOT NULL,
  `html_id` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`, `category`, `html_id`) VALUES
(1, 'كيف يمكننى حجز مكان؟', '\n          \n        بضغطة واحده   يمكنك حجر جميع الممتلكات وذلك ببطاقة ائتمان سارية المفعول، سوف يصلك رسالة التفعيل على البريد و رسالة SMS ( اذا قمت بكتابة الايميل و التلفون غير صحيحين لن يصلك معلومات التفعيل ). فى بعض الحالات يجب ان يصل تحقيق المعلومات الاول وفى هذه الحالة لن يتم حجز المكان الا اذا تم التحقيق من المعلومات.\n            <br><br>\n           تظهر الشقق ، الغرف  ، الفلل او غيرها من الفئات المتاحة حولك في الخريطة حسب اختيارك من التالي : \n            <br>\n             - شقة\n            <br>\n            - غرفة\n            <br>\n            - فيلا \n            <br>\n            - مزرعة\n            <br>\n            - شاليه\n            <br><br>\n           عند طلب السكن  يظهر للمستخدم معلومات شاملة عن  العقار عند ضغط استعراض ( يظهر الموقع  ، المساحة ، عدد الغرف ،  صور العقار ) مميزات الموقع ( قرب الخدمات ، الأماكن السياحية ودرجة الأمان)\n            <br> \n            كل هذا والمزيد فقط بضغطة زر !', 'users', 'qu1'),
(2, 'كيف يمكننى حجز توصيلة؟', '\r\n        1- قم بعمل طلبك\r\n        <br>\r\n        حدد مكانك وعنوانك (نقطتك الافتراضية على ال GPS) ثم اختار سيارتك المفضلة ، اعرف تكلفة الرحلة بالتقريب بعد ذلك سائقك سوف يصطحبك فى دقائق \r\n        <br> <br>\r\n        2-اركب\r\n        <br>\r\n        سوف ترى كافة المعلومات والتفاصيل عن السائق فى التطبيق ومن هنا تعرف انك اخترت السيارة المناسبة \r\n        \r\n        <br><br>\r\n        3-الدفع\r\n        <br>\r\n        قم بالدفع عن طريق بطاقة الائتمان او كاش\r\n        <br><br>\r\n        4- التقييم\r\n        <br>\r\n        قم بتقييم سائقك عندما تصل الى المكان المراد', 'users', 'qu2'),
(3, 'How do you get  a ride with in a click?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit,\r\n        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat', 'drivers', 'qu3'),
(4, 'How can I pay ?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit,\r\n        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat', 'owners', 'qu4');

-- --------------------------------------------------------

--
-- Table structure for table `faq_en`
--

CREATE TABLE `faq_en` (
  `id` int(4) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `category` text NOT NULL,
  `html_id` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faq_en`
--

INSERT INTO `faq_en` (`id`, `question`, `answer`, `category`, `html_id`) VALUES
(1, 'How Can I book a accommodation?', 'All accommodations can be booked immediately within a click, with a valid credit card and you will receive a confirmation email and phone SMS  (If you do not insert a valid email address and mobile number you will not receive the confirmation details ). In some cases an inquiry must be sent first. In these instances the accommodation is not booked until the inquiry is confirmed by the accommodation provider.\n            <br><br>\n            Apartments, Rooms, Villas ... etc Will apper on the map according to your Choise: \n            <br>\n             - Apartment\n            <br>\n            - Room\n            <br>\n            - Villa \n            <br>\n            - Farm\n            <br>\n            - Chalet\n            <br><br>\n            After Pick you place it will apper full details about it (location, Size, Num of rooms , Safty, Tourist places )\n            <br> \n            All of this in just a click', 'users', 'qu1'),
(2, 'How can I book a ride with in a click?', '1- Place your Request \n        <br>\n        Enter your pickup location and your destination address (your default pickup point is set to your current GPS location). Choose your preferred car type , get a fare estimate , and tap request. then  your driver will arrive  in minutes.\n        <br> <br>\n        2-Ride\n        <br>\n        Your ride comes to you. You will see your driver\'s contact information and vehicle details in the app, so you know you are getting in the right car.\n        <br><br>\n        3-Pay\n        <br>\n        Pay with credit card on file or cash.\n        <br><br>\n        4- Rate your experience\n        <br>\n        Rate your driver when you reach you destination.', 'users', 'qu2'),
(3, 'How do you get  a ride with in a click?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit,\r\n        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat', 'drivers', 'qu3'),
(4, 'How can I pay ?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit,\r\n        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat', 'owners', 'qu4');

-- --------------------------------------------------------

--
-- Table structure for table `how`
--

CREATE TABLE `how` (
  `id` int(4) NOT NULL,
  `title` text NOT NULL,
  `points` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `how`
--

INSERT INTO `how` (`id`, `title`, `points`) VALUES
(1, 'استخدام التطبيق بسيط جدا كل ما عليك:', '<li>فقط قم بفتح البرنامج واختار المكان المراد</li>\n                <li>التطبيق يستخدم خاصية تحديد مكانك لتسهيل على السائق ان يجد مكانك تحديدا </li>\n                <li>سوف ترى كافة المعلومات عن السائق وصورته الشخصية ويمكنك ان تتبع مده وصوله لك على الخريطة</li>\n                <li>اذا كنت لا تملك مكان للأقامة تستطيع من خلالنا اختيار مكان مناسب لك بضغطة زر فقط  </li>\n                <li>الدفع على خدمة التوصيل يمكن ان يكون عبر بطاقات الائتمان و Android Pay و PayPal وكاش فى بعض المدن  </li>\n                <li>الدفع على خدمات العقارات يكون عبر ال Valid credit او depit card.</li>\n                <li>بعد الخدمة التوصيل / الاقامة من فضلك قم بتقدير الخدمة او السائق وذلك لنقوم بتحسين مستوى الخدمات لكم فى المرات المقبلة </li>');

-- --------------------------------------------------------

--
-- Table structure for table `how_en`
--

CREATE TABLE `how_en` (
  `id` int(4) NOT NULL,
  `title` text NOT NULL,
  `points` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `how_en`
--

INSERT INTO `how_en` (`id`, `title`, `points`) VALUES
(1, 'Requesting your Order is very simple:', '<li>Just open the app and Pick where you’re going.</li>\n                <li>The app uses your location so your driver knows where to pick you up.</li>\n                <li>You’ll see your driver picture, details, and can track their arrival on the map</li>\n                <li>If you have no place to stay you can choose  from the various accommodation and  options we offer within a click. </li>\n                <li>Payment for the transportation services can be made by credit card, Android Pay, PayPal and cash in selected cities. </li>\n                <li>Payment for  accommodations requires  a valid credit or debit card.</li>\n                <li>After the ride / the stay, you can rate your driver / property and provide feedback to help us   improve In a click experience.</li>');

-- --------------------------------------------------------

--
-- Table structure for table `realestate`
--

CREATE TABLE `realestate` (
  `id` int(4) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `realestate`
--

INSERT INTO `realestate` (`id`, `pic`, `name`, `description`, `logo`) VALUES
(1, 'icons/villa.png', 'فيلا', '\r\n                            - وجود عدد ٤ غرف فأكثر و 3 حمام فأكثر  \r\n                            <br>\r\n                            - مطبخ متكامل مجهز بكامل المستلزمات  \r\n                            <br>\r\n                            - مكان راقى و أمن  \r\n                            <br>\r\n                            - تكييف مركزي او سبليت\r\n                            <br>\r\n                            - تشطيب سوبر لوكس \r\n                            <br>\r\n                            - الاثاث فى حالة ممتازة وليس به عيوب \r\n                            <br>\r\n                            - وجود حديقة او حمام سباحه \r\n                            <br>\r\n                            - وجود أمن ', 'icons/villa-logo.png'),
(2, 'icons/flat.png', 'الشقة', '\r\n                            - وجود عدد ٢ غرفة و 1 حمام فأكثر \r\n                            <br>\r\n                            - مطبخ متكامل مجهز بكامل المستلزمات \r\n                            <br>\r\n                            - فى مكان مناسب و أمن \r\n                            <br>\r\n                            - تشطيب لوكس /  سوبر لوكس \r\n                            <br>\r\n                            -     الاثاث فى حالة ممتازة وليس به عيوب \r\n                            <br>\r\n                            - تكييف\r\n                            <br>\r\n                            - وجود مصعد \r\n                            <br>\r\n                            - وجود أمن ', 'icons/flat-logo.png'),
(3, 'icons/room.png', 'غرفة', '-	وجود غرفة مجهزة بالاسرة والمستلزمات\r\n                            <br>\r\n                            -	توفر حمام  مفرد او مشترك \r\n                            <br>\r\n                            -	فى مكان مناسب و أمن\r\n                            <br>\r\n                            -	الاثاث فى حالة ممتازة وليس به عيوب\r\n                            <br>\r\n                            -	وجود مطبخ مشترك \r\n                            <br>\r\n                            -	مكيفة', 'icons/room-logo.png'),
(4, 'icons/chalet.png', 'شاليه', '\r\n                           -	 اطلالة او قرب من الشاطئ \r\n                            <br>\r\n                            -	مكون من ١ غرفة فأكثر وحمام فأكثر\r\n                            <br>\r\n                            -	مطبخ متكامل مجهز بكامل المستلزمات \r\n                            <br>\r\n                            -	مكان مناسب و أمن \r\n                            <br>\r\n                            -	تشطيب لوكس / سوبر لوكس \r\n                            <br>\r\n                            -	الاثاث فى حالة ممتازة وليس به عيوب \r\n                            <br>\r\n                            -	توفر تكييف', 'icons/chalet-logo.png'),
(5, 'icons/farm.png', 'المزرعة', '- عدد  ٢ غرف فأكثر وحمام فأكثر \r\n                            <br>\r\n                            - مطبخ مجهز بكامل المستلزمات \r\n                            <br>\r\n                            - وسائل ترفية و طبيعية خلابة\r\n                            <br>\r\n                            - مكان مناسب و أمن  \r\n                            <br>\r\n                            -	تكييف ', 'icons/farm-logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `realestate_en`
--

CREATE TABLE `realestate_en` (
  `id` int(4) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `realestate_en`
--

INSERT INTO `realestate_en` (`id`, `pic`, `name`, `description`, `logo`) VALUES
(1, 'icons/villa.png', 'Villa', '- More than 4 rooms and 3 bathroom\n                            <br>\n                            - Completed kitchen \n                            <br>\n                            - High class and Safe place\n                            <br>\n                            - Air condition\n                            <br>\n                            - Finished Super Lux\n                            <br>\n                            - Furniture with perfect condition \n                            <br>\n                            - With Garden or Pool\n                            <br>\n                            - Security', 'icons/villa-logo.png'),
(2, 'icons/flat.png', 'Flat', '- More than 2 rooms & 1 bathroom\n                            <br>\n                            - Completed kitchen \n                            <br>\n                            - Appropriate and Safe place\n                            <br>\n                            - Finished Lux / Super lux\n                            <br>\n                            - Furniture with perfect condition \n                            <br>\n                            - Air condition\n                            <br>\n                            - Elevator\n                            <br>\n                            - Security', 'icons/flat-logo.png'),
(3, 'icons/room.png', 'Room', '- Euipped room for family\n                            <br>\n                            - Single or shared bathroom \n                            <br>\n                            - Appropriate and Safe place\n                            <br>\n                            - Furniture with perfect condition \n                            <br>\n                            - Shared Kitchen\n                            <br>\n                            - Air condition', 'icons/room-logo.png'),
(4, 'icons/chalet.png', 'Chalet', '- Near from beach\n                            <br>\n                            -	More than one room & bathroom\n                            <br>\n                            -	Completed kitchen \n                            <br>\n                            -	Appropriate and Safe place \n                            <br>\n                            -	Finished Lux / Super lux\n                            <br>\n                            -	Furniture with perfect condition\n                            <br>\n                            - Air condition', 'icons/chalet-logo.png'),
(5, 'icons/farm.png', 'Farm', '- More than 2 rooms & bathroom\n                            <br>\n                            - Completed kitch\n                            <br>\n                            - Entertainment & Stunning nature\n                            <br>\n                            - Appropriate and Safe place\n                            <br>\n                            - Air condition', 'icons/farm-logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id` int(4) NOT NULL,
  `saying` text NOT NULL,
  `name` text NOT NULL,
  `pic` text NOT NULL,
  `data-slide` int(4) NOT NULL,
  `active` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `saying`, `name`, `pic`, `data-slide`, `active`) VALUES
(1, 'من الان لن احمل هم الوقوف فى الاشارات شكرا لكم ', 'محمد مفتاح', 'images/one.jpg', 0, 'active'),
(2, 'مش مصدق مادا سهولته ، العالم اصبح اسهل واقرب', 'رامى عماد', 'images/two.jpg', 1, ''),
(3, 'تطبيق مهم جدا لا غنا عنه ومش غالى فى نفس الوقت\r\n', 'احمد حجازى', 'images/three.jpg', 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial_en`
--

CREATE TABLE `testimonial_en` (
  `id` int(4) NOT NULL,
  `saying` text NOT NULL,
  `name` text NOT NULL,
  `pic` text NOT NULL,
  `data-slide` int(4) NOT NULL,
  `active` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `testimonial_en`
--

INSERT INTO `testimonial_en` (`id`, `saying`, `name`, `pic`, `data-slide`, `active`) VALUES
(1, 'From I don\'t need to Book a room  or wait for a Taxi <br> Thank you In A Click', 'Mohamed Moftah', 'images/one.jpg', 0, 'active'),
(2, 'Can\'t imagine how simple it is , the world become so small', 'Rami Emad', 'images/two.jpg', 1, ''),
(3, 'Very Cool App so Easy to use, and not expensive at all', 'Ahmed Heg', 'images/three.jpg', 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `why`
--

CREATE TABLE `why` (
  `id` int(4) NOT NULL,
  `fontawesome` text NOT NULL,
  `title` text NOT NULL,
  `cont` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `why`
--

INSERT INTO `why` (`id`, `fontawesome`, `title`, `cont`) VALUES
(1, 'fa fa-handshake-o', 'تعدد الخدمات', 'نحن نقدم اكثر من خدمة فى ان واحد وفى تطبيق واحد مثل حجز العقارات وخدمات التوصيل وقريبا خدمات اكثر '),
(2, 'fa fa-money', 'اسعار مرنة', 'معنا يمكنك اختيار احتيجاتك بالضبط لا زياده ولا اقل، يمكنك الاختيار الميزة المفضلة لديك (الاقرب، الموفر، الافخم)'),
(3, 'fa fa-clock-o', 'مساعده 24 ساعة', 'يمكنك التواصل معنا فى اى وقت اذا اردت المساعده او اذا كنت تريد ارسال تقرير لنا عن شئ ما '),
(4, 'fa fa-handshake-o', 'الدفع المرن', 'نحن نقدم لك اكثر من وسيلة دفع وذلك لضمان راحتك وعدم تقيدك وبوسيلة واحده');

-- --------------------------------------------------------

--
-- Table structure for table `why_en`
--

CREATE TABLE `why_en` (
  `id` int(4) NOT NULL,
  `fontawesome` text NOT NULL,
  `title` text NOT NULL,
  `cont` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `why_en`
--

INSERT INTO `why_en` (`id`, `fontawesome`, `title`, `cont`) VALUES
(1, 'fa fa-handshake-o', 'Diverse services', 'We can provide a lot of services not just one, like ease ride or real States and soon more and more'),
(2, 'fa fa-money', 'Fit Prices', 'With us you pick exactly your needs No increase nor less, so you can pick your convenient option (The nearest, The cheapest, the highest quality).'),
(3, 'fa fa-clock-o', '24/7 Support', 'You Can contact with us anytime you need a help or if you want to report a bug.'),
(4, 'fa fa-handshake-o', 'Flexible payment', 'We provide you more than one way for payment not just one way');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `about_en`
--
ALTER TABLE `about_en`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars_en`
--
ALTER TABLE `cars_en`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_en`
--
ALTER TABLE `contact_en`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq_en`
--
ALTER TABLE `faq_en`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `how`
--
ALTER TABLE `how`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `how_en`
--
ALTER TABLE `how_en`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `realestate`
--
ALTER TABLE `realestate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `realestate_en`
--
ALTER TABLE `realestate_en`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial_en`
--
ALTER TABLE `testimonial_en`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `why`
--
ALTER TABLE `why`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `why_en`
--
ALTER TABLE `why_en`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `about_en`
--
ALTER TABLE `about_en`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `cars_en`
--
ALTER TABLE `cars_en`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `contact_en`
--
ALTER TABLE `contact_en`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `faq_en`
--
ALTER TABLE `faq_en`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `how`
--
ALTER TABLE `how`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `how_en`
--
ALTER TABLE `how_en`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `realestate`
--
ALTER TABLE `realestate`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `realestate_en`
--
ALTER TABLE `realestate_en`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `testimonial_en`
--
ALTER TABLE `testimonial_en`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `why`
--
ALTER TABLE `why`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `why_en`
--
ALTER TABLE `why_en`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
