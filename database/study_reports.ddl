CREATE TABLE IF NOT EXISTS `study_reports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `locality` varchar(200) NOT NULL,
  `language` varchar(200) NOT NULL,
  `group_no` int(11) NOT NULL,
  `lesson` varchar(200) NOT NULL,
  `attendees` varchar(400) NOT NULL,
  `absentees` varchar(400) NOT NULL,
  `study_report` longtext NOT NULL,
  `suggestions` varchar(400) NOT NULL,
  `date_submitted` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=666 ;