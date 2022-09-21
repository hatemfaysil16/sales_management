-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2017 at 11:50 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `c_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(20) NOT NULL,
  `ref` varchar(100) NOT NULL,
  `desig` varchar(255) NOT NULL,
  `tvr` int(2) NOT NULL,
  `suplier_id` int(11) NOT NULL DEFAULT '0',
  `category_id` int(11) NOT NULL DEFAULT '0',
  `unit_id` int(20) NOT NULL DEFAULT '0',
  `thumb` varchar(255) NOT NULL DEFAULT 'no_thumb.jpg',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `ref`, `desig`, `tvr`, `suplier_id`, `category_id`, `unit_id`, `thumb`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(2, 'asdfasd', 'sadfsadf', 12, 1, 1, 1, '10411728_1559825767620817_5358968287211785647_n.jpg', '2017-06-16 04:29:28', '2017-06-16 04:29:28', 1, 1),
(8, 'items', 'itemsitems', 12, 1, 1, 1, '10425350_706550366128001_7932114748808062744_n.jpg', '2017-06-16 04:35:30', '2017-06-16 04:35:30', 1, 1),
(9, 'items', 'itemsitems', 12, 1, 1, 1, '22.PNG', '2017-06-16 04:41:41', '2017-06-19 05:15:41', 1, 1),
(11, 'enter', 'enterenter', 12, 1, 1, 1, '11.jpg', '2017-06-16 04:52:19', '2017-06-16 04:52:19', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Books For Read'),
(2, 'Tickets'),
(3, 'Hardware Devices'),
(4, 'Hardware Devices'),
(5, 'hard section'),
(13, 'infinx'),
(14, 'infinx'),
(15, 'samsung');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `tel` int(50) NOT NULL,
  `city` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL DEFAULT '1',
  `updated_by` int(11) NOT NULL DEFAULT '1',
  `email` varchar(255) NOT NULL,
  `zip_code` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `tel`, `city`, `adress`, `created_at`, `update_at`, `created_by`, `updated_by`, `email`, `zip_code`) VALUES
(2, 'Hassan', 1112692733, 'helwan', '15 may', '2017-06-27 17:49:13', '2017-06-27 17:49:13', 1, 1, 'hassan@123.com', 2001);

-- --------------------------------------------------------

--
-- Table structure for table `prs_clt`
--

CREATE TABLE `prs_clt` (
  `id` int(11) NOT NULL,
  `num` varchar(255) NOT NULL,
  `discr` varchar(255) NOT NULL,
  `date` varchar(100) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `client_id` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL DEFAULT '1',
  `updated_by` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prs_clt`
--

INSERT INTO `prs_clt` (`id`, `num`, `discr`, `date`, `subject`, `client_id`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, '65161', 'sdfsdfdsf', '06/12/2016', 'rtyrtyrty', 2, '2017-06-27 18:06:12', '2017-06-28 15:27:57', 1, 1),
(3, '6516', 'what the hack', '04/11/1996', 'milionar', 2, '2017-06-30 16:25:42', '2017-06-30 16:25:42', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pr_clt_arts`
--

CREATE TABLE `pr_clt_arts` (
  `id` int(11) NOT NULL,
  `pr_clt_id` int(11) NOT NULL DEFAULT '0',
  `art_id` int(11) NOT NULL,
  `qta` double NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL DEFAULT '1',
  `updated_by` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='prices request articles' ROW_FORMAT=COMPACT;

--
-- Dumping data for table `pr_clt_arts`
--

INSERT INTO `pr_clt_arts` (`id`, `pr_clt_id`, `art_id`, `qta`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 1, 8, 10, '2017-06-28 08:36:01', '2017-06-29 18:14:24', 1, 1),
(2, 2, 2, 10000, '2017-06-29 15:46:04', '2017-06-29 18:13:10', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `qoutation_clt`
--

CREATE TABLE `qoutation_clt` (
  `id` int(11) NOT NULL,
  `num` varchar(255) NOT NULL,
  `discr` varchar(255) NOT NULL,
  `date` varchar(100) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `client_id` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL DEFAULT '1',
  `updated_by` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qoutation_clt`
--

INSERT INTO `qoutation_clt` (`id`, `num`, `discr`, `date`, `subject`, `client_id`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, '561961', 'asdfasdfsadf', '03/11/1996', 'sdfasfasdf', 2, '2017-06-30 16:53:30', '2017-06-30 17:05:12', 1, 1),
(2, '561961', 'asdfasdfsadf', '03/11/1996', 'sdfasfasdf', 2, '2017-06-30 16:53:30', '2017-06-30 17:05:17', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `qoutation_clt_arts`
--

CREATE TABLE `qoutation_clt_arts` (
  `id` int(11) NOT NULL,
  `qoutation_clt_arts` int(11) NOT NULL DEFAULT '0',
  `art_id` int(11) NOT NULL,
  `qta` double NOT NULL,
  `price` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL DEFAULT '1',
  `updated_by` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `show_clients` int(1) NOT NULL DEFAULT '0',
  `aed_clients` int(1) NOT NULL DEFAULT '0',
  `show_suppliers` int(1) NOT NULL DEFAULT '0',
  `aed_suppliers` int(1) NOT NULL DEFAULT '0',
  `show_sales` int(1) NOT NULL DEFAULT '0',
  `aed_sales` int(1) NOT NULL DEFAULT '0',
  `show_purchases` int(1) NOT NULL DEFAULT '0',
  `aed_purchases` int(1) NOT NULL DEFAULT '0',
  `show_articles` int(1) NOT NULL DEFAULT '0',
  `aed_articles` int(1) NOT NULL DEFAULT '0',
  `show_stoke` int(1) NOT NULL DEFAULT '0',
  `show_users_roles` int(1) NOT NULL DEFAULT '0',
  `aed_users_aed` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `show_clients`, `aed_clients`, `show_suppliers`, `aed_suppliers`, `show_sales`, `aed_sales`, `show_purchases`, `aed_purchases`, `show_articles`, `aed_articles`, `show_stoke`, `show_users_roles`, `aed_users_aed`) VALUES
(1, 'admin', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(2, 'normal user', 1, 0, 1, 0, 0, 1, 0, 0, 1, 0, 0, 0, 1),
(3, 'saller', 1, 1, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0),
(4, 'Supervisor', 0, 0, 1, 1, 0, 0, 1, 0, 1, 0, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `suppleries`
--

CREATE TABLE `suppleries` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `tel` int(50) NOT NULL,
  `city` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `zip_code` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `suppleries`
--

INSERT INTO `suppleries` (`id`, `name`, `tel`, `city`, `adress`, `created_at`, `update_at`, `created_by`, `updated_by`, `email`, `zip_code`) VALUES
(1, 'SUP', 666666666, 'Egypt, Cairo', 'Helwan', '2017-06-03 11:15:39', '2017-06-19 05:36:45', 1, 1, 'eslam@eslam.com', 2215),
(2, 'Hassan ahmed', 1152945713, 'helwan', '15 may', '2017-06-27 08:06:23', '2017-06-27 08:30:34', 1, 1, 'hassan@123.com', 21203);

-- --------------------------------------------------------

--
-- Table structure for table `trv`
--

CREATE TABLE `trv` (
  `trv` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trv`
--

INSERT INTO `trv` (`trv`) VALUES
(12),
(14),
(20),
(17),
(19),
(15);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(20) NOT NULL,
  `unit` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unit`) VALUES
(1, 'Un'),
(2, 'Kg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `function` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `avater` varchar(255) NOT NULL DEFAULT '0.jpg',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `fname`, `lname`, `phone`, `email`, `function`, `role_id`, `avater`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'admin', 'c1ae193b8eb46a0d855ba77094e7dd2077f63f8a', 'Eslam', 'El-badry', 99999999, 'admin@123.com', 'admin', 1, '1.jpg', '2017-06-22 11:23:07', '2017-06-22 11:23:07', 1, 1),
(2, 'developers', '9aed375ba4786562a0b552632a7486aea10d6068', 'ahmed', 'elbadry', 666666666, 'developer@123.com', 'developer', 2, '2.jpg', '2017-06-22 11:31:54', '2017-06-22 11:31:54', 1, 1),
(3, 'kemo', '0b54b1f159c4e4e1a913a85cd9329bc02d45b10f', 'ahmed', 'kemo said', 555555555, 'kemo@123.com', 'Front-end developer', 2, '3.jpg', '2017-06-23 11:34:10', '2017-06-23 11:34:10', 1, 1),
(7, 'ramdan', '648112a5c2c2f6e10627d6635fbac010884f1def', 'ahmed', 'ramdan', 888888888, 'ramdan@123.com', 'manager', 4, '4.jpg', '2017-06-24 10:02:22', '2017-06-24 10:02:22', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prs_clt`
--
ALTER TABLE `prs_clt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pr_clt_arts`
--
ALTER TABLE `pr_clt_arts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qoutation_clt`
--
ALTER TABLE `qoutation_clt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppleries`
--
ALTER TABLE `suppleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
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
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `prs_clt`
--
ALTER TABLE `prs_clt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pr_clt_arts`
--
ALTER TABLE `pr_clt_arts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `qoutation_clt`
--
ALTER TABLE `qoutation_clt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `suppleries`
--
ALTER TABLE `suppleries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
