CREATE TABLE IF NOT EXISTS `group_attendance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `training_date` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `absence_reason` varchar(200) NOT NULL,
  `makeup_date` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2529 ;
