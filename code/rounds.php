<?php
	require ("config.php");
	ini_set('display_errors', 'On');
	$conn = new mysqli(mHOST,mDB,mPASS,mUSER);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	<link rel="stylesheet" type="text/css" href="styles/gdb.css">
	<title>Golf DB Rounds</title>
</head>
<body>
	<!-- Links to other pages -->
	<div>
		Quick Links:  <a href="home.php"><font color="0000FF">Home</font></a>  <a href="players.php"><font color="0000FF">Players</font></a>  <a href="courses.php"><font color="0000FF">Courses</font></a>
	</div>
	<br>
	<!-- Iframe for table data-->
	<iframe height="200px" width="100%" src="roundtable.php" name="table"></iframe>
	<!-- Reset table/remove filters iframe-->
	<form method="get" action="roundtable.php" target="table">
		<p><a href="roundtable.php" target="table"><font color="0000FF">Update Table/Remove Filters</font></a></p>
	</form>
	<section>
		<form method="get" action="roundtable.php" target="table">
			<fieldset>
				<legend><b>Filter Rounds By One Or More Conditions</b></legend>
				By Player : <select name="name">
					<option value="">Any</option>
					<?php
						if(!($stmt = $conn->prepare("SELECT p.fname, p.lname FROM players p JOIN player_rounds pr ON pr.player_id=p.id WHERE p.id=pr.player_id"))){
							echo "Prepare failed: "  . $conn->errno . " " . $conn->error;
						}
						if(!$stmt->execute()){
							echo "Execute failed: "  . $stmt->connect_errno . " " . $stmt->connect_error;
						}
						if(!$stmt->bind_result($fname, $lname)){
							echo "Bind failed: "  . $stmt->connect_errno . " " . $stmt->connect_error;
						}
						while($stmt->fetch()){
							echo '<option value="' . $fname . ' ' . $lname . '"> ' . $fname . ' ' . $lname . ' </option>\n';
						}
						$stmt->close();
					?>
				</select>
				<input type="reset" name="Reset Filter" style="color: red;">
				<input type="submit" name="Apply Filter" style="color: green;">
			</fieldset>
		</form>
	</section>
	<br>
	<section>
		<form>
			<fieldset method="post" action="addround.php" target="table">
				<legend><b>Add New Round * Follow Steps And Paths *</b> </legend>
				<fieldset>
					<legend><b>Step 1: Pick A Player</b></legend>
					<p>
					Pick A Player To Add A Round For: <select name="playerid">
					<?php
						if(!($stmt = $conn->prepare("SELECT p.id, CONCAT(p.fname,' ',p.lname) as name FROM players p"))){
							echo "Prepare failed: "  . $conn->errno . " " . $conn->error;
						}
						if(!$stmt->execute()){
							echo "Execute failed: "  . $stmt->connect_errno . " " . $stmt->connect_error;
						}
						if(!$stmt->bind_result($id, $name)){
							echo "Bind failed: "  . $stmt->connect_errno . " " . $stmt->connect_error;
						}
						while($stmt->fetch()){
							echo '<option value="' . $id . '"> ' . $name  . ' </option>\n';
						}
						$stmt->close();
					?>	
					</select>
					</p>
				</fieldset>
				<fieldset>
					<legend><b>Step 2, Path 1: Add Player As A Teammate On A Stored Round</b></legend>
					<p>
						Pick A Round To Add The Player To: <select name="roundid">
							<option value="">None / Taking Path 2</option>
								<?php
									if(!($stmt = $conn->prepare("SELECT r.id, p.fname, p.lname, c.course_name, r.play_date FROM rounds r JOIN player_rounds pr ON r.id=pr.round_id INNER JOIN players p ON p.id=pr.player_id INNER JOIN courses c ON c.id=r.course_id"))){
									echo "Prepare failed: "  . $conn->errno . " " . $conn->error;
									}
									if(!$stmt->execute()){
										echo "Execute failed: "  . $stmt->connect_errno . " " . $stmt->connect_error;
									}
									if(!$stmt->bind_result($id, $fname, $lname, $course_name, $play_date)){
										echo "Bind failed: "  . $stmt->connect_errno . " " . $stmt->connect_error;
									}
									while($stmt->fetch()){
										echo '<option value="' . $id . '"> ' . 'Teammate: ' . $fname . ' ' . $lname  . ' | Course: ' . $course_name . ' | Date: ' . $play_date . ' </option>\n';
									}
									$stmt->close();
								?>	
						</select>
					</p>
				</fieldset>
				<fieldset>
					<legend><b>Step 2, Path 2: Enter A New Round For The Player</b></legend>
					<p>
					Course Played : <select name="coursename">
					<option value="">None / Taking Path 1</option>
					<?php
						if(!($stmt = $conn->prepare("SELECT c.id, cl.location_name, c.course_name FROM courses c INNER JOIN course_locations cl ON cl.id=c.location_id"))){
							echo "Prepare failed: "  . $conn->errno . " " . $conn->error;
						}
						if(!$stmt->execute()){
							echo "Execute failed: "  . $stmt->connect_errno . " " . $stmt->connect_error;
						}
						if(!$stmt->bind_result($id, $location_name, $course_name)){
							echo "Bind failed: "  . $stmt->connect_errno . " " . $stmt->connect_error;
						}
						while($stmt->fetch()){
							echo '<option value="' . $id . '"> ' . $location_name . ', ' . $course_name  . ' </option>\n';
						}
						$stmt->close();
					?>	
					</select><br>
					</p>
				</fieldset>
			</fieldset>
		</form>
	</section>
</body>
</html>