

-----GOING BACK TO THE ORIGINAL STRUCTURE OF THE TABLES--------
-- Table structure for table `petFoodExpiration`
CREATE TABLE `petFoodExpiration` (
  `expID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `expirationDate``` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci
-- --------------------------------------------------------
-- Table structure for table `petProduct`
CREATE TABLE `petProduct` (
  `productID` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `typeID` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `brandID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
-- --------------------------------------------------------
-- Table structure for table `petToySize`
CREATE TABLE `petToySize` (
  `sizeID` int(11) NOT NULL,
  `size` varchar(255) NOT NULL,
  `productID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
-- --------------------------------------------------------
-- Table structure for table `productBrand
CREATE TABLE `productBrand` (
  `brandID` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
-- --------------------------------------------------------
-- Table structure for table `productCategory`
CREATE TABLE `productCategory` (
  `categoryID` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
-- --------------------------------------------------------
-- Table structure for table `productPrice`
CREATE TABLE `productPrice` (
  `pricingID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
-- --------------------------------------------------------
-- Table structure for table `productType`
CREATE TABLE `productType` (
  `typeID` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
-- Indexes for dumped tables
-- Indexes for table `petFoodExpiration`
--
ALTER TABLE `petFoodExpiration`
  ADD PRIMARY KEY (`expID`),
  ADD KEY `productID` (`productID`);
-- Indexes for table `petProduct`
--
ALTER TABLE `petProduct`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `typeID` (`typeID`),
  ADD KEY `categoryID` (`categoryID`),
  ADD KEY `brandID` (`brandID`);
-- Indexes for table `petToySize`
--
ALTER TABLE `petToySize`
  ADD PRIMARY KEY (`sizeID`),
  ADD KEY `productID` (`productID`);
-- Indexes for table `productBrand`
--
ALTER TABLE `productBrand`
  ADD PRIMARY KEY (`brandID`);
-- Indexes for table `productCategory`
--
ALTER TABLE `productCategory`
  ADD PRIMARY KEY (`categoryID`);
-- Indexes for table `productPrice`
--
ALTER TABLE `productPrice`
  ADD PRIMARY KEY (`pricingID`),
  ADD KEY `productID` (`productID`);
--
-- Indexes for table `productType`
--
ALTER TABLE `productType`
  ADD PRIMARY KEY (`typeID`);
-- AUTO_INCREMENT for dumped tables
-- AUTO_INCREMENT for table `petFoodExpiration`
--
ALTER TABLE `petFoodExpiration`
  MODIFY `expID` int(11) NOT NULL AUTO_INCREMENT;
-- AUTO_INCREMENT for table `petProduct`
--
ALTER TABLE `petProduct`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT;
-- AUTO_INCREMENT for table `petToySize`
--
ALTER TABLE `petToySize`
  MODIFY `sizeID` int(11) NOT NULL AUTO_INCREMENT;
-- AUTO_INCREMENT for table `productBrand`
--
ALTER TABLE `productBrand`
  MODIFY `brandID` int(11) NOT NULL AUTO_INCREMENT;
-- AUTO_INCREMENT for table `productCategory
ALTER TABLE `productCategory`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT;
-- AUTO_INCREMENT for table `productPrice`
--
ALTER TABLE `productPrice`
  MODIFY `pricingID` int(11) NOT NULL AUTO_INCREMENT;
-- AUTO_INCREMENT for table `productType`
--
ALTER TABLE `productType`
  MODIFY `typeID` int(11) NOT NULL AUTO_INCREMENT;
-- Constraints for dumped tables
-- Constraints for table `petFoodExpiration`
--
ALTER TABLE `petFoodExpiration`
  ADD CONSTRAINT `petFoodExpiration_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `petProduct` (`productID`)
-- Constraints for table `petProduct`
--
ALTER TABLE `petProduct`
  ADD CONSTRAINT `petProduct_ibfk_1` FOREIGN KEY (`typeID`) REFERENCES `productType` (`typeID`),
  ADD CONSTRAINT `petProduct_ibfk_2` FOREIGN KEY (`categoryID`) REFERENCES `productCategory` (`categoryID`),
  ADD CONSTRAINT `petProduct_ibfk_3` FOREIGN KEY (`brandID`) REFERENCES `productBrand` (`brandID`);
-- Constraints for table `petToySize`
--
ALTER TABLE `petToySize`
  ADD CONSTRAINT `petToySize_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `petProduct` (`productID`);
-- Constraints for table `productPrice`
--
ALTER TABLE `productPrice`
  ADD CONSTRAINT `productPrice_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `petProduct` (`productID`);
COMMIT;










-----PREVIOUS VERSION OF THE TABLES--------
--------------------------------------------------------
CREATE TABLE `petFood` (
  `petFoodID` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `brandID` int(11) NOT NULL,
  `FoodName` varchar(255) NOT NULL,
  `expDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
--------------------------------------------------------
-- Table structure for table `petToy`
CREATE TABLE `petToy` (
  `petToyID` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `brandID` int(11) NOT NULL,
  `toyName` varchar(255) NOT NULL,
  `sizeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
--------------------------------------------------------
-- Table structure for table `petToySize`
CREATE TABLE `petToySize` (
  `sizeID` int(11) NOT NULL,
  `size` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
--------------------------------------------------------
-- Table structure for table `productBrand`
CREATE TABLE `productBrand` (
  `brandID` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
--------------------------------------------------------
-- Table structure for table `productCategory`
CREATE TABLE `productCategory` (
  `categoryID` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
--------------------------------------------------------
-- Indexes for table `petFood`
ALTER TABLE `petFood`
  ADD PRIMARY KEY (`petFoodID`),
  ADD KEY `expID` (`expDate`),
  ADD KEY `categoryID` (`categoryID`),
  ADD KEY `brandID` (`brandID`);
-- Indexes for table `petToy`
ALTER TABLE `petToy`
  ADD PRIMARY KEY (`petToyID`),
  ADD KEY `sizeID` (`sizeID`),
  ADD KEY `categoryID` (`categoryID`),
  ADD KEY `brandID` (`brandID`);
-- Indexes for table `petToySize`
ALTER TABLE `petToySize`
  ADD PRIMARY KEY (`sizeID`);
-- Indexes for table `productBrand`
ALTER TABLE `productBrand`
  ADD PRIMARY KEY (`brandID`);
-- Indexes for table `productCategory`
ALTER TABLE `productCategory`
ADD PRIMARY KEY (`categoryID`);
-- AUTO_INCREMENT for table `petFood`
ALTER TABLE `petFood`
  MODIFY `petFoodID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
-- AUTO_INCREMENT for table `petToy`
ALTER TABLE `petToy`
  MODIFY `petToyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
-- AUTO_INCREMENT for table `petToySize`
ALTER TABLE `petToySize`
  MODIFY `sizeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
-- AUTO_INCREMENT for table `productBrand`
ALTER TABLE `productBrand`
  MODIFY `brandID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
-- AUTO_INCREMENT for table `productCategory`
ALTER TABLE `productCategory`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
  --------------------------------------------------------
-- Constraints for dumped tables
-- Constraints for table `petFood`
ALTER TABLE `petFood`
  ADD CONSTRAINT `petFood_ibfk_2` FOREIGN KEY (`categoryID`) REFERENCES `productCategory` (`categoryID`),
  ADD CONSTRAINT `petFood_ibfk_3` FOREIGN KEY (`brandID`) REFERENCES `productBrand` (`brandID`);
-- Constraints for table `petToy`
ALTER TABLE `petToy`
  ADD CONSTRAINT `petToy_ibfk_1` FOREIGN KEY (`sizeID`) REFERENCES `petToySize` (`sizeID`),
  ADD CONSTRAINT `petToy_ibfk_2` FOREIGN KEY (`categoryID`) REFERENCES `productCategory` (`categoryID`),
  ADD CONSTRAINT `petToy_ibfk_3` FOREIGN KEY (`brandID`) REFERENCES `productBrand` (`brandID`);
COMMIT;
-----------------------------------------------------
-- Dumping data for table `petFood`
INSERT INTO `petFood` (`petFoodID`, `categoryID`, `brandID`, `FoodName`, `expDate`) VALUES
(3, 1, 1, 'Chicken pate', '2024-11-25'),
(4, 2, 2, 'Beef Cubes', '2024-02-14'),
(5, 2, 2, 'Beef Cubes', '2024-02-14'),
(6, 2, 2, 'Beef Cubes', '2024-02-14');
--------------------------------------------------------
-- Dumping data for table `petToy`
INSERT INTO `petToy` (`petToyID`, `categoryID`, `brandID`, `toyName`, `sizeID`) VALUES
(2, 2, 17, 'kong-full', 16),
(12, 1, 23, 'kitty ball', 18),
(13, 1, 1, 'wellwell', 17);
-- --------------------------------------------------------
-- Dumping data for table `petToySize`
INSERT INTO `petToySize` (`sizeID`, `size`) VALUES
(16, 'XL'),
(17, 'L'),
(18, 'M'),
(19, 'S'),
(20, 'XS');
--------------------------------------------------------
-- Dumping data for table `productBrand`
INSERT INTO `productBrand` (`brandID`, `brand`) VALUES
(1, 'WELLNESS'),
(2, 'FORMULA RAW'),
(11, 'ORIJEN'),
(15, 'WERUVA'),
(17, 'kong'),
(21, 'royal '),
(22, 'N&D'),
(23, 'Outward Hound'),
(24, 'Go'),
(26, 'acana');
-- --------------------------------------------------------
-- Dumping data for table `productCategory`
INSERT INTO `productCategory` (`categoryID`, `category`) VALUES
(1, 'Cat Products'),
(2, 'Dog Products');
-- --------------------------------------------------------
SELECT * FROM `petToy` JOIN petToySize;
SELECT * FROM `petToy` JOIN petFood;
SELECT petFood.petFoodID, productCategory.category, productBrand.brand, petFood.FoodName, petFood.expDate FROM petFood INNER JOIN productCategory ON petFood.categoryID = productCategory.categoryID INNER JOIN productBrand ON petFood.brandID = productBrand.brandID;
SELECT pf.petFoodID, pc.category, pb.brand, pf.FoodName, pf.expDate FROM petFood AS pf INNER JOIN productCategory AS pc ON pf.categoryID = pc.categoryID INNER JOIN productBrand AS pb ON pf.brandID = pb.brandID;

------ Queries related to the previous table structure----

SELECT * FROM petProduct NATURAL JOIN productCategory WHERE productCategory.categoryID = petProduct.categoryID;
SELECT * FROM petProduct JOIN productType ON petProduct.typeID = productType.typeID;
SELECT * FROM petProduct NATURAL JOIN inventory WHERE inventory.productID = petProduct.productID;
INSERT INTO `petProduct` (`productID`, `productName`, `typeID`, `categoryID`, `brandID`) VALUES (NULL, 'Chicken Pate 156gr', '1', '1', '1'), (NULL, 'Raw Beef Cubes', '1', '2', '2');
