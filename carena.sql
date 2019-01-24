-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2018 at 05:01 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carena`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `message_id` int(11) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `message` longtext NOT NULL,
  `status` int(1) DEFAULT '0',
  `date_added` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`message_id`, `uname`, `email`, `phone`, `subject`, `message`, `status`, `date_added`) VALUES
(1, 'raihan', 'raihantanvir.96@gmail.com', '+8801832803540', 'Repair/Maintenance', 'test', 0, '2018-08-08 19:41:17'),
(2, 'raihan', 'raihantanvir.96@gmail.com', '+8801832803540', 'Repair/Maintenance', 'test..........', 0, '2018-08-08 19:41:17'),
(3, 'Ami', 'admin@x.to', '01521325800', 'Repair/Maintenance', 'ljasfhahfhqapf;sa', 0, '2018-08-08 19:41:17'),
(4, 'Ami', 'admin@x.to', '01521325800', 'Others', 'ljasfhahfhqapf;sa', 0, '2018-08-08 19:41:17'),
(5, 'raihan', 'admin@gmail.com', '01832803540', 'Purchasing a car', 'asvmaoskf', 0, '2018-08-08 19:41:17'),
(7, 'raihan', 'admin@gmail.com', '01832803540', 'Purchasing a car', 'asvmaoskf', 0, '2018-08-08 19:41:17'),
(8, 'raihan', 'admin@gmail.com', '01832803540', 'Purchasing a car', 'asvmaoskf', 0, '2018-08-08 19:41:17'),
(9, 'raihan', 'admin@gmail.com', '01832803540', 'Purchasing a car', 'asvmaoskf', 0, '2018-08-08 19:41:17'),
(10, 'raihan', 'raihantanvir.96@gmail.com', '01832803540', '...', 'poasfpasl', 0, '2018-08-08 19:41:17'),
(11, '', 'raihantanvir.96@gmail.com', '+8801832803540', 'Purchasing a car', 'hello', 0, '2018-08-08 19:41:17'),
(12, 'Raihan Tanvir', 'raihantanvir.96@gmail.com', '+8801832803540', 'Purchasing a car', 'hello', 0, '2018-08-08 19:41:17'),
(13, 'Raihan Tanvir', 'raihantanvir.96@gmail.com', '01832803540', 'Purchasing a car', 'sdaojgoliha ;kas;jfag\r\n\'[', 0, '2018-08-08 19:41:17'),
(14, 'ami ami', 'raihantanvir.96@gmail.com', '01832803540', 'Purchasing a car', '             ', 0, '2018-08-08 19:41:17'),
(15, 'ami ami', 'raihantanvir.96@gmail.com', '01832803540', 'Purchasing a car', '             ', 0, '2018-08-08 19:41:17'),
(16, 'ami ami', 'raihantanvir.96@gmail.com', '01832803540', 'Purchasing a car', '             ', 0, '2018-08-08 19:41:17'),
(17, 'ami ami', 'raihantanvir.96@gmail.com', '01832803540', 'Purchasing a car', '             ', 0, '2018-08-08 19:41:17'),
(18, 'ami ami', 'admin@gmail.com', '01832803540', 'Purchasing a car', '                 ', 0, '2018-08-08 19:41:17'),
(19, 'ami ami', 'admin@gmail.com', '01832803540', 'Purchasing a car', '                 ', 0, '2018-08-08 19:41:17'),
(20, 'ami ami', 'admin@gmail.com', '01832803540', 'Purchasing a car', '                 ', 0, '2018-08-08 19:41:17'),
(21, 'ami ra', 'raihantanvir.96@gmail.com', '01832803540', 'Purchasing a car', '            ', 0, '2018-08-08 19:41:17'),
(22, 'Raihan Tanvir', 'raihantanvir.96@gmail.com', '01832803540', 'Purchasing a car', ' ', 0, '2018-08-08 19:41:17'),
(23, 'Raihan Tanvir', 'raihantanvir.96@gmail.com', '01832803540', 'Purchasing a car', ' ', 0, '2018-08-08 19:41:17'),
(24, 'jhon smith', 'john@gmail.com', '01832803540', 'Others', 'hjsgldsja ', 1, '2018-08-08 20:33:33'),
(25, 'BRUCE OWEN', 'bruce@xmail.com', '+8801832803540', 'Repair/Maintenance', 'ssssssssssssssssssssssssssssssssssssssssssssssss', 1, '2018-08-08 20:44:06'),
(26, 'BRUCE OWEN', 'bruce@xmail.com', '+8801832803540', 'Repair/Maintenance', 'ssssssssssssssssssssssssssssssssssssssssssssssss', 0, '2018-08-08 20:46:28'),
(27, 'AMI  AMI', 'raihantanvir.96@gmail.com', '01832803540', 'Purchasing a car', 'ssfsf', 0, '2018-08-09 09:47:11'),
(28, 'RAIHAN TANVIR', 'raihantanvir.96@gmail.com', '01832803540', 'Repair/Maintenance', 'sfasf', 0, '2018-08-09 09:48:16'),
(29, 'PETER PARKER', 'parker@aust.edu', '+8801832803540', 'Others', 'jafap;k safan;', 0, '2018-08-09 09:49:57'),
(30, 'PETER PARKER', 'parker@aust.edu', '+8801832803540', 'Others', 'jafap;k safan;', 0, '2018-08-09 09:50:27'),
(31, 'PETER PARKER', 'parker@aust.edu', '+8801832803540', 'Others', 'jafap;k safan;', 1, '2018-08-09 09:50:52'),
(32, 'PETER PARKER', 'parker@aust.edu', '+8801832803540', 'Others', 'jafap;k safan;', 1, '2018-08-09 09:51:17'),
(33, 'AMI AMI', 'ami@xa.to', '01800321440', 'Others', 'asfasfasgfas asfasfa asgfh gj fzxvm', 1, '2018-09-23 13:28:17');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `maker` varchar(20) NOT NULL,
  `model` varchar(30) NOT NULL,
  `price` int(11) NOT NULL,
  `body_type` varchar(20) NOT NULL,
  `year_mfg` year(4) NOT NULL,
  `capacity` int(2) DEFAULT NULL,
  `color` varchar(10) DEFAULT NULL,
  `transmission` varchar(30) DEFAULT NULL,
  `engine` varchar(30) DEFAULT NULL,
  `fuel` varchar(30) DEFAULT NULL,
  `mileage` int(5) DEFAULT NULL,
  `image` text,
  `status` int(1) DEFAULT NULL,
  `car_desc` longtext,
  `privacy` int(1) NOT NULL DEFAULT '0',
  `featured` int(1) NOT NULL DEFAULT '0',
  `added_by` varchar(25) NOT NULL,
  `updated_by` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `maker`, `model`, `price`, `body_type`, `year_mfg`, `capacity`, `color`, `transmission`, `engine`, `fuel`, `mileage`, `image`, `status`, `car_desc`, `privacy`, `featured`, `added_by`, `updated_by`) VALUES
(3, 'BMW', 'i3', 9000000, 'SUV', 2007, 2, '#000000', 'Semi-Automatic', 'STRAIGHT', 'Petrol', 18000, 'images/BMW-i3-6095_9.jpg', 1, 'The new Bugatti Chiron Sport comes with a number of improvements to the chassis, but the engine remains the same as the Chiron.', 0, 0, 'admin@gmail.com', ''),
(4, 'BMW', 'F-45', 8000000, 'SUV', 2005, 2, '#ff0000', 'Semi-Automatic', 'VEE', 'Petrol', 18000, 'images/BMW-F-45.jpg', 1, 'The new Bugatti Chiron Sport comes with a number of improvements to the chassis, but the engine remains the same as the Chiron.', 0, 0, 'admin@gmail.com', ''),
(5, 'FERRARI', 'F-1250 DELUX', 90000000, 'SPORTS', 2017, 2, '#ffff80', 'Semi-Automatic', 'VEE', 'Petrol', 19000, 'images/FERRARI-F12tdf-5677_9.jpg', 1, 'The new Bugatti Chiron Sport comes with a number of improvements to the chassis, but the engine remains the same as the Chiron.', 0, 0, 'admin@gmail.com', ''),
(6, 'LAMBORGINI', 'AVENDETOR', 900000000, 'SPORTS', 2006, 4, '#ffff80', 'Automatic', 'STRAIGHT', 'Octane', 20000, 'images/LAMBORGHINI-Aventador-S-5854_4.jpg', 1, 'The new Bugatti Chiron Sport comes with a number of improvements to the chassis, but the engine remains the same as the Chiron.', 0, 0, 'admin@gmail.com', ''),
(7, 'NISSAN', 'SPRINTER', 20000000, 'SUV', 2006, 4, '#c0c0c0', 'Automatic', 'VEE', 'Octane', 16000, 'images/toyotaPrius.jpg', 1, 'The new Bugatti Chiron Sport comes with a number of improvements to the chassis, but the engine remains the same as the Chiron.', 0, 0, 'admin@gmail.com', ''),
(8, 'RENAULT', 'R-007', 40000000, 'SUV', 2002, 4, '#c0c0c0', 'Automatic', 'VEE', 'Octane', 16000, 'images/ASTON-MARTIN-Vantage-6179_10.jpg', 1, 'The new Bugatti Chiron Sport comes with a number of improvements to the chassis, but the engine remains the same as the Chiron.', 0, 0, 'admin@gmail.com', ''),
(10, 'NISSAN', 'SPRINTER', 20000000, 'SUV', 2006, 4, '#c0c0c0', 'Automatic', 'VEE', 'Octane', 16000, 'images/toyotaPrius.jpg', 1, 'The new Bugatti Chiron Sport comes with a number of improvements to the chassis, but the engine remains the same as the Chiron.', 0, 0, 'admin@gmail.com', ''),
(11, 'LAMBORGINI', 'AVENDETOR ', 900000000, 'SPORTS', 2006, 4, '#ffff80', 'Automatic', 'STRAIGHT', 'Octane', 20000, 'images/LAMBORGHINI-Aventador-S-5854_4.jpg', 1, 'The new Bugatti Chiron Sport comes with a number of improvements to the chassis, but the engine remains the same as the Chiron.', 0, 0, 'admin@gmail.com', ''),
(12, 'FERRARI', 'F-1250 DELUX', 90000000, 'SPORTS', 2017, 2, '#ffff80', 'Semi-Automatic', 'VEE', 'Petrol', 19000, 'images/FERRARI-F12tdf-5677_9.jpg', 1, 'The new Bugatti Chiron Sport comes with a number of improvements to the chassis, but the engine remains the same as the Chiron.', 1, 0, 'admin@gmail.com', ''),
(13, 'BMW', 'F-45', 8000000, 'SUV', 2005, 2, '#ff0000', 'Semi-Automatic', 'VEE', 'Petrol', 18000, 'images/BMW-F-45.jpg', 1, 'The new Bugatti Chiron Sport comes with a number of improvements to the chassis, but the engine remains the same as the Chiron.', 0, 0, 'admin@gmail.com', ''),
(14, 'BMW', 'i3', 9000000, 'SUV', 2007, 2, '#000000', 'Semi-Automatic', 'STRAIGHT', 'Petrol', 18000, 'images/BMW-i3-6095_9.jpg', 1, 'The new Bugatti Chiron Sport comes with a number of improvements to the chassis, but the engine remains the same as the Chiron.', 0, 0, 'admin@gmail.com', ''),
(16, 'AUDI', 'A7.0', 1000000, 'SUV', 2018, 2, '#c7c7c7', 'Automatic', 'ROTARY', 'Petrol', 16000, 'images/audiA7.jpg', 1, 'The new Bugatti Chiron Sport comes with a number of improvements to the chassis, but the engine remains the same as the Chiron.', 0, 1, 'admin@gmail.com', 'admin@gmail.com'),
(17, 'McCLAREN', 'M-9', 40000000, 'SPORTS', 2018, 2, '#004080', 'Automatic', 'VEE', 'Octane', 16000, 'images/MCLAREN-650S-5108_2.jpg', 1, 'The new Bugatti Chiron Sport comes with a number of improvements to the chassis, but the engine remains the same as the Chiron.', 0, 0, 'admin@gmail.com', ''),
(18, 'BUGATI', 'X25', 60000000, 'SPORTS', 2018, 2, '#808080', 'Automatic', 'VEE', 'Octane', 16000, 'images/audiTronE8.jpg', 1, 'The new Bugatti Chiron Sport comes with a number of improvements to the chassis, but the engine remains the same as the Chiron.', 1, 0, 'admin@gmail.com', ''),
(19, 'JAGUAR', 'J660', 70000000, 'SUV', 2018, 2, '#808080', 'Automatic', 'STRAIGHT', 'Octane', 19000, 'images/JAGUAR-F-Type-SVR-Coupe-5877_7.jpg', 1, 'The new Bugatti Chiron Sport comes with a number of improvements to the chassis, but the engine remains the same as the Chiron.', 0, 0, 'admin@gmail.com', ''),
(20, 'JAGUAR', 'J660', 70000000, 'SUV', 2018, 2, '#808080', 'Automatic', 'STRAIGHT', 'Octane', 19000, 'images/JAGUAR-F-Type-SVR-Coupe-5877_7.jpg', 1, 'The new Bugatti Chiron Sport comes with a number of improvements to the chassis, but the engine remains the same as the Chiron.', 0, 0, 'admin@gmail.com', ''),
(21, 'BUGATI', 'X25', 60000000, 'SPORTS', 2018, 2, '#808080', 'Automatic', 'VEE', 'Octane', 16000, 'images/audiTronE8.jpg', 1, 'The new Bugatti Chiron Sport comes with a number of improvements to the chassis, but the engine remains the same as the Chiron.', 1, 0, 'admin@gmail.com', ''),
(22, 'McCLAREN', 'M-9', 40000000, 'SPORTS', 2018, 2, '#004080', 'Automatic', 'VEE', 'Octane', 16000, 'images/MCLAREN-650S-5108_2.jpg', 1, 'The new Bugatti Chiron Sport comes with a number of improvements to the chassis, but the engine remains the same as the Chiron.', 0, 0, 'admin@gmail.com', ''),
(23, 'AUDI', 'A7', 1000000, 'SUV', 2018, 2, '#c7c7c7', 'Automatic', 'ROTARY', 'Petrol', 16000, 'images/audiA7.jpg', 1, 'The new Bugatti Chiron Sport comes with a number of improvements to the chassis, but the engine remains the same as the Chiron.', 0, 0, 'admin@gmail.com', ''),
(24, 'AUDI', 'R8', 1000000, 'SUV', 2018, 2, '#4dba41', 'Automatic', 'BOXER', 'Petrol', 18000, 'images/audiR8.jpg', 1, 'The new Bugatti Chiron Sport comes with a number of improvements to the chassis, but the engine remains the same as the Chiron.', 0, 0, 'admin@gmail.com', ''),
(25, 'TOYOTA', 'PIRON P-7581', 1000000, 'SUV', 2018, 2, '#c7c7c7', 'Automatic', 'ROTARY', 'Petrol', 16000, 'images/audiA7.jpg', 0, 'The new Bugatti Chiron Sport comes with a number of improvements to the chassis, but the engine remains the same as the Chiron.', 1, 1, 'admin@gmail.com', ''),
(26, 'AUDI', 'R8', 1000000, 'SUV', 2018, 2, '#4dba41', 'Automatic', 'BOXER', 'Petrol', 18000, 'images/audiR8.jpg', 1, 'The new Bugatti Chiron Sport comes with a number of improvements to the chassis, but the engine remains the same as the Chiron.', 0, 0, 'admin@gmail.com', ''),
(27, 'FERRARI', 'F-1250 DELUX', 90000000, 'SPORTS', 2017, 2, '#ffff80', 'Semi-Automatic', 'VEE', 'Petrol', 19000, 'images/FERRARI-F12tdf-5677_9.jpg', 1, 'The new Bugatti Chiron Sport comes with a number of improvements to the chassis, but the engine remains the same as the Chiron.', 1, 0, 'admin@gmail.com', ''),
(28, 'RENAULT', 'R-007', 40000000, 'SUV', 2002, 4, '#c0c0c0', 'Automatic', 'VEE', 'Octane', 16000, 'images/ASTON-MARTIN-Vantage-6179_10.jpg', 1, 'The new Bugatti Chiron Sport comes with a number of improvements to the chassis, but the engine remains the same as the Chiron.', 1, 0, 'admin@gmail.com', ''),
(29, 'LAMBORGINI', 'AVENDETOR', 900000000, 'SPORTS', 2006, 4, '#ffff80', 'Automatic', 'STRAIGHT', 'Octane', 20000, 'images/LAMBORGHINI-Aventador-S-5854_4.jpg', 1, 'The new Bugatti Chiron Sport comes with a number of improvements to the chassis, but the engine remains the same as the Chiron.', 0, 0, 'admin@gmail.com', ''),
(30, 'FERRARI', 'F-1250 DELUX', 90000000, 'SPORTS', 2017, 2, '#ffff80', 'Semi-Automatic', 'VEE', 'Petrol', 19000, 'images/FERRARI-F12tdf-5677_9.jpg', 1, 'The new Bugatti Chiron Sport comes with a number of improvements to the chassis, but the engine remains the same as the Chiron.', 1, 1, 'admin@gmail.com', ''),
(31, 'BMW', 'i3', 9000000, 'SUV', 2007, 2, '#000000', 'Semi-Automatic', 'STRAIGHT', 'Petrol', 18000, 'images/BMW-i3-6095_9.jpg', 1, 'The new Bugatti Chiron Sport comes with a number of improvements to the chassis, but the engine remains the same as the Chiron.', 0, 0, 'admin@gmail.com', ''),
(32, 'TOYOTA', 'ASPIRON-6283', 2500000, 'HATCHBACK', 2017, 4, '#f5f5f5', 'AUTOMATIC', 'STRAIGHT', 'Petrol', 20000, 'images/TOYOTA-HATCHBACK-6287_5.jpg', 1, 'The new Bugatti Chiron Sport comes with a number of improvements to the chassis, but the engine remains the same as the Chiron.', 0, 0, 'admin@gmail.com', ''),
(33, 'TESLA', 'S-5659', 5500000, 'SUV', 2018, 2, '#cd0000', 'AUTOMATIC', 'VEE', 'Octane', 160000, 'images/TESLA-MOTORS-Model-S-5659_3.jpeg', 1, 'The new Bugatti Chiron Sport comes with a number of improvements to the chassis, but the engine remains the same as the Chiron.', 1, 1, 'admin@gmail.com', ''),
(34, 'TOYOTA', 'RAV-4', 2500000, 'SEDAN', 2014, 6, '#000000', 'Automatic', 'STRAIGHT', 'Petrol', 1800, 'images/TOYOTA-Rav4-6293_3.jpg', 1, 'The new Bugatti Chiron Sport comes with a number of improvements to the chassis, but the engine remains the same as the Chiron.', 0, 0, 'admin@gmail.com', ''),
(35, 'TOYOTA', 'HILUX H-1234', 2000000, 'SEDAN', 2017, 2, '#0000ff', 'Automated Manual', 'ROTARY', 'Octane', 1600, 'images/TOYOTA-Hilux-Extra-Cab-5683_5.jpg', 1, 'The new Bugatti Chiron Sport comes with a number of improvements to the chassis, but the engine remains the same as the Chiron.', 0, 0, 'admin@gmail.com', ''),
(36, 'FORD', 'EDGE-2651', 2000000, 'MPV', 2014, 4, '#f4f4f4', 'Automated Manual', 'STRAIGHT', 'Petrol', 1600, 'images/FIAT-Double-Cab-6365_5.jpg', 1, 'The new Bugatti Chiron Sport comes with a number of improvements to the chassis, but the engine remains the same as the Chiron.', 0, 0, 'admin@gmail.com', ''),
(37, 'McCLAREN', 'M-12S1', 50000000, 'SPORTS', 2018, 2, '#4e81e0', 'Automatic', 'VEE', 'Petrol', 1600, 'images/MCLAREN-650S-5108_4.jpg', 1, 'The new Bugatti Chiron Sport comes with a number of improvements to the chassis, but the engine remains the same as the Chiron.', 1, 1, 'admin@gmail.com', ''),
(38, 'FORD', 'FUSION 1234', 2000000, 'SEDAN', 2016, 4, '#c0c0c0', 'Manual', 'INLINE', 'Octane', 2000, 'images/FORD-Fusion-6328_3.jpg', 1, 'The new Bugatti Chiron Sport comes with a number of improvements to the chassis, but the engine remains the same as the Chiron.', 0, 0, 'admin@gmail.com', ''),
(39, 'JEEP', 'JEEP-01203', 1400000, 'JEEP', 2014, 4, '#000040', 'Manual', 'ROTARY', 'Diesel', 1600, 'images/carpixel.net-2014-jeep-wrangler-level-red-concept-20896-hd.jpg', 1, 'The new Bugatti Chiron Sport comes with a number of improvements to the chassis, but the engine remains the same as the Chiron.', 0, 0, 'admin@gmail.com', ''),
(40, 'McCLAREN', 'L-1256', 40000000, 'SPORTS', 2017, 2, '#000000', 'Automatic', 'INLINE', 'Petrol', 1600, 'images/carpixel.net-2018-mclaren-600lt-78626-hd.jpg', 1, 'The new Bugatti Chiron Sport comes with a number of improvements to the chassis, but the engine remains the same as the Chiron.', 1, 1, 'admin@gmail.com', ''),
(41, 'TOYOTA', 'CENTURY-1244', 1200000, 'SEDAN', 2012, 4, '#000000', 'Manual', 'VEE', 'Petrol', 1600, 'images/carpixel.net-2018-toyota-century-78745-hd.jpg', 1, 'The new Bugatti Chiron Sport comes with a number of improvements to the chassis, but the engine remains the same as the Chiron.', 0, 0, 'admin@gmail.com', ''),
(42, 'VOLKSWAGON', 'V 3.1', 1500000, 'SUV', 2014, 2, '#c0c0c0', 'Automatic', 'VEE', 'Petrol', 2000, 'images/carpixel.net-2015-mclaren-p1-by-mso-inspired-by-alain-prost-us-29925-hd.jpg', 1, 'The new Bugatti Chiron Sport comes with a number of improvements to the chassis, but the engine remains the same as the Chiron.', 0, 0, 'admin@gmail.com', ''),
(43, 'BMW', 'BLA BLA', 2000000, 'SEDAN', 2018, 4, '#ffff00', 'Automatic', 'VEE', 'Petrol', 2000, 'images/carpixel.net-2013-mclaren-p1-46739-hd.jpg', 1, 'asajflsaojfas', 0, 0, 'admin@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `gender` int(1) DEFAULT NULL,
  `image` text,
  `phone` varchar(25) DEFAULT NULL,
  `activation_code` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT '0',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_type` varchar(8) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `password`, `firstname`, `lastname`, `gender`, `image`, `phone`, `activation_code`, `status`, `created_date`, `user_type`) VALUES
(1, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Raihan', 'Tanvir', NULL, NULL, '01832803540', NULL, 1, '2018-07-26 23:23:17', '0'),
(2, 'raihantanvir.96@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Raihan', 'Tanvir', NULL, NULL, '+8801832803540', NULL, 1, '2018-07-27 01:12:34', '0'),
(3, 'raihantanvir007@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Raihan', 'Tanvir', NULL, NULL, '01800000018', NULL, 1, '2018-07-27 01:14:20', '1'),
(4, 'admin@x.to', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin', NULL, NULL, '01521325800', NULL, 1, '2018-07-27 01:16:31', '1'),
(5, 'x@g.ty', 'bf4b35e6666b7a18e9044808a9186512', 's', 's', NULL, NULL, '01832803500', NULL, 1, '2018-07-27 01:19:33', '1'),
(6, 'raihantanvir@yahoo.com', '005f47cddf568dacb8d03e20ba682cf9', 'Rayhan', 'Tanvir', NULL, NULL, '01832803540', 1, 1, '2018-08-04 23:46:02', '1'),
(7, 'amiamai@x.co', '005f47cddf568dacb8d03e20ba682cf9', 'ami', 'ami', NULL, NULL, '01832803540', NULL, 1, '2018-08-04 23:49:55', '1'),
(8, 'hello@hello.com', '005f47cddf568dacb8d03e20ba682cf9', 'hello', 'hello', NULL, NULL, '01832803540', NULL, 1, '2018-08-04 23:52:56', '1'),
(9, 'raihantanvir@aust.edu', 'dc483e80a7a0bd9ef71d8cf973673924', 'Raihan', 'Tanvir', NULL, NULL, '+8801832803540', NULL, 0, '2018-08-05 21:08:31', '1'),
(10, 'parker@aust.edu', '005f47cddf568dacb8d03e20ba682cf9', 'Peter ', 'Perker', NULL, NULL, '01832803540', NULL, 0, '2018-08-05 22:59:01', '1'),
(11, 'hello@gmail.com', '005f47cddf568dacb8d03e20ba682cf9', 'hello', 'hello', NULL, NULL, '01832803540', NULL, 0, '2018-08-05 23:04:40', '1'),
(12, 'rand@xmail.to', 'dc483e80a7a0bd9ef71d8cf973673924', 'Danny', 'Rand', NULL, NULL, '01800321440', NULL, 0, '2018-09-22 22:11:12', '1'),
(13, 'matt@xmail.to', 'dc483e80a7a0bd9ef71d8cf973673924', 'Matt', 'Murdock', NULL, NULL, '01521325800', NULL, 0, '2018-09-22 22:12:09', '1'),
(14, 'rayhaan@aust.edu', 'dc483e80a7a0bd9ef71d8cf973673924', 'Raihan', 'Tanvir', NULL, NULL, '01832803440', NULL, 0, '2018-09-22 22:21:25', '1'),
(15, 'tanvir@aust.edu', 'dc483e80a7a0bd9ef71d8cf973673924', 'Ethan', 'Hunt', NULL, NULL, '+8801832803540', NULL, 0, '2018-09-23 00:26:07', '0'),
(16, 'werner@aust.edu', 'dc483e80a7a0bd9ef71d8cf973673924', 'Timo', 'Werner', NULL, NULL, '01521325800', NULL, 0, '2018-09-23 00:28:27', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
