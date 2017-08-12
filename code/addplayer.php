<?php
	require 'config.php';
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

	$fname=NULL;
	$lname=NULL;
	$age=NULL;
	$city=NULL;
	$state=NULL;
	$sex=NULL;
	$homecourse=NULL;
	$handicap=NULL;
	$age=NULL;
	$ispro=NULL;

	if(isset($_POST['addfname']) && $_POST['addfname'] != ""){
		$fname=trim($_POST['addfname']);
	}
	if(isset($_POST['addlname']) && $_POST['addlname'] != ""){
		$lname=trim($_POST['addlname']);
	}
	if(isset($_POST['addage']) && $_POST['addage'] != ""){
		$age=$_POST['addage'];
	}
	if(isset($_POST['addcity']) && $_POST['addcity'] != ""){
		$city=trim($_POST['addcity']);
	}
	if(isset($_POST['addstate']) && $_POST['addstate'] != ""){
		$state=trim($_POST['addstate']);
	}
	if(isset($_POST['addsex']) && $_POST['addsex'] != ""){
		$sex=trim($_POST['addsex']);
	}
	if(isset($_POST['addhomecourse']) && $_POST['addhomecourse'] != ""){
		$homecourse=$_POST['addhomecourse'];
	}
	if(isset($_POST['addhandicap']) && $_POST['addhandicap']!= ""){
		$handicap=$_POST['addhandicap'];
	}
	if(isset($_POST['addispro']) && $_POST['addispro'] != ""){
		$ispro=$_POST['addispro'];
	}

	if(!$conn){
		echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}	
	if(!($stmt = $conn->prepare("INSERT INTO players (fname, lname, age, city, state, sex, home_course, handicap, is_pro) VALUES (?,?,?,?,?,?,?,?,?)"))){
		echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
	}
	if(!($stmt->bind_param("ssisssidi",$fname,$lname,$age,$city,$state,$sex,$homecourse,$handicap,$ispro))){
		echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
	}
	if(!$stmt->execute()){
		echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
	} 
	else {
		echo "Added " . $stmt->affected_rows . " rows to players.";
	}
	$stmt->close();
	$_POST=array();
?>

</body>
</html>






