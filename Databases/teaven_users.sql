--
-- Creating table structure for table `teaven_users`
--

DROP TABLE IF EXISTS `teaven_users`;
CREATE TABLE IF NOT EXISTS `teaven_users` (
`user_id` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Inserting data for table `teaven_users`
--

INSERT INTO `teaven_users` (`user_id`, `firstname`, `surname`, `username`, `password_hash`) VALUES
(1, 'Allison', 'Smith', 'admin1234', '$2y$10$241VguAQ6fD12z38.FQ/bul3NU8yYoIXPQSbeN6lU5nSlyJsLVjgG'),
(2, 'Mark', 'Jones', 'admin1235', '$2y$10$zbGZjS/gjvWLUjdlhKihx.rMzqaZ7ZSCGj3Maakb7Uxz43327Ag8.');

--
-- Indexes for table `teaven_users`
--
ALTER TABLE `teaven_users`
 ADD PRIMARY KEY (`user_id`), ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for table `teaven_users`
--
ALTER TABLE `teaven_users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
