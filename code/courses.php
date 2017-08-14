<?php
	require ("config.php");
	ini_set('display_errors', 'On');
	$conn = new mysqli(mHOST,mDB,mPASS,mUSER);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	<link rel="stylesheet" type="text/css" href="styles/gdb.css">
	<title>Golf DB Courses</title>
</head>
<body>
	<!-- Links to other pages -->
	<div>
		Quick Links:  <a href="home.php"><font color="0000FF">Home</font></a>  <a href="rounds.php"><font color="0000FF">Rounds</font></a>  <a href="players.php"><font color="0000FF">Players</font></a>
	</div>
	<br>
	<!-- Iframe for table data-->
	<iframe height="200px" width="100%" src="coursetable.php" name="table"></iframe>
	<!-- Reset table/remove filters iframe-->
	<form method="get" action="coursetable.php" target="table">
		<p>
			<a href="coursetable.php" target="table"><font color="0000FF">Update Table/Remove Filters</font></a>  <b>* Hole Values= Par / BlueTeeLength *</b> 
		</p>
	</form>
	<form method="get" action="coursetable.php" target="table">
		<fieldset style="width: 20%; float: left; border: solid black 1px;">
			<legend style="font-size: 16pt;">
				<b>Filter Courses By State</b>
			</legend>
			<select name="state">
				<option value="">Any</option>
				<?php
					if(!($stmt = $conn->prepare("SELECT distinct(cl.state) as state FROM course_locations cl ORDER BY cl.state"))){
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
			<input type="submit" value="Filter" style="color: green;">
		</fieldset>
	</form>
	<form>
		<fieldset style="border: solid black 1px;"> <!-- Change this section -->
			<legend style="font-size: 16pt;">
				<b>View Detailed Course Information</b>
			</legend>
			<input type="submit" value="See Course" style="color: green;">
		</fieldset>
	</form>
	<br>
	<form method="post" action="addcourse.php" target="table" >
		<fieldset>
			<legend style="font-size: 16pt;">
				<b>Add A New Course</b>
			</legend>
			<fieldset>
				<legend>
					<b>Step 1: Enter Location Information</b>
				</legend>
				<p>
					Location Name: <input type="text" name="locationname"><br>   
					Location Address: <input type="text" name="address"><br>
					Location City: <input type="text" name="city"><br>   
					Location State: <input type="text" name="state" maxlength="2"> ** CAPS<br> 
					Location Zipcode: <input type="text" name="zipcode" maxlength="5"><br>   
					Location Phone: <input type="text" name="phone"><br>
				</p>
			</fieldset>
			<br>
			<fieldset><legend><b>Step 1 (Alternative):<em> Or </em>Pick A Location If It's Already Stored</b></legend>
				Location Name: <select name="locationid" style="position: center;">
					<option value="" selected>None</option>
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
								echo '<option name="courseid" value=" '. $id . ' "> ' . $name . '</option>\n';
							}
							$stmt->close();
						?>
					</select>
			</fieldset><br>
			<fieldset id="coursefieldset"><legend><b>Step 2: Enter Course Information</b></legend>
				<section style="border-bottom: solid black 1px; margin: 5px; padding: 5px;">
					Course Name: <input type="text" name="coursename" style="margin-right: 10px;">
					Rating: <input type="number" name="rating" step=".1" max="99.9" min="50.0" value="75.0" maxlength="4" style="margin-right: 10px;">
					Slope: <input type="number" name="slope" step="1" max="250" min="50" value="110" maxlength="3" style="margin-right: 10px;">
					Yards: <input type="number" name="yards" step="1" max="10000" min="1000" value="7000" maxlength="5" style="margin-right: 10px;">
					Par: <input type="number" name="coursepar" step="1" max="99" min="1" value="72" maxlength="2" style="margin-right: 10px;">
				</section>

				<section style="border-bottom: solid black 1px; margin: 5px; padding: 5px;">
					Hole 1  -   Par: <input type="number" name="hole1par" step="1" max="7" min="1" value="3" maxlength="1" style="margin-right: 10px;">
							Handicap: <input type="number" name="hole1handicap" step="1" max="30" min="0" value="7" maxlength="2" style="margin-right: 10px;">
							Blue Tee: <input type="number" name="hole1blue" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							Gold Tee: <input type="number" name="hole1gold" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							White Tee: <input type="number" name="hole1white" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							Red Tee: <input type="number" name="hole1red" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							Notes: <input type="text" name="hole1notes" maxlength="255">
				</section>
				<section style="border-bottom: solid black 1px; margin: 5px; padding: 5px;">
					Hole 2  -   Par: <input type="number" name="hole2par" step="1" max="7" min="1" value="3" maxlength="1" style="margin-right: 10px;">
							Handicap: <input type="number" name="hole2handicap" step="1" max="30" min="0" value="7" maxlength="2" style="margin-right: 10px;">
							Blue Tee: <input type="number" name="hole2blue" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							Gold Tee: <input type="number" name="hole2gold" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							White Tee: <input type="number" name="hole2white" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							Red Tee: <input type="number" name="hole2red" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							Notes: <input type="text" name="hole2notes" maxlength="255">
				</section>
				<section style="border-bottom: solid black 1px; margin: 5px; padding: 5px;">
					Hole 3  -   Par: <input type="number" name="hole3par" step="1" max="7" min="1" value="3" maxlength="1" style="margin-right: 10px;">
							Handicap: <input type="number" name="hole3handicap" step="1" max="30" min="0" value="7" maxlength="2" style="margin-right: 10px;">
							Blue Tee: <input type="number" name="hole3blue" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							Gold Tee: <input type="number" name="hole3gold" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							White Tee: <input type="number" name="hole3white" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							Red Tee: <input type="number" name="hole3red" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							Notes: <input type="text" name="hole3notes" maxlength="255">
				</section>
				<section style="border-bottom: solid black 1px; margin: 5px; padding: 5px;">
					Hole 4  -   Par: <input type="number" name="hole4par" step="1" max="7" min="1" value="3" maxlength="1" style="margin-right: 10px;">
							Handicap: <input type="number" name="hole4handicap" step="1" max="30" min="0" value="7" maxlength="2" style="margin-right: 10px;">
							Blue Tee: <input type="number" name="hole4blue" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							Gold Tee: <input type="number" name="hole4gold" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							White Tee: <input type="number" name="hole4white" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							Red Tee: <input type="number" name="hole4red" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							Notes: <input type="text" name="hole4notes" maxlength="255">
				</section>
				<section style="border-bottom: solid black 1px; margin: 5px; padding: 5px;">
					Hole 5  -   Par: <input type="number" name="hole5par" step="1" max="7" min="1" value="3" maxlength="1" style="margin-right: 10px;">
							Handicap: <input type="number" name="hole5handicap" step="1" max="30" min="0" value="7" maxlength="2" style="margin-right: 10px;">
							Blue Tee: <input type="number" name="hole5blue" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							Gold Tee: <input type="number" name="hole5gold" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							White Tee: <input type="number" name="hole5white" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							Red Tee: <input type="number" name="hole5red" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							Notes: <input type="text" name="hole5notes" maxlength="255">
				</section>
				<section style="border-bottom: solid black 1px; margin: 5px; padding: 5px;">
					Hole 6  -   Par: <input type="number" name="hole6par" step="1" max="7" min="1" value="3" maxlength="1" style="margin-right: 10px;">
							Handicap: <input type="number" name="hole6handicap" step="1" max="30" min="0" value="7" maxlength="2" style="margin-right: 10px;">
							Blue Tee: <input type="number" name="hole6blue" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							Gold Tee: <input type="number" name="hole6gold" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							White Tee: <input type="number" name="hole6white" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							Red Tee: <input type="number" name="hole6red" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							Notes: <input type="text" name="hole6notes" maxlength="255">
				</section>
				<section style="border-bottom: solid black 1px; margin: 5px; padding: 5px;">
					Hole 7  -   Par: <input type="number" name="hole7par" step="1" max="7" min="1" value="3" maxlength="1" style="margin-right: 10px;">
							Handicap: <input type="number" name="hole7handicap" step="1" max="30" min="0" value="7" maxlength="2" style="margin-right: 10px;">
							Blue Tee: <input type="number" name="hole7blue" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							Gold Tee: <input type="number" name="hole7gold" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							White Tee: <input type="number" name="hole7white" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							Red Tee: <input type="number" name="hole7red" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							Notes: <input type="text" name="hole7notes" maxlength="255">
				</section>
				<section style="border-bottom: solid black 1px; margin: 5px; padding: 5px;">
					Hole 8  -   Par: <input type="number" name="hole8par" step="1" max="7" min="1" value="3" maxlength="1" style="margin-right: 10px;">
							Handicap: <input type="number" name="hole8handicap" step="1" max="30" min="0" value="7" maxlength="2" style="margin-right: 10px;">
							Blue Tee: <input type="number" name="hole8blue" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							Gold Tee: <input type="number" name="hole8gold" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							White Tee: <input type="number" name="hole8white" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							Red Tee: <input type="number" name="hole8red" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							Notes: <input type="text" name="hole8notes" maxlength="255">
				</section>
				<section style="border-bottom: solid black 1px; margin: 5px; padding: 5px;">
					Hole 9  -   Par: <input type="number" name="hole9par" step="1" max="7" min="1" value="3" maxlength="1" style="margin-right: 10px;">
							Handicap: <input type="number" name="hole9handicap" step="1" max="30" min="0" value="7" maxlength="2" style="margin-right: 10px;">
							Blue Tee: <input type="number" name="hole9blue" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							Gold Tee: <input type="number" name="hole9gold" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							White Tee: <input type="number" name="hole9white" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							Red Tee: <input type="number" name="hole9red" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							Notes: <input type="text" name="hole9notes" maxlength="255">
				</section>
				<section style="border-bottom: solid black 1px; margin: 5px; padding: 5px;">
					Hole 10 -   Par: <input type="number" name="hole10par" step="1" max="7" min="1" value="3" maxlength="1" style="margin-right: 10px;">
							Handicap: <input type="number" name="hole10handicap" step="1" max="30" min="0" value="7" maxlength="2" style="margin-right: 10px;">
							Blue Tee: <input type="number" name="hole10blue" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							Gold Tee: <input type="number" name="hole10gold" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							White Tee: <input type="number" name="hole10white" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							Red Tee: <input type="number" name="hole10red" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							Notes: <input type="text" name="hole10notes" maxlength="255">
				</section>
				<section style="border-bottom: solid black 1px; margin: 5px; padding: 5px;">
					Hole 11 -   Par: <input type="number" name="hole11par" step="1" max="7" min="1" value="3" maxlength="1" style="margin-right: 10px;">
							Handicap: <input type="number" name="hole11handicap" step="1" max="30" min="0" value="7" maxlength="2" style="margin-right: 10px;">
							Blue Tee: <input type="number" name="hole11blue" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							Gold Tee: <input type="number" name="hole11gold" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							White Tee: <input type="number" name="hole11white" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							Red Tee: <input type="number" name="hole11red" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							Notes: <input type="text" name="hole11notes" maxlength="255">
				</section>
				<section style="border-bottom: solid black 1px; margin: 5px; padding: 5px;">
					Hole 12 -   Par: <input type="number" name="hole12par" step="1" max="7" min="1" value="3" maxlength="1" style="margin-right: 10px;">
							Handicap: <input type="number" name="hole12handicap" step="1" max="30" min="0" value="7" maxlength="2" style="margin-right: 10px;">
							Blue Tee: <input type="number" name="hole12blue" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							Gold Tee: <input type="number" name="hole12gold" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							White Tee: <input type="number" name="hole12white" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							Red Tee: <input type="number" name="hole12red" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							Notes: <input type="text" name="hole12notes" maxlength="255">
				</section>
				<section style="border-bottom: solid black 1px; margin: 5px; padding: 5px;">
					Hole 13 -   Par: <input type="number" name="hole13par" step="1" max="7" min="1" value="3" maxlength="1" style="margin-right: 10px;">
							Handicap: <input type="number" name="hole13handicap" step="1" max="30" min="0" value="7" maxlength="2" style="margin-right: 10px;">
							Blue Tee: <input type="number" name="hole13blue" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							Gold Tee: <input type="number" name="hole13gold" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							White Tee: <input type="number" name="hole13white" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							Red Tee: <input type="number" name="hole13red" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							Notes: <input type="text" name="hole13notes" maxlength="255">
				</section>
				<section style="border-bottom: solid black 1px; margin: 5px; padding: 5px;">
					Hole 14 -   Par: <input type="number" name="hole14par" step="1" max="7" min="1" value="3" maxlength="1" style="margin-right: 10px;">
							Handicap: <input type="number" name="hole14handicap" step="1" max="30" min="0" value="7" maxlength="2" style="margin-right: 10px;">
							Blue Tee: <input type="number" name="hole14blue" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							Gold Tee: <input type="number" name="hole14gold" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							White Tee: <input type="number" name="hole14white" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							Red Tee: <input type="number" name="hole14red" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							Notes: <input type="text" name="hole14notes" maxlength="255">
				</section>
				<section style="border-bottom: solid black 1px; margin: 5px; padding: 5px;">
					Hole 15 -   Par: <input type="number" name="hole15par" step="1" max="7" min="1" value="3" maxlength="1" style="margin-right: 10px;">
							Handicap: <input type="number" name="hole15handicap" step="1" max="30" min="0" value="7" maxlength="2" style="margin-right: 10px;">
							Blue Tee: <input type="number" name="hole15blue" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							Gold Tee: <input type="number" name="hole15gold" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							White Tee: <input type="number" name="hole15white" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							Red Tee: <input type="number" name="hole15red" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							Notes: <input type="text" name="hole15notes" maxlength="255">
				</section>
				<section style="border-bottom: solid black 1px; margin: 5px; padding: 5px;">
					Hole 16 -   Par: <input type="number" name="hole16par" step="1" max="7" min="1" value="3" maxlength="1" style="margin-right: 10px;">
							Handicap: <input type="number" name="hole16handicap" step="1" max="30" min="0" value="7" maxlength="2" style="margin-right: 10px;">
							Blue Tee: <input type="number" name="hole16blue" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							Gold Tee: <input type="number" name="hole16gold" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							White Tee: <input type="number" name="hole16white" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							Red Tee: <input type="number" name="hole16red" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							Notes: <input type="text" name="hole16notes" maxlength="255">
				</section>
				<section style="border-bottom: solid black 1px; margin: 5px; padding: 5px;">
					Hole 17 -   Par: <input type="number" name="hole17par" step="1" max="7" min="1" value="3" maxlength="1" style="margin-right: 10px;">
							Handicap: <input type="number" name="hole17handicap" step="1" max="30" min="0" value="7" maxlength="2" style="margin-right: 10px;">
							Blue Tee: <input type="number" name="hole17blue" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							Gold Tee: <input type="number" name="hole17gold" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							White Tee: <input type="number" name="hole17white" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							Red Tee: <input type="number" name="hole17red" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							Notes: <input type="text" name="hole17notes" maxlength="255">
				</section>
				<section style="border-bottom: solid black 1px; margin: 5px; padding: 5px;">
					Hole 18 -   Par: <input type="number" name="hole18par" step="1" max="7" min="1" value="3" maxlength="1" style="margin-right: 10px;">
							Handicap: <input type="number" name="hole18handicap" step="1" max="30" min="0" value="7" maxlength="2" style="margin-right: 10px;">
							Blue Tee: <input type="number" name="hole18blue" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							Gold Tee: <input type="number" name="hole18gold" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							White Tee: <input type="number" name="hole18white" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							Red Tee: <input type="number" name="hole18red" step="1" max="999" min="1" value="175" maxlength="3" style="margin-right: 10px;">
							Notes: <input type="text" name="hole18notes" maxlength="255">
				</section>
			</fieldset><br>
			<input type="reset" name="reset" value="Reset Form" style="float: right; color: red;">
			<input type="submit" name="submit" value="Add Course" style="float: right; color: green;">	
		</fieldset>
			</form>
</body>
</html>
