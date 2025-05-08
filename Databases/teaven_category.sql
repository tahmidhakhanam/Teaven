--
-- Creating table structure for table `teaven_category`
--

DROP TABLE IF EXISTS `teaven_category`;
CREATE TABLE IF NOT EXISTS `teaven_category` (
  `category_id` varchar(6) NOT NULL DEFAULT '',
  `category_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Inserting data for table `teaven_category`
--

INSERT INTO `teaven_category` (`category_id`, `category_name`) VALUES
('c1', 'Basic Milk Tea'),
('c2', 'Flavoured Milk Tea'),
('c3', 'Floating Tea'),
('c4', 'Flavoured Fruit Tea'),
('c5', 'Brown Sugar Milk Tea'),
('c6', 'Vegan Milk Tea'),
('c7', 'Fresh Fruit Tea'),
('c8', 'Pearl Milk Tea');

--
-- Indexes for table `teaven_category`
--
ALTER TABLE `teaven_category`
 ADD PRIMARY KEY (`category_id`);