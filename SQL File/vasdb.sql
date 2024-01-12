-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jan 12, 2024 at 12:19 PM
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
-- Database: `vasdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `archivetbluser`
--

CREATE TABLE `archivetbluser` (
  `ID` int(10) NOT NULL,
  `FirstName` varchar(120) DEFAULT NULL,
  `LastName` varchar(250) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `address` varchar(225) NOT NULL,
  `status` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `archivetbluser`
--

INSERT INTO `archivetbluser` (`ID`, `FirstName`, `LastName`, `MobileNumber`, `Email`, `Password`, `RegDate`, `address`, `status`) VALUES
(16, 'Jason', 'Reformado', 945263815, 'reformado@gmail.com', 'f25fcc0ab7321c34e50b93fee38da812', '2023-12-01 05:23:13', 'Block 4 Lot 5', 'Owner'),
(17, 'Joana Marie', 'Capawa', 946843132, 'joanamarie.capawa@gmail.com', 'f25fcc0ab7321c34e50b93fee38da812', '2023-12-01 05:23:55', 'Block 4 Lot 5', 'Owner'),
(18, 'Juan', 'Dela Cruz', 968735413, 'Juandelacruz@gmail.com', 'f25fcc0ab7321c34e50b93fee38da812', '2023-12-01 05:24:34', 'Block 10 Lot 6', 'Renter'),
(20, 'Wilfred', 'Delos Reyes', 946843322, 'delosreyes@gmail.com', '2b877b4b825b48a9a0950dd5bd1f264d', '2023-12-05 13:15:28', 'Block 2 Lot 1', 'Renter');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) DEFAULT NULL,
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
(88, 'Starting Dec 20, 2023. Villa Arcadia declares that the street of every subdivision are no longer parking area. All cars must be inside their garages. Doing this to prevent delas on emergencies such as fire alert. etc', 1),
(89, 'Starting Dec 20, 2023. Villa Arcadia declares that the street of every subdivision are no longer parking area. All cars must be inside their garages. Doing this to prevent delas on emergencies such as fire alert. etc', 1),
(90, 'Starting Dec 20, 2023. Villa Arcadia declares that the street of every subdivision are no longer parking area. All cars must be inside their garages. Doing this to prevent delas on emergencies such as fire alert. etc', 1),
(91, 'Starting Dec 20, 2023. Villa Arcadia declares that the street of every subdivision are no longer parking area. All cars must be inside their garages. Doing this to prevent delas on emergencies such as fire alert. etc', 1);

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
(95, 88, 'uploads/b51dea4167df064c4d5c8547c42f8a1c.jpg', ''),
(96, 89, 'uploads/b51dea4167df064c4d5c8547c42f8a1c.jpg', ''),
(97, 90, 'uploads/b51dea4167df064c4d5c8547c42f8a1c.jpg', ''),
(98, 91, 'uploads/b51dea4167df064c4d5c8547c42f8a1c.jpg', '');

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
(50, 22, 965615385, '2023-12-08', '15:05:00', '16:05:00', 'Club House', '2023-12-08 07:06:04', NULL, NULL, NULL),
(51, 24, 850674945, '2023-12-11', '13:23:00', '14:23:00', 'Basketball Court', '2023-12-11 05:23:48', 'ok', 'Approved', '2024-01-08 14:16:59'),
(52, 24, 694633362, '2024-01-01', '16:54:00', '18:54:00', 'urgent', '2024-01-01 07:54:26', 'e', 'Approved', '2024-01-01 08:08:42'),
(53, 24, 249917292, '2024-01-17', '20:25:00', '22:25:00', 'follow-up', '2024-01-01 08:25:28', 'w', 'Rejected', '2024-01-01 08:26:31'),
(54, 24, 618480622, '2024-01-16', '16:26:00', '19:26:00', 'Club House', '2024-01-01 08:26:48', 'wewq', 'Approved', '2024-01-10 13:27:19'),
(55, 24, 908289384, '2024-01-08', '22:16:00', '23:16:00', 'Basketball Court', '2024-01-08 14:16:26', 'ewe', 'Approved', '2024-01-10 13:29:03'),
(56, 24, 590543547, '2024-01-10', '21:31:00', '22:31:00', 'Club House', '2024-01-10 13:31:15', NULL, NULL, NULL),
(57, 24, 438626544, '2024-01-11', '18:31:00', '19:32:00', '', '2024-01-11 10:32:05', NULL, NULL, NULL),
(58, 24, 395484783, '2024-01-11', '00:32:00', '10:32:00', '', '2024-01-11 10:33:02', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblcomplaint`
--

CREATE TABLE `tblcomplaint` (
  `ID` int(10) NOT NULL,
  `FirstName` varchar(200) DEFAULT NULL,
  `LastName` varchar(200) DEFAULT NULL,
  `Phone` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Message` mediumtext DEFAULT NULL,
  `EnquiryDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `IsRead` int(5) DEFAULT NULL,
  `address` varchar(225) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `subject` varchar(30) NOT NULL,
  `time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcontact`
--

INSERT INTO `tblcontact` (`ID`, `FirstName`, `LastName`, `Phone`, `Email`, `Message`, `EnquiryDate`, `IsRead`, `address`, `subject`, `time`) VALUES
(34, 'Jason', 'Reformado', 925458136, 'reformado@gmail.com', 'may tagas ng tubo sa loob ng bahay namin', '2023-12-03 11:50:35', 1, 'Block 4 Lot 5', 'Water', '19:50:00');

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
(132, 24, 33, 938935000, '2024-01-08 10:46:17'),
(133, 24, 34, 938935000, '2024-01-08 10:46:17'),
(136, 20, 33, 628434736, '2024-01-10 13:15:35'),
(137, 20, 29, 393800540, '2024-01-12 11:14:39'),
(138, 20, 30, 393800540, '2024-01-12 11:14:39'),
(139, 20, 33, 393800540, '2024-01-12 11:14:39'),
(140, 20, 34, 393800540, '2024-01-12 11:14:39');

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
(2, 'contactus', 'Contact Us', '        Villa Arcadia, Imus, Cavite', 'villa.arcadia@yopmail.com', 9363622667, NULL, '9:30 am to 7:30 pm');

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
(27, 'Club House', 'Reservation', 400, 'b424718fec0f3d87f770ea20442528411701504672.jpg', '2023-12-02 08:11:12'),
(28, 'Basketball', 'Reservation', 150, 'b424718fec0f3d87f770ea20442528411701504697.jpg', '2023-12-02 08:11:37'),
(29, 'Chairs', 'Borrow', 200, 'b424718fec0f3d87f770ea20442528411701504735.jpg', '2023-12-02 08:12:15'),
(30, 'Table', 'Borrow', 100, 'b424718fec0f3d87f770ea20442528411701505108.jpg', '2023-12-02 08:18:28'),
(33, 'Monthly', 'Bill', 4500, 'f4f2bb25b803d762595f833b8ee1d9481704531864.jpg', '2024-01-06 08:53:15'),
(34, 'Property Bill', 'Bill', 10000, 'f4f2bb25b803d762595f833b8ee1d9481704532031.jpg', '2024-01-06 09:07:11');

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
  `status` varchar(225) DEFAULT NULL,
  `ProfilePicture` varchar(225) NOT NULL,
  `numplp` int(2) DEFAULT NULL,
  `movein` date DEFAULT NULL,
  `monthly` varchar(225) DEFAULT NULL,
  `total_fee` int(55) DEFAULT NULL,
  `total_paid` int(55) DEFAULT NULL,
  `balance` int(55) DEFAULT NULL,
  `paid` int(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`ID`, `FirstName`, `LastName`, `MobileNumber`, `Email`, `Password`, `RegDate`, `address`, `status`, `ProfilePicture`, `numplp`, `movein`, `monthly`, `total_fee`, `total_paid`, `balance`, `paid`) VALUES
(20, 'Jason', 'Reformado', 946843322, 'jasonreformado8@gmail.com', '2b877b4b825b48a9a0950dd5bd1f264d', '2023-12-05 13:15:28', 'Block 2 Lot 1', 'Owner', 'uploads/b51dea4167df064c4d5c8547c42f8a1c.jpg', 5, '2024-01-11', 'January', 9500, 0, 9500, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `name`, `image`) VALUES
(1, 'David', 'David - 2023.12.10 - 02.27.53pm.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `archivetbluser`
--
ALTER TABLE `archivetbluser`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`);

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
-- Indexes for table `tblcomplaint`
--
ALTER TABLE `tblcomplaint`
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
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `archivetbluser`
--
ALTER TABLE `archivetbluser`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `post_files`
--
ALTER TABLE `post_files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblbook`
--
ALTER TABLE `tblbook`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `tblcomplaint`
--
ALTER TABLE `tblcomplaint`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tblcontact`
--
ALTER TABLE `tblcontact`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tblinvoice`
--
ALTER TABLE `tblinvoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblservices`
--
ALTER TABLE `tblservices`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
