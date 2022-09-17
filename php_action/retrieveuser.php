<?php

require_once 'db_connect.php';

$output = array('data' => array());

$sql = "SELECT * FROM users";
$query = $connect->query($sql);

while ($row = $query->fetch_assoc()) {

	$actionButton = '
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle action-btn-users" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Action <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    <li><a type="button" data-toggle="modal" data-target="#editUserModal" onclick="editUser(' . $row["id"] . ')"> <span class="glyphicon glyphicon-edit"></span> Edit</a></li>
	    <li><a type="button" data-toggle="modal" data-target="#removeUserModal" onclick="removeUser(' . $row["id"] . ')"> <span class="glyphicon glyphicon-trash"></span> Delete</a></li>	    
	  </ul>
	</div>
		';

	$output['data'][] = array(
		$row["id"],
		$row['u_name'],
		$row['f_name'],
		$row['l_name'],
		$row['age'],
		$row['gender'],
		$row['usertype'],
		$actionButton
	);
}

// database connection close
$connect->close();

echo json_encode($output);
