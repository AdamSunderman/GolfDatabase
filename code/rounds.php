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
		<form method="get" action="roundtable.php" target="table" style="width: 40%;">
			<fieldset>
				<legend style="font-size: 16pt;"><b>Filter Rounds</b></legend>
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
				<input type="submit" value="Apply Filter" style="color: green;">
				<input type="reset" value="Reset Filter" style="color: red;">
			</fieldset>
		</form>
	</section>
	<br>
	<section>
		<form method="post" action="addround.php" target="table">
			<fieldset>
				<legend style="font-size: 16pt;"><b>Add New Round * Follow Steps And Paths *</b> </legend>
				<fieldset>
					<legend><b>Step 1: Pick A Player</b></legend>
					<p>
					Pick A Player To Add A Round For: <select name="playerid">
						<option value="">Choose</option>
						<?php
							if(!($stmt = $conn->prepare("SELECT p.id, CONCAT(p.fname,' ',p.lname) as name FROM players p ORDER BY p.lname"))){
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
				</fieldset><br>
				<fieldset>
					<legend><b>Step 2, Path 1: Add Player As A Teammate On A Stored Round</b></legend>
					<p>
						Pick A Round To Add The Player To: <select name="roundid">
							<option value="">None / Taking Path 2</option>
								<?php
									if(!($stmt = $conn->prepare("SELECT r.id, c.course_name, r.play_date FROM rounds r JOIN player_rounds pr ON r.id=pr.round_id INNER JOIN players p ON p.id=pr.player_id INNER JOIN courses c ON c.id=r.course_id"))){
									echo "Prepare failed: "  . $conn->errno . " " . $conn->error;
									}
									if(!$stmt->execute()){
										echo "Execute failed: "  . $stmt->connect_errno . " " . $stmt->connect_error;
									}
									if(!$stmt->bind_result($id, $course_name, $play_date)){
										echo "Bind failed: "  . $stmt->connect_errno . " " . $stmt->connect_error;
									}
									while($stmt->fetch()){
										echo '<option value="' . $id . '"> Course: ' . $course_name . ' | Date: ' . $play_date . ' </option>\n';
									}
									$stmt->close();
								?>	
						</select>
					</p>
				</fieldset><br>
				<fieldset>
					<legend><b>Step 2, Path 2: Enter A New Round For The Player</b></legend>
					<p>
					Course Played : <select name="courseid" style="margin-right: 15px;">
					<option value="">None / Taking Path 1</option>
					<?php
						if(!($stmt = $conn->prepare("SELECT DISTINCT c.id, concat(cl.location_name,', ',c.course_name) as name, c.par, IF(c.hole_1>-1,(SELECT h.par FROM holes h WHERE h.id=c.hole_1),c.hole_1) as `hole1`, IF(c.hole_2>-1,(SELECT h.par FROM holes h WHERE h.id=c.hole_2),c.hole_2) as `hole2`, IF(c.hole_3>-1,(SELECT h.par FROM holes h WHERE h.id=c.hole_3),c.hole_3) as `hole3`, IF(c.hole_4>-1,(SELECT h.par FROM holes h WHERE h.id=c.hole_4),c.hole_4) as `hole4`, IF(c.hole_5>-1,(SELECT h.par FROM holes h WHERE h.id=c.hole_5),c.hole_5) as `hole5`, IF(c.hole_6>-1,(SELECT h.par FROM holes h WHERE h.id=c.hole_6),c.hole_6) as `hole6`, IF(c.hole_7>-1,(SELECT h.par FROM holes h WHERE h.id=c.hole_7),c.hole_7) as `hole7`, IF(c.hole_8>-1,(SELECT h.par FROM holes h WHERE h.id=c.hole_8),c.hole_8) as `hole8`, IF(c.hole_9>-1,(SELECT h.par FROM holes h WHERE h.id=c.hole_9),c.hole_9) as `hole9`, IF(c.hole_10>-1,(SELECT h.par FROM holes h WHERE h.id=c.hole_10),c.hole_10) as `hole10`, IF(c.hole_11>-1,(SELECT h.par FROM holes h WHERE h.id=c.hole_11),c.hole_11) as `hole11`, IF(c.hole_12>-1,(SELECT h.par FROM holes h WHERE h.id=c.hole_12),c.hole_12) as `hole12`, IF(c.hole_13>-1,(SELECT h.par FROM holes h WHERE h.id=c.hole_13),c.hole_13) as `hole13`, IF(c.hole_14>-1,(SELECT h.par FROM holes h WHERE h.id=c.hole_14),c.hole_14) as `hole14`, IF(c.hole_15>-1,(SELECT h.par FROM holes h WHERE h.id=c.hole_15),c.hole_15) as `hole15`, IF(c.hole_16>-1,(SELECT h.par FROM holes h WHERE h.id=c.hole_16),c.hole_16) as `hole16`, IF(c.hole_17>-1,(SELECT h.par FROM holes h WHERE h.id=c.hole_17),c.hole_17) as `hole17`, IF(c.hole_18>-1,(SELECT h.par FROM holes h WHERE h.id=c.hole_18),c.hole_18) as `hole18` FROM courses c RIGHT JOIN course_locations cl on c.location_id=cl.id"))){
							echo "Prepare failed: "  . $conn->errno . " " . $conn->error;
						}
						if(!$stmt->execute()){
							echo "Execute failed: "  . $stmt->connect_errno . " " . $stmt->connect_error;
						}
						if(!$stmt->bind_result($id, $name, $par, $hole1, $hole2, $hole3, $hole4, $hole5, $hole6, $hole7, $hole8, $hole9, $hole10, $hole11, $hole12, $hole13, $hole14, $hole15, $hole16, $hole17, $hole18)){
							echo "Bind failed: "  . $stmt->connect_errno . " " . $stmt->connect_error;
						}
						while($stmt->fetch()){
							echo '<option value="' . $id . '"> ' . $name . ' -------------|Quick Info| ' . $par . ' | ' . $hole1 . ' | ' . $hole2 . ' | ' . $hole3 . ' | ' . $hole4 . ' | ' . $hole5 . ' | ' . $hole6 . ' | ' . $hole7 . ' | ' . $hole8 . ' | ' . $hole9 . ' | ' . $hole10 . ' | ' . $hole11 . ' | ' . $hole12 . ' | ' . $hole13 . ' | ' . $hole14 . ' | ' . $hole15 . ' | ' . $hole16 . ' | ' . $hole17 . ' | ' . $hole18 . ' | ' . ' </option>\n';
						}
						$stmt->close();
					?>	
					</select>
					Date: <input type="Date" name="playdate" style="margin-right: 15px;">
					Tees Played: <select name="teecolor">
						<option value="Blue">Blue</option>
						<option value="Gold">Gold</option>
						<option value="White">White</option>
						<option value="Red">Red</option>
					</select><br>
					<table id="holetable">
						<tr>
							<td><u>Hole 1</u></td>
							<td><u>Hole 2</u></td>
							<td><u>Hole 3</u></td>
							<td><u>Hole 4</u></td>
							<td><u>Hole 5</u></td>
							<td><u>Hole 6</u></td>
							<td><u>Hole 7</u></td>
							<td><u>Hole 8</u></td>
							<td><u>Hole 9</u></td>
							<td><u>Hole 10</u></td>
							<td><u>Hole 11</u></td>
							<td><u>Hole 12</u></td>
							<td><u>Hole 13</u></td>
							<td><u>Hole 14</u></td>
							<td><u>Hole 15</u></td>
							<td><u>Hole 16</u></td>
							<td><u>Hole 17</u></td>
							<td><u>Hole 18</u></td>
						</tr>
						<tr>
							<td><input type="number" name="score1" step="1" max="12" min="1" value="3" maxlength="2"></td>
							<td><input type="number" name="score2" step="1" max="12" min="1" value="3" maxlength="2"></td>
							<td><input type="number" name="score3" step="1" max="12" min="1" value="3" maxlength="2"></td>
							<td><input type="number" name="score4" step="1" max="12" min="1" value="3" maxlength="2"></td>
							<td><input type="number" name="score5" step="1" max="12" min="1" value="3" maxlength="2"></td>
							<td><input type="number" name="score6" step="1" max="12" min="1" value="3" maxlength="2"></td>
							<td><input type="number" name="score7" step="1" max="12" min="1" value="3" maxlength="2"></td>
							<td><input type="number" name="score8" step="1" max="12" min="1" value="3" maxlength="2"></td>
							<td><input type="number" name="score9" step="1" max="12" min="1" value="3" maxlength="2"></td>
							<td><input type="number" name="score10" step="1" max="12" min="1" value="3" maxlength="2"></td>
							<td><input type="number" name="score11" step="1" max="12" min="1" value="3" maxlength="2"></td>
							<td><input type="number" name="score12" step="1" max="12" min="1" value="3" maxlength="2"></td>
							<td><input type="number" name="score13" step="1" max="12" min="1" value="3" maxlength="2"></td>
							<td><input type="number" name="score14" step="1" max="12" min="1" value="3" maxlength="2"></td>
							<td><input type="number" name="score15" step="1" max="12" min="1" value="3" maxlength="2"></td>
							<td><input type="number" name="score16" step="1" max="12" min="1" value="3" maxlength="2"></td>
							<td><input type="number" name="score17" step="1" max="12" min="1" value="3" maxlength="2"></td>
							<td><input type="number" name="score18" step="1" max="12" min="1" value="3" maxlength="2"></td>
						</tr>
					</table> 
					</p>
					
				</fieldset>
				<input type="submit" value="Submit Round" style="color: green; margin-top: 5px;">
				<input type="reset" value="Reset Form" style="color: red; margin-top: 5px;">
			</fieldset>
		</form>
	</section>
	<br>
	<section>
		<form method="post" action="updateround.php" target="table">
			<fieldset>
				<legend style="font-size: 16pt;">
					<b>Update A Round</b>
				</legend>
				<p>
					
					Round: <select name="editround" style="margin-right: 15px;">
						<?php
							if(!($stmt = $conn->prepare("SELECT r.id, p.lname, c.course_name, r.play_date FROM rounds r JOIN player_rounds pr ON r.id=pr.round_id INNER JOIN players p ON p.id=pr.player_id INNER JOIN courses c ON c.id=r.course_id"))){
								echo "Prepare failed: "  . $conn->errno . " " . $conn->error;
							}
							if(!$stmt->execute()){
								echo "Execute failed: "  . $stmt->connect_errno . " " . $stmt->connect_error;
							}
							if(!$stmt->bind_result($id, $lname, $course_name, $play_date)){
								echo "Bind failed: "  . $stmt->connect_errno . " " . $stmt->connect_error;
							}
							while($stmt->fetch()){
								echo '<option value="' . $id . '"> Player: ' . $lname . ' | Course: ' . $course_name . ' | Date: ' . $play_date . ' </option>\n';
							}
							$stmt->close();
						?>	
					</select>

					Date: <input type="Date" name="editdate" style="margin-right: 15px;">
					
					Tees Played: <select name="edittee">
						<option value="">Pick</option>
						<option value="Blue">Blue</option>
						<option value="Gold">Gold</option>
						<option value="White">White</option>
						<option value="Red">Red</option>
					</select><br>
					<table id="holetable">
						<tr>
							<td><u>Hole 1</u></td>
							<td><u>Hole 2</u></td>
							<td><u>Hole 3</u></td>
							<td><u>Hole 4</u></td>
							<td><u>Hole 5</u></td>
							<td><u>Hole 6</u></td>
							<td><u>Hole 7</u></td>
							<td><u>Hole 8</u></td>
							<td><u>Hole 9</u></td>
							<td><u>Hole 10</u></td>
							<td><u>Hole 11</u></td>
							<td><u>Hole 12</u></td>
							<td><u>Hole 13</u></td>
							<td><u>Hole 14</u></td>
							<td><u>Hole 15</u></td>
							<td><u>Hole 16</u></td>
							<td><u>Hole 17</u></td>
							<td><u>Hole 18</u></td>
						</tr>
						<tr>
							<td><input type="number" name="edit1" step="1" max="12" min="1" maxlength="2"></td>
							<td><input type="number" name="edit2" step="1" max="12" min="1" maxlength="2"></td>
							<td><input type="number" name="edit3" step="1" max="12" min="1" maxlength="2"></td>
							<td><input type="number" name="edit4" step="1" max="12" min="1" maxlength="2"></td>
							<td><input type="number" name="edit5" step="1" max="12" min="1" maxlength="2"></td>
							<td><input type="number" name="edit6" step="1" max="12" min="1" maxlength="2"></td>
							<td><input type="number" name="edit7" step="1" max="12" min="1" maxlength="2"></td>
							<td><input type="number" name="edit8" step="1" max="12" min="1" maxlength="2"></td>
							<td><input type="number" name="edit9" step="1" max="12" min="1" maxlength="2"></td>
							<td><input type="number" name="edit10" step="1" max="12" min="1" maxlength="2"></td>
							<td><input type="number" name="edit11" step="1" max="12" min="1" maxlength="2"></td>
							<td><input type="number" name="edit12" step="1" max="12" min="1" maxlength="2"></td>
							<td><input type="number" name="edit13" step="1" max="12" min="1" maxlength="2"></td>
							<td><input type="number" name="edit14" step="1" max="12" min="1" maxlength="2"></td>
							<td><input type="number" name="edit15" step="1" max="12" min="1" maxlength="2"></td>
							<td><input type="number" name="edit16" step="1" max="12" min="1" maxlength="2"></td>
							<td><input type="number" name="edit17" step="1" max="12" min="1" maxlength="2"></td>
							<td><input type="number" name="edit18" step="1" max="12" min="1" maxlength="2"></td>
						</tr>
					</table> 
					<input type="submit" value="Submit Update" style="color: green; margin-top: 5px;">
					<input type="reset" value="Reset Form" style="color: red; margin-top: 5px;">
				</p>
			</fieldset>
		</form>
	</section>
</body>
</html>