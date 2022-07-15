SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE `players` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nickname` text NOT NULL,
  `game` int(6) NOT NULL,
  `points` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE `paintings` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `author` text NOT NULL,
  `year` text NOT NULL,
  `technique` text NOT NULL,
  `position` text NOT NULL,
  `description` text NOT NULL,
   PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE `matches` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `paintings` int(5) NOT NULL,
   PRIMARY KEY (`id`),
     INDEX paintings_key (paintings),
     FOREIGN KEY (paintings) REFERENCES paintings(id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

