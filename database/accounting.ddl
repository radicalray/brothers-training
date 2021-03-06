CREATE TABLE IF NOT EXISTS `accounting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `locality` varchar(200) NOT NULL,
  `address0` varchar(400) NOT NULL,
  `report_type` varchar(200) NOT NULL,
  `date1` varchar(200) NOT NULL,
  `desc1` varchar(400) NOT NULL,
  `payee1` varchar(200) NOT NULL,
  `address1` varchar(400) NOT NULL,
  `amount1` decimal(10,2) NOT NULL,
  `date2` varchar(200) NOT NULL,
  `desc2` varchar(400) NOT NULL,
  `payee2` varchar(200) NOT NULL,
  `address2` varchar(400) NOT NULL,
  `amount2` decimal(10,2) NOT NULL,
  `date3` varchar(200) NOT NULL,
  `desc3` varchar(400) NOT NULL,
  `payee3` varchar(200) NOT NULL,
  `address3` varchar(400) NOT NULL,
  `amount3` decimal(10,2) NOT NULL,
  `date4` varchar(200) NOT NULL,
  `desc4` varchar(400) NOT NULL,
  `payee4` varchar(200) NOT NULL,
  `address4` varchar(400) NOT NULL,
  `amount4` decimal(10,2) NOT NULL,
  `date5` varchar(200) NOT NULL,
  `desc5` varchar(400) NOT NULL,
  `payee5` varchar(200) NOT NULL,
  `address5` varchar(400) NOT NULL,
  `amount5` decimal(10,2) NOT NULL,
  `date6` varchar(200) NOT NULL,
  `desc6` varchar(400) NOT NULL,
  `payee6` varchar(200) NOT NULL,
  `address6` varchar(400) NOT NULL,
  `amount6` decimal(10,2) NOT NULL,
  `date7` varchar(200) NOT NULL,
  `desc7` varchar(400) NOT NULL,
  `payee7` varchar(200) NOT NULL,
  `address7` varchar(400) NOT NULL,
  `amount7` decimal(10,2) NOT NULL,
  `date8` varchar(200) NOT NULL,
  `desc8` varchar(400) NOT NULL,
  `payee8` varchar(200) NOT NULL,
  `address8` varchar(400) NOT NULL,
  `amount8` decimal(10,2) NOT NULL,
  `date9` varchar(200) NOT NULL,
  `desc9` varchar(400) NOT NULL,
  `payee9` varchar(200) NOT NULL,
  `address9` varchar(400) NOT NULL,
  `amount9` decimal(10,2) NOT NULL,
  `date10` varchar(200) NOT NULL,
  `desc10` varchar(400) NOT NULL,
  `payee10` varchar(200) NOT NULL,
  `address10` varchar(400) NOT NULL,
  `amount10` decimal(10,2) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `remark` varchar(400) NOT NULL,
  `link1` varchar(300) NOT NULL,
  `link2` varchar(300) NOT NULL,
  `link3` varchar(300) NOT NULL,
  `link4` varchar(300) NOT NULL,
  `link5` varchar(300) NOT NULL,
  `date_submitted` date NOT NULL,
  `approved1` varchar(200) NOT NULL,
  `approved2` varchar(200) NOT NULL,
  `approved_date1` date NOT NULL,
  `approved_date2` date NOT NULL,
  `payment_comment1` varchar(300) NOT NULL,
  `payment_comment2` varchar(300) NOT NULL,
  `expense_paid` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=134 ;