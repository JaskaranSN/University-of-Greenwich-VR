-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 15, 2018 at 05:22 PM
-- Server version: 5.7.21-log
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `multi-admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `mod_modulegroupcode` varchar(25) NOT NULL,
  `mod_modulegroupname` varchar(50) NOT NULL,
  `mod_modulecode` varchar(25) NOT NULL,
  `mod_modulename` varchar(50) NOT NULL,
  `mod_modulegrouporder` int(3) NOT NULL,
  `mod_moduleorder` int(3) NOT NULL,
  `mod_modulepagename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`mod_modulegroupcode`, `mod_modulegroupname`, `mod_modulecode`, `mod_modulename`, `mod_modulegrouporder`, `mod_moduleorder`, `mod_modulepagename`) VALUES
('ABOUT US', 'About Us', 'CONTACT', 'Contact', 3, 2, 'contact.php'),
('ABOUT US', 'About Us', 'HISTORY', 'History', 3, 2, 'history.php'),
('ADMIN PANEL', 'Admin Panel', 'ADMIN', 'Admin', 3, 2, 'admin.php'),
('INVT', 'Inventory', 'PURCHASES', 'Purchases', 2, 1, 'purchases.php'),
('INVT', 'Inventory', 'SALES', 'Sales', 2, 3, 'sales.php'),
('INVT', 'Inventory', 'STOCKS', 'Stocks', 2, 2, 'stocks.php'),
('STUDENT', 'Student Resources', 'MOODLE', 'Moodle', 3, 3, 'moodle.php'),
('STUDENT', 'Student Resources', 'TIMETABLE', 'Timetable', 3, 1, 'timetable.php'),
('VIRTUAL', 'Virtual Tour', 'PUBLIC', 'Public', 1, 3, 'public.php');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_rolecode` varchar(50) NOT NULL,
  `role_rolename` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_rolecode`, `role_rolename`) VALUES
('ADMIN', 'Admin'),
('E_User', 'External User'),
('GUEST', 'Guest'),
('I_USER', 'Internal User');

-- --------------------------------------------------------

--
-- Table structure for table `role_rights`
--

CREATE TABLE `role_rights` (
  `rr_rolecode` varchar(50) NOT NULL,
  `rr_modulecode` varchar(25) NOT NULL,
  `rr_create` enum('yes','no') NOT NULL DEFAULT 'no',
  `rr_edit` enum('yes','no') NOT NULL DEFAULT 'no',
  `rr_delete` enum('yes','no') NOT NULL DEFAULT 'no',
  `rr_view` enum('yes','no') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role_rights`
--

INSERT INTO `role_rights` (`rr_rolecode`, `rr_modulecode`, `rr_create`, `rr_edit`, `rr_delete`, `rr_view`) VALUES
('ADMIN', 'ADMIN', 'yes', 'yes', 'yes', 'yes'),
('ADMIN', 'CONTACT', 'yes', 'yes', 'yes', 'yes'),
('ADMIN', 'HISTORY', 'yes', 'yes', 'yes', 'yes'),
('ADMIN', 'MOODLE', 'yes', 'yes', 'yes', 'yes'),
('ADMIN', 'PUBLIC', 'yes', 'yes', 'yes', 'yes'),
('ADMIN', 'PURCHASES', 'yes', 'yes', 'yes', 'yes'),
('ADMIN', 'SALES', 'yes', 'yes', 'yes', 'yes'),
('ADMIN', 'STOCKS', 'yes', 'yes', 'yes', 'yes'),
('ADMIN', 'TIMETABLE', 'yes', 'yes', 'yes', 'yes'),
('E_User', 'HISTORY', 'no', 'no', 'no', 'yes'),
('E_User', 'MOODLE', 'no', 'no', 'no', 'no'),
('E_User', 'PUBLIC', 'yes', 'yes', 'yes', 'yes'),
('E_User', 'PURCHASES', 'yes', 'yes', 'yes', 'yes'),
('E_User', 'SALES', 'no', 'no', 'no', 'no'),
('E_User', 'STOCKS', 'no', 'no', 'no', 'yes'),
('E_User', 'TIMETABLE', 'yes', 'yes', 'yes', 'yes'),
('GUEST', 'PUBLIC', 'yes', 'yes', 'yes', 'yes'),
('I_USER', 'HISTORY', 'no', 'no', 'no', 'yes'),
('I_USER', 'MOODLE', 'no', 'no', 'no', 'no'),
('I_USER', 'PUBLIC', 'yes', 'yes', 'yes', 'yes'),
('I_USER', 'PURCHASES', 'yes', 'yes', 'yes', 'yes'),
('I_USER', 'SALES', 'no', 'no', 'no', 'no'),
('I_USER', 'STOCKS', 'no', 'no', 'no', 'yes'),
('I_USER', 'TIMETABLE', 'yes', 'yes', 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `system_users`
--

CREATE TABLE `system_users` (
  `u_userid` int(11) NOT NULL,
  `u_username` varchar(100) NOT NULL,
  `u_password` varchar(255) NOT NULL,
  `u_rolecode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `system_users`
--

INSERT INTO `system_users` (`u_userid`, `u_username`, `u_password`, `u_rolecode`) VALUES
(1, 'Jaskaran', 'JSN', 'ADMIN'),
(2, 'e_user', 'e_user', 'E_User'),
(3, 'i_user', 'i_User', 'I_USER'),
(4, 'Guest', '1', 'GUEST');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`mod_modulegroupcode`,`mod_modulecode`),
  ADD UNIQUE KEY `mod_modulecode` (`mod_modulecode`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_rolecode`);

--
-- Indexes for table `role_rights`
--
ALTER TABLE `role_rights`
  ADD PRIMARY KEY (`rr_rolecode`,`rr_modulecode`),
  ADD KEY `rr_modulecode` (`rr_modulecode`);

--
-- Indexes for table `system_users`
--
ALTER TABLE `system_users`
  ADD PRIMARY KEY (`u_userid`),
  ADD KEY `u_rolecode` (`u_rolecode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `system_users`
--
ALTER TABLE `system_users`
  MODIFY `u_userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `role_rights`
--
ALTER TABLE `role_rights`
  ADD CONSTRAINT `role_rights_ibfk_1` FOREIGN KEY (`rr_rolecode`) REFERENCES `role` (`role_rolecode`) ON UPDATE CASCADE,
  ADD CONSTRAINT `role_rights_ibfk_2` FOREIGN KEY (`rr_modulecode`) REFERENCES `module` (`mod_modulecode`) ON UPDATE CASCADE;

--
-- Constraints for table `system_users`
--
ALTER TABLE `system_users`
  ADD CONSTRAINT `system_users_ibfk_1` FOREIGN KEY (`u_rolecode`) REFERENCES `role` (`role_rolecode`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
