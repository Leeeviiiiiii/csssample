<?php

require_once 'db_connect.php';

$output = array('data' => array());

$sql = "SELECT * FROM delivery_info";
$query = $connect->query($sql);

while ($row = $query->fetch_assoc()) {

	$actionButton = '
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle action-btn-users" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Action <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    <li><a type="button" data-toggle="modal" data-target="#editItemModal" onclick="editItem(' . $row['trackingID'] . ')"> <span class="glyphicon glyphicon-edit"></span> Edit</a></li>
	    <li><a type="button" data-toggle="modal" data-target="#removeItemModal" onclick="removeItem(' . $row['trackingID'] . ')"> <span class="glyphicon glyphicon-trash"></span> Delete</a></li>	    
	  </ul>
	</div>
		';

	$output['data'][] = array(
		$row['trackingID'],
		$row['item'],
		$row['amount'],
		$row['sname'],
		$row['saddress'],
		$row['rname'],
		$row['raddress'],
		$row['payment'],
		$row['status'],
		$actionButton
	);
}

// database connection close
$connect->close();

echo json_encode($output);
