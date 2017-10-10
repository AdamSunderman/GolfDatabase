# ________________________________________________________________________________________________________________________
# _______________________________________________________Player 1_________________________________________________________
# ________________________________________________________________________________________________________________________

INSERT INTO `players` (`fname`,`lname`,`age`,`city`,`state`,`sex`,`home_course`,`handicap`,`is_pro` ) 
VALUES (
			"Adam", 
			"Sunderman", 
			36, 
			"Salem", 
			"OR", 
			'M', 
			(SELECT `id` FROM `course_locations` WHERE `course_locations`.location_name="Pumpkin Ridge"),
			NULL, 
			0
		);

INSERT INTO `rounds`(
						`course_id`,
						`tee_color`,
						`teamplay`,
						`handicap_score`,
						`play_date`,
						`hole_1_score`,
						`hole_2_score`,
						`hole_3_score`,
						`hole_4_score`,
						`hole_5_score`,
						`hole_6_score`,
						`hole_7_score`,
						`hole_8_score`,
						`hole_9_score`,
						`hole_10_score`,
						`hole_11_score`,
						`hole_12_score`,
						`hole_13_score`,
						`hole_14_score`,
						`hole_15_score`,
						`hole_16_score`,
						`hole_17_score`,
						`hole_18_score`
					)
			VALUES  (
						(SELECT `id` FROM `courses` WHERE `courses`.course_name="Ghost Course"),
						"Blue",
						0,
						NULL,
						'2016-11-11',
						4,4,3,4,4,3,4,5,4,6,2,3,4,3,5,3,4,4
					);

INSERT INTO `player_rounds` (`player_id`, `round_id`, `players`)
VALUES (
			(SELECT `id` FROM `players` WHERE `players`.lname="Sunderman"),
			LAST_INSERT_ID(),
			1
		);

# ________________________________________________________________________________________________________________________
# _______________________________________________________Player 2_________________________________________________________
# ________________________________________________________________________________________________________________________

INSERT INTO `players` (`fname`,`lname`,`age`,`city`,`state`,`sex`,`home_course`,`handicap`,`is_pro` ) 
VALUES (
			"Jordan", 
			"Spieth", 
			24, 
			"Dallas", 
			"TX", 
			'M', 
			(SELECT `id` FROM `course_locations` WHERE `course_locations`.location_name="Spyglass Hill Golf Course"),
			NULL, 
			1
		);

INSERT INTO `rounds`(
						`course_id`,
						`tee_color`,
						`teamplay`,
						`handicap_score`,
						`play_date`,
						`hole_1_score`,
						`hole_2_score`,
						`hole_3_score`,
						`hole_4_score`,
						`hole_5_score`,
						`hole_6_score`,
						`hole_7_score`,
						`hole_8_score`,
						`hole_9_score`,
						`hole_10_score`,
						`hole_11_score`,
						`hole_12_score`,
						`hole_13_score`,
						`hole_14_score`,
						`hole_15_score`,
						`hole_16_score`,
						`hole_17_score`,
						`hole_18_score`
					)
			VALUES  (
						(SELECT `id` FROM `courses` WHERE `courses`.course_name="Spyglass Hill"),
						"Blue",
						0,
						NULL,
						'2015-11-11',
						4,4,3,4,2,3,4,4,4,3,3,3,4,4,2,3,4,3
					);

INSERT INTO `player_rounds` (`player_id`, `round_id`, `players`)
VALUES (
			(SELECT `id` FROM `players` WHERE `players`.lname="Spieth"),
			LAST_INSERT_ID(),
			1
		);

# ________________________________________________________________________________________________________________________
# _______________________________________________________Player 3_________________________________________________________
# ________________________________________________________________________________________________________________________

INSERT INTO `players` (`fname`,`lname`,`age`,`city`,`state`,`sex`,`home_course`,`handicap`,`is_pro` ) 
VALUES (
			"Phil", 
			"Mickelson", 
			47, 
			"San Diego", 
			"CA", 
			'M', 
			(SELECT `id` FROM `course_locations` WHERE `course_locations`.location_name="Spyglass Hill Golf Course"),
			NULL, 
			1
		);

INSERT INTO `rounds`(
						`course_id`,
						`tee_color`,
						`teamplay`,
						`handicap_score`,
						`play_date`,
						`hole_1_score`,
						`hole_2_score`,
						`hole_3_score`,
						`hole_4_score`,
						`hole_5_score`,
						`hole_6_score`,
						`hole_7_score`,
						`hole_8_score`,
						`hole_9_score`,
						`hole_10_score`,
						`hole_11_score`,
						`hole_12_score`,
						`hole_13_score`,
						`hole_14_score`,
						`hole_15_score`,
						`hole_16_score`,
						`hole_17_score`,
						`hole_18_score`
					)
			VALUES  (
						(SELECT `id` FROM `courses` WHERE `courses`.course_name="Spyglass Hill"),
						"Blue",
						0,
						NULL,
						'2015-10-08',
						4,3,3,4,2,3,4,4,4,3,3,3,4,4,2,3,4,4
					);

INSERT INTO `player_rounds` (`player_id`, `round_id`, `players`)
VALUES (
			(SELECT `id` FROM `players` WHERE `players`.lname="Mickelson"),
			LAST_INSERT_ID(),
			1
		);