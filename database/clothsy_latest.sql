-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2026 at 02:08 AM
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
-- Database: `clothsy`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_number` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_email` varchar(190) DEFAULT NULL,
  `customer_phone` varchar(30) DEFAULT NULL,
  `shipping_address` text DEFAULT NULL,
  `subtotal` decimal(10,2) NOT NULL DEFAULT 0.00,
  `shipping_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `total_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `payment_method` enum('cod','upi') NOT NULL DEFAULT 'cod',
  `payment_status` enum('pending','paid','failed','refunded') NOT NULL DEFAULT 'pending',
  `order_status` enum('pending','processing','shipped','out_for_delivery','delivered','cancelled','refunded') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_number`, `customer_name`, `customer_email`, `customer_phone`, `shipping_address`, `subtotal`, `shipping_amount`, `total_amount`, `payment_method`, `payment_status`, `order_status`, `created_at`, `updated_at`) VALUES
(1, 'ORD-2026-1001', 'Kuldeep Kumar', 'admin123@gmail.com', '9876500001', 'House No. 12, Sector 15, Gurugram, Haryana, 122001', 2499.00, 100.00, 2599.00, 'cod', 'pending', 'processing', '2026-10-20 05:00:00', '2026-10-23 19:09:49'),
(2, 'ORD-2026-1002', 'Kuldeep Kumar', 'admin123@gmail.com', '9876500001', 'House No. 12, Sector 15, Gurugram, Haryana, 122001', 1499.00, 0.00, 1499.00, 'upi', 'paid', 'delivered', '2026-10-21 08:45:00', '2026-10-23 19:09:49'),
(3, 'ORD-2026-1003', 'Rahul Saini', 'rahulsaini82667@gmail.com', '9876500002', 'House No. 25, Model Town, Faridabad, Haryana, 121006', 3299.00, 100.00, 3399.00, 'upi', 'paid', 'shipped', '2026-10-19 06:15:00', '2026-10-23 19:09:49'),
(4, 'ORD-2026-1004', 'Rahul Saini', 'rahulsaini82667@gmail.com', '9876500002', 'House No. 25, Model Town, Faridabad, Haryana, 121006', 899.00, 100.00, 999.00, 'cod', 'pending', 'pending', '2026-10-22 03:50:00', '2026-10-23 19:09:49'),
(5, 'ORD-2026-1005', 'Sandeep Kumar', 'sandy@gmail.com', '9876500004', 'Street No. 4, Civil Lines, Rohtak, Haryana, 124001', 1799.00, 100.00, 1899.00, 'cod', 'pending', 'out_for_delivery', '2026-10-18 10:40:00', '2026-10-23 19:09:49'),
(6, 'ORD-2026-1006', 'Sandeep Kumar', 'sandy@gmail.com', '9876500004', 'Street No. 4, Civil Lines, Rohtak, Haryana, 124001', 4999.00, 0.00, 4999.00, 'upi', 'paid', 'delivered', '2026-10-20 07:10:00', '2026-10-23 19:09:49'),
(7, 'ORD-2026-1007', 'Nikhil Thakur', 'nik@gmail.com', '9876500005', 'House No. 18, Sector 7, Panipat, Haryana, 132103', 2199.00, 100.00, 2299.00, 'upi', 'failed', 'pending', '2026-10-17 07:55:00', '2026-10-23 19:09:49'),
(8, 'ORD-2026-1008', 'Nikhil Thakur', 'nik@gmail.com', '9876500005', 'House No. 18, Sector 7, Panipat, Haryana, 132103', 999.00, 100.00, 1099.00, 'cod', 'pending', 'cancelled', '2026-10-21 11:35:00', '2026-10-23 19:09:49'),
(9, 'ORD-2026-1009', 'Rahul R', 'rahul@gmail.com', '9876500006', 'Flat 202, Green Residency, Delhi, Delhi, 110001', 3999.00, 0.00, 3999.00, 'upi', 'paid', 'processing', '2026-10-20 10:00:00', '2026-10-23 19:09:49'),
(10, 'ORD-2026-1010', 'Rahul R', 'rahul@gmail.com', '9876500006', 'Flat 202, Green Residency, Delhi, Delhi, 110001', 1299.00, 100.00, 1399.00, 'cod', 'pending', 'delivered', '2026-10-22 05:40:00', '2026-10-23 19:09:49'),
(11, 'ORD-2026-1011', 'Test User', 'test123@gmail.com', '9876500009', 'House No. 35, Shastri Nagar, Hisar, Haryana, 125001', 1599.00, 100.00, 1699.00, 'cod', 'pending', 'processing', '2026-10-16 04:45:00', '2026-10-23 19:09:49'),
(12, 'ORD-2026-1012', 'Test User', 'test123@gmail.com', '9876500009', 'House No. 35, Shastri Nagar, Hisar, Haryana, 125001', 2799.00, 0.00, 2799.00, 'upi', 'paid', 'delivered', '2026-10-19 13:05:00', '2026-10-23 19:09:49'),
(13, 'ORD-2026-1013', 'Ram Kumar', 'ram123@gmail.com', '9876500010', 'Street No. 8, Sector 9, Karnal, Haryana, 132001', 3499.00, 100.00, 3599.00, 'upi', 'paid', 'shipped', '2026-10-21 04:20:00', '2026-10-23 19:09:49'),
(14, 'ORD-2026-1014', 'Ram Kumar', 'ram123@gmail.com', '9876500010', 'Street No. 8, Sector 9, Karnal, Haryana, 132001', 699.00, 100.00, 799.00, 'cod', 'pending', 'pending', '2026-10-23 03:15:00', '2026-10-23 19:09:49'),
(15, 'ORD-2026-1015', 'Vinit Sehgal', 'vinitweb5@gmail.com', '9876500011', 'House No. 21, Patel Nagar, Sonipat, Haryana, 131001', 1899.00, 100.00, 1999.00, 'cod', 'pending', 'delivered', '2026-10-18 06:45:00', '2026-10-23 19:09:49'),
(16, 'ORD-2026-1016', 'Vinit Sehgal', 'vinitweb5@gmail.com', '9876500011', 'House No. 21, Patel Nagar, Sonipat, Haryana, 131001', 4599.00, 0.00, 4599.00, 'upi', 'refunded', 'refunded', '2026-10-22 10:50:00', '2026-10-23 19:09:49'),
(17, 'ORD-2026-1017', 'Raju Dev', 'rajudev123@gmail.com', '9876500012', 'Flat 105, City Apartments, Jaipur, Rajasthan, 302001', 2399.00, 100.00, 2499.00, 'upi', 'paid', 'delivered', '2026-10-19 04:30:00', '2026-10-23 19:09:49'),
(18, 'ORD-2026-1018', 'Raju Dev', 'rajudev123@gmail.com', '9876500012', 'Flat 105, City Apartments, Jaipur, Rajasthan, 302001', 1199.00, 100.00, 1299.00, 'cod', 'pending', 'processing', '2026-10-23 08:10:00', '2026-10-23 19:09:49');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sku` varchar(100) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `collection` varchar(150) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `old_price` decimal(10,2) DEFAULT NULL,
  `discount_percentage` decimal(5,2) DEFAULT NULL,
  `brand` varchar(150) DEFAULT NULL,
  `color` varchar(100) DEFAULT NULL,
  `material` varchar(150) DEFAULT NULL,
  `fit` varchar(100) DEFAULT NULL,
  `pattern` varchar(100) DEFAULT NULL,
  `occasion` varchar(255) DEFAULT NULL,
  `care` text DEFAULT NULL,
  `neck_type` varchar(100) DEFAULT NULL,
  `sleeve_style` varchar(100) DEFAULT NULL,
  `sizes` varchar(255) DEFAULT NULL,
  `stock_quantity` int(11) NOT NULL DEFAULT 0,
  `stock_status` enum('in_stock','low_stock','out_of_stock') NOT NULL DEFAULT 'in_stock',
  `main_image` varchar(500) DEFAULT NULL,
  `feature_1` varchar(255) DEFAULT NULL,
  `feature_2` varchar(255) DEFAULT NULL,
  `feature_3` varchar(255) DEFAULT NULL,
  `feature_4` varchar(255) DEFAULT NULL,
  `feature_5` varchar(255) DEFAULT NULL,
  `shipping_return_description` text DEFAULT NULL,
  `shipping_return_point_1` varchar(255) DEFAULT NULL,
  `shipping_return_point_2` varchar(255) DEFAULT NULL,
  `shipping_return_point_3` varchar(255) DEFAULT NULL,
  `shipping_return_point_4` varchar(255) DEFAULT NULL,
  `shipping_return_point_5` varchar(255) DEFAULT NULL,
  `status` enum('active','draft','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `sku`, `category`, `collection`, `description`, `price`, `old_price`, `discount_percentage`, `brand`, `color`, `material`, `fit`, `pattern`, `occasion`, `care`, `neck_type`, `sleeve_style`, `sizes`, `stock_quantity`, `stock_status`, `main_image`, `feature_1`, `feature_2`, `feature_3`, `feature_4`, `feature_5`, `shipping_return_description`, `shipping_return_point_1`, `shipping_return_point_2`, `shipping_return_point_3`, `shipping_return_point_4`, `shipping_return_point_5`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Classic Cotton T-Shirt', 'CLO-TSH-001', 'Men', 'Trending', 'Comfortable everyday cotton T-shirt.', 499.00, 699.00, 28.60, 'Clothsy', 'Black', 'Cotton', 'Regular Fit', 'Solid', 'Casual', 'Machine wash cold', 'Round Neck', 'Half Sleeve', 'S,M,L,XL,XXL', 100, 'in_stock', 'uploads/products/a89f7b0cd41c83b4349c9d1194355a2f.jpg', 'Premium cotton fabric', 'Soft and breathable', 'Comfortable fit', 'Modern design', 'Easy to maintain', 'Standard shipping and easy returns.', 'Free shipping on eligible orders', 'Orders processed within 1-2 business days', 'Standard delivery available', 'Return requests accepted within 30 days', 'Product must be unused', 'active', '2026-10-22 18:51:16', '2026-10-22 19:04:34'),
(2, 'Slim Fit Denim Jeans', 'CLO-JNS-002', 'Men', 'Best Sellers', 'Stylish slim fit denim jeans.', 1299.00, 1599.00, 18.76, 'Clothsy', 'Blue', 'Denim Cotton', 'Slim Fit', 'Solid', 'Casual, Travel', 'Machine wash', 'N/A', 'N/A', '28,30,32,34,36', 50, 'in_stock', 'uploads/products/6491ee902e6e4a35269cc41a8a0955b1.jpg', 'Durable denim', 'Modern slim fit', 'Comfortable waistband', 'Classic blue color', 'Everyday styling', 'Standard shipping and returns available.', 'Shipping available', 'Orders processed promptly', 'Delivery times vary by location', 'Return requests accepted within 30 days', 'Keep original packaging', 'active', '2026-10-22 18:51:16', '2026-10-22 19:05:48'),
(3, 'Floral Summer Dress', 'CLO-DRS-003', 'Women', 'Summer Collection', 'Lightweight floral dress for summer.', 999.00, 1299.00, 23.09, 'Clothsy', 'Pink', 'Rayon', 'Regular Fit', 'Floral', 'Party, Casual', 'Gentle wash', 'V-Neck', 'Short Sleeve', 'S,M,L,XL', 35, 'in_stock', 'uploads/products/46cd76f018b5127d8f71486e5664bf96.jpg', 'Lightweight fabric', 'Floral print', 'Summer-ready style', 'Comfortable design', 'Easy to style', 'Standard shipping and returns available.', 'Shipping available', 'Orders processed promptly', 'Delivery times vary by location', 'Return requests accepted within 30 days', 'Keep original packaging', 'active', '2026-10-22 18:51:16', '2026-10-23 18:28:08'),
(4, 'Casual Hoodie', 'CLO-HOD-004', 'Men', 'Winter Collection', 'Soft and comfortable casual hoodie.', 899.00, 1199.00, 25.02, 'Clothsy', 'Grey', 'Cotton Blend', 'Regular Fit', 'Solid', 'Casual, Travel', 'Machine wash cold', 'Hooded Neck', 'Full Sleeve', 'S,M,L,XL,XXL', 20, 'low_stock', 'uploads/products/ee93d6106777d0f9e6433719341be6f5.jpg', 'Soft fleece interior', 'Comfortable hood', 'Warm fabric', 'Everyday casual wear', 'Ribbed cuffs', 'Standard shipping and returns available.', 'Shipping available', 'Orders processed promptly', 'Delivery times vary by location', 'Return requests accepted within 30 days', 'Keep original packaging', 'active', '2026-10-22 18:51:16', '2026-10-23 18:37:16'),
(5, 'Women Casual Top', 'CLO-TOP-005', 'Women', 'New Arrivals', 'Stylish top for everyday wear.', 599.00, NULL, NULL, 'Clothsy', 'White', 'Cotton', 'Regular Fit', 'Solid', 'Casual', 'Gentle machine wash', 'Round Neck', 'Half Sleeve', 'S,M,L,XL', 0, 'out_of_stock', 'uploads/products/9bbd6f544d02cf094f1b2119f3c52c93.jpg', 'Soft cotton fabric', 'Lightweight material', 'Versatile styling', 'Comfortable fit', 'Easy care', 'Standard shipping and returns available.', 'Shipping available', 'Orders processed promptly', 'Delivery times vary by location', 'Return requests accepted within 30 days', 'Keep original packaging', 'draft', '2026-10-22 18:51:16', '2026-10-23 18:37:38');

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` int(11) NOT NULL,
  `site_name` varchar(255) NOT NULL,
  `about_text` text DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `facebook_url` varchar(255) DEFAULT NULL,
  `instagram_url` varchar(255) DEFAULT NULL,
  `twitter_url` varchar(255) DEFAULT NULL,
  `youtube_url` varchar(255) DEFAULT NULL,
  `linkedin_url` varchar(255) DEFAULT NULL,
  `primary_color` varchar(50) DEFAULT NULL,
  `copyright_text` varchar(255) DEFAULT NULL,
  `site_logo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `site_name`, `about_text`, `email`, `phone`, `address`, `facebook_url`, `instagram_url`, `twitter_url`, `youtube_url`, `linkedin_url`, `primary_color`, `copyright_text`, `site_logo`) VALUES
(1, 'Clothsy', 'Your destination for trendy and affordable fashion. We bring you the best styles to look good and feel confident.', 'info@clothsy.com', '+91 9876543210', '123 Fashion Street, Style City, SC 12345', '', '', '', '', '', '#ef2d19', '© 2026 My Website. All rights reserved.', 'uploads/site/site_logo_462affc7c4fcd66a.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email_add` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `agree` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `Phone_no` varchar(20) DEFAULT NULL,
  `Address` text DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `pin` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email_add`, `password`, `agree`, `created_at`, `Phone_no`, `Address`, `city`, `state`, `pin`) VALUES
(1, 'Kuldeep', 'Kumar', 'admin123@gmail.com', '$2a$12$hIl8IVIrBPHHBzO0SAq/7.ZHjNsQT1eurwuk/zAnja.YnIpzV9k3C', 1, '2026-01-23 03:20:20', '9876500001', 'House No. 12, Sector 15', 'Gurugram', 'Haryana', '122001'),
(2, 'Rahul', 'saini', 'rahulsaini82667@gmail.com', 'bASELINE@123', 0, '2026-01-23 10:19:24', '9876500002', 'House No. 25, Model Town', 'Faridabad', 'Haryana', '121006'),
(4, 'Sandeep', 'Kumar', 'sandy@gmail.com', 'Sandy@123', 0, '2026-02-23 05:35:44', '9876500004', 'Street No. 4, Civil Lines', 'Rohtak', 'Haryana', '124001'),
(5, 'Nikhil', 'Thakur', 'nik@gmail.com', '123456', 0, '2026-02-23 06:39:57', '9876500005', 'House No. 18, Sector 7', 'Panipat', 'Haryana', '132103'),
(6, 'Rahul', 'R', 'rahul@gmail.com', 'Admin!123', 0, '2026-04-10 03:13:08', '9876500006', 'Flat 202, Green Residency', 'Delhi', 'Delhi', '110001'),
(9, 'Test', 'User', 'test123@gmail.com', 'Baseline@123', 0, '2026-06-25 09:54:05', '9876500009', 'House No. 35, Shastri Nagar', 'Hisar', 'Haryana', '125001'),
(10, 'Ram', 'Kumar', 'ram123@gmail.com', 'Ram@123', 0, '2026-07-23 16:39:25', '9876500010', 'Street No. 8, Sector 9', 'Karnal', 'Haryana', '132001'),
(11, 'vinit', 'sehgal', 'vinitweb5@gmail.com', '$2y$10$V2.iRqtD2ASNRDGrmK9VIe0zTL9V90//iDTqHY0FiPVxJv0N.ChJG', 0, '2026-08-05 23:49:45', '9876500011', 'House No. 21, Patel Nagar', 'Sonipat', 'Haryana', '131001'),
(12, 'Raju', 'Dev', 'rajudev123@gmail.com', '$2y$10$cmrQ3u14dJrJmiUWo2ARu.Nt1El9sNk3Mk490I3UChPRFE7lsiFHy', 0, '2026-08-13 18:50:52', '9876500012', 'Flat 105, City Apartments', 'Jaipur', 'Rajasthan', '302001');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_number` (`order_number`),
  ADD KEY `idx_order_number` (`order_number`),
  ADD KEY `idx_payment_method` (`payment_method`),
  ADD KEY `idx_payment_status` (`payment_status`),
  ADD KEY `idx_order_status` (`order_status`),
  ADD KEY `idx_created_at` (`created_at`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_sku` (`sku`),
  ADD KEY `idx_category` (`category`),
  ADD KEY `idx_status` (`status`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_add` (`email_add`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
