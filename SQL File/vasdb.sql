-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2023 at 03:48 PM
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
(48, 'Starting Dec 20, 2023. Villa Arcadia declares that the street of every subdivision are no longer parking area. All cars must be inside their garages. Doing this to prevent delas on emergencies such as fire alert. etc', 1),
(49, 'Meeting of homeowners maintenance. etc.', 1),
(56, 'Starting Dec 20, 2023. Villa Arcadia declares that the street of every subdivision are no longer parking area. All cars must be inside their garages. Doing this to prevent delas on emergencies such as fire alert. etc', 1);

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
(63, 56, '../uploads/image.png', '');

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
(34, 16, 842304900, '2023-12-02', '05:22:00', '09:23:00', 'sample', '2023-12-01 18:35:34', 'no', 'Rejected', '2023-12-03 04:52:40'),
(35, 16, 709896363, '2023-12-02', '05:22:00', '12:23:00', 'testt', '2023-12-01 18:47:22', 'ewew', 'Rejected', '2023-12-01 18:47:33'),
(36, 16, 969874576, '2023-12-03', '12:51:00', '13:52:00', 'basketball court', '2023-12-03 04:51:54', 'ok', 'Approved', '2023-12-03 04:52:22'),
(37, 17, 570688884, '2023-12-04', '14:56:00', '16:56:00', 'Club House', '2023-12-04 06:56:28', 'no available!', 'Rejected', '2023-12-06 05:11:34');

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

--
-- Dumping data for table `tblcomplaint`
--

INSERT INTO `tblcomplaint` (`ID`, `FirstName`, `LastName`, `Phone`, `Email`, `Message`, `EnquiryDate`, `IsRead`, `address`, `subject`, `time`) VALUES
(34, 'Jason', 'Reformado', 928846512, 'reformado@gmail.com', 'may batang nasagasaan', '2023-12-03 11:46:35', 1, 'sa tabi ng court', 'car accident', '19:45:00'),
(35, 'JASON', 'REFORMADO', 928846512, 'joanamarie.capawa@gmail.com', 'ewqeqwe', '2023-12-06 05:51:47', NULL, 'BACOOR CAVITE', 'note', '13:51:00');

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
(95, 16, 25, 151961585, '2023-12-05 15:37:20'),
(96, 16, 26, 151961585, '2023-12-05 15:37:20'),
(97, 16, 27, 840983880, '2023-12-06 11:21:13'),
(98, 16, 27, 287399920, '2023-12-06 12:28:25');

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
(25, 'Monthly Water', 'Bill', 800, 'b424718fec0f3d87f770ea20442528411701504623.jpg', '2023-12-02 08:10:23'),
(26, 'Monthly Electric', 'Bill', 2500, 'b424718fec0f3d87f770ea20442528411701504646.jpg', '2023-12-02 08:10:46'),
(27, 'Club House', 'Reservation', 400, 'b424718fec0f3d87f770ea20442528411701504672.jpg', '2023-12-02 08:11:12'),
(28, 'Basketball', 'Reservation', 150, 'b424718fec0f3d87f770ea20442528411701504697.jpg', '2023-12-02 08:11:37'),
(29, 'Chairs', 'Borrow', 200, 'b424718fec0f3d87f770ea20442528411701504735.jpg', '2023-12-02 08:12:15'),
(30, 'Table', 'Borrow', 100, 'b424718fec0f3d87f770ea20442528411701505108.jpg', '2023-12-02 08:18:28'),
(31, 'Monthly Rent', 'Bill', 4500, '6e8024ec26c292f258ec30f01e0392dc1701585739.png', '2023-12-03 06:42:19'),
(32, 'Maintenance', 'Support', 100, 'e2abfbb81043fe33cef26c48e14bdb5d1701782802.jpg', '2023-12-05 13:26:42');

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
  `status` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`ID`, `FirstName`, `LastName`, `MobileNumber`, `Email`, `Password`, `RegDate`, `address`, `status`) VALUES
(16, 'Jason', 'Reformado', 945263815, 'reformado@gmail.com', 'f25fcc0ab7321c34e50b93fee38da812', '2023-12-01 05:23:13', 'Block 4 Lot 5', 'Owner'),
(17, 'Joana Marie', 'Capawa', 946843132, 'joanamarie.capawa@gmail.com', 'f25fcc0ab7321c34e50b93fee38da812', '2023-12-01 05:23:55', 'Block 4 Lot 5', 'Owner'),
(18, 'Juan', 'Dela Cruz', 968735413, 'Juandelacruz@gmail.com', 'f25fcc0ab7321c34e50b93fee38da812', '2023-12-01 05:24:34', 'Block 10 Lot 6', 'Renter'),
(20, 'Wilfred', 'Delos Reyes', 946843322, 'delosreyes@gmail.com', '2b877b4b825b48a9a0950dd5bd1f264d', '2023-12-05 13:15:28', 'Block 2 Lot 1', 'Renter');

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
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `post_files`
--
ALTER TABLE `post_files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblbook`
--
ALTER TABLE `tblbook`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tblcomplaint`
--
ALTER TABLE `tblcomplaint`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tblcontact`
--
ALTER TABLE `tblcontact`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tblinvoice`
--
ALTER TABLE `tblinvoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblservices`
--
ALTER TABLE `tblservices`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
