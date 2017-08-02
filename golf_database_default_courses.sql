#________________________________________________________________________________________________________________________
#__________________________________________________Course 1 Spyglass Hill________________________________________________
#________________________________________________________________________________________________________________________
#Location
INSERT INTO `course_locations`(`location_name`,`city`,`state`,`street`,`zip`,`phone`) 
VALUES ("Spyglass Hill Golf Course","Pebble Beach","CA","3206 Stevenson Drive","93953","1(800)877-0597");
#Course
INSERT INTO `courses`(`course_name`,`rating`,`par`,`yards`,`location_id`) 
VALUES ("Spyglass Hill",75.5,72,6960,LAST_INSERT_ID());
#Hole1
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`,`notes`) 
VALUES (LAST_INSERT_ID(), 1, 3, 5, 595, 564, 529, 487, "Treasure Island: The hole falls downhill to the left, ending on a large green whose surface resembles gentle ocean swells.");
UPDATE `courses` SET `hole_1`=LAST_INSERT_ID() WHERE `course_name`="Spyglass Hill";
#Hole2
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`,`notes`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Spyglass Hill"), 2, 13, 4, 349, 321, 293, 242, "Billy Bones: While relatively short, the hole plays uphill and is surrounded by trouble, primarily sand and ice plant.");
UPDATE `courses` SET `hole_2`=LAST_INSERT_ID() WHERE `course_name`="Spyglass Hill";
#Hole3
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`,`notes`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Spyglass Hill"), 3, 17, 3, 172, 150, 125, 90, "The Black Spot: Hole plays shorter than the yardage!");
UPDATE `courses` SET `hole_3`=LAST_INSERT_ID() WHERE `course_name`="Spyglass Hill";
#Hole4
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`,`notes`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Spyglass Hill"), 4, 9, 4, 370, 358, 345, 299, "Blind Pew");
UPDATE `courses` SET `hole_4`=LAST_INSERT_ID() WHERE `course_name`="Spyglass Hill";
#Hole5
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`,`notes`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Spyglass Hill"), 5, 15, 3, 197, 169, 134, 89, "Bird Rock");
UPDATE `courses` SET `hole_5`=LAST_INSERT_ID() WHERE `course_name`="Spyglass Hill";
#Hole6
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`,`notes`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Spyglass Hill"), 6, 7, 4, 446, 413, 379, 327, "Israel Hands");
UPDATE `courses` SET `hole_6`=LAST_INSERT_ID() WHERE `course_name`="Spyglass Hill";
#Hole7
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`,`notes`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Spyglass Hill"), 7, 11, 5, 529, 513, 480, 464, "Indian Village");
UPDATE `courses` SET `hole_7`=LAST_INSERT_ID() WHERE `course_name`="Spyglass Hill";
#Hole8
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`,`notes`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Spyglass Hill"), 8, 1, 4, 399, 375, 354, 305, "Signal Hill");
UPDATE `courses` SET `hole_8`=LAST_INSERT_ID() WHERE `course_name`="Spyglass Hill";
#Hole9
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`,`notes`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Spyglass Hill"), 9, 5, 4, 431, 414, 394, 349, "Captain Smollett");
UPDATE `courses` SET `hole_9`=LAST_INSERT_ID() WHERE `course_name`="Spyglass Hill";
#Hole10
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`,`notes`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Spyglass Hill"), 10, 12, 4, 407, 377, 366, 316, "Captain Flint");
UPDATE `courses` SET `hole_10`=LAST_INSERT_ID() WHERE `course_name`="Spyglass Hill";
#Hole11
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`,`notes`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Spyglass Hill"), 11, 10, 5, 528, 491, 463, 419, "Admiral Benbow");
UPDATE `courses` SET `hole_11`=LAST_INSERT_ID() WHERE `course_name`="Spyglass Hill";
#Hole12
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`,`notes`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Spyglass Hill"), 12, 16, 3, 178, 160, 145, 96, "Skeleton Island");
UPDATE `courses` SET `hole_12`=LAST_INSERT_ID() WHERE `course_name`="Spyglass Hill";
#Hole13
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`,`notes`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Spyglass Hill"), 13, 4, 4, 460, 435, 398, 324, "Tom Morgan");
UPDATE `courses` SET `hole_13`=LAST_INSERT_ID() WHERE `course_name`="Spyglass Hill";
#Hole14
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`,`notes`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Spyglass Hill"), 14, 6, 5, 560, 525, 514, 481, "Long John Silver");
UPDATE `courses` SET `hole_14`=LAST_INSERT_ID() WHERE `course_name`="Spyglass Hill";
#Hole15
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`,`notes`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Spyglass Hill"), 15, 18, 3, 130, 120, 98, 84, "Jim Hawkins");
UPDATE `courses` SET `hole_15`=LAST_INSERT_ID() WHERE `course_name`="Spyglass Hill";
#Hole16
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`,`notes`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Spyglass Hill"), 16, 2, 4, 476, 454, 440, 411, "Black Dog");
UPDATE `courses` SET `hole_16`=LAST_INSERT_ID() WHERE `course_name`="Spyglass Hill";
#Hole17
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`,`notes`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Spyglass Hill"), 17, 14, 4, 325, 312, 301, 266, "Ben Gunn");
UPDATE `courses` SET `hole_17`=LAST_INSERT_ID() WHERE `course_name`="Spyglass Hill";
#Hole18
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`,`notes`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Spyglass Hill"), 18, 8, 4, 408, 387, 365, 332, "Spyglass");
UPDATE `courses` SET `hole_18`=LAST_INSERT_ID() WHERE `course_name`="Spyglass Hill";