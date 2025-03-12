-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 08, 2020 at 02:15 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobsearch`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `adminemailid` varchar(250) NOT NULL,
  `adminpassword` varchar(250) NOT NULL,
  PRIMARY KEY (`adminpassword`,`adminemailid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminemailid`, `adminpassword`) VALUES
('adminadmin@gmail.com', 'admin@admin');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE IF NOT EXISTS `company` (
  `srno` varchar(250) NOT NULL,
  `cname` varchar(250) NOT NULL,
  `jobtitle` varchar(250) NOT NULL,
  `salary` varchar(250) NOT NULL,
  `qualification` varchar(250) NOT NULL,
  `requirements` varchar(250) NOT NULL,
  `experience` varchar(250) NOT NULL,
  `jobtiming` varchar(250) NOT NULL,
  `jobaddress` varchar(250) NOT NULL,
  `interviewtiming` varchar(250) NOT NULL,
  `interviewaddress` varchar(250) NOT NULL,
  `hrname` varchar(250) NOT NULL,
  `hrnumber` varchar(250) NOT NULL,
  `emailid` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `imagesrc` varchar(250) NOT NULL,
  `permission` varchar(250) NOT NULL,
  PRIMARY KEY (`srno`,`hrnumber`,`emailid`,`password`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`srno`, `cname`, `jobtitle`, `salary`, `qualification`, `requirements`, `experience`, `jobtiming`, `jobaddress`, `interviewtiming`, `interviewaddress`, `hrname`, `hrnumber`, `emailid`, `password`, `imagesrc`, `permission`) VALUES
('1', 'Death Note', 'Animation', '20000 - 25000', '12th Passed', 'Animation Work', '2 - 3 years', '9am - 6pm', 'Tokyo, Sakura Street 6, Japan.', '9am - 12pm ', 'Tokyo, Sakura Street 7, Japan.', 'Light Yagami', '3102006270', 'lightyagami37@gmail.com', 'kirra', 'uploadedimage/DEATH NOTE.jpg', 'Confirmed'),
('2', 'DynoCraft', 'Project Manager', '50000', 'Graduate', 'Male', '3 - 5 ', '7am - 7pm', 'Mulund West', '11am - 2pm', 'Mulund West', 'Ani Kris', '1234567987', 'daynocarft@gmail.com', '1456123', 'uploadedimage/dynacraft-squarelogo-1498807804391.png', 'Not Confirmed'),
('3', 'proxima centauri', 'back office', '30000 - 50000 + incentives', 'Graduate or 12 pass ', 'Good communication skills, Fluent English and knowledgeable ', '2 - 3 years', '9am - 6pm', 'BKC complex ', '9am - 1pm', 'bandra', 'stephan nedumbally', '9876543223', 'centurihd189733b@gmail.com', 'qwerty', 'uploadedimage/planet.jpg', 'Not Confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

DROP TABLE IF EXISTS `person`;
CREATE TABLE IF NOT EXISTS `person` (
  `srno` varchar(250) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `middlename` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `phoneno` varchar(250) NOT NULL,
  `emailid` varchar(250) NOT NULL,
  `gender` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `date` varchar(250) NOT NULL,
  `month` varchar(250) NOT NULL,
  `year` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `nationality` varchar(250) NOT NULL,
  `language` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `hobbies` varchar(250) NOT NULL,
  `experience` varchar(250) NOT NULL,
  `ssc` varchar(250) NOT NULL,
  `sscyear` varchar(250) NOT NULL,
  `sscfrom` varchar(250) NOT NULL,
  `sscpercentage` varchar(250) NOT NULL,
  `hsc` varchar(250) NOT NULL,
  `hscyear` varchar(250) NOT NULL,
  `hscfrom` varchar(250) NOT NULL,
  `hscpercentage` varchar(250) NOT NULL,
  `skills` varchar(250) NOT NULL,
  `imagesrc` varchar(250) NOT NULL,
  PRIMARY KEY (`srno`,`phoneno`,`emailid`,`password`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`srno`, `firstname`, `middlename`, `lastname`, `phoneno`, `emailid`, `gender`, `password`, `date`, `month`, `year`, `status`, `nationality`, `language`, `address`, `hobbies`, `experience`, `ssc`, `sscyear`, `sscfrom`, `sscpercentage`, `hsc`, `hscyear`, `hscfrom`, `hscpercentage`, `skills`, `imagesrc`) VALUES
('1', 'Amal', 'Sathyan', 'sathyan', '8653397424', 'amalsathyan08@gmail.com', 'Male', 'sevendeadlysins', '25', 'Aug', '2001', 'Unmarried', 'Indian', 'English, Hindi, Marathi, Malayalam and Japannes', 'Room no. 3347, Chawl 254, Tagore Nagar 2, Vikhroli East Mumbai - 400083', 'Drawing', 'Fresher', 'Passed', '2017', 'Maharashtra Board', '62', 'Passed', '2019', 'Maharashtra Board', '64', 'MS-CIT', 'uploadedimage/amal.jpg'),
('2', 'Bineesh', 'Baby', 'Alakkal', '7738302188', 'bineeshalakkal22@gmail.com', 'Male', '123456', '22', 'May', '1999', 'Unmarried', 'Indian', 'English, Malayalam, Hindi and Marathi', '409 / C / 4775, Tagore Nagar - 7, Vikhroli East, Mumbai - 400083', 'Coding', 'Fresher', 'Passed', '2015', 'Maharashtra Board', '62', 'Passed', '2017', 'Maharashtra Board', '52', 'Nothing', 'uploadedimage/bineesh.jpeg'),
('3', 'Akhil', 'Ravindran', 'Mullolil', '7045596943', 'akkiravi03@gmail.com', 'Male', 'akkiravi', '26', 'Apr', '1999', 'Married', 'Indian', 'English, Hindi and Malayalam', 'Geetanjali Bunglow,Sector no:3,Plot no:11,Shree Nagar, Thane ', 'Gaming', 'Fresher', 'Passed', '2015', 'Maharashtra board', '62', 'Passed', '2017', 'Maharashtra board', '54', 'Gaming', 'uploadedimage/WhatsApp Image 2019-12-08 at 7.46.01 PM.jpg'),
('4', 'vishnu', 'bhargavan', 'panicker', '7039171456', 'vishnupanicker22@gmail.com', 'Male', '987654321', '11', 'Dec', '2001', 'Unmarried', 'Indian', 'English, hindi, mararthi and malayalam', '209/89/5,tagore nagar, vikhroli (E), mumbai 400083', 'Photography', 'fresher', 'Passed', '2017', 'Maharashtra board', '64', 'Passed', '2019', 'Maharashtra board', '73', 'photography', 'uploadedimage/IMG-20200128-WA0005.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
