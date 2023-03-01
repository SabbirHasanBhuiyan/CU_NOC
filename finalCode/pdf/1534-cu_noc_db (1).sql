-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2023 at 09:18 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cu_noc_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `evaluates`
--

CREATE TABLE `evaluates` (
  `Evaluation_type` varchar(1000) NOT NULL,
  `Leave_ID` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `evaluation_time` datetime NOT NULL,
  `comment` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `evaluates`
--

INSERT INTO `evaluates` (`Evaluation_type`, `Leave_ID`, `applicant_id`, `status`, `evaluation_time`, `comment`) VALUES
('AccountsController', 89094930, 1018, 'Approved', '2023-03-02 02:03:13', ''),
('Assigned To Different Departments', 89094930, 1018, 'Approved', '2023-03-02 02:03:47', ''),
('Chairman', 89094930, 1018, 'Approved', '2023-03-02 01:51:33', ''),
('Higher Study Branch Final Approval', 89094930, 1018, 'Approved', '2023-03-02 02:07:16', ''),
('Higher Study Branch Primary Approval', 89094930, 1018, 'Approved', '2023-03-02 01:54:11', ''),
('Higher Study Branch Secondary Approval', 89094930, 1018, 'Approved', '2023-03-02 02:04:10', ''),
('Librarian', 89094930, 1018, 'Approved', '2023-03-02 02:03:47', ''),
('Registrar Final Approval', 89094930, 1018, 'Approved', '2023-03-02 02:06:50', ''),
('Registrar Primary Approval', 89094930, 1018, 'Approved', '2023-03-02 01:53:31', ''),
('Registrar Secondary Approval', 89094930, 1018, 'Approved', '2023-03-02 02:04:59', ''),
('Vice Chancellor Office', 89094930, 1018, 'Approved', '2023-03-02 02:06:27', '');

-- --------------------------------------------------------

--
-- Table structure for table `study_leave_application`
--

CREATE TABLE `study_leave_application` (
  `Leave_ID` int(11) NOT NULL,
  `Name_of_Program` varchar(200) NOT NULL,
  `Destination` varchar(500) NOT NULL,
  `Department` varchar(100) NOT NULL,
  `Duration` int(11) NOT NULL,
  `Destination_Country` varchar(120) NOT NULL,
  `Financial_Source` varchar(500) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `joining_date` date DEFAULT NULL,
  `Leave_Start_Date` date NOT NULL,
  `Program_Start_Date` date NOT NULL,
  `Attachments` varchar(200) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `applied_date` date NOT NULL DEFAULT current_timestamp(),
  `my_application_chairman` varchar(100) DEFAULT NULL,
  `my_application_registrar` varchar(100) DEFAULT NULL,
  `final_application` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `study_leave_application`
--

INSERT INTO `study_leave_application` (`Leave_ID`, `Name_of_Program`, `Destination`, `Department`, `Duration`, `Destination_Country`, `Financial_Source`, `designation`, `joining_date`, `Leave_Start_Date`, `Program_Start_Date`, `Attachments`, `applicant_id`, `applied_date`, `my_application_chairman`, `my_application_registrar`, `final_application`) VALUES
(89094930, 'porte jacci', 'UK_U', 'CSE', 4, 'UK', 'tk', ' lecturer', '2023-03-10', '2023-04-08', '2023-04-08', '4919-notebook.pdf', 1018, '2023-03-02', '6213-my_noc_application_chairman.pdf', NULL, '5004-noc_application.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `Name` varchar(250) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `Password` varchar(256) NOT NULL,
  `Department` varchar(120) NOT NULL,
  `user_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Name`, `Email`, `Password`, `Department`, `user_type`) VALUES
(1018, 'Sabbir Hasan', 'sabbirhasan675@gmail.com', '$2y$10$Ttfu2gRQL5upBARKH44XN.Tja/J4KsVlry7OsyhPY8o90/OS5asMO', 'Department of Computer Science and Engineering', 'Teacher'),
(1019, 'Name', 'chairman.csecu2023@gmail.com', '$2y$10$Ttfu2gRQL5upBARKH44XN.Tja/J4KsVlry7OsyhPY8o90/OS5asMO', 'Department of Computer Science and Engineering', 'Chairman'),
(1020, 'Name', 'registrar.cu@gmail.com', '$2y$10$Ttfu2gRQL5upBARKH44XN.Tja/J4KsVlry7OsyhPY8o90/OS5asMO', 'Registrar CU', 'Registrar'),
(1021, 'Name', 'higher.studies.cu@gmail.com', '$2y$10$Ttfu2gRQL5upBARKH44XN.Tja/J4KsVlry7OsyhPY8o90/OS5asMO', 'Higher Study Branch CU', 'HigherStudies'),
(1022, 'Name', 'college.cu@gmail.com', '$2y$10$Ttfu2gRQL5upBARKH44XN.Tja/J4KsVlry7OsyhPY8o90/OS5asMO', 'College CU', 'College'),
(1023, 'Name', 'accounts.controller.cu@gmail.com', '$2y$10$Ttfu2gRQL5upBARKH44XN.Tja/J4KsVlry7OsyhPY8o90/OS5asMO', 'Accounts Office', 'AccountsController'),
(1024, 'Name', 'librarian.cu@gmail.com', '$2y$10$Ttfu2gRQL5upBARKH44XN.Tja/J4KsVlry7OsyhPY8o90/OS5asMO', 'Library CU', 'Librarian'),
(1025, 'Name', 'vicechancellor.cu@gmail.com', '$2y$10$Ttfu2gRQL5upBARKH44XN.Tja/J4KsVlry7OsyhPY8o90/OS5asMO', 'VC Office', 'Vice Chancellor Office');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `evaluates`
--
ALTER TABLE `evaluates`
  ADD PRIMARY KEY (`Evaluation_type`,`Leave_ID`,`applicant_id`);

--
-- Indexes for table `study_leave_application`
--
ALTER TABLE `study_leave_application`
  ADD PRIMARY KEY (`Leave_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1026;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
