-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 31, 2021 at 08:06 PM
-- Server version: 5.7.35-cll-lve
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `afrovib1_Dataplan1`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `accountname` varchar(255) NOT NULL,
  `accountnumber` varchar(255) NOT NULL,
  `bankname` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password1` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `username`, `password1`, `status`) VALUES
(1, 'olufolashayo@gmail.com', 'Tifeh', 'Perpetual1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `airtime`
--

CREATE TABLE `airtime` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `network` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `pay` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `airtime`
--

INSERT INTO `airtime` (`id`, `username`, `network`, `amount`, `pay`, `status`, `mobile`, `type`, `date`) VALUES


-- --------------------------------------------------------

--
-- Table structure for table `api`
--

CREATE TABLE `api` (
  `id` int(11) NOT NULL,
  `apikey` varchar(255) NOT NULL,
  `host` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `api`
--

-- INSERT INTO `api` (`id`, `apikey`, `host`, `username`, `password`) VALUES


-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` int(11) NOT NULL,
  `price` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `price`) VALUES
(1, '<p>WEMA BANK</p>\r\n\r\n<ul>\r\n	<li><a class=\"nav-link\" href=\"#profile\" id=\"profile-tab\">UBA</a></li>\r\n</ul>\r\n\r\n<div>\r\n<div>\r\n<div>\r\n<div><img alt=\"Visa Logo\" src=\"https://upload.wikimedia.org/wikipedia/en/e/ef/Wema_Bank_Plc.jpg\" style=\"height:60px\" />\r\n<h2>Account Number:0250059780</h2>\r\n\r\n<div>\r\n<div>\r\n<h3>Account Name: <!--?php echo $web[\'name\'];?--> - <!--?php echo $row[\'name\'];?--></h3>\r\n\r\n<h3>Bank Name: WEMA BANK </h3>\r\n&nbsp;\r\n\r\n<div>Automated Bank Transfer</div>\r\n\r\n<p>Make transfer to this account to fund your wallet</p>\r\n</div>\r\n\r\n<div>\r\n<h3>?50</h3>\r\n\r\n<div>Charge</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div>\r\n<div>\r\n<div><img alt=\"Rolex Logo\" src=\"https://1000logos.net/wp-content/uploads/2017/05/Rolex-logo.png\" style=\"height:60px\" />\r\n<h2>Account Number:2122889819</h2>\r\n\r\n<div>\r\n<div>\r\n<h3>Account Name: <!--?php echo $web[\'name\'];?--> - <!--?php echo $row[\'name\'];?--></h3>\r\n\r\n<h3>Bank Name: UBA</h3>\r\n&nbsp;\r\n\r\n<div>Automated Bank Transfer</div>\r\n\r\n<p>Make transfer to this account to fund your wallet</p>\r\n</div>\r\n\r\n<div>\r\n<h3>?50</h3>\r\n\r\n<div>Charge</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<p>&quot; required&gt;</p>\r\n\r\n<p>&quot; required&gt;</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `cable`
--

CREATE TABLE `cable` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `plans` varchar(255) NOT NULL,
  `transid` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `type`) VALUES
(1, 'MTN', 'Airtime TopUp'),
(2, 'GLO', 'Airtime TopUp'),
(3, 'MTN', 'Data Subcription'),
(4, 'DSTV', 'Cable Subcription'),
(5, 'GOTV', 'Cable Subcription'),
(6, 'AIRTEL', 'Airtime TopUp'),
(7, 'AIRTEL', 'Data Subcription'),
(8, 'GLO', 'Data Subcription'),
(9, '9MOBILE', 'Airtime TopUp'),
(10, '9MOBILE', 'Data Subcription');

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`id`, `code`, `amount`, `username`, `date`, `status`) VALUES


-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `ref` varchar(255) NOT NULL,
  `password1` varchar(255) NOT NULL,
  `password2` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `deposit`
--

CREATE TABLE `deposit` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `charge` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `trans` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `general`
--

CREATE TABLE `general` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` mediumtext NOT NULL,
  `bmobile` mediumtext NOT NULL,
  `nmobile` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` mediumtext NOT NULL,
  `facebook` mediumtext NOT NULL,
  `twitter` mediumtext NOT NULL,
  `instergram` mediumtext NOT NULL,
  `youtube` mediumtext NOT NULL,
  `web` mediumtext NOT NULL,
  `copy` varchar(255) NOT NULL,
  `notif` mediumtext NOT NULL,
  `whatlink` mediumtext NOT NULL,
  `whatgroup` mediumtext NOT NULL,
  `footer` mediumtext NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `general`
--

INSERT INTO `general` (`id`, `image`, `name`, `mobile`, `bmobile`, `nmobile`, `phone`, `email`, `address`, `facebook`, `twitter`, `instergram`, `youtube`, `web`, `copy`, `notif`, `whatlink`, `whatgroup`, `footer`, `status`) VALUES


-- --------------------------------------------------------

--
-- Table structure for table `kyc`
--

CREATE TABLE `kyc` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kyc`
--

INSERT INTO `kyc` (`id`, `username`, `bank`, `name`, `number`) VALUES

-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

CREATE TABLE `mail` (
  `id` int(11) NOT NULL,
  `host` varchar(255) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mail`
--

INSERT INTO `mail` (`id`, `host`, `sender`, `username`, `password`) VALUES
(1, 'smtp.gmail.com', 'EllaComm Networks', 'adexdeveloper88@gmail.com ', 'Ade123jesuyemi@88');

-- --------------------------------------------------------

--
-- Table structure for table `pay`
--

CREATE TABLE `pay` (
  `id` int(11) NOT NULL,
  `fsecret` varchar(255) NOT NULL,
  `psecrect` varchar(255) NOT NULL,
  `plivekey` varchar(255) NOT NULL,
  `min` varchar(255) NOT NULL,
  `max` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pay`
--

INSERT INTO `pay` (`id`, `fsecret`, `psecrect`, `plivekey`, `min`, `max`) VALUES


-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` int(11) NOT NULL,
  `cid` varchar(255) NOT NULL,
  `did` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `cid`, `did`, `name`, `price`) VALUES
(15, 'Airtime TopUp', '1', '50 NAIRA AIRTIME', '49'),
(16, 'Airtime TopUp', '1', '100 NAIRA AIRTIME', '98'),
(17, 'Airtime TopUp', '1', '150 NAIRA AIRTIME', '147'),
(18, 'Airtime TopUp', '1', '200 NAIRA AIRTIME', '196'),
(19, 'Data Subcription', '3', '500.0MB 30 DAYS', '150'),
(20, 'Data Subcription', '3', '1.0GB 30 DAYS', '260'),
(21, 'Data Subcription', '3', '2.0GB 30 DAYS', '550'),
(22, 'Data Subcription', '3', '3.0GB 30 DAYS', '750'),
(23, 'Data Subcription', '3', '5.0GB 30 DAYS', '1300'),
(24, 'Data Subcription', '3', '10.0GB 30 DAYS', '2600'),
(25, 'Data Subcription', '3', '20.0GB 30 DAYS', '5100'),
(26, 'Data Subcription', '3', '30.0GB 60 DAYS', '8500'),
(27, 'Data Subcription', '3', '40.0GB 30 DAYS', '10500'),
(28, 'Data Subcription', '3', '75.0GB 30 DAYS', '15500'),
(29, 'Data Subcription', '3', '100.0GB 60 DAYS', '20500'),
(30, 'Data Subcription', '3', '120.0GB 30 DAYS', '20500'),
(31, 'Data Subcription', '3', '160.0GB 60 DAYS', '30500'),
(32, 'Data Subcription', '3', '200.0GB 30 DAYS', '30500'),
(33, 'Data Subcription', '3', '400.0GB 90 DAYS', '50500'),
(34, 'Data Subcription', '3', '600.0GB 90 DAYS', '75500'),
(35, 'Data Subcription', '10', '1.0GB  07 DAYS', '550'),
(36, 'Data Subcription', '10', '7.0GB 07 DAYS', '1600'),
(37, 'Data Subcription', '10', '500.0MB MONTLY', '550'),
(38, 'Data Subcription', '10', '1.5GB MONTLY', '950'),
(39, 'Data Subcription', '10', '2.0GB MONTHLY', '1100'),
(40, 'Data Subcription', '10', '3.0GB MONTHLY', '1500'),
(41, 'Data Subcription', '10', '4.5GB MONTHLY', '1800'),
(42, 'Data Subcription', '10', '11.0GB MONTHLY', '2600'),
(43, 'Data Subcription', '10', '15.0GB MONTHLY', '3200'),
(44, 'Data Subcription', '10', '40.0GB MONTHLY', '6300'),
(45, 'Data Subcription', '10', '75.0GB MONTHLY', '9700'),
(46, 'Data Subcription', '7', '750MB 30 DAYS', '480'),
(47, 'Data Subcription', '7', '1.35GB 30 DAYS', '950'),
(48, 'Data Subcription', '7', '2.0GB  30 DAYS', '1150'),
(49, 'Data Subcription', '7', '3.0GB  30 DAYS', '1450'),
(50, 'Data Subcription', '7', '4.5GB 30 DAYS', '1900'),
(51, 'Data Subcription', '7', '6.0GB 30 DAYS', '2400'),
(52, 'Data Subcription', '7', '8.0GB 30 DAYS', '2850'),
(53, 'Data Subcription', '7', '11.0GB 30 DAYS', '3800'),
(54, 'Data Subcription', '7', '15.0GB 30 DAYS', '5100'),
(55, 'Data Subcription', '7', '40.0GB  30 DAYS', '9400'),
(56, 'Data Subcription', '7', '75.0GB  30 DAYS', '15500'),
(57, 'Data Subcription', '7', '110.0GB 30 DAYS', '19500'),
(58, 'Data Subcription', '8', '1.35GB  30 DAYS', '550'),
(59, 'Data Subcription', '8', '2.5GB 30 DAYS', '1000'),
(60, 'Data Subcription', '8', '4.1GB 30 DAYS', '1500'),
(61, 'Data Subcription', '8', '5.8GB 30 DAYS', '1900'),
(62, 'Data Subcription', '8', '7.7GB 30 DAYS', '2400'),
(63, 'Data Subcription', '8', '10.0GB  30 DAYS', '2800'),
(64, 'Data Subcription', '8', '13.25GB 30 DAYS', '4050'),
(65, 'Data Subcription', '8', '18.25GB 30 DAYS', '5050'),
(66, 'Data Subcription', '8', '29.5GB 30 DAYS', '7250'),
(67, 'Data Subcription', '8', '50.0GB 30 DAYS', '10500'),
(68, 'Data Subcription', '8', '93.0GB 30 DAYS', '15500'),
(69, 'Data Subcription', '8', '119.0GB 30 DAYS', '18500'),
(70, 'Data Subcription', '8', '138.0GB 30 DAYS', '20500'),
(71, 'Data Subcription', '8', '225GB 30 DAYS', '30500'),
(72, 'Data Subcription', '8', '300GB 30 DAYS', '36500'),
(73, 'Data Subcription', '8', '425GB 30 DAYS', '50500'),
(74, 'Data Subcription', '8', '525GB 30 DAYS', '60500'),
(75, 'Data Subcription', '8', '675GB 30 DAYS', '75500'),
(76, 'Data Subcription', '8', '1.0TB 30 DAYS', '100500'),
(77, 'Airtime TopUp', '1', '250 NAIRA AIRTIME', '246'),
(78, 'Airtime TopUp', '1', '300 NAIRA AIRTIME', '295'),
(79, 'Airtime TopUp', '1', '400 NAIRA AIRTIME', '395'),
(80, 'Airtime TopUp', '1', '450 NAIRA AIRTIME', '445'),
(81, 'Airtime TopUp', '1', '500 NAIRA AIRTIME', '493'),
(82, 'Airtime TopUp', '2', '50 NAIRA  AIRTIME', '49'),
(83, 'Airtime TopUp', '2', '100 NAIRA  AIRTIME', '98'),
(84, 'Airtime TopUp', '2', '150 NAIRA  AIRTIME', '147'),
(85, 'Airtime TopUp', '2', '200 NAIRA  AIRTIME', '196'),
(86, 'Airtime TopUp', '2', '250 NAIRA  AIRTIME', '246'),
(87, 'Airtime TopUp', '2', '300 NAIRA  AIRTIME', '295'),
(88, 'Airtime TopUp', '2', '400 NAIRA  AIRTIME', '395'),
(89, 'Airtime TopUp', '2', '450 NAIRA  AIRTIME', '445'),
(90, 'Airtime TopUp', '2', '500 NAIRA  AIRTIME', '493'),
(91, 'Airtime TopUp', '6', '50  NAIRA AIRTIME', '49'),
(92, 'Airtime TopUp', '6', '100  NAIRA AIRTIME', '98'),
(93, 'Airtime TopUp', '6', '150  NAIRA AIRTIME', '147'),
(94, 'Airtime TopUp', '6', '200  NAIRA AIRTIME', '196'),
(95, 'Airtime TopUp', '6', '250  NAIRA AIRTIME', '246'),
(96, 'Airtime TopUp', '6', '300  NAIRA AIRTIME', '295'),
(97, 'Airtime TopUp', '6', '400  NAIRA AIRTIME', '395'),
(98, 'Airtime TopUp', '6', '450  NAIRA AIRTIME', '445'),
(99, 'Airtime TopUp', '6', '500  NAIRA AIRTIME', '493'),
(100, 'Airtime TopUp', '9', '50 NAIRA CARD', '49'),
(101, 'Airtime TopUp', '9', '100 NAIRA CARD', '98'),
(102, 'Airtime TopUp', '9', '150 NAIRA CARD', '147'),
(103, 'Airtime TopUp', '9', '200 NAIRA CARD', '196'),
(104, 'Airtime TopUp', '9', '250 NAIRA CARD', '246'),
(105, 'Airtime TopUp', '9', '300 NAIRA CARD', '295'),
(106, 'Airtime TopUp', '9', '400 NAIRA CARD', '395'),
(107, 'Airtime TopUp', '9', '450 NAIRA CARD', '445'),
(108, 'Airtime TopUp', '9', '500 NAIRA CARD', '493');

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE `price` (
  `id` int(11) NOT NULL,
  `network` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `reseller` varchar(255) NOT NULL,
  `top` varchar(255) NOT NULL,
  `api` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `price`
--

INSERT INTO `price` (`id`, `network`, `name`, `price`, `reseller`, `top`, `api`, `day`) VALUES
(11, 'MTN', '500.0MB', '150', '0', '0', '0', '30 DAYS'),
(12, 'MTN', '1.0GB ', '260', '0', '0', '0', '30 DAYS'),
(13, 'MTN', '2.0GB', '550', '0', '0', '0', '30 DAYS'),
(14, 'MTN', '3.0GB', '750', '0', '0', '0', '30 DAYS'),
(15, 'MTN', '5.0GB', '1300', '0', '0', '0', '30 DAYS'),
(16, 'MTN', '10.0GB', '2600', '0', '0', '0', '30 DAYS'),
(17, 'MTN', '20.0GB', '5100', '0', '0', '0', '30 DAYS'),
(18, 'MTN', '30.0GB', '8500', '0', '0', '0', '60 DAYS'),
(19, 'MTN', '40.0GB', '10500', '0', '0', '0', '30 DAYS'),
(20, 'MTN', '75.0GB', '15500', '0', '0', '0', '30 DAYS'),
(21, 'MTN', '100.0GB', '20500', '0', '0', '0', '60 DAYS'),
(22, 'MTN', '120.0GB', '20500', '0', '0', '0', '30 DAYS'),
(23, 'MTN', '160.0GB', '30500', '0', '0', '0', '60 DAYS'),
(24, 'MTN', '200.0GB', '30500', '0', '0', '0', '30 DAYS'),
(25, 'MTN', '400.0GB', '50500', '0', '0', '0', '90 DAYS'),
(26, 'MTN', '600.0GB', '75500', '0', '0', '0', '90 DAYS'),
(27, '9MOBILE', '1.0GB ', '550', '0', '0', '0', '07 DAYS'),
(28, '9MOBILE', '7.0GB', '1600', '0', '0', '0', '07 DAYS'),
(29, '9MOBILE', '500.0MB', '550', '0', '0', '0', '30 DAYS'),
(30, '9MOBILE', '1.5GB', '950', '0', '0', '0', '30 DAYS'),
(31, '9MOBILE', '2.0GB', '1100', '0', '0', '0', '30 DAYS'),
(32, '9MOBILE', '3.0GB', '1500', '0', '0', '0', '30 DAYS'),
(33, '9MOBILE', '4.5GB', '1800', '0', '0', '0', '30 DAYS'),
(34, '9MOBILE', '11.0GB', '2600', '0', '0', '0', '30 DAYS'),
(35, '9MOBILE', '15.0GB', '3200', '0', '0', '0', '30 DAYS'),
(36, '9MOBILE', '40.0GB', '6300', '0', '0', '0', '30 DAYS'),
(37, '9MOBILE', '75.0GB', '9700', '0', '0', '0', '30 DAYS'),
(38, 'AIRTEL', '750MB', '480', '0', '0', '0', '30 DAYS'),
(39, 'AIRTEL', '1.35GB', '950', '0', '0', '0', '30 DAYS'),
(40, 'AIRTEL', '2.0GB', '1150', '0', '0', '0', '30 DAYS'),
(41, 'AIRTEL', '3.0GB', '1450', '0', '0', '0', '30 DAYS'),
(42, 'AIRTEL', '4.5GB', '1900', '0', '0', '0', '30 DAYS'),
(43, 'AIRTEL', '6.0GB', '2400', '0', '0', '0', '30 DAYS'),
(44, 'AIRTEL', '8.0GB', '2850', '0', '0', '0', '30 DAYS'),
(45, 'AIRTEL', '11.0GB', '3800', '0', '0', '0', '30 DAYS'),
(46, 'AIRTEL', '15.0GB', '5100', '0', '0', '0', '30 DAYS'),
(47, 'AIRTEL', '40.0GB', '9400', '0', '0', '0', '30 DAYS'),
(48, 'AIRTEL', '75.0GB', '15500', '0', '0', '0', '30 DAYS'),
(49, 'AIRTEL', '110.0GB', '19500', '0', '0', '0', '30 DAYS'),
(50, 'GLO', '1.35GB', '550', '0', '0', '0', '30 DAYS'),
(51, 'GLO', '2.5GB', '1000', '0', '0', '0', '30 DAYS'),
(52, 'GLO', '4.1GB ', '1500', '0', '0', '0', '30 DAYS'),
(53, 'GLO', '5.8GB', '1900', '0', '0', '0', '30 DAYS'),
(54, 'GLO', '7.7GB', '2400', '0', '0', '0', '30 DAYS'),
(55, 'GLO', '10.0GB', '2800', '0', '0', '0', '30 DAYS'),
(56, 'GLO', '13.25GB', '4100', '0', '0', '0', '30 DAYS'),
(57, 'GLO', '18.25GB', '5100', '0', '0', '0', '30 DAYS'),
(58, 'GLO', '29.5GB', '7250', '0', '0', '0', '30 DAYS'),
(59, 'GLO', '50.0GB', '10500', '0', '0', '0', '30 DAYS'),
(60, 'GLO', '93.0GB', '15500', '0', '0', '0', '30 DAYS'),
(61, 'GLO', '119.0GB', '18500', '0', '0', '0', '30 DAYS'),
(62, 'GLO', '138.0GB', '20500', '0', '0', '0', '30 DAYS'),
(63, 'GLO', '225GB', '30500', '0', '0', '0', '30 DAYS'),
(64, 'GLO', '300GB', '36500', '0', '0', '0', '30 DAYS'),
(65, 'GLO', '425GB', '50500', '0', '0', '0', '30 DAYS'),
(66, 'GLO', '525GB', '60500', '0', '0', '0', '30 DAYS'),
(67, 'GLO', '675GB', '75500', '0', '0', '0', '30 DAYS'),
(68, 'GLO', '1.0TB', '100500', '0', '0', '0', '30 DAYS');

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `message` mediumtext NOT NULL,
  `status` mediumtext NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`id`, `username`, `message`, `status`, `date`) VALUES


-- --------------------------------------------------------

--
-- Table structure for table `referral`
--

CREATE TABLE `referral` (
  `id` int(11) NOT NULL,
  `mid` varchar(255) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `refuser` varchar(255) NOT NULL,
  `referprice` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE `sms` (
  `id` int(11) NOT NULL,
  `host` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `api` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `id` int(11) NOT NULL,
  `adex` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`id`, `adex`) VALUES
(1, '<h2>EllaComm Networks USER AGREEMENT</h2>\r\n<p><strong>(Owners of EllaComm Networks)</strong></p>\r\n<p><br></p>\r\n<h3>1. ACCEPTANCE OF TERMS</h3>\r\n<p><strong>FOR EllaComm Networks</strong> provides a collection of online resources, including but not limited to data bundle internet/mobile browsing, air time/recharge cards, classified&nbsp;</p>\r\n<p>ads, forums, and various email services, (referred to hereafter as &quot;the&nbsp;</p>\r\n<p>Service&quot;) subject to the following Terms of Use (&quot;TOU&quot;). By using the Service&nbsp;</p>\r\n<p>in any way, you are agreeing to comply with the TOU. In addition, when using&nbsp;</p>\r\n<p>particular <strong>EllaComm Networks</strong> services, you agree to abide by any applicable posted&nbsp;</p>\r\n<p>guidelines for all <strong>EllaComm Networks</strong>services, which may change from time to time. &nbsp;</p>\r\n<p>Should you object to any term or condition of the TOU, any guidelines,&nbsp;</p>\r\n<p>or any subsequent modifications thereto or become dissatisfied with <strong>EllaComm Networks</strong></p>\r\n<p>in any way, your only recourse is to immediately discontinue use of <strong>EllaComm Networks. &nbsp;</strong></p>\r\n<p><strong>EllaComm Networks</strong> has the right, but is not obligated, to strictly enforce the TOU&nbsp;</p>\r\n<p>through self-help, community moderation, active investigation, litigation and&nbsp;</p>\r\n<p>prosecution.</p>\r\n<p><br></p>\r\n<h3>2. MODIFICATIONS TO THIS AGREEMENT</h3>\r\n<p>We reserve the right, at our sole discretion, to change, modify or otherwise&nbsp;</p>\r\n<p>alter these terms and conditions at any time. &nbsp;Such modifications shall become&nbsp;</p>\r\n<p>effective immediately upon the posting thereof. You must review this agreement&nbsp;</p>\r\n<p>on a regular basis to keep yourself apprised of any changes.</p>\r\n<p><br></p>\r\n<h3>3. CONDUCT</h3>\r\n<p>You agree not &nbsp;to:</p>\r\n<p>1) create multiple account or violate any prohibition/restriction/limit placed on accounts on our website as this will lead to termination of your account and you will forfeit all funds in your account;</p>\r\n<p>2) contact anyone who has asked not to be contacted, or make unsolicited contact with anyone for any commercial purpose;</p>\r\n<p>3) &quot;Stalk&quot; or otherwise harass anyone;</p>\r\n<p>&nbsp;4) collect personal data about other users for commercial or unlawful purposes;</p>\r\n<p>5) Use automated means, including spiders, robots, crawlers, data mining tools, or the like to download data from the Service - unless expressly permitted by <strong>EllaComm Networks;</strong></p>\r\n<p><br></p>\r\n<p>6) Post non-local or otherwise irrelevant Content, repeatedly post the same or similar Content or otherwise impose an unreasonable or is proportionately large load on our infrastructure;</p>\r\n<p><br></p>\r\n<p>7) Post the same item or service in more than one classified category or forum, or in more than one metropolitan area;</p>\r\n<p><br></p>\r\n<p>8) attempt to gain unauthorized access to <strong>EllaComm Networks&apos;s</strong> computer systems or engage in any activity that disrupts, diminishes the quality of, interferes with the performance of, or impairs the functionality of, the Service or the <strong>EllaComm Networks</strong> website; or</p>\r\n<p><br></p>\r\n<p>9) Use any form of automated device or computer program that enables the</p>\r\n<p>Submission of postings on <strong>EllaComm Networks</strong> without each posting being manually entered by the author thereof (an &quot;automated posting device&quot;), including without limitation, the use of any such automated posting device to submit postings in bulk, or for automatic submission of postings at regular intervals.</p>\r\n<p><br></p>\r\n<p>10) Use any form of automated device or computer program (&quot;flagging tool&quot;) that enables the use of <strong>EllaComm Networks&apos;s</strong> &quot;flagging system&quot; or other community moderation systems without each flag being manually entered by the person that initiates the flag (an &quot;automated flagging device&quot;), or use the flagging tool to remove posts of competitors, or to remove posts without a good faith belief that the post being flagged violates these TOU;</p>\r\n<p><br></p>\r\n<p>Additionally, you agree not to post, email, or otherwise make available Content:</p>\r\n<p><br></p>\r\n<p>11) that is unlawful, harmful, threatening, abusive, harassing, defamatory, libelous, invasive of another&apos;s privacy, or is harmful to minors in any way;</p>\r\n<p><br></p>\r\n<p>12) that is pornographic or depicts a human being engaged in actual sexual conduct</p>\r\n<p>including but not limited to (i) sexual intercourse, including genital-genital, oral-genital, anal-genital, or oral-anal, whether between persons of the same or opposite sex, or (ii) bestiality, or (iii) masturbation, or (iv) sadistic or masochistic abuse, or (v) lascivious exhibition of the genitals or pubic area of any person;</p>\r\n<p><br></p>\r\n<p>13) That harasses, degrades, intimidates or is hateful toward an individual or group of individuals on the basis of religion, gender, sexual orientation, race, ethnicity, age, or disability;</p>\r\n<p><br></p>\r\n<p>14) That violates the Fair Housing Act by stating, in any notice or ad for the sale or rental of any dwelling, a discriminatory preference based on race, color, national origin, religion, sex, familial status or handicap (or violates any state or local law prohibiting discrimination on the basis of these or other characteristics);</p>\r\n<p><br></p>\r\n<p>15) That violates federal, state, or local equal employment opportunity laws, including but not limited to, stating in any advertisement for employment a preference or requirement based on race, color, religion, sex, national origin, age, or disability.</p>\r\n<p><br></p>\r\n<p>16) With respect to employers that employ four or more employees, that violates the anti-discrimination provision of the Immigration anNationality Act, including requiring Nigeria citizenship or lawful permanent residency (green card status) as a condition for employment unless otherwise required in order to comply with law, regulation, executive order, or federal, state, or local government contract.</p>\r\n<p><br></p>\r\n<p>17) That impersonates any person or entity, including, but not limited to, a <strong>EllaComm Networks</strong> employee, or falsely states or otherwise misrepresents your affiliation with a person or entity (this provision does not apply to Content that constitutes lawful non-deceptive parody of public figures.);</p>\r\n<p><br></p>\r\n<p>18) That includes personal or identifying information about another person without that person&apos;s explicit consent;</p>\r\n<p><br></p>\r\n<p>19) that is false, deceptive, misleading, deceitful, mis-informative, or constitutes &quot;bait and switch&quot;;</p>\r\n<p><br></p>\r\n<p>20) that infringes any patent, trademark, trade secret, copyright or other proprietary rights of any party, or Content that you do not have a right to make available under any law or under contractual or fiduciary relationships;</p>\r\n<p><br></p>\r\n<p>21) That constitutes or contains &nbsp;&quot;affiliate marketing,&quot; &quot;link referral code,&quot;</p>\r\n<p>&quot;junk mail,&quot; &quot;spam,&quot; &quot;chain letters,&quot; &quot;pyramid schemes,&quot; or unsolicited commercial advertisement;</p>\r\n<p><br></p>\r\n<p>22) That constitutes or contains any form of advertising or solicitation if:</p>\r\n<p>posted in areas of the <strong>HEllaComm Networks</strong> sites which are not designated for such</p>\r\n<p>purposes; or emailed to <strong>EllaComm Networks</strong>users who have not indicated in writing that</p>\r\n<p>it is ok to contact them about other services, products or commercial interests.</p>\r\n<p><br></p>\r\n<p>23) That includes links to commercial services or web sites, except as allowed</p>\r\n<p>in &quot;services&quot;;</p>\r\n<p><br></p>\r\n<p>24) That advertises any illegal service or the sale of any items the sale of which is prohibited or restricted by any applicable law, including withoutlimitation items the sale of which is prohibited</p>\r\n<p><br></p>\r\n<p>25) That contains software viruses or any other computer code, files or programs designed to interrupt, destroy or limit the functionality of any computer software or hardware or telecommunications equipment;</p>\r\n<p><br></p>\r\n<p>26) that disrupts the normal flow of dialogue with an excessive amount of</p>\r\n<p>Content (flooding attack) to the Service, or that otherwise negatively</p>\r\n<p>affects other users&apos; ability to use the Service; or</p>\r\n<p><br></p>\r\n<p>27) that employs misleading email addresses, or forged headers or otherwise</p>\r\n<p>manipulated identifiers in order to disguise the origin of Content</p>\r\n<p>transmitted through the Service.</p>\r\n<p>&nbsp;</p>\r\n<h3>4. NO SPAM POLICY</h3>\r\n<p><br></p>\r\n<p>You understand and agree that sending unsolicited email advertisements to</p>\r\n<p><strong>EllaComm Networks/strong> email addresses or through <strong>EllaComm Networks/strong> computer systems, which is</p>\r\n<p>expressly prohibited by these Terms, will use or cause to be used servers</p>\r\n<p>located in California. &nbsp;Any unauthorized use of <strong>EllaComm Networks/strong> computer systems</p>\r\n<p>is a violation of these Terms and certain federal and state laws. &nbsp;Such violations may subject the sender and his or her agents to civil and criminal penalties.</p>\r\n<p><br></p>\r\n<p><br></p>\r\n<p><strong>EllaComm Networks/strong></p>\r\n<p><br></p>\r\n<p style=\"line-height: 1;\">House 2, Praiseville Crescent Abule Orun Road,</p>\r\n<p style=\"line-height: 1;\">Idi Ori, Abeokuta</p>\r\n<p style=\"line-height: 1;\">&nbsp;Ogun State Nigeria.</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `theme`
--

CREATE TABLE `theme` (
  `id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `theme`
--

INSERT INTO `theme` (`id`, `status`) VALUES
(1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `transid` varchar(255) NOT NULL,
  `network` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `plans` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `username`, `transid`, `network`, `mobile`, `service`, `plans`, `type`, `amount`, `status`, `date`) VALUES


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `ref` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `password1` varchar(255) NOT NULL,
  `password2` varchar(255) NOT NULL,
  `bal` varchar(255) NOT NULL,
  `refbal` varchar(255) NOT NULL,
  `kyc` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `email`, `phone`, `address`, `ref`, `status`, `password1`, `password2`, `bal`, `refbal`, `kyc`, `date`) VALUES
(),


--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `airtime`
--
ALTER TABLE `airtime`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `api`
--
ALTER TABLE `api`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cable`
--
ALTER TABLE `cable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposit`
--
ALTER TABLE `deposit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general`
--
ALTER TABLE `general`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kyc`
--
ALTER TABLE `kyc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mail`
--
ALTER TABLE `mail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pay`
--
ALTER TABLE `pay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referral`
--
ALTER TABLE `referral`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms`
--
ALTER TABLE `sms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `airtime`
--
ALTER TABLE `airtime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `api`
--
ALTER TABLE `api`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cable`
--
ALTER TABLE `cable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deposit`
--
ALTER TABLE `deposit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general`
--
ALTER TABLE `general`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kyc`
--
ALTER TABLE `kyc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mail`
--
ALTER TABLE `mail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pay`
--
ALTER TABLE `pay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `price`
--
ALTER TABLE `price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `referral`
--
ALTER TABLE `referral`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `sms`
--
ALTER TABLE `sms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `theme`
--
ALTER TABLE `theme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
