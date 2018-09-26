CREATE TABLE IF NOT EXISTS `PREFIX_dscounter` (
  `id_dscounter` int(11) UNSIGNED NOT NULL,
  `counter_img` varchar(250) NOT NULL,
  `counter_url` varchar(250) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id_dscounter`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `PREFIX_dscounter_lang` (
  `id_dscounter` int(11) NOT NULL,
  `id_lang` int(11) NOT NULL,
  `id_shop` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  PRIMARY KEY (`id_dscounter`,`id_lang`,`id_shop`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `PREFIX_dscounter_shop` (
  `id_discounter` int(11) NOT NULL,
  `id_shop` int(11) NOT NULL,
  PRIMARY KEY (`id_discounter`,`id_shop`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

