CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

INSERT INTO `countries` (`id`, `name`) VALUES
(1, 'India'),
(2, 'USA'),
(3, 'Vietnam');


CREATE TABLE IF NOT EXISTS `states` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;


INSERT INTO `states` (`id`, `country_id`, `name`) VALUES
(1, 1, 'Maharashtra'),
(2, 1, 'Punjab'),
(3, 1, 'Rajasthan '),
(4, 1, 'Uttar Pradesh'),
(5, 2, 'Alabama'),
(6, 2, 'Alaska'),
(8, 2, 'Florida'),
(9, 3, 'An Giang '),
(10, 3, 'Ba Ria-Vung Tau '),
(11, 3, 'Bac Thai '),
(12, 3, 'Binh Dinh ');


CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;


INSERT INTO `cities` (`id`, `state_id`, `name`) VALUES
(1, 1, 'Mumbai'),
(2, 1, 'Pune'),
(3, 1, 'Latur'),
(4, 2, 'Gurdaspur'),
(5, 2, 'Amritsar'),
(6, 2, 'Pathankot'),
(7, 2, 'Ludhiana'),
(8, 3, 'Jaipur'),
(9, 3, 'Ajmer'),
(10, 4, 'Bareilly'),
(11, 4, 'Meerut'),
(12, 4, 'Kanpur'),
(13, 4, 'Agra'),
(14, 9, 'Long Xuyen '),
(15, 10, 'Vung Tau '),
(16, 11, 'Thai Nguyen '),
(17, 12, 'Quy Nhon '),
(18, 5, 'Abbeville'),
(19, 5, 'Coaling'),
(20, 5, 'Goodwater'),
(21, 5, 'Marvel'),
(22, 6, 'Fairbanks'),
(23, 6, 'Wasilla'),
(24, 6, 'Bethel'),
(25, 6, 'Palmer'),
(26, 8, 'Miami'),
(27, 8, 'Orlando'),
(28, 8, 'Hialeah'),
(29, 8, 'Fort Lauderdale');