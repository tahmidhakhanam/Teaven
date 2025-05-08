--
-- Creating table structure for table `teaven_flavours`
--

DROP TABLE IF EXISTS `teaven_flavours`;
CREATE TABLE IF NOT EXISTS `teaven_flavours` (
  `flavour_id` varchar(6) NOT NULL DEFAULT '',
  `flavour_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Inserting data for table `teaven_flavours`
--

INSERT INTO `teaven_flavours` (`flavour_id`, `flavour_name`) VALUES
('f1', 'Taro'),
('f10', 'Papaya'),
('f11', 'Lychee'),
('f12', 'Watermelon'),
('f13', 'Rose Milk'),
('f14', 'Chocolate Mint'),
('f15', 'Vanilla'),
('f16', 'Matcha'),
('f17', 'Durian'),
('f18', 'Blueberry'),
('f19', 'Rasberry'),
('f2', 'Mocha'),
('f20', 'Pandan'),
('f21', 'Pina Colada'),
('f3', 'Chocolate'),
('f4', 'Coconut'),
('f5', 'Red Bean'),
('f6', 'Almond'),
('f7', 'Mango'),
('f8', 'Strawberry'),
('f9', 'Honey Dew');

--
-- Indexes for table `teaven_flavours`
--
ALTER TABLE `teaven_flavours`
 ADD PRIMARY KEY (`flavour_id`);