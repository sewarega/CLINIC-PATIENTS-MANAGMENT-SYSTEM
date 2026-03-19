-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2016 at 06:43 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Auclinic_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `user_id` varchar(15) NOT NULL,
  `fname` varchar(22) NOT NULL,
  `lname` varchar(22) NOT NULL,
  `email` varchar(22) NOT NULL,
  `user_type` varchar(15) NOT NULL,
  `user_name` varchar(22) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`user_id`, `fname`, `lname`, `email`, `user_type`, `user_name`, `Password`, `status`) 

-- --------------------------------------------------------

--
-- Table structure for table `appo`
--

CREATE TABLE IF NOT EXISTS `appo` (
  `No` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` varchar(15) NOT NULL,
  `date` date NOT NULL,
  `pname` varchar(40) NOT NULL,
  PRIMARY KEY (`No`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `appo`
--

INSERT INTO `appo` (`No`, `patient_id`, `date`, `pname`) VALUES
(2, 'ETR/343/05', '2016-06-15', 'azme tam'),
(3, 'ETR/623/05', '2016-06-16', 'azme tam'),
(4, 'ETR/03/05', '2016-06-01', 'azme tam');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE IF NOT EXISTS `appointment` (
  `appo_no` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(22) NOT NULL,
  `lname` varchar(22) NOT NULL,
  `patient_id` varchar(15) NOT NULL,
  `apsdate` date NOT NULL,
  `apedate` date NOT NULL,
  `aptime` time NOT NULL,
  `dname` varchar(22) NOT NULL,
  PRIMARY KEY (`appo_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appo_no`, `fname`, `lname`, `patient_id`, `apsdate`, `apedate`, `aptime`, `dname`) VALUES
(9, 'abebe', 'kebede', 'ETR/720/05', '2016-06-14', '2016-06-16', '03:45:00', 'SelemonÂ Â almaze');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `com_ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `email` varchar(20) NOT NULL,
  `message` varchar(20000) NOT NULL,
  `Date` date NOT NULL,
  PRIMARY KEY (`com_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`com_ID`, `name`, `email`, `message`, `Date`) VALUES
(7, 'chalew', 'alma23@gmail.com', '  We ensure that we will make your stay', '2016-06-10');

-- --------------------------------------------------------

--
-- Table structure for table `diagnosistable`
--

CREATE TABLE IF NOT EXISTS `diagnosistable` (
  `treat_id` int(11) NOT NULL AUTO_INCREMENT,
  `pname` varchar(40) NOT NULL,
  `patient_id` varchar(15) NOT NULL,
  `rx` mediumtext NOT NULL,
  `ddate` date NOT NULL,
  `pdname` varchar(40) NOT NULL,
  `sign` varchar(13) NOT NULL,
  PRIMARY KEY (`treat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `diagnosistable`
--

INSERT INTO `diagnosistable` (`treat_id`, `pname`, `patient_id`, `rx`, `ddate`, `pdname`, `sign`) VALUES
(5, 'qwe', '1212', 'ddddd', '2016-05-11', 'qqq', 'checked');

-- --------------------------------------------------------

--
-- Table structure for table `drugdelivertable`
--

CREATE TABLE IF NOT EXISTS `drugdelivertable` (
  `presc_no` int(11) NOT NULL AUTO_INCREMENT,
  `pname` varchar(22) NOT NULL,
  `patient_id` varchar(15) NOT NULL,
  `dname` varchar(35) NOT NULL,
  `drug_type` varchar(20) NOT NULL,
  `quantity` int(10) NOT NULL,
  `dosage` varchar(15) NOT NULL,
  `pdname` varchar(22) NOT NULL,
  `sign` varchar(10) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`presc_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `drugdelivertable`
--

INSERT INTO `drugdelivertable` (`presc_no`, `pname`, `patient_id`, `dname`, `drug_type`, `quantity`, `dosage`, `pdname`, `sign`, `date`) VALUES

(15, 'ChalewÂ Â Zeynu', 'ETR/110/05', 'diclo', 'Supp', 6, '1mg', 'Abe Kebe', 'checked', '2016-06-14');

-- --------------------------------------------------------

--
-- Table structure for table `drugtable`
--

CREATE TABLE IF NOT EXISTS `drugtable` (
  `dcode` int(11) NOT NULL,
  `dname` varchar(22) NOT NULL,
  `cname` varchar(22) NOT NULL,
  `drug_type` varchar(22) NOT NULL,
  `dosage` varchar(22) NOT NULL,
  `quantity` int(50) NOT NULL,
  `unit` varchar(10) NOT NULL,
  `shelf_no` int(11) NOT NULL,
  `expire_date` date NOT NULL,
  PRIMARY KEY (`dcode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drugtable`
--

INSERT INTO `drugtable` (`dcode`, `dname`, `cname`, `drug_type`, `dosage`, `quantity`, `unit`, `shelf_no`, `expire_date`) VALUES

(1001, 'parastamol', 'china', 'Tablet(PO)', '100mg', 600, 'Box', 4, '2016-06-10');

-- --------------------------------------------------------

--
-- Table structure for table `labrequesttable`
--

CREATE TABLE IF NOT EXISTS `labrequesttable` (
  `card_no` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` varchar(15) NOT NULL,
  `age` int(3) NOT NULL,
  `sex` varchar(6) NOT NULL,
  `plan` varchar(20) NOT NULL,
  `pdname` varchar(20) NOT NULL,
  `sign` varchar(13) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`card_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `labrequesttable`
--

INSERT INTO `labrequesttable` (`card_no`, `patient_id`, `age`, `sex`, `plan`, `pdname`, `sign`, `date`) VALUES

(7, 'ETR/720/05', 26, 'female', 'H.PYLORI Test', 'azme tam', 'checked', '2016-06-14');

-- --------------------------------------------------------

--
-- Table structure for table `labresulttable`
--

CREATE TABLE IF NOT EXISTS `labresulttable` (
  `labresult_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` varchar(15) NOT NULL,
  `labresultdes` varchar(1000) NOT NULL,
  `ltdate` date NOT NULL,
  `ltname` varchar(20) NOT NULL,
  `sign` varchar(10) NOT NULL,
  PRIMARY KEY (`labresult_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `labresulttable`
--

INSERT INTO `labresulttable` (`labresult_id`, `patient_id`, `labresultdes`, `ltdate`, `ltname`, `sign`) VALUES
(4, 'ETR/720/05', 'TB,Malaria', '2016-06-14', 'abeku teka', 'checked');

-- --------------------------------------------------------

--
-- Table structure for table `patient_table`
--

CREATE TABLE IF NOT EXISTS `patient_table` (
  `fname` varchar(22) NOT NULL,
  `lname` varchar(22) NOT NULL,
  `patient_id` varchar(10) NOT NULL,
  `sex` varchar(6) NOT NULL,
  `age` varchar(20) NOT NULL,
  `department` varchar(15) NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `email` varchar(22) NOT NULL,
  `user_type` varchar(15) NOT NULL,
  PRIMARY KEY (`patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_table`
--

INSERT INTO `patient_table` (`fname`, `lname`, `patient_id`, `sex`, `age`, `department`, `phone_no`, `email`, `user_type`) VALUES

('balcha', 'abera', 'NCR/989/11', 'male', '1994/17/November', 'Sport Science', '0955554545', 'chalew112@gmail.com', 'Patient');

-- --------------------------------------------------------

--
-- Table structure for table `prescriptiontable`
--

CREATE TABLE IF NOT EXISTS `prescriptiontable` (
  `presc_no` int(11) NOT NULL AUTO_INCREMENT,
  `pname` varchar(44) NOT NULL,
  `patient_id` varchar(11) NOT NULL,
  `age` int(3) NOT NULL,
  `sex` varchar(6) NOT NULL,
  `Rx` varchar(15000) NOT NULL,
  `diagnosis` varchar(50) NOT NULL,
  `pdname` varchar(22) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`presc_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `prescriptiontable`
--

INSERT INTO `prescriptiontable` (`presc_no`, `pname`, `patient_id`, `age`, `sex`, `Rx`, `diagnosis`, `pdname`, `date`) VALUES

(7, 'abebeÂ Â kebede', 'ETR/720/05', 26, 'male', 'diclon', 'malariya', 'azmeÂ Â tam ', '2016-06-14');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `fname` varchar(22) NOT NULL,
  `lname` varchar(22) NOT NULL,
  `user_id` varchar(15) NOT NULL,
  `sex` varchar(6) NOT NULL,
  `age` varchar(15) NOT NULL,
  `mariage_status` varchar(12) NOT NULL,
  `address` varchar(22) NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `salary` int(10) NOT NULL,
  `email` varchar(22) NOT NULL,
  `user_type` varchar(22) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`fname`, `lname`, `user_id`, `sex`, `age`, `mariage_status`, `address`, `phone_no`, `salary`, `email`, `user_type`) VALUES



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
