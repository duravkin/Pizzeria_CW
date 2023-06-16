<?php require 'connect.php';

if (isset($_COOKIE['userID'])){
	$userID = $_COOKIE['userID'];

	$sql = "select item_id, quantity from subcarts where cart_id = get_or_create_cart($userID)";

	$result = mysqli_query($connection, $sql);

	$data = array();

	foreach ($result as $row){
		$data[$row['item_id']] = $row['quantity'];
	}

	echo json_encode($data);

}
?>