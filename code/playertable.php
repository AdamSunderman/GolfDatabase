<?php
	require ('config.php');
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
		<tr><td><b>Player Name</b></td><td><b>Age</b></td><td><b>Home Town</b></td><td><b>Gender</b></td><td><b>Home Course</b></td><td><b>Handicap</b></td><td><b>Professional</b></td></tr>
		<?php
			$stmtStart="SELECT concat(p.fname,' ', p.lname) as name, p.age, concat(p.city,', ', p.state) as playerhome, IF(p.sex='M','Male', 'Female') as gender, IFNULL(c.course_name, 'NA'), IFNULL(p.handicap, 'NA') as handicap, IF(p.is_pro=1,'Yes','No') as proStatus FROM players p LEFT JOIN courses c ON p.home_course=c.id";
			$count=0;
			$paramTypes="";
			$params=array("","","","","");
			if(isset($_GET['fname']) && $_GET['fname'] != ""){
				$count=1;
				$stmtStart= $stmtStart . " WHERE p.fname LIKE ?";
				$paramTypes=$paramTypes . "s";
				$params[0]=trim($_GET['fname']);
			}
			if(isset($_GET['lname']) && $_GET['lname'] != ""){
				if($count=0){
					$count=1;
					$stmtStart= $stmtStart . " WHERE p.lname LIKE ?";
					$paramTypes=$paramTypes . "s";
					$params[0]=trim($_GET['lname']);
				}
				else{
					$stmtStart= $stmtStart . " AND p.lname LIKE ?";
					$paramTypes=$paramTypes . "s";
					$params[$count]=trim($_GET['lname']);
					$count=$count+1;
				}
			}
			if(isset($_GET['state']) && $_GET['state'] != ""){
				if($count==0){
					$count=1;
					$stmtStart= $stmtStart . " WHERE p.state LIKE ?";
					$paramTypes=$paramTypes . "s";
					$params[0]=trim($_GET['state']);
				}
				else{
					$stmtStart= $stmtStart . " AND p.state LIKE ?";
					$paramTypes=$paramTypes . "s";
					$params[$count]=trim($_GET['state']);
					$count=$count+1;
				}
			}
			if(isset($_GET['sex']) && $_GET['sex'] != ""){
				if($count==0){
					$count=1;
					$stmtStart= $stmtStart . " WHERE p.sex LIKE ?";
					$paramTypes=$paramTypes . "s";
					$params[0]=trim($_GET['sex']);
				}
				else{
					$stmtStart= $stmtStart . " AND p.sex LIKE ?";
					$paramTypes=$paramTypes . "s";
					$params[$count]=trim($_GET['sex']);
					$count=$count+1;
				}
			}
			if(isset($_GET['ispro']) && $_GET['ispro'] != ""){
				if($count==0){
					$count=1;
					$stmtStart= $stmtStart . " WHERE p.is_pro=?";
					$paramTypes=$paramTypes . "i";
					$params[0]=$_GET['ispro'];;
				}
				else{
					$stmtStart= $stmtStart . " AND p.is_pro=?";
					$paramTypes=$paramTypes . "i";
					$params[$count]=$_GET['ispro'];;
					$count=$count+1;
				}
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
				if($count==2){
					list($a, $b)=$params;
					if(!($stmt->bind_param($paramTypes, $a, $b))){
						echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
					}
				}
				if($count==3){
					list($a, $b, $c)=$params;
					if(!($stmt->bind_param($paramTypes, $a, $b, $c))){
						echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
					}
				}
				if($count==4){
					list($a, $b, $c, $d)=$params;
					if(!($stmt->bind_param($paramTypes, $a, $b, $c, $d))){
						echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
					}
				}
				if($count==5){
					list($a, $b, $c, $d, $e)=$params;
					if(!($stmt->bind_param($paramTypes, $a, $b, $c, $d, $e))){
						echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
					}
				}
			}
			if(!$stmt->execute()){
				echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
			}
			if(!$stmt->bind_result($name, $age, $playerhome, $gender, $course_name, $handicap, $proStatus)){
				echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;			
			}
			while($stmt->fetch()){
 				echo "<tr><td>" . $name . "</td><td>" . $age . "</td><td>" . $playerhome . "</td><td>" . $gender . "</td><td>" . $course_name . "</td><td>" . $handicap . "</td><td>" . $proStatus . "</td></tr>";
			}
			$stmt->close();
		?>

	</table>
</body>

</html>