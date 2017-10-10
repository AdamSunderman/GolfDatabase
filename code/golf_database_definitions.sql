set FOREIGN_KEY_CHECKS=0;
drop table if exists `course_locations`, `holes`, `courses`, `players`, `rounds`, `player_rounds`;
set FOREIGN_KEY_CHECKS=1;

# Course Location Table (1toM w /Course)
CREATE TABLE `course_locations`(
`id` int(11) AUTO_INCREMENT NOT NULL,
`location_name` varchar(255) NOT NULL,
`city` varchar(255),
`state` varchar(2),
`street` varchar(255),
`zip` int(11),
`phone` varchar(255),
PRIMARY KEY(`id`),
CONSTRAINT courseLocationNameConstraint UNIQUE (`location_name`)
)ENGINE=InnoDB CHARACTER SET=latin1;


# Holes Table ( Mto1 w/ Course)
CREATE TABLE `holes`(
`id` int(11) AUTO_INCREMENT NOT NULL,
`course_id` int(11) NOT NULL,
`hole_number` int(11) NOT NULL, 
`handicap` float(5,2),
`par` int(11),
`blue_length` int(11),
`gold_length` int(11),
`white_length` int(11),
`red_length` int(11),
`notes` text,
PRIMARY KEY(`id`)
)ENGINE=InnoDB CHARACTER SET=latin1;

# Course Table (Mto1 w/ Course Location; 1toM w/ holes)
CREATE TABLE `courses`(
`id` int(11) AUTO_INCREMENT NOT NULL,
`course_name` varchar(255) NOT NULL,
`rating` float(5,2),
`par` int(11),
`yards` int(11),
`slope` float(5,2),
`location_id` int(11),
`image_ref` varchar(255),
`hole_1` int(11),
`hole_2` int(11),
`hole_3` int(11),
`hole_4` int(11),
`hole_5` int(11),
`hole_6` int(11),
`hole_7` int(11),
`hole_8` int(11),
`hole_9` int(11),
`hole_10` int(11),
`hole_11` int(11),
`hole_12` int(11),
`hole_13` int(11),
`hole_14` int(11),
`hole_15` int(11),
`hole_16` int(11),
`hole_17` int(11),
`hole_18` int(11),
FOREIGN KEY (`hole_1`) REFERENCES `holes`(`id`) ON UPDATE CASCADE ON DELETE SET NULL,
FOREIGN KEY (`hole_2`) REFERENCES `holes`(`id`) ON UPDATE CASCADE ON DELETE SET NULL,
FOREIGN KEY (`hole_2`) REFERENCES `holes`(`id`) ON UPDATE CASCADE ON DELETE SET NULL,
FOREIGN KEY (`hole_3`) REFERENCES `holes`(`id`) ON UPDATE CASCADE ON DELETE SET NULL,
FOREIGN KEY (`hole_4`) REFERENCES `holes`(`id`) ON UPDATE CASCADE ON DELETE SET NULL,
FOREIGN KEY (`hole_5`) REFERENCES `holes`(`id`) ON UPDATE CASCADE ON DELETE SET NULL,
FOREIGN KEY (`hole_6`) REFERENCES `holes`(`id`) ON UPDATE CASCADE ON DELETE SET NULL,
FOREIGN KEY (`hole_7`) REFERENCES `holes`(`id`) ON UPDATE CASCADE ON DELETE SET NULL,
FOREIGN KEY (`hole_8`) REFERENCES `holes`(`id`) ON UPDATE CASCADE ON DELETE SET NULL,
FOREIGN KEY (`hole_9`) REFERENCES `holes`(`id`) ON UPDATE CASCADE ON DELETE SET NULL,
FOREIGN KEY (`hole_10`) REFERENCES `holes`(`id`) ON UPDATE CASCADE ON DELETE SET NULL,
FOREIGN KEY (`hole_11`) REFERENCES `holes`(`id`) ON UPDATE CASCADE ON DELETE SET NULL,
FOREIGN KEY (`hole_12`) REFERENCES `holes`(`id`) ON UPDATE CASCADE ON DELETE SET NULL,
FOREIGN KEY (`hole_13`) REFERENCES `holes`(`id`) ON UPDATE CASCADE ON DELETE SET NULL,
FOREIGN KEY (`hole_14`) REFERENCES `holes`(`id`) ON UPDATE CASCADE ON DELETE SET NULL,
FOREIGN KEY (`hole_15`) REFERENCES `holes`(`id`) ON UPDATE CASCADE ON DELETE SET NULL,
FOREIGN KEY (`hole_16`) REFERENCES `holes`(`id`) ON UPDATE CASCADE ON DELETE SET NULL,
FOREIGN KEY (`hole_17`) REFERENCES `holes`(`id`) ON UPDATE CASCADE ON DELETE SET NULL,
FOREIGN KEY (`hole_18`) REFERENCES `holes`(`id`) ON UPDATE CASCADE ON DELETE SET NULL,
FOREIGN KEY (`location_id`) REFERENCES `course_locations`(`id`) ON UPDATE CASCADE ON DELETE SET NULL,
PRIMARY KEY(`id`),
CONSTRAINT courseNameConstraint UNIQUE (`course_name`)
)ENGINE=InnoDB CHARACTER SET=latin1;

# Player Table (Mto1 w/ Round; 1to1 w/ Course Location)
CREATE TABLE `players`(
`id` int(11) AUTO_INCREMENT NOT NULL,
`fname` varchar(255) NOT NULL,
`lname` varchar(255) NOT NULL,
`age` int(11),
`city` varchar(255),
`state` varchar(2),
`sex` char(1),
`home_course` int(11),
`handicap` float(5,2),
`is_pro` boolean,
FOREIGN KEY (`home_course`) REFERENCES `course_locations`(`id`) ON UPDATE CASCADE ON DELETE SET NULL,
PRIMARY KEY(`id`),
CONSTRAINT playerNameConstraint UNIQUE (`fname`, `lname`)
)ENGINE=InnoDB CHARACTER SET=latin1;


# Round Table (1toM w/ Player; 1to1 w/ Course)
CREATE TABLE `rounds`(
`id` int(11) AUTO_INCREMENT NOT NULL,
`course_id` int(11),
`tee_color` varchar(255),
`teamplay` boolean,
`handicap_score` int(11),
`play_date` date,
`hole_1_score` int(11),
`hole_2_score` int(11),
`hole_3_score` int(11),
`hole_4_score` int(11),
`hole_5_score` int(11),
`hole_6_score` int(11),
`hole_7_score` int(11),
`hole_8_score` int(11),
`hole_9_score` int(11),
`hole_10_score` int(11),
`hole_11_score` int(11),
`hole_12_score` int(11),
`hole_13_score` int(11),
`hole_14_score` int(11),
`hole_15_score` int(11),
`hole_16_score` int(11),
`hole_17_score` int(11),
`hole_18_score` int(11),
FOREIGN KEY (`course_id`) REFERENCES `courses`(`id`) ON UPDATE CASCADE ON DELETE SET NULL,
PRIMARY KEY(`id`)
)ENGINE=InnoDB CHARACTER SET=latin1;


# Player Round Table (MtoM w/ Player/Round) 
CREATE TABLE `player_rounds`(
`player_id` int(11),
`round_id` int(11),
`players` int(11),
FOREIGN KEY (`player_id`) REFERENCES `players`(`id`) ON UPDATE CASCADE ON DELETE CASCADE,
FOREIGN KEY (`round_id`) REFERENCES `rounds`(`id`) ON UPDATE CASCADE ON DELETE CASCADE,
PRIMARY KEY (`player_id`,`round_id`)
)ENGINE=InnoDB CHARACTER SET=latin1;







