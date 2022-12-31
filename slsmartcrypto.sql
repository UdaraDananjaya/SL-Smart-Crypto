-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 10, 2021 at 02:13 AM
-- Server version: 5.7.23-23
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `claringt_slsmartcrypto`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'demo', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `districts` varchar(50) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `price` varchar(10) NOT NULL,
  `wallet` varchar(50) NOT NULL,
  `neg_price` varchar(5) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_phone` varchar(20) NOT NULL,
  `hide_phone` varchar(5) NOT NULL,
  `post_type` varchar(20) NOT NULL,
  `mark_per` varchar(5) NOT NULL,
  `top` varchar(5) NOT NULL,
  `approval` varchar(5) NOT NULL,
  `paid` varchar(10) NOT NULL,
  `paid_id` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `slug` varchar(30) NOT NULL,
  `description` varchar(100) NOT NULL,
  `picture` varchar(50) NOT NULL,
  `value` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `active` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `picture`, `value`, `type`, `active`) VALUES
(1, 'BTC', 'BTC', 'BIC is the best Crypto', 'icon/BITCOIN.png', '100000000', 'Crypto', 'Yes'),
(2, 'ETH', 'ETH', 'ETH is the best Crypto', 'icon/ETHEREUM.png', '100000000', 'Crypto', 'Yes'),
(3, 'TER', 'TER', 'TER is the best Crypto\r\n\r\n', 'icon/TETHER.png', '100000000', 'Crypto', 'Yes'),
(4, 'BIC', 'BIC', 'BINANCE COIN is the best Crypto\r\n\r\n', 'icon/BINANCE_COIN.png', '100000000', 'Crypto', 'Yes'),
(5, 'DOC', 'DOC', 'DOGECOIN is the best Crypto\r\n\r\n', 'icon/DOGECOIN.png', '100000000', 'Crypto', 'Yes'),
(6, 'BCC', 'BCC', 'BITCOIN_CASH is the best Crypto\r\n\r\n', 'icon/BITCOIN_CASH.png', '100000000', 'Crypto', 'Yes'),
(7, 'LTC', 'LTC', 'LITECOINis the best Crypto\r\n\r\n', 'icon/LITECOIN.png', '100000000', 'Crypto', 'Yes'),
(8, 'TRN', 'TRN', 'TRON is the best Crypto\r\n\r\n', 'icon/TRON.png', '100000000', 'Crypto', 'Yes'),
(9, 'XRP', 'XRP', 'XRP is the best Crypto\r\n\r\n', 'icon/XRP.png', '100000000', 'Crypto', 'Yes'),
(10, 'XLM', 'XLM', 'XLM is the best Crypto\r\n\r\n', 'icon/XLM.png', '100000000', 'Crypto', 'Yes'),
(11, 'DSH', 'DSH', 'DASH is the best Crypto\r\n\r\n', 'icon/DASH.png', '100000000', 'Crypto', 'Yes'),
(12, 'ESO', 'ESO', 'ESO is the best Crypto\r\n\r\n', 'icon/ESO.png', '100000000', 'Crypto', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `id` int(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `price` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id`, `name`, `description`, `price`) VALUES
(1, 'Free', 'Free pacage ', '0');

-- --------------------------------------------------------

--
-- Table structure for table `payhere_cre`
--

CREATE TABLE `payhere_cre` (
  `Id` int(20) NOT NULL,
  `payhere_merchant_id` varchar(50) NOT NULL,
  `payhere_secret` varchar(50) NOT NULL,
  `payhere_currency` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(20) NOT NULL,
  `method` varchar(20) NOT NULL,
  `payment_id` varchar(50) NOT NULL,
  `payment` varchar(50) NOT NULL,
  `ref` varchar(50) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `system`
--

CREATE TABLE `system` (
  `id` int(10) NOT NULL,
  `value1` varchar(255) NOT NULL,
  `value2` varchar(255) NOT NULL,
  `value3` varchar(255) NOT NULL,
  `value4` varchar(255) NOT NULL,
  `value5` varchar(255) NOT NULL,
  `value6` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system`
--

INSERT INTO `system` (`id`, `value1`, `value2`, `value3`, `value4`, `value5`, `value6`) VALUES
(1, 'S L Smart Crypto', 'slsmartcrypto@gmail.com', 'slsmartcrypto004', 'test', 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `phone_hidden` varchar(10) NOT NULL,
  `country` varchar(50) NOT NULL,
  `verified_email` varchar(10) NOT NULL,
  `token` varchar(50) NOT NULL,
  `blocked` varchar(10) NOT NULL,
  `referral_code` varchar(50) NOT NULL,
  `ref_count` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system`
--
ALTER TABLE `system`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
