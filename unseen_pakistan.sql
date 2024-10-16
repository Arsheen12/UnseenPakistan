-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2024 at 12:00 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `unseen_pakistan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id`, `Name`, `Email`, `Password`) VALUES
(1, 'Administrator', 'admin@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `admin_posts`
--

CREATE TABLE `admin_posts` (
  `Id` int(11) NOT NULL,
  `province_id` int(11) NOT NULL,
  `Heading` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `Btn_Text` varchar(255) DEFAULT NULL,
  `Icon` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_posts`
--

INSERT INTO `admin_posts` (`Id`, `province_id`, `Heading`, `Description`, `Image`, `Btn_Text`, `Icon`, `created_at`, `updated_at`) VALUES
(6, 6, 'Pir Chinasi', 'Stunning hills, offers panoramic views of the lush valleys and rugged mountains, and is revered for its serene environment and spiritual significance.', 'image/Pir_Chinasi3.jpg', 'https://en.wikipedia.org/wiki/Pir_Chinasi', 'fas fa-landmark', '2024-09-17 11:12:16', '2024-09-24 12:31:43'),
(7, 6, 'Ratti Gali Lake', 'Lake surrounded by beautiful meadows and snow-capped hills, nestled at an elevation of around 12,130 feet (3,700 meters) above sea level. It is a haven for adventure seekers and nature enthusiasts.', 'image/rattigali.jpeg', 'https://en.wikipedia.org/wiki/Ratti_Gali_Lake', 'fa-solid fa-water', '2024-09-17 11:13:42', '2024-09-24 12:31:53'),
(8, 3, 'Hingol National Park', 'Dramatic landscapes, diverse ecosystems, and unique geological formations, including the iconic Princess of Hope and Hingol River, making it a natural wonder in the Balochistan province.', 'image/Balochistan.jpeg', 'https://en.wikipedia.org/wiki/Hingol_National_Park', 'fas fa-mountain', '2024-09-17 11:18:39', '2024-09-24 12:29:30'),
(9, 4, 'Mukshpuri Peak', 'A scenic mountain peak in the Nathia Gali range of Pakistan, offers breathtaking views, lush green meadows, and tranquil hiking trails.', 'image/Peak,kpk.jpg', 'https://en.wikipedia.org/wiki/Mukeshpuri', 'fa-solid fa-mountain', '2024-09-19 09:56:53', '2024-09-24 12:30:40'),
(10, 1, 'Sandspit Beach', 'Serene coastal destination known for its calm waters, unique sand formations, and as a popular spot for turtle nesting during the breeding season.', 'image/Sands_Pit_Beach,_Karachi.jpg', 'https://en.wikipedia.org/wiki/Sandspit_Beach', 'fa-solid fa-water', '2024-09-20 04:54:01', '2024-09-24 12:14:58'),
(11, 2, 'Gawalmandi Food Street', 'Bustling hub of traditional Pakistani cuisine, famous for its vibrant atmosphere and a wide variety of mouth-watering dishes that showcase the rich culinary heritage of Lahore.', 'image/Foodstreet1.jpg', 'https://en.wikipedia.org/wiki/Gawalmandi_Food_Street', 'fa-solid fa-utensils', '2024-09-20 04:55:21', '2024-09-24 12:23:23'),
(12, 1, 'Faiz Mahal  ', 'A stunning 19th-century palace that exemplifies the grandeur of royal architecture, with its elegant halls, intricate carvings, and beautifully landscaped gardens.', 'image/FaizMahal.jpg', 'https://en.wikipedia.org/wiki/Faiz_Mahal', 'fas fa-monument', '2024-09-20 05:00:40', '2024-09-24 12:15:25'),
(13, 1, 'Makli Necropolis', 'One of the largest necropolises in the world, featuring stunning tombs and monuments that reflect centuries of Sindhi architecture and history, making it a UNESCO World Heritage Site.', 'image/makli4.jpg', 'https://en.wikipedia.org/wiki/Makli_Necropolis', 'fas fa-landmark', '2024-09-20 05:08:01', '2024-09-24 12:22:28'),
(14, 2, 'Derawer Fort', 'A massive and imposing fortress with 40 towering bastions, standing as a testament to the region\'s rich history and architectural grandeur.', 'image/Derawar Fort3.jpg', 'https://en.wikipedia.org/wiki/Derawar_Fort', 'fas fa-landmark', '2024-09-20 05:09:11', '2024-09-24 12:24:15'),
(15, 2, 'Bhong Mosque ', 'Islamic architecture, renowned for its lavish design, detailed craftsmanship, and vibrant mosaics that reflect a blend of traditional and modern styles.', 'image/Mosque2.webp', 'https://en.wikipedia.org/wiki/Bhong_Mosque', 'fas fa-mosque', '2024-09-20 05:15:10', '2024-09-24 12:25:29'),
(16, 4, 'Umbrella Waterfall', 'A picturesque landscape of the Galyat region in Pakistan, is renowned for its cascading waters that create a stunning natural curtain, providing a refreshing and captivating sight for visitors.', 'image/Waterfall,kpk.webp', 'https://en.wikipedia.org/wiki/Umbrella_Waterfall', 'fa-solid fa-water', '2024-09-20 05:59:45', '2024-09-24 12:30:51'),
(17, 4, 'Kumrat Valley', 'A breathtakingly beautiful haven of lush green meadows, crystal-clear rivers, and serene mountain landscapes, offering a tranquil escape into nature.', 'image/kumratvalley3.jpg', 'https://en.wikipedia.org/wiki/Kumrat_Valley', 'fas fa-mountain', '2024-09-20 06:00:46', '2024-09-24 12:31:01'),
(18, 3, 'Pir Ghaib Waterfall', 'The waterfall is known for its scenic beauty and the striking contrast between the lush greenery surrounding the falls and the otherwise arid landscape of Balochistan.', 'image/Pir Ghaib Waterfalls.jpeg', 'https://en.wikipedia.org/wiki/Pir_Ghaib_Waterfall', 'fa-solid fa-water', '2024-09-20 12:01:16', '2024-09-24 12:29:11'),
(19, 3, 'Astola Island', 'Astola Island is a hidden gem of Pakistan\'s natural wonders, offering both ecological diversity and serene beauty, making it a must-visit for nature enthusiasts and adventurous travelers.', 'image/astolaisland4.jpg', 'https://en.wikipedia.org/wiki/Astola_Island', 'fa-solid fa-water', '2024-09-20 12:06:02', '2024-09-24 12:27:29'),
(20, 5, 'Deosai National Park', 'Deosai National Park is an awe-inspiring destination that combines natural beauty, ecological significance, and adventure, making it one of Pakistan\'s most iconic and cherished landscapes.', 'image/Deosai.jpeg', 'https://en.wikipedia.org/wiki/Deosai_National_Park', 'fa-solid fa-water', '2024-09-20 12:13:45', '2024-10-13 14:41:21'),
(21, 5, 'Baltoro Glacier', 'The Baltoro Glacier is a trekker\'s paradise and a marvel of nature, offering one of the most challenging and visually stunning experiences for adventurers and mountaineers alike.', 'image/Baltoroglacier2.jpeg', 'https://en.wikipedia.org/wiki/Baltoro_Glacier', 'fas fa-mountain', '2024-09-20 12:15:19', '2024-10-13 14:40:54'),
(22, 5, 'Fairy Meadows', 'Fairy Meadows is a magical destination that offers a combination of stunning landscapes, adventure, and serenity. ', 'image/Fairymedows2.jpg', 'https://en.wikipedia.org/wiki/Fairy_Meadows_National_Park', 'fa-solid fa-tree', '2024-09-20 12:18:02', '2024-10-13 14:40:21'),
(23, 6, 'Ganga Mountain', 'Ganga Choti offers a diverse range of experiences, ranging from hiking and camping to horseback riding adventures.', 'image/GangaChoti.jpeg', 'https://en.wikipedia.org/wiki/Ganga_Choti', 'fa-solid fa-mountain', '2024-09-20 12:24:52', '2024-09-24 12:32:03');

-- --------------------------------------------------------

--
-- Table structure for table `architecture_section`
--

CREATE TABLE `architecture_section` (
  `Id` int(11) NOT NULL,
  `Heading` varchar(150) DEFAULT NULL,
  `Text` varchar(255) DEFAULT NULL,
  `Btn_text` varchar(120) DEFAULT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `architecture_section`
--

INSERT INTO `architecture_section` (`Id`, `Heading`, `Text`, `Btn_text`, `Image`, `icon`) VALUES
(24, 'Makli Necropolis, Sindh', 'An ancient funerary architectural marvel in Makli, consisting largest monuments under Muslim, Hindu, Persian, Mughal, and Gujarati influences in the Lower Sindh style that became known as the Chaukhandi style.', 'https://en.wikipedia.org/wiki/Makli_Necropolis', 'image/makli2.jpg', 'fa-solid fa-landmark'),
(25, 'Khewra Salt Mines, punjab', 'The world\'s second largest salt mine is famous for its production of pink Khewra salt, often marketed as Himalayan salt, and is a major tourist attraction, drawing up to 250,000 visitors a year.', 'https://en.wikipedia.org/wiki/Khewra_Salt_Mine', 'image/khewra.jpeg', 'fa-solid fa-archway'),
(26, 'Ratti Gali Lake, Kashmir', 'An alpine glacial lake fed by the glacial melt from the surrounding peaks, ensuring its crystal-clear blue waters remain cold throughout the year characterized by dense forests building a dramatic landscape.', 'https://en.wikipedia.org/wiki/Ratti_Gali_Lake', 'image/rattigali.jpeg', 'fa-solid fa-water'),
(27, 'Baltoro Glacier, Gilgit', 'Baltoro Glacier is not only a natural wonder but also a symbol of the rugged beauty of the Karakoram Range. It remains a key destination for trekkers, mountaineers, and adventurers from around the globe.', 'https://en.wikipedia.org/wiki/Baltoro_Glacier', 'image/Baltoroglacier3.jpeg', 'fa-solid fa-mountain'),
(28, 'Kumrat Valley, KPK', 'A hidden gem in KPK renowned for its breathtaking natural beauty. Surrounded by lush green forests,towering snow-capped peaks and crystal-clear rivers,offers a tranquil escape for nature lovers and adventurers alike.', 'https://en.wikipedia.org/wiki/Kumrat_Valley', 'image/kumratvalley2.jpg', 'fas fa-tree'),
(30, 'Astola Island, Balochistan', 'A magnificent island also called as Jezira Haft Talar or Dajjal Island, consists of a large tilted plateau and a series of seven small hillocks with deep chasms and crevices, which are several feet wide', 'https://en.wikipedia.org/wiki/Astola_Island', 'image/astolaisland3.jpg', 'fa-solid fa-umbrella-beach');

-- --------------------------------------------------------

--
-- Table structure for table `culture`
--

CREATE TABLE `culture` (
  `id` int(11) NOT NULL,
  `Heading` varchar(255) NOT NULL,
  `Icon` text NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `culture`
--

INSERT INTO `culture` (`id`, `Heading`, `Icon`, `Description`) VALUES
(2, 'Art & Crafts.', 'fa-solid fa-palette', 'From intricate truck art to delicate Kashmiri shawls, Pakistan\'s artistic heritage is rich and diverse.'),
(3, 'Music & Dance', 'fas fa-music', 'Vibrant folk music and mesmerizing Sufi performances showcase Pakistan\'s rhythmic soul.'),
(4, 'Cuisine', 'fas fa-utensils', 'Spicy curries, aromatic biryanis, and sweet desserts reflect the country\'s culinary diversity.'),
(5, 'Traditional Attire', 'fas fa-tshirt', 'Colorful shalwar kameez and intricately embroidered dresses represent regional identities.');

-- --------------------------------------------------------

--
-- Table structure for table `diverseculture`
--

CREATE TABLE `diverseculture` (
  `Id` int(11) NOT NULL,
  `culturetext` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `diverseculture`
--

INSERT INTO `diverseculture` (`Id`, `culturetext`, `Image`) VALUES
(12, '\"Pakistan\'s diverse cultures are a testament to the beauty of human unity in diversity. It is a nation that celebrates its rich heritage.\" - Nelson Mandela', 'image/culture-collage.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_section`
--

CREATE TABLE `gallery_section` (
  `Id` int(11) NOT NULL,
  `Image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery_section`
--

INSERT INTO `gallery_section` (`Id`, `Image`) VALUES
(23, 'image/Derawar Fort3.jpg'),
(25, 'image/khewra.jpeg'),
(32, 'image/GangaChoti.jpeg'),
(33, 'image/balochistan2.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `header_section`
--

CREATE TABLE `header_section` (
  `Id` int(11) NOT NULL,
  `Heading` text DEFAULT NULL,
  `Text` text DEFAULT NULL,
  `Btn_text` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `header_section`
--

INSERT INTO `header_section` (`Id`, `Heading`, `Text`, `Btn_text`) VALUES
(13, 'Uncovering Pakistan\'s Wonders:', 'Adventure, Serenity, and Heritage - All in One Place', 'Learn More');

-- --------------------------------------------------------

--
-- Table structure for table `heritage_section`
--

CREATE TABLE `heritage_section` (
  `Id` int(11) NOT NULL,
  `Heading` varchar(150) DEFAULT NULL,
  `Number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `heritage_section`
--

INSERT INTO `heritage_section` (`Id`, `Heading`, `Number`) VALUES
(2, 'UNESCO World Heritage Sites', 6),
(4, 'Major Historical Monuments', 26),
(5, 'Protected Heritage Sites', 100);

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `Id` int(11) NOT NULL,
  `Province` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`Id`, `Province`) VALUES
(1, 'Sindh'),
(2, 'Punjab'),
(3, 'Balochistan'),
(4, 'KPK'),
(5, 'Gilgit'),
(6, 'Kashmir');

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `capital` varchar(100) DEFAULT NULL,
  `landmark` varchar(100) DEFAULT NULL,
  `dress` varchar(100) DEFAULT NULL,
  `festival` varchar(100) DEFAULT NULL,
  `fact` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `name`, `description`, `capital`, `landmark`, `dress`, `festival`, `fact`, `image`) VALUES
(18, 'Sindh', '\"A Land of Ancient Civilizations and Vibrant Culture.\"', 'Karachi', 'Mohenjo-Daro', 'Men wear shalwar kameez and ajrak (traditional block-printed shawl), while women wear colorful sari ', 'Sindh Cultural Day', 'Sindh is home to the Indus River, one of the longest rivers in the world, which has supported agriculture for thousands of years.', 'image/sindh-culture.jpg'),
(19, 'Punjab', '\" The Land of Five Rivers, Where Culture Meets Nature.\"', 'Lahore', 'Badshahi Mosque', ' Men wear kurta with shalwar and a pagri, while women wear colorful salwar kameez with intricate emb', 'Baisakhi', 'Punjab is known as the \"Granary of Pakistan,\" producing about 80% of the country\'s wheat.', 'image/punjab-culture.jpg'),
(20, 'Balochistan', '\"A Realm of Rugged Mountains and Rich Traditions.\"', 'Quetta', 'Ziarat Residency', 'Men typically wear shalwar kameez with a chadar, while women wear colorful dresses adorned with embr', 'Sibi Mela', 'Balochistan is the largest province in Pakistan by area, rich in natural resources and mineral wealth.', 'image/balochistan-culture.jpg'),
(21, 'Khyber Pakhtunkhwa', '\"A Tapestry of Cultures and History.\"', 'Peshawar', 'Bala Hisar Fort', 'Men wear shalwar kameez with a pakol (traditional hat), while women often wear vibrant dupatta and k', 'Pakhtun Cultural Day', 'KPK is known for its rich cultural diversity and is home to several ancient archaeological sites.', 'image/kpk-culture.jpg'),
(22, 'Gilgit Baltistan', '\"The Majestic Land of Peaks and Valleys.\"', 'Gilgit', 'Hunza Valley', 'Men wear sharwal and chadar, while women wear colorful traditional dresses often adorned with local ', 'Shandur Polo Festival', 'Gilgit-Baltistan is home to some of the world\'s highest peaks, including K2, the second-highest mountain.', 'image/Gilgit.jpg'),
(23, 'Kashmir', '\"The Paradise on Earth, Blessed with Natural Beauty.\"', 'Muzaffarabad', 'Red Fort', 'Men wear kameez with shalwar and topi, while women wear traditional shawar kameez often adorned with', 'Kashmir Day', 'Kashmir is known for its stunning natural beauty, including lush green valleys and snow-capped mountains.', 'image/kashmir.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_feedback`
--

CREATE TABLE `user_feedback` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Contact_Number` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Feedback` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_feedback`
--

INSERT INTO `user_feedback` (`Id`, `Name`, `Contact_Number`, `Email`, `Feedback`) VALUES
(12, 'Arsheen khan', '+92333899900', 'arsheen.khan2009@gmail.com', 'hi'),
(13, 'Immama', '+923453577881', 'imamaali9528@gmail.com', 'hi'),
(19, 'muteeba', '+92 3013512908', 'muteebabaloch08@gmail.com', 'Your website is awesome');

-- --------------------------------------------------------

--
-- Table structure for table `user_posts`
--

CREATE TABLE `user_posts` (
  `Post_Id` int(11) NOT NULL,
  `User_Id` int(11) DEFAULT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `Description` longtext DEFAULT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `Province_Id` int(11) DEFAULT NULL,
  `Post_Status` enum('Pending','Approved') DEFAULT 'Pending',
  `Posted_Date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_posts`
--

INSERT INTO `user_posts` (`Post_Id`, `User_Id`, `Title`, `Description`, `Image`, `Province_Id`, `Post_Status`, `Posted_Date`) VALUES
(51, 1, 'Astola Island', 'is a famous place', '../image/2023-11-30.jpg', 4, 'Approved', '2024-10-01 09:51:26'),
(52, 1, 'derawar fort', 'is a famous place', '../image/astolaisland4.jpg', 3, 'Approved', '2024-10-01 09:55:18'),
(53, 1, 'hi', 'Also known as island of seven hills', '../image/about1.jpg', 3, 'Approved', '2024-10-01 09:55:37'),
(54, 6, 'burj khalifa', 'is a famous place', '../image/about2.jpg', 3, 'Approved', '2024-10-01 10:23:21'),
(55, 6, 'ball', 'hello', '../image/Baltoroglacier.jpeg', 2, 'Approved', '2024-10-01 10:23:43'),
(56, 6, 'hill', 'are high', '../image/Baltoroglacier2.jpeg', 1, 'Approved', '2024-10-11 10:24:03'),
(57, 7, 'My hills', 'Also known as island of seven hills', '../image/about1.jpg', 1, 'Approved', '2024-10-11 16:56:39'),
(90, 6, 'hello', 'is a famous place', '../image/about1.jpg', 2, 'Approved', '2024-10-01 06:38:00'),
(93, 6, 'hi', 'is a famous place', '../image/astolaisland3.jpg', 2, 'Approved', '2024-10-01 09:30:29'),
(102, 6, 'my post', 'Also known as island of seven hills', '../image/about1.jpg', 4, 'Approved', '2024-10-01 10:11:28'),
(103, 6, 'place', 'is good', '../image/Balochistan.jpeg', 4, 'Approved', '2024-10-01 10:11:51'),
(104, 6, 'Gilgit', 'Also known as island of seven hills', '../image/Balochistan.jpeg', 5, 'Approved', '2024-10-05 10:13:36'),
(105, 6, 'The Fort', 'is a famous place', '../image/FaizMahal.jpg', 5, 'Approved', '2024-10-05 10:14:07'),
(106, 6, 'The Garden', 'is a famous place', '../image/kashmirlake.jpg', 5, 'Approved', '2024-10-05 10:14:29'),
(107, 6, 'The Palace', 'is a famous place', '../image/astolaisland.jpg', 6, 'Approved', '2024-10-05 10:14:53'),
(108, 6, 'garden', 'Also known as island of seven hills', '../image/Baltoroglacier.jpeg', 6, 'Approved', '2024-10-05 10:15:10'),
(109, 6, 'The Fort', 'Also known as island of seven hills', '../image/Balochistan.jpeg', 6, 'Approved', '2024-10-05 10:15:26');

-- --------------------------------------------------------

--
-- Table structure for table `user_reg`
--

CREATE TABLE `user_reg` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_reg`
--

INSERT INTO `user_reg` (`Id`, `Name`, `Email`, `Password`) VALUES
(1, 'Test User', 'user@gmail.com', '123'),
(6, 'Zoubia Khan', 'zoubia@gmail.com', 'b249802dff1007e85d6ca39ad08e77a7'),
(7, 'Zaroon Junaid', 'zaroon@gmail.com', '1fda5faaa1ea9ee130484a77bd563277'),
(8, 'muteeba', 'muteeba@gmail.com', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `architecture_section`
--
ALTER TABLE `architecture_section`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `gallery_section`
--
ALTER TABLE `gallery_section`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `header_section`
--
ALTER TABLE `header_section`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `heritage_section`
--
ALTER TABLE `heritage_section`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_feedback`
--
ALTER TABLE `user_feedback`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `user_posts`
--
ALTER TABLE `user_posts`
  ADD PRIMARY KEY (`Post_Id`),
  ADD KEY `User_Id` (`User_Id`),
  ADD KEY `Province_Id` (`Province_Id`);

--
-- Indexes for table `user_reg`
--
ALTER TABLE `user_reg`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `architecture_section`
--
ALTER TABLE `architecture_section`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `gallery_section`
--
ALTER TABLE `gallery_section`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `header_section`
--
ALTER TABLE `header_section`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `heritage_section`
--
ALTER TABLE `heritage_section`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user_feedback`
--
ALTER TABLE `user_feedback`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_posts`
--
ALTER TABLE `user_posts`
  MODIFY `Post_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `user_reg`
--
ALTER TABLE `user_reg`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_posts`
--
ALTER TABLE `user_posts`
  ADD CONSTRAINT `user_posts_ibfk_1` FOREIGN KEY (`User_Id`) REFERENCES `user_reg` (`Id`),
  ADD CONSTRAINT `user_posts_ibfk_2` FOREIGN KEY (`Province_Id`) REFERENCES `provinces` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
