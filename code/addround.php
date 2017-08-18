<?php
	require ("config.php");
	ini_set('display_errors', 'On');
	$conn = new mysqli(mHOST,mDB,mPASS,mUSER);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	<link rel="stylesheet" type="text/css" href="styles/gdb.css">
	<title>Insert Tab Title Here</title>
</head>
<body>
<?php
	#- If roundid is set then add the player to an existing round as a teammate.
	if( (isset($_POST['roundid']) && isset($_POST['playerid'])) && ($_POST['roundid'] != "" && $_POST['playerid'] != "") ){
		$rid=trim($_POST['roundid']);
		$pid=trim($_POST['playerid']);
		$p=1;
		if(!$conn){
			echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
		}	
		if(!($stmt = $conn->prepare("INSERT INTO player_rounds (player_id, round_id, players) VALUES (?,?,?)"))){
			echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!($stmt->bind_param("iii", $pid, $rid, $p))){
			echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!$stmt->execute()){
			echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
		} 
		else {
			echo "Added " . $stmt->affected_rows . " rows to Player Rounds.\n";
		}
		$stmt->close();
		if(!$conn){
			echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
		}	
		if(!($stmt = $conn->prepare("UPDATE rounds SET teamplay=1 WHERE rounds.id=?"))){
			echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!($stmt->bind_param("i", $rid))){
			echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!$stmt->execute()){
			echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
		} 
		else {
			echo "Updated " . $stmt->affected_rows . " rows in Rounds.";
		}
		$stmt->close();
	}
	#- If courseid is set then add the player to a new round at the courseid sent.
	elseif( (isset($_POST['courseid']) && isset($_POST['playerid'])) && ($_POST['courseid'] != "" && $_POST['playerid'] != "") ){
		$cid=trim($_POST['courseid']);
		$pid=trim($_POST['playerid']);
		$tc=trim($_POST['teecolor']);
		$tp=0;
		$s1=trim($_POST['score1']);
		$s2=trim($_POST['score2']);
		$s3=trim($_POST['score3']);
		$s4=trim($_POST['score4']);
		$s5=trim($_POST['score5']);
		$s6=trim($_POST['score6']);
		$s7=trim($_POST['score7']);
		$s8=trim($_POST['score8']);
		$s9=trim($_POST['score9']);
		$s10=trim($_POST['score10']);
		$s11=trim($_POST['score11']);
		$s12=trim($_POST['score12']);
		$s13=trim($_POST['score13']);
		$s14=trim($_POST['score14']);
		$s15=trim($_POST['score15']);
		$s16=trim($_POST['score16']);
		$s17=trim($_POST['score17']);
		$s18=trim($_POST['score18']);
		$rid=0;
		$p=1;
		if(!$conn){
			echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
		}	
		if(!($stmt = $conn->prepare("INSERT INTO rounds (course_id, tee_color, teamplay, play_date, hole_1_score, hole_2_score, hole_3_score, hole_4_score, hole_5_score, hole_6_score, hole_7_score, hole_8_score, hole_9_score, hole_10_score, hole_11_score, hole_12_score, hole_13_score, hole_14_score, hole_15_score, hole_16_score, hole_17_score, hole_18_score) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"))){
			echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!($stmt->bind_param("isisiiiiiiiiiiiiiiiiii", $cid, $tc, $tp, $_POST['playdate'], $s1, $s2, $s3, $s4, $s5, $s6, $s7, $s8, $s9, $s10, $s11, $s12, $s13, $s14, $s15, $s16, $s17, $s18))){
			echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!$stmt->execute()){
			echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
		} 
		else {
			echo "Added " . $stmt->affected_rows . " rows to Rounds.\n";
			$rid=$stmt->insert_id;
		}
		$stmt->close();
		if(!$conn){
			echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
		}	
		if(!($stmt = $conn->prepare("INSERT INTO player_rounds (player_id, round_id, players) VALUES (?,?,?)"))){
			echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!($stmt->bind_param("iii", $pid, $rid, $p))){
			echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!$stmt->execute()){
			echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
		} 
		else {
			echo "Added " . $stmt->affected_rows . " rows to Player Rounds.";
			$rid=$stmt->insert_id;
		}
		$stmt->close();
	}		
	$_POST=array();
?>
</body>
</html>