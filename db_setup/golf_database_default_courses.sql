# ________________________________________________________________________________________________________________________
# __________________________________________________Course 1 Spyglass Hill________________________________________________
# ________________________________________________________________________________________________________________________
# Location
INSERT INTO `course_locations`(`location_name`,`city`,`state`,`street`,`zip`,`phone`) 
VALUES ("Spyglass Hill Golf Course","Pebble Beach","CA","3206 Stevenson Drive","93953","1(800)877-0597");
# Course
INSERT INTO `courses`(`course_name`,`rating`,`par`,`yards`,`location_id`) 
VALUES ("Spyglass Hill",75.5,72,6960,(SELECT `id` FROM `course_locations` WHERE `course_locations`.location_name="Spyglass Hill Golf Course"));
# Hole1
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`,`notes`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Spyglass Hill"), 1, 3, 5, 595, 564, 529, 487, "Treasure Island: The hole falls downhill to the left, ending on a large green whose surface resembles gentle ocean swells.");
UPDATE `courses` SET `hole_1`=LAST_INSERT_ID() WHERE `course_name`="Spyglass Hill";
# Hole2
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`,`notes`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Spyglass Hill"), 2, 13, 4, 349, 321, 293, 242, "Billy Bones: While relatively short, the hole plays uphill and is surrounded by trouble, primarily sand and ice plant.");
UPDATE `courses` SET `hole_2`=LAST_INSERT_ID() WHERE `course_name`="Spyglass Hill";
# Hole3
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`,`notes`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Spyglass Hill"), 3, 17, 3, 172, 150, 125, 90, "The Black Spot: Hole plays shorter than the yardage!");
UPDATE `courses` SET `hole_3`=LAST_INSERT_ID() WHERE `course_name`="Spyglass Hill";
# Hole4
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`,`notes`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Spyglass Hill"), 4, 9, 4, 370, 358, 345, 299, "Blind Pew");
UPDATE `courses` SET `hole_4`=LAST_INSERT_ID() WHERE `course_name`="Spyglass Hill";
# Hole5
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`,`notes`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Spyglass Hill"), 5, 15, 3, 197, 169, 134, 89, "Bird Rock");
UPDATE `courses` SET `hole_5`=LAST_INSERT_ID() WHERE `course_name`="Spyglass Hill";
# Hole6
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`,`notes`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Spyglass Hill"), 6, 7, 4, 446, 413, 379, 327, "Israel Hands");
UPDATE `courses` SET `hole_6`=LAST_INSERT_ID() WHERE `course_name`="Spyglass Hill";
# Hole7
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`,`notes`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Spyglass Hill"), 7, 11, 5, 529, 513, 480, 464, "Indian Village");
UPDATE `courses` SET `hole_7`=LAST_INSERT_ID() WHERE `course_name`="Spyglass Hill";
# Hole8
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`,`notes`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Spyglass Hill"), 8, 1, 4, 399, 375, 354, 305, "Signal Hill");
UPDATE `courses` SET `hole_8`=LAST_INSERT_ID() WHERE `course_name`="Spyglass Hill";
# Hole9
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`,`notes`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Spyglass Hill"), 9, 5, 4, 431, 414, 394, 349, "Captain Smollett");
UPDATE `courses` SET `hole_9`=LAST_INSERT_ID() WHERE `course_name`="Spyglass Hill";
# Hole10
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`,`notes`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Spyglass Hill"), 10, 12, 4, 407, 377, 366, 316, "Captain Flint");
UPDATE `courses` SET `hole_10`=LAST_INSERT_ID() WHERE `course_name`="Spyglass Hill";
# Hole11
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`,`notes`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Spyglass Hill"), 11, 10, 5, 528, 491, 463, 419, "Admiral Benbow");
UPDATE `courses` SET `hole_11`=LAST_INSERT_ID() WHERE `course_name`="Spyglass Hill";
# Hole12
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`,`notes`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Spyglass Hill"), 12, 16, 3, 178, 160, 145, 96, "Skeleton Island");
UPDATE `courses` SET `hole_12`=LAST_INSERT_ID() WHERE `course_name`="Spyglass Hill";
# Hole13
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`,`notes`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Spyglass Hill"), 13, 4, 4, 460, 435, 398, 324, "Tom Morgan");
UPDATE `courses` SET `hole_13`=LAST_INSERT_ID() WHERE `course_name`="Spyglass Hill";
# Hole14
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`,`notes`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Spyglass Hill"), 14, 6, 5, 560, 525, 514, 481, "Long John Silver");
UPDATE `courses` SET `hole_14`=LAST_INSERT_ID() WHERE `course_name`="Spyglass Hill";
# Hole15
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`,`notes`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Spyglass Hill"), 15, 18, 3, 130, 120, 98, 84, "Jim Hawkins");
UPDATE `courses` SET `hole_15`=LAST_INSERT_ID() WHERE `course_name`="Spyglass Hill";
# Hole16
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`,`notes`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Spyglass Hill"), 16, 2, 4, 476, 454, 440, 411, "Black Dog");
UPDATE `courses` SET `hole_16`=LAST_INSERT_ID() WHERE `course_name`="Spyglass Hill";
# Hole17
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`,`notes`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Spyglass Hill"), 17, 14, 4, 325, 312, 301, 266, "Ben Gunn");
UPDATE `courses` SET `hole_17`=LAST_INSERT_ID() WHERE `course_name`="Spyglass Hill";
# Hole18
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`,`notes`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Spyglass Hill"), 18, 8, 4, 408, 387, 365, 332, "Spyglass");
UPDATE `courses` SET `hole_18`=LAST_INSERT_ID() WHERE `course_name`="Spyglass Hill";


# ________________________________________________________________________________________________________________________
# __________________________________________________Course 2 Pumpkin Ridge_________________________________________________
# ________________________________________________________________________________________________________________________
# Location
INSERT INTO `course_locations`(`location_name`,`city`,`state`,`street`,`zip`,`phone`) 
VALUES ("Pumpkin Ridge","North Plains","OR","12930 NW Old Pumpkin Ridge Road","97133","1(503)647-2500");
# Course
INSERT INTO `courses`(`course_name`,`rating`,`par`,`slope`,`yards`,`location_id`) 
VALUES ("Witch Hollow",73.7,72,142,7015,(SELECT `id` FROM `course_locations` WHERE `course_locations`.location_name="Pumpkin Ridge"));
# Hole1
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Witch Hollow"), 1, 11, 4, 401, 379, 345, 318);
UPDATE `courses` SET `hole_1`=LAST_INSERT_ID() WHERE `course_name`="Witch Hollow";
# Hole2
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Witch Hollow"), 2, 17, 3, 168, 153, 137, 121);
UPDATE `courses` SET `hole_2`=LAST_INSERT_ID() WHERE `course_name`="Witch Hollow";
# Hole3
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Witch Hollow"), 3, 1, 4, 414, 386, 355, 318);
UPDATE `courses` SET `hole_3`=LAST_INSERT_ID() WHERE `course_name`="Witch Hollow";
# Hole4
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Witch Hollow"), 4, 15, 5, 533, 498, 466, 426);
UPDATE `courses` SET `hole_4`=LAST_INSERT_ID() WHERE `course_name`="Witch Hollow";
# Hole5
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Witch Hollow"), 5, 13, 3, 211, 187, 164, 143);
UPDATE `courses` SET `hole_5`=LAST_INSERT_ID() WHERE `course_name`="Witch Hollow";
# Hole6
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Witch Hollow"), 6, 3, 4, 446, 408, 378, 337);
UPDATE `courses` SET `hole_6`=LAST_INSERT_ID() WHERE `course_name`="Witch Hollow";
# Hole7
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Witch Hollow"), 7, 5, 5, 623, 564, 526, 466);
UPDATE `courses` SET `hole_7`=LAST_INSERT_ID() WHERE `course_name`="Witch Hollow";
# Hole8
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Witch Hollow"), 8, 9, 4, 382, 360, 323, 280);
UPDATE `courses` SET `hole_8`=LAST_INSERT_ID() WHERE `course_name`="Witch Hollow";
# Hole9
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Witch Hollow"), 9, 7, 4, 467, 427, 393, 353);
UPDATE `courses` SET `hole_9`=LAST_INSERT_ID() WHERE `course_name`="Witch Hollow";
# Hole10
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Witch Hollow"), 10, 14, 3, 212, 194, 166, 133);
UPDATE `courses` SET `hole_10`=LAST_INSERT_ID() WHERE `course_name`="Witch Hollow";
# Hole11
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Witch Hollow"), 11, 6, 5, 553, 531, 505, 421);
UPDATE `courses` SET `hole_11`=LAST_INSERT_ID() WHERE `course_name`="Witch Hollow";
# Hole12
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Witch Hollow"), 12, 16, 3, 158, 127, 109, 92);
UPDATE `courses` SET `hole_12`=LAST_INSERT_ID() WHERE `course_name`="Witch Hollow";
# Hole13
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Witch Hollow"), 13, 2, 4, 410, 390, 362, 295);
UPDATE `courses` SET `hole_13`=LAST_INSERT_ID() WHERE `course_name`="Witch Hollow";
# Hole14
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Witch Hollow"), 14, 10, 5, 470, 450, 423, 393);
UPDATE `courses` SET `hole_14`=LAST_INSERT_ID() WHERE `course_name`="Witch Hollow";
# Hole15
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Witch Hollow"), 15, 18, 3, 175, 157, 141, 126);
UPDATE `courses` SET `hole_15`=LAST_INSERT_ID() WHERE `course_name`="Witch Hollow";
# Hole16
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Witch Hollow"), 16, 12, 4, 432, 385, 361, 327);
UPDATE `courses` SET `hole_16`=LAST_INSERT_ID() WHERE `course_name`="Witch Hollow";
# Hole17
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Witch Hollow"), 17, 8, 4, 422, 394, 352, 318);
UPDATE `courses` SET `hole_17`=LAST_INSERT_ID() WHERE `course_name`="Witch Hollow";
# Hole18
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Witch Hollow"), 18, 4, 5, 545, 516, 494, 403);
UPDATE `courses` SET `hole_18`=LAST_INSERT_ID() WHERE `course_name`="Witch Hollow";


# ________________________________________________________________________________________________________________________
# __________________________________________________Course 3 Pumpkin Ridge_________________________________________________
# ________________________________________________________________________________________________________________________
# Course
INSERT INTO `courses`(`course_name`,`rating`,`par`,`slope`,`yards`,`location_id`) 
VALUES ("Ghost Course",74.5,71,146,6834,(SELECT `id` FROM `course_locations` WHERE `course_locations`.location_name="Pumpkin Ridge"));
# Hole1
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Ghost Course"), 1, 9, 4, 447, 392, 372, 328);
UPDATE `courses` SET `hole_1`=LAST_INSERT_ID() WHERE `course_name`="Ghost Course";
# Hole2
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Ghost Course"), 2, 11, 4, 414, 391, 364, 325);
UPDATE `courses` SET `hole_2`=LAST_INSERT_ID() WHERE `course_name`="Ghost Course";
# Hole3
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Ghost Course"), 3, 17, 3, 184, 158, 128, 108);
UPDATE `courses` SET `hole_3`=LAST_INSERT_ID() WHERE `course_name`="Ghost Course";
# Hole4
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Ghost Course"), 4, 1, 5, 533, 515, 495, 414);
UPDATE `courses` SET `hole_4`=LAST_INSERT_ID() WHERE `course_name`="Ghost Course";
# Hole5
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Ghost Course"), 5, 13, 3, 218, 193, 179, 158);
UPDATE `courses` SET `hole_5`=LAST_INSERT_ID() WHERE `course_name`="Ghost Course";
# Hole6
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Ghost Course"), 6, 15, 4, 366, 341, 316, 286);
UPDATE `courses` SET `hole_6`=LAST_INSERT_ID() WHERE `course_name`="Ghost Course";
# Hole7
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Ghost Course"), 7, 7, 4, 431, 409, 384, 301);
UPDATE `courses` SET `hole_7`=LAST_INSERT_ID() WHERE `course_name`="Ghost Course";
# Hole8
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Ghost Course"), 8, 5, 5, 573, 497, 462, 418);
UPDATE `courses` SET `hole_8`=LAST_INSERT_ID() WHERE `course_name`="Ghost Course";
# Hole9
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Ghost Course"), 9, 3, 4, 469, 443, 419, 368);
UPDATE `courses` SET `hole_9`=LAST_INSERT_ID() WHERE `course_name`="Ghost Course";
# Hole10
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Ghost Course"), 10, 6, 5, 492, 474, 453, 410);
UPDATE `courses` SET `hole_10`=LAST_INSERT_ID() WHERE `course_name`="Ghost Course";
# Hole11
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Ghost Course"), 11, 16, 3, 180, 170, 145, 122);
UPDATE `courses` SET `hole_11`=LAST_INSERT_ID() WHERE `course_name`="Ghost Course";
# Hole12
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Ghost Course"), 12, 8, 4, 444, 406, 370, 327);
UPDATE `courses` SET `hole_12`=LAST_INSERT_ID() WHERE `course_name`="Ghost Course";
# Hole13
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Ghost Course"), 13, 10, 4, 381, 356, 329, 295);
UPDATE `courses` SET `hole_13`=LAST_INSERT_ID() WHERE `course_name`="Ghost Course";
# Hole14
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Ghost Course"), 14, 14, 3, 234, 219, 201, 167);
UPDATE `courses` SET `hole_14`=LAST_INSERT_ID() WHERE `course_name`="Ghost Course";
# Hole15
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Ghost Course"), 15, 2, 5, 552, 531, 498, 421);
UPDATE `courses` SET `hole_15`=LAST_INSERT_ID() WHERE `course_name`="Ghost Course";
# Hole16
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Ghost Course"), 16, 18, 3, 133, 133, 113, 97);
UPDATE `courses` SET `hole_16`=LAST_INSERT_ID() WHERE `course_name`="Ghost Course";
# Hole17
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Ghost Course"), 17, 12, 4, 329, 301, 273, 224);
UPDATE `courses` SET `hole_17`=LAST_INSERT_ID() WHERE `course_name`="Ghost Course";
# Hole18
INSERT INTO `holes`(`course_id`,`hole_number`,`handicap`,`par`,`blue_length`,`gold_length`,`white_length`,`red_length`) 
VALUES ((SELECT `id` FROM `courses` WHERE `course_name`="Ghost Course"), 18, 4, 4, 454, 428, 381, 342);
UPDATE `courses` SET `hole_18`=LAST_INSERT_ID() WHERE `course_name`="Ghost Course";