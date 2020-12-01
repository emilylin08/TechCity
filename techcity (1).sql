-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2020 at 06:12 AM
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
  `EmailAddress` varchar(30) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Address` varchar(30) NOT NULL,
  `City` varchar(30) NOT NULL,
  `State` varchar(30) NOT NULL,
  `PostalCode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_ID`, `user_name`, `password`, `first_name`, `last_name`, `EmailAddress`, `Phone`, `Address`, `City`, `State`, `PostalCode`) VALUES
(1, 'username1', 'password1', 'Emily', 'Lin', 'emilylin08@gmail.com', '6265353361', 'address1', 'arcadia', 'california', '91007'),
(3, 'username2', 'password2', 'Diana', 'Hernandez', 'dianahernandez@gmail.com', '6262232323', 'address2', 'pomona', 'california', '91767'),
(4, 'username3', 'password3', 'Aleena', 'Salas', 'aleenasalas@gmail.com', '7144444444', 'address3', 'west covina', 'california', '91790'),
(5, 'username4', 'password4', 'Tin', 'Nguyen', 'tinnguyen@gmail.com', '7142222222', 'address4', 'alhambra', 'california', '91804'),
(6, 'username5', 'password5', 'Nico', 'Velasco', 'nicovelasco@gmail.com', '6264444444', 'address5', 'fullerton', 'california', '92831'),
(7, 'username6', 'password6', 'Claudio', 'Salazar', 'claudiosalazar@gmail.com', '3145555555', 'address5', 'fullerton', 'california', '92831'),
(8, 'ss', 'ss', '', '', '', '', '', '', '', ''),
(9, 'emilylin08', '17801Zl8895!', '', '', '', '', '', '', '', '');

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
(1, 'Macbook Pro 16', 'Laptop', 'Specifications: 16 inch (diagonal) LED backlit display with IPS technology. \r\nRefresh rates: 47.95Hz, 48.00Hz, 50.00Hz, 59.94Hz, 60.00Hz.\r\n2.6GHz 6 core Intel Core i7\r\n512GB SSD\r\n16GB of 2666MHz DDR4 \r\nAMD Radeon Pro 5300M\r\n', 5, '2149.00', 'https://i.imgur.com/Eyi7qbk.jpg', 5),
(2, 'Surface Pro 7', 'Tablet', 'Specifications: 12.3” touchscreen display\r\nQuad-core 10th Gen Intel® Core™ i5-1035G4 Processor\r\n512GB SSD\r\n8GB of LPDDR4x RAM\r\nIntel® Iris™ Plus Graphics\r\n', 10, '1318.63', 'https://i.imgur.com/E95DNBd.jpg', 4),
(3, 'Wacom Mobile Pro 16', 'Tablet', 'Specifications: 15.6 inch display\r\n6th generation Intel® Core™ processors\r\n512GB SSD\r\n16 GB DDR3\r\nNVIDIA® Quadro® M1000M 4GB GDDR5\r\n', 10, '3392.00', 'https://i.imgur.com/o8CqxI0.jpg', 3),
(4, 'Acer Aspire 5', 'Laptop', 'Specifications: 15.6 inch display\r\nAMD Ryzen 3 3200U Dual core\r\n128GB SSD\r\n4 GB DDR4\r\nAMD Radeon Vega 3\r\n', 5, '364.99', 'https://i.imgur.com/jexO9p2.jpg', 2),
(5, 'Lenovo IdeaPad3 14\"', 'Laptop', 'Specifications:14 inch display\r\nAMD Ryzen 5 3500U128GB SSD\r\n265GB SSD\r\n8 GB DDR4\r\nAMD Radeon Vega 8\r\n', 5, '423.81', 'https://i.imgur.com/Zuj59r2.jpg', 6),
(6, '15 inch display\r\nIntel i5-1035G1265GB SSD\r\n512GB S', 'Laptop', 'Specifications: 15 inch display\r\nIntel i5-1035G1265GB SSD\r\n512GB SSD\r\n8 GB DDR4\r\nIntel UHD Graphics\r\n', 10, '597.50', 'https://i.imgur.com/b47prqw.jpg', 10);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
