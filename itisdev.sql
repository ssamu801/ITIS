-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:4306
-- Generation Time: Jul 21, 2023 at 10:52 AM
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
  `dateCreated` datetime NOT NULL,
  `price` float NOT NULL,
  `Active` enum('Yes','No') NOT NULL DEFAULT 'Yes',
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `dish`
--

INSERT INTO `dish` (`dishID`, `dishName`, `dateCreated`, `price`, `Active`, `img`) VALUES
(2001, 'Spaghetti', '2023-07-13 13:43:16', 60, 'Yes', 'imgs/Spaghetti.png'),
(2002, 'Pizza', '2023-07-13 13:43:16', 150, 'Yes', 'imgs/Pizza.png'),
(2011, 'Bread', '2023-07-20 12:11:40', 50, 'No', 'imgs/64b8b3b320ba0_Bread.jpg'),
(2012, 'Bread', '2023-07-20 12:13:16', 100, 'No', 'imgs/64b8b43e36704_New Bread.jpg'),
(2013, 'Bread', '2023-07-20 16:52:33', 50, 'Yes', 'imgs/64b8f5b3cec91_Bread.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `disparity`
--

CREATE TABLE `disparity` (
  `logID` int(11) NOT NULL,
  `ingredientID` int(11) NOT NULL,
  `sQuantity` float NOT NULL,
  `mQuantity` float NOT NULL,
  `approved` enum('Yes','No') DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  `createdBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `disparity`
--

INSERT INTO `disparity` (`logID`, `ingredientID`, `sQuantity`, `mQuantity`, `approved`, `createdAt`, `createdBy`) VALUES
(15, 1001, 1270, 1300, 'Yes', '2023-07-20 00:01:49', NULL),
(16, 1002, 1100, 1400, 'Yes', '2023-07-20 01:36:21', NULL),
(17, 1002, 1500, 1600, 'No', '2023-07-20 01:42:31', NULL),
(18, 1002, 1600, 1700, 'Yes', '2023-07-20 12:09:10', NULL),
(19, 1001, 1300, 1000, NULL, '2023-07-20 23:08:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `expired`
--

CREATE TABLE `expired` (
  `expiredID` int(11) NOT NULL,
  `ingredientID` int(11) NOT NULL,
  `quantity` float DEFAULT NULL,
  `expiredDate` datetime DEFAULT NULL,
  `updatedBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ingredient`
--

CREATE TABLE `ingredient` (
  `ingredientID` int(11) NOT NULL,
  `ingredientName` varchar(45) DEFAULT NULL,
  `quantity` float DEFAULT NULL,
  `unitID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `ingredient`
--

INSERT INTO `ingredient` (`ingredientID`, `ingredientName`, `quantity`, `unitID`) VALUES
(1001, 'Flour', 1000, 1004),
(1002, 'Chicken', 1400, 1002),
(1003, 'Egg', 0, 1005);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `total` float DEFAULT NULL,
  `createdBy` int(11) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `ItemID` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  `dishID` int(11) NOT NULL,
  `quantity` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pending_dish`
--

CREATE TABLE `pending_dish` (
  `nDishID` int(11) NOT NULL,
  `dishName` varchar(45) NOT NULL,
  `type` enum('Edit','New') NOT NULL,
  `dateCreated` varchar(45) NOT NULL,
  `approved` enum('Yes','No') DEFAULT NULL,
  `createdBy` int(11) DEFAULT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `pending_dish`
--

INSERT INTO `pending_dish` (`nDishID`, `dishName`, `type`, `dateCreated`, `approved`, `createdBy`, `img`) VALUES
(45, 'Bread', 'New', '2023-07-20 12:10:27', 'Yes', NULL, 'imgs/64b8b3b320ba0_Bread.jpg'),
(46, 'Bread', 'Edit', '2023-07-20 12:12:46', 'Yes', NULL, 'imgs/64b8b43e36704_New Bread.jpg'),
(47, 'Bread', 'Edit', '2023-07-20 16:52:03', 'Yes', NULL, 'imgs/64b8f5b3cec91_Bread.jpg'),
(48, 'Bread', 'Edit', '2023-07-20 19:46:27', 'No', NULL, 'imgs/64b91e933a8d3_New Bread.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pending_recipe`
--

CREATE TABLE `pending_recipe` (
  `nRecipeID` int(11) NOT NULL,
  `nDishID` int(11) NOT NULL,
  `ingredientID` int(11) NOT NULL,
  `quantity` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `pending_recipe`
--

INSERT INTO `pending_recipe` (`nRecipeID`, `nDishID`, `ingredientID`, `quantity`) VALUES
(35, 45, 1001, 10),
(36, 46, 1001, 20),
(37, 46, 1002, 100),
(38, 47, 1001, 10),
(39, 48, 1001, 15);

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
  `recipeID` int(11) NOT NULL,
  `dishID` int(11) NOT NULL,
  `ingredientID` int(11) NOT NULL,
  `quantity` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`recipeID`, `dishID`, `ingredientID`, `quantity`) VALUES
(3001, 2001, 1003, 5),
(3002, 2002, 1002, 100),
(3003, 2002, 1001, 10),
(3011, 2011, 1001, 10),
(3012, 2012, 1001, 20),
(3013, 2012, 1002, 100),
(3015, 2013, 1001, 10);

-- --------------------------------------------------------

--
-- Table structure for table `replenish`
--

CREATE TABLE `replenish` (
  `transactionID` int(11) NOT NULL,
  `ingredientID` int(11) NOT NULL,
  `quantity` float DEFAULT NULL,
  `boughtDate` datetime DEFAULT NULL,
  `createdBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='t';

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `unitID` int(11) NOT NULL,
  `unitName` varchar(45) DEFAULT NULL,
  `type` enum('Mass','Volume','Count') NOT NULL,
  `conversion` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`unitID`, `unitName`, `type`, `conversion`) VALUES
(1001, 'Kg', 'Mass', 1000),
(1002, 'g', 'Mass', 1),
(1003, 'L', 'Volume', 1000),
(1004, 'mL', 'Volume', 1),
(1005, 'pc', 'Count', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `employeeID` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `firstName` varchar(45) DEFAULT NULL,
  `lastName` varchar(45) DEFAULT NULL,
  `role` varchar(45) NOT NULL,
  `hireDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`employeeID`, `username`, `password`, `firstName`, `lastName`, `role`, `hireDate`) VALUES
(1, 'jonjon123', 'pass123', 'Jonathan', 'Gonzalez', 'Chef', '2023-07-11'),
(4, 'rafayell', 'pass123', 'Rafael Christian', 'Sanchez', 'Inventory', '2023-07-18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dish`
--
ALTER TABLE `dish`
  ADD PRIMARY KEY (`dishID`),
  ADD UNIQUE KEY `dishID_UNIQUE` (`dishID`);

--
-- Indexes for table `disparity`
--
ALTER TABLE `disparity`
  ADD PRIMARY KEY (`logID`),
  ADD UNIQUE KEY `logID` (`logID`),
  ADD KEY `fk_Disaprity_Ingredient` (`ingredientID`),
  ADD KEY `fk_Disparity_User` (`createdBy`);

--
-- Indexes for table `expired`
--
ALTER TABLE `expired`
  ADD PRIMARY KEY (`expiredID`),
  ADD UNIQUE KEY `expiredID` (`expiredID`);

--
-- Indexes for table `ingredient`
--
ALTER TABLE `ingredient`
  ADD PRIMARY KEY (`ingredientID`),
  ADD UNIQUE KEY `IngredientID_UNIQUE` (`ingredientID`),
  ADD KEY `fk_Ingredient_Unit_idx` (`unitID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD UNIQUE KEY `orderID_UNIQUE` (`orderID`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`ItemID`),
  ADD UNIQUE KEY `ItemID_UNIQUE` (`ItemID`);

--
-- Indexes for table `pending_dish`
--
ALTER TABLE `pending_dish`
  ADD PRIMARY KEY (`nDishID`),
  ADD KEY `fk_pDish_User_idx` (`createdBy`);

--
-- Indexes for table `pending_recipe`
--
ALTER TABLE `pending_recipe`
  ADD PRIMARY KEY (`nRecipeID`),
  ADD UNIQUE KEY `nRecipeID_UNIQUE` (`nRecipeID`),
  ADD KEY `fk_pRecipe_Ingredient_idx` (`ingredientID`),
  ADD KEY `fk_pRecipe_pDish_idx` (`nDishID`);

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`recipeID`),
  ADD UNIQUE KEY `recipeID_UNIQUE` (`recipeID`),
  ADD KEY `fk_Recipe_Ingredients_idx` (`ingredientID`);

--
-- Indexes for table `replenish`
--
ALTER TABLE `replenish`
  ADD PRIMARY KEY (`transactionID`),
  ADD UNIQUE KEY `transactionID_UNIQUE` (`transactionID`),
  ADD KEY `fk_Transaction_User_idx` (`createdBy`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`unitID`),
  ADD UNIQUE KEY `unitID_UNIQUE` (`unitID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`employeeID`),
  ADD UNIQUE KEY `Employee ID_UNIQUE` (`employeeID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dish`
--
ALTER TABLE `dish`
  MODIFY `dishID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2014;

--
-- AUTO_INCREMENT for table `disparity`
--
ALTER TABLE `disparity`
  MODIFY `logID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `expired`
--
ALTER TABLE `expired`
  MODIFY `expiredID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `ingredient`
--
ALTER TABLE `ingredient`
  MODIFY `ingredientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1004;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `ItemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pending_dish`
--
ALTER TABLE `pending_dish`
  MODIFY `nDishID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `pending_recipe`
--
ALTER TABLE `pending_recipe`
  MODIFY `nRecipeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `recipeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3016;

--
-- AUTO_INCREMENT for table `replenish`
--
ALTER TABLE `replenish`
  MODIFY `transactionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `unitID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1010;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `employeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `disparity`
--
ALTER TABLE `disparity`
  ADD CONSTRAINT `fk_Disaprity_Ingredient` FOREIGN KEY (`ingredientID`) REFERENCES `ingredient` (`ingredientID`),
  ADD CONSTRAINT `fk_Disparity_User` FOREIGN KEY (`createdBy`) REFERENCES `user` (`employeeID`);

--
-- Constraints for table `expired`
--
ALTER TABLE `expired`
  ADD CONSTRAINT `fk_Expired_Ingredient` FOREIGN KEY (`ingredientID`) REFERENCES `ingredient` (`ingredientID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Expired_User` FOREIGN KEY (`updatedBy`) REFERENCES `user` (`employeeID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ingredient`
--
ALTER TABLE `ingredient`
  ADD CONSTRAINT `fk_Ingredient_Unit` FOREIGN KEY (`unitID`) REFERENCES `unit` (`unitID`);

--
-- Constraints for table `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `fk_Order_Dish` FOREIGN KEY (`dishID`) REFERENCES `dish` (`dishID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Order_Item` FOREIGN KEY (`orderID`) REFERENCES `orders` (`orderID`);

--
-- Constraints for table `pending_dish`
--
ALTER TABLE `pending_dish`
  ADD CONSTRAINT `fk_pDish_User` FOREIGN KEY (`createdBy`) REFERENCES `user` (`employeeID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pending_recipe`
--
ALTER TABLE `pending_recipe`
  ADD CONSTRAINT `fk_pRecipe_Ingredient` FOREIGN KEY (`ingredientID`) REFERENCES `ingredient` (`ingredientID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pRecipe_pDish` FOREIGN KEY (`nDishID`) REFERENCES `pending_dish` (`nDishID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `recipe`
--
ALTER TABLE `recipe`
  ADD CONSTRAINT `fk_Recipe_Dish` FOREIGN KEY (`dishID`) REFERENCES `dish` (`dishID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Recipe_Ingredient` FOREIGN KEY (`ingredientID`) REFERENCES `ingredient` (`ingredientID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `replenish`
--
ALTER TABLE `replenish`
  ADD CONSTRAINT `fk_Replenish_Ingredient` FOREIGN KEY (`ingredientID`) REFERENCES `ingredient` (`ingredientID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Replenish_User` FOREIGN KEY (`createdBy`) REFERENCES `user` (`employeeID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
