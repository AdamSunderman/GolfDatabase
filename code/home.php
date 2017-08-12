<?php
	require 'config.php';
	ini_set('display_errors', 'On');
	$conn = new mysqli(mHOST,mDB,mPASS,mUSER);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	<link rel="stylesheet" type="text/css" href="styles/gdb.css">
	<title>Welcome To Golf DB</title>
</head>
<body id="home">

<div id="ht"><h1>Welcome To The Golf Database</h1></div>
<br><br>

<div>
	<table id="hometable">
		<tr><td id="toprow" colspan="3">Golf Database Quicklook</td></tr>
		<tr><td class="htd">Player<br>Count</td><td class="htd">Course<br>Count</td><td class="htd">Round<br>Count</td></tr>
		<tr>
		<?php
			if(!($stmt = $conn->prepare("SELECT count(distinct p.id), count(distinct c.id), count(distinct r.id) FROM players p, courses c, rounds r"))){
				echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
			}

			if(!$stmt->execute()){
				echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
			}
			if(!$stmt->bind_result($player_count, $course_count, $round_count)){
				echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
			}
			while($stmt->fetch()){
 				echo "<td class='htd'>" . $player_count . "</td><td class='htd'>" . $course_count . "</td><td class='htd'>" . $round_count . "</td>";
			}
			$stmt->close();
		?>
		</tr>
		<tr>
			<td><a href="players.php" class="button">Go To Players</a></td>
			<td><a href="courses.php" class="button">Go To Courses</a></td>
			<td><a href="rounds.php" class="button">Go To Rounds</a></td>
		</tr>
	</table>
</div>
<br>

</body>
</html>