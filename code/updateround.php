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
	$stmtstart="UPDATE rounds SET";
	$paramtypes="";
	$params=array("","","","","","","","","","","","","","","","","","","","");
	$count=0;
	if(isset($_POST['editround']) && $_POST['editround'] != ""){
		if(isset($_POST['editdate']) && $_POST['editdate'] != ""){
			$paramtypes=$paramtypes . "s";
			$params[$count]=$_POST['editdate'];
			$count=$count+1; 
			$stmtstart=$stmtstart . " play_date=?";
		}
		if(isset($_POST['edittee']) && $_POST['edittee'] != ""){
			if($count==0){
				$stmtstart=$stmtstart . " tee_color=?";
			}
			else{
				$stmtstart=$stmtstart . ", tee_color=?";
			}
			$paramtypes=$paramtypes . "s";
			$params[$count]=$_POST['edittee'];
			$count=$count+1; 			
		}
		if(isset($_POST['edit1']) && $_POST['edit1'] != ""){
			if($count==0){
				$stmtstart=$stmtstart . " hole_1_score=?";
			}
			else{
				$stmtstart=$stmtstart . ", hole_1_score=?";
			}
			$paramtypes=$paramtypes . "i";
			$params[$count]=$_POST['edit1'];
			$count=$count+1; 
		}
		if(isset($_POST['edit2']) && $_POST['edit2'] != ""){
			if($count==0){
				$stmtstart=$stmtstart . " hole_2_score=?";
			}
			else{
				$stmtstart=$stmtstart . ", hole_2_score=?";
			}
			$paramtypes=$paramtypes . "i";
			$params[$count]=$_POST['edit2'];
			$count=$count+1; 
		}
		if(isset($_POST['edit3']) && $_POST['edit3'] != ""){
			if($count==0){
				$stmtstart=$stmtstart . " hole_3_score=?";
			}
			else{
				$stmtstart=$stmtstart . ", hole_3_score=?";
			}
			$paramtypes=$paramtypes . "i";
			$params[$count]=$_POST['edit3'];
			$count=$count+1;
		}
		if(isset($_POST['edit4']) && $_POST['edit4'] != ""){
			if($count==0){
				$stmtstart=$stmtstart . " hole_4_score=?";
			}
			else{
				$stmtstart=$stmtstart . ", hole_4_score=?";
			}
			$paramtypes=$paramtypes . "i";
			$params[$count]=$_POST['edit4'];
			$count=$count+1; 
		}
		if(isset($_POST['edit5']) && $_POST['edit5'] != ""){
			if($count==0){
				$stmtstart=$stmtstart . " hole_5_score=?";
			}
			else{
				$stmtstart=$stmtstart . ", hole_5_score=?";
			}
			$paramtypes=$paramtypes . "i";
			$params[$count]=$_POST['edit5'];
			$count=$count+1; 
		}
		if(isset($_POST['edit6']) && $_POST['edit6'] != ""){
			if($count==0){
				$stmtstart=$stmtstart . " hole_6_score=?";
			}
			else{
				$stmtstart=$stmtstart . ", hole_6_score=?";
			}
			$paramtypes=$paramtypes . "i";
			$params[$count]=$_POST['edit6'];
			$count=$count+1; 
		}
		if(isset($_POST['edit7']) && $_POST['edit7'] != ""){
			if($count==0){
				$stmtstart=$stmtstart . " hole_7_score=?";
			}
			else{
				$stmtstart=$stmtstart . ", hole_7_score=?";
			}
			$paramtypes=$paramtypes . "i";
			$params[$count]=$_POST['edit7'];
			$count=$count+1; 
		}
		if(isset($_POST['edit8']) && $_POST['edit8'] != ""){
			if($count==0){
				$stmtstart=$stmtstart . " hole_8_score=?";
			}
			else{	
				$stmtstart=$stmtstart . ", hole_8_score=?";
			}
			$paramtypes=$paramtypes . "i";
			$params[$count]=$_POST['edit8'];
			$count=$count+1; 
		}
		if(isset($_POST['edit9']) && $_POST['edit9'] != ""){
			if($count==0){
				$stmtstart=$stmtstart . " hole_9_score=?";
			}
			else{
				$stmtstart=$stmtstart . ", hole_9_score=?";
			}
			$paramtypes=$paramtypes . "i";
			$params[$count]=$_POST['edit9'];
			$count=$count+1; 
		}
		if(isset($_POST['edit10']) && $_POST['edit10'] != ""){
			if($count==0){
				$stmtstart=$stmtstart . " hole_10_score=?";
			}
			else{
				$stmtstart=$stmtstart . ", hole_10_score=?";
			}
			$paramtypes=$paramtypes . "i";
			$params[$count]=$_POST['edit10'];
			$count=$count+1; 
		}
		if(isset($_POST['edit11']) && $_POST['edit11'] != ""){
			if($count==0){
				$stmtstart=$stmtstart . " hole_11_score=?";
			}
			else{
				$stmtstart=$stmtstart . ", hole_11_score=?";
			}
			$paramtypes=$paramtypes . "i";
			$params[$count]=$_POST['edit11'];
			$count=$count+1; 
		}
		if(isset($_POST['edit12']) && $_POST['edit12'] != ""){
			if($count==0){
				$stmtstart=$stmtstart . " hole_12_score=?";
			}
			else{
				$stmtstart=$stmtstart . ", hole_12_score=?";
			}
			$paramtypes=$paramtypes . "i";
			$params[$count]=$_POST['edit12'];
			$count=$count+1; 
		}
		if(isset($_POST['edit13']) && $_POST['edit13'] != ""){
			if($count==0){
				$stmtstart=$stmtstart . " hole_13_score=?";
			}
			else{
				$stmtstart=$stmtstart . ", hole_13_score=?";
			}
			$paramtypes=$paramtypes . "i";
			$params[$count]=$_POST['edit13'];
			$count=$count+1;
		}
		if(isset($_POST['edit14']) && $_POST['edit14'] != ""){
			if($count==0){
				$stmtstart=$stmtstart . " hole_14_score=?";
			}
			else{
				$stmtstart=$stmtstart . ", hole_14_score=?";
			}
			$paramtypes=$paramtypes . "i";
			$params[$count]=$_POST['edit14'];
			$count=$count+1; 
		}
		if(isset($_POST['edit15']) && $_POST['edit15'] != ""){
			if($count==0){
				$stmtstart=$stmtstart . " hole_15_score=?";
			}
			else{
				$stmtstart=$stmtstart . ", hole_15_score=?";
			}
			$paramtypes=$paramtypes . "i";
			$params[$count]=$_POST['edit15'];
			$count=$count+1; 
		}
		if(isset($_POST['edit16']) && $_POST['edit16'] != ""){
			if($count==0){
				$stmtstart=$stmtstart . " hole_16_score=?";
			}
			else{
				$stmtstart=$stmtstart . ", hole_16_score=?";
			}
			$paramtypes=$paramtypes . "i";
			$params[$count]=$_POST['edit16'];
			$count=$count+1; 
		}
		if(isset($_POST['edit17']) && $_POST['edit17'] != ""){
			if($count==0){
				$stmtstart=$stmtstart . " hole_17_score=?";
			}
			else{
				$stmtstart=$stmtstart . ", hole_17_score=?";
			}
			$paramtypes=$paramtypes . "i";
			$params[$count]=$_POST['edit17'];
			$count=$count+1; 
		}
		if(isset($_POST['edit18']) && $_POST['edit18'] != ""){
			if($count==0){
				$stmtstart=$stmtstart . " hole_18_score=?";
			}
			else{
				$stmtstart=$stmtstart . ", hole_18_score=?";
			}
			$paramtypes=$paramtypes . "i";
			$params[$count]=$_POST['edit18'];
			$count=$count+1; 
		}
		$stmtstart=$stmtstart . " WHERE id=?";
		$paramtypes=$paramtypes . "i";
		$params[$count]=$_POST['editround'];
		$count=$count+1;
		if(!($stmt = $conn->prepare($stmtstart))){
			echo "Prepare failed: "  . $conn->errno . " " . $conn->error;
		}
		if($count==1){
			list($a)=$params;
			if(!($stmt->bind_param($paramtypes, $a))){
				echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
			}
		}
		if($count==2){
			list($a, $b)=$params;
			if(!($stmt->bind_param($paramtypes, $a, $b))){
				echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
			}
		}
		if($count==3){
			list($a, $b, $c)=$params;
			if(!($stmt->bind_param($paramtypes, $a, $b, $c))){
				echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
			}
		}
		if($count==4){
			list($a, $b, $c, $d)=$params;
			if(!($stmt->bind_param($paramtypes, $a, $b, $c, $d))){
				echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
			}
		}
		if($count==5){
			list($a, $b, $c, $d, $e)=$params;
			if(!($stmt->bind_param($paramtypes, $a, $b, $c, $d, $e))){
				echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
			}
		}
		if($count==6){
			list($a, $b, $c, $d, $e, $f)=$params;
			if(!($stmt->bind_param($paramtypes, $a, $b, $c, $d, $e, $f))){
				echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
			}
		}
		if($count==7){
			list($a, $b, $c, $d, $e, $f, $g)=$params;
			if(!($stmt->bind_param($paramtypes, $a, $b, $c, $d, $e, $f, $g))){
				echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
			}
		}
		if($count==8){
			list($a, $b, $c, $d, $e, $f, $g, $h)=$params;
			if(!($stmt->bind_param($paramtypes, $a, $b, $c, $d, $e, $f, $g, $h))){
				echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
			}
		}
		if($count==9){
			list($a, $b, $c, $d, $e, $f, $g, $h, $i)=$params;
			if(!($stmt->bind_param($paramtypes, $a, $b, $c, $d, $e, $f, $g, $h, $i))){
				echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
			}
		}
		if($count==10){
			list($a, $b, $c, $d, $e, $f, $g, $h, $i, $j)=$params;
			if(!($stmt->bind_param($paramtypes, $a, $b, $c, $d, $e, $f, $g, $h, $i, $j))){
				echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
			}
		}
		if($count==11){
			list($a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k)=$params;
			if(!($stmt->bind_param($paramtypes, $a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k))){
				echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
			}
		}
		if($count==12){
			list($a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l)=$params;
			if(!($stmt->bind_param($paramtypes, $a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l))){
				echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
			}
		}
		if($count==13){
			list($a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l, $m)=$params;
			if(!($stmt->bind_param($paramtypes, $a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l, $m))){
				echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
			}
		}
		if($count==14){
			list($a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l, $m, $n)=$params;
			if(!($stmt->bind_param($paramtypes, $a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l, $m, $n))){
				echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
			}
		}
		if($count==15){
			list($a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l, $m, $n, $o)=$params;
			if(!($stmt->bind_param($paramtypes, $a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l, $m, $n, $o))){
				echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
			}
		}
		if($count==16){
			list($a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p)=$params;
			if(!($stmt->bind_param($paramtypes, $a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p))){
				echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
			}
		}
		if($count==17){
			list($a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p, $q)=$params;
			if(!($stmt->bind_param($paramtypes, $a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p, $q))){
				echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
			}
		}
		if($count==18){
			list($a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p, $q, $r)=$params;
			if(!($stmt->bind_param($paramtypes, $a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p, $q, $r))){
				echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
			}
		}
		if($count==19){
			list($a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p, $q, $r, $s)=$params;
			if(!($stmt->bind_param($paramtypes, $a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p, $q, $r, $s))){
				echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
			}
		}
		if($count==20){
			list($a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p, $q, $r, $s, $t)=$params;
			if(!($stmt->bind_param($paramtypes, $a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p, $q, $r, $s, $t))){
				echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
			}
		}
		if($count==21){
			list($a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p, $q, $r, $s, $t, $u)=$params;
			if(!($stmt->bind_param($paramtypes, $a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p, $q, $r, $s, $t, $u))){
				echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
			}
		}
		if(!$stmt->execute()){
			echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
		}
		else {
			echo "Updated " . ($count-1) . " Attributes in " . $stmt->affected_rows . " Round.";
		}
		$stmt->close();
		$_POST=array();
	}
?>
</body>
</html>