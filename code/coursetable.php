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
		<table id="othertable">
		<tr><td><b>Course Location, Course Name</b></td><td><b>Rating</b></td><td><b>Slope</b></td><td><b>Yards</b></td><td><b>Par</b></td><td><b>Hole 1</b></td><td><b>Hole 2</b></td><td><b>Hole 3</b></td><td><b>Hole 4</b></td><td><b>Hole 5</b></td><td><b>Hole 6</b></td><td><b>Hole 7</b></td><td><b>Hole 8</b></td><td><b>Hole 9</b></td><td><b>Hole 10</b></td><td><b>Hole 11</b></td><td><b>Hole 12</b></td><td><b>Hole 13</b></td><td><b>Hole 14</b></td><td><b>Hole 15</b></td><td><b>Hole 16</b></td><td><b>Hole 17</b></td><td><b>Hole 18</b></td></tr>
		<?php
			$stmtStart="SELECT DISTINCT concat(cl.location_name,', ',c.course_name) as `Course Location Name and Course Name`, c.rating as `Rating`, IFNULL(c.slope,'NA') as `Slope`, c.yards as `Total Yards`, c.par as `Par`, IF(c.hole_1>-1,(SELECT concat(h.par,' / ',h.blue_length) as info FROM holes h WHERE h.id=c.hole_1),c.hole_1) as `hole 1`, IF(c.hole_2>-1,(SELECT concat(h.par,' / ',h.blue_length) as info FROM holes h WHERE h.id=c.hole_2),c.hole_2) as `hole 2`, IF(c.hole_3>-1,(SELECT concat(h.par,' / ',h.blue_length) as info FROM holes h WHERE h.id=c.hole_3),c.hole_3) as `hole 3`, IF(c.hole_4>-1,(SELECT concat(h.par,' / ',h.blue_length) as info FROM holes h WHERE h.id=c.hole_4),c.hole_4) as `hole 4`, IF(c.hole_5>-1,(SELECT concat(h.par,' / ',h.blue_length) as info FROM holes h WHERE h.id=c.hole_5),c.hole_5) as `hole 5`, IF(c.hole_6>-1,(SELECT concat(h.par,' / ',h.blue_length) as info FROM holes h WHERE h.id=c.hole_6),c.hole_6) as `hole 6`, IF(c.hole_7>-1,(SELECT concat(h.par,' / ',h.blue_length) as info FROM holes h WHERE h.id=c.hole_7),c.hole_7) as `hole 7`, IF(c.hole_8>-1,(SELECT concat(h.par,' / ',h.blue_length) as info FROM holes h WHERE h.id=c.hole_8),c.hole_8) as `hole 8`, IF(c.hole_9>-1,(SELECT concat(h.par,' / ',h.blue_length) as info FROM holes h WHERE h.id=c.hole_9),c.hole_9) as `hole 9`, IF(c.hole_10>-1,(SELECT concat(h.par,' / ',h.blue_length) as info FROM holes h WHERE h.id=c.hole_10),c.hole_10) as `hole 10`, IF(c.hole_11>-1,(SELECT concat(h.par,' / ',h.blue_length) as info FROM holes h WHERE h.id=c.hole_11),c.hole_11) as `hole 11`, IF(c.hole_12>-1,(SELECT concat(h.par,' / ',h.blue_length) as info FROM holes h WHERE h.id=c.hole_12),c.hole_12) as `hole 12`, IF(c.hole_13>-1,(SELECT concat(h.par,' / ',h.blue_length) as info FROM holes h WHERE h.id=c.hole_13),c.hole_13) as `hole 13`, IF(c.hole_14>-1,(SELECT concat(h.par,' / ',h.blue_length) as info FROM holes h WHERE h.id=c.hole_14),c.hole_14) as `hole 14`, IF(c.hole_15>-1,(SELECT concat(h.par,' / ',h.blue_length) as info FROM holes h WHERE h.id=c.hole_15),c.hole_15) as `hole 15`, IF(c.hole_16>-1,(SELECT concat(h.par,' / ',h.blue_length) as info FROM holes h WHERE h.id=c.hole_16),c.hole_16) as `hole 16`, IF(c.hole_17>-1,(SELECT concat(h.par,' / ',h.blue_length) as info FROM holes h WHERE h.id=c.hole_17),c.hole_17) as `hole 17`, IF(c.hole_18>-1,(SELECT concat(h.par,' / ',h.blue_length) as info FROM holes h WHERE h.id=c.hole_18),c.hole_18) as `hole 18` FROM courses c RIGHT JOIN course_locations cl on c.location_id=cl.id";
			$count=0;
			$paramTypes="";
			$params=array("");
			if(isset($_GET['state']) && $_GET['state'] != ""){
				$stmtStart= $stmtStart . " WHERE cl.state LIKE ?";
				$paramTypes=$paramTypes . "s";
				$params[$count]=trim($_GET['state']);
				$count=1;
			}
			if(!($stmt = $conn->prepare($stmtStart))){
				echo "Prepare failed: "  . $conn->errno . " " . $conn->error;
			}
			if($count>0){
				if($count==1){
					list($a)=$params;
					if(!($stmt->bind_param($paramTypes, $a))){
						echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
					}
				}
			}
			if(!$stmt->execute()){
				echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
			}
			if(!$stmt->bind_result($name, $rating, $slope, $yards, $par, $h1, $h2, $h3, $h4, $h5, $h6, $h7, $h8, $h9, $h10, $h11, $h12, $h13, $h14, $h15, $h16, $h17, $h18)){
				echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;			
			}
			while($stmt->fetch()){
 				echo "<tr><td>" . $name . "</td><td>" . $rating . "</td><td>" . $slope . "</td><td>" . $yards . "</td><td>" . $par . "</td><td>" . $h1 . "</td><td>" . $h2 . "</td><td>" . $h3 . "</td><td>" . $h4 . "</td><td>" . $h5 . "</td><td>" . $h6 . "</td><td>" . $h7 . "</td><td>" . $h8 . "</td><td>" . $h9 . "</td><td>" . $h10 . "</td><td>" . $h11 . "</td><td>" . $h12 . "</td><td>" . $h13 . "</td><td>" . $h14 . "</td><td>" . $h15 . "</td><td>" . $h16 . "</td><td>" . $h17 . "</td><td>" . $h18 . "</td></tr>";
			}
			$stmt->close();
		?>

	</table>
</body>
</html>

















