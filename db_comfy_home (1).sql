-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2024 at 04:57 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_comfy@home`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_order`
--

CREATE TABLE `cart_order` (
  `item_id` int(11) NOT NULL,
  `user_fullname` varchar(100) NOT NULL,
  `item_productid` varchar(100) NOT NULL,
  `item_name` varchar(500) NOT NULL,
  `item_price` mediumtext NOT NULL,
  `item_des` mediumtext NOT NULL,
  `item_image` mediumtext NOT NULL,
  `item_date` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `fullname`, `email`, `message`, `created_at`) VALUES
(1, 'Alec', 'qpitso@gmail.com', 'MEsage', '2024-10-10 13:43:08'),
(2, 'Alec', 'qpitso@gmail.com', 'MEsage', '2024-10-10 13:50:52'),
(3, 'Alec', 'qpitso@gmail.com', 'MEsage', '2024-10-10 13:51:32');

-- --------------------------------------------------------

--
-- Table structure for table `pruducts`
--

CREATE TABLE `pruducts` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_description` varchar(500) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_image` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pruducts`
--

INSERT INTO `pruducts` (`product_id`, `product_name`, `product_description`, `product_price`, `product_image`) VALUES
(1, 'Bar Stool', 'White bar chair', 999.99, 'bar_stool_1.jpg'),
(2, 'Bar Stool(1)', 'Cream chair', 999.99, 'bar_stool_1.1.jpg'),
(3, 'Bar Stool(2)', 'White bar stool with gold frame', 999.99, 'bar_stool_1.2.jpg'),
(4, 'Bar Stool(3)', 'Golden frame', 999.99, 'bar_stool_1.3.jpg'),
(5, 'Bar Stool(4)', 'Bar stool with a touch of gold', 999.99, 'bar_stool_1.4.jpg'),
(6, 'Bubble Sofa', 'Bubble Cozy Sofa', 4500.00, 'bubble_sofa_1.jpg'),
(7, 'Bubble Sofa(1)', 'Bubble Cozy Sofa', 4500.00, 'bubble_sofa_1.1.jpg'),
(8, 'Bubble Sofa(2)', 'Bubble Cozy Sofa ', 4500.00, 'bubble_sofa_1.2.jpg'),
(9, 'Bubble Sofa(3)', 'Bubble Cozy Sofa', 4500.00, 'bubble_sofa_1.3.jpg'),
(10, 'Bubble Sofa(4)', 'Bubble Cozy Sofa', 4500.00, 'bubble_sofa_1.4.jpg'),
(11, 'Classy Sofa', 'Classy Cozy Sofa', 4000.00, 'classy_sofa_1.jpg'),
(12, 'Classy Sofa(1)', 'Classy Cozy Sofa', 4000.00, 'classy_sofa_1.1.jpg'),
(13, 'Classy Sofa(2)', 'Classy Cozy Sofa', 4000.00, 'classy_sofa_1.2.jpg'),
(14, 'Classy Sofa(3)', 'Classy Cozy Sofa ', 4000.00, 'classy_sofa_1.3.jpg'),
(15, 'Classy Sofa(4)', 'Classy Cozy Sofa', 4000.00, 'classy_sofa_1.4.jpg'),
(16, 'Coffee Set', 'Cozy Coffee Set', 4200.00, 'coffe_set_1.jpg'),
(17, 'Coffee Set(1)', 'Cozy Coffee Set', 4200.00, 'coffe_set_1.1.jpg'),
(18, 'Coffee Set(2)', 'Cozy Coffee Set ', 4200.00, 'coffe_set_1.2.jpg'),
(19, 'Coffee Set(3) ', 'Cozy Coffee Set', 4200.00, 'coffe_set_1.3.jpg'),
(20, 'Coffee Set(4)', 'Cozy Coffee Set', 4200.00, 'coffe_set_1.4.jpg'),
(21, 'Classy Coffee Table', 'Classy Coffee Table', 3520.00, 'coffee_table_1.jpg'),
(22, 'Classy Coffee Table(1)', 'Classy Coffee Table', 3520.00, 'coffee_table_1.1.jpg'),
(23, 'Classy Coffee Table(2)', 'Classy Coffee Table', 3520.00, 'coffee_table_1.2.jpg'),
(24, 'Classy Coffee Table(3)', 'Classy Coffee Table ', 3520.00, 'coffee_table_1.3.jpg'),
(25, 'Classy Coffee Table(4)', 'Classy Coffee Table', 3520.00, 'coffee_table_1.4.jpg'),
(26, 'Stylish Dining Set', 'Stylish Dining Set', 6000.00, 'dining_1.jpg'),
(27, 'Stylish Dining Set(1)', 'Stylish Dining Set', 6000.00, 'dining_1.1.jpg'),
(28, 'Stylish Dining Set(2)', 'Stylish Dining Set', 6000.00, 'dining_1.2.jpg'),
(29, 'Stylish Dining Set(3)', 'Stylish Dining Set', 6000.00, 'dining_1.3.jpg'),
(30, 'Stylish Dining Set(4)', 'Stylish Dining Set', 6000.00, 'dining_1.4.jpg'),
(31, 'Led Half Mirror', 'Led Half Mirror', 5500.00, 'half_mirror_1.jpg'),
(32, 'Led Half Mirror(1)', 'Led Half Mirror', 5500.00, 'half_mirror_1.1.jpg'),
(33, 'Led Half Mirror(2)', 'Led Half Mirror', 5500.00, 'half_mirror_1.2.jpg'),
(34, 'Led Half Mirror(3)', 'Led Half Mirror', 5500.00, 'half_mirror_1.3.jpg'),
(35, 'Led Half Mirror(4)', 'Led Half Mirror', 5500.00, 'half_mirror_1.4.jpg'),
(36, 'Wooden Lamp', 'Wooden Lamp', 950.00, 'lamp_1.jpg'),
(37, 'Wooden Lamp(1)', 'Wooden Lamp', 950.00, 'lamp_1.1.jpg'),
(38, 'Wooden Lamp(2)', 'Wooden Lamp', 950.00, 'lamp_1.2.jpg'),
(39, 'Wooden Lamp(3)', 'Wooden Lamp', 950.00, 'lamp_1.3.jpg'),
(40, 'Wooden Lamp(4)', 'Wooden Lamp', 950.00, 'lamp_1.4.jpg'),
(41, 'Led Clock', 'Led Clock', 1479.99, 'led_clock_1.jpg'),
(42, 'Led Clock(1)', 'Led Clock', 1479.99, 'led_clock_1.1.jpg'),
(43, 'Led Clock(2)', 'Led Clock', 1479.99, 'led_clock_1.2.jpg'),
(44, 'Led Clock(3)', 'Led Clock', 1479.99, 'led_clock_1.3.jpg'),
(45, 'Led Clock(4)', 'Led Clock', 1479.99, 'led_clock_1.4.jpg'),
(46, 'Led Mirror', 'Led Mirror', 2850.00, 'mirror_1.jpg'),
(47, 'Led Mirror(1)', 'Led Mirror', 2850.00, 'mirror_1.1.jpg'),
(48, 'Led Mirror(2)', 'Led Mirror', 2850.00, 'mirror_1.2.jpg'),
(49, 'Led Mirror(3)', 'Led Mirror', 2850.00, 'mirror_1.3.jpg'),
(50, 'Led Mirror(4)', 'Led Mirror', 2850.00, 'mirror_1.4.jpg'),
(51, 'Wooden Touch Chair', 'Wooden Touch Chair', 1400.00, 'wooden_touch_1.jpg'),
(52, 'Wooden Touch Chair(1)', 'Wooden Touch Chair', 1400.00, 'wooden_touch_1.1.jpg'),
(53, 'Wooden Touch Chair(2)', 'Wooden Touch Chair', 1400.00, 'wooden_touch_1.2.jpg'),
(54, 'Wooden Touch Chair(3)', 'Wooden Touch Chair', 1400.00, 'wooden_touch_1.3.jpg'),
(55, 'Wooden Touch Chair(4)', 'Wooden Touch Chair', 1400.00, 'wooden_touch_1.4.jpg'),
(56, 'Wall Shelve', 'Wall Shelve', 1150.00, 'wall_shelve_1.jpg'),
(57, 'Wall Shelve(1)', 'Wall Shelve', 1150.00, 'wall_shelve_1.1.jpg'),
(58, 'Wall Shelve(2)', 'Wall Shelve', 1150.00, 'wall_shelve_1.2.jpg'),
(59, 'Wall Shelve(3)', 'Wall Shelve', 1150.00, 'wall_shelve_1.3.jpg'),
(60, 'Wall Shelve(4)', 'Wall Shelve', 1150.00, 'wall_shelve_1.4.jpg'),
(61, 'Classy Wall Clock', 'Classy Wall Clock', 1999.99, 'wall_clock_1.jpg'),
(62, 'Classy Wall Clock(1)', 'Classy Wall Clock', 1999.99, 'wall_clock_1.1.jpg'),
(63, 'Classy Wall Clock(2)', 'Classy Wall Clock', 1999.99, 'wall_clock_1.2.jpg'),
(64, 'Classy Wall Clock(3)', 'Classy Wall Clock', 1999.99, 'wall_clock_1.3.jpg'),
(65, 'Classy Wall Clock(4)', 'Classy Wall Clock', 1999.99, 'wall_clock_1.4.jpg'),
(66, 'Two Set Table', 'Two Set Table', 2300.00, 'two_set_1.jpg'),
(67, 'Two Set Table(1)', 'Two Set Table', 2200.00, 'two_set_1.1.jpg'),
(68, 'Two Set Table(2)', 'Two Set Table', 2200.00, 'two_set_1.2.jpg'),
(69, 'Two Set Table(3)', 'Two Set Table', 2200.00, 'two_set_1.3.jpg'),
(70, 'Two Set Table(4)', 'Two Set Table', 2200.00, 'two_set_1.4.jpg'),
(71, 'Teddy Sofa', 'Teddy Sofa', 2800.00, 'teddy_sofa_1.jpg'),
(72, 'Teddy Sofa(1)', 'Teddy Sofa', 2800.00, 'teddy_sofa_1.1.jpg'),
(73, 'Teddy Sofa(2)', 'Teddy Sofa', 2800.00, 'teddy_sofa_1.2.jpg'),
(74, 'Teddy Sofa(3)', 'Teddy Sofa', 2800.00, 'teddy_sofa_1.3.jpg'),
(75, 'Teddy Sofa(4)', 'Teddy Sofa', 2800.00, 'teddy_sofa_1.4.jpg'),
(76, 'Modern Table', 'Modern Table', 2400.00, 'table_1.jpg'),
(77, 'Modern Table(1)', 'Modern Table', 2400.00, 'table_1.1.jpg'),
(78, 'Modern Table(2)', 'Modern Table', 2400.00, 'table_1.2.jpg'),
(79, 'Modern Table(3)', 'Modern Table', 2400.00, 'table_1.3.jpg'),
(80, 'Modern Table(4)', 'Modern Table', 2400.00, 'table_1.4.jpg'),
(81, 'Wooden Frame Mirror', 'Wooden Frame Mirror', 1200.00, 'wooden_frame_mirror_1.jpg'),
(82, 'Wooden Frame Mirror(1)', 'Wooden Frame Mirror', 1200.00, 'wooden_frame_mirror_1.1.jpg'),
(83, 'Wooden Frame Mirror(2)', 'Wooden Frame Mirror', 1200.00, 'wooden_frame_mirror_1.2.jpg'),
(84, 'Wooden Frame Mirror(3)', 'Wooden Frame Mirror', 1200.00, 'wooden_frame_mirror_1.3.jpg'),
(85, 'Wooden Frame Mirror(4)', 'Wooden Frame Mirror', 1200.00, 'wooden_frame_mirror_1.4.jpg'),
(86, 'Wooden Bedroom Set', 'Wooden Bedroom Set', 6500.00, 'wooden_bedroom_set_1.jpg'),
(87, 'Wooden Bedroom Set(1)', 'Wooden Bedroom Set', 6500.00, 'wooden_bedroom_set_1.1.jpg'),
(88, 'Wooden Bedroom Set(2)', 'Wooden Bedroom Set', 6500.00, 'wooden_bedroom_set_1.2.jpg'),
(89, 'Wooden Bedroom Set(3)', 'Wooden Bedroom Set', 6500.00, 'wooden_bedroom_set_1.3.jpg'),
(90, 'Wooden Bedroom Set(4)', 'Wooden Bedroom Set', 6500.00, 'wooden_bedroom_set.1.4.jpg'),
(91, 'Flower Lamp', 'Flower Lamp', 1350.00, 'floor_lamp_1.jpg'),
(92, 'Flower Lamp(1)', 'Flower Lamp', 1350.00, 'floor_lamp_1.1.jpg'),
(93, 'Flower Lamp(2)', 'Flower Lamp', 1350.00, 'floor_lamp_1.2.jpg'),
(94, 'Flower Lamp(3)', 'Flower Lamp', 1350.00, 'floor_lamp_1.3.jpg'),
(95, 'Flower Lamp(4)', 'Flower Lamp', 1350.00, 'floor_lamp_1.4.jpg'),
(96, 'Comfy Set', 'Comfy Set', 7000.00, 'comfy_sofa_1.jpg'),
(97, 'Comfy Set(1)', 'Comfy Set', 7000.00, 'comfy_sofa_1.1.jpg'),
(98, 'Comfy Set(2)', 'Comfy Set', 7000.00, 'comfy_sofa_1.2.jpg'),
(99, 'Comfy Set(3)', 'Comfy Set', 7000.00, 'comfy_sofa_1.3.jpg'),
(100, 'Comfy Set(4)', 'Comfy Set', 7000.00, 'comfy_sofa_1.4.jpg'),
(101, 'Flex Bed', 'Flex Bed', 12000.00, 'flex_bed_1.jpg'),
(102, 'Flex Bed(1)', 'Flex Bed', 12000.00, 'flex_bed_1.1.jpg'),
(103, 'Flex Bed(2)', 'Flex Bed', 12000.00, 'flex_bed_1.2.jpg'),
(104, 'Flex Bed(3)', 'Flex Bed', 12000.00, 'flex_bed_1.3.jpg'),
(105, 'Flex Bed(4)', 'Flex Bed', 12000.00, 'flex_bed_1.4.jpg'),
(106, 'Outdoor Set', 'Outdoor Set', 8500.00, 'outdoor_set_1.jpg'),
(107, 'Outdoor Set(1)', 'Outdoor Set', 8500.00, 'outdoor_set_1.1.jpg'),
(108, 'Outdoor Set(2)', 'Outdoor Set', 8500.00, 'outdoor_set_1.2.jpg'),
(109, 'Outdoor Set(3)', 'Outdoor Set', 8500.00, 'outdoor_set_1.3.jpg'),
(110, 'Outdoor Set(4)', 'Outdoor Set', 8500.00, 'outdoor_set_1.4.jpg'),
(111, 'Modern Bedside Cabinet', 'Modern Bedside Cabinet', 2600.00, 'modern_bedside_cabinet_1.jpg'),
(112, 'Modern Bedside Cabinet(1)', 'Modern Bedside Cabinet', 2600.00, 'modern_bedside_cabinet_1.1.jpg'),
(113, 'Modern Bedside Cabinet(2)', 'Modern Bedside Cabinet', 2600.00, 'modern_bedside_cabinet_1.2.jpg'),
(114, 'Modern Bedside Cabinet(3)', 'Modern Bedside Cabinet', 2600.00, 'modern_bedside_cabinet_1.3.jpg'),
(115, 'Modern Bedside Cabinet(4)', 'Modern Bedside Cabinet', 2600.00, 'modern_bedside_cabinet_1.4.jpg'),
(116, 'Comfy Headboard', 'Comfy Headboard', 1300.00, 'headboard_1.jpg'),
(117, 'Comfy Headboard(1)', 'Comfy Headboard', 1300.00, 'headboard_1.1.jpg'),
(118, 'Comfy Headboard(2)', 'Comfy Headboard', 1300.00, 'headboard_1.2.jpg'),
(119, 'Comfy Headboard(3)', 'Comfy Headboard', 1300.00, 'headboard_1.3.jpg'),
(120, 'Comfy Headboard(4)', 'Comfy Headboard', 1300.00, 'headboard_1.4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `phone`, `password`) VALUES
(5, 'LETHABO', 'MATLALA', 'qpitso@gmail.com', '0677690242', '$2y$10$0xVtA8v9JJzIY7SIuCjM6eskeB8pH5Us9AP4a8f7vbCi06vgSfyXa');

-- --------------------------------------------------------

--
-- Table structure for table `users_2`
--

CREATE TABLE `users_2` (
  `user_id` int(11) NOT NULL,
  `user_fullname` varchar(200) NOT NULL,
  `user_email` varchar(500) NOT NULL,
  `user_address` varchar(10000) NOT NULL,
  `user_number` varchar(10) NOT NULL,
  `user_password` mediumtext NOT NULL,
  `user_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_order`
--
ALTER TABLE `cart_order`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pruducts`
--
ALTER TABLE `pruducts`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users_2`
--
ALTER TABLE `users_2`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_order`
--
ALTER TABLE `cart_order`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pruducts`
--
ALTER TABLE `pruducts`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users_2`
--
ALTER TABLE `users_2`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
