-- phpMyAdmin SQL Dump
-- version 5.2.0
-- httpswww.phpmyadmin.net
--
-- Host 127.0.0.1
-- Generation Time Jan 15, 2023 at 0714 PM
-- Server version 10.4.24-MariaDB
-- PHP Version 8.1.6

SET SQL_MODE = NO_AUTO_VALUE_ON_ZERO;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION*/ ;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database `bartermate`
--

-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

CREATE TABLE `inbox` (
  `I_ID` int(11) NOT NULL,
  `I_OF` int(11) NOT NULL,
  `I_U_ID` int(11) NOT NULL,
  `I_CREATE_TIME` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inbox`
--

INSERT INTO `inbox` (`I_ID`, `I_OF`, `I_U_ID`, `I_CREATE_TIME`) VALUES
(3, 5, 6, '2021-08-17 180431.675844'),
(4, 5, 7, '2021-08-17 180916.944967'),
(5, 6, 7, '2021-08-18 200531.510502'),
(6, 5, 5, '2021-08-28 082302.340419');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `M_ID` int(11) NOT NULL,
  `M_CONTENT` text NOT NULL,
  `M_FROM` int(11) NOT NULL,
  `M_TO` int(11) NOT NULL,
  `M_TIME` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`M_ID`, `M_CONTENT`, `M_FROM`, `M_TO`, `M_TIME`) VALUES
(129, 'assas', 5, 6, '2021-08-11 065702'),
(130, 'oke', 5, 6, '2021-08-11 065709'),
(131, 'lol', 5, 6, '2021-08-11 065712'),
(139, 'hi', 5, 6, '2021-08-12 081837'),
(140, 'hello', 6, 5, '2021-08-15 074259'),
(141, 'how is u boii', 6, 5, '2021-08-15 074305'),
(142, 'hello', 6, 7, '2021-08-15 074313'),
(143, 'i am underwaater', 6, 7, '2021-08-15 074319'),
(144, 'pls help', 6, 7, '2021-08-15 074322'),
(145, 'nice hwisu', 5, 6, '2021-08-17 125501'),
(146, 'ok', 6, 7, '2021-08-19 100323'),
(147, 'SHUT UPP...', 7, 6, '2021-08-19 023047'),
(148, 'hello', 7, 5, '2021-08-23 035217'),
(149, 'hi', 5, 7, '2021-08-23 035225'),
(150, 'by', 7, 5, '2021-08-23 035232'),
(151, 'ki haal hai paaji', 5, 7, '2021-08-23 043911'),
(152, 'lol', 7, 5, '2021-08-23 043918'),
(153, 'hi', 5, 7, '2021-08-23 044119'),
(154, 'hi', 7, 5, '2021-08-23 044139'),
(155, 'fine', 6, 5, '2021-08-24 104550'),
(156, 'hi', 5, 6, '2021-08-25 042828'),
(157, 'hellow', 6, 5, '2021-08-25 043038'),
(158, 'bye bye', 6, 5, '2021-08-25 043046'),
(159, 'han bhai', 6, 5, '2021-08-25 043225'),
(160, 'tabs kese banayei vey', 6, 5, '2021-08-25 043229'),
(161, 'bata muhjhey', 6, 5, '2021-08-25 043235'),
(162, 'yt tutorial', 5, 6, '2021-08-25 043242'),
(163, 'very good idea', 6, 5, '2021-08-25 043247'),
(164, 'tujjey pata hai', 6, 5, '2021-08-25 043252'),
(165, 'nice )', 5, 6, '2021-08-25 043255'),
(166, '5th ki deadline mili hai', 6, 5, '2021-08-25 043256'),
(167, 'internal', 6, 5, '2021-08-25 043258'),
(168, 'han tu toh karlega kaa', 5, 6, '2021-08-25 043309'),
(169, 'kaam', 5, 6, '2021-08-25 043314'),
(170, 'han han mera tou ho jaye ga', 6, 5, '2021-08-25 043322'),
(171, 'poop', 5, 6, '2021-08-25 043328'),
(172, 'baaki website wali end ka kaam complete hai', 6, 5, '2021-08-25 043329'),
(173, 'nope', 5, 6, '2021-08-25 043341'),
(174, '50% complete', 5, 6, '2021-08-25 043345'),
(175, '~~', 6, 5, '2021-08-25 043349'),
(176, 'shit yaar', 6, 5, '2021-08-25 043353'),
(177, 'kab tak khatam hoga', 6, 5, '2021-08-25 043358'),
(178, 'lol lag gaye', 5, 6, '2021-08-25 043400'),
(179, 'shit', 6, 5, '2021-08-25 043416'),
(180, 'chup kr k bto', 6, 5, '2021-08-25 043911'),
(181, 'ok', 5, 6, '2021-08-25 043931'),
(182, 'svdv', 6, 5, '2021-08-25 044029'),
(183, 'hey', 5, 6, '2021-08-30 083932'),
(184, 'hi', 5, 6, '2021-08-30 084133'),
(187, 'hey', 5, 6, '2021-08-30 090439'),
(190, 'kya he', 5, 7, '2021-09-01 043601'),
(191, 'lul', 5, 6, '2021-09-01 044847'),
(192, 'lol', 5, 6, '2021-09-01 044921'),
(193, 'hey', 5, 6, '2021-09-01 050916'),
(194, 'hey', 6, 5, '2021-09-08 093843'),
(195, 'ok ', 6, 5, '2021-09-22 023533');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `P_ID` int(11) NOT NULL,
  `P_NAME` text NOT NULL,
  `P_DESC` text NOT NULL,
  `P_CATEGORY` int(11) NOT NULL,
  `P_EXC_TYPE` int(11) NOT NULL,
  `P_MONETARY_VAL` int(11) DEFAULT NULL,
  `P_VIEWS` int(11) NOT NULL DEFAULT 0,
  `P_CREATE_DATE` text NOT NULL DEFAULT current_timestamp(),
  `P_BY_U_ID` int(11) NOT NULL,
  `P_FEATURED` int(11) NOT NULL DEFAULT 0,
  `P_STATUS` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`P_ID`, `P_NAME`, `P_DESC`, `P_CATEGORY`, `P_EXC_TYPE`, `P_MONETARY_VAL`, `P_VIEWS`, `P_CREATE_DATE`, `P_BY_U_ID`, `P_FEATURED`, `P_STATUS`) VALUES
(32, 'Premium Quality Wallpapers', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Minima molestiae, assumenda vitae consequatur sequi velit hic dolor provident ipsum Soluta maxime incidunt non corporis dolores possimus et mollitia nam. Animi!rnEveniet molestias veniam, velit voluptatum at placeat, sed deserunt, laboriosam enim voluptate inventore. Aut quia facere dicta eius quos voluptates, impedit. Consectetur quas voluptatibus quo, laboriosam nobis quod, porro repudiandae.rnOfficia iste, tempora quod dolorem. Praesentium, labore non architecto voluptate, laudantium totam. Nulla iste facilis magni expedita, asperiores, architecto sunt nisi, dolorem ipsum magnam sint corporis tenetur, dicta temporibus eaque.rnEum atque, quis est, distinctio, ipsa commodi porro, libero doloribus dicta ad ratione dolores mollitia fugit sunt tenetur! Incidunt alias laudantium quibusdam magnam nulla sunt omnis, dolorem consequuntur accusantium recusandae.rnBlanditiis porro, laboriosam eum nam, repellat veritatis soluta quisquam, quidem quas assumenda quod aut qui a. Numquam, veniam, exercitationem! Porro aut vitae fuga veniam vel. Odio, odit optio repudiandae voluptatum!', 3, 0, 999, 31, ' 2020-11-03 ', 5, 1, 1),
(33, 'Stock Images', 'Lorem ipsum dolor sit amet consectetur adipisicing, elit. Impedit quidem commodi voluptates ut architecto eaque nostrum autem error, ab. Perferendis adipisci libero quas, hic molestiae accusantium laudantium ratione ipsum porro.rnVeniam nostrum sed magnam ullam vel eligendi suscipit magni! Incidunt rerum cumque, esse, accusantium quibusdam repellendus. Asperiores et dicta ullam, doloremque dolorum, tempora quod nulla laudantium repudiandae numquam provident teneturrnVoluptatem, maiores Enim, ullam, molestiae Quasi quaerat debitis possimus. Nesciunt natus nisi aperiam iusto nulla ut dolorem, culpa, corporis unde voluptatum, magni quod beatae quibusdam quae cum hic voluptates atque.rnRem placeat dolorem voluptatibus tenetur cum suscipit sed dolores animi quis alias nisi, maxime illum eaque consectetur, vel aliquam quam accusantium vero aliquid, voluptas ex Architecto, a ratione ipsam accusantium.', 3, 0, 500, 58, '2021-06-30', 6, 0, 1),
(34, 'Candles', 'Homemade MagicLune Candles. Made from 100% Natural Material that are Eco-Friendly & Animal Cruelty Free.', 3, 0, 399, 8, '2021-07-03', 5, 0, 1),
(36, 'Tom & Jerry Memes', 'Meme Templates For Tom & Jerry. ', 7, 1, 0, 11, '2021-07-03', 5, 0, 1),
(37, 'Flat-Icon Stock Images', 'Cheap Stock Images Available with Full Quality and Vector Quality SVG Images. discount if you buy multiple.', 8, 1, 0, 94, '2021-07-09', 6, 0, 1),
(38, 'Letter Head', 'Real Letter From Queen Elizabeth. 100% Jenuine Material Certified by Whatsapp University.', 7, 1, 0, 6, '2021-07-21', 5, 0, 1),
(39, 'Tech Products Sale', 'Sale On Tech Products, Get Anything Under 10$ Yes You Saw that correct 10$!! Buy Now and get advantage of this amazing offer.', 1, 1, 0, 43, '2021-08-17', 7, 0, 1),
(40, 'Admin Panel', 'Custom Admin Panel, Can make Custom or on Wordpress.', 1, 1, 0, 16, '2021-08-23', 5, 0, 1),
(89, 'Banner Design', 'Designing Banners & Thumbnails For a Low Price! Offering Pixel Perfect, Clean and Crisp Designs with Full Money Back Guarantee. Contact Us For Custom Designs', 8, 0, 1499, 9, '2021-08-28', 7, 0, 1),
(92, 'Book Cover Design', 'Designing Good Quality Book Covers. Contact For More Details', 8, 0, 250, 10, '2021-08-28', 7, 0, 1),
(93, 'Custom Photography', 'Name the Place, We Take the Picture. So eZ.', 8, 0, 499, 3, '2021-08-28', 6, 0, 1),
(94, 'Banner Creation  Canva®', 'Good Quality Banner Creation Using Canva®.', 8, 0, 49, 7, '2021-08-28', 6, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `PC_ID` int(11) NOT NULL,
  `PC_NAME` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`PC_ID`, `PC_NAME`) VALUES
(1, 'Electronics'),
(2, 'Vehicles'),
(3, 'Decorations'),
(4, 'Kitchen Appliances'),
(5, 'Furniture'),
(6, 'Books'),
(7, 'Accessories'),
(8, 'Digital Service');

-- --------------------------------------------------------

--
-- Table structure for table `product_exchange_prefs`
--

CREATE TABLE `product_exchange_prefs` (
  `PE_ID` int(11) NOT NULL,
  `PE_P_ID` int(11) NOT NULL,
  `PE_PC_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_exchange_prefs`
--

INSERT INTO `product_exchange_prefs` (`PE_ID`, `PE_P_ID`, `PE_PC_ID`) VALUES
(47, 36, 1),
(48, 36, 7),
(49, 37, 2),
(50, 37, 7),
(51, 38, 5),
(52, 38, 7),
(53, 39, 5),
(54, 39, 7),
(55, 40, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_exchange_status`
--

CREATE TABLE `product_exchange_status` (
  `PES_ID` int(11) NOT NULL,
  `PES_NAME` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_exchange_status`
--

INSERT INTO `product_exchange_status` (`PES_ID`, `PES_NAME`) VALUES
(1, 'In Progress'),
(2, 'Canceled'),
(3, 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `PI_ID` int(11) NOT NULL,
  `PI_P_ID` int(11) NOT NULL,
  `PI_IMG_URL` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`PI_ID`, `PI_P_ID`, `PI_IMG_URL`) VALUES
(2, 32, 'assetsproduct_images60d9c8bc1f4541.10566528.webp'),
(3, 32, 'assetsproduct_images60d9c8bc3fd7b9.84881232.webp'),
(4, 32, 'assetsproduct_images60d9c8bc56bfa0.73761430.webp'),
(5, 33, 'assetsproduct_images60dc44293310d5.69336412.webp'),
(6, 33, 'assetsproduct_images60dc44296dd722.25193693.webp'),
(7, 33, 'assetsproduct_images60dc44298419f6.65721317.webp'),
(8, 33, 'assetsproduct_images60dc4429b96243.67035976.webp'),
(9, 33, 'assetsproduct_images60dc4429c78871.35446726.webp'),
(10, 33, 'assetsproduct_images60dc4429d98398.52631280.webp'),
(11, 34, 'assetsproduct_images60e04777347939.35504217.webp'),
(12, 34, 'assetsproduct_images60e04777616d55.74649105.webp'),
(13, 34, 'assetsproduct_images60e04777726536.82078100.webp'),
(15, 36, 'assetsproduct_images60e04fa477c250.07221414.webp'),
(16, 36, 'assetsproduct_images60e04fa49a1655.16732006.webp'),
(17, 36, 'assetsproduct_images60e04fa4b9b443.26340974.webp'),
(18, 37, 'assetsproduct_images60e8047497a6d7.29369477.webp'),
(19, 37, 'assetsproduct_images60e80474d03139.85589889.webp'),
(20, 37, 'assetsproduct_images60e80474ed1c27.41744604.webp'),
(21, 38, 'assetsproduct_images60f83dc77b0629.96685190.webp'),
(22, 39, 'assetsproduct_images611bfb33a5a090.06984870.webp'),
(23, 39, 'assetsproduct_images611bfb33caa647.29422711.webp'),
(24, 40, 'assetsproduct_images6123d3d936a053.53945739.webp'),
(173, 89, 'assetsproduct_images612a01fc6ea434.09707915.webp'),
(174, 89, 'assetsproduct_images612a01fc858506.36968054.webp'),
(175, 89, 'assetsproduct_images612a01fc9656d7.06497654.webp'),
(182, 92, 'assetsproduct_images612a04ae6e84b5.82856388.webp'),
(183, 92, 'assetsproduct_images612a04ae9e6928.45700365.webp'),
(184, 92, 'assetsproduct_images612a04aeb4c041.12787768.webp'),
(185, 93, 'assetsproduct_images612a070fbffc11.98078102.webp'),
(186, 93, 'assetsproduct_images612a070fd15fb5.11189356.webp'),
(187, 93, 'assetsproduct_images612a070fe506e8.76149671.webp'),
(188, 94, 'assetsproduct_images612a08faef96b5.75469749.webp'),
(189, 94, 'assetsproduct_images612a08fb3e2418.37875314.webp');

-- --------------------------------------------------------

--
-- Table structure for table `product_status`
--

CREATE TABLE `product_status` (
  `PS_ID` int(11) NOT NULL,
  `PS_NAME` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_status`
--

INSERT INTO `product_status` (`PS_ID`, `PS_NAME`) VALUES
(1, 'Active'),
(2, 'Inactive'),
(3, 'Exchanged');

-- --------------------------------------------------------

--
-- Table structure for table `product_swaps`
--

CREATE TABLE `product_swaps` (
  `PS_ID` int(11) NOT NULL,
  `PS_P_FOR` int(11) NOT NULL,
  `PS_BY` int(11) NOT NULL,
  `PS_STATUS` int(11) NOT NULL DEFAULT 1,
  `PS_DATE` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_swaps`
--

INSERT INTO `product_swaps` (`PS_ID`, `PS_P_FOR`, `PS_BY`, `PS_STATUS`, `PS_DATE`) VALUES
(2, 37, 7, 1, '2021-09-14'),
(4, 39, 6, 1, '2021-09-16'),
(5, 37, 5, 1, '2021-09-19'),
(6, 40, 6, 1, '2021-09-20');

-- --------------------------------------------------------

--
-- Table structure for table `product_swap_offers`
--

CREATE TABLE `product_swap_offers` (
  `SO_ID` int(11) NOT NULL,
  `SO_PS_ID` int(11) NOT NULL,
  `SO_P_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_swap_offers`
--

INSERT INTO `product_swap_offers` (`SO_ID`, `SO_PS_ID`, `SO_P_ID`) VALUES
(4, 2, 92),
(5, 2, 89),
(6, 2, 39),
(10, 4, 33),
(11, 4, 37),
(12, 4, 93),
(13, 5, 32),
(14, 5, 40),
(15, 5, 34),
(16, 6, 93),
(17, 6, 94),
(18, 6, 33);

-- --------------------------------------------------------

--
-- Table structure for table `product_swap_status`
--

CREATE TABLE `product_swap_status` (
  `SS_ID` int(11) NOT NULL,
  `SS_NAME` text NOT NULL,
  `SS_COLOR` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_swap_status`
--

INSERT INTO `product_swap_status` (`SS_ID`, `SS_NAME`, `SS_COLOR`) VALUES
(1, 'Offer Sent', 'primary'),
(2, 'Offer Accepted', 'success'),
(3, 'Offer Expired', 'secondary');

-- --------------------------------------------------------

--
-- Table structure for table `saved_products`
--

CREATE TABLE `saved_products` (
  `S_ID` int(11) NOT NULL,
  `S_P_ID` int(11) NOT NULL,
  `S_BY_U_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `saved_products`
--

INSERT INTO `saved_products` (`S_ID`, `S_P_ID`, `S_BY_U_ID`) VALUES
(57, 36, 7),
(60, 32, 7),
(158, 94, 6),
(159, 32, 5),
(161, 37, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `U_ID` int(11) NOT NULL,
  `U_NAME` text NOT NULL,
  `U_EMAIL` text NOT NULL,
  `U_PASS` text NOT NULL,
  `U_PHONE` text NOT NULL,
  `U_IMG_URL` text NOT NULL DEFAULT 'assetsimguser_default.svg',
  `U_VER` int(11) NOT NULL DEFAULT 0,
  `U_VER_EMAIL` int(11) NOT NULL DEFAULT 0,
  `U_VER_CODE` text NOT NULL DEFAULT '-',
  `U_V_COINS` int(11) NOT NULL DEFAULT 0,
  `U_A_CREATE_DATE` datetime NOT NULL DEFAULT current_timestamp(),
  `U_LAST_ACTIVITY` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`U_ID`, `U_NAME`, `U_EMAIL`, `U_PASS`, `U_PHONE`, `U_IMG_URL`, `U_VER`, `U_VER_EMAIL`, `U_VER_CODE`, `U_V_COINS`, `U_A_CREATE_DATE`, `U_LAST_ACTIVITY`) VALUES
(5, 'Ronit Rai', 'ronitrai.rk@gmail.com', 'abc123', '3164038778', 'assetsdp_uploads5f880b3f7b28e6.58356572.jpeg', 1, 1, 'c7e708490ab49fa18115238cd5938e4d', 0, '2021-08-01 214431', ''),
(6, 'Adarsh Nandlel', 'adarshkessani@gmail.com', 'abc123', '111244622', 'assetsimguser_default.svg', 1, 1, '51f80d3e903007be3be3e0031197eb26', 0, '2021-08-01 214431', ''),
(7, 'Admin User', 'admin@a.com', 'abc123', '3160001457', 'assetsimguser_default.svg', 1, 1, 'adnaugd712hd1i2y8712e2i1d', 0, '2021-08-11 222310', ''),
(18, 'Somesh', 'somesh@gmail.com', 'abc123', '3032995458', '', 0, 0, '5064b6a48442d83e8241d5a82d3bb8ad', 0, '2021-09-12 215017', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`I_ID`),
  ADD KEY `I_OF` (`I_OF`),
  ADD KEY `I_U_ID` (`I_U_ID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`M_ID`),
  ADD KEY `M_FROM` (`M_FROM`),
  ADD KEY `M_TO` (`M_TO`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`P_ID`),
  ADD KEY `P_CATEGORY` (`P_CATEGORY`),
  ADD KEY `P_BY_U_ID` (`P_BY_U_ID`),
  ADD KEY `P_STATUS` (`P_STATUS`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`PC_ID`);

--
-- Indexes for table `product_exchange_prefs`
--
ALTER TABLE `product_exchange_prefs`
  ADD PRIMARY KEY (`PE_ID`),
  ADD KEY `PE_P_ID` (`PE_P_ID`),
  ADD KEY `PE_PC_ID` (`PE_PC_ID`);

--
-- Indexes for table `product_exchange_status`
--
ALTER TABLE `product_exchange_status`
  ADD PRIMARY KEY (`PES_ID`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`PI_ID`),
  ADD KEY `PI_P_ID` (`PI_P_ID`);

--
-- Indexes for table `product_status`
--
ALTER TABLE `product_status`
  ADD PRIMARY KEY (`PS_ID`);

--
-- Indexes for table `product_swaps`
--
ALTER TABLE `product_swaps`
  ADD PRIMARY KEY (`PS_ID`),
  ADD KEY `PS_P_FOR` (`PS_P_FOR`),
  ADD KEY `PS_BY` (`PS_BY`),
  ADD KEY `PS_STATUS` (`PS_STATUS`);

--
-- Indexes for table `product_swap_offers`
--
ALTER TABLE `product_swap_offers`
  ADD PRIMARY KEY (`SO_ID`),
  ADD KEY `SO_P_ID` (`SO_P_ID`),
  ADD KEY `SO_PS_ID` (`SO_PS_ID`);

--
-- Indexes for table `product_swap_status`
--
ALTER TABLE `product_swap_status`
  ADD PRIMARY KEY (`SS_ID`);

--
-- Indexes for table `saved_products`
--
ALTER TABLE `saved_products`
  ADD PRIMARY KEY (`S_ID`),
  ADD KEY `S_P_ID` (`S_P_ID`),
  ADD KEY `S_BY_U_ID` (`S_BY_U_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`U_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inbox`
--
ALTER TABLE `inbox`
  MODIFY `I_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `M_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `P_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `PC_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_exchange_prefs`
--
ALTER TABLE `product_exchange_prefs`
  MODIFY `PE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `product_exchange_status`
--
ALTER TABLE `product_exchange_status`
  MODIFY `PES_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `PI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT for table `product_status`
--
ALTER TABLE `product_status`
  MODIFY `PS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_swaps`
--
ALTER TABLE `product_swaps`
  MODIFY `PS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_swap_offers`
--
ALTER TABLE `product_swap_offers`
  MODIFY `SO_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product_swap_status`
--
ALTER TABLE `product_swap_status`
  MODIFY `SS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `saved_products`
--
ALTER TABLE `saved_products`
  MODIFY `S_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `U_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inbox`
--
ALTER TABLE `inbox`
  ADD CONSTRAINT `inbox_ibfk_1` FOREIGN KEY (`I_OF`) REFERENCES `users` (`U_ID`),
  ADD CONSTRAINT `inbox_ibfk_2` FOREIGN KEY (`I_U_ID`) REFERENCES `users` (`U_ID`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`M_FROM`) REFERENCES `users` (`U_ID`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`M_TO`) REFERENCES `users` (`U_ID`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`P_CATEGORY`) REFERENCES `product_categories` (`PC_ID`),
  ADD CONSTRAINT `products_ibfk_4` FOREIGN KEY (`P_BY_U_ID`) REFERENCES `users` (`U_ID`),
  ADD CONSTRAINT `products_ibfk_5` FOREIGN KEY (`P_STATUS`) REFERENCES `product_status` (`PS_ID`);

--
-- Constraints for table `product_exchange_prefs`
--
ALTER TABLE `product_exchange_prefs`
  ADD CONSTRAINT `product_exchange_prefs_ibfk_1` FOREIGN KEY (`PE_P_ID`) REFERENCES `products` (`P_ID`),
  ADD CONSTRAINT `product_exchange_prefs_ibfk_2` FOREIGN KEY (`PE_PC_ID`) REFERENCES `product_categories` (`PC_ID`);

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`PI_P_ID`) REFERENCES `products` (`P_ID`);

--
-- Constraints for table `product_swaps`
--
ALTER TABLE `product_swaps`
  ADD CONSTRAINT `product_swaps_ibfk_1` FOREIGN KEY (`PS_P_FOR`) REFERENCES `products` (`P_ID`),
  ADD CONSTRAINT `product_swaps_ibfk_2` FOREIGN KEY (`PS_BY`) REFERENCES `users` (`U_ID`),
  ADD CONSTRAINT `product_swaps_ibfk_3` FOREIGN KEY (`PS_STATUS`) REFERENCES `product_swap_status` (`SS_ID`);

--
-- Constraints for table `product_swap_offers`
--
ALTER TABLE `product_swap_offers`
  ADD CONSTRAINT `product_swap_offers_ibfk_1` FOREIGN KEY (`SO_P_ID`) REFERENCES `products` (`P_ID`),
  ADD CONSTRAINT `product_swap_offers_ibfk_2` FOREIGN KEY (`SO_PS_ID`) REFERENCES `product_swaps` (`PS_ID`);

--
-- Constraints for table `saved_products`
--
ALTER TABLE `saved_products`
  ADD CONSTRAINT `saved_products_ibfk_1` FOREIGN KEY (`S_P_ID`) REFERENCES `products` (`P_ID`),
  ADD CONSTRAINT `saved_products_ibfk_2` FOREIGN KEY (`S_BY_U_ID`) REFERENCES `users` (`U_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
