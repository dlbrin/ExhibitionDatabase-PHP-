-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2022 at 08:01 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rasti`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `login_details` longtext NOT NULL,
  `admin_ip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`id`, `name`, `email`, `password`, `login_details`, `admin_ip`) VALUES
(1, 'Ramadhan', 'ramadan.r07f@gmail.com', 'c155704663db8f824a7f95a3d478754f0d244873501d2d01dd7c7cfcbebb8fdc', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `bill_id` int(11) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `UserAddress` varchar(255) NOT NULL,
  `UserPhone` bigint(20) NOT NULL,
  `BillDate` date NOT NULL,
  `totalprice_ofarticle` double NOT NULL,
  `warranty_number` varchar(255) NOT NULL,
  `warranty_period` varchar(200) NOT NULL,
  `continued` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`bill_id`, `UserName`, `UserAddress`, `UserPhone`, `BillDate`, `totalprice_ofarticle`, `warranty_number`, `warranty_period`, `continued`) VALUES
(1, 'dlbrin azad', 'ئاکرێ', 878, '2022-03-08', 50, '323', '', 'بەلێ');

-- --------------------------------------------------------

--
-- Table structure for table `dept`
--

CREATE TABLE `dept` (
  `id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `continued_money` double NOT NULL,
  `dept_money` double NOT NULL,
  `debt_date` datetime NOT NULL,
  `con` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dept`
--

INSERT INTO `dept` (`id`, `bill_id`, `continued_money`, `dept_money`, `debt_date`, `con`) VALUES
(1, 2, 0, 0, '2022-03-07 08:13:18', ''),
(2, 3, 100, 1900, '2022-03-07 08:14:01', '');

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `id` int(11) NOT NULL,
  `type_of_expense` varchar(255) NOT NULL,
  `money_of_expense` bigint(20) NOT NULL,
  `by_person` varchar(200) NOT NULL,
  `day_of_expense` date NOT NULL,
  `note_of_expense` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`id`, `type_of_expense`, `money_of_expense`, `by_person`, `day_of_expense`, `note_of_expense`) VALUES
(1, 'نان', 40, 'دلبرین', '2022-03-07', '');

-- --------------------------------------------------------

--
-- Table structure for table `koga`
--

CREATE TABLE `koga` (
  `id` int(11) NOT NULL,
  `name_of_sub` varchar(255) NOT NULL,
  `num_subb` bigint(20) NOT NULL,
  `price_subb` bigint(20) NOT NULL,
  `date_subb` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `middlebill`
--

CREATE TABLE `middlebill` (
  `id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `article_name` varchar(255) NOT NULL,
  `article_code` varchar(255) NOT NULL,
  `article_number` int(11) NOT NULL,
  `article_price` double NOT NULL,
  `sumof_articleprice` double NOT NULL,
  `article_date` date NOT NULL,
  `article_note` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `middlebill`
--

INSERT INTO `middlebill` (`id`, `bill_id`, `article_name`, `article_code`, `article_number`, `article_price`, `sumof_articleprice`, `article_date`, `article_note`) VALUES
(1, 1, 'سلاجە', '12', 2, 25, 50, '2022-03-08', '');

-- --------------------------------------------------------

--
-- Table structure for table `middlekoga`
--

CREATE TABLE `middlekoga` (
  `id` int(11) NOT NULL,
  `sub_name` varchar(255) NOT NULL,
  `code_of_sub` varchar(150) NOT NULL,
  `num_of_sub` bigint(20) NOT NULL,
  `price_of_sub` bigint(20) NOT NULL,
  `sum_of_sub` bigint(20) NOT NULL,
  `num_of_psola` varchar(150) NOT NULL,
  `date_of_sub` date NOT NULL,
  `note_of_sub` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `middlekoga`
--

INSERT INTO `middlekoga` (`id`, `sub_name`, `code_of_sub`, `num_of_sub`, `price_of_sub`, `sum_of_sub`, `num_of_psola`, `date_of_sub`, `note_of_sub`) VALUES
(1, 'سلاجە', '12', 12, 12, 144, '12', '2022-03-08', ''),
(2, 'مجمیدە', '14', 12, 12, 144, '12', '2022-03-08', ''),
(3, 'Dla', '15', 14, 441, 6174, '14', '2022-03-08', '');

-- --------------------------------------------------------

--
-- Table structure for table `ourdata`
--

CREATE TABLE `ourdata` (
  `id` int(11) NOT NULL,
  `expsum` bigint(20) NOT NULL,
  `billsum` bigint(20) NOT NULL,
  `allbillsum` bigint(20) NOT NULL,
  `allmoney` bigint(20) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `loss` int(11) NOT NULL,
  `benefit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bill_id`);

--
-- Indexes for table `dept`
--
ALTER TABLE `dept`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `koga`
--
ALTER TABLE `koga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `middlebill`
--
ALTER TABLE `middlebill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `middlekoga`
--
ALTER TABLE `middlekoga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ourdata`
--
ALTER TABLE `ourdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dept`
--
ALTER TABLE `dept`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `koga`
--
ALTER TABLE `koga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `middlebill`
--
ALTER TABLE `middlebill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `middlekoga`
--
ALTER TABLE `middlekoga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ourdata`
--
ALTER TABLE `ourdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
