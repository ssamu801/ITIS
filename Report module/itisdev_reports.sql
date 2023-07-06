-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2023 at 05:34 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itisdev`
--

-- --------------------------------------------------------

--
-- Table structure for table `dish`
--

CREATE TABLE `dish` (
  `dishID` int(11) NOT NULL,
  `dishName` varchar(45) NOT NULL,
  `price` float NOT NULL,
  `image` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dish`
--

INSERT INTO `dish` (`dishID`, `dishName`, `price`, `image`) VALUES
(1001, 'Spaghetti', 60, ''),
(1002, 'Pizza', 550, '');

-- --------------------------------------------------------

--
-- Table structure for table `expired`
--

CREATE TABLE `expired` (
  `expiredID` int(11) NOT NULL,
  `ingredientID` int(11) NOT NULL,
  `quantity` float NOT NULL,
  `expiredDate` datetime NOT NULL,
  `updatedBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expired`
--

INSERT INTO `expired` (`expiredID`, `ingredientID`, `quantity`, `expiredDate`, `updatedBy`) VALUES
(1, 2001, 2, '2023-06-12 00:00:00', NULL),
(2, 2002, 2, '2023-06-13 00:00:00', NULL),
(3, 2003, 1, '2023-06-14 00:00:00', NULL),
(4, 2004, 3, '2023-06-19 00:00:00', NULL),
(5, 2001, 4, '2023-06-13 00:00:00', NULL),
(6, 2002, 3, '2023-06-19 00:00:00', NULL),
(7, 2003, 2, '2023-06-12 00:00:00', NULL),
(8, 2004, 5, '2023-06-14 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ingredient`
--

CREATE TABLE `ingredient` (
  `ingredientID` int(11) NOT NULL,
  `ingredientName` varchar(45) NOT NULL,
  `quantity` float NOT NULL,
  `measurement` varchar(45) DEFAULT NULL,
  `updatedBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ingredient`
--

INSERT INTO `ingredient` (`ingredientID`, `ingredientName`, `quantity`, `measurement`, `updatedBy`) VALUES
(2001, 'Egg', 10, NULL, NULL),
(2002, 'Hotdog', 4, NULL, NULL),
(2003, 'Flour', 6, NULL, NULL),
(2004, 'Ketchup', 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `totalPrice` float NOT NULL,
  `creadtedBy` int(11) DEFAULT NULL,
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `totalPrice`, `creadtedBy`, `createdAt`) VALUES
(23, 120, NULL, '2023-06-12 00:00:00'),
(24, 550, NULL, '2023-06-12 00:00:00'),
(25, 610, NULL, '2023-06-13 00:00:00'),
(26, 120, NULL, '2023-06-13 00:00:00'),
(27, 1220, NULL, '2023-06-14 00:00:00'),
(28, 60, NULL, '2023-06-14 00:00:00'),
(29, 550, NULL, '2023-06-14 00:00:00'),
(30, 1650, NULL, '2023-06-19 15:58:44'),
(31, 1650, NULL, '2023-06-19 16:01:48'),
(32, 120, NULL, '2023-06-18 00:00:00'),
(33, 550, NULL, '2023-06-18 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `itemID` int(11) NOT NULL,
  `orderID` int(11) DEFAULT NULL,
  `dishID` int(11) DEFAULT NULL,
  `quantity` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`itemID`, `orderID`, `dishID`, `quantity`) VALUES
(3, 30, 1001, 2),
(4, 30, 1002, 3),
(5, 31, 1001, 2),
(6, 31, 1002, 3),
(7, 23, 1001, 2),
(8, 24, 1002, 1),
(9, 25, 1001, 1),
(10, 25, 1002, 1),
(11, 26, 1001, 2),
(12, 27, 1001, 2),
(13, 27, 1002, 2),
(14, 28, 1001, 1),
(15, 29, 1002, 1),
(16, 32, 1001, 2),
(17, 33, 1001, 1);

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
  `recipeID` int(11) NOT NULL,
  `dishID` int(11) NOT NULL,
  `ingredientID` int(11) NOT NULL,
  `quantity` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`recipeID`, `dishID`, `ingredientID`, `quantity`) VALUES
(3001, 1001, 2001, 1),
(3002, 1002, 2002, 1),
(3003, 1001, 2003, 1),
(3004, 1002, 2004, 1);

-- --------------------------------------------------------

--
-- Table structure for table `replenish`
--

CREATE TABLE `replenish` (
  `transactionID` int(11) NOT NULL,
  `ingredientID` int(11) NOT NULL,
  `quantity` float NOT NULL,
  `boughtDate` datetime NOT NULL,
  `createBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `replenish`
--

INSERT INTO `replenish` (`transactionID`, `ingredientID`, `quantity`, `boughtDate`, `createBy`) VALUES
(11, 2001, 4, '2023-06-12 00:00:00', NULL),
(12, 2002, 7, '2023-06-13 00:00:00', NULL),
(13, 2003, 3, '2023-06-13 00:00:00', NULL),
(14, 2004, 6, '2023-06-14 00:00:00', NULL),
(15, 2003, 8, '2023-06-14 00:00:00', NULL),
(16, 2001, 10, '2023-06-18 00:00:00', NULL),
(17, 2002, 10, '2023-06-18 00:00:00', NULL),
(19, 2004, 10, '2023-06-18 00:00:00', NULL),
(20, 2003, 10, '2023-06-18 00:00:00', NULL),
(21, 2001, 5, '2023-06-19 00:00:00', NULL),
(22, 2001, 5, '2023-06-19 00:00:00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dish`
--
ALTER TABLE `dish`
  ADD PRIMARY KEY (`dishID`),
  ADD UNIQUE KEY `dishID` (`dishID`);

--
-- Indexes for table `expired`
--
ALTER TABLE `expired`
  ADD PRIMARY KEY (`expiredID`),
  ADD KEY `fk_02` (`ingredientID`);

--
-- Indexes for table `ingredient`
--
ALTER TABLE `ingredient`
  ADD PRIMARY KEY (`ingredientID`),
  ADD UNIQUE KEY `ingredientID` (`ingredientID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD UNIQUE KEY `orderID` (`orderID`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`itemID`),
  ADD KEY `order_item_ibfk_1` (`orderID`),
  ADD KEY `order_item_ibfk_2` (`dishID`);

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`recipeID`),
  ADD UNIQUE KEY `recipeID` (`recipeID`,`dishID`,`ingredientID`),
  ADD KEY `fk01` (`ingredientID`),
  ADD KEY `fk02` (`dishID`);

--
-- Indexes for table `replenish`
--
ALTER TABLE `replenish`
  ADD PRIMARY KEY (`transactionID`),
  ADD UNIQUE KEY `transactionID` (`transactionID`),
  ADD KEY `fk_01` (`ingredientID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dish`
--
ALTER TABLE `dish`
  MODIFY `dishID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1003;

--
-- AUTO_INCREMENT for table `expired`
--
ALTER TABLE `expired`
  MODIFY `expiredID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ingredient`
--
ALTER TABLE `ingredient`
  MODIFY `ingredientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2005;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `itemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `recipeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3005;

--
-- AUTO_INCREMENT for table `replenish`
--
ALTER TABLE `replenish`
  MODIFY `transactionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `expired`
--
ALTER TABLE `expired`
  ADD CONSTRAINT `fk_02` FOREIGN KEY (`ingredientID`) REFERENCES `ingredient` (`ingredientID`);

--
-- Constraints for table `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `order_item_ibfk_1` FOREIGN KEY (`orderID`) REFERENCES `orders` (`orderID`),
  ADD CONSTRAINT `order_item_ibfk_2` FOREIGN KEY (`dishID`) REFERENCES `dish` (`dishID`);

--
-- Constraints for table `recipe`
--
ALTER TABLE `recipe`
  ADD CONSTRAINT `fk01` FOREIGN KEY (`ingredientID`) REFERENCES `ingredient` (`ingredientID`),
  ADD CONSTRAINT `fk02` FOREIGN KEY (`dishID`) REFERENCES `dish` (`dishID`);

--
-- Constraints for table `replenish`
--
ALTER TABLE `replenish`
  ADD CONSTRAINT `fk_01` FOREIGN KEY (`ingredientID`) REFERENCES `ingredient` (`ingredientID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
