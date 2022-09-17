<?php

require_once 'db_connect.php';

$output = array('success' => false, 'messages' => array());

$user_ID = $_POST['user_ID'];

$sql = "DELETE FROM users WHERE id = '$user_ID'";
$query = $connect->query($sql);
if ($query === TRUE) {
	$output['success'] = true;
	$output['messages'] = 'User successfully removed';
} else {
	$output['success'] = false;
	$output['messages'] = 'Error while removing the user information';
}

// close database connection
$connect->close();

echo json_encode($output);
