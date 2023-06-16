<?php require 'connect.php';

if (isset($_COOKIE['userID'])){
	$userID = $_COOKIE['userID'];

	$sql = "select cart_id, title, type, price, quantity, (price * quantity) as sum_subcart
	from subcarts
	join items on item_id = items.id
	join types on type_id = types.id
	join carts on cart_id = carts.id
	where status = 1 and user_id = $userID";

	require 'query.php';
}
?>