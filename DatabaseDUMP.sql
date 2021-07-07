-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2021 at 04:32 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `soetconnect`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `id` int(11) NOT NULL,
  `assignment_title` varchar(100) DEFAULT NULL,
  `assignment_subject` varchar(100) DEFAULT NULL,
  `uploaded_by` varchar(100) DEFAULT NULL,
  `file_id` varchar(10) DEFAULT NULL,
  `enddate` varchar(100) DEFAULT NULL,
  `details` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `log_type` varchar(100) DEFAULT NULL,
  `dept_assigned` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`id`, `username`, `email`, `pass`, `log_type`, `dept_assigned`) VALUES
(5, 'soet', 'soet@soet.com', 'bd02bd67af59bd7cdccf1e274014863db07f6409', '1', '0'),
(6, 'cse', 'cse@soet.com', '2c361bc7df7a0dd23dbd626477734000672d102f', '2', '1');

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE `batches` (
  `id` int(11) NOT NULL,
  `batch_name` varchar(50) DEFAULT NULL,
  `batch_id` varchar(100) DEFAULT NULL,
  `batch_department` varchar(100) DEFAULT NULL,
  `batch_semester` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`id`, `batch_name`, `batch_id`, `batch_department`, `batch_semester`) VALUES
(5, '2018', NULL, '1', '6'),
(6, '2020', NULL, '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `department_name` varchar(100) DEFAULT NULL,
  `department_shortned` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `department_shortned`) VALUES
(1, 'Computer Science and Engineering', 'cse');

-- --------------------------------------------------------

--
-- Table structure for table `downloads`
--

CREATE TABLE `downloads` (
  `id` int(11) NOT NULL,
  `file_title` varchar(300) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `file_link` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `downloads`
--

INSERT INTO `downloads` (`id`, `file_title`, `department`, `file_link`) VALUES
(5, 'Syllabus CSE', '1', '75e868ab9bc4cd20333c370fc3a50f5b6204.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `notice_title` varchar(100) DEFAULT NULL,
  `notice_department` varchar(100) DEFAULT NULL,
  `upload_data` blob DEFAULT NULL,
  `uploaded_by` varchar(100) NOT NULL,
  `timestamp` varchar(100) DEFAULT NULL,
  `semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `notice_title`, `notice_department`, `upload_data`, `uploaded_by`, `timestamp`, `semester`) VALUES
(12, 'Notice to All Semesters and All Departments', '0', 0x3c703e4e6f7469636520746f20416c6c2053656d65737465727320616e6420416c6c204465706172746d656e74733c62723e3c2f703e, 'soet@soet.com', '2021-05-28 18:54:26', 0);

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `id` int(11) NOT NULL,
  `semester` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `semester`) VALUES
(1, '1st'),
(2, '2nd'),
(3, '3rd'),
(4, '4th'),
(5, '5th'),
(6, '6th'),
(7, '7th'),
(8, '8th');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `student_name` varchar(100) DEFAULT NULL,
  `student_batch` varchar(100) DEFAULT NULL,
  `student_department` varchar(100) DEFAULT NULL,
  `student_rollno` varchar(100) DEFAULT NULL,
  `student_email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_name`, `student_batch`, `student_department`, `student_rollno`, `student_email`) VALUES
(2, 'Vikas', '4', '1', '30', 'vikassyed@gmail.com'),
(5, 'Simple Student one', '2', '1', '01', 'Student@student.com'),
(6, 'Zahid Gulzar', '5', '1', '04-CSE-2018	', 'zahid@test.com'),
(7, 'Safoora Mir', '5', '1', '08-CSE-2018', 'safoora@test.com'),
(8, 'Bashir Ahmad', '5', '1', '12-CSE-2018', 'bashir@test.com'),
(9, 'Anam-Ul- Haq', '5', '1', '23-CSE-2018', 'anam@test.com'),
(10, 'Vikas', '5', '1', '30-CSE/L-2019', 'vikas@test.com'),
(11, 'Zahid Mohammad Kumar', '6', '1', '01-CSE-2020	', 'test@test.com'),
(12, 'Fahim Ul Haq', '6', '1', '03-CSE-2020	', 'test@test.com');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `department` varchar(100) DEFAULT NULL,
  `semester` varchar(100) DEFAULT NULL,
  `subject_name` varchar(100) DEFAULT NULL,
  `teacher_assigned` varchar(100) DEFAULT NULL,
  `subject_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `department`, `semester`, `subject_name`, `teacher_assigned`, `subject_code`) VALUES
(4, '1', '6', 'Computer Graphics and Multimedia', '9', 'PCC-CSE-601'),
(5, '1', '6', 'Design and Analysis of Algorithms', '10', 'PCC-CSE-603');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `teacher_name` varchar(100) DEFAULT NULL,
  `teacher_email` varchar(100) DEFAULT NULL,
  `teacher_slug` varchar(100) DEFAULT NULL,
  `teacher_department` int(100) NOT NULL,
  `image` varchar(100) DEFAULT 'default-user.png',
  `details` blob DEFAULT NULL,
  `teacher_password` varchar(100) NOT NULL DEFAULT 'NOTADDED',
  `login_state` int(11) NOT NULL DEFAULT 0 COMMENT '0 for off 1 for on. By Default 0',
  `phone` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `shortbio` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `teacher_name`, `teacher_email`, `teacher_slug`, `teacher_department`, `image`, `details`, `teacher_password`, `login_state`, `phone`, `designation`, `shortbio`) VALUES
(7, 'Mr. Khalil Ahmad', 'k@cse.com', 'mr-khalil-ahmad', 1, 'default-user.png', NULL, 'NOTADDED', 0, '', '', ''),
(8, 'Mr. Amit Dogra', 'a@cse.com', 'mr-amit-dogra', 1, 'default-user.png', NULL, 'NOTADDED', 0, '', '', ''),
(9, 'Mr. Sreenu Banoth', 's@cse.com', 'mr-sreenu-banoth', 1, 'default-user.png', NULL, 'NOTADDED', 0, '', '', ''),
(10, 'Ms. Rukhsana Thaker', 'r@cse.com', 'ms-rukhsana-thaker', 1, 'default-user.png', 0x4e2f41, 'f2ef5493fac390755d3c1784869628ed6818c700', 1, '0000', 'Lecturer', '');

-- --------------------------------------------------------

--
-- Table structure for table `timetablelinks`
--

CREATE TABLE `timetablelinks` (
  `id` int(11) NOT NULL,
  `department` varchar(100) DEFAULT NULL,
  `semester` varchar(100) DEFAULT NULL,
  `link` varchar(900) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timetablelinks`
--

INSERT INTO `timetablelinks` (`id`, `department`, `semester`, `link`) VALUES
(2, '1', '6', 'https://spreadsheets.google.com/feeds/list/1qdSbJmBKaSMsqafIRnLmdXM1hjNjiIlk3qdREqEpZ6c/od6/public/values?alt=json'),
(3, '1', '5', 'https://spreadsheets.google.com/feeds/list/1qdSbJmBKaSMsqafIRnLmdXM1hjNjiIlk3qdREqEpZ6c/od6/public/values?alt=json');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `downloads`
--
ALTER TABLE `downloads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timetablelinks`
--
ALTER TABLE `timetablelinks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `batches`
--
ALTER TABLE `batches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `downloads`
--
ALTER TABLE `downloads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `timetablelinks`
--
ALTER TABLE `timetablelinks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
