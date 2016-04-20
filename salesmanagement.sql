-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2016 at 02:30 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `salesmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(20) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'rejeth', 'rejeth'),
(2, 'sarath', 'sarath');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `PID` varchar(10) NOT NULL,
  `UNITSM` int(10) NOT NULL,
  `CATEGORY` varchar(10) NOT NULL,
  `NAME` varchar(20) NOT NULL,
  `COST` int(15) NOT NULL,
  `STOCK` int(11) NOT NULL,
  `PRODUCTIONCOST` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`PID`, `UNITSM`, `CATEGORY`, `NAME`, `COST`, `STOCK`, `PRODUCTIONCOST`) VALUES
('12', 88, 'mobile', 'moto g', 12000, 0, 10000),
('131', 12, 'laptop', 'mac', 50000, 0, 40000);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `SALESID` int(10) NOT NULL,
  `DATE` date NOT NULL,
  `AGENTID` varchar(10) NOT NULL,
  `PRODUCTID` varchar(10) NOT NULL,
  `UNITSSOLD` int(10) NOT NULL,
  `CUSADDR` varchar(20) NOT NULL,
  `CUSNAME` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`SALESID`, `DATE`, `AGENTID`, `PRODUCTID`, `UNITSSOLD`, `CUSADDR`, `CUSNAME`) VALUES
(2, '2016-03-02', '33', '123', 555, 'rr', 'ftr'),
(3, '2016-03-09', '661', '131', 12, 'zxzxzx', 'as'),
(6, '2016-03-02', '2', '333', 55, 'bbbbbb', 'ggggggg'),
(8, '2016-03-09', '2', '123', 100, 'qq', 'qq'),
(10, '2016-03-08', '2', '131', 222, 'ss', 'ss'),
(12, '2016-03-03', '2', '144', 222, 's', 'w'),
(13, '2016-04-06', '2', '144', 134, 'dd', 'dd'),
(14, '2016-04-14', '2', '155', 333, 'ff', 'df'),
(15, '2016-04-28', '2', '123', 22, 'ff', 'ee'),
(16, '2016-02-10', '2', '1231', 123, 'ee', 'ee'),
(17, '2016-01-14', '2', '111', 34, 'rr', 'ee'),
(18, '2016-02-26', '2', '55', 55, 'ff', 'ff'),
(19, '2016-05-19', '2', '45', 544, 'dd', 'dd'),
(20, '2016-07-14', '2', '232', 34, '343', '434');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(25) NOT NULL,
  `ADDRESS` varchar(25) NOT NULL,
  `DOB` date NOT NULL,
  `SEX` varchar(25) NOT NULL,
  `EMAIL` varchar(25) NOT NULL,
  `PHONE` int(12) NOT NULL,
  `LOCATION` varchar(25) NOT NULL,
  `POSITION` varchar(20) NOT NULL,
  `JOINDATE` date NOT NULL,
  `TARGET` int(14) NOT NULL,
  `SALARY` int(10) NOT NULL,
  `BONUS` int(10) NOT NULL,
  `RATING` varchar(10) NOT NULL,
  `PASSWORD` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `NAME`, `ADDRESS`, `DOB`, `SEX`, `EMAIL`, `PHONE`, `LOCATION`, `POSITION`, `JOINDATE`, `TARGET`, `SALARY`, `BONUS`, `RATING`, `PASSWORD`) VALUES
(1, 'Rejeth Vijayan', '2/70, Surabhi, MRRA-65', '2016-03-03', 'Male', 'rejethvijayan123@gmail.co', 2147483647, 'vazhakkala', 'manager', '2016-03-06', 0, 0, 0, '', 'ee'),
(2, 'Ashwin', 'kaloor', '2016-12-31', 'Male', 'ash@gmail.com', 2147483647, 'kakkanad', 'agent', '2016-03-10', 0, 0, 0, '', 'qwe'),
(3, 'abhi', 'aluva', '2014-12-04', 'Male', 'asd@sdsf.com', 1234565431, '', '', '2016-03-10', 0, 0, 0, '', 'as'),
(4, 'abhijith', '2/70, SURABHI ,', '2016-03-09', 'Male', 'abhijithvijayan@rocketmai', 988603531, '', 'agent', '2016-03-15', 0, 0, 0, '', 'awa'),
(7, 'rej', 'wewe3', '2016-03-22', 'Male', 'rej@rej.com', 1223345677, 'kakkanad', 'manager', '2016-03-15', 0, 0, 0, '', 'qq'),
(14, 'wwwwwwwww', 'de', '2016-03-23', 'Male', 'www@www.kk', 2147483647, '', 'agent', '2016-03-15', 0, 0, 0, '', 'd'),
(15, 'wwwwwwwww', 'de', '2016-03-23', 'Male', 'www@www.kk', 2147483647, '', 'agent', '2016-03-15', 0, 0, 0, '', 'k'),
(16, 'ccccccccccccccc', 'ss', '2016-03-23', 'Male', 'ccc@ccc.cc', 2147483647, 'vazhakkala', 'agent', '2016-03-15', 0, 0, 0, '', 'd'),
(17, 'vvvvvvvvv', 'vvv', '2016-03-23', 'Male', 'vvv@fgfghg.kgg', 2147483647, 'vazhakkala', 'agent', '2016-03-15', 0, 0, 0, '', 'f');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`PID`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`SALESID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `SALESID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
