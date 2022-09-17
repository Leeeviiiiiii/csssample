<?php 

require_once 'db_connect.php';



	$validator = array('success' => false, 'messages' => array());
	
	$f_name = $_POST['f_name'];
	$l_name = $_POST['l_name'];
	$age = $_POST['age'];
	$gender = $_POST['gender'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$usertype = $_POST['usertype'];
	
	$sql1 = "SELECT * FROM users WHERE u_name='$username'";
	$query1 = $connect->query($sql1);
	
	if ($query1->num_rows > 0) {
    		if ($row = $query1->fetch_assoc()) {
				$validator['success'] = false;
				$validator['messages'] = "Username Already Exist!";
			}
    } else {
		
		$sql = "INSERT INTO users (u_name, password, f_name, l_name, age, gender, usertype) 
			VALUES ('$username', '$password', '$f_name', '$l_name', '$age', '$gender', '$usertype')";
		$query = $connect->query($sql);

		if($query === TRUE) {			
			$validator['success'] = true;
			$validator['messages'] = "User Successfully Added!";		
		} else {		
			$validator['success'] = false;
			$validator['messages'] = "Error while adding the user information!";
		}

		
		
	}
	// close the database connection
	$connect->close();

	echo json_encode($validator);
