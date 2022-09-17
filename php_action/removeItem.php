<?php

require_once 'db_connect.php';

$output = array('success' => false, 'messages' => array());

$trackingID = $_POST['trackingID'];

$sql = "DELETE FROM delivery_info WHERE trackingID = '$trackingID'";
$query = $connect->query($sql);
if ($query === TRUE) {
	$output['success'] = true;
	$output['messages'] = 'Item successfully removed';
} else {
	$output['success'] = false;
	$output['messages'] = 'Error while removing the item information';
}

// close database connection
$connect->close();

echo json_encode($output);
