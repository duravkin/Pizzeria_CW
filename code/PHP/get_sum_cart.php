<?php require 'connect.php';

if (isset($_COOKIE['userID'])){
	$userID = $_COOKIE['userID'];

	$sql = "select cart_id, coalesce(sum(price * quantity), 0) as cart_sum 
	from subcarts
	join items on item_id = items.id
	where cart_id = get_or_create_cart($userID)
	group by cart_id";

	$result = mysqli_fetch_assoc(mysqli_query($connection, $sql));

	echo json_encode($result);
}
?>