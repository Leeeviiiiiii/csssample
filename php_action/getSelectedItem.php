<?php

require_once 'db_connect.php';

$user_ID = $_POST['trackingID'];

$sql = "SELECT * FROM delivery_info WHERE trackingID = '$user_ID'";
$query = $connect->query($sql);
$result = $query->fetch_assoc();

$connect->close();

echo json_encode($result);
