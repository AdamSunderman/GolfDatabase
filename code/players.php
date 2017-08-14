<?php
	require ("config.php");
	ini_set('display_errors', 'On');
	$conn = new mysqli(mHOST,mDB,mPASS,mUSER);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	<link rel="stylesheet" type="text/css" href="styles/gdb.css">
	<title>Golf DB Players</title>
</head>

<body>
	<!-- Links to other pages -->
	<div>
		Quick Links:  <a href="home.php"><font color="0000FF">Home</font></a>  <a href="rounds.php"><font color="0000FF">Rounds</font></a>  <a href="courses.php"><font color="0000FF">Courses</font></a>
	</div>
	<br>
	<!-- Iframe for table data-->
	<iframe height="200px" width="100%" src="playertable.php" name="table"></iframe>
	<!-- Reset table/remove filters iframe-->
	<form method="get" action="playertable.php" target="table">
		<p>
			<a href="playertable.php" target="table"><font color="0000FF">Update Table/Remove Filters</font></a>
		</p>
	</form>		
	<!-- Form 1 - Filter players -->
	<section id="topforms">
		<form method="get" action="playertable.php" target="table">
			<fieldset>
				<legend style="font-size: 16pt;">
					<b>Filter Players By One Or More Conditions</b>
				</legend>
				<p>
					By First Name: <input type="text" name="fname" /> (leave blank for all)
				</p>
				<p>
					By Last Name: <input type="text" name="lname" /> (leave blank for all)
				</p>
				<p>
					By State: <select name="state">
						<option value="">Any</option>
						<?php
							if(!($stmt = $conn->prepare("SELECT distinct(p.state) as state FROM players p ORDER BY p.state"))){
								echo "Prepare failed: "  . $conn->errno . " " . $conn->error;
							}
							if(!$stmt->execute()){
								echo "Execute failed: "  . $stmt->connect_errno . " " . $stmt->connect_error;
							}
							if(!$stmt->bind_result($state)){
								echo "Bind failed: "  . $stmt->connect_errno . " " . $stmt->connect_error;
							}
							while($stmt->fetch()){
								echo '<option value=" '. $state . ' "> ' . $state . '</option>\n';
							}
							$stmt->close();
						?>
					</select>
				</p>
				<p>
					By Pro Status: <select name="ispro">
						<option value="">Any</option>
						<option value="1">Pro</option>
						<option value="0">Amatuer</option>
					</select>
				</p>
				<p>
					By Gender: <select name="sex">
						<option value="">Any</option>
						<option value="M">Male</option>
						<option value="F">Female</option>
					</select>
				</p>
				<p>
					<input type="submit" value="Apply Filter(s)" style="color: green; margin-right: 20px;"/> 
					<input type="reset" value="Reset" style="color: brown;"/>
				</p>
			</fieldset>
		</form>
		<!-- Form 2 - Add Player -->
		<form method="post" action="addplayer.php" target="table">
			<fieldset>
				<legend style="font-size: 16pt;">
					<b>Add A New Player</b>
				</legend>
				<p>
					First Name: <input type="text" name="addfname"/>
				</p>
				<p>
					Last Name: <input type="text" name="addlname"/>
				</p>
				<p>
					Age: <input type="text" name="addage" />
				</p>
				<p>
					City: <input type="text" name="addcity" />
				</p>
				<p>
					State: <input type="text" name="addstate" maxlength="2" /> (Two Letter Abbreviated In Caps | example OR, WA, CA, TX)
				</p> 
				<p>
					Gender: <select name="addsex">
						<option value="M">Male</option>
						<option value="F">Female</option>
					</select>
				</p>
				<p>
					Home Course: <select name="addhomecourse">
						<option value="">None</option>
						<?php
							if(!($stmt = $conn->prepare("SELECT cl.id, cl.location_name FROM course_locations cl ORDER BY cl.location_name"))){
								echo "Prepare failed: "  . $conn->errno . " " . $conn->error;
							}
							if(!$stmt->execute()){
								echo "Execute failed: "  . $stmt->connect_errno . " " . $stmt->connect_error;
							}
							if(!$stmt->bind_result($id, $name)){
								echo "Bind failed: "  . $stmt->connect_errno . " " . $stmt->connect_error;
							}
							while($stmt->fetch()){
								echo '<option value=" '. $id . ' "> ' . $name . '</option>\n';
							}
							$stmt->close();
						?>
					</select>
				</p>
				<p>
					Handicap: <input type="number" name="addhandicap" maxlength="2" min="0" max="99" />
				</p>
				<p>
					Pro Status: <select name="addispro">
						<option value="1">Pro</option>
						<option value="0">Amatuer</option>
					</select>
				</p>
				<p>
					<input type="submit" value="Add Player" style="color: green; margin-right: 20px;"/> 
					<input type="reset" value="Reset" style="color: brown;"/>
				</p>
			</fieldset>
		</form>
		<!-- Form - Delete Player -->
		<form method="post" action="deleteplayer.php" target="table">
			<fieldset>
				<legend style="font-size: 16pt;">
					<b>Delete Player</b>
				</legend>
				<p>
					Player: <select name="deleteplayer">
						<option value="">None</option>
						<?php
							if(!($stmt = $conn->prepare("SELECT p.id, p.fname, p.lname FROM players p ORDER BY p.lname"))){
								echo "Prepare failed: "  . $conn->errno . " " . $conn->error;
							}
							if(!$stmt->execute()){
								echo "Execute failed: "  . $stmt->connect_errno . " " . $stmt->connect_error;
							}
							if(!$stmt->bind_result($id, $fname, $lname)){
								echo "Bind failed: "  . $stmt->connect_errno . " " . $stmt->connect_error;
							}
							while($stmt->fetch()){
								echo '<option value=" '. $id . ' "> ' . $fname . ', ' . $lname . '</option>\n';
							}
							$stmt->close();
						?>
					</select>
				</p>
				<p>
					<input type="submit" value="Delete Player" style="color: red; margin-right: 20px;"/> 
					<input type="reset" value="Reset" style="color: brown;"/>
				</p>
			</fieldset>
		</form>
	</section>
</body>
</html>