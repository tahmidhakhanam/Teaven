--
-- Creating table structure for table `teaven_toppings`
--

DROP TABLE IF EXISTS `teaven_toppings`;
CREATE TABLE IF NOT EXISTS `teaven_toppings` (
  `topping_id` varchar(6) NOT NULL DEFAULT '',
  `topping_name` varchar(50) DEFAULT NULL,
  `topping_price` double(7,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Inserting data for table `teaven_toppings`
--

INSERT INTO `teaven_toppings` (`topping_id`, `topping_name`, `topping_price`) VALUES
('t1', 'Aloe Vera', 0.50),
('t10', 'Cocunut Jelly', 0.50),
('t11', 'Coffee Jelly', 0.50),
('t12', 'Grape Jelly', 0.50),
('t13', 'Lychee Cocunut Jelly', 0.50),
('t14', 'Mango Jelly', 0.50),
('t15', 'Strawberry Jelly', 0.50),
('t16', 'Apple Pobble', 0.50),
('t17', 'Blueberry Pobble', 0.50),
('t18', 'Cherry Pobble', 0.50),
('t19', 'Chocolate Pobble', 0.50),
('t2', 'Agar Jelly', 0.50),
('t20', 'Coffee Pobble', 0.50),
('t21', 'Cranberry Pobble', 0.50),
('t22', 'Kiwi Fruit Pobble', 0.50),
('t23', 'Lemon Pobble', 0.50),
('t24', 'Lychee Pobble', 0.50),
('t25', 'Mango Pobble', 0.50),
('t26', 'Passion Fruit Pobble', 0.50),
('t27', 'Peach Pobble', 0.50),
('t28', 'Pomegranate Pobble', 0.50),
('t29', 'Strawberry Pobble', 0.50),
('t3', 'Big Tapioca (Boba)', 0.50),
('t30', 'Youghurt Pobble', 0.50),
('t31', 'Cream Crown', 0.50),
('t32', 'Salted Cheese Cream Crown', 0.50),
('t4', 'Egg Pudding', 0.50),
('t5', 'Grass Jelly', 0.50),
('t6', 'Matcha Pudding', 0.50),
('t7', 'Red Bean', 0.50),
('t8', 'Basil Seeds', 0.50),
('t9', 'Apple Jelly', 0.50);

--
-- Indexes for table `teaven_toppings`
--
ALTER TABLE `teaven_toppings`
 ADD PRIMARY KEY (`topping_id`);