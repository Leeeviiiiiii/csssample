<?php

require_once 'db_connect.php';

$user_ID = $_POST['user_ID'];

$sql = "SELECT * FROM users WHERE id = '$user_ID'";
$query = $connect->query($sql);
$result = $query->fetch_assoc();

$connect->close();

echo json_encode($result);
