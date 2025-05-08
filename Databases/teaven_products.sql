--
-- Creating table structure for table `teaven_products`
--

DROP TABLE IF EXISTS `teaven_products`;
CREATE TABLE IF NOT EXISTS `teaven_products` (
  `product_id` varchar(6) NOT NULL DEFAULT '',
  `product_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Inserting data for table `teaven_products`
--

INSERT INTO `teaven_products` (`product_id`, `product_name`) VALUES
('p1', 'Bubble tea 1'),
('p2', 'Bubble tea 2'),
('p3', 'Bubble tea 3'),
('p4', 'Bubble tea 4'),
('p5', 'Bubble tea 5');

--
-- Indexes for table `teaven_products`
--
ALTER TABLE `teaven_products`
 ADD PRIMARY KEY (`product_id`);