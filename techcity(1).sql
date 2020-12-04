-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 04, 2020 at 11:41 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `techcity`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_ID` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email_address` varchar(30) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Address` varchar(30) NOT NULL,
  `City` varchar(30) NOT NULL,
  `State` varchar(30) NOT NULL,
  `postal_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_ID`, `user_name`, `password`, `first_name`, `last_name`, `email_address`, `Phone`, `Address`, `City`, `State`, `postal_code`) VALUES
(1, 'username1', 'password1', 'Emily', 'Lin', 'emilylin08@gmail.com', '6265353361', 'address1', 'arcadia', 'california', '91007'),
(2, 'username2', 'password2', 'Diana', 'Hernandez', 'dianahernandez@gmail.com', '6262232323', 'address2', 'pomona', 'california', '91767'),
(3, 'username3', 'password3', 'Aleena', 'Salas', 'aleenasalas@gmail.com', '7144444444', 'address3', 'west covina', 'california', '91790'),
(4, 'username4', 'password4', 'Tin', 'Nguyen', 'tinnguyen@gmail.com', '7142222222', 'address4', 'alhambra', 'california', '91804'),
(5, 'username5', 'password5', 'Nico', 'Velasco', 'nicovelasco@gmail.com', '6264444444', 'address5', 'fullerton', 'california', '92831'),
(6, 'username6', 'password6', 'Claudio', 'Salazar', 'claudiosalazar@gmail.com', '3145555555', 'address5', 'fullerton', 'california', '92831');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `ProductID` int(11) NOT NULL,
  `ProductName` varchar(50) NOT NULL,
  `ProductType` varchar(20) NOT NULL,
  `ProductDescription` varchar(300) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Cost` decimal(10,2) NOT NULL,
  `ProductImage` varchar(100) NOT NULL,
  `Quantity_Sold` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`ProductID`, `ProductName`, `ProductType`, `ProductDescription`, `Quantity`, `Cost`, `ProductImage`, `Quantity_Sold`) VALUES
(1, 'Macbook Pro 16', 'Laptop', 'Macbook Pro specifications', 5, '2149.00', 'https://i.imgur.com/Eyi7qbk.jpg', 5),
(2, 'Surface Pro 7', 'Tablet', 'Surfacepro specifications', 10, '1318.63', 'https://i.imgur.com/E95DNBd.jpg', 4),
(3, 'Wacom Mobile Pro 16', 'Tablet', 'Wacom mobile specifications', 10, '3392.00', 'https://i.imgur.com/o8CqxI0.jpg', 3),
(4, 'Acer Aspire 5', 'Laptop', 'Acer Aspire 5 Slim specifications', 5, '364.99', 'https://i.imgur.com/jexO9p2.jpg', 2),
(5, 'Lenovo IdeaPad3 14\"', 'Laptop', 'Lenovo specifications', 5, '423.81', 'https://i.imgur.com/Zuj59r2.jpg', 6),
(6, 'HP 15-dy1035nr', 'Laptop', 'HP specifications', 10, '597.50', 'https://i.imgur.com/b47prqw.jpg', 10);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(11) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Cost` decimal(10,2) NOT NULL,
  `OrderDate` date NOT NULL,
  `OrderStatus` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `CustomerID`, `ProductID`, `Cost`, `OrderDate`, `OrderStatus`) VALUES
(1, 1, 4, '365.00', '2020-12-01', 'Delivered'),
(2, 1, 2, '1319.00', '2020-11-30', 'Cancelled'),
(3, 4, 4, '365.00', '2020-11-28', 'In progress'),
(4, 3, 5, '424.00', '2020-11-15', 'Cancelled'),
(6, 0, 5, '424.00', '2020-12-03', 'In Progress'),
(7, 0, 5, '424.00', '2020-12-03', 'In Progress'),
(8, 12, 4, '365.00', '2020-12-03', 'In Progress'),
(9, 12, 6, '5975.00', '2020-12-03', 'In Progress'),
(13, 12, 6, '5975.00', '2020-12-03', 'In Progress'),
(14, 12, 1, '2149.00', '2020-12-03', 'In Progress'),
(15, 0, 5, '423.81', '2020-12-03', 'In Progress'),
(19, 0, 0, '0.00', '2020-12-03', 'In Progress'),
(20, 0, 0, '0.00', '2020-12-04', 'In Progress'),
(21, 0, 0, '0.00', '2020-12-04', 'In Progress'),
(22, 0, 0, '1318.63', '2020-12-04', 'In Progress'),
(23, 0, 0, '1318.63', '2020-12-04', 'In Progress'),
(24, 0, 0, '1318.63', '2020-12-04', 'In Progress');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `ReviewID` int(11) NOT NULL,
  `Customer_ID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `ReviewDate` date NOT NULL,
  `ReviewTime` time NOT NULL,
  `ReviewContent` varchar(100) DEFAULT NULL,
  `ReviewRating` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`ReviewID`, `Customer_ID`, `ProductID`, `ReviewDate`, `ReviewTime`, `ReviewContent`, `ReviewRating`) VALUES
(1, 1, 2, '2020-12-01', '10:28:22', 'Awesome Product!', '5'),
(2, 3, 2, '2020-11-25', '14:37:36', 'Product kept on blue screening!', '1'),
(3, 5, 2, '2020-12-02', '11:10:20', 'Cheap and affordable', '4'),
(4, 4, 2, '2020-11-28', '12:00:00', 'Met my needs for class', '5'),
(5, 1, 1, '2020-12-09', '11:40:00', 'I would give this a 0 if I could.', '1'),
(6, 2, 1, '2020-11-30', '23:38:31', 'Great!', '5'),
(7, 3, 1, '2020-12-25', '05:41:37', 'Alright for the price', '4'),
(8, 4, 1, '2020-11-27', '13:23:37', 'You get what you expect', '2'),
(9, 1, 3, '2020-11-27', '20:39:27', 'DO NOT BUY', '1'),
(10, 3, 3, '2020-11-10', '13:21:40', 'Cheaply made', '1'),
(11, 4, 3, '2020-12-14', '14:09:38', 'Works well', '4'),
(12, 5, 3, '2020-11-22', '22:24:50', 'Works fine', '4'),
(13, 6, 3, '2020-11-11', '13:13:00', 'so-so', '3'),
(14, 1, 3, '2020-11-28', '10:00:41', 'Flimsy screen', '3'),
(15, 2, 4, '2020-11-04', '14:27:18', 'Wonderful!', '5'),
(16, 3, 4, '2020-11-13', '11:59:39', 'Apple rocks!', '5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_ID`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`ReviewID`),
  ADD KEY `Customer_ID` (`Customer_ID`),
  ADD KEY `Customer_ID_2` (`Customer_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `ReviewID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
