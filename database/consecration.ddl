CREATE TABLE IF NOT EXISTS `consecration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `locality` varchar(200) NOT NULL,
  `response` mediumtext NOT NULL,
  `date_submitted` date NOT NULL,
  `application_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=305 ;