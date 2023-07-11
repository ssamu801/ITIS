-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2023 at 04:58 PM
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
-- Database: `itisdev_db`
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
(2001, 'Egg', 20, NULL, NULL),
(2002, 'Hotdog', 20, NULL, NULL),
(2003, 'Flour', 20, NULL, NULL),
(2004, 'Ketchup', 20, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ingredient_transaction`
--

CREATE TABLE `ingredient_transaction` (
  `transactionID` int(11) NOT NULL,
  `ingredientID` int(11) NOT NULL,
  `quantity` float NOT NULL,
  `boughtDate` date NOT NULL,
  `createdAt` datetime NOT NULL,
  `createBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ingredient_transaction`
--

INSERT INTO `ingredient_transaction` (`transactionID`, `ingredientID`, `quantity`, `boughtDate`, `createdAt`, `createBy`) VALUES
(11, 2001, 4, '2023-06-12', '2023-06-19 13:59:14', NULL),
(12, 2002, 7, '2023-06-13', '2023-06-19 13:59:14', NULL),
(13, 2003, 3, '2023-06-13', '2023-06-19 13:59:14', NULL),
(14, 2004, 6, '2023-06-14', '2023-06-19 13:59:14', NULL),
(15, 2003, 8, '2023-06-14', '2023-06-19 13:59:14', NULL),
(16, 2001, 10, '2023-06-18', '2023-06-19 13:58:33', NULL),
(17, 2002, 10, '2023-06-18', '2023-06-19 13:58:45', NULL),
(18, 2002, 10, '2023-06-18', '2023-06-19 13:58:54', NULL),
(19, 2004, 10, '2023-06-18', '2023-06-19 13:59:05', NULL),
(20, 2003, 10, '2023-06-18', '2023-06-19 13:59:14', NULL);

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
(4001, 120, 1, '2023-06-12 00:00:00'),
(4002, 550, 1, '2023-06-12 00:00:00'),
(4003, 610, 1, '2023-06-13 00:00:00'),
(4004, 120, 1, '2023-06-13 00:00:00'),
(4005, 1220, 1, '2023-06-14 00:00:00'),
(4006, 60, 1, '2023-06-14 00:00:00'),
(4007, 550, 1, '2023-06-14 00:00:00');

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
(5001, 4001, 1001, 2),
(5002, 4002, 1002, 1),
(5003, 4003, 1001, 1),
(5004, 4003, 1002, 1),
(5005, 4004, 1001, 2),
(5006, 4005, 1001, 1),
(5007, 4005, 1002, 1),
(5008, 4006, 1001, 1),
(5009, 4007, 1002, 1);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `role`) VALUES
(1, 'invcontroller1', 'password', 'invcontroller'),
(2, 'owner', 'password', 'owner');

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
-- Indexes for table `ingredient`
--
ALTER TABLE `ingredient`
  ADD PRIMARY KEY (`ingredientID`),
  ADD UNIQUE KEY `ingredientID` (`ingredientID`);

--
-- Indexes for table `ingredient_transaction`
--
ALTER TABLE `ingredient_transaction`
  ADD PRIMARY KEY (`transactionID`),
  ADD UNIQUE KEY `transactionID` (`transactionID`),
  ADD KEY `fk_01` (`ingredientID`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dish`
--
ALTER TABLE `dish`
  MODIFY `dishID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1003;

--
-- AUTO_INCREMENT for table `ingredient`
--
ALTER TABLE `ingredient`
  MODIFY `ingredientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2005;

--
-- AUTO_INCREMENT for table `ingredient_transaction`
--
ALTER TABLE `ingredient_transaction`
  MODIFY `transactionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4008;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `itemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5010;

--
-- AUTO_INCREMENT for table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `recipeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3005;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ingredient_transaction`
--
ALTER TABLE `ingredient_transaction`
  ADD CONSTRAINT `fk_01` FOREIGN KEY (`ingredientID`) REFERENCES `ingredient` (`ingredientID`);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
