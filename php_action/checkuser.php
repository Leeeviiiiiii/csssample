<?php
session_start();

require_once 'db_connect.php';

$u_name = $connect->real_escape_string($_POST["usr"]);
$password = $connect->real_escape_string($_POST["pwd"]);
//$usr = $_POST["usr"];
//$pwd = $_POST["pwd"];

$sql = "SELECT * FROM users WHERE u_name='$u_name' AND password='$password'";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
	// output data of each row
	if ($row = $result->fetch_assoc()) {
		$_SESSION["user_ID"] = $row["id"];
		$_SESSION["username"] = $row["u_name"];
		$_SESSION["password"] = $row["password"];
		$_SESSION["f_name"] = $row["f_name"];
		$_SESSION["l_name"] = $row["l_name"];
		$_SESSION["age"] = $row["age"];
		$_SESSION["gender"] = $row["gender"];
		$_SESSION["usertype"] = $row["usertype"];
		echo "<script type='text/javascript'>alert('Logged in successfully!'); window.location.replace('http://localhost/testfolder/Vicente_EXAM_ITP11Final/ITP11Final'); </script>";
	}
} else {
	echo "<script type='text/javascript'>alert('Access Denied!'); window.location.replace('http://localhost/testfolder/Vicente_EXAM_ITP11Final/ITP11Final'); </script>";
}
$connect->close();
