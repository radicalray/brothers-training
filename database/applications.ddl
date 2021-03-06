CREATE TABLE IF NOT EXISTS `applications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `age` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `locality` varchar(200) NOT NULL,
  `occupation` varchar(200) NOT NULL,
  `language` varchar(200) NOT NULL,
  `date_saved` varchar(200) NOT NULL,
  `date_baptized` varchar(200) NOT NULL,
  `church_raised` varchar(200) NOT NULL,
  `date_entered_church` varchar(200) NOT NULL,
  `services` mediumtext NOT NULL,
  `training` mediumtext NOT NULL,
  `payment_method` varchar(200) NOT NULL,
  `payment_verification` tinyint(1) NOT NULL DEFAULT '0',
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `approved_by` varchar(200) NOT NULL,
  `approved_date` datetime NOT NULL,
  `comments` mediumtext NOT NULL,
  `date_submitted` datetime NOT NULL,
  `hidden` tinyint(1) NOT NULL DEFAULT '0',
  `consecrated` tinyint(1) NOT NULL DEFAULT '0',
  `first_term` tinyint(1) NOT NULL DEFAULT '0',
  `second_term` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=423 ;