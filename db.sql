  -- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

-- Database: `punchin`

USE punchin;

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(40) NOT NULL,
  `date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sponsor` varchar(40) NOT NULL,
  `print_name` varchar(40) NOT NULL,
  `signature` varchar(400) NOT NULL,
  `id` BOOLEAN default FALSE,
  `badge_num` varchar(40) NOT NULL,
  `time_in` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `time_out`TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


--users with 1 id are verified and employees
--default inputs
INSERT INTO users(company_name, sponsor, print_name, signature, id, badge_num)
                                           VALUES("Single Point group", "Emplyee", "Ramanan Manokaran", "RK", "1", "3847"),
                                           ("Single Point group", "Employee", "Gurleen Maggon", "GS", "1", "3848"),
                                           ("Drake's Company", "Toronto Labels", "Drake Ramoray", "DR", "1", "ABCD"),
                                           ("LG", "Ramanan Manokaran", "Sam", "S", "0", "S-345-BC");

--Thank you so much sir for going through my web app, I can make admin panel to alter the table as soon as I get in ;)
