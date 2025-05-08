--
-- Creating table structure for table `teaven_size`
--

DROP TABLE IF EXISTS `teaven_size`;
CREATE TABLE IF NOT EXISTS `teaven_size` (
`size_id` varchar(6) NOT NULL DEFAULT '',
  `size_name` varchar(50) DEFAULT NULL,
  `size_price` double(7,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- Inserting data for table `teaven_size`
--

INSERT INTO `teaven_size` (`size_id`, `size_name`, `size_price`) VALUES
('SML', 'Small', 2.90),
('REG', 'Regular', 3.60),
('LRG', 'Large', 4.10);

--
-- Indexes for table `teaven_size`
--
ALTER TABLE `teaven_size`
 ADD PRIMARY KEY (`size_id`);