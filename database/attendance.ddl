CREATE TABLE IF NOT EXISTS `attendance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `training_date` date NOT NULL,
  `status` varchar(100) NOT NULL,
  `absence_reason` varchar(200) NOT NULL,
  `makeup_date` varchar(255) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5310 ;