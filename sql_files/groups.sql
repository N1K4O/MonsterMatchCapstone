CREATE TABLE `group_table` (
  `idgroup` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `group_name` varchar(50) NOT NULL,
  `group_leader` varchar(65) NOT NULL,
  `group_id` int(11) NOT NULL,
  'group_leader_name' varchar(65) NOT NULL,
  PRIMARY KEY (`idgroup`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci