<?php require 'connect.php';

if (isset($_COOKIE['userID'])){
	$userID = $_COOKIE['userID'];

	$sql = "call update_cart($userID)";

	require 'query.php';
}
