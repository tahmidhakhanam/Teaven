--
-- Creating table structure for table `teaven_orders`
--

DROP TABLE IF EXISTS `teaven_orders`;
CREATE TABLE IF NOT EXISTS `teaven_orders` (
  `order_id` int(11) NOT NULL,
  `order_cat` varchar(6) DEFAULT NULL,
  `order_flavour` varchar(6) DEFAULT NULL,
  `order_topping` varchar(20) DEFAULT NULL,
  `order_size` varchar(6) DEFAULT NULL,
  `order_quantity` int(5) DEFAULT NULL,
  `order_price` decimal(4,2) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Inserting data for table `teaven_orders`
--

INSERT INTO `teaven_orders` (`order_id`, `order_cat`, `order_flavour`, `order_topping`, `order_size`, `order_quantity`, `order_price`) VALUES
(1, 'c1', 'f1', 't1', 'REG', 1, '3.50');

--
-- Indexes for table `teaven_orders`
--
ALTER TABLE `teaven_orders`
 ADD PRIMARY KEY (`order_id`);

--
-- AUTO_INCREMENT for table `teaven_orders`
--
ALTER TABLE `teaven_orders`
MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;