-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 14 فبراير 2023 الساعة 09:24
-- إصدار الخادم: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mazad11`
--

-- --------------------------------------------------------

--
-- بنية الجدول `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(150) NOT NULL,
  `link` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `category`
--

INSERT INTO `category` (`id`, `category`, `link`) VALUES
(19, 'ساعات', 'clock'),
(20, 'ملابس', 'Clothes'),
(21, 'سيارات', 'car'),
(22, 'سيارات مستعملة', 'usecar'),
(23, 'الكترونيات', 'elctron'),
(24, 'عقارات', 'house');

-- --------------------------------------------------------

--
-- بنية الجدول `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `username` varchar(80) NOT NULL,
  `email` varchar(150) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- بنية الجدول `payments`
--

CREATE TABLE `payments` (
  `id` int(150) NOT NULL,
  `id-produ` int(150) NOT NULL,
  `price` float NOT NULL,
  `id-user` int(150) NOT NULL,
  `link` varchar(500) NOT NULL,
  `email` varchar(150) NOT NULL,
  `date-p` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `payments`
--

INSERT INTO `payments` (`id`, `id-produ`, `price`, `id-user`, `link`, `email`, `date-p`, `status`) VALUES
(9, 13, 100, 2, 'https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=X3Y5PMDSAM3PE', '', '2018-02-12 12:37:19', 0);

-- --------------------------------------------------------

--
-- بنية الجدول `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `user_id` int(150) NOT NULL,
  `title` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `price` float NOT NULL,
  `id-user` int(11) NOT NULL,
  `link` varchar(150) NOT NULL,
  `image` varchar(150) NOT NULL,
  `category` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  `date-Product` timestamp NOT NULL DEFAULT current_timestamp(),
  `is-over` int(11) NOT NULL DEFAULT 1,
  `is-paid` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `post`
--

INSERT INTO `post` (`id`, `user_id`, `title`, `desc`, `price`, `id-user`, `link`, `image`, `category`, `view`, `date-Product`, `is-over`, `is-paid`) VALUES
(13, 2, 'ساعة رولكس', 'تأتي هذه الساعة الفاخرة السويسرية الصنع من تاغ هيوير والمميزة بعلبة قطرها 39مم، وإطار دوار أحادي الإتجاه. المينا الزرقاء تأتي بعقارب فضية اللون مضيئة وكذلك علامات الساعات. الساعة مزودة بسوار محفور بشعار الماركة ويثبت على المعصم بكلبس ثنائي الطي. الساعة مقاومة للماء حتى عمق 300 متر.', 100, 2, '2dn3f7i13nms', 'post5b1d03594bf4f.jpg', 19, 204, '2023-02-09 02:37:58', 1, 0),
(18, 2, 'rolex', 'تأتي هذه الساعة الفاخرة السويسرية الصنع من تاغ هيوير والمميزة بعلبة قطرها 39مم، وإطار دوار أحادي الإتجاه. المينا الزرقاء تأتي بعقارب فضية اللون مضيئة وكذلك علامات الساعات. الساعة مزودة بسوار محفور بشعار الماركة ويثبت على المعصم بكلبس ثنائي الطي. الساعة مقاومة للماء حتى عمق 300 متر.', 700, 7, '6klki86y4eko', 'post5b561cf5d2eea.webp', 19, 3, '2023-02-09 02:37:58', 1, 0),
(19, 2, 'Diesel DZ7214', 'لكستك: جلد طبيعي عالي الجودة \r\nالغلاف الخلفي : ستانلس ستيل\r\nنوع المكنة : كوارتز كرونوغراف (ياباني) \r\nكرونوغراف (عقارب صغيرة تعمل) متضمن:\r\nتوقيت محلي\r\nتاريخ أيام الأسبوع \r\nضد الماء', 500, 0, '9g9fncd18tw', 'post5b561ff5082e1.jpg', 19, 7, '2023-02-09 02:37:58', 1, 0),
(20, 2, 'luminor panerai PAM27', ' الكستك: جلد طبيعي ممتاز \r\nالغلاف الخارجي : نحاسي مطلي بالذهب لون ثابت \r\nالغلاف الخلفي : ستانلس ستيل\r\nكرونوغراف متضمن:\r\nعرض منفصل للثواني \r\nتاريخ ايام الشهر\r\nسوف تستلم الساعة مختومة و بداخلها بطارية', 1000, 0, 'wj3akt7tcog', 'post5b56207a1cbca.jpg', 19, 3, '2023-02-09 02:37:58', 1, 0),
(21, 2, 'تويوتا انوفا', '\r\n                        قد تم تصميم تويوتا إنوفا 2016 استناداً إلى المفهوم الخاص بالمركبات متعددة الاستخدامات، حيث جاءت بتصميم خارجي متين وأنيق، وتصميم داخلي محسّن وقوة محركة جديدة فعالة بما يضمن التمتع بقيادة ديناميكية متطورة، لترسي بذلك إنوفا الجديدة كلياً مكانتها المرموقة في فئة السيارات متعددة الأغراض. وإلى جانب التصميم الخارجي معاد التصميم، تضمنت إنوفا الجديدة هيكلاً محسّناً وأكثر قوة، ونتج عن ذلك قيادة سلسة وسرعة في الاستجابة فضلاً عن تجربة ركوب تتسم براحة فائقة المستوى. ومع هيكل السيارة الأكثر صلابة والتصميم المستوحى من السيارات الرياضية متعددة الاستخدامات، توفر إنوفا مساحة واسعة ورحلة في غاية الراحة بغض النظر عن حالة الطريق والظروف المناخية.\r\n                   ', 20001, 0, '2m6s9nx625us', 'post5b562426539ae.jpg', 21, 2, '2023-02-09 02:37:58', 1, 0),
(22, 2, 'تويوتا كاميري', ' \r\n                        تويوتا كامري 2016 يعتبرها كثير من الناس انها افضل سيارة سيدان متوسطة في العالم , حيث يتم الاعتماد على اسم سيارة كامري في قوة التحمل والفخامة بخلاف قيمتها كسيارة عريقة من شركة تويوتا .\r\nالا ان البعض لا يعتبر الكامري سيارة مثيرة أو حتى سيارة جميلة ومميزة الشكل , والبعض الاخر ينظر الى ان تويوتا تهتم بتفاصيل الجودة والقوة , مما يقلل الاهتمام بالشكل الخارجي للسيارة', 150000, 0, '2y2ex2hkots0', 'post5b5624bc5e62b.jpg', 21, 1, '2023-02-09 02:37:58', 1, 0),
(23, 2, 'Mercedes-AMG GLE كوبيه', '\r\n             مشاركة على\r\nكن في قلب الحدث مع أفضل سيارة في العالم في شكلها والمثير: الفخامة العصرية من مرسيدس-بنز. ظهور السيارة الرياضية المتعددة الأغراض SUV. إن أهم ما يميز أي سيارة كوبيه هو الديناميكية وخفة الحركة، وهما الصفتان اللتان تتميز بهما سيارات مرسيدس، وهو ما يجعلها تختلف اختلافاً كبيراً عن السيارات الأخرى. سيارة GLE كوبيه الملائمة لجميع الطرق\r\n                ', 1000000, 6, '57r1iz35wyg', 'post5b56251c0461c.jpg', 21, 2, '2023-02-09 02:37:58', 1, 0),
(24, 2, 'هوندا أكورد', '\r\n                     هي إحدى الطرازات التي تنتجها شركة هوندا من عام 1976،  سيارة الأكورد كانت أول سيارة يابانية تصنع في الولايات المتحدة في 1982  احتفظت هوندا أكورد 2015 بخيارات المحركات السابقة وهي محرك i-VTEC بحقن مباشر للوقود رباعي الاسطوانات سعة 2.4 لتر يولد قوة 185 حصان مع ناقل حركة جديد بتغيير متواصل (جير CVT) لتنطلق السيارة من صفر إلى 100 كم/س في 9.8 ثانية قبل الوصول إلى سرعة قصوى محددة إلكترونياً عند 208 كم/س، بالإضافة إلى محرك i-VTEC سعة 3.5 لتر يولد قوة 274 حصان مع ناقل حركة أوتوماتيكي من ست سرعات تجد مواصفاته بالتفصيل في الأسفل. وبفضل اتساعها من الداخل، توفر داخلية هوندا أكورد 2015 اتساعاً جيداً   2015 بمواد عالية الجودة كالجلد والخشب الطبيعي لتضفي على المركبة لمسة أنيقة، وتمنح الركاب راحة أكبر وخاصة عند السير لمسافات طويلة.ّ\r\n                    ', 8000000, 0, 'y50n5p999i8', 'post5b56256a1e3ce.jpg', 21, 3, '2023-02-09 02:37:58', 1, 0),
(25, 2, 'طقم رجالي', '\n      طقم رجالي  يوجد منه 3الوان:الاسود,الكحلي ,الرمادي ومتوفرمنه  مقاسات:L,XL,XXL,XXXL\n', 1000000, 0, '1dcn82s0vdog', 'post5b5626dc2bca1.jpg', 20, 2, '2023-02-09 02:37:58', 1, 0),
(26, 2, 'فستان دانتيل', '\n                       فستان دانتيل يوجد منه لونين فقط:الابيض,الموف ومتوفر منه مقاسات  M,L\n                ', 51000, 0, 'pvpeq751yqo', 'post5b56271b10b83.jpg', 20, 1, '2023-02-09 02:37:58', 1, 0),
(27, 2, 'بيجامة كوبل', '\r\n    بيجامة كوبل قطن مكفولة يوجد منها لون واحد فقط ومتوفرمنها  مقاسات:M,L,XL,XXL\r\n\r\n              ', 30, 0, '5ls54qbf320w', 'post5b5627a6b3d87.jpg', 20, 3, '2023-02-09 02:37:58', 1, 0),
(28, 2, 'بيجامة بناتي', ' بجامة بناتي قطن مكفولة يوجد منها 3 الوان :اسود,كحلي,رمادي اومتوفرمنها  مقاسات لعمر 10سنوات ومافوق:M,L   \r\n                    ', 22, 7, '39s1cax91wkk', 'post5b5627e468e6a.jpg', 20, 3, '2023-02-09 02:37:58', 1, 0),
(29, 2, 'جهازرياضة', ' \n                        جهاز رياضي عدة حركات /جري وبسكليت وقرص دوار وسحب بالضغط مع مؤقت زمني ومسافة\n                   ', 40, 0, 'nwoyv4xdkfk', 'post5b5629b015147.jpg', 23, 0, '2023-02-09 02:37:58', 1, 0),
(30, 2, 'ماكينة حلاقة', 'ماكينة حلاقة رجالية مشط بناسونيك الأصلية', 10, 0, '3n41rvr1cps0', 'post5b562a9174c60.jpg', 23, 2, '2023-02-09 02:37:58', 1, 0),
(31, 2, 'مكواية بخارية', 'مكواية ستائر بخارية', 700, 0, '78v9q9nbyfks', 'post5b562b0ae8630.jpg', 23, 0, '2023-02-09 02:37:58', 1, 0),
(32, 2, 'بيجو206', '\r\n                         \r\nقفل مركزيكشافات  مسجله بلور كهرباء مرايا كهرباء أنذار اساسي  ميكانيك ودوزان ممتاز  cd بالونين مكيف ديجتالAbc أوتاماتيك   5 تسجيل 7   خاليه العلام بيجو 206\r\n\r\n\r\n', 130000, 0, '35cvoju35z0g', 'post5b562b9d64c18.jpg', 22, 0, '2023-02-09 02:37:58', 1, 0),
(33, 2, 'شيري QQ311', '\r\n                       موديل 2008تسجيل2009 خالية جوا من برا بخ طبونات و سبلر4سلندر 1300cc رياضي أساسي فتحة سقف مرايا كهرباء مكيف حامي بارد \r\n                    ', 400000, 0, '5ynuk78w1fgg', 'post5b5634d5bf576.jpg', 22, 0, '2023-02-09 02:37:58', 1, 0),
(34, 2, 'هونداي أفانتي', ' \n    كاملة مسكرةاوتوماتيك .. فتحةخالية من الداخل ومن الخارج قطعتين نصف باب السائق والباب يلي خلفو\nماشية 141\n%مكنيك ودوزان و بواط 1000 ...ABS.... جنط ..كشاف.. دجتل... جلد... بيت نضارة... دولاب نضيف \n', 250000, 0, '7zn57mv11kc', 'post5b56352b06e04.jpg', 22, 2, '2023-02-09 02:37:58', 1, 0),
(35, 2, 'مكتب تجاري', ' مكتب تجاري طابق أول \nزاوية اطلالة مميزة موضحة بالصور كسوة سوبر ديلوكس \nمساحة 70 متر طابو اخضر ', 170000, 0, '4vi63feuftes', 'post5b56386c9c63c.jpg', 24, 1, '2023-02-09 02:37:58', 1, 0),
(36, 2, 'عقار منزل', '   منزل للبيع  في شرقي ركن الدين على اتستراد الفيحاء اطلالة جميلة جدا سوكة طابق ثالث...... مساحة ٩٠ متر غرفتين نوم وصالون كبير ومطبخ كسوة جيدة\r\nمدخل بناء عريض مع حديقة وموقف سيارات \r\nسطح بنفس البناية فوق المنزل مساحة ٩٠ متر مع غرفة غسيل طابو مع المنزل وليس ملكية مشترك  \r\n                    ', 400000000, 0, '1gk7zxjap1i8', 'post5b5639c22e8d4.jpg', 24, 2, '2023-02-09 02:37:58', 1, 0),
(37, 2, 'عقار منزل', '   منزل للبيع  في شرقي ركن الدين على اتستراد الفيحاء اطلالة جميلة جدا سوكة طابق ثالث...... مساحة ٩٠ متر غرفتين نوم وصالون كبير ومطبخ كسوة جيدة\r\nمدخل بناء عريض مع حديقة وموقف سيارات \r\nسطح بنفس البناية فوق المنزل مساحة ٩٠ متر مع غرفة غسيل طابو مع المنزل وليس ملكية مشترك  \r\n                    ', 5000000, 0, '2bq7jpgyp8pw', 'post5b563a2b4a80d.jpg', 24, 1, '2023-02-09 02:37:58', 1, 0),
(38, 2, 'فيلا سكنية', 'لبيع فيلا معرة صيدنايا\r\nمساحة 3 دونم معمر فيا بناء 4 طوابق مساحة 600 متر\r\nمسبح مفلتر مشالح بيت للناطور كسوة سوبر ديلوكس', 7000000, 0, '1m54m1qf0zhc', 'post5b563ac633955.jpg', 24, 3, '2023-02-09 02:37:58', 1, 0);

-- --------------------------------------------------------

--
-- بنية الجدول `reply`
--

CREATE TABLE `reply` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `postTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `reply`
--

INSERT INTO `reply` (`id`, `user_id`, `post_id`, `comment`, `postTime`) VALUES
(3, 2, 13, 'منتوج رائع', '2023-02-10 12:58:07'),
(4, 6, 23, 'سيارة رائعة', '2023-02-10 12:58:07'),
(5, 0, 37, 'kjkjkfgf\n', '2023-02-10 12:58:07');

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `farstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `isAdmin` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`id`, `farstname`, `lastname`, `email`, `password`, `isAdmin`) VALUES
(2, 'مستخدم2', '', 'jalal2@gmail.com', '90aa789b740cef042bc0a69009d0f48e', 1),
(3, 'مستخدم1', '', 'jalal1@gmail.com', '90aa789b740cef042bc0a69009d0f48e', 0),
(4, 'مستخدم3', '', 'jalal3@gmail.com', '90aa789b740cef042bc0a69009d0f48e', 0),
(5, 'مستخدم4', ' ', 'jalal4@gmail.com', '90aa789b740cef042bc0a69009d0f48e', 0),
(6, 'مستخدم5', 'مستخدم5', 'jalal5@gmail.com', 'a7c439978b273a8b250a8b0dde84018a', 0),
(1, 'خضور', 'جلال', 'jalalkhador.99@gmail.com', '9c69f958226d38310d833fbb65153ed3', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
