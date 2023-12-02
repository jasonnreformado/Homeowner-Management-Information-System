-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2023 at 07:43 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `salondb`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `joining_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `first_name`, `last_name`, `email`, `age`, `gender`, `designation`, `joining_date`) VALUES
(9, 'Joana', 'Capawa', 'joanamarie.capawa@gmail.com', 22, 'Female', 'President', '2022-09-24'),
(10, 'Jason', 'Reformado', 'jasonreformado8@gmail.com', 22, 'Male', 'Vice President', '2022-08-06'),
(12, 'Juan', 'DelaCruz', 'juan@gmail.com', 26, 'Others', 'Secretary', '2022-11-13'),
(13, 'Layla', 'Balmond', 'laylalovebalmond@gmail.com', 28, 'Others', 'Treasurer', '2022-08-31');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `is_pinned` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `content`, `is_pinned`) VALUES
(48, 'Starting Dec 20, 2023. Villa Arcadia declares that the street of every subdivision are no longer parking area. All cars must be inside their garages. Doing this to prevent delas on emergencies such as fire alert. etc', 1),
(49, 'Meeting of homeowners maintenance. etc.', 1),
(52, 'hello', 1),
(53, 'eqweqwewq', 1),
(54, 'ewqewq', 1),
(55, 'eqweqw', 1),
(56, 'Starting Dec 20, 2023. Villa Arcadia declares that the street of every subdivision are no longer parking area. All cars must be inside their garages. Doing this to prevent delas on emergencies such as fire alert. etc', 1),
(57, 'Starting Dec 20, 2023. Villa Arcadia declares that the street of every subdivision are no longer parking area. All cars must be inside their garages. Doing this to prevent delas on emergencies such as fire alert. etc', 1);

-- --------------------------------------------------------

--
-- Table structure for table `post_files`
--

CREATE TABLE `post_files` (
  `file_id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `file_path` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_files`
--

INSERT INTO `post_files` (`file_id`, `post_id`, `file_path`, `description`) VALUES
(55, 48, '../uploads/b2144838607e6bbe3600f16541d1797f.jpg', ''),
(56, 49, '../uploads/b2144838607e6bbe3600f16541d1797f.jpg', ''),
(59, 52, '../uploads/123.jpg', ''),
(60, 53, '../uploads/image.png', ''),
(61, 54, '../uploads/image.png', ''),
(62, 55, '../uploads/image.png', ''),
(63, 56, '../uploads/image.png', ''),
(64, 57, '../uploads/image.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` char(50) DEFAULT NULL,
  `UserName` char(50) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Admin', 'admintest', 9728194635, 'admintest@gmail.com', '66d4aaa5ea177ac32c69946de3731ec0', '2023-01-12 17:42:46');

-- --------------------------------------------------------

--
-- Table structure for table `tblbook`
--

CREATE TABLE `tblbook` (
  `ID` int(10) NOT NULL,
  `UserID` int(10) DEFAULT NULL,
  `AptNumber` int(10) DEFAULT NULL,
  `AptDate` date DEFAULT NULL,
  `AptTime` time DEFAULT NULL,
  `endTime` time DEFAULT NULL,
  `Message` mediumtext DEFAULT NULL,
  `BookingDate` timestamp NULL DEFAULT current_timestamp(),
  `Remark` varchar(250) DEFAULT NULL,
  `Status` varchar(250) DEFAULT NULL,
  `RemarkDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblbook`
--

INSERT INTO `tblbook` (`ID`, `UserID`, `AptNumber`, `AptDate`, `AptTime`, `endTime`, `Message`, `BookingDate`, `Remark`, `Status`, `RemarkDate`) VALUES
(31, 16, 466193290, '2023-12-02', '02:14:00', '03:14:00', 'court', '2023-12-01 18:14:25', 'ok', 'Approved', '2023-12-01 18:14:46'),
(32, 16, 230379758, '2023-12-03', '16:19:00', '17:19:00', 'clubhouse', '2023-12-01 18:19:09', 'ok', 'Approved', '2023-12-01 18:19:46'),
(33, 16, 952136221, '2023-12-02', '02:22:00', '03:23:00', 'test', '2023-12-01 18:22:35', 'ewqe', 'Approved', '2023-12-01 18:23:02'),
(34, 16, 842304900, '2023-12-02', '05:22:00', '09:23:00', 'sample', '2023-12-01 18:35:34', NULL, NULL, NULL),
(35, 16, 709896363, '2023-12-02', '05:22:00', '12:23:00', 'testt', '2023-12-01 18:47:22', 'ewew', 'Rejected', '2023-12-01 18:47:33');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontact`
--

CREATE TABLE `tblcontact` (
  `ID` int(10) NOT NULL,
  `FirstName` varchar(200) DEFAULT NULL,
  `LastName` varchar(200) DEFAULT NULL,
  `Phone` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Message` mediumtext DEFAULT NULL,
  `EnquiryDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `IsRead` int(5) DEFAULT NULL,
  `address` varchar(225) NOT NULL,
  `subject` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcontact`
--

INSERT INTO `tblcontact` (`ID`, `FirstName`, `LastName`, `Phone`, `Email`, `Message`, `EnquiryDate`, `IsRead`, `address`, `subject`) VALUES
(21, 'Jason', 'Reformado', 928846512, 'reformado@gmail.com', 'May namatay', '2023-12-01 13:49:04', 1, 'Block 4 Lot 5', 'Incident'),
(22, 'Jason', 'Reformado', 928846512, 'reformado@gmail.com', 'may nag park sa gate namin ', '2023-12-01 18:58:42', 1, 'Block 4 Lot 5', 'Illegal Parking'),
(23, 'JASON', 'REFORMADO', 928846512, 'joanamarie.capawa@gmail.com', 'mabaho sa court', '2023-12-02 13:07:18', 1, 'Block 4 Lot 5', 'issue'),
(24, 'Joana', 'Capawa', 928846512, 'joanamarie.capawa@gmail.com', 'tt', '2023-12-02 13:15:25', 1, 'Block 4 Lot 5', 'note'),
(25, 'Jason', 'REFORMADO', 928846512, 'joanamarie.capawa@gmail.com', 'ee', '2023-12-02 13:15:55', NULL, 'Block 4 Lot 5', 'note'),
(26, 'Jason', 'REFORMADO', 928846512, 'joanamarie.capawa@gmail.com', 'ee', '2023-12-02 13:16:27', NULL, 'Block 4 Lot 5', 'note'),
(27, 'JASON', 'REFORMADO', 928846512, 'joanamarie.capawa@gmail.com', 'ewqeqwe', '2023-12-02 13:17:01', 1, 'Block 4 Lot 5', 'note'),
(28, 'tae', 'tae', 928846512, 'joanamarie.capawa@gmail.com', 'tae', '2023-12-02 13:17:39', 1, 'Block 4 Lot 5', 'tae');

-- --------------------------------------------------------

--
-- Table structure for table `tblinvoice`
--

CREATE TABLE `tblinvoice` (
  `id` int(11) NOT NULL,
  `Userid` int(11) DEFAULT NULL,
  `ServiceId` int(11) DEFAULT NULL,
  `BillingId` int(11) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblinvoice`
--

INSERT INTO `tblinvoice` (`id`, `Userid`, `ServiceId`, `BillingId`, `PostingDate`) VALUES
(1, 1, 1, 138889283, '2022-10-20 11:42:21'),
(2, 2, 2, 138889283, '2022-10-22 11:42:21'),
(3, 3, 3, 138889283, '2022-10-25 11:42:21'),
(4, 4, 4, 555850701, '2022-10-30 11:42:51'),
(20, 1, 1, 953015659, '2023-11-29 15:09:01'),
(21, 1, 1, 773500003, '2023-11-30 07:49:40'),
(22, 1, 2, 773500003, '2023-11-30 07:49:40'),
(23, 1, 3, 773500003, '2023-11-30 07:49:40'),
(24, 12, 1, 566447019, '2023-11-30 07:49:58'),
(25, 12, 2, 566447019, '2023-11-30 07:49:58'),
(26, 12, 3, 566447019, '2023-11-30 07:49:58'),
(27, 12, 4, 566447019, '2023-11-30 07:49:58'),
(28, 12, 5, 566447019, '2023-11-30 07:49:58'),
(29, 12, 6, 566447019, '2023-11-30 07:49:58'),
(30, 12, 1, 255558552, '2023-11-30 08:05:39'),
(31, 13, 18, 896265662, '2023-11-30 09:48:01'),
(32, 12, 1, 518140448, '2023-11-30 10:10:09'),
(33, 12, 18, 518140448, '2023-11-30 10:10:09'),
(34, 12, 19, 518140448, '2023-11-30 10:10:09'),
(35, 12, 20, 518140448, '2023-11-30 10:10:09'),
(36, 12, 21, 518140448, '2023-11-30 10:10:09'),
(37, 12, 22, 518140448, '2023-11-30 10:10:09'),
(38, 12, 1, 706237760, '2023-11-30 10:10:09'),
(39, 12, 18, 706237760, '2023-11-30 10:10:09'),
(40, 12, 19, 706237760, '2023-11-30 10:10:09'),
(41, 12, 20, 706237760, '2023-11-30 10:10:09'),
(42, 12, 21, 706237760, '2023-11-30 10:10:09'),
(43, 12, 22, 706237760, '2023-11-30 10:10:09'),
(44, 12, 1, 332387267, '2023-11-30 13:30:54'),
(45, 12, 18, 681041496, '2023-11-30 15:21:44'),
(67, 16, 25, 544848683, '2023-12-02 12:13:56'),
(68, 16, 25, 953797329, '2023-12-02 12:14:01'),
(69, 16, 26, 953797329, '2023-12-02 12:14:01'),
(70, 16, 27, 101654731, '2023-12-02 12:14:09'),
(71, 16, 29, 101654731, '2023-12-02 12:14:09'),
(72, 16, 30, 101654731, '2023-12-02 12:14:09'),
(73, 16, 25, 356474633, '2023-12-02 12:24:19'),
(74, 17, 25, 554545063, '2023-12-02 12:42:56'),
(75, 17, 26, 554545063, '2023-12-02 12:42:56'),
(76, 17, 27, 554545063, '2023-12-02 12:42:56'),
(77, 17, 28, 554545063, '2023-12-02 12:42:56'),
(78, 17, 29, 554545063, '2023-12-02 12:42:56'),
(79, 17, 30, 554545063, '2023-12-02 12:42:56'),
(80, 17, 25, 544423277, '2023-12-02 12:55:14'),
(81, 17, 26, 914579991, '2023-12-02 12:55:19'),
(82, 17, 27, 914579991, '2023-12-02 12:55:19'),
(83, 17, 29, 846154581, '2023-12-02 12:55:25'),
(84, 17, 30, 846154581, '2023-12-02 12:55:25'),
(85, 16, 26, 545162856, '2023-12-02 13:01:34'),
(86, 17, 25, 281744625, '2023-12-02 13:01:48'),
(87, 16, 25, 484010820, '2023-12-02 13:19:23'),
(88, 16, 26, 198332598, '2023-12-02 13:21:19'),
(89, 17, 25, 809348391, '2023-12-02 13:21:29');

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` mediumtext DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` date DEFAULT NULL,
  `Timing` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`, `Timing`) VALUES
(1, 'aboutus', 'About Us', 'Our main focus is on quality and hygiene. Our Parlour is well equipped with advanced technology equipments and provides best quality services. Our staff is well trained and experienced, offering advanced services in Skin, Hair and Body Shaping that will provide you with a luxurious experience that leave you feeling relaxed and stress free. The specialities in the parlour are, apart from regular bleachings and Facials, many types of hairstyles, Bridal and cine make-up and different types of Facials &amp; fashion hair colourings.', NULL, NULL, NULL, ''),
(2, 'contactus', 'Contact Us', 'Palo Alto, Habay I Bacoor City, Cavite', 'salon@gmail.com', 9363622667, NULL, '9:30 am to 7:30 pm');

-- --------------------------------------------------------

--
-- Table structure for table `tblservices`
--

CREATE TABLE `tblservices` (
  `ID` int(10) NOT NULL,
  `ServiceName` varchar(200) DEFAULT NULL,
  `ServiceDescription` mediumtext DEFAULT NULL,
  `Cost` int(10) DEFAULT NULL,
  `Image` varchar(200) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblservices`
--

INSERT INTO `tblservices` (`ID`, `ServiceName`, `ServiceDescription`, `Cost`, `Image`, `CreationDate`) VALUES
(25, 'Monthly Water', 'Bill', 800, 'b424718fec0f3d87f770ea20442528411701504623.jpg', '2023-12-02 08:10:23'),
(26, 'Monthly Electric', 'Bill', 2500, 'b424718fec0f3d87f770ea20442528411701504646.jpg', '2023-12-02 08:10:46'),
(27, 'Club House', 'Reservation', 400, 'b424718fec0f3d87f770ea20442528411701504672.jpg', '2023-12-02 08:11:12'),
(28, 'Basketball', 'Reservation', 150, 'b424718fec0f3d87f770ea20442528411701504697.jpg', '2023-12-02 08:11:37'),
(29, 'Chairs', 'Borrow', 200, 'b424718fec0f3d87f770ea20442528411701504735.jpg', '2023-12-02 08:12:15'),
(30, 'Table', 'Borrow', 100, 'b424718fec0f3d87f770ea20442528411701505108.jpg', '2023-12-02 08:18:28');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `ID` int(10) NOT NULL,
  `FirstName` varchar(120) DEFAULT NULL,
  `LastName` varchar(250) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `address` varchar(225) NOT NULL,
  `numplp` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`ID`, `FirstName`, `LastName`, `MobileNumber`, `Email`, `Password`, `RegDate`, `address`, `numplp`) VALUES
(16, 'Jason', 'Reformado', 945263815, 'reformado@gmail.com', '2b877b4b825b48a9a0950dd5bd1f264d', '2023-12-01 05:23:13', 'Block 4 Lot 5', 0),
(17, 'Joana Marie', 'Capawa', 946843132, 'joanamarie.capawa@gmail.com', 'f25fcc0ab7321c34e50b93fee38da812', '2023-12-01 05:23:55', 'Block 4 Lot 5', 0),
(18, 'Juan', 'Dela Cruz', 968735413, 'Juandelacruz@gmail.com', 'f25fcc0ab7321c34e50b93fee38da812', '2023-12-01 05:24:34', 'Block 10 Lot 6', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `post_files`
--
ALTER TABLE `post_files`
  ADD PRIMARY KEY (`file_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblbook`
--
ALTER TABLE `tblbook`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcontact`
--
ALTER TABLE `tblcontact`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblinvoice`
--
ALTER TABLE `tblinvoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblservices`
--
ALTER TABLE `tblservices`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `post_files`
--
ALTER TABLE `post_files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblbook`
--
ALTER TABLE `tblbook`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tblcontact`
--
ALTER TABLE `tblcontact`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tblinvoice`
--
ALTER TABLE `tblinvoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblservices`
--
ALTER TABLE `tblservices`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
