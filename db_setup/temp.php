<?php
	require ("config.php");
	ini_set('display_errors', 'On');
	$conn = new mysqli(mHOST,mDB,mPASS,mUSER);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	<title>Insert Tab Title Here</title>
</head>
<body>

 <?php
	if(!($stmt = $conn->prepare("SELECT id, name FROM languages"))){
		echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
	}
	if(!$stmt->execute()){
		echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
	}
	if(!$stmt->bind_result($id, $name)){
		echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
	}
	while($stmt->fetch()){
 		echo "<input type='checkbox' value='" . $id . "' name='" . $name . "'>" . $name;
	}
	$stmt->close();
?>
	
</body>
</html>