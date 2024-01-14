


-- Table structure for table `pizza`
CREATE TABLE `pizza` (
  `pizzaID` int(11) NOT NULL,
  `pizzaName` varchar(255) NOT NULL,
  `ingredientsID` int(11) NOT NULL,
  `sizeID` int(11) NOT NULL,
  `ordersID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
-- --------------------------------------------------------

-- Table structure for table `ingredients'
CREATE TABLE `ingredients` (
  `IngredientsID` int(11) NOT NULL,
  `ingredients` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
-- --------------------------------------------------------
-- Table structure for table `size`
CREATE TABLE `size` (
  `sizeID` int(11) NOT NULL,
  `size` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
-- --------------------------------------------------------
-- Table structure for table `orders`
CREATE TABLE `orders` (
  `ordersID` int(11) NOT NULL,
  `orders` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
-- --------------------------------------------------------

ALTER TABLE `pizza`
  ADD PRIMARY KEY (`pizzaID`),
  ADD KEY `ingredientsID` (`ingredientsID`),
  ADD KEY `sizeID` (`sizeID`),
  ADD KEY `ordersID` (`ordersID`);
-- Indexes for table `pizza`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`ingredientsID`),
  ADD KEY (`ingredientsID`);
-- Indexes for table `ingredients`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`sizeID`);
-- Indexes for table `size`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ordersID`);
-- Indexes for table `orders`
--
ALTER TABLE `pizza`
  ADD PRIMARY KEY (`pizzaID`);
-- AUTO_INCREMENT for dumped tables
-- AUTO_INCREMENT for table `pizza`
--
ALTER TABLE `ingredients`
  MODIFY `ingredientsID` int(11) NOT NULL AUTO_INCREMENT;
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `size`
  MODIFY `sizeID` int(11) NOT NULL AUTO_INCREMENT;
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `orders`
  MODIFY `ordersID` int(11) NOT NULL AUTO_INCREMENT;
-- AUTO_INCREMENT for table `orders'

ALTER TABLE `pizza`
  MODIFY `pizzaID` int(11) NOT NULL AUTO_INCREMENT;
-- Constraints for dumped tables
-- Constraints for table `pizza`
--
ALTER TABLE `ingredients`
  ADD CONSTRAINT `ingredients` FOREIGN KEY (`pizzaID`) REFERENCES `pizza` (`pizzaID`)
-- Constraints for table `pizza`
--
ALTER TABLE `size`
  ADD CONSTRAINT `size` FOREIGN KEY (`pizzaID`) REFERENCES `pizza` (`pizzaID`);
-- Constraints for table `pizza`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders` FOREIGN KEY (`pizzaID`) REFERENCES `pizza` (`pizzaID`);
COMMIT;










