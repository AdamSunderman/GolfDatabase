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
	$nums=array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18);
	$newcourseid=null;
	$newcourselocationid=null;
	$h1=null;
	$h2=null;
	$h3=null;
	$h4=null;
	$h5=null;
	$h6=null;
	$h7=null;
	$h8=null;
	$h9=null;
	$h10=null;
	$h11=null;
	$h12=null;
	$h13=null;
	$h14=null;
	$h15=null;
	$h16=null;
	$h17=null;
	$h18=null;
	if(!($_POST['locationid'])){
		if(!$conn){
			echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
		}	
		if(!($stmt = $conn->prepare("INSERT INTO course_locations (location_name, city, state, street, zip, phone) VALUES (?,?,?,?,?,?)"))){
			echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!($stmt->bind_param("ssssis",$_POST['locationname'],$_POST['city'],$_POST['state'],$_POST['address'],$_POST['zipcode'],$_POST['phone']))){
			echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!$stmt->execute()){
			echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
		} 
		else {
			print "Added " . $stmt->affected_rows .  "(" . $stmt->insert_id . ")" .  " rows to locations.";
			$newcourselocationid=$stmt->insert_id;
		}
		$stmt->close();
		if(!$conn){
			echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
		}	
		if(!($stmt = $conn->prepare("INSERT INTO courses (course_name, rating, par, yards, slope, location_id) VALUES (?,?,?,?,?,?)"))){
			echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!($stmt->bind_param("sdiidi",$_POST['coursename'],$_POST['rating'],$_POST['coursepar'],$_POST['yards'],$_POST['slope'],$newcourselocationid))){
			echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!$stmt->execute()){
			echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
		} 
		else {
			print "Added " . $stmt->affected_rows . "(" . $stmt->insert_id . ")" . " rows to courses.";
			$newcourseid=$stmt->insert_id;
		}
		$stmt->close();
	}else{
		if(!$conn){
			echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
		}	
		if(!($stmt = $conn->prepare("INSERT INTO courses (course_name, rating, par, yards, slope, location_id) VALUES (?,?,?,?,?,?)"))){
			echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!($stmt->bind_param("sdiidi",$_POST['coursename'],$_POST['rating'],$_POST['coursepar'],$_POST['yards'],$_POST['slope'],$_POST['locationid']))){
			echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!$stmt->execute()){
			echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
		} 
		else {
			print "Added " . $stmt->affected_rows . "(" . $stmt->insert_id . ")" . " rows to courses.";
			$newcourseid=$stmt->insert_id;
		}
		$stmt->close();
	}
	if($newcourseid){
		if(!$conn){
			echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
		}	
		if(!($stmt = $conn->prepare("INSERT INTO holes (course_id, hole_number, handicap, par, blue_length, gold_length, white_length, red_length, notes) VALUES (?,?,?,?,?,?,?,?,?)"))){
			echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!($stmt->bind_param("iidiiiiis",$newcourseid,$nums[0],$_POST['hole1handicap'],$_POST['hole1par'],$_POST['hole1blue'],$_POST['hole1gold'],$_POST['hole1white'],$_POST['hole1red'],$_POST['hole1notes']))){
			echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!$stmt->execute()){
			echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
		} 
		else {
			print "Added " . $stmt->affected_rows . "(" . $stmt->insert_id . ")" . " rows to holes.";
			$h1=$stmt->insert_id;
		}
		if(!($stmt->bind_param("iidiiiiis",$newcourseid,$nums[1],$_POST['hole2handicap'],$_POST['hole2par'],$_POST['hole2blue'],$_POST['hole2gold'],$_POST['hole2white'],$_POST['hole2red'],$_POST['hole2notes']))){
			echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!$stmt->execute()){
			echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
		} 
		else {
			print "Added " . $stmt->affected_rows . "(" . $stmt->insert_id . ")" . " rows to holes.";
			$h2=$stmt->insert_id;
		}
		if(!($stmt->bind_param("iidiiiiis",$newcourseid,$nums[2],$_POST['hole3handicap'],$_POST['hole3par'],$_POST['hole3blue'],$_POST['hole3gold'],$_POST['hole3white'],$_POST['hole3red'],$_POST['hole3notes']))){
			echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!$stmt->execute()){
			echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
		} 
		else {
			print "Added " . $stmt->affected_rows . "(" . $stmt->insert_id . ")" . " rows to holes.";
			$h3=$stmt->insert_id;
		}
		if(!($stmt->bind_param("iidiiiiis",$newcourseid,$nums[3],$_POST['hole4handicap'],$_POST['hole4par'],$_POST['hole4blue'],$_POST['hole4gold'],$_POST['hole4white'],$_POST['hole4red'],$_POST['hole4notes']))){
			echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!$stmt->execute()){
			echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
		} 
		else {
			print "Added " . $stmt->affected_rows . "(" . $stmt->insert_id . ")" . " rows to holes.";
			$h4=$stmt->insert_id;
		}
		if(!($stmt->bind_param("iidiiiiis",$newcourseid,$nums[4],$_POST['hole5handicap'],$_POST['hole5par'],$_POST['hole5blue'],$_POST['hole5gold'],$_POST['hole5white'],$_POST['hole5red'],$_POST['hole5notes']))){
			echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!$stmt->execute()){
			echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
		} 
		else {
			print "Added " . $stmt->affected_rows . "(" . $stmt->insert_id . ")" . " rows to holes.";
			$h5=$stmt->insert_id;
		}
		if(!($stmt->bind_param("iidiiiiis",$newcourseid,$nums[5],$_POST['hole6handicap'],$_POST['hole6par'],$_POST['hole6blue'],$_POST['hole6gold'],$_POST['hole6white'],$_POST['hole6red'],$_POST['hole6notes']))){
			echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!$stmt->execute()){
			echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
		} 
		else {
			print "Added " . $stmt->affected_rows . "(" . $stmt->insert_id . ")" . " rows to holes.";
			$h6=$stmt->insert_id;
		}
		if(!($stmt->bind_param("iidiiiiis",$newcourseid,$nums[6],$_POST['hole7handicap'],$_POST['hole7par'],$_POST['hole7blue'],$_POST['hole7gold'],$_POST['hole7white'],$_POST['hole7red'],$_POST['hole7notes']))){
			echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!$stmt->execute()){
			echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
		} 
		else {
			print "Added " . $stmt->affected_rows . "(" . $stmt->insert_id . ")" . " rows to holes.";
			$h7=$stmt->insert_id;
		}
		if(!($stmt->bind_param("iidiiiiis",$newcourseid,$nums[7],$_POST['hole8handicap'],$_POST['hole8par'],$_POST['hole8blue'],$_POST['hole8gold'],$_POST['hole8white'],$_POST['hole8red'],$_POST['hole8notes']))){
			echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!$stmt->execute()){
			echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
		} 
		else {
			print "Added " . $stmt->affected_rows . "(" . $stmt->insert_id . ")" . " rows to holes.";
			$h8=$stmt->insert_id;
		}
		if(!($stmt->bind_param("iidiiiiis",$newcourseid,$nums[8],$_POST['hole9handicap'],$_POST['hole9par'],$_POST['hole9blue'],$_POST['hole9gold'],$_POST['hole9white'],$_POST['hole9red'],$_POST['hole9notes']))){
			echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!$stmt->execute()){
			echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
		} 
		else {
			print "Added " . $stmt->affected_rows . "(" . $stmt->insert_id . ")" . " rows to holes.";
			$h9=$stmt->insert_id;
		}
		if(!($stmt->bind_param("iidiiiiis",$newcourseid,$nums[9],$_POST['hole10handicap'],$_POST['hole10par'],$_POST['hole10blue'],$_POST['hole10gold'],$_POST['hole10white'],$_POST['hole10red'],$_POST['hole10notes']))){
			echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!$stmt->execute()){
			echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
		} 
		else {
			print "Added " . $stmt->affected_rows . "(" . $stmt->insert_id . ")" . " rows to holes.";
			$h10=$stmt->insert_id;
		}
		if(!($stmt->bind_param("iidiiiiis",$newcourseid,$nums[10],$_POST['hole11handicap'],$_POST['hole11par'],$_POST['hole11blue'],$_POST['hole11gold'],$_POST['hole11white'],$_POST['hole11red'],$_POST['hole11notes']))){
			echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!$stmt->execute()){
			echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
		} 
		else {
			print "Added " . $stmt->affected_rows . "(" . $stmt->insert_id . ")" . " rows to holes.";
			$h11=$stmt->insert_id;
		}
		if(!($stmt->bind_param("iidiiiiis",$newcourseid,$nums[11],$_POST['hole12handicap'],$_POST['hole12par'],$_POST['hole12blue'],$_POST['hole12gold'],$_POST['hole12white'],$_POST['hole12red'],$_POST['hole12notes']))){
			echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!$stmt->execute()){
			echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
		} 
		else {
			print "Added " . $stmt->affected_rows . "(" . $stmt->insert_id . ")" . " rows to holes.";
			$h12=$stmt->insert_id;
		}
		if(!($stmt->bind_param("iidiiiiis",$newcourseid,$nums[12],$_POST['hole13handicap'],$_POST['hole13par'],$_POST['hole13blue'],$_POST['hole13gold'],$_POST['hole13white'],$_POST['hole13red'],$_POST['hole13notes']))){
			echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!$stmt->execute()){
			echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
		} 
		else {
			print "Added " . $stmt->affected_rows . "(" . $stmt->insert_id . ")" . " rows to holes.";
			$h13=$stmt->insert_id;
		}
		if(!($stmt->bind_param("iidiiiiis",$newcourseid,$nums[13],$_POST['hole14handicap'],$_POST['hole14par'],$_POST['hole14blue'],$_POST['hole14gold'],$_POST['hole14white'],$_POST['hole14red'],$_POST['hole14notes']))){
			echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!$stmt->execute()){
			echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
		} 
		else {
			print "Added " . $stmt->affected_rows . "(" . $stmt->insert_id . ")" . " rows to holes.";
			$h14=$stmt->insert_id;
		}
		if(!($stmt->bind_param("iidiiiiis",$newcourseid,$nums[14],$_POST['hole15handicap'],$_POST['hole15par'],$_POST['hole15blue'],$_POST['hole15gold'],$_POST['hole15white'],$_POST['hole15red'],$_POST['hole15notes']))){
			echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!$stmt->execute()){
			echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
		} 
		else {
			print "Added " . $stmt->affected_rows . "(" . $stmt->insert_id . ")" . " rows to holes.";
			$h15=$stmt->insert_id;
		}
		if(!($stmt->bind_param("iidiiiiis",$newcourseid,$nums[15],$_POST['hole16handicap'],$_POST['hole16par'],$_POST['hole16blue'],$_POST['hole16gold'],$_POST['hole16white'],$_POST['hole16red'],$_POST['hole16notes']))){
			echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!$stmt->execute()){
			echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
		} 
		else {
			print "Added " . $stmt->affected_rows . "(" . $stmt->insert_id . ")" . " rows to holes.";
			$h16=$stmt->insert_id;
		}
		if(!($stmt->bind_param("iidiiiiis",$newcourseid,$nums[16],$_POST['hole17handicap'],$_POST['hole17par'],$_POST['hole17blue'],$_POST['hole17gold'],$_POST['hole17white'],$_POST['hole17red'],$_POST['hole17notes']))){
			echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!$stmt->execute()){
			echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
		} 
		else {
			print "Added " . $stmt->affected_rows . "(" . $stmt->insert_id . ")" . " rows to holes.";
			$h17=$stmt->insert_id;
		}
		if(!($stmt->bind_param("iidiiiiis",$newcourseid,$nums[17],$_POST['hole18handicap'],$_POST['hole18par'],$_POST['hole18blue'],$_POST['hole18gold'],$_POST['hole18white'],$_POST['hole18red'],$_POST['hole18notes']))){
			echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!$stmt->execute()){
			echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
		} 
		else {
			print "Added " . $stmt->affected_rows . "(" . $stmt->insert_id . ")" . " rows to holes.";
			$h18=$stmt->insert_id;
		}
		$stmt->close();

		if($h1 && $h2 && $h3 && $h4 && $h5 && $h6 && $h7 && $h8 && $h9 && $h10 && $h11 && $h12 && $h13 && $h14 && $h15 && $h16 && $h17 && $h18){
			if(!$conn){
				echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}	
			if(!($stmt = $conn->prepare("UPDATE courses SET hole_1=?, hole_2=?, hole_3=?, hole_4=?, hole_5=?, hole_6=?, hole_7=?, hole_8=?, hole_9=?, hole_10=?, hole_11=?, hole_12=?, hole_13=?, hole_14=?, hole_15=?, hole_16=?, hole_17=?, hole_18=? WHERE courses.id=?"))){
				echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
			}
			if(!($stmt->bind_param("iiiiiiiiiiiiiiiiiii", $h1, $h2, $h3, $h4, $h5, $h6, $h7, $h8, $h9, $h10, $h11, $h12, $h13, $h14, $h15, $h16, $h17, $h18, $newcourseid))){
				echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
			}
			if(!$stmt->execute()){
				echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
			} 
			else {
				print "Updated " . $stmt->affected_rows . " rows in courses.";
			}
			$stmt->close();
		}
	}
?>
</body>
</html>