<?php
	session_start();

	require_once 'php_action/db_connect.php';
	
	$usrid = $_POST["usrid"];
	$usr = $_POST["usr"];
	$pwd = $_POST["pwd"];
	$f_name = $_POST["f_name"];
	$l_name = $_POST["l_name"];
	$age = $_POST["age"];
	$gender = $_POST["gender"];
	$sql = "UPDATE users SET 
				u_name='$usr', password='$pwd', f_name='$f_name', l_name='$l_name', age='$age', gender='$gender' 
			WHERE id='$usrid'";

	if ($connect->query($sql)) {
		echo "Profile updated successfully";
		$_SESSION["user_ID"] = $_POST["usrid"];
		$_SESSION["username"] = $_POST["usr"];
		$_SESSION["password"] = $_POST["pwd"];
		$_SESSION["f_name"] = $_POST["f_name"];
		$_SESSION["l_name"] = $_POST["l_name"];
		$_SESSION["age"] = $_POST["age"];
		$_SESSION["gender"] = $_POST["gender"];
		echo "<script type='text/javascript'>alert('Profile Updated Successfully!'); 
				window.location.replace('http://localhost/testfolder/Vicente_EXAM_ITP11Final/ITP11Final/profile.php')</script>";
	} else {
		echo "Error updating record: " . $connect -> error;
	}
	$connect->close();
?>
