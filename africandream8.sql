-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 13, 2023 at 05:25 PM
-- Server version: 10.3.37-MariaDB-cll-lve
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `globali5_africandream7`
--

-- --------------------------------------------------------

--
-- Table structure for table `2cash`
--

CREATE TABLE `2cash` (
  `id` int(11) NOT NULL,
  `mtn` varchar(255) NOT NULL,
  `glo` varchar(255) NOT NULL,
  `airtel` varchar(255) NOT NULL,
  `9mobile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `2cash`
--

INSERT INTO `2cash` (`id`, `mtn`, `glo`, `airtel`, `9mobile`) VALUES
(1, '85', '76', '98', '90');

-- --------------------------------------------------------

--
-- Table structure for table `add_cable`
--

CREATE TABLE `add_cable` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `planid` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `cable` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `add_cable`
--

INSERT INTO `add_cable` (`id`, `name`, `planid`, `price`, `cable`) VALUES
(2, 'DSTV PADI', '123', '237', 'DSTV');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `username`, `password1`, `status`) VALUES
(1, 'admin@gmail.com', 'Admin', 'NewAdmin@$Africandream.com.ng', '1');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `airtime`
--

INSERT INTO `airtime` (`id`, `username`, `network`, `amount`, `pay`, `status`, `mobile`, `type`, `date`) VALUES
(1, 'Ibrahim56', 'MTN', '500', '425', '0', '09064523725', 'BANK TRANSFER', 'Friday 20<sup>th</sup>, January 2023 @ 10:43PM');

-- --------------------------------------------------------

--
-- Table structure for table `airtimeprice`
--

CREATE TABLE `airtimeprice` (
  `id` int(11) NOT NULL,
  `afpricemtn` varchar(255) NOT NULL,
  `afpriceglo` varchar(255) NOT NULL,
  `afpriceet` varchar(255) NOT NULL,
  `toppricemtn` varchar(255) NOT NULL,
  `toppriceglo` varchar(255) NOT NULL,
  `toppriceet` varchar(255) NOT NULL,
  `smartpricemtn` varchar(255) NOT NULL,
  `smartpriceglo` varchar(255) NOT NULL,
  `smartpriceet` varchar(255) NOT NULL,
  `afpriceair` varchar(255) NOT NULL,
  `toppriceair` varchar(255) NOT NULL,
  `smartpriceair` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `airtimeprice`
--

INSERT INTO `airtimeprice` (`id`, `afpricemtn`, `afpriceglo`, `afpriceet`, `toppricemtn`, `toppriceglo`, `toppriceet`, `smartpricemtn`, `smartpriceglo`, `smartpriceet`, `afpriceair`, `toppriceair`, `smartpriceair`) VALUES
(1, '98', '98', '98', '98', '98', '98', '99', '99', '99', '98', '98', '99');

-- --------------------------------------------------------

--
-- Table structure for table `airtime_lock`
--

CREATE TABLE `airtime_lock` (
  `id` int(11) NOT NULL,
  `mtn_vtu` varchar(255) NOT NULL,
  `glo_vtu` varchar(255) NOT NULL,
  `9mobile_vtu` varchar(255) NOT NULL,
  `airtel_vtu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `airtime_lock`
--

INSERT INTO `airtime_lock` (`id`, `mtn_vtu`, `glo_vtu`, `9mobile_vtu`, `airtel_vtu`) VALUES
(1, 'on', 'on', 'on', 'on ');

-- --------------------------------------------------------

--
-- Table structure for table `api`
--

CREATE TABLE `api` (
  `id` int(11) NOT NULL,
  `apikey` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `api`
--

INSERT INTO `api` (`id`, `apikey`) VALUES
(1, 'sIAG586CBCrC96Bn12b3CCqkvCB37xi1H5Ac4xJABgA3c04w8zDdyAChdEe7');

-- --------------------------------------------------------

--
-- Table structure for table `apiairtime`
--

CREATE TABLE `apiairtime` (
  `id` int(11) NOT NULL,
  `network` varchar(255) NOT NULL,
  `networkid` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `apiairtime`
--

INSERT INTO `apiairtime` (`id`, `network`, `networkid`, `price`) VALUES
(3, 'MTN', '1', '98'),
(4, 'GLO', ' 2', '98'),
(5, '9MOBILE', ' 3', '98'),
(6, 'AIRTEL', ' 4', '98');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` int(11) NOT NULL,
  `number` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `bankname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `number`, `name`, `bankname`) VALUES
(1, '0003531404', 'MUSA UMAR SANI', 'JAIZ BANK');

-- --------------------------------------------------------

--
-- Table structure for table `bankpayment`
--

CREATE TABLE `bankpayment` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `bankname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `bankpayment`
--

INSERT INTO `bankpayment` (`id`, `name`, `bankname`, `username`, `amount`, `number`, `status`, `date`) VALUES
(1, '', '', '', '', '', '2', ''),
(2, 'Ilyasu Musa ilyasu', 'JAIZ BANK', 'Musa1221', '5000', '0005056788', '0', 'Wednesday 27<sup>th</sup>, April 2022 @ 10:13PM');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cableapi`
--

CREATE TABLE `cableapi` (
  `id` int(11) NOT NULL,
  `cableid` varchar(255) NOT NULL,
  `cablename` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `cable` varchar(255) NOT NULL,
  `planid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cableapi`
--

INSERT INTO `cableapi` (`id`, `cableid`, `cablename`, `price`, `cable`, `planid`) VALUES
(42, '1', 'DStv Padi ', '1850', 'DSTV', 'dstv-padi'),
(43, '2', 'DSTV -YANGA', '2565', 'DSTV', 'dstv-yanga'),
(44, '3', 'Dstv Confam', '4615', 'DSTV', 'dstv-confam'),
(45, '4', 'DStv  Compact', '7900', 'DSTV', 'dstv79'),
(46, '5', 'DStv Premium', '18400', 'DSTV', 'dstv3'),
(47, '6', 'DStv Asia', '6200', 'DSTV', 'dstv6'),
(48, '7', 'DStv Compact Plus', '12400', 'DSTV', 'dstv7'),
(49, '8', 'DStv Premium-French ', '25550', 'DSTV', 'dstv9'),
(50, '9', 'DStv Premium-Asia ', '20500', 'DSTV', 'dstv10'),
(51, '10', 'DStv Confam + ExtraView', '7115', 'DSTV', 'confam-extra'),
(52, '11', 'DStv Yanga + ExtraView ', '5065', 'DSTV', 'yanga-extra'),
(53, '12', 'DStv Padi + ExtraView ', '4350', 'DSTV', 'padi-extra'),
(54, '13', 'DStv Compact + Asia ', '14100', 'DSTV', 'com-asia'),
(55, '14', 'DStv Compact + Extra View ', '10400', 'DSTV', 'dstv30'),
(56, '15', 'DStv Compact + French Touch ', '10200', 'DSTV', 'com-frenchtouc'),
(57, '16', 'DStv Premium - Extra View ', '20900', 'DSTV', 'dstv33'),
(58, '17', 'DStv Compact Plus - Asia ', '18600', 'DSTV', 'dstv40'),
(59, '18', 'DStv Compact + French Touch + ExtraView ', '12700', 'DSTV', 'com-frenchtouch-extra'),
(60, '19', 'DStv Compact + Asia + ExtraView ', '16600', 'DSTV', 'com-asia-extra'),
(61, '20', 'DStv Compact Plus + French Plus ', '20500', 'DSTV', 'dstv43'),
(62, '21', 'DStv Compact Plus + French Touch ', '14700', 'DSTV', 'complus-frenchtouch'),
(63, '22', 'DStv Compact Plus - Extra View ', '14900', 'DSTV', 'dstv45'),
(64, '23', 'DStv Compact Plus + FrenchPlus + Extra View ', '23000', 'DSTV', 'complus-french-extraview'),
(65, '24', 'DStv Compact + French Plus ', '16000', 'DSTV', 'dstv47'),
(66, '25', 'DStv Compact Plus + Asia + ExtraView ', '21100', 'DSTV', 'dstv48'),
(67, '26', 'DStv Premium + Asia + Extra View ', '23000', 'DSTV', 'dstv61'),
(68, '27', 'DStv Premium + French + Extra View ', '28000', 'DSTV', 'dstv62'),
(69, '28', 'DStv HDPVR Access Service ', '2500', 'DSTV', 'hdpvr-access-service'),
(70, '29', 'DStv French Plus Add-on ', '8100', 'DSTV', 'frenchplus-addon'),
(71, '30', 'DStv Asian Add-on ', '6200', 'DSTV', 'asia-addon'),
(72, '31', 'DStv French Touch Add-on ', '2300', 'DSTV', 'frenchtouch-addon'),
(73, '32', 'ExtraView Access ', '2500', 'DSTV', 'extraview-access'),
(74, '33', 'DStv French 11', '3260', 'DSTV', 'french11'),
(75, '34', 'Dstv Confam ', '4615', 'DSTV', 'dstv-confam'),
(76, '35', 'DStv  Compact ', '7900', 'DSTV', 'dstv79'),
(77, '36', 'DStv Premium ', '18400', 'DSTV', 'dstv3'),
(78, '37', 'DStv Asia ', '6200', 'DSTV', 'dstv6'),
(79, '38', 'DStv Compact Plus ', '12400', 'DSTV', 'dstv7'),
(80, '39', 'DStv Premium-French ', '25550', 'DSTV', 'dstv9'),
(81, '40', 'DStv Premium-Asia ', '20500', 'DSTV', 'dstv10'),
(82, '41', 'DStv Confam + ExtraView ', '7115', 'DSTV', 'confam-extra'),
(83, '42', 'DStv Yanga + ExtraView ', '5065', 'DSTV', 'yanga-extra'),
(84, '43', 'DStv Padi + ExtraView ', '4350', 'DSTV', 'padi-extra'),
(85, '44', 'DStv Compact + Asia ', '14100', 'DSTV', 'com-asia'),
(86, '45', 'DStv Compact + Extra View ', '10400', 'DSTV', 'dstv30'),
(87, '46', 'DStv Compact + French Touch ', '10200', 'DSTV', 'com-frenchtouch'),
(88, '47', 'DStv Premium - Extra View', '20900', 'DSTV', 'dstv33'),
(89, '48', 'DStv Compact Plus - Asia ', '18600', 'DSTV', 'dstv40'),
(90, '49', 'DStv Compact + Asia + ExtraView ', '16600', 'DSTV', 'com-asia-extra'),
(91, '50', 'DStv Compact Plus + French Plus ', '20500', 'DSTV', 'dstv43');

-- --------------------------------------------------------

--
-- Table structure for table `cablecharges`
--

CREATE TABLE `cablecharges` (
  `id` int(11) NOT NULL,
  `dstv` varchar(255) NOT NULL,
  `gotv` varchar(255) NOT NULL,
  `startime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cablecharges`
--

INSERT INTO `cablecharges` (`id`, `dstv`, `gotv`, `startime`) VALUES
(1, '100', '100', '100');

-- --------------------------------------------------------

--
-- Table structure for table `cable_lock`
--

CREATE TABLE `cable_lock` (
  `id` int(11) NOT NULL,
  `gotv` varchar(255) NOT NULL,
  `dstv` varchar(255) NOT NULL,
  `startime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cable_lock`
--

INSERT INTO `cable_lock` (`id`, `gotv`, `dstv`, `startime`) VALUES
(1, 'on', 'on ', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `cash_number`
--

CREATE TABLE `cash_number` (
  `id` int(11) NOT NULL,
  `mtn` varchar(255) NOT NULL,
  `glo` varchar(255) NOT NULL,
  `airtel` varchar(255) NOT NULL,
  `9mobile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cash_number`
--

INSERT INTO `cash_number` (`id`, `mtn`, `glo`, `airtel`, `9mobile`) VALUES
(1, '090', '070', '070', '070');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`id`, `code`, `amount`, `username`, `date`, `status`) VALUES
(1, '35677445778', '500', 'Babandauda', 'Saturday 28<sup>th</sup>, January 2023 @ 5:32PM', '0');

-- --------------------------------------------------------

--
-- Table structure for table `data_lock`
--

CREATE TABLE `data_lock` (
  `id` int(11) NOT NULL,
  `mtn_gifting` varchar(255) NOT NULL,
  `mtn_sme` varchar(255) NOT NULL,
  `glo_data` varchar(255) NOT NULL,
  `airtel_data` varchar(255) NOT NULL,
  `9mobile_data` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `data_lock`
--

INSERT INTO `data_lock` (`id`, `mtn_gifting`, `mtn_sme`, `glo_data`, `airtel_data`, `9mobile_data`) VALUES
(1, 'on', 'off', 'on', 'on ', 'on');

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
  `date` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `deposit`
--

INSERT INTO `deposit` (`id`, `name`, `amount`, `charge`, `status`, `trans`, `date`, `type`) VALUES
(35, 'adex', '100', '99.009900990099', '1', 'MNFY|48|20211231160002|015605', '31-Dec-21  04:00 PM', 'monnify funding. of â‚¦99.009900990099 on useradex'),
(36, 'Ademi', '200', '150', '1', 'MNFY|69|20211231185017|017102', '31-Dec-21  06:50 PM', 'monnify funding. of â‚¦150 on userAdemi'),
(37, 'Holushorlar', '2000', '1950', '1', 'MNFY|69|20220107133629|080988', '07-Jan-22  01:36 PM', 'monnify funding. of â‚¦1950 on userHolushorlar'),
(38, 'Holushorlar', '3050', '3000', '1', 'MNFY|48|20220107220210|087222', '07-Jan-22  10:02 PM', 'monnify funding. of â‚¦3000 on userHolushorlar'),
(39, 'ZenithOrla', '250', '200', '1', 'MNFY|86|20220112131130|133528', '12-Jan-22  01:11 PM', 'monnify funding. of â‚¦200 on userZenithOrla'),
(40, 'Horlatopjosh', '1000', '950', '1', 'MNFY|05|20220112190631|136988', '12-Jan-22  07:06 PM', 'monnify funding. of â‚¦950 on userHorlatopjosh'),
(41, 'semasir', '1000', '950', '1', 'MNFY|99|20220113140429|014460', '13-Jan-22  02:04 PM', 'monnify funding. of â‚¦950 on usersemasir'),
(42, 'Babandauda', '200', '150', '1', 'MNFY|60|20230128201349|248494', '29-Jan-23  03:44 PM', 'monnify funding. of â‚¦150 on userBabandauda'),
(43, 'Babandauda', '500', '490', '1', 'MNFY|15|20230128181946|231962', '29-Jan-23  03:58 PM', 'monnify funding. of â‚¦490 on userBabandauda'),
(44, 'abdurrahman32', '200', '196', '1', 'MNFY|63|20230129131802|262577', '29-Jan-23  11:09 PM', 'monnify funding. of â‚¦196 on userabdurrahman32'),
(45, 'abdurrahman32', '60', '58.8', '1', 'MNFY|15|20230130141352|352132', '30-Jan-23  02:14 PM', 'monnify funding. of â‚¦58.8 on userabdurrahman32'),
(46, 'Paki', '500', '490', '1', 'MNFY|63|20230131122903|405519', '31-Jan-23  12:29 PM', 'monnify funding. of â‚¦490 on userPaki'),
(47, 'yahyapaki', '500', '490', '1', 'MNFY|89|20230201173833|062572', '01-Feb-23  05:38 PM', 'monnify funding. of â‚¦490 on useryahyapaki'),
(48, 'Paki', '2000', '1960', '1', 'MNFY|89|20230202175759|140293', '02-Feb-23  05:58 PM', 'monnify funding. of â‚¦1960 on userPaki'),
(49, 'Jardade', '230', '225.4', '1', 'MNFY|36|20230202220731|167765', '02-Feb-23  10:07 PM', 'monnify funding. of â‚¦225.4 on userJardade'),
(50, 'Jardade', '20', '19.6', '1', 'MNFY|35|20230202221647|159258', '02-Feb-23  10:16 PM', 'monnify funding. of â‚¦19.6 on userJardade'),
(51, 'Jardade', '10', '9.8', '1', 'MNFY|89|20230202224631|164236', '02-Feb-23  10:46 PM', 'monnify funding. of â‚¦9.8 on userJardade'),
(52, 'Aminupaki', '1000', '980', '1', 'MNFY|86|20230204133810|092706', '04-Feb-23  01:38 PM', 'monnify funding. of â‚¦980 on userAminupaki'),
(53, 'hussaiynah', '303', '296.94', '1', 'MNFY|05|20230204173733|113551', '04-Feb-23  05:37 PM', 'monnify funding. of â‚¦296.94 on userhussaiynah'),
(54, 'yahyapaki', '500', '490', '1', 'MNFY|05|20230205123452|159513', '05-Feb-23  12:35 PM', 'monnify funding. of â‚¦490 on useryahyapaki'),
(55, 'yahaya1944', '230', '225.4', '1', 'MNFY|56|20230205145732|162170', '05-Feb-23  02:57 PM', 'monnify funding. of â‚¦225.4 on useryahaya1944'),
(56, 'yahaya1944', '10', '9.8', '1', 'MNFY|01|20230205150302|178745', '05-Feb-23  03:03 PM', 'monnify funding. of â‚¦9.8 on useryahaya1944'),
(57, 'abdurrahman32', '115', '112.7', '1', 'MNFY|01|20230206124310|247031', '06-Feb-23  12:43 PM', 'monnify funding. of â‚¦112.7 on userabdurrahman32'),
(58, 'abdurrahman32', '24', '23.52', '1', 'MNFY|86|20230206124617|223309', '06-Feb-23  12:46 PM', 'monnify funding. of â‚¦23.52 on userabdurrahman32'),
(59, 'Abba', '100', '98', '1', 'MNFY|01|20230207172712|350443', '07-Feb-23  05:27 PM', 'monnify funding. of â‚¦98 on userAbba'),
(60, 'abdurrahman32', '10', '9.8', '1', 'MNFY|01|20230207173333|350909', '07-Feb-23  05:33 PM', 'monnify funding. of â‚¦9.8 on userabdurrahman32'),
(61, 'abdurrahman32', '120', '117.6', '1', 'MNFY|56|20230207221653|335951', '07-Feb-23  10:16 PM', 'monnify funding. of â‚¦117.6 on userabdurrahman32'),
(62, 'Salaam', '500', '490', '1', 'MNFY|05|20230208163624|400969', '08-Feb-23  04:36 PM', 'monnify funding. of â‚¦490 on userSalaam'),
(63, 'hussaiynah', '140', '137.2', '1', 'MNFY|01|20230209212212|539631', '09-Feb-23  09:22 PM', 'monnify funding. of â‚¦137.2 on userhussaiynah'),
(64, 'Paki', '300', '294', '1', 'MNFY|05|20230209222203|502924', '09-Feb-23  10:22 PM', 'monnify funding. of â‚¦294 on userPaki'),
(65, 'Paki', '2000', '1960', '1', 'MNFY|56|20230210072214|493688', '10-Feb-23  07:22 AM', 'monnify funding. of â‚¦1960 on userPaki');

-- --------------------------------------------------------

--
-- Table structure for table `exam_lock`
--

CREATE TABLE `exam_lock` (
  `id` int(11) NOT NULL,
  `waec` varchar(255) NOT NULL,
  `neco` varchar(255) NOT NULL,
  `nabteb` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `exam_lock`
--

INSERT INTO `exam_lock` (`id`, `waec`, `neco`, `nabteb`) VALUES
(1, 'on', 'on ', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `general`
--

CREATE TABLE `general` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `instergram` varchar(255) NOT NULL,
  `youtube` varchar(255) NOT NULL,
  `whatlink` varchar(255) NOT NULL,
  `whatgroup` varchar(255) NOT NULL,
  `footer` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `referprice` varchar(255) NOT NULL,
  `dev` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `general`
--

INSERT INTO `general` (`id`, `image`, `name`, `phone`, `email`, `address`, `facebook`, `twitter`, `instergram`, `youtube`, `whatlink`, `whatgroup`, `footer`, `status`, `referprice`, `dev`, `color`) VALUES
(1, '290.jpg', 'AFRICANDREAM', '08067658620', 'sales@africandream.tech', 'KOFAR GABAS PAKI.', 'https://chat.whatsapp.com/Kl7CZN9jVBV5FAO9k4EwT6', 'twitter.com', 'https://chat.whatsapp.com/Kl7CZN9jVBV5FAO9k4EwT6', 'https://youtube.com/@africandreamtech7980', 'https://chat.whatsapp.com/Kl7CZN9jVBV5FAO9k4EwT6', 'https://chat.whatsapp.com/Kl7CZN9jVBV5FAO9k4EwT6', '+2348067658620', '0', '100', '+2347060764090', '#6eac11');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kyc`
--

INSERT INTO `kyc` (`id`, `username`, `bank`, `name`, `number`) VALUES
(33, 'Adex', 'First Bank of Nigeria', 'adex developer', '3160038766'),
(34, 'princejj', 'Access Bank (Diamond)', '\' or 1=\'1 --', '0089820570'),
(35, '<h2>Ibrahim</h2>', 'Access Bank (Diamond)', '<h1>Ibrahim</h1> Auwal', '<h1>ib<h1>'),
(36, 'Tifeh', 'Wema Bank', 'Olushola Lazeez', '0250059780'),
(37, 'npero', 'First Bank of Nigeria', 'Nosakhare Anthony-erins', '3116892327'),
(38, 'Ibrahim56', 'Access Bank', 'Hannah dauda', '0008755367'),
(39, 'Khaleem24', 'Zenith Bank', 'ALIYU SAADU', '2365008433'),
(40, 'Scorpion ', 'Paycom', 'Yusuf dahiru ', '9133429881'),
(41, 'Jardade', 'Paycom', 'Mustapha Haruna ', '8161772095');

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`id`, `username`, `email`, `amount`, `date`, `status`) VALUES
(5, 'Adex', 'datasurplus@gmail.com', '1000', 'Sunday 30<sup>th</sup>, January 2022 @ 2:16AM', '2');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `mail`
--

INSERT INTO `mail` (`id`, `host`, `sender`, `username`, `password`) VALUES
(1, 'Fgyyggffxd', 'ABBAN YAYA VTU', 'ABBAN YAYA VTU', 'ABBANyaya1221#');

-- --------------------------------------------------------

--
-- Table structure for table `nabteb_result_token`
--

CREATE TABLE `nabteb_result_token` (
  `id` int(11) NOT NULL,
  `pin` varchar(255) NOT NULL,
  `serial_no` varchar(20) NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `status` varchar(5) NOT NULL DEFAULT '0',
  `time_added` varchar(255) NOT NULL,
  `time_bought` varchar(100) NOT NULL,
  `buyer_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nabteb_result_token`
--

INSERT INTO `nabteb_result_token` (`id`, `pin`, `serial_no`, `added_by`, `status`, `time_added`, `time_bought`, `buyer_id`) VALUES
(13, '123456789033333333333', '123456733333', 'Admin', '1', 'Monday 15<sup>th</sup>, November 2021 @ 1:03PM', 'Monday 15<sup>th</sup>, November 2021 @ 1:09PM', 'wisdoms'),
(14, '1234567890kkkbbbbbb', 'mmnnnjjklll', 'Admin', '1', 'Monday 15<sup>th</sup>, November 2021 @ 1:03PM', 'Monday 15<sup>th</sup>, November 2021 @ 1:09PM', 'wisdoms'),
(15, '123456789033333333333ttttttt', '1234567', 'Admin', '1', 'Monday 15<sup>th</sup>, November 2021 @ 1:12PM', 'Monday 15<sup>th</sup>, November 2021 @ 1:12PM', 'wisdoms');

-- --------------------------------------------------------

--
-- Table structure for table `neco_result_token`
--

CREATE TABLE `neco_result_token` (
  `id` int(11) NOT NULL,
  `buyer_id` varchar(255) NOT NULL,
  `pin` varchar(20) NOT NULL,
  `serial_no` varchar(12) NOT NULL,
  `status` varchar(4) NOT NULL,
  `time_added` varchar(255) NOT NULL,
  `time_bought` varchar(100) NOT NULL,
  `added_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `network`
--

CREATE TABLE `network` (
  `id` int(11) NOT NULL,
  `top` varchar(255) NOT NULL,
  `smart` varchar(255) NOT NULL,
  `affiliate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `network`
--

INSERT INTO `network` (`id`, `top`, `smart`, `affiliate`) VALUES
(1, '98', '99', '98');

-- --------------------------------------------------------

--
-- Table structure for table `networkid`
--

CREATE TABLE `networkid` (
  `id` int(11) NOT NULL,
  `networkid` varchar(255) NOT NULL,
  `network` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `networkid`
--

INSERT INTO `networkid` (`id`, `networkid`, `network`) VALUES
(1, '3', 'GLO'),
(2, '1', 'MTN'),
(3, '2', 'AIRTEL'),
(4, '4', '9MOBILE');

-- --------------------------------------------------------

--
-- Table structure for table `notif`
--

CREATE TABLE `notif` (
  `id` int(11) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `des` mediumtext NOT NULL,
  `long_des` mediumtext NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notif`
--

INSERT INTO `notif` (`id`, `sender`, `username`, `des`, `long_des`, `status`, `date`) VALUES
(1, 'no', 'Adex', 'good', '<p><strong>wat happen</strong></p>\n', '0', '27/01/2022 05:35'),
(2, 'Technical support', 'Adex', 'Technical support', '<p><strong>Bro,&nbsp;</strong>we are sending you this message based o what you have&nbsp;<em>done for us we are very grate full&nbsp;</em></p>\n', '0', 'Thursday 27<sup>th</sup>, January 2022 @ 5:56PM'),
(3, '', 'Adex', 'Technical support', '<p><strong>Bro,&nbsp;</strong>we are sending you this message based o what you have&nbsp;<em>done for us we are very grate full&nbsp;</em></p>\n', '0', 'Thursday 27<sup>th</sup>, January 2022 @ 5:58PM'),
(4, '', 'Adex', 'good', '<p>we re comming back</p>\n', '0', 'Thursday 27<sup>th</sup>, January 2022 @ 6:07PM'),
(5, '', 'Adex', 'good', '<p>we re comming back</p>\n', '0', 'Thursday 27<sup>th</sup>, January 2022 @ 6:09PM'),
(6, '', 'Adex', 'good', '<p>we re comming back</p>\n', '0', 'Thursday 27<sup>th</sup>, January 2022 @ 6:14PM'),
(7, '', 'Adex', 'good', '<p>we re comming back</p>\n', '0', 'Thursday 27<sup>th</sup>, January 2022 @ 6:15PM'),
(8, '', 'Adex', 'good', '<p>we re comming back</p>\n', '0', 'Thursday 27<sup>th</sup>, January 2022 @ 6:15PM'),
(9, '', 'Adex', 'good', '<p>we re comming back</p>\n', '0', 'Thursday 27<sup>th</sup>, January 2022 @ 6:16PM'),
(10, '', 'Adex', 'good', '<p>we re comming back</p>\n', '0', 'Thursday 27<sup>th</sup>, January 2022 @ 6:20PM'),
(11, '', 'Adex', 'good', '<p>we re comming back</p>\n', '0', 'Thursday 27<sup>th</sup>, January 2022 @ 6:29PM'),
(12, '', 'Adex', 'good', '<p>we re comming back</p>\n', '0', 'Thursday 27<sup>th</sup>, January 2022 @ 6:32PM'),
(13, '', 'Adex', 'good', '<p>we re comming back</p>\n', '0', 'Thursday 27<sup>th</sup>, January 2022 @ 6:34PM'),
(14, '', 'Adex', 'good', '<p>we re comming back</p>\n', '0', 'Thursday 27<sup>th</sup>, January 2022 @ 6:34PM'),
(15, '', 'Adex', 'good', '<p>we re comming back</p>\n', '0', 'Thursday 27<sup>th</sup>, January 2022 @ 6:35PM'),
(16, '', 'Adex', 'good', '<p>we re comming back</p>\n', '0', 'Thursday 27<sup>th</sup>, January 2022 @ 6:38PM'),
(17, '', 'Adex', 'good', '<p>we re comming back</p>\n', '0', 'Thursday 27<sup>th</sup>, January 2022 @ 6:40PM'),
(18, '', 'Adex', 'good', '<p><img alt=\"\" src=\"upload/as.png\" style=\"border-style:solid; border-width:1px; float:left; height:63px; margin:1px; width:100px\" />&nbsp;surplus data i testing it bro</p>\n', '0', 'Thursday 27<sup>th</sup>, January 2022 @ 6:41PM'),
(19, '', 'Adex', 'good', '<p><img alt=\"\" src=\"https://superjarang.com/secure/upload/as.png\" style=\"border-style:solid; border-width:10px; height:63px; margin:10px; width:100px\" />&nbsp;surplus data i testing it bro</p>\n', '0', 'Thursday 27<sup>th</sup>, January 2022 @ 6:46PM');

-- --------------------------------------------------------

--
-- Table structure for table `notif_lock`
--

CREATE TABLE `notif_lock` (
  `id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `popup` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notif_lock`
--

INSERT INTO `notif_lock` (`id`, `message`, `popup`) VALUES
(1, 'We are glad to announce to you that MTN SME is now available.', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `otp`
--

CREATE TABLE `otp` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `time_sent` varchar(255) NOT NULL,
  `reg_otp` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `otp`
--

INSERT INTO `otp` (`id`, `username`, `email`, `time_sent`, `reg_otp`, `status`) VALUES
(41, 'wemovw', 'testing@gmail.com', '1643095075', '827522', '0');

-- --------------------------------------------------------

--
-- Table structure for table `pay`
--

CREATE TABLE `pay` (
  `id` int(11) NOT NULL,
  `fsecret` varchar(255) NOT NULL,
  `msk` varchar(255) NOT NULL,
  `mapi` varchar(255) NOT NULL,
  `min` varchar(255) NOT NULL,
  `max` varchar(255) NOT NULL,
  `refbal` varchar(255) NOT NULL,
  `fpublickey` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `psecret` varchar(255) NOT NULL,
  `plivekey` varchar(255) NOT NULL,
  `airtime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pay`
--

INSERT INTO `pay` (`id`, `fsecret`, `msk`, `mapi`, `min`, `max`, `refbal`, `fpublickey`, `contact`, `psecret`, `plivekey`, `airtime`) VALUES
(1, 'pk_live_1a2ec3e85446524223a32b95ef3d9e38154f585b', 'WK1118PTJDHSUGNQMNMKF2ZS9DU8ESY7', 'MK_PROD_BAAUCF87HV', '5', '10000000000000', '1000', '11111111', '714045751005', 'sk_live_d5427a6984dc891d916e9f108bec00099837cbdd', '22222222222', '50');

-- --------------------------------------------------------

--
-- Table structure for table `pin`
--

CREATE TABLE `pin` (
  `id` int(11) NOT NULL,
  `cardpin` varchar(255) NOT NULL,
  `exam` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pin`
--

INSERT INTO `pin` (`id`, `cardpin`, `exam`, `status`) VALUES
(1, '1234567890', 'WAEC', '1'),
(2, '3', 'WAEC', '1'),
(3, '5', 'WAEC', '0'),
(4, '4', 'WAEC', '0'),
(5, '1234567890', 'WAEC', '0');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `planid` varchar(255) NOT NULL,
  `top` varchar(255) NOT NULL,
  `reseller` varchar(255) NOT NULL,
  `api` varchar(255) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `network` varchar(255) NOT NULL,
  `customid` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `name`, `price`, `planid`, `top`, `reseller`, `api`, `type`, `network`, `customid`, `day`) VALUES
(151, 'MTN SME 500 MB', '115', '1', '115', '115', '112', 'SME', 'MTN', '5529', '30'),
(152, 'MTN SME 1GB', '222', '2', '222', '222', '219', 'SME', 'MTN', '9481', '30'),
(153, 'MTN SME 2GB', '444', '3', '444', '444', '438', 'SME', 'MTN', '8092', '30'),
(154, 'MTN SME 3GB', '665', '4', '665', '665', '657', 'SME', 'MTN', '6382', '30'),
(155, 'MTN SME 5GB', '1110', '5', '1110', '1110', '1095', 'SME', 'MTN', '8052', '30'),
(156, 'MTN SME 10GB', '2220', '6', '2220', '2220', '2190', 'SME', 'MTN', '2604', '30'),
(157, '100MB AIRTEL COOPERATE ', '30', '7', '30', '30', '28', 'GIFTING', 'AIRTEL', '9616', '7'),
(158, '300MB AIRTEL COOPERATE ', '70', '8', '70', '70', '68', 'GIFTING', 'AIRTEL', '6710', '7'),
(159, '500MB AIRTEL COOPERATE ', '115', '9', '115', '115', '113', 'GIFTING', 'AIRTEL', '4471', '30'),
(160, '1GB AIRTEL COOPERATE ', '213', '10', '213', '213', '210', 'GIFTING', 'AIRTEL', '4298', '30'),
(161, '2GB AIRTEL COOPERATE ', '422', '11', '422', '422', '418', 'GIFTING', 'AIRTEL', '7169', '30'),
(162, '5GB AIRTEL COOPERATE ', '1055', '12', '1055', '1055', '1045', 'GIFTING', 'AIRTEL', '8426', '30'),
(163, '1.35GB GLO GIFTING', '492', '13', '492', '492', '488', 'GIFTING', 'GLO', '7510', '14'),
(164, '2.9GB GLO GIFTING', '990', '14', '990', '990', '985', 'GIFTING', 'GLO', '5073', '30'),
(165, '4.1GB GLO GIFTING', '1455', '15', '1455', '1455', '1445', 'GIFTING', 'GLO', '8213', '30'),
(166, '5.8GB GLO GIFTING', '1940', '16', '1940', '1940', '1930', 'GIFTING', 'GLO', '8420', '30'),
(167, '7.7GB GLO GIFTING', '2425', '17', '2425', '2425', '2415', 'GIFTING', 'GLO', '3847', '30'),
(168, '10GB GLO GIFTING', '2920', '18', '2920', '2920', '2905', 'GIFTING', 'GLO', '5642', '30'),
(169, '13GB GLO GIFTING', '3660', '19', '3660', '3660', '3650', 'GIFTING', 'GLO', '9137', '30'),
(170, '18GB GLO GIFTING', '4500', '20', '4500', '4500', '4480', 'GIFTING', 'GLO', '9376', '30'),
(171, '29GB GLO GIFTING', '7350', '21', '7350', '7350', '7300', 'GIFTING', 'GLO', '6186', '30'),
(172, '50GB GLO GIFTING', '10000', '22', '10000', '10000', '9500', 'GIFTING', 'GLO', '4326', '30'),
(173, '500MB MTN COOPERATE GIFTING', '135', '23', '135', '135', '132', 'GIFTING', 'MTN', '1398', '30'),
(174, '1GB MTN COOPERATE GIFTING', '250', '24', '250', '250', '245', 'GIFTING', 'MTN', '6117', '30'),
(175, 'MTN COOPERATE GIFTING	2GB', '500', '25', '490', '495', '486', 'GIFTING', 'MTN', '2177', '30'),
(176, 'MTN COOPRATE GIFTING  3GB', '750', '26', '750', '750', '730', 'GIFTING', 'MTN', '1360', '30'),
(177, 'MTN COOPRATE GIFTING  5GB', '1250', '27', '1250', '1250', '1230', 'GIFTING', 'MTN', '8327', '30'),
(178, 'MTN COOPRATE GIFTING 10GB', '2480', '28', '2480', '2480', '2430', 'GIFTING', 'MTN', '8575', '30'),
(179, '9MOBILE GIFTING 250MB', '220', '29', '220', '220', '215', 'GIFTING', '9MOBILE', '1481', '7'),
(180, '9MOBILE GIFTING 500MB', '435', '31', '435', '435', '430', 'GIFTING', '9MOBILE', '8490', '30'),
(181, '9MOBILE GIFTING 1.5GB', '880', '32', '880', '880', '870', 'GIFTING', '9MOBILE', '1466', '30'),
(182, '9MOBILE GIFTING 2GB', '1060', '33', '1060', '1060', '1040', 'GIFTING', '9MOBILE', '2996', '30'),
(183, '9MOBILE GIFTING 3GB', '1350', '34', '1350', '1350', '1320', 'GIFTING', '9MOBILE', '9623', '30'),
(184, '9MOBILE GIFTING 4.5GB', '1780', '35', '1780', '1780', '1750', 'GIFTING', '9MOBILE', '2169', '30'),
(185, 'GLO GIFTING 500MB', '135', '36', '135', '135', '133', 'GIFTING', 'GLO', '3398', '30'),
(186, 'GLO GIFTING 1GB', '265', '37', '265', '265', '260', 'GIFTING', 'GLO', '1232', '30'),
(187, 'GLO GIFTING 2GB', '530', '38', '530', '530', '520', 'GIFTING', 'GLO', '3122', '30'),
(188, 'GLO GIFTING 3GB', '795', '39', '795', '795', '780', 'GIFTING', 'GLO', '6267', '30'),
(189, 'GLO GIFTING 5GB', '1330', '40', '1330', '1330', '1300', 'GIFTING', 'GLO', '4075', '30'),
(190, 'GLO GIFTING 10GB', '2630', '41', '2630', '2630', '2600', 'GIFTING', 'GLO', '6782', '30');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`id`, `username`, `message`, `status`, `date`) VALUES
(2, 'Litehost', 'BEST SITE', '1', 'Tuesday 2<sup>nd</sup>, November 2021 @ 12:50pm'),
(4, 'alexdeveloper', 'So good', '0', 'Sunday 6<sup>th</sup>, February 2022 @ 8:47am');

-- --------------------------------------------------------

--
-- Table structure for table `resultchecker`
--

CREATE TABLE `resultchecker` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `newbal` varchar(255) NOT NULL,
  `oldbal` varchar(255) NOT NULL,
  `pin` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `scratch_card_prices`
--

CREATE TABLE `scratch_card_prices` (
  `id` int(11) NOT NULL,
  `waec_card` varchar(5) NOT NULL,
  `neco_token` varchar(5) NOT NULL,
  `nabteb_token` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `scratch_card_prices`
--

INSERT INTO `scratch_card_prices` (`id`, `waec_card`, `neco_token`, `nabteb_token`) VALUES
(1, '100', '100', '100');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `flutter` varchar(255) NOT NULL,
  `paystack` varchar(255) NOT NULL,
  `monnify` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `email`, `flutter`, `paystack`, `monnify`, `bank`) VALUES
(2, '0', '0', '0', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `share`
--

CREATE TABLE `share` (
  `id` int(11) NOT NULL,
  `mtn` varchar(255) NOT NULL,
  `9mobile` varchar(255) NOT NULL,
  `airtel` varchar(255) NOT NULL,
  `glo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `share`
--

INSERT INTO `share` (`id`, `mtn`, `9mobile`, `airtel`, `glo`) VALUES
(1, '100', '10', '50', '98');

-- --------------------------------------------------------

--
-- Table structure for table `simhosting`
--

CREATE TABLE `simhosting` (
  `id` int(11) NOT NULL,
  `vt_username` varchar(255) NOT NULL,
  `vt_password` varchar(255) NOT NULL,
  `smeplug` varchar(255) NOT NULL,
  `smeplugurl` varchar(255) NOT NULL,
  `topup_plug_url` varchar(255) NOT NULL,
  `topup_plug_api_key` varchar(255) NOT NULL,
  `data_plug_url` varchar(255) NOT NULL,
  `data_plug_api_key`varchar(255) NOT NULL,
  `cable_plug_url` varchar(255) NOT NULL,
  `cable_plug_api_key` varchar(255) NOT NULL,
  `bulk_username` varchar(255) NOT NULL,
  `bulk_password` varchar(255) NOT NULL,
  `smeplubic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `simhosting`
--

INSERT INTO `simhosting` (
  `id`, 
  `vt_username`, 
  `vt_password`, 
  `smeplug`,
  `smeplugurl`, 
  `topup_plug_url`,
  `topup_plug_api_key`,
  `data_plug_url`,
  `data_plug_api_key`,
  `cable_plug_url`,
  `cable_plug_api_key`,
  `bulk_username`, 
  `bulk_password`, 
  `smeplubic`
) VALUES (
  1, 
  'adex@gmail.com', 
  'welcome', 
  '2dd1e9c24cb7e992a4ea881a467e5b1c95d2a92311cfc01a0f2584fc8697',
  'https://generaltestapivendor.com/api/',
  'https://topuptestapivendor.com/api/',
  '3dd1e9c24cb7e992a4ea881a467e5b1c95d2a92311cfc01a0f2584fc8697',
  'https://datatestapivendor.com/api/',
  '4DD1e9c24cb7e992a4ea881a467e5b1c95d2a92311cfc01a0f2584fc8697',
  'https://cabletestapivendor.com/api/',
  '6ee1e9c24cb7e992a4ea881a467e5b1c95d2a92311cfc01a0f2584fc8697',
  'admin', 
  'admin', 
  '1bd8bd9c7b5cd32459b2a697fd172999f755c4c1b1498bb6acc99511e066b799'
);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `id` int(11) NOT NULL,
  `adex` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`id`, `adex`) VALUES
(1, '<h2><strong>AFRICANDREAM VTU</strong>&nbsp;<strong>USER</strong> <strong>AGREEMENT</strong></h2>\n\n<p><strong>(From the owner of&nbsp; africandream.tech)</strong></p>\n\n<p>&nbsp;</p>\n\n<h3>1. ACCEPTANCE OF TERMS</h3>\n\n<p><strong>Africandream vtu</strong>&nbsp;provides a collection of online resources, including but not limited to data bundle internet/mobile browsing, air time/recharge cards, classified&nbsp;</p>\n\n<p>ads, forums, and various email services, (referred to hereafter as &quot;the&nbsp;</p>\n\n<p>Service&quot;) subject to the following Terms of Use (&quot;TOU&quot;). By using the Service&nbsp;</p>\n\n<p>in any way, you are agreeing to comply with the TOU. In addition, when using&nbsp;</p>\n\n<p>particular africandream vtu<strong>&nbsp;</strong>services, you agree to abide by any applicable posted&nbsp;</p>\n\n<p>guidelines for all africandream vtu services, which may change from time to time. &nbsp;</p>\n\n<p>Should you object to any term or condition of the TOU, any guidelines,&nbsp;</p>\n\n<p>or any subsequent modifications thereto or become dissatisfied with africandream<strong>&nbsp;vtu</strong></p>\n\n<p>in any way, your only recourse is to immediately discontinue use of africandream<strong>&nbsp;vtu</strong></p>\n\n<p><strong>Africandream vtu&nbsp;</strong>has the right, but is not obligated, to strictly enforce the TOU&nbsp;</p>\n\n<p>through self-help, community moderation, active investigation, litigation and&nbsp;</p>\n\n<p>prosecution.</p>\n\n<p>&nbsp;</p>\n\n<h3>2. MODIFICATIONS TO THIS AGREEMENT</h3>\n\n<p>We reserve the right, at our sole discretion, to change, modify or otherwise&nbsp;</p>\n\n<p>alter these terms and conditions at any time. &nbsp;Such modifications shall become&nbsp;</p>\n\n<p>effective immediately upon the posting thereof. You must review this agreement&nbsp;</p>\n\n<p>on a regular basis to keep yourself apprised of any changes.</p>\n\n<p>&nbsp;</p>\n\n<h3>3. CONDUCT</h3>\n\n<p>You agree not &nbsp;to:</p>\n\n<p>1) create multiple account or violate any prohibition/restriction/limit placed on accounts on our website as this will lead to termination of your account and you will forfeit all funds in your account;</p>\n\n<p>2) contact anyone who has asked not to be contacted, or make unsolicited contact with anyone for any commercial purpose;</p>\n\n<p>3) &quot;Stalk&quot; or otherwise harass anyone;</p>\n\n<p>&nbsp;4) collect personal data about other users for commercial or unlawful purposes;</p>\n\n<p>5) Use automated means, including spiders, robots, crawlers, data mining tools, or the like to download data from the Service - unless expressly permitted by Abban Yaya vtu<strong>;</strong></p>\n\n<p>&nbsp;</p>\n\n<p>6) Post non-local or otherwise irrelevant Content, repeatedly post the same or similar Content or otherwise impose an unreasonable or is proportionately large load on our infrastructure;</p>\n\n<p>&nbsp;</p>\n\n<p>7) Post the same item or service in more than one classified category or forum, or in more than one metropolitan area;</p>\n\n<p>&nbsp;</p>\n\n<p>8) attempt to gain unauthorized access to africandream vtu&nbsp;computer systems or engage in any activity that disrupts, diminishes the quality of, interferes with the performance of, or impairs the functionality of, the Service or the africandream vtu<strong>&nbsp;</strong>website; or</p>\n\n<p>&nbsp;</p>\n\n<p>9) Use any form of automated device or computer program that enables the</p>\n\n<p>Submission of postings on africanfream vtu<strong>&nbsp;</strong>without each posting being manually entered by the author thereof (an &quot;automated posting device&quot;), including without limitation, the use of any such automated posting device to submit postings in bulk, or for automatic submission of postings at regular intervals.</p>\n\n<p>&nbsp;</p>\n\n<p>10) Use any form of automated device or computer program (&quot;flagging tool&quot;) that enables the use of <strong>africandream</strong>&nbsp;&quot;flagging system&quot; or other community moderation systems without each flag being manually entered by the person that initiates the flag (an &quot;automated flagging device&quot;), or use the flagging tool to remove posts of competitors, or to remove posts without a good faith belief that the post being flagged violates these TOU;</p>\n\n<p>&nbsp;</p>\n\n<p>Additionally, you agree not to post, email, or otherwise make available Content:</p>\n\n<p>&nbsp;</p>\n\n<p>11) that is unlawful, harmful, threatening, abusive, harassing, defamatory, libelous, invasive of another&#39;s privacy, or is harmful to minors in any way;</p>\n\n<p>&nbsp;</p>\n\n<p>12) that is pornographic or depicts a human being engaged in actual sexual conduct</p>\n\n<p>including but not limited to (i) sexual intercourse, including genital-genital, oral-genital, anal-genital, or oral-anal, whether between persons of the same or opposite sex, or (ii) bestiality, or (iii) masturbation, or (iv) sadistic or masochistic abuse, or (v) lascivious exhibition of the genitals or pubic area of any person;</p>\n\n<p>&nbsp;</p>\n\n<p>13) That harasses, degrades, intimidates or is hateful toward an individual or group of individuals on the basis of religion, gender, sexual orientation, race, ethnicity, age, or disability;</p>\n\n<p>&nbsp;</p>\n\n<p>14) That violates the Fair Housing Act by stating, in any notice or ad for the sale or rental of any dwelling, a discriminatory preference based on race, color, national origin, religion, sex, familial status or handicap (or violates any state or local law prohibiting discrimination on the basis of these or other characteristics);</p>\n\n<p>&nbsp;</p>\n\n<p>15) That violates federal, state, or local equal employment opportunity laws, including but not limited to, stating in any advertisement for employment a preference or requirement based on race, color, religion, sex, national origin, age, or disability.</p>\n\n<p>&nbsp;</p>\n\n<p>16) With respect to employers that employ four or more employees, that violates the anti-discrimination provision of the Immigration anNationality Act, including requiring Nigeria citizenship or lawful permanent residency (green card status) as a condition for employment unless otherwise required in order to comply with law, regulation, executive order, or federal, state, or local government contract.</p>\n\n<p>&nbsp;</p>\n\n<p>17) That impersonates any person or entity, including, but not limited to, a africandream vtu<strong>&nbsp;</strong>employee, or falsely states or otherwise misrepresents your affiliation with a person or entity (this provision does not apply to Content that constitutes lawful non-deceptive parody of public figures.);</p>\n\n<p>&nbsp;</p>\n\n<p>18) That includes personal or identifying information about another person without that person&#39;s explicit consent;</p>\n\n<p>&nbsp;</p>\n\n<p>19) that is false, deceptive, misleading, deceitful, mis-informative, or constitutes &quot;bait and switch&quot;;</p>\n\n<p>&nbsp;</p>\n\n<p>20) that infringes any patent, trademark, trade secret, copyright or other proprietary rights of any party, or Content that you do not have a right to make available under any law or under contractual or fiduciary relationships;</p>\n\n<p>&nbsp;</p>\n\n<p>21) That constitutes or contains &nbsp;&quot;affiliate marketing,&quot; &quot;link referral code,&quot;</p>\n\n<p>&quot;junk mail,&quot; &quot;spam,&quot; &quot;chain letters,&quot; &quot;pyramid schemes,&quot; or unsolicited commercial advertisement;</p>\n\n<p>&nbsp;</p>\n\n<p>22) That constitutes or contains any form of advertising or solicitation if:</p>\n\n<p>posted in areas of the africandream vtu<strong>&nbsp;</strong>sites which are not designated for such</p>\n\n<p>purposes; or emailed to africandream vtu<strong>&nbsp;</strong>users who have not indicated in writing that</p>\n\n<p>it is ok to contact them about other services, products or commercial interests.</p>\n\n<p>&nbsp;</p>\n\n<p>23) That includes links to commercial services or web sites, except as allowed</p>\n\n<p>in &quot;services&quot;;</p>\n\n<p>&nbsp;</p>\n\n<p>24) That advertises any illegal service or the sale of any items the sale of which is prohibited or restricted by any applicable law, including withoutlimitation items the sale of which is prohibited</p>\n\n<p>&nbsp;</p>\n\n<p>25) That contains software viruses or any other computer code, files or programs designed to interrupt, destroy or limit the functionality of any computer software or hardware or telecommunications equipment;</p>\n\n<p>&nbsp;</p>\n\n<p>26) that disrupts the normal flow of dialogue with an excessive amount of</p>\n\n<p>Content (flooding attack) to the Service, or that otherwise negatively</p>\n\n<p>affects other users&#39; ability to use the Service; or</p>\n\n<p>&nbsp;</p>\n\n<p>27) that employs misleading email addresses, or forged headers or otherwise</p>\n\n<p>manipulated identifiers in order to disguise the origin of Content</p>\n\n<p>transmitted through the Service.</p>\n\n<p>&nbsp;</p>\n\n<h3>4. NO SPAM POLICY</h3>\n\n<p>&nbsp;</p>\n\n<p>You understand and agree that sending unsolicited email advertisements to</p>\n\n<p><strong>Africandream&nbsp;</strong>email addresses or through africandream vtu<strong>&nbsp;</strong>computer systems, which is</p>\n\n<p>expressly prohibited by these Terms, will use or cause to be used servers</p>\n\n<p>located in California. &nbsp;Any unauthorized use of africandream<strong>&nbsp;</strong>computer systems</p>\n\n<p>is a violation of these Terms and certain federal and state laws. &nbsp;Such violations may subject the sender and his or her agents to civil and criminal penalties.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>AFRICANDREAM</strong></p>\n\n<p>Kofar gabas paki,</p>\n\n<p>Ikara local government,</p>\n\n<p>Kaduna state.</p>\n\n<p>sales@africandream.tech</p>\n');

-- --------------------------------------------------------

--
-- Table structure for table `theme`
--

CREATE TABLE `theme` (
  `id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `theme`
--

INSERT INTO `theme` (`id`, `status`) VALUES
(1, '2');

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
  `date` varchar(255) NOT NULL,
  `oldbal` varchar(255) NOT NULL,
  `newbal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `username`, `transid`, `network`, `mobile`, `service`, `plans`, `type`, `amount`, `status`, `date`, `oldbal`, `newbal`) VALUES
(24, 'Babandauda', '495388062', 'MTN', '09064523725', 'AIRTIME', 'AIRTIME', 'VTU', '99', '1', 'Saturday 28<sup>th</sup>, January 2023 @ 12:05AM', '1000', '901'),
(25, 'Babandauda', '232150202', 'AIRTEL', '08083957971', 'DATA', '100MB AIRTEL COOPERATE ', 'GIFTING', '30', '1', 'Saturday 28<sup>th</sup>, January 2023 @ 12:09AM', '901', '871'),
(26, 'Babandauda', '925139561', 'AIRTEL', '08083957971', 'DATA', '1GB AIRTEL COOPERATE ', 'GIFTING', '213', '1', 'Saturday 28<sup>th</sup>, January 2023 @ 8:21AM', '871', '658'),
(27, 'Babandauda', '158734073', 'MTN', '08101224110', 'DATA', 'MTN SME 500 MB', 'SME', '115', '1', 'Saturday 28<sup>th</sup>, January 2023 @ 1:09PM', '658', '543'),
(28, 'Paki', '500639413', 'AIRTEL', '08088882276', 'DATA', '2GB AIRTEL COOPERATE ', 'GIFTING', '422', '1', 'Saturday 28<sup>th</sup>, January 2023 @ 1:26PM', '840', '418'),
(29, 'Paki', '143372299', 'MTN', '08101224110', 'DATA', 'MTN SME 1GB', 'SME', '222', '1', 'Saturday 28<sup>th</sup>, January 2023 @ 1:31PM', '418', '196'),
(30, 'Babandauda', '138558595', 'AIRTEL', '08083957971', 'DATA', '1GB AIRTEL COOPERATE ', 'GIFTING', '213', '1', 'Saturday 28<sup>th</sup>, January 2023 @ 7:18PM', '2543', '2330'),
(31, 'Adnan', '998926117', 'AIRTEL', '09129563370', 'DATA', 'MTN SME 500 MB', 'SME', '115', '0', 'Saturday 28<sup>th</sup>, January 2023 @ 8:18PM', '2000', '2000'),
(32, 'Adnan', '776008961', 'AIRTEL', '09129563370', 'DATA', '500MB AIRTEL COOPERATE ', 'GIFTING', '115', '1', 'Saturday 28<sup>th</sup>, January 2023 @ 8:20PM', '2000', '1885'),
(33, 'Adnan', '584520004', 'AIRTEL', '09126018543', 'DATA', '500MB AIRTEL COOPERATE ', 'GIFTING', '115', '1', 'Saturday 28<sup>th</sup>, January 2023 @ 8:47PM', '1885', '1770'),
(34, 'Adnan', '319596478', 'MTN', '09036994247', 'DATA', 'MTN SME 500 MB', 'SME', '115', '0', 'Saturday 28<sup>th</sup>, January 2023 @ 9:02PM', '1770', '1770'),
(35, 'Adnan', '161846632', 'AIRTEL', '09036994247', 'DATA', '500MB AIRTEL COOPERATE ', 'GIFTING', '115', '0', 'Saturday 28<sup>th</sup>, January 2023 @ 9:04PM', '1770', '1770'),
(36, 'Adnan', '156698922', 'MTN', '09036994247', 'DATA', 'MTN SME 500 MB', 'SME', '115', '0', 'Saturday 28<sup>th</sup>, January 2023 @ 9:22PM', '1770', '1770'),
(37, 'Adnan', '502801915', 'MTN', '09036994247', 'DATA', 'MTN SME 500 MB', 'SME', '115', '0', 'Saturday 28<sup>th</sup>, January 2023 @ 10:32PM', '1770', '1770'),
(38, 'Adnan', '981244653', 'MTN', '08133020415', 'DATA', 'MTN SME 500 MB', 'SME', '115', '0', 'Saturday 28<sup>th</sup>, January 2023 @ 11:01PM', '1770', '1770'),
(39, 'Babandauda', '477144018', 'AIRTEL', '08083957971', 'DATA', '500MB AIRTEL COOPERATE ', 'GIFTING', '115', '0', 'Sunday 29<sup>th</sup>, January 2023 @ 7:04AM', '2330', '2330'),
(40, 'Babandauda', '857471845', 'AIRTEL', '08083957971', 'DATA', '300MB AIRTEL COOPERATE ', 'GIFTING', '70', '1', 'Sunday 29<sup>th</sup>, January 2023 @ 7:05AM', '2330', '2260'),
(41, 'Adnan', '267153996', 'MTN', '09036994247', 'DATA', 'MTN SME 500 MB', 'SME', '115', '1', 'Sunday 29<sup>th</sup>, January 2023 @ 8:40AM', '1770', '1655'),
(42, 'Adnan', '131516386', 'MTN', '08133020415', 'DATA', 'MTN SME 500 MB', 'SME', '115', '1', 'Sunday 29<sup>th</sup>, January 2023 @ 8:41AM', '1655', '1540'),
(43, 'Adnan', '947224101', 'MTN', '07069569110', 'DATA', 'MTN SME 1GB', 'SME', '222', '1', 'Sunday 29<sup>th</sup>, January 2023 @ 8:47AM', '1540', '1318'),
(44, 'Babandauda', '924629626', 'AIRTEL', '09016684079', 'DATA', '1GB AIRTEL COOPERATE ', 'GIFTING', '213', '0', 'Sunday 29<sup>th</sup>, January 2023 @ 10:50AM', '2260', '2260'),
(45, 'Adnan', '363262960', 'AIRTEL', '09070096738', 'DATA', '500MB AIRTEL COOPERATE ', 'GIFTING', '115', '0', 'Sunday 29<sup>th</sup>, January 2023 @ 11:20AM', '1318', '1318'),
(46, 'Adnan', '757851170', 'MTN', '08100022115', 'DATA', 'MTN SME 500 MB', 'SME', '115', '0', 'Sunday 29<sup>th</sup>, January 2023 @ 11:51AM', '1318', '1318'),
(47, 'Paki', '706245788', 'MTN', '08101224110', 'DATA', 'MTN SME 500 MB', 'SME', '115', '0', 'Sunday 29<sup>th</sup>, January 2023 @ 6:31PM', '196', '196'),
(48, 'Paki', '252326925', 'MTN', '08101224110', 'DATA', 'MTN SME 500 MB', 'SME', '115', '0', 'Sunday 29<sup>th</sup>, January 2023 @ 6:35PM', '196', '196'),
(49, 'Paki', '368105538', 'MTN', '08101224110', 'DATA', 'MTN SME 500 MB', 'SME', '115', '0', 'Sunday 29<sup>th</sup>, January 2023 @ 9:07PM', '196', '196'),
(50, 'abdurrahman32', '851728137', 'AIRTEL', '09079935451', 'DATA', '300MB AIRTEL COOPERATE ', 'GIFTING', '70', '1', 'Sunday 29<sup>th</sup>, January 2023 @ 11:15PM', '196', '126'),
(51, 'abdurrahman32', '463551172', 'MTN', '08105787181', 'DATA', 'MTN SME 500 MB', 'SME', '115', '1', 'Sunday 29<sup>th</sup>, January 2023 @ 11:19PM', '126', '11'),
(52, 'Paki', '713939087', 'MTN', '08101224110', 'DATA', 'MTN SME 500 MB', 'SME', '115', '1', 'Monday 30<sup>th</sup>, January 2023 @ 8:41AM', '196', '81'),
(53, 'Sadiqmurtala17', '494634195', 'AIRTEL', '07017217104', 'DATA', '1GB AIRTEL COOPERATE ', 'GIFTING', '213', '1', 'Monday 30<sup>th</sup>, January 2023 @ 11:12AM', '1460', '1247'),
(54, 'Sadiqmurtala17', '157531798', 'MTN', '09035602465', 'DATA', 'MTN SME 1GB', 'SME', '222', '1', 'Monday 30<sup>th</sup>, January 2023 @ 4:34PM', '1247', '1025'),
(55, 'abdurrahman32', '150956679', 'MTN', '08144746811', 'DATA', 'MTN SME 1GB', 'SME', '222', '1', 'Monday 30<sup>th</sup>, January 2023 @ 8:09PM', '669.8', '447.8'),
(56, 'Sadiqmurtala17', '655583298', 'MTN', '07049510510', 'DATA', 'MTN SME 500 MB', 'SME', '115', '1', 'Monday 30<sup>th</sup>, January 2023 @ 8:10PM', '1025', '910'),
(57, 'Aminupaki', '179653752', 'AIRTEL', '09022572643', 'DATA', '100MB AIRTEL COOPERATE ', 'GIFTING', '30', '1', 'Monday 30<sup>th</sup>, January 2023 @ 10:37PM', '1000', '970'),
(58, 'Aminupaki', '911614542', 'AIRTEL', '09122572643', 'DATA', '100MB AIRTEL COOPERATE ', 'GIFTING', '30', '1', 'Monday 30<sup>th</sup>, January 2023 @ 10:46PM', '970', '940'),
(59, 'Aminupaki', '387257215', 'AIRTEL', '09022572643', 'DATA', '300MB AIRTEL COOPERATE ', 'GIFTING', '70', '1', 'Tuesday 31<sup>st</sup>, January 2023 @ 7:53AM', '940', '870'),
(60, 'Sadiqmurtala17', '213951414', 'MTN', '08062804697', 'DATA', 'MTN SME 1GB', 'SME', '222', '1', 'Tuesday 31<sup>st</sup>, January 2023 @ 7:53AM', '910', '688'),
(61, 'abdurrahman32', '636634728', 'AIRTEL', '09079935451', 'DATA', '300MB AIRTEL COOPERATE ', 'GIFTING', '70', '1', 'Tuesday 31<sup>st</sup>, January 2023 @ 8:00AM', '447.8', '377.8'),
(62, 'Aminupaki', '506409601', 'AIRTEL', '09122572643', 'DATA', '300MB AIRTEL COOPERATE ', 'GIFTING', '70', '1', 'Tuesday 31<sup>st</sup>, January 2023 @ 8:11AM', '870', '800'),
(63, 'Sadiqmurtala17', '170158235', 'MTN', '08145874705', 'DATA', 'MTN SME 1GB', 'SME', '222', '1', 'Tuesday 31<sup>st</sup>, January 2023 @ 9:26AM', '688', '466'),
(64, 'Sadiqmurtala17', '600521775', 'MTN', '09039274420', 'DATA', 'MTN SME 1GB', 'SME', '222', '1', 'Tuesday 31<sup>st</sup>, January 2023 @ 11:44AM', '466', '244'),
(65, 'Paki', '530199421', 'MTN', '08039228931', 'DATA', 'MTN SME 1GB', 'SME', '222', '1', 'Tuesday 31<sup>st</sup>, January 2023 @ 12:33PM', '571', '349'),
(66, 'Paki', '404650390', 'MTN', '08101224110', 'DATA', 'MTN SME 1GB', 'SME', '222', '1', 'Tuesday 31<sup>st</sup>, January 2023 @ 12:34PM', '349', '127'),
(67, 'Sadiqmurtala17', '935679403', 'MTN', '07037858766', 'DATA', 'MTN SME 1GB', 'SME', '222', '1', 'Tuesday 31<sup>st</sup>, January 2023 @ 2:26PM', '234', '12'),
(68, 'Babandauda', '490726824', 'AIRTEL', '09016684079', 'DATA', '1GB AIRTEL COOPERATE ', 'GIFTING', '213', '1', 'Tuesday 31<sup>st</sup>, January 2023 @ 5:59PM', '2900', '2687'),
(69, 'Babandauda', '692990161', 'MTN', '07037735668', 'DATA', 'MTN SME 1GB', 'SME', '222', '1', 'Tuesday 31<sup>st</sup>, January 2023 @ 6:15PM', '2687', '2465'),
(70, 'Salaam', '514081490', 'MTN', '07033332201', 'DATA', 'MTN SME 1GB', 'SME', '222', '1', 'Tuesday 31<sup>st</sup>, January 2023 @ 6:15PM', '435', '213'),
(71, 'Salaam', '829509696', 'MTN', '08166371834', 'DATA', 'MTN SME 500 MB', 'SME', '115', '1', 'Tuesday 31<sup>st</sup>, January 2023 @ 6:20PM', '213', '98'),
(72, 'abdurrahman32', '467326081', 'AIRTEL', '09012905072', 'DATA', '300MB AIRTEL COOPERATE ', 'GIFTING', '70', '1', 'Tuesday 31<sup>st</sup>, January 2023 @ 8:31PM', '377.8', '307.8'),
(73, 'abdurrahman32', '340779373', 'AIRTEL', '09079935451', 'DATA', '300MB AIRTEL COOPERATE ', 'GIFTING', '70', '1', 'Tuesday 31<sup>st</sup>, January 2023 @ 8:34PM', '307.8', '237.8'),
(74, 'Sadiqmurtala17', '875378795', 'MTN', '08037842784', 'DATA', 'MTN SME 500 MB', 'SME', '115', '1', 'Tuesday 31<sup>st</sup>, January 2023 @ 8:39PM', '2942', '2827'),
(75, 'Sadiqmurtala17', '936519621', 'MTN', '08065497466', 'DATA', 'MTN SME 500 MB', 'SME', '115', '1', 'Tuesday 31<sup>st</sup>, January 2023 @ 8:41PM', '2827', '2712'),
(76, 'Paki', '104610024', 'MTN', '08133619594', 'DATA', 'MTN SME 500 MB', 'SME', '115', '1', 'Tuesday 31<sup>st</sup>, January 2023 @ 10:33PM', '127', '12'),
(77, 'Babandauda', '893492323', 'MTN', '08145004665', 'DATA', 'MTN SME 3GB', 'SME', '665', '1', 'Wednesday 1<sup>st</sup>, February 2023 @ 10:49AM', '2465', '1800'),
(78, 'Aminupaki', '695448311', 'AIRTEL', '09122572643', 'DATA', '300MB AIRTEL COOPERATE ', 'GIFTING', '70', '1', 'Wednesday 1<sup>st</sup>, February 2023 @ 12:24PM', '800', '730'),
(79, 'Aminupaki', '968376425', 'MTN', '07032057969', 'DATA', 'MTN SME 500 MB', 'SME', '115', '1', 'Wednesday 1<sup>st</sup>, February 2023 @ 4:00PM', '730', '615'),
(80, 'Sadiqmurtala17', '948238037', 'MTN', '09035602465', 'DATA', 'MTN SME 2GB', 'SME', '444', '1', 'Wednesday 1<sup>st</sup>, February 2023 @ 5:13PM', '2712', '2268'),
(81, 'abdurrahman32', '396453380', 'AIRTEL', '09079935451', 'DATA', '500MB AIRTEL COOPERATE ', 'GIFTING', '115', '1', 'Wednesday 1<sup>st</sup>, February 2023 @ 5:24PM', '237.8', '122.8'),
(82, 'Sadiqmurtala17', '654167976', 'MTN', '07044472993', 'DATA', 'MTN SME 1GB', 'SME', '222', '1', 'Wednesday 1<sup>st</sup>, February 2023 @ 8:14PM', '2268', '2046'),
(83, 'yahyapaki', '879127014', 'MTN', '08069598755', 'DATA', 'MTN SME 1GB', 'SME', '222', '1', 'Wednesday 1<sup>st</sup>, February 2023 @ 8:19PM', '490', '268'),
(84, 'yahyapaki', '795926699', 'AIRTEL', '08081861054', 'DATA', '500MB AIRTEL COOPERATE ', 'GIFTING', '115', '1', 'Wednesday 1<sup>st</sup>, February 2023 @ 10:23PM', '268', '153'),
(85, 'Aminupaki', '152166418', 'AIRTEL', '09029714950', 'DATA', '100MB AIRTEL COOPERATE ', 'GIFTING', '30', '1', 'Wednesday 1<sup>st</sup>, February 2023 @ 10:47PM', '615', '585'),
(86, 'Sadiqmurtala17', '586087180', 'MTN', '07037858766', 'DATA', 'MTN SME 2GB', 'SME', '444', '1', 'Thursday 2<sup>nd</sup>, February 2023 @ 9:18AM', '2046', '1602'),
(87, 'Adnan', '891204004', 'MTN', '08133020415', 'DATA', 'MTN SME 1GB', 'SME', '222', '1', 'Thursday 2<sup>nd</sup>, February 2023 @ 10:16AM', '1318', '1096'),
(88, 'Salaam', '533079197', 'MTN', '08108287372', 'AIRTIME', 'AIRTIME', 'Share and Sell', '92.07', '1', 'Thursday 2<sup>nd</sup>, February 2023 @ 11:21AM', '98', '5.93'),
(89, 'yahyapaki', '167124916', 'MTN', '08145418351', 'DATA', 'MTN SME 500 MB', 'SME', '115', '1', 'Thursday 2<sup>nd</sup>, February 2023 @ 4:32PM', '153', '38'),
(90, 'Aminupaki', '142283486', 'MTN', '07033994966', 'DATA', '500MB MTN COOPERATE GIFTING', 'GIFTING', '135', '1', 'Thursday 2<sup>nd</sup>, February 2023 @ 5:54PM', '585', '450'),
(91, 'Paki', '947490921', 'AIRTEL', '08088882276', 'DATA', '5GB AIRTEL COOPERATE ', 'GIFTING', '1055', '1', 'Thursday 2<sup>nd</sup>, February 2023 @ 6:02PM', '1972', '917'),
(92, 'Paki', '789297664', 'MTN', '08101224110', 'DATA', 'MTN SME 2GB', 'SME', '444', '1', 'Thursday 2<sup>nd</sup>, February 2023 @ 6:23PM', '917', '473'),
(93, 'Paki', '987423134', 'MTN', '08133619594', 'DATA', 'MTN SME 500 MB', 'SME', '115', '1', 'Thursday 2<sup>nd</sup>, February 2023 @ 6:39PM', '473', '358'),
(94, 'Adnan', '124394159', 'AIRTEL', '09125657109', 'DATA', '500MB AIRTEL COOPERATE ', 'GIFTING', '115', '1', 'Thursday 2<sup>nd</sup>, February 2023 @ 7:57PM', '1096', '981'),
(95, 'Sadiqmurtala17', '895182846', 'MTN', '09035602465', 'DATA', 'MTN SME 2GB', 'SME', '444', '1', 'Thursday 2<sup>nd</sup>, February 2023 @ 8:45PM', '1602', '1158'),
(96, 'Adnan', '853794139', 'AIRTEL', '09069981969', 'DATA', '500MB AIRTEL COOPERATE ', 'GIFTING', '115', '0', 'Thursday 2<sup>nd</sup>, February 2023 @ 9:18PM', '981', '981'),
(97, 'Sadiqmurtala17', '729588476', 'MTN', '08136881891', 'DATA', 'MTN SME 500 MB', 'SME', '115', '1', 'Thursday 2<sup>nd</sup>, February 2023 @ 9:19PM', '1158', '1043'),
(98, 'Adnan', '666007065', 'MTN', '09069981969', 'DATA', 'MTN SME 500 MB', 'SME', '115', '1', 'Thursday 2<sup>nd</sup>, February 2023 @ 9:20PM', '981', '866'),
(99, 'Jardade', '712150998', 'MTN', '08144556968', 'DATA', 'MTN SME 1GB', 'SME', '222', '0', 'Thursday 2<sup>nd</sup>, February 2023 @ 10:25PM', '245', '245'),
(100, 'Jardade', '419449385', 'MTN', '08144556968', 'DATA', 'MTN SME 1GB', 'SME', '222', '0', 'Thursday 2<sup>nd</sup>, February 2023 @ 10:35PM', '245', '245'),
(101, 'Jardade', '709426771', 'MTN', '08144556968', 'DATA', 'MTN SME 1GB', 'SME', '222', '0', 'Thursday 2<sup>nd</sup>, February 2023 @ 10:40PM', '245', '245'),
(102, 'Jardade', '259135030', 'MTN', '08144556968', 'DATA', 'MTN SME 1GB', 'SME', '222', '0', 'Thursday 2<sup>nd</sup>, February 2023 @ 10:55PM', '254.8', '254.8'),
(103, 'Jardade', '406869457', 'MTN', '08144556968', 'AIRTIME', '', 'VTU', '100', '0', 'Thursday 2<sup>nd</sup>, February 2023 @ 10:57PM', '254.8', '254.8'),
(104, 'Aminupaki', '264360414', 'AIRTEL', '09029714950', 'DATA', '100MB AIRTEL COOPERATE ', 'GIFTING', '30', '1', 'Friday 3<sup>rd</sup>, February 2023 @ 8:41AM', '450', '420'),
(105, 'Jardade', '266838456', 'MTN', '08144556968', 'DATA', 'MTN SME 1GB', 'SME', '222', '0', 'Friday 3<sup>rd</sup>, February 2023 @ 9:03AM', '254.8', '254.8'),
(106, 'Jardade', '680757291', '9MOBILE', '09075754242', 'AIRTIME', '', 'VTU', '245', '0', 'Friday 3<sup>rd</sup>, February 2023 @ 9:05AM', '254.8', '254.8'),
(107, 'abdurrahman32', '855452792', 'AIRTEL', '09079935451', 'DATA', '500MB AIRTEL COOPERATE ', 'GIFTING', '115', '0', 'Friday 3<sup>rd</sup>, February 2023 @ 9:15AM', '122.8', '122.8'),
(108, 'abdurrahman32', '863449885', 'AIRTEL', '09079935451', 'DATA', '500MB AIRTEL COOPERATE ', 'GIFTING', '115', '0', 'Friday 3<sup>rd</sup>, February 2023 @ 9:16AM', '122.8', '122.8'),
(109, 'abdurrahman32', '794956157', 'MTN', '09132519368', 'DATA', 'MTN SME 500 MB', 'SME', '115', '0', 'Friday 3<sup>rd</sup>, February 2023 @ 10:02AM', '122.8', '122.8'),
(110, 'abdurrahman32', '361049666', 'MTN', '09132519368', 'DATA', 'MTN SME 500 MB', 'SME', '115', '0', 'Friday 3<sup>rd</sup>, February 2023 @ 10:02AM', '122.8', '122.8'),
(111, 'abdurrahman32', '555011554', 'MTN', '09132519368', 'DATA', 'MTN SME 500 MB', 'SME', '115', '0', 'Friday 3<sup>rd</sup>, February 2023 @ 12:15PM', '122.8', '122.8'),
(112, 'abdurrahman32', '352155357', 'MTN', '09132519368', 'DATA', 'MTN SME 500 MB', 'SME', '115', '0', 'Friday 3<sup>rd</sup>, February 2023 @ 12:16PM', '122.8', '122.8'),
(113, 'Sadiqmurtala17', '625180337', 'MTN', '08167360656', 'DATA', 'MTN SME 500 MB', 'SME', '115', '0', 'Friday 3<sup>rd</sup>, February 2023 @ 5:01PM', '1043', '1043'),
(114, 'abdurrahman32', '196657941', 'MTN', '09132519368', 'DATA', 'MTN SME 500 MB', 'SME', '115', '0', 'Friday 3<sup>rd</sup>, February 2023 @ 6:20PM', '122.8', '122.8'),
(115, 'abdurrahman32', '212663841', 'MTN', '09132519368', 'DATA', 'MTN SME 500 MB', 'SME', '115', '1', 'Friday 3<sup>rd</sup>, February 2023 @ 6:20PM', '122.8', '7.8'),
(116, 'Paki', '539666716', 'MTN', '08101224110', 'DATA', 'MTN SME 1GB', 'SME', '222', '1', 'Friday 3<sup>rd</sup>, February 2023 @ 7:05PM', '358', '136'),
(117, 'Sadiqmurtala17', '533285277', 'MTN', '08167360656', 'DATA', 'MTN SME 500 MB', 'SME', '115', '1', 'Friday 3<sup>rd</sup>, February 2023 @ 8:52PM', '1043', '928'),
(118, 'Aminupaki', '757668020', 'AIRTEL', '07088912296', 'DATA', '1GB AIRTEL COOPERATE ', 'GIFTING', '213', '1', 'Friday 3<sup>rd</sup>, February 2023 @ 9:14PM', '420', '207'),
(119, 'Sadiqmurtala17', '692875324', 'MTN', '07060638967', 'DATA', 'MTN SME 500 MB', 'SME', '115', '1', 'Friday 3<sup>rd</sup>, February 2023 @ 9:31PM', '928', '813'),
(120, 'Sadiqmurtala17', '525608504', 'MTN', '07060638967', 'DATA', 'MTN SME 500 MB', 'SME', '115', '1', 'Friday 3<sup>rd</sup>, February 2023 @ 9:54PM', '813', '698'),
(121, 'Babandauda', '744932686', 'AIRTEL', '08083957971', 'DATA', '1GB AIRTEL COOPERATE ', 'GIFTING', '213', '1', 'Friday 3<sup>rd</sup>, February 2023 @ 9:56PM', '1800', '1587'),
(122, 'Jardade', '171249727', 'MTN', '08144556968', 'DATA', 'MTN SME 1GB', 'SME', '222', '1', 'Friday 3<sup>rd</sup>, February 2023 @ 10:24PM', '254.8', '32.8'),
(123, 'Aminupaki', '756357321', 'MTN', '07032057969', 'DATA', '500MB MTN COOPERATE GIFTING', 'GIFTING', '135', '1', 'Saturday 4<sup>th</sup>, February 2023 @ 1:39PM', '1052', '917'),
(124, 'Babandauda', '205660713', 'AIRTEL', '08083957971', 'DATA', '1GB AIRTEL COOPERATE ', 'GIFTING', '213', '1', 'Saturday 4<sup>th</sup>, February 2023 @ 3:13PM', '1587', '1374'),
(125, 'Babandauda', '993830853', 'MTN', '09064523725', 'DATA', 'MTN SME 1GB', 'SME', '222', '1', 'Saturday 4<sup>th</sup>, February 2023 @ 3:14PM', '1374', '1152'),
(126, 'Babandauda', '189835149', 'AIRTEL', '09016684079', 'DATA', '1GB AIRTEL COOPERATE ', 'GIFTING', '213', '1', 'Saturday 4<sup>th</sup>, February 2023 @ 3:15PM', '1152', '939'),
(127, 'Babandauda', '743634063', 'MTN', '09064523725', 'AIRTIME', 'AIRTIME', 'VTU', '99', '1', 'Saturday 4<sup>th</sup>, February 2023 @ 3:48PM', '939', '840'),
(128, 'Paki', '537305423', 'MTN', '08133619594', 'DATA', 'MTN SME 500 MB', 'SME', '115', '1', 'Saturday 4<sup>th</sup>, February 2023 @ 3:57PM', '136', '21'),
(129, 'Abusaleh1', '589829951', 'AIRTEL', '08028140381', 'DATA', '1GB AIRTEL COOPERATE ', 'GIFTING', '213', '0', 'Saturday 4<sup>th</sup>, February 2023 @ 5:25PM', '800', '800'),
(130, 'Abusaleh1', '747224006', 'AIRTEL', '08028140381', 'DATA', '1GB AIRTEL COOPERATE ', 'GIFTING', '213', '0', 'Saturday 4<sup>th</sup>, February 2023 @ 5:28PM', '800', '800'),
(131, 'Abusaleh1', '705365121', 'MTN', '08062500003', 'DATA', 'MTN SME 1GB', 'SME', '222', '0', 'Saturday 4<sup>th</sup>, February 2023 @ 5:33PM', '800', '800'),
(132, 'hussaiynah', '374770258', 'MTN', '08035029729', 'DATA', 'MTN SME 1GB', 'SME', '222', '0', 'Saturday 4<sup>th</sup>, February 2023 @ 5:39PM', '296.94', '296.94'),
(133, 'Babandauda', '496215030', 'MTN', '07046284992', 'DATA', 'MTN SME 1GB', 'SME', '222', '0', 'Saturday 4<sup>th</sup>, February 2023 @ 6:00PM', '840', '840'),
(134, 'Babandauda', '313423516', 'MTN', '07046284992', 'DATA', 'MTN SME 500 MB', 'SME', '115', '1', 'Saturday 4<sup>th</sup>, February 2023 @ 6:02PM', '840', '725'),
(135, 'Sadiqmurtala17', '663447512', 'AIRTEL', '09122633692', 'DATA', '1GB AIRTEL COOPERATE ', 'GIFTING', '213', '0', 'Saturday 4<sup>th</sup>, February 2023 @ 6:55PM', '698', '698'),
(136, 'Abba', '995348030', 'MTN', '09137336522', 'DATA', 'MTN SME 500 MB', 'SME', '115', '0', 'Saturday 4<sup>th</sup>, February 2023 @ 8:09PM', '500', '500'),
(137, 'Abba', '573912827', 'MTN', '09137336522', 'DATA', 'MTN SME 500 MB', 'SME', '115', '0', 'Saturday 4<sup>th</sup>, February 2023 @ 8:13PM', '500', '500'),
(138, 'Abba', '236503531', 'MTN', '09137336522', 'DATA', 'MTN SME 500 MB', 'SME', '115', '0', 'Saturday 4<sup>th</sup>, February 2023 @ 8:14PM', '500', '500'),
(139, 'Abba', '663459944', 'MTN', '09137336522', 'DATA', 'MTN SME 500 MB', 'SME', '115', '0', 'Saturday 4<sup>th</sup>, February 2023 @ 8:21PM', '500', '500'),
(140, 'Abba', '247946185', 'MTN', '09137336522', 'DATA', 'MTN SME 500 MB', 'SME', '115', '0', 'Saturday 4<sup>th</sup>, February 2023 @ 8:29PM', '500', '500'),
(141, 'Abba', '352566219', 'MTN', '09137336522', 'DATA', 'MTN SME 500 MB', 'SME', '115', '0', 'Saturday 4<sup>th</sup>, February 2023 @ 8:31PM', '500', '500'),
(142, 'Abba', '555711575', 'MTN', '09137336522', 'DATA', 'MTN SME 500 MB', 'SME', '115', '0', 'Saturday 4<sup>th</sup>, February 2023 @ 8:58PM', '500', '500'),
(143, 'Abba', '620318374', 'MTN', '09137336522', 'DATA', 'MTN SME 500 MB', 'SME', '115', '0', 'Saturday 4<sup>th</sup>, February 2023 @ 10:54PM', '500', '500'),
(144, 'Abusaleh1', '798412113', 'MTN', '08028140381', 'DATA', 'MTN SME 1GB', 'SME', '222', '0', 'Saturday 4<sup>th</sup>, February 2023 @ 11:09PM', '800', '800'),
(145, 'Abba', '887907456', 'MTN', '09137336522', 'DATA', 'MTN SME 500 MB', 'SME', '115', '0', 'Sunday 5<sup>th</sup>, February 2023 @ 6:45AM', '500', '500'),
(146, 'Abba', '841745305', 'MTN', '09137336522', 'DATA', 'MTN SME 500 MB', 'SME', '115', '0', 'Sunday 5<sup>th</sup>, February 2023 @ 6:47AM', '500', '500'),
(147, 'Abba', '822818123', 'MTN', '09137336522', 'DATA', 'MTN SME 500 MB', 'SME', '115', '0', 'Sunday 5<sup>th</sup>, February 2023 @ 7:07AM', '500', '500'),
(148, 'Abba', '539594262', 'AIRTEL', '09079935451', 'DATA', '300MB AIRTEL COOPERATE ', 'GIFTING', '70', '1', 'Sunday 5<sup>th</sup>, February 2023 @ 9:52AM', '500', '430'),
(149, 'Abba', '891736285', 'MTN', '09137336522', 'DATA', 'MTN SME 500 MB', 'SME', '115', '0', 'Sunday 5<sup>th</sup>, February 2023 @ 9:54AM', '430', '430'),
(150, 'Aminupaki', '452667789', 'AIRTEL', '09122572643', 'DATA', '500MB AIRTEL COOPERATE ', 'GIFTING', '115', '0', 'Sunday 5<sup>th</sup>, February 2023 @ 11:11AM', '917', '917'),
(151, 'Aminupaki', '307180554', 'AIRTEL', '09122572643', 'DATA', '500MB AIRTEL COOPERATE ', 'GIFTING', '115', '0', 'Sunday 5<sup>th</sup>, February 2023 @ 11:16AM', '917', '917'),
(152, 'Aminupaki', '391373645', 'AIRTEL', '09122572643', 'DATA', '500MB AIRTEL COOPERATE ', 'GIFTING', '115', '0', 'Sunday 5<sup>th</sup>, February 2023 @ 11:16AM', '917', '917'),
(153, 'Aminupaki', '375142941', 'AIRTEL', '09122572643', 'DATA', '500MB AIRTEL COOPERATE ', 'GIFTING', '115', '0', 'Sunday 5<sup>th</sup>, February 2023 @ 11:19AM', '917', '917'),
(154, 'Aminupaki', '486530235', 'MTN', '07033994966', 'DATA', 'MTN SME 500 MB', 'SME', '115', '0', 'Sunday 5<sup>th</sup>, February 2023 @ 11:20AM', '917', '917'),
(155, 'Aminupaki', '611713262', 'MTN', '07033994966', 'DATA', 'MTN SME 500 MB', 'SME', '115', '0', 'Sunday 5<sup>th</sup>, February 2023 @ 11:22AM', '917', '917'),
(156, 'Aminupaki', '875555324', 'MTN', '07033994966', 'DATA', 'MTN SME 500 MB', 'SME', '115', '0', 'Sunday 5<sup>th</sup>, February 2023 @ 11:36AM', '917', '917'),
(157, 'Aminupaki', '259462597', 'AIRTEL', '09122572643', 'DATA', '100MB AIRTEL COOPERATE ', 'GIFTING', '30', '0', 'Sunday 5<sup>th</sup>, February 2023 @ 11:37AM', '917', '917'),
(158, 'Aminupaki', '660654990', 'AIRTEL', '09122572643', 'DATA', '500MB AIRTEL COOPERATE ', 'GIFTING', '115', '0', 'Sunday 5<sup>th</sup>, February 2023 @ 12:40PM', '917', '917'),
(159, 'Aminupaki', '193987669', 'MTN', '07033994966', 'DATA', 'MTN SME 500 MB', 'SME', '115', '0', 'Sunday 5<sup>th</sup>, February 2023 @ 12:42PM', '917', '917'),
(160, 'Aminupaki', '415184095', 'MTN', '07033994966', 'DATA', 'MTN SME 500 MB', 'SME', '115', '0', 'Sunday 5<sup>th</sup>, February 2023 @ 12:43PM', '917', '917'),
(161, 'Aminupaki', '479911649', 'MTN', '07033994966', 'DATA', 'MTN SME 500 MB', 'SME', '115', '0', 'Sunday 5<sup>th</sup>, February 2023 @ 12:48PM', '917', '917'),
(162, 'yahyapaki', '159988153', 'MTN', '08069598755', 'DATA', 'MTN SME 2GB', 'SME', '444', '0', 'Sunday 5<sup>th</sup>, February 2023 @ 1:22PM', '528', '528'),
(163, 'yahyapaki', '984724764', 'MTN', '08069598755', 'DATA', 'MTN SME 2GB', 'SME', '444', '0', 'Sunday 5<sup>th</sup>, February 2023 @ 1:22PM', '528', '528'),
(164, 'yahyapaki', '103409124', 'MTN', '08069598755', 'DATA', 'MTN SME 1GB', 'SME', '222', '0', 'Sunday 5<sup>th</sup>, February 2023 @ 1:24PM', '528', '528'),
(165, 'yahyapaki', '787240049', 'AIRTEL', '09016504576', 'DATA', '300MB AIRTEL COOPERATE ', 'GIFTING', '70', '0', 'Sunday 5<sup>th</sup>, February 2023 @ 1:25PM', '528', '528'),
(166, 'Abba', '863020201', 'MTN', '09137336522', 'DATA', 'MTN SME 500 MB', 'SME', '115', '0', 'Sunday 5<sup>th</sup>, February 2023 @ 1:33PM', '430', '430'),
(167, 'hussaiynah', '166659118', 'MTN', '08037916391', 'DATA', 'MTN SME 1GB', 'SME', '222', '0', 'Sunday 5<sup>th</sup>, February 2023 @ 1:43PM', '296.94', '296.94'),
(168, 'yahyapaki', '311065029', 'MTN', '08069598755', 'DATA', 'MTN SME 1GB', 'SME', '222', '0', 'Sunday 5<sup>th</sup>, February 2023 @ 1:44PM', '528', '528'),
(169, 'hussaiynah', '639099873', 'MTN', '08037916391', 'DATA', 'MTN SME 500 MB', 'SME', '115', '0', 'Sunday 5<sup>th</sup>, February 2023 @ 1:45PM', '296.94', '296.94'),
(170, 'hussaiynah', '742197566', 'AIRTEL', '08125018324', 'DATA', '500MB AIRTEL COOPERATE ', 'GIFTING', '115', '0', 'Sunday 5<sup>th</sup>, February 2023 @ 1:46PM', '296.94', '296.94'),
(171, 'yahyapaki', '854570620', 'MTN', '08069598755', 'DATA', 'MTN SME 1GB', 'SME', '222', '0', 'Sunday 5<sup>th</sup>, February 2023 @ 1:48PM', '528', '528'),
(172, 'yahyapaki', '160233555', 'MTN', '08069598755', 'DATA', 'MTN SME 1GB', 'SME', '222', '0', 'Sunday 5<sup>th</sup>, February 2023 @ 2:06PM', '528', '528'),
(173, 'yahyapaki', '605008874', 'MTN', '08069598755', 'DATA', 'MTN SME 1GB', 'SME', '222', '0', 'Sunday 5<sup>th</sup>, February 2023 @ 2:17PM', '528', '528'),
(174, 'yahaya1944', '543255048', 'MTN', '07034613726', 'DATA', 'MTN SME 1GB', 'SME', '222', '0', 'Sunday 5<sup>th</sup>, February 2023 @ 3:04PM', '235.2', '235.2'),
(175, 'yahaya1944', '704641272', 'MTN', '07034613726', 'DATA', 'MTN SME 1GB', 'SME', '222', '0', 'Sunday 5<sup>th</sup>, February 2023 @ 3:05PM', '235.2', '235.2'),
(176, 'yahaya1944', '571850150', 'MTN', '07034613726', 'DATA', 'MTN SME 1GB', 'SME', '222', '0', 'Sunday 5<sup>th</sup>, February 2023 @ 3:06PM', '235.2', '235.2'),
(177, 'yahaya1944', '131840386', 'MTN', '07034613726', 'DATA', 'MTN SME 1GB', 'SME', '222', '0', 'Sunday 5<sup>th</sup>, February 2023 @ 3:11PM', '235.2', '235.2'),
(178, 'yahaya1944', '577416429', 'MTN', '07034613726', 'DATA', 'MTN SME 1GB', 'SME', '222', '0', 'Sunday 5<sup>th</sup>, February 2023 @ 3:12PM', '235.2', '235.2'),
(179, 'yahaya1944', '379229196', 'MTN', '07034613726', 'DATA', 'MTN SME 500 MB', 'SME', '115', '0', 'Sunday 5<sup>th</sup>, February 2023 @ 3:12PM', '235.2', '235.2'),
(180, 'Aminupaki', '477738073', 'AIRTEL', '09122572643', 'DATA', '500MB AIRTEL COOPERATE ', 'GIFTING', '115', '0', 'Sunday 5<sup>th</sup>, February 2023 @ 3:30PM', '917', '917'),
(181, 'Aminupaki', '434216363', 'MTN', '07033994966', 'DATA', 'MTN SME 500 MB', 'SME', '115', '0', 'Sunday 5<sup>th</sup>, February 2023 @ 3:40PM', '917', '917'),
(182, 'yahaya1944', '610209049', 'MTN', '07034613726', 'DATA', 'MTN SME 1GB', 'SME', '222', '0', 'Sunday 5<sup>th</sup>, February 2023 @ 4:03PM', '235.2', '235.2'),
(183, 'yahaya1944', '784495290', 'MTN', '07034613726', 'DATA', 'MTN SME 1GB', 'SME', '222', '0', 'Sunday 5<sup>th</sup>, February 2023 @ 4:04PM', '235.2', '235.2'),
(184, 'yahaya1944', '482472376', 'MTN', '07034613726', 'DATA', 'MTN SME 1GB', 'SME', '222', '0', 'Sunday 5<sup>th</sup>, February 2023 @ 4:04PM', '235.2', '235.2'),
(185, 'yahaya1944', '859875750', 'MTN', '07034613726', 'DATA', 'MTN SME 1GB', 'SME', '222', '0', 'Sunday 5<sup>th</sup>, February 2023 @ 4:04PM', '235.2', '235.2'),
(186, 'yahaya1944', '143492841', 'MTN', '07034613726', 'DATA', 'MTN SME 1GB', 'SME', '222', '0', 'Sunday 5<sup>th</sup>, February 2023 @ 4:42PM', '235.2', '235.2'),
(187, 'Adnan', '696241574', 'AIRTEL', '09115324844', 'DATA', '300MB AIRTEL COOPERATE ', 'GIFTING', '70', '0', 'Sunday 5<sup>th</sup>, February 2023 @ 5:12PM', '866', '866'),
(188, 'Adnan', '358083391', 'AIRTEL', '09115324844', 'DATA', '300MB AIRTEL COOPERATE ', 'GIFTING', '70', '0', 'Sunday 5<sup>th</sup>, February 2023 @ 5:14PM', '866', '866'),
(189, 'yahyapaki', '103507692', 'MTN', '08069598755', 'DATA', 'MTN SME 1GB', 'SME', '222', '0', 'Sunday 5<sup>th</sup>, February 2023 @ 5:22PM', '528', '528'),
(190, 'yahyapaki', '914309329', 'MTN', '08069598755', 'DATA', 'MTN SME 2GB', 'SME', '444', '0', 'Sunday 5<sup>th</sup>, February 2023 @ 5:45PM', '528', '528'),
(191, 'Abba', '857509771', 'MTN', '09137336522', 'DATA', 'MTN SME 500 MB', 'SME', '115', '0', 'Sunday 5<sup>th</sup>, February 2023 @ 6:40PM', '430', '430'),
(192, 'yahaya1944', '554290093', 'MTN', '07034613726', 'DATA', 'MTN SME 1GB', 'SME', '222', '0', 'Sunday 5<sup>th</sup>, February 2023 @ 8:04PM', '235.2', '235.2'),
(193, 'yahaya1944', '663583848', 'MTN', '07034613726', 'DATA', 'MTN SME 1GB', 'SME', '222', '0', 'Sunday 5<sup>th</sup>, February 2023 @ 8:05PM', '235.2', '235.2'),
(194, 'yahyapaki', '929399286', 'MTN', '08069598755', 'DATA', 'MTN SME 1GB', 'SME', '222', '0', 'Sunday 5<sup>th</sup>, February 2023 @ 9:17PM', '528', '528'),
(195, 'Abba', '612638975', 'MTN', '08133941135', 'DATA', 'MTN SME 500 MB', 'SME', '115', '0', 'Sunday 5<sup>th</sup>, February 2023 @ 10:28PM', '430', '430'),
(196, 'Abba', '938970117', 'MTN', '08133941135', 'DATA', 'MTN SME 500 MB', 'SME', '115', '0', 'Sunday 5<sup>th</sup>, February 2023 @ 10:28PM', '430', '430'),
(197, 'Abba', '635528350', 'MTN', '08133941135', 'DATA', 'MTN SME 500 MB', 'SME', '115', '0', 'Sunday 5<sup>th</sup>, February 2023 @ 10:29PM', '430', '430'),
(198, 'Abusaleh1', '280738351', 'AIRTEL', '08028140381', 'DATA', '1GB AIRTEL COOPERATE ', 'GIFTING', '213', '0', 'Sunday 5<sup>th</sup>, February 2023 @ 10:34PM', '800', '800'),
(199, 'Abba', '102209432', 'MTN', '08133941135', 'DATA', 'MTN SME 500 MB', 'SME', '115', '0', 'Sunday 5<sup>th</sup>, February 2023 @ 10:41PM', '430', '430'),
(200, 'yahaya1944', '551040208', 'MTN', '07034613726', 'DATA', 'MTN SME 1GB', 'SME', '222', '0', 'Sunday 5<sup>th</sup>, February 2023 @ 11:02PM', '235.2', '235.2'),
(201, 'yahaya1944', '740908232', 'MTN', '07034613726', 'DATA', '500MB MTN COOPERATE GIFTING', 'GIFTING', '135', '0', 'Sunday 5<sup>th</sup>, February 2023 @ 11:03PM', '235.2', '235.2'),
(202, 'yahaya1944', '153987316', 'MTN', '07034613726', 'DATA', '500MB MTN COOPERATE GIFTING', 'GIFTING', '135', '0', 'Sunday 5<sup>th</sup>, February 2023 @ 11:04PM', '235.2', '235.2'),
(203, 'Adnan', '630470303', 'MTN', '08133020415', 'DATA', 'MTN SME 1GB', 'SME', '222', '0', 'Sunday 5<sup>th</sup>, February 2023 @ 11:22PM', '866', '866'),
(204, 'yahaya1944', '397559999', 'MTN', '07034613726', 'DATA', 'MTN SME 1GB', 'SME', '222', '0', 'Monday 6<sup>th</sup>, February 2023 @ 4:08AM', '235.2', '235.2'),
(205, 'yahaya1944', '207965359', 'MTN', '07034613726', 'DATA', 'MTN SME 1GB', 'SME', '222', '0', 'Monday 6<sup>th</sup>, February 2023 @ 4:08AM', '235.2', '235.2'),
(206, 'yahaya1944', '169796502', 'MTN', '07034613726', 'DATA', 'MTN SME 1GB', 'SME', '222', '0', 'Monday 6<sup>th</sup>, February 2023 @ 4:08AM', '235.2', '235.2'),
(207, 'Aminupaki', '743840057', 'MTN', '07033994966', 'DATA', 'MTN SME 500 MB', 'SME', '115', '0', 'Monday 6<sup>th</sup>, February 2023 @ 9:16AM', '917', '917'),
(208, 'Abba', '345246784', 'MTN', '09137336522', 'DATA', 'MTN SME 500 MB', 'SME', '115', '0', 'Monday 6<sup>th</sup>, February 2023 @ 9:43AM', '430', '430'),
(209, 'yahaya1944', '711777213', 'MTN', '07034613726', 'DATA', 'MTN SME 1GB', 'SME', '222', '0', 'Monday 6<sup>th</sup>, February 2023 @ 10:03AM', '235.2', '235.2'),
(210, 'Abusaleh1', '469571895', 'MTN', '08062500003', 'DATA', 'MTN SME 1GB', 'SME', '222', '1', 'Monday 6<sup>th</sup>, February 2023 @ 1:30PM', '800', '578'),
(211, 'abdurrahman32', '130275073', 'AIRTEL', '09079935451', 'DATA', '300MB AIRTEL COOPERATE ', 'GIFTING', '70', '1', 'Monday 6<sup>th</sup>, February 2023 @ 1:31PM', '144.02', '74.02'),
(212, 'yahaya1944', '531211865', 'MTN', '07034613726', 'DATA', 'MTN SME 1GB', 'SME', '222', '1', 'Monday 6<sup>th</sup>, February 2023 @ 1:41PM', '235.2', '13.2'),
(213, 'Abba', '413320839', 'MTN', '09137336522', 'DATA', 'MTN SME 500 MB', 'SME', '115', '1', 'Monday 6<sup>th</sup>, February 2023 @ 3:45PM', '430', '315'),
(214, 'Abusaleh1', '579103961', 'AIRTEL', '08028140381', 'DATA', '1GB AIRTEL COOPERATE ', 'GIFTING', '213', '1', 'Monday 6<sup>th</sup>, February 2023 @ 7:14PM', '578', '365'),
(215, 'Abba', '862784100', 'MTN', '09035557591', 'DATA', 'MTN SME 500 MB', 'SME', '115', '1', 'Monday 6<sup>th</sup>, February 2023 @ 10:59PM', '315', '200'),
(216, 'Aminupaki', '777594469', 'AIRTEL', '09122572643', 'DATA', '500MB AIRTEL COOPERATE ', 'GIFTING', '115', '1', 'Tuesday 7<sup>th</sup>, February 2023 @ 9:39AM', '917', '802'),
(217, 'Abba', '510694139', 'MTN', '08145234321', 'DATA', 'MTN SME 500 MB', 'SME', '115', '1', 'Tuesday 7<sup>th</sup>, February 2023 @ 11:04AM', '200', '85'),
(218, 'Adnan', '399769243', 'MTN', '08133020415', 'DATA', 'MTN SME 500 MB', 'SME', '115', '1', 'Tuesday 7<sup>th</sup>, February 2023 @ 5:03PM', '866', '751'),
(219, 'Abba', '174525761', 'MTN', '09138991371', 'DATA', 'MTN SME 500 MB', 'SME', '115', '1', 'Tuesday 7<sup>th</sup>, February 2023 @ 5:28PM', '183', '68'),
(220, 'abdurrahman32', '427577088', 'AIRTEL', '09079935451', 'DATA', '300MB AIRTEL COOPERATE ', 'GIFTING', '70', '1', 'Tuesday 7<sup>th</sup>, February 2023 @ 5:37PM', '83.82', '13.82'),
(221, 'Sadiqmurtala17', '597807727', 'MTN', '07063169039', 'DATA', '500MB MTN COOPERATE GIFTING', 'GIFTING', '135', '1', 'Tuesday 7<sup>th</sup>, February 2023 @ 9:39PM', '698', '563'),
(222, 'Sadiqmurtala17', '956286853', 'MTN', '08031333310', 'DATA', '1GB MTN COOPERATE GIFTING', 'GIFTING', '250', '1', 'Tuesday 7<sup>th</sup>, February 2023 @ 10:08PM', '563', '313'),
(223, 'Sadiqmurtala17', '518952779', 'AIRTEL', '07015702110', 'DATA', '500MB AIRTEL COOPERATE ', 'GIFTING', '115', '1', 'Tuesday 7<sup>th</sup>, February 2023 @ 10:19PM', '313', '198'),
(224, 'Aminupaki', '826137749', 'AIRTEL', '09122572643', 'DATA', '500MB AIRTEL COOPERATE ', 'GIFTING', '115', '1', 'Tuesday 7<sup>th</sup>, February 2023 @ 11:39PM', '802', '687'),
(225, 'Aminupaki', '663131098', 'MTN', '08069771088', 'DATA', '500MB MTN COOPERATE GIFTING', 'GIFTING', '135', '1', 'Wednesday 8<sup>th</sup>, February 2023 @ 7:23AM', '687', '552'),
(226, 'Aminupaki', '218296733', 'MTN', '09031948295', 'DATA', 'MTN SME 500 MB', 'SME', '115', '0', 'Wednesday 8<sup>th</sup>, February 2023 @ 9:16AM', '552', '552'),
(227, 'Aminupaki', '877221853', 'MTN', '09031948295', 'DATA', 'MTN SME 500 MB', 'SME', '115', '0', 'Wednesday 8<sup>th</sup>, February 2023 @ 9:17AM', '552', '552'),
(228, 'Aminupaki', '107597925', 'MTN', '09031948295', 'DATA', 'MTN SME 500 MB', 'SME', '115', '0', 'Wednesday 8<sup>th</sup>, February 2023 @ 9:18AM', '552', '552'),
(229, 'Aminupaki', '102709158', 'MTN', '09031948295', 'DATA', 'MTN SME 500 MB', 'SME', '115', '0', 'Wednesday 8<sup>th</sup>, February 2023 @ 9:19AM', '552', '552'),
(230, 'Aminupaki', '627645279', 'MTN', '09031948295', 'DATA', 'MTN SME 500 MB', 'SME', '115', '0', 'Wednesday 8<sup>th</sup>, February 2023 @ 10:11AM', '552', '552'),
(231, 'yahyapaki', '165847976', 'MTN', '08069598755', 'DATA', 'MTN SME 1GB', 'SME', '222', '0', 'Wednesday 8<sup>th</sup>, February 2023 @ 5:19PM', '528', '528'),
(232, 'Abusaleh1', '479578044', 'AIRTEL', '08029806120', 'DATA', '500MB AIRTEL COOPERATE ', 'GIFTING', '115', '0', 'Wednesday 8<sup>th</sup>, February 2023 @ 7:34PM', '365', '365'),
(233, 'yahyapaki', '525848034', 'MTN', '08069598755', 'DATA', 'MTN SME 1GB', 'SME', '222', '1', 'Wednesday 8<sup>th</sup>, February 2023 @ 10:12PM', '528', '306'),
(234, 'Aminupaki', '900130360', 'AIRTEL', '09122572643', 'DATA', '300MB AIRTEL COOPERATE ', 'GIFTING', '70', '1', 'Wednesday 8<sup>th</sup>, February 2023 @ 11:22PM', '552', '482'),
(235, 'Sadiqmurtala17', '375861141', 'MTN', '07037858766', 'DATA', 'MTN SME 2GB', 'SME', '444', '1', 'Thursday 9<sup>th</sup>, February 2023 @ 12:04PM', '1698', '1254'),
(236, 'Sadiqmurtala17', '645183138', 'MTN', '08164430304', 'DATA', 'MTN SME 500 MB', 'SME', '115', '1', 'Thursday 9<sup>th</sup>, February 2023 @ 12:19PM', '1254', '1139'),
(237, 'Sadiqmurtala17', '608960090', 'AIRTEL', '07017561487', 'DATA', '500MB AIRTEL COOPERATE ', 'GIFTING', '115', '1', 'Thursday 9<sup>th</sup>, February 2023 @ 12:21PM', '1139', '1024'),
(238, 'Salaam', '775746705', 'MTN', '08166371834', 'DATA', 'MTN SME 1GB', 'SME', '222', '1', 'Thursday 9<sup>th</sup>, February 2023 @ 1:52PM', '495.93', '273.93'),
(239, 'Sadiqmurtala17', '516538934', 'MTN', '08036793644', 'DATA', 'MTN SME 500 MB', 'SME', '115', '1', 'Thursday 9<sup>th</sup>, February 2023 @ 2:23PM', '1024', '909'),
(240, 'hussaiynah', '240087669', 'MTN', '08037916391', 'AIRTIME', 'AIRTIME', 'VTU', '69.3', '1', 'Thursday 9<sup>th</sup>, February 2023 @ 3:27PM', '296.94', '227.64'),
(241, 'hussaiynah', '326785682', 'MTN', '07038994961', 'DATA', 'MTN SME 500 MB', 'SME', '115', '1', 'Thursday 9<sup>th</sup>, February 2023 @ 6:18PM', '227.64', '112.64'),
(242, 'Sadiqmurtala17', '477858520', 'MTN', '07063169039', 'DATA', 'MTN SME 1GB', 'SME', '222', '1', 'Thursday 9<sup>th</sup>, February 2023 @ 9:19PM', '909', '687'),
(243, 'hussaiynah', '513774109', 'MTN', '08064715330', 'DATA', 'MTN SME 500 MB', 'SME', '115', '1', 'Thursday 9<sup>th</sup>, February 2023 @ 9:23PM', '249.84', '134.84'),
(244, 'Paki', '917667509', 'MTN', '08101224110', 'DATA', 'MTN SME 1GB', 'SME', '222', '1', 'Thursday 9<sup>th</sup>, February 2023 @ 10:23PM', '315', '93'),
(245, 'Paki', '819235205', 'AIRTEL', '08088882276', 'DATA', '5GB AIRTEL COOPERATE ', 'GIFTING', '1055', '1', 'Friday 10<sup>th</sup>, February 2023 @ 7:23AM', '2053', '998'),
(246, 'Paki', '350444607', 'MTN', '08101224110', 'DATA', 'MTN SME 2GB', 'SME', '444', '1', 'Friday 10<sup>th</sup>, February 2023 @ 7:25AM', '998', '554'),
(247, 'Sadiqmurtala17', '870662183', 'MTN', '08062804697', 'DATA', 'MTN SME 1GB', 'SME', '222', '1', 'Friday 10<sup>th</sup>, February 2023 @ 8:03AM', '687', '465'),
(248, 'Sadiqmurtala17', '232878166', 'MTN', '09134750615', 'DATA', 'MTN SME 500 MB', 'SME', '115', '1', 'Friday 10<sup>th</sup>, February 2023 @ 10:40AM', '465', '350'),
(249, 'Sadiqmurtala17', '683027150', 'MTN', '09061993620', 'DATA', 'MTN SME 500 MB', 'SME', '115', '1', 'Friday 10<sup>th</sup>, February 2023 @ 12:43PM', '350', '235'),
(250, 'Aminupaki', '593569870', 'MTN', '08166665856', 'DATA', 'MTN SME 1GB', 'SME', '222', '1', 'Friday 10<sup>th</sup>, February 2023 @ 3:23PM', '482', '260'),
(251, 'Aminupaki', '608331319', 'MTN', '07033994966', 'DATA', 'MTN SME 500 MB', 'SME', '115', '1', 'Friday 10<sup>th</sup>, February 2023 @ 5:21PM', '260', '145'),
(252, 'Salaam', '113184628', 'MTN', '08143431807', 'DATA', 'MTN SME 1GB', 'SME', '222', '1', 'Friday 10<sup>th</sup>, February 2023 @ 7:42PM', '273.93', '51.93'),
(253, 'hussaiynah', '100923272', 'MTN', '08109202967', 'DATA', 'MTN SME 500 MB', 'SME', '115', '1', 'Friday 10<sup>th</sup>, February 2023 @ 10:08PM', '134.84', '19.84'),
(254, 'abdurrahman32', '630648951', 'AIRTEL', '09079935451', 'DATA', '500MB AIRTEL COOPERATE ', 'GIFTING', '115', '1', 'Saturday 11<sup>th</sup>, February 2023 @ 10:49AM', '131.42', '16.42'),
(255, 'Babandauda', '776766787', 'AIRTEL', '08083957971', 'DATA', '1GB AIRTEL COOPERATE ', 'GIFTING', '213', '1', 'Saturday 11<sup>th</sup>, February 2023 @ 10:52AM', '725', '512'),
(256, 'Babandauda', '270685106', 'MTN', '07042789031', 'DATA', 'MTN SME 1GB', 'SME', '222', '0', 'Saturday 11<sup>th</sup>, February 2023 @ 10:54AM', '512', '512'),
(257, 'Babandauda', '134337434', 'MTN', '07042789031', 'DATA', 'MTN SME 500 MB', 'SME', '115', '0', 'Saturday 11<sup>th</sup>, February 2023 @ 10:55AM', '512', '512'),
(258, 'Babandauda', '287751118', 'MTN', '09064523725', 'AIRTIME', '', 'VTU', '100', '0', 'Saturday 11<sup>th</sup>, February 2023 @ 12:13PM', '512', '512'),
(259, 'Babandauda', '495406427', 'MTN', '09064523725', 'DATA', 'MTN SME 500 MB', 'SME', '115', '0', 'Saturday 11<sup>th</sup>, February 2023 @ 12:15PM', '512', '512'),
(260, 'Babandauda', '111586722', '9MOBILE', '08083957971', 'AIRTIME', '', 'VTU', '100', '0', 'Saturday 11<sup>th</sup>, February 2023 @ 12:17PM', '512', '512'),
(261, 'Babandauda', '362688829', 'MTN', '09030584015', 'DATA', 'MTN SME 500 MB', 'SME', '115', '1', 'Saturday 11<sup>th</sup>, February 2023 @ 12:30PM', '512', '397'),
(262, 'Babandauda', '138213522', 'MTN', '07042789031', 'DATA', 'MTN SME 1GB', 'SME', '222', '1', 'Saturday 11<sup>th</sup>, February 2023 @ 12:32PM', '397', '175'),
(263, 'Babandauda', '118259783', '9MOBILE', '08083957971', 'AIRTIME', 'AIRTIME', 'VTU', '99', '1', 'Saturday 11<sup>th</sup>, February 2023 @ 12:34PM', '175', '76'),
(264, 'Aminupaki', '733819473', 'AIRTEL', '09122572643', 'DATA', '300MB AIRTEL COOPERATE ', 'GIFTING', '70', '1', 'Saturday 11<sup>th</sup>, February 2023 @ 2:00PM', '145', '75'),
(265, 'Babandauda', '263225611', 'MTN', '09064523725', 'DATA', 'MTN SME 1GB', 'SME', '222', '1', 'Saturday 11<sup>th</sup>, February 2023 @ 8:27PM', '576', '354'),
(266, 'Sadiqmurtala17', '394657581', 'AIRTEL', '09115219065', 'DATA', '500MB AIRTEL COOPERATE ', 'GIFTING', '115', '0', 'Saturday 11<sup>th</sup>, February 2023 @ 8:44PM', '235', '235'),
(267, 'Sadiqmurtala17', '974845545', 'AIRTEL', '09025749045', 'DATA', '500MB AIRTEL COOPERATE ', 'GIFTING', '115', '0', 'Saturday 11<sup>th</sup>, February 2023 @ 9:04PM', '235', '235'),
(268, 'Adnan', '676363260', 'AIRTEL', '09070096738', 'DATA', '500MB AIRTEL COOPERATE ', 'GIFTING', '115', '1', 'Saturday 11<sup>th</sup>, February 2023 @ 11:16PM', '751', '636'),
(269, 'Adnan', '612370140', 'MTN', '07068671058', 'DATA', 'MTN SME 500 MB', 'SME', '115', '1', 'Saturday 11<sup>th</sup>, February 2023 @ 11:21PM', '636', '521'),
(270, 'Sadiqmurtala17', '831828388', 'AIRTEL', '09115219065', 'DATA', '500MB AIRTEL COOPERATE ', 'GIFTING', '115', '0', 'Sunday 12<sup>th</sup>, February 2023 @ 3:03PM', '235', '235'),
(271, 'Adnan', '408208801', 'AIRTEL', '09113663954', 'DATA', '500MB AIRTEL COOPERATE ', 'GIFTING', '115', '0', 'Sunday 12<sup>th</sup>, February 2023 @ 3:06PM', '521', '521'),
(272, 'Sadiqmurtala17', '442075295', 'MTN', '08033587463', 'DATA', 'MTN SME 500 MB', 'SME', '115', '1', 'Sunday 12<sup>th</sup>, February 2023 @ 6:41PM', '235', '120'),
(273, 'Adnan', '746572441', 'MTN', '08100345323', 'DATA', 'MTN SME 1GB', 'SME', '222', '1', 'Sunday 12<sup>th</sup>, February 2023 @ 8:33PM', '521', '299'),
(274, 'Adnan', '133026242', 'AIRTEL', '09113663954', 'DATA', '500MB AIRTEL COOPERATE ', 'GIFTING', '115', '0', 'Sunday 12<sup>th</sup>, February 2023 @ 8:54PM', '299', '299'),
(275, 'yahyapaki', '823132367', 'MTN', '08135766169', 'DATA', 'MTN SME 500 MB', 'SME', '115', '1', 'Sunday 12<sup>th</sup>, February 2023 @ 9:00PM', '306', '191'),
(276, 'Adnan', '813093051', 'AIRTEL', '08128288100', 'DATA', '500MB AIRTEL COOPERATE ', 'GIFTING', '115', '1', 'Sunday 12<sup>th</sup>, February 2023 @ 9:16PM', '299', '184'),
(277, 'Sadiqmurtala17', '339725145', 'MTN', '07063169039', 'DATA', 'MTN SME 500 MB', 'SME', '115', '1', 'Sunday 12<sup>th</sup>, February 2023 @ 10:08PM', '130', '15'),
(278, 'Abusaleh1', '148579991', 'AIRTEL', '08028140381', 'DATA', '1GB AIRTEL COOPERATE ', 'GIFTING', '213', '1', 'Sunday 12<sup>th</sup>, February 2023 @ 11:40PM', '365', '152'),
(279, 'Abusaleh1', '366374467', 'MTN', '08062500003', 'DATA', 'MTN SME 500 MB', 'SME', '115', '1', 'Sunday 12<sup>th</sup>, February 2023 @ 11:43PM', '152', '37'),
(280, 'Babandauda', '657645070', 'MTN', '09064523725', 'AIRTIME', 'AIRTIME', 'VTU', '99', '1', 'Monday 13<sup>th</sup>, February 2023 @ 8:46AM', '354', '255'),
(281, 'Babandauda', '948961822', 'MTN', '09064523725', 'AIRTIME', 'AIRTIME', 'VTU', '198', '1', 'Monday 13<sup>th</sup>, February 2023 @ 2:55PM', '255', '57'),
(282, 'Babandauda', '984774290', '9MOBILE', '08083957971', 'AIRTIME', 'AIRTIME', 'VTU', '51.48', '1', 'Monday 13<sup>th</sup>, February 2023 @ 5:08PM', '57', '5.52');

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

CREATE TABLE `transfer` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `newbal` varchar(255) NOT NULL,
  `oldbal` varchar(255) NOT NULL,
  `transid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transfer`
--

INSERT INTO `transfer` (`id`, `username`, `amount`, `newbal`, `oldbal`, `transid`, `name`, `status`, `date`) VALUES
(2, 'Adex', '100', '765', '865', '934845140', 'mahmoudaminugml2019@gmail.com', '1', 'Thursday 3<sup>rd</sup>, February 2022 @ 8:50AM'),
(3, 'Adex', '100', '665', '765', '295353501', 'mahmoudaminugml2019@gmail.com', '1', 'Thursday 3<sup>rd</sup>, February 2022 @ 8:51AM');

-- --------------------------------------------------------

--
-- Table structure for table `upgrade_user`
--

CREATE TABLE `upgrade_user` (
  `id` int(11) NOT NULL,
  `reseller` varchar(255) NOT NULL,
  `topup` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `upgrade_user`
--

INSERT INTO `upgrade_user` (`id`, `reseller`, `topup`) VALUES
(1, '200', '100');

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
  `ref` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `bal` varchar(255) NOT NULL,
  `refbal` varchar(255) NOT NULL,
  `kyc` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `apikey` varchar(255) NOT NULL,
  `accountname` varchar(255) DEFAULT NULL,
  `bankname` varchar(255) DEFAULT NULL,
  `accountnumber` varchar(255) DEFAULT NULL,
  `autofund` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `pin` varchar(255) DEFAULT NULL,
  `monnify` varchar(255) DEFAULT NULL,
  `rolexbank` varchar(255) DEFAULT NULL,
  `rolexnumber` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `email`, `phone`, `ref`, `status`, `password`, `bal`, `refbal`, `kyc`, `date`, `apikey`, `accountname`, `bankname`, `accountnumber`, `autofund`, `type`, `ip`, `pin`, `monnify`, `rolexbank`, `rolexnumber`) VALUES
(389, 'Musa Sani Umar', 'musasu', 'sanim4129@gmail.com', '09064523725', '', '1', '3437103c3f', '2000', '0.0', '0', '27/01/2023 10:03', 'CBG3Amb2137A4rAgFC2BIC8cvk3CxCDw70CHEAA23ehCsxbclC6zAxd89ixn', 'musasu', 'Wema bank', '8828028066', 'ACTIVE', 'SMART', '105.112.113.219', '1123', NULL, 'Moniepoint Microfinance Bank', '6226537189'),
(390, 'MUSA SANI UMAR', 'Admin1', 'musatrader4129@gmail.com', '08083957971', '', '1', '3437103c3f', '0.0', '0.0', '0', '27/01/2023 11:23', 'xxC8yAA2awCx8303h7m3v5x2Cb7E5ctdC2sC3BHCkBbliCDB6np9JzgBAAA1', NULL, NULL, NULL, NULL, 'SMART', '105.112.114.65', NULL, NULL, NULL, NULL),
(391, 'Aisha Baba', 'Babandauda', 'jame@gmail.com', '08065238965', '', '1', '6bc80408d9', '5.52', '0.0', '0', '27/01/2023 11:58', 'sgdzCpC3ACBA7CkGC26xwd2AmnAJoI08xqECyltF3CCc91BehA6BrC1xaCA3', 'Babandauda', 'Wema bank', '8845452981', 'ACTIVE', 'SMART', '197.210.54.53', '1123', NULL, 'Moniepoint Microfinance Bank', '6222180381'),
(392, 'ALIYU', 'Khaleem24', 'aliyusaad16@gmail.com', '08163339711', '', '1', '798918a9f1', '0.0', '0.0', '1', '28/01/2023 01:46', 'ECaI0r1A1txHdDA3cAB2b7ACeyxmCChoBb938cA46w759CBCFvf2gz6qxB3A', 'Khaleem24', 'Wema bank', '8845460881', 'ACTIVE', 'SMART', '105.112.228.219', '5822', NULL, 'Moniepoint Microfinance Bank', '6222184059'),
(393, 'Mahmud Ahmad abubakar', 'alamnah', 'ahmadmahmud111@gmail.com', '08034956117', '', '1', '6a7a33dd4c', '0.0', '0.0', '0', '28/01/2023 07:10', 'AtC3cCBBCF5E165J2xBcrCCzoCAC2248a6BICdlsqbhD4xCA9x0A3wAG7gBn', 'alamnah', 'Wema bank', '8845435263', 'ACTIVE', 'SMART', '197.210.227.101', '1842', NULL, 'Moniepoint Microfinance Bank', '6222208511'),
(394, 'Kamilutijjani', 'gwamma82', 'Kamilutijjani0@gmail.com', '07082103947', '', '1', 'c240e8f01e', '0.0', '0.0', '0', '28/01/2023 08:20', 'CC2Axs8enc4yAg0wFCCd1lm3xH3Bt1kC5Cx6Bbq72B78AopJCBvG32CiIbz9', 'gwamma82', 'Wema bank', '8845353552', 'ACTIVE', 'SMART', '105.113.26.82', '9841', NULL, 'Moniepoint Microfinance Bank', '6222216961'),
(395, 'Muhammad ', 'Paki', 'Babangidapaki@yahoo.com', '08101224110', '', '1', '5f82993ea7', '554', '0.0', '0', '28/01/2023 11:29', 'lax9w3x71G7AAE3o8qBtIC2BCA3kJeD0bBgA2AAAh84dC2FvcC65rCpzfnAc', 'Paki', 'Wema bank', '8845242005', 'ACTIVE', 'SMART', '197.210.70.169', '1234', NULL, 'Moniepoint Microfinance Bank', '6222262951'),
(396, 'Adnan hassan', 'Adnan', 'adnanhassan2323@gmail.com', '08133020415', '', '1', 'c4436e8dbf', '184', '0.0', '0', '28/01/2023 05:02', 'Ad0FaEb6oBCBACAqz1Ik3x221ArJpeB3AACCwC2Av4GCh5x9C5DHlbBfC6xc', 'Adnan', 'Wema bank', '8845150816', 'ACTIVE', 'SMART', '102.88.34.163', '5656', NULL, 'Moniepoint Microfinance Bank', '6222347838'),
(397, 'abdurrahman', 'abdurrahman32', 'abdurrahmanusmanpaki@gmail.com', '09079935451', '', '1', '731555dfa5', '16.42', '0.0', '0', '28/01/2023 06:19', 'CBkJ324xA6Cr4GBhCt6xn8bBcqbdgBwC728xeCCxE7BfH95ImAyFia90C5CC', 'abdurrahman32', 'Wema bank', '8845008618', 'ACTIVE', 'SMART', '105.112.115.217', '7993', NULL, 'Moniepoint Microfinance Bank', '6222364343'),
(398, 'safiya dawud', 'dawu12345', 'safiyadawu45@gmail.com', '09077886655', '', '1', '44835acb7d', '0.0', '0.0', '0', '28/01/2023 08:14', 'yGH3ldE2aC23sxowmkhbB37CJ39CCprg6A4d1Cq4x8zx8BCCAnDA9it6Af5c', 'dawu12345', 'Wema bank', '8845064612', 'ACTIVE', 'SMART', '105.112.124.182', NULL, NULL, 'Moniepoint Microfinance Bank', '6222383285'),
(399, 'Yusuf dahiru ', 'Scorpion ', 'dahiruyusuf3236@gmail.com', '09078571762', '', '1', 'b4cf432386', '0.0', '0.0', '1', '30/01/2023 07:39', '6AEm4pAk7d83xxdDAtJo3Cf1ABvw9CAz0Cc4qCnb95gCH3hseFGI32xx72C8', 'Scorpion ', 'Wema bank', '8844659264', 'ACTIVE', 'SMART', '197.210.70.169', '2003', NULL, 'Moniepoint Microfinance Bank', '6222654857'),
(400, 'Sadiq usman murtala', 'Sadiqmurtala17', 'sadiqmurtala17@gmail.com', '07065343974', '', '1', '6530189d7c', '5', '0.0', '0', '30/01/2023 11:05', 'C14HA01gI67JACeFzDCEsBi3m2w2Ax25xkcrA6AvBCdcao37l9x9CbByCGbp', 'Sadiqmurtala17', 'Wema bank', '8844426118', 'ACTIVE', 'SMART', '197.210.76.112', '3242', NULL, 'Moniepoint Microfinance Bank', '6222708499'),
(401, 'Idris sulaiman', 'Abba', 'idrissuleimanpk@gmail.com', '09137336522', '', '1', '10fcf06fc7', '68', '0.0', '0', '30/01/2023 07:59', 'FBbqedAnb1tDgiBdy8x9xl97A2Arv05CA6xmB4zxHCcGCC5CkIwhC3CcC3A2', 'Abba', 'Wema bank', '8844238072', 'ACTIVE', 'SMART', '197.210.76.41', '3733', NULL, 'Moniepoint Microfinance Bank', '6222872547'),
(402, 'Abdulsalaam Aliyu', 'Salaam', 'abdulsalamaliyu1798@gmail.com', '08108287372', '', '1', 'cf3f8e6f1d', '51.93', '0.0', '0', '30/01/2023 09:01', '3cGH671q13w4989px7BdDisyt5A634hE2en0zB3xxACo5A8FBAvCbBbcAxC2', 'Salaam', 'Wema bank', '8844288905', 'ACTIVE', 'SMART', '105.112.228.211', '1232', NULL, 'Moniepoint Microfinance Bank', '6222886085'),
(403, 'Aminu umar', 'Aminupaki', 'alameenumar913@gmail.com', '07033994966', '', '1', '5d5dc714fc', '75', '0.0', '0', '30/01/2023 10:21', 'btkC38CEGx4ByDA6FcAC73CCBxqrp5lC9A21hmofadx5inAHdC4b3Bc2wACC', 'Aminupaki', 'Wema bank', '8844253954', 'ACTIVE', 'SMART', '102.91.47.111', '6272', NULL, 'Moniepoint Microfinance Bank', '6222902211'),
(404, 'Kamal Ahmad', 'Danmaryam', 'kamaldataseller@gmail.com', '07037802994', '', '1', 'd51f04a39c', '0.0', '0.0', '0', '31/01/2023 12:19', 'gJx8AACxfD2l7I332CcxBvaeAps5i2CEnhdA9tB14B9yC3G0CbrF6AHcC4Ck', 'Danmaryam', 'Wema bank', '8844035477', 'ACTIVE', 'SMART', '105.112.114.118', '6280', NULL, 'Moniepoint Microfinance Bank', '6223029630'),
(405, 'Arfat danjummai', 'Yaseer arfat', 'Arfatdanjummai@gmail.com', '09038345259', '', '1', 'a4eff4d62e', '0.0', '0.0', '0', '31/01/2023 12:34', 'oJA2dAc1fACCC3vaBig2CCs2GAxClchk6E8qydC43HDC39nAz0xB3wbx75Bm', 'Yaseer arfat', 'Wema bank', '8844033758', 'ACTIVE', 'SMART', '197.210.74.60', NULL, NULL, 'Moniepoint Microfinance Bank', '6223034326'),
(406, 'Mustapha Haruna ', 'Jardade', 'mustaphaharuna20@gmail.com', '08161772095', '', '1', 'f1a2a9e22f', '32.8', '0.0', '1', '31/01/2023 07:57', 'Bzk2BvAxqFAA6CCxD1A39fCAeHx370A3Bodnb7CBw2C25mBsg6lC4at5JA3I', 'Jardade', 'Wema bank', '8843872914', 'ACTIVE', 'SMART', '197.210.70.74', '1819', NULL, 'Moniepoint Microfinance Bank', '6223168232'),
(407, 'Ja\'Afaru', 'Jaafaru67', 'bellojaafaru1@gmail.c', '07085860327', '', '1', '4647366ffa', '1100', '0.0', '0', '01/02/2023 06:48', '9xyA6Aw5cgBhdv4ACsDBlxCx4e1o6FIx1AC3CpzbCmABdGC7ArJBCHb2t5n2', 'Jaafaru67', 'Wema bank', '8843633821', 'ACTIVE', 'SMART', '37.120.157.162', '7254', NULL, 'Moniepoint Microfinance Bank', '6223249207'),
(408, 'YAHAYA NASIRU', 'yahyapaki', 'yahyanasirpaki@gmail.com', '08069598755', '', '1', '6159509b96', '191', '0.0', '0', '01/02/2023 11:15', 'xFgdrAAH4hC3w8C3J53oBd2fax0C1ACGB1ACm7l4ib8CbzCAvBq72k2eA6Ap', 'yahyapaki', 'Wema bank', '8843394357', 'ACTIVE', 'SMART', '197.210.53.67', '5590', NULL, 'Moniepoint Microfinance Bank', '6223305709'),
(409, 'Abubakar Saleh', 'Abusaleh1', 'salehabubakar53@gmail.com', '08062500003', '', '1', '70efe00bbc', '37', '0.0', '0', '01/02/2023 08:13', 'xCoB4Ay3kDH3BCc93sCq1A1CB56Cw3C8a2zc9fv4pB2m7gECtJxnAi8ACdGx', 'Abusaleh1', 'Wema bank', '8843415753', 'ACTIVE', 'SMART', '102.91.52.19', '4349', NULL, 'Moniepoint Microfinance Bank', '6223484172'),
(410, 'Kamilutijjani', 'gwamma8210', 'kamilu@gmail.com', '09027078576', '', '1', 'c240e8f01e', '0.0', '0.0', '0', '02/02/2023 05:03', 'E7vGh31tCaCxiBCboDn022xlkCIBA3165B4xgdA7FwC5AACfq8ABr98AHcC2', 'gwamma8210', 'Wema bank', '8843099126', 'ACTIVE', 'SMART', '105.113.25.148', '9841', NULL, 'Moniepoint Microfinance Bank', '6223760708'),
(411, 'Hussainah Ibrahim Balarabe', 'hussaiynah', 'hibalarabey@gmail.com', '08037916391', '', '1', 'acc9514db4', '19.84', '0.0', '0', '04/02/2023 10:28', '8B3Ba3AHA2ghxm3BAxCBJ8b7346C1d2A94tdFcypCC1CACBvAs9lkqD02o5I', 'hussaiynah', 'Wema bank', '8842249845', 'ACTIVE', 'SMART', '105.113.24.228', '6526', NULL, 'Moniepoint Microfinance Bank', '6224250693'),
(412, 'Fauziya Abdullahi ', 'Fauziya6.A', 'phauxyyabdul@gmail.com', '08160088122', '', '1', 'feb3914dd1', '0.0', '0.0', '0', '04/02/2023 07:19', 'tAAc2Cv6AbAH03q1CikcCABIBz5Ayno7hm79gC2C4rlCxxE36A8dBD4BpCxx', 'Fauziya6.A', 'Wema bank', '8842100779', 'ACTIVE', 'SMART', '197.210.70.35', NULL, NULL, 'Moniepoint Microfinance Bank', '6224425583'),
(413, 'Muhammad Buhari Sagir', 'Bmsageer', 'buharisagir.bs@gmail.com', '08108928497', '', '1', '2e673cdde4', '0.0', '0.0', '0', '05/02/2023 11:34', 'qChAnex1BCyx3HBAwvlE1IABAGgb3i96C6td20CJoAbrCC3zf5Bm4d5CC7DA', 'Bmsageer', 'Wema bank', '8841880906', 'ACTIVE', 'SMART', '197.210.63.58', NULL, NULL, 'Moniepoint Microfinance Bank', '6224560266'),
(414, 'Abdullahi yahaya', 'yahaya1944', 'sanusiyahaya33@gmail.com', '07034613726', '', '1', '004aa6879f', '13.2', '0.0', '0', '05/02/2023 01:58', 'ADp8vClAsg5danx2BCr0yocCCH6F1tCGA3BAB1E9CexCbhCkdxJA7xB5bB3w', 'yahaya1944', 'Wema bank', '8840437011', 'ACTIVE', 'SMART', '197.210.71.80', '1944', NULL, 'Moniepoint Microfinance Bank', '6224629312'),
(415, 'Umar Muhammad Kabir ', 'Abba2023', 'umarmuhammadkabir9@gmail.com', '09034140819', '', '1', '33ea768f78', '0.0', '0.0', '0', '07/02/2023 02:58', 'AAl7CH6f5E9dA2Ck8FmBxCccD3zIBCrp1d4g4AxGiCob0CBxJew2C9635AAy', 'Abba2023', 'Wema bank', '8840492678', 'ACTIVE', 'SMART', '197.210.70.185', NULL, NULL, 'Moniepoint Microfinance Bank', '6225419206'),
(416, 'Emmanuel', 'Simon', 'emmanuelsimon5555@gmail.com', '08083246561', '', '1', '8d95e90c50', '0.0', '0.0', '0', '08/02/2023 10:01', 'Cb9B2Ai4d8D9rAABfJk6Hc1GC0A5o7BAFq4t1w2yvxCpgI2Cn3x6Ez3m8Axl', 'Simon', 'Wema bank', '8840293349', 'ACTIVE', 'SMART', '105.112.112.128', NULL, NULL, 'Moniepoint Microfinance Bank', '6225646374'),
(417, 'Bashir Muhammad Tukur', 'Bashtech', 'bashiralcryptaweey@gmail.com', '08076691561', '', '1', 'f349c44ce7', '0.0', '0.0', '0', '08/02/2023 02:52', '6C1q508sACCDo97x192yAAvB8HCx4CwEA7r23nhdedCCiJBaBgckzBbCIA2B', 'Bashtech', 'Wema bank', '8829906828', 'ACTIVE', 'SMART', '197.210.70.165', '3232', NULL, 'Moniepoint Microfinance Bank', '6225753263'),
(418, 'ISMAIL SANI', 'ISMAILSANI', 'fasahaktv@gmail.com', '09036146103', '', '1', '765a5cfeb9', '0.0', '0.0', '0', '08/02/2023 05:05', 'CCF5o4Cxns32gC7GCCpdx8C0D2A2CAziBC5bB961vwA37JBb9BhAcEC3mHqy', 'ISMAILSANI', 'Wema bank', '8829829954', 'ACTIVE', 'SMART', '197.210.76.67', NULL, NULL, 'Moniepoint Microfinance Bank', '6225800813'),
(419, 'Khadija Mustapha', 'Khadijatuuh', 'khadijamustapha002@icloud.com', '07064796221', '', '1', 'ea4ec92918', '0.0', '0.0', '0', '08/02/2023 08:58', 'CF5flxd9CAArGCAx331BtE3zB2Bq1AIb6o4C73H7cAABxigBAwh6v22Cb8Cp', 'Khadijatuuh', 'Wema bank', '8829728239', 'ACTIVE', 'SMART', '197.210.52.43', '4090', NULL, 'Moniepoint Microfinance Bank', '6225857594'),
(420, 'Ibrahim nura', 'Ibrahim22', 'ibrahimnura2212@gmail.com', '07062449053', '', '1', 'cf4af7f59e', '0.0', '0.0', '0', '09/02/2023 07:20', 'Fixa3JGB702AbDC1wtqC1AIb6gxC37CABro8dvE24B9AnfAeCdAABC64c5xk', 'Ibrahim22', 'Wema bank', '8829099241', 'ACTIVE', 'SMART', '197.210.77.184', '4455', NULL, 'Moniepoint Microfinance Bank', '6226151725'),
(421, 'Kabir khamis', 'Radkabir23', 'muhdkabeer3918@gmail.com', '08138345183', '', '1', 'fa98500b19', '0.0', '0.0', '0', '11/02/2023 02:19', 'AH6z46qh7k93fbaC3CrAloEi5Cxv5C2Gpx8w4x3dFc0nCAdDAC1I9cBAxA2A', 'Radkabir23', 'Wema bank', '8827738641', 'ACTIVE', 'SMART', '197.210.71.156', '8299', NULL, 'Moniepoint Microfinance Bank', '6226617133'),
(422, 'hafsat adamu bawa', 'bawaadamu', 'bawa@gmail.com', '09088765434', '', '1', 'b153f0ac42', '2000', '0.0', '0', '11/02/2023 09:29', 'n3C2kB4q3A8hCCCA4632CrbCAbzA31x9BsEC5txAd9FIC6xfCiH8p1lcmJ5G', 'bawaadamu', 'Wema bank', '8827583281', 'ACTIVE', 'SMART', '105.112.224.247', NULL, NULL, 'Moniepoint Microfinance Bank', '6226720206');

-- --------------------------------------------------------

--
-- Table structure for table `waec_scratch_card`
--

CREATE TABLE `waec_scratch_card` (
  `id` int(11) NOT NULL,
  `buyer_id` varchar(255) NOT NULL,
  `pin` varchar(20) NOT NULL,
  `serial_no` varchar(20) NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `status` int(11) DEFAULT 0,
  `time_added` varchar(255) NOT NULL,
  `time_bought` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `waec_scratch_card`
--

INSERT INTO `waec_scratch_card` (`id`, `buyer_id`, `pin`, `serial_no`, `added_by`, `status`, `time_added`, `time_bought`) VALUES
(15, 'surplus', '12345678903333333333', '12345678903333333333', '1', 1, 'Monday 15<sup>th</sup>, November 2021 @ 12:43PM', 'Thursday 16<sup>th</sup>, December 2021 @ 2:23PM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `2cash`
--
ALTER TABLE `2cash`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_cable`
--
ALTER TABLE `add_cable`
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
-- Indexes for table `airtimeprice`
--
ALTER TABLE `airtimeprice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `airtime_lock`
--
ALTER TABLE `airtime_lock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `api`
--
ALTER TABLE `api`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apiairtime`
--
ALTER TABLE `apiairtime`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bankpayment`
--
ALTER TABLE `bankpayment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cable`
--
ALTER TABLE `cable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cableapi`
--
ALTER TABLE `cableapi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cablecharges`
--
ALTER TABLE `cablecharges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cable_lock`
--
ALTER TABLE `cable_lock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cash_number`
--
ALTER TABLE `cash_number`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_lock`
--
ALTER TABLE `data_lock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposit`
--
ALTER TABLE `deposit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_lock`
--
ALTER TABLE `exam_lock`
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
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mail`
--
ALTER TABLE `mail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nabteb_result_token`
--
ALTER TABLE `nabteb_result_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `neco_result_token`
--
ALTER TABLE `neco_result_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `network`
--
ALTER TABLE `network`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `networkid`
--
ALTER TABLE `networkid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notif`
--
ALTER TABLE `notif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notif_lock`
--
ALTER TABLE `notif_lock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otp`
--
ALTER TABLE `otp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pay`
--
ALTER TABLE `pay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pin`
--
ALTER TABLE `pin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resultchecker`
--
ALTER TABLE `resultchecker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scratch_card_prices`
--
ALTER TABLE `scratch_card_prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `share`
--
ALTER TABLE `share`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `simhosting`
--
ALTER TABLE `simhosting`
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
-- Indexes for table `transfer`
--
ALTER TABLE `transfer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upgrade_user`
--
ALTER TABLE `upgrade_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `waec_scratch_card`
--
ALTER TABLE `waec_scratch_card`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `2cash`
--
ALTER TABLE `2cash`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `add_cable`
--
ALTER TABLE `add_cable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `airtime`
--
ALTER TABLE `airtime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `airtimeprice`
--
ALTER TABLE `airtimeprice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `airtime_lock`
--
ALTER TABLE `airtime_lock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `apiairtime`
--
ALTER TABLE `apiairtime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bankpayment`
--
ALTER TABLE `bankpayment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cable`
--
ALTER TABLE `cable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cableapi`
--
ALTER TABLE `cableapi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `cablecharges`
--
ALTER TABLE `cablecharges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cable_lock`
--
ALTER TABLE `cable_lock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cash_number`
--
ALTER TABLE `cash_number`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_lock`
--
ALTER TABLE `data_lock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deposit`
--
ALTER TABLE `deposit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `exam_lock`
--
ALTER TABLE `exam_lock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kyc`
--
ALTER TABLE `kyc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nabteb_result_token`
--
ALTER TABLE `nabteb_result_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `neco_result_token`
--
ALTER TABLE `neco_result_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `network`
--
ALTER TABLE `network`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `networkid`
--
ALTER TABLE `networkid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notif`
--
ALTER TABLE `notif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `notif_lock`
--
ALTER TABLE `notif_lock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `otp`
--
ALTER TABLE `otp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `pin`
--
ALTER TABLE `pin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `resultchecker`
--
ALTER TABLE `resultchecker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `scratch_card_prices`
--
ALTER TABLE `scratch_card_prices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `share`
--
ALTER TABLE `share`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `simhosting`
--
ALTER TABLE `simhosting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=283;

--
-- AUTO_INCREMENT for table `transfer`
--
ALTER TABLE `transfer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `upgrade_user`
--
ALTER TABLE `upgrade_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=423;

--
-- AUTO_INCREMENT for table `waec_scratch_card`
--
ALTER TABLE `waec_scratch_card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
