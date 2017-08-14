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
	if(isset($_POST['deleteplayer'])){
		if(!$conn){
			echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
		}	
		if(!($stmt = $conn->prepare("DELETE FROM players WHERE id =?"))){
			echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!($stmt->bind_param("i",$_POST['deleteplayer']))){
			echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!$stmt->execute()){
			echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
		} 
		else {
			echo "Deleted " . $stmt->affected_rows . " rows from players.";
		}
		$stmt->close();
		$_POST=array();
	}	
?>
</body>
</html>