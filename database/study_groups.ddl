CREATE TABLE IF NOT EXISTS `study_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `locality` varchar(200) NOT NULL,
  `language` varchar(200) NOT NULL,
  `group_no` int(11) NOT NULL,
  `mtg_day` varchar(200) NOT NULL,
  `mtg_time` varchar(200) NOT NULL,
  `mtg_place` varchar(200) NOT NULL,
  `member_no` int(11) NOT NULL,
  `member_name` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=89 ;
