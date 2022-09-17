<?php

require_once 'db_connect.php';

	$validator = array('success' => false, 'messages' => array());
	
	$id = $_POST['trackingID'];
	$item = $_POST['edititem'];
	$amount = $_POST['editamount'];
	$sname = $_POST['editsname'];
	$saddress = $_POST['editsaddress'];
	$rname = $_POST['editrname'];
	$raddress = $_POST['editraddress'];
	$payment = $_POST['editpayment'];
	$status = $_POST['editstatus'];
	
	$sql = "UPDATE delivery_info SET item='$item', amount='$amount', sname='$sname', saddress='$saddress', rname='$rname', raddress='$raddress', payment='$payment', status='$status'
			WHERE trackingID='$id'";
	$query = $connect->query($sql);

	if($query === TRUE) {			
		$validator['success'] = true;
		$validator['messages'] = "Item information Successfully Updated!";		
	} else {		
		$validator['success'] = false;
		$validator['messages'] = "Error while editing the item information!";
	}
	
	// close the database connection
	$connect->close();

	echo json_encode($validator);

