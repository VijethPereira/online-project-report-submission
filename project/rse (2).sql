-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2019 at 07:20 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rse`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` text NOT NULL,
  `address` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `name`, `password`, `phone`, `address`, `status`) VALUES
(1, 'admin', 'admin', '9517538250', 'mangalore', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_batch`
--

CREATE TABLE `tbl_batch` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_batch_group`
--

CREATE TABLE `tbl_batch_group` (
  `id` int(11) NOT NULL,
  `batch_number` text NOT NULL,
  `batch_password` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `batch_year` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_batch_group`
--

INSERT INTO `tbl_batch_group` (`id`, `batch_number`, `batch_password`, `status`, `batch_year`) VALUES
(1, 'batch-01', 'batch1', 1, '2019'),
(2, 'batch-02', 'batch2', 1, '2019'),
(11, 'batch-05', 'batch5', 1, '2019'),
(13, 'batch-03', 'batch03', 1, '2019'),
(14, 'batch-21', 'batch-21', 1, '2019'),
(15, 'batch-10', 'batch10', 1, '2019');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE `tbl_course` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faculty`
--

CREATE TABLE `tbl_faculty` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `gender` text NOT NULL,
  `dept` text NOT NULL,
  `dob` date NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `doj` date NOT NULL,
  `currentsalary` text NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `photo` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_faculty`
--

INSERT INTO `tbl_faculty` (`id`, `name`, `phone`, `email`, `address`, `gender`, `dept`, `dob`, `qualification`, `doj`, `currentsalary`, `password`, `photo`, `status`) VALUES
(1, 'mithun', '8485968574', 'mithun@gmail.com', 'mangalore', 'male', 'CS', '2019-04-03', 'BCA', '2018-12-06', '10000', 'mithun', '11.jpg', 0),
(2, 'rizwan', '8105973997', 'rizwan@gmail.com', 'mangalore', 'male', 'CS', '2019-04-01', 'BCA', '2019-01-01', '20000', 'rizwan1234', 'image2.png', 0),
(3, 'rahil', '8105973997', 'rahid@gmail.com', 'mangalore', 'male', 'CS', '2019-02-01', 'bca', '2019-04-02', '35000', 'rahid123', 'sherwani.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_group`
--

CREATE TABLE `tbl_group` (
  `id` int(11) NOT NULL,
  `batch_group_id` int(11) NOT NULL,
  `batchyear` text NOT NULL,
  `dept` text NOT NULL,
  `student_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_group`
--

INSERT INTO `tbl_group` (`id`, `batch_group_id`, `batchyear`, `dept`, `student_id`, `status`) VALUES
(2, 1, '2019', 'CS', 2, 0),
(3, 2, '2019', 'CS', 3, 0),
(4, 2, '2019', 'CS', 4, 0),
(5, 2, '2019', 'CS', 5, 0),
(14, 2, '2019', 'CS', 6, 0),
(16, 11, '2019', 'CS', 7, 0),
(18, 13, '2019', 'CS', 9, 0),
(19, 14, '2019', 'CS', 1, 0),
(20, 14, '2019', 'CS', 10, 0),
(21, 15, '2019', 'CS', 11, 0),
(22, 15, '2019', 'CS', 12, 0),
(23, 15, '2019', 'CS', 14, 0),
(24, 15, '2019', 'CS', 13, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_phase`
--

CREATE TABLE `tbl_phase` (
  `id` int(11) NOT NULL,
  `batch_year` text NOT NULL,
  `phase_type` text NOT NULL,
  `description` text NOT NULL,
  `deliverable_content` text NOT NULL,
  `due_date` date NOT NULL,
  `attachment` text NOT NULL,
  `marks` text NOT NULL,
  `note` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_phase`
--

INSERT INTO `tbl_phase` (`id`, `batch_year`, `phase_type`, `description`, `deliverable_content`, `due_date`, `attachment`, `marks`, `note`, `status`) VALUES
(2, '2', 'Phase-1', 'Project Proposal', 'Proposal Contents', '2019-05-17', 'synopsis.pdf', '40', 'Please submit the documents before ending due date', 0),
(3, '2', 'Phase-2', 'Synopsis', 'Overview of the Project', '2019-06-16', 'synopsis.pdf', '40', 'Please submit the documents before ending due date', 0),
(4, '2', 'Phase-3', 'Problem Analysis', 'SRS Document', '2019-06-20', 'synopsis.docx', '40', 'Please submit the documents before ending due date', 0),
(5, '2', 'Phase-4', 'System Design', 'System Design Document (functional modules described)', '2019-06-24', 'synopsis.docx', '40', 'Please submit the documents before ending due date', 0),
(6, '2', 'Phase-5', 'Database Design', 'Schema Description', '2019-06-28', 'synopsis.docx', '40', 'Please submit the documents before ending due date', 0),
(7, '2', 'Phase-6', 'Detailed Design', 'Module Login in Structured English', '2019-07-02', 'synopsis.docx', '40', 'Please submit the documents before ending due date', 0),
(8, '2', 'Phase-7', 'Code and Intrefaces', 'Program Code listing and screen shots', '2019-07-06', 'synopsis.docx', '40', 'Please submit the documents before ending due date', 0),
(9, '2', 'Phase-8', 'Integration and testing', 'Test Report and User Manual', '2019-07-10', 'synopsis.docx', '40', 'Please submit the documents before ending due date', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_phase_year`
--

CREATE TABLE `tbl_phase_year` (
  `id` int(11) NOT NULL,
  `phase_year` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_phase_year`
--

INSERT INTO `tbl_phase_year` (`id`, `phase_year`, `status`) VALUES
(2, '2019', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_project_batch`
--

CREATE TABLE `tbl_project_batch` (
  `id` int(11) NOT NULL,
  `batch_group` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `title_id` int(11) NOT NULL,
  `sdate` date NOT NULL,
  `edate` date NOT NULL,
  `phase` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_project_batch`
--

INSERT INTO `tbl_project_batch` (`id`, `batch_group`, `faculty_id`, `title_id`, `sdate`, `edate`, `phase`, `status`) VALUES
(4, 1, 1, 1, '2019-05-15', '2019-06-15', 2, 0),
(5, 2, 1, 2, '2019-04-09', '2019-06-30', 2, 0),
(6, 11, 2, 3, '2019-04-17', '2019-04-30', 2, 0),
(9, 13, 1, 4, '2019-05-02', '2019-06-02', 2, 0),
(10, 14, 1, 5, '2019-05-13', '2019-06-13', 2, 0),
(11, 15, 3, 6, '2019-05-22', '2019-06-22', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_semester`
--

CREATE TABLE `tbl_semester` (
  `id` int(11) NOT NULL,
  `course` int(11) NOT NULL,
  `sem` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `reg_no` text NOT NULL,
  `phonenumber` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `gender` text NOT NULL,
  `dob` date NOT NULL,
  `dept` varchar(50) NOT NULL,
  `syear` text NOT NULL,
  `photo` text,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`id`, `name`, `reg_no`, `phonenumber`, `email`, `address`, `gender`, `dob`, `dept`, `syear`, `photo`, `status`) VALUES
(1, 'Roshan', '151774', '9446370225', 'roshan@gmail.com', 'mangalore', 'male', '2019-04-02', 'CS', '2019', '17.jpg', 0),
(2, 'rahul', '151754', '7018816973', 'rahul@gmail.com', 'udupi', 'male', '2019-04-20', 'CS', '2019', '11.jpg', 0),
(3, 'ashwin', '151456', '9535296586', 'ashwin@gmail.com', 'karkala', 'male', '2019-04-18', 'CS', '2019', '7.jpg', 0),
(4, 'shashank', '151789', '8197726168', 'shashank@gmail.com', 'udupi', 'male', '2019-04-27', 'CS', '2019', '5.jpg', 0),
(5, 'sanjay', '151995', '8970860860', 'sanjay@gmail.com', 'kolar', 'male', '2019-04-26', 'CS', '2019', '12.jpg', 0),
(6, 'sujnan', '123456', '8151806719', 'sujnan@gmail.com', 'mangalore', 'male', '2019-04-02', 'CS', '2019', 'image2.png', 0),
(7, 'swaraj', '564563', '8139916495', 'swaraj@gmail.com', 'mangalore', 'male', '2019-04-01', 'CS', '2019', '12.jpg', 0),
(9, 'vijeth', '415045', '9972858537', 'pereiravijeth@gmail.com', 'vamanjoor', 'male', '1997-03-19', 'CS', '2019', 'author-3.jpg', 0),
(10, 'nishmita', '24', '8989876787', 'nis@gmail.com', 'jhvdayycadvwrv', 'female', '1997-12-31', 'CS', '2019', '1642.jpg', 0),
(11, 'sahana', '100', '987654321', 'sna@gmail.com', 'mlore', 'female', '0000-00-00', 'CS', '2019', '', 0),
(12, 'Ashwin', '10', '9686922801', 'chai@gmail.com', 'mlore', 'female', '1997-03-19', 'CS', '2019', NULL, 0),
(13, 'shwetha', '80', '9876565876', 'shwe@gmail.com', 'mlore', 'female', '0000-00-00', 'CS', '2019', NULL, 0),
(14, 'kavya', '81', '7867564534', 'kavya@gmail.com', 'mlore', 'female', '0000-00-00', 'CS', '2019', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_title`
--

CREATE TABLE `tbl_title` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `batch` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_title`
--

INSERT INTO `tbl_title` (`id`, `name`, `description`, `status`, `batch`) VALUES
(1, 'Hour-Wise Lecturer Tracking Web Project Synopsis', 'The project titled â€œhour-wise-lecturer Trackingâ€ is an HTML/Python web application developed on windows operating system.\r\nOn bigger colleges and campus like Bhavanâ€™s Vivekananda college. It becomes a difficult task to locate any lecturer as to where and in which room he/she might be in. Also, if there is any change in the regular classrooms of that particular class, there is no way information is given or updated to the students (both from the current class or other students). And also in case if a lecturer wants to know if there are any empty classrooms available for that particular hour, he/she have to send a student to look out for which in turn results in a waste of time.', 1, '2019'),
(2, 'Report Submission', 'the project report is submitted online and evaluated online by the faculty', 1, '2019'),
(3, 'automatic time table generator', 'the time table generation will be automated online and the subject and labs are added automatically', 1, '2019'),
(4, 'online examination system', 'the exams are conducted online and results are analyzed and grades are given', 1, '2019'),
(5, 'time table management', 'somecontent', 1, '2019'),
(6, 'faculty allotment', 'somecontent\r\n', 1, '2019');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_upload`
--

CREATE TABLE `tbl_upload` (
  `id` int(11) NOT NULL,
  `phase_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `uploaded_file` text NOT NULL,
  `uploaded_date` date NOT NULL,
  `project_status` varchar(50) NOT NULL DEFAULT 'new',
  `note` text NOT NULL,
  `correction_file` text NOT NULL,
  `correction_date` date NOT NULL,
  `correction_status` text NOT NULL,
  `correction_marks` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_upload`
--

INSERT INTO `tbl_upload` (`id`, `phase_id`, `batch_id`, `faculty_id`, `uploaded_file`, `uploaded_date`, `project_status`, `note`, `correction_file`, `correction_date`, `correction_status`, `correction_marks`, `status`) VALUES
(1, 2, 2, 1, 'Abstract.docx', '2019-05-18', 'completed', '', '', '2019-05-18', 'nocorrection', '38', 0),
(2, 2, 15, 3, 'report.pdf', '2019-05-22', 'completed', '', '', '2019-05-22', 'nocorrection', '32', 0),
(3, 3, 15, 3, 'report.pdf', '2019-05-22', 'completed', '', '', '2019-05-22', 'nocorrection', '30', 0),
(4, 4, 15, 3, 'report.pdf', '2019-05-22', 'completed', '', '', '2019-05-22', 'nocorrection', '40', 0),
(5, 5, 15, 3, 'report.pdf', '2019-05-22', 'completed', '', '', '2019-05-22', 'nocorrection', '40', 0),
(6, 6, 15, 3, 'report.pdf', '2019-05-22', 'completed', '', '', '2019-05-22', 'nocorrection', '20', 0),
(7, 7, 15, 3, 'report.pdf', '2019-05-22', 'completed', '', '', '2019-05-22', 'nocorrection', '10', 0),
(8, 8, 15, 3, 'report.pdf', '2019-05-22', 'completed', '', '', '2019-05-22', 'nocorrection', '40', 0),
(9, 9, 15, 3, 'report.pdf', '2019-05-22', 'completed', 'some content', '', '2019-05-22', 'nocorrection', '20', 0),
(10, 2, 1, 1, 'report.pdf', '2019-05-23', 'completed', '', '', '2019-05-23', 'nocorrection', '38', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_batch`
--
ALTER TABLE `tbl_batch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_batch_group`
--
ALTER TABLE `tbl_batch_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_faculty`
--
ALTER TABLE `tbl_faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_group`
--
ALTER TABLE `tbl_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_phase`
--
ALTER TABLE `tbl_phase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_phase_year`
--
ALTER TABLE `tbl_phase_year`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_project_batch`
--
ALTER TABLE `tbl_project_batch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_semester`
--
ALTER TABLE `tbl_semester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_title`
--
ALTER TABLE `tbl_title`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_upload`
--
ALTER TABLE `tbl_upload`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_batch`
--
ALTER TABLE `tbl_batch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_batch_group`
--
ALTER TABLE `tbl_batch_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_faculty`
--
ALTER TABLE `tbl_faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_group`
--
ALTER TABLE `tbl_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_phase`
--
ALTER TABLE `tbl_phase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_phase_year`
--
ALTER TABLE `tbl_phase_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_project_batch`
--
ALTER TABLE `tbl_project_batch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_semester`
--
ALTER TABLE `tbl_semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_title`
--
ALTER TABLE `tbl_title`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_upload`
--
ALTER TABLE `tbl_upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
