-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2023 at 04:17 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bnhs_enrollment_db`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `buildingValidation` (IN `in_building` VARCHAR(255), IN `in_id` INT)   SELECT * FROM tbl_building WHERE building = in_building AND id != in_id AND is_deleted = 'no'$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `checkIfEmailIsRegistered` (IN `in_email` VARCHAR(255))   SELECT id, password FROM tbl_admin WHERE email = in_email AND status = 'enable' AND is_deleted = 'no'$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteBuilding` (IN `in_id` INT)   UPDATE tbl_building SET is_deleted = 'yes' WHERE id = in_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteRoom` (IN `in_id` INT)   UPDATE tbl_room SET is_deleted = 'yes' WHERE id = in_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteSection` (IN `in_id` INT)   UPDATE tbl_section SET is_deleted = 'yes' WHERE id = in_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteSubject` (IN `in_id` INT)   UPDATE tbl_subject SET is_deleted = 'yes' WHERE id = in_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `editBuilding` (IN `in_building` VARCHAR(255), IN `in_id` INT)   UPDATE tbl_building SET building = in_building WHERE id = in_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `editRoom` (IN `in_building_id` INT, IN `in_room` VARCHAR(255), IN `in_id` INT)   UPDATE tbl_room SET building_id = in_building_id, room = in_room WHERE id = in_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `editSection` (IN `in_building_id` INT, IN `in_grade_level_id` INT, IN `in_room_id` INT, IN `in_section` VARCHAR(255), IN `in_id` INT)   UPDATE tbl_section SET building_id = in_building_id, grade_level_id = in_grade_level_id, room_id = in_room_id, section = in_section WHERE id = in_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `editSubject` (IN `in_grade_level_id` INT, IN `in_subject` VARCHAR(255), IN `in_id` INT)   UPDATE tbl_subject SET grade_level_id = in_grade_level_id, subject = in_subject WHERE id = in_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getBuildingInfo` (IN `in_id` INT)   SELECT id, building FROM tbl_building WHERE id = in_id AND is_deleted = 'no'$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getRoom` (IN `in_building_id` INT)   SELECT id, room FROM tbl_room WHERE building_id = in_building_id AND is_deleted = 'no'$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getRoomInfo` (IN `in_id` INT)   SELECT id, building_id, room FROM tbl_room WHERE id = in_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getSectionInfo` (IN `in_id` INT)   SELECT id, building_id, grade_level_id, room_id, section FROM tbl_section WHERE id = in_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getSubjectInfo` (IN `in_id` INT)   SELECT id, grade_level_id, subject FROM tbl_subject WHERE id = in_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertBuilding` (IN `in_building` VARCHAR(255))   INSERT INTO tbl_building (building) VALUES (in_building)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertRoom` (IN `in_building_id` INT, IN `in_room` VARCHAR(255))   INSERT INTO tbl_room (building_id, room) VALUES (in_building_id, in_room)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertSection` (IN `in_building_id` INT, IN `in_grade_level_id` INT, IN `in_room_id` INT, IN `in_section` VARCHAR(255))   INSERT INTO tbl_section (building_id, grade_level_id, room_id, section) VALUES (in_building_id, in_grade_level_id, in_room_id, in_section)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertSubject` (IN `in_grade_level_id` INT, IN `in_subject` VARCHAR(255))   INSERT INTO tbl_subject (grade_level_id, subject) VALUES (in_grade_level_id, in_subject)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertTeacher` (IN `in_f_name` VARCHAR(255), IN `in_l_name` VARCHAR(255), IN `in_gender` VARCHAR(255), IN `in_mobile_no` VARCHAR(255), IN `in_avatar` VARCHAR(255), IN `in_email` VARCHAR(255), IN `in_password` VARCHAR(255))   INSERT INTO tbl_teacher (f_name, l_name, gender, mobile_no, avatar, email, password) VALUES (in_f_name, in_l_name, in_gender, in_mobile_no, in_avatar, in_email, in_password)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `roomValidation` (IN `in_room` VARCHAR(255), IN `in_building_id` INT, IN `in_id` INT)   SELECT id FROM tbl_room WHERE room = in_room AND building_id = in_building_id AND is_deleted = 'no' AND id != in_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sectionValidation` (IN `in_building_id` INT, IN `in_grade_level_id` INT, IN `in_room_id` INT, IN `in_section` VARCHAR(255), IN `in_id` INT)   SELECT * FROM tbl_section WHERE building_id = in_building_id AND grade_level_id = in_grade_level_id AND room_id = in_room_id AND section = in_section AND id != in_id AND is_deleted = 'no'$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `subjectValidation` (IN `in_grade_level_id` INT, IN `in_subject` VARCHAR(255), IN `in_id` INT)   SELECT * FROM tbl_subject WHERE grade_level_id = in_grade_level_id AND subject = in_subject AND is_deleted = 'no' AND id != in_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `teacherValidation` (IN `in_email` VARCHAR(255), IN `in_id` INT)   SELECT * FROM tbl_teacher WHERE email = in_email AND is_deleted = 'no' AND id != in_id$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `is_deleted` varchar(255) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `name`, `email`, `password`, `type`, `status`, `is_deleted`) VALUES
(1, 'Admin', 'admin@gmail.com', '0192023a7bbd73250516f069df18b500', 'admin', 'enable', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_building`
--

CREATE TABLE `tbl_building` (
  `id` int(11) NOT NULL,
  `building` varchar(255) NOT NULL,
  `is_deleted` varchar(255) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_building`
--

INSERT INTO `tbl_building` (`id`, `building`, `is_deleted`) VALUES
(1, 'Strike Building', 'no'),
(2, 'Revilla Building', 'no'),
(3, 'chavez building', 'yes'),
(7, 'chavez building', 'no'),
(8, 'test1', 'yes'),
(9, 'test', 'yes'),
(10, 'test', 'yes'),
(11, 'test', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_classroom_advisory`
--

CREATE TABLE `tbl_classroom_advisory` (
  `id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `is_deleted` varchar(255) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_classroom_advisory`
--

INSERT INTO `tbl_classroom_advisory` (`id`, `section_id`, `teacher_id`, `is_deleted`) VALUES
(1, 2, 1, 'no'),
(2, 4, 5, 'no'),
(3, 2, 5, 'yes'),
(4, 3, 1, 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_classroom_schedule`
--

CREATE TABLE `tbl_classroom_schedule` (
  `id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `day_id` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `is_deleted` varchar(255) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_classroom_schedule`
--

INSERT INTO `tbl_classroom_schedule` (`id`, `section_id`, `teacher_id`, `subject_id`, `day_id`, `start_time`, `end_time`, `is_deleted`) VALUES
(1, 2, 1, 1, 1, '08:00:00', '09:00:00', 'no'),
(2, 2, 5, 2, 1, '09:00:00', '10:00:00', 'no'),
(3, 2, 5, 2, 2, '09:00:00', '10:00:00', 'no'),
(4, 2, 1, 1, 3, '08:00:00', '09:00:00', 'no'),
(5, 2, 5, 2, 4, '10:00:00', '11:00:00', 'yes'),
(6, 4, 5, 2, 1, '07:00:00', '08:00:00', 'no'),
(7, 3, 1, 6, 2, '07:00:00', '08:00:00', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_days`
--

CREATE TABLE `tbl_days` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_days`
--

INSERT INTO `tbl_days` (`id`, `name`) VALUES
(1, 'MONDAY'),
(2, 'TUESDAY'),
(3, 'WEDNESDAY'),
(4, 'THURSDAY'),
(5, 'FRIDAY');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_grade_level`
--

CREATE TABLE `tbl_grade_level` (
  `id` int(11) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `is_deleted` varchar(255) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_grade_level`
--

INSERT INTO `tbl_grade_level` (`id`, `grade`, `is_deleted`) VALUES
(1, 'Grade 7', 'no'),
(2, 'Grade 8', 'no'),
(3, 'Grade 9', 'no'),
(4, 'Grade 10', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_requirements`
--

CREATE TABLE `tbl_requirements` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `video_record` varchar(255) NOT NULL,
  `pdf_file` varchar(255) NOT NULL,
  `form_138` varchar(255) NOT NULL,
  `psa_birth_cert` varchar(255) NOT NULL,
  `brgy_clearance` varchar(255) NOT NULL,
  `good_moral` varchar(255) NOT NULL,
  `guardian_id` varchar(255) NOT NULL,
  `old_id` varchar(255) NOT NULL,
  `is_deleted` varchar(255) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_requirements`
--

INSERT INTO `tbl_requirements` (`id`, `student_id`, `video_record`, `pdf_file`, `form_138`, `psa_birth_cert`, `brgy_clearance`, `good_moral`, `guardian_id`, `old_id`, `is_deleted`) VALUES
(1, 14, '1694524206_3.mp4', '1694524206_Register-Bacoor-National-High-School.png', '1694524206_Section.png', '1694524206_Classroom-Schedule.png', '1694524206_dtr2.png', '1694524206_Dashboard.png', '1694524206_dtr4.png', '', 'no'),
(2, 15, '1694613565_2022-10-20 20-48-00.mp4', '1694613565_Screenshot 2023-08-14 104224.png', '1694613565_download.png', '1694613565_Screenshot 2023-07-21 174840.png', '1694613565_Register-Bacoor-National-High-School.png', '1694613565_Screenshot 2023-07-21 174840.png', '1694613565_download.png', '', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_room`
--

CREATE TABLE `tbl_room` (
  `id` int(11) NOT NULL,
  `building_id` int(11) NOT NULL,
  `room` varchar(255) NOT NULL,
  `is_deleted` varchar(255) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_room`
--

INSERT INTO `tbl_room` (`id`, `building_id`, `room`, `is_deleted`) VALUES
(1, 1, 'First Floor Room A', 'no'),
(2, 1, 'First Floor Room B', 'no'),
(3, 2, 'First Floor Room A', 'no'),
(4, 3, 'First Floor Room A', 'yes'),
(5, 2, 'First Floor Room B', 'no'),
(6, 7, 'First Floor Room A', 'yes'),
(7, 7, 'First Floor Room B', 'yes'),
(8, 7, 'First Floor Room A', 'no'),
(9, 7, 'First Floor Room B', 'no'),
(10, 7, 'test1', 'yes'),
(11, 7, 'First Floor Room Cs', 'yes'),
(12, 11, 'test', 'no'),
(13, 11, 'test12', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_section`
--

CREATE TABLE `tbl_section` (
  `id` int(11) NOT NULL,
  `building_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `grade_level_id` int(11) NOT NULL,
  `section` varchar(255) NOT NULL,
  `is_deleted` varchar(255) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_section`
--

INSERT INTO `tbl_section` (`id`, `building_id`, `room_id`, `grade_level_id`, `section`, `is_deleted`) VALUES
(2, 1, 1, 1, 'Section Strike A 1', 'no'),
(3, 2, 5, 2, 'Section Revilla B 1', 'no'),
(4, 7, 6, 1, 'Section Chavez A 1', 'no'),
(5, 2, 3, 2, 'test', 'yes'),
(6, 7, 8, 3, 'Section Chavez A 1', 'no'),
(7, 7, 9, 3, 'Section Chavez B 1', 'no'),
(8, 7, 9, 3, 'Section Chavez B 2', 'no'),
(9, 7, 8, 2, 'Section Chavez A 1', 'yes'),
(10, 1, 2, 4, 'Section Strike B 9', 'no'),
(11, 7, 9, 1, 'test1', 'yes'),
(12, 11, 12, 4, 'test', 'yes'),
(13, 11, 12, 3, 'test', 'yes'),
(14, 2, 5, 2, 'fdsf', 'yes'),
(15, 2, 3, 2, 'test1', 'yes'),
(16, 2, 3, 2, 'test17', 'yes'),
(17, 7, 9, 3, 'test', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `id` int(11) NOT NULL,
  `lrn` varchar(11) DEFAULT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middle_initial` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `place_of_birth` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `civil_status` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `guardian` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `parent_contact_no` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 - pending, 1 - grade 7, 2 - for grade 8 enrollment, 3 - grade 8, 4 - for grade 9 enrollment, 5 - grade 9, 6 - for grade 10 enrollment, 7 - grade 10',
  `is_deleted` varchar(255) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`id`, `lrn`, `lastname`, `firstname`, `middle_initial`, `gender`, `date_of_birth`, `address`, `place_of_birth`, `nationality`, `religion`, `civil_status`, `contact_no`, `guardian`, `email`, `parent_contact_no`, `password`, `status`, `is_deleted`) VALUES
(1, '2147483647', 'test', 'test', 'test', 'test', '2000-12-22', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test@gmail.com', 'test', 'test', 1, 'no'),
(2, '', 'Smith', 'John', '', 'Male', '2000-03-04', '123 Main Street Springfield, IL 62701 United States', '456 Elm Avenue Toronto, ON M4B 1B3 Canada', 'Filipino', 'Catholic', 'Single', '9564565467', 'Sophia Smith', 'john.smith@gmail.com', '9256753453', '', 0, 'no'),
(13, NULL, 'Davis', 'Alexander', '', 'Male', '2000-08-05', '567 Cedar Court, Los Angeles, CA 90001', '789 Maple Drive, Denver, CO 80202', 'Filipino', 'Catholic', 'Single', '9564565467', 'Samuel Davis', 'john.smith@gmail.com', '9256753455', '', 0, 'no'),
(14, NULL, 'Davis', 'Alexander', '', 'Male', '2000-09-04', '321 Redwood Lane, Miami, FL 33101', '654 Sycamore Avenue, Dallas, TX 75201', 'Filipino', 'Catholic', 'Single', '9564565464', 'Samuel Davis', 'alexander.davis@gmail.com', '9256753465', '', 0, 'no'),
(15, NULL, 'test', 'test', '', 'Male', '2000-05-31', 'test', 'test', 'Filipino', 'Catholic', 'Single', '9564565462', 'test', 'test1@gmail.com', '9256753453', '', 0, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject`
--

CREATE TABLE `tbl_subject` (
  `id` int(11) NOT NULL,
  `grade_level_id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `is_deleted` varchar(255) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_subject`
--

INSERT INTO `tbl_subject` (`id`, `grade_level_id`, `subject`, `is_deleted`) VALUES
(1, 1, 'Math', 'no'),
(2, 1, 'MAPEH', 'no'),
(3, 3, 'Math', 'no'),
(4, 2, 'MAPEH', 'no'),
(5, 4, 'test', 'yes'),
(6, 2, 'Math', 'no'),
(7, 1, 'English1', 'yes'),
(10, 2, 'English', 'no'),
(11, 2, 'Englishs', 'yes'),
(12, 2, 'Englishss', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teacher`
--

CREATE TABLE `tbl_teacher` (
  `id` int(11) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `mobile_no` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'enable',
  `is_deleted` varchar(255) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_teacher`
--

INSERT INTO `tbl_teacher` (`id`, `f_name`, `l_name`, `gender`, `mobile_no`, `avatar`, `email`, `password`, `status`, `is_deleted`) VALUES
(1, 'John', 'Smith', 'MALE', '9564563646', '64d62b31e3a49.png', 'john.smith@gmail.com', '36ef208000aeadade719f3312a1f4ee9', 'enable', 'no'),
(5, 'Michael', 'Williams', 'MALE', '9453453535', '64d624b9beba2.jpg', 'michael.williams@gmail.com', 'd73b0a2d9da850b8350a6217faae2d99', 'enable', 'no'),
(7, 'test', 'test', 'MALE', '9453535353', '6501c132e7d36.png', 'test@gmail.com', '3aca7e7ea50161bc41e9b2c3b36c291a', 'disable', 'yes'),
(8, 'Jamie', 'Santiago', 'FEMALE', '9453535323', NULL, 'jamie.santiago@telegmail.com', '74581eb3b7a75c2c1a1f28954b74460e', 'enable', 'no'),
(9, 'Courtney', 'Spencer', 'FEMALE', '9453455446', '', 'courtney.spencer@telegmail.com', '002d72eb30aeeff475dd7fec5432873a', 'enable', 'no'),
(10, 'Peter', 'Zurcher', 'MALE', '9453438587', '650512f215b40.jpeg', 'peter.zurcher@telegmail.com', '762f49a1c9558bdff906be7ed36f6c03', 'enable', 'yes'),
(11, 'Peter', 'Zurcher', 'MALE', '9453454535', '650513bd99c0b.jpeg', 'peter.zurcher@telegmail.com', '762f49a1c9558bdff906be7ed36f6c03', 'enable', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teacher_subject`
--

CREATE TABLE `tbl_teacher_subject` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `grade_level_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `is_deleted` varchar(255) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_teacher_subject`
--

INSERT INTO `tbl_teacher_subject` (`id`, `teacher_id`, `grade_level_id`, `subject_id`, `is_deleted`) VALUES
(5, 1, 1, 1, 'no'),
(6, 1, 1, 2, 'yes'),
(7, 1, 2, 6, 'no'),
(8, 5, 1, 2, 'no'),
(9, 5, 2, 4, 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_building`
--
ALTER TABLE `tbl_building`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_classroom_advisory`
--
ALTER TABLE `tbl_classroom_advisory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `section_id` (`section_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `tbl_classroom_schedule`
--
ALTER TABLE `tbl_classroom_schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `day_id` (`day_id`),
  ADD KEY `section_id` (`section_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `tbl_days`
--
ALTER TABLE `tbl_days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_grade_level`
--
ALTER TABLE `tbl_grade_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_requirements`
--
ALTER TABLE `tbl_requirements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `tbl_room`
--
ALTER TABLE `tbl_room`
  ADD PRIMARY KEY (`id`),
  ADD KEY `building_id` (`building_id`);

--
-- Indexes for table `tbl_section`
--
ALTER TABLE `tbl_section`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `building_id` (`building_id`),
  ADD KEY `grade_level_id` (`grade_level_id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lrn` (`lrn`);

--
-- Indexes for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grade_level_id` (`grade_level_id`);

--
-- Indexes for table `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_teacher_subject`
--
ALTER TABLE `tbl_teacher_subject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `grade_level_id` (`grade_level_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_building`
--
ALTER TABLE `tbl_building`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_classroom_advisory`
--
ALTER TABLE `tbl_classroom_advisory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_classroom_schedule`
--
ALTER TABLE `tbl_classroom_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_days`
--
ALTER TABLE `tbl_days`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_grade_level`
--
ALTER TABLE `tbl_grade_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_requirements`
--
ALTER TABLE `tbl_requirements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_room`
--
ALTER TABLE `tbl_room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_section`
--
ALTER TABLE `tbl_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_teacher_subject`
--
ALTER TABLE `tbl_teacher_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_classroom_advisory`
--
ALTER TABLE `tbl_classroom_advisory`
  ADD CONSTRAINT `tbl_classroom_advisory_ibfk_2` FOREIGN KEY (`section_id`) REFERENCES `tbl_section` (`id`),
  ADD CONSTRAINT `tbl_classroom_advisory_ibfk_3` FOREIGN KEY (`teacher_id`) REFERENCES `tbl_teacher` (`id`);

--
-- Constraints for table `tbl_classroom_schedule`
--
ALTER TABLE `tbl_classroom_schedule`
  ADD CONSTRAINT `tbl_classroom_schedule_ibfk_1` FOREIGN KEY (`day_id`) REFERENCES `tbl_days` (`id`),
  ADD CONSTRAINT `tbl_classroom_schedule_ibfk_2` FOREIGN KEY (`section_id`) REFERENCES `tbl_section` (`id`),
  ADD CONSTRAINT `tbl_classroom_schedule_ibfk_3` FOREIGN KEY (`subject_id`) REFERENCES `tbl_subject` (`id`),
  ADD CONSTRAINT `tbl_classroom_schedule_ibfk_4` FOREIGN KEY (`teacher_id`) REFERENCES `tbl_teacher` (`id`);

--
-- Constraints for table `tbl_requirements`
--
ALTER TABLE `tbl_requirements`
  ADD CONSTRAINT `tbl_requirements_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `tbl_student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_room`
--
ALTER TABLE `tbl_room`
  ADD CONSTRAINT `tbl_room_ibfk_1` FOREIGN KEY (`building_id`) REFERENCES `tbl_building` (`id`);

--
-- Constraints for table `tbl_section`
--
ALTER TABLE `tbl_section`
  ADD CONSTRAINT `tbl_section_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `tbl_room` (`id`),
  ADD CONSTRAINT `tbl_section_ibfk_2` FOREIGN KEY (`building_id`) REFERENCES `tbl_building` (`id`),
  ADD CONSTRAINT `tbl_section_ibfk_3` FOREIGN KEY (`grade_level_id`) REFERENCES `tbl_grade_level` (`id`);

--
-- Constraints for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  ADD CONSTRAINT `tbl_subject_ibfk_1` FOREIGN KEY (`grade_level_id`) REFERENCES `tbl_grade_level` (`id`);

--
-- Constraints for table `tbl_teacher_subject`
--
ALTER TABLE `tbl_teacher_subject`
  ADD CONSTRAINT `tbl_teacher_subject_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `tbl_subject` (`id`),
  ADD CONSTRAINT `tbl_teacher_subject_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `tbl_teacher` (`id`),
  ADD CONSTRAINT `tbl_teacher_subject_ibfk_3` FOREIGN KEY (`grade_level_id`) REFERENCES `tbl_grade_level` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
