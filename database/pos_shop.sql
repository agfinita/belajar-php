-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 05, 2023 at 06:50 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int NOT NULL,
  `code` varchar(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `is_active` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `category_id` int NOT NULL,
  `product_code` varchar(20) DEFAULT NULL,
  `is_active` enum('1','0') NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `description` text,
  `price` decimal(15,2) NOT NULL DEFAULT '0.00',
  `unit` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT 'PCS' COMMENT 'satuan',
  `discount_amount` decimal(15,2) NOT NULL DEFAULT '0.00',
  `stock` int NOT NULL DEFAULT '0' COMMENT 'stock',
  `image` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci COMMENT 'gambar dari product'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `category_id`, `product_code`, `is_active`, `created_at`, `updated_at`, `created_by`, `updated_by`, `description`, `price`, `unit`, `discount_amount`, `stock`, `image`) VALUES
(1, 'Sepatu', 1, 'P0001', '1', '2023-10-11 06:33:07', '2023-10-31 04:38:51', NULL, NULL, 'Sepatu unisex', 100000.00, 'PCS', 10.00, 8, 'sepetu.jpeg'),
(3, 'Syal', 3, NULL, '1', '2023-10-17 11:48:23', '2023-10-31 04:29:47', NULL, NULL, 'Panjang 60cm', 15000.00, ' PCS', 13.00, 2, 'syal.jpeg'),
(5, 'Tracking pole', 1, NULL, '1', '2023-10-18 04:07:57', '2023-10-31 04:28:48', NULL, NULL, 'Bahan kuat', 150000.00, ' PCS', 0.00, 5, 'trackingpole.jpg'),
(6, 'Sarung tangan', 3, NULL, '1', '2023-10-18 05:37:56', '2023-11-02 15:56:25', NULL, NULL, 'Bahan tebal', 5000.00, ' PCS', 0.00, 5, 'images.jpeg'),
(8, 'Tas Ransel', 1, NULL, '1', '2023-10-20 02:04:22', '2023-10-30 12:45:59', NULL, NULL, 'Hydropack tas', 100000.00, 'PCS', 0.00, 5, '653fa587c8420.jpg'),
(11, 'Centong dinosaurus', 2, NULL, '1', '2023-10-20 02:12:32', '2023-10-31 04:35:57', NULL, NULL, 'Best seller', 10000.00, 'PCS', 0.00, 10, '653f863020592.jpg'),
(115, 'Kipas angin', 2, NULL, '1', '2023-11-02 14:44:46', '2023-11-02 15:55:10', NULL, NULL, 'Menyejukkan', 25000.00, 'PCS', 0.00, 1, 'kps.jpg'),
(116, 'Kaca mata', 3, NULL, '1', '2023-11-02 14:45:25', '2023-11-02 16:17:14', NULL, NULL, 'Anti radiasi', 20000.00, 'PCS', 0.00, 5, 'kcmt.jpg'),
(118, 'Kaos kaki bola', 1, NULL, '1', '2023-11-02 16:20:14', NULL, NULL, NULL, 'Tersedia uk: anak-dewasa', 9999.00, 'PCS', 0.00, 12, 'bal.jpeg'),
(119, 'Varsity jacket', 2, NULL, '1', '2023-11-02 16:22:47', NULL, NULL, NULL, 'Menghangatkan', 150000.00, 'PCS', 1.00, 10, 'jaket.jpg'),
(120, 'Hook clip', 2, NULL, '1', '2023-11-02 16:24:20', NULL, NULL, NULL, 'Gantungan lap, handuk', 3300.00, 'PCS', 0.00, 20, 'lap2.jpg lap01.jpg'),
(138, 'Bracklet', 3, NULL, '1', '2023-11-05 17:13:55', NULL, NULL, NULL, 'Gelang', 3000.00, 'PCS', 0.00, 5, '6547cd535f213.jpeg'),
(139, 'Hanger', 2, NULL, '1', '2023-11-05 17:16:12', NULL, NULL, NULL, 'Hanger baju', 25000.00, 'PCS', 0.00, 20, '6547cddcd77df.jpeg 6547cddcd7afb.jpeg'),
(140, 'Garpu', 2, NULL, '1', '2023-11-05 18:25:06', NULL, NULL, NULL, 'Garpu makanan', 300.00, 'PCS', 2.00, 4, '6547de022b45d.jpg 6547de022b72c.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `products_circulations`
--

CREATE TABLE `products_circulations` (
  `id` int NOT NULL,
  `trx_date` date NOT NULL,
  `reff` varchar(20) DEFAULT NULL,
  `in` int NOT NULL DEFAULT '0',
  `out` int NOT NULL DEFAULT '0',
  `product_id` int NOT NULL,
  `remaining_stock` int NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `is_active` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `category_name`, `created_at`, `updated_at`, `created_by`, `updated_by`, `is_active`) VALUES
(1, 'Sports', '2023-10-11 06:32:38', NULL, NULL, NULL, '1'),
(2, 'Daily', '2023-10-11 06:32:42', NULL, NULL, NULL, '1'),
(3, 'Accesoris', '2023-10-11 06:32:54', NULL, NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int NOT NULL,
  `code` varchar(20) NOT NULL,
  `trx_date` date NOT NULL,
  `sub_amount` decimal(15,2) DEFAULT NULL COMMENT 'total semua',
  `amount_total` decimal(15,2) DEFAULT NULL COMMENT 'total setelah diskon',
  `discount_amount` decimal(15,0) DEFAULT NULL COMMENT 'nominal diskon',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `total_products` int DEFAULT NULL,
  `vendor_id` int NOT NULL,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_details`
--

CREATE TABLE `purchase_details` (
  `id` int NOT NULL,
  `purchase_id` int NOT NULL,
  `product_id` int DEFAULT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `amount_total` decimal(15,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int NOT NULL,
  `code` varchar(20) NOT NULL,
  `trx_date` date NOT NULL,
  `sub_amount` decimal(15,2) DEFAULT NULL COMMENT 'total semua',
  `amount_total` decimal(15,2) DEFAULT NULL COMMENT 'total setelah diskon',
  `discount_amount` decimal(15,0) DEFAULT NULL COMMENT 'nominal diskon',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `total_products` int DEFAULT NULL,
  `customer_id` int NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `sales_details`
--

CREATE TABLE `sales_details` (
  `id` int NOT NULL,
  `sales_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `amount_total` decimal(15,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(64) DEFAULT NULL,
  `last_login_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `group_id` int NOT NULL,
  `is_active` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone_number`, `username`, `password`, `last_login_at`, `created_at`, `updated_at`, `created_by`, `updated_by`, `group_id`, `is_active`) VALUES
(1, 'Super Admin', 'super@gmail.com', '001122334455', 'uadmin', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', NULL, '2023-10-11 06:23:15', '2023-10-11 06:23:59', NULL, NULL, 1, '1'),
(2, 'Seller Satu', 'seller@gmail.com', '001122334456', 'seller', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', NULL, '2023-10-11 06:24:40', NULL, NULL, NULL, 2, '1'),
(3, 'Admin Product', 'adminproduct@gmail.com', '001122334457', 'products', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', NULL, '2023-10-11 06:25:14', NULL, NULL, NULL, 3, '1'),
(5, 'Agfinita', 'agfi@gmail.com', '08123456789', '08123456789', '$2y$10$7v4fSfn/KWT91Ij2X5VWeeM4MMvjNEbAcYT7A0YkySs5WWGQGsDYa', NULL, '2023-10-31 14:51:09', NULL, NULL, NULL, 3, '1'),
(10, 'Nabila', 'nab123@gmail.com', '0811223344', '0811223344', '$2y$10$4lZa/pvmxlPuuKvpPFq2e.lnptnRWuTTU3PvSLrmW.S8/3onvHfOq', NULL, '2023-10-31 15:34:24', NULL, NULL, NULL, 3, '1'),
(11, 'Nita', 'nt@gmail.com', '0812345', '0812345', '$2y$10$yjsUnnsX7jyPaflJT4oP7.QmEwwdLWXm6HyJQ6fRyF5T2YPsZYjNS', NULL, '2023-11-01 01:58:24', NULL, NULL, NULL, 3, '1');

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE `user_groups` (
  `id` int NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `is_active` enum('1','0') NOT NULL DEFAULT '1',
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`id`, `group_name`, `created_at`, `updated_at`, `created_by`, `updated_by`, `is_active`, `description`) VALUES
(1, 'Super Admin', '2023-10-11 06:19:54', '2023-10-11 06:20:33', NULL, NULL, '1', 'Group user super admin'),
(2, 'Seller', '2023-10-11 06:20:08', '2023-10-11 06:21:17', NULL, NULL, '1', 'Group user seller'),
(3, 'Admin Products', '2023-10-11 06:21:32', '2023-10-11 06:21:40', NULL, NULL, '1', 'Group user admin product');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` int NOT NULL,
  `code` varchar(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `is_active` enum('1','0') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `code`, `name`, `phone_number`, `email`, `address`, `created_at`, `updated_at`, `created_by`, `updated_by`, `is_active`) VALUES
(1, 'A1', 'Agfinita', '0857', 'agfinitaagh@gmail.com', 'Lumajang', '2023-10-24 02:49:48', NULL, NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_product`
-- (See below for the actual view)
--
CREATE TABLE `view_product` (
`category_name` varchar(255)
,`description` text
,`discount_amount` decimal(15,2)
,`price` decimal(15,2)
,`product_name` varchar(255)
,`stock` int
,`unit` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_product2`
-- (See below for the actual view)
--
CREATE TABLE `view_product2` (
`category_name` varchar(255)
,`description` text
,`discount_amount` decimal(15,2)
,`image` text
,`price` decimal(15,2)
,`product_name` varchar(255)
,`stock` int
,`unit` varchar(100)
);

-- --------------------------------------------------------

--
-- Structure for view `view_product`
--
DROP TABLE IF EXISTS `view_product`;

CREATE ALGORITHM=UNDEFINED DEFINER=`nita`@`localhost` SQL SECURITY DEFINER VIEW `view_product`  AS SELECT `p`.`product_name` AS `product_name`, `pc`.`category_name` AS `category_name`, `p`.`price` AS `price`, `p`.`description` AS `description`, `p`.`discount_amount` AS `discount_amount`, `p`.`unit` AS `unit`, `p`.`stock` AS `stock` FROM (`products` `p` join `product_categories` `pc` on((`p`.`category_id` = `pc`.`id`))) ORDER BY `p`.`id` DESC ;

-- --------------------------------------------------------

--
-- Structure for view `view_product2`
--
DROP TABLE IF EXISTS `view_product2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`nita`@`localhost` SQL SECURITY DEFINER VIEW `view_product2`  AS SELECT `p`.`product_name` AS `product_name`, `pc`.`category_name` AS `category_name`, `p`.`price` AS `price`, `p`.`description` AS `description`, `p`.`discount_amount` AS `discount_amount`, `p`.`unit` AS `unit`, `p`.`stock` AS `stock`, `p`.`image` AS `image` FROM (`products` `p` join `product_categories` `pc` on((`p`.`category_id` = `pc`.`id`))) ORDER BY `p`.`id` DESC ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_UN` (`code`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_UN` (`product_code`),
  ADD KEY `products_FK` (`category_id`);

--
-- Indexes for table `products_circulations`
--
ALTER TABLE `products_circulations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `purchases_UN` (`code`),
  ADD KEY `purchase_FK` (`vendor_id`);

--
-- Indexes for table `purchase_details`
--
ALTER TABLE `purchase_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_details_FK` (`product_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sales_UN` (`code`),
  ADD KEY `sales_FK` (`customer_id`);

--
-- Indexes for table `sales_details`
--
ALTER TABLE `sales_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_details_FK` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_UN` (`username`);

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vendors_UN` (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `products_circulations`
--
ALTER TABLE `products_circulations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_details`
--
ALTER TABLE `purchase_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales_details`
--
ALTER TABLE `sales_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_FK` FOREIGN KEY (`category_id`) REFERENCES `product_categories` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `purchase_FK` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `purchase_details`
--
ALTER TABLE `purchase_details`
  ADD CONSTRAINT `purchase_details_FK` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_FK` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `sales_details`
--
ALTER TABLE `sales_details`
  ADD CONSTRAINT `sales_details_FK` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
