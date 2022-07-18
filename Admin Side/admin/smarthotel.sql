-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 16, 2020 at 09:04 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `students_menu_order`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fid` int(11) NOT NULL,
  `fdate` text NOT NULL,
  `mobno` text NOT NULL,
  `fdesc` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fid`, `fdate`, `mobno`, `fdesc`) VALUES
(1, '2018/05/23 09:32:30', '9011223344', 'wrgfnkj'),
(2, '2018/06/01 15:44:57', '9011513860', 'great service'),
(3, '2018/06/01 15:45:11', '9011513860', 'great service'),
(4, '2018/06/12 22:57:50', '9021808707', 'submit'),
(5, '2018/06/18 14:17:47', '9021808707', 'hi agaib'),
(6, '2018/06/18 14:17:49', '9021808707', 'hi agaib'),
(7, '2018/06/18 14:17:49', '9021808707', 'hi agaib'),
(8, '2018/06/18 14:17:49', '9021808707', 'hi agaib'),
(9, '2018/06/18 14:17:50', '9021808707', 'hi agaib'),
(10, '2018/06/18 14:17:50', '9021808707', 'hi agaib'),
(11, '2018/06/18 14:17:50', '9021808707', 'hi agaib'),
(12, '2018/06/18 14:18:16', '9021808707', 'sub'),
(13, '2018/06/18 14:26:14', '9021808707', 'suahzkkzk'),
(14, '2018/06/18 14:32:27', '9021808707', 'dhrev'),
(15, '2018/09/01 11:27:09', '9021808707', 'good');

-- --------------------------------------------------------

--
-- Table structure for table `menumast`
--

CREATE TABLE `menumast` (
  `mid` int(11) NOT NULL,
  `mtype` varchar(10) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `mdesc` varchar(100) NOT NULL,
  `mprice` varchar(10) NOT NULL,
  `mimage` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menumast`
--

INSERT INTO `menumast` (`mid`, `mtype`, `mname`, `mdesc`, `mprice`, `mimage`) VALUES
(1, 'Breakfast', 'sandwich', 'made with bread and all vegitable', '25', 'http://khandeshiit.com/prabha/image/sand.jpg'),
(2, 'Breakfast', 'Idli', 'made with pure rice', '30', 'http://khandeshiit.com/prabha/image/idli.jpg'),
(3, 'Breakfast', 'Misal Paav', 'made with all veg', '25', 'http://khandeshiit.com/prabha/image/misal.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `oid` int(11) NOT NULL,
  `mdate` varchar(50) NOT NULL,
  `mobno` varchar(11) NOT NULL,
  `mname` varchar(30) NOT NULL,
  `qty` varchar(10) NOT NULL,
  `rate` varchar(10) NOT NULL,
  `amount` varchar(10) NOT NULL,
  `cf` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`oid`, `mdate`, `mobno`, `mname`, `qty`, `rate`, `amount`, `cf`) VALUES
(15, '2020/03/14 10:50:38', '12222', 'sandwich', '2', '25', '50', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `ordermast`
--

CREATE TABLE `ordermast` (
  `oid` int(11) NOT NULL,
  `odate` varchar(50) NOT NULL,
  `otime` varchar(50) NOT NULL,
  `tabno` varchar(10) NOT NULL,
  `mobno` varchar(11) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `ccno` varchar(20) NOT NULL,
  `otp` varchar(10) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordermast`
--

INSERT INTO `ordermast` (`oid`, `odate`, `otime`, `tabno`, `mobno`, `amount`, `ccno`, `otp`, `status`) VALUES
(14, '2020-03-09', '03:42 PM', '12345', '12222', ' 50', '1234567896523145', '8565', 0),
(15, '2020-03-14', '10:56 AM', '12345', '12222', ' 50', '1472583699874563', '7681', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL DEFAULT 'NONE',
  `email` varchar(50) NOT NULL DEFAULT 'None',
  `mobile` varchar(14) NOT NULL DEFAULT 'None',
  `password` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `user_name`, `email`, `mobile`, `password`, `type`) VALUES
(1, 'E-Menu Admin', 'admin@gmail.com', '9657575657', '1234', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `usermast`
--

CREATE TABLE `usermast` (
  `tid` int(11) NOT NULL,
  `tno` varchar(10) NOT NULL,
  `tpass` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usermast`
--

INSERT INTO `usermast` (`tid`, `tno`, `tpass`) VALUES
(1, 'Tab1', 'Tab1'),
(2, 'Tab2', 'Tab2'),
(3, 'Tab3', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `menumast`
--
ALTER TABLE `menumast`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `ordermast`
--
ALTER TABLE `ordermast`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `usermast`
--
ALTER TABLE `usermast`
  ADD PRIMARY KEY (`tid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `menumast`
--
ALTER TABLE `menumast`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ordermast`
--
ALTER TABLE `ordermast`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `usermast`
--
ALTER TABLE `usermast`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
