-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2016 at 02:31 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monthlyexp`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `test` ()  BEGIN

	DECLARE max_val INT DEFAULT 1991;
	
   
	test_loop : LOOP
	IF (max_val > 2050) THEN
      LEAVE test_loop;
   END IF;
   
   INSERT INTO year (YEAR) values (max_val);
   SET max_val=max_val+1;
   
   END LOOP;
						
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_tempBudget_and_budget` ()  BEGIN

	DECLARE max_val INT;
	DECLARE counter INT DEFAULT 1;  
	DECLARE total_user INT DEFAULT 0;
	DECLARE total INT;   
	DECLARE rec_amt INT DEFAULT 0;
   SELECT MAX(TUserId) INTO max_val FROM tempbudgetmonthly;   
   SELECT SUM(TotalExp) INTO total FROM tempbudgetmonthly;
   
   /*update budget table for real Expense*/
   UPDATE budget SET RealExpense= total WHERE budgetdate LIKE (SELECT CONCAT(YEAR(CURDATE()),'-0',MONTH(CURDATE()),'-%') FROM DUAL);
   
	test_loop : LOOP  
	
	/*check for loop*/
	IF (counter > max_val) THEN
      LEAVE test_loop;
   END IF;
   
   /*finding total amount spend for each*/
   SELECT SUM(amount) INTO total_user FROM expense WHERE UserId = counter AND Date LIKE 
						(SELECT CONCAT(YEAR(CURDATE()),'-0',MONTH(CURDATE()),'-%') FROM DUAL);
					
	 /*maths for recieve amt*/
   SET rec_amt = (total/(max_val-1))-total_user;
		
   /*updating the table respectively for each user*/
	UPDATE tempbudgetmonthly SET TotalExp = total_user,RecieveAmt = rec_amt WHERE TUserId= counter;
    
   SET counter = counter +1;
   END LOOP;	
   
   SELECT SUM(TotalExp) INTO total FROM tempbudgetmonthly;
   /*After loop ends must update budget table for real Expense*/
   UPDATE budget SET RealExpense= total WHERE budgetdate LIKE (SELECT CONCAT(YEAR(CURDATE()),'-0',MONTH(CURDATE()),'-%') FROM DUAL);
						
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `budget`
--

CREATE TABLE `budget` (
  `budgetId` int(100) NOT NULL,
  `budgetdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `EstimatedBudget` int(100) DEFAULT '38000',
  `RealExpense` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `budget`
--

INSERT INTO `budget` (`budgetId`, `budgetdate`, `EstimatedBudget`, `RealExpense`) VALUES
(1, '2016-09-23 12:05:31', 38000, 32502);

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `ExpenseId` int(20) NOT NULL,
  `amount` int(20) NOT NULL DEFAULT '0',
  `Expense` text,
  `UserId` int(11) DEFAULT NULL,
  `Date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`ExpenseId`, `amount`, `Expense`, `UserId`, `Date`) VALUES
(1, 2724, 'et, magna. Praesent interdum ligula eu enim. Etiam', 3, '2016-05-05 04:41:39'),
(3, 3386, 'ac mi eleifend egestas. Sed pharetra, felis eget v', 3, '2015-12-20 04:56:17'),
(4, 3480, 'et magnis dis parturient montes, nascetur ridiculu', 4, '2017-07-06 10:28:10'),
(5, 1585, 'commodo hendrerit. Donec porttitor tellus non magn', 4, '2016-08-13 06:08:19'),
(6, 4123, 'imperdiet non, vestibulum nec, euismod in, dolor. ', 3, '2015-09-20 19:03:28'),
(8, 3841, 'elit. Aliquam auctor, velit eget laoreet posuere, ', 4, '2015-10-06 18:57:52'),
(9, 2553, 'eget nisi dictum augue malesuada malesuada. Intege', 2, '2017-04-13 19:08:57'),
(10, 4467, 'lacus vestibulum lorem, sit amet ultricies sem mag', 5, '2016-01-01 14:51:31'),
(11, 1117, 'fermentum metus. Aenean sed pede nec ante blandit ', 3, '2016-02-03 03:25:13'),
(12, 4966, 'pede sagittis augue, eu tempor erat neque non quam', 5, '2015-11-08 09:37:23'),
(13, 3081, 'ligula consectetuer rhoncus. Nullam velit dui, sem', 2, '2016-01-20 06:19:38'),
(14, 1549, 'sapien. Nunc pulvinar arcu et pede. Nunc sed orci ', 5, '2016-11-08 06:13:09'),
(15, 2927, 'pede. Cras vulputate velit eu sem. Pellentesque ut', 2, '2016-10-04 07:17:06'),
(16, 2394, 'diam luctus lobortis. Class aptent taciti sociosqu', 3, '2016-03-21 21:21:41'),
(17, 2584, 'amet risus. Donec egestas. Aliquam nec enim. Nunc ', 4, '2015-12-14 05:34:19'),
(18, 1767, 'dignissim pharetra. Nam ac nulla. In tincidunt con', 3, '2016-05-31 21:40:26'),
(19, 3637, 'amet, faucibus ut, nulla. Cras eu tellus eu augue ', 2, '2017-01-27 23:49:59'),
(20, 1424, 'dolor dapibus gravida. Aliquam tincidunt, nunc ac ', 3, '2016-10-18 00:21:40'),
(21, 1629, 'mattis. Cras eget nisi dictum augue malesuada male', 2, '2016-05-27 10:53:34'),
(22, 4548, 'vulputate, nisi sem semper erat, in consectetuer i', 5, '2015-11-18 02:23:52'),
(23, 2488, 'augue eu tellus. Phasellus elit pede, malesuada ve', 4, '2016-08-22 06:44:03'),
(24, 4347, 'Sed neque. Sed eget lacus. Mauris non dui nec urna', 4, '2016-12-14 11:47:55'),
(25, 964, 'iaculis aliquet diam. Sed diam lorem, auctor quis,', 5, '2016-04-26 08:45:12'),
(26, 4874, 'ullamcorper viverra. Maecenas iaculis aliquet diam', 3, '2016-04-14 10:34:15'),
(27, 4191, 'a, malesuada id, erat. Etiam vestibulum massa rutr', 2, '2015-11-29 02:41:04'),
(29, 245, 'aliquet. Phasellus fermentum convallis ligula. Don', 4, '2017-04-29 05:31:44'),
(30, 2010, 'mollis lectus pede et risus. Quisque libero lacus,', 5, '2016-11-06 13:52:54'),
(32, 4574, 'ante, iaculis nec, eleifend non, dapibus rutrum, j', 4, '2015-12-01 16:14:55'),
(33, 2275, 'sem magna nec quam. Curabitur vel lectus. Cum soci', 5, '2017-05-06 06:48:32'),
(34, 78, 'Donec sollicitudin adipiscing ligula. Aenean gravi', 2, '2017-07-17 06:40:35'),
(35, 2106, 'et netus et malesuada fames ac turpis egestas. Ali', 2, '2016-08-17 02:00:50'),
(36, 4060, 'Duis at lacus. Quisque purus sapien, gravida non, ', 5, '2016-01-27 21:15:42'),
(37, 503, 'sapien, cursus in, hendrerit consectetuer, cursus ', 2, '2017-07-05 17:21:58'),
(38, 250, 'Proin sed turpis nec mauris blandit mattis. Cras e', 3, '2016-12-01 10:46:51'),
(39, 4202, 'vitae risus. Duis a mi fringilla mi lacinia mattis', 5, '2016-05-02 22:59:09'),
(40, 3588, 'ipsum primis in faucibus orci luctus et ultrices p', 5, '2017-03-03 22:03:15'),
(41, 4370, 'urna suscipit nonummy. Fusce fermentum fermentum a', 2, '2016-08-06 12:41:21'),
(42, 2256, 'diam. Proin dolor. Nulla semper tellus id nunc int', 5, '2016-06-29 18:13:23'),
(43, 2803, 'euismod et, commodo at, libero. Morbi accumsan lao', 2, '2017-02-17 17:17:10'),
(44, 2947, 'cursus in, hendrerit consectetuer, cursus et, magn', 4, '2016-01-06 10:59:30'),
(45, 4491, 'Nunc ac sem ut dolor dapibus gravida. Aliquam tinc', 2, '2016-02-14 19:59:58'),
(46, 4405, 'Sed molestie. Sed id risus quis diam luctus lobort', 5, '2016-03-25 04:08:05'),
(47, 182, 'In faucibus. Morbi vehicula. Pellentesque tincidun', 3, '2016-10-10 00:14:50'),
(48, 4113, 'tristique ac, eleifend vitae, erat. Vivamus nisi. ', 3, '2017-04-21 06:20:10'),
(49, 1922, 'magna, malesuada vel, convallis in, cursus et, ero', 4, '2017-06-11 15:01:38'),
(50, 1822, 'varius et, euismod et, commodo at, libero. Morbi a', 3, '2016-03-23 12:25:28'),
(51, 1083, 'a, dui. Cras pellentesque. Sed dictum. Proin eget ', 3, '2016-08-13 16:51:14'),
(52, 1447, 'vitae, sodales at, velit. Pellentesque ultricies d', 3, '2016-01-22 12:27:34'),
(54, 2890, 'sit amet ornare lectus justo eu arcu. Morbi sit am', 2, '2017-06-01 23:09:22'),
(55, 2727, 'non, egestas a, dui. Cras pellentesque. Sed dictum', 5, '2017-01-16 10:06:10'),
(56, 4032, 'dignissim. Maecenas ornare egestas ligula. Nullam ', 3, '2015-11-07 13:24:32'),
(57, 1013, 'dolor vitae dolor. Donec fringilla. Donec feugiat ', 4, '2017-01-05 12:42:01'),
(58, 3348, 'ac, fermentum vel, mauris. Integer sem elit, phare', 2, '2016-09-06 02:48:10'),
(59, 3934, 'Nunc laoreet lectus quis massa. Mauris vestibulum,', 4, '2017-02-24 01:19:13'),
(60, 3450, 'et, commodo at, libero. Morbi accumsan laoreet ips', 4, '2017-01-05 21:14:13'),
(61, 2603, 'nisl. Quisque fringilla euismod enim. Etiam gravid', 4, '2015-11-15 19:47:34'),
(62, 4807, 'Morbi non sapien molestie orci tincidunt adipiscin', 4, '2016-02-08 17:07:02'),
(63, 4235, 'nec, eleifend non, dapibus rutrum, justo. Praesent', 2, '2016-05-25 16:38:16'),
(64, 4004, 'nec, cursus a, enim. Suspendisse aliquet, sem ut c', 2, '2016-11-23 15:25:17'),
(65, 1150, 'nec quam. Curabitur vel lectus. Cum sociis natoque', 4, '2016-06-04 17:02:27'),
(66, 205, 'vulputate, nisi sem semper erat, in consectetuer i', 5, '2017-04-18 05:34:26'),
(67, 4826, 'nunc nulla vulputate dui, nec tempus mauris erat e', 5, '2016-12-03 14:14:04'),
(68, 1561, 'tortor, dictum eu, placerat eget, venenatis a, mag', 4, '2016-01-09 11:48:53'),
(69, 406, 'Donec vitae erat vel pede blandit congue. In scele', 2, '2015-09-20 15:34:27'),
(70, 235, 'suscipit, est ac facilisis facilisis, magna tellus', 2, '2016-05-26 13:19:44'),
(72, 3583, 'massa. Integer vitae nibh. Donec est mauris, rhonc', 5, '2016-01-18 02:12:41'),
(73, 3346, 'risus quis diam luctus lobortis. Class aptent taci', 2, '2015-11-03 11:02:24'),
(74, 2535, 'gravida mauris ut mi. Duis risus odio, auctor vita', 3, '2016-10-24 15:25:21'),
(75, 756, 'Test Case 1:\r\nPassed\r\nTest Case 2:\r\nPassed', 3, '2017-08-10 17:40:51'),
(77, 1678, 'ligula. Donec luctus aliquet odio. Etiam ligula to', 4, '2016-08-17 08:57:03'),
(78, 32, 'dolor sit amet, consectetuer adipiscing elit. Etia', 5, '2016-12-08 20:31:07'),
(79, 4417, 'lacus vestibulum lorem, sit amet ultricies sem mag', 5, '2015-11-01 15:21:38'),
(80, 3515, 'velit eget laoreet posuere, enim nisl elementum pu', 5, '2015-09-30 15:07:11'),
(81, 2939, 'enim, sit amet ornare lectus justo eu arcu. Morbi ', 4, '2017-07-27 03:21:27'),
(82, 1471, 'bibendum sed, est. Nunc laoreet lectus quis massa.', 3, '2016-10-07 15:19:33'),
(83, 1358, 'quis massa. Mauris vestibulum, neque sed dictum el', 3, '2015-11-18 05:51:11'),
(84, 1193, 'enim mi tempor lorem, eget mollis lectus pede et r', 5, '2017-03-14 02:28:46'),
(85, 1531, 'accumsan laoreet ipsum. Curabitur consequat, lectu', 3, '2016-09-07 18:50:42'),
(88, 1612, 'vel lectus. Cum sociis natoque penatibus et magnis', 5, '2016-03-22 18:40:51'),
(90, 4501, 'ullamcorper, nisl arcu iaculis enim, sit amet orna', 4, '2017-04-12 10:45:42'),
(91, 2416, 'eu tellus. Phasellus elit pede, malesuada vel, ven', 4, '2016-02-04 02:00:36'),
(92, 437, 'dolor. Quisque tincidunt pede ac urna. Ut tincidun', 5, '2016-05-18 15:00:59'),
(93, 1292, 'tellus non magna. Nam ligula elit, pretium et, rut', 2, '2016-08-23 00:15:41'),
(94, 2362, 'ac mattis velit justo nec ante. Maecenas mi felis,', 3, '2017-02-19 02:16:47'),
(95, 3521, 'erat volutpat. Nulla facilisis. Suspendisse commod', 2, '2016-03-09 18:10:56'),
(96, 3706, 'ut quam vel sapien imperdiet ornare. In faucibus. ', 3, '2017-02-01 00:22:57'),
(98, 2489, 'Donec tempus, lorem fringilla ornare placerat, orc', 4, '2016-06-26 09:17:00'),
(100, 2988, 'lobortis. Class aptent taciti sociosqu ad litora t', 2, '2017-02-07 08:54:18'),
(101, 501, 'Testing Insertion', 5, '2016-09-03 00:59:00'),
(102, 2000, 'New Test', 2, '2016-07-09 19:11:00'),
(104, 1, 'some dummy text', 3, '2016-09-06 12:43:48'),
(105, 3000, 'Some more test for Trigger Implementation', 4, '2016-09-06 12:47:27'),
(106, 150, '3rd test for trigger going correct only', 3, '2016-09-06 12:51:23'),
(109, 21, 'Procedure Test 02', 4, '2016-09-06 14:21:24'),
(111, 10, 'thfaw', 4, '2016-09-05 14:28:46'),
(112, 20, 'Procedure Check 01', 4, '2016-09-06 14:30:21'),
(113, 50, 'Procedure Test', 4, '2016-09-06 14:31:34'),
(115, 345, 'qwerty', 5, '2016-09-06 12:59:00'),
(116, 10, 'Test for date 01', 2, '2016-09-01 00:00:00'),
(117, 20, 'Test for date 31', 2, '2016-09-23 15:00:00'),
(118, 20, 'Test for Date 31', 2, '2016-09-01 23:59:59'),
(119, 900, 'Testing', 2, '2016-09-11 19:13:49'),
(120, 1000, 'Testing the Procedures', 5, '2016-09-12 12:54:23'),
(121, 100, 'Checking the procedure for each user', 3, '2016-09-13 12:00:00'),
(122, 1, 'Testing', 2, '2016-09-13 12:59:00'),
(123, 21474, 'new', 2, '2016-09-23 16:00:00');

--
-- Triggers `expense`
--
DELIMITER $$
CREATE TRIGGER `after_expense_delete` AFTER DELETE ON `expense` FOR EACH ROW BEGIN

CALL update_tempBudget_and_budget();

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_expense_insert` AFTER INSERT ON `expense` FOR EACH ROW BEGIN

CALL update_tempBudget_and_budget();
   	
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_expense_update` AFTER UPDATE ON `expense` FOR EACH ROW BEGIN
   
   CALL update_tempBudget_and_budget();
		
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `exphistory`
--

CREATE TABLE `exphistory` (
  `Id` int(11) NOT NULL,
  `Year` tinyint(4) NOT NULL,
  `Month` tinyint(4) UNSIGNED NOT NULL,
  `Exp` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Has the history of the total expense every month';

-- --------------------------------------------------------

--
-- Table structure for table `month`
--

CREATE TABLE `month` (
  `MId` tinyint(4) UNSIGNED ZEROFILL NOT NULL,
  `Month` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `month`
--

INSERT INTO `month` (`MId`, `Month`) VALUES
(0001, 'Jan'),
(0002, 'Feb'),
(0003, 'Mar'),
(0004, 'Apr'),
(0005, 'May'),
(0006, 'Jun'),
(0007, 'Jul'),
(0008, 'Aug'),
(0009, 'Sep'),
(0010, 'Oct'),
(0011, 'Nov'),
(0012, 'Dec');

-- --------------------------------------------------------

--
-- Table structure for table `tempbudgetmonthly`
--

CREATE TABLE `tempbudgetmonthly` (
  `TUserId` int(50) NOT NULL,
  `TotalExp` int(100) DEFAULT '0',
  `RecieveAmt` int(100) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='A tempory table to have tempory datas for the users like :\r\n* how much each has expensed\r\n* how much each should recieve\r\n';

--
-- Dumping data for table `tempbudgetmonthly`
--

INSERT INTO `tempbudgetmonthly` (`TUserId`, `TotalExp`, `RecieveAmt`) VALUES
(2, 25773, -23016),
(3, 1782, 975),
(5, 1846, 911),
(4, 3101, -344);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `UserName` varchar(999) DEFAULT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `emailid` varchar(50) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `password` varchar(99) DEFAULT 'Password@123',
  `date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `isAdmin` tinyint(1) UNSIGNED DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `UserName`, `FirstName`, `LastName`, `emailid`, `mobile`, `password`, `date`, `isAdmin`) VALUES
(1, 'Admin', 'Sandeep', 'Gorai', 'sandy.gorai@gmail.com', '7358685832', 'Password@123', '2016-09-14 11:18:36', 1),
(2, 'Sandeep', NULL, NULL, NULL, NULL, 'Password@123', '2016-08-28 00:38:42', 0),
(3, 'Dharmendar', NULL, NULL, NULL, NULL, 'Password@123', '2016-08-27 21:50:03', 0),
(4, 'Ashutosh', NULL, NULL, NULL, NULL, 'Password@123', '2016-08-27 21:50:30', 0),
(5, 'Kunal', NULL, NULL, NULL, NULL, 'Password@123', '2016-08-27 21:50:46', 0);

-- --------------------------------------------------------

--
-- Table structure for table `year`
--

CREATE TABLE `year` (
  `YId` tinyint(4) NOT NULL,
  `Year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `year`
--

INSERT INTO `year` (`YId`, `Year`) VALUES
(20, 2010),
(21, 2011),
(22, 2012),
(23, 2013),
(24, 2014),
(25, 2015),
(26, 2016),
(27, 2017),
(28, 2018),
(29, 2019),
(30, 2020),
(31, 2021),
(32, 2022),
(33, 2023),
(34, 2024),
(35, 2025),
(36, 2026),
(37, 2027),
(38, 2028),
(39, 2029),
(40, 2030),
(41, 2031),
(42, 2032),
(43, 2033),
(44, 2034),
(45, 2035),
(46, 2036),
(47, 2037),
(48, 2038),
(49, 2039),
(50, 2040),
(51, 2041),
(52, 2042),
(53, 2043),
(54, 2044),
(55, 2045),
(56, 2046),
(57, 2047),
(58, 2048),
(59, 2049),
(60, 2050);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `budget`
--
ALTER TABLE `budget`
  ADD PRIMARY KEY (`budgetId`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`ExpenseId`),
  ADD KEY `FK__users` (`UserId`);

--
-- Indexes for table `exphistory`
--
ALTER TABLE `exphistory`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK__year` (`Year`),
  ADD KEY `FK_exphistory_month` (`Month`);

--
-- Indexes for table `month`
--
ALTER TABLE `month`
  ADD PRIMARY KEY (`MId`);

--
-- Indexes for table `tempbudgetmonthly`
--
ALTER TABLE `tempbudgetmonthly`
  ADD KEY `FK_users` (`TUserId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `year`
--
ALTER TABLE `year`
  ADD PRIMARY KEY (`YId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `budget`
--
ALTER TABLE `budget`
  MODIFY `budgetId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `ExpenseId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;
--
-- AUTO_INCREMENT for table `exphistory`
--
ALTER TABLE `exphistory`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `month`
--
ALTER TABLE `month`
  MODIFY `MId` tinyint(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `year`
--
ALTER TABLE `year`
  MODIFY `YId` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `expense`
--
ALTER TABLE `expense`
  ADD CONSTRAINT `FK__users` FOREIGN KEY (`UserId`) REFERENCES `users` (`userId`);

--
-- Constraints for table `exphistory`
--
ALTER TABLE `exphistory`
  ADD CONSTRAINT `FK__year` FOREIGN KEY (`Year`) REFERENCES `year` (`YId`),
  ADD CONSTRAINT `FK_exphistory_month` FOREIGN KEY (`Month`) REFERENCES `month` (`MId`);

--
-- Constraints for table `tempbudgetmonthly`
--
ALTER TABLE `tempbudgetmonthly`
  ADD CONSTRAINT `FK_users` FOREIGN KEY (`TUserId`) REFERENCES `users` (`userId`);

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `monthly_insert_budget` ON SCHEDULE EVERY 1 MONTH STARTS '2016-09-01 00:00:01' ON COMPLETION NOT PRESERVE ENABLE COMMENT 'event to insert a record in the budget table for the next month' DO INSERT INTO budget(EstimatedBudget) VALUES(38000)$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
