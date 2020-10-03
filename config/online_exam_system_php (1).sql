-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 22, 2020 at 08:32 AM
-- Server version: 8.0.18
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_exam_system_php`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_user` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='admin table created';

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_user`, `admin_pass`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_answer`
--

DROP TABLE IF EXISTS `tbl_answer`;
CREATE TABLE IF NOT EXISTS `tbl_answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ques_no` int(11) NOT NULL COMMENT 'foreign key',
  `right_ans` int(11) NOT NULL DEFAULT '0',
  `answer` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8 COMMENT='answer table with foreign key';

--
-- Dumping data for table `tbl_answer`
--

INSERT INTO `tbl_answer` (`id`, `ques_no`, `right_ans`, `answer`) VALUES
(1, 1, 0, 'clean separation of design & content'),
(2, 1, 1, 'minimal code duplication'),
(3, 1, 0, 'Highest priority'),
(4, 1, 0, 'Reduces page download time'),
(5, 2, 0, 'Text-decoration:line-through'),
(6, 2, 1, 'Text-decoration:in-line'),
(7, 2, 0, 'Text-decoration:overline'),
(8, 2, 0, 'Text-decoration:underline'),
(9, 3, 0, 'Cue'),
(10, 3, 0, 'Voice-family'),
(11, 3, 1, 'Load'),
(12, 3, 0, 'Speak'),
(13, 4, 0, 'Class'),
(14, 4, 1, 'Style'),
(15, 4, 0, 'span'),
(16, 4, 0, 'link'),
(17, 5, 0, 'Slow'),
(18, 5, 1, 'Normal'),
(19, 5, 0, 'Fast'),
(20, 5, 0, 'None'),
(40, 6, 0, 'swadhin'),
(39, 6, 0, 'reza'),
(38, 6, 1, 'selim'),
(37, 6, 0, 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_question`
--

DROP TABLE IF EXISTS `tbl_question`;
CREATE TABLE IF NOT EXISTS `tbl_question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ques_no` int(11) NOT NULL,
  `ques_name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='question tanle created';

--
-- Dumping data for table `tbl_question`
--

INSERT INTO `tbl_question` (`id`, `ques_no`, `ques_name`) VALUES
(1, 1, 'Which of the following does not apply to external styles?'),
(2, 2, 'Which of the following is not a valid text-decoration option?'),
(3, 3, 'Which of the following is not a valid property of an aural style sheet?'),
(4, 4, 'Which element property is required to define internal styles?'),
(5, 5, 'What is the initial value of the marque speed property?'),
(11, 6, 'Online_Exam_System_PHP/admin/quesadd.php');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='user table success';

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `name`, `username`, `password`, `email`, `status`) VALUES
(2, 'Zannatul', 'bonna', '202cb962ac59075b964b07152d234b70', 'selimreza@gmail.com', 1),
(6, 'Selim Reza Swadhin', 'selim', '202cb962ac59075b964b07152d234b70', 'selimrezaswadhim@gmail.com', 1),
(4, 'Papia Sultana', 'pervin', '202cb962ac59075b964b07152d234b70', 'pervin@gmail.com', 0),
(5, 'selina begum', 'reza', '202cb962ac59075b964b07152d234b70', 'selim@gmail.com', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
