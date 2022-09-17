<?php 

require_once 'db_connect.php';



	$validator = array('success' => false, 'messages' => array());
	
	$sname = $_POST['sname'];
	$saddress = $_POST['saddress'];
	$rname = $_POST['rname'];
	$raddress = $_POST['raddress'];
	$item = $_POST['item'];
	$amount = $_POST['amount'];
	$payment = $_POST['payment'];
	
	$sql = "INSERT INTO delivery_info (sname, saddress, rname, raddress, item, amount, payment, status) 
		VALUES ('$sname', '$saddress', '$rname', '$raddress', '$item', '$amount', '$payment', 'Preparing for Delivery')";
	$query = $connect->query($sql);

	if($query === TRUE) {			
		$validator['success'] = true;
		$validator['messages'] = "Item Successfully Added!";		
	} else {		
		$validator['success'] = false;
		$validator['messages'] = "Error while adding the item information!";
	}

	// close the database connection
	$connect->close();

	echo json_encode($validator);
