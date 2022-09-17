<?php

require_once 'db_connect.php';

	$validator = array('success' => false, 'messages' => array());
	
	$id = $_POST['user_ID'];
	$f_name = $_POST['editf_name'];
	$l_name = $_POST['editl_name'];
	$age = $_POST['editage'];
	$gender = $_POST['editgender'];
	$password = $_POST['editPassword'];
	$usertype = $_POST['editUsertype'];
	
	$sql = "UPDATE users SET password='$password', f_name='$f_name', l_name='$l_name', age='$age', gender='$gender', usertype='$usertype'
			WHERE id='$id'";
	$query = $connect->query($sql);

	if($query === TRUE) {			
		$validator['success'] = true;
		$validator['messages'] = "User Successfully Updated!";		
	} else {		
		$validator['success'] = false;
		$validator['messages'] = "Error while editing the user information!";
	}
	
	// close the database connection
	$connect->close();

	echo json_encode($validator);

