-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Feb 05, 2024 at 05:35 PM
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
(91, 'Starting Dec 20, 2023. Villa Arcadia declares that the street of every subdivision are no longer parking area. All cars must be inside their garages. Doing this to prevent delas on emergencies such as fire alert. etc', 1),
(96, 'Starting Dec 20, 2023. Villa Arcadia declares that the street of every subdivision are no longer parking area. All cars must be inside their garages. Doing this to prevent delas on emergencies such as fire alert. etc', 1),
(97, 'Starting Dec 20, 2023. Villa Arcadia declares that the street of every subdivision are no longer parking area. All cars must be inside their garages. Doing this to prevent delas on emergencies such as fire alert. etc', 1),
(98, 'Starting Dec 20, 2023. Villa Arcadia declares that the street of every subdivision are no longer parking area. All cars must be inside their garages. Doing this to prevent delas on emergencies such as fire alert. etc', 1),
(99, 'Starting Dec 20, 2023. Villa Arcadia declares that the street of every subdivision are no longer parking area. All cars must be inside their garages. Doing this to prevent delas on emergencies such as fire alert. etc', 1),
(100, 'Starting Dec 20, 2023. Villa Arcadia declares that the street of every subdivision are no longer parking area. All cars must be inside their garages. Doing this to prevent delas on emergencies such as fire alert. etc', 1);

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
(98, 91, 'uploads/b51dea4167df064c4d5c8547c42f8a1c.jpg', ''),
(101, 96, 'uploads/32323.jpg', ''),
(102, 97, 'uploads/32323.jpg', ''),
(103, 98, 'uploads/32323.jpg', ''),
(104, 99, 'uploads/32323.jpg', ''),
(105, 100, 'uploads/32323.jpg', '');

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
(1, 'Admin', 'admin', 9728194635, 'admintest@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2023-01-12 17:42:46');

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
  `time` time DEFAULT NULL,
  `proof` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcomplaint`
--

INSERT INTO `tblcomplaint` (`ID`, `FirstName`, `LastName`, `Phone`, `Email`, `Message`, `EnquiryDate`, `IsRead`, `address`, `subject`, `time`, `proof`) VALUES
(77, 'Jason', 'Reformado', 946843322, 'jasonreformado8@gmail.com', 'test', '2024-02-04 15:47:05', 1, 'Near Court', 'Road Accident', '23:47:00', 'uploads/321312.png'),
(83, 'Jason', 'Reformado', 946843322, 'jasonreformado8@gmail.com', 'may nasagasaan', '2024-02-05 16:31:58', 1, 'Near Court', 'Road Accident', '00:31:00', 'uploads/321312.png');

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
(153, 20, 33, 307913415, '2024-02-02 16:48:12'),
(154, 20, 33, 284813570, '2024-02-04 14:35:22');

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
(33, 'Monthly', 'Bill', 4500, 'f4f2bb25b803d762595f833b8ee1d9481704531864.jpg', '2024-01-06 08:53:15');

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
  `paid` int(55) DEFAULT NULL,
  `January_total_fee` decimal(10,2) DEFAULT 0.00,
  `January_total_paid` decimal(10,2) DEFAULT 0.00,
  `January_balance` decimal(10,2) DEFAULT 0.00,
  `February_total_fee` decimal(10,2) DEFAULT 0.00,
  `February_total_paid` decimal(10,2) DEFAULT 0.00,
  `February_balance` decimal(10,2) DEFAULT 0.00,
  `March_total_fee` decimal(10,2) DEFAULT 0.00,
  `March_total_paid` decimal(10,2) DEFAULT 0.00,
  `March_balance` decimal(10,2) DEFAULT 0.00,
  `April_total_fee` decimal(10,2) DEFAULT 0.00,
  `April_total_paid` decimal(10,2) DEFAULT 0.00,
  `April_balance` decimal(10,2) DEFAULT 0.00,
  `May_total_fee` decimal(10,2) DEFAULT 0.00,
  `May_total_paid` decimal(10,2) DEFAULT 0.00,
  `May_balance` decimal(10,2) DEFAULT 0.00,
  `June_total_fee` decimal(10,2) DEFAULT 0.00,
  `June_total_paid` decimal(10,2) DEFAULT 0.00,
  `June_balance` decimal(10,2) DEFAULT 0.00,
  `July_total_fee` decimal(10,2) DEFAULT 0.00,
  `July_total_paid` decimal(10,2) DEFAULT 0.00,
  `July_balance` decimal(10,2) DEFAULT 0.00,
  `August_total_fee` decimal(10,2) DEFAULT 0.00,
  `August_total_paid` decimal(10,2) DEFAULT 0.00,
  `August_balance` decimal(10,2) DEFAULT 0.00,
  `September_total_fee` decimal(10,2) DEFAULT 0.00,
  `September_total_paid` decimal(10,2) DEFAULT 0.00,
  `September_balance` decimal(10,2) DEFAULT 0.00,
  `October_total_fee` decimal(10,2) DEFAULT 0.00,
  `October_total_paid` decimal(10,2) DEFAULT 0.00,
  `October_balance` decimal(10,2) DEFAULT 0.00,
  `November_total_fee` decimal(10,2) DEFAULT 0.00,
  `November_total_paid` decimal(10,2) DEFAULT 0.00,
  `November_balance` decimal(10,2) DEFAULT 0.00,
  `December_total_fee` decimal(10,2) DEFAULT 0.00,
  `December_total_paid` decimal(10,2) DEFAULT 0.00,
  `December_balance` decimal(10,2) DEFAULT 0.00,
  `February` varchar(11) DEFAULT NULL,
  `March` varchar(11) DEFAULT NULL,
  `April` varchar(11) DEFAULT NULL,
  `May` varchar(11) DEFAULT NULL,
  `June` int(11) DEFAULT NULL,
  `July` int(11) DEFAULT NULL,
  `August` int(11) DEFAULT NULL,
  `September` int(11) DEFAULT NULL,
  `October` int(11) DEFAULT NULL,
  `November` int(11) DEFAULT NULL,
  `December` int(11) DEFAULT NULL,
  `January` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`ID`, `FirstName`, `LastName`, `MobileNumber`, `Email`, `Password`, `RegDate`, `address`, `status`, `ProfilePicture`, `numplp`, `movein`, `monthly`, `total_fee`, `total_paid`, `balance`, `paid`, `January_total_fee`, `January_total_paid`, `January_balance`, `February_total_fee`, `February_total_paid`, `February_balance`, `March_total_fee`, `March_total_paid`, `March_balance`, `April_total_fee`, `April_total_paid`, `April_balance`, `May_total_fee`, `May_total_paid`, `May_balance`, `June_total_fee`, `June_total_paid`, `June_balance`, `July_total_fee`, `July_total_paid`, `July_balance`, `August_total_fee`, `August_total_paid`, `August_balance`, `September_total_fee`, `September_total_paid`, `September_balance`, `October_total_fee`, `October_total_paid`, `October_balance`, `November_total_fee`, `November_total_paid`, `November_balance`, `December_total_fee`, `December_total_paid`, `December_balance`, `February`, `March`, `April`, `May`, `June`, `July`, `August`, `September`, `October`, `November`, `December`, `January`) VALUES
(20, 'Jason', 'Reformado', 946843322, 'jasonreformado8@gmail.com', '2b877b4b825b48a9a0950dd5bd1f264d', '2023-12-05 13:15:28', 'Block 2 Lot 1', 'Owner', 'uploads/profile.jpg', 5, '2024-01-11', '', 10000, 0, 0, 0, 5000.00, 0.00, 5000.00, 2000.00, 0.00, 2000.00, 1500.00, 0.00, 1500.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '', 'March', 'April', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5000'),
(33, 'test', 'test', 945263815, 'test@gmail.com', '2b877b4b825b48a9a0950dd5bd1f264d', '2024-02-02 06:21:47', 'Block 4 Lot 5', 'Renter', 'uploads/image.png', 4, '2024-02-02', NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 'sample', 'sample', 945663121, 'peterparker@sms.com', '2b877b4b825b48a9a0950dd5bd1f264d', '2024-02-04 12:54:47', 'Block 4 Lot 5', 'Owner', '', 1, '2024-02-19', NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `post_files`
--
ALTER TABLE `post_files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblbook`
--
ALTER TABLE `tblbook`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `tblcomplaint`
--
ALTER TABLE `tblcomplaint`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `tblinvoice`
--
ALTER TABLE `tblinvoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

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
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
