-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 02, 2021 at 11:46 AM
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
-- Database: `tabeltop`
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
(42, 'Breakfast', 'Idli', 'Made with basmati rice and sambar, chutney', '100', 'https://khandeshiit.com/tabletop/admin/uploads/9416Idli.jpg'),
(43, 'Breakfast', 'Misalpav', 'pav, dried beans, goda masla, lemon, tamarind paste', '120', 'https://khandeshiit.com/tabletop/admin/uploads/2546misalpav.jpg'),
(44, 'Breakfast', 'Poha', 'Kande pohe, lemon', '150', 'https://khandeshiit.com/tabletop/admin/uploads/5375poha.jpg'),
(62, 'Dessert', 'Chocolate Mousse', 'Chocolate ice-cream', '200', 'https://khandeshiit.com/tabletop/admin/uploads/9595Chocolate Mousse.jpg'),
(60, 'Dinner', 'Veg Pulao', 'Made with basmati rice and vegetable', '210', 'https://khandeshiit.com/tabletop/admin/uploads/8707veg-pulao.jpg'),
(61, 'Dessert', 'Cake', 'Made with chocolate and fresh cream', '300', 'https://khandeshiit.com/tabletop/admin/uploads/7749cake.jpg'),
(59, 'Dinner', 'Bnendi Masala', 'Made with okra yoghurt gravy', '200', 'https://khandeshiit.com/tabletop/admin/uploads/9456bhendi masala.jpg'),
(48, 'Breakfast', 'Thalipeeth', 'Rice flour, jowar flour, wheat flour, peal millet flour, sesame', '100', 'https://khandeshiit.com/tabletop/admin/uploads/6672thalipeeth.jpg'),
(52, 'Lunch', 'Kaju Paneer Masala', 'Make to fresh paneer', '270', 'https://khandeshiit.com/tabletop/admin/uploads/3035Kaju Paneer.jpg'),
(53, 'Lunch', 'Dall Bhaat', 'Dall Bhaat make  gujarathi dish make with toordal and rice', '280', 'https://khandeshiit.com/tabletop/admin/uploads/8803dall bhaat.jpg'),
(54, 'Lunch', 'Vangyach Bharit', 'Khandeshi style make Baingan Bharta', '120', 'https://khandeshiit.com/tabletop/admin/uploads/9993Vangyach Bharit.jpg'),
(66, 'Lunch', 'Malai Kofta', 'Made with potato and paneer are dunked in a creamy spiced velvety smooth curry', '320', 'https://khandeshiit.com/tabletop/admin/uploads/1481malai kofta.jpg'),
(56, 'Dinner', 'Laal Maas ', 'Rajasthani cuisine and skip this fiery red mutton dish', '320', 'https://khandeshiit.com/tabletop/admin/uploads/9793laal maas.jpg'),
(58, 'Dinner', 'Tandoori Roti', 'Made with wheat flour', '', 'https://khandeshiit.com/tabletop/admin/uploads/5439Tandoori.jpg'),
(63, 'Dessert', 'Mini Donuts', 'Made with flour, chocolate, banking soda, cinnamon, nutmeg', '120', 'https://khandeshiit.com/tabletop/admin/uploads/4351bakedminidonuts.jpg'),
(64, 'Dessert', 'Ice-Cream', 'Made with chocolate, kaju, mava, strawberry, vanilla', '120', 'https://khandeshiit.com/tabletop/admin/uploads/713ice cream.jpg'),
(68, 'Breakfast', 'paneer mix', 'use gornut pure oil and paneer', '', 'https://khandeshiit.com/tabletop/admin/uploads/6719max.jpg');

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
(33, '2021/08/19 15:23:42', '9370152526', 'Malai Kofta', '1', '320', '320', 'y'),
(33, '2021/08/19 15:28:09', '9370152526', 'Misalpav', '1', '120', '120', 'y'),
(35, '2021/08/20 11:24:13', '9370152526', 'Malai Kofta', '1', '320', '320', 'y'),
(35, '2021/09/07 17:36:51', '8329706961', 'Idli', '1', '100', '100', 'N'),
(35, '2021/09/07 17:37:03', '8329706961', 'Idli', '2', '100', '200', 'N'),
(35, '2021/09/21 16:35:45', '9370152526', 'Misalpav', '1', '120', '120', 'y'),
(0, '2021/09/29 17:31:51', '9370152526', 'Idli', '6', '100', '600', 'N'),
(0, '2021/10/02 11:46:06', '9370152526', 'Kaju Paneer Masala', '1', '270', '270', 'N');

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
(33, '2021-08-19', '03:31 PM', 'Tab1', '9370152526', '340', '1234567890789078', '1234', 1),
(34, '2021-08-19', '08:29 PM', 'Tab1', '9370152526', '440', '123489786712', '1234', 0),
(35, '2021-09-21', '04:36 PM', 'Tab1', '9370152526', '440', '5656565656565656', '1234', 1);

-- --------------------------------------------------------

--
-- Table structure for table `shopmast`
--

CREATE TABLE `shopmast` (
  `sid` int(11) NOT NULL,
  `scate` varchar(20) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `sadd` varchar(100) NOT NULL,
  `spic` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shopmast`
--

INSERT INTO `shopmast` (`sid`, `scate`, `sname`, `sadd`, `spic`) VALUES
(1, 'Cosmatic', 'Alankar Shoppe', 'z.b.patil college rd', 'http://khandeshiit.com/prabha/image/misal.jpg');

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
(1, 'Smart Hotel Admin', 'admin', '9226926292', 'admin', 'admin');

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
(3, 'Tab3', 'tab3'),
(4, 'Tab4', 'tab4');

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
-- Indexes for table `shopmast`
--
ALTER TABLE `shopmast`
  ADD PRIMARY KEY (`sid`);

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
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `ordermast`
--
ALTER TABLE `ordermast`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `shopmast`
--
ALTER TABLE `shopmast`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usermast`
--
ALTER TABLE `usermast`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
